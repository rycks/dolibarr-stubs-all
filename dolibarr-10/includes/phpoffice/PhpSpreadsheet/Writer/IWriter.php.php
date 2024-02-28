<?php

namespace PhpOffice\PhpSpreadsheet\Writer;

interface IWriter
{
    /**
     * IWriter constructor.
     *
     * @param Spreadsheet $spreadsheet
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet);
    /**
     * Save PhpSpreadsheet to file.
     *
     * @param string $pFilename Name of the file to save
     *
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function save($pFilename);
}