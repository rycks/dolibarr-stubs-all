<?php

namespace Sabre\DAV\Xml\Property;

/**
 * Represents {DAV:}lockdiscovery property.
 *
 * This property is defined here:
 * http://tools.ietf.org/html/rfc4918#section-15.8
 *
 * This property contains all the open locks on a given resource
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://www.rooftopsolutions.nl/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class LockDiscovery implements \Sabre\Xml\XmlSerializable
{
    /**
     * locks
     *
     * @var LockInfo[]
     */
    public $locks;
    /**
     * Hides the {DAV:}lockroot element from the response.
     *
     * It was reported that showing the lockroot in the response can break
     * Office 2000 compatibility.
     *
     * @var bool
     */
    static $hideLockRoot = false;
    /**
     * __construct
     *
     * @param LockInfo[] $locks
     */
    function __construct($locks)
    {
    }
    /**
     * The serialize method is called during xml writing.
     *
     * It should use the $writer argument to encode this object into XML.
     *
     * Important note: it is not needed to create the parent element. The
     * parent element is already created, and we only have to worry about
     * attributes, child elements and text (if any).
     *
     * Important note 2: If you are writing any new elements, you are also
     * responsible for closing them.
     *
     * @param Writer $writer
     * @return void
     */
    function xmlSerialize(\Sabre\Xml\Writer $writer)
    {
    }
}