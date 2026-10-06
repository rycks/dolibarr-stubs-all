<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Pdf;

class Mpdf extends \PhpOffice\PhpSpreadsheet\Writer\Pdf
{
    /**
     * Gets the implementation of external PDF library that should be used.
     *
     * @param array $config Configuration array
     *
     * @return \Mpdf\Mpdf implementation
     */
    protected function createExternalWriterInstance($config)
    {
    }
    /**
     * Save Spreadsheet to file.
     *
     * @param string $pFilename Name of the file to save as
     *
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     * @throws PhpSpreadsheetException
     */
    public function save($pFilename)
    {
    }
    /**
     * Convert inches to mm.
     *
     * @param float $inches
     *
     * @return float
     */
    private function inchesToMm($inches)
    {
    }
}