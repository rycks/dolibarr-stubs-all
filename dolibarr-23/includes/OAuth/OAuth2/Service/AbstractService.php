<?php

namespace OAuth\OAuth2\Service;

abstract class AbstractService extends \OAuth\Common\Service\AbstractService implements \OAuth\OAuth2\Service\ServiceInterface
{
    /** @const OAUTH_VERSION */
    const OAUTH_VERSION = 2;
    /** @var array */
    protected $scopes;
    /** @var UriInterface|null */
    protected $baseApiUri;
    /** @var bool */
    protected $stateParameterInAuthUrl;
    /** @var string */
    protected $apiVersion;
    /**
     * @param CredentialsInterface  $credentials
     * @param ClientInterface       $httpClient
     * @param TokenStorageInterface $storage
     * @param array                 $scopes
     * @param UriInterface|null     $baseApiUri
     * @param bool $stateParameterInAutUrl
     * @param string                $apiVersion
     *
     * @throws InvalidScopeException
     */
    public function __construct(\OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Http\Client\ClientInterface $httpClient, \OAuth\Common\Storage\TokenStorageInterface $storage, $scopes = array(), \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null, $stateParameterInAutUrl = false, $apiVersion = "")
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getAuthorizationUri(array $additionalParameters = array())
    {
    }
    /**
     * {@inheritdoc}
     */
    public function requestAccessToken($code, $state = null)
    {
    }
    /**
     * Sends an authenticated API request to the path provided.
     * If the path provided is not an absolute URI, the base API Uri (must be passed into constructor) will be used.
     *
     * @param string|UriInterface $path
     * @param string              $method       HTTP method
     * @param array               $body         Request body if applicable.
     * @param array               $extraHeaders Extra headers if applicable. These will override service-specific
     *                                          any defaults.
     *
     * @return string
     *
     * @throws ExpiredTokenException
     * @throws Exception
     */
    public function request($path, $method = 'GET', $body = null, array $extraHeaders = array())
    {
    }
    /**
     * Accessor to the storage adapter to be able to retrieve tokens
     *
     * @return TokenStorageInterface
     */
    public function getStorage()
    {
    }
    /**
     * Refreshes an OAuth2 access token.
     *
     * @param TokenInterface $token
     *
     * @return TokenInterface $token
     *
     * @throws MissingRefreshTokenException
     */
    public function refreshAccessToken(\OAuth\Common\Token\TokenInterface $token)
    {
    }
    /**
     * Return whether or not the passed scope value is valid.
     *
     * @param string $scope
     *
     * @return bool
     */
    public function isValidScope($scope)
    {
    }
    /**
     * Check if the given service need to generate a unique state token to build the authorization url
     *
     * @return bool
     */
    public function needsStateParameterInAuthUrl()
    {
    }
    /**
     * Validates the authorization state against a given one
     *
     * @param string $state
     * @throws InvalidAuthorizationStateException
     */
    protected function validateAuthorizationState($state)
    {
    }
    /**
     * Generates a random string to be used as state
     *
     * @return string
     */
    protected function generateAuthorizationState()
    {
    }
    /**
     * Retrieves the authorization state for the current service
     *
     * @return string
     */
    protected function retrieveAuthorizationState()
    {
    }
    /**
     * Stores a given authorization state into the storage
     *
     * @param string $state
     */
    protected function storeAuthorizationState($state)
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
    /**
     * Returns a class constant from ServiceInterface defining the authorization method used for the API
     * Header is the sane default.
     *
     * @return int
     */
    protected function getAuthorizationMethod()
    {
    }
    /**
     * Returns api version string if is set else retrun empty string
     *
     * @return string
     */
    protected function getApiVersionString()
    {
    }
    /**
     * Returns delimiter to scopes in getAuthorizationUri
     * For services that do not fully respect the Oauth's RFC,
     * and use scopes with commas as delimiter
     *
     * @return string
     */
    protected function getScopesDelimiter()
    {
    }
}