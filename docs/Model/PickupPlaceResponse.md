# # PickupPlaceResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Identifier of pickup place |
**eshop_id** | **string** | Id of the eshop this pickup place belongs to | [optional]
**type** | [**\Foxdeli\ApiPhpSdk\Model\DestinationType**](DestinationType.md) |  |
**carrier** | [**\Foxdeli\ApiPhpSdk\Model\Carrier**](Carrier.md) |  |
**origin_pickup_place_id** | **string** | Origin ID of parcelShop/Box |
**origin** | [**\Foxdeli\ApiPhpSdk\Model\OriginType**](OriginType.md) |  |
**country_code** | [**\Foxdeli\ApiPhpSdk\Model\CountryCode**](CountryCode.md) |  |
**zone_id** | **string** |  |
**name** | **string** |  |
**location** | [**\Foxdeli\ApiPhpSdk\Model\LocationResponse**](LocationResponse.md) |  |
**note** | **string** |  | [optional]
**phone** | **string** | Customer phone |
**email** | **string** | email |
**image** | **string** | Pickup place image link | [optional]
**storage_time** | **int** | How long the shipment will be stored, in days | [optional]
**opening_hours** | [**\Foxdeli\ApiPhpSdk\Model\OpeningHoursResponse**](OpeningHoursResponse.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
