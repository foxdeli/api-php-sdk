<?php
/**
 * PaymentTag
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
 * The version of the OpenAPI document: 14.108.1
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
 * PaymentTag Class Doc Comment
 *
 * @category Class
 * @description Optional tag related to UNPAID state of payment
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class PaymentTag
{
    /**
     * Possible values of this enum
     */
    public const AWAITING_30_MIN = 'AWAITING_30MIN';

    public const AWAITING_1_DAY = 'AWAITING_1DAY';

    public const AWAITING_2_DAYS = 'AWAITING_2DAYS';

    public const AWAITING_3_DAYS = 'AWAITING_3DAYS';

    public const AWAITING_4_DAYS = 'AWAITING_4DAYS';

    public const AWAITING_5_DAYS = 'AWAITING_5DAYS';

    public const AWAITING = 'AWAITING';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::AWAITING_30_MIN,
            self::AWAITING_1_DAY,
            self::AWAITING_2_DAYS,
            self::AWAITING_3_DAYS,
            self::AWAITING_4_DAYS,
            self::AWAITING_5_DAYS,
            self::AWAITING
        ];
    }
}


