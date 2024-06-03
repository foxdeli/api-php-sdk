<?php

declare(strict_types=1);

namespace Tests\Tracking;

use DateInterval;
use DateTime;
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
}
