<?php
/**
 * ParcelUpdate
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

use \ArrayAccess;
use \Foxdeli\ApiPhpSdk\ObjectSerializer;

/**
 * ParcelUpdate Class Doc Comment
 *
 * @category Class
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ParcelUpdate implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ParcelUpdate';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'external_created' => '\DateTime',
        'products' => 'string[]',
        'tags' => '\Foxdeli\ApiPhpSdk\Model\ParcelTag[]',
        'dimensions' => '\Foxdeli\ApiPhpSdk\Model\DimensionsRequest',
        'delivery_details' => '\Foxdeli\ApiPhpSdk\Model\DeliveryDetailsRequest',
        'pin' => 'string',
        'tracking' => '\Foxdeli\ApiPhpSdk\Model\ParcelTrackingConfigRequest[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'external_created' => 'date-time',
        'products' => null,
        'tags' => null,
        'dimensions' => null,
        'delivery_details' => null,
        'pin' => null,
        'tracking' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'external_created' => false,
        'products' => false,
        'tags' => false,
        'dimensions' => false,
        'delivery_details' => false,
        'pin' => false,
        'tracking' => false
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
        'external_created' => 'externalCreated',
        'products' => 'products',
        'tags' => 'tags',
        'dimensions' => 'dimensions',
        'delivery_details' => 'deliveryDetails',
        'pin' => 'pin',
        'tracking' => 'tracking'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'external_created' => 'setExternalCreated',
        'products' => 'setProducts',
        'tags' => 'setTags',
        'dimensions' => 'setDimensions',
        'delivery_details' => 'setDeliveryDetails',
        'pin' => 'setPin',
        'tracking' => 'setTracking'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'external_created' => 'getExternalCreated',
        'products' => 'getProducts',
        'tags' => 'getTags',
        'dimensions' => 'getDimensions',
        'delivery_details' => 'getDeliveryDetails',
        'pin' => 'getPin',
        'tracking' => 'getTracking'
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
        $this->setIfExists('external_created', $data, null);
        $this->setIfExists('products', $data, null);
        $this->setIfExists('tags', $data, null);
        $this->setIfExists('dimensions', $data, null);
        $this->setIfExists('delivery_details', $data, null);
        $this->setIfExists('pin', $data, null);
        $this->setIfExists('tracking', $data, null);
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
     * Gets external_created
     *
     * @return \DateTime|null
     */
    public function getExternalCreated()
    {
        return $this->container['external_created'];
    }

    /**
     * Sets external_created
     *
     * @param \DateTime|null $external_created optional moment in time when was parcel created in external system. ISO 8601, format: YYYY-MM-DDThh:mm:ss.sssZ
     *
     * @return self
     */
    public function setExternalCreated($external_created)
    {
        if (is_null($external_created)) {
            throw new \InvalidArgumentException('non-nullable external_created cannot be null');
        }
        $this->container['external_created'] = $external_created;

        return $this;
    }

    /**
     * Gets products
     *
     * @return string[]|null
     */
    public function getProducts()
    {
        return $this->container['products'];
    }

    /**
     * Sets products
     *
     * @param string[]|null $products products
     *
     * @return self
     */
    public function setProducts($products)
    {
        if (is_null($products)) {
            throw new \InvalidArgumentException('non-nullable products cannot be null');
        }
        $this->container['products'] = $products;

        return $this;
    }

    /**
     * Gets tags
     *
     * @return \Foxdeli\ApiPhpSdk\Model\ParcelTag[]|null
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Foxdeli\ApiPhpSdk\Model\ParcelTag[]|null $tags tags
     *
     * @return self
     */
    public function setTags($tags)
    {
        if (is_null($tags)) {
            throw new \InvalidArgumentException('non-nullable tags cannot be null');
        }
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets dimensions
     *
     * @return \Foxdeli\ApiPhpSdk\Model\DimensionsRequest|null
     */
    public function getDimensions()
    {
        return $this->container['dimensions'];
    }

    /**
     * Sets dimensions
     *
     * @param \Foxdeli\ApiPhpSdk\Model\DimensionsRequest|null $dimensions dimensions
     *
     * @return self
     */
    public function setDimensions($dimensions)
    {
        if (is_null($dimensions)) {
            throw new \InvalidArgumentException('non-nullable dimensions cannot be null');
        }
        $this->container['dimensions'] = $dimensions;

        return $this;
    }

    /**
     * Gets delivery_details
     *
     * @return \Foxdeli\ApiPhpSdk\Model\DeliveryDetailsRequest|null
     */
    public function getDeliveryDetails()
    {
        return $this->container['delivery_details'];
    }

    /**
     * Sets delivery_details
     *
     * @param \Foxdeli\ApiPhpSdk\Model\DeliveryDetailsRequest|null $delivery_details delivery_details
     *
     * @return self
     */
    public function setDeliveryDetails($delivery_details)
    {
        if (is_null($delivery_details)) {
            throw new \InvalidArgumentException('non-nullable delivery_details cannot be null');
        }
        $this->container['delivery_details'] = $delivery_details;

        return $this;
    }

    /**
     * Gets pin
     *
     * @return string|null
     */
    public function getPin()
    {
        return $this->container['pin'];
    }

    /**
     * Sets pin
     *
     * @param string|null $pin optional PIN for pickup
     *
     * @return self
     */
    public function setPin($pin)
    {
        if (is_null($pin)) {
            throw new \InvalidArgumentException('non-nullable pin cannot be null');
        }
        $this->container['pin'] = $pin;

        return $this;
    }

    /**
     * Gets tracking
     *
     * @return \Foxdeli\ApiPhpSdk\Model\ParcelTrackingConfigRequest[]|null
     */
    public function getTracking()
    {
        return $this->container['tracking'];
    }

    /**
     * Sets tracking
     *
     * @param \Foxdeli\ApiPhpSdk\Model\ParcelTrackingConfigRequest[]|null $tracking tracking
     *
     * @return self
     */
    public function setTracking($tracking)
    {
        if (is_null($tracking)) {
            throw new \InvalidArgumentException('non-nullable tracking cannot be null');
        }
        $this->container['tracking'] = $tracking;

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


