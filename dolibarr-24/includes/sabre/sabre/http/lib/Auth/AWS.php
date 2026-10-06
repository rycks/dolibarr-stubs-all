<?php

namespace Sabre\HTTP\Auth;

/**
 * HTTP AWS Authentication handler.
 *
 * Use this class to leverage amazon's AWS authentication header
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class AWS extends \Sabre\HTTP\Auth\AbstractAuth
{
    /**
     * The signature supplied by the HTTP client.
     *
     * @var string
     */
    private $signature = null;
    /**
     * The accesskey supplied by the HTTP client.
     *
     * @var string
     */
    private $accessKey = null;
    /**
     * An error code, if any.
     *
     * This value will be filled with one of the ERR_* constants
     *
     * @var int
     */
    public $errorCode = 0;
    const ERR_NOAWSHEADER = 1;
    const ERR_MD5CHECKSUMWRONG = 2;
    const ERR_INVALIDDATEFORMAT = 3;
    const ERR_REQUESTTIMESKEWED = 4;
    const ERR_INVALIDSIGNATURE = 5;
    /**
     * Gathers all information from the headers.
     *
     * This method needs to be called prior to anything else.
     */
    public function init() : bool
    {
    }
    /**
     * Returns the username for the request.
     */
    public function getAccessKey() : string
    {
    }
    /**
     * Validates the signature based on the secretKey.
     */
    public function validate(string $secretKey) : bool
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
     * Makes sure the supplied value is a valid RFC2616 date.
     *
     * If we would just use strtotime to get a valid timestamp, we have no way of checking if a
     * user just supplied the word 'now' for the date header.
     *
     * This function also makes sure the Date header is within 15 minutes of the operating
     * system date, to prevent replay attacks.
     */
    protected function validateRFC2616Date(string $dateHeader) : bool
    {
    }
    /**
     * Returns a list of AMZ headers.
     */
    protected function getAmzHeaders() : string
    {
    }
    /**
     * Generates an HMAC-SHA1 signature.
     */
    private function hmacsha1(string $key, string $message) : string
    {
    }
}