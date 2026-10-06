<?php

namespace OAuth\OAuth2\Service;

/**
 * Dailymotion service.
 *
 * @author Mouhamed SEYE <mouhamed@seye.pro>
 * @link http://www.dailymotion.com/doc/api/authentication.html
 */
class Dailymotion extends \OAuth\OAuth2\Service\AbstractService
{
    /**
     * Scopes
     *
     * @var string
     */
    const SCOPE_EMAIL = 'email', SCOPE_PROFILE = 'userinfo', SCOPE_VIDEOS = 'manage_videos', SCOPE_COMMENTS = 'manage_comments', SCOPE_PLAYLIST = 'manage_playlists', SCOPE_TILES = 'manage_tiles', SCOPE_SUBSCRIPTIONS = 'manage_subscriptions', SCOPE_FRIENDS = 'manage_friends', SCOPE_FAVORITES = 'manage_favorites', SCOPE_GROUPS = 'manage_groups';
    /**
     * Dialog form factors
     *
     * @var string
     */
    const DISPLAY_PAGE = 'page', DISPLAY_POPUP = 'popup', DISPLAY_MOBILE = 'mobile';
    /**
     * {@inheritdoc}
     */
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
}