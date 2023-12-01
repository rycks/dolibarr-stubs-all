<?php

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