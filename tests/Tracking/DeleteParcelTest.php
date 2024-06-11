<?php

declare(strict_types=1);

namespace Tests\Tracking;

use DateInterval;
use DateTime;
use Foxdeli\ApiPhpSdk\ApiException;
use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\Tracking;
use Foxdeli\ApiPhpSdk\Model\DeliveryStateRequest;
use Foxdeli\ApiPhpSdk\Model\Parcel;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class DeleteParcelTest extends TestCase
{
    public function testWithValidAuthorization(): void
    {
        $mock = new MockHandler([
            new Response(204, ['Content-Type' => 'application/json'], $this->getRawResponse())
        ]);

        $tracking = new Tracking(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $response = $tracking->deleteParcel('33333333-3333-3333-3333-333333333333', "22222222-2222-2222-2222-222222222222");

        $this->assertTrue($response);
    }

    private function getRawResponse() : string {
        return '';
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

        $tracking->deleteParcel('33333333-3333-3333-3333-333333333333abc', "22222222-2222-2222-2222-222222222222");
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

        $tracking->deleteParcel('33333333-3333-3333-3333-333333333333', "22222222-2222-2222-2222-222222222222");

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

        $tracking->deleteParcel('33333333-3333-3333-3333-333333333333', "22222222-2222-2222-2222-222222222222");

    }

    public function testWith404OrderResponse(): void
    {
        $mock = new MockHandler([
            new Response(404, ['Content-Type' => 'application/problem+json'], $this->getRawError404OrderResponse())
        ]);

        $tracking = new Tracking(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('Order was not found');

        $tracking->deleteParcel('55555555-5555-5555-5555-555555555555', "22222222-2222-2222-2222-222222222222");

    }

    public function testWith404ParcelResponse(): void
    {
        $mock = new MockHandler([
            new Response(404, ['Content-Type' => 'application/problem+json'], $this->getRawError404ParcelResponse())
        ]);

        $tracking = new Tracking(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('Parcel was not found');

        $tracking->deleteParcel('33333333-3333-3333-3333-333333333333', "22222222-2222-2222-2222-222222222222");

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

        $tracking->deleteParcel('33333333-3333-3333-3333-333333333333', "22222222-2222-2222-2222-222222222222");
    }

    private function getRawError400Response() : string {
        return '{
            "type": "about:blank",
            "title": "Constraint violation",
            "status": 400,
            "detail": "deleteParcel.parcelId: must be a valid UUID",
            "instance": "/tracking/api/v1/order/33333333-3333-3333-3333-333333333333abc/parcel/22222222-2222-2222-2222-222222222222",
            "violations": {
                "deleteParcel.parcelId": "must be a valid UUID"
            }
        }';
    }

    private function getRawError401Response() : string {
        return '{
            "type": "about:blank",
            "title": "The Token has expired on 2024-01-02T03:04:05Z.",
            "status": 401,
            "detail": "The Token has expired on 2024-01-02T03:04:05Z.",
            "instance": "/tracking/api/v1/order/33333333-3333-3333-3333-333333333333/parcel/22222222-2222-2222-2222-222222222222",
        }';
    }

    private function getRawError403Response() : string {
        return '{
            "type": "about:blank",
            "title": "Forbidden operation",
            "status": 403,
            "detail": "Account is not owner of resource ORDER with id 00000000-0000-0000-0000-000000000000",
            "instance": "/tracking/api/v1/order/00000000-0000-0000-0000-000000000000/parcel/22222222-2222-2222-2222-222222222222",
            "resourceType": "ORDER",
            "resourceId": "00000000-0000-0000-0000-000000000000"
        }';
    }

    private function getRawError404OrderResponse() : string {
        return '{
            "type": "about:blank",
            "title": "Order was not found",
            "status": 404,
            "detail": "Order with id 55555555-5555-5555-5555-555555555555 doesn\'t exist",
            "instance": "/tracking/api/v1/order/55555555-5555-5555-5555-555555555555/parcel/22222222-2222-2222-2222-222222222222",
            "orderId": "55555555-5555-5555-5555-555555555555"
        }';
    }

    private function getRawError404ParcelResponse() : string {
        return '{
            "type": "about:blank",
            "title": "Parcel was not found",
            "status": 404,
            "detail": "Parcel with id 44444444-4444-4444-4444-444444444444 doesn\'t exist.",
            "instance": "/tracking/api/v1/order/33333333-3333-3333-3333-333333333333/parcel/44444444-4444-4444-4444-444444444444",
            "resourceType": "Parcel",
            "resourceId": "44444444-4444-4444-4444-444444444444",
            "resourceIdName": "id"
        }';
    }

    private function getRawError415Response() : string {
        return '{
            "type": "about:blank",
            "title": "Unsupported Media Type",
            "status": 415,
            "detail": "Content-Type \'text/plain;charset=UTF-8\' is not supported.",
            "instance": "/tracking/api/v1/order/33333333-3333-3333-3333-333333333333/parcel/44444444-4444-4444-4444-444444444444",
        }';
    }
}
