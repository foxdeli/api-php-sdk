# # Order

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | identifier of order |
**platform** | **string** | Name of data source | [optional]
**order_number** | **string** | External number of order in eshop | [optional]
**order_state** | [**\Foxdeli\ApiPhpSdk\Model\OrderState**](OrderState.md) |  |
**market_id** | **string** | Id of Market order belongs to |
**eshop_id** | **string** | Id of Eshop order belongs to |
**external_created** | **\DateTime** | moment in time when was order created in external system. | [optional]
**external_identifier** | **string** | Optional identifier of order in external system | [optional]
**destination** | [**\Foxdeli\ApiPhpSdk\Model\Destination**](Destination.md) |  | [optional]
**price** | [**\Foxdeli\ApiPhpSdk\Model\Money**](Money.md) |  | [optional]
**additional_costs** | [**\Foxdeli\ApiPhpSdk\Model\AdditionalCost[]**](AdditionalCost.md) | List of additional costs |
**cash_on_delivery** | [**\Foxdeli\ApiPhpSdk\Model\Money**](Money.md) |  | [optional]
**payment** | [**\Foxdeli\ApiPhpSdk\Model\PaymentResponse**](PaymentResponse.md) |  | [optional]
**customer** | [**\Foxdeli\ApiPhpSdk\Model\Customer**](Customer.md) |  | [optional]
**parcels** | [**\Foxdeli\ApiPhpSdk\Model\Parcel[]**](Parcel.md) | Parcels contained in this order |
**products** | [**\Foxdeli\ApiPhpSdk\Model\Product[]**](Product.md) | Products contained in this order |
**recommended_products** | [**\Foxdeli\ApiPhpSdk\Model\RecommendedProduct[]**](RecommendedProduct.md) | Products to be displayed in Recommended Products TnT/email module |
**cancelled** | **\DateTime** | Instant of cancellation. DEPRECATION NOTICE: field is marked for removal and will be removed in one of next major releases | [optional]
**in_urgent_state** | **bool** | is order in urgent state? | [optional]
**in_important_state** | **bool** | is order in important state? | [optional]
**malfunction** | **bool** | is order in malfunction state? | [optional]
**snooze** | [**\Foxdeli\ApiPhpSdk\Model\Snooze**](Snooze.md) |  | [optional]
**created** | **\DateTime** | moment in time when was order created | [optional]
**updated** | **\DateTime** | moment in time when was order last updated | [optional]
**invoice_file_url** | **string** | (Foxdeli storage) URL of the invoice that belongs to this order (optional) | [optional]
**proforma_invoice_file_url** | **string** | (Foxdeli storage) URL of the proforma invoice that belongs to this order (optional) | [optional]
**files** | [**\Foxdeli\ApiPhpSdk\Model\File[]**](File.md) | List of files attached to order |
**links** | [**\Foxdeli\ApiPhpSdk\Model\OrderLinks**](OrderLinks.md) |  |
**billing_details** | [**\Foxdeli\ApiPhpSdk\Model\BillingDetails**](BillingDetails.md) |  | [optional]
**language** | [**\Foxdeli\ApiPhpSdk\Model\LanguageCode**](LanguageCode.md) |  | [optional]
**external_links** | [**\Foxdeli\ApiPhpSdk\Model\ExternalLinkResponse[]**](ExternalLinkResponse.md) | list of order external links. DEPRECATION NOTICE: marked for removal. use &#x60;communication.externalLinks&#x60; instead. |
**communication** | [**\Foxdeli\ApiPhpSdk\Model\OrderCommunication**](OrderCommunication.md) |  |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
