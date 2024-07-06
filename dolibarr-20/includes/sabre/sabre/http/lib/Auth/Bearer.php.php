<?php

namespace Sabre\HTTP\Auth;

/**
 * HTTP Bearer authentication utility.
 *
 * This class helps you setup bearer auth. The process is fairly simple:
 *
 * 1. Instantiate the class.
 * 2. Call getToken (this will return null or a token as string)
 * 3. If you didn't get a valid token, call 'requireLogin'
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author François Kooman (fkooman@tuxed.net)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Bearer extends \Sabre\HTTP\Auth\AbstractAuth
{
    /**
     * This method returns a string with an access token.
     *
     * If no token was found, this method returns null.
     *
     * @return string|null
     */
    public function getToken()
    {
    }
    /**
     * This method sends the needed HTTP header and status code (401) to force
     * authentication.
     */
    public function requireLogin()
    {
    }
}