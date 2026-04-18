<?php

namespace OAuth\OAuth2\Service;

/**
 * Hubic service.
 *
 * @author  Pedro Amorim <contact@pamorim.fr>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @link    https://api.hubic.com/docs/
 */
class Hubic extends \OAuth\OAuth2\Service\AbstractService
{
    // Scopes
    const SCOPE_USAGE_GET = 'usage.r';
    const SCOPE_ACCOUNT_GET = 'account.r';
    const SCOPE_GETALLLINKS_GET = 'getAllLinks.r';
    const SCOPE_CREDENTIALS_GET = 'credentials.r';
    const SCOPE_SPONSORCODE_GET = 'sponsorCode.r';
    const SCOPE_ACTIVATE_POST = 'activate.w';
    const SCOPE_SPONSORED_GET = 'sponsored.r';
    const SCOPE_LINKS_GET = 'links.r';
    const SCOPE_LINKS_POST = 'links.rw';
    const SCOPE_LINKS_ALL = 'links.drw';
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
    /**
     * {@inheritdoc}
     */
    public function getAuthorizationUri(array $additionalParameters = array())
    {
    }
}