# Order

All URIs are relative to https://api.foxdeli.com/tracking.

Method | Description
------------- | -------------
[**cancelOrder()**](Order.md#cancelOrder) | Cancel existing order
[**createOrder()**](Order.md#createOrder) |  Create new order
[**findOrderByExternalId()**](Order.md#findOrderByExternalId) |  Find existing order by externalId
[**findOrderById()**](Order.md#findOrderById) |  Find existing order
[**updateOrder()**](Order.md#updateOrder) | Update existing order
[**uploadInvoice()**](Order.md#uploadInvoice) | Upload order invoice file
[**uploadProformaInvoice()**](Order.md#uploadProformaInvoice) | Upload order proforma invoice file


## `cancelOrder()`

Cancel existing order

```php
$foxdeli->cancelOrder($order_id): \Foxdeli\ApiPhpSdk\Model\Order;
```

Updates existing order state to Cancelled

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **order_id** | **string**| id of order to cancel. |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Order**](Model/Order.md)

[[Back to top]](#) 
[[Back to API list]](../README.md#endpoints)
[[Back to Model list]](../README.md#models)
[[Back to README]](../README.md)

## `createOrder()`

Create new order

```php
$foxdeli->createOrder($order_registration): \Foxdeli\ApiPhpSdk\Model\Order
```

Creates new order.

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **order_registration** | [**\Foxdeli\ApiPhpSdk\Model\OrderRegistration**](Model/OrderRegistration.md)| Order data to create. |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Order**](Model/Order.md)

[[Back to top]](#)
[[Back to API list]](../README.md#endpoints)
[[Back to Model list]](../README.md#models)
[[Back to README]](../README.md)

## `findOrderByExternalId()`

Find existing order by externalId

```php
$foxdeli->findOrderByExternalId($external_id, $eshop_id): \Foxdeli\ApiPhpSdk\Model\Order
```

Find existing order by externalId

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **external_id** | **string**| external id of order to search for |
 **eshop_id** | **string**| Eshop ID for one of your eshops |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Order**](Model/Order.md)

[[Back to top]](#)[[Back to API list]](../README.md#endpoints)
[[Back to Model list]](../README.md#models)
[[Back to README]](../README.md)

## `findOrderById()`

Find existing order

```php
$foxdeli->findOrderById($order_id): \Foxdeli\ApiPhpSdk\Model\Order
```

Find existing order by id

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **order_id** | **string**| id of order to search for |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Order**](Model/Order.md)

[[Back to top]](#)
[[Back to API list]](../README.md#endpoints)
[[Back to Model list]](../README.md#models)
[[Back to README]](../README.md)

## `updateOrder()`

Update existing order

```php
$foxdeli->updateOrder($order_id, $order_update): \Foxdeli\ApiPhpSdk\Model\Order
```

Updates existing order

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **order_id** | **string**| id of order to update. |
 **order_update** | [**\Foxdeli\ApiPhpSdk\Model\OrderUpdate**](Model/OrderUpdate.md)| Order data to update. |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Order**](Model/Order.md)

[[Back to top]](#)
[[Back to API list]](../README.md#endpoints)
[[Back to Model list]](../README.md#models)
[[Back to README]](../README.md)

## `uploadInvoice()`

Upload order invoice file

```php
$foxdeli->uploadInvoice($order_id, $filepath): \Foxdeli\ApiPhpSdk\Model\FileInfo
```

Upload invoice file and store it under order id - max file size is 10 MB and max size of the whole request (all files plus headers etc) is 11 MB

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **order_id** | **string**| id of order to attach invoice to |
 **filepath** | **string**| path to file |

[[Back to top]](#)
[[Back to API list]](../README.md#endpoints)
[[Back to Model list]](../README.md#models)
[[Back to README]](../README.md)

## `uploadProformaInvoice()`

Upload order proforma invoice file

```php
$foxdeli->uploadProformaInvoice($order_id, $filepath): \Foxdeli\ApiPhpSdk\Model\FileInfo
```

Upload proforma invoice file and store it under order id - max file size is 10 MB and max size of the whole request (all files plus headers etc) is 11 MB

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **order_id** | **string**| id of order to attach proforma invoice to |
 **filepath** | **string**| path to file |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\FileInfo**](Model/FileInfo.md)

[[Back to top]](#)
[[Back to API list]](../README.md#endpoints)
[[Back to Model list]](../README.md#models)
[[Back to README]](../README.md)
