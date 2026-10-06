<?php

namespace OAuth\OAuth1\Token;

/**
 * Standard OAuth1 token implementation.
 * Implements OAuth\OAuth1\Token\TokenInterface in case of any OAuth1 specific features.
 */
class StdOAuth1Token extends \OAuth\Common\Token\AbstractToken implements \OAuth\OAuth1\Token\TokenInterface
{
    /**
     * @var string
     */
    protected $requestToken;
    /**
     * @var string
     */
    protected $requestTokenSecret;
    /**
     * @var string
     */
    protected $accessTokenSecret;
    /**
     * @param string $requestToken
     */
    public function setRequestToken($requestToken)
    {
    }
    /**
     * @return string
     */
    public function getRequestToken()
    {
    }
    /**
     * @param string $requestTokenSecret
     */
    public function setRequestTokenSecret($requestTokenSecret)
    {
    }
    /**
     * @return string
     */
    public function getRequestTokenSecret()
    {
    }
    /**
     * @param string $accessTokenSecret
     */
    public function setAccessTokenSecret($accessTokenSecret)
    {
    }
    /**
     * @return string
     */
    public function getAccessTokenSecret()
    {
    }
}