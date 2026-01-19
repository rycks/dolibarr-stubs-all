<?php

/**
 * PHPExcel_Reader_SYLK
 *
 * @category   PHPExcel
 * @package    PHPExcel_Reader
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Reader_SYLK extends \PHPExcel_Reader_Abstract implements \PHPExcel_Reader_IReader
{
    /**
     * Input encoding
     *
     * @var string
     */
    private $_inputEncoding = 'ANSI';
    /**
     * Sheet index to read
     *
     * @var int
     */
    private $_sheetIndex = 0;
    /**
     * Formats
     *
     * @var array
     */
    private $_formats = array();
    /**
     * Format Count
     *
     * @var int
     */
    private $_format = 0;
    /**
     * Create a new PHPExcel_Reader_SYLK
     */
    public function __construct()
    {
    }
    /**
     * Validate that the current file is a SYLK file
     *
     * @return boolean
     */
    protected function _isValidFormat()
    {
    }
    /**
     * Set input encoding
     *
     * @param string $pValue Input encoding
     */
    public function setInputEncoding($pValue = 'ANSI')
    {
    }
    /**
     * Get input encoding
     *
     * @return string
     */
    public function getInputEncoding()
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
    /**
     * Get sheet index
     *
     * @return int
     */
    public function getSheetIndex()
    {
    }
    /**
     * Set sheet index
     *
     * @param	int		$pValue		Sheet index
     * @return PHPExcel_Reader_SYLK
     */
    public function setSheetIndex($pValue = 0)
    {
    }
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');