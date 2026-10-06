<?php

namespace Sabre\CardDAV\Xml\Request;

/**
 * AddressBookQueryReport request parser.
 *
 * This class parses the {urn:ietf:params:xml:ns:carddav}addressbook-query
 * REPORT, as defined in:
 *
 * http://tools.ietf.org/html/rfc6352#section-8.6
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://www.rooftopsolutions.nl/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class AddressBookQueryReport implements \Sabre\Xml\XmlDeserializable
{
    /**
     * An array with requested properties.
     *
     * @var array
     */
    public $properties;
    /**
     * An array with requested vcard properties.
     *
     * @var array
     */
    public $addressDataProperties = [];
    /**
     * List of property/component filters.
     *
     * This is an array with filters. Every item is a property filter. Every
     * property filter has the following keys:
     *   * name - name of the component to filter on
     *   * test - anyof or allof
     *   * is-not-defined - Test for non-existence
     *   * param-filters - A list of parameter filters on the property
     *   * text-matches - A list of text values the filter needs to match
     *
     * Each param-filter has the following keys:
     *   * name - name of the parameter
     *   * is-not-defined - Test for non-existence
     *   * text-match - Match the parameter value
     *
     * Each text-match in property filters, and the single text-match in
     * param-filters have the following keys:
     *
     *   * value - value to match
     *   * match-type - contains, starts-with, ends-with, equals
     *   * negate-condition - Do the opposite match
     *   * collation - Usually i;unicode-casemap
     *
     * @var array
     */
    public $filters;
    /**
     * The number of results the client wants.
     *
     * null means it wasn't specified, which in most cases means 'all results'.
     *
     * @var int|null
     */
    public $limit;
    /**
     * Either 'anyof' or 'allof'.
     *
     * @var string
     */
    public $test;
    /**
     * The mimetype of the content that should be returend. Usually
     * text/vcard.
     *
     * @var string
     */
    public $contentType = null;
    /**
     * The version of vcard data that should be returned. Usually 3.0,
     * referring to vCard 3.0.
     *
     * @var string
     */
    public $version = null;
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