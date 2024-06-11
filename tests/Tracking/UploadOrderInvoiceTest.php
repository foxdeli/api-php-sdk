<?php

declare(strict_types=1);

namespace Tests\Tracking;

use Foxdeli\ApiPhpSdk\ApiException;
use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\Tracking;
use Foxdeli\ApiPhpSdk\Model\FileInfo;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class UploadOrderInvoiceTest extends TestCase
{
    public function testWithValidAuthorization(): void
    {
        $mock = new MockHandler([
            new Response(201, ['Content-Type' => 'application/json'], $this->getRawResponse())
        ]);

        $tracking = new Tracking(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );
        /** @var FileInfo */
        $fileInfo = $tracking->uploadOrderInvoice('22222222-2222-2222-2222-222222222222', __DIR__ . '/../foxdeli-intro.en-03-04-2023.pdf');

        $this->assertInstanceOf(FileInfo::class, $fileInfo);
        $this->assertSame("invoices/22222222-2222-2222-2222-222222222222/foxdeli-intro.en-03-04-2023.pdf", $fileInfo->getPath());
        $this->assertSame("https://storage.sandbox.foxdeli.com/invoices/22222222-2222-2222-2222-222222222222/foxdeli-intro.en-03-04-2023.pdf", $fileInfo->getUrl());
        $this->assertSame(759500, $fileInfo->getSize());
    }

    private function getRawResponse() : string {
        return '{
            "path": "invoices/22222222-2222-2222-2222-222222222222/foxdeli-intro.en-03-04-2023.pdf",
            "url": "https://storage.sandbox.foxdeli.com/invoices/22222222-2222-2222-2222-222222222222/foxdeli-intro.en-03-04-2023.pdf",
            "contentType": "application/pdf",
            "size": 759500,
            "created": "2024-05-27T19:47:06.298Z",
            "updated": "2024-05-27T19:47:06.298Z"
        }';
    }

    public function testWith400Response(): void
    {
        $mock = new MockHandler([
            new Response(400, ['Content-Type' => 'application/problem+json'], $this->getRawError400Response())
        ]);

        $tracking = new Tracking(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage('Bad Request');

        $tracking->uploadOrderInvoice('22222222-2222-2222-2222-222222222222', __DIR__ . '/../foxdeli-intro.en-03-04-2023.pdf');

    }

    public function testWith401Response(): void
    {
        $mock = new MockHandler([
            new Response(401, ['Content-Type' => 'application/problem+json'], $this->getRawError401Response())
        ]);

        $tracking = new Tracking(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(401);
        $this->expectExceptionMessage('The Token has expired on 2024-01-02T03:04:05Z.');

        $tracking->uploadOrderInvoice('22222222-2222-2222-2222-222222222222', __DIR__ . '/../foxdeli-intro.en-03-04-2023.pdf');

    }

    public function testWith403Response(): void
    {
        $mock = new MockHandler([
            new Response(403, ['Content-Type' => 'application/problem+json'], $this->getRawError403Response())
        ]);

        $tracking = new Tracking(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(403);
        $this->expectExceptionMessage('Forbidden operation');

        $tracking->uploadOrderInvoice('22222222-2222-2222-2222-222222222222', __DIR__ . '/../foxdeli-intro.en-03-04-2023.pdf');

    }

    public function testWith404Response(): void
    {
        $mock = new MockHandler([
            new Response(404, ['Content-Type' => 'application/problem+json'], $this->getRawError404Response())
        ]);

        $tracking = new Tracking(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('Order was not found');

        $tracking->uploadOrderInvoice('22222222-2222-2222-2222-222222222222', __DIR__ . '/../foxdeli-intro.en-03-04-2023.pdf');

    }

    public function testWith415Response(): void
    {
        $mock = new MockHandler([
            new Response(415, ['Content-Type' => 'application/problem+json'], $this->getRawError415Response())
        ]);

        $tracking = new Tracking(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(415);
        $this->expectExceptionMessage('Unsupported Media Type');

        $tracking->uploadOrderInvoice('22222222-2222-2222-2222-222222222222', __DIR__ . '/../foxdeli-intro.en-03-04-2023.pdf');
    }

    private function getRawError400Response() : string {
        return '{
            "type": "about:blank",
            "title": "Constraint violation",
            "status": 400,
            "detail": "uploadInvoice.orderId: must be a valid UUID",
            "instance": "/tracking/api/v1/order/11111111-1111-1111-1111-111111111111/invoice",
            "violations": {
                "uploadInvoice.orderId": "must be a valid UUID"
            }
        }';
    }

    private function getRawError401Response() : string {
        return '{
            "type": "about:blank",
            "title": "The Token has expired on 2024-01-02T03:04:05Z.",
            "status": 401,
            "detail": "The Token has expired on 2024-01-02T03:04:05Z.",
            "instance": "/tracking/api/v1/order/11111111-1111-1111-1111-111111111111/invoice"
        }';
    }

    private function getRawError403Response() : string {
        return '{
            "type": "about:blank",
            "title": "Forbidden operation",
            "status": 403,
            "detail": "Account is not owner of resource ORDER with id 11111111-1111-1111-1111-111111111111",
            "instance": "/tracking/api/v1/order/11111111-1111-1111-1111-111111111111/invoice",
            "resourceType": "ORDER",
            "resourceId": "11111111-1111-1111-1111-111111111111"
          }';
    }

    private function getRawError404Response() : string {
        return '{
            "type": "about:blank",
            "title": "Order was not found",
            "status": 404,
            "detail": "Order with id 11111111-1111-1111-1111-111111111111 doesn\'t exist",
            "instance": "/tracking/api/v1/order/11111111-1111-1111-1111-111111111111/invoice",
            "resourceType": "Order",
            "resourceId": "11111111-1111-1111-1111-111111111111",
            "resourceIdName": "id"
          }';
    }

    private function getRawError415Response() : string {
        return '{
            "type": "about:blank",
            "title": "Unsupported Media Type",
            "status": 415,
            "detail": "Content-Type \'text/plain;charset=UTF-8\' is not supported.",
            "instance": "/tracking/api/v1/order"
        }';
    }
}
