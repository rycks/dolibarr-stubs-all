<?php

namespace OAuth\OAuth2\Service;

class Pocket extends \OAuth\OAuth2\Service\AbstractService
{
    public function __construct(\OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Http\Client\ClientInterface $httpClient, \OAuth\Common\Storage\TokenStorageInterface $storage, $scopes = array(), \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null)
    {
    }
    public function getRequestTokenEndpoint()
    {
    }
    public function getAuthorizationEndpoint()
    {
    }
    public function getAccessTokenEndpoint()
    {
    }
    public function getAuthorizationUri(array $additionalParameters = array())
    {
    }
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