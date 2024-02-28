<?php

/**
 * PHPExcel_IOFactory
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_IOFactory
{
    /**
     * Search locations
     *
     * @var	array
     * @access	private
     * @static
     */
    private static $_searchLocations = array(array('type' => 'IWriter', 'path' => 'PHPExcel/Writer/{0}.php', 'class' => 'PHPExcel_Writer_{0}'), array('type' => 'IReader', 'path' => 'PHPExcel/Reader/{0}.php', 'class' => 'PHPExcel_Reader_{0}'));
    /**
     * Autoresolve classes
     *
     * @var	array
     * @access	private
     * @static
     */
    private static $_autoResolveClasses = array('Excel2007', 'Excel5', 'Excel2003XML', 'OOCalc', 'SYLK', 'Gnumeric', 'HTML', 'CSV');
    /**
     *	Private constructor for PHPExcel_IOFactory
     */
    private function __construct()
    {
    }
    /**
     * Get search locations
     *
     * @static
     * @access	public
     * @return	array
     */
    public static function getSearchLocations()
    {
    }
    //	function getSearchLocations()
    /**
     * Set search locations
     *
     * @static
     * @access	public
     * @param	array $value
     * @throws	PHPExcel_Reader_Exception
     */
    public static function setSearchLocations($value)
    {
    }
    //	function setSearchLocations()
    /**
     * Add search location
     *
     * @static
     * @access	public
     * @param	string $type		Example: IWriter
     * @param	string $location	Example: PHPExcel/Writer/{0}.php
     * @param	string $classname 	Example: PHPExcel_Writer_{0}
     */
    public static function addSearchLocation($type = '', $location = '', $classname = '')
    {
    }
    //	function addSearchLocation()
    /**
     * Create PHPExcel_Writer_IWriter
     *
     * @static
     * @access	public
     * @param	PHPExcel $phpExcel
     * @param	string  $writerType	Example: Excel2007
     * @return	PHPExcel_Writer_IWriter
     * @throws	PHPExcel_Reader_Exception
     */
    public static function createWriter(\PHPExcel $phpExcel, $writerType = '')
    {
    }
    //	function createWriter()
    /**
     * Create PHPExcel_Reader_IReader
     *
     * @static
     * @access	public
     * @param	string $readerType	Example: Excel2007
     * @return	PHPExcel_Reader_IReader
     * @throws	PHPExcel_Reader_Exception
     */
    public static function createReader($readerType = '')
    {
    }
    //	function createReader()
    /**
     * Loads PHPExcel from file using automatic PHPExcel_Reader_IReader resolution
     *
     * @static
     * @access public
     * @param 	string 		$pFilename		The name of the spreadsheet file
     * @return	PHPExcel
     * @throws	PHPExcel_Reader_Exception
     */
    public static function load($pFilename)
    {
    }
    //	function load()
    /**
     * Identify file type using automatic PHPExcel_Reader_IReader resolution
     *
     * @static
     * @access public
     * @param 	string 		$pFilename		The name of the spreadsheet file to identify
     * @return	string
     * @throws	PHPExcel_Reader_Exception
     */
    public static function identify($pFilename)
    {
    }
    //	function identify()
    /**
     * Create PHPExcel_Reader_IReader for file using automatic PHPExcel_Reader_IReader resolution
     *
     * @static
     * @access	public
     * @param 	string 		$pFilename		The name of the spreadsheet file
     * @return	PHPExcel_Reader_IReader
     * @throws	PHPExcel_Reader_Exception
     */
    public static function createReaderForFile($pFilename)
    {
    }
    //	function createReaderForFile()
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../');