# # ParcelUpdate

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**external_created** | **\DateTime** | optional moment in time when was parcel created in external system. ISO 8601, format: YYYY-MM-DDThh:mm:ss.sssZ | [optional]
**products** | **string[]** |  | [optional]
**tags** | [**\Foxdeli\ApiPhpSdk\Model\ParcelTag[]**](ParcelTag.md) |  | [optional]
**dimensions** | [**\Foxdeli\ApiPhpSdk\Model\DimensionsRequest**](DimensionsRequest.md) |  | [optional]
**delivery_details** | [**\Foxdeli\ApiPhpSdk\Model\DeliveryDetailsRequest**](DeliveryDetailsRequest.md) |  | [optional]
**pin** | **string** | optional PIN for pickup | [optional]
**tracking** | [**\Foxdeli\ApiPhpSdk\Model\ParcelTrackingConfigRequest[]**](ParcelTrackingConfigRequest.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
