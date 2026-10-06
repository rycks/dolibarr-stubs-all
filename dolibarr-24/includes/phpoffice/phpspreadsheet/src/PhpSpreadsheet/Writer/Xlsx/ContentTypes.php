<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ContentTypes extends \PhpOffice\PhpSpreadsheet\Writer\Xlsx\WriterPart
{
    /**
     * Write content types to XML format.
     *
     * @param Spreadsheet $spreadsheet
     * @param bool $includeCharts Flag indicating if we should include drawing details for charts
     *
     * @throws WriterException
     *
     * @return string XML Output
     */
    public function writeContentTypes(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet, $includeCharts = false)
    {
    }
    /**
     * Get image mime type.
     *
     * @param string $pFile Filename
     *
     * @throws WriterException
     *
     * @return string Mime Type
     */
    private function getImageMimeType($pFile)
    {
    }
    /**
     * Write Default content type.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param string $pPartname Part name
     * @param string $pContentType Content type
     *
     * @throws WriterException
     */
    private function writeDefaultContentType(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, $pPartname, $pContentType)
    {
    }
    /**
     * Write Override content type.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param string $pPartname Part name
     * @param string $pContentType Content type
     *
     * @throws WriterException
     */
    private function writeOverrideContentType(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, $pPartname, $pContentType)
    {
    }
}