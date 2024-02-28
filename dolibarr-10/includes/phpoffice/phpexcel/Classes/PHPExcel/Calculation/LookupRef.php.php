<?php

/**
 * PHPExcel_Calculation_LookupRef
 *
 * @category	PHPExcel
 * @package		PHPExcel_Calculation
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Calculation_LookupRef
{
    /**
     * CELL_ADDRESS
     *
     * Creates a cell address as text, given specified row and column numbers.
     *
     * Excel Function:
     *		=ADDRESS(row, column, [relativity], [referenceStyle], [sheetText])
     *
     * @param	row				Row number to use in the cell reference
     * @param	column			Column number to use in the cell reference
     * @param	relativity		Flag indicating the type of reference to return
     *								1 or omitted	Absolute
     *								2				Absolute row; relative column
     *								3				Relative row; absolute column
     *								4				Relative
     * @param	referenceStyle	A logical value that specifies the A1 or R1C1 reference style.
     *								TRUE or omitted		CELL_ADDRESS returns an A1-style reference
     *								FALSE				CELL_ADDRESS returns an R1C1-style reference
     * @param	sheetText		Optional Name of worksheet to use
     * @return	string
     */
    public static function CELL_ADDRESS($row, $column, $relativity = 1, $referenceStyle = \True, $sheetText = '')
    {
    }
    //	function CELL_ADDRESS()
    /**
     * COLUMN
     *
     * Returns the column number of the given cell reference
     * If the cell reference is a range of cells, COLUMN returns the column numbers of each column in the reference as a horizontal array.
     * If cell reference is omitted, and the function is being called through the calculation engine, then it is assumed to be the
     *		reference of the cell in which the COLUMN function appears; otherwise this function returns 0.
     *
     * Excel Function:
     *		=COLUMN([cellAddress])
     *
     * @param	cellAddress		A reference to a range of cells for which you want the column numbers
     * @return	integer or array of integer
     */
    public static function COLUMN($cellAddress = \Null)
    {
    }
    //	function COLUMN()
    /**
     * COLUMNS
     *
     * Returns the number of columns in an array or reference.
     *
     * Excel Function:
     *		=COLUMNS(cellAddress)
     *
     * @param	cellAddress		An array or array formula, or a reference to a range of cells for which you want the number of columns
     * @return	integer			The number of columns in cellAddress
     */
    public static function COLUMNS($cellAddress = \Null)
    {
    }
    //	function COLUMNS()
    /**
     * ROW
     *
     * Returns the row number of the given cell reference
     * If the cell reference is a range of cells, ROW returns the row numbers of each row in the reference as a vertical array.
     * If cell reference is omitted, and the function is being called through the calculation engine, then it is assumed to be the
     *		reference of the cell in which the ROW function appears; otherwise this function returns 0.
     *
     * Excel Function:
     *		=ROW([cellAddress])
     *
     * @param	cellAddress		A reference to a range of cells for which you want the row numbers
     * @return	integer or array of integer
     */
    public static function ROW($cellAddress = \Null)
    {
    }
    //	function ROW()
    /**
     * ROWS
     *
     * Returns the number of rows in an array or reference.
     *
     * Excel Function:
     *		=ROWS(cellAddress)
     *
     * @param	cellAddress		An array or array formula, or a reference to a range of cells for which you want the number of rows
     * @return	integer			The number of rows in cellAddress
     */
    public static function ROWS($cellAddress = \Null)
    {
    }
    //	function ROWS()
    /**
     * HYPERLINK
     *
     * Excel Function:
     *		=HYPERLINK(linkURL,displayName)
     *
     * @access	public
     * @category Logical Functions
     * @param	string			$linkURL		Value to check, is also the value returned when no error
     * @param	string			$displayName	Value to return when testValue is an error condition
     * @param	PHPExcel_Cell	$pCell			The cell to set the hyperlink in
     * @return	mixed	The value of $displayName (or $linkURL if $displayName was blank)
     */
    public static function HYPERLINK($linkURL = '', $displayName = \null, \PHPExcel_Cell $pCell = \null)
    {
    }
    //	function HYPERLINK()
    /**
     * INDIRECT
     *
     * Returns the reference specified by a text string.
     * References are immediately evaluated to display their contents.
     *
     * Excel Function:
     *		=INDIRECT(cellAddress)
     *
     * NOTE - INDIRECT() does not yet support the optional a1 parameter introduced in Excel 2010
     *
     * @param	cellAddress		$cellAddress	The cell address of the current cell (containing this formula)
     * @param	PHPExcel_Cell	$pCell			The current cell (containing this formula)
     * @return	mixed			The cells referenced by cellAddress
     *
     * @todo	Support for the optional a1 parameter introduced in Excel 2010
     *
     */
    public static function INDIRECT($cellAddress = \NULL, \PHPExcel_Cell $pCell = \NULL)
    {
    }
    //	function INDIRECT()
    /**
     * OFFSET
     *
     * Returns a reference to a range that is a specified number of rows and columns from a cell or range of cells.
     * The reference that is returned can be a single cell or a range of cells. You can specify the number of rows and
     * the number of columns to be returned.
     *
     * Excel Function:
     *		=OFFSET(cellAddress, rows, cols, [height], [width])
     *
     * @param	cellAddress		The reference from which you want to base the offset. Reference must refer to a cell or
     *								range of adjacent cells; otherwise, OFFSET returns the #VALUE! error value.
     * @param	rows			The number of rows, up or down, that you want the upper-left cell to refer to.
     *								Using 5 as the rows argument specifies that the upper-left cell in the reference is
     *								five rows below reference. Rows can be positive (which means below the starting reference)
     *								or negative (which means above the starting reference).
     * @param	cols			The number of columns, to the left or right, that you want the upper-left cell of the result
     *								to refer to. Using 5 as the cols argument specifies that the upper-left cell in the
     *								reference is five columns to the right of reference. Cols can be positive (which means
     *								to the right of the starting reference) or negative (which means to the left of the
     *								starting reference).
     * @param	height			The height, in number of rows, that you want the returned reference to be. Height must be a positive number.
     * @param	width			The width, in number of columns, that you want the returned reference to be. Width must be a positive number.
     * @return	string			A reference to a cell or range of cells
     */
    public static function OFFSET($cellAddress = \Null, $rows = 0, $columns = 0, $height = \null, $width = \null)
    {
    }
    //	function OFFSET()
    /**
     * CHOOSE
     *
     * Uses lookup_value to return a value from the list of value arguments.
     * Use CHOOSE to select one of up to 254 values based on the lookup_value.
     *
     * Excel Function:
     *		=CHOOSE(index_num, value1, [value2], ...)
     *
     * @param	index_num		Specifies which value argument is selected.
     *							Index_num must be a number between 1 and 254, or a formula or reference to a cell containing a number
     *								between 1 and 254.
     * @param	value1...		Value1 is required, subsequent values are optional.
     *							Between 1 to 254 value arguments from which CHOOSE selects a value or an action to perform based on
     *								index_num. The arguments can be numbers, cell references, defined names, formulas, functions, or
     *								text.
     * @return	mixed			The selected value
     */
    public static function CHOOSE()
    {
    }
    //	function CHOOSE()
    /**
     * MATCH
     *
     * The MATCH function searches for a specified item in a range of cells
     *
     * Excel Function:
     *		=MATCH(lookup_value, lookup_array, [match_type])
     *
     * @param	lookup_value	The value that you want to match in lookup_array
     * @param	lookup_array	The range of cells being searched
     * @param	match_type		The number -1, 0, or 1. -1 means above, 0 means exact match, 1 means below. If match_type is 1 or -1, the list has to be ordered.
     * @return	integer			The relative position of the found item
     */
    public static function MATCH($lookup_value, $lookup_array, $match_type = 1)
    {
    }
    //	function MATCH()
    /**
     * INDEX
     *
     * Uses an index to choose a value from a reference or array
     *
     * Excel Function:
     *		=INDEX(range_array, row_num, [column_num])
     *
     * @param	range_array		A range of cells or an array constant
     * @param	row_num			The row in array from which to return a value. If row_num is omitted, column_num is required.
     * @param	column_num		The column in array from which to return a value. If column_num is omitted, row_num is required.
     * @return	mixed			the value of a specified cell or array of cells
     */
    public static function INDEX($arrayValues, $rowNum = 0, $columnNum = 0)
    {
    }
    //	function INDEX()
    /**
     * TRANSPOSE
     *
     * @param	array	$matrixData	A matrix of values
     * @return	array
     *
     * Unlike the Excel TRANSPOSE function, which will only work on a single row or column, this function will transpose a full matrix.
     */
    public static function TRANSPOSE($matrixData)
    {
    }
    //	function TRANSPOSE()
    private static function _vlookupSort($a, $b)
    {
    }
    //	function _vlookupSort()
    /**
     * VLOOKUP
     * The VLOOKUP function searches for value in the left-most column of lookup_array and returns the value in the same row based on the index_number.
     * @param	lookup_value	The value that you want to match in lookup_array
     * @param	lookup_array	The range of cells being searched
     * @param	index_number	The column number in table_array from which the matching value must be returned. The first column is 1.
     * @param	not_exact_match	Determines if you are looking for an exact match based on lookup_value.
     * @return	mixed			The value of the found cell
     */
    public static function VLOOKUP($lookup_value, $lookup_array, $index_number, $not_exact_match = \true)
    {
    }
    //	function VLOOKUP()
    /**
     * HLOOKUP
     * The HLOOKUP function searches for value in the top-most row of lookup_array and returns the value in the same column based on the index_number.
     * @param    lookup_value    The value that you want to match in lookup_array
     * @param    lookup_array    The range of cells being searched
     * @param    index_number    The row number in table_array from which the matching value must be returned. The first row is 1.
     * @param    not_exact_match Determines if you are looking for an exact match based on lookup_value.
     * @return   mixed           The value of the found cell
     */
    public static function HLOOKUP($lookup_value, $lookup_array, $index_number, $not_exact_match = \true)
    {
    }
    //  function HLOOKUP()
    /**
     * LOOKUP
     * The LOOKUP function searches for value either from a one-row or one-column range or from an array.
     * @param	lookup_value	The value that you want to match in lookup_array
     * @param	lookup_vector	The range of cells being searched
     * @param	result_vector	The column from which the matching value must be returned
     * @return	mixed			The value of the found cell
     */
    public static function LOOKUP($lookup_value, $lookup_vector, $result_vector = \null)
    {
    }
    //	function LOOKUP()
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');