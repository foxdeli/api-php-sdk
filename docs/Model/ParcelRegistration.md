# # ParcelRegistration

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**external_created** | **\DateTime** | optional moment in time when was parcel created in external system. ISO 8601, format: YYYY-MM-DDThh:mm:ss.sssZ | [optional]
**products** | **string[]** | list of product SKUs from order that are contained in this parcel | [optional]
**dimensions** | [**\Foxdeli\ApiPhpSdk\Model\DimensionsRequest**](DimensionsRequest.md) |  | [optional]
**delivery_details** | [**\Foxdeli\ApiPhpSdk\Model\DeliveryDetailsRequest**](DeliveryDetailsRequest.md) |  | [optional]
**pin** | **string** | optional PIN for pickup | [optional]
**tracking** | [**\Foxdeli\ApiPhpSdk\Model\ParcelTrackingConfigRequest[]**](ParcelTrackingConfigRequest.md) | list of tracking data for each carrier that is transporting given parcel. Parcel may be transported by a) single carrier, in which case there is a single entry in this list or b) multiple carriers, in which case this list contains tracking data for each carrier in order in which the parcel will be transported. | [optional]
**tags** | [**\Foxdeli\ApiPhpSdk\Model\ParcelTag[]**](ParcelTag.md) | optional tags assigned to parcel | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
