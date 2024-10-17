<?php

namespace Foxdeli\ApiPhpSdk;

use Exception;
use Foxdeli\ApiPhpSdk\ApiException;
use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\Customer;
use Foxdeli\ApiPhpSdk\Model\CollectionResponsePickupPlaceResponse;
use Foxdeli\ApiPhpSdk\Model\FileInfo;
use Foxdeli\ApiPhpSdk\Model\Order;
use Foxdeli\ApiPhpSdk\Model\OrderRegistration;
use Foxdeli\ApiPhpSdk\Model\OrderUpdate;
use Foxdeli\ApiPhpSdk\Model\Parcel;
use Foxdeli\ApiPhpSdk\Model\ParcelRegistration;
use Foxdeli\ApiPhpSdk\Model\ParcelStateUpdate;
use Foxdeli\ApiPhpSdk\Model\ParcelUpdate;
use Foxdeli\ApiPhpSdk\Model\PickupPlaceCreate;
use Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse;
use Foxdeli\ApiPhpSdk\Model\PickupPlaceUpdate;
use Foxdeli\ApiPhpSdk\Model\ProblemDetail;
use GuzzleHttp\Client;

class Foxdeli
{
    public const SANDBOX_HOST = 'https://api.sandbox.foxdeli.com';
    public const PRODUCTION_HOST = 'https://api.foxdeli.com';

    /**
    * @var Customer
    */
    private $customer;

    /**
    * @var Client
    */
    private $client;

    /**
    * @var Configuration
    */
    private $config;

    /**
    * @var Authenticator
    */
    private $authenticator;

    /**
    * @var Tracking
    */
    private $tracking;

    /**
    * @var PickupPlace
    */
    private $pickupPlace;

    public function __construct(Customer $customer, Client $client, Configuration $config)
    {
        $this->customer = $customer;
        $this->client = $client;
        $this->config = $config;

        $this->authenticator = new Authenticator($this->customer, $this->client, $this->config);
        $this->tracking = new Tracking($this->client, $this->config);
        $this->pickupPlace = new PickupPlace($this->client, $this->config);
    }

    public static function init(string $username, string $password, bool $isProd = false): self
    {
        $customer = new Customer($username, $password);

        $client = new Client();

        $config = new Configuration();
        $config->setBaseHost(($isProd ? self::PRODUCTION_HOST : self::SANDBOX_HOST));

        return new self($customer, $client, $config);
    }

    /**
     * Get the value of customer
     *
     * @return  Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @throws  ApiException
     * @return  self
     * @access  public
     */
    public function authorize(): Foxdeli
    {
        $this->authenticator->authorize();
        return $this;
    }

    /**
     * @throws  ApiException
     * @return  self
     * @access  public
     */
    public function refreshToken(): Foxdeli
    {
        $this->authenticator->refresh();
        return $this;
    }

