Example of full usage of API SDK

```php
<?php

use Foxdeli\ApiPhpSdk\ApiException;
use Foxdeli\ApiPhpSdk\Model\AdditionalCost;
use Foxdeli\ApiPhpSdk\Model\AdditionalCostRequest;
use Foxdeli\ApiPhpSdk\Model\AdditionalCostType;
use Foxdeli\ApiPhpSdk\Model\AddressRequest;
use Foxdeli\ApiPhpSdk\Model\BillingDetailsRequest;
use Foxdeli\ApiPhpSdk\Model\Carrier;
use Foxdeli\ApiPhpSdk\Model\CountryCode;
use Foxdeli\ApiPhpSdk\Model\CustomerRequest;
use Foxdeli\ApiPhpSdk\Model\DeliveryDetailsRequest;
use Foxdeli\ApiPhpSdk\Model\DeliveryStateRequest;
use Foxdeli\ApiPhpSdk\Model\DestinationRequest;
use Foxdeli\ApiPhpSdk\Model\DestinationType;
use Foxdeli\ApiPhpSdk\Model\DimensionsRequest;
use Foxdeli\ApiPhpSdk\Model\ExceptionallyOpeningHoursRequest;
use Foxdeli\ApiPhpSdk\Model\File;
use Foxdeli\ApiPhpSdk\Model\Gps;
use Foxdeli\ApiPhpSdk\Model\LanguageCode;
use Foxdeli\ApiPhpSdk\Model\LocationRequest;
use Foxdeli\ApiPhpSdk\Model\Money;
use Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest;
use Foxdeli\ApiPhpSdk\Model\OpeningHoursRequest;
use Foxdeli\ApiPhpSdk\Model\OrderRegistration;
use Foxdeli\ApiPhpSdk\Model\OrderUpdate;
use Foxdeli\ApiPhpSdk\Model\ParcelRegistration;
use Foxdeli\ApiPhpSdk\Model\ParcelStateUpdate;
use Foxdeli\ApiPhpSdk\Model\ParcelTrackingConfigRequest;
use Foxdeli\ApiPhpSdk\Model\ParcelUpdate;
use Foxdeli\ApiPhpSdk\Model\PaymentMethod;
use Foxdeli\ApiPhpSdk\Model\PaymentService;
use Foxdeli\ApiPhpSdk\Model\PaymentUpdateRequest;
use Foxdeli\ApiPhpSdk\Model\PickupPlaceCreate;
use Foxdeli\ApiPhpSdk\Model\PickupPlaceUpdate;
use Foxdeli\ApiPhpSdk\Model\ProductRequest;
use Foxdeli\ApiPhpSdk\Model\ProductType;
use Foxdeli\ApiPhpSdk\Model\RegularOpeningHoursRequest;

define('ESHOP_ID', "eshop ID");
define('MARKET_ID', "market ID");
define('ORDER_EXTERNAL_ID', "ORD12345678");
$username = "uZuyHiyLOl";
$password = "zkCNlBPM2RsaAYck2UZO9gM0HsLpIkg1";

$data = require(__DIR__.'/../api-php-sdk/vendor/autoload.php');

$foxdeli = Foxdeli\ApiPhpSdk\Foxdeli::init($username, $password);

$foxdeli->authorize();
echo ("Customer access token: " . $foxdeli->getCustomer()->getToken()->getToken() . PHP_EOL);

$res = $foxdeli->refreshToken();
echo ("Customer refreshed access token: " . $foxdeli->getCustomer()->getToken()->getToken() . PHP_EOL);

$order = new OrderRegistration();
$order->setEshopId(ESHOP_ID)
    ->setMarketId(MARKET_ID)
    ->setPlatform("shopify")
    ->setExternalCreated(new DateTime())
    ->setOrderNumber("A123456788")
    ->setExternalIdentifier(ORDER_EXTERNAL_ID)
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
    ->setPayment((new PaymentUpdateRequest)
        ->setPaid(false)
        ->setMethod(PaymentMethod::CASH_ON_DELIVERY)
        ->setService(PaymentService::PAYPAL)
        ->setLink("https://pay.me")
    )
    ->setCustomer((new CustomerRequest)
        ->setName("John Doe")
        ->setEmail("johndoe@mail.com")
        ->setPhone("+420 123 456 789")
    )
    ->setDestination((new DestinationRequest)
        ->setType(DestinationType::HOUSE_ADDRESS)
        ->setAddress((new AddressRequest)
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
        (new ProductRequest)
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
    ->setBillingDetails((new BillingDetailsRequest)
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
    )
;

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

$parcelUpdate = new ParcelUpdate();
$parcelUpdate
    ->setPin('abcdef')
    ->setDimensions((new DimensionsRequest())->setHeight(101)->setLength(51)->setWidth(26)->setWeight(3.23))
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
        ->setNumber("CZECH_POST1234")
        ->setReferenceId("REFCZECH_POST1234")
    ])
    ->setExternalCreated(new DateTime())
;

$pickupPlaceCreate = new PickupPlaceCreate();
    $pickupPlaceCreate
        ->setEshopId(ESHOP_ID)
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

    $pickupPlaceUpdate = new PickupPlaceUpdate();
    $pickupPlaceUpdate
        ->setOriginPickupPlaceId('PARCEL_BOX_1_E')
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

try {
    $order = $foxdeli->createOrder($order);
    echo ("Created: " . $order->getId() . PHP_EOL);

    $order = $foxdeli->findOrderByExternalId(ORDER_EXTERNAL_ID, ESHOP_ID);
    echo ("Found by external ID: " . $order->getId() . PHP_EOL);

    $order = $foxdeli->findOrderById($order->getId());
    echo ("Found by ID: " . $order->getId() . " with order number: " . $order->getOrderNumber() . PHP_EOL);

    $orderToUpdate = new OrderUpdate();
    $orderToUpdate->setOrderNumber("abcdefg54321");
    $updatedOrder = $foxdeli->updateOrder($order->getId(), $orderToUpdate);
    echo ("Updated order: " . $updatedOrder->getId() . ' with new order number: ' . $updatedOrder->getOrderNumber() . PHP_EOL);

    $uploadedInvoideOrder = $foxdeli->uploadFile($order->getId(), __DIR__ . '/foxdeli-intro.en-03-04-2023.pdf');
    echo ('Order uploaded file path: ' . $uploadedInvoideOrder->getPath() . PHP_EOL);

    $uploadedInvoideOrder = $foxdeli->uploadOrderInvoice($order->getId(), __DIR__ . '/foxdeli-intro.en-03-04-2023.pdf');
    echo ('Order uploaded invoice path: ' . $uploadedInvoideOrder->getPath() . PHP_EOL);

    $uploadedProformaInvoideOrder = $foxdeli->uploadOrderProformaInvoice($order->getId(), __DIR__ . '/foxdeli-intro.en-03-04-2023.pdf');
    echo ('Order uploaded proforma invoice path: ' . $uploadedInvoideOrder->getPath() . PHP_EOL);

    $parcel = $foxdeli->createParcel($order->getId(), $parcelRegistration);
    echo ('Created Parcel ID: ' . $parcel->getId() . PHP_EOL);

    $parcel = $foxdeli->findParcelById($order->getId(), $parcel->getId());
    echo ('Found parcel ID: ' . $parcel->getId() . ' with pin: ' . $parcel->getPin() . ' and state: ' . $parcel->getTrackingState() . PHP_EOL);

    $updatedParcel = $foxdeli->updateParcel($order->getId(), $parcel->getId(), $parcelUpdate);
    echo ('Updated parcel with new pin: ' . $parcel->getPin() . PHP_EOL);

    $parcelUpdate = new ParcelStateUpdate();
    $parcelUpdate
        ->setState(DeliveryStateRequest::ESHOP_PROCESSING)
        ->setNote("Parcel state note")
        ->setOccurred(new DateTime())
    ;
    $state = $foxdeli->updateParcelState($order->getId(), $parcel->getId(), $parcelUpdate);
    echo ('Updated parcel with new state: ' . $state->getState() . PHP_EOL);

    $pickupPlace = $foxdeli->createPickupPlace($pickupPlaceCreate);
    echo ('Created parcel with ID: ' . $pickupPlace->getId() . PHP_EOL);
    $pickupPlace = $foxdeli->getPickupPlace($pickupPlace->getId());
    echo ('Found parcel with ID: ' . $pickupPlace->getId() . PHP_EOL);
    $pickupPlaces = $foxdeli->getAllEshopPickupPlaces(ESHOP_ID, 0, 20, ["countryCode,asc"]);
    $pickupPlacesIds = [];
    foreach($pickupPlaces AS $pickupPlaceOne){
        $pickupPlacesIds[] = $pickupPlaceOne->getId();
    }
    echo ('Found ALL echop parcels IDs: ' . implode(',', $pickupPlacesIds) . PHP_EOL);

    $pickupPlaceUpdated = $foxdeli->updatePickupPlace($pickupPlace->getId(), $pickupPlaceUpdate);
    echo ('Pickup place with new original pickup place ID: ' . $pickupPlace->getOriginPickupPlaceId() . PHP_EOL);

    $pickupPlaceImage = $foxdeli->uploadPickupPlaceImage($pickupPlace->getId(), __DIR__ . '/../api-php-sdk/tests/hero-motive.png');
    echo ('Pickup place uploaded image path: ' . $pickupPlaceImage->getPath() . PHP_EOL);

    $isDeleted = $foxdeli->deletePickupPlace($pickupPlace->getId());
    echo ('Is Pickup place deleted: ' . (string) $isDeleted . PHP_EOL);
    $deletedPickupPlace = $foxdeli->getPickupPlace($pickupPlace->getId());
    echo ('Deleted Pickup place ID: ' . $deletedPickupPlace . PHP_EOL);

    echo ('Order state BEFORE cancel: ' . $order->getOrderState() . PHP_EOL);
    $canceledOrder = $foxdeli->cancelOrder($order->getId());
    echo ('Order state AFTER cancel: ' . $canceledOrder->getOrderState() . PHP_EOL);

} catch (ApiException $exception) {
    print_r($exception->getResponseBody());
}
