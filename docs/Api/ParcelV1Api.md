# Foxdeli\ApiPhpSdk\ParcelV1Api

All URIs are relative to https://api.foxdeli.com/tracking, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createParcel()**](ParcelV1Api.md#createParcel) | **POST** /api/v1/order/{orderId}/parcel | Create parcel |
| [**deleteParcel()**](ParcelV1Api.md#deleteParcel) | **DELETE** /api/v1/order/{orderId}/parcel/{parcelId} | Delete existing parcel |
| [**findParcelById()**](ParcelV1Api.md#findParcelById) | **GET** /api/v1/order/{orderId}/parcel/{parcelId} | Get existing parcel |
| [**updateParcel()**](ParcelV1Api.md#updateParcel) | **PATCH** /api/v1/order/{orderId}/parcel/{parcelId} | Update existing parcel |
| [**updateParcelState()**](ParcelV1Api.md#updateParcelState) | **PUT** /api/v1/order/{orderId}/parcel/{parcelId}/state | Update state of existing parcel |


## `createParcel()`

```php
createParcel($order_id, $parcel_registration): \Foxdeli\ApiPhpSdk\Model\Parcel
```

Create parcel

Creates new parcel for order

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\ParcelV1Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$order_id = 'order_id_example'; // string | id of order this parcel belongs to
$parcel_registration = new \Foxdeli\ApiPhpSdk\Model\ParcelRegistration(); // \Foxdeli\ApiPhpSdk\Model\ParcelRegistration | Parcel data to create.

try {
    $result = $apiInstance->createParcel($order_id, $parcel_registration);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ParcelV1Api->createParcel: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **order_id** | **string**| id of order this parcel belongs to | |
| **parcel_registration** | [**\Foxdeli\ApiPhpSdk\Model\ParcelRegistration**](../Model/ParcelRegistration.md)| Parcel data to create. | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Parcel**](../Model/Parcel.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/problem+json`, `*/*`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteParcel()`

```php
deleteParcel($order_id, $parcel_id)
```

Delete existing parcel

Delete existing parcel.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\ParcelV1Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$order_id = 'order_id_example'; // string | id of order this parcel belongs to
$parcel_id = 'parcel_id_example'; // string | id of parcel to delete.

try {
    $apiInstance->deleteParcel($order_id, $parcel_id);
} catch (Exception $e) {
    echo 'Exception when calling ParcelV1Api->deleteParcel: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **order_id** | **string**| id of order this parcel belongs to | |
| **parcel_id** | **string**| id of parcel to delete. | |

### Return type

void (empty response body)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`, `application/problem+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `findParcelById()`

```php
findParcelById($order_id, $parcel_id): \Foxdeli\ApiPhpSdk\Model\Parcel
```

Get existing parcel

Finds existing parcel from order.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\ParcelV1Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$order_id = 'order_id_example'; // string | id of order this parcel belongs to
$parcel_id = 'parcel_id_example'; // string | id of parcel to find.

try {
    $result = $apiInstance->findParcelById($order_id, $parcel_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ParcelV1Api->findParcelById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **order_id** | **string**| id of order this parcel belongs to | |
| **parcel_id** | **string**| id of parcel to find. | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Parcel**](../Model/Parcel.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`, `application/problem+json`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateParcel()`

```php
updateParcel($order_id, $parcel_id, $parcel_update): \Foxdeli\ApiPhpSdk\Model\Parcel
```

Update existing parcel

Updates existing parcel.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\ParcelV1Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$order_id = 'order_id_example'; // string | id of order this parcel belongs to
$parcel_id = 'parcel_id_example'; // string | id of parcel to update.
$parcel_update = new \Foxdeli\ApiPhpSdk\Model\ParcelUpdate(); // \Foxdeli\ApiPhpSdk\Model\ParcelUpdate | Parcel data to update.

try {
    $result = $apiInstance->updateParcel($order_id, $parcel_id, $parcel_update);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ParcelV1Api->updateParcel: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **order_id** | **string**| id of order this parcel belongs to | |
| **parcel_id** | **string**| id of parcel to update. | |
| **parcel_update** | [**\Foxdeli\ApiPhpSdk\Model\ParcelUpdate**](../Model/ParcelUpdate.md)| Parcel data to update. | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Parcel**](../Model/Parcel.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/problem+json`, `*/*`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateParcelState()`

```php
updateParcelState($order_id, $parcel_id, $parcel_state_update): \Foxdeli\ApiPhpSdk\Model\Parcel
```

Update state of existing parcel

Updates state of existing parcel

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\ParcelV1Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$order_id = 'order_id_example'; // string | id of order this parcel belongs to
$parcel_id = 'parcel_id_example'; // string | id of parcel to update.
$parcel_state_update = new \Foxdeli\ApiPhpSdk\Model\ParcelStateUpdate(); // \Foxdeli\ApiPhpSdk\Model\ParcelStateUpdate | Parcel data to update.

try {
    $result = $apiInstance->updateParcelState($order_id, $parcel_id, $parcel_state_update);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ParcelV1Api->updateParcelState: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **order_id** | **string**| id of order this parcel belongs to | |
| **parcel_id** | **string**| id of parcel to update. | |
| **parcel_state_update** | [**\Foxdeli\ApiPhpSdk\Model\ParcelStateUpdate**](../Model/ParcelStateUpdate.md)| Parcel data to update. | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Parcel**](../Model/Parcel.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/problem+json`, `*/*`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
