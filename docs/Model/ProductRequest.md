# # ProductRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | [**\Foxdeli\ApiPhpSdk\Model\ProductType**](ProductType.md) |  | [optional]
**sku** | **string** | product SKU | [optional]
**name** | **string** | name of product | [optional]
**description** | **string** | short product description. | [optional]
**availability** | [**\Foxdeli\ApiPhpSdk\Model\ProductAvailabilityRequest**](ProductAvailabilityRequest.md) |  | [optional]
**url** | **string** | url of product detail. | [optional]
**image** | **string** | url of product image. | [optional]
**price** | [**\Foxdeli\ApiPhpSdk\Model\Money**](Money.md) |  | [optional]
**vat** | **float** | VAT value | [optional]
**quantity** | **int** | quantity ordered | [optional]
**referenced_sku** | **string** | reference to the SKU of product that this product belongs to, e.g. extended warranty. references product within same order | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
