<?php
/**
 * PaymentMethod
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
 * The version of the OpenAPI document: 14.90.0
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
 * PaymentMethod Class Doc Comment
 *
 * @category Class
 * @description Method used for payment
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PaymentMethod
{
    /**
     * Possible values of this enum
     */
    public const CASH_ON_DELIVERY = 'CASH_ON_DELIVERY';

    public const BANK_TRANSFER = 'BANK_TRANSFER';

    public const CARD = 'CARD';

    public const CRYPTO = 'CRYPTO';

    public const OTHER = 'OTHER';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::CASH_ON_DELIVERY,
            self::BANK_TRANSFER,
            self::CARD,
            self::CRYPTO,
            self::OTHER
        ];
    }
}


