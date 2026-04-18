<?php

namespace OAuth\Common\Token;

/**
 * Base token implementation for any OAuth version.
 */
abstract class AbstractToken implements \OAuth\Common\Token\TokenInterface
{
    /**
     * @var string
     */
    protected $accessToken;
    /**
     * @var string
     */
    protected $refreshToken;
    /**
     * @var int
     */
    protected $endOfLife;
    /**
     * @var array
     */
    protected $extraParams = array();
    /**
     * @param string $accessToken
     * @param string $refreshToken
     * @param int    $lifetime
     * @param array  $extraParams
     */
    public function __construct($accessToken = null, $refreshToken = null, $lifetime = null, $extraParams = array())
    {
    }
    /**
     * @return string
     */
    public function getAccessToken()
    {
    }
    /**
     * @return string
     */
    public function getRefreshToken()
    {
    }
    /**
     * @return int
     */
    public function getEndOfLife()
    {
    }
    /**
     * @param array $extraParams
     */
    public function setExtraParams(array $extraParams)
    {
    }
    /**
     * @return array
     */
    public function getExtraParams()
    {
    }
    /**
     * @param string $accessToken
     */
    public function setAccessToken($accessToken)
    {
    }
    /**
     * @param int $endOfLife
     */
    public function setEndOfLife($endOfLife)
    {
    }
    /**
     * @param int $lifetime
     */
    public function setLifetime($lifetime)
    {
    }
    /**
     * @param string $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
    }
    public function isExpired()
    {
    }
}