<?php
/**
 * ProductType
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Foxdeli Tracking service API
 *
 * Foxdeli API implements JWT tokens as its chosen method of authentication, requiring that these tokens be included in the HTTP header X-API-Key for each request.
 *
 * The version of the OpenAPI document: 14.113.0
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.10.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Foxdeli\ApiPhpSdk\Model;

use Foxdeli\ApiPhpSdk\ObjectSerializer;

/**
 * ProductType Class Doc Comment
 *
 * @category Class
 * @description Type of product
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ProductType
{
    /**
     * Possible values of this enum
     */
    public const PRODUCT = 'PRODUCT';

    public const DIGITAL_PRODUCT = 'DIGITAL_PRODUCT';

    public const SERVICE = 'SERVICE';

    public const GIFT = 'GIFT';

    public const DISCOUNT = 'DISCOUNT';

    public const VOUCHER = 'VOUCHER';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::PRODUCT,
            self::DIGITAL_PRODUCT,
            self::SERVICE,
            self::GIFT,
            self::DISCOUNT,
            self::VOUCHER
        ];
    }
}
