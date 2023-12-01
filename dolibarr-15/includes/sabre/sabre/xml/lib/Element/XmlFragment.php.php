<?php

namespace Sabre\Xml\Element;

/**
 * The XmlFragment element allows you to extract a portion of your xml tree,
 * and get a well-formed xml string.
 *
 * This goes a bit beyond `innerXml` and friends, as we'll also match all the
 * correct namespaces.
 *
 * Please note that the XML fragment:
 *
 * 1. Will not have an <?xml declaration.
 * 2. Or a DTD
 * 3. It will have all the relevant xmlns attributes.
 * 4. It may not have a root element.
 */
class XmlFragment implements \Sabre\Xml\Element
{
    protected $xml;
    function __construct($xml)
    {
    }
    function getXml()
    {
    }
    /**
     * The xmlSerialize metod is called during xml writing.
     *
     * Use the $writer argument to write its own xml serialization.
     *
     * An important note: do _not_ create a parent element. Any element
     * implementing XmlSerializble should only ever write what's considered
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
     * The deserialize method is called during xml parsing.
     *
     * This method is called statictly, this is because in theory this method
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
     * @param Reader $reader
     * @return mixed
     */
    static function xmlDeserialize(\Sabre\Xml\Reader $reader)
    {
    }
}