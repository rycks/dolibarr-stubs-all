<?php

namespace PhpOffice\PhpSpreadsheet\Reader;

class Slk extends \PhpOffice\PhpSpreadsheet\Reader\BaseReader
{
    /**
     * Input encoding.
     *
     * @var string
     */
    private $inputEncoding = 'ANSI';
    /**
     * Sheet index to read.
     *
     * @var int
     */
    private $sheetIndex = 0;
    /**
     * Formats.
     *
     * @var array
     */
    private $formats = [];
    /**
     * Format Count.
     *
     * @var int
     */
    private $format = 0;
    /**
     * Create a new SYLK Reader instance.
     */
    public function __construct()
    {
    }
    /**
     * Validate that the current file is a SYLK file.
     *
     * @param string $pFilename
     *
     * @return bool
     */
    public function canRead($pFilename)
    {
    }
    /**
     * Set input encoding.
     *
     * @param string $pValue Input encoding, eg: 'ANSI'
     *
     * @return $this
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
     * Loads PhpSpreadsheet from file.
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
}