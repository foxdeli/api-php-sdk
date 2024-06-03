<?php

namespace Foxdeli\ApiPhpSdk;

use Foxdeli\ApiPhpSdk\Configuration\Configuration;
use Foxdeli\ApiPhpSdk\Api\PickupPlaceApi;
use Foxdeli\ApiPhpSdk\ApiException;
use Foxdeli\ApiPhpSdk\Model\CollectionResponsePickupPlaceResponse;
use Foxdeli\ApiPhpSdk\Model\FileInfo;
use Foxdeli\ApiPhpSdk\Model\PickupPlaceCreate;
use Foxdeli\ApiPhpSdk\Model\PickupPlaceResponse;
use Foxdeli\ApiPhpSdk\Model\PickupPlaceUpdate;
use Foxdeli\ApiPhpSdk\Model\ProblemDetail;
use GuzzleHttp\Client;
use SplFileObject;

class PickupPlace extends ADomain
{
    const URL_REQUEST_PREFIX = "/pickup-place";

    public function __construct(Client $client, Configuration $config)
    {
        $this->client = $client;
        $selfConfig = clone $config;
        $this->config = $selfConfig->setHost($config->getBaseHost() . self::URL_REQUEST_PREFIX);
    }

    /**
     * Create new pickup place
     *
     * @param  PickupPlaceCreate $pickupPlaceCreate Order data to create. (required)
     *
     * @return ProblemDetail|PickupPlaceResponse
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function createPickupPlace(PickupPlaceCreate $pickupPlaceCreate)
    {
        $api = new PickupPlaceApi($this->client, $this->config);
        $pickupPlace = $api->createPickupPlace($pickupPlaceCreate);
        if($pickupPlace instanceof ProblemDetail || $pickupPlace instanceof PickupPlaceResponse){
            return $pickupPlace;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Get pickup place by ID
     *
     * @param  string $id Pickup place ID (required)
     *
     * @return ProblemDetail|PickupPlaceResponse
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function getPickupPlace(string $id)
    {
        $api = new PickupPlaceApi($this->client, $this->config);
        $pickupPlace = $api->getPickupPlace($id);
        if($pickupPlace instanceof ProblemDetail || $pickupPlace instanceof PickupPlaceResponse){
            return $pickupPlace;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Get all pickup places by eshop ID
     *
     * @param  string $eshopId Eshop ID (required)
     * @param  int $page page number
     * @param  int $size size of items per page
     * @param  string[] $sort sort order
     *
     * @return ProblemDetail|CollectionResponsePickupPlaceResponse
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function getAllEshopPickupPlaces($eshopId, $page = 0, $size = 20, $sort = null)
    {
        $api = new PickupPlaceApi($this->client, $this->config);
        $pickupPlaces = $api->getAllEshopPickupPlaces($eshopId, $page, $size, $sort);
        if($pickupPlaces instanceof ProblemDetail || $pickupPlaces instanceof CollectionResponsePickupPlaceResponse){
            return $pickupPlaces;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Update pickup place
     *
     * @param  string $pickupPlaceId Pickup place ID (required)
     * @param  PickupPlaceUpdate $pickupPlaceUpdate Pickup place update
     *
     * @return ProblemDetail|PickupPlaceResponse
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function updatePickupPlace($pickupPlaceId, $pickupPlaceUpdate)
    {
        $api = new PickupPlaceApi($this->client, $this->config);
        $pickupPlaces = $api->updatePickupPlace($pickupPlaceId, $pickupPlaceUpdate);
        if($pickupPlaces instanceof ProblemDetail || $pickupPlaces instanceof PickupPlaceResponse){
            return $pickupPlaces;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Upload a pickup place image
     *
     * @param  string $pickupPlaceId Pickup place ID (required)
     * @param  string $filepath path to invoice file (required)
     *
     * @return ProblemDetail|FileInfo
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function uploadPickupPlaceImage(string $pickupPlaceId, string $filepath)
    {
        $api = new PickupPlaceApi($this->client, $this->config);
        if (!file_exists($filepath)){
            throw $this->throwNotFound("File Not Found", "File $filepath not found. Please check given file path.");
        }
        $file = new SplFileObject($filepath);
        $order = $api->uploadPickupPlaceImage($pickupPlaceId, $file);
        if($order instanceof ProblemDetail || $order instanceof FileInfo){
            return $order;
        }
        throw $this->throwNotImplemented();
    }

    /**
     * Delete pickup place
     *
     * @param  string $pickupPlaceId Pickup place ID (required)
     *
     * @return true
     *
     * @throws ApiException
     * @throws \InvalidArgumentException
     */
    public function deletePickupPlace($pickupPlaceId)
    {
        $api = new PickupPlaceApi($this->client, $this->config);
        $api->deletePickupPlace($pickupPlaceId);
       return true;
    }
}
