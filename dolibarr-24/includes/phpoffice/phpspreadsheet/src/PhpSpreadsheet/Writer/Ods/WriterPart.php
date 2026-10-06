<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Ods;

abstract class WriterPart
{
    /**
     * Parent Ods object.
     *
     * @var Ods
     */
    private $parentWriter;
    /**
     * Get Ods writer.
     *
     * @return Ods
     */
    public function getParentWriter()
    {
    }
    /**
     * Set parent Ods writer.
     *
     * @param Ods $writer
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Writer\Ods $writer)
    {
    }
}