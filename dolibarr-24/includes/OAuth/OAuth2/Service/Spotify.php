<?php

namespace OAuth\OAuth2\Service;

class Spotify extends \OAuth\OAuth2\Service\AbstractService
{
    /**
     * Scopes
     *
     * @var string
     */
    const SCOPE_PLAYLIST_MODIFY_PUBLIC = 'playlist-modify-public';
    const SCOPE_PLAYLIST_MODIFY_PRIVATE = 'playlist-modify-private';
    const SCOPE_PLAYLIST_READ_PRIVATE = 'playlist-read-private';
    const SCOPE_STREAMING = 'streaming';
    const SCOPE_USER_LIBRARY_MODIFY = 'user-library-modify';
    const SCOPE_USER_LIBRARY_READ = 'user-library-read';
    const SCOPE_USER_READ_PRIVATE = 'user-read-private';
    const SCOPE_USER_READ_EMAIL = 'user-read-email';
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