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
 * @package    PHPExcel_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Writer_Excel2007
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_2007
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel2007 extends \PHPExcel_Writer_Abstract implements \PHPExcel_Writer_IWriter
{
    /**
     * Pre-calculate formulas
     * Forces PHPExcel to recalculate all formulae in a workbook when saving, so that the pre-calculated values are
     *    immediately available to MS Excel or other office spreadsheet viewer when opening the file
     *
     * Overrides the default TRUE for this specific writer for performance reasons
     *
     * @var boolean
     */
    protected $_preCalculateFormulas = \FALSE;
    /**
     * Office2003 compatibility
     *
     * @var boolean
     */
    private $_office2003compatibility = \false;
    /**
     * Private writer parts
     *
     * @var PHPExcel_Writer_Excel2007_WriterPart[]
     */
    private $_writerParts = array();
    /**
     * Private PHPExcel
     *
     * @var PHPExcel
     */
    private $_spreadSheet;
    /**
     * Private string table
     *
     * @var string[]
     */
    private $_stringTable = array();
    /**
     * Private unique PHPExcel_Style_Conditional HashTable
     *
     * @var PHPExcel_HashTable
     */
    private $_stylesConditionalHashTable;
    /**
     * Private unique PHPExcel_Style HashTable
     *
     * @var PHPExcel_HashTable
     */
    private $_styleHashTable;
    /**
     * Private unique PHPExcel_Style_Fill HashTable
     *
     * @var PHPExcel_HashTable
     */
    private $_fillHashTable;
    /**
     * Private unique PHPExcel_Style_Font HashTable
     *
     * @var PHPExcel_HashTable
     */
    private $_fontHashTable;
    /**
     * Private unique PHPExcel_Style_Borders HashTable
     *
     * @var PHPExcel_HashTable
     */
    private $_bordersHashTable;
    /**
     * Private unique PHPExcel_Style_NumberFormat HashTable
     *
     * @var PHPExcel_HashTable
     */
    private $_numFmtHashTable;
    /**
     * Private unique PHPExcel_Worksheet_BaseDrawing HashTable
     *
     * @var PHPExcel_HashTable
     */
    private $_drawingHashTable;
    /**
     * Create a new PHPExcel_Writer_Excel2007
     *
     * @param 	PHPExcel	$pPHPExcel
     */
    public function __construct(\PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Get writer part
     *
     * @param 	string 	$pPartName		Writer part name
     * @return 	PHPExcel_Writer_Excel2007_WriterPart
     */
    public function getWriterPart($pPartName = '')
    {
    }
    /**
     * Save PHPExcel to file
     *
     * @param 	string 		$pFilename
     * @throws 	PHPExcel_Writer_Exception
     */
    public function save($pFilename = \null)
    {
    }
    /**
     * Get PHPExcel object
     *
     * @return PHPExcel
     * @throws PHPExcel_Writer_Exception
     */
    public function getPHPExcel()
    {
    }
    /**
     * Set PHPExcel object
     *
     * @param 	PHPExcel 	$pPHPExcel	PHPExcel object
     * @throws	PHPExcel_Writer_Exception
     * @return PHPExcel_Writer_Excel2007
     */
    public function setPHPExcel(\PHPExcel $pPHPExcel = \null)
    {
    }
    /**
     * Get string table
     *
     * @return string[]
     */
    public function getStringTable()
    {
    }
    /**
     * Get PHPExcel_Style HashTable
     *
     * @return PHPExcel_HashTable
     */
    public function getStyleHashTable()
    {
    }
    /**
     * Get PHPExcel_Style_Conditional HashTable
     *
     * @return PHPExcel_HashTable
     */
    public function getStylesConditionalHashTable()
    {
    }
    /**
     * Get PHPExcel_Style_Fill HashTable
     *
     * @return PHPExcel_HashTable
     */
    public function getFillHashTable()
    {
    }
    /**
     * Get PHPExcel_Style_Font HashTable
     *
     * @return PHPExcel_HashTable
     */
    public function getFontHashTable()
    {
    }
    /**
     * Get PHPExcel_Style_Borders HashTable
     *
     * @return PHPExcel_HashTable
     */
    public function getBordersHashTable()
    {
    }
    /**
     * Get PHPExcel_Style_NumberFormat HashTable
     *
     * @return PHPExcel_HashTable
     */
    public function getNumFmtHashTable()
    {
    }
    /**
     * Get PHPExcel_Worksheet_BaseDrawing HashTable
     *
     * @return PHPExcel_HashTable
     */
    public function getDrawingHashTable()
    {
    }
    /**
     * Get Office2003 compatibility
     *
     * @return boolean
     */
    public function getOffice2003Compatibility()
    {
    }
    /**
     * Set Office2003 compatibility
     *
     * @param boolean $pValue	Office2003 compatibility?
     * @return PHPExcel_Writer_Excel2007
     */
    public function setOffice2003Compatibility($pValue = \false)
    {
    }
}