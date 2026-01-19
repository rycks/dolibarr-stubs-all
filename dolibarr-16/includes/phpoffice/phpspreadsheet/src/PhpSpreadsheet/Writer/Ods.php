<?php

namespace PhpOffice\PhpSpreadsheet\Writer;

class Ods extends \PhpOffice\PhpSpreadsheet\Writer\BaseWriter
{
    /**
     * Private writer parts.
     *
     * @var Ods\WriterPart[]
     */
    private $writerParts = [];
    /**
     * Private PhpSpreadsheet.
     *
     * @var Spreadsheet
     */
    private $spreadSheet;
    /**
     * Create a new Ods.
     *
     * @param Spreadsheet $spreadsheet
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
    /**
     * Get writer part.
     *
     * @param string $pPartName Writer part name
     *
     * @return null|Ods\WriterPart
     */
    public function getWriterPart($pPartName)
    {
    }
    /**
     * Save PhpSpreadsheet to file.
     *
     * @param string $pFilename
     *
     * @throws WriterException
     */
    public function save($pFilename)
    {
    }
    /**
     * Create zip object.
     *
     * @param string $pFilename
     *
     * @throws WriterException
     *
     * @return ZipArchive
     */
    private function createZip($pFilename)
    {
    }
    /**
     * Get Spreadsheet object.
     *
     * @throws WriterException
     *
     * @return Spreadsheet
     */
    public function getSpreadsheet()
    {
    }
    /**
     * Set Spreadsheet object.
     *
     * @param Spreadsheet $spreadsheet PhpSpreadsheet object
     *
     * @return self
     */
    public function setSpreadsheet(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet)
    {
    }
}