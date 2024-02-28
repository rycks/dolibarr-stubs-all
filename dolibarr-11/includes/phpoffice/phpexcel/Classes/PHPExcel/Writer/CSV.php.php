<?php

/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package	PHPExcel_Writer_CSV
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license	http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version	##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Writer_CSV
 *
 * @category   PHPExcel
 * @package	PHPExcel_Writer_CSV
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_CSV extends \PHPExcel_Writer_Abstract implements \PHPExcel_Writer_IWriter
{
    /**
     * PHPExcel object
     *
     * @var PHPExcel
     */
    private $_phpExcel;
    /**
     * Delimiter
     *
     * @var string
     */
    private $_delimiter = ',';
    /**
     * Enclosure
     *
     * @var string
     */
    private $_enclosure = '"';
    /**
     * Line ending
     *
     * @var string
     */
    private $_lineEnding = \PHP_EOL;
    /**
     * Sheet index to write
     *
     * @var int
     */
    private $_sheetIndex = 0;
    /**
     * Whether to write a BOM (for UTF8).
     *
     * @var boolean
     */
    private $_useBOM = \false;
    /**
     * Whether to write a fully Excel compatible CSV file.
     *
     * @var boolean
     */
    private $_excelCompatibility = \false;
    /**
     * Create a new PHPExcel_Writer_CSV
     *
     * @param	PHPExcel	$phpExcel	PHPExcel object
     */
    public function __construct(\PHPExcel $phpExcel)
    {
    }
    /**
     * Save PHPExcel to file
     *
     * @param	string		$pFilename
     * @throws	PHPExcel_Writer_Exception
     */
    public function save($pFilename = \null)
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
     * @return PHPExcel_Writer_CSV
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
     * @return PHPExcel_Writer_CSV
     */
    public function setEnclosure($pValue = '"')
    {
    }
    /**
     * Get line ending
     *
     * @return string
     */
    public function getLineEnding()
    {
    }
    /**
     * Set line ending
     *
     * @param	string	$pValue		Line ending, defaults to OS line ending (PHP_EOL)
     * @return PHPExcel_Writer_CSV
     */
    public function setLineEnding($pValue = \PHP_EOL)
    {
    }
    /**
     * Get whether BOM should be used
     *
     * @return boolean
     */
    public function getUseBOM()
    {
    }
    /**
     * Set whether BOM should be used
     *
     * @param	boolean	$pValue		Use UTF-8 byte-order mark? Defaults to false
     * @return PHPExcel_Writer_CSV
     */
    public function setUseBOM($pValue = \false)
    {
    }
    /**
     * Get whether the file should be saved with full Excel Compatibility
     *
     * @return boolean
     */
    public function getExcelCompatibility()
    {
    }
    /**
     * Set whether the file should be saved with full Excel Compatibility
     *
     * @param	boolean	$pValue		Set the file to be written as a fully Excel compatible csv file
     *								Note that this overrides other settings such as useBOM, enclosure and delimiter
     * @return PHPExcel_Writer_CSV
     */
    public function setExcelCompatibility($pValue = \false)
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
     * @return PHPExcel_Writer_CSV
     */
    public function setSheetIndex($pValue = 0)
    {
    }
    /**
     * Write line to CSV file
     *
     * @param	mixed	$pFileHandle	PHP filehandle
     * @param	array	$pValues		Array containing values in a row
     * @throws	PHPExcel_Writer_Exception
     */
    private function _writeLine($pFileHandle = \null, $pValues = \null)
    {
    }
}