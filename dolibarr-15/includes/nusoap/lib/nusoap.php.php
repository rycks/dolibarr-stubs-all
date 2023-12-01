<?php

/**
*
* nusoap_base
*
* @author   Dietrich Ayala <dietrich@ganx4.com>
* @author   Scott Nichol <snichol@users.sourceforge.net>
* @access   public
*/
class nusoap_base
{
    /**
     * Identification for HTTP headers.
     *
     * @var string
     * @access private
     */
    var $title = 'NuSOAP';
    /**
     * Version for HTTP headers.
     *
     * @var string
     * @access private
     */
    var $version = '0.9.5';
    /**
     * CVS revision for HTTP headers.
     *
     * @var string
     * @access private
     */
    var $revision = '1.15';
    /**
     * Current error string (manipulated by getError/setError)
     *
     * @var string
     * @access private
     */
    var $error_str = '';
    /**
     * Current debug string (manipulated by debug/appendDebug/clearDebug/getDebug/getDebugAsXMLComment)
     *
     * @var string
     * @access private
     */
    var $debug_str = '';
    /**
     * toggles automatic encoding of special characters as entities
     * (should always be true, I think)
     *
     * @var boolean
     * @access private
     */
    var $charencoding = \true;
    /**
     * the debug level for this instance
     *
     * @var	integer
     * @access private
     */
    var $debugLevel;
    /**
     * set schema version
     *
     * @var      string
     * @access   public
     */
    var $XMLSchemaVersion = 'http://www.w3.org/2001/XMLSchema';
    /**
     * charset encoding for outgoing messages
     *
     * @var      string
     * @access   public
     */
    var $soap_defencoding = 'ISO-8859-1';
    //var $soap_defencoding = 'UTF-8';
    /**
     * namespaces in an array of prefix => uri
     *
     * this is "seeded" by a set of constants, but it may be altered by code
     *
     * @var      array
     * @access   public
     */
    var $namespaces = array('SOAP-ENV' => 'http://schemas.xmlsoap.org/soap/envelope/', 'xsd' => 'http://www.w3.org/2001/XMLSchema', 'xsi' => 'http://www.w3.org/2001/XMLSchema-instance', 'SOAP-ENC' => 'http://schemas.xmlsoap.org/soap/encoding/');
    /**
     * namespaces used in the current context, e.g. during serialization
     *
     * @var      array
     * @access   private
     */
    var $usedNamespaces = array();
    /**
     * XML Schema types in an array of uri => (array of xml type => php type)
     * is this legacy yet?
     * no, this is used by the nusoap_xmlschema class to verify type => namespace mappings.
     * @var      array
     * @access   public
     */
    var $typemap = array('http://www.w3.org/2001/XMLSchema' => array(
        'string' => 'string',
        'boolean' => 'boolean',
        'float' => 'double',
        'double' => 'double',
        'decimal' => 'double',
        'duration' => '',
        'dateTime' => 'string',
        'time' => 'string',
        'date' => 'string',
        'gYearMonth' => '',
        'gYear' => '',
        'gMonthDay' => '',
        'gDay' => '',
        'gMonth' => '',
        'hexBinary' => 'string',
        'base64Binary' => 'string',
        // abstract "any" types
        'anyType' => 'string',
        'anySimpleType' => 'string',
        // derived datatypes
        'normalizedString' => 'string',
        'token' => 'string',
        'language' => '',
        'NMTOKEN' => '',
        'NMTOKENS' => '',
        'Name' => '',
        'NCName' => '',
        'ID' => '',
        'IDREF' => '',
        'IDREFS' => '',
        'ENTITY' => '',
        'ENTITIES' => '',
        'integer' => 'integer',
        'nonPositiveInteger' => 'integer',
        'negativeInteger' => 'integer',
        'long' => 'integer',
        'int' => 'integer',
        'short' => 'integer',
        'byte' => 'integer',
        'nonNegativeInteger' => 'integer',
        'unsignedLong' => '',
        'unsignedInt' => '',
        'unsignedShort' => '',
        'unsignedByte' => '',
        'positiveInteger' => '',
    ), 'http://www.w3.org/2000/10/XMLSchema' => array('i4' => '', 'int' => 'integer', 'boolean' => 'boolean', 'string' => 'string', 'double' => 'double', 'float' => 'double', 'dateTime' => 'string', 'timeInstant' => 'string', 'base64Binary' => 'string', 'base64' => 'string', 'ur-type' => 'array'), 'http://www.w3.org/1999/XMLSchema' => array('i4' => '', 'int' => 'integer', 'boolean' => 'boolean', 'string' => 'string', 'double' => 'double', 'float' => 'double', 'dateTime' => 'string', 'timeInstant' => 'string', 'base64Binary' => 'string', 'base64' => 'string', 'ur-type' => 'array'), 'http://soapinterop.org/xsd' => array('SOAPStruct' => 'struct'), 'http://schemas.xmlsoap.org/soap/encoding/' => array('base64' => 'string', 'array' => 'array', 'Array' => 'array'), 'http://xml.apache.org/xml-soap' => array('Map'));
    /**
     * XML entities to convert
     *
     * @var      array
     * @access   public
     * @deprecated
     * @see	expandEntities
     */
    var $xmlEntities = array('quot' => '"', 'amp' => '&', 'lt' => '<', 'gt' => '>', 'apos' => "'");
    /**
     * constructor
     *
     * @access	public
     */
    function __construct()
    {
    }
    /**
     * gets the global debug level, which applies to future instances
     *
     * @return	integer	Debug level 0-9, where 0 turns off
     * @access	public
     */
    function getGlobalDebugLevel()
    {
    }
    /**
     * sets the global debug level, which applies to future instances
     *
     * @param	int	$level	Debug level 0-9, where 0 turns off
     * @access	public
     */
    function setGlobalDebugLevel($level)
    {
    }
    /**
     * gets the debug level for this instance
     *
     * @return	int	Debug level 0-9, where 0 turns off
     * @access	public
     */
    function getDebugLevel()
    {
    }
    /**
     * sets the debug level for this instance
     *
     * @param	int	$level	Debug level 0-9, where 0 turns off
     * @access	public
     */
    function setDebugLevel($level)
    {
    }
    /**
     * adds debug data to the instance debug string with formatting
     *
     * @param    string $string debug data
     * @access   private
     */
    function debug($string)
    {
    }
    /**
     * adds debug data to the instance debug string without formatting
     *
     * @param    string $string debug data
     * @access   public
     */
    function appendDebug($string)
    {
    }
    /**
     * clears the current debug data for this instance
     *
     * @access   public
     */
    function clearDebug()
    {
    }
    /**
     * gets the current debug data for this instance
     *
     * @return   debug data
     * @access   public
     */
    function &getDebug()
    {
    }
    /**
     * gets the current debug data for this instance as an XML comment
     * this may change the contents of the debug data
     *
     * @return   debug data as an XML comment
     * @access   public
     */
    function &getDebugAsXMLComment()
    {
    }
    /**
     * expands entities, e.g. changes '<' to '&lt;'.
     *
     * @param	string	$val	The string in which to expand entities.
     * @access	private
     */
    function expandEntities($val)
    {
    }
    /**
     * returns error string if present
     *
     * @return   mixed error string or false
     * @access   public
     */
    function getError()
    {
    }
    /**
     * sets error string
     *
     * @return   boolean $string error string
     * @access   private
     */
    function setError($str)
    {
    }
    /**
     * detect if array is a simple array or a struct (associative array)
     *
     * @param	mixed	$val	The PHP array
     * @return	string	(arraySimple|arrayStruct)
     * @access	private
     */
    function isArraySimpleOrStruct($val)
    {
    }
    /**
     * serializes PHP values in accordance w/ section 5. Type information is
     * not serialized if $use == 'literal'.
     *
     * @param	mixed	$val	The value to serialize
     * @param	string	$name	The name (local part) of the XML element
     * @param	string	$type	The XML schema type (local part) for the element
     * @param	string	$name_ns	The namespace for the name of the XML element
     * @param	string	$type_ns	The namespace for the type of the element
     * @param	array	$attributes	The attributes to serialize as name=>value pairs
     * @param	string	$use	The WSDL "use" (encoded|literal)
     * @param	boolean	$soapval	Whether this is called from soapval.
     * @return	string	The serialized element, possibly with child elements
     * @access	public
     */
    function serialize_val($val, $name = \false, $type = \false, $name_ns = \false, $type_ns = \false, $attributes = \false, $use = 'encoded', $soapval = \false)
    {
    }
    /**
     * serializes a message
     *
     * @param string $body the XML of the SOAP body
     * @param mixed $headers optional string of XML with SOAP header content, or array of soapval objects for SOAP headers, or associative array
     * @param array $namespaces optional the namespaces used in generating the body and headers
     * @param string $style optional (rpc|document)
     * @param string $use optional (encoded|literal)
     * @param string $encodingStyle optional (usually 'http://schemas.xmlsoap.org/soap/encoding/' for encoded)
     * @return string the message
     * @access public
     */
    function serializeEnvelope($body, $headers = \false, $namespaces = array(), $style = 'rpc', $use = 'encoded', $encodingStyle = 'http://schemas.xmlsoap.org/soap/encoding/')
    {
    }
    /**
     * formats a string to be inserted into an HTML stream
     *
     * @param string $str The string to format
     * @return string The formatted string
     * @access public
     * @deprecated
     */
    function formatDump($str)
    {
    }
    /**
     * contracts (changes namespace to prefix) a qualified name
     *
     * @param    string $qname qname
     * @return	string contracted qname
     * @access   private
     */
    function contractQname($qname)
    {
    }
    /**
     * expands (changes prefix to namespace) a qualified name
     *
     * @param    string $qname qname
     * @return	string expanded qname
     * @access   private
     */
    function expandQname($qname)
    {
    }
    /**
     * returns the local part of a prefixed string
     * returns the original string, if not prefixed
     *
     * @param string $str The prefixed string
     * @return string The local part
     * @access public
     */
    function getLocalPart($str)
    {
    }
    /**
     * returns the prefix part of a prefixed string
     * returns false, if not prefixed
     *
     * @param string $str The prefixed string
     * @return mixed The prefix or false if there is no prefix
     * @access public
     */
    function getPrefix($str)
    {
    }
    /**
     * pass it a prefix, it returns a namespace
     *
     * @param string $prefix The prefix
     * @return mixed The namespace, false if no namespace has the specified prefix
     * @access public
     */
    function getNamespaceFromPrefix($prefix)
    {
    }
    /**
     * returns the prefix for a given namespace (or prefix)
     * or false if no prefixes registered for the given namespace
     *
     * @param string $ns The namespace
     * @return mixed The prefix, false if the namespace has no prefixes
     * @access public
     */
    function getPrefixFromNamespace($ns)
    {
    }
    /**
     * returns the time in ODBC canonical form with microseconds
     *
     * @return string The time in ODBC canonical form with microseconds
     * @access public
     */
    function getmicrotime()
    {
    }
    /**
     * Returns a string with the output of var_dump
     *
     * @param mixed $data The variable to var_dump
     * @return string The output of var_dump
     * @access public
     */
    function varDump($data)
    {
    }
    /**
     * represents the object as a string
     *
     * @return	string
     * @access   public
     */
    function __toString()
    {
    }
}
/**
* Contains information for a SOAP fault.
* Mainly used for returning faults from deployed functions
* in a server instance.
* @author   Dietrich Ayala <dietrich@ganx4.com>
* @access public
*/
class nusoap_fault extends \nusoap_base
{
    /**
     * The fault code (client|server)
     * @var string
     * @access private
     */
    var $faultcode;
    /**
     * The fault actor
     * @var string
     * @access private
     */
    var $faultactor;
    /**
     * The fault string, a description of the fault
     * @var string
     * @access private
     */
    var $faultstring;
    /**
     * The fault detail, typically a string or array of string
     * @var mixed
     * @access private
     */
    var $faultdetail;
    /**
     * constructor
     *
     * @param string $faultcode (SOAP-ENV:Client | SOAP-ENV:Server)
     * @param string $faultactor only used when msg routed between multiple actors
     * @param string $faultstring human readable error message
     * @param mixed $faultdetail detail, typically a string or array of string
     */
    function __construct($faultcode, $faultactor = '', $faultstring = '', $faultdetail = '')
    {
    }
    /**
     * serialize a fault
     *
     * @return	string	The serialization of the fault instance.
     * @access   public
     */
    function serialize()
    {
    }
}
/**
 * Backward compatibility
 */
