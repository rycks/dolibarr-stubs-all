<?php

namespace PhpOffice\PhpSpreadsheet;

class Spreadsheet
{
    // Allowable values for workbook window visilbity
    const VISIBILITY_VISIBLE = 'visible';
    const VISIBILITY_HIDDEN = 'hidden';
    const VISIBILITY_VERY_HIDDEN = 'veryHidden';
    private static $workbookViewVisibilityValues = [self::VISIBILITY_VISIBLE, self::VISIBILITY_HIDDEN, self::VISIBILITY_VERY_HIDDEN];
    /**
     * Unique ID.
     *
     * @var string
     */
    private $uniqueID;
    /**
     * Document properties.
     *
     * @var Document\Properties
     */
    private $properties;
    /**
     * Document security.
     *
     * @var Document\Security
     */
    private $security;
    /**
     * Collection of Worksheet objects.
     *
     * @var Worksheet[]
     */
    private $workSheetCollection = [];
    /**
     * Calculation Engine.
     *
     * @var Calculation
     */
    private $calculationEngine;
    /**
     * Active sheet index.
     *
     * @var int
     */
    private $activeSheetIndex = 0;
    /**
     * Named ranges.
     *
     * @var NamedRange[]
     */
    private $namedRanges = [];
    /**
     * CellXf supervisor.
     *
     * @var Style
     */
    private $cellXfSupervisor;
    /**
     * CellXf collection.
     *
     * @var Style[]
     */
    private $cellXfCollection = [];
    /**
     * CellStyleXf collection.
     *
     * @var Style[]
     */
    private $cellStyleXfCollection = [];
    /**
     * hasMacros : this workbook have macros ?
     *
     * @var bool
     */
    private $hasMacros = false;
    /**
     * macrosCode : all macros code as binary data (the vbaProject.bin file, this include form, code,  etc.), null if no macro.
     *
     * @var string
     */
    private $macrosCode;
    /**
     * macrosCertificate : if macros are signed, contains binary data vbaProjectSignature.bin file, null if not signed.
     *
     * @var string
     */
    private $macrosCertificate;
    /**
     * ribbonXMLData : null if workbook is'nt Excel 2007 or not contain a customized UI.
     *
     * @var null|string
     */
    private $ribbonXMLData;
    /**
     * ribbonBinObjects : null if workbook is'nt Excel 2007 or not contain embedded objects (picture(s)) for Ribbon Elements
     * ignored if $ribbonXMLData is null.
     *
     * @var null|array
     */
    private $ribbonBinObjects;
    /**
     * List of unparsed loaded data for export to same format with better compatibility.
     * It has to be minimized when the library start to support currently unparsed data.
     *
     * @var array
     */
    private $unparsedLoadedData = [];
    /**
     * Controls visibility of the horizonal scroll bar in the application.
     *
     * @var bool
     */
    private $showHorizontalScroll = true;
    /**
     * Controls visibility of the horizonal scroll bar in the application.
     *
     * @var bool
     */
    private $showVerticalScroll = true;
    /**
     * Controls visibility of the sheet tabs in the application.
     *
     * @var bool
     */
    private $showSheetTabs = true;
    /**
     * Specifies a boolean value that indicates whether the workbook window
     * is minimized.
     *
     * @var bool
     */
    private $minimized = false;
    /**
     * Specifies a boolean value that indicates whether to group dates
     * when presenting the user with filtering optiomd in the user
     * interface.
     *
     * @var bool
     */
    private $autoFilterDateGrouping = true;
    /**
     * Specifies the index to the first sheet in the book view.
     *
     * @var int
     */
    private $firstSheetIndex = 0;
    /**
     * Specifies the visible status of the workbook.
     *
     * @var string
     */
    private $visibility = self::VISIBILITY_VISIBLE;
    /**
     * Specifies the ratio between the workbook tabs bar and the horizontal
     * scroll bar.  TabRatio is assumed to be out of 1000 of the horizontal
     * window width.
     *
     * @var int
     */
    private $tabRatio = 600;
    /**
     * The workbook has macros ?
     *
     * @return bool
     */
    public function hasMacros()
    {
    }
    /**
     * Define if a workbook has macros.
     *
     * @param bool $hasMacros true|false
     */
    public function setHasMacros($hasMacros)
    {
    }
    /**
     * Set the macros code.
     *
     * @param string $macroCode string|null
     */
    public function setMacrosCode($macroCode)
    {
    }
    /**
     * Return the macros code.
     *
     * @return null|string
     */
    public function getMacrosCode()
    {
    }
    /**
     * Set the macros certificate.
     *
     * @param null|string $certificate
     */
    public function setMacrosCertificate($certificate)
    {
    }
    /**
     * Is the project signed ?
     *
     * @return bool true|false
     */
    public function hasMacrosCertificate()
    {
    }
    /**
     * Return the macros certificate.
     *
     * @return null|string
     */
    public function getMacrosCertificate()
    {
    }
    /**
     * Remove all macros, certificate from spreadsheet.
     */
    public function discardMacros()
    {
    }
    /**
     * set ribbon XML data.
     *
     * @param null|mixed $target
     * @param null|mixed $xmlData
     */
    public function setRibbonXMLData($target, $xmlData)
    {
    }
    /**
     * retrieve ribbon XML Data.
     *
     * return string|null|array
     *
     * @param string $what
     *
     * @return string
     */
    public function getRibbonXMLData($what = 'all')
    {
    }
    /**
     * store binaries ribbon objects (pictures).
     *
     * @param null|mixed $BinObjectsNames
     * @param null|mixed $BinObjectsData
     */
    public function setRibbonBinObjects($BinObjectsNames, $BinObjectsData)
    {
    }
    /**
     * List of unparsed loaded data for export to same format with better compatibility.
     * It has to be minimized when the library start to support currently unparsed data.
     *
     * @internal
     *
     * @return array
     */
    public function getUnparsedLoadedData()
    {
    }
    /**
     * List of unparsed loaded data for export to same format with better compatibility.
     * It has to be minimized when the library start to support currently unparsed data.
     *
     * @internal
     *
     * @param array $unparsedLoadedData
     */
    public function setUnparsedLoadedData(array $unparsedLoadedData)
    {
    }
    /**
     * return the extension of a filename. Internal use for a array_map callback (php<5.3 don't like lambda function).
     *
     * @param mixed $path
     *
     * @return string
     */
    private function getExtensionOnly($path)
    {
    }
    /**
     * retrieve Binaries Ribbon Objects.
     *
     * @param string $what
     *
     * @return null|array
     */
    public function getRibbonBinObjects($what = 'all')
    {
    }
    /**
     * This workbook have a custom UI ?
     *
     * @return bool
     */
    public function hasRibbon()
    {
    }
    /**
     * This workbook have additionnal object for the ribbon ?
     *
     * @return bool
     */
    public function hasRibbonBinObjects()
    {
    }
    /**
     * Check if a sheet with a specified code name already exists.
     *
     * @param string $pSheetCodeName Name of the worksheet to check
     *
     * @return bool
     */
    public function sheetCodeNameExists($pSheetCodeName)
    {
    }
    /**
     * Get sheet by code name. Warning : sheet don't have always a code name !
     *
     * @param string $pName Sheet name
     *
     * @return Worksheet
     */
    public function getSheetByCodeName($pName)
    {
    }
    /**
     * Create a new PhpSpreadsheet with one Worksheet.
     */
    public function __construct()
    {
    }
    /**
     * Code to execute when this worksheet is unset().
     */
    public function __destruct()
    {
    }
    /**
     * Disconnect all worksheets from this PhpSpreadsheet workbook object,
     * typically so that the PhpSpreadsheet object can be unset.
     */
    public function disconnectWorksheets()
    {
    }
    /**
     * Return the calculation engine for this worksheet.
     *
     * @return Calculation
     */
    public function getCalculationEngine()
    {
    }
    /**
     * Get properties.
     *
     * @return Document\Properties
     */
    public function getProperties()
    {
    }
    /**
     * Set properties.
     *
     * @param Document\Properties $pValue
     */
    public function setProperties(\PhpOffice\PhpSpreadsheet\Document\Properties $pValue)
    {
    }
    /**
     * Get security.
     *
     * @return Document\Security
     */
    public function getSecurity()
    {
    }
    /**
     * Set security.
     *
     * @param Document\Security $pValue
     */
    public function setSecurity(\PhpOffice\PhpSpreadsheet\Document\Security $pValue)
    {
    }
    /**
     * Get active sheet.
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function getActiveSheet()
    {
    }
    /**
     * Create sheet and add it to this workbook.
     *
     * @param null|int $sheetIndex Index where sheet should go (0,1,..., or null for last)
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function createSheet($sheetIndex = null)
    {
    }
    /**
     * Check if a sheet with a specified name already exists.
     *
     * @param string $pSheetName Name of the worksheet to check
     *
     * @return bool
     */
    public function sheetNameExists($pSheetName)
    {
    }
    /**
     * Add sheet.
     *
     * @param Worksheet $pSheet
     * @param null|int $iSheetIndex Index where sheet should go (0,1,..., or null for last)
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function addSheet(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, $iSheetIndex = null)
    {
    }
    /**
     * Remove sheet by index.
     *
     * @param int $pIndex Active sheet index
     *
     * @throws Exception
     */
    public function removeSheetByIndex($pIndex)
    {
    }
    /**
     * Get sheet by index.
     *
     * @param int $pIndex Sheet index
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function getSheet($pIndex)
    {
    }
    /**
     * Get all sheets.
     *
     * @return Worksheet[]
     */
    public function getAllSheets()
    {
    }
    /**
     * Get sheet by name.
     *
     * @param string $pName Sheet name
     *
     * @return Worksheet
     */
    public function getSheetByName($pName)
    {
    }
    /**
     * Get index for sheet.
     *
     * @param Worksheet $pSheet
     *
     * @throws Exception
     *
     * @return int index
     */
    public function getIndex(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Set index for sheet by sheet name.
     *
     * @param string $sheetName Sheet name to modify index for
     * @param int $newIndex New index for the sheet
     *
     * @throws Exception
     *
     * @return int New sheet index
     */
    public function setIndexByName($sheetName, $newIndex)
    {
    }
    /**
     * Get sheet count.
     *
     * @return int
     */
    public function getSheetCount()
    {
    }
    /**
     * Get active sheet index.
     *
     * @return int Active sheet index
     */
    public function getActiveSheetIndex()
    {
    }
    /**
     * Set active sheet index.
     *
     * @param int $pIndex Active sheet index
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function setActiveSheetIndex($pIndex)
    {
    }
    /**
     * Set active sheet index by name.
     *
     * @param string $pValue Sheet title
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function setActiveSheetIndexByName($pValue)
    {
    }
    /**
     * Get sheet names.
     *
     * @return string[]
     */
    public function getSheetNames()
    {
    }
    /**
     * Add external sheet.
     *
     * @param Worksheet $pSheet External sheet to add
     * @param null|int $iSheetIndex Index where sheet should go (0,1,..., or null for last)
     *
     * @throws Exception
     *
     * @return Worksheet
     */
    public function addExternalSheet(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, $iSheetIndex = null)
    {
    }
    /**
     * Get named ranges.
     *
     * @return NamedRange[]
     */
    public function getNamedRanges()
    {
    }
    /**
     * Add named range.
     *
     * @param NamedRange $namedRange
     *
     * @return bool
     */
    public function addNamedRange(\PhpOffice\PhpSpreadsheet\NamedRange $namedRange)
    {
    }
    /**
     * Get named range.
     *
     * @param string $namedRange
     * @param null|Worksheet $pSheet Scope. Use null for global scope
     *
     * @return null|NamedRange
     */
    public function getNamedRange($namedRange, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet = null)
    {
    }
    /**
     * Remove named range.
     *
     * @param string $namedRange
     * @param null|Worksheet $pSheet scope: use null for global scope
     *
     * @return Spreadsheet
     */
    public function removeNamedRange($namedRange, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet = null)
    {
    }
    /**
     * Get worksheet iterator.
     *
     * @return Iterator
     */
    public function getWorksheetIterator()
    {
    }
    /**
     * Copy workbook (!= clone!).
     *
     * @return Spreadsheet
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
     * Get the workbook collection of cellXfs.
     *
     * @return Style[]
     */
    public function getCellXfCollection()
    {
    }
    /**
     * Get cellXf by index.
     *
     * @param int $pIndex
     *
     * @return Style
     */
    public function getCellXfByIndex($pIndex)
    {
    }
    /**
     * Get cellXf by hash code.
     *
     * @param string $pValue
     *
     * @return false|Style
     */
    public function getCellXfByHashCode($pValue)
    {
    }
    /**
     * Check if style exists in style collection.
     *
     * @param Style $pCellStyle
     *
     * @return bool
     */
    public function cellXfExists($pCellStyle)
    {
    }
    /**
     * Get default style.
     *
     * @throws Exception
     *
     * @return Style
     */
    public function getDefaultStyle()
    {
    }
    /**
     * Add a cellXf to the workbook.
     *
     * @param Style $style
     */
    public function addCellXf(\PhpOffice\PhpSpreadsheet\Style\Style $style)
    {
    }
    /**
     * Remove cellXf by index. It is ensured that all cells get their xf index updated.
     *
     * @param int $pIndex Index to cellXf
     *
     * @throws Exception
     */
    public function removeCellXfByIndex($pIndex)
    {
    }
    /**
     * Get the cellXf supervisor.
     *
     * @return Style
     */
    public function getCellXfSupervisor()
    {
    }
    /**
     * Get the workbook collection of cellStyleXfs.
     *
     * @return Style[]
     */
    public function getCellStyleXfCollection()
    {
    }
    /**
     * Get cellStyleXf by index.
     *
     * @param int $pIndex Index to cellXf
     *
     * @return Style
     */
    public function getCellStyleXfByIndex($pIndex)
    {
    }
    /**
     * Get cellStyleXf by hash code.
     *
     * @param string $pValue
     *
     * @return false|Style
     */
    public function getCellStyleXfByHashCode($pValue)
    {
    }
    /**
     * Add a cellStyleXf to the workbook.
     *
     * @param Style $pStyle
     */
    public function addCellStyleXf(\PhpOffice\PhpSpreadsheet\Style\Style $pStyle)
    {
    }
    /**
     * Remove cellStyleXf by index.
     *
     * @param int $pIndex Index to cellXf
     *
     * @throws Exception
     */
    public function removeCellStyleXfByIndex($pIndex)
    {
    }
    /**
     * Eliminate all unneeded cellXf and afterwards update the xfIndex for all cells
     * and columns in the workbook.
     */
    public function garbageCollect()
    {
    }
    /**
     * Return the unique ID value assigned to this spreadsheet workbook.
     *
     * @return string
     */
    public function getID()
    {
    }
    /**
     * Get the visibility of the horizonal scroll bar in the application.
     *
     * @return bool True if horizonal scroll bar is visible
     */
    public function getShowHorizontalScroll()
    {
    }
    /**
     * Set the visibility of the horizonal scroll bar in the application.
     *
     * @param bool $showHorizontalScroll True if horizonal scroll bar is visible
     */
    public function setShowHorizontalScroll($showHorizontalScroll)
    {
    }
    /**
     * Get the visibility of the vertical scroll bar in the application.
     *
     * @return bool True if vertical scroll bar is visible
     */
    public function getShowVerticalScroll()
    {
    }
    /**
     * Set the visibility of the vertical scroll bar in the application.
     *
     * @param bool $showVerticalScroll True if vertical scroll bar is visible
     */
    public function setShowVerticalScroll($showVerticalScroll)
    {
    }
    /**
     * Get the visibility of the sheet tabs in the application.
     *
     * @return bool True if the sheet tabs are visible
     */
    public function getShowSheetTabs()
    {
    }
    /**
     * Set the visibility of the sheet tabs  in the application.
     *
     * @param bool $showSheetTabs True if sheet tabs are visible
     */
    public function setShowSheetTabs($showSheetTabs)
    {
    }
    /**
     * Return whether the workbook window is minimized.
     *
     * @return bool true if workbook window is minimized
     */
    public function getMinimized()
    {
    }
    /**
     * Set whether the workbook window is minimized.
     *
     * @param bool $minimized true if workbook window is minimized
     */
    public function setMinimized($minimized)
    {
    }
    /**
     * Return whether to group dates when presenting the user with
     * filtering optiomd in the user interface.
     *
     * @return bool true if workbook window is minimized
     */
    public function getAutoFilterDateGrouping()
    {
    }
    /**
     * Set whether to group dates when presenting the user with
     * filtering optiomd in the user interface.
     *
     * @param bool $autoFilterDateGrouping true if workbook window is minimized
     */
    public function setAutoFilterDateGrouping($autoFilterDateGrouping)
    {
    }
    /**
     * Return the first sheet in the book view.
     *
     * @return int First sheet in book view
     */
    public function getFirstSheetIndex()
    {
    }
    /**
     * Set the first sheet in the book view.
     *
     * @param int $firstSheetIndex First sheet in book view
     *
     * @throws Exception  if the given value is invalid
     */
    public function setFirstSheetIndex($firstSheetIndex)
    {
    }
    /**
     * Return the visibility status of the workbook.
     *
     * This may be one of the following three values:
     * - visibile
     *
     * @return string Visible status
     */
    public function getVisibility()
    {
    }
    /**
     * Set the visibility status of the workbook.
     *
     * Valid values are:
     *  - 'visible' (self::VISIBILITY_VISIBLE):
     *       Workbook window is visible
     *  - 'hidden' (self::VISIBILITY_HIDDEN):
     *       Workbook window is hidden, but can be shown by the user
     *       via the user interface
     *  - 'veryHidden' (self::VISIBILITY_VERY_HIDDEN):
     *       Workbook window is hidden and cannot be shown in the
     *       user interface.
     *
     * @param string $visibility visibility status of the workbook
     *
     * @throws Exception  if the given value is invalid
     */
    public function setVisibility($visibility)
    {
    }
    /**
     * Get the ratio between the workbook tabs bar and the horizontal scroll bar.
     * TabRatio is assumed to be out of 1000 of the horizontal window width.
     *
     * @return int Ratio between the workbook tabs bar and the horizontal scroll bar
     */
    public function getTabRatio()
    {
    }
    /**
     * Set the ratio between the workbook tabs bar and the horizontal scroll bar
     * TabRatio is assumed to be out of 1000 of the horizontal window width.
     *
     * @param int $tabRatio Ratio between the tabs bar and the horizontal scroll bar
     *
     * @throws Exception  if the given value is invalid
     */
    public function setTabRatio($tabRatio)
    {
    }
}