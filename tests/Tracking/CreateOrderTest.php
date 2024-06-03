<?php

declare(strict_types=1);

namespace Tests\Tracking;

use DateTime;
use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\Customer;
use Foxdeli\ApiPhpSdk\Tracking;
use Foxdeli\ApiPhpSdk\Model\AdditionalCostRequest;
use Foxdeli\ApiPhpSdk\Model\AdditionalCostType;
use Foxdeli\ApiPhpSdk\Model\AddressRequest;
use Foxdeli\ApiPhpSdk\Model\BillingDetailsRequest;
use Foxdeli\ApiPhpSdk\Model\CountryCode;
use Foxdeli\ApiPhpSdk\Model\CustomerRequest;
use Foxdeli\ApiPhpSdk\Model\DestinationRequest;
use Foxdeli\ApiPhpSdk\Model\DestinationType;
use Foxdeli\ApiPhpSdk\Model\LanguageCode;
use Foxdeli\ApiPhpSdk\Model\Money;
use Foxdeli\ApiPhpSdk\Model\Order;
use Foxdeli\ApiPhpSdk\Model\OrderRegistration;
use Foxdeli\ApiPhpSdk\Model\PaymentMethod;
use Foxdeli\ApiPhpSdk\Model\PaymentRequest;
use Foxdeli\ApiPhpSdk\Model\PaymentService;
use Foxdeli\ApiPhpSdk\Model\ProductRequest;
use Foxdeli\ApiPhpSdk\Model\ProductType;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class CreateOrderTest extends TestCase
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
        /** @var Order */
        $order = $tracking->createOrder($this->getOrderRegistration());

        $this->assertInstanceOf(Order::class, $order);
        $this->assertSame('22222222-2222-2222-2222-222222222222', $order->getId());
        $this->assertSame('CREATED', $order->getOrderState());
        if($externalCreated = $order->getExternalCreated()){
            $this->assertSame("2024-04-30T09:36:52+00:00", $externalCreated->format('c'));
        } else {
            $this->fail("External date not passed");
        }
    }

    private function getOrderRegistration() : OrderRegistration {
        $order = new OrderRegistration();
        $order->setEshopId("00000000-0000-0000-0000-000000000000")
            ->setMarketId("11111111-1111-1111-1111-111111111111")
            ->setPlatform("shopify")
            ->setExternalCreated(new DateTime())
            ->setOrderNumber("A123456788")
            ->setExternalIdentifier("ORD123456778a")
            ->setPrice((new Money)->setAmount(38.7)->setCurrency("EUR"))
            ->setCashOnDelivery((new Money)->setAmount(2)->setCurrency("EUR"))
            ->setLanguage(LanguageCode::CS)
            ->setAdditionalCosts([
                (new AdditionalCostRequest())
                    ->setName("name")
                    ->setType(AdditionalCostType::CASH_ON_DELIVERY)
                    ->setPrice(
                        (new Money())
                        ->setAmount(2)
                        ->setCurrency("EUR")
                    )
                ])
            ->setPayment((new PaymentRequest())
                ->setPaid(false)
                ->setMethod(PaymentMethod::CASH_ON_DELIVERY)
                ->setService(PaymentService::PAYPAL)
                ->setLink("https://pay.me")
            )
            ->setCustomer((new CustomerRequest())
                ->setName("John Doe")
                ->setEmail("johndoe@mail.com")
                ->setPhone("+420 123 456 789")
            )
            ->setDestination((new DestinationRequest())
                ->setType(DestinationType::HOUSE_ADDRESS)
                ->setAddress((new AddressRequest())
                    ->setLine1("Sesame street")
                    ->setLine2("11b")
                    ->setCity("MyCoolCity")
                    ->setPostalCode("48228")
                    ->setCountryCode("US")
                    ->setState("Michigan")
                    ->setRegion("Michigan")
                    ->setLongitude(50.0933864)
                    ->setLatitude(14.4542789)
                )
            )
            ->setProducts([
                (new ProductRequest())
                    ->setName("Test product")
                    ->setDescription("Test product's description")
                    ->setUrl("url")
                    ->setType(ProductType::PRODUCT)
                    ->setSku("123")
                    ->setUrl("https://www.foxdeli.com/")
                    ->setImage("https://www.foxdeli.com/img/pages/landing-pages/tabs/delivery-1.png")
                    ->setPrice((new Money)->setAmount(12)->setCurrency("EUR"))
                    ->setVat(1.2)
                    ->setQuantity(1),
                (new ProductRequest)
                    ->setName("First child test product")
                    ->setDescription("First child test product of Test product's")
                    ->setUrl("url")
                    ->setType(ProductType::PRODUCT)
                    ->setSku("1231")
                    ->setUrl("https://www.foxdeli.com/demo")
                    ->setImage("https://www.foxdeli.com/img/pages/landing-pages/tabs/delivery-2.png")
                    ->setPrice((new Money)->setAmount(12.3)->setCurrency("EUR"))
                    ->setVat(1.23)
                    ->setQuantity(1)
                    ->setReferencedSku("123")
            ])
            ->setBillingDetails((new BillingDetailsRequest())
                ->setName("John Doe")
                ->setCompanyName("Doe Ltd")
                ->setCrn("12345678")
                ->setVatId("CZ12345678")
                ->setEmail("johndoe@mail.com")
                ->setPhone("+420 123 456 789")
                ->setBillingAddress((new AddressRequest())
                    ->setLine1("Sesame street")
                    ->setLine2("11b")
                    ->setCity("MyCoolCity")
                    ->setPostalCode("48228")
                    ->setCountryCode(CountryCode::US)
                    ->setState("Michigan")
                    ->setRegion("Michigan")
                    ->setLongitude(50.0933864)
                    ->setLatitude(14.4542789)
                )
            );
        return $order;
    }

    private function getRawResponse() : string {
        return '{
            "id": "22222222-2222-2222-2222-222222222222",
            "platform": "shopify",
            "orderNumber": "A123456789",
            "orderState": "CREATED",
            "marketId": "11111111-1111-1111-1111-111111111111",
            "eshopId": "00000000-0000-0000-0000-000000000000",
            "externalCreated": "2024-04-30T09:36:52Z",
            "externalIdentifier": "ORD123456100",
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
