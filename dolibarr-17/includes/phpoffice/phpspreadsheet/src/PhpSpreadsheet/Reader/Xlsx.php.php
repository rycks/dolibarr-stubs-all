<?php

namespace PhpOffice\PhpSpreadsheet\Reader;

class Xlsx extends \PhpOffice\PhpSpreadsheet\Reader\BaseReader
{
    /**
     * ReferenceHelper instance.
     *
     * @var ReferenceHelper
     */
    private $referenceHelper;
    /**
     * Xlsx\Theme instance.
     *
     * @var Xlsx\Theme
     */
    private static $theme = null;
    /**
     * Create a new Xlsx Reader instance.
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
    private static function castToBoolean($c)
    {
    }
    private static function castToError($c)
    {
    }
    private static function castToString($c)
    {
    }
    private function castToFormula($c, $r, &$cellDataType, &$value, &$calculatedValue, &$sharedFormulas, $castBaseType)
    {
    }
    /**
     * @param ZipArchive $archive
     * @param string $fileName
     *
     * @return string
     */
    private function getFromZipArchive(\ZipArchive $archive, $fileName = '')
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
    private static function readColor($color, $background = false)
    {
    }
    /**
     * @param Style $docStyle
     * @param SimpleXMLElement|\stdClass $style
     */
    private static function readStyle(\PhpOffice\PhpSpreadsheet\Style\Style $docStyle, $style)
    {
    }
    /**
     * @param Border $docBorder
     * @param SimpleXMLElement $eleBorder
     */
    private static function readBorder(\PhpOffice\PhpSpreadsheet\Style\Border $docBorder, $eleBorder)
    {
    }
    /**
     * @param SimpleXMLElement | null $is
     *
     * @return RichText
     */
    private function parseRichText($is)
    {
    }
    /**
     * @param Spreadsheet $excel
     * @param mixed $customUITarget
     * @param mixed $zip
     */
    private function readRibbon(\PhpOffice\PhpSpreadsheet\Spreadsheet $excel, $customUITarget, $zip)
    {
    }
    private static function getArrayItem($array, $key = 0)
    {
    }
    private static function dirAdd($base, $add)
    {
    }
    private static function toCSSArray($style)
    {
    }
    private static function boolean($value)
    {
    }
    /**
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Drawing $objDrawing
     * @param \SimpleXMLElement $cellAnchor
     * @param array $hyperlinks
     */
    private function readHyperLinkDrawing($objDrawing, $cellAnchor, $hyperlinks)
    {
    }
    private function readProtection(\PhpOffice\PhpSpreadsheet\Spreadsheet $excel, \SimpleXMLElement $xmlWorkbook)
    {
    }
    private function readFormControlProperties(\PhpOffice\PhpSpreadsheet\Spreadsheet $excel, \ZipArchive $zip, $dir, $fileWorksheet, $docSheet, array &$unparsedLoadedData)
    {
    }
    private function readPrinterSettings(\PhpOffice\PhpSpreadsheet\Spreadsheet $excel, \ZipArchive $zip, $dir, $fileWorksheet, $docSheet, array &$unparsedLoadedData)
    {
    }
    /**
     * Convert an 'xsd:boolean' XML value to a PHP boolean value.
     * A valid 'xsd:boolean' XML value can be one of the following
     * four values: 'true', 'false', '1', '0'.  It is case sensitive.
     *
     * Note that just doing '(bool) $xsdBoolean' is not safe,
     * since '(bool) "false"' returns true.
     *
     * @see https://www.w3.org/TR/xmlschema11-2/#boolean
     *
     * @param string $xsdBoolean An XML string value of type 'xsd:boolean'
     *
     * @return bool  Boolean value
     */
    private function castXsdBooleanToBool($xsdBoolean)
    {
    }
}