<?php

namespace OAuth\OAuth1\Service;

/**
 * Defines the common methods across OAuth 1 services.
 */
interface ServiceInterface extends \OAuth\Common\Service\ServiceInterface
{
    /**
     * Retrieves and stores/returns the OAuth1 request token obtained from the service.
     *
     * @return TokenInterface $token
     *
     * @throws TokenResponseException
     */
    public function requestRequestToken();
    /**
     * Retrieves and stores/returns the OAuth1 access token after a successful authorization.
     *
     * @param string $token       The request token from the callback.
     * @param string $verifier
     * @param string $tokenSecret
     *
     * @return TokenInterface $token
     *
     * @throws TokenResponseException
     */
    public function requestAccessToken($token, $verifier, $tokenSecret);
    /**
     * @return UriInterface
     */
    public function getRequestTokenEndpoint();
}