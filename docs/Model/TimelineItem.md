# # TimelineItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | unique id of timeline item | [optional]
**parcel_id** | **string** | optional identifier of referenced parcel. if this timeline item doesn&#39;t reference parcel, value is null | [optional]
**type** | [**\Foxdeli\ApiPhpSdk\Model\TimelineType**](TimelineType.md) |  | [optional]
**text** | **string** | Text of timeline item | [optional]
**created** | **\DateTime** | moment in time when timeline item has been created | [optional]
**author** | **string** | author of timeline item | [optional]
**additional_params** | [**\Foxdeli\ApiPhpSdk\Model\TimelineAdditionalParams**](TimelineAdditionalParams.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
