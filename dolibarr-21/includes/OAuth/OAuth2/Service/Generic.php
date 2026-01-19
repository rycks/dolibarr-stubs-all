<?php

namespace OAuth\OAuth2\Service;

class Generic extends \OAuth\OAuth2\Service\AbstractService
{
    /**
     * Defined scopes
     */
    const SCOPE_READ = 'read';
    const SCOPE_WRITE = 'write';
    const SCOPE_FOLLOW = 'follow';
    const SCOPE_PUSH = 'push';
    const SCOPE_ADMIN_READ = 'admin:read';
    const SCOPE_ADMIN_WRITE = 'admin:write';
    public function __construct(\OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Http\Client\ClientInterface $httpClient, \OAuth\Common\Storage\TokenStorageInterface $storage, $scopes = array(), \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null)
    {
    }
    /**
     * Return the private property $this->baseApiUri
     */
    public function getBaseApiUri()
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getRequestTokenEndpoint()
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
    public function getAuthorizationUri(array $additionalParameters = array())
    {
    }
    /**
     * {@inheritdoc}
     */
    public function requestRequestToken()
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function parseRequestTokenResponse($responseBody)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function requestAccessToken($code, $state = null)
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function parseAccessTokenResponse($responseBody)
    {
    }
}