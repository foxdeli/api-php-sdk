# # OrderUpdate

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**platform** | **string** | name of data source | [optional]
**order_number** | **string** | external number of order in eshop | [optional]
**external_created** | **\DateTime** | optional moment in time when was order created in external system. ISO 8601, format: YYYY-MM-DDThh:mm:ss.sssZ | [optional]
**external_identifier** | **string** | optional identifier of order in external system. If provided, must be unique for each order. | [optional]
**price** | [**\Foxdeli\ApiPhpSdk\Model\Money**](Money.md) |  | [optional]
**cash_on_delivery** | [**\Foxdeli\ApiPhpSdk\Model\Money**](Money.md) |  | [optional]
**additional_costs** | [**\Foxdeli\ApiPhpSdk\Model\AdditionalCostRequest[]**](AdditionalCostRequest.md) |  | [optional]
**payment** | [**\Foxdeli\ApiPhpSdk\Model\PaymentRequest**](PaymentRequest.md) |  | [optional]
**customer** | [**\Foxdeli\ApiPhpSdk\Model\CustomerRequest**](CustomerRequest.md) |  | [optional]
**destination** | [**\Foxdeli\ApiPhpSdk\Model\DestinationRequest**](DestinationRequest.md) |  | [optional]
**products** | [**\Foxdeli\ApiPhpSdk\Model\ProductRequest[]**](ProductRequest.md) |  | [optional]
**recommended_products** | [**\Foxdeli\ApiPhpSdk\Model\RecommendedProductRequest[]**](RecommendedProductRequest.md) |  | [optional]
**billing_details** | [**\Foxdeli\ApiPhpSdk\Model\BillingDetailsRequest**](BillingDetailsRequest.md) |  | [optional]
**external_links** | [**\Foxdeli\ApiPhpSdk\Model\ExternalLinkRequest[]**](ExternalLinkRequest.md) |  | [optional]
**communication** | [**\Foxdeli\ApiPhpSdk\Model\OrderCommunicationUpdateRequest**](OrderCommunicationUpdateRequest.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
