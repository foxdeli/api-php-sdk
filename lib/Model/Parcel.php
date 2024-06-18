<?php
/**
 * Parcel
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
 * Parcel Class Doc Comment
 *
 * @category Class
 * @description Parcel details
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Parcel implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Parcel';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'order_id' => 'string',
        'external_created' => '\DateTime',
        'dimensions' => '\Foxdeli\ApiPhpSdk\Model\Dimensions',
        'delivery_details' => '\Foxdeli\ApiPhpSdk\Model\DeliveryDetails',
        'pin' => 'string',
        'state' => '\Foxdeli\ApiPhpSdk\Model\ParcelState',
        'tracking_state' => '\Foxdeli\ApiPhpSdk\Model\TrackingState',
        'max_store_date' => '\DateTime',
        'delivery_window' => '\Foxdeli\ApiPhpSdk\Model\TimeWindow',
        'active_tracking' => '\Foxdeli\ApiPhpSdk\Model\ParcelTracking',
        'timeline' => '\Foxdeli\ApiPhpSdk\Model\ParcelTimeline[]',
        'products' => 'string[]',
        'tags' => '\Foxdeli\ApiPhpSdk\Model\ParcelTag[]',
        'carrier_tracking_url' => 'string',
        'created' => '\DateTime',
        'updated' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => 'uuid',
        'order_id' => 'uuid',
        'external_created' => 'date-time',
        'dimensions' => null,
        'delivery_details' => null,
        'pin' => null,
        'state' => null,
        'tracking_state' => null,
        'max_store_date' => 'date-time',
        'delivery_window' => null,
        'active_tracking' => null,
        'timeline' => null,
        'products' => null,
        'tags' => null,
        'carrier_tracking_url' => null,
        'created' => 'date-time',
        'updated' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'id' => false,
        'order_id' => false,
        'external_created' => false,
        'dimensions' => false,
        'delivery_details' => false,
        'pin' => false,
        'state' => false,
        'tracking_state' => false,
        'max_store_date' => false,
        'delivery_window' => false,
        'active_tracking' => false,
        'timeline' => false,
        'products' => false,
        'tags' => false,
        'carrier_tracking_url' => false,
        'created' => false,
        'updated' => false
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
        'id' => 'id',
        'order_id' => 'orderId',
        'external_created' => 'externalCreated',
        'dimensions' => 'dimensions',
        'delivery_details' => 'deliveryDetails',
        'pin' => 'pin',
        'state' => 'state',
        'tracking_state' => 'trackingState',
        'max_store_date' => 'maxStoreDate',
        'delivery_window' => 'deliveryWindow',
        'active_tracking' => 'activeTracking',
        'timeline' => 'timeline',
        'products' => 'products',
        'tags' => 'tags',
        'carrier_tracking_url' => 'carrierTrackingUrl',
        'created' => 'created',
        'updated' => 'updated'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'order_id' => 'setOrderId',
        'external_created' => 'setExternalCreated',
        'dimensions' => 'setDimensions',
        'delivery_details' => 'setDeliveryDetails',
        'pin' => 'setPin',
        'state' => 'setState',
        'tracking_state' => 'setTrackingState',
        'max_store_date' => 'setMaxStoreDate',
        'delivery_window' => 'setDeliveryWindow',
        'active_tracking' => 'setActiveTracking',
        'timeline' => 'setTimeline',
        'products' => 'setProducts',
        'tags' => 'setTags',
        'carrier_tracking_url' => 'setCarrierTrackingUrl',
        'created' => 'setCreated',
        'updated' => 'setUpdated'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'order_id' => 'getOrderId',
        'external_created' => 'getExternalCreated',
        'dimensions' => 'getDimensions',
        'delivery_details' => 'getDeliveryDetails',
        'pin' => 'getPin',
        'state' => 'getState',
        'tracking_state' => 'getTrackingState',
        'max_store_date' => 'getMaxStoreDate',
        'delivery_window' => 'getDeliveryWindow',
        'active_tracking' => 'getActiveTracking',
        'timeline' => 'getTimeline',
        'products' => 'getProducts',
        'tags' => 'getTags',
        'carrier_tracking_url' => 'getCarrierTrackingUrl',
        'created' => 'getCreated',
        'updated' => 'getUpdated'
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
        $this->setIfExists('id', $data, null);
        $this->setIfExists('order_id', $data, null);
        $this->setIfExists('external_created', $data, null);
        $this->setIfExists('dimensions', $data, null);
        $this->setIfExists('delivery_details', $data, null);
        $this->setIfExists('pin', $data, null);
        $this->setIfExists('state', $data, null);
        $this->setIfExists('tracking_state', $data, null);
        $this->setIfExists('max_store_date', $data, null);
        $this->setIfExists('delivery_window', $data, null);
        $this->setIfExists('active_tracking', $data, null);
        $this->setIfExists('timeline', $data, null);
        $this->setIfExists('products', $data, null);
        $this->setIfExists('tags', $data, null);
        $this->setIfExists('carrier_tracking_url', $data, null);
        $this->setIfExists('created', $data, null);
        $this->setIfExists('updated', $data, null);
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

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['order_id'] === null) {
            $invalidProperties[] = "'order_id' can't be null";
        }
        if ($this->container['timeline'] === null) {
            $invalidProperties[] = "'timeline' can't be null";
        }
        if ($this->container['products'] === null) {
            $invalidProperties[] = "'products' can't be null";
        }
        if ($this->container['tags'] === null) {
            $invalidProperties[] = "'tags' can't be null";
        }
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
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id identifier of parcel
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets order_id
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->container['order_id'];
    }

    /**
     * Sets order_id
     *
     * @param string $order_id id of order this parcel belongs to
     *
     * @return self
     */
    public function setOrderId($order_id)
    {
        if (is_null($order_id)) {
            throw new \InvalidArgumentException('non-nullable order_id cannot be null');
        }
        $this->container['order_id'] = $order_id;

        return $this;
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
     * @param \DateTime|null $external_created moment in time when was parcel created in external system.
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
     * Gets dimensions
     *
     * @return \Foxdeli\ApiPhpSdk\Model\Dimensions|null
     */
    public function getDimensions()
    {
        return $this->container['dimensions'];
    }

    /**
     * Sets dimensions
     *
     * @param \Foxdeli\ApiPhpSdk\Model\Dimensions|null $dimensions dimensions
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
     * @return \Foxdeli\ApiPhpSdk\Model\DeliveryDetails|null
     */
    public function getDeliveryDetails()
    {
        return $this->container['delivery_details'];
    }

    /**
     * Sets delivery_details
     *
     * @param \Foxdeli\ApiPhpSdk\Model\DeliveryDetails|null $delivery_details delivery_details
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
     * @param string|null $pin PIN for pickup
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
     * Gets state
     *
     * @return \Foxdeli\ApiPhpSdk\Model\ParcelState|null
     */
    public function getState()
    {
        return $this->container['state'];
    }

    /**
     * Sets state
     *
     * @param \Foxdeli\ApiPhpSdk\Model\ParcelState|null $state state
     *
     * @return self
     */
    public function setState($state)
    {
        if (is_null($state)) {
            throw new \InvalidArgumentException('non-nullable state cannot be null');
        }
        $this->container['state'] = $state;

        return $this;
    }

    /**
     * Gets tracking_state
     *
     * @return \Foxdeli\ApiPhpSdk\Model\TrackingState|null
     */
    public function getTrackingState()
    {
        return $this->container['tracking_state'];
    }

    /**
     * Sets tracking_state
     *
     * @param string|int|\Foxdeli\ApiPhpSdk\Model\TrackingState|null $tracking_state tracking_state
     *
     * @return self
     */
    public function setTrackingState($tracking_state)
    {
        if (is_null($tracking_state)) {
            throw new \InvalidArgumentException('non-nullable tracking_state cannot be null');
        }
        $this->container['tracking_state'] = $tracking_state;

        return $this;
    }

    /**
     * Gets max_store_date
     *
     * @return \DateTime|null
     */
    public function getMaxStoreDate()
    {
        return $this->container['max_store_date'];
    }

    /**
     * Sets max_store_date
     *
     * @param \DateTime|null $max_store_date max_store_date
     *
     * @return self
     */
    public function setMaxStoreDate($max_store_date)
    {
        if (is_null($max_store_date)) {
            throw new \InvalidArgumentException('non-nullable max_store_date cannot be null');
        }
        $this->container['max_store_date'] = $max_store_date;

        return $this;
    }

    /**
     * Gets delivery_window
     *
     * @return \Foxdeli\ApiPhpSdk\Model\TimeWindow|null
     */
    public function getDeliveryWindow()
    {
        return $this->container['delivery_window'];
    }

    /**
     * Sets delivery_window
     *
     * @param \Foxdeli\ApiPhpSdk\Model\TimeWindow|null $delivery_window delivery_window
     *
     * @return self
     */
    public function setDeliveryWindow($delivery_window)
    {
        if (is_null($delivery_window)) {
            throw new \InvalidArgumentException('non-nullable delivery_window cannot be null');
        }
        $this->container['delivery_window'] = $delivery_window;

        return $this;
    }

    /**
     * Gets active_tracking
     *
     * @return \Foxdeli\ApiPhpSdk\Model\ParcelTracking|null
     */
    public function getActiveTracking()
    {
        return $this->container['active_tracking'];
    }

    /**
     * Sets active_tracking
     *
     * @param \Foxdeli\ApiPhpSdk\Model\ParcelTracking|null $active_tracking active_tracking
     *
     * @return self
     */
    public function setActiveTracking($active_tracking)
    {
        if (is_null($active_tracking)) {
            throw new \InvalidArgumentException('non-nullable active_tracking cannot be null');
        }
        $this->container['active_tracking'] = $active_tracking;

        return $this;
    }

    /**
     * Gets timeline
     *
     * @return \Foxdeli\ApiPhpSdk\Model\ParcelTimeline[]
     */
    public function getTimeline()
    {
        return $this->container['timeline'];
    }

    /**
     * Sets timeline
     *
     * @param \Foxdeli\ApiPhpSdk\Model\ParcelTimeline[] $timeline Parcel timeline
     *
     * @return self
     */
    public function setTimeline($timeline)
    {
        if (is_null($timeline)) {
            throw new \InvalidArgumentException('non-nullable timeline cannot be null');
        }
        $this->container['timeline'] = $timeline;

        return $this;
    }

    /**
     * Gets products
     *
     * @return string[]
     */
    public function getProducts()
    {
        return $this->container['products'];
    }

    /**
     * Sets products
     *
     * @param string[] $products Products from order that are contained in this parcel
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
     * @return \Foxdeli\ApiPhpSdk\Model\ParcelTag[]
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param \Foxdeli\ApiPhpSdk\Model\ParcelTag[] $tags Optional tags assigned to parcel
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
     * Gets carrier_tracking_url
     *
     * @return string|null
     * @deprecated
     */
    public function getCarrierTrackingUrl()
    {
        return $this->container['carrier_tracking_url'];
    }

    /**
     * Sets carrier_tracking_url
     *
     * @param string|null $carrier_tracking_url Full url to courier's original tracking page. DEPRECATION NOTICE: marked for removal. use activeTracking.url instead.
     *
     * @return self
     * @deprecated
     */
    public function setCarrierTrackingUrl($carrier_tracking_url)
    {
        if (is_null($carrier_tracking_url)) {
            throw new \InvalidArgumentException('non-nullable carrier_tracking_url cannot be null');
        }
        $this->container['carrier_tracking_url'] = $carrier_tracking_url;

        return $this;
    }

    /**
     * Gets created
     *
     * @return \DateTime|null
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     *
     * @param \DateTime|null $created when was parcel created
     *
     * @return self
     */
    public function setCreated($created)
    {
        if (is_null($created)) {
            throw new \InvalidArgumentException('non-nullable created cannot be null');
        }
        $this->container['created'] = $created;

        return $this;
    }

    /**
     * Gets updated
     *
     * @return \DateTime|null
     */
    public function getUpdated()
    {
        return $this->container['updated'];
    }

    /**
     * Sets updated
     *
     * @param \DateTime|null $updated when was parcel last updated
     *
     * @return self
     */
    public function setUpdated($updated)
    {
        if (is_null($updated)) {
            throw new \InvalidArgumentException('non-nullable updated cannot be null');
        }
        $this->container['updated'] = $updated;

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


