<?php

namespace Foxdeli\ApiPhpSdk\Endpoint;

use Foxdeli\ApiPhpSdk\Customer;

class Refresh extends AEndpoint implements IEndpoint
{
    /**
    * @var Customer
    */
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getUrl(): string
    {
        return '/api/v1/token/refresh';
    }

    public function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];
    }

    public function getBody(): string
    {
        return '{
            "refreshToken": "'.$this->customer->getToken()->getRefreshToken().'"
        }';
    }
}
