# # OrderRegistration

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**eshop_id** | **string** | id of the eshop order belongs to |
**market_id** | **string** | optional Id of the market order belongs to | [optional]
**platform** | **string** | name of data source | [optional]
**external_created** | **\DateTime** | moment in time when was order created in external system. ISO 8601, format: YYYY-MM-DDThh:mm:ss.sssZ | [optional]
**order_number** | **string** | external number of order in eshop | [optional]
**external_identifier** | **string** | optional identifier of order in external system. if provided, must be unique for each order. | [optional]
**price** | [**\Foxdeli\ApiPhpSdk\Model\Money**](Money.md) |  |
**cash_on_delivery** | [**\Foxdeli\ApiPhpSdk\Model\Money**](Money.md) |  | [optional]
**additional_costs** | [**\Foxdeli\ApiPhpSdk\Model\AdditionalCostRequest[]**](AdditionalCostRequest.md) | list of additional costs that are charged for order in addition to basic price | [optional]
**payment** | [**\Foxdeli\ApiPhpSdk\Model\PaymentRequest**](PaymentRequest.md) |  | [optional]
**customer** | [**\Foxdeli\ApiPhpSdk\Model\CustomerRequest**](CustomerRequest.md) |  |
**destination** | [**\Foxdeli\ApiPhpSdk\Model\DestinationRequest**](DestinationRequest.md) |  | [optional]
**products** | [**\Foxdeli\ApiPhpSdk\Model\ProductRequest[]**](ProductRequest.md) | list of product details that are contained in order | [optional]
**recommended_products** | [**\Foxdeli\ApiPhpSdk\Model\RecommendedProductRequest[]**](RecommendedProductRequest.md) | list of product details to be displayed in Recommended Products TnT/email module | [optional]
**billing_details** | [**\Foxdeli\ApiPhpSdk\Model\BillingDetailsRequest**](BillingDetailsRequest.md) |  | [optional]
**language** | [**\Foxdeli\ApiPhpSdk\Model\LanguageCode**](LanguageCode.md) |  | [optional]
**external_links** | [**\Foxdeli\ApiPhpSdk\Model\ExternalLinkRequest[]**](ExternalLinkRequest.md) |  | [optional]
**communication** | [**\Foxdeli\ApiPhpSdk\Model\OrderCommunicationRequest**](OrderCommunicationRequest.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
