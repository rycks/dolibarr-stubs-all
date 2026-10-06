<?php

namespace PhpOffice\PhpSpreadsheet\Writer;

class Html extends \PhpOffice\PhpSpreadsheet\Writer\BaseWriter
{
    /**
     * Spreadsheet object.
     *
     * @var Spreadsheet
     */
    protected $spreadsheet;
    /**
     * Sheet index to write.
     *
     * @var int
     */
    private $sheetIndex = 0;
    /**
     * Images root.
     *
     * @var string
     */
    private $imagesRoot = '';
    /**
     * embed images, or link to images.
     *
     * @var bool
     */
    private $embedImages = false;
    /**
     * Use inline CSS?
     *
     * @var bool
     */
    private $useInlineCss = false;
    /**
     * Use embedded CSS?
     *
     * @var bool
     */
    private $useEmbeddedCSS = true;
    /**
     * Array of CSS styles.
     *
     * @var array
     */
    private $cssStyles;
    /**
     * Array of column widths in points.
     *
     * @var array
     */
    private $columnWidths;
    /**
     * Default font.
     *
     * @var Font
     */
    private $defaultFont;
    /**
     * Flag whether spans have been calculated.
     *
     * @var bool
     */
    private $spansAreCalculated = false;
    /**
     * Excel cells that should not be written as HTML cells.
     *
     * @var array
     */
    private $isSpannedCell = [];
    /**
     * Excel cells that are upper-left corner in a cell merge.
     *
     * @var array
     */
    private $isBaseCell = [];
    /**
     * Excel rows that should not be written as HTML rows.
     *
     * @var array
     */
    private $isSpannedRow = [];
    /**
     * Is the current writer creating PDF?
     *
     * @var bool
     */
    protected $isPdf = false;
    /**
     * Generate the Navigation block.
     *
     * @var bool
     */
    private $generateSheetNavigationBlock = true;
    /**
     * Create a new HTML.
     *
     * @param Spreadsheet $spreadsheet
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Save Spreadsheet to file.
     *
     * @param string $pFilename
     *
     * @throws WriterException
     */
    public function save($pFilename)
    {
    }
    /**
     * Map VAlign.
     *
     * @param string $vAlign Vertical alignment
     *
     * @return string
     */
    private function mapVAlign($vAlign)
    {
    }
    /**
     * Map HAlign.
     *
     * @param string $hAlign Horizontal alignment
     *
     * @return false|string
     */
    private function mapHAlign($hAlign)
    {
    }
    /**
     * Map border style.
     *
     * @param int $borderStyle Sheet index
     *
     * @return string
     */
    private function mapBorderStyle($borderStyle)
    {
    }
    /**
     * Get sheet index.
     *
     * @return int
     */
    public function getSheetIndex()
    {
    }
    /**
     * Set sheet index.
     *
     * @param int $pValue Sheet index
     *
     * @return $this
     */
    public function setSheetIndex($pValue)
    {
    }
    /**
     * Get sheet index.
     *
     * @return bool
     */
    public function getGenerateSheetNavigationBlock()
    {
    }
    /**
     * Set sheet index.
     *
     * @param bool $pValue Flag indicating whether the sheet navigation block should be generated or not
     *
     * @return $this
     */
    public function setGenerateSheetNavigationBlock($pValue)
    {
    }
    /**
     * Write all sheets (resets sheetIndex to NULL).
     *
     * @return $this
     */
    public function writeAllSheets()
    {
    }
    /**
     * Generate HTML header.
     *
     * @param bool $pIncludeStyles Include styles?
     *
     * @throws WriterException
     *
     * @return string
     */
    public function generateHTMLHeader($pIncludeStyles = false)
    {
    }
    /**
     * Generate sheet data.
     *
     * @throws WriterException
     *
     * @return string
     */
    public function generateSheetData()
    {
    }
    /**
     * Generate sheet tabs.
     *
     * @throws WriterException
     *
     * @return string
     */
    public function generateNavigation()
    {
    }
    private function extendRowsForChartsAndImages(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, $row)
    {
    }
    /**
     * Generate image tag in cell.
     *
     * @param Worksheet $pSheet \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet
     * @param string $coordinates Cell coordinates
     *
     * @return string
     */
    private function writeImageInCell(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, $coordinates)
    {
    }
    /**
     * Generate chart tag in cell.
     *
     * @param Worksheet $pSheet \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet
     * @param string $coordinates Cell coordinates
     *
     * @return string
     */
    private function writeChartInCell(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, $coordinates)
    {
    }
    /**
     * Generate CSS styles.
     *
     * @param bool $generateSurroundingHTML Generate surrounding HTML tags? (&lt;style&gt; and &lt;/style&gt;)
     *
     * @throws WriterException
     *
     * @return string
     */
    public function generateStyles($generateSurroundingHTML = true)
    {
    }
    /**
     * Build CSS styles.
     *
     * @param bool $generateSurroundingHTML Generate surrounding HTML style? (html { })
     *
     * @throws WriterException
     *
     * @return array
     */
    public function buildCSS($generateSurroundingHTML = true)
    {
    }
    /**
     * Create CSS style.
     *
     * @param Style $pStyle
     *
     * @return array
     */
    private function createCSSStyle(\PhpOffice\PhpSpreadsheet\Style\Style $pStyle)
    {
    }
    /**
     * Create CSS style (\PhpOffice\PhpSpreadsheet\Style\Alignment).
     *
     * @param Alignment $pStyle \PhpOffice\PhpSpreadsheet\Style\Alignment
     *
     * @return array
     */
    private function createCSSStyleAlignment(\PhpOffice\PhpSpreadsheet\Style\Alignment $pStyle)
    {
    }
    /**
     * Create CSS style (\PhpOffice\PhpSpreadsheet\Style\Font).
     *
     * @param Font $pStyle
     *
     * @return array
     */
    private function createCSSStyleFont(\PhpOffice\PhpSpreadsheet\Style\Font $pStyle)
    {
    }
    /**
     * Create CSS style (Borders).
     *
     * @param Borders $pStyle Borders
     *
     * @return array
     */
    private function createCSSStyleBorders(\PhpOffice\PhpSpreadsheet\Style\Borders $pStyle)
    {
    }
    /**
     * Create CSS style (Border).
     *
     * @param Border $pStyle Border
     *
     * @return string
     */
    private function createCSSStyleBorder(\PhpOffice\PhpSpreadsheet\Style\Border $pStyle)
    {
    }
    /**
     * Create CSS style (Fill).
     *
     * @param Fill $pStyle Fill
     *
     * @return array
     */
    private function createCSSStyleFill(\PhpOffice\PhpSpreadsheet\Style\Fill $pStyle)
    {
    }
    /**
     * Generate HTML footer.
     */
    public function generateHTMLFooter()
    {
    }
    /**
     * Generate table header.
     *
     * @param Worksheet $pSheet The worksheet for the table we are writing
     *
     * @return string
     */
    private function generateTableHeader($pSheet)
    {
    }
    /**
     * Generate table footer.
     */
    private function generateTableFooter()
    {
    }
    /**
     * Generate row.
     *
     * @param Worksheet $pSheet \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet
     * @param array $pValues Array containing cells in a row
     * @param int $pRow Row number (0-based)
     * @param string $cellType eg: 'td'
     *
     * @throws WriterException
     *
     * @return string
     */
    private function generateRow(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, array $pValues, $pRow, $cellType)
    {
    }
    /**
     * Takes array where of CSS properties / values and converts to CSS string.
     *
     * @param array $pValue
     *
     * @return string
     */
    private function assembleCSS(array $pValue = [])
    {
    }
    /**
     * Get images root.
     *
     * @return string
     */
    public function getImagesRoot()
    {
    }
    /**
     * Set images root.
     *
     * @param string $pValue
     *
     * @return $this
     */
    public function setImagesRoot($pValue)
    {
    }
    /**
     * Get embed images.
     *
     * @return bool
     */
    public function getEmbedImages()
    {
    }
    /**
     * Set embed images.
     *
     * @param bool $pValue
     *
     * @return $this
     */
    public function setEmbedImages($pValue)
    {
    }
    /**
     * Get use inline CSS?
     *
     * @return bool
     */
    public function getUseInlineCss()
    {
    }
    /**
     * Set use inline CSS?
     *
     * @param bool $pValue
     *
     * @return $this
     */
    public function setUseInlineCss($pValue)
    {
    }
    /**
     * Get use embedded CSS?
     *
     * @return bool
     */
    public function getUseEmbeddedCSS()
    {
    }
    /**
     * Set use embedded CSS?
     *
     * @param bool $pValue
     *
     * @return $this
     */
    public function setUseEmbeddedCSS($pValue)
    {
    }
    /**
     * Add color to formatted string as inline style.
     *
     * @param string $pValue Plain formatted value without color
     * @param string $pFormat Format code
     *
     * @return string
     */
    public function formatColor($pValue, $pFormat)
    {
    }
    /**
     * Calculate information about HTML colspan and rowspan which is not always the same as Excel's.
     */
    private function calculateSpans()
    {
    }
    private function setMargins(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write a comment in the same format as LibreOffice.
     *
     * @see https://github.com/LibreOffice/core/blob/9fc9bf3240f8c62ad7859947ab8a033ac1fe93fa/sc/source/filter/html/htmlexp.cxx#L1073-L1092
     *
     * @param Worksheet $pSheet
     * @param string $coordinate
     *
     * @return string
     */
    private function writeComment(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, $coordinate)
    {
    }
}