<?php

namespace Sabre\CardDAV\Xml\Property;

/**
 * Supported-address-data property
 *
 * This property is a representation of the supported-address-data property
 * in the CardDAV namespace.
 *
 * This property is defined in:
 *
 * http://tools.ietf.org/html/rfc6352#section-6.2.2
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class SupportedAddressData implements \Sabre\Xml\XmlSerializable
{
    /**
     * supported versions
     *
     * @var array
     */
    protected $supportedData = [];
    /**
     * Creates the property
     *
     * @param array|null $supportedData
     */
    function __construct(array $supportedData = null)
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