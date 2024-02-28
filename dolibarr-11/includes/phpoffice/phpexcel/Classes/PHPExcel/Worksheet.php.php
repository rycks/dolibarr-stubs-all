<?php

/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Worksheet
 *
 * @category   PHPExcel
 * @package    PHPExcel_Worksheet
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Worksheet implements \PHPExcel_IComparable
{
    /* Break types */
    const BREAK_NONE = 0;
    const BREAK_ROW = 1;
    const BREAK_COLUMN = 2;
    /* Sheet state */
    const SHEETSTATE_VISIBLE = 'visible';
    const SHEETSTATE_HIDDEN = 'hidden';
    const SHEETSTATE_VERYHIDDEN = 'veryHidden';
    /**
     * Invalid characters in sheet title
     *
     * @var array
     */
    private static $_invalidCharacters = array('*', ':', '/', '\\', '?', '[', ']');
    /**
     * Parent spreadsheet
     *
     * @var PHPExcel
     */
    private $_parent;
    /**
     * Cacheable collection of cells
     *
     * @var PHPExcel_CachedObjectStorage_xxx
     */
    private $_cellCollection = \null;
    /**
     * Collection of row dimensions
     *
     * @var PHPExcel_Worksheet_RowDimension[]
     */
    private $_rowDimensions = array();
    /**
     * Default row dimension
     *
     * @var PHPExcel_Worksheet_RowDimension
     */
    private $_defaultRowDimension = \null;
    /**
     * Collection of column dimensions
     *
     * @var PHPExcel_Worksheet_ColumnDimension[]
     */
    private $_columnDimensions = array();
    /**
     * Default column dimension
     *
     * @var PHPExcel_Worksheet_ColumnDimension
     */
    private $_defaultColumnDimension = \null;
    /**
     * Collection of drawings
     *
     * @var PHPExcel_Worksheet_BaseDrawing[]
     */
    private $_drawingCollection = \null;
    /**
     * Collection of Chart objects
     *
     * @var PHPExcel_Chart[]
     */
    private $_chartCollection = array();
    /**
     * Worksheet title
     *
     * @var string
     */
    private $_title;
    /**
     * Sheet state
     *
     * @var string
     */
    private $_sheetState;
    /**
     * Page setup
     *
     * @var PHPExcel_Worksheet_PageSetup
     */
    private $_pageSetup;
    /**
     * Page margins
     *
     * @var PHPExcel_Worksheet_PageMargins
     */
    private $_pageMargins;
    /**
     * Page header/footer
     *
     * @var PHPExcel_Worksheet_HeaderFooter
     */
    private $_headerFooter;
    /**
     * Sheet view
     *
     * @var PHPExcel_Worksheet_SheetView
     */
    private $_sheetView;
    /**
     * Protection
     *
     * @var PHPExcel_Worksheet_Protection
     */
    private $_protection;
    /**
     * Collection of styles
     *
     * @var PHPExcel_Style[]
     */
    private $_styles = array();
    /**
     * Conditional styles. Indexed by cell coordinate, e.g. 'A1'
     *
     * @var array
     */
    private $_conditionalStylesCollection = array();
    /**
     * Is the current cell collection sorted already?
     *
     * @var boolean
     */
    private $_cellCollectionIsSorted = \false;
    /**
     * Collection of breaks
     *
     * @var array
     */
    private $_breaks = array();
    /**
     * Collection of merged cell ranges
     *
     * @var array
     */
    private $_mergeCells = array();
    /**
     * Collection of protected cell ranges
     *
     * @var array
     */
    private $_protectedCells = array();
    /**
     * Autofilter Range and selection
     *
     * @var PHPExcel_Worksheet_AutoFilter
     */
    private $_autoFilter = \NULL;
    /**
     * Freeze pane
     *
     * @var string
     */
    private $_freezePane = '';
    /**
     * Show gridlines?
     *
     * @var boolean
     */
    private $_showGridlines = \true;
    /**
     * Print gridlines?
     *
     * @var boolean
     */
    private $_printGridlines = \false;
    /**
     * Show row and column headers?
     *
     * @var boolean
     */
    private $_showRowColHeaders = \true;
    /**
     * Show summary below? (Row/Column outline)
     *
     * @var boolean
     */
    private $_showSummaryBelow = \true;
    /**
     * Show summary right? (Row/Column outline)
     *
     * @var boolean
     */
    private $_showSummaryRight = \true;
    /**
     * Collection of comments
     *
     * @var PHPExcel_Comment[]
     */
    private $_comments = array();
    /**
     * Active cell. (Only one!)
     *
     * @var string
     */
    private $_activeCell = 'A1';
    /**
     * Selected cells
     *
     * @var string
     */
    private $_selectedCells = 'A1';
    /**
     * Cached highest column
     *
     * @var string
     */
    private $_cachedHighestColumn = 'A';
    /**
     * Cached highest row
     *
     * @var int
     */
    private $_cachedHighestRow = 1;
    /**
     * Right-to-left?
     *
     * @var boolean
     */
    private $_rightToLeft = \false;
    /**
     * Hyperlinks. Indexed by cell coordinate, e.g. 'A1'
     *
     * @var array
     */
    private $_hyperlinkCollection = array();
    /**
     * Data validation objects. Indexed by cell coordinate, e.g. 'A1'
     *
     * @var array
     */
    private $_dataValidationCollection = array();
    /**
     * Tab color
     *
     * @var PHPExcel_Style_Color
     */
    private $_tabColor;
    /**
     * Dirty flag
     *
     * @var boolean
     */
    private $_dirty = \true;
    /**
     * Hash
     *
     * @var string
     */
    private $_hash = \null;
    /**
     * CodeName
     *
     * @var string
     */
    private $_codeName = \null;
    /**
     * Create a new worksheet
     *
     * @param PHPExcel        $pParent
     * @param string        $pTitle
     */
    public function __construct(\PHPExcel $pParent = \null, $pTitle = 'Worksheet')
    {
    }
    /**
     * Disconnect all cells from this PHPExcel_Worksheet object,
     *    typically so that the worksheet object can be unset
     *
     */
    public function disconnectCells()
    {
    }
    /**
     * Code to execute when this worksheet is unset()
     *
     */
    function __destruct()
    {
    }
    /**
     * Return the cache controller for the cell collection
     *
     * @return PHPExcel_CachedObjectStorage_xxx
     */
    public function getCellCacheController()
    {
    }
    //    function getCellCacheController()
    /**
     * Get array of invalid characters for sheet title
     *
     * @return array
     */
    public static function getInvalidCharacters()
    {
    }
    /**
     * Check sheet code name for valid Excel syntax
     *
     * @param string $pValue The string to check
     * @return string The valid string
     * @throws Exception
     */
    private static function _checkSheetCodeName($pValue)
    {
    }
    /**
     * Check sheet title for valid Excel syntax
     *
     * @param string $pValue The string to check
     * @return string The valid string
     * @throws PHPExcel_Exception
     */
    private static function _checkSheetTitle($pValue)
    {
    }
    /**
     * Get collection of cells
     *
     * @param boolean $pSorted Also sort the cell collection?
     * @return PHPExcel_Cell[]
     */
    public function getCellCollection($pSorted = \true)
    {
    }
    /**
     * Sort collection of cells
     *
     * @return PHPExcel_Worksheet
     */
    public function sortCellCollection()
    {
    }
    /**
     * Get collection of row dimensions
     *
     * @return PHPExcel_Worksheet_RowDimension[]
     */
    public function getRowDimensions()
    {
    }
    /**
     * Get default row dimension
     *
     * @return PHPExcel_Worksheet_RowDimension
     */
    public function getDefaultRowDimension()
    {
    }
    /**
     * Get collection of column dimensions
     *
     * @return PHPExcel_Worksheet_ColumnDimension[]
     */
    public function getColumnDimensions()
    {
    }
    /**
     * Get default column dimension
     *
     * @return PHPExcel_Worksheet_ColumnDimension
     */
    public function getDefaultColumnDimension()
    {
    }
    /**
     * Get collection of drawings
     *
     * @return PHPExcel_Worksheet_BaseDrawing[]
     */
    public function getDrawingCollection()
    {
    }
    /**
     * Get collection of charts
     *
     * @return PHPExcel_Chart[]
     */
    public function getChartCollection()
    {
    }
    /**
     * Add chart
     *
     * @param PHPExcel_Chart $pChart
     * @param int|null $iChartIndex Index where chart should go (0,1,..., or null for last)
     * @return PHPExcel_Chart
     */
    public function addChart(\PHPExcel_Chart $pChart = \null, $iChartIndex = \null)
    {
    }
    /**
     * Return the count of charts on this worksheet
     *
     * @return int        The number of charts
     */
    public function getChartCount()
    {
    }
    /**
     * Get a chart by its index position
     *
     * @param string $index Chart index position
     * @return false|PHPExcel_Chart
     * @throws PHPExcel_Exception
     */
    public function getChartByIndex($index = \null)
    {
    }
    /**
     * Return an array of the names of charts on this worksheet
     *
     * @return string[] The names of charts
     * @throws PHPExcel_Exception
     */
    public function getChartNames()
    {
    }
    /**
     * Get a chart by name
     *
     * @param string $chartName Chart name
     * @return false|PHPExcel_Chart
     * @throws PHPExcel_Exception
     */
    public function getChartByName($chartName = '')
    {
    }
    /**
     * Refresh column dimensions
     *
     * @return PHPExcel_Worksheet
     */
    public function refreshColumnDimensions()
    {
    }
    /**
     * Refresh row dimensions
     *
     * @return PHPExcel_Worksheet
     */
    public function refreshRowDimensions()
    {
    }
    /**
     * Calculate worksheet dimension
     *
     * @return string  String containing the dimension of this worksheet
     */
    public function calculateWorksheetDimension()
    {
    }
    /**
     * Calculate worksheet data dimension
     *
     * @return string  String containing the dimension of this worksheet that actually contain data
     */
    public function calculateWorksheetDataDimension()
    {
    }
    /**
     * Calculate widths for auto-size columns
     *
     * @param  boolean  $calculateMergeCells  Calculate merge cell width
     * @return PHPExcel_Worksheet;
     */
    public function calculateColumnWidths($calculateMergeCells = \false)
    {
    }
    /**
     * Get parent
     *
     * @return PHPExcel
     */
    public function getParent()
    {
    }
    /**
     * Re-bind parent
     *
     * @param PHPExcel $parent
     * @return PHPExcel_Worksheet
     */
    public function rebindParent(\PHPExcel $parent)
    {
    }
    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
    }
    /**
     * Set title
     *
     * @param string $pValue String containing the dimension of this worksheet
     * @param string $updateFormulaCellReferences boolean Flag indicating whether cell references in formulae should
     *        	be updated to reflect the new sheet name.
     *          This should be left as the default true, unless you are
     *          certain that no formula cells on any worksheet contain
     *          references to this worksheet
     * @return PHPExcel_Worksheet
     */
    public function setTitle($pValue = 'Worksheet', $updateFormulaCellReferences = \true)
    {
    }
    /**
     * Get sheet state
     *
     * @return string Sheet state (visible, hidden, veryHidden)
     */
    public function getSheetState()
    {
    }
    /**
     * Set sheet state
     *
     * @param string $value Sheet state (visible, hidden, veryHidden)
     * @return PHPExcel_Worksheet
     */
    public function setSheetState($value = \PHPExcel_Worksheet::SHEETSTATE_VISIBLE)
    {
    }
    /**
     * Get page setup
     *
     * @return PHPExcel_Worksheet_PageSetup
     */
    public function getPageSetup()
    {
    }
    /**
     * Set page setup
     *
     * @param PHPExcel_Worksheet_PageSetup    $pValue
     * @return PHPExcel_Worksheet
     */
    public function setPageSetup(\PHPExcel_Worksheet_PageSetup $pValue)
    {
    }
    /**
     * Get page margins
     *
     * @return PHPExcel_Worksheet_PageMargins
     */
    public function getPageMargins()
    {
    }
    /**
     * Set page margins
     *
     * @param PHPExcel_Worksheet_PageMargins    $pValue
     * @return PHPExcel_Worksheet
     */
    public function setPageMargins(\PHPExcel_Worksheet_PageMargins $pValue)
    {
    }
    /**
     * Get page header/footer
     *
     * @return PHPExcel_Worksheet_HeaderFooter
     */
    public function getHeaderFooter()
    {
    }
    /**
     * Set page header/footer
     *
     * @param PHPExcel_Worksheet_HeaderFooter    $pValue
     * @return PHPExcel_Worksheet
     */
    public function setHeaderFooter(\PHPExcel_Worksheet_HeaderFooter $pValue)
    {
    }
    /**
     * Get sheet view
     *
     * @return PHPExcel_Worksheet_SheetView
     */
    public function getSheetView()
    {
    }
    /**
     * Set sheet view
     *
     * @param PHPExcel_Worksheet_SheetView    $pValue
     * @return PHPExcel_Worksheet
     */
    public function setSheetView(\PHPExcel_Worksheet_SheetView $pValue)
    {
    }
    /**
     * Get Protection
     *
     * @return PHPExcel_Worksheet_Protection
     */
    public function getProtection()
    {
    }
    /**
     * Set Protection
     *
     * @param PHPExcel_Worksheet_Protection    $pValue
     * @return PHPExcel_Worksheet
     */
    public function setProtection(\PHPExcel_Worksheet_Protection $pValue)
    {
    }
    /**
     * Get highest worksheet column
     *
     * @param   string     $row        Return the data highest column for the specified row,
     *                                     or the highest column of any row if no row number is passed
     * @return string Highest column name
     */
    public function getHighestColumn($row = \null)
    {
    }
    /**
     * Get highest worksheet column that contains data
     *
     * @param   string     $row        Return the highest data column for the specified row,
     *                                     or the highest data column of any row if no row number is passed
     * @return string Highest column name that contains data
     */
    public function getHighestDataColumn($row = \null)
    {
    }
    /**
     * Get highest worksheet row
     *
     * @param   string     $column     Return the highest data row for the specified column,
     *                                     or the highest row of any column if no column letter is passed
     * @return int Highest row number
     */
    public function getHighestRow($column = \null)
    {
    }
    /**
     * Get highest worksheet row that contains data
     *
     * @param   string     $column     Return the highest data row for the specified column,
     *                                     or the highest data row of any column if no column letter is passed
     * @return string Highest row number that contains data
     */
    public function getHighestDataRow($column = \null)
    {
    }
    /**
     * Get highest worksheet column and highest row that have cell records
     *
     * @return array Highest column name and highest row number
     */
    public function getHighestRowAndColumn()
    {
    }
    /**
     * Set a cell value
     *
     * @param string $pCoordinate Coordinate of the cell
     * @param mixed $pValue Value of the cell
     * @param bool $returnCell   Return the worksheet (false, default) or the cell (true)
     * @return PHPExcel_Worksheet|PHPExcel_Cell    Depending on the last parameter being specified
     */
    public function setCellValue($pCoordinate = 'A1', $pValue = \null, $returnCell = \false)
    {
    }
    /**
     * Set a cell value by using numeric cell coordinates
     *
     * @param string $pColumn Numeric column coordinate of the cell (A = 0)
     * @param string $pRow Numeric row coordinate of the cell
     * @param mixed $pValue Value of the cell
     * @param bool $returnCell Return the worksheet (false, default) or the cell (true)
     * @return PHPExcel_Worksheet|PHPExcel_Cell    Depending on the last parameter being specified
     */
    public function setCellValueByColumnAndRow($pColumn = 0, $pRow = 1, $pValue = \null, $returnCell = \false)
    {
    }
    /**
     * Set a cell value
     *
     * @param string $pCoordinate Coordinate of the cell
     * @param mixed  $pValue Value of the cell
     * @param string $pDataType Explicit data type
     * @param bool $returnCell Return the worksheet (false, default) or the cell (true)
     * @return PHPExcel_Worksheet|PHPExcel_Cell    Depending on the last parameter being specified
     */
    public function setCellValueExplicit($pCoordinate = 'A1', $pValue = \null, $pDataType = \PHPExcel_Cell_DataType::TYPE_STRING, $returnCell = \false)
    {
    }
    /**
     * Set a cell value by using numeric cell coordinates
     *
     * @param string $pColumn Numeric column coordinate of the cell
     * @param string $pRow Numeric row coordinate of the cell
     * @param mixed $pValue Value of the cell
     * @param string $pDataType Explicit data type
     * @param bool $returnCell Return the worksheet (false, default) or the cell (true)
     * @return PHPExcel_Worksheet|PHPExcel_Cell    Depending on the last parameter being specified
     */
    public function setCellValueExplicitByColumnAndRow($pColumn = 0, $pRow = 1, $pValue = \null, $pDataType = \PHPExcel_Cell_DataType::TYPE_STRING, $returnCell = \false)
    {
    }
    /**
     * Get cell at a specific coordinate
     *
     * @param string $pCoordinate    Coordinate of the cell
     * @throws PHPExcel_Exception
     * @return PHPExcel_Cell Cell that was found
     */
    public function getCell($pCoordinate = 'A1')
    {
    }
    /**
     * Get cell at a specific coordinate by using numeric cell coordinates
     *
     * @param  string $pColumn Numeric column coordinate of the cell
     * @param string $pRow Numeric row coordinate of the cell
     * @return PHPExcel_Cell Cell that was found
     */
    public function getCellByColumnAndRow($pColumn = 0, $pRow = 1)
    {
    }
    /**
     * Create a new cell at the specified coordinate
     *
     * @param string $pCoordinate    Coordinate of the cell
     * @return PHPExcel_Cell Cell that was created
     */
    private function _createNewCell($pCoordinate)
    {
    }
    /**
     * Does the cell at a specific coordinate exist?
     *
     * @param string $pCoordinate  Coordinate of the cell
     * @throws PHPExcel_Exception
     * @return boolean
     */
    public function cellExists($pCoordinate = 'A1')
    {
    }
    /**
     * Cell at a specific coordinate by using numeric cell coordinates exists?
     *
     * @param string $pColumn Numeric column coordinate of the cell
     * @param string $pRow Numeric row coordinate of the cell
     * @return boolean
     */
    public function cellExistsByColumnAndRow($pColumn = 0, $pRow = 1)
    {
    }
    /**
     * Get row dimension at a specific row
     *
     * @param int $pRow Numeric index of the row
     * @return PHPExcel_Worksheet_RowDimension
     */
    public function getRowDimension($pRow = 1, $create = \TRUE)
    {
    }
    /**
     * Get column dimension at a specific column
     *
     * @param string $pColumn String index of the column
     * @return PHPExcel_Worksheet_ColumnDimension
     */
    public function getColumnDimension($pColumn = 'A', $create = \TRUE)
    {
    }
    /**
     * Get column dimension at a specific column by using numeric cell coordinates
     *
     * @param string $pColumn Numeric column coordinate of the cell
     * @return PHPExcel_Worksheet_ColumnDimension
     */
    public function getColumnDimensionByColumn($pColumn = 0)
    {
    }
    /**
     * Get styles
     *
     * @return PHPExcel_Style[]
     */
    public function getStyles()
    {
    }
    /**
     * Get default style of workbook.
     *
     * @deprecated
     * @return PHPExcel_Style
     * @throws PHPExcel_Exception
     */
    public function getDefaultStyle()
    {
    }
    /**
     * Set default style - should only be used by PHPExcel_IReader implementations!
     *
     * @deprecated
     * @param PHPExcel_Style $pValue
     * @throws PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function setDefaultStyle(\PHPExcel_Style $pValue)
    {
    }
    /**
     * Get style for cell
     *
     * @param string $pCellCoordinate Cell coordinate (or range) to get style for
     * @return PHPExcel_Style
     * @throws PHPExcel_Exception
     */
    public function getStyle($pCellCoordinate = 'A1')
    {
    }
    /**
     * Get conditional styles for a cell
     *
     * @param string $pCoordinate
     * @return PHPExcel_Style_Conditional[]
     */
    public function getConditionalStyles($pCoordinate = 'A1')
    {
    }
    /**
     * Do conditional styles exist for this cell?
     *
     * @param string $pCoordinate
     * @return boolean
     */
    public function conditionalStylesExists($pCoordinate = 'A1')
    {
    }
    /**
     * Removes conditional styles for a cell
     *
     * @param string $pCoordinate
     * @return PHPExcel_Worksheet
     */
    public function removeConditionalStyles($pCoordinate = 'A1')
    {
    }
    /**
     * Get collection of conditional styles
     *
     * @return array
     */
    public function getConditionalStylesCollection()
    {
    }
    /**
     * Set conditional styles
     *
     * @param $pCoordinate string E.g. 'A1'
     * @param $pValue PHPExcel_Style_Conditional[]
     * @return PHPExcel_Worksheet
     */
    public function setConditionalStyles($pCoordinate = 'A1', $pValue)
    {
    }
    /**
     * Get style for cell by using numeric cell coordinates
     *
     * @param int $pColumn  Numeric column coordinate of the cell
     * @param int $pRow Numeric row coordinate of the cell
     * @param int pColumn2 Numeric column coordinate of the range cell
     * @param int pRow2 Numeric row coordinate of the range cell
     * @return PHPExcel_Style
     */
    public function getStyleByColumnAndRow($pColumn = 0, $pRow = 1, $pColumn2 = \null, $pRow2 = \null)
    {
    }
    /**
     * Set shared cell style to a range of cells
     *
     * Please note that this will overwrite existing cell styles for cells in range!
     *
     * @deprecated
     * @param PHPExcel_Style $pSharedCellStyle Cell style to share
     * @param string $pRange Range of cells (i.e. "A1:B10"), or just one cell (i.e. "A1")
     * @throws PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function setSharedStyle(\PHPExcel_Style $pSharedCellStyle = \null, $pRange = '')
    {
    }
    /**
     * Duplicate cell style to a range of cells
     *
     * Please note that this will overwrite existing cell styles for cells in range!
     *
     * @param PHPExcel_Style $pCellStyle Cell style to duplicate
     * @param string $pRange Range of cells (i.e. "A1:B10"), or just one cell (i.e. "A1")
     * @throws PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function duplicateStyle(\PHPExcel_Style $pCellStyle = \null, $pRange = '')
    {
    }
    /**
     * Duplicate conditional style to a range of cells
     *
     * Please note that this will overwrite existing cell styles for cells in range!
     *
     * @param	array of PHPExcel_Style_Conditional	$pCellStyle	Cell style to duplicate
     * @param string $pRange Range of cells (i.e. "A1:B10"), or just one cell (i.e. "A1")
     * @throws PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function duplicateConditionalStyle(array $pCellStyle = \null, $pRange = '')
    {
    }
    /**
     * Duplicate cell style array to a range of cells
     *
     * Please note that this will overwrite existing cell styles for cells in range,
     * if they are in the styles array. For example, if you decide to set a range of
     * cells to font bold, only include font bold in the styles array.
     *
     * @deprecated
     * @param array $pStyles Array containing style information
     * @param string $pRange Range of cells (i.e. "A1:B10"), or just one cell (i.e. "A1")
     * @param boolean $pAdvanced Advanced mode for setting borders.
     * @throws PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function duplicateStyleArray($pStyles = \null, $pRange = '', $pAdvanced = \true)
    {
    }
    /**
     * Set break on a cell
     *
     * @param string $pCell Cell coordinate (e.g. A1)
     * @param int $pBreak Break type (type of PHPExcel_Worksheet::BREAK_*)
     * @throws PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function setBreak($pCell = 'A1', $pBreak = \PHPExcel_Worksheet::BREAK_NONE)
    {
    }
    /**
     * Set break on a cell by using numeric cell coordinates
     *
     * @param integer $pColumn Numeric column coordinate of the cell
     * @param integer $pRow Numeric row coordinate of the cell
     * @param  integer $pBreak Break type (type of PHPExcel_Worksheet::BREAK_*)
     * @return PHPExcel_Worksheet
     */
    public function setBreakByColumnAndRow($pColumn = 0, $pRow = 1, $pBreak = \PHPExcel_Worksheet::BREAK_NONE)
    {
    }
    /**
     * Get breaks
     *
     * @return array[]
     */
    public function getBreaks()
    {
    }
    /**
     * Set merge on a cell range
     *
     * @param string $pRange  Cell range (e.g. A1:E1)
     * @throws PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function mergeCells($pRange = 'A1:A1')
    {
    }
    /**
     * Set merge on a cell range by using numeric cell coordinates
     *
     * @param int $pColumn1    Numeric column coordinate of the first cell
     * @param int $pRow1        Numeric row coordinate of the first cell
     * @param int $pColumn2    Numeric column coordinate of the last cell
     * @param int $pRow2        Numeric row coordinate of the last cell
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function mergeCellsByColumnAndRow($pColumn1 = 0, $pRow1 = 1, $pColumn2 = 0, $pRow2 = 1)
    {
    }
    /**
     * Remove merge on a cell range
     *
     * @param    string            $pRange        Cell range (e.g. A1:E1)
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function unmergeCells($pRange = 'A1:A1')
    {
    }
    /**
     * Remove merge on a cell range by using numeric cell coordinates
     *
     * @param int $pColumn1    Numeric column coordinate of the first cell
     * @param int $pRow1        Numeric row coordinate of the first cell
     * @param int $pColumn2    Numeric column coordinate of the last cell
     * @param int $pRow2        Numeric row coordinate of the last cell
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function unmergeCellsByColumnAndRow($pColumn1 = 0, $pRow1 = 1, $pColumn2 = 0, $pRow2 = 1)
    {
    }
    /**
     * Get merge cells array.
     *
     * @return array[]
     */
    public function getMergeCells()
    {
    }
    /**
     * Set merge cells array for the entire sheet. Use instead mergeCells() to merge
     * a single cell range.
     *
     * @param array
     */
    public function setMergeCells($pValue = array())
    {
    }
    /**
     * Set protection on a cell range
     *
     * @param    string            $pRange                Cell (e.g. A1) or cell range (e.g. A1:E1)
     * @param    string            $pPassword            Password to unlock the protection
     * @param    boolean        $pAlreadyHashed    If the password has already been hashed, set this to true
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function protectCells($pRange = 'A1', $pPassword = '', $pAlreadyHashed = \false)
    {
    }
    /**
     * Set protection on a cell range by using numeric cell coordinates
     *
     * @param int  $pColumn1            Numeric column coordinate of the first cell
     * @param int  $pRow1                Numeric row coordinate of the first cell
     * @param int  $pColumn2            Numeric column coordinate of the last cell
     * @param int  $pRow2                Numeric row coordinate of the last cell
     * @param string $pPassword            Password to unlock the protection
     * @param    boolean $pAlreadyHashed    If the password has already been hashed, set this to true
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function protectCellsByColumnAndRow($pColumn1 = 0, $pRow1 = 1, $pColumn2 = 0, $pRow2 = 1, $pPassword = '', $pAlreadyHashed = \false)
    {
    }
    /**
     * Remove protection on a cell range
     *
     * @param    string            $pRange        Cell (e.g. A1) or cell range (e.g. A1:E1)
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function unprotectCells($pRange = 'A1')
    {
    }
    /**
     * Remove protection on a cell range by using numeric cell coordinates
     *
     * @param int  $pColumn1            Numeric column coordinate of the first cell
     * @param int  $pRow1                Numeric row coordinate of the first cell
     * @param int  $pColumn2            Numeric column coordinate of the last cell
     * @param int $pRow2                Numeric row coordinate of the last cell
     * @param string $pPassword            Password to unlock the protection
     * @param    boolean $pAlreadyHashed    If the password has already been hashed, set this to true
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function unprotectCellsByColumnAndRow($pColumn1 = 0, $pRow1 = 1, $pColumn2 = 0, $pRow2 = 1, $pPassword = '', $pAlreadyHashed = \false)
    {
    }
    /**
     * Get protected cells
     *
     * @return array[]
     */
    public function getProtectedCells()
    {
    }
    /**
     *    Get Autofilter
     *
     *    @return PHPExcel_Worksheet_AutoFilter
     */
    public function getAutoFilter()
    {
    }
    /**
     *    Set AutoFilter
     *
     *    @param    PHPExcel_Worksheet_AutoFilter|string   $pValue
     *            A simple string containing a Cell range like 'A1:E10' is permitted for backward compatibility
     *    @throws    PHPExcel_Exception
     *    @return PHPExcel_Worksheet
     */
    public function setAutoFilter($pValue)
    {
    }
    /**
     *    Set Autofilter Range by using numeric cell coordinates
     *
     *    @param  integer  $pColumn1    Numeric column coordinate of the first cell
     *    @param  integer  $pRow1       Numeric row coordinate of the first cell
     *    @param  integer  $pColumn2    Numeric column coordinate of the second cell
     *    @param  integer  $pRow2       Numeric row coordinate of the second cell
     *    @throws    PHPExcel_Exception
     *    @return PHPExcel_Worksheet
     */
    public function setAutoFilterByColumnAndRow($pColumn1 = 0, $pRow1 = 1, $pColumn2 = 0, $pRow2 = 1)
    {
    }
    /**
     * Remove autofilter
     *
     * @return PHPExcel_Worksheet
     */
    public function removeAutoFilter()
    {
    }
    /**
     * Get Freeze Pane
     *
     * @return string
     */
    public function getFreezePane()
    {
    }
    /**
     * Freeze Pane
     *
     * @param    string        $pCell        Cell (i.e. A2)
     *                                    Examples:
     *                                        A2 will freeze the rows above cell A2 (i.e row 1)
     *                                        B1 will freeze the columns to the left of cell B1 (i.e column A)
     *                                        B2 will freeze the rows above and to the left of cell A2
     *                                            (i.e row 1 and column A)
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function freezePane($pCell = '')
    {
    }
    /**
     * Freeze Pane by using numeric cell coordinates
     *
     * @param int $pColumn    Numeric column coordinate of the cell
     * @param int $pRow        Numeric row coordinate of the cell
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function freezePaneByColumnAndRow($pColumn = 0, $pRow = 1)
    {
    }
    /**
     * Unfreeze Pane
     *
     * @return PHPExcel_Worksheet
     */
    public function unfreezePane()
    {
    }
    /**
     * Insert a new row, updating all possible related data
     *
     * @param int $pBefore    Insert before this one
     * @param int $pNumRows    Number of rows to insert
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function insertNewRowBefore($pBefore = 1, $pNumRows = 1)
    {
    }
    /**
     * Insert a new column, updating all possible related data
     *
     * @param int $pBefore    Insert before this one
     * @param int $pNumCols    Number of columns to insert
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function insertNewColumnBefore($pBefore = 'A', $pNumCols = 1)
    {
    }
    /**
     * Insert a new column, updating all possible related data
     *
     * @param int $pBefore    Insert before this one (numeric column coordinate of the cell)
     * @param int $pNumCols    Number of columns to insert
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function insertNewColumnBeforeByIndex($pBefore = 0, $pNumCols = 1)
    {
    }
    /**
     * Delete a row, updating all possible related data
     *
     * @param int $pRow        Remove starting with this one
     * @param int $pNumRows    Number of rows to remove
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function removeRow($pRow = 1, $pNumRows = 1)
    {
    }
    /**
     * Remove a column, updating all possible related data
     *
     * @param string    $pColumn     Remove starting with this one
     * @param int       $pNumCols    Number of columns to remove
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function removeColumn($pColumn = 'A', $pNumCols = 1)
    {
    }
    /**
     * Remove a column, updating all possible related data
     *
     * @param int $pColumn    Remove starting with this one (numeric column coordinate of the cell)
     * @param int $pNumCols    Number of columns to remove
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function removeColumnByIndex($pColumn = 0, $pNumCols = 1)
    {
    }
    /**
     * Show gridlines?
     *
     * @return boolean
     */
    public function getShowGridlines()
    {
    }
    /**
     * Set show gridlines
     *
     * @param boolean $pValue    Show gridlines (true/false)
     * @return PHPExcel_Worksheet
     */
    public function setShowGridlines($pValue = \false)
    {
    }
    /**
     * Print gridlines?
     *
     * @return boolean
     */
    public function getPrintGridlines()
    {
    }
    /**
     * Set print gridlines
     *
     * @param boolean $pValue Print gridlines (true/false)
     * @return PHPExcel_Worksheet
     */
    public function setPrintGridlines($pValue = \false)
    {
    }
    /**
     * Show row and column headers?
     *
     * @return boolean
     */
    public function getShowRowColHeaders()
    {
    }
    /**
     * Set show row and column headers
     *
     * @param boolean $pValue Show row and column headers (true/false)
     * @return PHPExcel_Worksheet
     */
    public function setShowRowColHeaders($pValue = \false)
    {
    }
    /**
     * Show summary below? (Row/Column outlining)
     *
     * @return boolean
     */
    public function getShowSummaryBelow()
    {
    }
    /**
     * Set show summary below
     *
     * @param boolean $pValue    Show summary below (true/false)
     * @return PHPExcel_Worksheet
     */
    public function setShowSummaryBelow($pValue = \true)
    {
    }
    /**
     * Show summary right? (Row/Column outlining)
     *
     * @return boolean
     */
    public function getShowSummaryRight()
    {
    }
    /**
     * Set show summary right
     *
     * @param boolean $pValue    Show summary right (true/false)
     * @return PHPExcel_Worksheet
     */
    public function setShowSummaryRight($pValue = \true)
    {
    }
    /**
     * Get comments
     *
     * @return PHPExcel_Comment[]
     */
    public function getComments()
    {
    }
    /**
     * Set comments array for the entire sheet.
     *
     * @param array of PHPExcel_Comment
     * @return PHPExcel_Worksheet
     */
    public function setComments($pValue = array())
    {
    }
    /**
     * Get comment for cell
     *
     * @param string $pCellCoordinate    Cell coordinate to get comment for
     * @return PHPExcel_Comment
     * @throws PHPExcel_Exception
     */
    public function getComment($pCellCoordinate = 'A1')
    {
    }
    /**
     * Get comment for cell by using numeric cell coordinates
     *
     * @param int $pColumn    Numeric column coordinate of the cell
     * @param int $pRow        Numeric row coordinate of the cell
     * @return PHPExcel_Comment
     */
    public function getCommentByColumnAndRow($pColumn = 0, $pRow = 1)
    {
    }
    /**
     * Get selected cell
     *
     * @deprecated
     * @return string
     */
    public function getSelectedCell()
    {
    }
    /**
     * Get active cell
     *
     * @return string Example: 'A1'
     */
    public function getActiveCell()
    {
    }
    /**
     * Get selected cells
     *
     * @return string
     */
    public function getSelectedCells()
    {
    }
    /**
     * Selected cell
     *
     * @param    string        $pCoordinate    Cell (i.e. A1)
     * @return PHPExcel_Worksheet
     */
    public function setSelectedCell($pCoordinate = 'A1')
    {
    }
    /**
     * Select a range of cells.
     *
     * @param    string        $pCoordinate    Cell range, examples: 'A1', 'B2:G5', 'A:C', '3:6'
     * @throws    PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function setSelectedCells($pCoordinate = 'A1')
    {
    }
    /**
     * Selected cell by using numeric cell coordinates
     *
     * @param int $pColumn Numeric column coordinate of the cell
     * @param int $pRow Numeric row coordinate of the cell
     * @throws PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function setSelectedCellByColumnAndRow($pColumn = 0, $pRow = 1)
    {
    }
    /**
     * Get right-to-left
     *
     * @return boolean
     */
    public function getRightToLeft()
    {
    }
    /**
     * Set right-to-left
     *
     * @param boolean $value    Right-to-left true/false
     * @return PHPExcel_Worksheet
     */
    public function setRightToLeft($value = \false)
    {
    }
    /**
     * Fill worksheet from values in array
     *
     * @param array $source Source array
     * @param mixed $nullValue Value in source array that stands for blank cell
     * @param string $startCell Insert array starting from this cell address as the top left coordinate
     * @param boolean $strictNullComparison Apply strict comparison when testing for null values in the array
     * @throws PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function fromArray($source = \null, $nullValue = \null, $startCell = 'A1', $strictNullComparison = \false)
    {
    }
    /**
     * Create array from a range of cells
     *
     * @param string $pRange Range of cells (i.e. "A1:B10"), or just one cell (i.e. "A1")
     * @param mixed $nullValue Value returned in the array entry if a cell doesn't exist
     * @param boolean $calculateFormulas Should formulas be calculated?
     * @param boolean $formatData Should formatting be applied to cell values?
     * @param boolean $returnCellRef False - Return a simple array of rows and columns indexed by number counting from zero
     *                               True - Return rows and columns indexed by their actual row and column IDs
     * @return array
     */
    public function rangeToArray($pRange = 'A1', $nullValue = \null, $calculateFormulas = \true, $formatData = \true, $returnCellRef = \false)
    {
    }
    /**
     * Create array from a range of cells
     *
     * @param  string $pNamedRange Name of the Named Range
     * @param  mixed  $nullValue Value returned in the array entry if a cell doesn't exist
     * @param  boolean $calculateFormulas  Should formulas be calculated?
     * @param  boolean $formatData  Should formatting be applied to cell values?
     * @param  boolean $returnCellRef False - Return a simple array of rows and columns indexed by number counting from zero
     *                                True - Return rows and columns indexed by their actual row and column IDs
     * @return array
     * @throws PHPExcel_Exception
     */
    public function namedRangeToArray($pNamedRange = '', $nullValue = \null, $calculateFormulas = \true, $formatData = \true, $returnCellRef = \false)
    {
    }
    /**
     * Create array from worksheet
     *
     * @param mixed $nullValue Value returned in the array entry if a cell doesn't exist
     * @param boolean $calculateFormulas Should formulas be calculated?
     * @param boolean $formatData  Should formatting be applied to cell values?
     * @param boolean $returnCellRef False - Return a simple array of rows and columns indexed by number counting from zero
     *                               True - Return rows and columns indexed by their actual row and column IDs
     * @return array
     */
    public function toArray($nullValue = \null, $calculateFormulas = \true, $formatData = \true, $returnCellRef = \false)
    {
    }
    /**
     * Get row iterator
     *
     * @param   integer   $startRow   The row number at which to start iterating
     * @param   integer   $endRow     The row number at which to stop iterating
     *
     * @return PHPExcel_Worksheet_RowIterator
     */
    public function getRowIterator($startRow = 1, $endRow = \null)
    {
    }
    /**
     * Get column iterator
     *
     * @param   string   $startColumn The column address at which to start iterating
     * @param   string   $endColumn   The column address at which to stop iterating
     *
     * @return PHPExcel_Worksheet_ColumnIterator
     */
    public function getColumnIterator($startColumn = 'A', $endColumn = \null)
    {
    }
    /**
     * Run PHPExcel garabage collector.
     *
     * @return PHPExcel_Worksheet
     */
    public function garbageCollect()
    {
    }
    /**
     * Get hash code
     *
     * @return string    Hash code
     */
    public function getHashCode()
    {
    }
    /**
     * Extract worksheet title from range.
     *
     * Example: extractSheetTitle("testSheet!A1") ==> 'A1'
     * Example: extractSheetTitle("'testSheet 1'!A1", true) ==> array('testSheet 1', 'A1');
     *
     * @param string $pRange    Range to extract title from
     * @param bool $returnRange    Return range? (see example)
     * @return mixed
     */
    public static function extractSheetTitle($pRange, $returnRange = \false)
    {
    }
    /**
     * Get hyperlink
     *
     * @param string $pCellCoordinate    Cell coordinate to get hyperlink for
     */
    public function getHyperlink($pCellCoordinate = 'A1')
    {
    }
    /**
     * Set hyperlnk
     *
     * @param string $pCellCoordinate    Cell coordinate to insert hyperlink
     * @param    PHPExcel_Cell_Hyperlink    $pHyperlink
     * @return PHPExcel_Worksheet
     */
    public function setHyperlink($pCellCoordinate = 'A1', \PHPExcel_Cell_Hyperlink $pHyperlink = \null)
    {
    }
    /**
     * Hyperlink at a specific coordinate exists?
     *
     * @param string $pCoordinate
     * @return boolean
     */
    public function hyperlinkExists($pCoordinate = 'A1')
    {
    }
    /**
     * Get collection of hyperlinks
     *
     * @return PHPExcel_Cell_Hyperlink[]
     */
    public function getHyperlinkCollection()
    {
    }
    /**
     * Get data validation
     *
     * @param string $pCellCoordinate Cell coordinate to get data validation for
     */
    public function getDataValidation($pCellCoordinate = 'A1')
    {
    }
    /**
     * Set data validation
     *
     * @param string $pCellCoordinate    Cell coordinate to insert data validation
     * @param    PHPExcel_Cell_DataValidation    $pDataValidation
     * @return PHPExcel_Worksheet
     */
    public function setDataValidation($pCellCoordinate = 'A1', \PHPExcel_Cell_DataValidation $pDataValidation = \null)
    {
    }
    /**
     * Data validation at a specific coordinate exists?
     *
     * @param string $pCoordinate
     * @return boolean
     */
    public function dataValidationExists($pCoordinate = 'A1')
    {
    }
    /**
     * Get collection of data validations
     *
     * @return PHPExcel_Cell_DataValidation[]
     */
    public function getDataValidationCollection()
    {
    }
    /**
     * Accepts a range, returning it as a range that falls within the current highest row and column of the worksheet
     *
     * @param string $range
     * @return string Adjusted range value
     */
    public function shrinkRangeToFit($range)
    {
    }
    /**
     * Get tab color
     *
     * @return PHPExcel_Style_Color
     */
    public function getTabColor()
    {
    }
    /**
     * Reset tab color
     *
     * @return PHPExcel_Worksheet
     */
    public function resetTabColor()
    {
    }
    /**
     * Tab color set?
     *
     * @return boolean
     */
    public function isTabColorSet()
    {
    }
    /**
     * Copy worksheet (!= clone!)
     *
     * @return PHPExcel_Worksheet
     */
    public function copy()
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
    /**
     * Define the code name of the sheet
     *
     * @param null|string Same rule as Title minus space not allowed (but, like Excel, change silently space to underscore)
     * @return objWorksheet
     * @throws PHPExcel_Exception
     */
    public function setCodeName($pValue = \null)
    {
    }
    /**
     * Return the code name of the sheet
     *
     * @return null|string
     */
    public function getCodeName()
    {
    }
    /**
     * Sheet has a code name ?
     * @return boolean
     */
    public function hasCodeName()
    {
    }
}