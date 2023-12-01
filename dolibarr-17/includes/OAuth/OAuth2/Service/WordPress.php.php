<?php

namespace OAuth\OAuth2\Service;

/**
 * Class For WordPress OAuth
 */
class WordPress extends \OAuth\OAuth2\Service\AbstractService
{
    /**
     * @var string
     */
    protected $accessType = 'online';
    /**
     * Construct
     *
     * @param CredentialsInterface $credentials credentials
     * @param ClientInterface $httpClient httpClient
     * @param TokenStorageInterface $storage storage
     * @param $scopes scope
     * @param UriInterface|null $baseApiUri baseApiUri
     * @throws Exception\InvalidScopeException
     */
    public function __construct(\OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Http\Client\ClientInterface $httpClient, \OAuth\Common\Storage\TokenStorageInterface $storage, $scopes = array(), \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null)
    {
    }
    /*
    	// LDR CHANGE Add approval_prompt to force the prompt if value is set to 'force' so it force return of a "refresh token" in addition to "standard token"
    	public $approvalPrompt='auto';
    	public function setApprouvalPrompt($prompt)
    	{
    		if (!in_array($prompt, array('auto', 'force'), true)) {
    			// @todo Maybe could we rename this exception
    			throw new InvalidAccessTypeException('Invalid approuvalPrompt, expected either auto or force.');
    		}
    		$this->approvalPrompt = $prompt;
    	}*/
    /**
     * @return Uri
     */
    public function getAuthorizationEndpoint()
    {
    }
    /**
     * @return Uri
     */
    public function getAccessTokenEndpoint()
    {
    }
    /**
     * @return int
     */
    protected function getAuthorizationMethod()
    {
    }
    /**
     * @param $responseBody responseBody
     * @return StdOAuth2Token
     * @throws TokenResponseException
     */
    protected function parseAccessTokenResponse($responseBody)
    {
    }
}