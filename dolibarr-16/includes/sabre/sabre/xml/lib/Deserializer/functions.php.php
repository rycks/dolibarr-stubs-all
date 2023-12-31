<?php

namespace Sabre\Xml\Deserializer;

/**
 * This class provides a number of 'deserializer' helper functions.
 * These can be used to easily specify custom deserializers for specific
 * XML elements.
 *
 * You can either use these functions from within the $elementMap in the
 * Service or Reader class, or you can call them from within your own
 * deserializer functions.
 */
/**
 * The 'keyValue' deserializer parses all child elements, and outputs them as
 * a "key=>value" array.
 *
 * For example, keyvalue will parse:
 *
 * <?xml version="1.0"?>
 * <s:root xmlns:s="http://sabredav.org/ns">
 *   <s:elem1>value1</s:elem1>
 *   <s:elem2>value2</s:elem2>
 *   <s:elem3 />
 * </s:root>
 *
 * Into:
 *
 * [
 *   "{http://sabredav.org/ns}elem1" => "value1",
 *   "{http://sabredav.org/ns}elem2" => "value2",
 *   "{http://sabredav.org/ns}elem3" => null,
 * ];
 *
 * If you specify the 'namespace' argument, the deserializer will remove
 * the namespaces of the keys that match that namespace.
 *
 * For example, if you call keyValue like this:
 *
 * keyValue($reader, 'http://sabredav.org/ns')
 *
 * it's output will instead be:
 *
 * [
 *   "elem1" => "value1",
 *   "elem2" => "value2",
 *   "elem3" => null,
 * ];
 *
 * Attributes will be removed from the top-level elements. If elements with
 * the same name appear twice in the list, only the last one will be kept.
 *
 *
 * @param Reader $reader
 * @param string $namespace
 * @return array
 */
function keyValue(\Sabre\Xml\Reader $reader, $namespace = null)
{
}
/**
 * The 'enum' deserializer parses elements into a simple list
 * without values or attributes.
 *
 * For example, Elements will parse:
 *
 * <?xml version="1.0"? >
 * <s:root xmlns:s="http://sabredav.org/ns">
 *   <s:elem1 />
 *   <s:elem2 />
 *   <s:elem3 />
 *   <s:elem4>content</s:elem4>
 *   <s:elem5 attr="val" />
 * </s:root>
 *
 * Into:
 *
 * [
 *   "{http://sabredav.org/ns}elem1",
 *   "{http://sabredav.org/ns}elem2",
 *   "{http://sabredav.org/ns}elem3",
 *   "{http://sabredav.org/ns}elem4",
 *   "{http://sabredav.org/ns}elem5",
 * ];
 *
 * This is useful for 'enum'-like structures.
 *
 * If the $namespace argument is specified, it will strip the namespace
 * for all elements that match that.
 *
 * For example,
 *
 * enum($reader, 'http://sabredav.org/ns')
 *
 * would return:
 *
 * [
 *   "elem1",
 *   "elem2",
 *   "elem3",
 *   "elem4",
 *   "elem5",
 * ];
 *
 * @param Reader $reader
 * @param string $namespace
 * @return string[]
 */
function enum(\Sabre\Xml\Reader $reader, $namespace = null)
{
}
/**
 * The valueObject deserializer turns an xml element into a PHP object of
 * a specific class.
 *
 * This is primarily used by the mapValueObject function from the Service
 * class, but it can also easily be used for more specific situations.
 *
 * @param Reader $reader
 * @param string $className
 * @param string $namespace
 * @return object
 */
function valueObject(\Sabre\Xml\Reader $reader, $className, $namespace)
{
}
/**
 * This deserializer helps you deserialize xml structures that look like
 * this:
 *
 * <collection>
 *    <item>...</item>
 *    <item>...</item>
 *    <item>...</item>
 * </collection>
 *
 * Many XML documents use  patterns like that, and this deserializer
 * allow you to get all the 'items' as an array.
 *
 * In that previous example, you would register the deserializer as such:
 *
 * $reader->elementMap['{}collection'] = function($reader) {
 *     return repeatingElements($reader, '{}item');
 * }
 *
 * The repeatingElements deserializer simply returns everything as an array.
 *
 * @param Reader $reader
 * @param string $childElementName Element name in clark-notation
 * @return array
 */
function repeatingElements(\Sabre\Xml\Reader $reader, $childElementName)
{
}