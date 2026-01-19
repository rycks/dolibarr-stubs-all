<?php

/**
 * PHPExcel_Reader_Excel2007
 *
 * @category	PHPExcel
 * @package	PHPExcel_Reader
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Reader_Excel2007 extends \PHPExcel_Reader_Abstract implements \PHPExcel_Reader_IReader
{
    /**
     * PHPExcel_ReferenceHelper instance
     *
     * @var PHPExcel_ReferenceHelper
     */
    private $_referenceHelper = \NULL;
    /**
     * PHPExcel_Reader_Excel2007_Theme instance
     *
     * @var PHPExcel_Reader_Excel2007_Theme
     */
    private static $_theme = \NULL;
    /**
     * Create a new PHPExcel_Reader_Excel2007 instance
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
    private static function _castToBool($c)
    {
    }
    //	function _castToBool()
    private static function _castToError($c)
    {
    }
    //	function _castToError()
    private static function _castToString($c)
    {
    }
    //	function _castToString()
    private function _castToFormula($c, $r, &$cellDataType, &$value, &$calculatedValue, &$sharedFormulas, $castBaseType)
    {
    }
    public function _getFromZipArchive($archive, $fileName = '')
    {
    }
    /**
     * Loads PHPExcel from file
     *
     * @param 	string 		$pFilename
     * @return  PHPExcel
     * @throws 	PHPExcel_Reader_Exception
     */
    public function load($pFilename)
    {
    }
    private static function _readColor($color, $background = \FALSE)
    {
    }
    private static function _readStyle($docStyle, $style)
    {
    }
    private static function _readBorder($docBorder, $eleBorder)
    {
    }
    private function _parseRichText($is = \null)
    {
    }
    private function _readRibbon($excel, $customUITarget, $zip)
    {
    }
    private static function array_item($array, $key = 0)
    {
    }
    private static function dir_add($base, $add)
    {
    }
    private static function toCSSArray($style)
    {
    }
    private static function boolean($value = \NULL)
    {
    }
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');