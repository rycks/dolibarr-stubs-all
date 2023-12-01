<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

abstract class CellIterator implements \Iterator
{
    /**
     * Worksheet to iterate.
     *
     * @var Worksheet
     */
    protected $worksheet;
    /**
     * Iterate only existing cells.
     *
     * @var bool
     */
    protected $onlyExistingCells = false;
    /**
     * Destructor.
     */
    public function __destruct()
    {
    }
    /**
     * Get loop only existing cells.
     *
     * @return bool
     */
    public function getIterateOnlyExistingCells()
    {
    }
    /**
     * Validate start/end values for "IterateOnlyExistingCells" mode, and adjust if necessary.
     *
     * @throws PhpSpreadsheetException
     */
    protected abstract function adjustForExistingOnlyRange();
    /**
     * Set the iterator to loop only existing cells.
     *
     * @param bool $value
     *
     * @throws PhpSpreadsheetException
     */
    public function setIterateOnlyExistingCells($value)
    {
    }
}