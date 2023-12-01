<?php

namespace OAuth\OAuth1\Service;

class Redmine extends \OAuth\OAuth1\Service\AbstractService
{
    public function __construct(\OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Http\Client\ClientInterface $httpClient, \OAuth\Common\Storage\TokenStorageInterface $storage, \OAuth\OAuth1\Signature\SignatureInterface $signature, \OAuth\Common\Http\Uri\UriInterface $baseApiUri)
    {
    }
    /**
     * {@inheritDoc}
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
}