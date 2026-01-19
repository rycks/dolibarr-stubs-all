<?php

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
    function nusoap_server($wsdl = \false)
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