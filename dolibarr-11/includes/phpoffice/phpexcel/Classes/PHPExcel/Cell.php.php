<?php

/**
 *	PHPExcel
 *
 *	Copyright (c) 2006 - 2014 PHPExcel
 *
 *	This library is free software; you can redistribute it and/or
 *	modify it under the terms of the GNU Lesser General Public
 *	License as published by the Free Software Foundation; either
 *	version 2.1 of the License, or (at your option) any later version.
 *
 *	This library is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 *	Lesser General Public License for more details.
 *
 *	You should have received a copy of the GNU Lesser General Public
 *	License along with this library; if not, write to the Free Software
 *	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 *	@category	PHPExcel
 *	@package	PHPExcel_Cell
 *	@copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 *	@license	http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 *	@version	##VERSION##, ##DATE##
 */
/**
 *	PHPExcel_Cell
 *
 *	@category   PHPExcel
 *	@package	PHPExcel_Cell
 *	@copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Cell
{
    /**
     *  Default range variable constant
     *
     *  @var  string
     */
    const DEFAULT_RANGE = 'A1:A1';
    /**
     *	Value binder to use
     *
     *	@var	PHPExcel_Cell_IValueBinder
     */
    private static $_valueBinder = \NULL;
    /**
     *	Value of the cell
     *
     *	@var	mixed
     */
    private $_value;
    /**
     *	Calculated value of the cell (used for caching)
     *	This returns the value last calculated by MS Excel or whichever spreadsheet program was used to
     *		create the original spreadsheet file.
     *	Note that this value is not guaranteed to reflect the actual calculated value because it is
     *		possible that auto-calculation was disabled in the original spreadsheet, and underlying data
     *		values used by the formula have changed since it was last calculated.
     *
     *	@var mixed
     */
    private $_calculatedValue = \NULL;
    /**
     *	Type of the cell data
     *
     *	@var	string
     */
    private $_dataType;
    /**
     *	Parent worksheet
     *
     *	@var	PHPExcel_CachedObjectStorage_CacheBase
     */
    private $_parent;
    /**
     *	Index to cellXf
     *
     *	@var	int
     */
    private $_xfIndex = 0;
    /**
     *	Attributes of the formula
     *
     */
    private $_formulaAttributes;
    /**
     *	Send notification to the cache controller
     *
     *	@return void
     **/
    public function notifyCacheController()
    {
    }
    public function detach()
    {
    }
    public function attach(\PHPExcel_CachedObjectStorage_CacheBase $parent)
    {
    }
    /**
     *	Create a new Cell
     *
     *	@param	mixed				$pValue
     *	@param	string				$pDataType
     *	@param	PHPExcel_Worksheet	$pSheet
     *	@throws	PHPExcel_Exception
     */
    public function __construct($pValue = \NULL, $pDataType = \NULL, \PHPExcel_Worksheet $pSheet = \NULL)
    {
    }
    /**
     *	Get cell coordinate column
     *
     *	@return	string
     */
    public function getColumn()
    {
    }
    /**
     *	Get cell coordinate row
     *
     *	@return	int
     */
    public function getRow()
    {
    }
    /**
     *	Get cell coordinate
     *
     *	@return	string
     */
    public function getCoordinate()
    {
    }
    /**
     *	Get cell value
     *
     *	@return	mixed
     */
    public function getValue()
    {
    }
    /**
     *	Get cell value with formatting
     *
     *	@return	string
     */
    public function getFormattedValue()
    {
    }
    /**
     *	Set cell value
     *
     *	Sets the value for a cell, automatically determining the datatype using the value binder
     *
     *	@param	mixed	$pValue					Value
     *	@return	PHPExcel_Cell
     *	@throws	PHPExcel_Exception
     */
    public function setValue($pValue = \NULL)
    {
    }
    /**
     *	Set the value for a cell, with the explicit data type passed to the method (bypassing any use of the value binder)
     *
     *	@param	mixed	$pValue			Value
     *	@param	string	$pDataType		Explicit data type
     *	@return	PHPExcel_Cell
     *	@throws	PHPExcel_Exception
     */
    public function setValueExplicit($pValue = \NULL, $pDataType = \PHPExcel_Cell_DataType::TYPE_STRING)
    {
    }
    /**
     *	Get calculated cell value
     *
     *	@deprecated		Since version 1.7.8 for planned changes to cell for array formula handling
     *
     *	@param	boolean $resetLog  Whether the calculation engine logger should be reset or not
     *	@return	mixed
     *	@throws	PHPExcel_Exception
     */
    public function getCalculatedValue($resetLog = \TRUE)
    {
    }
    /**
     *	Set old calculated value (cached)
     *
     *	@param	mixed $pValue	Value
     *	@return	PHPExcel_Cell
     */
    public function setCalculatedValue($pValue = \NULL)
    {
    }
    /**
     *	Get old calculated value (cached)
     *	This returns the value last calculated by MS Excel or whichever spreadsheet program was used to
     *		create the original spreadsheet file.
     *	Note that this value is not guaranteed to refelect the actual calculated value because it is
     *		possible that auto-calculation was disabled in the original spreadsheet, and underlying data
     *		values used by the formula have changed since it was last calculated.
     *
     *	@return	mixed
     */
    public function getOldCalculatedValue()
    {
    }
    /**
     *	Get cell data type
     *
     *	@return string
     */
    public function getDataType()
    {
    }
    /**
     *	Set cell data type
     *
     *	@param	string $pDataType
     *	@return	PHPExcel_Cell
     */
    public function setDataType($pDataType = \PHPExcel_Cell_DataType::TYPE_STRING)
    {
    }
    /**
     *  Identify if the cell contains a formula
     *
     *  @return boolean
     */
    public function isFormula()
    {
    }
    /**
     *	Does this cell contain Data validation rules?
     *
     *	@return	boolean
     *	@throws	PHPExcel_Exception
     */
    public function hasDataValidation()
    {
    }
    /**
     *	Get Data validation rules
     *
     *	@return	PHPExcel_Cell_DataValidation
     *	@throws	PHPExcel_Exception
     */
    public function getDataValidation()
    {
    }
    /**
     *	Set Data validation rules
     *
     *	@param	PHPExcel_Cell_DataValidation	$pDataValidation
     *	@return	PHPExcel_Cell
     *	@throws	PHPExcel_Exception
     */
    public function setDataValidation(\PHPExcel_Cell_DataValidation $pDataValidation = \NULL)
    {
    }
    /**
     *	Does this cell contain a Hyperlink?
     *
     *	@return boolean
     *	@throws	PHPExcel_Exception
     */
    public function hasHyperlink()
    {
    }
    /**
     *	Get Hyperlink
     *
     *	@return	PHPExcel_Cell_Hyperlink
     *	@throws	PHPExcel_Exception
     */
    public function getHyperlink()
    {
    }
    /**
     *	Set Hyperlink
     *
     *	@param	PHPExcel_Cell_Hyperlink	$pHyperlink
     *	@return	PHPExcel_Cell
     *	@throws	PHPExcel_Exception
     */
    public function setHyperlink(\PHPExcel_Cell_Hyperlink $pHyperlink = \NULL)
    {
    }
    /**
     *	Get parent worksheet
     *
     *	@return PHPExcel_CachedObjectStorage_CacheBase
     */
    public function getParent()
    {
    }
    /**
     *	Get parent worksheet
     *
     *	@return PHPExcel_Worksheet
     */
    public function getWorksheet()
    {
    }
    /**
     *	Is this cell in a merge range
     *
     *	@return boolean
     */
    public function isInMergeRange()
    {
    }
    /**
     *	Is this cell the master (top left cell) in a merge range (that holds the actual data value)
     *
     *	@return boolean
     */
    public function isMergeRangeValueCell()
    {
    }
    /**
     *	If this cell is in a merge range, then return the range
     *
     *	@return string
     */
    public function getMergeRange()
    {
    }
    /**
     *	Get cell style
     *
     *	@return	PHPExcel_Style
     */
    public function getStyle()
    {
    }
    /**
     *	Re-bind parent
     *
     *	@param	PHPExcel_Worksheet $parent
     *	@return	PHPExcel_Cell
     */
    public function rebindParent(\PHPExcel_Worksheet $parent)
    {
    }
    /**
     *	Is cell in a specific range?
     *
     *	@param	string	$pRange		Cell range (e.g. A1:A1)
     *	@return	boolean
     */
    public function isInRange($pRange = 'A1:A1')
    {
    }
    /**
     *	Coordinate from string
     *
     *	@param	string	$pCoordinateString
     *	@return	array	Array containing column and row (indexes 0 and 1)
     *	@throws	PHPExcel_Exception
     */
    public static function coordinateFromString($pCoordinateString = 'A1')
    {
    }
    /**
     *	Make string row, column or cell coordinate absolute
     *
     *	@param	string	$pCoordinateString		e.g. 'A' or '1' or 'A1'
     *					Note that this value can be a row or column reference as well as a cell reference
     *	@return	string	Absolute coordinate		e.g. '$A' or '$1' or '$A$1'
     *	@throws	PHPExcel_Exception
     */
    public static function absoluteReference($pCoordinateString = 'A1')
    {
    }
    /**
     *	Make string coordinate absolute
     *
     *	@param	string	$pCoordinateString		e.g. 'A1'
     *	@return	string	Absolute coordinate		e.g. '$A$1'
     *	@throws	PHPExcel_Exception
     */
    public static function absoluteCoordinate($pCoordinateString = 'A1')
    {
    }
    /**
     *	Split range into coordinate strings
     *
     *	@param	string	$pRange		e.g. 'B4:D9' or 'B4:D9,H2:O11' or 'B4'
     *	@return	array	Array containg one or more arrays containing one or two coordinate strings
     *								e.g. array('B4','D9') or array(array('B4','D9'),array('H2','O11'))
     *										or array('B4')
     */
    public static function splitRange($pRange = 'A1:A1')
    {
    }
    /**
     *	Build range from coordinate strings
     *
     *	@param	array	$pRange	Array containg one or more arrays containing one or two coordinate strings
     *	@return	string	String representation of $pRange
     *	@throws	PHPExcel_Exception
     */
    public static function buildRange($pRange)
    {
    }
    /**
     *	Calculate range boundaries
     *
     *	@param	string	$pRange		Cell range (e.g. A1:A1)
     *	@return	array	Range coordinates array(Start Cell, End Cell)
     *					where Start Cell and End Cell are arrays (Column Number, Row Number)
     */
    public static function rangeBoundaries($pRange = 'A1:A1')
    {
    }
    /**
     *	Calculate range dimension
     *
     *	@param	string	$pRange		Cell range (e.g. A1:A1)
     *	@return	array	Range dimension (width, height)
     */
    public static function rangeDimension($pRange = 'A1:A1')
    {
    }
    /**
     *	Calculate range boundaries
     *
     *	@param	string	$pRange		Cell range (e.g. A1:A1)
     *	@return	array	Range coordinates array(Start Cell, End Cell)
     *					where Start Cell and End Cell are arrays (Column ID, Row Number)
     */
    public static function getRangeBoundaries($pRange = 'A1:A1')
    {
    }
    /**
     *	Column index from string
     *
     *	@param	string $pString
     *	@return	int Column index (base 1 !!!)
     */
    public static function columnIndexFromString($pString = 'A')
    {
    }
    /**
     *	String from columnindex
     *
     *	@param	int $pColumnIndex Column index (base 0 !!!)
     *	@return	string
     */
    public static function stringFromColumnIndex($pColumnIndex = 0)
    {
    }
    /**
     *	Extract all cell references in range
     *
     *	@param	string	$pRange		Range (e.g. A1 or A1:C10 or A1:E10 A20:E25)
     *	@return	array	Array containing single cell references
     */
    public static function extractAllCellReferencesInRange($pRange = 'A1')
    {
    }
    /**
     * Compare 2 cells
     *
     * @param	PHPExcel_Cell	$a	Cell a
     * @param	PHPExcel_Cell	$b	Cell b
     * @return	int		Result of comparison (always -1 or 1, never zero!)
     */
    public static function compareCells(\PHPExcel_Cell $a, \PHPExcel_Cell $b)
    {
    }
    /**
     * Get value binder to use
     *
     * @return PHPExcel_Cell_IValueBinder
     */
    public static function getValueBinder()
    {
    }
    /**
     * Set value binder to use
     *
     * @param PHPExcel_Cell_IValueBinder $binder
     * @throws PHPExcel_Exception
     */
    public static function setValueBinder(\PHPExcel_Cell_IValueBinder $binder = \NULL)
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
    /**
     * Get index to cellXf
     *
     * @return int
     */
    public function getXfIndex()
    {
    }
    /**
     * Set index to cellXf
     *
     * @param int $pValue
     * @return PHPExcel_Cell
     */
    public function setXfIndex($pValue = 0)
    {
    }
    /**
     *	@deprecated		Since version 1.7.8 for planned changes to cell for array formula handling
     */
    public function setFormulaAttributes($pAttributes)
    {
    }
    /**
     *	@deprecated		Since version 1.7.8 for planned changes to cell for array formula handling
     */
    public function getFormulaAttributes()
    {
    }
    /**
     * Convert to string
     *
     * @return string
     */
    public function __toString()
    {
    }
}