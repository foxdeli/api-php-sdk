<?php
/**
 * DestinationType
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Foxdeli Pickup Place Service API
 *
 * Foxdeli API documentation
 *
 * The version of the OpenAPI document: 3.12.0
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
 * DestinationType Class Doc Comment
 *
 * @category Class
 * @description Type of destination
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class DestinationType
{
    /**
     * Possible values of this enum
     */
    public const PARCEL_SHOP = 'PARCEL_SHOP';

    public const PARCEL_BOX = 'PARCEL_BOX';

    public const HOUSE_ADDRESS = 'HOUSE_ADDRESS';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::PARCEL_SHOP,
            self::PARCEL_BOX,
            self::HOUSE_ADDRESS
        ];
    }
}
