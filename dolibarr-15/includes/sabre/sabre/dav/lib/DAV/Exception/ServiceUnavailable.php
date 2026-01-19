<?php

namespace Sabre\DAV\Exception;

/**
 * ServiceUnavailable
 *
 * This exception is thrown in case the service
 * is currently not available (e.g. down for maintenance).
 *
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ServiceUnavailable extends \Sabre\DAV\Exception
{
    /**
     * Returns the HTTP statuscode for this exception
     *
     * @return int
     */
    function getHTTPCode()
    {
    }
}