# # Parcel

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | identifier of parcel |
**order_id** | **string** | id of order this parcel belongs to |
**external_created** | **\DateTime** | moment in time when was parcel created in external system. | [optional]
**dimensions** | [**\Foxdeli\ApiPhpSdk\Model\Dimensions**](Dimensions.md) |  | [optional]
**delivery_details** | [**\Foxdeli\ApiPhpSdk\Model\DeliveryDetails**](DeliveryDetails.md) |  | [optional]
**pin** | **string** | PIN for pickup | [optional]
**state** | [**\Foxdeli\ApiPhpSdk\Model\ParcelState**](ParcelState.md) |  | [optional]
**tracking_state** | [**\Foxdeli\ApiPhpSdk\Model\TrackingState**](TrackingState.md) |  | [optional]
**max_store_date** | **\DateTime** |  | [optional]
**delivery_window** | [**\Foxdeli\ApiPhpSdk\Model\TimeWindow**](TimeWindow.md) |  | [optional]
**active_tracking** | [**\Foxdeli\ApiPhpSdk\Model\ParcelTracking**](ParcelTracking.md) |  | [optional]
**timeline** | [**\Foxdeli\ApiPhpSdk\Model\ParcelTimeline[]**](ParcelTimeline.md) | Parcel timeline |
**products** | **string[]** | Products from order that are contained in this parcel |
**tags** | [**\Foxdeli\ApiPhpSdk\Model\ParcelTag[]**](ParcelTag.md) | Optional tags assigned to parcel |
**carrier_tracking_url** | **string** | Full url to courier&#39;s original tracking page. DEPRECATION NOTICE: marked for removal. use activeTracking.url instead. | [optional]
**created** | **\DateTime** | when was parcel created | [optional]
**updated** | **\DateTime** | when was parcel last updated | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
