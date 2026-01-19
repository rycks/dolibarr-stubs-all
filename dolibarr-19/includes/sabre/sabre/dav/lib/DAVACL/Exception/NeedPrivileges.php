<?php

namespace Sabre\DAVACL\Exception;

/**
 * NeedPrivileges.
 *
 * The 403-need privileges is thrown when a user didn't have the appropriate
 * permissions to perform an operation
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class NeedPrivileges extends \Sabre\DAV\Exception\Forbidden
{
    /**
     * The relevant uri.
     *
     * @var string
     */
    protected $uri;
    /**
     * The privileges the user didn't have.
     *
     * @var array
     */
    protected $privileges;
    /**
     * Constructor.
     *
     * @param string $uri
     */
    public function __construct($uri, array $privileges)
    {
    }
    /**
     * Adds in extra information in the xml response.
     *
     * This method adds the {DAV:}need-privileges element as defined in rfc3744
     */
    public function serialize(\Sabre\DAV\Server $server, \DOMElement $errorNode)
    {
    }
}