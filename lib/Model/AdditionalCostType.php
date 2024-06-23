<?php
/**
 * AdditionalCostType
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
 * The version of the OpenAPI document: 14.78.1
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.6.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Foxdeli\ApiPhpSdk\Model;
use \Foxdeli\ApiPhpSdk\ObjectSerializer;

/**
 * AdditionalCostType Class Doc Comment
 *
 * @category Class
 * @description Type of additional cost
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AdditionalCostType
{
    /**
     * Possible values of this enum
     */
    public const SHIPPING = 'SHIPPING';

    public const CASH_ON_DELIVERY = 'CASH_ON_DELIVERY';

    public const CARD = 'CARD';

    public const BANK_TRANSFER = 'BANK_TRANSFER';

    public const CASH = 'CASH';

    public const PACKING = 'PACKING';

    public const DUTY = 'DUTY';

    public const OTHER = 'OTHER';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::SHIPPING,
            self::CASH_ON_DELIVERY,
            self::CARD,
            self::BANK_TRANSFER,
            self::CASH,
            self::PACKING,
            self::DUTY,
            self::OTHER
        ];
    }
}


