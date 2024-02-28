<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet;

class Worksheet implements \PhpOffice\PhpSpreadsheet\IComparable
{
    // Break types
    const BREAK_NONE = 0;
    const BREAK_ROW = 1;
    const BREAK_COLUMN = 2;
    // Sheet state
    const SHEETSTATE_VISIBLE = 'visible';
    const SHEETSTATE_HIDDEN = 'hidden';
    const SHEETSTATE_VERYHIDDEN = 'veryHidden';
    /**
     * Maximum 31 characters allowed for sheet title.
     *
     * @var int
     */
    const SHEET_TITLE_MAXIMUM_LENGTH = 31;
    /**
     * Invalid characters in sheet title.
     *
     * @var array
     */
    private static $invalidCharacters = ['*', ':', '/', '\\', '?', '[', ']'];
    /**
     * Parent spreadsheet.
     *
     * @var Spreadsheet
     */
    private $parent;
    /**
     * Collection of cells.
     *
     * @var Cells
     */
    private $cellCollection;
    /**
     * Collection of row dimensions.
     *
     * @var RowDimension[]
     */
    private $rowDimensions = [];
    /**
     * Default row dimension.
     *
     * @var RowDimension
     */
    private $defaultRowDimension;
    /**
     * Collection of column dimensions.
     *
     * @var ColumnDimension[]
     */
    private $columnDimensions = [];
    /**
     * Default column dimension.
     *
     * @var ColumnDimension
     */
    private $defaultColumnDimension;
    /**
     * Collection of drawings.
     *
     * @var BaseDrawing[]
     */
    private $drawingCollection;
    /**
     * Collection of Chart objects.
     *
     * @var Chart[]
     */
    private $chartCollection = [];
    /**
     * Worksheet title.
     *
     * @var string
     */
    private $title;
    /**
     * Sheet state.
     *
     * @var string
     */
    private $sheetState;
    /**
     * Page setup.
     *
     * @var PageSetup
     */
    private $pageSetup;
    /**
     * Page margins.
     *
     * @var PageMargins
     */
    private $pageMargins;
    /**
     * Page header/footer.
     *
     * @var HeaderFooter
     */
    private $headerFooter;
    /**
     * Sheet view.
     *
     * @var SheetView
     */
    private $sheetView;
    /**
     * Protection.
     *
     * @var Protection
     */
    private $protection;
    /**
     * Collection of styles.
     *
     * @var Style[]
     */
    private $styles = [];
    /**
     * Conditional styles. Indexed by cell coordinate, e.g. 'A1'.
     *
     * @var array
     */
    private $conditionalStylesCollection = [];
    /**
     * Is the current cell collection sorted already?
     *
     * @var bool
     */
    private $cellCollectionIsSorted = false;
    /**
     * Collection of breaks.
     *
     * @var array
     */
    private $breaks = [];
    /**
     * Collection of merged cell ranges.
     *
     * @var array
     */
    private $mergeCells = [];
    /**
     * Collection of protected cell ranges.
     *
     * @var array
     */
    private $protectedCells = [];
    /**
     * Autofilter Range and selection.
     *
     * @var AutoFilter
     */
    private $autoFilter;
    /**
     * Freeze pane.
     *
     * @var null|string
     */
    private $freezePane;
    /**
     * Default position of the right bottom pane.
     *
     * @var null|string
     */
    private $topLeftCell;
    /**
     * Show gridlines?
     *
     * @var bool
     */
    private $showGridlines = true;
    /**
     * Print gridlines?
     *
     * @var bool
     */
    private $printGridlines = false;
    /**
     * Show row and column headers?
     *
     * @var bool
     */
    private $showRowColHeaders = true;
    /**
     * Show summary below? (Row/Column outline).
     *
     * @var bool
     */
    private $showSummaryBelow = true;
    /**
     * Show summary right? (Row/Column outline).
     *
     * @var bool
     */
    private $showSummaryRight = true;
    /**
     * Collection of comments.
     *
     * @var Comment[]
     */
    private $comments = [];
    /**
     * Active cell. (Only one!).
     *
     * @var string
     */
    private $activeCell = 'A1';
    /**
     * Selected cells.
     *
     * @var string
     */
    private $selectedCells = 'A1';
    /**
     * Cached highest column.
     *
     * @var string
     */
    private $cachedHighestColumn = 'A';
    /**
     * Cached highest row.
     *
     * @var int
     */
    private $cachedHighestRow = 1;
    /**
     * Right-to-left?
     *
     * @var bool
     */
    private $rightToLeft = false;
    /**
     * Hyperlinks. Indexed by cell coordinate, e.g. 'A1'.
     *
     * @var array
     */
    private $hyperlinkCollection = [];
    /**
     * Data validation objects. Indexed by cell coordinate, e.g. 'A1'.
     *
     * @var array
     */
    private $dataValidationCollection = [];
    /**
     * Tab color.
     *
     * @var Color
     */
    private $tabColor;
    /**
     * Dirty flag.
     *
     * @var bool
     */
    private $dirty = true;
    /**
     * Hash.
     *
     * @var string
     */
    private $hash;
    /**
     * CodeName.
     *
     * @var string
     */
    private $codeName;
    /**
     * Create a new worksheet.
     *
     * @param Spreadsheet $parent
     * @param string $pTitle
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Spreadsheet $parent = null, $pTitle = 'Worksheet')
    {
    }
    /**
     * Disconnect all cells from this Worksheet object,
     * typically so that the worksheet object can be unset.
     */
    public function disconnectCells()
    {
    }
    /**
     * Code to execute when this worksheet is unset().
     */
    public function __destruct()
    {
    }
    /**
     * Return the cell collection.
     *
     * @return Cells
     */
    public function getCellCollection()
    {
    }
    /**
     * Get array of invalid characters for sheet title.
     *
     * @return array
     */
    public static function getInvalidCharacters()
    {
    }
    /**
     * Check sheet code name for valid Excel syntax.
     *
     * @param string $pValue The string to check
     *
     * @throws Exception
     *
     * @return string The valid string
     */
    private static function checkSheetCodeName($pValue)
    {
    }
    /**
     * Check sheet title for valid Excel syntax.
     *
     * @param string $pValue The string to check
     *
     * @throws Exception
     *
     * @return string The valid string
     */
    private static function checkSheetTitle($pValue)
    {
    }
    /**
     * Get a sorted list of all cell coordinates currently held in the collection by row and column.
     *
     * @param bool $sorted Also sort the cell collection?
     *
     * @return string[]
     */
    public function getCoordinates($sorted = true)
    {
    }
    /**
     * Get collection of row dimensions.
     *
     * @return RowDimension[]
     */
    public function getRowDimensions()
    {
    }
    /**
     * Get default row dimension.
     *
     * @return RowDimension
     */
    public function getDefaultRowDimension()
    {
    }
    /**
     * Get collection of column dimensions.
     *
     * @return ColumnDimension[]
     */
    public function getColumnDimensions()
    {
    }
    /**
     * Get default column dimension.
     *
     * @return ColumnDimension
     */
    public function getDefaultColumnDimension()
    {
    }
    /**
     * Get collection of drawings.
     *
     * @return BaseDrawing[]
     */
    public function getDrawingCollection()
    {
    }
    /**
     * Get collection of charts.
     *
     * @return Chart[]
     */
    public function getChartCollection()
    {
    }
    /**
     * Add chart.
     *
     * @param Chart $pChart
     * @param null|int $iChartIndex Index where chart should go (0,1,..., or null for last)
     *
     * @return Chart
     */
    public function addChart(\PhpOffice\PhpSpreadsheet\Chart\Chart $pChart, $iChartIndex = null)
    {
    }
    /**
     * Return the count of charts on this worksheet.
     *
     * @return int The number of charts
     */
    public function getChartCount()
    {
    }
    /**
     * Get a chart by its index position.
     *
     * @param string $index Chart index position
     *
     * @return Chart|false
     */
    public function getChartByIndex($index)
    {
    }
    /**
     * Return an array of the names of charts on this worksheet.
     *
     * @return string[] The names of charts
     */
    public function getChartNames()
    {
    }
    /**
     * Get a chart by name.
     *
     * @param string $chartName Chart name
     *
     * @return Chart|false
     */
    public function getChartByName($chartName)
    {
    }
    /**
     * Refresh column dimensions.
     *
     * @return Worksheet
     */
    public function refreshColumnDimensions()
    {
    }
    /**
     * Refresh row dimensions.
     *
     * @return Worksheet
     */
    public function refreshRowDimensions()
    {
    }
    /**
     * Calculate worksheet dimension.
     *
     * @return string String containing the dimension of this worksheet
     */
    public function calculateWorksheetDimension()
    {
    }
    /**
     * Calculate worksheet data dimension.
     *
     * @return string String containing the dimension of this worksheet that actually contain data
     */
    public function calculateWorksheetDataDimension()
    {
    }
    /**
     * Calculate widths for auto-size columns.
     *
     * @return Worksheet;
     */
    public function calculateColumnWidths()
    {
    }
    /**
     * Get parent.
     *
     * @return Spreadsheet
     */
    public function getParent()
    {
    }
    /**
     * Re-bind parent.
     *
     * @param Spreadsheet $parent
     *
     * @return Worksheet
     */
    public function rebindParent(\PhpOffice\PhpSpreadsheet\Spreadsheet $parent)
    {
    }
    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
    }
    /**
     * Set title.
     *
     * @param string $pValue String containing the dimension of this worksheet
     * @param bool $updateFormulaCellReferences Flag indicating whether cell references in formulae should
     *            be updated to reflect the new sheet name.
     *          This should be left as the default true, unless you are
     *          certain that no formula cells on any worksheet contain
     *          references to this worksheet
     * @param bool $validate False to skip validation of new title. WARNING: This should only be set
     *                       at parse time (by Readers), where titles can be assumed to be valid.
     *
     * @return Worksheet
     */
    public function setTitle($pValue, $updateFormulaCellReferences = true, $validate = true)
    {
    }
    /**
     * Get sheet state.
     *
     * @return string Sheet state (visible, hidden, veryHidden)
     */
    public function getSheetState()
    {
    }
    /**
     * Set sheet state.
     *
     * @param string $value Sheet state (visible, hidden, veryHidden)
     *
     * @return Worksheet
     */
    public function setSheetState($value)
    {
    }
    /**
     * Get page setup.
     *
     * @return PageSetup
     */
    public function getPageSetup()
    {
    }
    /**
     * Set page setup.
     *
     * @param PageSetup $pValue
     *
     * @return Worksheet
     */
    public function setPageSetup(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup $pValue)
    {
    }
    /**
     * Get page margins.
     *
     * @return PageMargins
     */
    public function getPageMargins()
    {
    }
    /**
     * Set page margins.
     *
     * @param PageMargins $pValue
     *
     * @return Worksheet
     */
    public function setPageMargins(\PhpOffice\PhpSpreadsheet\Worksheet\PageMargins $pValue)
    {
    }
    /**
     * Get page header/footer.
     *
     * @return HeaderFooter
     */
    public function getHeaderFooter()
    {
    }
    /**
     * Set page header/footer.
     *
     * @param HeaderFooter $pValue
     *
     * @return Worksheet
     */
    public function setHeaderFooter(\PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooter $pValue)
    {
    }
    /**
     * Get sheet view.
     *
     * @return SheetView
     */
    public function getSheetView()
    {
    }
    /**
     * Set sheet view.
     *
     * @param SheetView $pValue
     *
     * @return Worksheet
     */
    public function setSheetView(\PhpOffice\PhpSpreadsheet\Worksheet\SheetView $pValue)
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
     * Set Protection.
     *
     * @param Protection $pValue
     *
     * @return Worksheet
     */
    public function setProtection(\PhpOffice\PhpSpreadsheet\Worksheet\Protection $pValue)
    {
    }
    /**
     * Get highest worksheet column.
     *
     * @param string $row Return the data highest column for the specified row,
     *                                     or the highest column of any row if no row number is passed
     *
     * @return string Highest column name
     */
    public function getHighestColumn($row = null)
    {
    }
    /**
     * Get highest worksheet column that contains data.
     *
     * @param string $row Return the highest data column for the specified row,
     *                                     or the highest data column of any row if no row number is passed
     *
     * @return string Highest column name that contains data
     */
    public function getHighestDataColumn($row = null)
    {
    }
    /**
     * Get highest worksheet row.
     *
     * @param string $column Return the highest data row for the specified column,
     *                                     or the highest row of any column if no column letter is passed
     *
     * @return int Highest row number
     */
    public function getHighestRow($column = null)
    {
    }
    /**
     * Get highest worksheet row that contains data.
     *
     * @param string $column Return the highest data row for the specified column,
     *                                     or the highest data row of any column if no column letter is passed
     *
     * @return string Highest row number that contains data
     */
    public function getHighestDataRow($column = null)
    {
    }
    /**
     * Get highest worksheet column and highest row that have cell records.
     *
     * @return array Highest column name and highest row number
     */
    public function getHighestRowAndColumn()
    {
    }
    /**
     * Set a cell value.
     *
     * @param string $pCoordinate Coordinate of the cell, eg: 'A1'
     * @param mixed $pValue Value of the cell
     *
     * @return Worksheet
     */
    public function setCellValue($pCoordinate, $pValue)
    {
    }
    /**
     * Set a cell value by using numeric cell coordinates.
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     * @param mixed $value Value of the cell
     *
     * @return Worksheet
     */
    public function setCellValueByColumnAndRow($columnIndex, $row, $value)
    {
    }
    /**
     * Set a cell value.
     *
     * @param string $pCoordinate Coordinate of the cell, eg: 'A1'
     * @param mixed $pValue Value of the cell
     * @param string $pDataType Explicit data type, see DataType::TYPE_*
     *
     * @return Worksheet
     */
    public function setCellValueExplicit($pCoordinate, $pValue, $pDataType)
    {
    }
    /**
     * Set a cell value by using numeric cell coordinates.
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     * @param mixed $value Value of the cell
     * @param string $dataType Explicit data type, see DataType::TYPE_*
     *
     * @return Worksheet
     */
    public function setCellValueExplicitByColumnAndRow($columnIndex, $row, $value, $dataType)
    {
    }
    /**
     * Get cell at a specific coordinate.
     *
     * @param string $pCoordinate Coordinate of the cell, eg: 'A1'
     * @param bool $createIfNotExists Flag indicating whether a new cell should be created if it doesn't
     *                                       already exist, or a null should be returned instead
     *
     * @throws Exception
     *
     * @return null|Cell Cell that was found/created or null
     */
    public function getCell($pCoordinate, $createIfNotExists = true)
    {
    }
    /**
     * Get cell at a specific coordinate by using numeric cell coordinates.
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     * @param bool $createIfNotExists Flag indicating whether a new cell should be created if it doesn't
     *                                       already exist, or a null should be returned instead
     *
     * @return null|Cell Cell that was found/created or null
     */
    public function getCellByColumnAndRow($columnIndex, $row, $createIfNotExists = true)
    {
    }
    /**
     * Create a new cell at the specified coordinate.
     *
     * @param string $pCoordinate Coordinate of the cell
     *
     * @return Cell Cell that was created
     */
    private function createNewCell($pCoordinate)
    {
    }
    /**
     * Does the cell at a specific coordinate exist?
     *
     * @param string $pCoordinate Coordinate of the cell eg: 'A1'
     *
     * @throws Exception
     *
     * @return bool
     */
    public function cellExists($pCoordinate)
    {
    }
    /**
     * Cell at a specific coordinate by using numeric cell coordinates exists?
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     *
     * @return bool
     */
    public function cellExistsByColumnAndRow($columnIndex, $row)
    {
    }
    /**
     * Get row dimension at a specific row.
     *
     * @param int $pRow Numeric index of the row
     * @param bool $create
     *
     * @return RowDimension
     */
    public function getRowDimension($pRow, $create = true)
    {
    }
    /**
     * Get column dimension at a specific column.
     *
     * @param string $pColumn String index of the column eg: 'A'
     * @param bool $create
     *
     * @return ColumnDimension
     */
    public function getColumnDimension($pColumn, $create = true)
    {
    }
    /**
     * Get column dimension at a specific column by using numeric cell coordinates.
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     *
     * @return ColumnDimension
     */
    public function getColumnDimensionByColumn($columnIndex)
    {
    }
    /**
     * Get styles.
     *
     * @return Style[]
     */
    public function getStyles()
    {
    }
    /**
     * Get style for cell.
     *
     * @param string $pCellCoordinate Cell coordinate (or range) to get style for, eg: 'A1'
     *
     * @throws Exception
     *
     * @return Style
     */
    public function getStyle($pCellCoordinate)
    {
    }
    /**
     * Get conditional styles for a cell.
     *
     * @param string $pCoordinate eg: 'A1'
     *
     * @return Conditional[]
     */
    public function getConditionalStyles($pCoordinate)
    {
    }
    /**
     * Do conditional styles exist for this cell?
     *
     * @param string $pCoordinate eg: 'A1'
     *
     * @return bool
     */
    public function conditionalStylesExists($pCoordinate)
    {
    }
    /**
     * Removes conditional styles for a cell.
     *
     * @param string $pCoordinate eg: 'A1'
     *
     * @return Worksheet
     */
    public function removeConditionalStyles($pCoordinate)
    {
    }
    /**
     * Get collection of conditional styles.
     *
     * @return array
     */
    public function getConditionalStylesCollection()
    {
    }
    /**
     * Set conditional styles.
     *
     * @param string $pCoordinate eg: 'A1'
     * @param $pValue Conditional[]
     *
     * @return Worksheet
     */
    public function setConditionalStyles($pCoordinate, $pValue)
    {
    }
    /**
     * Get style for cell by using numeric cell coordinates.
     *
     * @param int $columnIndex1 Numeric column coordinate of the cell
     * @param int $row1 Numeric row coordinate of the cell
     * @param null|int $columnIndex2 Numeric column coordinate of the range cell
     * @param null|int $row2 Numeric row coordinate of the range cell
     *
     * @return Style
     */
    public function getStyleByColumnAndRow($columnIndex1, $row1, $columnIndex2 = null, $row2 = null)
    {
    }
    /**
     * Duplicate cell style to a range of cells.
     *
     * Please note that this will overwrite existing cell styles for cells in range!
     *
     * @param Style $pCellStyle Cell style to duplicate
     * @param string $pRange Range of cells (i.e. "A1:B10"), or just one cell (i.e. "A1")
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function duplicateStyle(\PhpOffice\PhpSpreadsheet\Style\Style $pCellStyle, $pRange)
    {
    }
    /**
     * Duplicate conditional style to a range of cells.
     *
     * Please note that this will overwrite existing cell styles for cells in range!
     *
     * @param Conditional[] $pCellStyle Cell style to duplicate
     * @param string $pRange Range of cells (i.e. "A1:B10"), or just one cell (i.e. "A1")
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function duplicateConditionalStyle(array $pCellStyle, $pRange = '')
    {
    }
    /**
     * Set break on a cell.
     *
     * @param string $pCoordinate Cell coordinate (e.g. A1)
     * @param int $pBreak Break type (type of Worksheet::BREAK_*)
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function setBreak($pCoordinate, $pBreak)
    {
    }
    /**
     * Set break on a cell by using numeric cell coordinates.
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     * @param int $break Break type (type of Worksheet::BREAK_*)
     *
     * @return Worksheet
     */
    public function setBreakByColumnAndRow($columnIndex, $row, $break)
    {
    }
    /**
     * Get breaks.
     *
     * @return array[]
     */
    public function getBreaks()
    {
    }
    /**
     * Set merge on a cell range.
     *
     * @param string $pRange Cell range (e.g. A1:E1)
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function mergeCells($pRange)
    {
    }
    /**
     * Set merge on a cell range by using numeric cell coordinates.
     *
     * @param int $columnIndex1 Numeric column coordinate of the first cell
     * @param int $row1 Numeric row coordinate of the first cell
     * @param int $columnIndex2 Numeric column coordinate of the last cell
     * @param int $row2 Numeric row coordinate of the last cell
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function mergeCellsByColumnAndRow($columnIndex1, $row1, $columnIndex2, $row2)
    {
    }
    /**
     * Remove merge on a cell range.
     *
     * @param string $pRange Cell range (e.g. A1:E1)
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function unmergeCells($pRange)
    {
    }
    /**
     * Remove merge on a cell range by using numeric cell coordinates.
     *
     * @param int $columnIndex1 Numeric column coordinate of the first cell
     * @param int $row1 Numeric row coordinate of the first cell
     * @param int $columnIndex2 Numeric column coordinate of the last cell
     * @param int $row2 Numeric row coordinate of the last cell
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function unmergeCellsByColumnAndRow($columnIndex1, $row1, $columnIndex2, $row2)
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
     * @param array $pValue
     *
     * @return Worksheet
     */
    public function setMergeCells(array $pValue)
    {
    }
    /**
     * Set protection on a cell range.
     *
     * @param string $pRange Cell (e.g. A1) or cell range (e.g. A1:E1)
     * @param string $pPassword Password to unlock the protection
     * @param bool $pAlreadyHashed If the password has already been hashed, set this to true
     *
     * @return Worksheet
     */
    public function protectCells($pRange, $pPassword, $pAlreadyHashed = false)
    {
    }
    /**
     * Set protection on a cell range by using numeric cell coordinates.
     *
     * @param int $columnIndex1 Numeric column coordinate of the first cell
     * @param int $row1 Numeric row coordinate of the first cell
     * @param int $columnIndex2 Numeric column coordinate of the last cell
     * @param int $row2 Numeric row coordinate of the last cell
     * @param string $password Password to unlock the protection
     * @param bool $alreadyHashed If the password has already been hashed, set this to true
     *
     * @return Worksheet
     */
    public function protectCellsByColumnAndRow($columnIndex1, $row1, $columnIndex2, $row2, $password, $alreadyHashed = false)
    {
    }
    /**
     * Remove protection on a cell range.
     *
     * @param string $pRange Cell (e.g. A1) or cell range (e.g. A1:E1)
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function unprotectCells($pRange)
    {
    }
    /**
     * Remove protection on a cell range by using numeric cell coordinates.
     *
     * @param int $columnIndex1 Numeric column coordinate of the first cell
     * @param int $row1 Numeric row coordinate of the first cell
     * @param int $columnIndex2 Numeric column coordinate of the last cell
     * @param int $row2 Numeric row coordinate of the last cell
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function unprotectCellsByColumnAndRow($columnIndex1, $row1, $columnIndex2, $row2)
    {
    }
    /**
     * Get protected cells.
     *
     * @return array[]
     */
    public function getProtectedCells()
    {
    }
    /**
     * Get Autofilter.
     *
     * @return AutoFilter
     */
    public function getAutoFilter()
    {
    }
    /**
     * Set AutoFilter.
     *
     * @param AutoFilter|string $pValue
     *            A simple string containing a Cell range like 'A1:E10' is permitted for backward compatibility
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function setAutoFilter($pValue)
    {
    }
    /**
     * Set Autofilter Range by using numeric cell coordinates.
     *
     * @param int $columnIndex1 Numeric column coordinate of the first cell
     * @param int $row1 Numeric row coordinate of the first cell
     * @param int $columnIndex2 Numeric column coordinate of the second cell
     * @param int $row2 Numeric row coordinate of the second cell
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function setAutoFilterByColumnAndRow($columnIndex1, $row1, $columnIndex2, $row2)
    {
    }
    /**
     * Remove autofilter.
     *
     * @return Worksheet
     */
    public function removeAutoFilter()
    {
    }
    /**
     * Get Freeze Pane.
     *
     * @return string
     */
    public function getFreezePane()
    {
    }
    /**
     * Freeze Pane.
     *
     * Examples:
     *
     *     - A2 will freeze the rows above cell A2 (i.e row 1)
     *     - B1 will freeze the columns to the left of cell B1 (i.e column A)
     *     - B2 will freeze the rows above and to the left of cell B2 (i.e row 1 and column A)
     *
     * @param null|string $cell Position of the split
     * @param null|string $topLeftCell default position of the right bottom pane
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function freezePane($cell, $topLeftCell = null)
    {
    }
    /**
     * Freeze Pane by using numeric cell coordinates.
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     *
     * @return Worksheet
     */
    public function freezePaneByColumnAndRow($columnIndex, $row)
    {
    }
    /**
     * Unfreeze Pane.
     *
     * @return Worksheet
     */
    public function unfreezePane()
    {
    }
    /**
     * Get the default position of the right bottom pane.
     *
     * @return int
     */
    public function getTopLeftCell()
    {
    }
    /**
     * Insert a new row, updating all possible related data.
     *
     * @param int $pBefore Insert before this one
     * @param int $pNumRows Number of rows to insert
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function insertNewRowBefore($pBefore, $pNumRows = 1)
    {
    }
    /**
     * Insert a new column, updating all possible related data.
     *
     * @param int $pBefore Insert before this one, eg: 'A'
     * @param int $pNumCols Number of columns to insert
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function insertNewColumnBefore($pBefore, $pNumCols = 1)
    {
    }
    /**
     * Insert a new column, updating all possible related data.
     *
     * @param int $beforeColumnIndex Insert before this one (numeric column coordinate of the cell)
     * @param int $pNumCols Number of columns to insert
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function insertNewColumnBeforeByIndex($beforeColumnIndex, $pNumCols = 1)
    {
    }
    /**
     * Delete a row, updating all possible related data.
     *
     * @param int $pRow Remove starting with this one
     * @param int $pNumRows Number of rows to remove
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function removeRow($pRow, $pNumRows = 1)
    {
    }
    /**
     * Remove a column, updating all possible related data.
     *
     * @param string $pColumn Remove starting with this one, eg: 'A'
     * @param int $pNumCols Number of columns to remove
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function removeColumn($pColumn, $pNumCols = 1)
    {
    }
    /**
     * Remove a column, updating all possible related data.
     *
     * @param int $columnIndex Remove starting with this one (numeric column coordinate of the cell)
     * @param int $numColumns Number of columns to remove
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function removeColumnByIndex($columnIndex, $numColumns = 1)
    {
    }
    /**
     * Show gridlines?
     *
     * @return bool
     */
    public function getShowGridlines()
    {
    }
    /**
     * Set show gridlines.
     *
     * @param bool $pValue Show gridlines (true/false)
     *
     * @return Worksheet
     */
    public function setShowGridlines($pValue)
    {
    }
    /**
     * Print gridlines?
     *
     * @return bool
     */
    public function getPrintGridlines()
    {
    }
    /**
     * Set print gridlines.
     *
     * @param bool $pValue Print gridlines (true/false)
     *
     * @return Worksheet
     */
    public function setPrintGridlines($pValue)
    {
    }
    /**
     * Show row and column headers?
     *
     * @return bool
     */
    public function getShowRowColHeaders()
    {
    }
    /**
     * Set show row and column headers.
     *
     * @param bool $pValue Show row and column headers (true/false)
     *
     * @return Worksheet
     */
    public function setShowRowColHeaders($pValue)
    {
    }
    /**
     * Show summary below? (Row/Column outlining).
     *
     * @return bool
     */
    public function getShowSummaryBelow()
    {
    }
    /**
     * Set show summary below.
     *
     * @param bool $pValue Show summary below (true/false)
     *
     * @return Worksheet
     */
    public function setShowSummaryBelow($pValue)
    {
    }
    /**
     * Show summary right? (Row/Column outlining).
     *
     * @return bool
     */
    public function getShowSummaryRight()
    {
    }
    /**
     * Set show summary right.
     *
     * @param bool $pValue Show summary right (true/false)
     *
     * @return Worksheet
     */
    public function setShowSummaryRight($pValue)
    {
    }
    /**
     * Get comments.
     *
     * @return Comment[]
     */
    public function getComments()
    {
    }
    /**
     * Set comments array for the entire sheet.
     *
     * @param Comment[] $pValue
     *
     * @return Worksheet
     */
    public function setComments(array $pValue)
    {
    }
    /**
     * Get comment for cell.
     *
     * @param string $pCellCoordinate Cell coordinate to get comment for, eg: 'A1'
     *
     * @throws Exception
     *
     * @return Comment
     */
    public function getComment($pCellCoordinate)
    {
    }
    /**
     * Get comment for cell by using numeric cell coordinates.
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     *
     * @return Comment
     */
    public function getCommentByColumnAndRow($columnIndex, $row)
    {
    }
    /**
     * Get active cell.
     *
     * @return string Example: 'A1'
     */
    public function getActiveCell()
    {
    }
    /**
     * Get selected cells.
     *
     * @return string
     */
    public function getSelectedCells()
    {
    }
    /**
     * Selected cell.
     *
     * @param string $pCoordinate Cell (i.e. A1)
     *
     * @return Worksheet
     */
    public function setSelectedCell($pCoordinate)
    {
    }
    /**
     * Select a range of cells.
     *
     * @param string $pCoordinate Cell range, examples: 'A1', 'B2:G5', 'A:C', '3:6'
     *
     * @return Worksheet
     */
    public function setSelectedCells($pCoordinate)
    {
    }
    /**
     * Selected cell by using numeric cell coordinates.
     *
     * @param int $columnIndex Numeric column coordinate of the cell
     * @param int $row Numeric row coordinate of the cell
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function setSelectedCellByColumnAndRow($columnIndex, $row)
    {
    }
    /**
     * Get right-to-left.
     *
     * @return bool
     */
    public function getRightToLeft()
    {
    }
    /**
     * Set right-to-left.
     *
     * @param bool $value Right-to-left true/false
     *
     * @return Worksheet
     */
    public function setRightToLeft($value)
    {
    }
    /**
     * Fill worksheet from values in array.
     *
     * @param array $source Source array
     * @param mixed $nullValue Value in source array that stands for blank cell
     * @param string $startCell Insert array starting from this cell address as the top left coordinate
     * @param bool $strictNullComparison Apply strict comparison when testing for null values in the array
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function fromArray(array $source, $nullValue = null, $startCell = 'A1', $strictNullComparison = false)
    {
    }
    /**
     * Create array from a range of cells.
     *
     * @param string $pRange Range of cells (i.e. "A1:B10"), or just one cell (i.e. "A1")
     * @param mixed $nullValue Value returned in the array entry if a cell doesn't exist
     * @param bool $calculateFormulas Should formulas be calculated?
     * @param bool $formatData Should formatting be applied to cell values?
     * @param bool $returnCellRef False - Return a simple array of rows and columns indexed by number counting from zero
     *                               True - Return rows and columns indexed by their actual row and column IDs
     *
     * @return array
     */
    public function rangeToArray($pRange, $nullValue = null, $calculateFormulas = true, $formatData = true, $returnCellRef = false)
    {
    }
    /**
     * Create array from a range of cells.
     *
     * @param string $pNamedRange Name of the Named Range
     * @param mixed $nullValue Value returned in the array entry if a cell doesn't exist
     * @param bool $calculateFormulas Should formulas be calculated?
     * @param bool $formatData Should formatting be applied to cell values?
     * @param bool $returnCellRef False - Return a simple array of rows and columns indexed by number counting from zero
     *                                True - Return rows and columns indexed by their actual row and column IDs
     *
     * @throws Exception
     *
     * @return array
     */
    public function namedRangeToArray($pNamedRange, $nullValue = null, $calculateFormulas = true, $formatData = true, $returnCellRef = false)
    {
    }
    /**
     * Create array from worksheet.
     *
     * @param mixed $nullValue Value returned in the array entry if a cell doesn't exist
     * @param bool $calculateFormulas Should formulas be calculated?
     * @param bool $formatData Should formatting be applied to cell values?
     * @param bool $returnCellRef False - Return a simple array of rows and columns indexed by number counting from zero
     *                               True - Return rows and columns indexed by their actual row and column IDs
     *
     * @return array
     */
    public function toArray($nullValue = null, $calculateFormulas = true, $formatData = true, $returnCellRef = false)
    {
    }
    /**
     * Get row iterator.
     *
     * @param int $startRow The row number at which to start iterating
     * @param int $endRow The row number at which to stop iterating
     *
     * @return RowIterator
     */
    public function getRowIterator($startRow = 1, $endRow = null)
    {
    }
    /**
     * Get column iterator.
     *
     * @param string $startColumn The column address at which to start iterating
     * @param string $endColumn The column address at which to stop iterating
     *
     * @return ColumnIterator
     */
    public function getColumnIterator($startColumn = 'A', $endColumn = null)
    {
    }
    /**
     * Run PhpSpreadsheet garbage collector.
     *
     * @return Worksheet
     */
    public function garbageCollect()
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
     * Extract worksheet title from range.
     *
     * Example: extractSheetTitle("testSheet!A1") ==> 'A1'
     * Example: extractSheetTitle("'testSheet 1'!A1", true) ==> ['testSheet 1', 'A1'];
     *
     * @param string $pRange Range to extract title from
     * @param bool $returnRange Return range? (see example)
     *
     * @return mixed
     */
    public static function extractSheetTitle($pRange, $returnRange = false)
    {
    }
    /**
     * Get hyperlink.
     *
     * @param string $pCellCoordinate Cell coordinate to get hyperlink for, eg: 'A1'
     *
     * @return Hyperlink
     */
    public function getHyperlink($pCellCoordinate)
    {
    }
    /**
     * Set hyperlink.
     *
     * @param string $pCellCoordinate Cell coordinate to insert hyperlink, eg: 'A1'
     * @param null|Hyperlink $pHyperlink
     *
     * @return Worksheet
     */
    public function setHyperlink($pCellCoordinate, \PhpOffice\PhpSpreadsheet\Cell\Hyperlink $pHyperlink = null)
    {
    }
    /**
     * Hyperlink at a specific coordinate exists?
     *
     * @param string $pCoordinate eg: 'A1'
     *
     * @return bool
     */
    public function hyperlinkExists($pCoordinate)
    {
    }
    /**
     * Get collection of hyperlinks.
     *
     * @return Hyperlink[]
     */
    public function getHyperlinkCollection()
    {
    }
    /**
     * Get data validation.
     *
     * @param string $pCellCoordinate Cell coordinate to get data validation for, eg: 'A1'
     *
     * @return DataValidation
     */
    public function getDataValidation($pCellCoordinate)
    {
    }
    /**
     * Set data validation.
     *
     * @param string $pCellCoordinate Cell coordinate to insert data validation, eg: 'A1'
     * @param null|DataValidation $pDataValidation
     *
     * @return Worksheet
     */
    public function setDataValidation($pCellCoordinate, \PhpOffice\PhpSpreadsheet\Cell\DataValidation $pDataValidation = null)
    {
    }
    /**
     * Data validation at a specific coordinate exists?
     *
     * @param string $pCoordinate eg: 'A1'
     *
     * @return bool
     */
    public function dataValidationExists($pCoordinate)
    {
    }
    /**
     * Get collection of data validations.
     *
     * @return DataValidation[]
     */
    public function getDataValidationCollection()
    {
    }
    /**
     * Accepts a range, returning it as a range that falls within the current highest row and column of the worksheet.
     *
     * @param string $range
     *
     * @return string Adjusted range value
     */
    public function shrinkRangeToFit($range)
    {
    }
    /**
     * Get tab color.
     *
     * @return Color
     */
    public function getTabColor()
    {
    }
    /**
     * Reset tab color.
     *
     * @return Worksheet
     */
    public function resetTabColor()
    {
    }
    /**
     * Tab color set?
     *
     * @return bool
     */
    public function isTabColorSet()
    {
    }
    /**
     * Copy worksheet (!= clone!).
     *
     * @return Worksheet
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
     * Define the code name of the sheet.
     *
     * @param string $pValue Same rule as Title minus space not allowed (but, like Excel, change
     *                       silently space to underscore)
     * @param bool $validate False to skip validation of new title. WARNING: This should only be set
     *                       at parse time (by Readers), where titles can be assumed to be valid.
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function setCodeName($pValue, $validate = true)
    {
    }
    /**
     * Return the code name of the sheet.
     *
     * @return null|string
     */
    public function getCodeName()
    {
    }
    /**
     * Sheet has a code name ?
     *
     * @return bool
     */
    public function hasCodeName()
    {
    }
}