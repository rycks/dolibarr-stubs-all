<?php

namespace Sabre\Xml\Serializer;

/**
 * This file provides a number of 'serializer' helper functions.
 *
 * These helper functions can be used to easily xml-encode common PHP
 * data structures, or can be placed in the $classMap.
 */
/**
 * The 'enum' serializer writes simple list of elements.
 *
 * For example, calling:
 *
 * enum($writer, [
 *   "{http://sabredav.org/ns}elem1",
 *   "{http://sabredav.org/ns}elem2",
 *   "{http://sabredav.org/ns}elem3",
 *   "{http://sabredav.org/ns}elem4",
 *   "{http://sabredav.org/ns}elem5",
 * ]);
 *
 * Will generate something like this (if the correct namespace is declared):
 *
 * <s:elem1 />
 * <s:elem2 />
 * <s:elem3 />
 * <s:elem4>content</s:elem4>
 * <s:elem5 attr="val" />
 *
 * @param string[] $values
 */
function enum(\Sabre\Xml\Writer $writer, array $values)
{
}
/**
 * The valueObject serializer turns a simple PHP object into a classname.
 *
 * Every public property will be encoded as an xml element with the same
 * name, in the XML namespace as specified.
 *
 * Values that are set to null or an empty array are not serialized. To
 * serialize empty properties, you must specify them as an empty string.
 *
 * @param object $valueObject
 */
function valueObject(\Sabre\Xml\Writer $writer, $valueObject, string $namespace)
{
}
/**
 * This serializer helps you serialize xml structures that look like
 * this:.
 *
 * <collection>
 *    <item>...</item>
 *    <item>...</item>
 *    <item>...</item>
 * </collection>
 *
 * In that previous example, this serializer just serializes the item element,
 * and this could be called like this:
 *
 * repeatingElements($writer, $items, '{}item');
 */
function repeatingElements(\Sabre\Xml\Writer $writer, array $items, string $childElementName)
{
}
/**
 * This function is the 'default' serializer that is able to serialize most
 * things, and delegates to other serializers if needed.
 *
 * The standardSerializer supports a wide-array of values.
 *
 * $value may be a string or integer, it will just write out the string as text.
 * $value may be an instance of XmlSerializable or Element, in which case it
 *    calls it's xmlSerialize() method.
 * $value may be a PHP callback/function/closure, in case we call the callback
 *    and give it the Writer as an argument.
 * $value may be a an object, and if it's in the classMap we automatically call
 *    the correct serializer for it.
 * $value may be null, in which case we do nothing.
 *
 * If $value is an array, the array must look like this:
 *
 * [
 *    [
 *       'name' => '{namespaceUri}element-name',
 *       'value' => '...',
 *       'attributes' => [ 'attName' => 'attValue' ]
 *    ]
 *    [,
 *       'name' => '{namespaceUri}element-name2',
 *       'value' => '...',
 *    ]
 * ]
 *
 * This would result in xml like:
 *
 * <element-name xmlns="namespaceUri" attName="attValue">
 *   ...
 * </element-name>
 * <element-name2>
 *   ...
 * </element-name2>
 *
 * The value property may be any value standardSerializer supports, so you can
 * nest data-structures this way. Both value and attributes are optional.
 *
 * Alternatively, you can also specify the array using this syntax:
 *
 * [
 *    [
 *       '{namespaceUri}element-name' => '...',
 *       '{namespaceUri}element-name2' => '...',
 *    ]
 * ]
 *
 * This is excellent for simple key->value structures, and here you can also
 * specify anything for the value.
 *
 * You can even mix the two array syntaxes.
 *
 * @param string|int|float|bool|array|object $value
 */
function standardSerializer(\Sabre\Xml\Writer $writer, $value)
{
}