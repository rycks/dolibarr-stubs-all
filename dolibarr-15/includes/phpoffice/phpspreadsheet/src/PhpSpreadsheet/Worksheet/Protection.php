<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class Protection
{
    /**
     * Sheet.
     *
     * @var bool
     */
    private $sheet = false;
    /**
     * Objects.
     *
     * @var bool
     */
    private $objects = false;
    /**
     * Scenarios.
     *
     * @var bool
     */
    private $scenarios = false;
    /**
     * Format cells.
     *
     * @var bool
     */
    private $formatCells = false;
    /**
     * Format columns.
     *
     * @var bool
     */
    private $formatColumns = false;
    /**
     * Format rows.
     *
     * @var bool
     */
    private $formatRows = false;
    /**
     * Insert columns.
     *
     * @var bool
     */
    private $insertColumns = false;
    /**
     * Insert rows.
     *
     * @var bool
     */
    private $insertRows = false;
    /**
     * Insert hyperlinks.
     *
     * @var bool
     */
    private $insertHyperlinks = false;
    /**
     * Delete columns.
     *
     * @var bool
     */
    private $deleteColumns = false;
    /**
     * Delete rows.
     *
     * @var bool
     */
    private $deleteRows = false;
    /**
     * Select locked cells.
     *
     * @var bool
     */
    private $selectLockedCells = false;
    /**
     * Sort.
     *
     * @var bool
     */
    private $sort = false;
    /**
     * AutoFilter.
     *
     * @var bool
     */
    private $autoFilter = false;
    /**
     * Pivot tables.
     *
     * @var bool
     */
    private $pivotTables = false;
    /**
     * Select unlocked cells.
     *
     * @var bool
     */
    private $selectUnlockedCells = false;
    /**
     * Password.
     *
     * @var string
     */
    private $password = '';
    /**
     * Create a new Protection.
     */
    public function __construct()
    {
    }
    /**
     * Is some sort of protection enabled?
     *
     * @return bool
     */
    public function isProtectionEnabled()
    {
    }
    /**
     * Get Sheet.
     *
     * @return bool
     */
    public function getSheet()
    {
    }
    /**
     * Set Sheet.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setSheet($pValue)
    {
    }
    /**
     * Get Objects.
     *
     * @return bool
     */
    public function getObjects()
    {
    }
    /**
     * Set Objects.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setObjects($pValue)
    {
    }
    /**
     * Get Scenarios.
     *
     * @return bool
     */
    public function getScenarios()
    {
    }
    /**
     * Set Scenarios.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setScenarios($pValue)
    {
    }
    /**
     * Get FormatCells.
     *
     * @return bool
     */
    public function getFormatCells()
    {
    }
    /**
     * Set FormatCells.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setFormatCells($pValue)
    {
    }
    /**
     * Get FormatColumns.
     *
     * @return bool
     */
    public function getFormatColumns()
    {
    }
    /**
     * Set FormatColumns.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setFormatColumns($pValue)
    {
    }
    /**
     * Get FormatRows.
     *
     * @return bool
     */
    public function getFormatRows()
    {
    }
    /**
     * Set FormatRows.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setFormatRows($pValue)
    {
    }
    /**
     * Get InsertColumns.
     *
     * @return bool
     */
    public function getInsertColumns()
    {
    }
    /**
     * Set InsertColumns.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setInsertColumns($pValue)
    {
    }
    /**
     * Get InsertRows.
     *
     * @return bool
     */
    public function getInsertRows()
    {
    }
    /**
     * Set InsertRows.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setInsertRows($pValue)
    {
    }
    /**
     * Get InsertHyperlinks.
     *
     * @return bool
     */
    public function getInsertHyperlinks()
    {
    }
    /**
     * Set InsertHyperlinks.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setInsertHyperlinks($pValue)
    {
    }
    /**
     * Get DeleteColumns.
     *
     * @return bool
     */
    public function getDeleteColumns()
    {
    }
    /**
     * Set DeleteColumns.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setDeleteColumns($pValue)
    {
    }
    /**
     * Get DeleteRows.
     *
     * @return bool
     */
    public function getDeleteRows()
    {
    }
    /**
     * Set DeleteRows.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setDeleteRows($pValue)
    {
    }
    /**
     * Get SelectLockedCells.
     *
     * @return bool
     */
    public function getSelectLockedCells()
    {
    }
    /**
     * Set SelectLockedCells.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setSelectLockedCells($pValue)
    {
    }
    /**
     * Get Sort.
     *
     * @return bool
     */
    public function getSort()
    {
    }
    /**
     * Set Sort.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setSort($pValue)
    {
    }
    /**
     * Get AutoFilter.
     *
     * @return bool
     */
    public function getAutoFilter()
    {
    }
    /**
     * Set AutoFilter.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setAutoFilter($pValue)
    {
    }
    /**
     * Get PivotTables.
     *
     * @return bool
     */
    public function getPivotTables()
    {
    }
    /**
     * Set PivotTables.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setPivotTables($pValue)
    {
    }
    /**
     * Get SelectUnlockedCells.
     *
     * @return bool
     */
    public function getSelectUnlockedCells()
    {
    }
    /**
     * Set SelectUnlockedCells.
     *
     * @param bool $pValue
     *
     * @return Protection
     */
    public function setSelectUnlockedCells($pValue)
    {
    }
    /**
     * Get Password (hashed).
     *
     * @return string
     */
    public function getPassword()
    {
    }
    /**
     * Set Password.
     *
     * @param string $pValue
     * @param bool $pAlreadyHashed If the password has already been hashed, set this to true
     *
     * @return Protection
     */
    public function setPassword($pValue, $pAlreadyHashed = false)
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}