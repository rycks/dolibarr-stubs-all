<?php

namespace Sabre\DAV\Xml\Request;

/**
 * WebDAV Extended MKCOL request parser.
 *
 * This class parses the {DAV:}mkol request, as defined in:
 *
 * https://tools.ietf.org/html/rfc5689#section-5.1
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class MkCol implements \Sabre\Xml\XmlDeserializable
{
    /**
     * The list of properties that will be set.
     *
     * @var array
     */
    protected $properties = [];
    /**
     * Returns a key=>value array with properties that are supposed to get set
     * during creation of the new collection.
     *
     * @return array
     */
    public function getProperties()
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