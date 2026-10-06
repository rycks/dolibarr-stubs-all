<?php

namespace Mike42\Escpos\PrintConnectors;

/**
 * Print connector that writes to nowhere, but allows the user to retrieve the
 * buffered data. Used for testing.
 */
final class DummyPrintConnector implements \Mike42\Escpos\PrintConnectors\PrintConnector
{
    /**
     * @var array $buffer
     *  Buffer of accumilated data.
     */
    private $buffer;
    /**
     * @var string data which the printer will provide on next read
     */
    private $readData;
    /**
     * Create new print connector
     */
    public function __construct()
    {
    }
    public function clear()
    {
    }
    public function __destruct()
    {
    }
    public function finalize()
    {
    }
    /**
     * @return string Get the accumulated data that has been sent to this buffer.
     */
    public function getData()
    {
    }
    /**
     * {@inheritDoc}
     * @see PrintConnector::read()
     */
    public function read($len)
    {
    }
    public function write($data)
    {
    }
}