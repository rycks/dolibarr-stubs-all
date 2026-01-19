<?php

namespace Sabre\DAV\Exception;

/**
 * ConflictingLock
 *
 * Similar to  the Locked exception, this exception thrown when a LOCK request
 * was made, on a resource which was already locked
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ConflictingLock extends \Sabre\DAV\Exception\Locked
{
    /**
     * This method allows the exception to include additional information into the WebDAV error response
     *
     * @param DAV\Server $server
     * @param \DOMElement $errorNode
     * @return void
     */
    function serialize(\Sabre\DAV\Server $server, \DOMElement $errorNode)
    {
    }
}