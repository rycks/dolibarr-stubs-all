<?php

namespace PhpOffice\PhpSpreadsheet\Style;

class Font extends \PhpOffice\PhpSpreadsheet\Style\Supervisor
{
    // Underline types
    const UNDERLINE_NONE = 'none';
    const UNDERLINE_DOUBLE = 'double';
    const UNDERLINE_DOUBLEACCOUNTING = 'doubleAccounting';
    const UNDERLINE_SINGLE = 'single';
    const UNDERLINE_SINGLEACCOUNTING = 'singleAccounting';
    /**
     * Font Name.
     *
     * @var string
     */
    protected $name = 'Calibri';
    /**
     * Font Size.
     *
     * @var float
     */
    protected $size = 11;
    /**
     * Bold.
     *
     * @var bool
     */
    protected $bold = false;
    /**
     * Italic.
     *
     * @var bool
     */
    protected $italic = false;
    /**
     * Superscript.
     *
     * @var bool
     */
    protected $superscript = false;
    /**
     * Subscript.
     *
     * @var bool
     */
    protected $subscript = false;
    /**
     * Underline.
     *
     * @var string
     */
    protected $underline = self::UNDERLINE_NONE;
    /**
     * Strikethrough.
     *
     * @var bool
     */
    protected $strikethrough = false;
    /**
     * Foreground color.
     *
     * @var Color
     */
    protected $color;
    /**
     * @var int
     */
    public $colorIndex;
    /**
     * Create a new Font.
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
     * @return Font
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
     * $spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->applyFromArray(
     *     [
     *         'name' => 'Arial',
     *         'bold' => TRUE,
     *         'italic' => FALSE,
     *         'underline' => \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_DOUBLE,
     *         'strikethrough' => FALSE,
     *         'color' => [
     *             'rgb' => '808080'
     *         ]
     *     ]
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
     * Get Name.
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Set Name.
     *
     * @param string $pValue
     *
     * @return $this
     */
    public function setName($pValue)
    {
    }
    /**
     * Get Size.
     *
     * @return float
     */
    public function getSize()
    {
    }
    /**
     * Set Size.
     *
     * @param float $pValue
     *
     * @return $this
     */
    public function setSize($pValue)
    {
    }
    /**
     * Get Bold.
     *
     * @return bool
     */
    public function getBold()
    {
    }
    /**
     * Set Bold.
     *
     * @param bool $pValue
     *
     * @return $this
     */
    public function setBold($pValue)
    {
    }
    /**
     * Get Italic.
     *
     * @return bool
     */
    public function getItalic()
    {
    }
    /**
     * Set Italic.
     *
     * @param bool $pValue
     *
     * @return $this
     */
    public function setItalic($pValue)
    {
    }
    /**
     * Get Superscript.
     *
     * @return bool
     */
    public function getSuperscript()
    {
    }
    /**
     * Set Superscript.
     *
     * @param bool $pValue
     *
     * @return $this
     */
    public function setSuperscript($pValue)
    {
    }
    /**
     * Get Subscript.
     *
     * @return bool
     */
    public function getSubscript()
    {
    }
    /**
     * Set Subscript.
     *
     * @param bool $pValue
     *
     * @return $this
     */
    public function setSubscript($pValue)
    {
    }
    /**
     * Get Underline.
     *
     * @return string
     */
    public function getUnderline()
    {
    }
    /**
     * Set Underline.
     *
     * @param bool|string $pValue \PhpOffice\PhpSpreadsheet\Style\Font underline type
     *                                    If a boolean is passed, then TRUE equates to UNDERLINE_SINGLE,
     *                                        false equates to UNDERLINE_NONE
     *
     * @return $this
     */
    public function setUnderline($pValue)
    {
    }
    /**
     * Get Strikethrough.
     *
     * @return bool
     */
    public function getStrikethrough()
    {
    }
    /**
     * Set Strikethrough.
     *
     * @param bool $pValue
     *
     * @return $this
     */
    public function setStrikethrough($pValue)
    {
    }
    /**
     * Get Color.
     *
     * @return Color
     */
    public function getColor()
    {
    }
    /**
     * Set Color.
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