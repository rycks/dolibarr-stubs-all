<?php

namespace Sabre\DAV\Exception;

/**
 * NotAuthenticated.
 *
 * This exception is thrown when the client did not provide valid
 * authentication credentials.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class NotAuthenticated extends \Sabre\DAV\Exception
{
    /**
     * Returns the HTTP statuscode for this exception.
     *
     * @return int
     */
    public function getHTTPCode()
    {
    }
}