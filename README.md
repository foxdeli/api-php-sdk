# Foxdeli PHP API Client

![workflow](https://github.com/foxdeli/api-php-sdk/actions/workflows/pull_request.yml/badge.svg)

The [Foxdeli](https://www.foxdeli.com/) client is a PHP client for the Foxdeli API, allowing you to interact with the API to manage parcels and orders.

## API Documentation

The documentation for the Foxdeli API can be found [here](https://api.foxdeli.com/).

## Installation & Usage

### Requirements

PHP 7.1+ (tested until 8.3)

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/foxdeli/api-php-sdk-dev.git"
    }
  ],
  "require": {
    "foxdeli/api-php-sdk": "master"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/api-php-sdk/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Init Foxdeli class using your username & password
$foxdeli = \Foxdeli\ApiPhpSdk\Foxdeli::init("username", "password");

$order_id = 'order_id_example'; // string | id of order

try {
    $result = $foxdeli->findOrderById($order_id);
    print_r($result);
} catch (\Foxdeli\ApiPhpSdk\ApiException $e) {
    echo 'Exception when calling Foxdeli->findOrderById: ', $e->getMessage(), PHP_EOL;
    echo 'With more detail in '. $e->getResponseBody(), PHP_EOL;
}
```

More code examples can be found in specific endpoind calls.

## Endpoints

Endpoints are split into four different domains:

- [[Authentication]](docs/Authentication.md)
- [[Order]](docs/Order.md)
- [[Parcel]](docs/Parcel.md)
- [[Pickup place]](docs/PickupPlace.md)

## Models

List of all models used in API

- [AdditionalCost](docs/Model/AdditionalCost.md)
- [AdditionalCostRequest](docs/Model/AdditionalCostRequest.md)
- [AdditionalCostType](docs/Model/AdditionalCostType.md)
- [Address](docs/Model/Address.md)
- [AddressRequest](docs/Model/AddressRequest.md)
- [BillingDetails](docs/Model/BillingDetails.md)
- [BillingDetailsRequest](docs/Model/BillingDetailsRequest.md)
- [BusinessHours](docs/Model/BusinessHours.md)
- [BusinessHoursException](docs/Model/BusinessHoursException.md)
- [Carrier](docs/Model/Carrier.md)
- [CollectionPage](docs/Model/CollectionPage.md)
- [CollectionResponseCountryCode](docs/Model/CollectionResponseCountryCode.md)
- [CollectionResponsePickupPlaceResponse](docs/Model/CollectionResponsePickupPlaceResponse.md)
- [CountryCode](docs/Model/CountryCode.md)
- [Customer](docs/Model/Customer.md)
- [CustomerRequest](docs/Model/CustomerRequest.md)
- [DeliveryDetails](docs/Model/DeliveryDetails.md)
- [DeliveryDetailsDelay](docs/Model/DeliveryDetailsDelay.md)
- [DeliveryDetailsDelayRequest](docs/Model/DeliveryDetailsDelayRequest.md)
- [DeliveryDetailsRequest](docs/Model/DeliveryDetailsRequest.md)
- [DeliveryState](docs/Model/DeliveryState.md)
- [DeliveryStateRequest](docs/Model/DeliveryStateRequest.md)
- [Destination](docs/Model/Destination.md)
- [DestinationRequest](docs/Model/DestinationRequest.md)
- [DestinationType](docs/Model/DestinationType.md)
- [Dimensions](docs/Model/Dimensions.md)
- [DimensionsRequest](docs/Model/DimensionsRequest.md)
- [EmailEventType](docs/Model/EmailEventType.md)
- [ExceptionallyOpeningHoursRequest](docs/Model/ExceptionallyOpeningHoursRequest.md)
- [ExceptionallyOpeningHoursResponse](docs/Model/ExceptionallyOpeningHoursResponse.md)
- [ExternalLinkIcon](docs/Model/ExternalLinkIcon.md)
- [ExternalLinkRequest](docs/Model/ExternalLinkRequest.md)
- [ExternalLinkResponse](docs/Model/ExternalLinkResponse.md)
- [FileInfo](docs/Model/FileInfo.md)
- [Gps](docs/Model/Gps.md)
- [ImportantState](docs/Model/ImportantState.md)
- [JsonNullableString](docs/Model/JsonNullableString.md)
- [LanguageCode](docs/Model/LanguageCode.md)
- [Link](docs/Model/Link.md)
- [LocationRequest](docs/Model/LocationRequest.md)
- [LocationResponse](docs/Model/LocationResponse.md)
- [OpeningHoursIntervalRequest](docs/Model/OpeningHoursIntervalRequest.md)
- [OpeningHoursIntervalResponse](docs/Model/OpeningHoursIntervalResponse.md)
- [OpeningHoursRequest](docs/Model/OpeningHoursRequest.md)
- [OpeningHoursResponse](docs/Model/OpeningHoursResponse.md)
- [Money](docs/Model/Money.md)
- [Order](docs/Model/Order.md)
- [OrderLinks](docs/Model/OrderLinks.md)
- [OrderRegistration](docs/Model/OrderRegistration.md)
- [OrderState](docs/Model/OrderState.md)
- [OrderUpdate](docs/Model/OrderUpdate.md)
- [OriginType](docs/Model/OriginType.md)
- [Parcel](docs/Model/Parcel.md)
- [ParcelRegistration](docs/Model/ParcelRegistration.md)
- [ParcelShopData](docs/Model/ParcelShopData.md)
- [ParcelShopRequest](docs/Model/ParcelShopRequest.md)
- [ParcelState](docs/Model/ParcelState.md)
- [ParcelStateUpdate](docs/Model/ParcelStateUpdate.md)
- [ParcelTag](docs/Model/ParcelTag.md)
- [ParcelTimeline](docs/Model/ParcelTimeline.md)
- [ParcelTracking](docs/Model/ParcelTracking.md)
- [ParcelTrackingConfigRequest](docs/Model/ParcelTrackingConfigRequest.md)
- [ParcelUpdate](docs/Model/ParcelUpdate.md)
- [PaymentMethod](docs/Model/PaymentMethod.md)
- [PaymentRequest](docs/Model/PaymentRequest.md)
- [PaymentResponse](docs/Model/PaymentResponse.md)
- [PaymentService](docs/Model/PaymentService.md)
- [PickupPlaceCreate](docs/Model/PickupPlaceCreate.md)
- [PickupPlaceDeprecatedResponse](docs/Model/PickupPlaceDeprecatedResponse.md)
- [PickupPlaceFilter](docs/Model/PickupPlaceFilter.md)
- [PickupPlaceResponse](docs/Model/PickupPlaceResponse.md)
- [PickupPlaceUpdate](docs/Model/PickupPlaceUpdate.md)
- [ProblemDetail](docs/Model/ProblemDetail.md)
- [Product](docs/Model/Product.md)
- [ProductRequest](docs/Model/ProductRequest.md)
- [ProductType](docs/Model/ProductType.md)
- [RegularOpeningHoursRequest](docs/Model/RegularOpeningHoursRequest.md)
- [RegularOpeningHoursResponse](docs/Model/RegularOpeningHoursResponse.md)
- [Snooze](docs/Model/Snooze.md)
- [TimeWindow](docs/Model/TimeWindow.md)
- [TimelineAdditionalParams](docs/Model/TimelineAdditionalParams.md)
- [TimelineIssueTracking](docs/Model/TimelineIssueTracking.md)
- [TimelineParcelState](docs/Model/TimelineParcelState.md)
- [TimelineParcelTrace](docs/Model/TimelineParcelTrace.md)
- [TimelineShippingEmail](docs/Model/TimelineShippingEmail.md)
- [TimelineType](docs/Model/TimelineType.md)
- [TrackingState](docs/Model/TrackingState.md)
- [UrgentState](docs/Model/UrgentState.md)
- [WorkflowState](docs/Model/WorkflowState.md)


## Tests

Project can be tested via unit tests and PHPStan analysis

To run the tests, use:

```bash
composer install
composer tests
composer phpstan
```

## Example

One long example can be found [HERE](docs/example.md)
