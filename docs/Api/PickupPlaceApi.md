# Foxdeli\ApiPhpSdk\PickupPlaceApi

All URIs are relative to https://api.foxdeli.com/pickup-place, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createPickupPlace()**](PickupPlaceApi.md#createPickupPlace) | **POST** /api/v1/pickup-place | Create new pickup place |
| [**deletePickupPlace()**](PickupPlaceApi.md#deletePickupPlace) | **DELETE** /api/v1/pickup-place/{id} | Delete a pickup place |
| [**filterPickupPlaces()**](PickupPlaceApi.md#filterPickupPlaces) | **POST** /api/v1/pickup-place/filter | Filter pickup places |
| [**getAllEshopPickupPlaces()**](PickupPlaceApi.md#getAllEshopPickupPlaces) | **GET** /api/v1/pickup-place | Get eshop pickup places |
| [**getPickupPlace()**](PickupPlaceApi.md#getPickupPlace) | **GET** /api/v1/pickup-place/{id} | Get pickup place by id |
| [**updatePickupPlace()**](PickupPlaceApi.md#updatePickupPlace) | **PATCH** /api/v1/pickup-place/{id} | Update a pickup place |
| [**uploadPickupPlaceImage()**](PickupPlaceApi.md#uploadPickupPlaceImage) | **POST** /api/v1/pickup-place/{id}/image | Upload a pickup place image |


## `createPickupPlace()`

```php
createPickupPlace($pickup_place_create): \Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse
```

Create new pickup place

Create new pickup place

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\PickupPlaceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$pickup_place_create = new \Foxdeli\ApiPhpSdk\Model\PickupPlaceCreate(); // \Foxdeli\ApiPhpSdk\Model\PickupPlaceCreate

try {
    $result = $apiInstance->createPickupPlace($pickup_place_create);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PickupPlaceApi->createPickupPlace: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **pickup_place_create** | [**\Foxdeli\ApiPhpSdk\Model\PickupPlaceCreate**](../Model/PickupPlaceCreate.md)|  | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse**](../Model/PickupPlaceResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/problem+json`, `*/*`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deletePickupPlace()`

```php
deletePickupPlace($id)
```

Delete a pickup place

Delete a pickup place

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\PickupPlaceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | UUID of the pickup place

try {
    $apiInstance->deletePickupPlace($id);
} catch (Exception $e) {
    echo 'Exception when calling PickupPlaceApi->deletePickupPlace: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| UUID of the pickup place | |

### Return type

void (empty response body)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/problem+json`, `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `filterPickupPlaces()`

```php
filterPickupPlaces($pickup_place_filter, $page, $size, $sort): \Foxdeli\ApiPhpSdk\Model\CollectionResponsePickupPlaceResponse
```

Filter pickup places

Filter pickup places<br>All filter attribs except for eshopId and countryCode match by 'string contains' logic, case-insensitive

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\PickupPlaceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$pickup_place_filter = new \Foxdeli\ApiPhpSdk\Model\PickupPlaceFilter(); // \Foxdeli\ApiPhpSdk\Model\PickupPlaceFilter
$page = 0; // int | Zero-based page index (0..N)
$size = 20; // int | The size of the page to be returned
$sort = array('sort_example'); // string[] | Sorting criteria in the format: property,(asc|desc). Default sort order is ascending. Multiple sort criteria are supported.

try {
    $result = $apiInstance->filterPickupPlaces($pickup_place_filter, $page, $size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PickupPlaceApi->filterPickupPlaces: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **pickup_place_filter** | [**\Foxdeli\ApiPhpSdk\Model\PickupPlaceFilter**](../Model/PickupPlaceFilter.md)|  | |
| **page** | **int**| Zero-based page index (0..N) | [optional] [default to 0] |
| **size** | **int**| The size of the page to be returned | [optional] [default to 20] |
| **sort** | [**string[]**](../Model/string.md)| Sorting criteria in the format: property,(asc|desc). Default sort order is ascending. Multiple sort criteria are supported. | [optional] |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\CollectionResponsePickupPlaceResponse**](../Model/CollectionResponsePickupPlaceResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/problem+json`, `*/*`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllEshopPickupPlaces()`

```php
getAllEshopPickupPlaces($eshop_id, $page, $size, $sort): \Foxdeli\ApiPhpSdk\Model\CollectionResponsePickupPlaceResponse
```

Get eshop pickup places

Find all existing pickup places for an e-shop

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\PickupPlaceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$eshop_id = 'eshop_id_example'; // string | UUID of eshop
$page = 0; // int | Zero-based page index (0..N)
$size = 20; // int | The size of the page to be returned
$sort = array('sort_example'); // string[] | Sorting criteria in the format: property,(asc|desc). Default sort order is ascending. Multiple sort criteria are supported.

try {
    $result = $apiInstance->getAllEshopPickupPlaces($eshop_id, $page, $size, $sort);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PickupPlaceApi->getAllEshopPickupPlaces: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **eshop_id** | **string**| UUID of eshop | |
| **page** | **int**| Zero-based page index (0..N) | [optional] [default to 0] |
| **size** | **int**| The size of the page to be returned | [optional] [default to 20] |
| **sort** | [**string[]**](../Model/string.md)| Sorting criteria in the format: property,(asc|desc). Default sort order is ascending. Multiple sort criteria are supported. | [optional] |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\CollectionResponsePickupPlaceResponse**](../Model/CollectionResponsePickupPlaceResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/problem+json`, `*/*`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPickupPlace()`

```php
getPickupPlace($id): \Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse
```

Get pickup place by id

Get pickup place by id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\PickupPlaceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | UUID of the pickup place

try {
    $result = $apiInstance->getPickupPlace($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PickupPlaceApi->getPickupPlace: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| UUID of the pickup place | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse**](../Model/PickupPlaceResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/problem+json`, `*/*`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updatePickupPlace()`

```php
updatePickupPlace($id, $pickup_place_update): \Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse
```

Update a pickup place

Update a pickup place

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\PickupPlaceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | UUID of the pickup place
$pickup_place_update = new \Foxdeli\ApiPhpSdk\Model\PickupPlaceUpdate(); // \Foxdeli\ApiPhpSdk\Model\PickupPlaceUpdate

try {
    $result = $apiInstance->updatePickupPlace($id, $pickup_place_update);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PickupPlaceApi->updatePickupPlace: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| UUID of the pickup place | |
| **pickup_place_update** | [**\Foxdeli\ApiPhpSdk\Model\PickupPlaceUpdate**](../Model/PickupPlaceUpdate.md)|  | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse**](../Model/PickupPlaceResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/problem+json`, `*/*`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadPickupPlaceImage()`

```php
uploadPickupPlaceImage($id, $file): \Foxdeli\ApiPhpSdk\Model\FileInfo
```

Upload a pickup place image

Upload a pickup place image

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\PickupPlaceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | UUID of the pickup place
$file = '/path/to/file.txt'; // \SplFileObject

try {
    $result = $apiInstance->uploadPickupPlaceImage($id, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PickupPlaceApi->uploadPickupPlaceImage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| UUID of the pickup place | |
| **file** | **\SplFileObject****\SplFileObject**|  | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\FileInfo**](../Model/FileInfo.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/problem+json`, `*/*`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
