<?php

namespace OAuth\Common\Service;

/**
 * Abstract OAuth service, version-agnostic
 */
abstract class AbstractService implements \OAuth\Common\Service\ServiceInterface
{
    /** @var Credentials */
    protected $credentials;
    /** @var ClientInterface */
    protected $httpClient;
    /** @var TokenStorageInterface */
    protected $storage;
    /**
     * @param CredentialsInterface  $credentials
     * @param ClientInterface       $httpClient
     * @param TokenStorageInterface $storage
     */
    public function __construct(\OAuth\Common\Consumer\CredentialsInterface $credentials, \OAuth\Common\Http\Client\ClientInterface $httpClient, \OAuth\Common\Storage\TokenStorageInterface $storage)
    {
    }
    /**
     * @param UriInterface|string $path
     * @param UriInterface        $baseApiUri
     *
     * @return UriInterface
     *
     * @throws Exception
     */
    protected function determineRequestUriFromPath($path, \OAuth\Common\Http\Uri\UriInterface $baseApiUri = null)
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
     * @return string
     */
    public function service()
    {
    }
}