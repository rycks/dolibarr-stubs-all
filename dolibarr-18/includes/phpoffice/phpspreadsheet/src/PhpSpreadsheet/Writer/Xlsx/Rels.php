<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Rels extends \PhpOffice\PhpSpreadsheet\Writer\Xlsx\WriterPart
{
    /**
     * Write relationships to XML format.
     *
     * @param Spreadsheet $spreadsheet
     *
     * @throws WriterException
     *
     * @return string XML Output
     */
    public function writeRelationships(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Write workbook relationships to XML format.
     *
     * @param Spreadsheet $spreadsheet
     *
     * @throws WriterException
     *
     * @return string XML Output
     */
    public function writeWorkbookRelationships(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Write worksheet relationships to XML format.
     *
     * Numbering is as follows:
     *     rId1                 - Drawings
     *  rId_hyperlink_x     - Hyperlinks
     *
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet
     * @param int $pWorksheetId
     * @param bool $includeCharts Flag indicating if we should write charts
     *
     * @throws WriterException
     *
     * @return string XML Output
     */
    public function writeWorksheetRelationships(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet, $pWorksheetId = 1, $includeCharts = false)
    {
    }
    private function writeUnparsedRelationship(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet, \PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, $relationship, $type)
    {
    }
    /**
     * Write drawing relationships to XML format.
     *
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet
     * @param int &$chartRef Chart ID
     * @param bool $includeCharts Flag indicating if we should write charts
     *
     * @throws WriterException
     *
     * @return string XML Output
     */
    public function writeDrawingRelationships(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet, &$chartRef, $includeCharts = false)
    {
    }
    /**
     * Write header/footer drawing relationships to XML format.
     *
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet
     *
     * @throws WriterException
     *
     * @return string XML Output
     */
    public function writeHeaderFooterDrawingRelationships(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet)
    {
    }
    /**
     * Write Override content type.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param int $pId Relationship ID. rId will be prepended!
     * @param string $pType Relationship type
     * @param string $pTarget Relationship target
     * @param string $pTargetMode Relationship target mode
     *
     * @throws WriterException
     */
    private function writeRelationship(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, $pId, $pType, $pTarget, $pTargetMode = '')
    {
    }
    /**
     * @param $objWriter
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Drawing $drawing
     * @param $i
     *
     * @throws WriterException
     *
     * @return int
     */
    private function writeDrawingHyperLink($objWriter, $drawing, $i)
    {
    }
}