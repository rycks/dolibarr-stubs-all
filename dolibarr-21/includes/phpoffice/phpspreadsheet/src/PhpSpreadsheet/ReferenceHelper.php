<?php

namespace PhpOffice\PhpSpreadsheet;

class ReferenceHelper
{
    /**    Constants                */
    /**    Regular Expressions      */
    const REFHELPER_REGEXP_CELLREF = '((\\w*|\'[^!]*\')!)?(?<![:a-z\\$])(\\$?[a-z]{1,3}\\$?\\d+)(?=[^:!\\d\'])';
    const REFHELPER_REGEXP_CELLRANGE = '((\\w*|\'[^!]*\')!)?(\\$?[a-z]{1,3}\\$?\\d+):(\\$?[a-z]{1,3}\\$?\\d+)';
    const REFHELPER_REGEXP_ROWRANGE = '((\\w*|\'[^!]*\')!)?(\\$?\\d+):(\\$?\\d+)';
    const REFHELPER_REGEXP_COLRANGE = '((\\w*|\'[^!]*\')!)?(\\$?[a-z]{1,3}):(\\$?[a-z]{1,3})';
    /**
     * Instance of this class.
     *
     * @var ReferenceHelper
     */
    private static $instance;
    /**
     * Get an instance of this class.
     *
     * @return ReferenceHelper
     */
    public static function getInstance()
    {
    }
    /**
     * Create a new ReferenceHelper.
     */
    protected function __construct()
    {
    }
    /**
     * Compare two column addresses
     * Intended for use as a Callback function for sorting column addresses by column.
     *
     * @param string $a First column to test (e.g. 'AA')
     * @param string $b Second column to test (e.g. 'Z')
     *
     * @return int
     */
    public static function columnSort($a, $b)
    {
    }
    /**
     * Compare two column addresses
     * Intended for use as a Callback function for reverse sorting column addresses by column.
     *
     * @param string $a First column to test (e.g. 'AA')
     * @param string $b Second column to test (e.g. 'Z')
     *
     * @return int
     */
    public static function columnReverseSort($a, $b)
    {
    }
    /**
     * Compare two cell addresses
     * Intended for use as a Callback function for sorting cell addresses by column and row.
     *
     * @param string $a First cell to test (e.g. 'AA1')
     * @param string $b Second cell to test (e.g. 'Z1')
     *
     * @return int
     */
    public static function cellSort($a, $b)
    {
    }
    /**
     * Compare two cell addresses
     * Intended for use as a Callback function for sorting cell addresses by column and row.
     *
     * @param string $a First cell to test (e.g. 'AA1')
     * @param string $b Second cell to test (e.g. 'Z1')
     *
     * @return int
     */
    public static function cellReverseSort($a, $b)
    {
    }
    /**
     * Test whether a cell address falls within a defined range of cells.
     *
     * @param string $cellAddress Address of the cell we're testing
     * @param int $beforeRow Number of the row we're inserting/deleting before
     * @param int $pNumRows Number of rows to insert/delete (negative values indicate deletion)
     * @param int $beforeColumnIndex Index number of the column we're inserting/deleting before
     * @param int $pNumCols Number of columns to insert/delete (negative values indicate deletion)
     *
     * @return bool
     */
    private static function cellAddressInDeleteRange($cellAddress, $beforeRow, $pNumRows, $beforeColumnIndex, $pNumCols)
    {
    }
    /**
     * Update page breaks when inserting/deleting rows/columns.
     *
     * @param Worksheet $pSheet The worksheet that we're editing
     * @param string $pBefore Insert/Delete before this cell address (e.g. 'A1')
     * @param int $beforeColumnIndex Index number of the column we're inserting/deleting before
     * @param int $pNumCols Number of columns to insert/delete (negative values indicate deletion)
     * @param int $beforeRow Number of the row we're inserting/deleting before
     * @param int $pNumRows Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function adjustPageBreaks(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Update cell comments when inserting/deleting rows/columns.
     *
     * @param Worksheet $pSheet The worksheet that we're editing
     * @param string $pBefore Insert/Delete before this cell address (e.g. 'A1')
     * @param int $beforeColumnIndex Index number of the column we're inserting/deleting before
     * @param int $pNumCols Number of columns to insert/delete (negative values indicate deletion)
     * @param int $beforeRow Number of the row we're inserting/deleting before
     * @param int $pNumRows Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function adjustComments($pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Update hyperlinks when inserting/deleting rows/columns.
     *
     * @param Worksheet $pSheet The worksheet that we're editing
     * @param string $pBefore Insert/Delete before this cell address (e.g. 'A1')
     * @param int $beforeColumnIndex Index number of the column we're inserting/deleting before
     * @param int $pNumCols Number of columns to insert/delete (negative values indicate deletion)
     * @param int $beforeRow Number of the row we're inserting/deleting before
     * @param int $pNumRows Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function adjustHyperlinks($pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Update data validations when inserting/deleting rows/columns.
     *
     * @param Worksheet $pSheet The worksheet that we're editing
     * @param string $pBefore Insert/Delete before this cell address (e.g. 'A1')
     * @param int $beforeColumnIndex Index number of the column we're inserting/deleting before
     * @param int $pNumCols Number of columns to insert/delete (negative values indicate deletion)
     * @param int $beforeRow Number of the row we're inserting/deleting before
     * @param int $pNumRows Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function adjustDataValidations($pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Update merged cells when inserting/deleting rows/columns.
     *
     * @param Worksheet $pSheet The worksheet that we're editing
     * @param string $pBefore Insert/Delete before this cell address (e.g. 'A1')
     * @param int $beforeColumnIndex Index number of the column we're inserting/deleting before
     * @param int $pNumCols Number of columns to insert/delete (negative values indicate deletion)
     * @param int $beforeRow Number of the row we're inserting/deleting before
     * @param int $pNumRows Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function adjustMergeCells($pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Update protected cells when inserting/deleting rows/columns.
     *
     * @param Worksheet $pSheet The worksheet that we're editing
     * @param string $pBefore Insert/Delete before this cell address (e.g. 'A1')
     * @param int $beforeColumnIndex Index number of the column we're inserting/deleting before
     * @param int $pNumCols Number of columns to insert/delete (negative values indicate deletion)
     * @param int $beforeRow Number of the row we're inserting/deleting before
     * @param int $pNumRows Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function adjustProtectedCells($pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Update column dimensions when inserting/deleting rows/columns.
     *
     * @param Worksheet $pSheet The worksheet that we're editing
     * @param string $pBefore Insert/Delete before this cell address (e.g. 'A1')
     * @param int $beforeColumnIndex Index number of the column we're inserting/deleting before
     * @param int $pNumCols Number of columns to insert/delete (negative values indicate deletion)
     * @param int $beforeRow Number of the row we're inserting/deleting before
     * @param int $pNumRows Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function adjustColumnDimensions($pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Update row dimensions when inserting/deleting rows/columns.
     *
     * @param Worksheet $pSheet The worksheet that we're editing
     * @param string $pBefore Insert/Delete before this cell address (e.g. 'A1')
     * @param int $beforeColumnIndex Index number of the column we're inserting/deleting before
     * @param int $pNumCols Number of columns to insert/delete (negative values indicate deletion)
     * @param int $beforeRow Number of the row we're inserting/deleting before
     * @param int $pNumRows Number of rows to insert/delete (negative values indicate deletion)
     */
    protected function adjustRowDimensions($pSheet, $pBefore, $beforeColumnIndex, $pNumCols, $beforeRow, $pNumRows)
    {
    }
    /**
     * Insert a new column or row, updating all possible related data.
     *
     * @param string $pBefore Insert before this cell address (e.g. 'A1')
     * @param int $pNumCols Number of columns to insert/delete (negative values indicate deletion)
     * @param int $pNumRows Number of rows to insert/delete (negative values indicate deletion)
     * @param Worksheet $pSheet The worksheet that we're editing
     *
     * @throws Exception
     */
    public function insertNewBefore($pBefore, $pNumCols, $pNumRows, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Update references within formulas.
     *
     * @param string $pFormula Formula to update
     * @param string $pBefore Insert before this one
     * @param int $pNumCols Number of columns to insert
     * @param int $pNumRows Number of rows to insert
     * @param string $sheetName Worksheet name/title
     *
     * @throws Exception
     *
     * @return string Updated formula
     */
    public function updateFormulaReferences($pFormula = '', $pBefore = 'A1', $pNumCols = 0, $pNumRows = 0, $sheetName = '')
    {
    }
    /**
     * Update cell reference.
     *
     * @param string $pCellRange Cell range
     * @param string $pBefore Insert before this one
     * @param int $pNumCols Number of columns to increment
     * @param int $pNumRows Number of rows to increment
     *
     * @throws Exception
     *
     * @return string Updated cell range
     */
    public function updateCellReference($pCellRange = 'A1', $pBefore = 'A1', $pNumCols = 0, $pNumRows = 0)
    {
    }
    /**
     * Update named formulas (i.e. containing worksheet references / named ranges).
     *
     * @param Spreadsheet $spreadsheet Object to update
     * @param string $oldName Old name (name to replace)
     * @param string $newName New name
     */
    public function updateNamedFormulas(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet, $oldName = '', $newName = '')
    {
    }
    /**
     * Update cell range.
     *
     * @param string $pCellRange Cell range    (e.g. 'B2:D4', 'B:C' or '2:3')
     * @param string $pBefore Insert before this one
     * @param int $pNumCols Number of columns to increment
     * @param int $pNumRows Number of rows to increment
     *
     * @throws Exception
     *
     * @return string Updated cell range
     */
    private function updateCellRange($pCellRange = 'A1:A1', $pBefore = 'A1', $pNumCols = 0, $pNumRows = 0)
    {
    }
    /**
     * Update single cell reference.
     *
     * @param string $pCellReference Single cell reference
     * @param string $pBefore Insert before this one
     * @param int $pNumCols Number of columns to increment
     * @param int $pNumRows Number of rows to increment
     *
     * @throws Exception
     *
     * @return string Updated cell reference
     */
    private function updateSingleCellReference($pCellReference = 'A1', $pBefore = 'A1', $pNumCols = 0, $pNumRows = 0)
    {
    }
    /**
     * __clone implementation. Cloning should not be allowed in a Singleton!
     *
     * @throws Exception
     */
    public final function __clone()
    {
    }
}