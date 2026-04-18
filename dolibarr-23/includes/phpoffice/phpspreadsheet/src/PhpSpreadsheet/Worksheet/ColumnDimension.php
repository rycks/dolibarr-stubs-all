<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class ColumnDimension extends \PhpOffice\PhpSpreadsheet\Worksheet\Dimension
{
    /**
     * Column index.
     *
     * @var string
     */
    private $columnIndex;
    /**
     * Column width.
     *
     * When this is set to a negative value, the column width should be ignored by IWriter
     *
     * @var float
     */
    private $width = -1;
    /**
     * Auto size?
     *
     * @var bool
     */
    private $autoSize = false;
    /**
     * Create a new ColumnDimension.
     *
     * @param string $pIndex Character column index
     */
    public function __construct($pIndex = 'A')
    {
    }
    /**
     * Get column index as string eg: 'A'.
     *
     * @return string
     */
    public function getColumnIndex()
    {
    }
    /**
     * Set column index as string eg: 'A'.
     *
     * @param string $pValue
     *
     * @return $this
     */
    public function setColumnIndex($pValue)
    {
    }
    /**
     * Get Width.
     *
     * @return float
     */
    public function getWidth()
    {
    }
    /**
     * Set Width.
     *
     * @param float $pValue
     *
     * @return $this
     */
    public function setWidth($pValue)
    {
    }
    /**
     * Get Auto Size.
     *
     * @return bool
     */
    public function getAutoSize()
    {
    }
    /**
     * Set Auto Size.
     *
     * @param bool $pValue
     *
     * @return $this
     */
    public function setAutoSize($pValue)
    {
    }
}