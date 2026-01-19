<?php

namespace OAuth\OAuth1\Service;

class Etsy extends \OAuth\OAuth1\Service\AbstractService
{
    protected $scopes = array();
    public function __construct(\OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Http\Client\ClientInterface $httpClient, \OAuth\Common\Storage\TokenStorageInterface $storage, \OAuth\OAuth1\Signature\SignatureInterface $signature, \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null)
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
    protected function parseRequestTokenResponse($responseBody)
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function parseAccessTokenResponse($responseBody)
    {
    }
    /**
     * Set the scopes for permissions
     * @see https://www.etsy.com/developers/documentation/getting_started/oauth#section_permission_scopes
     * @param array $scopes
     *
     * @return $this
     */
    public function setScopes(array $scopes)
    {
    }
    /**
     * Return the defined scopes
     * @return array
     */
    public function getScopes()
    {
    }
}