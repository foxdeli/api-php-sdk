# Foxdeli\ApiPhpSdk\OrderV1Api

All URIs are relative to https://api.foxdeli.com/tracking, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**cancelOrder()**](OrderV1Api.md#cancelOrder) | **PUT** /api/v1/order/{orderId}/cancel | Cancel existing order |
| [**createOrder()**](OrderV1Api.md#createOrder) | **POST** /api/v1/order | Create new order |
| [**findOrderByExternalId()**](OrderV1Api.md#findOrderByExternalId) | **GET** /api/v1/order | Find existing order by externalId |
| [**findOrderById()**](OrderV1Api.md#findOrderById) | **GET** /api/v1/order/{orderId} | Find existing order |
| [**getDestinationCountries()**](OrderV1Api.md#getDestinationCountries) | **GET** /api/v1/order/country | Get all destination countries of all eshop orders |
| [**updateOrder()**](OrderV1Api.md#updateOrder) | **PATCH** /api/v1/order/{orderId} | Update existing order |
| [**uploadFile()**](OrderV1Api.md#uploadFile) | **POST** /api/v1/order/{orderId}/file | Upload file to order |
| [**uploadInvoice()**](OrderV1Api.md#uploadInvoice) | **POST** /api/v1/order/{orderId}/invoice | Upload order invoice file |
| [**uploadProformaInvoice()**](OrderV1Api.md#uploadProformaInvoice) | **POST** /api/v1/order/{orderId}/proforma-invoice | Upload order proforma invoice file |


## `cancelOrder()`

```php
cancelOrder($order_id): \Foxdeli\ApiPhpSdk\Model\Order
```

Cancel existing order

Updates existing order state to Cancelled

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\OrderV1Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$order_id = 'order_id_example'; // string | id of order to cancel.

try {
    $result = $apiInstance->cancelOrder($order_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderV1Api->cancelOrder: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **order_id** | **string**| id of order to cancel. | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Order**](../Model/Order.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/problem+json`, `*/*`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createOrder()`

```php
createOrder($order_registration): \Foxdeli\ApiPhpSdk\Model\Order
```

Create new order

Creates new order.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\OrderV1Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$order_registration = new \Foxdeli\ApiPhpSdk\Model\OrderRegistration(); // \Foxdeli\ApiPhpSdk\Model\OrderRegistration | Order data to create.

try {
    $result = $apiInstance->createOrder($order_registration);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderV1Api->createOrder: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **order_registration** | [**\Foxdeli\ApiPhpSdk\Model\OrderRegistration**](../Model/OrderRegistration.md)| Order data to create. | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Order**](../Model/Order.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/problem+json`, `*/*`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `findOrderByExternalId()`

```php
findOrderByExternalId($external_id, $eshop_id): \Foxdeli\ApiPhpSdk\Model\Order
```

Find existing order by externalId

Find existing order by externalId

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\OrderV1Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$external_id = 'external_id_example'; // string | external id of order to search for
$eshop_id = 'eshop_id_example'; // string

try {
    $result = $apiInstance->findOrderByExternalId($external_id, $eshop_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderV1Api->findOrderByExternalId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **external_id** | **string**| external id of order to search for | |
| **eshop_id** | **string**|  | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Order**](../Model/Order.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`, `application/problem+json`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `findOrderById()`

```php
findOrderById($order_id): \Foxdeli\ApiPhpSdk\Model\Order
```

Find existing order

Find existing order by id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\OrderV1Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$order_id = 'order_id_example'; // string | id of order to search for

try {
    $result = $apiInstance->findOrderById($order_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderV1Api->findOrderById: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **order_id** | **string**| id of order to search for | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Order**](../Model/Order.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`, `application/problem+json`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDestinationCountries()`

```php
getDestinationCountries($eshop_id): \Foxdeli\ApiPhpSdk\Model\CollectionResponseCountryCode
```

Get all destination countries of all eshop orders

Get all (distinct) destination countries from all orders of the given eshop

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\OrderV1Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$eshop_id = 'eshop_id_example'; // string | id of eshop

try {
    $result = $apiInstance->getDestinationCountries($eshop_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderV1Api->getDestinationCountries: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **eshop_id** | **string**| id of eshop | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\CollectionResponseCountryCode**](../Model/CollectionResponseCountryCode.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`, `application/problem+json`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateOrder()`

```php
updateOrder($order_id, $order_update): \Foxdeli\ApiPhpSdk\Model\Order
```

Update existing order

Updates existing order

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\OrderV1Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$order_id = 'order_id_example'; // string | id of order to update.
$order_update = new \Foxdeli\ApiPhpSdk\Model\OrderUpdate(); // \Foxdeli\ApiPhpSdk\Model\OrderUpdate | Order data to update.

try {
    $result = $apiInstance->updateOrder($order_id, $order_update);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderV1Api->updateOrder: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **order_id** | **string**| id of order to update. | |
| **order_update** | [**\Foxdeli\ApiPhpSdk\Model\OrderUpdate**](../Model/OrderUpdate.md)| Order data to update. | |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Order**](../Model/Order.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/problem+json`, `*/*`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadFile()`

```php
uploadFile($order_id, $file, $name): \Foxdeli\ApiPhpSdk\Model\FileInfo
```

Upload file to order

Upload file and store it under order id.  File will be attached to order communication emails.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\OrderV1Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$order_id = 'order_id_example'; // string | id of order to attach file to
$file = '/path/to/file.txt'; // \SplFileObject
$name = 'name_example'; // string | optional name of file. if not provided, name is derived from original file name of uploaded file

try {
    $result = $apiInstance->uploadFile($order_id, $file, $name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderV1Api->uploadFile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **order_id** | **string**| id of order to attach file to | |
| **file** | **\SplFileObject****\SplFileObject**|  | |
| **name** | **string**| optional name of file. if not provided, name is derived from original file name of uploaded file | [optional] |

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

## `uploadInvoice()`

```php
uploadInvoice($order_id, $file): \Foxdeli\ApiPhpSdk\Model\FileInfo
```

Upload order invoice file

Upload invoice file and store it under order

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\OrderV1Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$order_id = 'order_id_example'; // string | id of order to attach invoice to
$file = '/path/to/file.txt'; // \SplFileObject

try {
    $result = $apiInstance->uploadInvoice($order_id, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderV1Api->uploadInvoice: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **order_id** | **string**| id of order to attach invoice to | |
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

## `uploadProformaInvoice()`

```php
uploadProformaInvoice($order_id, $file): \Foxdeli\ApiPhpSdk\Model\FileInfo
```

Upload order proforma invoice file

Upload proforma invoice file and store it under order

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: ApiKeyAuth
$config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKey('X-API-Key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Foxdeli\ApiPhpSdk\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-Key', 'Bearer');


$apiInstance = new Foxdeli\ApiPhpSdk\Api\OrderV1Api(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$order_id = 'order_id_example'; // string | id of order to attach proforma invoice to
$file = '/path/to/file.txt'; // \SplFileObject

try {
    $result = $apiInstance->uploadProformaInvoice($order_id, $file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderV1Api->uploadProformaInvoice: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **order_id** | **string**| id of order to attach proforma invoice to | |
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
