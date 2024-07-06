<?php

namespace OAuth\OAuth2\Service;

/**
 * Strava service.
 *
 * @author  Pedro Amorim <contact@pamorim.fr>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @link    http://strava.github.io/
 * @link    http://strava.github.io/api/v3/oauth/
 */
class Strava extends \OAuth\OAuth2\Service\AbstractService
{
    /**
     * Scopes
     */
    // default
    const SCOPE_PUBLIC = 'public';
    // Modify activities, upload on the user’s behalf
    const SCOPE_WRITE = 'write';
    // View private activities and data within privacy zones
    const SCOPE_VIEW_PRIVATE = 'view_private';
    protected $approvalPrompt = 'auto';
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
    public function setApprouvalPrompt($prompt)
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function getScopesDelimiter()
    {
    }
}