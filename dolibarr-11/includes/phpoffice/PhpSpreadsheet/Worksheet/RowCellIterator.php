<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class RowCellIterator extends \PhpOffice\PhpSpreadsheet\Worksheet\CellIterator
{
    /**
     * Current iterator position.
     *
     * @var int
     */
    private $currentColumnIndex;
    /**
     * Row index.
     *
     * @var int
     */
    private $rowIndex = 1;
    /**
     * Start position.
     *
     * @var int
     */
    private $startColumnIndex = 1;
    /**
     * End position.
     *
     * @var int
     */
    private $endColumnIndex = 1;
    /**
     * Create a new column iterator.
     *
     * @param Worksheet $worksheet The worksheet to iterate over
     * @param int $rowIndex The row that we want to iterate
     * @param string $startColumn The column address at which to start iterating
     * @param string $endColumn Optionally, the column address at which to stop iterating
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $worksheet = null, $rowIndex = 1, $startColumn = 'A', $endColumn = null)
    {
    }
    /**
     * (Re)Set the start column and the current column pointer.
     *
     * @param string $startColumn The column address at which to start iterating
     *
     * @throws PhpSpreadsheetException
     *
     * @return RowCellIterator
     */
    public function resetStart($startColumn = 'A')
    {
    }
    /**
     * (Re)Set the end column.
     *
     * @param string $endColumn The column address at which to stop iterating
     *
     * @throws PhpSpreadsheetException
     *
     * @return RowCellIterator
     */
    public function resetEnd($endColumn = null)
    {
    }
    /**
     * Set the column pointer to the selected column.
     *
     * @param string $column The column address to set the current pointer at
     *
     * @throws PhpSpreadsheetException
     *
     * @return RowCellIterator
     */
    public function seek($column = 'A')
    {
    }
    /**
     * Rewind the iterator to the starting column.
     */
    public function rewind()
    {
    }
    /**
     * Return the current cell in this worksheet row.
     *
     * @return \PhpOffice\PhpSpreadsheet\Cell\Cell
     */
    public function current()
    {
    }
    /**
     * Return the current iterator key.
     *
     * @return string
     */
    public function key()
    {
    }
    /**
     * Set the iterator to its next value.
     */
    public function next()
    {
    }
    /**
     * Set the iterator to its previous value.
     *
     * @throws PhpSpreadsheetException
     */
    public function prev()
    {
    }
    /**
     * Indicate if more columns exist in the worksheet range of columns that we're iterating.
     *
     * @return bool
     */
    public function valid()
    {
    }
    /**
     * Validate start/end values for "IterateOnlyExistingCells" mode, and adjust if necessary.
     *
     * @throws PhpSpreadsheetException
     */
    protected function adjustForExistingOnlyRange()
    {
    }
}