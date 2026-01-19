<?php

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