<?php

namespace OAuth\OAuth2\Service;

class Vkontakte extends \OAuth\OAuth2\Service\AbstractService
{
    /**
     * Defined scopes
     *
     * @link http://vk.com/dev/permissions
     */
    const SCOPE_EMAIL = 'email';
    const SCOPE_NOTIFY = 'notify';
    const SCOPE_FRIENDS = 'friends';
    const SCOPE_PHOTOS = 'photos';
    const SCOPE_AUDIO = 'audio';
    const SCOPE_VIDEO = 'video';
    const SCOPE_DOCS = 'docs';
    const SCOPE_NOTES = 'notes';
    const SCOPE_PAGES = 'pages';
    const SCOPE_APP_LINK = '';
    const SCOPE_STATUS = 'status';
    const SCOPE_OFFERS = 'offers';
    const SCOPE_QUESTIONS = 'questions';
    const SCOPE_WALL = 'wall';
    const SCOPE_GROUPS = 'groups';
    const SCOPE_MESSAGES = 'messages';
    const SCOPE_NOTIFICATIONS = 'notifications';
    const SCOPE_STATS = 'stats';
    const SCOPE_ADS = 'ads';
    const SCOPE_OFFLINE = 'offline';
    const SCOPE_NOHTTPS = 'nohttps';
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
    /**
     * {@inheritdoc}
     */
    protected function getAuthorizationMethod()
    {
    }
}