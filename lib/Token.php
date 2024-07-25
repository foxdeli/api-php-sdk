<?php

namespace Foxdeli\ApiPhpSdk;

class Token
{
    /**
     * @var string
     */
    private $accessToken;

    /**
     * @var string
     */
    private $refreshToken;


    public function __construct(string $token, string $refreshToken)
    {
        $this->accessToken = $token;
        $this->refreshToken = $refreshToken;
    }

    /**
     * @deprecated Use getAccessToken() instead
     * @return string
     */
    public function getToken(): string
    {
        return $this->accessToken;
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }
}
