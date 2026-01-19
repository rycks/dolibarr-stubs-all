<?php

namespace OAuth\Common\Storage;

/**
 * Class to manage storage of OAUTH2 in Dolibarr
 */
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
    //private $stateKey;
    private $keyforprovider;
    public $token;
    private $tenant;
    public $state;
    public $date_creation;
    public $date_modification;
    /**
     * @param 	DoliDB 	$db					Database handler
     * @param 	Conf 	$conf				Conf object
     * @param	string	$keyforprovider		Key to manage several providers of the same type. For example 'abc' will be added to 'Google' to defined storage key.
     */
    public function __construct(\DoliDB $db, $conf, $keyforprovider = '')
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
    public function storeAccessToken($service, \OAuth\Common\Token\TokenInterface $tokenobj)
    {
    }
    /**
     * 	Load token and other data from a $service
     *  Note: Token load are cumulated into array ->tokens when other properties are erased by last loaded token.
     *
     *  @return void
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
     * Return the token
     *
     * @return string	String for the tenant used to create the token
     */
    public function getTenant()
    {
    }
}