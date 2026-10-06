<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class SheetView
{
    // Sheet View types
    const SHEETVIEW_NORMAL = 'normal';
    const SHEETVIEW_PAGE_LAYOUT = 'pageLayout';
    const SHEETVIEW_PAGE_BREAK_PREVIEW = 'pageBreakPreview';
    private static $sheetViewTypes = [self::SHEETVIEW_NORMAL, self::SHEETVIEW_PAGE_LAYOUT, self::SHEETVIEW_PAGE_BREAK_PREVIEW];
    /**
     * ZoomScale.
     *
     * Valid values range from 10 to 400.
     *
     * @var int
     */
    private $zoomScale = 100;
    /**
     * ZoomScaleNormal.
     *
     * Valid values range from 10 to 400.
     *
     * @var int
     */
    private $zoomScaleNormal = 100;
    /**
     * ShowZeros.
     *
     * If true, "null" values from a calculation will be shown as "0". This is the default Excel behaviour and can be changed
     * with the advanced worksheet option "Show a zero in cells that have zero value"
     *
     * @var bool
     */
    private $showZeros = true;
    /**
     * View.
     *
     * Valid values range from 10 to 400.
     *
     * @var string
     */
    private $sheetviewType = self::SHEETVIEW_NORMAL;
    /**
     * Create a new SheetView.
     */
    public function __construct()
    {
    }
    /**
     * Get ZoomScale.
     *
     * @return int
     */
    public function getZoomScale()
    {
    }
    /**
     * Set ZoomScale.
     * Valid values range from 10 to 400.
     *
     * @param int $pValue
     *
     * @throws PhpSpreadsheetException
     *
     * @return $this
     */
    public function setZoomScale($pValue)
    {
    }
    /**
     * Get ZoomScaleNormal.
     *
     * @return int
     */
    public function getZoomScaleNormal()
    {
    }
    /**
     * Set ZoomScale.
     * Valid values range from 10 to 400.
     *
     * @param int $pValue
     *
     * @throws PhpSpreadsheetException
     *
     * @return $this
     */
    public function setZoomScaleNormal($pValue)
    {
    }
    /**
     * Set ShowZeroes setting.
     *
     * @param bool $pValue
     */
    public function setShowZeros($pValue)
    {
    }
    /**
     * @return bool
     */
    public function getShowZeros()
    {
    }
    /**
     * Get View.
     *
     * @return string
     */
    public function getView()
    {
    }
    /**
     * Set View.
     *
     * Valid values are
     *        'normal'            self::SHEETVIEW_NORMAL
     *        'pageLayout'        self::SHEETVIEW_PAGE_LAYOUT
     *        'pageBreakPreview'  self::SHEETVIEW_PAGE_BREAK_PREVIEW
     *
     * @param string $pValue
     *
     * @throws PhpSpreadsheetException
     *
     * @return $this
     */
    public function setView($pValue)
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}