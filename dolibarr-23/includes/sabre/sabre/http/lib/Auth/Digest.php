<?php

namespace Sabre\HTTP\Auth;

/**
 * HTTP Digest Authentication handler.
 *
 * Use this class for easy http digest authentication.
 * Instructions:
 *
 *  1. Create the object
 *  2. Call the setRealm() method with the realm you plan to use
 *  3. Call the init method function.
 *  4. Call the getUserName() function. This function may return null if no
 *     authentication information was supplied. Based on the username you
 *     should check your internal database for either the associated password,
 *     or the so-called A1 hash of the digest.
 *  5. Call either validatePassword() or validateA1(). This will return true
 *     or false.
 *  6. To make sure an authentication prompt is displayed, call the
 *     requireLogin() method.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Digest extends \Sabre\HTTP\Auth\AbstractAuth
{
    /**
     * These constants are used in setQOP();.
     */
    const QOP_AUTH = 1;
    const QOP_AUTHINT = 2;
    protected $nonce;
    protected $opaque;
    protected $digestParts;
    protected $A1;
    protected $qop = self::QOP_AUTH;
    /**
     * Initializes the object.
     */
    public function __construct(string $realm, \Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * Gathers all information from the headers.
     *
     * This method needs to be called prior to anything else.
     */
    public function init()
    {
    }
    /**
     * Sets the quality of protection value.
     *
     * Possible values are:
     *   Sabre\HTTP\DigestAuth::QOP_AUTH
     *   Sabre\HTTP\DigestAuth::QOP_AUTHINT
     *
     * Multiple values can be specified using logical OR.
     *
     * QOP_AUTHINT ensures integrity of the request body, but this is not
     * supported by most HTTP clients. QOP_AUTHINT also requires the entire
     * request body to be md5'ed, which can put strains on CPU and memory.
     */
    public function setQOP(int $qop)
    {
    }
    /**
     * Validates the user.
     *
     * The A1 parameter should be md5($username . ':' . $realm . ':' . $password);
     */
    public function validateA1(string $A1) : bool
    {
    }
    /**
     * Validates authentication through a password. The actual password must be provided here.
     * It is strongly recommended not store the password in plain-text and use validateA1 instead.
     */
    public function validatePassword(string $password) : bool
    {
    }
    /**
     * Returns the username for the request.
     * Returns null if there were none.
     *
     * @return string|null
     */
    public function getUsername()
    {
    }
    /**
     * Validates the digest challenge.
     */
    protected function validate() : bool
    {
    }
    /**
     * Returns an HTTP 401 header, forcing login.
     *
     * This should be called when username and password are incorrect, or not supplied at all
     */
    public function requireLogin()
    {
    }
    /**
     * This method returns the full digest string.
     *
     * It should be compatible with mod_php format and other webservers.
     *
     * If the header could not be found, null will be returned
     *
     * @return mixed
     */
    public function getDigest()
    {
    }
    /**
     * Parses the different pieces of the digest string into an array.
     *
     * This method returns false if an incomplete digest was supplied
     *
     * @return bool|array
     */
    protected function parseDigest(string $digest)
    {
    }
}