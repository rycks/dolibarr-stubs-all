<?php

namespace OAuth\OAuth2\Service;

/**
 * Class EveOnline
 */
class EveOnline extends \OAuth\OAuth2\Service\AbstractService
{
    public function __construct(\OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Http\Client\ClientInterface $httpClient, \OAuth\Common\Storage\TokenStorageInterface $storage, $scopes = array(), \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null)
    {
    }
    /**
     * Returns the authorization API endpoint.
     * @return UriInterface
     */
    public function getAuthorizationEndpoint()
    {
    }
    /**
     * Returns the access token API endpoint.
     * @return UriInterface
     */
    public function getAccessTokenEndpoint()
    {
    }
    /**
     * Parses the access token response and returns a TokenInterface.
     *
     * @param string $responseBody
     *
     * @return TokenInterface
     * @throws TokenResponseException
     */
    protected function parseAccessTokenResponse($responseBody)
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function getAuthorizationMethod()
    {
    }
}