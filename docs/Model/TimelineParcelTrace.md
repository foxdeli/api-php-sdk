# # TimelineParcelTrace

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**created** | **\DateTime** | moment in time when was this trace created in foxdeli system | [optional]
**occurred** | **\DateTime** | moment in time when tracking event that represents this trace happened in carrier tracking system | [optional]
**carrier** | [**\Foxdeli\ApiPhpSdk\Model\Carrier**](Carrier.md) |  | [optional]
**tracking_number** | **string** | tracking number of parcel related to tracking event | [optional]
**identifier** | **string** | identifier of parcel tracking state in carrier tracking system | [optional]
**text** | **string** | optional text containing additional details related to state of parcel | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
