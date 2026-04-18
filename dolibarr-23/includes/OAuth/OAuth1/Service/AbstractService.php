<?php

namespace OAuth\OAuth1\Service;

abstract class AbstractService extends \OAuth\Common\Service\AbstractService implements \OAuth\OAuth1\Service\ServiceInterface
{
    /** @const OAUTH_VERSION */
    const OAUTH_VERSION = 1;
    /** @var SignatureInterface */
    protected $signature;
    /** @var UriInterface|null */
    protected $baseApiUri;
    /**
     * {@inheritDoc}
     */
    public function __construct(\OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Http\Client\ClientInterface $httpClient, \OAuth\Common\Storage\TokenStorageInterface $storage, \OAuth\OAuth1\Signature\SignatureInterface $signature, \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null)
    {
    }
    /**
     * {@inheritDoc}
     */
    public function requestRequestToken()
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getAuthorizationUri(array $additionalParameters = array())
    {
    }
    /**
     * {@inheritDoc}
     */
    public function requestAccessToken($token, $verifier, $tokenSecret = null)
    {
    }
    /**
     * Refreshes an OAuth1 access token
     * @param  TokenInterface $token
     * @return TokenInterface $token
     */
    public function refreshAccessToken(\OAuth\OAuth1\Token\TokenInterface $token)
    {
    }
    /**
     * Sends an authenticated API request to the path provided.
     * If the path provided is not an absolute URI, the base API Uri (must be passed into constructor) will be used.
     *
     * @param string|UriInterface $path
     * @param string              $method       HTTP method
     * @param array               $body         Request body if applicable (key/value pairs)
     * @param array               $extraHeaders Extra headers if applicable.
     *                                          These will override service-specific any defaults.
     *
     * @return string
     */
    public function request($path, $method = 'GET', $body = null, array $extraHeaders = array())
    {
    }
    /**
     * Return any additional headers always needed for this service implementation's OAuth calls.
     *
     * @return array
     */
    protected function getExtraOAuthHeaders()
    {
    }
    /**
     * Return any additional headers always needed for this service implementation's API calls.
     *
     * @return array
     */
    protected function getExtraApiHeaders()
    {
    }
    /**
     * Builds the authorization header for getting an access or request token.
     *
     * @param array $extraParameters
     *
     * @return string
     */
    protected function buildAuthorizationHeaderForTokenRequest(array $extraParameters = array())
    {
    }
    /**
     * Builds the authorization header for an authenticated API request
     *
     * @param string         $method
     * @param UriInterface   $uri        The uri the request is headed
     * @param TokenInterface $token
     * @param array          $bodyParams Request body if applicable (key/value pairs)
     *
     * @return string
     */
    protected function buildAuthorizationHeaderForAPIRequest($method, \OAuth\Common\Http\Uri\UriInterface $uri, \OAuth\OAuth1\Token\TokenInterface $token, $bodyParams = null)
    {
    }
    /**
     * Builds the authorization header array.
     *
     * @return array
     */
    protected function getBasicAuthorizationHeaderInfo()
    {
    }
    /**
     * Pseudo random string generator used to build a unique string to sign each request
     *
     * @param int $length
     *
     * @return string
     */
    protected function generateNonce($length = 32)
    {
    }
    /**
     * @return string
     */
    protected function getSignatureMethod()
    {
    }
    /**
     * This returns the version used in the authorization header of the requests
     *
     * @return string
     */
    protected function getVersion()
    {
    }
    /**
     * Parses the request token response and returns a TokenInterface.
     * This is only needed to verify the `oauth_callback_confirmed` parameter. The actual
     * parsing logic is contained in the access token parser.
     *
     * @abstract
     *
     * @param string $responseBody
     *
     * @return TokenInterface
     *
     * @throws TokenResponseException
     */
    protected abstract function parseRequestTokenResponse($responseBody);
    /**
     * Parses the access token response and returns a TokenInterface.
     *
     * @abstract
     *
     * @param string $responseBody
     *
     * @return TokenInterface
     *
     * @throws TokenResponseException
     */
    protected abstract function parseAccessTokenResponse($responseBody);
}