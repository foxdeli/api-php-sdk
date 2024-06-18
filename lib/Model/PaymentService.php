<?php
/**
 * PaymentService
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
 * PaymentService Class Doc Comment
 *
 * @category Class
 * @description Type of service used for payment
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PaymentService
{
    /**
     * Possible values of this enum
     */
    public const PAYPAL = 'PAYPAL';

    public const APPLE_PAY = 'APPLE_PAY';

    public const GOOGLE_PAY = 'GOOGLE_PAY';

    public const OTHER = 'OTHER';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::PAYPAL,
            self::APPLE_PAY,
            self::GOOGLE_PAY,
            self::OTHER
        ];
    }
}


