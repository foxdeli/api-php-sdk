<?php

namespace Foxdeli\ApiPhpSdk\Exception\Request;

use Exception;
use Throwable;

class FoxdeliException extends Exception
{
    /**
     * The deserialized response object
     *
     * @var object
     */
    protected $responseObject;

    /**
     * Sets the deseralized response object (during deserialization)
     *
     * @param mixed $obj Deserialized response object
     *
     * @return void
     */
    public function setResponseObject($obj)
    {
        $this->responseObject = $obj;
    }

    /**
     * Gets the deseralized response object (during deserialization)
     *
     * @return mixed the deserialized response object
     */
    public function getResponseObject()
    {
        return $this->responseObject;
    }
}
