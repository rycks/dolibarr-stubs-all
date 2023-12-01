<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class SheetViewOptions extends \PhpOffice\PhpSpreadsheet\Reader\Xlsx\BaseParserClass
{
    private $worksheet;
    private $worksheetXml;
    public function __construct(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $workSheet, \SimpleXMLElement $worksheetXml = null)
    {
    }
    /**
     * @param bool $readDataOnly
     */
    public function load($readDataOnly = false)
    {
    }
    private function tabColor(\SimpleXMLElement $sheetPr)
    {
    }
    private function codeName(\SimpleXMLElement $sheetPr)
    {
    }
    private function outlines(\SimpleXMLElement $sheetPr)
    {
    }
    private function pageSetup(\SimpleXMLElement $sheetPr)
    {
    }
    private function sheetFormat(\SimpleXMLElement $sheetFormatPr)
    {
    }
    private function printOptions(\SimpleXMLElement $printOptions)
    {
    }
}