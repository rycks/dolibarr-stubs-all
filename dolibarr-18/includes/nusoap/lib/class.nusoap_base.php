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
    var $revision = '1.7';
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