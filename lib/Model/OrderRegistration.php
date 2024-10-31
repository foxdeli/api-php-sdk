<?php
/**
 * OrderRegistration
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
 * The version of the OpenAPI document: 14.113.0
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.10.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Foxdeli\ApiPhpSdk\Model;

use ArrayAccess;
use Foxdeli\ApiPhpSdk\ObjectSerializer;

/**
 * OrderRegistration Class Doc Comment
 *
 * @category Class
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class OrderRegistration implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'OrderRegistration';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'eshop_id' => 'string',
        'market_id' => 'string',
        'platform' => 'string',
        'external_created' => '\DateTime',
        'order_number' => 'string',
        'external_identifier' => 'string',
        'price' => '\Foxdeli\ApiPhpSdk\Model\Money',
        'cash_on_delivery' => '\Foxdeli\ApiPhpSdk\Model\Money',
        'additional_costs' => '\Foxdeli\ApiPhpSdk\Model\AdditionalCostRequest[]',
        'payment' => '\Foxdeli\ApiPhpSdk\Model\PaymentRequest',
        'customer' => '\Foxdeli\ApiPhpSdk\Model\CustomerRequest',
        'destination' => '\Foxdeli\ApiPhpSdk\Model\DestinationRequest',
        'products' => '\Foxdeli\ApiPhpSdk\Model\ProductRequest[]',
        'recommended_products' => '\Foxdeli\ApiPhpSdk\Model\RecommendedProductRequest[]',
        'billing_details' => '\Foxdeli\ApiPhpSdk\Model\BillingDetailsRequest',
        'language' => '\Foxdeli\ApiPhpSdk\Model\LanguageCode',
        'external_links' => '\Foxdeli\ApiPhpSdk\Model\ExternalLinkRequest[]',
        'communication' => '\Foxdeli\ApiPhpSdk\Model\OrderCommunicationRequest'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'eshop_id' => null,
        'market_id' => null,
        'platform' => null,
        'external_created' => 'date-time',
        'order_number' => null,
        'external_identifier' => null,
        'price' => null,
        'cash_on_delivery' => null,
        'additional_costs' => null,
        'payment' => null,
        'customer' => null,
        'destination' => null,
        'products' => null,
        'recommended_products' => null,
        'billing_details' => null,
        'language' => null,
        'external_links' => null,
        'communication' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static $openAPINullables = [
        'eshop_id' => false,
        'market_id' => false,
        'platform' => false,
        'external_created' => false,
        'order_number' => false,
        'external_identifier' => false,
        'price' => false,
        'cash_on_delivery' => false,
        'additional_costs' => false,
        'payment' => false,
        'customer' => false,
        'destination' => false,
        'products' => false,
        'recommended_products' => false,
        'billing_details' => false,
        'language' => false,
        'external_links' => false,
        'communication' => false
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
        'eshop_id' => 'eshopId',
        'market_id' => 'marketId',
        'platform' => 'platform',
        'external_created' => 'externalCreated',
        'order_number' => 'orderNumber',
        'external_identifier' => 'externalIdentifier',
        'price' => 'price',
        'cash_on_delivery' => 'cashOnDelivery',
        'additional_costs' => 'additionalCosts',
        'payment' => 'payment',
        'customer' => 'customer',
        'destination' => 'destination',
        'products' => 'products',
        'recommended_products' => 'recommendedProducts',
        'billing_details' => 'billingDetails',
        'language' => 'language',
        'external_links' => 'externalLinks',
        'communication' => 'communication'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'eshop_id' => 'setEshopId',
        'market_id' => 'setMarketId',
        'platform' => 'setPlatform',
        'external_created' => 'setExternalCreated',
        'order_number' => 'setOrderNumber',
        'external_identifier' => 'setExternalIdentifier',
        'price' => 'setPrice',
        'cash_on_delivery' => 'setCashOnDelivery',
        'additional_costs' => 'setAdditionalCosts',
        'payment' => 'setPayment',
        'customer' => 'setCustomer',
        'destination' => 'setDestination',
        'products' => 'setProducts',
        'recommended_products' => 'setRecommendedProducts',
        'billing_details' => 'setBillingDetails',
        'language' => 'setLanguage',
        'external_links' => 'setExternalLinks',
        'communication' => 'setCommunication'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'eshop_id' => 'getEshopId',
        'market_id' => 'getMarketId',
        'platform' => 'getPlatform',
        'external_created' => 'getExternalCreated',
        'order_number' => 'getOrderNumber',
        'external_identifier' => 'getExternalIdentifier',
        'price' => 'getPrice',
        'cash_on_delivery' => 'getCashOnDelivery',
        'additional_costs' => 'getAdditionalCosts',
        'payment' => 'getPayment',
        'customer' => 'getCustomer',
        'destination' => 'getDestination',
        'products' => 'getProducts',
        'recommended_products' => 'getRecommendedProducts',
        'billing_details' => 'getBillingDetails',
        'language' => 'getLanguage',
        'external_links' => 'getExternalLinks',
        'communication' => 'getCommunication'
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
        $this->setIfExists('eshop_id', $data, null);
        $this->setIfExists('market_id', $data, null);
        $this->setIfExists('platform', $data, null);
        $this->setIfExists('external_created', $data, null);
        $this->setIfExists('order_number', $data, null);
        $this->setIfExists('external_identifier', $data, null);
        $this->setIfExists('price', $data, null);
        $this->setIfExists('cash_on_delivery', $data, null);
        $this->setIfExists('additional_costs', $data, null);
        $this->setIfExists('payment', $data, null);
        $this->setIfExists('customer', $data, null);
        $this->setIfExists('destination', $data, null);
        $this->setIfExists('products', $data, null);
        $this->setIfExists('recommended_products', $data, null);
        $this->setIfExists('billing_details', $data, null);
        $this->setIfExists('language', $data, null);
        $this->setIfExists('external_links', $data, null);
        $this->setIfExists('communication', $data, null);
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

        if ($this->container['eshop_id'] === null) {
            $invalidProperties[] = "'eshop_id' can't be null";
        }
        if ($this->container['price'] === null) {
            $invalidProperties[] = "'price' can't be null";
        }
        if ($this->container['customer'] === null) {
            $invalidProperties[] = "'customer' can't be null";
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
     * Gets eshop_id
     *
     * @return string
     */
    public function getEshopId()
    {
        return $this->container['eshop_id'];
    }

    /**
     * Sets eshop_id
     *
     * @param string $eshop_id id of the eshop order belongs to
     *
     * @return self
     */
    public function setEshopId($eshop_id)
    {
        if (is_null($eshop_id)) {
            throw new \InvalidArgumentException('non-nullable eshop_id cannot be null');
        }
        $this->container['eshop_id'] = $eshop_id;

        return $this;
    }

    /**
     * Gets market_id
     *
     * @return string|null
     */
    public function getMarketId()
    {
        return $this->container['market_id'];
    }

    /**
     * Sets market_id
     *
     * @param string|null $market_id optional Id of the market order belongs to
     *
     * @return self
     */
    public function setMarketId($market_id)
    {
        if (is_null($market_id)) {
            throw new \InvalidArgumentException('non-nullable market_id cannot be null');
        }
        $this->container['market_id'] = $market_id;

        return $this;
    }

    /**
     * Gets platform
     *
     * @return string|null
     */
    public function getPlatform()
    {
        return $this->container['platform'];
    }

    /**
     * Sets platform
     *
     * @param string|null $platform name of data source
     *
     * @return self
     */
    public function setPlatform($platform)
    {
        if (is_null($platform)) {
            throw new \InvalidArgumentException('non-nullable platform cannot be null');
        }
        $this->container['platform'] = $platform;

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
     * @param \DateTime|null $external_created moment in time when was order created in external system. ISO 8601, format: YYYY-MM-DDThh:mm:ss.sssZ
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
     * Gets order_number
     *
     * @return string|null
     */
    public function getOrderNumber()
    {
        return $this->container['order_number'];
    }

    /**
     * Sets order_number
     *
     * @param string|null $order_number external number of order in eshop
     *
     * @return self
     */
    public function setOrderNumber($order_number)
    {
        if (is_null($order_number)) {
            throw new \InvalidArgumentException('non-nullable order_number cannot be null');
        }
        $this->container['order_number'] = $order_number;

        return $this;
    }

    /**
     * Gets external_identifier
     *
     * @return string|null
     */
    public function getExternalIdentifier()
    {
        return $this->container['external_identifier'];
    }

    /**
     * Sets external_identifier
     *
     * @param string|null $external_identifier optional identifier of order in external system. if provided, must be unique for each order.
     *
     * @return self
     */
    public function setExternalIdentifier($external_identifier)
    {
        if (is_null($external_identifier)) {
            throw new \InvalidArgumentException('non-nullable external_identifier cannot be null');
        }
        $this->container['external_identifier'] = $external_identifier;

        return $this;
    }

    /**
     * Gets price
     *
     * @return \Foxdeli\ApiPhpSdk\Model\Money
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param \Foxdeli\ApiPhpSdk\Model\Money $price price
     *
     * @return self
     */
    public function setPrice($price)
    {
        if (is_null($price)) {
            throw new \InvalidArgumentException('non-nullable price cannot be null');
        }
        $this->container['price'] = $price;

        return $this;
    }

    /**
     * Gets cash_on_delivery
     *
     * @return \Foxdeli\ApiPhpSdk\Model\Money|null
     */
    public function getCashOnDelivery()
    {
        return $this->container['cash_on_delivery'];
    }

    /**
     * Sets cash_on_delivery
     *
     * @param \Foxdeli\ApiPhpSdk\Model\Money|null $cash_on_delivery cash_on_delivery
     *
     * @return self
     */
    public function setCashOnDelivery($cash_on_delivery)
    {
        if (is_null($cash_on_delivery)) {
            throw new \InvalidArgumentException('non-nullable cash_on_delivery cannot be null');
        }
        $this->container['cash_on_delivery'] = $cash_on_delivery;

        return $this;
    }

    /**
     * Gets additional_costs
     *
     * @return \Foxdeli\ApiPhpSdk\Model\AdditionalCostRequest[]|null
     */
    public function getAdditionalCosts()
    {
        return $this->container['additional_costs'];
    }

    /**
     * Sets additional_costs
     *
     * @param \Foxdeli\ApiPhpSdk\Model\AdditionalCostRequest[]|null $additional_costs list of additional costs that are charged for order in addition to basic price
     *
     * @return self
     */
    public function setAdditionalCosts($additional_costs)
    {
        if (is_null($additional_costs)) {
            throw new \InvalidArgumentException('non-nullable additional_costs cannot be null');
        }
        $this->container['additional_costs'] = $additional_costs;

        return $this;
    }

    /**
     * Gets payment
     *
     * @return \Foxdeli\ApiPhpSdk\Model\PaymentRequest|null
     */
    public function getPayment()
    {
        return $this->container['payment'];
    }

    /**
     * Sets payment
     *
     * @param \Foxdeli\ApiPhpSdk\Model\PaymentRequest|null $payment payment
     *
     * @return self
     */
    public function setPayment($payment)
    {
        if (is_null($payment)) {
            throw new \InvalidArgumentException('non-nullable payment cannot be null');
        }
        $this->container['payment'] = $payment;

        return $this;
    }

    /**
     * Gets customer
     *
     * @return \Foxdeli\ApiPhpSdk\Model\CustomerRequest
     */
    public function getCustomer()
    {
        return $this->container['customer'];
    }

    /**
     * Sets customer
     *
     * @param \Foxdeli\ApiPhpSdk\Model\CustomerRequest $customer customer
     *
     * @return self
     */
    public function setCustomer($customer)
    {
        if (is_null($customer)) {
            throw new \InvalidArgumentException('non-nullable customer cannot be null');
        }
        $this->container['customer'] = $customer;

        return $this;
    }

    /**
     * Gets destination
     *
     * @return \Foxdeli\ApiPhpSdk\Model\DestinationRequest|null
     */
    public function getDestination()
    {
        return $this->container['destination'];
    }

    /**
     * Sets destination
     *
     * @param \Foxdeli\ApiPhpSdk\Model\DestinationRequest|null $destination destination
     *
     * @return self
     */
    public function setDestination($destination)
    {
        if (is_null($destination)) {
            throw new \InvalidArgumentException('non-nullable destination cannot be null');
        }
        $this->container['destination'] = $destination;

        return $this;
    }

    /**
     * Gets products
     *
     * @return \Foxdeli\ApiPhpSdk\Model\ProductRequest[]|null
     */
    public function getProducts()
    {
        return $this->container['products'];
    }

    /**
     * Sets products
     *
     * @param \Foxdeli\ApiPhpSdk\Model\ProductRequest[]|null $products list of product details that are contained in order
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
     * Gets recommended_products
     *
     * @return \Foxdeli\ApiPhpSdk\Model\RecommendedProductRequest[]|null
     */
    public function getRecommendedProducts()
    {
        return $this->container['recommended_products'];
    }

    /**
     * Sets recommended_products
     *
     * @param \Foxdeli\ApiPhpSdk\Model\RecommendedProductRequest[]|null $recommended_products list of product details to be displayed in Recommended Products TnT/email module
     *
     * @return self
     */
    public function setRecommendedProducts($recommended_products)
    {
        if (is_null($recommended_products)) {
            throw new \InvalidArgumentException('non-nullable recommended_products cannot be null');
        }
        $this->container['recommended_products'] = $recommended_products;

        return $this;
    }

    /**
     * Gets billing_details
     *
     * @return \Foxdeli\ApiPhpSdk\Model\BillingDetailsRequest|null
     */
    public function getBillingDetails()
    {
        return $this->container['billing_details'];
    }

    /**
     * Sets billing_details
     *
     * @param \Foxdeli\ApiPhpSdk\Model\BillingDetailsRequest|null $billing_details billing_details
     *
     * @return self
     */
    public function setBillingDetails($billing_details)
    {
        if (is_null($billing_details)) {
            throw new \InvalidArgumentException('non-nullable billing_details cannot be null');
        }
        $this->container['billing_details'] = $billing_details;

        return $this;
    }

    /**
     * Gets language
     *
     * @return \Foxdeli\ApiPhpSdk\Model\LanguageCode|null
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param string|int|\Foxdeli\ApiPhpSdk\Model\LanguageCode|null $language language
     *
     * @return self
     */
    public function setLanguage($language)
    {
        if (is_null($language)) {
            throw new \InvalidArgumentException('non-nullable language cannot be null');
        }
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets external_links
     *
     * @return \Foxdeli\ApiPhpSdk\Model\ExternalLinkRequest[]|null
     */
    public function getExternalLinks()
    {
        return $this->container['external_links'];
    }

    /**
     * Sets external_links
     *
     * @param \Foxdeli\ApiPhpSdk\Model\ExternalLinkRequest[]|null $external_links external_links
     *
     * @return self
     */
    public function setExternalLinks($external_links)
    {
        if (is_null($external_links)) {
            throw new \InvalidArgumentException('non-nullable external_links cannot be null');
        }
        $this->container['external_links'] = $external_links;

        return $this;
    }

    /**
     * Gets communication
     *
     * @return \Foxdeli\ApiPhpSdk\Model\OrderCommunicationRequest|null
     */
    public function getCommunication()
    {
        return $this->container['communication'];
    }

    /**
     * Sets communication
     *
     * @param \Foxdeli\ApiPhpSdk\Model\OrderCommunicationRequest|null $communication communication
     *
     * @return self
     */
    public function setCommunication($communication)
    {
        if (is_null($communication)) {
            throw new \InvalidArgumentException('non-nullable communication cannot be null');
        }
        $this->container['communication'] = $communication;

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
        if ($string) {
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
