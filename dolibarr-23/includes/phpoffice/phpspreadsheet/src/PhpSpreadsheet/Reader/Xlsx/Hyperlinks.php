<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Hyperlinks
{
    private $worksheet;
    private $hyperlinks = [];
    public function __construct(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $workSheet)
    {
    }
    public function readHyperlinks(\SimpleXMLElement $relsWorksheet)
    {
    }
    public function setHyperlinks(\SimpleXMLElement $worksheetXml)
    {
    }
    private function setHyperlink(\SimpleXMLElement $hyperlink, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $worksheet)
    {
    }
}