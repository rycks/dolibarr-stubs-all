<?php

namespace OAuth\OAuth2\Service;

/**
 * Heroku service.
 *
 * @author Thomas Welton <thomaswelton@me.com>
 * @link https://devcenter.heroku.com/articles/oauth
 */
class Heroku extends \OAuth\OAuth2\Service\AbstractService
{
    /**
     * Defined scopes
     * @link https://devcenter.heroku.com/articles/oauth#scopes
     */
    const SCOPE_GLOBAL = 'global';
    const SCOPE_IDENTITY = 'identity';
    const SCOPE_READ = 'read';
    const SCOPE_WRITE = 'write';
    const SCOPE_READ_PROTECTED = 'read-protected';
    const SCOPE_WRITE_PROTECTED = 'write-protected';
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
    /**
     * {@inheritdoc}
     */
    protected function getExtraApiHeaders()
    {
    }
}