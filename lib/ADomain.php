<?php

namespace Foxdeli\ApiPhpSdk;

use Foxdeli\ApiPhpSdk\ApiException;
use Foxdeli\ApiPhpSdk\ObjectSerializer;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

abstract class ADomain
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    public function createApiExceptionFromClientException(ClientException $e): ApiException
    {
        $exception = new ApiException(
            "[{$e->getCode()}] {$e->getMessage()}",
            $e->getCode(),
            null,
            $e->getResponse() ? (string) $e->getResponse()->getBody() : null
        );

        $data = ObjectSerializer::deserialize(
            $exception->getResponseBody(),
            '\Foxdeli\ApiPhpSdk\Model\ProblemDetail'
        );

        $exception->setResponseObject($data);
        return $exception;
    }

    /**
     * @param string|null $detail
     */
    public function createApiException(int $code, string $message, $detail): ApiException
    {
        $exception = new ApiException(
            "[{$code}] {$message}",
            $code,
            null,
            $detail
        );

        $data = ObjectSerializer::deserialize(
            $exception->getResponseBody(),
            '\Foxdeli\ApiPhpSdk\Model\ProblemDetail'
        );

        $exception->setResponseObject($data);
        return $exception;
    }


    /**
     * @return ApiException
     */
    protected function throwNotFound(string $title = "Not Found", string $detail = 'Unexpected response from server to be proccesed') {
        $errorDetails = '{
            "type" : "about:blank",
            "title" : "'.$title.'",
            "status" : 404,
            "detail" : "'.$detail.'"
          }';
        return $this->createApiException(404, 'Not Found', $errorDetails);
    }

    /**
     * @return ApiException
     */
    protected function throwNotImplemented() {
        $errorDetails = '{
            "type" : "about:blank",
            "title" : "Not Implemented",
            "status" : 501,
            "detail" : "Unexpected response from server to be proccesed"
          }';
        return $this->createApiException(501, 'Not Implemented', $errorDetails);
    }
}
