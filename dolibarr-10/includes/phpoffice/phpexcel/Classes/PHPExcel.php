<?php

/**
 * PHPExcel
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel
{
    /**
     * Unique ID
     *
     * @var string
     */
    private $_uniqueID;
    /**
     * Document properties
     *
     * @var PHPExcel_DocumentProperties
     */
    private $_properties;
    /**
     * Document security
     *
     * @var PHPExcel_DocumentSecurity
     */
    private $_security;
    /**
     * Collection of Worksheet objects
     *
     * @var PHPExcel_Worksheet[]
     */
    private $_workSheetCollection = array();
    /**
     * Calculation Engine
     *
     * @var PHPExcel_Calculation
     */
    private $_calculationEngine = \NULL;
    /**
     * Active sheet index
     *
     * @var int
     */
    private $_activeSheetIndex = 0;
    /**
     * Named ranges
     *
     * @var PHPExcel_NamedRange[]
     */
    private $_namedRanges = array();
    /**
     * CellXf supervisor
     *
     * @var PHPExcel_Style
     */
    private $_cellXfSupervisor;
    /**
     * CellXf collection
     *
     * @var PHPExcel_Style[]
     */
    private $_cellXfCollection = array();
    /**
     * CellStyleXf collection
     *
     * @var PHPExcel_Style[]
     */
    private $_cellStyleXfCollection = array();
    /**
     * _hasMacros : this workbook have macros ?
     *
     * @var bool
     */
    private $_hasMacros = \FALSE;
    /**
     * _macrosCode : all macros code (the vbaProject.bin file, this include form, code,  etc.), NULL if no macro
     *
     * @var binary
     */
    private $_macrosCode = \NULL;
    /**
     * _macrosCertificate : if macros are signed, contains vbaProjectSignature.bin file, NULL if not signed
     *
     * @var binary
     */
    private $_macrosCertificate = \NULL;
    /**
     * _ribbonXMLData : NULL if workbook is'nt Excel 2007 or not contain a customized UI
     *
     * @var NULL|string
     */
    private $_ribbonXMLData = \NULL;
    /**
     * _ribbonBinObjects : NULL if workbook is'nt Excel 2007 or not contain embedded objects (picture(s)) for Ribbon Elements
     * ignored if $_ribbonXMLData is null
     *
     * @var NULL|array
     */
    private $_ribbonBinObjects = \NULL;
    /**
     * The workbook has macros ?
     *
     * @return true if workbook has macros, false if not
     */
    public function hasMacros()
    {
    }
    /**
     * Define if a workbook has macros
     *
     * @param true|false
     */
    public function setHasMacros($hasMacros = \false)
    {
    }
    /**
     * Set the macros code
     *
     * @param binary string|null
     */
    public function setMacrosCode($MacrosCode)
    {
    }
    /**
     * Return the macros code
     *
     * @return binary|null
     */
    public function getMacrosCode()
    {
    }
    /**
     * Set the macros certificate
     *
     * @param binary|null
     */
    public function setMacrosCertificate($Certificate = \NULL)
    {
    }
    /**
     * Is the project signed ?
     *
     * @return true|false
     */
    public function hasMacrosCertificate()
    {
    }
    /**
     * Return the macros certificate
     *
     * @return binary|null
     */
    public function getMacrosCertificate()
    {
    }
    /**
     * Remove all macros, certificate from spreadsheet
     *
     * @param none
     * @return void
     */
    public function discardMacros()
    {
    }
    /**
     * set ribbon XML data
     *
     */
    public function setRibbonXMLData($Target = \NULL, $XMLData = \NULL)
    {
    }
    /**
     * retrieve ribbon XML Data
     *
     * return string|null|array
     */
    public function getRibbonXMLData($What = 'all')
    {
    }
    /**
     * store binaries ribbon objects (pictures)
     *
     */
    public function setRibbonBinObjects($BinObjectsNames = \NULL, $BinObjectsData = \NULL)
    {
    }
    /**
     * return the extension of a filename. Internal use for a array_map callback (php<5.3 don't like lambda function)
     *
     */
    private function _getExtensionOnly($ThePath)
    {
    }
    /**
     * retrieve Binaries Ribbon Objects
     *
     */
    public function getRibbonBinObjects($What = 'all')
    {
    }
    /**
     * This workbook have a custom UI ?
     *
     * @return true|false
     */
    public function hasRibbon()
    {
    }
    /**
     * This workbook have additionnal object for the ribbon ?
     *
     * @return true|false
     */
    public function hasRibbonBinObjects()
    {
    }
    /**
     * Check if a sheet with a specified code name already exists
     *
     * @param string $pSheetCodeName  Name of the worksheet to check
     * @return boolean
     */
    public function sheetCodeNameExists($pSheetCodeName)
    {
    }
    /**
     * Get sheet by code name. Warning : sheet don't have always a code name !
     *
     * @param string $pName Sheet name
     * @return PHPExcel_Worksheet
     */
    public function getSheetByCodeName($pName = '')
    {
    }
    /**
     * Create a new PHPExcel with one Worksheet
     */
    public function __construct()
    {
    }
    /**
     * Code to execute when this worksheet is unset()
     *
     */
    public function __destruct()
    {
    }
    //    function __destruct()
    /**
     * Disconnect all worksheets from this PHPExcel workbook object,
     *    typically so that the PHPExcel object can be unset
     *
     */
    public function disconnectWorksheets()
    {
    }
    /**
     * Return the calculation engine for this worksheet
     *
     * @return PHPExcel_Calculation
     */
    public function getCalculationEngine()
    {
    }
    //	function getCellCacheController()
    /**
     * Get properties
     *
     * @return PHPExcel_DocumentProperties
     */
    public function getProperties()
    {
    }
    /**
     * Set properties
     *
     * @param PHPExcel_DocumentProperties    $pValue
     */
    public function setProperties(\PHPExcel_DocumentProperties $pValue)
    {
    }
    /**
     * Get security
     *
     * @return PHPExcel_DocumentSecurity
     */
    public function getSecurity()
    {
    }
    /**
     * Set security
     *
     * @param PHPExcel_DocumentSecurity    $pValue
     */
    public function setSecurity(\PHPExcel_DocumentSecurity $pValue)
    {
    }
    /**
     * Get active sheet
     *
     * @return PHPExcel_Worksheet
     *
     * @throws PHPExcel_Exception
     */
    public function getActiveSheet()
    {
    }
    /**
     * Create sheet and add it to this workbook
     *
     * @param  int|null $iSheetIndex Index where sheet should go (0,1,..., or null for last)
     * @return PHPExcel_Worksheet
     * @throws PHPExcel_Exception
     */
    public function createSheet($iSheetIndex = \NULL)
    {
    }
    /**
     * Check if a sheet with a specified name already exists
     *
     * @param  string $pSheetName  Name of the worksheet to check
     * @return boolean
     */
    public function sheetNameExists($pSheetName)
    {
    }
    /**
     * Add sheet
     *
     * @param  PHPExcel_Worksheet $pSheet
     * @param  int|null $iSheetIndex Index where sheet should go (0,1,..., or null for last)
     * @return PHPExcel_Worksheet
     * @throws PHPExcel_Exception
     */
    public function addSheet(\PHPExcel_Worksheet $pSheet, $iSheetIndex = \NULL)
    {
    }
    /**
     * Remove sheet by index
     *
     * @param  int $pIndex Active sheet index
     * @throws PHPExcel_Exception
     */
    public function removeSheetByIndex($pIndex = 0)
    {
    }
    /**
     * Get sheet by index
     *
     * @param  int $pIndex Sheet index
     * @return PHPExcel_Worksheet
     * @throws PHPExcel_Exception
     */
    public function getSheet($pIndex = 0)
    {
    }
    /**
     * Get all sheets
     *
     * @return PHPExcel_Worksheet[]
     */
    public function getAllSheets()
    {
    }
    /**
     * Get sheet by name
     *
     * @param  string $pName Sheet name
     * @return PHPExcel_Worksheet
     */
    public function getSheetByName($pName = '')
    {
    }
    /**
     * Get index for sheet
     *
     * @param  PHPExcel_Worksheet $pSheet
     * @return Sheet index
     * @throws PHPExcel_Exception
     */
    public function getIndex(\PHPExcel_Worksheet $pSheet)
    {
    }
    /**
     * Set index for sheet by sheet name.
     *
     * @param  string $sheetName Sheet name to modify index for
     * @param  int $newIndex New index for the sheet
     * @return New sheet index
     * @throws PHPExcel_Exception
     */
    public function setIndexByName($sheetName, $newIndex)
    {
    }
    /**
     * Get sheet count
     *
     * @return int
     */
    public function getSheetCount()
    {
    }
    /**
     * Get active sheet index
     *
     * @return int Active sheet index
     */
    public function getActiveSheetIndex()
    {
    }
    /**
     * Set active sheet index
     *
     * @param  int $pIndex Active sheet index
     * @throws PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function setActiveSheetIndex($pIndex = 0)
    {
    }
    /**
     * Set active sheet index by name
     *
     * @param  string $pValue Sheet title
     * @return PHPExcel_Worksheet
     * @throws PHPExcel_Exception
     */
    public function setActiveSheetIndexByName($pValue = '')
    {
    }
    /**
     * Get sheet names
     *
     * @return string[]
     */
    public function getSheetNames()
    {
    }
    /**
     * Add external sheet
     *
     * @param  PHPExcel_Worksheet $pSheet External sheet to add
     * @param  int|null $iSheetIndex Index where sheet should go (0,1,..., or null for last)
     * @throws PHPExcel_Exception
     * @return PHPExcel_Worksheet
     */
    public function addExternalSheet(\PHPExcel_Worksheet $pSheet, $iSheetIndex = \null)
    {
    }
    /**
     * Get named ranges
     *
     * @return PHPExcel_NamedRange[]
     */
    public function getNamedRanges()
    {
    }
    /**
     * Add named range
     *
     * @param  PHPExcel_NamedRange $namedRange
     * @return PHPExcel
     */
    public function addNamedRange(\PHPExcel_NamedRange $namedRange)
    {
    }
    /**
     * Get named range
     *
     * @param  string $namedRange
     * @param  PHPExcel_Worksheet|null $pSheet Scope. Use null for global scope
     * @return PHPExcel_NamedRange|null
     */
    public function getNamedRange($namedRange, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Remove named range
     *
     * @param  string  $namedRange
     * @param  PHPExcel_Worksheet|null  $pSheet  Scope: use null for global scope.
     * @return PHPExcel
     */
    public function removeNamedRange($namedRange, \PHPExcel_Worksheet $pSheet = \null)
    {
    }
    /**
     * Get worksheet iterator
     *
     * @return PHPExcel_WorksheetIterator
     */
    public function getWorksheetIterator()
    {
    }
    /**
     * Copy workbook (!= clone!)
     *
     * @return PHPExcel
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
     * Get the workbook collection of cellXfs
     *
     * @return PHPExcel_Style[]
     */
    public function getCellXfCollection()
    {
    }
    /**
     * Get cellXf by index
     *
     * @param  int $pIndex
     * @return PHPExcel_Style
     */
    public function getCellXfByIndex($pIndex = 0)
    {
    }
    /**
     * Get cellXf by hash code
     *
     * @param  string $pValue
     * @return PHPExcel_Style|false
     */
    public function getCellXfByHashCode($pValue = '')
    {
    }
    /**
     * Check if style exists in style collection
     *
     * @param  PHPExcel_Style $pCellStyle
     * @return boolean
     */
    public function cellXfExists($pCellStyle = \null)
    {
    }
    /**
     * Get default style
     *
     * @return PHPExcel_Style
     * @throws PHPExcel_Exception
     */
    public function getDefaultStyle()
    {
    }
    /**
     * Add a cellXf to the workbook
     *
     * @param PHPExcel_Style $style
     */
    public function addCellXf(\PHPExcel_Style $style)
    {
    }
    /**
     * Remove cellXf by index. It is ensured that all cells get their xf index updated.
     *
     * @param  int $pIndex Index to cellXf
     * @throws PHPExcel_Exception
     */
    public function removeCellXfByIndex($pIndex = 0)
    {
    }
    /**
     * Get the cellXf supervisor
     *
     * @return PHPExcel_Style
     */
    public function getCellXfSupervisor()
    {
    }
    /**
     * Get the workbook collection of cellStyleXfs
     *
     * @return PHPExcel_Style[]
     */
    public function getCellStyleXfCollection()
    {
    }
    /**
     * Get cellStyleXf by index
     *
     * @param  int $pIndex
     * @return PHPExcel_Style
     */
    public function getCellStyleXfByIndex($pIndex = 0)
    {
    }
    /**
     * Get cellStyleXf by hash code
     *
     * @param  string $pValue
     * @return PHPExcel_Style|false
     */
    public function getCellStyleXfByHashCode($pValue = '')
    {
    }
    /**
     * Add a cellStyleXf to the workbook
     *
     * @param PHPExcel_Style $pStyle
     */
    public function addCellStyleXf(\PHPExcel_Style $pStyle)
    {
    }
    /**
     * Remove cellStyleXf by index
     *
     * @param int $pIndex
     * @throws PHPExcel_Exception
     */
    public function removeCellStyleXfByIndex($pIndex = 0)
    {
    }
    /**
     * Eliminate all unneeded cellXf and afterwards update the xfIndex for all cells
     * and columns in the workbook
     */
    public function garbageCollect()
    {
    }
    /**
     * Return the unique ID value assigned to this spreadsheet workbook
     *
     * @return string
     */
    public function getID()
    {
    }
}
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/');