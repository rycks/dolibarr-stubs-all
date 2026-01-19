<?php

namespace Sabre\DAV\Xml\Request;

/**
 * WebDAV LOCK request parser.
 *
 * This class parses the {DAV:}lockinfo request, as defined in:
 *
 * http://tools.ietf.org/html/rfc4918#section-9.10
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Lock implements \Sabre\Xml\XmlDeserializable
{
    /**
     * Owner of the lock
     *
     * @var string
     */
    public $owner;
    /**
     * Scope of the lock.
     *
     * Either LockInfo::SHARED or LockInfo::EXCLUSIVE
     * @var int
     */
    public $scope;
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