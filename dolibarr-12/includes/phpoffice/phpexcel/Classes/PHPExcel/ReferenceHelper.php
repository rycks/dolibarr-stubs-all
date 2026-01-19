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
 * @package	PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license	http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version	##VERSION##, ##DATE##
 */
/**
 * PHPExcel_ReferenceHelper (Singleton)
 *
 * @category   PHPExcel
 * @package	PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_ReferenceHelper
{
    /**	Constants				*/
    /**	Regular Expressions		*/
    const REFHELPER_REGEXP_CELLREF = '((\\w*|\'[^!]*\')!)?(?<![:a-z\\$])(\\$?[a-z]{1,3}\\$?\\d+)(?=[^:!\\d\'])';
    const REFHELPER_REGEXP_CELLRANGE = '((\\w*|\'[^!]*\')!)?(\\$?[a-z]{1,3}\\$?\\d+):(\\$?[a-z]{1,3}\\$?\\d+)';
    const REFHELPER_REGEXP_ROWRANGE = '((\\w*|\'[^!]*\')!)?(\\$?\\d+):(\\$?\\d+)';
    const REFHELPER_REGEXP_COLRANGE = '((\\w*|\'[^!]*\')!)?(\\$?[a-z]{1,3}):(\\$?[a-z]{1,3})';
    /**
     * Instance of this class
     *
     * @var PHPExcel_ReferenceHelper
     */
    private static $_instance;
    /**
     * Get an instance of this class
     *
     * @return PHPExcel_ReferenceHelper
     */
    public static function getInstance()
    {
    }
    /**
     * Create a new PHPExcel_ReferenceHelper
     */
    protected function __construct()
    {
    }
    /**
     * Compare two column addresses
     * Intended for use as a Callback function for sorting column addresses by column
     *
     * @param   string   $a  First column to test (e.g. 'AA')
     * @param   string   $b  Second column to test (e.g. 'Z')
     * @return  integer
     */
    public static function columnSort($a, $b)
    {
    }
    /**
     * Compare two column addresses
     * Intended for use as a Callback function for reverse sorting column addresses by column
     *
     * @param   string   $a  First column to test (e.g. 'AA')
     * @param   string   $b  Second column to test (e.g. 'Z')
     * @return  integer
     */
    public static function columnReverseSort($a, $b)
    {
    }
    /**
     * Compare two cell addresses
     * Intended for use as a Callback function for sorting cell addresses by column and row
     *
     * @param   string   $a  First cell to test (e.g. 'AA1')
     * @param   string   $b  Second cell to test (e.g. 'Z1')
     * @return  integer
     */
    public static function cellSort($a, $b)
    {
    }
    /**
     * Compare two cell addresses
     * Intended for use as a Callback function for sorting cell addresses by column and row
     *
     * @param   string   $a  First cell to test (e.g. 'AA1')
     * @param   string   $b  Second cell to test (e.g. 'Z1')
     * @return  integer
     */
    public static function cellReverseSort($a, $b)
    {
    }
    /**
     * Test whether a cell address falls within a defined range of cells
     *
     * @param   string     $cellAddress        Address of the cell we're testing
     * @param   integer    $beforeRow          Number of the row we're inserting/deleting before
     * @param   integer    $pNumRows           Number of rows to insert/delete (negative values indicate deletion)
     * @param   integer    $beforeColumnIndex  Index number of the column we're inserting/deleting before
     * @param   integer    $pNumCols           Number of columns to insert/delete (negative values indicate deletion)
     * @return  boolean
     */
    private static function cellAddressInDeleteRange($cellAddress, $beforeRow, $pNumRows, $beforeColumnIndex, $pNumCols)
    {
    }
    /**
     * Update page breaks when inserting/deleting rows/columns
     *
     * @param   PHPExcel_Worksheet  $pSheet             The worksheet that we're editing
     * @param   string              $pBefore            Insert/Delete before this cell address (e.g. 'A1')
     * @param   integer             $beforeColumnIndex  Index number of the column we're inserting/deleting before
     * @param   integer             $pNumCols           Number of columns to insert/delete (negative values indicate deletion)
     * @param   integer             $beforeRow          Number of the row we're inserting/deleting before
     * @param   integer             $pNumRows           Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function _adjustPageBreaks(\PHPExcel_Worksheet $pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Update cell comments when inserting/deleting rows/columns
     *
     * @param   PHPExcel_Worksheet  $pSheet             The worksheet that we're editing
     * @param   string              $pBefore            Insert/Delete before this cell address (e.g. 'A1')
     * @param   integer             $beforeColumnIndex  Index number of the column we're inserting/deleting before
     * @param   integer             $pNumCols           Number of columns to insert/delete (negative values indicate deletion)
     * @param   integer             $beforeRow          Number of the row we're inserting/deleting before
     * @param   integer             $pNumRows           Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function _adjustComments($pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Update hyperlinks when inserting/deleting rows/columns
     *
     * @param   PHPExcel_Worksheet  $pSheet             The worksheet that we're editing
     * @param   string              $pBefore            Insert/Delete before this cell address (e.g. 'A1')
     * @param   integer             $beforeColumnIndex  Index number of the column we're inserting/deleting before
     * @param   integer             $pNumCols           Number of columns to insert/delete (negative values indicate deletion)
     * @param   integer             $beforeRow          Number of the row we're inserting/deleting before
     * @param   integer             $pNumRows           Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function _adjustHyperlinks($pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Update data validations when inserting/deleting rows/columns
     *
     * @param   PHPExcel_Worksheet  $pSheet             The worksheet that we're editing
     * @param   string              $pBefore            Insert/Delete before this cell address (e.g. 'A1')
     * @param   integer             $beforeColumnIndex  Index number of the column we're inserting/deleting before
     * @param   integer             $pNumCols           Number of columns to insert/delete (negative values indicate deletion)
     * @param   integer             $beforeRow          Number of the row we're inserting/deleting before
     * @param   integer             $pNumRows           Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function _adjustDataValidations($pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Update merged cells when inserting/deleting rows/columns
     *
     * @param   PHPExcel_Worksheet  $pSheet             The worksheet that we're editing
     * @param   string              $pBefore            Insert/Delete before this cell address (e.g. 'A1')
     * @param   integer             $beforeColumnIndex  Index number of the column we're inserting/deleting before
     * @param   integer             $pNumCols           Number of columns to insert/delete (negative values indicate deletion)
     * @param   integer             $beforeRow          Number of the row we're inserting/deleting before
     * @param   integer             $pNumRows           Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function _adjustMergeCells($pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Update protected cells when inserting/deleting rows/columns
     *
     * @param   PHPExcel_Worksheet  $pSheet             The worksheet that we're editing
     * @param   string              $pBefore            Insert/Delete before this cell address (e.g. 'A1')
     * @param   integer             $beforeColumnIndex  Index number of the column we're inserting/deleting before
     * @param   integer             $pNumCols           Number of columns to insert/delete (negative values indicate deletion)
     * @param   integer             $beforeRow          Number of the row we're inserting/deleting before
     * @param   integer             $pNumRows           Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function _adjustProtectedCells($pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Update column dimensions when inserting/deleting rows/columns
     *
     * @param   PHPExcel_Worksheet  $pSheet             The worksheet that we're editing
     * @param   string              $pBefore            Insert/Delete before this cell address (e.g. 'A1')
     * @param   integer             $beforeColumnIndex  Index number of the column we're inserting/deleting before
     * @param   integer             $pNumCols           Number of columns to insert/delete (negative values indicate deletion)
     * @param   integer             $beforeRow          Number of the row we're inserting/deleting before
     * @param   integer             $pNumRows           Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function _adjustColumnDimensions($pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Update row dimensions when inserting/deleting rows/columns
     *
     * @param   PHPExcel_Worksheet  $pSheet             The worksheet that we're editing
     * @param   string              $pBefore            Insert/Delete before this cell address (e.g. 'A1')
     * @param   integer             $beforeColumnIndex  Index number of the column we're inserting/deleting before
     * @param   integer             $pNumCols           Number of columns to insert/delete (negative values indicate deletion)
     * @param   integer             $beforeRow          Number of the row we're inserting/deleting before
     * @param   integer             $pNumRows           Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function _adjustRowDimensions($pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Insert a new column or row, updating all possible related data
     *
     * @param   string              $pBefore    Insert before this cell address (e.g. 'A1')
     * @param   integer             $pNumCols   Number of columns to insert/delete (negative values indicate deletion)
     * @param   integer             $pNumRows   Number of rows to insert/delete (negative values indicate deletion)
     * @param   PHPExcel_Worksheet  $pSheet     The worksheet that we're editing
     * @throws  PHPExcel_Exception
     */
    public function insertNewBefore($pBefore = 'A1', $pNumCols = 0, $pNumRows = 0, \PHPExcel_Worksheet $pSheet = \NULL)
    {
    }
    /**
     * Update references within formulas
     *
     * @param	string	$pFormula	Formula to update
     * @param	int		$pBefore	Insert before this one
     * @param	int		$pNumCols	Number of columns to insert
     * @param	int		$pNumRows	Number of rows to insert
     * @param   string  $sheetName  Worksheet name/title
     * @return	string	Updated formula
     * @throws	PHPExcel_Exception
     */
    public function updateFormulaReferences($pFormula = '', $pBefore = 'A1', $pNumCols = 0, $pNumRows = 0, $sheetName = '')
    {
    }
    /**
     * Update cell reference
     *
     * @param	string	$pCellRange			Cell range
     * @param	int		$pBefore			Insert before this one
     * @param	int		$pNumCols			Number of columns to increment
     * @param	int		$pNumRows			Number of rows to increment
     * @return	string	Updated cell range
     * @throws	PHPExcel_Exception
     */
    public function updateCellReference($pCellRange = 'A1', $pBefore = 'A1', $pNumCols = 0, $pNumRows = 0)
    {
    }
    /**
     * Update named formulas (i.e. containing worksheet references / named ranges)
     *
     * @param PHPExcel $pPhpExcel	Object to update
     * @param string $oldName		Old name (name to replace)
     * @param string $newName		New name
     */
    public function updateNamedFormulas(\PHPExcel $pPhpExcel, $oldName = '', $newName = '')
    {
    }
    /**
     * Update cell range
     *
     * @param	string	$pCellRange			Cell range	(e.g. 'B2:D4', 'B:C' or '2:3')
     * @param	int		$pBefore			Insert before this one
     * @param	int		$pNumCols			Number of columns to increment
     * @param	int		$pNumRows			Number of rows to increment
     * @return	string	Updated cell range
     * @throws	PHPExcel_Exception
     */
    private function _updateCellRange($pCellRange = 'A1:A1', $pBefore = 'A1', $pNumCols = 0, $pNumRows = 0)
    {
    }
    /**
     * Update single cell reference
     *
     * @param	string	$pCellReference		Single cell reference
     * @param	int		$pBefore			Insert before this one
     * @param	int		$pNumCols			Number of columns to increment
     * @param	int		$pNumRows			Number of rows to increment
     * @return	string	Updated cell reference
     * @throws	PHPExcel_Exception
     */
    private function _updateSingleCellReference($pCellReference = 'A1', $pBefore = 'A1', $pNumCols = 0, $pNumRows = 0)
    {
    }
    /**
     * __clone implementation. Cloning should not be allowed in a Singleton!
     *
     * @throws	PHPExcel_Exception
     */
    public final function __clone()
    {
    }
}