<?php

namespace OAuth\Common\Storage;

/*
 * Stores a token in a Redis server. Requires the Predis library available at https://github.com/nrk/predis
 */
class Redis implements \OAuth\Common\Storage\TokenStorageInterface
{
    /**
     * @var string
     */
    protected $key;
    protected $stateKey;
    /**
     * @var object|\Redis
     */
    protected $redis;
    /**
     * @var object|TokenInterface
     */
    protected $cachedTokens;
    /**
     * @var object
     */
    protected $cachedStates;
    /**
     * @param Predis $redis An instantiated and connected redis client
     * @param string $key The key to store the token under in redis
     * @param string $stateKey The key to store the state under in redis.
     */
    public function __construct(\Predis\Client $redis, $key, $stateKey)
    {
    }
    /**
     * {@inheritDoc}
     */
    public function retrieveAccessToken($service)
    {
    }
    /**
     * {@inheritDoc}
     */
    public function storeAccessToken($service, \OAuth\Common\Token\TokenInterface $token)
    {
    }
    /**
     * {@inheritDoc}
     */
    public function hasAccessToken($service)
    {
    }
    /**
     * {@inheritDoc}
     */
    public function clearToken($service)
    {
    }
    /**
     * {@inheritDoc}
     */
    public function clearAllTokens()
    {
    }
    /**
     * {@inheritDoc}
     */
    public function retrieveAuthorizationState($service)
    {
    }
    /**
     * {@inheritDoc}
     */
    public function storeAuthorizationState($service, $state)
    {
    }
    /**
     * {@inheritDoc}
     */
    public function hasAuthorizationState($service)
    {
    }
    /**
     * {@inheritDoc}
     */
    public function clearAuthorizationState($service)
    {
    }
    /**
     * {@inheritDoc}
     */
    public function clearAllAuthorizationStates()
    {
    }
    /**
     * @return Predis $redis
     */
    public function getRedis()
    {
    }
    /**
     * @return string $key
     */
    public function getKey()
    {
    }
}