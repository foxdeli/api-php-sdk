# # ParcelTrackingConfigRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**carrier** | [**\Foxdeli\ApiPhpSdk\Model\Carrier**](Carrier.md) |  | [optional]
**number** | **string** | tracking number in carrier tracking system. parcel is not tracked by Foxdeli until tracking number is provided | [optional]
**reference_id** | **string** | optional id to reference parcel in carrier tracking system | [optional]
**carrier_configuration_id** | **string** | id of carrier configuration in Foxdeli system. if no value is provided, Foxdeli attempts to use &#x60;primary&#x60; carrier configuration for given carrier while tracking parcel. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
