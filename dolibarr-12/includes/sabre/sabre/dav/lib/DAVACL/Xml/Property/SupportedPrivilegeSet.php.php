<?php

namespace Sabre\DAVACL\Xml\Property;

/**
 * SupportedPrivilegeSet property
 *
 * This property encodes the {DAV:}supported-privilege-set property, as defined
 * in rfc3744. Please consult the rfc for details about it's structure.
 *
 * This class expects a structure like the one given from
 * Sabre\DAVACL\Plugin::getSupportedPrivilegeSet as the argument in its
 * constructor.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class SupportedPrivilegeSet implements \Sabre\Xml\XmlSerializable, \Sabre\DAV\Browser\HtmlOutput
{
    /**
     * privileges
     *
     * @var array
     */
    protected $privileges;
    /**
     * Constructor
     *
     * @param array $privileges
     */
    function __construct(array $privileges)
    {
    }
    /**
     * Returns the privilege value.
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
    /**
     * Generate html representation for this value.
     *
     * The html output is 100% trusted, and no effort is being made to sanitize
     * it. It's up to the implementor to sanitize user provided values.
     *
     * The output must be in UTF-8.
     *
     * The baseUri parameter is a url to the root of the application, and can
     * be used to construct local links.
     *
     * @param HtmlOutputHelper $html
     * @return string
     */
    function toHtml(\Sabre\DAV\Browser\HtmlOutputHelper $html)
    {
    }
    /**
     * Serializes a property
     *
     * This is a recursive function.
     *
     * @param Writer $writer
     * @param string $privName
     * @param array $privilege
     * @return void
     */
    private function serializePriv(\Sabre\Xml\Writer $writer, $privName, $privilege)
    {
    }
}