class soap_fault extends \nusoap_fault
{
}
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
/**
* For creating serializable abstractions of native PHP types.  This class
* allows element name/namespace, XSD type, and XML attributes to be
* associated with a value.  This is extremely useful when WSDL is not
* used, but is also useful when WSDL is used with polymorphic types, including
* xsd:anyType and user-defined types.
*
* @author   Dietrich Ayala <dietrich@ganx4.com>
* @access   public
*/
class soapval extends \nusoap_base
{
    /**
     * The XML element name
     *
     * @var string
     * @access private
     */
    var $name;
    /**
     * The XML type name (string or false)
     *
     * @var mixed
     * @access private
     */
    var $type;
    /**
     * The PHP value
     *
     * @var mixed
     * @access private
     */
    var $value;
    /**
     * The XML element namespace (string or false)
     *
     * @var mixed
     * @access private
     */
    var $element_ns;
    /**
     * The XML type namespace (string or false)
     *
     * @var mixed
     * @access private
     */
    var $type_ns;
    /**
     * The XML element attributes (array or false)
     *
     * @var mixed
     * @access private
     */
    var $attributes;
    /**
     * constructor
     *
     * @param    string $name optional name
     * @param    mixed $type optional type name
     * @param	mixed $value optional value
     * @param	mixed $element_ns optional namespace of value
     * @param	mixed $type_ns optional namespace of type
     * @param	mixed $attributes associative array of attributes to add to element serialization
     * @access   public
     */
    function __construct($name = 'soapval', $type = \false, $value = -1, $element_ns = \false, $type_ns = \false, $attributes = \false)
    {
    }
    /**
     * return serialized value
     *
     * @param	string $use The WSDL use value (encoded|literal)
     * @return	string XML data
     * @access   public
     */
    function serialize($use = 'encoded')
    {
    }
    /**
     * decodes a soapval object into a PHP native type
     *
     * @return	mixed
     * @access   public
     */
    function decode()
    {
    }
}
/**
* transport class for sending/receiving data via HTTP and HTTPS
* NOTE: PHP must be compiled with the CURL extension for HTTPS support
*
* @author   Dietrich Ayala <dietrich@ganx4.com>
* @author   Scott Nichol <snichol@users.sourceforge.net>
* @access public
*/
class soap_transport_http extends \nusoap_base
{
    var $url = '';
    var $uri = '';
    var $digest_uri = '';
    var $scheme = '';
    var $host = '';
    var $port = '';
    var $path = '';
    var $request_method = 'POST';
    var $protocol_version = '1.0';
    var $encoding = '';
    var $outgoing_headers = array();
    var $incoming_headers = array();
    var $incoming_cookies = array();
    var $outgoing_payload = '';
    var $incoming_payload = '';
    var $response_status_line;
    // HTTP response status line
    var $useSOAPAction = \true;
    var $persistentConnection = \false;
    var $ch = \false;
    // cURL handle
    var $ch_options = array();
    // cURL custom options
    var $use_curl = \false;
    // force cURL use
    var $proxy = \null;
    // proxy information (associative array)
    var $username = '';
    var $password = '';
    var $authtype = '';
    var $digestRequest = array();
    var $certRequest = array();
    // keys must be cainfofile (optional), sslcertfile, sslkeyfile, passphrase, certpassword (optional), verifypeer (optional), verifyhost (optional)
    // cainfofile: certificate authority file, e.g. '$pathToPemFiles/rootca.pem'
    // sslcertfile: SSL certificate file, e.g. '$pathToPemFiles/mycert.pem'
    // sslkeyfile: SSL key file, e.g. '$pathToPemFiles/mykey.pem'
    // passphrase: SSL key password/passphrase
    // certpassword: SSL certificate password
    // verifypeer: default is 1
    // verifyhost: default is 1
    /**
     * constructor
     *
     * @param string $url The URL to which to connect
     * @param array $curl_options User-specified cURL options
     * @param boolean $use_curl Whether to try to force cURL use
     * @access public
     */
    function __construct($url, $curl_options = \NULL, $use_curl = \false)
    {
    }
    /**
     * sets a cURL option
     *
     * @param	mixed $option The cURL option (always integer?)
     * @param	mixed $value The cURL option value
     * @access   private
     */
    function setCurlOption($option, $value)
    {
    }
    /**
     * sets an HTTP header
     *
     * @param string $name The name of the header
     * @param string $value The value of the header
     * @access private
     */
    function setHeader($name, $value)
    {
    }
    /**
     * unsets an HTTP header
     *
     * @param string $name The name of the header
     * @access private
     */
    function unsetHeader($name)
    {
    }
    /**
     * sets the URL to which to connect
     *
     * @param string $url The URL to which to connect
     * @access private
     */
    function setURL($url)
    {
    }
    /**
     * gets the I/O method to use
     *
     * @return	string	I/O method to use (socket|curl|unknown)
     * @access	private
     */
    function io_method()
    {
    }
    /**
     * establish an HTTP connection
     *
     * @param    integer $timeout set connection timeout in seconds
     * @param	integer $response_timeout set response timeout in seconds
     * @return	boolean true if connected, false if not
     * @access   private
     */
    function connect($connection_timeout = 0, $response_timeout = 30)
    {
    }
    /**
     * sends the SOAP request and gets the SOAP response via HTTP[S]
     *
     * @param    string $data message data
     * @param    integer $timeout set connection timeout in seconds
     * @param	integer $response_timeout set response timeout in seconds
     * @param	array $cookies cookies to send
     * @return	string data
     * @access   public
     */
    function send($data, $timeout = 0, $response_timeout = 30, $cookies = \NULL)
    {
    }
    /**
     * sends the SOAP request and gets the SOAP response via HTTPS using CURL
     *
     * @param    string $data message data
     * @param    integer $timeout set connection timeout in seconds
     * @param	integer $response_timeout set response timeout in seconds
     * @param	array $cookies cookies to send
     * @return	string data
     * @access   public
     * @deprecated
     */
    function sendHTTPS($data, $timeout = 0, $response_timeout = 30, $cookies)
    {
    }
    /**
     * if authenticating, set user credentials here
     *
     * @param    string $username
     * @param    string $password
     * @param	string $authtype (basic|digest|certificate|ntlm)
     * @param	array $digestRequest (keys must be nonce, nc, realm, qop)
     * @param	array $certRequest (keys must be cainfofile (optional), sslcertfile, sslkeyfile, passphrase, certpassword (optional), verifypeer (optional), verifyhost (optional): see corresponding options in cURL docs)
     * @access   public
     */
    function setCredentials($username, $password, $authtype = 'basic', $digestRequest = array(), $certRequest = array())
    {
    }
    /**
     * set the soapaction value
     *
     * @param    string $soapaction
     * @access   public
     */
    function setSOAPAction($soapaction)
    {
    }
    /**
     * use http encoding
     *
     * @param    string $enc encoding style. supported values: gzip, deflate, or both
     * @access   public
     */
    function setEncoding($enc = 'gzip, deflate')
    {
    }
    /**
     * set proxy info here
     *
     * @param    string $proxyhost use an empty string to remove proxy
     * @param    string $proxyport
     * @param	string $proxyusername
     * @param	string $proxypassword
     * @param	string $proxyauthtype (basic|ntlm)
     * @access   public
     */
    function setProxy($proxyhost, $proxyport, $proxyusername = '', $proxypassword = '', $proxyauthtype = 'basic')
    {
    }
    /**
     * Test if the given string starts with a header that is to be skipped.
     * Skippable headers result from chunked transfer and proxy requests.
     *
     * @param	string $data The string to check.
     * @returns	boolean	Whether a skippable header was found.
     * @access	private
     */
    function isSkippableCurlHeader(&$data)
    {
    }
    /**
     * decode a string that is encoded w/ "chunked' transfer encoding
     * as defined in RFC2068 19.4.6
     *
     * @param    string $buffer
     * @param    string $lb
     * @returns	string
     * @access   public
     * @deprecated
     */
    function decodeChunked($buffer, $lb)
    {
    }
    /**
     * Writes the payload, including HTTP headers, to $this->outgoing_payload.
     *
     * @param	string $data HTTP body
     * @param	string $cookie_str data for HTTP Cookie header
     * @return	void
     * @access	private
     */
    function buildPayload($data, $cookie_str = '')
    {
    }
    /**
     * sends the SOAP request via HTTP[S]
     *
     * @param    string $data message data
     * @param	array $cookies cookies to send
     * @return	boolean	true if OK, false if problem
     * @access   private
     */
    function sendRequest($data, $cookies = \NULL)
    {
    }
    /**
     * gets the SOAP response via HTTP[S]
     *
     * @return	string the response (also sets member variables like incoming_payload)
     * @access   private
     */
    function getResponse()
    {
    }
    /**
     * sets the content-type for the SOAP message to be sent
     *
     * @param	string $type the content type, MIME style
     * @param	mixed $charset character set used for encoding (or false)
     * @access	public
     */
    function setContentType($type, $charset = \false)
    {
    }
    /**
     * specifies that an HTTP persistent connection should be used
     *
     * @return	boolean whether the request was honored by this method.
     * @access	public
     */
    function usePersistentConnection()
    {
    }
    /**
     * parse an incoming Cookie into it's parts
     *
     * @param	string $cookie_str content of cookie
     * @return	array with data of that cookie
     * @access	private
     */
    /*
     * TODO: allow a Set-Cookie string to be parsed into multiple cookies
     */
    function parseCookie($cookie_str)
    {
    }
    /**
     * sort out cookies for the current request
     *
     * @param	array $cookies array with all cookies
     * @param	boolean $secure is the send-content secure or not?
     * @return	string for Cookie-HTTP-Header
     * @access	private
     */
    function getCookiesForRequest($cookies, $secure = \false)
    {
    }
}
/**
*
* nusoap_server allows the user to create a SOAP server
* that is capable of receiving messages and returning responses
*
* @author   Dietrich Ayala <dietrich@ganx4.com>
* @author   Scott Nichol <snichol@users.sourceforge.net>
* @access   public
*/
class nusoap_server extends \nusoap_base
{
    /**
     * HTTP headers of request
     * @var array
     * @access private
     */
    var $headers = array();
    /**
     * HTTP request
     * @var string
     * @access private
     */
    var $request = '';
    /**
     * SOAP headers from request (incomplete namespace resolution; special characters not escaped) (text)
     * @var string
     * @access public
     */
    var $requestHeaders = '';
    /**
     * SOAP Headers from request (parsed)
     * @var mixed
     * @access public
     */
    var $requestHeader = \NULL;
    /**
     * SOAP body request portion (incomplete namespace resolution; special characters not escaped) (text)
     * @var string
     * @access public
     */
    var $document = '';
    /**
     * SOAP payload for request (text)
     * @var string
     * @access public
     */
    var $requestSOAP = '';
    /**
     * requested method namespace URI
     * @var string
     * @access private
     */
    var $methodURI = '';
    /**
     * name of method requested
     * @var string
     * @access private
     */
    var $methodname = '';
    /**
     * method parameters from request
     * @var array
     * @access private
     */
    var $methodparams = array();
    /**
     * SOAP Action from request
     * @var string
     * @access private
     */
    var $SOAPAction = '';
    /**
     * character set encoding of incoming (request) messages
     * @var string
     * @access public
     */
    var $xml_encoding = '';
    /**
     * toggles whether the parser decodes element content w/ utf8_decode()
     * @var boolean
     * @access public
     */
    var $decode_utf8 = \true;
    /**
     * HTTP headers of response
     * @var array
     * @access public
     */
    var $outgoing_headers = array();
    /**
     * HTTP response
     * @var string
     * @access private
     */
    var $response = '';
    /**
     * SOAP headers for response (text or array of soapval or associative array)
     * @var mixed
     * @access public
     */
    var $responseHeaders = '';
    /**
     * SOAP payload for response (text)
     * @var string
     * @access private
     */
    var $responseSOAP = '';
    /**
     * method return value to place in response
     * @var mixed
     * @access private
     */
    var $methodreturn = \false;
    /**
     * whether $methodreturn is a string of literal XML
     * @var boolean
     * @access public
     */
    var $methodreturnisliteralxml = \false;
    /**
     * SOAP fault for response (or false)
     * @var mixed
     * @access private
     */
    var $fault = \false;
    /**
     * text indication of result (for debugging)
     * @var string
     * @access private
     */
    var $result = 'successful';
    /**
     * assoc array of operations => opData; operations are added by the register()
     * method or by parsing an external WSDL definition
     * @var array
     * @access private
     */
    var $operations = array();
    /**
     * wsdl instance (if one)
     * @var mixed
     * @access private
     */
    var $wsdl = \false;
    /**
     * URL for WSDL (if one)
     * @var mixed
     * @access private
     */
    var $externalWSDLURL = \false;
    /**
     * whether to append debug to response as XML comment
     * @var boolean
     * @access public
     */
    var $debug_flag = \false;
    /**
     * constructor
     * the optional parameter is a path to a WSDL file that you'd like to bind the server instance to.
     *
     * @param mixed $wsdl file path or URL (string), or wsdl instance (object)
     * @access   public
     */
    function __construct($wsdl = \false)
    {
    }
    /**
     * processes request and returns response
     *
     * @param    string $data usually is the value of $HTTP_RAW_POST_DATA
     * @access   public
     */
    function service($data)
    {
    }
    /**
     * parses HTTP request headers.
     *
     * The following fields are set by this function (when successful)
     *
     * headers
     * request
     * xml_encoding
     * SOAPAction
     *
     * @access   private
     */
    function parse_http_headers()
    {
    }
    /**
     * parses a request
     *
     * The following fields are set by this function (when successful)
     *
     * headers
     * request
     * xml_encoding
     * SOAPAction
     * request
     * requestSOAP
     * methodURI
     * methodname
     * methodparams
     * requestHeaders
     * document
     *
     * This sets the fault field on error
     *
     * @param    string $data XML string
     * @access   private
     */
    function parse_request($data = '')
    {
    }
    /**
     * invokes a PHP function for the requested SOAP method
     *
     * The following fields are set by this function (when successful)
     *
     * methodreturn
     *
     * Note that the PHP function that is called may also set the following
     * fields to affect the response sent to the client
     *
     * responseHeaders
     * outgoing_headers
     *
     * This sets the fault field on error
     *
     * @access   private
     */
    function invoke_method()
    {
    }
    /**
     * serializes the return value from a PHP function into a full SOAP Envelope
     *
     * The following fields are set by this function (when successful)
     *
     * responseSOAP
     *
     * This sets the fault field on error
     *
     * @access   private
     */
    function serialize_return()
    {
    }
    /**
     * sends an HTTP response
     *
     * The following fields are set by this function (when successful)
     *
     * outgoing_headers
     * response
     *
     * @access   private
     */
    function send_response()
    {
    }
    /**
     * takes the value that was created by parsing the request
     * and compares to the method's signature, if available.
     *
     * @param	string	$operation	The operation to be invoked
     * @param	array	$request	The array of parameter values
     * @return	boolean	Whether the operation was found
     * @access   private
     */
    function verify_method($operation, $request)
    {
    }
    /**
     * processes SOAP message received from client
     *
     * @param	array	$headers	The HTTP headers
     * @param	string	$data		unprocessed request data from client
     * @return	mixed	value of the message, decoded into a PHP type
     * @access   private
     */
    function parseRequest($headers, $data)
    {
    }
    /**
     * gets the HTTP body for the current response.
     *
     * @param string $soapmsg The SOAP payload
     * @return string The HTTP body, which includes the SOAP payload
     * @access private
     */
    function getHTTPBody($soapmsg)
    {
    }
    /**
     * gets the HTTP content type for the current response.
     *
     * Note: getHTTPBody must be called before this.
     *
     * @return string the HTTP content type for the current response.
     * @access private
     */
    function getHTTPContentType()
    {
    }
    /**
     * gets the HTTP content type charset for the current response.
     * returns false for non-text content types.
     *
     * Note: getHTTPBody must be called before this.
     *
     * @return string the HTTP content type charset for the current response.
     * @access private
     */
    function getHTTPContentTypeCharset()
    {
    }
    /**
     * add a method to the dispatch map (this has been replaced by the register method)
     *
     * @param    string $methodname
     * @param    string $in array of input values
     * @param    string $out array of output values
     * @access   public
     * @deprecated
     */
    function add_to_map($methodname, $in, $out)
    {
    }
    /**
     * register a service function with the server
     *
     * @param    string $name the name of the PHP function, class.method or class..method
     * @param    array $in assoc array of input values: key = param name, value = param type
     * @param    array $out assoc array of output values: key = param name, value = param type
     * @param	mixed $namespace the element namespace for the method or false
     * @param	mixed $soapaction the soapaction for the method or false
     * @param	mixed $style optional (rpc|document) or false Note: when 'document' is specified, parameter and return wrappers are created for you automatically
     * @param	mixed $use optional (encoded|literal) or false
     * @param	string $documentation optional Description to include in WSDL
     * @param	string $encodingStyle optional (usually 'http://schemas.xmlsoap.org/soap/encoding/' for encoded)
     * @access   public
     */
    function register($name, $in = array(), $out = array(), $namespace = \false, $soapaction = \false, $style = \false, $use = \false, $documentation = '', $encodingStyle = '')
    {
    }
    /**
     * Specify a fault to be returned to the client.
     * This also acts as a flag to the server that a fault has occured.
     *
     * @param	string $faultcode
     * @param	string $faultstring
     * @param	string $faultactor
     * @param	string $faultdetail
     * @access   public
     */
    function fault($faultcode, $faultstring, $faultactor = '', $faultdetail = '')
    {
    }
    /**
     * Sets up wsdl object.
     * Acts as a flag to enable internal WSDL generation
     *
     * @param string $serviceName, name of the service
     * @param mixed $namespace optional 'tns' service namespace or false
     * @param mixed $endpoint optional URL of service endpoint or false
     * @param string $style optional (rpc|document) WSDL style (also specified by operation)
     * @param string $transport optional SOAP transport
     * @param mixed $schemaTargetNamespace optional 'types' targetNamespace for service schema or false
     */
    function configureWSDL($serviceName, $namespace = \false, $endpoint = \false, $style = 'rpc', $transport = 'http://schemas.xmlsoap.org/soap/http', $schemaTargetNamespace = \false)
    {
    }
}
/**
 * Backward compatibility
 */
