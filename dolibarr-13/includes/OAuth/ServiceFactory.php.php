<?php

namespace OAuth;

class ServiceFactory
{
    /**
     *@var ClientInterface
     */
    protected $httpClient;
    /**
     * @var array
     */
    protected $serviceClassMap = array('OAuth1' => array(), 'OAuth2' => array());
    /**
     * @var array
     */
    protected $serviceBuilders = array('OAuth2' => 'buildV2Service', 'OAuth1' => 'buildV1Service');
    /**
     * @param ClientInterface $httpClient
     *
     * @return ServiceFactory
     */
    public function setHttpClient(\OAuth\Common\Http\Client\ClientInterface $httpClient)
    {
    }
    /**
     * Register a custom service to classname mapping.
     *
     * @param string $serviceName Name of the service
     * @param string $className   Class to instantiate
     *
     * @return ServiceFactory
     *
     * @throws Exception If the class is nonexistent or does not implement a valid ServiceInterface
     */
    public function registerService($serviceName, $className)
    {
    }
    /**
     * Builds and returns oauth services
     *
     * It will first try to build an OAuth2 service and if none found it will try to build an OAuth1 service
     *
     * @param string                $serviceName Name of service to create
     * @param CredentialsInterface  $credentials
     * @param TokenStorageInterface $storage
     * @param array|null            $scopes      If creating an oauth2 service, array of scopes
     * @param UriInterface|null     $baseApiUri
     * @param string                $apiVersion version of the api call
     *
     * @return ServiceInterface
     */
    public function createService($serviceName, \OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Storage\TokenStorageInterface $storage, $scopes = array(), \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null, $apiVersion = "")
    {
    }
    /**
     * Gets the fully qualified name of the service
     *
     * @param string $serviceName The name of the service of which to get the fully qualified name
     * @param string $type        The type of the service to get (either OAuth1 or OAuth2)
     *
     * @return string The fully qualified name of the service
     */
    private function getFullyQualifiedServiceName($serviceName, $type)
    {
    }
    /**
     * Builds v2 services
     *
     * @param string                $serviceName The fully qualified service name
     * @param CredentialsInterface  $credentials
     * @param TokenStorageInterface $storage
     * @param array|null            $scopes      Array of scopes for the service
     * @param UriInterface|null     $baseApiUri
     *
     * @return ServiceInterface
     *
     * @throws Exception
     */
    private function buildV2Service($serviceName, \OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Storage\TokenStorageInterface $storage, array $scopes, \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null, $apiVersion = "")
    {
    }
    /**
     * Resolves scopes for v2 services
     *
     * @param string  $serviceName The fully qualified service name
     * @param array   $scopes      List of scopes for the service
     *
     * @return array List of resolved scopes
     */
    private function resolveScopes($serviceName, array $scopes)
    {
    }
    /**
     * Builds v1 services
     *
     * @param string                $serviceName The fully qualified service name
     * @param CredentialsInterface  $credentials
     * @param TokenStorageInterface $storage
     * @param array                 $scopes
     * @param UriInterface          $baseApiUri
     *
     * @return ServiceInterface
     *
     * @throws Exception
     */
    private function buildV1Service($serviceName, \OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Storage\TokenStorageInterface $storage, $scopes, \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null)
    {
    }
}