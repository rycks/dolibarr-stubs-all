<?php

/**
 * PHPExcel_Reader_CSV
 *
 * @category   PHPExcel
 * @package    PHPExcel_Reader
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Reader_CSV extends \PHPExcel_Reader_Abstract implements \PHPExcel_Reader_IReader
{
    /**
     * Input encoding
     *
     * @access	private
     * @var	string
     */
    private $_inputEncoding = 'UTF-8';
    /**
     * Delimiter
     *
     * @access	private
     * @var string
     */
    private $_delimiter = ',';
    /**
     * Enclosure
     *
     * @access	private
     * @var	string
     */
    private $_enclosure = '"';
    /**
     * Sheet index to read
     *
     * @access	private
     * @var	int
     */
    private $_sheetIndex = 0;
    /**
     * Load rows contiguously
     *
     * @access	private
     * @var	int
     */
    private $_contiguous = \false;
    /**
     * Row counter for loading rows contiguously
     *
     * @var	int
     */
    private $_contiguousRow = -1;
    /**
     * Create a new PHPExcel_Reader_CSV
     */
    public function __construct()
    {
    }
    /**
     * Validate that the current file is a CSV file
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
    public function setInputEncoding($pValue = 'UTF-8')
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
     * Move filepointer past any BOM marker
     *
     */
    protected function _skipBOM()
    {
    }
    /**
     * Return worksheet info (Name, Last Column Letter, Last Column Index, Total Rows, Total Columns)
     *
     * @param 	string 		$pFilename
     * @throws	PHPExcel_Reader_Exception
     */
    public function listWorksheetInfo($pFilename)
    {
    }
    /**
     * Loads PHPExcel from file
     *
     * @param 	string 		$pFilename
     * @return PHPExcel
     * @throws PHPExcel_Reader_Exception
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
     * Get delimiter
     *
     * @return string
     */
    public function getDelimiter()
    {
    }
    /**
     * Set delimiter
     *
     * @param	string	$pValue		Delimiter, defaults to ,
     * @return	PHPExcel_Reader_CSV
     */
    public function setDelimiter($pValue = ',')
    {
    }
    /**
     * Get enclosure
     *
     * @return string
     */
    public function getEnclosure()
    {
    }
    /**
     * Set enclosure
     *
     * @param	string	$pValue		Enclosure, defaults to "
     * @return PHPExcel_Reader_CSV
     */
    public function setEnclosure($pValue = '"')
    {
    }
    /**
     * Get sheet index
     *
     * @return integer
     */
    public function getSheetIndex()
    {
    }
    /**
     * Set sheet index
     *
     * @param	integer		$pValue		Sheet index
     * @return PHPExcel_Reader_CSV
     */
    public function setSheetIndex($pValue = 0)
    {
    }
    /**
     * Set Contiguous
     *
     * @param boolean $contiguous
     */
    public function setContiguous($contiguous = \FALSE)
    {
    }
    /**
     * Get Contiguous
     *
     * @return boolean
     */
    public function getContiguous()
    {
    }
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');