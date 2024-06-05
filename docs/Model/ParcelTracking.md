# # ParcelTracking

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**tracking_id** | **string** | identifier of this tracking |
**carrier** | [**\Foxdeli\ApiPhpSdk\Model\Carrier**](Carrier.md) |  |
**number** | **string** | tracking number in carrier system | [optional]
**url** | **string** | url of tracking page in carrier system | [optional]
**reference_id** | **string** | optional id to reference parcel in carrier tracking system | [optional]
**carrier_configuration_id** | **string** | optional id of carrier configuration in Foxdeli. Carrier configuration is used for communication with carrier api. If no value is provided and carrier requires authorization, primary carrier configuration for given carrier will be used. | [optional]
**courier_phone** | **string** | optional phone number of courier that is transporting parcel | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