class soap_server extends \nusoap_server
{
}
/**
* parses a WSDL file, allows access to it's data, other utility methods.
* also builds WSDL structures programmatically.
*
* @author   Dietrich Ayala <dietrich@ganx4.com>
* @author   Scott Nichol <snichol@users.sourceforge.net>
* @access public
*/
class wsdl extends \nusoap_base
{
    // URL or filename of the root of this WSDL
    var $wsdl;
    // define internal arrays of bindings, ports, operations, messages, etc.
    var $schemas = array();
    var $currentSchema;
    var $message = array();
    var $complexTypes = array();
    var $messages = array();
    var $currentMessage;
    var $currentOperation;
    var $portTypes = array();
    var $currentPortType;
    var $bindings = array();
    var $currentBinding;
    var $ports = array();
    var $currentPort;
    var $opData = array();
    var $status = '';
    var $documentation = \false;
    var $endpoint = '';
    // array of wsdl docs to import
    var $import = array();
    // parser vars
    var $parser;
    var $position = 0;
    var $depth = 0;
    var $depth_array = array();
    // for getting wsdl
    var $proxyhost = '';
    var $proxyport = '';
    var $proxyusername = '';
    var $proxypassword = '';
    var $timeout = 0;
    var $response_timeout = 30;
    var $curl_options = array();
    // User-specified cURL options
    var $use_curl = \false;
    // whether to always try to use cURL
    // for HTTP authentication
    var $username = '';
    // Username for HTTP authentication
    var $password = '';
    // Password for HTTP authentication
    var $authtype = '';
    // Type of HTTP authentication
    var $certRequest = array();
    // Certificate for HTTP SSL authentication
    /**
     * constructor
     *
     * @param string $wsdl WSDL document URL
     * @param string $proxyhost
     * @param string $proxyport
     * @param string $proxyusername
     * @param string $proxypassword
     * @param integer $timeout set the connection timeout
     * @param integer $response_timeout set the response timeout
     * @param array $curl_options user-specified cURL options
     * @param boolean $use_curl try to use cURL
     * @access public
     */
    function __construct($wsdl = '', $proxyhost = \false, $proxyport = \false, $proxyusername = \false, $proxypassword = \false, $timeout = 0, $response_timeout = 30, $curl_options = \null, $use_curl = \false)
    {
    }
    /**
     * fetches the WSDL document and parses it
     *
     * @access public
     */
    function fetchWSDL($wsdl)
    {
    }
    /**
     * parses the wsdl document
     *
     * @param string $wsdl path or URL
     * @access private
     */
    function parseWSDL($wsdl = '')
    {
    }
    /**
     * start-element handler
     *
     * @param string $parser XML parser object
     * @param string $name element name
     * @param string $attrs associative array of attributes
     * @access private
     */
    function start_element($parser, $name, $attrs)
    {
    }
    /**
     * end-element handler
     *
     * @param string $parser XML parser object
     * @param string $name element name
     * @access private
     */
    function end_element($parser, $name)
    {
    }
    /**
     * element content handler
     *
     * @param string $parser XML parser object
     * @param string $data element content
     * @access private
     */
    function character_data($parser, $data)
    {
    }
    /**
     * if authenticating, set user credentials here
     *
     * @param    string $username
     * @param    string $password
     * @param	string $authtype (basic|digest|certificate|ntlm)
     * @param	array $certRequest (keys must be cainfofile (optional), sslcertfile, sslkeyfile, passphrase, certpassword (optional), verifypeer (optional), verifyhost (optional): see corresponding options in cURL docs)
     * @access   public
     */
    function setCredentials($username, $password, $authtype = 'basic', $certRequest = array())
    {
    }
    function getBindingData($binding)
    {
    }
    /**
     * returns an assoc array of operation names => operation data
     *
     * @param string $portName WSDL port name
     * @param string $bindingType eg: soap, smtp, dime (only soap and soap12 are currently supported)
     * @return array
     * @access public
     */
    function getOperations($portName = '', $bindingType = 'soap')
    {
    }
    /**
     * returns an associative array of data necessary for calling an operation
     *
     * @param string $operation name of operation
     * @param string $bindingType type of binding eg: soap, soap12
     * @return array
     * @access public
     */
    function getOperationData($operation, $bindingType = 'soap')
    {
    }
    /**
     * returns an associative array of data necessary for calling an operation
     *
     * @param string $soapAction soapAction for operation
     * @param string $bindingType type of binding eg: soap, soap12
     * @return array
     * @access public
     */
    function getOperationDataForSoapAction($soapAction, $bindingType = 'soap')
    {
    }
    /**
     * returns an array of information about a given type
     * returns false if no type exists by the given name
     *
     *	 typeDef = array(
     *	 'elements' => array(), // refs to elements array
     *	'restrictionBase' => '',
     *	'phpType' => '',
     *	'order' => '(sequence|all)',
     *	'attrs' => array() // refs to attributes array
     *	)
     *
     * @param string $type the type
     * @param string $ns namespace (not prefix) of the type
     * @return mixed
     * @access public
     * @see nusoap_xmlschema
     */
    function getTypeDef($type, $ns)
    {
    }
    /**
     * prints html description of services
     *
     * @access private
     */
    function webDescription()
    {
    }
    /**
     * serialize the parsed wsdl
     *
     * @param mixed $debug whether to put debug=1 in endpoint URL
     * @return string serialization of WSDL
     * @access public
     */
    function serialize($debug = 0)
    {
    }
    /**
     * determine whether a set of parameters are unwrapped
     * when they are expect to be wrapped, Microsoft-style.
     *
     * @param string $type the type (element name) of the wrapper
     * @param array $parameters the parameter values for the SOAP call
     * @return boolean whether they parameters are unwrapped (and should be wrapped)
     * @access private
     */
    function parametersMatchWrapped($type, &$parameters)
    {
    }
    /**
     * serialize PHP values according to a WSDL message definition
     * contrary to the method name, this is not limited to RPC
     *
     * TODO
     * - multi-ref serialization
     * - validate PHP values against type definitions, return errors if invalid
     *
     * @param string $operation operation name
     * @param string $direction (input|output)
     * @param mixed $parameters parameter value(s)
     * @param string $bindingType (soap|soap12)
     * @return mixed parameters serialized as XML or false on error (e.g. operation not found)
     * @access public
     */
    function serializeRPCParameters($operation, $direction, $parameters, $bindingType = 'soap')
    {
    }
    /**
     * serialize a PHP value according to a WSDL message definition
     *
     * TODO
     * - multi-ref serialization
     * - validate PHP values against type definitions, return errors if invalid
     *
     * @param string $operation operation name
     * @param string $direction (input|output)
     * @param mixed $parameters parameter value(s)
     * @return mixed parameters serialized as XML or false on error (e.g. operation not found)
     * @access public
     * @deprecated
     */
    function serializeParameters($operation, $direction, $parameters)
    {
    }
    /**
     * serializes a PHP value according a given type definition
     *
     * @param string $name name of value (part or element)
     * @param string $type XML schema type of value (type or element)
     * @param mixed $value a native PHP value (parameter value)
     * @param string $use use for part (encoded|literal)
     * @param string $encodingStyle SOAP encoding style for the value (if different than the enclosing style)
     * @param boolean $unqualified a kludge for what should be XML namespace form handling
     * @return string value serialized as an XML string
     * @access private
     */
    function serializeType($name, $type, $value, $use = 'encoded', $encodingStyle = \false, $unqualified = \false)
    {
    }
    /**
     * serializes the attributes for a complexType
     *
     * @param array $typeDef our internal representation of an XML schema type (or element)
     * @param mixed $value a native PHP value (parameter value)
     * @param string $ns the namespace of the type
     * @param string $uqType the local part of the type
     * @return string value serialized as an XML string
     * @access private
     */
    function serializeComplexTypeAttributes($typeDef, $value, $ns, $uqType)
    {
    }
    /**
     * serializes the elements for a complexType
     *
     * @param array $typeDef our internal representation of an XML schema type (or element)
     * @param mixed $value a native PHP value (parameter value)
     * @param string $ns the namespace of the type
     * @param string $uqType the local part of the type
     * @param string $use use for part (encoded|literal)
     * @param string $encodingStyle SOAP encoding style for the value (if different than the enclosing style)
     * @return string value serialized as an XML string
     * @access private
     */
    function serializeComplexTypeElements($typeDef, $value, $ns, $uqType, $use = 'encoded', $encodingStyle = \false)
    {
    }
    /**
     * adds an XML Schema complex type to the WSDL types
     *
     * @param string	$name
     * @param string $typeClass (complexType|simpleType|attribute)
     * @param string $phpType currently supported are array and struct (php assoc array)
     * @param string $compositor (all|sequence|choice)
     * @param string $restrictionBase namespace:name (http://schemas.xmlsoap.org/soap/encoding/:Array)
     * @param array $elements e.g. array ( name => array(name=>'',type=>'') )
     * @param array $attrs e.g. array(array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'xsd:string[]'))
     * @param string $arrayType as namespace:name (xsd:string)
     * @see nusoap_xmlschema
     * @access public
     */
    function addComplexType($name, $typeClass = 'complexType', $phpType = 'array', $compositor = '', $restrictionBase = '', $elements = array(), $attrs = array(), $arrayType = '')
    {
    }
    /**
     * adds an XML Schema simple type to the WSDL types
     *
     * @param string $name
     * @param string $restrictionBase namespace:name (http://schemas.xmlsoap.org/soap/encoding/:Array)
     * @param string $typeClass (should always be simpleType)
     * @param string $phpType (should always be scalar)
     * @param array $enumeration array of values
     * @see nusoap_xmlschema
     * @access public
     */
    function addSimpleType($name, $restrictionBase = '', $typeClass = 'simpleType', $phpType = 'scalar', $enumeration = array())
    {
    }
    /**
     * adds an element to the WSDL types
     *
     * @param array $attrs attributes that must include name and type
     * @see nusoap_xmlschema
     * @access public
     */
    function addElement($attrs)
    {
    }
    /**
     * register an operation with the server
     *
     * @param string $name operation (method) name
     * @param array $in assoc array of input values: key = param name, value = param type
     * @param array $out assoc array of output values: key = param name, value = param type
     * @param string $namespace optional The namespace for the operation
     * @param string $soapaction optional The soapaction for the operation
     * @param string $style (rpc|document) optional The style for the operation Note: when 'document' is specified, parameter and return wrappers are created for you automatically
     * @param string $use (encoded|literal) optional The use for the parameters (cannot mix right now)
     * @param string $documentation optional The description to include in the WSDL
     * @param string $encodingStyle optional (usually 'http://schemas.xmlsoap.org/soap/encoding/' for encoded)
     * @access public
     */
    function addOperation($name, $in = \false, $out = \false, $namespace = \false, $soapaction = \false, $style = 'rpc', $use = 'encoded', $documentation = '', $encodingStyle = '')
    {
    }
}
/**
*
* nusoap_parser class parses SOAP XML messages into native PHP values
*
* @author   Dietrich Ayala <dietrich@ganx4.com>
* @author   Scott Nichol <snichol@users.sourceforge.net>
* @access   public
*/
class nusoap_parser extends \nusoap_base
{
    var $xml = '';
    var $xml_encoding = '';
    var $method = '';
    var $root_struct = '';
    var $root_struct_name = '';
    var $root_struct_namespace = '';
    var $root_header = '';
    var $document = '';
    // incoming SOAP body (text)
    // determines where in the message we are (envelope,header,body,method)
    var $status = '';
    var $position = 0;
    var $depth = 0;
    var $default_namespace = '';
    var $namespaces = array();
    var $message = array();
    var $parent = '';
    var $fault = \false;
    var $fault_code = '';
    var $fault_str = '';
    var $fault_detail = '';
    var $depth_array = array();
    var $debug_flag = \true;
    var $soapresponse = \NULL;
    // parsed SOAP Body
    var $soapheader = \NULL;
    // parsed SOAP Header
    var $responseHeaders = '';
    // incoming SOAP headers (text)
    var $body_position = 0;
    // for multiref parsing:
    // array of id => pos
    var $ids = array();
    // array of id => hrefs => pos
    var $multirefs = array();
    // toggle for auto-decoding element content
    var $decode_utf8 = \true;
    /**
     * constructor that actually does the parsing
     *
     * @param    string $xml SOAP message
     * @param    string $encoding character encoding scheme of message
     * @param    string $method method for which XML is parsed (unused?)
     * @param    string $decode_utf8 whether to decode UTF-8 to ISO-8859-1
     * @access   public
     */
    function __construct($xml, $encoding = 'UTF-8', $method = '', $decode_utf8 = \true)
    {
    }
    /**
     * start-element handler
     *
     * @param    resource $parser XML parser object
     * @param    string $name element name
     * @param    array $attrs associative array of attributes
     * @access   private
     */
    function start_element($parser, $name, $attrs)
    {
    }
    /**
     * end-element handler
     *
     * @param    resource $parser XML parser object
     * @param    string $name element name
     * @access   private
     */
    function end_element($parser, $name)
    {
    }
    /**
     * element content handler
     *
     * @param    resource $parser XML parser object
     * @param    string $data element content
     * @access   private
     */
    function character_data($parser, $data)
    {
    }
    /**
     * get the parsed message (SOAP Body)
     *
     * @return	mixed
     * @access   public
     * @deprecated	use get_soapbody instead
     */
    function get_response()
    {
    }
    /**
     * get the parsed SOAP Body (NULL if there was none)
     *
     * @return	mixed
     * @access   public
     */
    function get_soapbody()
    {
    }
    /**
     * get the parsed SOAP Header (NULL if there was none)
     *
     * @return	mixed
     * @access   public
     */
    function get_soapheader()
    {
    }
    /**
     * get the unparsed SOAP Header
     *
     * @return	string XML or empty if no Header
     * @access   public
     */
    function getHeaders()
    {
    }
    /**
     * decodes simple types into PHP variables
     *
     * @param    string $value value to decode
     * @param    string $type XML type to decode
     * @param    string $typens XML type namespace to decode
     * @return	mixed PHP value
     * @access   private
     */
    function decodeSimple($value, $type, $typens)
    {
    }
    /**
     * builds response structures for compound values (arrays/structs)
     * and scalars
     *
     * @param    integer $pos position in node tree
     * @return	mixed	PHP value
     * @access   private
     */
    function buildVal($pos)
    {
    }
}
/**
 * Backward compatibility
 */
