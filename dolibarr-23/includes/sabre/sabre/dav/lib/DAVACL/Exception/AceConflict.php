<?php

namespace Sabre\DAVACL\Exception;

/**
 * This exception is thrown when a client attempts to set conflicting
 * permissions.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class AceConflict extends \Sabre\DAV\Exception\Conflict
{
    /**
     * Adds in extra information in the xml response.
     *
     * This method adds the {DAV:}no-ace-conflict element as defined in rfc3744
     */
    public function serialize(\Sabre\DAV\Server $server, \DOMElement $errorNode)
    {
    }
}