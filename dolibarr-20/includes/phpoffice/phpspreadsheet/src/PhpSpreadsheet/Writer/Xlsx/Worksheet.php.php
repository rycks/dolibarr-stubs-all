<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * @category   PhpSpreadsheet
 *
 * @copyright  Copyright (c) 2006 - 2015 PhpSpreadsheet (https://github.com/PHPOffice/PhpSpreadsheet)
 */
class Worksheet extends \PhpOffice\PhpSpreadsheet\Writer\Xlsx\WriterPart
{
    /**
     * Write worksheet to XML format.
     *
     * @param PhpspreadsheetWorksheet $pSheet
     * @param string[] $pStringTable
     * @param bool $includeCharts Flag indicating if we should write charts
     *
     * @throws WriterException
     *
     * @return string XML Output
     */
    public function writeWorksheet(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, $pStringTable = null, $includeCharts = false)
    {
    }
    /**
     * Write SheetPr.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writeSheetPr(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write Dimension.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writeDimension(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write SheetViews.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     *
     * @throws WriterException
     */
    private function writeSheetViews(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write SheetFormatPr.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writeSheetFormatPr(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write Cols.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writeCols(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write SheetProtection.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writeSheetProtection(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write ConditionalFormatting.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     *
     * @throws WriterException
     */
    private function writeConditionalFormatting(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write DataValidations.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writeDataValidations(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write Hyperlinks.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writeHyperlinks(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write ProtectedRanges.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writeProtectedRanges(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write MergeCells.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writeMergeCells(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write PrintOptions.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writePrintOptions(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write PageMargins.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writePageMargins(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write AutoFilter.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writeAutoFilter(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write PageSetup.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writePageSetup(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write Header / Footer.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writeHeaderFooter(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write Breaks.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writeBreaks(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write SheetData.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     * @param string[] $pStringTable String table
     *
     * @throws WriterException
     */
    private function writeSheetData(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, array $pStringTable)
    {
    }
    /**
     * Write Cell.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     * @param Cell $pCellAddress Cell Address
     * @param string[] $pFlippedStringTable String table (flipped), for faster index searching
     *
     * @throws WriterException
     */
    private function writeCell(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, $pCellAddress, array $pFlippedStringTable)
    {
    }
    /**
     * Write Drawings.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     * @param bool $includeCharts Flag indicating if we should include drawing details for charts
     */
    private function writeDrawings(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, $includeCharts = false)
    {
    }
    /**
     * Write LegacyDrawing.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writeLegacyDrawing(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    /**
     * Write LegacyDrawingHF.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param PhpspreadsheetWorksheet $pSheet Worksheet
     */
    private function writeLegacyDrawingHF(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
    private function writeAlternateContent(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet)
    {
    }
}