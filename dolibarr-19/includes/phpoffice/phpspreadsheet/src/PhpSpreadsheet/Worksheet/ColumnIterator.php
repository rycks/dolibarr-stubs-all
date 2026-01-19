<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class ColumnIterator implements \Iterator
{
    /**
     * Worksheet to iterate.
     *
     * @var Worksheet
     */
    private $worksheet;
    /**
     * Current iterator position.
     *
     * @var int
     */
    private $currentColumnIndex = 1;
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
     * @param string $startColumn The column address at which to start iterating
     * @param string $endColumn Optionally, the column address at which to stop iterating
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $worksheet, $startColumn = 'A', $endColumn = null)
    {
    }
    /**
     * Destructor.
     */
    public function __destruct()
    {
    }
    /**
     * (Re)Set the start column and the current column pointer.
     *
     * @param string $startColumn The column address at which to start iterating
     *
     * @throws Exception
     *
     * @return $this
     */
    public function resetStart($startColumn = 'A')
    {
    }
    /**
     * (Re)Set the end column.
     *
     * @param string $endColumn The column address at which to stop iterating
     *
     * @return $this
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
     * @return $this
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
     * Return the current column in this worksheet.
     *
     * @return Column
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
}