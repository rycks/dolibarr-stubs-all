<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class ConditionalStyles
{
    private $worksheet;
    private $worksheetXml;
    private $dxfs;
    public function __construct(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $workSheet, \SimpleXMLElement $worksheetXml, array $dxfs = [])
    {
    }
    public function load()
    {
    }
    private function readConditionalStyles($xmlSheet)
    {
    }
    private function setConditionalStyles(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $worksheet, array $conditionals)
    {
    }
    private function readStyleRules($cfRules)
    {
    }
}