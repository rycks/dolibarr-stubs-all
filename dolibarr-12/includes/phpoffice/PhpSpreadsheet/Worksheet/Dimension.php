<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

abstract class Dimension
{
    /**
     * Visible?
     *
     * @var bool
     */
    private $visible = true;
    /**
     * Outline level.
     *
     * @var int
     */
    private $outlineLevel = 0;
    /**
     * Collapsed.
     *
     * @var bool
     */
    private $collapsed = false;
    /**
     * Index to cellXf. Null value means row has no explicit cellXf format.
     *
     * @var null|int
     */
    private $xfIndex;
    /**
     * Create a new Dimension.
     *
     * @param int $initialValue Numeric row index
     */
    public function __construct($initialValue = null)
    {
    }
    /**
     * Get Visible.
     *
     * @return bool
     */
    public function getVisible()
    {
    }
    /**
     * Set Visible.
     *
     * @param bool $pValue
     *
     * @return Dimension
     */
    public function setVisible($pValue)
    {
    }
    /**
     * Get Outline Level.
     *
     * @return int
     */
    public function getOutlineLevel()
    {
    }
    /**
     * Set Outline Level.
     * Value must be between 0 and 7.
     *
     * @param int $pValue
     *
     * @throws PhpSpreadsheetException
     *
     * @return Dimension
     */
    public function setOutlineLevel($pValue)
    {
    }
    /**
     * Get Collapsed.
     *
     * @return bool
     */
    public function getCollapsed()
    {
    }
    /**
     * Set Collapsed.
     *
     * @param bool $pValue
     *
     * @return Dimension
     */
    public function setCollapsed($pValue)
    {
    }
    /**
     * Get index to cellXf.
     *
     * @return int
     */
    public function getXfIndex()
    {
    }
    /**
     * Set index to cellXf.
     *
     * @param int $pValue
     *
     * @return Dimension
     */
    public function setXfIndex($pValue)
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}