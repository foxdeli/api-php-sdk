<?php

declare(strict_types=1);

namespace Tests\Tracking;

use Foxdeli\ApiPhpSdk\ApiException;
use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\PickupPlace;
use Foxdeli\ApiPhpSdk\Model\DestinationType;
use Foxdeli\ApiPhpSdk\Model\ExceptionallyOpeningHoursRequest;
use Foxdeli\ApiPhpSdk\Model\Gps;
use Foxdeli\ApiPhpSdk\Model\LocationRequest;
use Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest;
use Foxdeli\ApiPhpSdk\Model\OpeningHoursRequest;
use Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse;
use Foxdeli\ApiPhpSdk\Model\PickupPlaceUpdate;
use Foxdeli\ApiPhpSdk\Model\RegularOpeningHoursRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class UpdatePickupPlaceTest extends TestCase
{
    public function testWithValidAuthorization(): void
    {
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], $this->getRawResponse())
        ]);

        $pickupPlace = new PickupPlace(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        /** @var PickupPlaceResponse */
        $pickupPlace = $pickupPlace->updatePickupPlace("11111111-1111-1111-1111-111111111111", $this->getPickupPlaceUpdate());

        $this->assertInstanceOf(PickupPlaceResponse::class, $pickupPlace);
        $this->assertSame("11111111-1111-1111-1111-111111111111", $pickupPlace->getId());
        $this->assertSame("22222222-2222-2222-2222-222222222222", $pickupPlace->getEshopId());
        $this->assertSame("PARCEL_BOX_1_1", $pickupPlace->getOriginPickupPlaceId());
    }

    private function getPickupPlaceUpdate() : PickupPlaceUpdate {
        $pickupPlaceUpdate = new PickupPlaceUpdate();
        $pickupPlaceUpdate
            ->setOriginPickupPlaceId('PARCEL_BOX_1_1')
            ->setType(DestinationType::PARCEL_BOX)
            ->setName('First parcel box')
            ->setLocation(
                (new LocationRequest())
                ->setLine1("Sesame street")
                ->setLine2("11b")
                ->setCity("MyCoolCity")
                ->setZipCode("48228")
                ->setState("Michigan")
                ->setRegion("Michigan")
                ->setGps(
                    (new Gps)
                    ->setLongitude(50.0933864)
                    ->setLatitude(14.4542789)
                )
            )
            ->setCountryCode('SK')
            ->setPhone('12312313')
            ->setEmail('first-parcel-box@test.test')
            ->setStorageTimeInDays(3)
            ->setOpeningHours(
                (new OpeningHoursRequest())
                ->setRegular(
                    (new RegularOpeningHoursRequest())
                    ->setMonday([
                        (new OpeningHoursIntervalRequest())->setFrom('09:00')->setTo('22:00')
                    ])
                    ->setWednesday([
                        (new OpeningHoursIntervalRequest())->setFrom('09:00')->setTo('22:00')
                    ])
                    ->setFriday([
                        (new OpeningHoursIntervalRequest())->setFrom('09:00')->setTo('21:59')
                    ])
                    ->setSunday([
                        (new OpeningHoursIntervalRequest())->setFrom('00:00')->setTo('23:59')
                    ])
                )
                ->setExceptions([
                    (new ExceptionallyOpeningHoursRequest())
                    ->setDate('2030-12-24')
                    ->setHours([(new OpeningHoursIntervalRequest())->setFrom('00:00')->setTo('00:00')])
                    ->setReason('Chrismas')
                ])
            )
        ;
        return $pickupPlaceUpdate;
    }

    private function getRawResponse() : string {
        return '{
            "id": "11111111-1111-1111-1111-111111111111",
            "eshopId": "22222222-2222-2222-2222-222222222222",
            "type": "PARCEL_BOX",
            "carrier": "PERSONAL_PICKUP",
            "originPickupPlaceId": "PARCEL_BOX_1_1",
            "origin": "API_USER",
            "countryCode": "SK",
            "zoneId": "Etc/GMT-3",
            "name": "First parcel box",
            "location": {
                "line1": "Sesame street",
                "line2": "11b",
                "city": "MyCoolCity",
                "region": "Michigan",
                "state": "Michigan",
                "zipCode": "48228",
                "gps": {
                    "latitude": 14.4542789,
                    "longitude": 50.0933864
                }
            },
            "note": null,
            "phone": "12312313",
            "email": "first-parcel-box@test.test",
            "image": null,
            "storageTime": 3,
            "openingHours": {
                "regular": {
                    "monday": [
                        {
                            "from": "09:00:00",
                            "to": "22:00:00"
                        }
                    ],
                    "tuesday": [],
                    "wednesday": [
                        {
                            "from": "09:00:00",
                            "to": "22:00:00"
                        }
                    ],
                    "thursday": [],
                    "friday": [
                        {
                            "from": "09:00:00",
                            "to": "21:59:00"
                        }
                    ],
                    "saturday": [],
                    "sunday": [
                        {
                            "from": "00:00:00",
                            "to": "23:59:00"
                        }
                    ]
                },
                "exceptions": [
                    {
                        "date": "2030-12-24",
                        "hours": [
                            {
                                "from": "00:00:00",
                                "to": "00:01:00"
                            }
                        ],
                        "reason": "Chrismas"
                    }
                ]
            }
        }';
    }

    public function testWithInvalidRequest(): void
    {
        $mock = new MockHandler([]);

        $pickupPlace = new PickupPlace(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(0);
        $this->expectExceptionMessage('Invalid value for enum \'\Foxdeli\ApiPhpSdk\Model\DestinationType\', must be one of: \'');

        $pickupPlace->updatePickupPlace("11111111-1111-1111-1111-111111111111", $this->getPickupPlaceUpdate()->setType('BAD_DESTINATION_TYPE'));
    }

    public function testWith400Response(): void
    {
        $mock = new MockHandler([
            new Response(400, ['Content-Type' => 'application/problem+json'], $this->getRawError400Response())
        ]);

        $pickupPlace = new PickupPlace(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(400);
        $this->expectExceptionMessage('Bad Request');

        $pickupPlace->updatePickupPlace("11111111-1111-1111-1111-111111111111abc", $this->getPickupPlaceUpdate());
    }

    public function testWith401Response(): void
    {
        $mock = new MockHandler([
            new Response(401, ['Content-Type' => 'application/problem+json'], $this->getRawError401Response())
        ]);

        $pickupPlace = new PickupPlace(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(401);
        $this->expectExceptionMessage('The Token has expired on 2024-01-02T03:04:05Z.');

        $pickupPlace->updatePickupPlace("11111111-1111-1111-1111-111111111111", $this->getPickupPlaceUpdate());

    }

    public function testWith403Response(): void
    {
        $mock = new MockHandler([
            new Response(403, ['Content-Type' => 'application/problem+json'], $this->getRawError403Response())
        ]);

        $pickupPlace = new PickupPlace(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(403);
        $this->expectExceptionMessage('Eshop not found');

        $pickupPlace->updatePickupPlace("11111111-1111-1111-1111-111111111111", $this->getPickupPlaceUpdate());
    }

    public function testWith404Response(): void
    {
        $mock = new MockHandler([
            new Response(404, ['Content-Type' => 'application/problem+json'], $this->getRawError404Response())
        ]);

        $pickupPlace = new PickupPlace(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(404);
        $this->expectExceptionMessage('Pickup place not found.');

        $pickupPlace->updatePickupPlace("33333333-3333-3333-3333-333333333333", $this->getPickupPlaceUpdate());
    }

    public function testWith415Response(): void
    {
        $mock = new MockHandler([
            new Response(415, ['Content-Type' => 'application/problem+json'], $this->getRawError415Response())
        ]);

        $pickupPlace = new PickupPlace(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        $this->expectException(ApiException::class);
        $this->expectExceptionCode(415);
        $this->expectExceptionMessage('Unsupported Media Type');

        $pickupPlace->updatePickupPlace("11111111-1111-1111-1111-111111111111", $this->getPickupPlaceUpdate());
    }

    private function getRawError400Response() : string {
        return '{
            "type": "about:blank",
            "title": "Constraint violation",
            "status": 400,
            "detail": "updatePickupPlace.eshopId: must be a valid UUID",
            "instance": "/pickup-place/api/v1/pickup-place/11111111-1111-1111-1111-111111111111abc",
            "violations": {
                "updatePickupPlace.eshopId": "must be a valid UUID"
            }
        }';
    }

    private function getRawError401Response() : string {
        return '{
            "type": "about:blank",
            "title": "The Token has expired on 2024-01-02T03:04:05Z.",
            "status": 401,
            "detail": "The Token has expired on 2024-01-02T03:04:05Z.",
            "instance": "/pickup-place/api/v1/pickup-place/11111111-1111-1111-1111-111111111111"
        }';
    }

    private function getRawError403Response() : string {
        return '{
            "type": "about:blank",
            "title": "Eshop not found",
            "status": 403,
            "detail": "Eshop with id 44444444-4444-4444-4444-444444444444 doesn\'t exist in this account.",
            "instance": "/pickup-place/api/v1/pickup-place/44444444-4444-4444-4444-444444444444",
            "eshopId": "44444444-4444-4444-4444-444444444444"
        }';
    }

    private function getRawError404Response() : string {
        return '{
            "type": "about:blank",
            "title": "Pickup place not found.",
            "status": 404,
            "detail": "Pickup place with the following identification was not found. UUID: 33333333-3333-3333-3333-333333333333.",
            "instance": "/pickup-place/api/v1/pickup-place/33333333-3333-3333-3333-333333333333",
            "id": "33333333-3333-3333-3333-333333333333"
        }';
    }

    private function getRawError415Response() : string {
        return '{
            "type": "about:blank",
            "title": "Unsupported Media Type",
            "status": 415,
            "detail": "Content-Type \'text/plain;charset=UTF-8\' is not supported.",
            "instance": "/pickup-place/api/v1/pickup-place/11111111-1111-1111-1111-111111111111"
        }';
    }
}
