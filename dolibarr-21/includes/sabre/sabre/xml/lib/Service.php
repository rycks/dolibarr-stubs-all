<?php

namespace Sabre\Xml;

/**
 * XML parsing and writing service.
 *
 * You are encouraged to make an instance of this for your application and
 * potentially extend it, as a central API point for dealing with xml and
 * configuring the reader and writer.
 *
 * @copyright Copyright (C) 2009-2015 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Service
{
    /**
     * This is the element map. It contains a list of XML elements (in clark
     * notation) as keys and PHP class names as values.
     *
     * The PHP class names must implement Sabre\Xml\Element.
     *
     * Values may also be a callable. In that case the function will be called
     * directly.
     *
     * @var array
     */
    public $elementMap = [];
    /**
     * This is a list of namespaces that you want to give default prefixes.
     *
     * You must make sure you create this entire list before starting to write.
     * They should be registered on the root element.
     *
     * @var array
     */
    public $namespaceMap = [];
    /**
     * This is a list of custom serializers for specific classes.
     *
     * The writer may use this if you attempt to serialize an object with a
     * class that does not implement XmlSerializable.
     *
     * Instead it will look at this classmap to see if there is a custom
     * serializer here. This is useful if you don't want your value objects
     * to be responsible for serializing themselves.
     *
     * The keys in this classmap need to be fully qualified PHP class names,
     * the values must be callbacks. The callbacks take two arguments. The
     * writer class, and the value that must be written.
     *
     * function (Writer $writer, object $value)
     *
     * @var array
     */
    public $classMap = [];
    /**
     * A bitmask of the LIBXML_* constants.
     *
     * @var int
     */
    public $options = 0;
    /**
     * Returns a fresh XML Reader.
     */
    public function getReader() : \Sabre\Xml\Reader
    {
    }
    /**
     * Returns a fresh xml writer.
     */
    public function getWriter() : \Sabre\Xml\Writer
    {
    }
    /**
     * Parses a document in full.
     *
     * Input may be specified as a string or readable stream resource.
     * The returned value is the value of the root document.
     *
     * Specifying the $contextUri allows the parser to figure out what the URI
     * of the document was. This allows relative URIs within the document to be
     * expanded easily.
     *
     * The $rootElementName is specified by reference and will be populated
     * with the root element name of the document.
     *
     * @param string|resource $input
     *
     * @throws ParseException
     *
     * @return array|object|string
     */
    public function parse($input, string $contextUri = null, string &$rootElementName = null)
    {
    }
    /**
     * Parses a document in full, and specify what the expected root element
     * name is.
     *
     * This function works similar to parse, but the difference is that the
     * user can specify what the expected name of the root element should be,
     * in clark notation.
     *
     * This is useful in cases where you expected a specific document to be
     * passed, and reduces the amount of if statements.
     *
     * It's also possible to pass an array of expected rootElements if your
     * code may expect more than one document type.
     *
     * @param string|string[] $rootElementName
     * @param string|resource $input
     *
     * @throws ParseException
     *
     * @return array|object|string
     */
    public function expect($rootElementName, $input, string $contextUri = null)
    {
    }
    /**
     * Generates an XML document in one go.
     *
     * The $rootElement must be specified in clark notation.
     * The value must be a string, an array or an object implementing
     * XmlSerializable. Basically, anything that's supported by the Writer
     * object.
     *
     * $contextUri can be used to specify a sort of 'root' of the PHP application,
     * in case the xml document is used as a http response.
     *
     * This allows an implementor to easily create URI's relative to the root
     * of the domain.
     *
     * @param string|array|object|XmlSerializable $value
     *
     * @return string
     */
    public function write(string $rootElementName, $value, string $contextUri = null)
    {
    }
    /**
     * Map an XML element to a PHP class.
     *
     * Calling this function will automatically set up the Reader and Writer
     * classes to turn a specific XML element to a PHP class.
     *
     * For example, given a class such as :
     *
     * class Author {
     *   public $firstName;
     *   public $lastName;
     * }
     *
     * and an XML element such as:
     *
     * <author xmlns="http://example.org/ns">
     *   <firstName>...</firstName>
     *   <lastName>...</lastName>
     * </author>
     *
     * These can easily be mapped by calling:
     *
     * $service->mapValueObject('{http://example.org}author', 'Author');
     */
    public function mapValueObject(string $elementName, string $className)
    {
    }
    /**
     * Writes a value object.
     *
     * This function largely behaves similar to write(), except that it's
     * intended specifically to serialize a Value Object into an XML document.
     *
     * The ValueObject must have been previously registered using
     * mapValueObject().
     *
     * @param object $object
     *
     * @throws \InvalidArgumentException
     */
    public function writeValueObject($object, string $contextUri = null)
    {
    }
    /**
     * Parses a clark-notation string, and returns the namespace and element
     * name components.
     *
     * If the string was invalid, it will throw an InvalidArgumentException.
     *
     * @throws \InvalidArgumentException
     */
    public static function parseClarkNotation(string $str) : array
    {
    }
    /**
     * A list of classes and which XML elements they map to.
     */
    protected $valueObjectMap = [];
}