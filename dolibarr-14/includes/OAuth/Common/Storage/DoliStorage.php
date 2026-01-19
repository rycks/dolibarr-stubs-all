<?php

namespace OAuth\Common\Storage;

class DoliStorage implements \OAuth\Common\Storage\TokenStorageInterface
{
    /**
     * @var DoliDB Database handler
     */
    protected $db;
    /**
     * @var object|TokenInterface
     */
    protected $tokens;
    /**
     * @var string Error code (or message)
     */
    public $error;
    /**
     * @var string[] Several error codes (or messages)
     */
    public $errors = array();
    private $conf;
    private $key;
    private $stateKey;
    /**
     * @param Conf   $conf
     * @param string $key
     * @param string $stateKey
     */
    public function __construct(\DoliDB $db, $conf)
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