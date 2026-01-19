<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Ods;

/**
 * @category   PhpSpreadsheet
 *
 * @method Ods getParentWriter
 *
 * @copyright  Copyright (c) 2006 - 2015 PhpSpreadsheet (https://github.com/PHPOffice/PhpSpreadsheet)
 * @author     Alexander Pervakov <frost-nzcr4@jagmort.com>
 */
class Content extends \PhpOffice\PhpSpreadsheet\Writer\Ods\WriterPart
{
    const NUMBER_COLS_REPEATED_MAX = 1024;
    const NUMBER_ROWS_REPEATED_MAX = 1048576;
    const CELL_STYLE_PREFIX = 'ce';
    /**
     * Write content.xml to XML format.
     *
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     *
     * @return string XML Output
     */
    public function write()
    {
    }
    /**
     * Write sheets.
     *
     * @param XMLWriter $objWriter
     */
    private function writeSheets(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter)
    {
    }
    /**
     * Write rows of the specified sheet.
     *
     * @param XMLWriter $objWriter
     * @param Worksheet $sheet
     */
    private function writeRows(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet)
    {
    }
    /**
     * Write cells of the specified row.
     *
     * @param XMLWriter $objWriter
     * @param Row $row
     *
     * @throws Exception
     */
    private function writeCells(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Row $row)
    {
    }
    /**
     * Write span.
     *
     * @param XMLWriter $objWriter
     * @param int $curColumn
     * @param int $prevColumn
     */
    private function writeCellSpan(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, $curColumn, $prevColumn)
    {
    }
    /**
     * Write XF cell styles.
     *
     * @param XMLWriter $writer
     * @param Spreadsheet $spreadsheet
     */
    private function writeXfStyles(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $writer, \PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Write attributes for merged cell.
     *
     * @param XMLWriter $objWriter
     * @param Cell $cell
     *
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    private function writeCellMerge(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Cell\Cell $cell)
    {
    }
}