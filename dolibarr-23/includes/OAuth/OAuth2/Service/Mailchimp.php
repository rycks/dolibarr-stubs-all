<?php

namespace OAuth\OAuth2\Service;

class Mailchimp extends \OAuth\OAuth2\Service\AbstractService
{
    public function __construct(\OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Http\Client\ClientInterface $httpClient, \OAuth\Common\Storage\TokenStorageInterface $storage, $scopes = array(), \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null)
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function getAuthorizationMethod()
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getAuthorizationEndpoint()
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getAccessTokenEndpoint()
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function parseAccessTokenResponse($responseBody)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function request($path, $method = 'GET', $body = null, array $extraHeaders = array())
    {
    }
    /**
     * Set the right base endpoint.
     *
     * @param StdOAuth2Token $token
     */
    protected function setBaseApiUri(\OAuth\OAuth2\Token\StdOAuth2Token $token)
    {
    }
}