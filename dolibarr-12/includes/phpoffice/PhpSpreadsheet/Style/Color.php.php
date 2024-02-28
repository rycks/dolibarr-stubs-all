<?php

namespace PhpOffice\PhpSpreadsheet\Style;

class Color extends \PhpOffice\PhpSpreadsheet\Style\Supervisor
{
    // Colors
    const COLOR_BLACK = 'FF000000';
    const COLOR_WHITE = 'FFFFFFFF';
    const COLOR_RED = 'FFFF0000';
    const COLOR_DARKRED = 'FF800000';
    const COLOR_BLUE = 'FF0000FF';
    const COLOR_DARKBLUE = 'FF000080';
    const COLOR_GREEN = 'FF00FF00';
    const COLOR_DARKGREEN = 'FF008000';
    const COLOR_YELLOW = 'FFFFFF00';
    const COLOR_DARKYELLOW = 'FF808000';
    /**
     * Indexed colors array.
     *
     * @var array
     */
    protected static $indexedColors;
    /**
     * ARGB - Alpha RGB.
     *
     * @var string
     */
    protected $argb;
    /**
     * Create a new Color.
     *
     * @param string $pARGB ARGB value for the colour
     * @param bool $isSupervisor Flag indicating if this is a supervisor or not
     *                                    Leave this value at default unless you understand exactly what
     *                                        its ramifications are
     * @param bool $isConditional Flag indicating if this is a conditional style or not
     *                                    Leave this value at default unless you understand exactly what
     *                                        its ramifications are
     */
    public function __construct($pARGB = self::COLOR_BLACK, $isSupervisor = false, $isConditional = false)
    {
    }
    /**
     * Get the shared style component for the currently active cell in currently active sheet.
     * Only used for style supervisor.
     *
     * @return Color
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
     * $spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->getColor()->applyFromArray(['rgb' => '808080']);
     * </code>
     *
     * @param array $pStyles Array containing style information
     *
     * @throws PhpSpreadsheetException
     *
     * @return Color
     */
    public function applyFromArray(array $pStyles)
    {
    }
    /**
     * Get ARGB.
     *
     * @return string
     */
    public function getARGB()
    {
    }
    /**
     * Set ARGB.
     *
     * @param string $pValue see self::COLOR_*
     *
     * @return Color
     */
    public function setARGB($pValue)
    {
    }
    /**
     * Get RGB.
     *
     * @return string
     */
    public function getRGB()
    {
    }
    /**
     * Set RGB.
     *
     * @param string $pValue RGB value
     *
     * @return Color
     */
    public function setRGB($pValue)
    {
    }
    /**
     * Get a specified colour component of an RGB value.
     *
     * @param string $RGB The colour as an RGB value (e.g. FF00CCCC or CCDDEE
     * @param int $offset Position within the RGB value to extract
     * @param bool $hex Flag indicating whether the component should be returned as a hex or a
     *                                    decimal value
     *
     * @return string The extracted colour component
     */
    private static function getColourComponent($RGB, $offset, $hex = true)
    {
    }
    /**
     * Get the red colour component of an RGB value.
     *
     * @param string $RGB The colour as an RGB value (e.g. FF00CCCC or CCDDEE
     * @param bool $hex Flag indicating whether the component should be returned as a hex or a
     *                                    decimal value
     *
     * @return string The red colour component
     */
    public static function getRed($RGB, $hex = true)
    {
    }
    /**
     * Get the green colour component of an RGB value.
     *
     * @param string $RGB The colour as an RGB value (e.g. FF00CCCC or CCDDEE
     * @param bool $hex Flag indicating whether the component should be returned as a hex or a
     *                                    decimal value
     *
     * @return string The green colour component
     */
    public static function getGreen($RGB, $hex = true)
    {
    }
    /**
     * Get the blue colour component of an RGB value.
     *
     * @param string $RGB The colour as an RGB value (e.g. FF00CCCC or CCDDEE
     * @param bool $hex Flag indicating whether the component should be returned as a hex or a
     *                                    decimal value
     *
     * @return string The blue colour component
     */
    public static function getBlue($RGB, $hex = true)
    {
    }
    /**
     * Adjust the brightness of a color.
     *
     * @param string $hex The colour as an RGBA or RGB value (e.g. FF00CCCC or CCDDEE)
     * @param float $adjustPercentage The percentage by which to adjust the colour as a float from -1 to 1
     *
     * @return string The adjusted colour as an RGBA or RGB value (e.g. FF00CCCC or CCDDEE)
     */
    public static function changeBrightness($hex, $adjustPercentage)
    {
    }
    /**
     * Get indexed color.
     *
     * @param int $pIndex Index entry point into the colour array
     * @param bool $background Flag to indicate whether default background or foreground colour
     *                                            should be returned if the indexed colour doesn't exist
     *
     * @return Color
     */
    public static function indexedColor($pIndex, $background = false)
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