<?php

namespace PhpOffice\PhpSpreadsheet\Reader;

/**
 * Reader for SpreadsheetML, the XML schema for Microsoft Office Excel 2003.
 */
class Xml extends \PhpOffice\PhpSpreadsheet\Reader\BaseReader
{
    /**
     * Formats.
     *
     * @var array
     */
    protected $styles = [];
    /**
     * Character set used in the file.
     *
     * @var string
     */
    protected $charSet = 'UTF-8';
    /**
     * Create a new Excel2003XML Reader instance.
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
     * Check if the file is a valid SimpleXML.
     *
     * @param string $pFilename
     *
     * @throws Exception
     *
     * @return false|\SimpleXMLElement
     */
    public function trySimpleXMLLoadString($pFilename)
    {
    }
    /**
     * Reads names of the worksheets from a file, without parsing the whole file to a Spreadsheet object.
     *
     * @param string $pFilename
     *
     * @throws Exception
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
    private static function identifyFixedStyleValue($styleList, &$styleAttributeValue)
    {
    }
    /**
     * pixel units to excel width units(units of 1/256th of a character width).
     *
     * @param float $pxs
     *
     * @return float
     */
    protected static function pixel2WidthUnits($pxs)
    {
    }
    /**
     * excel width units(units of 1/256th of a character width) to pixel units.
     *
     * @param float $widthUnits
     *
     * @return float
     */
    protected static function widthUnits2Pixel($widthUnits)
    {
    }
    protected static function hex2str($hex)
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
    protected static function convertStringEncoding($string, $charset)
    {
    }
    protected function parseRichText($is)
    {
    }
    /**
     * @param SimpleXMLElement $xml
     * @param array $namespaces
     */
    private function parseStyles(\SimpleXMLElement $xml, array $namespaces)
    {
    }
    /**
     * @param string $styleID
     * @param SimpleXMLElement $styleAttributes
     */
    private function parseStyleAlignment($styleID, \SimpleXMLElement $styleAttributes)
    {
    }
    /**
     * @param $styleID
     * @param SimpleXMLElement $styleData
     * @param array $namespaces
     */
    private function parseStyleBorders($styleID, \SimpleXMLElement $styleData, array $namespaces)
    {
    }
    /**
     * @param $styleID
     * @param SimpleXMLElement $styleAttributes
     */
    private function parseStyleFont($styleID, \SimpleXMLElement $styleAttributes)
    {
    }
    /**
     * @param $styleID
     * @param SimpleXMLElement $styleAttributes
     */
    private function parseStyleInterior($styleID, \SimpleXMLElement $styleAttributes)
    {
    }
    /**
     * @param $styleID
     * @param SimpleXMLElement $styleAttributes
     */
    private function parseStyleNumberFormat($styleID, \SimpleXMLElement $styleAttributes)
    {
    }
}