<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xlsx;

abstract class WriterPart
{
    /**
     * Parent Xlsx object.
     *
     * @var Xlsx
     */
    private $parentWriter;
    /**
     * Get parent Xlsx object.
     *
     * @return Xlsx
     */
    public function getParentWriter()
    {
    }
    /**
     * Set parent Xlsx object.
     *
     * @param Xlsx $pWriter
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Writer\Xlsx $pWriter)
    {
    }
}