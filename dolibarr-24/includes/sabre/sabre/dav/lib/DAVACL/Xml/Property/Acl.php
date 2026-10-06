<?php

namespace Sabre\DAVACL\Xml\Property;

/**
 * This class represents the {DAV:}acl property.
 *
 * The {DAV:}acl property is a full list of access control entries for a
 * resource.
 *
 * {DAV:}acl is used as a WebDAV property, but it is also used within the body
 * of the ACL request.
 *
 * See:
 * http://tools.ietf.org/html/rfc3744#section-5.5
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Acl implements \Sabre\Xml\Element, \Sabre\DAV\Browser\HtmlOutput
{
    /**
     * List of privileges.
     *
     * @var array
     */
    protected $privileges;
    /**
     * Whether or not the server base url is required to be prefixed when
     * serializing the property.
     *
     * @var bool
     */
    protected $prefixBaseUrl;
    /**
     * Constructor.
     *
     * This object requires a structure similar to the return value from
     * Sabre\DAVACL\Plugin::getACL().
     *
     * Each privilege is a an array with at least a 'privilege' property, and a
     * 'principal' property. A privilege may have a 'protected' property as
     * well.
     *
     * The prefixBaseUrl should be set to false, if the supplied principal urls
     * are already full urls. If this is kept to true, the servers base url
     * will automatically be prefixed.
     *
     * @param bool $prefixBaseUrl
     */
    public function __construct(array $privileges, $prefixBaseUrl = true)
    {
    }
    /**
     * Returns the list of privileges for this property.
     *
     * @return array
     */
    public function getPrivileges()
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
     * Generate html representation for this value.
     *
     * The html output is 100% trusted, and no effort is being made to sanitize
     * it. It's up to the implementor to sanitize user provided values.
     *
     * The output must be in UTF-8.
     *
     * The baseUri parameter is a url to the root of the application, and can
     * be used to construct local links.
     *
     * @return string
     */
    public function toHtml(\Sabre\DAV\Browser\HtmlOutputHelper $html)
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
     * Important note 2: You are responsible for advancing the reader to the
     * next element. Not doing anything will result in a never-ending loop.
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
    /**
     * Serializes a single access control entry.
     */
    private function serializeAce(\Sabre\Xml\Writer $writer, array $ace)
    {
    }
}