<?php

namespace Sabre\DAV\Exception;

/**
 * LockTokenMatchesRequestUri.
 *
 * This exception is thrown by UNLOCK if a supplied lock-token is invalid
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class LockTokenMatchesRequestUri extends \Sabre\DAV\Exception\Conflict
{
    /**
     * Creates the exception.
     */
    public function __construct()
    {
    }
    /**
     * This method allows the exception to include additional information into the WebDAV error response.
     */
    public function serialize(\Sabre\DAV\Server $server, \DOMElement $errorNode)
    {
    }
}