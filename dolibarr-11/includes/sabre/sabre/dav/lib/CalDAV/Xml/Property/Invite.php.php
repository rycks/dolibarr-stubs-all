<?php

namespace Sabre\CalDAV\Xml\Property;

/**
 * Invite property
 *
 * This property encodes the 'invite' property, as defined by
 * the 'caldav-sharing-02' spec, in the http://calendarserver.org/ns/
 * namespace.
 *
 * @see https://trac.calendarserver.org/browser/CalendarServer/trunk/doc/Extensions/caldav-sharing-02.txt
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Invite implements \Sabre\Xml\XmlSerializable
{
    /**
     * The list of users a calendar has been shared to.
     *
     * @var Sharee[]
     */
    protected $sharees;
    /**
     * Creates the property.
     *
     * @param Sharee[] $sharees
     */
    function __construct(array $sharees)
    {
    }
    /**
     * Returns the list of users, as it was passed to the constructor.
     *
     * @return array
     */
    function getValue()
    {
    }
    /**
     * The xmlSerialize method is called during xml writing.
     *
     * Use the $writer argument to write its own xml serialization.
     *
     * An important note: do _not_ create a parent element. Any element
     * implementing XmlSerializable should only ever write what's considered
     * its 'inner xml'.
     *
     * The parent of the current element is responsible for writing a
     * containing element.
     *
     * This allows serializers to be re-used for different element names.
     *
     * If you are opening new elements, you must also close them again.
     *
     * @param Writer $writer
     * @return void
     */
    function xmlSerialize(\Sabre\Xml\Writer $writer)
    {
    }
}