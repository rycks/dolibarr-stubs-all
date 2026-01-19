<?php

namespace Sabre\DAV\Exception;

/**
 * RequestedRangeNotSatisfiable
 *
 * This exception is normally thrown when the user
 * request a range that is out of the entity bounds.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class RequestedRangeNotSatisfiable extends \Sabre\DAV\Exception
{
    /**
     * returns the http statuscode for this exception
     *
     * @return int
     */
    function getHTTPCode()
    {
    }
}