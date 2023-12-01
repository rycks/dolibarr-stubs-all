<?php

namespace Sabre\HTTP;

/**
 * PHP SAPI.
 *
 * This object is responsible for:
 * 1. Constructing a Request object based on the current HTTP request sent to
 *    the PHP process.
 * 2. Sending the Response object back to the client.
 *
 * It could be said that this class provides a mapping between the Request and
 * Response objects, and php's:
 *
 * * $_SERVER
 * * $_POST
 * * $_FILES
 * * php://input
 * * echo()
 * * header()
 * * php://output
 *
 * You can choose to either call all these methods statically, but you can also
 * instantiate this as an object to allow for polymorhpism.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Sapi
{
    /**
     * This static method will create a new Request object, based on the
     * current PHP request.
     */
    public static function getRequest() : \Sabre\HTTP\Request
    {
    }
    /**
     * Sends the HTTP response back to a HTTP client.
     *
     * This calls php's header() function and streams the body to php://output.
     */
    public static function sendResponse(\Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * This static method will create a new Request object, based on a PHP
     * $_SERVER array.
     *
     * REQUEST_URI and REQUEST_METHOD are required.
     */
    public static function createFromServerArray(array $serverArray) : \Sabre\HTTP\Request
    {
    }
}