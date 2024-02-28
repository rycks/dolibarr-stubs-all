<?php

namespace Sabre\DAVACL\Xml\Request;

/**
 * PrincipalMatchReport request parser.
 *
 * This class parses the {DAV:}principal-match REPORT, as defined
 * in:
 *
 * https://tools.ietf.org/html/rfc3744#section-9.3
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class PrincipalMatchReport implements \Sabre\Xml\XmlDeserializable
{
    /**
     * Report on a list of principals that match the current principal.
     */
    const SELF = 1;
    /**
     * Report on a property on resources, such as {DAV:}owner, that match the current principal.
     */
    const PRINCIPAL_PROPERTY = 2;
    /**
     * Must be SELF or PRINCIPAL_PROPERTY
     *
     * @var int
     */
    public $type;
    /**
     * List of properties that are being requested for matching resources.
     *
     * @var string[]
     */
    public $properties = [];
    /**
     * If $type = PRINCIPAL_PROPERTY, which WebDAV property we should compare
     * to the current principal.
     *
     * @var string
     */
    public $principalProperty;
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