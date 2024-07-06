<?php

namespace Sabre\DAV\Xml\Property;

/**
 * {DAV:}resourcetype property.
 *
 * This class represents the {DAV:}resourcetype property, as defined in:
 *
 * https://tools.ietf.org/html/rfc4918#section-15.9
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ResourceType extends \Sabre\Xml\Element\Elements implements \Sabre\DAV\Browser\HtmlOutput
{
    /**
     * Constructor.
     *
     * You can either pass null (for no resourcetype), a string (for a single
     * resourcetype) or an array (for multiple).
     *
     * The resourcetype must be specified in clark-notation
     *
     * @param array|string|null $resourceTypes
     */
    public function __construct($resourceTypes = null)
    {
    }
    /**
     * Returns the values in clark-notation.
     *
     * For example array('{DAV:}collection')
     *
     * @return array
     */
    public function getValue()
    {
    }
    /**
     * Checks if the principal contains a certain value.
     *
     * @param string $type
     *
     * @return bool
     */
    public function is($type)
    {
    }
    /**
     * Adds a resourcetype value to this property.
     *
     * @param string $type
     */
    public function add($type)
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
     * Important note 2: You are responsible for advancing the reader to the
     * next element. Not doing anything will result in a never-ending loop.
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
}