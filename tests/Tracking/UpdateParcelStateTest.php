<?php

declare(strict_types=1);

namespace Tests\Tracking;

use DateInterval;
use DateTime;
use Foxdeli\ApiPhpSdk\ApiException;
use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\Customer;
use Foxdeli\ApiPhpSdk\Tracking;
use Foxdeli\ApiPhpSdk\Model\Carrier;
use Foxdeli\ApiPhpSdk\Model\DeliveryDetailsRequest;
use Foxdeli\ApiPhpSdk\Model\DeliveryStateRequest;
use Foxdeli\ApiPhpSdk\Model\DimensionsRequest;
use Foxdeli\ApiPhpSdk\Model\JsonNullableString;
use Foxdeli\ApiPhpSdk\Model\Parcel;
use Foxdeli\ApiPhpSdk\Model\ParcelRegistration;
use Foxdeli\ApiPhpSdk\Model\ParcelStateUpdate;
use Foxdeli\ApiPhpSdk\Model\ParcelTrackingConfigRequest;
use Foxdeli\ApiPhpSdk\Model\ParcelUpdate;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class UpdateParcelStateTest extends TestCase
{
    public function testWithValidAuthorization(): void
    {
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], $this->getRawResponse())
        ]);

        $tracking = new Tracking(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        /** @var Parcel */
        $parcel = $tracking->updateParcelState('33333333-3333-3333-3333-333333333333', "22222222-2222-2222-2222-222222222222", $this->getParcelStateUpdate());

        $this->assertInstanceOf(Parcel::class, $parcel);
        $this->assertSame("33333333-3333-3333-3333-333333333333", $parcel->getOrderId());
        $this->assertSame("22222222-2222-2222-2222-222222222222", $parcel->getId());
        if($state = $parcel->getState()){
            $this->assertSame("ESHOP_PROCESSING", $state->getDelivery());
        } else {
            $this->fail("Dimensions should be set up");
        }
        if($dimensions = $parcel->getDimensions()){
            $this->assertSame(101, $dimensions->getHeight());
            $this->assertSame(51, $dimensions->getLength());
            $this->assertSame(26, $dimensions->getWidth());
        } else {
            $this->fail("Dimensions should be set up");
        }
        if($externalCreated = $parcel->getExternalCreated()){
            $this->assertSame("2024-05-28T13:31:43+00:00", $externalCreated->format('c'));
        } else {
            $this->fail("External date not passed");
        }
    }

    private function getParcelStateUpdate() : ParcelStateUpdate {
        $parcelUpdate = new ParcelStateUpdate();
        $parcelUpdate
            ->setState(DeliveryStateRequest::ESHOP_PROCESSING)
            ->setNote("Parcel state note")
            ->setOccurred(new DateTime())
        ;
        return $parcelUpdate;
    }

    private function getRawResponse() : string {
        return '{
            "id": "22222222-2222-2222-2222-222222222222",
            "orderId": "33333333-3333-3333-3333-333333333333",
            "externalCreated": "2024-05-28T13:31:43Z",
            "dimensions": {
                "weight": 3.23,
                "height": 101,
                "length": 51,
                "width": 26
            },
            "deliveryDetails": {
                "estimatedDeliveryDate": "2024-05-30",
                "delay": null
            },
            "pin": "1234567",
            "state": {
                "delivery": "ESHOP_PROCESSING",
                "deliverToday": false,
                "returning": false
            },
            "trackingState": "AWAITING",
            "maxStoreDate": null,
            "deliveryWindow": null,
            "activeTracking": {
                "trackingId": "66666666-6666-6666-6666-666666666666",
                "carrier": "CZECH_POST",
                "number": "CZECH_POST123",
                "url": "https://www.postaonline.cz/trackandtrace/-/zasilka/cislo?parcelNumbers=CZECH_POST123",
                "referenceId": "REFCZECH_POST123",
                "carrierConfigurationId": null,
                "courierPhone": null
            },
            "timeline": [
                {
                    "timelineId": "55555555-5555-5555-5555-555555555555",
                    "type": "TRACKING",
                    "text": "ESHOP_PROCESSING",
                    "created": "2024-05-28T13:32:06.968Z",
                    "author": "Foxdeli",
                    "additionalParams": {
                        "parcelState": {
                            "delivery": "ESHOP_PROCESSING",
                            "important": null,
                            "urgent": null,
                            "deliverToday": false,
                            "returning": false
                        },
                        "parcelStateGroup": "abcdefghijklmnopqrstuvwxyz1234567890abcd"
                    }
                }
            ],
            "products": [
                "123",
                "1231"
            ],
            "tags": [],
            "carrierTrackingUrl": "https://www.postaonline.cz/trackandtrace/-/zasilka/cislo?parcelNumbers=CZECH_POST123",
            "created": "2024-05-28T13:32:06.969Z",
            "updated": "2024-05-28T13:32:06.969Z",
            "testData": false
        }';
    }

    public function testWith400ResponsePaymentMethodInvalidValue(): void
    {
        $mock = new MockHandler([
            new Response(400, ['Content-Type' => 'application/problem+json'], $this->getRawError400Response())
        ]);

        $tracking = new Tracking(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage('Invalid value for enum \'\Foxdeli\ApiPhpSdk\Model\DeliveryStateRequest\', must be one of: \'');

        $tracking->updateParcelState('33333333-3333-3333-3333-333333333333', "22222222-2222-2222-2222-222222222222", $this->getParcelStateUpdate()->setState('BAD_STATE'));
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

        $tracking->updateParcelState('33333333-3333-3333-3333-333333333333', "22222222-2222-2222-2222-222222222222", $this->getParcelStateUpdate());
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

        $tracking->updateParcelState('33333333-3333-3333-3333-333333333333', "22222222-2222-2222-2222-222222222222", $this->getParcelStateUpdate());

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

        $tracking->updateParcelState('33333333-3333-3333-3333-333333333333', "22222222-2222-2222-2222-222222222222", $this->getParcelStateUpdate());

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

        $tracking->updateParcelState('33333333-3333-3333-3333-333333333333', "22222222-2222-2222-2222-222222222222", $this->getParcelStateUpdate());

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

        $tracking->updateParcelState('33333333-3333-3333-3333-333333333333', "44444444-4444-4444-4444-444444444444", $this->getParcelStateUpdate());

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

        $tracking->updateParcelState('33333333-3333-3333-3333-333333333333', "22222222-2222-2222-2222-222222222222", $this->getParcelStateUpdate());
    }

    private function getRawError400Response() : string {
        return '{
            "type": "about:blank",
            "title": "Constraint violation",
            "status": 400,
            "detail": "findParcelById.parcelId: must be a valid UUID",
            "instance": "/tracking/api/v1/order/55555555-5555-5555-5555-555555555555/parcel/22222222-2222-2222-2222-222222222222/state",
            "violations": {
                "findParcelById.parcelId": "must be a valid UUID"
            }
        }';
    }

    private function getRawError401Response() : string {
        return '{
            "type": "about:blank",
            "title": "The Token has expired on 2024-01-02T03:04:05Z.",
            "status": 401,
            "detail": "The Token has expired on 2024-01-02T03:04:05Z.",
            "instance": "/tracking/api/v1/order/55555555-5555-5555-5555-555555555555/parcel/22222222-2222-2222-2222-222222222222/state",
        }';
    }

    private function getRawError403Response() : string {
        return '{
            "type": "about:blank",
            "title": "Forbidden operation",
            "status": 403,
            "detail": "Account is not owner of resource ORDER with id 00000000-0000-0000-0000-000000000000",
            "instance": "/tracking/api/v1/order/55555555-5555-5555-5555-555555555555/parcel/22222222-2222-2222-2222-222222222222/state",
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
            "instance": "/tracking/api/v1/order/55555555-5555-5555-5555-555555555555/parcel/22222222-2222-2222-2222-222222222222/state",
            "orderId": "55555555-5555-5555-5555-555555555555"
        }';
    }

    private function getRawError404ParcelResponse() : string {
        return '{
            "type": "about:blank",
            "title": "Parcel was not found",
            "status": 404,
            "detail": "Parcel with id 44444444-4444-4444-4444-444444444444 doesn\'t exist.",
            "instance": "/tracking/api/v1/order/55555555-5555-5555-5555-555555555555/parcel/44444444-4444-4444-4444-444444444444/state",
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
            "instance": "/tracking/api/v1/order/55555555-5555-5555-5555-555555555555/parcel/22222222-2222-2222-2222-222222222222/state",
        }';
    }
}
