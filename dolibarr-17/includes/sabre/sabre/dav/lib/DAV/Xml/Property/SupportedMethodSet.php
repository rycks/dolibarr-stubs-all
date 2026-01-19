<?php

namespace Sabre\DAV\Xml\Property;

/**
 * supported-method-set property.
 *
 * This property is defined in RFC3253, but since it's
 * so common in other webdav-related specs, it is part of the core server.
 *
 * This property is defined here:
 * http://tools.ietf.org/html/rfc3253#section-3.1.3
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class SupportedMethodSet implements \Sabre\Xml\XmlSerializable, \Sabre\DAV\Browser\HtmlOutput
{
    /**
     * List of methods
     *
     * @var string[]
     */
    protected $methods = [];
    /**
     * Creates the property
     *
     * @param string[] $methods
     */
    function __construct(array $methods)
    {
    }
    /**
     * Returns the list of supported http methods.
     *
     * @return string[]
     */
    function getValue()
    {
    }
    /**
     * Returns true or false if the property contains a specific method.
     *
     * @param string $methodName
     * @return bool
     */
    function has($methodName)
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
}