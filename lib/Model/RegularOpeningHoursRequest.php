<?php
/**
 * RegularOpeningHoursRequest
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

use \ArrayAccess;
use \Foxdeli\ApiPhpSdk\ObjectSerializer;

/**
 * RegularOpeningHoursRequest Class Doc Comment
 *
 * @category Class
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class RegularOpeningHoursRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'RegularOpeningHoursRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'monday' => '\Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]',
        'tuesday' => '\Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]',
        'wednesday' => '\Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]',
        'thursday' => '\Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]',
        'friday' => '\Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]',
        'saturday' => '\Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]',
        'sunday' => '\Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'monday' => null,
        'tuesday' => null,
        'wednesday' => null,
        'thursday' => null,
        'friday' => null,
        'saturday' => null,
        'sunday' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return string[]
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return string[]
     * @phpstan-return array<string, string|null>
     * @psalm-return array<string, string|null>
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'monday' => 'monday',
        'tuesday' => 'tuesday',
        'wednesday' => 'wednesday',
        'thursday' => 'thursday',
        'friday' => 'friday',
        'saturday' => 'saturday',
        'sunday' => 'sunday'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'monday' => 'setMonday',
        'tuesday' => 'setTuesday',
        'wednesday' => 'setWednesday',
        'thursday' => 'setThursday',
        'friday' => 'setFriday',
        'saturday' => 'setSaturday',
        'sunday' => 'setSunday'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'monday' => 'getMonday',
        'tuesday' => 'getTuesday',
        'wednesday' => 'getWednesday',
        'thursday' => 'getThursday',
        'friday' => 'getFriday',
        'saturday' => 'getSaturday',
        'sunday' => 'getSunday'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return string[]
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return string[]
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return string[]
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['monday'] = $data['monday'] ?? null;
        $this->container['tuesday'] = $data['tuesday'] ?? null;
        $this->container['wednesday'] = $data['wednesday'] ?? null;
        $this->container['thursday'] = $data['thursday'] ?? null;
        $this->container['friday'] = $data['friday'] ?? null;
        $this->container['saturday'] = $data['saturday'] ?? null;
        $this->container['sunday'] = $data['sunday'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return string[] invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets monday
     *
     * @return \Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]|null
     */
    public function getMonday()
    {
        return $this->container['monday'];
    }

    /**
     * Sets monday
     *
     * @param \Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]|null $monday Time interval(s) during the day when the place is open - null or empty means closed all day
     *
     * @return self
     */
    public function setMonday($monday) : self
    {
        $this->container['monday'] = $monday;

        return $this;
    }

    /**
     * Gets tuesday
     *
     * @return \Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]|null
     */
    public function getTuesday()
    {
        return $this->container['tuesday'];
    }

    /**
     * Sets tuesday
     *
     * @param \Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]|null $tuesday Time interval(s) during the day when the place is open - null or empty means closed all day
     *
     * @return self
     */
    public function setTuesday($tuesday) : self
    {
        $this->container['tuesday'] = $tuesday;

        return $this;
    }

    /**
     * Gets wednesday
     *
     * @return \Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]|null
     */
    public function getWednesday()
    {
        return $this->container['wednesday'];
    }

    /**
     * Sets wednesday
     *
     * @param \Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]|null $wednesday Time interval(s) during the day when the place is open - null or empty means closed all day
     *
     * @return self
     */
    public function setWednesday($wednesday) : self
    {
        $this->container['wednesday'] = $wednesday;

        return $this;
    }

    /**
     * Gets thursday
     *
     * @return \Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]|null
     */
    public function getThursday()
    {
        return $this->container['thursday'];
    }

    /**
     * Sets thursday
     *
     * @param \Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]|null $thursday Time interval(s) during the day when the place is open - null or empty means closed all day
     *
     * @return self
     */
    public function setThursday($thursday) : self
    {
        $this->container['thursday'] = $thursday;

        return $this;
    }

    /**
     * Gets friday
     *
     * @return \Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]|null
     */
    public function getFriday()
    {
        return $this->container['friday'];
    }

    /**
     * Sets friday
     *
     * @param \Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]|null $friday Time interval(s) during the day when the place is open - null or empty means closed all day
     *
     * @return self
     */
    public function setFriday($friday) : self
    {
        $this->container['friday'] = $friday;

        return $this;
    }

    /**
     * Gets saturday
     *
     * @return \Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]|null
     */
    public function getSaturday()
    {
        return $this->container['saturday'];
    }

    /**
     * Sets saturday
     *
     * @param \Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]|null $saturday Time interval(s) during the day when the place is open - null or empty means closed all day
     *
     * @return self
     */
    public function setSaturday($saturday) : self
    {
        $this->container['saturday'] = $saturday;

        return $this;
    }

    /**
     * Gets sunday
     *
     * @return \Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]|null
     */
    public function getSunday()
    {
        return $this->container['sunday'];
    }

    /**
     * Sets sunday
     *
     * @param \Foxdeli\ApiPhpSdk\Model\OpeningHoursIntervalRequest[]|null $sunday Time interval(s) during the day when the place is open - null or empty means closed all day
     *
     * @return self
     */
    public function setSunday($sunday) : self
    {
        $this->container['sunday'] = $sunday;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        $string = json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
        if($string){
            return $string;
        }
        return "";
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string|false
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


