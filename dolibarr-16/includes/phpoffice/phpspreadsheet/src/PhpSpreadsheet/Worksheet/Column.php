<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class Column
{
    /**
     * \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet.
     *
     * @var Worksheet
     */
    private $parent;
    /**
     * Column index.
     *
     * @var string
     */
    private $columnIndex;
    /**
     * Create a new column.
     *
     * @param Worksheet $parent
     * @param string $columnIndex
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $parent = null, $columnIndex = 'A')
    {
    }
    /**
     * Destructor.
     */
    public function __destruct()
    {
    }
    /**
     * Get column index.
     *
     * @return string
     */
    public function getColumnIndex()
    {
    }
    /**
     * Get cell iterator.
     *
     * @param int $startRow The row number at which to start iterating
     * @param int $endRow Optionally, the row number at which to stop iterating
     *
     * @return ColumnCellIterator
     */
    public function getCellIterator($startRow = 1, $endRow = null)
    {
    }
}