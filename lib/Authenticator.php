<?php

namespace Foxdeli\ApiPhpSdk;

use Foxdeli\ApiPhpSdk\ApiException;
use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\Endpoint\Authorize;
use Foxdeli\ApiPhpSdk\Endpoint\IEndpoint;
use Foxdeli\ApiPhpSdk\Endpoint\Refresh;
use Foxdeli\ApiPhpSdk\ObjectSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Throwable;

class Authenticator extends ADomain
{
    /**
     * @var Customer
     */
    private $customer;

    public const URL_REQUEST_PREFIX = "/customer";

    public function __construct(Customer $customer, Client $client, Configuration $config)
    {
        $this->customer = $customer;
        $this->client = $client;

        $selfConfig = clone $config;
        $this->config = $selfConfig->setHost($config->getBaseHost() . self::URL_REQUEST_PREFIX);
    }

    public function authorize(): self
    {
        try {
            $response = $this->execute(new Authorize($this->customer));
            $token = $response->getBody();
            $tokens = json_decode($token);
            $this->customer->setToken(new Token($tokens->token, $tokens->refreshToken));
            $this->config->updateAuthToken($tokens->token);
            return $this;
        } catch (Throwable $e) {
            throw $e;
        }
    }

    public function refresh(): self
    {
        try {
            $response = $this->execute(new Refresh($this->customer));
            $token = $response->getBody();
            $tokens = json_decode($token);
            $this->customer->setToken(new Token($tokens->token, $tokens->refreshToken));
            $this->config->updateAuthToken($tokens->token);
            return $this;
        } catch (Throwable $e) {
            throw $e;
        }
    }

    /**
     *
     */
    private function execute(IEndpoint $endpoint): Response
    {
        $request = new Request($endpoint->getMethod(), $this->getEndpointUrl($endpoint), $endpoint->getHeaders(), $endpoint->getBody());
        try {
            return $this->client->sendAsync($request)->wait();
        } catch (ClientException $e) {
            $exception = $this->createApiExceptionFromClientException($e);
            throw $exception;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    private function getEndpointUrl(IEndpoint $endpoint): string
    {
        return $this->config->getHost() . $endpoint->getUrl();
    }
}
