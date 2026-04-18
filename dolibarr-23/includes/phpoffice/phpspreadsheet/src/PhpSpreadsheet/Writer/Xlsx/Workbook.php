<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Workbook extends \PhpOffice\PhpSpreadsheet\Writer\Xlsx\WriterPart
{
    /**
     * Write workbook to XML format.
     *
     * @param Spreadsheet $spreadsheet
     * @param bool $recalcRequired Indicate whether formulas should be recalculated before writing
     *
     * @throws WriterException
     *
     * @return string XML Output
     */
    public function writeWorkbook(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet, $recalcRequired = false)
    {
    }
    /**
     * Write file version.
     *
     * @param XMLWriter $objWriter XML Writer
     */
    private function writeFileVersion(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter)
    {
    }
    /**
     * Write WorkbookPr.
     *
     * @param XMLWriter $objWriter XML Writer
     */
    private function writeWorkbookPr(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter)
    {
    }
    /**
     * Write BookViews.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Spreadsheet $spreadsheet
     */
    private function writeBookViews(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Write WorkbookProtection.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Spreadsheet $spreadsheet
     */
    private function writeWorkbookProtection(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Write calcPr.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param bool $recalcRequired Indicate whether formulas should be recalculated before writing
     */
    private function writeCalcPr(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, $recalcRequired = true)
    {
    }
    /**
     * Write sheets.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Spreadsheet $spreadsheet
     *
     * @throws WriterException
     */
    private function writeSheets(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Write sheet.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param string $pSheetname Sheet name
     * @param int $pSheetId Sheet id
     * @param int $pRelId Relationship ID
     * @param string $sheetState Sheet state (visible, hidden, veryHidden)
     *
     * @throws WriterException
     */
    private function writeSheet(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, $pSheetname, $pSheetId = 1, $pRelId = 1, $sheetState = 'visible')
    {
    }
    /**
     * Write Defined Names.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Spreadsheet $spreadsheet
     *
     * @throws WriterException
     */
    private function writeDefinedNames(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Write named ranges.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Spreadsheet $spreadsheet
     *
     * @throws WriterException
     */
    private function writeNamedRanges(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Write Defined Name for named range.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param NamedRange $pNamedRange
     */
    private function writeDefinedNameForNamedRange(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\NamedRange $pNamedRange)
    {
    }
    /**
     * Write Defined Name for autoFilter.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Worksheet $pSheet
     * @param int $pSheetId
     */
    private function writeDefinedNameForAutofilter(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, $pSheetId = 0)
    {
    }
    /**
     * Write Defined Name for PrintTitles.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Worksheet $pSheet
     * @param int $pSheetId
     */
    private function writeDefinedNameForPrintTitles(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, $pSheetId = 0)
    {
    }
    /**
     * Write Defined Name for PrintTitles.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Worksheet $pSheet
     * @param int $pSheetId
     */
    private function writeDefinedNameForPrintArea(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, $pSheetId = 0)
    {
    }
}