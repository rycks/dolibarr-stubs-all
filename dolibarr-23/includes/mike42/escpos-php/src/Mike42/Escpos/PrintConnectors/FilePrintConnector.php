<?php

namespace Mike42\Escpos\PrintConnectors;

/**
 * PrintConnector for passing print data to a file.
 */
class FilePrintConnector implements \Mike42\Escpos\PrintConnectors\PrintConnector
{
    /**
     * @var resource $fp
     *  The file pointer to send data to.
     */
    protected $fp;
    /**
     * Construct new connector, given a filename
     *
     * @param string $filename
     */
    public function __construct($filename)
    {
    }
    public function __destruct()
    {
    }
    /**
     * Close file pointer
     */
    public function finalize()
    {
    }
    /* (non-PHPdoc)
     * @see PrintConnector::read()
     */
    public function read($len)
    {
    }
    /**
     * Write data to the file
     *
     * @param string $data
     */
    public function write($data)
    {
    }
}