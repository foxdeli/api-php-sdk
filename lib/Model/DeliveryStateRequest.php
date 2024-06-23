<?php
/**
 * DeliveryStateRequest
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
 * DeliveryStateRequest Class Doc Comment
 *
 * @category Class
 * @description State of delivery of parcel
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class DeliveryStateRequest
{
    /**
     * Possible values of this enum
     */
    public const ESHOP_PROCESSING = 'ESHOP_PROCESSING';

    public const MANUFACTURING = 'MANUFACTURING';

    public const AVAILABLE_FROM_MANUFACTURER = 'AVAILABLE_FROM_MANUFACTURER';

    public const PICKING = 'PICKING';

    public const READY_TO_SEND = 'READY_TO_SEND';

    public const HANDED_TO_CARRIER = 'HANDED_TO_CARRIER';

    public const IN_TRANSIT = 'IN_TRANSIT';

    public const STORED_FOR_PICKUP = 'STORED_FOR_PICKUP';

    public const DELIVERED = 'DELIVERED';

    public const RETURNED = 'RETURNED';

    public const LOST = 'LOST';

    public const CANCELLED = 'CANCELLED';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ESHOP_PROCESSING,
            self::MANUFACTURING,
            self::AVAILABLE_FROM_MANUFACTURER,
            self::PICKING,
            self::READY_TO_SEND,
            self::HANDED_TO_CARRIER,
            self::IN_TRANSIT,
            self::STORED_FOR_PICKUP,
            self::DELIVERED,
            self::RETURNED,
            self::LOST,
            self::CANCELLED
        ];
    }
}


