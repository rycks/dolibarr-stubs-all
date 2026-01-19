<?php

/**
 * @class TCPDF_PARSER
 * This is a PHP class for parsing PDF documents.<br>
 * @package com.tecnick.tcpdf
 * @brief This is a PHP class for parsing PDF documents..
 * @version 1.0.15
 * @author Nicola Asuni - info@tecnick.com
 */
class TCPDF_PARSER
{
    /**
     * Raw content of the PDF document.
     * @private
     */
    private $pdfdata = '';
    /**
     * XREF data.
     * @protected
     */
    protected $xref = array();
    /**
     * Array of PDF objects.
     * @protected
     */
    protected $objects = array();
    /**
     * Class object for decoding filters.
     * @private
     */
    private $FilterDecoders;
    /**
     * Array of configuration parameters.
     * @private
     */
    private $cfg = array('die_for_errors' => \false, 'ignore_filter_decoding_errors' => \true, 'ignore_missing_filter_decoders' => \true);
    // -----------------------------------------------------------------------------
    /**
     * Parse a PDF document an return an array of objects.
     * @param $data (string) PDF data to parse.
     * @param $cfg (array) Array of configuration parameters:
     * 			'die_for_errors' : if true termitate the program execution in case of error, otherwise thows an exception;
     * 			'ignore_filter_decoding_errors' : if true ignore filter decoding errors;
     * 			'ignore_missing_filter_decoders' : if true ignore missing filter decoding errors.
     * @public
     * @since 1.0.000 (2011-05-24)
     */
    public function __construct($data, $cfg = array())
    {
    }
    /**
     * Set the configuration parameters.
     * @param $cfg (array) Array of configuration parameters:
     * 			'die_for_errors' : if true termitate the program execution in case of error, otherwise thows an exception;
     * 			'ignore_filter_decoding_errors' : if true ignore filter decoding errors;
     * 			'ignore_missing_filter_decoders' : if true ignore missing filter decoding errors.
     * @public
     */
    protected function setConfig($cfg)
    {
    }
    /**
     * Return an array of parsed PDF document objects.
     * @return (array) Array of parsed PDF document objects.
     * @public
     * @since 1.0.000 (2011-06-26)
     */
    public function getParsedData()
    {
    }
    /**
     * Get Cross-Reference (xref) table and trailer data from PDF document data.
     * @param $offset (int) xref offset (if know).
     * @param $xref (array) previous xref array (if any).
     * @return Array containing xref and trailer data.
     * @protected
     * @since 1.0.000 (2011-05-24)
     */
    protected function getXrefData($offset = 0, $xref = array())
    {
    }
    /**
     * Decode the Cross-Reference section
     * @param $startxref (int) Offset at which the xref section starts (position of the 'xref' keyword).
     * @param $xref (array) Previous xref array (if any).
     * @return Array containing xref and trailer data.
     * @protected
     * @since 1.0.000 (2011-06-20)
     */
    protected function decodeXref($startxref, $xref = array())
    {
    }
    /**
     * Decode the Cross-Reference Stream section
     * @param $startxref (int) Offset at which the xref section starts.
     * @param $xref (array) Previous xref array (if any).
     * @return Array containing xref and trailer data.
     * @protected
     * @since 1.0.003 (2013-03-16)
     */
    protected function decodeXrefStream($startxref, $xref = array())
    {
    }
    /**
     * Get object type, raw value and offset to next object
     * @param $offset (int) Object offset.
     * @return array containing object type, raw value and offset to next object
     * @protected
     * @since 1.0.000 (2011-06-20)
     */
    protected function getRawObject($offset = 0)
    {
    }
    /**
     * Get content of indirect object.
     * @param $obj_ref (string) Object number and generation number separated by underscore character.
     * @param $offset (int) Object offset.
     * @param $decoding (boolean) If true decode streams.
     * @return array containing object data.
     * @protected
     * @since 1.0.000 (2011-05-24)
     */
    protected function getIndirectObject($obj_ref, $offset = 0, $decoding = \true)
    {
    }
    /**
     * Get the content of object, resolving indect object reference if necessary.
     * @param $obj (string) Object value.
     * @return array containing object data.
     * @protected
     * @since 1.0.000 (2011-06-26)
     */
    protected function getObjectVal($obj)
    {
    }
    /**
     * Decode the specified stream.
     * @param $sdic (array) Stream's dictionary array.
     * @param $stream (string) Stream to decode.
     * @return array containing decoded stream data and remaining filters.
     * @protected
     * @since 1.0.000 (2011-06-22)
     */
    protected function decodeStream($sdic, $stream)
    {
    }
    /**
     * Throw an exception or print an error message and die if the K_TCPDF_PARSER_THROW_EXCEPTION_ERROR constant is set to true.
     * @param $msg (string) The error message
     * @public
     * @since 1.0.000 (2011-05-23)
     */
    public function Error($msg)
    {
    }
}