<?php

namespace OAuth\OAuth2\Service;

/**
 * Vimeo service.
 *
 * @author  Pedro Amorim <contact@pamorim.fr>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @link    https://developer.vimeo.com/
 * @link    https://developer.vimeo.com/api/authentication
 */
class Vimeo extends \OAuth\OAuth2\Service\AbstractService
{
    // API version
    const VERSION = '3.2';
    // API Header Accept
    const HEADER_ACCEPT = 'application/vnd.vimeo.*+json;version=3.2';
    /**
     * Scopes
     * @see  https://developer.vimeo.com/api/authentication#scope
     */
    // View public videos
    const SCOPE_PUBLIC = 'public';
    // View private videos
    const SCOPE_PRIVATE = 'private';
    // View Vimeo On Demand purchase history
    const SCOPE_PURCHASED = 'purchased';
    // Create new videos, groups, albums, etc.
    const SCOPE_CREATE = 'create';
    // Edit videos, groups, albums, etc.
    const SCOPE_EDIT = 'edit';
    // Delete videos, groups, albums, etc.
    const SCOPE_DELETE = 'delete';
    // Interact with a video on behalf of a user, such as liking
    // a video or adding it to your watch later queue
    const SCOPE_INTERACT = 'interact';
    // Upload a video
    const SCOPE_UPLOAD = 'upload';
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
    protected function getExtraOAuthHeaders()
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function getExtraApiHeaders()
    {
    }
}