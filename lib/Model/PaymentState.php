<?php
/**
 * PaymentState
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
 * PaymentState Class Doc Comment
 *
 * @category Class
 * @description State of payment
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PaymentState
{
    /**
     * Possible values of this enum
     */
    public const UNKNOWN = 'UNKNOWN';

    public const UNPAID = 'UNPAID';

    public const PAID = 'PAID';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::UNKNOWN,
            self::UNPAID,
            self::PAID
        ];
    }
}