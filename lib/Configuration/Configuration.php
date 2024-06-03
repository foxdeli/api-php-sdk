<?php

namespace Foxdeli\ApiPhpSdk\Configuration;

use Foxdeli\ApiPhpSdk\Configuration\ApiKeyHolder;
use Foxdeli\ApiPhpSdk\Configuration as OpenApiConfiguration;

class Configuration extends OpenApiConfiguration
{
    /**
     * @var string
     */
    protected $baseHost;

    /**
     * @var ApiKeyHolder
     */
    protected $apiKeyHolder;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->apiKeyHolder = new ApiKeyHolder();
        parent::__construct();
    }

    /**
     * Set the value of baseHost
     *
     * @param  string  $baseHost
     *
     * @return  self
     */
    public function setBaseHost(string $baseHost)
    {
        $this->baseHost = $baseHost;

        return $this;
    }

    /**
     * Get the value of baseHost
     *
     * @return  string
     */
    public function getBaseHost()
    {
        return $this->baseHost;
    }

    /**
     * @param string $token
     */
    public function updateAuthToken(string $token) : self {
        $this->setApiKey('X-API-Key', $token);

        return $this;
    }

    /**
     * Sets API key
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $key              API key or token
     *
     * @return $this
     */
    public function setApiKey($apiKeyIdentifier, $key)
    {
        $this->apiKeyHolder->setApiKey($apiKeyIdentifier, $key);
        return $this;
    }

    /**
     * Gets API key
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     *
     * @return null|string API key or token
     */
    public function getApiKey($apiKeyIdentifier)
    {
        return $this->apiKeyHolder->getApiKey($apiKeyIdentifier);
    }
}
