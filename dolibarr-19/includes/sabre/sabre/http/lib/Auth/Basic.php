<?php

namespace Sabre\HTTP\Auth;

/**
 * HTTP Basic authentication utility.
 *
 * This class helps you setup basic auth. The process is fairly simple:
 *
 * 1. Instantiate the class.
 * 2. Call getCredentials (this will return null or a user/pass pair)
 * 3. If you didn't get valid credentials, call 'requireLogin'
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Basic extends \Sabre\HTTP\Auth\AbstractAuth
{
    /**
     * This method returns a numeric array with a username and password as the
     * only elements.
     *
     * If no credentials were found, this method returns null.
     *
     * @return array|null
     */
    public function getCredentials()
    {
    }
    /**
     * This method sends the needed HTTP header and statuscode (401) to force
     * the user to login.
     */
    public function requireLogin()
    {
    }
}