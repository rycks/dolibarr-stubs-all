<?php

namespace PhpOffice\PhpSpreadsheet\Style;

class Borders extends \PhpOffice\PhpSpreadsheet\Style\Supervisor
{
    // Diagonal directions
    const DIAGONAL_NONE = 0;
    const DIAGONAL_UP = 1;
    const DIAGONAL_DOWN = 2;
    const DIAGONAL_BOTH = 3;
    /**
     * Left.
     *
     * @var Border
     */
    protected $left;
    /**
     * Right.
     *
     * @var Border
     */
    protected $right;
    /**
     * Top.
     *
     * @var Border
     */
    protected $top;
    /**
     * Bottom.
     *
     * @var Border
     */
    protected $bottom;
    /**
     * Diagonal.
     *
     * @var Border
     */
    protected $diagonal;
    /**
     * DiagonalDirection.
     *
     * @var int
     */
    protected $diagonalDirection;
    /**
     * All borders pseudo-border. Only applies to supervisor.
     *
     * @var Border
     */
    protected $allBorders;
    /**
     * Outline pseudo-border. Only applies to supervisor.
     *
     * @var Border
     */
    protected $outline;
    /**
     * Inside pseudo-border. Only applies to supervisor.
     *
     * @var Border
     */
    protected $inside;
    /**
     * Vertical pseudo-border. Only applies to supervisor.
     *
     * @var Border
     */
    protected $vertical;
    /**
     * Horizontal pseudo-border. Only applies to supervisor.
     *
     * @var Border
     */
    protected $horizontal;
    /**
     * Create a new Borders.
     *
     * @param bool $isSupervisor Flag indicating if this is a supervisor or not
     *                                    Leave this value at default unless you understand exactly what
     *                                        its ramifications are
     * @param bool $isConditional Flag indicating if this is a conditional style or not
     *                                    Leave this value at default unless you understand exactly what
     *                                        its ramifications are
     */
    public function __construct($isSupervisor = false, $isConditional = false)
    {
    }
    /**
     * Get the shared style component for the currently active cell in currently active sheet.
     * Only used for style supervisor.
     *
     * @return Borders
     */
    public function getSharedComponent()
    {
    }
    /**
     * Build style array from subcomponents.
     *
     * @param array $array
     *
     * @return array
     */
    public function getStyleArray($array)
    {
    }
    /**
     * Apply styles from array.
     *
     * <code>
     * $spreadsheet->getActiveSheet()->getStyle('B2')->getBorders()->applyFromArray(
     *         [
     *             'bottom' => [
     *                 'borderStyle' => Border::BORDER_DASHDOT,
     *                 'color' => [
     *                     'rgb' => '808080'
     *                 ]
     *             ],
     *             'top' => [
     *                 'borderStyle' => Border::BORDER_DASHDOT,
     *                 'color' => [
     *                     'rgb' => '808080'
     *                 ]
     *             ]
     *         ]
     * );
     * </code>
     *
     * <code>
     * $spreadsheet->getActiveSheet()->getStyle('B2')->getBorders()->applyFromArray(
     *         [
     *             'allBorders' => [
     *                 'borderStyle' => Border::BORDER_DASHDOT,
     *                 'color' => [
     *                     'rgb' => '808080'
     *                 ]
     *             ]
     *         ]
     * );
     * </code>
     *
     * @param array $pStyles Array containing style information
     *
     * @throws PhpSpreadsheetException
     *
     * @return $this
     */
    public function applyFromArray(array $pStyles)
    {
    }
    /**
     * Get Left.
     *
     * @return Border
     */
    public function getLeft()
    {
    }
    /**
     * Get Right.
     *
     * @return Border
     */
    public function getRight()
    {
    }
    /**
     * Get Top.
     *
     * @return Border
     */
    public function getTop()
    {
    }
    /**
     * Get Bottom.
     *
     * @return Border
     */
    public function getBottom()
    {
    }
    /**
     * Get Diagonal.
     *
     * @return Border
     */
    public function getDiagonal()
    {
    }
    /**
     * Get AllBorders (pseudo-border). Only applies to supervisor.
     *
     * @throws PhpSpreadsheetException
     *
     * @return Border
     */
    public function getAllBorders()
    {
    }
    /**
     * Get Outline (pseudo-border). Only applies to supervisor.
     *
     * @throws PhpSpreadsheetException
     *
     * @return Border
     */
    public function getOutline()
    {
    }
    /**
     * Get Inside (pseudo-border). Only applies to supervisor.
     *
     * @throws PhpSpreadsheetException
     *
     * @return Border
     */
    public function getInside()
    {
    }
    /**
     * Get Vertical (pseudo-border). Only applies to supervisor.
     *
     * @throws PhpSpreadsheetException
     *
     * @return Border
     */
    public function getVertical()
    {
    }
    /**
     * Get Horizontal (pseudo-border). Only applies to supervisor.
     *
     * @throws PhpSpreadsheetException
     *
     * @return Border
     */
    public function getHorizontal()
    {
    }
    /**
     * Get DiagonalDirection.
     *
     * @return int
     */
    public function getDiagonalDirection()
    {
    }
    /**
     * Set DiagonalDirection.
     *
     * @param int $pValue see self::DIAGONAL_*
     *
     * @return $this
     */
    public function setDiagonalDirection($pValue)
    {
    }
    /**
     * Get hash code.
     *
     * @return string Hash code
     */
    public function getHashCode()
    {
    }
}