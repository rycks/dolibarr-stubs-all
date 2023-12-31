<?php

namespace Sabre\DAV\Exception;

/**
 * MethodNotAllowed.
 *
 * The 405 is thrown when a client tried to create a directory on an already existing directory
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class MethodNotAllowed extends \Sabre\DAV\Exception
{
    /**
     * Returns the HTTP statuscode for this exception.
     *
     * @return int
     */
    public function getHTTPCode()
    {
    }
    /**
     * This method allows the exception to return any extra HTTP response headers.
     *
     * The headers must be returned as an array.
     *
     * @return array
     */
    public function getHTTPHeaders(\Sabre\DAV\Server $server)
    {
    }
}