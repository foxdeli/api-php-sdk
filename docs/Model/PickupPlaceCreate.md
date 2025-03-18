# # PickupPlaceCreate

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**eshop_id** | **string** | Id of the eshop this pickup place belongs to - required if originType !&#x3D; CARRIER |
**type** | [**\Foxdeli\ApiPhpSdk\Model\DestinationType**](DestinationType.md) |  |
**origin_pickup_place_id** | **string** | Origin-specific id of the pickup place |
**name** | **string** | Name of the pickup place |
**location** | [**\Foxdeli\ApiPhpSdk\Model\LocationRequest**](LocationRequest.md) |  |
**country_code** | [**\Foxdeli\ApiPhpSdk\Model\CountryCode**](CountryCode.md) |  |
**note** | **string** | Optional note on the pickup place | [optional]
**phone** | **string** | Pickup place phone |
**email** | **string** |  |
**storage_time_in_days** | **int** |  |
**storage_time_type** | [**\Foxdeli\ApiPhpSdk\Model\StorageTimeType**](StorageTimeType.md) |  | [optional]
**opening_hours** | [**\Foxdeli\ApiPhpSdk\Model\OpeningHoursRequest**](OpeningHoursRequest.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
