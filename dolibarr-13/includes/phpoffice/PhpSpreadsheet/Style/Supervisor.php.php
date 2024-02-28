<?php

namespace PhpOffice\PhpSpreadsheet\Style;

abstract class Supervisor implements \PhpOffice\PhpSpreadsheet\IComparable
{
    /**
     * Supervisor?
     *
     * @var bool
     */
    protected $isSupervisor;
    /**
     * Parent. Only used for supervisor.
     *
     * @var Spreadsheet|Style
     */
    protected $parent;
    /**
     * Parent property name.
     *
     * @var null|string
     */
    protected $parentPropertyName;
    /**
     * Create a new Supervisor.
     *
     * @param bool $isSupervisor Flag indicating if this is a supervisor or not
     *                                    Leave this value at default unless you understand exactly what
     *                                        its ramifications are
     */
    public function __construct($isSupervisor = false)
    {
    }
    /**
     * Bind parent. Only used for supervisor.
     *
     * @param Spreadsheet|Style $parent
     * @param null|string $parentPropertyName
     *
     * @return Supervisor
     */
    public function bindParent($parent, $parentPropertyName = null)
    {
    }
    /**
     * Is this a supervisor or a cell style component?
     *
     * @return bool
     */
    public function getIsSupervisor()
    {
    }
    /**
     * Get the currently active sheet. Only used for supervisor.
     *
     * @return Worksheet
     */
    public function getActiveSheet()
    {
    }
    /**
     * Get the currently active cell coordinate in currently active sheet.
     * Only used for supervisor.
     *
     * @return string E.g. 'A1'
     */
    public function getSelectedCells()
    {
    }
    /**
     * Get the currently active cell coordinate in currently active sheet.
     * Only used for supervisor.
     *
     * @return string E.g. 'A1'
     */
    public function getActiveCell()
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}