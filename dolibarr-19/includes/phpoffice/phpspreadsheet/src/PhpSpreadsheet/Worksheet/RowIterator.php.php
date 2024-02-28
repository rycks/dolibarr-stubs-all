<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class RowIterator implements \Iterator
{
    /**
     * Worksheet to iterate.
     *
     * @var Worksheet
     */
    private $subject;
    /**
     * Current iterator position.
     *
     * @var int
     */
    private $position = 1;
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
     * @param int $startRow The row number at which to start iterating
     * @param int $endRow Optionally, the row number at which to stop iterating
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $subject, $startRow = 1, $endRow = null)
    {
    }
    /**
     * Destructor.
     */
    public function __destruct()
    {
    }
    /**
     * (Re)Set the start row and the current row pointer.
     *
     * @param int $startRow The row number at which to start iterating
     *
     * @throws PhpSpreadsheetException
     *
     * @return $this
     */
    public function resetStart($startRow = 1)
    {
    }
    /**
     * (Re)Set the end row.
     *
     * @param int $endRow The row number at which to stop iterating
     *
     * @return $this
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
     * @return $this
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
     * Return the current row in this worksheet.
     *
     * @return Row
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
}