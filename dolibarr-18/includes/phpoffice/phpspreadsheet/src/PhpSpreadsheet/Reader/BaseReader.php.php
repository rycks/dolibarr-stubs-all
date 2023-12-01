<?php

namespace PhpOffice\PhpSpreadsheet\Reader;

abstract class BaseReader implements \PhpOffice\PhpSpreadsheet\Reader\IReader
{
    /**
     * Read data only?
     * Identifies whether the Reader should only read data values for cells, and ignore any formatting information;
     *        or whether it should read both data and formatting.
     *
     * @var bool
     */
    protected $readDataOnly = false;
    /**
     * Read empty cells?
     * Identifies whether the Reader should read data values for cells all cells, or should ignore cells containing
     *         null value or empty string.
     *
     * @var bool
     */
    protected $readEmptyCells = true;
    /**
     * Read charts that are defined in the workbook?
     * Identifies whether the Reader should read the definitions for any charts that exist in the workbook;.
     *
     * @var bool
     */
    protected $includeCharts = false;
    /**
     * Restrict which sheets should be loaded?
     * This property holds an array of worksheet names to be loaded. If null, then all worksheets will be loaded.
     *
     * @var array of string
     */
    protected $loadSheetsOnly;
    /**
     * IReadFilter instance.
     *
     * @var IReadFilter
     */
    protected $readFilter;
    protected $fileHandle;
    /**
     * @var XmlScanner
     */
    protected $securityScanner;
    public function __construct()
    {
    }
    public function getReadDataOnly()
    {
    }
    public function setReadDataOnly($pValue)
    {
    }
    public function getReadEmptyCells()
    {
    }
    public function setReadEmptyCells($pValue)
    {
    }
    public function getIncludeCharts()
    {
    }
    public function setIncludeCharts($pValue)
    {
    }
    public function getLoadSheetsOnly()
    {
    }
    public function setLoadSheetsOnly($value)
    {
    }
    public function setLoadAllSheets()
    {
    }
    public function getReadFilter()
    {
    }
    public function setReadFilter(\PhpOffice\PhpSpreadsheet\Reader\IReadFilter $pValue)
    {
    }
    public function getSecurityScanner()
    {
    }
    /**
     * Open file for reading.
     *
     * @param string $pFilename
     *
     * @throws Exception
     */
    protected function openFile($pFilename)
    {
    }
}