<?php

namespace PhpOffice\PhpSpreadsheet\Reader;

class Ods extends \PhpOffice\PhpSpreadsheet\Reader\BaseReader
{
    /**
     * Create a new Ods Reader instance.
     */
    public function __construct()
    {
    }
    /**
     * Can the current IReader read the file?
     *
     * @param string $pFilename
     *
     * @throws Exception
     *
     * @return bool
     */
    public function canRead($pFilename)
    {
    }
    /**
     * Reads names of the worksheets from a file, without parsing the whole file to a PhpSpreadsheet object.
     *
     * @param string $pFilename
     *
     * @throws Exception
     *
     * @return string[]
     */
    public function listWorksheetNames($pFilename)
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
     * Recursively scan element.
     *
     * @param \DOMNode $element
     *
     * @return string
     */
    protected function scanElementForText(\DOMNode $element)
    {
    }
    /**
     * @param string $is
     *
     * @return RichText
     */
    private function parseRichText($is)
    {
    }
}