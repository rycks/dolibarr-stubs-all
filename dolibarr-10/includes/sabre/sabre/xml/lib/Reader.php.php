<?php

namespace Sabre\Xml;

/**
 * The Reader class expands upon PHP's built-in XMLReader.
 *
 * The intended usage, is to assign certain XML elements to PHP classes. These
 * need to be registered using the $elementMap public property.
 *
 * After this is done, a single call to parse() will parse the entire document,
 * and delegate sub-sections of the document to element classes.
 *
 * @copyright Copyright (C) 2009-2015 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Reader extends \XMLReader
{
    use \Sabre\Xml\ContextStackTrait;
    /**
     * Returns the current nodename in clark-notation.
     *
     * For example: "{http://www.w3.org/2005/Atom}feed".
     * Or if no namespace is defined: "{}feed".
     *
     * This method returns null if we're not currently on an element.
     *
     * @return string|null
     */
    function getClark()
    {
    }
    /**
     * Reads the entire document.
     *
     * This function returns an array with the following three elements:
     *    * name - The root element name.
     *    * value - The value for the root element.
     *    * attributes - An array of attributes.
     *
     * This function will also disable the standard libxml error handler (which
     * usually just results in PHP errors), and throw exceptions instead.
     *
     * @return array
     */
    function parse()
    {
    }
    /**
     * parseGetElements parses everything in the current sub-tree,
     * and returns a an array of elements.
     *
     * Each element has a 'name', 'value' and 'attributes' key.
     *
     * If the the element didn't contain sub-elements, an empty array is always
     * returned. If there was any text inside the element, it will be
     * discarded.
     *
     * If the $elementMap argument is specified, the existing elementMap will
     * be overridden while parsing the tree, and restored after this process.
     *
     * @param array $elementMap
     * @return array
     */
    function parseGetElements(array $elementMap = null)
    {
    }
    /**
     * Parses all elements below the current element.
     *
     * This method will return a string if this was a text-node, or an array if
     * there were sub-elements.
     *
     * If there's both text and sub-elements, the text will be discarded.
     *
     * If the $elementMap argument is specified, the existing elementMap will
     * be overridden while parsing the tree, and restored after this process.
     *
     * @param array $elementMap
     * @return array|string
     */
    function parseInnerTree(array $elementMap = null)
    {
    }
    /**
     * Reads all text below the current element, and returns this as a string.
     *
     * @return string
     */
    function readText()
    {
    }
    /**
     * Parses the current XML element.
     *
     * This method returns arn array with 3 properties:
     *   * name - A clark-notation XML element name.
     *   * value - The parsed value.
     *   * attributes - A key-value list of attributes.
     *
     * @return array
     */
    function parseCurrentElement()
    {
    }
    /**
     * Grabs all the attributes from the current element, and returns them as a
     * key-value array.
     *
     * If the attributes are part of the same namespace, they will simply be
     * short keys. If they are defined on a different namespace, the attribute
     * name will be retured in clark-notation.
     *
     * @return array
     */
    function parseAttributes()
    {
    }
    /**
     * Returns the function that should be used to parse the element identified
     * by it's clark-notation name.
     *
     * @param string $name
     * @return callable
     */
    function getDeserializerForElementName($name)
    {
    }
}