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
 * @package    PHPExcel_Writer_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license	http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version	##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Writer_Excel5
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel5
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel5 extends \PHPExcel_Writer_Abstract implements \PHPExcel_Writer_IWriter
{
    /**
     * PHPExcel object
     *
     * @var PHPExcel
     */
    private $_phpExcel;
    /**
     * Total number of shared strings in workbook
     *
     * @var int
     */
    private $_str_total = 0;
    /**
     * Number of unique shared strings in workbook
     *
     * @var int
     */
    private $_str_unique = 0;
    /**
     * Array of unique shared strings in workbook
     *
     * @var array
     */
    private $_str_table = array();
    /**
     * Color cache. Mapping between RGB value and color index.
     *
     * @var array
     */
    private $_colors;
    /**
     * Formula parser
     *
     * @var PHPExcel_Writer_Excel5_Parser
     */
    private $_parser;
    /**
     * Identifier clusters for drawings. Used in MSODRAWINGGROUP record.
     *
     * @var array
     */
    private $_IDCLs;
    /**
     * Basic OLE object summary information
     *
     * @var array
     */
    private $_summaryInformation;
    /**
     * Extended OLE object document summary information
     *
     * @var array
     */
    private $_documentSummaryInformation;
    /**
     * Create a new PHPExcel_Writer_Excel5
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
     * Set temporary storage directory
     *
     * @deprecated
     * @param	string	$pValue		Temporary storage directory
     * @throws	PHPExcel_Writer_Exception	when directory does not exist
     * @return PHPExcel_Writer_Excel5
     */
    public function setTempDir($pValue = '')
    {
    }
    /**
     * Build the Worksheet Escher objects
     *
     */
    private function _buildWorksheetEschers()
    {
    }
    /**
     * Build the Escher object corresponding to the MSODRAWINGGROUP record
     */
    private function _buildWorkbookEscher()
    {
    }
    /**
     * Build the OLE Part for DocumentSummary Information
     * @return string
     */
    private function _writeDocumentSummaryInformation()
    {
    }
    /**
     * Build the OLE Part for Summary Information
     * @return string
     */
    private function _writeSummaryInformation()
    {
    }
}