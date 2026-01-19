<?php

namespace PhpOffice\PhpSpreadsheet\Reader;

class Csv extends \PhpOffice\PhpSpreadsheet\Reader\BaseReader
{
    /**
     * Input encoding.
     *
     * @var string
     */
    private $inputEncoding = 'UTF-8';
    /**
     * Delimiter.
     *
     * @var string
     */
    private $delimiter;
    /**
     * Enclosure.
     *
     * @var string
     */
    private $enclosure = '"';
    /**
     * Sheet index to read.
     *
     * @var int
     */
    private $sheetIndex = 0;
    /**
     * Load rows contiguously.
     *
     * @var bool
     */
    private $contiguous = false;
    /**
     * Row counter for loading rows contiguously.
     *
     * @var int
     */
    private $contiguousRow = -1;
    /**
     * The character that can escape the enclosure.
     *
     * @var string
     */
    private $escapeCharacter = '\\';
    /**
     * Create a new CSV Reader instance.
     */
    public function __construct()
    {
    }
    /**
     * Set input encoding.
     *
     * @param string $pValue Input encoding, eg: 'UTF-8'
     *
     * @return Csv
     */
    public function setInputEncoding($pValue)
    {
    }
    /**
     * Get input encoding.
     *
     * @return string
     */
    public function getInputEncoding()
    {
    }
    /**
     * Move filepointer past any BOM marker.
     */
    protected function skipBOM()
    {
    }
    /**
     * Identify any separator that is explicitly set in the file.
     */
    protected function checkSeparator()
    {
    }
    /**
     * Infer the separator if it isn't explicitly set in the file or specified by the user.
     */
    protected function inferSeparator()
    {
    }
    /**
     * Get the next full line from the file.
     *
     * @param string $line
     *
     * @return bool|string
     */
    private function getNextLine($line = '')
    {
    }
    /**
     * Return worksheet info (Name, Last Column Letter, Last Column Index, Total Rows, Total Columns).
     *
     * @param string $pFilename
     *
     * @throws Exception
     *
     * @return array
     */
    public function listWorksheetInfo($pFilename)
    {
    }
    /**
     * Loads Spreadsheet from file.
     *
     * @param string $pFilename
     *
     * @throws Exception
     *
     * @return Spreadsheet
     */
    public function load($pFilename)
    {
    }
    /**
     * Loads PhpSpreadsheet from file into PhpSpreadsheet instance.
     *
     * @param string $pFilename
     * @param Spreadsheet $spreadsheet
     *
     * @throws Exception
     *
     * @return Spreadsheet
     */
    public function loadIntoExisting($pFilename, \PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
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
     * @param string $delimiter Delimiter, eg: ','
     *
     * @return CSV
     */
    public function setDelimiter($delimiter)
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
     * @param string $enclosure Enclosure, defaults to "
     *
     * @return CSV
     */
    public function setEnclosure($enclosure)
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
     * Set Contiguous.
     *
     * @param bool $contiguous
     *
     * @return Csv
     */
    public function setContiguous($contiguous)
    {
    }
    /**
     * Get Contiguous.
     *
     * @return bool
     */
    public function getContiguous()
    {
    }
    /**
     * Set escape backslashes.
     *
     * @param string $escapeCharacter
     *
     * @return $this
     */
    public function setEscapeCharacter($escapeCharacter)
    {
    }
    /**
     * Get escape backslashes.
     *
     * @return string
     */
    public function getEscapeCharacter()
    {
    }
    /**
     * Can the current IReader read the file?
     *
     * @param string $pFilename
     *
     * @return bool
     */
    public function canRead($pFilename)
    {
    }
}