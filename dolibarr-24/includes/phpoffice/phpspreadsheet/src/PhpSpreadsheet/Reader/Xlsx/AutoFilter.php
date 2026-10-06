<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class AutoFilter
{
    private $worksheet;
    private $worksheetXml;
    public function __construct(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $workSheet, \SimpleXMLElement $worksheetXml)
    {
    }
    public function load()
    {
    }
    private function readAutoFilter($autoFilterRange, $xmlSheet)
    {
    }
    private function readDateRangeAutoFilter(\SimpleXMLElement $filters, \PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column $column)
    {
    }
    private function readCustomAutoFilter(\SimpleXMLElement $filterColumn, \PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column $column)
    {
    }
    private function readDynamicAutoFilter(\SimpleXMLElement $filterColumn, \PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column $column)
    {
    }
    private function readTopTenAutoFilter(\SimpleXMLElement $filterColumn, \PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column $column)
    {
    }
}