<?php

namespace PhpOffice\PhpSpreadsheet\Style;

class Border extends \PhpOffice\PhpSpreadsheet\Style\Supervisor
{
    // Border style
    const BORDER_NONE = 'none';
    const BORDER_DASHDOT = 'dashDot';
    const BORDER_DASHDOTDOT = 'dashDotDot';
    const BORDER_DASHED = 'dashed';
    const BORDER_DOTTED = 'dotted';
    const BORDER_DOUBLE = 'double';
    const BORDER_HAIR = 'hair';
    const BORDER_MEDIUM = 'medium';
    const BORDER_MEDIUMDASHDOT = 'mediumDashDot';
    const BORDER_MEDIUMDASHDOTDOT = 'mediumDashDotDot';
    const BORDER_MEDIUMDASHED = 'mediumDashed';
    const BORDER_SLANTDASHDOT = 'slantDashDot';
    const BORDER_THICK = 'thick';
    const BORDER_THIN = 'thin';
    /**
     * Border style.
     *
     * @var string
     */
    protected $borderStyle = self::BORDER_NONE;
    /**
     * Border color.
     *
     * @var Color
     */
    protected $color;
    /**
     * @var int
     */
    public $colorIndex;
    /**
     * Create a new Border.
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
     * @throws PhpSpreadsheetException
     *
     * @return Border
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
     * $spreadsheet->getActiveSheet()->getStyle('B2')->getBorders()->getTop()->applyFromArray(
     *        [
     *            'borderStyle' => Border::BORDER_DASHDOT,
     *            'color' => [
     *                'rgb' => '808080'
     *            ]
     *        ]
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
     * Get Border style.
     *
     * @return string
     */
    public function getBorderStyle()
    {
    }
    /**
     * Set Border style.
     *
     * @param bool|string $pValue
     *                            When passing a boolean, FALSE equates Border::BORDER_NONE
     *                                and TRUE to Border::BORDER_MEDIUM
     *
     * @return $this
     */
    public function setBorderStyle($pValue)
    {
    }
    /**
     * Get Border Color.
     *
     * @return Color
     */
    public function getColor()
    {
    }
    /**
     * Set Border Color.
     *
     * @param Color $pValue
     *
     * @throws PhpSpreadsheetException
     *
     * @return $this
     */
    public function setColor(\PhpOffice\PhpSpreadsheet\Style\Color $pValue)
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