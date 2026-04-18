<?php

namespace OAuth\Common\Storage;

/*
 * Stores a token in-memory only (destroyed at end of script execution).
 */
class Memory implements \OAuth\Common\Storage\TokenStorageInterface
{
    /**
     * @var object|TokenInterface
     */
    protected $tokens;
    /**
     * @var array
     */
    protected $states;
    public function __construct()
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
}