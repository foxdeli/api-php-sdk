# # PaymentRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**paid** | **bool** | state of payment. DEPRECATION NOTICE: marked for removal, use &#x60;state&#x60; instead | [optional]
**state** | [**\Foxdeli\ApiPhpSdk\Model\PaymentState**](PaymentState.md) |  | [optional]
**method** | [**\Foxdeli\ApiPhpSdk\Model\PaymentMethod**](PaymentMethod.md) |  | [optional]
**service** | [**\Foxdeli\ApiPhpSdk\Model\PaymentService**](PaymentService.md) |  | [optional]
**link** | **string** | payment link | [optional]
**occurred** | **\DateTime** | optional moment in time when was state of payment described by this request set in source system (typically eshop system). if not provided, current time from clock will be used. ISO 8601, format: YYYY-MM-DDThh:mm:ss.sssZ | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
