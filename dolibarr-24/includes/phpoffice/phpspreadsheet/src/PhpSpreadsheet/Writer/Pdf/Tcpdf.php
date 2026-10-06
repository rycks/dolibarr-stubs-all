<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Pdf;

class Tcpdf extends \PhpOffice\PhpSpreadsheet\Writer\Pdf
{
    /**
     * Gets the implementation of external PDF library that should be used.
     *
     * @param string $orientation Page orientation
     * @param string $unit Unit measure
     * @param string $paperSize Paper size
     *
     * @return \TCPDF implementation
     */
    protected function createExternalWriterInstance($orientation, $unit, $paperSize)
    {
    }
    /**
     * Save Spreadsheet to file.
     *
     * @param string $pFilename Name of the file to save as
     *
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function save($pFilename)
    {
    }
}