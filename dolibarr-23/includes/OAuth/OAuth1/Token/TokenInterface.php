<?php

namespace OAuth\OAuth1\Token;

/**
 * OAuth1 specific token interface
 */
interface TokenInterface extends \OAuth\Common\Token\TokenInterface
{
    /**
     * @return string
     */
    public function getAccessTokenSecret();
    /**
     * @param string $accessTokenSecret
     */
    public function setAccessTokenSecret($accessTokenSecret);
    /**
     * @return string
     */
    public function getRequestTokenSecret();
    /**
     * @param string $requestTokenSecret
     */
    public function setRequestTokenSecret($requestTokenSecret);
    /**
     * @return string
     */
    public function getRequestToken();
    /**
     * @param string $requestToken
     */
    public function setRequestToken($requestToken);
}