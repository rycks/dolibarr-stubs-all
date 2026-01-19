<?php

/**
 * PHPExcel_Reader_HTML
 *
 * @category   PHPExcel
 * @package    PHPExcel_Reader
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Reader_HTML extends \PHPExcel_Reader_Abstract implements \PHPExcel_Reader_IReader
{
    /**
     * Input encoding
     *
     * @var string
     */
    protected $_inputEncoding = 'ANSI';
    /**
     * Sheet index to read
     *
     * @var int
     */
    protected $_sheetIndex = 0;
    /**
     * Formats
     *
     * @var array
     */
    protected $_formats = array(
        'h1' => array('font' => array('bold' => \true, 'size' => 24)),
        //	Bold, 24pt
        'h2' => array('font' => array('bold' => \true, 'size' => 18)),
        //	Bold, 18pt
        'h3' => array('font' => array('bold' => \true, 'size' => 13.5)),
        //	Bold, 13.5pt
        'h4' => array('font' => array('bold' => \true, 'size' => 12)),
        //	Bold, 12pt
        'h5' => array('font' => array('bold' => \true, 'size' => 10)),
        //	Bold, 10pt
        'h6' => array('font' => array('bold' => \true, 'size' => 7.5)),
        //	Bold, 7.5pt
        'a' => array('font' => array('underline' => \true, 'color' => array('argb' => \PHPExcel_Style_Color::COLOR_BLUE))),
        //	Blue underlined
        'hr' => array('borders' => array('bottom' => array('style' => \PHPExcel_Style_Border::BORDER_THIN, 'color' => array(\PHPExcel_Style_Color::COLOR_BLACK)))),
    );
    protected $rowspan = array();
    /**
     * Create a new PHPExcel_Reader_HTML
     */
    public function __construct()
    {
    }
    /**
     * Validate that the current file is an HTML file
     *
     * @return boolean
     */
    protected function _isValidFormat()
    {
    }
    /**
     * Loads PHPExcel from file
     *
     * @param  string                    $pFilename
     * @return PHPExcel
     * @throws PHPExcel_Reader_Exception
     */
    public function load($pFilename)
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
    //	Data Array used for testing only, should write to PHPExcel object on completion of tests
    protected $_dataArray = array();
    protected $_tableLevel = 0;
    protected $_nestedColumn = array('A');
    protected function _setTableStartColumn($column)
    {
    }
    protected function _getTableStartColumn()
    {
    }
    protected function _releaseTableStartColumn()
    {
    }
    protected function _flushCell($sheet, $column, $row, &$cellContent)
    {
    }
    protected function _processDomElement(\DOMNode $element, $sheet, &$row, &$column, &$cellContent, $format = \null)
    {
    }
    /**
     * Loads PHPExcel from file into PHPExcel instance
     *
     * @param  string                    $pFilename
     * @param  PHPExcel                  $objPHPExcel
     * @return PHPExcel
     * @throws PHPExcel_Reader_Exception
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
     * @param  int                  $pValue Sheet index
     * @return PHPExcel_Reader_HTML
     */
    public function setSheetIndex($pValue = 0)
    {
    }
    /**
     * Scan theXML for use of <!ENTITY to prevent XXE/XEE attacks
     *
     * @param 	string 		$xml
     * @throws PHPExcel_Reader_Exception
     */
    public function securityScan($xml)
    {
    }
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');