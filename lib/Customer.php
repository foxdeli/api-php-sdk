<?php

namespace Foxdeli\ApiPhpSdk;

use Foxdeli\ApiPhpSdk\Endpoint\Authorize;
use Throwable;

class Customer{
    /**
    * @var string
    */
    private $username;

    /**
    * @var string
    */
    private $password;

    /**
    * @var Token
    */
    private $token;

    /**
     * @var bool
     */
    private $isTokenSet = false;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Get the value of username
     *
     * @return  string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the value of password
     *
     * @return  string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of token
     *
     * @param  Token  $token
     *
     * @return  self
     */
    public function setToken(Token $token)
    {
        $this->isTokenSet = true;
        $this->token = $token;
        return $this;
    }

    /**
     * Get the value of token
     *
     * @return  Token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Get the value of isTokenSet
     *
     * @return  bool
     */
    public function getIsTokenSet()
    {
        return $this->isTokenSet;
    }
}
