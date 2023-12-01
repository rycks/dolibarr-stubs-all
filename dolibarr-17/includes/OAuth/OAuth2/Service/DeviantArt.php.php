<?php

namespace OAuth\OAuth2\Service;

class DeviantArt extends \OAuth\OAuth2\Service\AbstractService
{
    /**
     * DeviantArt www url - used to build dialog urls
     */
    const WWW_URL = 'https://www.deviantart.com/';
    /**
     * Defined scopes
     *
     * If you don't think this is scary you should not be allowed on the web at all
     *
     * @link https://www.deviantart.com/developers/authentication
     * @link https://www.deviantart.com/developers/http/v1/20150217
     */
    const SCOPE_FEED = 'feed';
    const SCOPE_BROWSE = 'browse';
    const SCOPE_COMMENT = 'comment.post';
    const SCOPE_STASH = 'stash';
    const SCOPE_USER = 'user';
    const SCOPE_USERMANAGE = 'user.manage';
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
    protected function parseAccessTokenResponse($responseBody)
    {
    }
}