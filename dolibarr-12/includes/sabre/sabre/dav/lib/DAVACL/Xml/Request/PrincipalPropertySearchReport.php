<?php

namespace Sabre\DAVACL\Xml\Request;

/**
 * PrincipalSearchPropertySetReport request parser.
 *
 * This class parses the {DAV:}principal-property-search REPORT, as defined
 * in:
 *
 * https://tools.ietf.org/html/rfc3744#section-9.4
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class PrincipalPropertySearchReport implements \Sabre\Xml\XmlDeserializable
{
    /**
     * The requested properties.
     *
     * @var array|null
     */
    public $properties;
    /**
     * searchProperties
     *
     * @var array
     */
    public $searchProperties = [];
    /**
     * By default the property search will be conducted on the url of the http
     * request. If this is set to true, it will be applied to the principal
     * collection set instead.
     *
     * @var bool
     */
    public $applyToPrincipalCollectionSet = false;
    /**
     * Search for principals matching ANY of the properties (OR) or a ALL of
     * the properties (AND).
     *
     * This property is either "anyof" or "allof".
     *
     * @var string
     */
    public $test;
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