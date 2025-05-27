# Foxdeli\ApiPhpSdk\PickupPlacePublicControllerApi

All URIs are relative to https://api.foxdeli.com/pickup-place, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getPickupPlace1()**](PickupPlacePublicControllerApi.md#getPickupPlace1) | **GET** /api/public/v1/pickupPlace | Get pickup place by Country code, Carrier identifier and Carrier Pickup place ID |
| [**getPickupPlace2()**](PickupPlacePublicControllerApi.md#getPickupPlace2) | **GET** /api/public/v1/pickupPlace/{id} | Get pickup place by Foxdeli internal ID |
| [**getPickupPlaceDeprecated()**](PickupPlacePublicControllerApi.md#getPickupPlaceDeprecated) | **GET** /api/public/v1/pickupPlace/{country}/{carrier}/{carrierPlaceId} | Get pickup place by Country code, Carrier identifier and Carrier Pickup place ID |


## `getPickupPlace1()`

```php
getPickupPlace1($country, $carrier, $carrier_place_id): \Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse
```

Get pickup place by Country code, Carrier identifier and Carrier Pickup place ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\PickupPlacePublicControllerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$country = 'country_example'; // string
$carrier = 'carrier_example'; // string
$carrier_place_id = 'carrier_place_id_example'; // string

try {
    $result = $apiInstance->getPickupPlace1($country, $carrier, $carrier_place_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PickupPlacePublicControllerApi->getPickupPlace1: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country** | **string**|  | |
| **carrier** | **string**|  | |
| **carrier_place_id** | **string**|  | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse**](../Model/PickupPlaceResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`, `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPickupPlace2()`

```php
getPickupPlace2($id): \Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse
```

Get pickup place by Foxdeli internal ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\PickupPlacePublicControllerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string

try {
    $result = $apiInstance->getPickupPlace2($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PickupPlacePublicControllerApi->getPickupPlace2: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**|  | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse**](../Model/PickupPlaceResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`, `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPickupPlaceDeprecated()`

```php
getPickupPlaceDeprecated($country, $carrier, $carrier_place_id): \Foxdeli\ApiPhpSdk\Model\PickupPlaceDeprecatedResponse
```

Get pickup place by Country code, Carrier identifier and Carrier Pickup place ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\PickupPlacePublicControllerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$country = 'country_example'; // string
$carrier = 'carrier_example'; // string
$carrier_place_id = 'carrier_place_id_example'; // string

try {
    $result = $apiInstance->getPickupPlaceDeprecated($country, $carrier, $carrier_place_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PickupPlacePublicControllerApi->getPickupPlaceDeprecated: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **country** | **string**|  | |
| **carrier** | **string**|  | |
| **carrier_place_id** | **string**|  | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\PickupPlaceDeprecatedResponse**](../Model/PickupPlaceDeprecatedResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`, `application/json`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
