<?php

namespace Mike42\Escpos\PrintConnectors;

/**
 * Wrap multiple connectors up, to print to several printers at the same time.
 */
class MultiplePrintConnector implements \Mike42\Escpos\PrintConnectors\PrintConnector
{
    private $connectors;
    public function __construct(\Mike42\Escpos\PrintConnectors\PrintConnector ...$connectors)
    {
    }
    public function finalize()
    {
    }
    public function read($len)
    {
    }
    public function write($data)
    {
    }
    public function __destruct()
    {
    }
}