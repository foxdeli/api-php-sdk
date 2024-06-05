<?php
/**
 * Order
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
 * Order Class Doc Comment
 *
 * @category Class
 * @description Order details
 * @package  Foxdeli\ApiPhpSdk
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class Order implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Order';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'platform' => 'string',
        'order_number' => 'string',
        'order_state' => '\Foxdeli\ApiPhpSdk\Model\OrderState',
        'market_id' => 'string',
        'eshop_id' => 'string',
        'external_created' => '\DateTime',
        'external_identifier' => 'string',
        'destination' => '\Foxdeli\ApiPhpSdk\Model\Destination',
        'price' => '\Foxdeli\ApiPhpSdk\Model\Money',
        'additional_costs' => '\Foxdeli\ApiPhpSdk\Model\AdditionalCost[]',
        'cash_on_delivery' => '\Foxdeli\ApiPhpSdk\Model\Money',
        'payment' => '\Foxdeli\ApiPhpSdk\Model\PaymentResponse',
        'customer' => '\Foxdeli\ApiPhpSdk\Model\Customer',
        'parcels' => '\Foxdeli\ApiPhpSdk\Model\Parcel[]',
        'products' => '\Foxdeli\ApiPhpSdk\Model\Product[]',
        'cancelled' => '\DateTime',
        'in_urgent_state' => 'bool',
        'in_important_state' => 'bool',
        'malfunction' => 'bool',
        'snooze' => '\Foxdeli\ApiPhpSdk\Model\Snooze',
        'created' => '\DateTime',
        'updated' => '\DateTime',
        'invoice_file_url' => 'string',
        'proforma_invoice_file_url' => 'string',
        'links' => '\Foxdeli\ApiPhpSdk\Model\OrderLinks',
        'billing_details' => '\Foxdeli\ApiPhpSdk\Model\BillingDetails',
        'language' => '\Foxdeli\ApiPhpSdk\Model\LanguageCode',
        'external_links' => '\Foxdeli\ApiPhpSdk\Model\ExternalLinkResponse[]'
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
        'platform' => null,
        'order_number' => null,
        'order_state' => null,
        'market_id' => 'uuid',
        'eshop_id' => 'uuid',
        'external_created' => 'date-time',
        'external_identifier' => null,
        'destination' => null,
        'price' => null,
        'additional_costs' => null,
        'cash_on_delivery' => null,
        'payment' => null,
        'customer' => null,
        'parcels' => null,
        'products' => null,
        'cancelled' => 'date-time',
        'in_urgent_state' => null,
        'in_important_state' => null,
        'malfunction' => null,
        'snooze' => null,
        'created' => 'date-time',
        'updated' => 'date-time',
        'invoice_file_url' => null,
        'proforma_invoice_file_url' => null,
        'links' => null,
        'billing_details' => null,
        'language' => null,
        'external_links' => null
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
        'id' => 'id',
        'platform' => 'platform',
        'order_number' => 'orderNumber',
        'order_state' => 'orderState',
        'market_id' => 'marketId',
        'eshop_id' => 'eshopId',
        'external_created' => 'externalCreated',
        'external_identifier' => 'externalIdentifier',
        'destination' => 'destination',
        'price' => 'price',
        'additional_costs' => 'additionalCosts',
        'cash_on_delivery' => 'cashOnDelivery',
        'payment' => 'payment',
        'customer' => 'customer',
        'parcels' => 'parcels',
        'products' => 'products',
        'cancelled' => 'cancelled',
        'in_urgent_state' => 'inUrgentState',
        'in_important_state' => 'inImportantState',
        'malfunction' => 'malfunction',
        'snooze' => 'snooze',
        'created' => 'created',
        'updated' => 'updated',
        'invoice_file_url' => 'invoiceFileUrl',
        'proforma_invoice_file_url' => 'proformaInvoiceFileUrl',
        'links' => 'links',
        'billing_details' => 'billingDetails',
        'language' => 'language',
        'external_links' => 'externalLinks'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'platform' => 'setPlatform',
        'order_number' => 'setOrderNumber',
        'order_state' => 'setOrderState',
        'market_id' => 'setMarketId',
        'eshop_id' => 'setEshopId',
        'external_created' => 'setExternalCreated',
        'external_identifier' => 'setExternalIdentifier',
        'destination' => 'setDestination',
        'price' => 'setPrice',
        'additional_costs' => 'setAdditionalCosts',
        'cash_on_delivery' => 'setCashOnDelivery',
        'payment' => 'setPayment',
        'customer' => 'setCustomer',
        'parcels' => 'setParcels',
        'products' => 'setProducts',
        'cancelled' => 'setCancelled',
        'in_urgent_state' => 'setInUrgentState',
        'in_important_state' => 'setInImportantState',
        'malfunction' => 'setMalfunction',
        'snooze' => 'setSnooze',
        'created' => 'setCreated',
        'updated' => 'setUpdated',
        'invoice_file_url' => 'setInvoiceFileUrl',
        'proforma_invoice_file_url' => 'setProformaInvoiceFileUrl',
        'links' => 'setLinks',
        'billing_details' => 'setBillingDetails',
        'language' => 'setLanguage',
        'external_links' => 'setExternalLinks'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'platform' => 'getPlatform',
        'order_number' => 'getOrderNumber',
        'order_state' => 'getOrderState',
        'market_id' => 'getMarketId',
        'eshop_id' => 'getEshopId',
        'external_created' => 'getExternalCreated',
        'external_identifier' => 'getExternalIdentifier',
        'destination' => 'getDestination',
        'price' => 'getPrice',
        'additional_costs' => 'getAdditionalCosts',
        'cash_on_delivery' => 'getCashOnDelivery',
        'payment' => 'getPayment',
        'customer' => 'getCustomer',
        'parcels' => 'getParcels',
        'products' => 'getProducts',
        'cancelled' => 'getCancelled',
        'in_urgent_state' => 'getInUrgentState',
        'in_important_state' => 'getInImportantState',
        'malfunction' => 'getMalfunction',
        'snooze' => 'getSnooze',
        'created' => 'getCreated',
        'updated' => 'getUpdated',
        'invoice_file_url' => 'getInvoiceFileUrl',
        'proforma_invoice_file_url' => 'getProformaInvoiceFileUrl',
        'links' => 'getLinks',
        'billing_details' => 'getBillingDetails',
        'language' => 'getLanguage',
        'external_links' => 'getExternalLinks'
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
        $this->container['id'] = $data['id'] ?? null;
        $this->container['platform'] = $data['platform'] ?? null;
        $this->container['order_number'] = $data['order_number'] ?? null;
        $this->container['order_state'] = $data['order_state'] ?? null;
        $this->container['market_id'] = $data['market_id'] ?? null;
        $this->container['eshop_id'] = $data['eshop_id'] ?? null;
        $this->container['external_created'] = $data['external_created'] ?? null;
        $this->container['external_identifier'] = $data['external_identifier'] ?? null;
        $this->container['destination'] = $data['destination'] ?? null;
        $this->container['price'] = $data['price'] ?? null;
        $this->container['additional_costs'] = $data['additional_costs'] ?? null;
        $this->container['cash_on_delivery'] = $data['cash_on_delivery'] ?? null;
        $this->container['payment'] = $data['payment'] ?? null;
        $this->container['customer'] = $data['customer'] ?? null;
        $this->container['parcels'] = $data['parcels'] ?? null;
        $this->container['products'] = $data['products'] ?? null;
        $this->container['cancelled'] = $data['cancelled'] ?? null;
        $this->container['in_urgent_state'] = $data['in_urgent_state'] ?? null;
        $this->container['in_important_state'] = $data['in_important_state'] ?? null;
        $this->container['malfunction'] = $data['malfunction'] ?? null;
        $this->container['snooze'] = $data['snooze'] ?? null;
        $this->container['created'] = $data['created'] ?? null;
        $this->container['updated'] = $data['updated'] ?? null;
        $this->container['invoice_file_url'] = $data['invoice_file_url'] ?? null;
        $this->container['proforma_invoice_file_url'] = $data['proforma_invoice_file_url'] ?? null;
        $this->container['links'] = $data['links'] ?? null;
        $this->container['billing_details'] = $data['billing_details'] ?? null;
        $this->container['language'] = $data['language'] ?? null;
        $this->container['external_links'] = $data['external_links'] ?? null;
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
        if ($this->container['links'] === null) {
            $invalidProperties[] = "'links' can't be null";
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
     * @param string $id identifier of order
     *
     * @return self
     */
    public function setId($id) : self
    {
        $this->container['id'] = $id;

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
     * @param string|null $platform Name of data source
     *
     * @return self
     */
    public function setPlatform($platform) : self
    {
        $this->container['platform'] = $platform;

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
     * @param string|null $order_number External number of order in eshop
     *
     * @return self
     */
    public function setOrderNumber($order_number) : self
    {
        $this->container['order_number'] = $order_number;

        return $this;
    }

    /**
     * Gets order_state
     *
     * @return \Foxdeli\ApiPhpSdk\Model\OrderState|null
     */
    public function getOrderState()
    {
        return $this->container['order_state'];
    }

    /**
     * Sets order_state
     *
     * @param string|int|\Foxdeli\ApiPhpSdk\Model\OrderState|null $order_state order_state
     *
     * @return self
     */
    public function setOrderState($order_state) : self
    {
        $this->container['order_state'] = $order_state;

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
     * @param string|null $market_id Id of Market order belongs to
     *
     * @return self
     */
    public function setMarketId($market_id) : self
    {
        $this->container['market_id'] = $market_id;

        return $this;
    }

    /**
     * Gets eshop_id
     *
     * @return string|null
     */
    public function getEshopId()
    {
        return $this->container['eshop_id'];
    }

    /**
     * Sets eshop_id
     *
     * @param string|null $eshop_id Id of Eshop order belongs to
     *
     * @return self
     */
    public function setEshopId($eshop_id) : self
    {
        $this->container['eshop_id'] = $eshop_id;

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
     * @param \DateTime|null $external_created moment in time when was order created in external system.
     *
     * @return self
     */
    public function setExternalCreated($external_created) : self
    {
        $this->container['external_created'] = $external_created;

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
     * @param string|null $external_identifier Optional identifier of order in external system
     *
     * @return self
     */
    public function setExternalIdentifier($external_identifier) : self
    {
        $this->container['external_identifier'] = $external_identifier;

        return $this;
    }

    /**
     * Gets destination
     *
     * @return \Foxdeli\ApiPhpSdk\Model\Destination|null
     */
    public function getDestination()
    {
        return $this->container['destination'];
    }

    /**
     * Sets destination
     *
     * @param \Foxdeli\ApiPhpSdk\Model\Destination|null $destination destination
     *
     * @return self
     */
    public function setDestination($destination) : self
    {
        $this->container['destination'] = $destination;

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
     * Gets additional_costs
     *
     * @return \Foxdeli\ApiPhpSdk\Model\AdditionalCost[]|null
     */
    public function getAdditionalCosts()
    {
        return $this->container['additional_costs'];
    }

    /**
     * Sets additional_costs
     *
     * @param \Foxdeli\ApiPhpSdk\Model\AdditionalCost[]|null $additional_costs List of additional costs
     *
     * @return self
     */
    public function setAdditionalCosts($additional_costs) : self
    {
        $this->container['additional_costs'] = $additional_costs;

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
    public function setCashOnDelivery($cash_on_delivery) : self
    {
        $this->container['cash_on_delivery'] = $cash_on_delivery;

        return $this;
    }

    /**
     * Gets payment
     *
     * @return \Foxdeli\ApiPhpSdk\Model\PaymentResponse|null
     */
    public function getPayment()
    {
        return $this->container['payment'];
    }

    /**
     * Sets payment
     *
     * @param \Foxdeli\ApiPhpSdk\Model\PaymentResponse|null $payment payment
     *
     * @return self
     */
    public function setPayment($payment) : self
    {
        $this->container['payment'] = $payment;

        return $this;
    }

    /**
     * Gets customer
     *
     * @return \Foxdeli\ApiPhpSdk\Model\Customer|null
     */
    public function getCustomer()
    {
        return $this->container['customer'];
    }

    /**
     * Sets customer
     *
     * @param \Foxdeli\ApiPhpSdk\Model\Customer|null $customer customer
     *
     * @return self
     */
    public function setCustomer($customer) : self
    {
        $this->container['customer'] = $customer;

        return $this;
    }

    /**
     * Gets parcels
     *
     * @return \Foxdeli\ApiPhpSdk\Model\Parcel[]|null
     */
    public function getParcels()
    {
        return $this->container['parcels'];
    }

    /**
     * Sets parcels
     *
     * @param \Foxdeli\ApiPhpSdk\Model\Parcel[]|null $parcels Parcels contained in this order
     *
     * @return self
     */
    public function setParcels($parcels) : self
    {
        $this->container['parcels'] = $parcels;

        return $this;
    }

    /**
     * Gets products
     *
     * @return \Foxdeli\ApiPhpSdk\Model\Product[]|null
     */
    public function getProducts()
    {
        return $this->container['products'];
    }

    /**
     * Sets products
     *
     * @param \Foxdeli\ApiPhpSdk\Model\Product[]|null $products Products contained in this order
     *
     * @return self
     */
    public function setProducts($products) : self
    {
        $this->container['products'] = $products;

        return $this;
    }

    /**
     * Gets cancelled
     *
     * @return \DateTime|null
     * @deprecated
     */
    public function getCancelled()
    {
        return $this->container['cancelled'];
    }

    /**
     * Sets cancelled
     *
     * @param \DateTime|null $cancelled Instant of cancellation. DEPRECATION NOTICE: field is marked for removal and will be removed in one of next major releases
     *
     * @return self
     * @deprecated
     */
    public function setCancelled($cancelled) : self
    {
        $this->container['cancelled'] = $cancelled;

        return $this;
    }

    /**
     * Gets in_urgent_state
     *
     * @return bool|null
     */
    public function getInUrgentState()
    {
        return $this->container['in_urgent_state'];
    }

    /**
     * Sets in_urgent_state
     *
     * @param bool|null $in_urgent_state is order in urgent state?
     *
     * @return self
     */
    public function setInUrgentState($in_urgent_state) : self
    {
        $this->container['in_urgent_state'] = $in_urgent_state;

        return $this;
    }

    /**
     * Gets in_important_state
     *
     * @return bool|null
     */
    public function getInImportantState()
    {
        return $this->container['in_important_state'];
    }

    /**
     * Sets in_important_state
     *
     * @param bool|null $in_important_state is order in important state?
     *
     * @return self
     */
    public function setInImportantState($in_important_state) : self
    {
        $this->container['in_important_state'] = $in_important_state;

        return $this;
    }

    /**
     * Gets malfunction
     *
     * @return bool|null
     */
    public function getMalfunction()
    {
        return $this->container['malfunction'];
    }

    /**
     * Sets malfunction
     *
     * @param bool|null $malfunction is order in malfunction state?
     *
     * @return self
     */
    public function setMalfunction($malfunction) : self
    {
        $this->container['malfunction'] = $malfunction;

        return $this;
    }

    /**
     * Gets snooze
     *
     * @return \Foxdeli\ApiPhpSdk\Model\Snooze|null
     */
    public function getSnooze()
    {
        return $this->container['snooze'];
    }

    /**
     * Sets snooze
     *
     * @param \Foxdeli\ApiPhpSdk\Model\Snooze|null $snooze snooze
     *
     * @return self
     */
    public function setSnooze($snooze) : self
    {
        $this->container['snooze'] = $snooze;

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
     * @param \DateTime|null $created moment in time when was order created
     *
     * @return self
     */
    public function setCreated($created) : self
    {
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
     * @param \DateTime|null $updated moment in time when was order last updated
     *
     * @return self
     */
    public function setUpdated($updated) : self
    {
        $this->container['updated'] = $updated;

        return $this;
    }

    /**
     * Gets invoice_file_url
     *
     * @return string|null
     */
    public function getInvoiceFileUrl()
    {
        return $this->container['invoice_file_url'];
    }

    /**
     * Sets invoice_file_url
     *
     * @param string|null $invoice_file_url (Foxdeli storage) URL of the invoice that belongs to this order (optional)
     *
     * @return self
     */
    public function setInvoiceFileUrl($invoice_file_url) : self
    {
        $this->container['invoice_file_url'] = $invoice_file_url;

        return $this;
    }

    /**
     * Gets proforma_invoice_file_url
     *
     * @return string|null
     */
    public function getProformaInvoiceFileUrl()
    {
        return $this->container['proforma_invoice_file_url'];
    }

    /**
     * Sets proforma_invoice_file_url
     *
     * @param string|null $proforma_invoice_file_url (Foxdeli storage) URL of the proforma invoice that belongs to this order (optional)
     *
     * @return self
     */
    public function setProformaInvoiceFileUrl($proforma_invoice_file_url) : self
    {
        $this->container['proforma_invoice_file_url'] = $proforma_invoice_file_url;

        return $this;
    }

    /**
     * Gets links
     *
     * @return \Foxdeli\ApiPhpSdk\Model\OrderLinks
     */
    public function getLinks()
    {
        return $this->container['links'];
    }

    /**
     * Sets links
     *
     * @param \Foxdeli\ApiPhpSdk\Model\OrderLinks $links links
     *
     * @return self
     */
    public function setLinks($links) : self
    {
        $this->container['links'] = $links;

        return $this;
    }

    /**
     * Gets billing_details
     *
     * @return \Foxdeli\ApiPhpSdk\Model\BillingDetails|null
     */
    public function getBillingDetails()
    {
        return $this->container['billing_details'];
    }

    /**
     * Sets billing_details
     *
     * @param \Foxdeli\ApiPhpSdk\Model\BillingDetails|null $billing_details billing_details
     *
     * @return self
     */
    public function setBillingDetails($billing_details) : self
    {
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
    public function setLanguage($language) : self
    {
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets external_links
     *
     * @return \Foxdeli\ApiPhpSdk\Model\ExternalLinkResponse[]|null
     */
    public function getExternalLinks()
    {
        return $this->container['external_links'];
    }

    /**
     * Sets external_links
     *
     * @param \Foxdeli\ApiPhpSdk\Model\ExternalLinkResponse[]|null $external_links list of order external links
     *
     * @return self
     */
    public function setExternalLinks($external_links) : self
    {
        $this->container['external_links'] = $external_links;

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


