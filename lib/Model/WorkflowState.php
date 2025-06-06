<?php

/**
 * WorkflowState
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
 * The version of the OpenAPI document: 14.147.6
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.13.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Foxdeli\ApiPhpSdk\Model;

use Foxdeli\ApiPhpSdk\ObjectSerializer;

/**
 * WorkflowState Class Doc Comment
 *
 * @category Class
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class WorkflowState
{
    /**
     * Possible values of this enum
     */
    public const ACT_OF_GOD = 'ACT_OF_GOD';

    public const AVAILABLE_FROM_MANUFACTURER = 'AVAILABLE_FROM_MANUFACTURER';

    public const CANCELLED = 'CANCELLED';

    public const CARRIERS_FAULT = 'CARRIERS_FAULT';

    public const CROSS_BORDER = 'CROSS_BORDER';

    public const DAMAGED = 'DAMAGED';

    public const DELIVERED = 'DELIVERED';

    public const DELIVERY_DELAYED = 'DELIVERY_DELAYED';

    public const DELIVERY_TODAY = 'DELIVERY_TODAY';

    public const DISPOSITION_CHANGED = 'DISPOSITION_CHANGED';

    public const ESHOP_PROCESSING = 'ESHOP_PROCESSING';

    public const ESTIMATED_DELIVERY_DATE = 'ESTIMATED_DELIVERY_DATE';

    public const ESTIMATED_DELIVERY_DATE_DELAY = 'ESTIMATED_DELIVERY_DATE_DELAY';

    public const EXPIRED = 'EXPIRED';

    public const HANDED_TO_CARRIER = 'HANDED_TO_CARRIER';

    public const INCORRECT_ADDRESS = 'INCORRECT_ADDRESS';

    public const IN_TRANSIT = 'IN_TRANSIT';

    public const LAST_PICKUP_DAY = 'LAST_PICKUP_DAY';

    public const LOST = 'LOST';

    public const MALFUNCTION = 'MALFUNCTION';

    public const MANUFACTURING = 'MANUFACTURING';

    public const NOT_PICKED_UP_1_DAY = 'NOT_PICKED_UP_1DAY';

    public const NOT_PICKED_UP_2_DAYS = 'NOT_PICKED_UP_2DAYS';

    public const NOT_PICKED_UP_3_DAYS = 'NOT_PICKED_UP_3DAYS';

    public const NOT_PICKED_UP_4_DAYS = 'NOT_PICKED_UP_4DAYS';

    public const NOT_PICKED_UP_5_DAYS = 'NOT_PICKED_UP_5DAYS';

    public const NOT_REACHED = 'NOT_REACHED';

    public const ORDER_ACCEPTED = 'ORDER_ACCEPTED';

    public const ORDER_CONTENT_CHANGED = 'ORDER_CONTENT_CHANGED';

    public const ORDER_DESTINATION_CHANGED = 'ORDER_DESTINATION_CHANGED';

    public const ORDER_PAID = 'ORDER_PAID';

    public const ORDER_UNPAID = 'ORDER_UNPAID';

    public const ORDER_WAITING_FOR_PAYMENT = 'ORDER_WAITING_FOR_PAYMENT';

    public const ORDER_WAITING_FOR_PAYMENT_1_DAY = 'ORDER_WAITING_FOR_PAYMENT_1DAY';

    public const ORDER_WAITING_FOR_PAYMENT_2_DAYS = 'ORDER_WAITING_FOR_PAYMENT_2DAYS';

    public const ORDER_WAITING_FOR_PAYMENT_30_MIN = 'ORDER_WAITING_FOR_PAYMENT_30MIN';

    public const ORDER_WAITING_FOR_PAYMENT_3_DAYS = 'ORDER_WAITING_FOR_PAYMENT_3DAYS';

    public const ORDER_WAITING_FOR_PAYMENT_4_DAYS = 'ORDER_WAITING_FOR_PAYMENT_4DAYS';

    public const ORDER_WAITING_FOR_PAYMENT_5_DAYS = 'ORDER_WAITING_FOR_PAYMENT_5DAYS';

    public const OTHER = 'OTHER';

    public const PICKING = 'PICKING';

    public const RATING = 'RATING';

    public const RATING_1_STAR = 'RATING_1_STAR';

    public const RATING_2_STAR = 'RATING_2_STAR';

    public const RATING_3_STAR = 'RATING_3_STAR';

    public const RATING_4_STAR = 'RATING_4_STAR';

    public const RATING_5_STAR = 'RATING_5_STAR';

    public const READY_TO_PICKUP = 'READY_TO_PICKUP';

    public const READY_TO_PICKUP_BOX = 'READY_TO_PICKUP_BOX';

    public const READY_TO_PICKUP_RETAIL = 'READY_TO_PICKUP_RETAIL';

    public const READY_TO_SEND = 'READY_TO_SEND';

    public const REJECTED_DELIVERY = 'REJECTED_DELIVERY';

    public const REJECTED_FOR_DELIVERY = 'REJECTED_FOR_DELIVERY';

    public const RETURNED = 'RETURNED';

    public const RETURNING = 'RETURNING';

    public const SLIGHTLY_DELAYED = 'SLIGHTLY_DELAYED';

    public const TIME_REASONS = 'TIME_REASONS';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ACT_OF_GOD,
            self::AVAILABLE_FROM_MANUFACTURER,
            self::CANCELLED,
            self::CARRIERS_FAULT,
            self::CROSS_BORDER,
            self::DAMAGED,
            self::DELIVERED,
            self::DELIVERY_DELAYED,
            self::DELIVERY_TODAY,
            self::DISPOSITION_CHANGED,
            self::ESHOP_PROCESSING,
            self::ESTIMATED_DELIVERY_DATE,
            self::ESTIMATED_DELIVERY_DATE_DELAY,
            self::EXPIRED,
            self::HANDED_TO_CARRIER,
            self::INCORRECT_ADDRESS,
            self::IN_TRANSIT,
            self::LAST_PICKUP_DAY,
            self::LOST,
            self::MALFUNCTION,
            self::MANUFACTURING,
            self::NOT_PICKED_UP_1_DAY,
            self::NOT_PICKED_UP_2_DAYS,
            self::NOT_PICKED_UP_3_DAYS,
            self::NOT_PICKED_UP_4_DAYS,
            self::NOT_PICKED_UP_5_DAYS,
            self::NOT_REACHED,
            self::ORDER_ACCEPTED,
            self::ORDER_CONTENT_CHANGED,
            self::ORDER_DESTINATION_CHANGED,
            self::ORDER_PAID,
            self::ORDER_UNPAID,
            self::ORDER_WAITING_FOR_PAYMENT,
            self::ORDER_WAITING_FOR_PAYMENT_1_DAY,
            self::ORDER_WAITING_FOR_PAYMENT_2_DAYS,
            self::ORDER_WAITING_FOR_PAYMENT_30_MIN,
            self::ORDER_WAITING_FOR_PAYMENT_3_DAYS,
            self::ORDER_WAITING_FOR_PAYMENT_4_DAYS,
            self::ORDER_WAITING_FOR_PAYMENT_5_DAYS,
            self::OTHER,
            self::PICKING,
            self::RATING,
            self::RATING_1_STAR,
            self::RATING_2_STAR,
            self::RATING_3_STAR,
            self::RATING_4_STAR,
            self::RATING_5_STAR,
            self::READY_TO_PICKUP,
            self::READY_TO_PICKUP_BOX,
            self::READY_TO_PICKUP_RETAIL,
            self::READY_TO_SEND,
            self::REJECTED_DELIVERY,
            self::REJECTED_FOR_DELIVERY,
            self::RETURNED,
            self::RETURNING,
            self::SLIGHTLY_DELAYED,
            self::TIME_REASONS
        ];
    }
}
