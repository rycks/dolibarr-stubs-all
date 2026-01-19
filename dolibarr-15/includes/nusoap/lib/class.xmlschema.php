<?php

/**
* parses an XML Schema, allows access to it's data, other utility methods.
* imperfect, no validation... yet, but quite functional.
*
* @author   Dietrich Ayala <dietrich@ganx4.com>
* @author   Scott Nichol <snichol@users.sourceforge.net>
* @access   public
*/
class nusoap_xmlschema extends \nusoap_base
{
    // files
    var $schema = '';
    var $xml = '';
    // namespaces
    var $enclosingNamespaces;
    // schema info
    var $schemaInfo = array();
    var $schemaTargetNamespace = '';
    // types, elements, attributes defined by the schema
    var $attributes = array();
    var $complexTypes = array();
    var $complexTypeStack = array();
    var $currentComplexType = \null;
    var $elements = array();
    var $elementStack = array();
    var $currentElement = \null;
    var $simpleTypes = array();
    var $simpleTypeStack = array();
    var $currentSimpleType = \null;
    // imports
    var $imports = array();
    // parser vars
    var $parser;
    var $position = 0;
    var $depth = 0;
    var $depth_array = array();
    var $message = array();
    var $defaultNamespace = array();
    /**
     * constructor
     *
     * @param    string $schema schema document URI
     * @param    string $xml xml document URI
     * @param	string $namespaces namespaces defined in enclosing XML
     * @access   public
     */
    function __construct($schema = '', $xml = '', $namespaces = array())
    {
    }
    /**
     * parse an XML file
     *
     * @param string $xml path/URL to XML file
     * @param string $type (schema | xml)
     * @return boolean
     * @access public
     */
    function parseFile($xml, $type)
    {
    }
    /**
     * parse an XML string
     *
     * @param    string $xml path or URL
     * @param	string $type (schema|xml)
     * @access   private
     */
    function parseString($xml, $type)
    {
    }
    /**
     * gets a type name for an unnamed type
     *
     * @param	string	Element name
     * @return	string	A type name for an unnamed type
     * @access	private
     */
    function CreateTypeName($ename)
    {
    }
    /**
     * start-element handler
     *
     * @param    string $parser XML parser object
     * @param    string $name element name
     * @param    string $attrs associative array of attributes
     * @access   private
     */
    function schemaStartElement($parser, $name, $attrs)
    {
    }
    /**
     * end-element handler
     *
     * @param    string $parser XML parser object
     * @param    string $name element name
     * @access   private
     */
    function schemaEndElement($parser, $name)
    {
    }
    /**
     * element content handler
     *
     * @param    string $parser XML parser object
     * @param    string $data element content
     * @access   private
     */
    function schemaCharacterData($parser, $data)
    {
    }
    /**
     * serialize the schema
     *
     * @access   public
     */
    function serializeSchema()
    {
    }
    /**
     * adds debug data to the clas level debug string
     *
     * @param    string $string debug data
     * @access   private
     */
    function xdebug($string)
    {
    }
    /**
     * get the PHP type of a user defined type in the schema
     * PHP type is kind of a misnomer since it actually returns 'struct' for assoc. arrays
     * returns false if no type exists, or not w/ the given namespace
     * else returns a string that is either a native php type, or 'struct'
     *
     * @param string $type name of defined type
     * @param string $ns namespace of type
     * @return mixed
     * @access public
     * @deprecated
     */
    function getPHPType($type, $ns)
    {
    }
    /**
     * returns an associative array of information about a given type
     * returns false if no type exists by the given name
     *
     *	For a complexType typeDef = array(
     *	'restrictionBase' => '',
     *	'phpType' => '',
     *	'compositor' => '(sequence|all)',
     *	'elements' => array(), // refs to elements array
     *	'attrs' => array() // refs to attributes array
     *	... and so on (see addComplexType)
     *	)
     *
     *   For simpleType or element, the array has different keys.
     *
     * @param string $type
     * @return mixed
     * @access public
     * @see addComplexType
     * @see addSimpleType
     * @see addElement
     */
    function getTypeDef($type)
    {
    }
    /**
     * returns a sample serialization of a given type, or false if no type by the given name
     *
     * @param string $type name of type
     * @return mixed
     * @access public
     * @deprecated
     */
    function serializeTypeDef($type)
    {
    }
    /**
     * returns HTML form elements that allow a user
     * to enter values for creating an instance of the given type.
     *
     * @param string $name name for type instance
     * @param string $type name of type
     * @return string
     * @access public
     * @deprecated
     */
    function typeToForm($name, $type)
    {
    }
    /**
     * adds a complex type to the schema
     *
     * example: array
     *
     * addType(
     * 	'ArrayOfstring',
     * 	'complexType',
     * 	'array',
     * 	'',
     * 	'SOAP-ENC:Array',
     * 	array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'string[]'),
     * 	'xsd:string'
     * );
     *
     * example: PHP associative array ( SOAP Struct )
     *
     * addType(
     * 	'SOAPStruct',
     * 	'complexType',
     * 	'struct',
     * 	'all',
     * 	array('myVar'=> array('name'=>'myVar','type'=>'string')
     * );
     *
     * @param name
     * @param typeClass (complexType|simpleType|attribute)
     * @param phpType: currently supported are array and struct (php assoc array)
     * @param compositor (all|sequence|choice)
     * @param restrictionBase namespace:name (http://schemas.xmlsoap.org/soap/encoding/:Array)
     * @param elements = array ( name = array(name=>'',type=>'') )
     * @param attrs = array(
     * 	array(
     *		'ref' => "http://schemas.xmlsoap.org/soap/encoding/:arrayType",
     *		"http://schemas.xmlsoap.org/wsdl/:arrayType" => "string[]"
     * 	)
     * )
     * @param arrayType: namespace:name (http://www.w3.org/2001/XMLSchema:string)
     * @access public
     * @see getTypeDef
     */
    function addComplexType($name, $typeClass = 'complexType', $phpType = 'array', $compositor = '', $restrictionBase = '', $elements = array(), $attrs = array(), $arrayType = '')
    {
    }
    /**
     * adds a simple type to the schema
     *
     * @param string $name
     * @param string $restrictionBase namespace:name (http://schemas.xmlsoap.org/soap/encoding/:Array)
     * @param string $typeClass (should always be simpleType)
     * @param string $phpType (should always be scalar)
     * @param array $enumeration array of values
     * @access public
     * @see nusoap_xmlschema
     * @see getTypeDef
     */
    function addSimpleType($name, $restrictionBase = '', $typeClass = 'simpleType', $phpType = 'scalar', $enumeration = array())
    {
    }
    /**
     * adds an element to the schema
     *
     * @param array $attrs attributes that must include name and type
     * @see nusoap_xmlschema
     * @access public
     */
    function addElement($attrs)
    {
    }
}
/**
 * Backward compatibility
 */
class XMLSchema extends \nusoap_xmlschema
{
}