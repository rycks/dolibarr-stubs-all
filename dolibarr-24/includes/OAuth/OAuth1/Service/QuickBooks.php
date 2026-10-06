<?php

namespace OAuth\OAuth1\Service;

class QuickBooks extends \OAuth\OAuth1\Service\AbstractService
{
    /**
     * {@inheritdoc}
     */
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
     * {@inheritDoc}
     */
    public function request($path, $method = 'GET', $body = null, array $extraHeaders = array())
    {
    }
}