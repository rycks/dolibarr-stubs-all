<?php

namespace Mike42\Escpos\PrintConnectors;

/**
 * Print connector that passes print data to CUPS print commands.
 * Your printer mut be installed on the local CUPS instance to use this connector.
 */
class CupsPrintConnector implements \Mike42\Escpos\PrintConnectors\PrintConnector
{
    /**
     * @var array $buffer
     *  Buffer of accumilated data.
     */
    private $buffer;
    /**
     *
     * @var string $printerName
     *  The name of the target printer.
     */
    private $printerName;
    /**
     * Construct new CUPS print connector.
     *
     * @param string $dest
     *          The CUPS printer name to print to. This must be loaded using a raw driver.
     * @throws BadMethodCallException
     */
    public function __construct($dest)
    {
    }
    /**
     * Cause a NOTICE if deconstructed before the job was printed.
     */
    public function __destruct()
    {
    }
    /**
     * Send job to printer.
     */
    public function finalize()
    {
    }
    /**
     * Run a command and throw an exception if it fails, or return the output if it works.
     * (Basically exec() with good error handling)
     *
     * @param string $cmd
     *          Command to run
     */
    protected function getCmdOutput($cmd)
    {
    }
    /**
     * Read data from the printer.
     *
     * @param string $len Length of data to read.
     * @return Data read from the printer, or false where reading is not possible.
     */
    public function read($len)
    {
    }
    /**
     * @param string $data
     */
    public function write($data)
    {
    }
    /**
     * Load a list of CUPS printers.
     *
     * @return array A list of printer names installed on this system. Any item
     *  on this list is valid for constructing a printer.
     */
    protected function getLocalPrinters()
    {
    }
    /**
     * Get the item before the first space in a string
     *
     * @param string $line
     * @return string the string, up to the first space, or the whole string if it contains no spaces.
     */
    private function chopLpstatLine($line)
    {
    }
}