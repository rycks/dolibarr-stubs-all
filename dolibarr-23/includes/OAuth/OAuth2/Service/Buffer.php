<?php

namespace OAuth\OAuth2\Service;

/**
 * Buffer API.
 * @author  Sumukh Sridhara <@sumukhsridhara>
 * @link https://bufferapp.com/developers/api
 */
class Buffer extends \OAuth\OAuth2\Service\AbstractService
{
    public function __construct(\OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Http\Client\ClientInterface $httpClient, \OAuth\Common\Storage\TokenStorageInterface $storage, $scopes = array(), \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null)
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
    protected function getAuthorizationMethod()
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getAuthorizationUri(array $additionalParameters = array())
    {
    }
    /**
     * {@inheritdoc}
     */
    public function requestRequestToken()
    {
    }
    protected function parseRequestTokenResponse($responseBody)
    {
    }
    public function requestAccessToken($code)
    {
    }
    protected function parseAccessTokenResponse($responseBody)
    {
    }
}