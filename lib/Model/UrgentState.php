<?php
/**
 * UrgentState
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
 * UrgentState Class Doc Comment
 *
 * @category Class
 * @description optional urgent state assigned to parcel. value is not assigned if parcel is not marked as urgent
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class UrgentState
{
    /**
     * Possible values of this enum
     */
    public const REJECTED_FOR_DELIVERY = 'REJECTED_FOR_DELIVERY';

    public const REJECTED_TAKEOVER = 'REJECTED_TAKEOVER';

    public const INCORRECT_ADDRESS = 'INCORRECT_ADDRESS';

    public const OTHER = 'OTHER';

    public const DELIVERY_DELAYED = 'DELIVERY_DELAYED';

    public const NOT_PICKED_4_DAYS = 'NOT_PICKED_4DAYS';

    public const NOT_PICKED_5_DAYS = 'NOT_PICKED_5DAYS';

    public const LAST_DAY_FOR_PICKUP = 'LAST_DAY_FOR_PICKUP';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::REJECTED_FOR_DELIVERY,
            self::REJECTED_TAKEOVER,
            self::INCORRECT_ADDRESS,
            self::OTHER,
            self::DELIVERY_DELAYED,
            self::NOT_PICKED_4_DAYS,
            self::NOT_PICKED_5_DAYS,
            self::LAST_DAY_FOR_PICKUP
        ];
    }
}


