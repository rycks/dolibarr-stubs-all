<?php

/**
 * PHPExcel_Reader_OOCalc
 *
 * @category	PHPExcel
 * @package		PHPExcel_Reader
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Reader_OOCalc extends \PHPExcel_Reader_Abstract implements \PHPExcel_Reader_IReader
{
    /**
     * Formats
     *
     * @var array
     */
    private $_styles = array();
    /**
     * Create a new PHPExcel_Reader_OOCalc
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
    private static function identifyFixedStyleValue($styleList, &$styleAttributeValue)
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
    private function _parseRichText($is = '')
    {
    }
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');