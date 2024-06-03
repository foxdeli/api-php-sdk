<?php

declare(strict_types=1);

namespace Tests\Tracking;

use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\Customer;
use Foxdeli\ApiPhpSdk\Tracking;
use Foxdeli\ApiPhpSdk\Model\Order;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class CancelOrderTest extends TestCase
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
        /** @var Order */
        $order = $tracking->cancelOrder('22222222-2222-2222-2222-222222222222');

        $this->assertInstanceOf(Order::class, $order);
        $this->assertSame('22222222-2222-2222-2222-222222222222', $order->getId());
        $this->assertSame('CANCELLED', $order->getOrderState());
        if($externalCreated = $order->getExternalCreated()){
            $this->assertSame("2024-04-30T09:36:52+00:00", $externalCreated->format('c'));
        } else {
            $this->fail("External date not passed");
        }
    }

    private function getRawResponse() : string {
        return '{
            "id": "22222222-2222-2222-2222-222222222222",
            "platform": "shopify",
            "orderNumber": "A123456789",
            "orderState": "CANCELLED",
            "marketId": "11111111-1111-1111-1111-111111111111",
            "eshopId": "00000000-0000-0000-0000-000000000000",
            "externalCreated": "2024-04-30T09:36:52Z",
            "externalIdentifier": "ORD123456789",
            "destination": {
                "type": "HOUSE_ADDRESS",
                "address": {
                    "line1": "Sesame street",
                    "city": "MyCoolCity",
                    "postalCode": "48228",
                    "countryCode": "US",
                    "state": "Michigan",
                    "region": "Michigan",
                    "longitude": 50.0933864,
                    "latitude": 14.4542789
                },
                "parcelShop": null
            },
            "price": {
                "amount": 38.70,
                "currency": "EUR"
            },
            "additionalCosts": [
                {
                    "type": "CASH_ON_DELIVERY",
                    "price": {
                        "amount": 2.00,
                        "currency": "EUR"
                    },
                    "name": "ac name"
                }
            ],
            "cashOnDelivery": {
                "amount": 2.00,
                "currency": "EUR"
            },
            "payment": {
                "paid": false,
                "method": "CASH_ON_DELIVERY",
                "service": "PAYPAL",
                "link": "https://pay.me"
            },
            "customer": {
                "name": "John Doe",
                "email": "johndoe@mail.com",
                "phone": "+420 123 456 789"
            },
            "parcels": [],
            "products": [
                {
                    "type": "PRODUCT",
                    "sku": "123",
                    "name": "Test product",
                    "description": "Test product\'s description",
                    "url": "https://www.foxdeli.com/",
                    "image": "https://www.foxdeli.com/img/pages/landing-pages/tabs/delivery-1.png",
                    "price": {
                        "amount": 12.00,
                        "currency": "EUR"
                    },
                    "vat": null,
                    "quantity": 1,
                    "referencedSku": null
                },
                {
                    "type": "PRODUCT",
                    "sku": "1231",
                    "name": "First child test product",
                    "description": "First child test product of Test product\'s",
                    "url": "https://www.foxdeli.com/demo",
                    "image": "https://www.foxdeli.com/img/pages/landing-pages/tabs/delivery-2.png",
                    "price": {
                        "amount": 12.30,
                        "currency": "EUR"
                    },
                    "vat": null,
                    "quantity": 1,
                    "referencedSku": "123"
                },
                {
                    "type": "PRODUCT",
                    "sku": "1232",
                    "name": "Second child test product",
                    "description": "Second child test product of Test product\'s",
                    "url": "https://api.foxdeli.com/docs/api/tracking/create-order/",
                    "image": "https://www.foxdeli.com/img/pages/landing-pages/tabs/delivery-4.png",
                    "price": {
                        "amount": 12.40,
                        "currency": "EUR"
                    },
                    "vat": null,
                    "quantity": 1,
                    "referencedSku": "123"
                }
            ],
            "cancelled": null,
            "inUrgentState": false,
            "inImportantState": false,
            "malfunction": false,
            "snooze": null,
            "created": "2024-05-02T13:46:47.862Z",
            "updated": "2024-05-02T13:46:47.862Z",
            "testData": false,
            "invoiceFileUrl": null,
            "proformaInvoiceFileUrl": null,
            "links": {
                "trackAndTrace": {
                    "href": "https://tt.sandbox.foxdeli.com/order/22222222-2222-2222-2222-222222222222"
                }
            },
            "billingDetails": {
                "name": "John Doe",
                "companyName": "Doe Ltd",
                "billingAddress": {
                    "line1": "Sesame street",
                    "line2": "11b",
                    "city": "MyCoolCity",
                    "postalCode": "48228",
                    "countryCode": "US",
                    "state": "Michigan",
                    "region": "Michigan",
                    "longitude": 50.0933864,
                    "latitude": 14.4542789
                },
                "crn": "12345678",
                "vatId": "CZ12345678",
                "email": "johndoe@mail.com",
                "phone": "+420 123 456 789"
            },
            "language": "cs"
        }';
    }
}
