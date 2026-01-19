<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class Iterator implements \Iterator
{
    /**
     * Spreadsheet to iterate.
     *
     * @var Spreadsheet
     */
    private $subject;
    /**
     * Current iterator position.
     *
     * @var int
     */
    private $position = 0;
    /**
     * Create a new worksheet iterator.
     *
     * @param Spreadsheet $subject
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Spreadsheet $subject)
    {
    }
    /**
     * Destructor.
     */
    public function __destruct()
    {
    }
    /**
     * Rewind iterator.
     */
    public function rewind()
    {
    }
    /**
     * Current Worksheet.
     *
     * @return Worksheet
     */
    public function current()
    {
    }
    /**
     * Current key.
     *
     * @return int
     */
    public function key()
    {
    }
    /**
     * Next value.
     */
    public function next()
    {
    }
    /**
     * Are there more Worksheet instances available?
     *
     * @return bool
     */
    public function valid()
    {
    }
}