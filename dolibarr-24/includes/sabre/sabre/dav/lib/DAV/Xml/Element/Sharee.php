<?php

namespace Sabre\DAV\Xml\Element;

/**
 * This class represents the {DAV:}sharee element.
 *
 * @copyright Copyright (C) fruux GmbH. (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Sharee implements \Sabre\Xml\Element
{
    /**
     * A URL. Usually a mailto: address, could also be a principal url.
     * This uniquely identifies the sharee.
     *
     * @var string
     */
    public $href;
    /**
     * A local principal path. The server will do its best to locate the
     * principal uri based on the given uri. If we could find a local matching
     * principal uri, this property will contain the value.
     *
     * @var string|null
     */
    public $principal;
    /**
     * A list of WebDAV properties that describe the sharee. This might for
     * example contain a {DAV:}displayname with the real name of the user.
     *
     * @var array
     */
    public $properties = [];
    /**
     * Share access level. One of the Sabre\DAV\Sharing\Plugin::ACCESS
     * constants.
     *
     * Can be one of:
     *
     * ACCESS_READ
     * ACCESS_READWRITE
     * ACCESS_SHAREDOWNER
     * ACCESS_NOACCESS
     *
     * depending on context.
     *
     * @var int
     */
    public $access;
    /**
     * When a sharee is originally invited to a share, the sharer may add
     * a comment. This will be placed in this property.
     *
     * @var string
     */
    public $comment;
    /**
     * The status of the invite, should be one of the
     * Sabre\DAV\Sharing\Plugin::INVITE constants.
     *
     * @var int
     */
    public $inviteStatus;
    /**
     * Creates the object.
     *
     * $properties will be used to populate all internal properties.
     */
    public function __construct(array $properties = [])
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