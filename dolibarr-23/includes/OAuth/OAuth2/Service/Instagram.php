<?php

namespace OAuth\OAuth2\Service;

class Instagram extends \OAuth\OAuth2\Service\AbstractService
{
    /**
     * Defined scopes
     * @link http://instagram.com/developer/authentication/#scope
     */
    const SCOPE_BASIC = 'basic';
    const SCOPE_COMMENTS = 'comments';
    const SCOPE_RELATIONSHIPS = 'relationships';
    const SCOPE_LIKES = 'likes';
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
    protected function parseAccessTokenResponse($responseBody)
    {
    }
}