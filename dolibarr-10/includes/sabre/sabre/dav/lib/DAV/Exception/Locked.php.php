<?php

namespace Sabre\DAV\Exception;

/**
 * Locked
 *
 * The 423 is thrown when a client tried to access a resource that was locked, without supplying a valid lock token
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Locked extends \Sabre\DAV\Exception
{
    /**
     * Lock information
     *
     * @var Sabre\DAV\Locks\LockInfo
     */
    protected $lock;
    /**
     * Creates the exception
     *
     * A LockInfo object should be passed if the user should be informed
     * which lock actually has the file locked.
     *
     * @param DAV\Locks\LockInfo $lock
     */
    function __construct(\Sabre\DAV\Locks\LockInfo $lock = null)
    {
    }
    /**
     * Returns the HTTP statuscode for this exception
     *
     * @return int
     */
    function getHTTPCode()
    {
    }
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