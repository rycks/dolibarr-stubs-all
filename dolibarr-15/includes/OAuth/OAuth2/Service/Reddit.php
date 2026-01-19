<?php

namespace OAuth\OAuth2\Service;

class Reddit extends \OAuth\OAuth2\Service\AbstractService
{
    /**
     * Defined scopes
     *
     * @link http://www.reddit.com/dev/api/oauth
     */
    // User scopes
    const SCOPE_EDIT = 'edit';
    const SCOPE_HISTORY = 'history';
    const SCOPE_IDENTITY = 'identity';
    const SCOPE_MYSUBREDDITS = 'mysubreddits';
    const SCOPE_PRIVATEMESSAGES = 'privatemessages';
    const SCOPE_READ = 'read';
    const SCOPE_SAVE = 'save';
    const SCOPE_SUBMIT = 'submit';
    const SCOPE_SUBSCRIBE = 'subscribe';
    const SCOPE_VOTE = 'vote';
    // Mod Scopes
    const SCOPE_MODCONFIG = 'modconfig';
    const SCOPE_MODFLAIR = 'modflair';
    const SCOPE_MODLOG = 'modlog';
    const SCOPE_MODPOST = 'modpost';
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