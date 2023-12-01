<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class ColumnCellIterator extends \PhpOffice\PhpSpreadsheet\Worksheet\CellIterator
{
    /**
     * Current iterator position.
     *
     * @var int
     */
    private $currentRow;
    /**
     * Column index.
     *
     * @var string
     */
    private $columnIndex;
    /**
     * Start position.
     *
     * @var int
     */
    private $startRow = 1;
    /**
     * End position.
     *
     * @var int
     */
    private $endRow = 1;
    /**
     * Create a new row iterator.
     *
     * @param Worksheet $subject The worksheet to iterate over
     * @param string $columnIndex The column that we want to iterate
     * @param int $startRow The row number at which to start iterating
     * @param int $endRow Optionally, the row number at which to stop iterating
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $subject = null, $columnIndex = 'A', $startRow = 1, $endRow = null)
    {
    }
    /**
     * (Re)Set the start row and the current row pointer.
     *
     * @param int $startRow The row number at which to start iterating
     *
     * @throws PhpSpreadsheetException
     *
     * @return ColumnCellIterator
     */
    public function resetStart($startRow = 1)
    {
    }
    /**
     * (Re)Set the end row.
     *
     * @param int $endRow The row number at which to stop iterating
     *
     * @throws PhpSpreadsheetException
     *
     * @return ColumnCellIterator
     */
    public function resetEnd($endRow = null)
    {
    }
    /**
     * Set the row pointer to the selected row.
     *
     * @param int $row The row number to set the current pointer at
     *
     * @throws PhpSpreadsheetException
     *
     * @return ColumnCellIterator
     */
    public function seek($row = 1)
    {
    }
    /**
     * Rewind the iterator to the starting row.
     */
    public function rewind()
    {
    }
    /**
     * Return the current cell in this worksheet column.
     *
     * @return null|\PhpOffice\PhpSpreadsheet\Cell\Cell
     */
    public function current()
    {
    }
    /**
     * Return the current iterator key.
     *
     * @return int
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
     */
    public function prev()
    {
    }
    /**
     * Indicate if more rows exist in the worksheet range of rows that we're iterating.
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