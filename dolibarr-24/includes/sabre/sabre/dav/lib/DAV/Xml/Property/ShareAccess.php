<?php

namespace Sabre\DAV\Xml\Property;

/**
 * This class represents the {DAV:}share-access property.
 *
 * This property is defined here:
 * https://tools.ietf.org/html/draft-pot-webdav-resource-sharing-03#section-4.4.1
 *
 * This property is used to indicate if a resource is a shared resource, and
 * whether the instance of the shared resource is the original instance, or
 * an instance belonging to a sharee.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ShareAccess implements \Sabre\Xml\Element
{
    /**
     * Either SHARED or SHAREDOWNER.
     *
     * @var int
     */
    protected $value;
    /**
     * Creates the property.
     *
     * The constructor value must be one of the
     * \Sabre\DAV\Sharing\Plugin::ACCESS_ constants.
     *
     * @param int $shareAccess
     */
    public function __construct($shareAccess)
    {
    }
    /**
     * Returns the current value.
     *
     * @return int
     */
    public function getValue()
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