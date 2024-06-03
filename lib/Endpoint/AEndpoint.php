<?php
namespace Foxdeli\ApiPhpSdk\Endpoint;

abstract class AEndpoint implements IEndpoint{
    abstract public function getUrl() : string ;

    abstract public function getHeaders() : array;

    abstract public function getBody() : string;

    public function getMethod() : string {
        return 'post';
    }
}
