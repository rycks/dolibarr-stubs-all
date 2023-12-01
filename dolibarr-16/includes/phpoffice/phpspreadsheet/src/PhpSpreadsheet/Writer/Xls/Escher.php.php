<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xls;

class Escher
{
    /**
     * The object we are writing.
     */
    private $object;
    /**
     * The written binary data.
     */
    private $data;
    /**
     * Shape offsets. Positions in binary stream where a new shape record begins.
     *
     * @var array
     */
    private $spOffsets;
    /**
     * Shape types.
     *
     * @var array
     */
    private $spTypes;
    /**
     * Constructor.
     *
     * @param mixed $object
     */
    public function __construct($object)
    {
    }
    /**
     * Process the object to be written.
     *
     * @return string
     */
    public function close()
    {
    }
    /**
     * Gets the shape offsets.
     *
     * @return array
     */
    public function getSpOffsets()
    {
    }
    /**
     * Gets the shape types.
     *
     * @return array
     */
    public function getSpTypes()
    {
    }
}