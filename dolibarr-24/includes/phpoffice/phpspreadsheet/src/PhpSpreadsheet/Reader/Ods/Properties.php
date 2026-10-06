<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Ods;

class Properties
{
    private $spreadsheet;
    public function __construct(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    public function load(\SimpleXMLElement $xml, $namespacesMeta)
    {
    }
    private function setCoreProperties(\PhpOffice\PhpSpreadsheet\Document\Properties $docProps, \SimpleXMLElement $officePropertyDC)
    {
    }
    private function setMetaProperties($namespacesMeta, \SimpleXMLElement $propertyValue, $propertyName, \PhpOffice\PhpSpreadsheet\Document\Properties $docProps)
    {
    }
    private function setUserDefinedProperty($propertyValueAttributes, $propertyValue, \PhpOffice\PhpSpreadsheet\Document\Properties $docProps)
    {
    }
}