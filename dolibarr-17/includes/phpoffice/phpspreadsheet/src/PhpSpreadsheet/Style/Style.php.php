<?php

namespace PhpOffice\PhpSpreadsheet\Style;

class Style extends \PhpOffice\PhpSpreadsheet\Style\Supervisor
{
    /**
     * Font.
     *
     * @var Font
     */
    protected $font;
    /**
     * Fill.
     *
     * @var Fill
     */
    protected $fill;
    /**
     * Borders.
     *
     * @var Borders
     */
    protected $borders;
    /**
     * Alignment.
     *
     * @var Alignment
     */
    protected $alignment;
    /**
     * Number Format.
     *
     * @var NumberFormat
     */
    protected $numberFormat;
    /**
     * Conditional styles.
     *
     * @var Conditional[]
     */
    protected $conditionalStyles;
    /**
     * Protection.
     *
     * @var Protection
     */
    protected $protection;
    /**
     * Index of style in collection. Only used for real style.
     *
     * @var int
     */
    protected $index;
    /**
     * Use Quote Prefix when displaying in cell editor. Only used for real style.
     *
     * @var bool
     */
    protected $quotePrefix = false;
    /**
     * Create a new Style.
     *
     * @param bool $isSupervisor Flag indicating if this is a supervisor or not
     *         Leave this value at default unless you understand exactly what
     *    its ramifications are
     * @param bool $isConditional Flag indicating if this is a conditional style or not
     *       Leave this value at default unless you understand exactly what
     *    its ramifications are
     */
    public function __construct($isSupervisor = false, $isConditional = false)
    {
    }
    /**
     * Get the shared style component for the currently active cell in currently active sheet.
     * Only used for style supervisor.
     *
     * @return Style
     */
    public function getSharedComponent()
    {
    }
    /**
     * Get parent. Only used for style supervisor.
     *
     * @return Spreadsheet
     */
    public function getParent()
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
     * $spreadsheet->getActiveSheet()->getStyle('B2')->applyFromArray(
     *     [
     *         'font' => [
     *             'name' => 'Arial',
     *             'bold' => true,
     *             'italic' => false,
     *             'underline' => Font::UNDERLINE_DOUBLE,
     *             'strikethrough' => false,
     *             'color' => [
     *                 'rgb' => '808080'
     *             ]
     *         ],
     *         'borders' => [
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
     *         ],
     *         'alignment' => [
     *             'horizontal' => Alignment::HORIZONTAL_CENTER,
     *             'vertical' => Alignment::VERTICAL_CENTER,
     *             'wrapText' => true,
     *         ],
     *         'quotePrefix'    => true
     *     ]
     * );
     * </code>
     *
     * @param array $pStyles Array containing style information
     * @param bool $pAdvanced advanced mode for setting borders
     *
     * @return Style
     */
    public function applyFromArray(array $pStyles, $pAdvanced = true)
    {
    }
    /**
     * Get Fill.
     *
     * @return Fill
     */
    public function getFill()
    {
    }
    /**
     * Get Font.
     *
     * @return Font
     */
    public function getFont()
    {
    }
    /**
     * Set font.
     *
     * @param Font $font
     *
     * @return Style
     */
    public function setFont(\PhpOffice\PhpSpreadsheet\Style\Font $font)
    {
    }
    /**
     * Get Borders.
     *
     * @return Borders
     */
    public function getBorders()
    {
    }
    /**
     * Get Alignment.
     *
     * @return Alignment
     */
    public function getAlignment()
    {
    }
    /**
     * Get Number Format.
     *
     * @return NumberFormat
     */
    public function getNumberFormat()
    {
    }
    /**
     * Get Conditional Styles. Only used on supervisor.
     *
     * @return Conditional[]
     */
    public function getConditionalStyles()
    {
    }
    /**
     * Set Conditional Styles. Only used on supervisor.
     *
     * @param Conditional[] $pValue Array of conditional styles
     *
     * @return Style
     */
    public function setConditionalStyles(array $pValue)
    {
    }
    /**
     * Get Protection.
     *
     * @return Protection
     */
    public function getProtection()
    {
    }
    /**
     * Get quote prefix.
     *
     * @return bool
     */
    public function getQuotePrefix()
    {
    }
    /**
     * Set quote prefix.
     *
     * @param bool $pValue
     *
     * @return Style
     */
    public function setQuotePrefix($pValue)
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
    /**
     * Get own index in style collection.
     *
     * @return int
     */
    public function getIndex()
    {
    }
    /**
     * Set own index in style collection.
     *
     * @param int $pValue
     */
    public function setIndex($pValue)
    {
    }
}