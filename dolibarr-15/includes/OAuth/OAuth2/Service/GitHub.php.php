<?php

namespace OAuth\OAuth2\Service;

class GitHub extends \OAuth\OAuth2\Service\AbstractService
{
    /**
     * Defined scopes, see http://developer.github.com/v3/oauth/ for definitions.
     */
    /**
     * Public read-only access (includes public user profile info, public repo info, and gists)
     */
    const SCOPE_READONLY = '';
    /**
     * Read/write access to profile info only.
     *
     * Includes SCOPE_USER_EMAIL and SCOPE_USER_FOLLOW.
     */
    const SCOPE_USER = 'user';
    /**
     * Read access to a user’s email addresses.
     */
    const SCOPE_USER_EMAIL = 'user:email';
    /**
     * Access to follow or unfollow other users.
     */
    const SCOPE_USER_FOLLOW = 'user:follow';
    /**
     * Read/write access to public repos and organizations.
     */
    const SCOPE_PUBLIC_REPO = 'public_repo';
    /**
     * Read/write access to public and private repos and organizations.
     *
     * Includes SCOPE_REPO_STATUS.
     */
    const SCOPE_REPO = 'repo';
    /**
     * Grants access to deployment statuses for public and private repositories.
     * This scope is only necessary to grant other users or services access to deployment statuses,
     * without granting access to the code.
     */
    const SCOPE_REPO_DEPLOYMENT = 'repo_deployment';
    /**
     * Read/write access to public and private repository commit statuses. This scope is only necessary to grant other
     * users or services access to private repository commit statuses without granting access to the code. The repo and
     * public_repo scopes already include access to commit status for private and public repositories, respectively.
     */
    const SCOPE_REPO_STATUS = 'repo:status';
    /**
     * Delete access to adminable repositories.
     */
    const SCOPE_DELETE_REPO = 'delete_repo';
    /**
     * Read access to a user’s notifications. repo is accepted too.
     */
    const SCOPE_NOTIFICATIONS = 'notifications';
    /**
     * Write access to gists.
     */
    const SCOPE_GIST = 'gist';
    /**
     * Grants read and ping access to hooks in public or private repositories.
     */
    const SCOPE_HOOKS_READ = 'read:repo_hook';
    /**
     * Grants read, write, and ping access to hooks in public or private repositories.
     */
    const SCOPE_HOOKS_WRITE = 'write:repo_hook';
    /**
     * Grants read, write, ping, and delete access to hooks in public or private repositories.
     */
    const SCOPE_HOOKS_ADMIN = 'admin:repo_hook';
    /**
     * Read-only access to organization, teams, and membership.
     */
    const SCOPE_ORG_READ = 'read:org';
    /**
     * Publicize and unpublicize organization membership.
     */
    const SCOPE_ORG_WRITE = 'write:org';
    /**
     * Fully manage organization, teams, and memberships.
     */
    const SCOPE_ORG_ADMIN = 'admin:org';
    /**
     * List and view details for public keys.
     */
    const SCOPE_PUBLIC_KEY_READ = 'read:public_key';
    /**
     * Create, list, and view details for public keys.
     */
    const SCOPE_PUBLIC_KEY_WRITE = 'write:public_key';
    /**
     * Fully manage public keys.
     */
    const SCOPE_PUBLIC_KEY_ADMIN = 'admin:public_key';
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
     * Used to configure response type -- we want JSON from github, default is query string format
     *
     * @return array
     */
    protected function getExtraOAuthHeaders()
    {
    }
    /**
     * Required for GitHub API calls.
     *
     * @return array
     */
    protected function getExtraApiHeaders()
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function getScopesDelimiter()
    {
    }
}