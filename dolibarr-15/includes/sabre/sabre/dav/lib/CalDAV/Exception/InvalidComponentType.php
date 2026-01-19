<?php

namespace Sabre\CalDAV\Exception;

/**
 * InvalidComponentType
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class InvalidComponentType extends \Sabre\DAV\Exception\Forbidden
{
    /**
     * Adds in extra information in the xml response.
     *
     * This method adds the {CALDAV:}supported-calendar-component as defined in rfc4791
     *
     * @param DAV\Server $server
     * @param \DOMElement $errorNode
     * @return void
     */
    function serialize(\Sabre\DAV\Server $server, \DOMElement $errorNode)
    {
    }
}