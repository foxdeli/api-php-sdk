# Parcel

Method | Description
------------- | -------------
[**createParcel()**](Parcel.md#createParcel)  | Create parcel
[**deleteParcel()**](Parcel.md#deleteParcel) | Delete existing parcel
[**findParcelById()**](Parcel.md#findParcelById) | Get existing parcel
[**updateParcel()**](Parcel.md#updateParcel) | Update existing parcel
[**updateParcelState()**](Parcel.md#updateParcelState) | Update state of existing parcel


## `createParcel()`

Create parcel

```php
createParcel($order_id, $parcel_registration): \Foxdeli\ApiPhpSdk\Model\Parcel
```

Creates new parcel for order

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **order_id** | **string**| id of order this parcel belongs to |
 **parcel_registration** | [**\Foxdeli\ApiPhpSdk\Model\ParcelRegistration**](../Model/ParcelRegistration.md)| Parcel data to create. |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Parcel**](../Model/Parcel.md)

[[Back to top]](#)
[[Back to API list]](../README.md#endpoints)
[[Back to Model list]](../README.md#models)
[[Back to README]](../README.md)

## `deleteParcel()`

Delete existing parcel

```php
deleteParcel($order_id, $parcel_id) : true
```

Delete existing parcel.

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **order_id** | **string**| id of order this parcel belongs to |
 **parcel_id** | **string**| id of parcel to delete. |

### Return type

`true` (boolean value)

[[Back to top]](#)
[[Back to API list]](../README.md#endpoints)
[[Back to Model list]](../README.md#models)
[[Back to README]](../README.md)

## `findParcelById()`

Get existing parcel

```php
findParcelById($order_id, $parcel_id): \Foxdeli\ApiPhpSdk\Model\Parcel
```

Finds existing parcel from order.

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **order_id** | **string**| id of order this parcel belongs to |
 **parcel_id** | **string**| id of parcel to find. |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Parcel**](../Model/Parcel.md)

[[Back to top]](#)
[[Back to API list]](../README.md#endpoints)
[[Back to Model list]](../README.md#models)
[[Back to README]](../README.md)

## `updateParcel()`

Update existing parcel

```php
updateParcel($order_id, $parcel_id, $parcel_update): \Foxdeli\ApiPhpSdk\Model\Parcel
```

Updates existing parcel.

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **order_id** | **string**| id of order this parcel belongs to |
 **parcel_id** | **string**| id of parcel to update. |
 **parcel_update** | [**\Foxdeli\ApiPhpSdk\Model\ParcelUpdate**](../Model/ParcelUpdate.md)| Parcel data to update. |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Parcel**](../Model/Parcel.md)

[[Back to top]](#)
[[Back to API list]](../README.md#endpoints)
[[Back to Model list]](../README.md#models)
[[Back to README]](../README.md)

## `updateParcelState()`

Update state of existing parcel

```php
updateParcelState($order_id, $parcel_id, $parcel_state_update): \Foxdeli\ApiPhpSdk\Model\Parcel
```

Updates state of existing parcel

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **order_id** | **string**| id of order this parcel belongs to |
 **parcel_id** | **string**| id of parcel to update. |
 **parcel_state_update** | [**\Foxdeli\ApiPhpSdk\Model\ParcelStateUpdate**](../Model/ParcelStateUpdate.md)| Parcel data to update. |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\Parcel**](../Model/Parcel.md)

[[Back to top]](#)
[[Back to API list]](../README.md#endpoints)
[[Back to Model list]](../README.md#models)
[[Back to README]](../README.md)
