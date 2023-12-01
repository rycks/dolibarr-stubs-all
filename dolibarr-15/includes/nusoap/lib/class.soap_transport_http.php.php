<?php

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