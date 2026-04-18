<?php

namespace OAuth\OAuth2\Service;

/**
 * Microsoft Exchange Online OAuth2 service (SMTP/IMAP)
 *
 * Uses Exchange Online OAuth2 scopes for legacy protocols (SMTP/IMAP):
 *   - offline_access (required for refresh token)
 *   - https://outlook.office.com/SMTP.Send
 *   - https://outlook.office.com/IMAP.AccessAsUser.All
 */
class Microsoft3 extends \OAuth\OAuth2\Service\AbstractService
{
    // offline_access is resource-neutral, allowed with any resource scope
    const SCOPE_OFFLINE_ACCESS = 'offline_access';
    // Exchange Online scopes for SMTP/IMAP XOAUTH2 protocol authentication.
    // MUST NOT be mixed with Microsoft Graph scopes (openid/profile/email/User.Read)
    // in the same token request — doing so causes error AADSTS28000.
    // Azure app registration requires: Microsoft Graph > Delegated > SMTP.Send and IMAP.AccessAsUser.All
    // See: https://learn.microsoft.com/en-us/exchange/client-developer/legacy-protocols/how-to-authenticate-an-imap-pop-smtp-application-by-using-oauth
    const SCOPE_SMTP_SEND = 'https://outlook.office.com/SMTP.Send';
    const SCOPE_IMAP_ACCESSASUSERALL = 'https://outlook.office.com/IMAP.AccessAsUser.All';
    protected $storage;
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
    public function getAuthorizationMethod()
    {
    }
    /**
     * {@inheritdoc}
     */
    protected function parseAccessTokenResponse($responseBody)
    {
    }
}