class soap_parser extends \nusoap_parser
{
}
/**
*
* [nu]soapclient higher level class for easy usage.
*
* usage:
*
* // instantiate client with server info
* $soapclient = new nusoap_client( string path [ ,mixed wsdl] );
*
* // call method, get results
* echo $soapclient->call( string methodname [ ,array parameters] );
*
* // bye bye client
* unset($soapclient);
*
* @author   Dietrich Ayala <dietrich@ganx4.com>
* @author   Scott Nichol <snichol@users.sourceforge.net>
* @access   public
*/
class nusoap_client extends \nusoap_base
{
    var $username = '';
    // Username for HTTP authentication
    var $password = '';
    // Password for HTTP authentication
    var $authtype = '';
    // Type of HTTP authentication
    var $certRequest = array();
    // Certificate for HTTP SSL authentication
    var $requestHeaders = \false;
    // SOAP headers in request (text)
    var $responseHeaders = '';
    // SOAP headers from response (incomplete namespace resolution) (text)
    var $responseHeader = \NULL;
    // SOAP Header from response (parsed)
    var $document = '';
    // SOAP body response portion (incomplete namespace resolution) (text)
    var $endpoint;
    var $forceEndpoint = '';
    // overrides WSDL endpoint
    var $proxyhost = '';
    var $proxyport = '';
    var $proxyusername = '';
    var $proxypassword = '';
    var $portName = '';
    // port name to use in WSDL
    var $xml_encoding = '';
    // character set encoding of incoming (response) messages
    var $http_encoding = \false;
    var $timeout = 0;
    // HTTP connection timeout
    var $response_timeout = 30;
    // HTTP response timeout
    var $endpointType = '';
    // soap|wsdl, empty for WSDL initialization error
    var $persistentConnection = \false;
    var $defaultRpcParams = \false;
    // This is no longer used
    var $request = '';
    // HTTP request
    var $response = '';
    // HTTP response
    var $responseData = '';
    // SOAP payload of response
    var $cookies = array();
    // Cookies from response or for request
    var $decode_utf8 = \true;
    // toggles whether the parser decodes element content w/ utf8_decode()
    var $operations = array();
    // WSDL operations, empty for WSDL initialization error
    var $curl_options = array();
    // User-specified cURL options
    var $bindingType = '';
    // WSDL operation binding type
    var $use_curl = \false;
    // whether to always try to use cURL
    /*
     * fault related variables
     */
    /**
     * @var      fault
     * @access   public
     */
    var $fault;
    /**
     * @var      faultcode
     * @access   public
     */
    var $faultcode;
    /**
     * @var      faultstring
     * @access   public
     */
    var $faultstring;
    /**
     * @var      faultdetail
     * @access   public
     */
    var $faultdetail;
    /**
     * constructor
     *
     * @param    mixed $endpoint SOAP server or WSDL URL (string), or wsdl instance (object)
     * @param    mixed $wsdl optional, set to 'wsdl' or true if using WSDL
     * @param    string $proxyhost optional
     * @param    string $proxyport optional
     * @param	string $proxyusername optional
     * @param	string $proxypassword optional
     * @param	integer $timeout set the connection timeout
     * @param	integer $response_timeout set the response timeout
     * @param	string $portName optional portName in WSDL document
     * @access   public
     */
    function __construct($endpoint, $wsdl = \false, $proxyhost = \false, $proxyport = \false, $proxyusername = \false, $proxypassword = \false, $timeout = 0, $response_timeout = 30, $portName = '')
    {
    }
    /**
     * calls method, returns PHP native type
     *
     * @param    string $operation SOAP server URL or path
     * @param    mixed $params An array, associative or simple, of the parameters
     *			              for the method call, or a string that is the XML
     *			              for the call.  For rpc style, this call will
     *			              wrap the XML in a tag named after the method, as
     *			              well as the SOAP Envelope and Body.  For document
     *			              style, this will only wrap with the Envelope and Body.
     *			              IMPORTANT: when using an array with document style,
     *			              in which case there
     *                         is really one parameter, the root of the fragment
     *                         used in the call, which encloses what programmers
     *                         normally think of parameters.  A parameter array
     *                         *must* include the wrapper.
     * @param	string $namespace optional method namespace (WSDL can override)
     * @param	string $soapAction optional SOAPAction value (WSDL can override)
     * @param	mixed $headers optional string of XML with SOAP header content, or array of soapval objects for SOAP headers, or associative array
     * @param	boolean $rpcParams optional (no longer used)
     * @param	string	$style optional (rpc|document) the style to use when serializing parameters (WSDL can override)
     * @param	string	$use optional (encoded|literal) the use when serializing parameters (WSDL can override)
     * @return	mixed	response from SOAP call, normally an associative array mirroring the structure of the XML response, false for certain fatal errors
     * @access   public
     */
    function call($operation, $params = array(), $namespace = 'http://tempuri.org', $soapAction = '', $headers = \false, $rpcParams = \null, $style = 'rpc', $use = 'encoded')
    {
    }
    /**
     * check WSDL passed as an instance or pulled from an endpoint
     *
     * @access   private
     */
    function checkWSDL()
    {
    }
    /**
     * instantiate wsdl object and parse wsdl file
     *
     * @access	public
     */
    function loadWSDL()
    {
    }
    /**
     * get available data pertaining to an operation
     *
     * @param    string $operation operation name
     * @return	array array of data pertaining to the operation
     * @access   public
     */
    function getOperationData($operation)
    {
    }
    /**
     * send the SOAP message
     *
     * Note: if the operation has multiple return values
     * the return value of this method will be an array
     * of those values.
     *
     * @param    string $msg a SOAPx4 soapmsg object
     * @param    string $soapaction SOAPAction value
     * @param    integer $timeout set connection timeout in seconds
     * @param	integer $response_timeout set response timeout in seconds
     * @return	mixed native PHP types.
     * @access   private
     */
    function send($msg, $soapaction = '', $timeout = 0, $response_timeout = 30)
    {
    }
    /**
     * processes SOAP message returned from server
     *
     * @param	array	$headers	The HTTP headers
     * @param	string	$data		unprocessed response data from server
     * @return	mixed	value of the message, decoded into a PHP type
     * @access   private
     */
    function parseResponse($headers, $data)
    {
    }
    /**
     * sets user-specified cURL options
     *
     * @param	mixed $option The cURL option (always integer?)
     * @param	mixed $value The cURL option value
     * @access   public
     */
    function setCurlOption($option, $value)
    {
    }
    /**
     * sets the SOAP endpoint, which can override WSDL
     *
     * @param	string $endpoint The endpoint URL to use, or empty string or false to prevent override
     * @access   public
     */
    function setEndpoint($endpoint)
    {
    }
    /**
     * set the SOAP headers
     *
     * @param	mixed $headers String of XML with SOAP header content, or array of soapval objects for SOAP headers
     * @access   public
     */
    function setHeaders($headers)
    {
    }
    /**
     * get the SOAP response headers (namespace resolution incomplete)
     *
     * @return	string
     * @access   public
     */
    function getHeaders()
    {
    }
    /**
     * get the SOAP response Header (parsed)
     *
     * @return	mixed
     * @access   public
     */
    function getHeader()
    {
    }
    /**
     * set proxy info here
     *
     * @param    string $proxyhost
     * @param    string $proxyport
     * @param	string $proxyusername
     * @param	string $proxypassword
     * @access   public
     */
    function setHTTPProxy($proxyhost, $proxyport, $proxyusername = '', $proxypassword = '')
    {
    }
    /**
     * if authenticating, set user credentials here
     *
     * @param    string $username
     * @param    string $password
     * @param	string $authtype (basic|digest|certificate|ntlm)
     * @param	array $certRequest (keys must be cainfofile (optional), sslcertfile, sslkeyfile, passphrase, verifypeer (optional), verifyhost (optional): see corresponding options in cURL docs)
     * @access   public
     */
    function setCredentials($username, $password, $authtype = 'basic', $certRequest = array())
    {
    }
    /**
     * use HTTP encoding
     *
     * @param    string $enc HTTP encoding
     * @access   public
     */
    function setHTTPEncoding($enc = 'gzip, deflate')
    {
    }
    /**
     * Set whether to try to use cURL connections if possible
     *
     * @param	boolean $use Whether to try to use cURL
     * @access   public
     */
    function setUseCURL($use)
    {
    }
    /**
     * use HTTP persistent connections if possible
     *
     * @access   public
     */
    function useHTTPPersistentConnection()
    {
    }
    /**
     * gets the default RPC parameter setting.
     * If true, default is that call params are like RPC even for document style.
     * Each call() can override this value.
     *
     * This is no longer used.
     *
     * @return boolean
     * @access public
     * @deprecated
     */
    function getDefaultRpcParams()
    {
    }
    /**
     * sets the default RPC parameter setting.
     * If true, default is that call params are like RPC even for document style
     * Each call() can override this value.
     *
     * This is no longer used.
     *
     * @param    boolean $rpcParams
     * @access public
     * @deprecated
     */
    function setDefaultRpcParams($rpcParams)
    {
    }
    /**
     * dynamically creates an instance of a proxy class,
     * allowing user to directly call methods from wsdl
     *
     * @return   object soap_proxy object
     * @access   public
     */
    function getProxy()
    {
    }
    /**
     * dynamically creates proxy class code
     *
     * @return   string PHP/NuSOAP code for the proxy class
     * @access   private
     */
    function _getProxyClassCode($r)
    {
    }
    /**
     * dynamically creates proxy class code
     *
     * @return   string PHP/NuSOAP code for the proxy class
     * @access   public
     */
    function getProxyClassCode()
    {
    }
    /**
     * gets the HTTP body for the current request.
     *
     * @param string $soapmsg The SOAP payload
     * @return string The HTTP body, which includes the SOAP payload
     * @access private
     */
    function getHTTPBody($soapmsg)
    {
    }
    /**
     * gets the HTTP content type for the current request.
     *
     * Note: getHTTPBody must be called before this.
     *
     * @return string the HTTP content type for the current request.
     * @access private
     */
    function getHTTPContentType()
    {
    }
    /**
     * gets the HTTP content type charset for the current request.
     * returns false for non-text content types.
     *
     * Note: getHTTPBody must be called before this.
     *
     * @return string the HTTP content type charset for the current request.
     * @access private
     */
    function getHTTPContentTypeCharset()
    {
    }
    /*
     * whether or not parser should decode utf8 element content
     *
     * @return   always returns true
     * @access   public
     */
    function decodeUTF8($bool)
    {
    }
    /**
     * adds a new Cookie into $this->cookies array
     *
     * @param	string $name Cookie Name
     * @param	string $value Cookie Value
     * @return	boolean if cookie-set was successful returns true, else false
     * @access	public
     */
    function setCookie($name, $value)
    {
    }
    /**
     * gets all Cookies
     *
     * @return   array with all internal cookies
     * @access   public
     */
    function getCookies()
    {
    }
    /**
     * checks all Cookies and delete those which are expired
     *
     * @return   boolean always return true
     * @access   private
     */
    function checkCookies()
    {
    }
    /**
     * updates the current cookies with a new set
     *
     * @param	array $cookies new cookies with which to update current ones
     * @return	boolean always return true
     * @access	private
     */
    function UpdateCookies($cookies)
    {
    }
}
/**
 *	For backwards compatiblity, define soapclient unless the PHP SOAP extension is loaded.
 */
class soapclient extends \nusoap_client
{
}
// XML Schema Datatype Helper Functions
//xsd:dateTime helpers
/**
* convert unix timestamp to ISO 8601 compliant date string
*
* @param    int $timestamp Unix time stamp
* @param	boolean $utc Whether the time stamp is UTC or local
* @return	mixed ISO 8601 date string or false
* @access   public
*/
function timestamp_to_iso8601($timestamp, $utc = \true)
{
}
/**
* convert ISO 8601 compliant date string to unix timestamp
*
* @param    string $datestr ISO 8601 compliant date string
* @return	mixed Unix timestamp (int) or false
* @access   public
*/
function iso8601_to_timestamp($datestr)
{
}
/**
* sleeps some number of microseconds
*
* @param    string $usec the number of microseconds to sleep
* @access   public
* @deprecated
*/
function usleepWindows($usec)
{
}