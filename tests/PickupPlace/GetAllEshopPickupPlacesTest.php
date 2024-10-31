<?php

declare(strict_types=1);

namespace Tests\PickupPlace;

use Foxdeli\ApiPhpSdk\ApiException;
use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\Model\CollectionResponsePickupPlaceResponse;
use Foxdeli\ApiPhpSdk\PickupPlace;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class GetAllEshopPickupPlacesTest extends TestCase
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

        /** @var CollectionResponsePickupPlaceResponse */
        $pickupPlaces = $pickupPlace->getAllEshopPickupPlaces("22222222-2222-2222-2222-222222222222");

        $this->assertInstanceOf(CollectionResponsePickupPlaceResponse::class, $pickupPlaces);
        $items = $pickupPlaces->getItems();
        if (is_null($items)) {
            $this->fail("Array of PickupPlaceResponse expected");
        } else {
            $this->assertCount(2, $items);
            $this->assertSame("11111111-1111-1111-1111-111111111111", $items[0]->getId());
            $this->assertSame("22222222-2222-2222-2222-222222222222", $items[0]->getEshopId());
            $this->assertSame("33333333-3333-3333-3333-333333333333", $items[1]->getId());
            $this->assertSame("22222222-2222-2222-2222-222222222222", $items[1]->getEshopId());
        }
    }

    private function getRawResponse(): string
    {
        return '{
            "items": [
              {
                "id": "11111111-1111-1111-1111-111111111111",
                "eshopId": "22222222-2222-2222-2222-222222222222",
                "type": "HOUSE_ADDRESS",
                "carrier": "PERSONAL_PICKUP",
                "originPickupPlaceId": "123456789",
                "origin": "API_USER",
                "countryCode": "CZ",
                "zoneId": "Europe/Prague",
                "name": "Pobocka Karlin",
                "location": {
                  "line1": "Krizikova 70",
                  "line2": "string",
                  "city": "Praha 8",
                  "region": "string",
                  "state": "California",
                  "zipCode": "158 00",
                  "gps": {
                    "latitude": 50.0933864,
                    "longitude": 14.4542789
                  }
                },
                "note": "This pickup place is a really nice place",
                "phone": "+420 987 654 321",
                "email": "karlin@mybriliantcompany.com",
                "image": null,
                "storageTime": 3,
                "openingHours": {
                  "regular": {
                    "monday": [
                      {
                        "from": "09:00:00",
                        "to": "17:00:00"
                      }
                    ],
                    "tuesday": [
                      {
                        "from": "09:00:00",
                        "to": "17:00:00"
                      }
                    ],
                    "wednesday": [
                      {
                        "from": "09:00:00",
                        "to": "17:00:00"
                      }
                    ],
                    "thursday": [
                      {
                        "from": "09:00:00",
                        "to": "17:00:00"
                      }
                    ],
                    "friday": [
                      {
                        "from": "09:00:00",
                        "to": "17:00:00"
                      }
                    ],
                    "saturday": [
                      {
                        "from": "09:00:00",
                        "to": "17:00:00"
                      }
                    ],
                    "sunday": [
                      {
                        "from": "09:00:00",
                        "to": "17:00:00"
                      }
                    ]
                  },
                  "exceptions": [
                    {
                      "date": "2024-10-28",
                      "hours": [
                        {
                          "from": "09:00:00",
                          "to": "17:00:00"
                        }
                      ],
                      "reason": "Public holidays"
                    }
                  ]
                }
              },
              {
                "id": "33333333-3333-3333-3333-333333333333",
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
                "image": "https://storage.sandbox.foxdeli.com/pickup-places/33333333-3333-3333-3333-333333333333/image.png",
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
              }
            ],
            "page": {
              "totalPages": 1,
              "totalElements": 2,
              "size": 20,
              "number": 0,
              "first": true,
              "last": true
            }
          }';
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

        $pickupPlace->getAllEshopPickupPlaces("22222222-2222-2222-2222-222222222222");
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

        $pickupPlace->getAllEshopPickupPlaces("22222222-2222-2222-2222-222222222222");

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

        $pickupPlace->getAllEshopPickupPlaces("22222222-2222-2222-2222-222222222222");
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

        $pickupPlace->getAllEshopPickupPlaces("22222222-2222-2222-2222-222222222222");
    }

    private function getRawError400Response(): string
    {
        return '{
            "type": "about:blank",
            "title": "Constraint violation",
            "status": 400,
            "detail": "getAllEshopPickupPlaces.eshopId: must be a valid UUID",
            "instance": "/pickup-place/api/v1/pickup-place",
            "violations": {
                "getAllEshopPickupPlaces.eshopId": "must be a valid UUID"
            }
        }';
    }

    private function getRawError401Response(): string
    {
        return '{
            "type": "about:blank",
            "title": "The Token has expired on 2024-01-02T03:04:05Z.",
            "status": 401,
            "detail": "The Token has expired on 2024-01-02T03:04:05Z.",
            "instance": "/pickup-place/api/v1/pickup-place",
        }';
    }

    private function getRawError403Response(): string
    {
        return '{
            "type": "about:blank",
            "title": "Eshop not found",
            "status": 403,
            "detail": "Eshop with id 33333333-3333-3333-3333-333333333333 doesn\'t exist in this account.",
            "instance": "/pickup-place/api/v1/pickup-place",
            "eshopId": "33333333-3333-3333-3333-333333333333"
        }';
    }

    private function getRawError415Response(): string
    {
        return '{
            "type": "about:blank",
            "title": "Unsupported Media Type",
            "status": 415,
            "detail": "Content-Type \'text/plain;charset=UTF-8\' is not supported.",
            "instance": "/pickup-place/api/v1/pickup-place",
        }';
    }
}
