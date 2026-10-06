<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class ColumnAndRowAttributes extends \PhpOffice\PhpSpreadsheet\Reader\Xlsx\BaseParserClass
{
    private $worksheet;
    private $worksheetXml;
    public function __construct(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $workSheet, \SimpleXMLElement $worksheetXml = null)
    {
    }
    /**
     * Set Worksheet column attributes by attributes array passed.
     *
     * @param string $columnAddress A, B, ... DX, ...
     * @param array $columnAttributes array of attributes (indexes are attribute name, values are value)
     *                               'xfIndex', 'visible', 'collapsed', 'outlineLevel', 'width', ... ?
     */
    private function setColumnAttributes($columnAddress, array $columnAttributes)
    {
    }
    /**
     * Set Worksheet row attributes by attributes array passed.
     *
     * @param int $rowNumber 1, 2, 3, ... 99, ...
     * @param array $rowAttributes array of attributes (indexes are attribute name, values are value)
     *                               'xfIndex', 'visible', 'collapsed', 'outlineLevel', 'rowHeight', ... ?
     */
    private function setRowAttributes($rowNumber, array $rowAttributes)
    {
    }
    /**
     * @param IReadFilter $readFilter
     * @param bool $readDataOnly
     */
    public function load(\PhpOffice\PhpSpreadsheet\Reader\IReadFilter $readFilter = null, $readDataOnly = false)
    {
    }
    private function isFilteredColumn(\PhpOffice\PhpSpreadsheet\Reader\IReadFilter $readFilter, $columnCoordinate, array $rowsAttributes)
    {
    }
    private function readColumnAttributes(\SimpleXMLElement $worksheetCols, $readDataOnly)
    {
    }
    private function readColumnRangeAttributes(\SimpleXMLElement $column, $readDataOnly)
    {
    }
    private function isFilteredRow(\PhpOffice\PhpSpreadsheet\Reader\IReadFilter $readFilter, $rowCoordinate, array $columnsAttributes)
    {
    }
    private function readRowAttributes(\SimpleXMLElement $worksheetRow, $readDataOnly)
    {
    }
}