<?php

namespace Sabre\DAV\Xml\Property;

/**
 * Href property.
 *
 * This class represents any WebDAV property that contains a {DAV:}href
 * element, and there are many.
 *
 * It can support either 1 or more hrefs. If while unserializing no valid
 * {DAV:}href elements were found, this property will unserialize itself as
 * null.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://www.rooftopsolutions.nl/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Href implements \Sabre\Xml\Element, \Sabre\DAV\Browser\HtmlOutput
{
    /**
     * List of uris.
     *
     * @var array
     */
    protected $hrefs;
    /**
     * Constructor.
     *
     * You must either pass a string for a single href, or an array of hrefs.
     *
     * @param string|string[] $hrefs
     */
    public function __construct($hrefs)
    {
    }
    /**
     * Returns the first Href.
     *
     * @return string|null
     */
    public function getHref()
    {
    }
    /**
     * Returns the hrefs as an array.
     *
     * @return array
     */
    public function getHrefs()
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
     */
    public function xmlSerialize(\Sabre\Xml\Writer $writer)
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
     * @return string
     */
    public function toHtml(\Sabre\DAV\Browser\HtmlOutputHelper $html)
    {
    }
    /**
     * The deserialize method is called during xml parsing.
     *
     * This method is called statically, this is because in theory this method
     * may be used as a type of constructor, or factory method.
     *
     * Often you want to return an instance of the current class, but you are
     * free to return other data as well.
     *
     * You are responsible for advancing the reader to the next element. Not
     * doing anything will result in a never-ending loop.
     *
     * If you just want to skip parsing for this element altogether, you can
     * just call $reader->next();
     *
     * $reader->parseInnerTree() will parse the entire sub-tree, and advance to
     * the next element.
     *
     * @return mixed
     */
    public static function xmlDeserialize(\Sabre\Xml\Reader $reader)
    {
    }
}