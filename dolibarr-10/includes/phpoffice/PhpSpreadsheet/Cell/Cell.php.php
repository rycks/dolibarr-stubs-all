<?php

namespace PhpOffice\PhpSpreadsheet\Cell;

class Cell
{
    /**
     * Value binder to use.
     *
     * @var IValueBinder
     */
    private static $valueBinder;
    /**
     * Value of the cell.
     *
     * @var mixed
     */
    private $value;
    /**
     *    Calculated value of the cell (used for caching)
     *    This returns the value last calculated by MS Excel or whichever spreadsheet program was used to
     *        create the original spreadsheet file.
     *    Note that this value is not guaranteed to reflect the actual calculated value because it is
     *        possible that auto-calculation was disabled in the original spreadsheet, and underlying data
     *        values used by the formula have changed since it was last calculated.
     *
     * @var mixed
     */
    private $calculatedValue;
    /**
     * Type of the cell data.
     *
     * @var string
     */
    private $dataType;
    /**
     * Collection of cells.
     *
     * @var Cells
     */
    private $parent;
    /**
     * Index to cellXf.
     *
     * @var int
     */
    private $xfIndex = 0;
    /**
     * Attributes of the formula.
     */
    private $formulaAttributes;
    /**
     * Update the cell into the cell collection.
     *
     * @return self
     */
    public function updateInCollection()
    {
    }
    public function detach()
    {
    }
    public function attach(\PhpOffice\PhpSpreadsheet\Collection\Cells $parent)
    {
    }
    /**
     * Create a new Cell.
     *
     * @param mixed $pValue
     * @param string $pDataType
     * @param Worksheet $pSheet
     *
     * @throws Exception
     */
    public function __construct($pValue, $pDataType, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Get cell coordinate column.
     *
     * @return string
     */
    public function getColumn()
    {
    }
    /**
     * Get cell coordinate row.
     *
     * @return int
     */
    public function getRow()
    {
    }
    /**
     * Get cell coordinate.
     *
     * @return string
     */
    public function getCoordinate()
    {
    }
    /**
     * Get cell value.
     *
     * @return mixed
     */
    public function getValue()
    {
    }
    /**
     * Get cell value with formatting.
     *
     * @return string
     */
    public function getFormattedValue()
    {
    }
    /**
     * Set cell value.
     *
     *    Sets the value for a cell, automatically determining the datatype using the value binder
     *
     * @param mixed $pValue Value
     *
     * @throws Exception
     *
     * @return Cell
     */
    public function setValue($pValue)
    {
    }
    /**
     * Set the value for a cell, with the explicit data type passed to the method (bypassing any use of the value binder).
     *
     * @param mixed $pValue Value
     * @param string $pDataType Explicit data type, see DataType::TYPE_*
     *
     * @throws Exception
     *
     * @return Cell
     */
    public function setValueExplicit($pValue, $pDataType)
    {
    }
    /**
     * Get calculated cell value.
     *
     * @param bool $resetLog Whether the calculation engine logger should be reset or not
     *
     * @throws Exception
     *
     * @return mixed
     */
    public function getCalculatedValue($resetLog = true)
    {
    }
    /**
     * Set old calculated value (cached).
     *
     * @param mixed $pValue Value
     *
     * @return Cell
     */
    public function setCalculatedValue($pValue)
    {
    }
    /**
     *    Get old calculated value (cached)
     *    This returns the value last calculated by MS Excel or whichever spreadsheet program was used to
     *        create the original spreadsheet file.
     *    Note that this value is not guaranteed to reflect the actual calculated value because it is
     *        possible that auto-calculation was disabled in the original spreadsheet, and underlying data
     *        values used by the formula have changed since it was last calculated.
     *
     * @return mixed
     */
    public function getOldCalculatedValue()
    {
    }
    /**
     * Get cell data type.
     *
     * @return string
     */
    public function getDataType()
    {
    }
    /**
     * Set cell data type.
     *
     * @param string $pDataType see DataType::TYPE_*
     *
     * @return Cell
     */
    public function setDataType($pDataType)
    {
    }
    /**
     * Identify if the cell contains a formula.
     *
     * @return bool
     */
    public function isFormula()
    {
    }
    /**
     *    Does this cell contain Data validation rules?
     *
     * @throws Exception
     *
     * @return bool
     */
    public function hasDataValidation()
    {
    }
    /**
     * Get Data validation rules.
     *
     * @throws Exception
     *
     * @return DataValidation
     */
    public function getDataValidation()
    {
    }
    /**
     * Set Data validation rules.
     *
     * @param DataValidation $pDataValidation
     *
     * @throws Exception
     *
     * @return Cell
     */
    public function setDataValidation(\PhpOffice\PhpSpreadsheet\Cell\DataValidation $pDataValidation = null)
    {
    }
    /**
     * Does this cell contain valid value?
     *
     * @return bool
     */
    public function hasValidValue()
    {
    }
    /**
     * Does this cell contain a Hyperlink?
     *
     * @throws Exception
     *
     * @return bool
     */
    public function hasHyperlink()
    {
    }
    /**
     * Get Hyperlink.
     *
     * @throws Exception
     *
     * @return Hyperlink
     */
    public function getHyperlink()
    {
    }
    /**
     * Set Hyperlink.
     *
     * @param Hyperlink $pHyperlink
     *
     * @throws Exception
     *
     * @return Cell
     */
    public function setHyperlink(\PhpOffice\PhpSpreadsheet\Cell\Hyperlink $pHyperlink = null)
    {
    }
    /**
     * Get cell collection.
     *
     * @return Cells
     */
    public function getParent()
    {
    }
    /**
     * Get parent worksheet.
     *
     * @return Worksheet
     */
    public function getWorksheet()
    {
    }
    /**
     * Is this cell in a merge range.
     *
     * @return bool
     */
    public function isInMergeRange()
    {
    }
    /**
     * Is this cell the master (top left cell) in a merge range (that holds the actual data value).
     *
     * @return bool
     */
    public function isMergeRangeValueCell()
    {
    }
    /**
     * If this cell is in a merge range, then return the range.
     *
     * @return string
     */
    public function getMergeRange()
    {
    }
    /**
     * Get cell style.
     *
     * @return Style
     */
    public function getStyle()
    {
    }
    /**
     * Re-bind parent.
     *
     * @param Worksheet $parent
     *
     * @return Cell
     */
    public function rebindParent(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $parent)
    {
    }
    /**
     *    Is cell in a specific range?
     *
     * @param string $pRange Cell range (e.g. A1:A1)
     *
     * @return bool
     */
    public function isInRange($pRange)
    {
    }
    /**
     * Compare 2 cells.
     *
     * @param Cell $a Cell a
     * @param Cell $b Cell b
     *
     * @return int Result of comparison (always -1 or 1, never zero!)
     */
    public static function compareCells(self $a, self $b)
    {
    }
    /**
     * Get value binder to use.
     *
     * @return IValueBinder
     */
    public static function getValueBinder()
    {
    }
    /**
     * Set value binder to use.
     *
     * @param IValueBinder $binder
     */
    public static function setValueBinder(\PhpOffice\PhpSpreadsheet\Cell\IValueBinder $binder)
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
    /**
     * Get index to cellXf.
     *
     * @return int
     */
    public function getXfIndex()
    {
    }
    /**
     * Set index to cellXf.
     *
     * @param int $pValue
     *
     * @return Cell
     */
    public function setXfIndex($pValue)
    {
    }
    /**
     * Set the formula attributes.
     *
     * @param mixed $pAttributes
     *
     * @return Cell
     */
    public function setFormulaAttributes($pAttributes)
    {
    }
    /**
     * Get the formula attributes.
     */
    public function getFormulaAttributes()
    {
    }
    /**
     * Convert to string.
     *
     * @return string
     */
    public function __toString()
    {
    }
}