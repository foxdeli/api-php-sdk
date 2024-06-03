<?php

declare(strict_types=1);

namespace Tests\PickupPlace;

use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\PickupPlace;
use Foxdeli\ApiPhpSdk\Model\DestinationType;
use Foxdeli\ApiPhpSdk\Model\ExceptionallyOpeningHoursRequest;
use Foxdeli\ApiPhpSdk\Model\Gps;
use Foxdeli\ApiPhpSdk\Model\LocationRequest;
use Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest;
use Foxdeli\ApiPhpSdk\Model\OpeningHoursRequest;
use Foxdeli\ApiPhpSdk\Model\PickupPlaceCreate;
use Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse;
use Foxdeli\ApiPhpSdk\Model\RegularOpeningHoursRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class CreatePickupPlaceTest extends TestCase
{
    public function testWithValidAuthorization(): void
    {
        $mock = new MockHandler([
            new Response(201, ['Content-Type' => 'application/json'], $this->getRawResponse())
        ]);

        $pickupPlace = new PickupPlace(
            new Client(['handler' => HandlerStack::create($mock)]),
            (new Configuration())
        );

        /** @var PickupPlaceResponse */
        $pickupPlace = $pickupPlace->createPickupPlace($this->getPickupPlaceCreate());

        $this->assertInstanceOf(PickupPlaceResponse::class, $pickupPlace);
        $this->assertSame("11111111-1111-1111-1111-111111111111", $pickupPlace->getId());
        $this->assertSame("22222222-2222-2222-2222-222222222222", $pickupPlace->getEshopId());
    }

    private function getPickupPlaceCreate() : PickupPlaceCreate {
        $pickupPlaceCreate = new PickupPlaceCreate();
        $pickupPlaceCreate
            ->setEshopId("22222222-2222-2222-2222-222222222222")
            ->setOriginPickupPlaceId('PARCEL_BOX_1')
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
        return $pickupPlaceCreate;
    }

    private function getRawResponse() : string {
        return '{
            "id": "11111111-1111-1111-1111-111111111111",
            "eshopId": "22222222-2222-2222-2222-222222222222",
            "type": "PARCEL_BOX",
            "carrier": "PERSONAL_PICKUP",
            "originPickupPlaceId": "PARCEL_BOX_1",
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
}
