<?php
/**
 * ParcelState
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

use \ArrayAccess;
use \Foxdeli\ApiPhpSdk\ObjectSerializer;

/**
 * ParcelState Class Doc Comment
 *
 * @category Class
 * @description State of parcel
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ParcelState implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ParcelState';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'delivery' => '\Foxdeli\ApiPhpSdk\Model\DeliveryState',
        'important' => '\Foxdeli\ApiPhpSdk\Model\ImportantState',
        'urgent' => '\Foxdeli\ApiPhpSdk\Model\UrgentState',
        'deliver_today' => 'bool',
        'returning' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'delivery' => null,
        'important' => null,
        'urgent' => null,
        'deliver_today' => null,
        'returning' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'delivery' => false,
        'important' => false,
        'urgent' => false,
        'deliver_today' => false,
        'returning' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var string[]
      */
    protected $openAPINullablesSetToNull = [];

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
     * Array of nullable properties
     *
     * @return boolean[]
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return string[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'delivery' => 'delivery',
        'important' => 'important',
        'urgent' => 'urgent',
        'deliver_today' => 'deliverToday',
        'returning' => 'returning'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'delivery' => 'setDelivery',
        'important' => 'setImportant',
        'urgent' => 'setUrgent',
        'deliver_today' => 'setDeliverToday',
        'returning' => 'setReturning'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'delivery' => 'getDelivery',
        'important' => 'getImportant',
        'urgent' => 'getUrgent',
        'deliver_today' => 'getDeliverToday',
        'returning' => 'getReturning'
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
    public function __construct(array $data = [])
    {
        $this->setIfExists('delivery', $data, null);
        $this->setIfExists('important', $data, null);
        $this->setIfExists('urgent', $data, null);
        $this->setIfExists('deliver_today', $data, null);
        $this->setIfExists('returning', $data, null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param mixed[]  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
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
     * Gets delivery
     *
     * @return \Foxdeli\ApiPhpSdk\Model\DeliveryState|null
     */
    public function getDelivery()
    {
        return $this->container['delivery'];
    }

    /**
     * Sets delivery
     *
     * @param string|int|\Foxdeli\ApiPhpSdk\Model\DeliveryState|null $delivery delivery
     *
     * @return self
     */
    public function setDelivery($delivery)
    {
        if (is_null($delivery)) {
            throw new \InvalidArgumentException('non-nullable delivery cannot be null');
        }
        $this->container['delivery'] = $delivery;

        return $this;
    }

    /**
     * Gets important
     *
     * @return \Foxdeli\ApiPhpSdk\Model\ImportantState|null
     * @deprecated
     */
    public function getImportant()
    {
        return $this->container['important'];
    }

    /**
     * Sets important
     *
     * @param string|int|\Foxdeli\ApiPhpSdk\Model\ImportantState|null $important important
     *
     * @return self
     * @deprecated
     */
    public function setImportant($important)
    {
        if (is_null($important)) {
            throw new \InvalidArgumentException('non-nullable important cannot be null');
        }
        $this->container['important'] = $important;

        return $this;
    }

    /**
     * Gets urgent
     *
     * @return \Foxdeli\ApiPhpSdk\Model\UrgentState|null
     * @deprecated
     */
    public function getUrgent()
    {
        return $this->container['urgent'];
    }

    /**
     * Sets urgent
     *
     * @param string|int|\Foxdeli\ApiPhpSdk\Model\UrgentState|null $urgent urgent
     *
     * @return self
     * @deprecated
     */
    public function setUrgent($urgent)
    {
        if (is_null($urgent)) {
            throw new \InvalidArgumentException('non-nullable urgent cannot be null');
        }
        $this->container['urgent'] = $urgent;

        return $this;
    }

    /**
     * Gets deliver_today
     *
     * @return bool|null
     */
    public function getDeliverToday()
    {
        return $this->container['deliver_today'];
    }

    /**
     * Sets deliver_today
     *
     * @param bool|null $deliver_today is parcel being delivered today?
     *
     * @return self
     */
    public function setDeliverToday($deliver_today)
    {
        if (is_null($deliver_today)) {
            throw new \InvalidArgumentException('non-nullable deliver_today cannot be null');
        }
        $this->container['deliver_today'] = $deliver_today;

        return $this;
    }

    /**
     * Gets returning
     *
     * @return bool|null
     */
    public function getReturning()
    {
        return $this->container['returning'];
    }

    /**
     * Sets returning
     *
     * @param bool|null $returning is parcel returning back to sender?
     *
     * @return self
     */
    public function setReturning($returning)
    {
        if (is_null($returning)) {
            throw new \InvalidArgumentException('non-nullable returning cannot be null');
        }
        $this->container['returning'] = $returning;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param mixed $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param mixed $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param mixed $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
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
     * @param mixed $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
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
    #[\ReturnTypeWillChange]
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
        if($string) {
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


