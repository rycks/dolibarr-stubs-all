<?php

namespace Sabre\HTTP\Auth;

/**
 * HTTP Authentication base class.
 *
 * This class provides some common functionality for the various base classes.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
abstract class AbstractAuth
{
    /**
     * Authentication realm
     *
     * @var string
     */
    protected $realm;
    /**
     * Request object
     *
     * @var RequestInterface
     */
    protected $request;
    /**
     * Response object
     *
     * @var ResponseInterface
     */
    protected $response;
    /**
     * Creates the object
     *
     * @param string $realm
     * @return void
     */
    function __construct($realm = 'SabreTooth', \Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * This method sends the needed HTTP header and statuscode (401) to force
     * the user to login.
     *
     * @return void
     */
    abstract function requireLogin();
    /**
     * Returns the HTTP realm
     *
     * @return string
     */
    function getRealm()
    {
    }
}