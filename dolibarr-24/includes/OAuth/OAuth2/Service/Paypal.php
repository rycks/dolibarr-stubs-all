<?php

namespace OAuth\OAuth2\Service;

/**
 * PayPal service.
 *
 * @author Flávio Heleno <flaviohbatista@gmail.com>
 * @link https://developer.paypal.com/webapps/developer/docs/integration/direct/log-in-with-paypal/detailed/
 */
class Paypal extends \OAuth\OAuth2\Service\AbstractService
{
    /**
     * Defined scopes
     * @link https://developer.paypal.com/webapps/developer/docs/integration/direct/log-in-with-paypal/detailed/
     * @see  #attributes
     */
    const SCOPE_OPENID = 'openid';
    const SCOPE_PROFILE = 'profile';
    const SCOPE_PAYPALATTRIBUTES = 'https://uri.paypal.com/services/paypalattributes';
    const SCOPE_EMAIL = 'email';
    const SCOPE_ADDRESS = 'address';
    const SCOPE_PHONE = 'phone';
    const SCOPE_EXPRESSCHECKOUT = 'https://uri.paypal.com/services/expresscheckout';
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