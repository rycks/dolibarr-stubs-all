<?php

namespace OAuth\Common\Storage;

class SymfonySession implements \OAuth\Common\Storage\TokenStorageInterface
{
    private $session;
    private $sessionVariableName;
    private $stateVariableName;
    /**
     * @param SessionInterface $session
     * @param bool $startSession
     * @param string $sessionVariableName
     * @param string $stateVariableName
     */
    public function __construct(\Symfony\Component\HttpFoundation\Session\SessionInterface $session, $startSession = true, $sessionVariableName = 'lusitanian_oauth_token', $stateVariableName = 'lusitanian_oauth_state')
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
     * @return Session
     */
    public function getSession()
    {
    }
}