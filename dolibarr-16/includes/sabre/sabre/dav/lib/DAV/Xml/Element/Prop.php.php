<?php

namespace Sabre\DAV\Xml\Element;

/**
 * This class is responsible for decoding the {DAV:}prop element as it appears
 * in {DAV:}property-update.
 *
 * This class doesn't return an instance of itself. It just returns a
 * key->value array.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Prop implements \Sabre\Xml\XmlDeserializable
{
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
     * @param Reader $reader
     * @return mixed
     */
    static function xmlDeserialize(\Sabre\Xml\Reader $reader)
    {
    }
    /**
     * This function behaves similar to Sabre\Xml\Reader::parseCurrentElement,
     * but instead of creating deep xml array structures, it will turn any
     * top-level element it doesn't recognize into either a string, or an
     * XmlFragment class.
     *
     * This method returns arn array with 2 properties:
     *   * name - A clark-notation XML element name.
     *   * value - The parsed value.
     *
     * @param Reader $reader
     * @return array
     */
    private static function parseCurrentElement(\Sabre\Xml\Reader $reader)
    {
    }
}