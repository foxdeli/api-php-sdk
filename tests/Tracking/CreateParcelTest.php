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
use Foxdeli\ApiPhpSdk\Model\DimensionsRequest;
use Foxdeli\ApiPhpSdk\Model\Parcel;
use Foxdeli\ApiPhpSdk\Model\ParcelRegistration;
use Foxdeli\ApiPhpSdk\Model\ParcelTrackingConfigRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class CreateParcelTest extends TestCase
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
        /** @var Parcel */
        $parcel = $tracking->createParcel('33333333-3333-3333-3333-333333333333', $this->getParcelRegistration());

        $this->assertInstanceOf(Parcel::class, $parcel);
        $this->assertSame("22222222-2222-2222-2222-222222222222", $parcel->getId());
        $this->assertSame('123456', $parcel->getPin());
        if($externalCreated = $parcel->getExternalCreated()){
            $this->assertSame("2024-05-28T13:31:43+00:00", $externalCreated->format('c'));
        } else {
            $this->fail("External date not passed");
        }
    }

    private function getParcelRegistration() : ParcelRegistration {
        $parcelRegistration = new ParcelRegistration();
        $parcelRegistration
            ->setPin('123456')
            ->setDimensions((new DimensionsRequest())->setHeight(100)->setLength(50)->setWidth(25)->setWeight(3.23))
            ->setProducts(["123", "1231"])
            ->setDeliveryDetails(
                (new DeliveryDetailsRequest())
                ->setEstimatedDeliveryDate(
                    (new DateTime())->add(new DateInterval('P2D'))
                )
            )
            ->setTracking([
                (new ParcelTrackingConfigRequest())
                ->setCarrier(Carrier::CZECH_POST)
                ->setNumber("CZECH_POST123")
                ->setReferenceId("REFCZECH_POST123")
            ])
            ->setExternalCreated(new DateTime())
        ;
        return $parcelRegistration;
    }

    private function getRawResponse() : string {
        return '{
            "id": "22222222-2222-2222-2222-222222222222",
            "orderId": "33333333-3333-3333-3333-333333333333",
            "externalCreated": "2024-05-28T13:31:43Z",
            "dimensions": {
                "weight": 3.23,
                "height": 100,
                "length": 50,
                "width": 25
            },
            "deliveryDetails": {
                "estimatedDeliveryDate": "2024-05-30",
                "delay": null
            },
            "pin": "123456",
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
                        "parcelStateGroup": "abcdefghijklmnopqrstuvwxyz1234567980abcd"
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

    public function testWithInvalidRequest(): void
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
        $this->expectExceptionMessage('Invalid value for enum \'\Foxdeli\ApiPhpSdk\Model\Carrier\', must be one of:');


        $parcelRegistration = $this->getParcelRegistration();
        if($parcelRegistration->getTracking()){
            $parcelRegistration->setTracking(array_merge(
                $parcelRegistration->getTracking(),
                [
                    (new ParcelTrackingConfigRequest())
                    ->setCarrier('FAKE_CARRIER')
                    ->setNumber("CZECH_POST123")
                    ->setReferenceId("REFCZECH_POST123")
                ]
            ));
            $tracking->createParcel('33333333-3333-3333-3333-333333333333', $parcelRegistration);
        } else {
            $this->fail("External date not passed");
        }
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

        $tracking->createParcel('33333333-3333-3333-3333-333333333333', $this->getParcelRegistration());
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

        $tracking->createParcel('33333333-3333-3333-3333-333333333333', $this->getParcelRegistration());

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

        $tracking->createParcel('33333333-3333-3333-3333-333333333333', $this->getParcelRegistration());

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

        $tracking->createParcel('33333333-3333-3333-3333-333333333333', $this->getParcelRegistration());

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

        $tracking->createParcel('33333333-3333-3333-3333-333333333333', $this->getParcelRegistration());
    }

    private function getRawError400Response() : string {
        return '{
            "type": "about:blank",
            "title": "Bad Request",
            "status": 400,
            "detail": "Failed to read request",
            "instance": "/tracking/api/v1/order/33333333-3333-3333-3333-333333333333/parcel",
            "violations": {
                "tracking[0].carrier": "Invalid value: CZECH_POS. Value must be one of: BUDBEE, CZECH_POST, DHL, DIY, DPD, DPD_CZ, DPD_PL, DPD_SK, EU_SHIPMENTS, FEDEX, GEBRUDER_WEISS, GEIS, GLS, GLS_CZ, GLS_HR, GLS_HU, GLS_RO, GLS_SI, GLS_SK, GO_BALIK, INPOST, JAPO, KURIER_123, KURYR_123, LANDMARK, MESSENGER, PACKETA, PBH, PERSONAL_PICKUP, POCZTA_POLSKA, PPL, SAMEDAY, SAMEDAY_RO, SLOVAKIA_POST, SPEEDY, SPRING_GDS, SPS, TAXYDROMIKI, TOP_TRANS, ULOZENKA, UNKNOWN, UPS, URGENT_CARGUS, WEDO"
            }
        }';
    }

    private function getRawError401Response() : string {
        return '{
            "type": "about:blank",
            "title": "The Token has expired on 2024-01-02T03:04:05Z.",
            "status": 401,
            "detail": "The Token has expired on 2024-01-02T03:04:05Z.",
            "instance": "/tracking/api/v1/order/33333333-3333-3333-3333-333333333333/parcel",
        }';
    }

    private function getRawError403Response() : string {
        return '{
            "type": "about:blank",
            "title": "Forbidden operation",
            "status": 403,
            "detail": "Account is not owner of resource ORDER with id 00000000-0000-0000-0000-000000000000",
            "instance": "/tracking/api/v1/order/33333333-3333-3333-3333-333333333333/parcel",
            "resourceType": "ORDER",
            "resourceId": "00000000-0000-0000-0000-000000000000"
        }';
    }

    private function getRawError404Response() : string {
        return '{
            "type": "about:blank",
            "title": "Order was not found",
            "status": 404,
            "detail": "Order with id 33333333-3333-3333-3333-333333333333 doesn\'t exist",
            "instance": "/tracking/api/v1/order/33333333-3333-3333-3333-333333333333/parcel",
            "orderId": "33333333-3333-3333-3333-333333333333"
        }';
    }

    private function getRawError415Response() : string {
        return '{
            "type": "about:blank",
            "title": "Unsupported Media Type",
            "status": 415,
            "detail": "Content-Type \'text/plain;charset=UTF-8\' is not supported.",
            "instance": "/tracking/api/v1/order/33333333-3333-3333-3333-333333333333/parcel",
        }';
    }
}
