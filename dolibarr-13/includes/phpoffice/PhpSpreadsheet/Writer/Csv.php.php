<?php

namespace PhpOffice\PhpSpreadsheet\Writer;

class Csv extends \PhpOffice\PhpSpreadsheet\Writer\BaseWriter
{
    /**
     * PhpSpreadsheet object.
     *
     * @var Spreadsheet
     */
    private $spreadsheet;
    /**
     * Delimiter.
     *
     * @var string
     */
    private $delimiter = ',';
    /**
     * Enclosure.
     *
     * @var string
     */
    private $enclosure = '"';
    /**
     * Line ending.
     *
     * @var string
     */
    private $lineEnding = PHP_EOL;
    /**
     * Sheet index to write.
     *
     * @var int
     */
    private $sheetIndex = 0;
    /**
     * Whether to write a BOM (for UTF8).
     *
     * @var bool
     */
    private $useBOM = false;
    /**
     * Whether to write a Separator line as the first line of the file
     *     sep=x.
     *
     * @var bool
     */
    private $includeSeparatorLine = false;
    /**
     * Whether to write a fully Excel compatible CSV file.
     *
     * @var bool
     */
    private $excelCompatibility = false;
    /**
     * Create a new CSV.
     *
     * @param Spreadsheet $spreadsheet Spreadsheet object
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Save PhpSpreadsheet to file.
     *
     * @param string $pFilename
     *
     * @throws Exception
     */
    public function save($pFilename)
    {
    }
    /**
     * Get delimiter.
     *
     * @return string
     */
    public function getDelimiter()
    {
    }
    /**
     * Set delimiter.
     *
     * @param string $pValue Delimiter, defaults to ','
     *
     * @return CSV
     */
    public function setDelimiter($pValue)
    {
    }
    /**
     * Get enclosure.
     *
     * @return string
     */
    public function getEnclosure()
    {
    }
    /**
     * Set enclosure.
     *
     * @param string $pValue Enclosure, defaults to "
     *
     * @return CSV
     */
    public function setEnclosure($pValue)
    {
    }
    /**
     * Get line ending.
     *
     * @return string
     */
    public function getLineEnding()
    {
    }
    /**
     * Set line ending.
     *
     * @param string $pValue Line ending, defaults to OS line ending (PHP_EOL)
     *
     * @return CSV
     */
    public function setLineEnding($pValue)
    {
    }
    /**
     * Get whether BOM should be used.
     *
     * @return bool
     */
    public function getUseBOM()
    {
    }
    /**
     * Set whether BOM should be used.
     *
     * @param bool $pValue Use UTF-8 byte-order mark? Defaults to false
     *
     * @return CSV
     */
    public function setUseBOM($pValue)
    {
    }
    /**
     * Get whether a separator line should be included.
     *
     * @return bool
     */
    public function getIncludeSeparatorLine()
    {
    }
    /**
     * Set whether a separator line should be included as the first line of the file.
     *
     * @param bool $pValue Use separator line? Defaults to false
     *
     * @return CSV
     */
    public function setIncludeSeparatorLine($pValue)
    {
    }
    /**
     * Get whether the file should be saved with full Excel Compatibility.
     *
     * @return bool
     */
    public function getExcelCompatibility()
    {
    }
    /**
     * Set whether the file should be saved with full Excel Compatibility.
     *
     * @param bool $pValue Set the file to be written as a fully Excel compatible csv file
     *                                Note that this overrides other settings such as useBOM, enclosure and delimiter
     *
     * @return CSV
     */
    public function setExcelCompatibility($pValue)
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
     * @return CSV
     */
    public function setSheetIndex($pValue)
    {
    }
    /**
     * Write line to CSV file.
     *
     * @param resource $pFileHandle PHP filehandle
     * @param array $pValues Array containing values in a row
     */
    private function writeLine($pFileHandle, array $pValues)
    {
    }
}