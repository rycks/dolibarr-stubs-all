<?php

namespace Sabre\DAV\Xml\Property;

/**
 * This class represents the {DAV:}supportedlock property.
 *
 * This property is defined here:
 * http://tools.ietf.org/html/rfc4918#section-15.10
 *
 * This property contains information about what kind of locks
 * this server supports.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://www.rooftopsolutions.nl/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class SupportedLock implements \Sabre\Xml\XmlSerializable
{
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
     */
    public function xmlSerialize(\Sabre\Xml\Writer $writer)
    {
    }
}