<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class Row
{
    /**
     * \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet.
     *
     * @var Worksheet
     */
    private $worksheet;
    /**
     * Row index.
     *
     * @var int
     */
    private $rowIndex = 0;
    /**
     * Create a new row.
     *
     * @param Worksheet $worksheet
     * @param int $rowIndex
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $worksheet = null, $rowIndex = 1)
    {
    }
    /**
     * Destructor.
     */
    public function __destruct()
    {
    }
    /**
     * Get row index.
     *
     * @return int
     */
    public function getRowIndex()
    {
    }
    /**
     * Get cell iterator.
     *
     * @param string $startColumn The column address at which to start iterating
     * @param string $endColumn Optionally, the column address at which to stop iterating
     *
     * @return RowCellIterator
     */
    public function getCellIterator($startColumn = 'A', $endColumn = null)
    {
    }
    /**
     * Returns bound worksheet.
     *
     * @return Worksheet
     */
    public function getWorksheet()
    {
    }
}