    /**
     * @param OrderRegistration $orderRegistration Prepared OrderRegistration
     *
     * @throws ApiException
     * @return Order|ProblemDetail
     */
    public function createOrder(OrderRegistration $orderRegistration)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->tracking->createOrder($orderRegistration);
    }

    /**
     * @param string $externalId Order External ID
     * @param string $eshopId Order Eshop ID
     *
     * @throws ApiException
     * @return Order|ProblemDetail
     */
    public function findOrderByExternalId(string $externalId, string $eshopId)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->tracking->findOrderByExternalId($externalId, $eshopId);
    }

    /**
     * @param string $orderId Order ID
     *
     * @throws ApiException
     * @return Order|ProblemDetail
     */
    public function findOrderById(string $orderId)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->tracking->findOrderById($orderId);
    }

    /**
     * @param string $orderId Order ID
     * @param OrderUpdate $orderUpdate Order data to update.
     *
     * @throws ApiException
     * @return Order|ProblemDetail
     */
    public function updateOrder(string $orderId, OrderUpdate $orderUpdate)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->tracking->updateOrder($orderId, $orderUpdate);
    }

    /**
     * @param string $orderId Order ID
     *
     * @throws ApiException
     * @return Order|ProblemDetail
     */
    public function cancelOrder(string $orderId)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->tracking->cancelOrder($orderId);
    }

    /**
     * @param string $orderId Order ID
     * @param string $file path to invoice file
     *
     * @throws ApiException
     * @return FileInfo|ProblemDetail
     */
    public function uploadOrderInvoice(string $orderId, string $file)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->tracking->uploadOrderInvoice($orderId, $file);
    }

    /**
     * @param string $orderId Order ID
     * @param string $file path to proforma invoice file
     *
     * @throws ApiException
     * @return FileInfo|ProblemDetail
     */
    public function uploadOrderProformaInvoice(string $orderId, string $file)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->tracking->uploadOrderProformaInvoice($orderId, $file);
    }

    /**
     * @param string $orderId Order ID
     * @param ParcelRegistration $parcelRegistration Parcel data to create.
     *
     * @throws ApiException
     * @return Parcel|ProblemDetail
     */
    public function createParcel(string $orderId, ParcelRegistration $parcelRegistration)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->tracking->createParcel($orderId, $parcelRegistration);
    }

    /**
     * @param string $orderId Order ID
     * @param string $parcelId Parcel ID (required)
     * @param ParcelUpdate $parcelUpdate Parcel data to create. (required)
     *
     * @throws ApiException
     * @return Parcel|ProblemDetail
     */
    public function updateParcel(string $orderId, string $parcelId, ParcelUpdate $parcelUpdate)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->tracking->updateParcel($orderId, $parcelId, $parcelUpdate);
    }

    /**
     * @param string $orderId Order ID
     * @param string $parcelId Parcel ID (required)
     *
     * @throws ApiException
     * @return Parcel|ProblemDetail
     */
    public function findParcelById(string $orderId, string $parcelId)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->tracking->findParcelById($orderId, $parcelId);
    }

    /**
     * @param string            $orderId Order ID
     * @param string            $parcelId Parcel ID (required)
     * @param ParcelStateUpdate $parcelStateUpdate Parcel State Update object (required)
     *
     * @throws ApiException
     * @return Parcel|ProblemDetail
     */
    public function updateParcelState(string $orderId, string $parcelId, ParcelStateUpdate $parcelStateUpdate)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->tracking->updateParcelState($orderId, $parcelId, $parcelStateUpdate);
    }

    /**
     * @param string $orderId Order ID
     * @param string $parcelId Parcel ID (required)
     *
     * @throws ApiException
     * @return true
     */
    public function deleteParcel(string $orderId, string $parcelId)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->tracking->deleteParcel($orderId, $parcelId);
    }

    /**
     * @param PickupPlaceCreate $pickupPlaceCreate Pickup place to create (required)
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     * @return ProblemDetail|PickupPlaceResponse
     *
     */
    public function createPickupPlace(PickupPlaceCreate $pickupPlaceCreate)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->pickupPlace->createPickupPlace($pickupPlaceCreate);
    }

    /**
     * @param string $id Pickup place ID required)
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     * @return ProblemDetail|PickupPlaceResponse
     *
     */
    public function getPickupPlace(string $id)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->pickupPlace->getPickupPlace($id);
    }

    /**
     * @param string $eshopId Eshop ID (required)
     * @param  int $page page number
     * @param  int $size size of items per page
     * @param  string[] $sort sort order
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     * @return ProblemDetail|CollectionResponsePickupPlaceResponse
     *
     */
    public function getAllEshopPickupPlaces($eshopId, $page = 0, $size = 20, $sort = null)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->pickupPlace->getAllEshopPickupPlaces($eshopId, $page, $size, $sort);
    }

    /**
     * Update pickup places
     *
     * @param  string $pickupPlaceId Pickup place ID (required)
     * @param  PickupPlaceUpdate $pickupPlaceUpdate Pickup place update
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     * @return ProblemDetail|PickupPlaceResponse
     *
     */
    public function updatePickupPlace($pickupPlaceId, $pickupPlaceUpdate)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->pickupPlace->updatePickupPlace($pickupPlaceId, $pickupPlaceUpdate);
    }

    /**
     * Delete pickup place
     *
     * @param  string $pickupPlaceId Pickup place ID (required)
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     * @return true
     *
     */
    public function deletePickupPlace($pickupPlaceId)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->pickupPlace->deletePickupPlace($pickupPlaceId);
    }

    /**
     * Upload a pickup place image
     *
     * @param  string $pickupPlaceId Pickup place ID (required)
     * @param  string $filepath path to invoice file (required)
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     * @return ProblemDetail|FileInfo
     *
     */
    public function uploadPickupPlaceImage(string $pickupPlaceId, string $filepath)
    {
        $this->updateAuthTokensIfNeeded();
        return $this->pickupPlace->uploadPickupPlaceImage($pickupPlaceId, $filepath);
    }

    private function updateAuthTokensIfNeeded(): void
    {
        if (!$this->customer->getIsTokenSet()) {
            $this->authorize();
        } elseif (!Helper::isValidTokenTime($this->customer->getToken()->getRefreshToken())) {
            $this->authorize();
        } elseif (!Helper::isValidTokenTime($this->customer->getToken()->getToken())) {
            $this->refreshToken();
        }
    }
}
