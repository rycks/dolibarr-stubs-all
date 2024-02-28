<?php

namespace PhpOffice\PhpSpreadsheet\Style;

class Fill extends \PhpOffice\PhpSpreadsheet\Style\Supervisor
{
    // Fill types
    const FILL_NONE = 'none';
    const FILL_SOLID = 'solid';
    const FILL_GRADIENT_LINEAR = 'linear';
    const FILL_GRADIENT_PATH = 'path';
    const FILL_PATTERN_DARKDOWN = 'darkDown';
    const FILL_PATTERN_DARKGRAY = 'darkGray';
    const FILL_PATTERN_DARKGRID = 'darkGrid';
    const FILL_PATTERN_DARKHORIZONTAL = 'darkHorizontal';
    const FILL_PATTERN_DARKTRELLIS = 'darkTrellis';
    const FILL_PATTERN_DARKUP = 'darkUp';
    const FILL_PATTERN_DARKVERTICAL = 'darkVertical';
    const FILL_PATTERN_GRAY0625 = 'gray0625';
    const FILL_PATTERN_GRAY125 = 'gray125';
    const FILL_PATTERN_LIGHTDOWN = 'lightDown';
    const FILL_PATTERN_LIGHTGRAY = 'lightGray';
    const FILL_PATTERN_LIGHTGRID = 'lightGrid';
    const FILL_PATTERN_LIGHTHORIZONTAL = 'lightHorizontal';
    const FILL_PATTERN_LIGHTTRELLIS = 'lightTrellis';
    const FILL_PATTERN_LIGHTUP = 'lightUp';
    const FILL_PATTERN_LIGHTVERTICAL = 'lightVertical';
    const FILL_PATTERN_MEDIUMGRAY = 'mediumGray';
    /**
     * @var int
     */
    public $startcolorIndex;
    /**
     * @var int
     */
    public $endcolorIndex;
    /**
     * Fill type.
     *
     * @var string
     */
    protected $fillType = self::FILL_NONE;
    /**
     * Rotation.
     *
     * @var float
     */
    protected $rotation = 0;
    /**
     * Start color.
     *
     * @var Color
     */
    protected $startColor;
    /**
     * End color.
     *
     * @var Color
     */
    protected $endColor;
    /**
     * Create a new Fill.
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
     * @return Fill
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
     * $spreadsheet->getActiveSheet()->getStyle('B2')->getFill()->applyFromArray(
     *     [
     *         'fillType' => Fill::FILL_GRADIENT_LINEAR,
     *         'rotation' => 0,
     *         'startColor' => [
     *             'rgb' => '000000'
     *         ],
     *         'endColor' => [
     *             'argb' => 'FFFFFFFF'
     *         ]
     *     ]
     * );
     * </code>
     *
     * @param array $pStyles Array containing style information
     *
     * @throws PhpSpreadsheetException
     *
     * @return Fill
     */
    public function applyFromArray(array $pStyles)
    {
    }
    /**
     * Get Fill Type.
     *
     * @return string
     */
    public function getFillType()
    {
    }
    /**
     * Set Fill Type.
     *
     * @param string $pValue Fill type, see self::FILL_*
     *
     * @return Fill
     */
    public function setFillType($pValue)
    {
    }
    /**
     * Get Rotation.
     *
     * @return float
     */
    public function getRotation()
    {
    }
    /**
     * Set Rotation.
     *
     * @param float $pValue
     *
     * @return Fill
     */
    public function setRotation($pValue)
    {
    }
    /**
     * Get Start Color.
     *
     * @return Color
     */
    public function getStartColor()
    {
    }
    /**
     * Set Start Color.
     *
     * @param Color $pValue
     *
     * @throws PhpSpreadsheetException
     *
     * @return Fill
     */
    public function setStartColor(\PhpOffice\PhpSpreadsheet\Style\Color $pValue)
    {
    }
    /**
     * Get End Color.
     *
     * @return Color
     */
    public function getEndColor()
    {
    }
    /**
     * Set End Color.
     *
     * @param Color $pValue
     *
     * @throws PhpSpreadsheetException
     *
     * @return Fill
     */
    public function setEndColor(\PhpOffice\PhpSpreadsheet\Style\Color $pValue)
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