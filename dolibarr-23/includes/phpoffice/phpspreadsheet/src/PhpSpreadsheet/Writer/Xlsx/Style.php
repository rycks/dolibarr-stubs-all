<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Style extends \PhpOffice\PhpSpreadsheet\Writer\Xlsx\WriterPart
{
    /**
     * Write styles to XML format.
     *
     * @param Spreadsheet $spreadsheet
     *
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     *
     * @return string XML Output
     */
    public function writeStyles(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Write Fill.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Fill $pFill Fill style
     */
    private function writeFill(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Style\Fill $pFill)
    {
    }
    /**
     * Write Gradient Fill.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Fill $pFill Fill style
     */
    private function writeGradientFill(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Style\Fill $pFill)
    {
    }
    /**
     * Write Pattern Fill.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Fill $pFill Fill style
     */
    private function writePatternFill(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Style\Fill $pFill)
    {
    }
    /**
     * Write Font.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Font $pFont Font style
     */
    private function writeFont(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Style\Font $pFont)
    {
    }
    /**
     * Write Border.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Borders $pBorders Borders style
     */
    private function writeBorder(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Style\Borders $pBorders)
    {
    }
    /**
     * Write Cell Style Xf.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param \PhpOffice\PhpSpreadsheet\Style\Style $pStyle Style
     * @param Spreadsheet $spreadsheet Workbook
     *
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    private function writeCellStyleXf(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Style\Style $pStyle, \PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Write Cell Style Dxf.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param \PhpOffice\PhpSpreadsheet\Style\Style $pStyle Style
     */
    private function writeCellStyleDxf(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Style\Style $pStyle)
    {
    }
    /**
     * Write BorderPr.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param string $pName Element name
     * @param Border $pBorder Border style
     */
    private function writeBorderPr(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, $pName, \PhpOffice\PhpSpreadsheet\Style\Border $pBorder)
    {
    }
    /**
     * Write NumberFormat.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param NumberFormat $pNumberFormat Number Format
     * @param int $pId Number Format identifier
     */
    private function writeNumFmt(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Style\NumberFormat $pNumberFormat, $pId = 0)
    {
    }
    /**
     * Get an array of all styles.
     *
     * @param Spreadsheet $spreadsheet
     *
     * @return \PhpOffice\PhpSpreadsheet\Style\Style[] All styles in PhpSpreadsheet
     */
    public function allStyles(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Get an array of all conditional styles.
     *
     * @param Spreadsheet $spreadsheet
     *
     * @return Conditional[] All conditional styles in PhpSpreadsheet
     */
    public function allConditionalStyles(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Get an array of all fills.
     *
     * @param Spreadsheet $spreadsheet
     *
     * @return Fill[] All fills in PhpSpreadsheet
     */
    public function allFills(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Get an array of all fonts.
     *
     * @param Spreadsheet $spreadsheet
     *
     * @return Font[] All fonts in PhpSpreadsheet
     */
    public function allFonts(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Get an array of all borders.
     *
     * @param Spreadsheet $spreadsheet
     *
     * @return Borders[] All borders in PhpSpreadsheet
     */
    public function allBorders(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Get an array of all number formats.
     *
     * @param Spreadsheet $spreadsheet
     *
     * @return NumberFormat[] All number formats in PhpSpreadsheet
     */
    public function allNumberFormats(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
}