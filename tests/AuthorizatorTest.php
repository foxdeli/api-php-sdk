<?php

declare(strict_types=1);

use Foxdeli\ApiPhpSdk\ApiException;
use Foxdeli\ApiPhpSdk\Authenticator;
use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\Customer;
use Foxdeli\ApiPhpSdk\Token;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class AuthorizatorTest extends TestCase
{
    public function testAuthorizeWithValidAuthorization(): void
    {
        $validResponseBody = '{
            "token" : "abcd",
            "refreshToken" : "1234"
          }';

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], $validResponseBody)
        ]);

        $customer = new Customer("username", "password");

        $authenticator = new Authenticator(
            $customer,
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );
        $authenticator->authorize();

        $token = $customer->getToken();

        $this->assertSame('abcd', $token->getAccessToken());
        $this->assertSame('1234', $token->getRefreshToken());
    }

    public function testAuthorizeWithInvalidAuthorization(): void
    {
        $this->expectException(ApiException::class);

        $invalidResponseBody = '{
            "type" : "about:blank",
            "title" : "Invalid credentials",
            "status" : 404,
            "detail" : "Invalid credentials",
            "instance" : "/customer/api/v1/token/authorize"
          }';

        $mock = new MockHandler([
            new ClientException(
                'Error Communicating with Server',
                new Request('GET', 'test'),
                new Response(
                    404,
                    ['Content-Type' => 'application/json'],
                    $invalidResponseBody
                )
            ),
        ]);

        $customer = new Customer("username", "password");

        $authenticator = new Authenticator(
            $customer,
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $authenticator->authorize();
    }

    public function testAuthorizeWithUnknownException(): void
    {
        $this->expectException(RequestException::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('GET', 'test')),
        ]);

        $customer = new Customer("username", "password");

        $authenticator = new Authenticator(
            $customer,
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );
        $authenticator->authorize();
    }

    public function testRefreshTokenWithValidToken(): void
    {
        $validResponseBody = '{
            "token" : "abcd",
            "refreshToken" : "1234"
          }';

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], $validResponseBody)
        ]);

        $customer = new Customer("username", "password");
        $customer->setToken(new Token('accessToken123', 'refreshToken321'));

        $token = $customer->getToken();
        $this->assertSame('accessToken123', $token->getAccessToken());
        $this->assertSame('refreshToken321', $token->getRefreshToken());

        $authenticator = new Authenticator(
            $customer,
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );
        $authenticator->refresh();

        $token = $customer->getToken();
        $this->assertSame('abcd', $token->getAccessToken());
        $this->assertSame('1234', $token->getRefreshToken());
    }

    public function testRefreshWithInvalidAuthorization(): void
    {
        $this->expectException(ApiException::class);

        $invalidResponseBody = '{
            "type" : "about:blank",
            "title" : "Invalid credentials",
            "status" : 404,
            "detail" : "Invalid credentials",
            "instance" : "/customer/api/v1/token/authorize"
          }';

        $mock = new MockHandler([
            new ClientException(
                'Error Communicating with Server',
                new Request('GET', 'test'),
                new Response(
                    404,
                    ['Content-Type' => 'application/json'],
                    $invalidResponseBody
                )
            ),
        ]);

        $customer = new Customer("username", "password");
        $customer->setToken(new Token('accessToken123', 'refreshToken321'));

        $token = $customer->getToken();
        $this->assertSame('accessToken123', $token->getAccessToken());
        $this->assertSame('refreshToken321', $token->getRefreshToken());

        $authenticator = new Authenticator(
            $customer,
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $authenticator->authorize();
    }

    public function testRefreshWithUnknownException(): void
    {
        $this->expectException(RequestException::class);

        $mock = new MockHandler([
            new RequestException('Error Communicating with Server', new Request('GET', 'test')),
        ]);

        $customer = new Customer("username", "password");
        $customer->setToken(new Token('accessToken123', 'refreshToken321'));

        $token = $customer->getToken();
        $this->assertSame('accessToken123', $token->getAccessToken());
        $this->assertSame('refreshToken321', $token->getRefreshToken());

        $authenticator = new Authenticator(
            $customer,
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );
        $authenticator->refresh();
    }
}
