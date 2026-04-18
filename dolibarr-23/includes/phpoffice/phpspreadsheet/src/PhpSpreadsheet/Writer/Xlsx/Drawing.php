<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Drawing extends \PhpOffice\PhpSpreadsheet\Writer\Xlsx\WriterPart
{
    /**
     * Write drawings to XML format.
     *
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet
     * @param bool $includeCharts Flag indicating if we should include drawing details for charts
     *
     * @throws WriterException
     *
     * @return string XML Output
     */
    public function writeDrawings(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet, $includeCharts = false)
    {
    }
    /**
     * Write drawings to XML format.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param \PhpOffice\PhpSpreadsheet\Chart\Chart $pChart
     * @param int $pRelationId
     */
    public function writeChart(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Chart\Chart $pChart, $pRelationId = -1)
    {
    }
    /**
     * Write drawings to XML format.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param BaseDrawing $pDrawing
     * @param int $pRelationId
     * @param null|int $hlinkClickId
     *
     * @throws WriterException
     */
    public function writeDrawing(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing $pDrawing, $pRelationId = -1, $hlinkClickId = null)
    {
    }
    /**
     * Write VML header/footer images to XML format.
     *
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet
     *
     * @throws WriterException
     *
     * @return string XML Output
     */
    public function writeVMLHeaderFooterImages(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pWorksheet)
    {
    }
    /**
     * Write VML comment to XML format.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param string $pReference Reference
     * @param HeaderFooterDrawing $pImage Image
     */
    private function writeVMLHeaderFooterImage(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, $pReference, \PhpOffice\PhpSpreadsheet\Worksheet\HeaderFooterDrawing $pImage)
    {
    }
    /**
     * Get an array of all drawings.
     *
     * @param Spreadsheet $spreadsheet
     *
     * @return \PhpOffice\PhpSpreadsheet\Worksheet\Drawing[] All drawings in PhpSpreadsheet
     */
    public function allDrawings(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * @param XMLWriter $objWriter
     * @param null|int $hlinkClickId
     */
    private function writeHyperLinkDrawing(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, $hlinkClickId)
    {
    }
}