<?php

namespace OAuth\OAuth2\Service;

/**
 * Linkedin service.
 *
 * @author Antoine Corcy <contact@sbin.dk>
 * @link http://developer.linkedin.com/documents/authentication
 */
class Linkedin extends \OAuth\OAuth2\Service\AbstractService
{
    /**
     * Defined scopes
     * @link http://developer.linkedin.com/documents/authentication#granting
     */
    const SCOPE_R_BASICPROFILE = 'r_basicprofile';
    const SCOPE_R_FULLPROFILE = 'r_fullprofile';
    const SCOPE_R_EMAILADDRESS = 'r_emailaddress';
    const SCOPE_R_NETWORK = 'r_network';
    const SCOPE_R_CONTACTINFO = 'r_contactinfo';
    const SCOPE_RW_NUS = 'rw_nus';
    const SCOPE_RW_COMPANY_ADMIN = 'rw_company_admin';
    const SCOPE_RW_GROUPS = 'rw_groups';
    const SCOPE_W_MESSAGES = 'w_messages';
    const SCOPE_W_SHARE = 'w_share';
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
}