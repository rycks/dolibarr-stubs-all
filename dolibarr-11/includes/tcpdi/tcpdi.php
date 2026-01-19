<?php

//
//  TCPDI - Version 1.0
//  Based on FPDI - Version 1.4.4
//
//    Copyright 2004-2013 Setasign - Jan Slabon
//
//  Licensed under the Apache License, Version 2.0 (the "License");
//  you may not use this file except in compliance with the License.
//  You may obtain a copy of the License at
//
//      http://www.apache.org/licenses/LICENSE-2.0
//
//  Unless required by applicable law or agreed to in writing, software
//  distributed under the License is distributed on an "AS IS" BASIS,
//  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
//  See the License for the specific language governing permissions and
//  limitations under the License.
//
// Dummy shim to allow unmodified use of fpdf_tpl
class FPDF extends \TCPDF
{
}
class TCPDI extends \FPDF_TPL
{
    /**
     * Actual filename
     * @var string
     */
    var $current_filename;
    /**
     * Parser-Objects
     * @var array
     */
    var $parsers;
    /**
     * Current parser
     * @var object
     */
    var $current_parser;
    /**
     * object stack
     * @var array
     */
    var $_obj_stack;
    /**
     * done object stack
     * @var array
     */
    var $_don_obj_stack;
    /**
     * Current Object Id.
     * @var integer
     */
    var $_current_obj_id;
    /**
     * The name of the last imported page box
     * @var string
     */
    var $lastUsedPageBox;
    /**
     * Cache for imported pages/template ids
     * @var array
     */
    var $_importedPages = array();
    /**
     * Set a source-file
     *
     * @param string $filename a valid filename
     * @return int number of available pages
     */
    function setSourceFile($filename)
    {
    }
    /**
     * Set a source-file PDF data
     *
     * @param string $pdfdata The PDF file content
     * @return int number of available pages
     */
    function setSourceData($pdfdata)
    {
    }
    /**
     * Returns a PDF parser object
     *
     * @param string $filename
     * @return fpdi_pdf_parser
     */
    function _getPdfParser($filename)
    {
    }
    /**
     * Get the current PDF version
     *
     * @return string
     */
    function getPDFVersion()
    {
    }
    /**
     * Set the PDF version
     *
     * @return string
     */
    function setPDFVersion($version = '1.7')
    {
    }
    /**
     * Import a page
     *
     * @param int $pageno pagenumber
     * @return int Index of imported page - to use with fpdf_tpl::useTemplate()
     */
    function importPage($pageno, $boxName = '/CropBox')
    {
    }
    /**
     * Returns the last used page box
     *
     * @return string
     */
    function getLastUsedPageBox()
    {
    }
    function useTemplate($tplidx, $_x = \null, $_y = \null, $_w = 0, $_h = 0, $adjustPageSize = \false)
    {
    }
    /**
     * Private method, that rebuilds all needed objects of source files
     */
    function _putimportedobjects()
    {
    }
    /**
     * Private Method that writes the form xobjects
     */
    function _putformxobjects()
    {
    }
    /**
     * Rewritten to handle existing own defined objects
     */
    function _newobj($obj_id = \false, $onlynewobj = \false)
    {
    }
    /**
     * Writes a value
     * Needed to rebuild the source document
     *
     * @param mixed $value A PDF-Value. Structure of values see cases in this method
     */
    function pdf_write_value(&$value)
    {
    }
    /**
     * Modified so not each call will add a newline to the output.
     */
    function _straightOut($s)
    {
    }
    /**
     * rewritten to close opened parsers
     *
     */
    function _enddoc()
    {
    }
    /**
     * close all files opened by parsers
     */
    function _closeParsers()
    {
    }
    /**
     * Removes cylced references and closes the file handles of the parser objects
     */
    function cleanUp()
    {
    }
    // Functions from here on are taken from FPDI's fpdi2tcpdf_bridge.php to remove dependence on it
    function _putstream($s, $n = 0)
    {
    }
    function _getxobjectdict()
    {
    }
    /**
     * Unescapes a PDF string
     *
     * @param string $s
     * @return string
     */
    function _unescape($s)
    {
    }
    /**
     * Hexadecimal to string
     *
     * @param string $hex
     * @return string
     */
    function hex2str($hex)
    {
    }
    /**
     * String to hexadecimal
     *
     * @param string $str
     * @return string
     */
    function str2hex($str)
    {
    }
}