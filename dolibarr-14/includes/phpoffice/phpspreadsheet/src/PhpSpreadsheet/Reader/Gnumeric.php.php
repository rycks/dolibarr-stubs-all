<?php

namespace PhpOffice\PhpSpreadsheet\Reader;

class Gnumeric extends \PhpOffice\PhpSpreadsheet\Reader\BaseReader
{
    /**
     * Shared Expressions.
     *
     * @var array
     */
    private $expressions = [];
    private $referenceHelper;
    /**
     * Create a new Gnumeric.
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
     * Reads names of the worksheets from a file, without parsing the whole file to a Spreadsheet object.
     *
     * @param string $pFilename
     *
     * @return array
     */
    public function listWorksheetNames($pFilename)
    {
    }
    /**
     * Return worksheet info (Name, Last Column Letter, Last Column Index, Total Rows, Total Columns).
     *
     * @param string $pFilename
     *
     * @return array
     */
    public function listWorksheetInfo($pFilename)
    {
    }
    /**
     * @param string $filename
     *
     * @return string
     */
    private function gzfileGetContents($filename)
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
     * Loads from file into Spreadsheet instance.
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
    private static function parseBorderAttributes($borderAttributes)
    {
    }
    private function parseRichText($is)
    {
    }
    private static function parseGnumericColour($gnmColour)
    {
    }
}