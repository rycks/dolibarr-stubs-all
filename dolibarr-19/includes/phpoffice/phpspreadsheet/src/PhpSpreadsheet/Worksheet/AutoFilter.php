<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class AutoFilter
{
    /**
     * Autofilter Worksheet.
     *
     * @var Worksheet
     */
    private $workSheet;
    /**
     * Autofilter Range.
     *
     * @var string
     */
    private $range = '';
    /**
     * Autofilter Column Ruleset.
     *
     * @var AutoFilter\Column[]
     */
    private $columns = [];
    /**
     * Create a new AutoFilter.
     *
     * @param string $pRange Cell range (i.e. A1:E10)
     * @param Worksheet $pSheet
     */
    public function __construct($pRange = '', \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet = null)
    {
    }
    /**
     * Get AutoFilter Parent Worksheet.
     *
     * @return Worksheet
     */
    public function getParent()
    {
    }
    /**
     * Set AutoFilter Parent Worksheet.
     *
     * @param Worksheet $pSheet
     *
     * @return $this
     */
    public function setParent(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet = null)
    {
    }
    /**
     * Get AutoFilter Range.
     *
     * @return string
     */
    public function getRange()
    {
    }
    /**
     * Set AutoFilter Range.
     *
     * @param string $pRange Cell range (i.e. A1:E10)
     *
     * @throws PhpSpreadsheetException
     *
     * @return $this
     */
    public function setRange($pRange)
    {
    }
    /**
     * Get all AutoFilter Columns.
     *
     * @return AutoFilter\Column[]
     */
    public function getColumns()
    {
    }
    /**
     * Validate that the specified column is in the AutoFilter range.
     *
     * @param string $column Column name (e.g. A)
     *
     * @throws PhpSpreadsheetException
     *
     * @return int The column offset within the autofilter range
     */
    public function testColumnInRange($column)
    {
    }
    /**
     * Get a specified AutoFilter Column Offset within the defined AutoFilter range.
     *
     * @param string $pColumn Column name (e.g. A)
     *
     * @throws PhpSpreadsheetException
     *
     * @return int The offset of the specified column within the autofilter range
     */
    public function getColumnOffset($pColumn)
    {
    }
    /**
     * Get a specified AutoFilter Column.
     *
     * @param string $pColumn Column name (e.g. A)
     *
     * @throws PhpSpreadsheetException
     *
     * @return AutoFilter\Column
     */
    public function getColumn($pColumn)
    {
    }
    /**
     * Get a specified AutoFilter Column by it's offset.
     *
     * @param int $pColumnOffset Column offset within range (starting from 0)
     *
     * @throws PhpSpreadsheetException
     *
     * @return AutoFilter\Column
     */
    public function getColumnByOffset($pColumnOffset)
    {
    }
    /**
     * Set AutoFilter.
     *
     * @param AutoFilter\Column|string $pColumn
     *            A simple string containing a Column ID like 'A' is permitted
     *
     * @throws PhpSpreadsheetException
     *
     * @return $this
     */
    public function setColumn($pColumn)
    {
    }
    /**
     * Clear a specified AutoFilter Column.
     *
     * @param string $pColumn Column name (e.g. A)
     *
     * @throws PhpSpreadsheetException
     *
     * @return $this
     */
    public function clearColumn($pColumn)
    {
    }
    /**
     * Shift an AutoFilter Column Rule to a different column.
     *
     * Note: This method bypasses validation of the destination column to ensure it is within this AutoFilter range.
     *        Nor does it verify whether any column rule already exists at $toColumn, but will simply override any existing value.
     *        Use with caution.
     *
     * @param string $fromColumn Column name (e.g. A)
     * @param string $toColumn Column name (e.g. B)
     *
     * @return $this
     */
    public function shiftColumn($fromColumn, $toColumn)
    {
    }
    /**
     * Test if cell value is in the defined set of values.
     *
     * @param mixed $cellValue
     * @param mixed[] $dataSet
     *
     * @return bool
     */
    private static function filterTestInSimpleDataSet($cellValue, $dataSet)
    {
    }
    /**
     * Test if cell value is in the defined set of Excel date values.
     *
     * @param mixed $cellValue
     * @param mixed[] $dataSet
     *
     * @return bool
     */
    private static function filterTestInDateGroupSet($cellValue, $dataSet)
    {
    }
    /**
     * Test if cell value is within a set of values defined by a ruleset.
     *
     * @param mixed $cellValue
     * @param mixed[] $ruleSet
     *
     * @return bool
     */
    private static function filterTestInCustomDataSet($cellValue, $ruleSet)
    {
    }
    /**
     * Test if cell date value is matches a set of values defined by a set of months.
     *
     * @param mixed $cellValue
     * @param mixed[] $monthSet
     *
     * @return bool
     */
    private static function filterTestInPeriodDateSet($cellValue, $monthSet)
    {
    }
    /**
     * Search/Replace arrays to convert Excel wildcard syntax to a regexp syntax for preg_matching.
     *
     * @var array
     */
    private static $fromReplace = ['\\*', '\\?', '~~', '~.*', '~.?'];
    private static $toReplace = ['.*', '.', '~', '\\*', '\\?'];
    /**
     * Convert a dynamic rule daterange to a custom filter range expression for ease of calculation.
     *
     * @param string $dynamicRuleType
     * @param AutoFilter\Column $filterColumn
     *
     * @return mixed[]
     */
    private function dynamicFilterDateRange($dynamicRuleType, &$filterColumn)
    {
    }
    private function calculateTopTenValue($columnID, $startRow, $endRow, $ruleType, $ruleValue)
    {
    }
    /**
     * Apply the AutoFilter rules to the AutoFilter Range.
     *
     * @throws PhpSpreadsheetException
     *
     * @return $this
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
     * referenced as a property of its parent.
     */
    public function __toString()
    {
    }
}