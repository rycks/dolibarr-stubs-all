<?php

namespace OAuth\OAuth1\Service;

class Twitter extends \OAuth\OAuth1\Service\AbstractService
{
    const ENDPOINT_AUTHENTICATE = "https://api.twitter.com/oauth/authenticate";
    const ENDPOINT_AUTHORIZE = "https://api.twitter.com/oauth/authorize";
    protected $authorizationEndpoint = self::ENDPOINT_AUTHENTICATE;
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
     * @param string $authorizationEndpoint
     *
     * @throws Exception
     */
    public function setAuthorizationEndpoint($endpoint)
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