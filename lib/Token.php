<?php

namespace Foxdeli\ApiPhpSdk;

class Token
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $refreshToken;


    public function __construct(string $token, string $refreshToken)
    {
        $this->token = $token;
        $this->refreshToken = $refreshToken;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }
}
