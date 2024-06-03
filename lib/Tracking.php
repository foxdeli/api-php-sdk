<?php

namespace Foxdeli\ApiPhpSdk;

use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\Api\OrderV1Api;
use Foxdeli\ApiPhpSdk\Api\ParcelV1Api;
use Foxdeli\ApiPhpSdk\ApiException;
use Foxdeli\ApiPhpSdk\Model\OrderRegistration;
use GuzzleHttp\Client;
use Foxdeli\ApiPhpSdk\Model\FileInfo;
use Foxdeli\ApiPhpSdk\Model\Order;
use Foxdeli\ApiPhpSdk\Model\OrderUpdate;
use Foxdeli\ApiPhpSdk\Model\Parcel;
use Foxdeli\ApiPhpSdk\Model\ParcelRegistration;
use Foxdeli\ApiPhpSdk\Model\ParcelStateUpdate;
use Foxdeli\ApiPhpSdk\Model\ParcelUpdate;
use Foxdeli\ApiPhpSdk\Model\ProblemDetail;
use SplFileObject;

class Tracking extends ADomain
{
    const URL_REQUEST_PREFIX = "/tracking";

    public function __construct(Client $client, Configuration $config)
    {
        $this->client = $client;
        $selfConfig = clone $config;
        $this->config = $selfConfig->setHost($config->getBaseHost() . self::URL_REQUEST_PREFIX);
    }

    /**
     * Create new order
     *
     * @param  OrderRegistration $orderRegistration Order data to create. (required)
     *
     * @return ProblemDetail|Order
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function createOrder(OrderRegistration $orderRegistration)
    {
        $api = new OrderV1Api($this->client, $this->config);
        $order = $api->createOrder($orderRegistration);
        if($order instanceof ProblemDetail || $order instanceof Order){
            return $order;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Get Order by external ID
     *
     * @param  string $externalId Order external ID. (required)
     * @param  string $eshopId Order eshop ID. (required)
     *
     * @return ProblemDetail|Order
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function findOrderByExternalId(string $externalId, string $eshopId)
    {
        $api = new OrderV1Api($this->client, $this->config);
        $order = $api->findOrderByExternalId($externalId, $eshopId);
        if($order instanceof ProblemDetail || $order instanceof Order){
            return $order;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Get Order by ID
     *
     * @param  string $orderId Order ID. (required)
     *
     * @return ProblemDetail|Order
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function findOrderById(string $orderId)
    {
        $api = new OrderV1Api($this->client, $this->config);
        $order = $api->findOrderById($orderId);
        if($order instanceof ProblemDetail || $order instanceof Order){
            return $order;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Update existing Order
     *
     * @param  string $orderId Order ID to update (required)
     * @param OrderUpdate $orderUpdate Order data to update.
     *
     * @return ProblemDetail|Order
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function updateOrder(string $orderId, OrderUpdate $orderUpdate)
    {
        $api = new OrderV1Api($this->client, $this->config);
        $order = $api->updateOrder($orderId, $orderUpdate);
        if($order instanceof ProblemDetail || $order instanceof Order){
            return $order;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Cancel existing Order
     *
     * @param  string $orderId Order ID to cancel (required)
     *
     * @return ProblemDetail|Order
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function cancelOrder(string $orderId)
    {
        $api = new OrderV1Api($this->client, $this->config);
        $order = $api->cancelOrder($orderId);
        if($order instanceof ProblemDetail || $order instanceof Order){
            return $order;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Upload invoice file and store it under order id - max file size is 10 MB and max size of the whole request (all files plus headers etc) is 11 MB
     *
     * @param  string $orderId Order ID (required)
     * @param  string $filepath path to invoice file (required)
     *
     * @return ProblemDetail|FileInfo
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function uploadOrderInvoice(string $orderId, string $filepath)
    {
        $api = new OrderV1Api($this->client, $this->config);
        if (!file_exists($filepath)){
            throw $this->throwNotFound("File Not Found", "File $filepath not found. Please check given file path.");
        }
        $file = new SplFileObject($filepath);
        $order = $api->uploadInvoice($orderId, $file);
        if($order instanceof ProblemDetail || $order instanceof FileInfo){
            return $order;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Upload order proforma invoice file and store it under order id - max file size is 10 MB and max size of the whole request (all files plus headers etc) is 11 MB
     *
     * @param  string $orderId Order ID (required)
     * @param  string $filepath path to proforma invoice file (required)
     *
     * @return ProblemDetail|FileInfo
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function uploadOrderProformaInvoice(string $orderId, string $filepath)
    {
        $api = new OrderV1Api($this->client, $this->config);
        if (!file_exists($filepath)){
            throw $this->throwNotFound("File Not Found", "File $filepath not found. Please check given file path.");
        }
        $file = new SplFileObject($filepath);
        $order = $api->uploadProformaInvoice($orderId, $file);
        if($order instanceof ProblemDetail || $order instanceof FileInfo){
            return $order;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Creates new parcel for order
     *
     * @param  string $orderId Order ID (required)
     * @param  ParcelRegistration $parcelRegistration Parcel data to create. (required)
     *
     * @return ProblemDetail|Parcel
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function createParcel(string $orderId, ParcelRegistration $parcelRegistration)
    {
        $api = new ParcelV1Api($this->client, $this->config);
        $parcel = $api->createParcel($orderId, $parcelRegistration);
        if($parcel instanceof ProblemDetail || $parcel instanceof Parcel){
            return $parcel;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Update existing parcel for order
     *
     * @param string $orderId Order ID (required)
     * @param string $parcelId Parcel ID (required)
     * @param ParcelUpdate $parcelUpdate Parcel data to create. (required)
     *
     * @return ProblemDetail|Parcel
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function updateParcel(string $orderId, string $parcelId, ParcelUpdate $parcelUpdate)
    {
        $api = new ParcelV1Api($this->client, $this->config);
        $parcel = $api->updateParcel($orderId, $parcelId, $parcelUpdate);
        if($parcel instanceof ProblemDetail || $parcel instanceof Parcel){
            return $parcel;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Get parcel for order
     *
     * @param string $orderId Order ID (required)
     * @param string $parcelId Parcel ID (required)
     *
     * @return ProblemDetail|Parcel
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function findParcelById(string $orderId, string $parcelId)
    {
        $api = new ParcelV1Api($this->client, $this->config);
        $parcel = $api->findParcelById($orderId, $parcelId);
        if($parcel instanceof ProblemDetail || $parcel instanceof Parcel){
            return $parcel;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Update parcel state for order
     *
     * @param string            $orderId Order ID (required)
     * @param string            $parcelId Parcel ID (required)
     * @param ParcelStateUpdate $parcelStateUpdate Parcel State Update object (required)
     *
     * @return ProblemDetail|Parcel
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function updateParcelState(string $orderId, string $parcelId, ParcelStateUpdate $parcelStateUpdate)
    {
        $api = new ParcelV1Api($this->client, $this->config);
        $parcel = $api->updateParcelState($orderId, $parcelId, $parcelStateUpdate);
        if($parcel instanceof ProblemDetail || $parcel instanceof Parcel){
            return $parcel;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Delete parcel for order
     *
     * @param string    $orderId Order ID (required)
     * @param string    $parcelId Parcel ID (required)
     *
     * @return true
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function deleteParcel(string $orderId, string $parcelId)
    {
        $api = new ParcelV1Api($this->client, $this->config);
        $api->deleteParcel($orderId, $parcelId);
        return true;
    }
}
