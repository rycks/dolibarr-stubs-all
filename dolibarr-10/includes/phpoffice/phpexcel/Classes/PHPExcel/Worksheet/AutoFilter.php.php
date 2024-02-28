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
 * @package    PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Worksheet_AutoFilter
 *
 * @category   PHPExcel
 * @package    PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Worksheet_AutoFilter
{
    /**
     * Autofilter Worksheet
     *
     * @var PHPExcel_Worksheet
     */
    private $_workSheet = \NULL;
    /**
     * Autofilter Range
     *
     * @var string
     */
    private $_range = '';
    /**
     * Autofilter Column Ruleset
     *
     * @var array of PHPExcel_Worksheet_AutoFilter_Column
     */
    private $_columns = array();
    /**
     * Create a new PHPExcel_Worksheet_AutoFilter
     *
     *	@param	string		$pRange		Cell range (i.e. A1:E10)
     * @param PHPExcel_Worksheet $pSheet
     */
    public function __construct($pRange = '', \PHPExcel_Worksheet $pSheet = \NULL)
    {
    }
    /**
     * Get AutoFilter Parent Worksheet
     *
     * @return PHPExcel_Worksheet
     */
    public function getParent()
    {
    }
    /**
     * Set AutoFilter Parent Worksheet
     *
     * @param PHPExcel_Worksheet $pSheet
     * @return PHPExcel_Worksheet_AutoFilter
     */
    public function setParent(\PHPExcel_Worksheet $pSheet = \NULL)
    {
    }
    /**
     * Get AutoFilter Range
     *
     * @return string
     */
    public function getRange()
    {
    }
    /**
     *	Set AutoFilter Range
     *
     *	@param	string		$pRange		Cell range (i.e. A1:E10)
     *	@throws	PHPExcel_Exception
     *	@return PHPExcel_Worksheet_AutoFilter
     */
    public function setRange($pRange = '')
    {
    }
    /**
     * Get all AutoFilter Columns
     *
     * @throws	PHPExcel_Exception
     * @return array of PHPExcel_Worksheet_AutoFilter_Column
     */
    public function getColumns()
    {
    }
    /**
     * Validate that the specified column is in the AutoFilter range
     *
     * @param	string	$column			Column name (e.g. A)
     * @throws	PHPExcel_Exception
     * @return	integer	The column offset within the autofilter range
     */
    public function testColumnInRange($column)
    {
    }
    /**
     * Get a specified AutoFilter Column Offset within the defined AutoFilter range
     *
     * @param	string	$pColumn		Column name (e.g. A)
     * @throws	PHPExcel_Exception
     * @return integer	The offset of the specified column within the autofilter range
     */
    public function getColumnOffset($pColumn)
    {
    }
    /**
     * Get a specified AutoFilter Column
     *
     * @param	string	$pColumn		Column name (e.g. A)
     * @throws	PHPExcel_Exception
     * @return PHPExcel_Worksheet_AutoFilter_Column
     */
    public function getColumn($pColumn)
    {
    }
    /**
     * Get a specified AutoFilter Column by it's offset
     *
     * @param	integer	$pColumnOffset		Column offset within range (starting from 0)
     * @throws	PHPExcel_Exception
     * @return PHPExcel_Worksheet_AutoFilter_Column
     */
    public function getColumnByOffset($pColumnOffset = 0)
    {
    }
    /**
     *	Set AutoFilter
     *
     *	@param	PHPExcel_Worksheet_AutoFilter_Column|string		$pColumn
     *			A simple string containing a Column ID like 'A' is permitted
     *	@throws	PHPExcel_Exception
     *	@return PHPExcel_Worksheet_AutoFilter
     */
    public function setColumn($pColumn)
    {
    }
    /**
     * Clear a specified AutoFilter Column
     *
     * @param	string  $pColumn    Column name (e.g. A)
     * @throws	PHPExcel_Exception
     * @return PHPExcel_Worksheet_AutoFilter
     */
    public function clearColumn($pColumn)
    {
    }
    /**
     *	Shift an AutoFilter Column Rule to a different column
     *
     *	Note: This method bypasses validation of the destination column to ensure it is within this AutoFilter range.
     *		Nor does it verify whether any column rule already exists at $toColumn, but will simply overrideany existing value.
     *		Use with caution.
     *
     *	@param	string	$fromColumn		Column name (e.g. A)
     *	@param	string	$toColumn		Column name (e.g. B)
     *	@return PHPExcel_Worksheet_AutoFilter
     */
    public function shiftColumn($fromColumn = \NULL, $toColumn = \NULL)
    {
    }
    /**
     *	Test if cell value is in the defined set of values
     *
     *	@param	mixed		$cellValue
     *	@param	mixed[]		$dataSet
     *	@return boolean
     */
    private static function _filterTestInSimpleDataSet($cellValue, $dataSet)
    {
    }
    /**
     *	Test if cell value is in the defined set of Excel date values
     *
     *	@param	mixed		$cellValue
     *	@param	mixed[]		$dataSet
     *	@return boolean
     */
    private static function _filterTestInDateGroupSet($cellValue, $dataSet)
    {
    }
    /**
     *	Test if cell value is within a set of values defined by a ruleset
     *
     *	@param	mixed		$cellValue
     *	@param	mixed[]		$ruleSet
     *	@return boolean
     */
    private static function _filterTestInCustomDataSet($cellValue, $ruleSet)
    {
    }
    /**
     *	Test if cell date value is matches a set of values defined by a set of months
     *
     *	@param	mixed		$cellValue
     *	@param	mixed[]		$monthSet
     *	@return boolean
     */
    private static function _filterTestInPeriodDateSet($cellValue, $monthSet)
    {
    }
    /**
     *	Search/Replace arrays to convert Excel wildcard syntax to a regexp syntax for preg_matching
     *
     *	@var	array
     */
    private static $_fromReplace = array('\\*', '\\?', '~~', '~.*', '~.?');
    private static $_toReplace = array('.*', '.', '~', '\\*', '\\?');
    /**
     *	Convert a dynamic rule daterange to a custom filter range expression for ease of calculation
     *
     *	@param	string										$dynamicRuleType
     *	@param	PHPExcel_Worksheet_AutoFilter_Column		&$filterColumn
     *	@return mixed[]
     */
    private function _dynamicFilterDateRange($dynamicRuleType, &$filterColumn)
    {
    }
    private function _calculateTopTenValue($columnID, $startRow, $endRow, $ruleType, $ruleValue)
    {
    }
    /**
     *	Apply the AutoFilter rules to the AutoFilter Range
     *
     *	@throws	PHPExcel_Exception
     *	@return PHPExcel_Worksheet_AutoFilter
     */
    public function showHideRows()
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
    /**
     * toString method replicates previous behavior by returning the range if object is
     *    referenced as a property of its parent.
     */
    public function __toString()
    {
    }
}