<?php
namespace Foxdeli\ApiPhpSdk\Endpoint;

interface IEndpoint {
    /**
     * @return string
     */
    public function getUrl() : string ;

    /**
     * @return string[]
     */
    public function getHeaders() : array;

    /**
     * @return string
     */
    public function getBody() : string;

    /**
     * @return string
     */
    public function getMethod() : string;
}
