<?php
/**
 * ProductRequest
 *
 * PHP version 7.3
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
 * The version of the OpenAPI document: 14.70.0
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
 * ProductRequest Class Doc Comment
 *
 * @category Class
 * @description Product details
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class ProductRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ProductRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'type' => '\Foxdeli\ApiPhpSdk\Model\ProductType',
        'sku' => 'string',
        'name' => 'string',
        'description' => 'string',
        'url' => 'string',
        'image' => 'string',
        'price' => '\Foxdeli\ApiPhpSdk\Model\Money',
        'vat' => 'float',
        'quantity' => 'int',
        'referenced_sku' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'type' => null,
        'sku' => null,
        'name' => null,
        'description' => null,
        'url' => null,
        'image' => null,
        'price' => null,
        'vat' => null,
        'quantity' => 'int32',
        'referenced_sku' => null
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
        'type' => 'type',
        'sku' => 'sku',
        'name' => 'name',
        'description' => 'description',
        'url' => 'url',
        'image' => 'image',
        'price' => 'price',
        'vat' => 'vat',
        'quantity' => 'quantity',
        'referenced_sku' => 'referencedSku'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'type' => 'setType',
        'sku' => 'setSku',
        'name' => 'setName',
        'description' => 'setDescription',
        'url' => 'setUrl',
        'image' => 'setImage',
        'price' => 'setPrice',
        'vat' => 'setVat',
        'quantity' => 'setQuantity',
        'referenced_sku' => 'setReferencedSku'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'type' => 'getType',
        'sku' => 'getSku',
        'name' => 'getName',
        'description' => 'getDescription',
        'url' => 'getUrl',
        'image' => 'getImage',
        'price' => 'getPrice',
        'vat' => 'getVat',
        'quantity' => 'getQuantity',
        'referenced_sku' => 'getReferencedSku'
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
        $this->container['type'] = $data['type'] ?? null;
        $this->container['sku'] = $data['sku'] ?? null;
        $this->container['name'] = $data['name'] ?? null;
        $this->container['description'] = $data['description'] ?? null;
        $this->container['url'] = $data['url'] ?? null;
        $this->container['image'] = $data['image'] ?? null;
        $this->container['price'] = $data['price'] ?? null;
        $this->container['vat'] = $data['vat'] ?? null;
        $this->container['quantity'] = $data['quantity'] ?? null;
        $this->container['referenced_sku'] = $data['referenced_sku'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return string[] invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['quantity']) && ($this->container['quantity'] < 1)) {
            $invalidProperties[] = "invalid value for 'quantity', must be bigger than or equal to 1.";
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
     * Gets type
     *
     * @return \Foxdeli\ApiPhpSdk\Model\ProductType|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string|int|\Foxdeli\ApiPhpSdk\Model\ProductType|null $type type
     *
     * @return self
     */
    public function setType($type) : self
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets sku
     *
     * @return string|null
     */
    public function getSku()
    {
        return $this->container['sku'];
    }

    /**
     * Sets sku
     *
     * @param string|null $sku product SKU
     *
     * @return self
     */
    public function setSku($sku) : self
    {
        $this->container['sku'] = $sku;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name name of product
     *
     * @return self
     */
    public function setName($name) : self
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description short product description.
     *
     * @return self
     */
    public function setDescription($description) : self
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets url
     *
     * @return string|null
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string|null $url url of product detail.
     *
     * @return self
     */
    public function setUrl($url) : self
    {
        $this->container['url'] = $url;

        return $this;
    }

    /**
     * Gets image
     *
     * @return string|null
     */
    public function getImage()
    {
        return $this->container['image'];
    }

    /**
     * Sets image
     *
     * @param string|null $image url of product image.
     *
     * @return self
     */
    public function setImage($image) : self
    {
        $this->container['image'] = $image;

        return $this;
    }

    /**
     * Gets price
     *
     * @return \Foxdeli\ApiPhpSdk\Model\Money|null
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param \Foxdeli\ApiPhpSdk\Model\Money|null $price price
     *
     * @return self
     */
    public function setPrice($price) : self
    {
        $this->container['price'] = $price;

        return $this;
    }

    /**
     * Gets vat
     *
     * @return float|null
     */
    public function getVat()
    {
        return $this->container['vat'];
    }

    /**
     * Sets vat
     *
     * @param float|null $vat VAT value
     *
     * @return self
     */
    public function setVat($vat) : self
    {
        $this->container['vat'] = $vat;

        return $this;
    }

    /**
     * Gets quantity
     *
     * @return int|null
     */
    public function getQuantity()
    {
        return $this->container['quantity'];
    }

    /**
     * Sets quantity
     *
     * @param int|null $quantity quantity ordered
     *
     * @return self
     */
    public function setQuantity($quantity) : self
    {

        if (!is_null($quantity) && ($quantity < 1)) {
            throw new \InvalidArgumentException('invalid value for $quantity when calling ProductRequest., must be bigger than or equal to 1.');
        }

        $this->container['quantity'] = $quantity;

        return $this;
    }

    /**
     * Gets referenced_sku
     *
     * @return string|null
     */
    public function getReferencedSku()
    {
        return $this->container['referenced_sku'];
    }

    /**
     * Sets referenced_sku
     *
     * @param string|null $referenced_sku reference to the SKU of product that this product belongs to, e.g. extended warranty. references product within same order
     *
     * @return self
     */
    public function setReferencedSku($referenced_sku) : self
    {
        $this->container['referenced_sku'] = $referenced_sku;

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


