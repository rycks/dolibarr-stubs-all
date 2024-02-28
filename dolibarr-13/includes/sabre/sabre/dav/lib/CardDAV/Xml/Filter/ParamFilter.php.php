<?php

namespace Sabre\CardDAV\Xml\Filter;

/**
 * ParamFilter parser.
 *
 * This class parses the {urn:ietf:params:xml:ns:carddav}param-filter XML
 * element, as defined in:
 *
 * http://tools.ietf.org/html/rfc6352#section-10.5.2
 *
 * The result will be spit out as an array.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
abstract class ParamFilter implements \Sabre\Xml\Element
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
}