<?php

/**
* nusoap_client_mime client supporting MIME attachments defined at
* http://www.w3.org/TR/SOAP-attachments.  It depends on the PEAR Mail_MIME library.
*
* @author   Scott Nichol <snichol@users.sourceforge.net>
* @author	Thanks to Guillaume and Henning Reich for posting great attachment code to the mail list
* @access   public
*/
class nusoap_client_mime extends \nusoap_client
{
    /**
     * @var array Each array element in the return is an associative array with keys
     * data, filename, contenttype, cid
     * @access private
     */
    var $requestAttachments = array();
    /**
     * @var array Each array element in the return is an associative array with keys
     * data, filename, contenttype, cid
     * @access private
     */
    var $responseAttachments;
    /**
     * @var string
     * @access private
     */
    var $mimeContentType;
    /**
     * adds a MIME attachment to the current request.
     *
     * If the $data parameter contains an empty string, this method will read
     * the contents of the file named by the $filename parameter.
     *
     * If the $cid parameter is false, this method will generate the cid.
     *
     * @param string $data The data of the attachment
     * @param string $filename The filename of the attachment (default is empty string)
     * @param string $contenttype The MIME Content-Type of the attachment (default is application/octet-stream)
     * @param string $cid The content-id (cid) of the attachment (default is false)
     * @return string The content-id (cid) of the attachment
     * @access public
     */
    function addAttachment($data, $filename = '', $contenttype = 'application/octet-stream', $cid = \false)
    {
    }
    /**
     * clears the MIME attachments for the current request.
     *
     * @access public
     */
    function clearAttachments()
    {
    }
    /**
     * gets the MIME attachments from the current response.
     *
     * Each array element in the return is an associative array with keys
     * data, filename, contenttype, cid.  These keys correspond to the parameters
     * for addAttachment.
     *
     * @return array The attachments.
     * @access public
     */
    function getAttachments()
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
}
class soapclientmime extends \nusoap_client_mime
{
}
/**
* nusoap_server_mime server supporting MIME attachments defined at
* http://www.w3.org/TR/SOAP-attachments.  It depends on the PEAR Mail_MIME library.
*
* @author   Scott Nichol <snichol@users.sourceforge.net>
* @author	Thanks to Guillaume and Henning Reich for posting great attachment code to the mail list
* @access   public
*/
class nusoap_server_mime extends \nusoap_server
{
    /**
     * @var array Each array element in the return is an associative array with keys
     * data, filename, contenttype, cid
     * @access private
     */
    var $requestAttachments = array();
    /**
     * @var array Each array element in the return is an associative array with keys
     * data, filename, contenttype, cid
     * @access private
     */
    var $responseAttachments;
    /**
     * @var string
     * @access private
     */
    var $mimeContentType;
    /**
     * adds a MIME attachment to the current response.
     *
     * If the $data parameter contains an empty string, this method will read
     * the contents of the file named by the $filename parameter.
     *
     * If the $cid parameter is false, this method will generate the cid.
     *
     * @param string $data The data of the attachment
     * @param string $filename The filename of the attachment (default is empty string)
     * @param string $contenttype The MIME Content-Type of the attachment (default is application/octet-stream)
     * @param string $cid The content-id (cid) of the attachment (default is false)
     * @return string The content-id (cid) of the attachment
     * @access public
     */
    function addAttachment($data, $filename = '', $contenttype = 'application/octet-stream', $cid = \false)
    {
    }
    /**
     * clears the MIME attachments for the current response.
     *
     * @access public
     */
    function clearAttachments()
    {
    }
    /**
     * gets the MIME attachments from the current request.
     *
     * Each array element in the return is an associative array with keys
     * data, filename, contenttype, cid.  These keys correspond to the parameters
     * for addAttachment.
     *
     * @return array The attachments.
     * @access public
     */
    function getAttachments()
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
}
/*
 *	For backwards compatiblity
 */
class nusoapservermime extends \nusoap_server_mime
{
}