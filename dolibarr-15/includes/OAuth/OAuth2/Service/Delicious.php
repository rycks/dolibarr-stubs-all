<?php

namespace OAuth\OAuth2\Service;

/**
 * Delicious service.
 *
 * @author  Pedro Amorim <contact@pamorim.fr>
 * @license http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link    https://github.com/SciDevs/delicious-api/blob/master/api/oauth.md
 */
class Delicious extends \OAuth\OAuth2\Service\AbstractService
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
    protected function parseAccessTokenResponse($responseBody)
    {
    }
    // Special, delicious didn't respect the oauth2 RFC and need a grant_type='code'
    /**
     * {@inheritdoc}
     */
    public function requestAccessToken($code, $state = null)
    {
    }
}