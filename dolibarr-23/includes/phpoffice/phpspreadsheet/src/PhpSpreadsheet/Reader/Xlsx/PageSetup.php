<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class PageSetup extends \PhpOffice\PhpSpreadsheet\Reader\Xlsx\BaseParserClass
{
    private $worksheet;
    private $worksheetXml;
    public function __construct(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $workSheet, \SimpleXMLElement $worksheetXml = null)
    {
    }
    public function load(array $unparsedLoadedData)
    {
    }
    private function margins(\SimpleXMLElement $xmlSheet, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $worksheet)
    {
    }
    private function pageSetup(\SimpleXMLElement $xmlSheet, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $worksheet, array $unparsedLoadedData)
    {
    }
    private function headerFooter(\SimpleXMLElement $xmlSheet, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $worksheet)
    {
    }
    private function pageBreaks(\SimpleXMLElement $xmlSheet, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $worksheet)
    {
    }
    private function rowBreaks(\SimpleXMLElement $xmlSheet, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $worksheet)
    {
    }
    private function columnBreaks(\SimpleXMLElement $xmlSheet, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $worksheet)
    {
    }
}