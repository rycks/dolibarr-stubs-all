<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class RowDimension extends \PhpOffice\PhpSpreadsheet\Worksheet\Dimension
{
    /**
     * Row index.
     *
     * @var int
     */
    private $rowIndex;
    /**
     * Row height (in pt).
     *
     * When this is set to a negative value, the row height should be ignored by IWriter
     *
     * @var float
     */
    private $height = -1;
    /**
     * ZeroHeight for Row?
     *
     * @var bool
     */
    private $zeroHeight = false;
    /**
     * Create a new RowDimension.
     *
     * @param int $pIndex Numeric row index
     */
    public function __construct($pIndex = 0)
    {
    }
    /**
     * Get Row Index.
     *
     * @return int
     */
    public function getRowIndex()
    {
    }
    /**
     * Set Row Index.
     *
     * @param int $pValue
     *
     * @return $this
     */
    public function setRowIndex($pValue)
    {
    }
    /**
     * Get Row Height.
     *
     * @return float
     */
    public function getRowHeight()
    {
    }
    /**
     * Set Row Height.
     *
     * @param float $pValue
     *
     * @return $this
     */
    public function setRowHeight($pValue)
    {
    }
    /**
     * Get ZeroHeight.
     *
     * @return bool
     */
    public function getZeroHeight()
    {
    }
    /**
     * Set ZeroHeight.
     *
     * @param bool $pValue
     *
     * @return $this
     */
    public function setZeroHeight($pValue)
    {
    }
}