<?php

/**
 * PHPExcel_Reader_Excel2003XML
 *
 * @category   PHPExcel
 * @package    PHPExcel_Reader
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Reader_Excel2003XML extends \PHPExcel_Reader_Abstract implements \PHPExcel_Reader_IReader
{
    /**
     * Formats
     *
     * @var array
     */
    protected $_styles = array();
    /**
     * Character set used in the file
     *
     * @var string
     */
    protected $_charSet = 'UTF-8';
    /**
     * Create a new PHPExcel_Reader_Excel2003XML
     */
    public function __construct()
    {
    }
    /**
     * Can the current PHPExcel_Reader_IReader read the file?
     *
     * @param 	string 		$pFilename
     * @return 	boolean
     * @throws PHPExcel_Reader_Exception
     */
    public function canRead($pFilename)
    {
    }
    /**
     * Reads names of the worksheets from a file, without parsing the whole file to a PHPExcel object
     *
     * @param 	string 		$pFilename
     * @throws 	PHPExcel_Reader_Exception
     */
    public function listWorksheetNames($pFilename)
    {
    }
    /**
     * Return worksheet info (Name, Last Column Letter, Last Column Index, Total Rows, Total Columns)
     *
     * @param   string     $pFilename
     * @throws   PHPExcel_Reader_Exception
     */
    public function listWorksheetInfo($pFilename)
    {
    }
    /**
     * Loads PHPExcel from file
     *
     * @param 	string 		$pFilename
     * @return 	PHPExcel
     * @throws 	PHPExcel_Reader_Exception
     */
    public function load($pFilename)
    {
    }
    protected static function identifyFixedStyleValue($styleList, &$styleAttributeValue)
    {
    }
    /**
     * pixel units to excel width units(units of 1/256th of a character width)
     * @param pxs
     * @return
     */
    protected static function _pixel2WidthUnits($pxs)
    {
    }
    /**
     * excel width units(units of 1/256th of a character width) to pixel units
     * @param widthUnits
     * @return
     */
    protected static function _widthUnits2Pixel($widthUnits)
    {
    }
    protected static function _hex2str($hex)
    {
    }
    /**
     * Loads PHPExcel from file into PHPExcel instance
     *
     * @param 	string 		$pFilename
     * @param	PHPExcel	$objPHPExcel
     * @return 	PHPExcel
     * @throws 	PHPExcel_Reader_Exception
     */
    public function loadIntoExisting($pFilename, \PHPExcel $objPHPExcel)
    {
    }
    protected static function _convertStringEncoding($string, $charset)
    {
    }
    protected function _parseRichText($is = '')
    {
    }
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');