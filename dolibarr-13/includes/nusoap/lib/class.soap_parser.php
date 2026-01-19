<?php

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