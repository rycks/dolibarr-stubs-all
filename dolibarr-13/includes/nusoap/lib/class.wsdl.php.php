<?php

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