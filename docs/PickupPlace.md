# Foxdeli\ApiPhpSdk\PickupPlaceApi

All URIs are relative to https://api.foxdeli.com/pickup-place.

Method | Description
------------- | -------------
[**createPickupPlace()**](PickupPlace.md#createPickupPlace) | Create new pickup place
[**deletePickupPlace()**](PickupPlace.md#deletePickupPlace) | Delete a pickup place
[**getAllEshopPickupPlaces()**](PickupPlace.md#getAllEshopPickupPlaces) | Get eshop pickup places
[**getPickupPlace()**](PickupPlace.md#getPickupPlace)  | Get pickup place by id
[**updatePickupPlace()**](PickupPlace.md#updatePickupPlace) | Update a pickup place
[**uploadPickupPlaceImage()**](PickupPlace.md#uploadPickupPlaceImage) | Upload a pickup place image


## `createPickupPlace()`

Create new pickup place

```php
$foxdeli->createPickupPlace($pickup_place_create): \Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse
```

Create new pickup place

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **pickup_place_create** | [**\Foxdeli\ApiPhpSdk\Model\PickupPlaceCreate**](Model/PickupPlaceCreate.md)|  |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse**](Model/PickupPlaceResponse.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deletePickupPlace()`

Delete a pickup place

```php
$foxdeli->deletePickupPlace($pickup_place_id): true
```

Delete a pickup place

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **pickup_place_id** | **string**| UUID of the pickup place |

### Return type

`true` (boolean value)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAllEshopPickupPlaces()`

Get eshop pickup places

```php
$foxdeli->getAllEshopPickupPlaces($eshop_id, $page, $size, $sort): \Foxdeli\ApiPhpSdk\Model\CollectionResponsePickupPlaceResponse
```

Find all existing pickup places for an e-shop

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **eshop_id** | **string**| UUID of eshop |
 **page** | **int**| Zero-based page index (0..N) | [optional] [default to 0]
 **size** | **int**| The size of the page to be returned | [optional] [default to 20]
 **sort** | [**string[]**](Model/string.md)| Sorting criteria in the format: property,(asc\|desc). Default sort order is ascending. Multiple sort criteria are supported. | [optional]

### Return type

[**\Foxdeli\ApiPhpSdk\Model\CollectionResponsePickupPlaceResponse**](Model/CollectionResponsePickupPlaceResponse.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPickupPlace()`

Get pickup place by id

```php
$foxdeli->getPickupPlace($id): \Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse
```

Get pickup place by id

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| UUID of the pickup place |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse**](Model/PickupPlaceResponse.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updatePickupPlace()`

Update a pickup place

```php
$foxdeli->updatePickupPlace($id, $pickup_place_update): \Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse
```

Update a pickup place

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| UUID of the pickup place |
 **pickup_place_update** | [**\Foxdeli\ApiPhpSdk\Model\PickupPlaceUpdate**](Model/PickupPlaceUpdate.md)|  |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse**](Model/PickupPlaceResponse.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadPickupPlaceImage()`

Upload a pickup place image

```php
$foxdeli->uploadPickupPlaceImage($id, $filepath): \Foxdeli\ApiPhpSdk\Model\FileInfo
```

Upload a pickup place image

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| UUID of the pickup place |
 **filepath** |**string**| filepath of image |

### Return type

[**\Foxdeli\ApiPhpSdk\Model\FileInfo**](Model/FileInfo.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
