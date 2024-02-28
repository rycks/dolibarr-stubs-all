<?php

namespace PhpOffice\PhpSpreadsheet\Style;

class Alignment extends \PhpOffice\PhpSpreadsheet\Style\Supervisor
{
    // Horizontal alignment styles
    const HORIZONTAL_GENERAL = 'general';
    const HORIZONTAL_LEFT = 'left';
    const HORIZONTAL_RIGHT = 'right';
    const HORIZONTAL_CENTER = 'center';
    const HORIZONTAL_CENTER_CONTINUOUS = 'centerContinuous';
    const HORIZONTAL_JUSTIFY = 'justify';
    const HORIZONTAL_FILL = 'fill';
    const HORIZONTAL_DISTRIBUTED = 'distributed';
    // Excel2007 only
    // Vertical alignment styles
    const VERTICAL_BOTTOM = 'bottom';
    const VERTICAL_TOP = 'top';
    const VERTICAL_CENTER = 'center';
    const VERTICAL_JUSTIFY = 'justify';
    const VERTICAL_DISTRIBUTED = 'distributed';
    // Excel2007 only
    // Read order
    const READORDER_CONTEXT = 0;
    const READORDER_LTR = 1;
    const READORDER_RTL = 2;
    /**
     * Horizontal alignment.
     *
     * @var string
     */
    protected $horizontal = self::HORIZONTAL_GENERAL;
    /**
     * Vertical alignment.
     *
     * @var string
     */
    protected $vertical = self::VERTICAL_BOTTOM;
    /**
     * Text rotation.
     *
     * @var int
     */
    protected $textRotation = 0;
    /**
     * Wrap text.
     *
     * @var bool
     */
    protected $wrapText = false;
    /**
     * Shrink to fit.
     *
     * @var bool
     */
    protected $shrinkToFit = false;
    /**
     * Indent - only possible with horizontal alignment left and right.
     *
     * @var int
     */
    protected $indent = 0;
    /**
     * Read order.
     *
     * @var int
     */
    protected $readOrder = 0;
    /**
     * Create a new Alignment.
     *
     * @param bool $isSupervisor Flag indicating if this is a supervisor or not
     *                                       Leave this value at default unless you understand exactly what
     *                                          its ramifications are
     * @param bool $isConditional Flag indicating if this is a conditional style or not
     *                                       Leave this value at default unless you understand exactly what
     *                                          its ramifications are
     */
    public function __construct($isSupervisor = false, $isConditional = false)
    {
    }
    /**
     * Get the shared style component for the currently active cell in currently active sheet.
     * Only used for style supervisor.
     *
     * @return Alignment
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
     * $spreadsheet->getActiveSheet()->getStyle('B2')->getAlignment()->applyFromArray(
     *        [
     *            'horizontal'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
     *            'vertical'     => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
     *            'textRotation' => 0,
     *            'wrapText'     => TRUE
     *        ]
     * );
     * </code>
     *
     * @param array $pStyles Array containing style information
     *
     * @throws PhpSpreadsheetException
     *
     * @return Alignment
     */
    public function applyFromArray(array $pStyles)
    {
    }
    /**
     * Get Horizontal.
     *
     * @return string
     */
    public function getHorizontal()
    {
    }
    /**
     * Set Horizontal.
     *
     * @param string $pValue see self::HORIZONTAL_*
     *
     * @return Alignment
     */
    public function setHorizontal($pValue)
    {
    }
    /**
     * Get Vertical.
     *
     * @return string
     */
    public function getVertical()
    {
    }
    /**
     * Set Vertical.
     *
     * @param string $pValue see self::VERTICAL_*
     *
     * @return Alignment
     */
    public function setVertical($pValue)
    {
    }
    /**
     * Get TextRotation.
     *
     * @return int
     */
    public function getTextRotation()
    {
    }
    /**
     * Set TextRotation.
     *
     * @param int $pValue
     *
     * @throws PhpSpreadsheetException
     *
     * @return Alignment
     */
    public function setTextRotation($pValue)
    {
    }
    /**
     * Get Wrap Text.
     *
     * @return bool
     */
    public function getWrapText()
    {
    }
    /**
     * Set Wrap Text.
     *
     * @param bool $pValue
     *
     * @return Alignment
     */
    public function setWrapText($pValue)
    {
    }
    /**
     * Get Shrink to fit.
     *
     * @return bool
     */
    public function getShrinkToFit()
    {
    }
    /**
     * Set Shrink to fit.
     *
     * @param bool $pValue
     *
     * @return Alignment
     */
    public function setShrinkToFit($pValue)
    {
    }
    /**
     * Get indent.
     *
     * @return int
     */
    public function getIndent()
    {
    }
    /**
     * Set indent.
     *
     * @param int $pValue
     *
     * @return Alignment
     */
    public function setIndent($pValue)
    {
    }
    /**
     * Get read order.
     *
     * @return int
     */
    public function getReadOrder()
    {
    }
    /**
     * Set read order.
     *
     * @param int $pValue
     *
     * @return Alignment
     */
    public function setReadOrder($pValue)
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