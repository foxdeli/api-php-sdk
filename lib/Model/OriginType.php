<?php
/**
 * OriginType
 *
 * PHP version 7.3
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
 * The version of the OpenAPI document: 3.1.0
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.4.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Foxdeli\ApiPhpSdk\Model;
use \Foxdeli\ApiPhpSdk\ObjectSerializer;

/**
 * OriginType Class Doc Comment
 *
 * @category Class
 * @description Type of origin system
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class OriginType
{
    /**
     * Possible values of this enum
     */
    const CARRIER = 'CARRIER';

    const SHOPTET = 'SHOPTET';

    const SHOPTET_PREMIUM = 'SHOPTET_PREMIUM';

    const SHOPIFY = 'SHOPIFY';

    const UPGATES = 'UPGATES';

    const API_USER = 'API_USER';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::CARRIER,
            self::SHOPTET,
            self::SHOPTET_PREMIUM,
            self::SHOPIFY,
            self::UPGATES,
            self::API_USER
        ];
    }
}


