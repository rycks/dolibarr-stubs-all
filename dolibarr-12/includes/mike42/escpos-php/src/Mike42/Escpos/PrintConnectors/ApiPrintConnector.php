<?php

namespace Mike42\Escpos\PrintConnectors;

class ApiPrintConnector implements \Mike42\Escpos\PrintConnectors\PrintConnector
{
    /**
     * @var string
     */
    protected $stream;
    /**
     * @var Client
     */
    protected $httpClient;
    /**
     * @var string
     */
    protected $printerId;
    /**
     * @var string
     */
    protected $apiToken;
    /**
     * Construct new connector
     *
     * @param string $host
     * @param string $printerId
     * @param string $apiToken
     */
    public function __construct($host, $printerId, $apiToken)
    {
    }
    /**
     * Print connectors should cause a NOTICE if they are deconstructed
     * when they have not been finalized.
     */
    public function __destruct()
    {
    }
    /**
     * Finish using this print connector (close file, socket, send
     * accumulated output, etc).
     */
    public function finalize()
    {
    }
    /**
     * Read data from the printer.
     *
     * @param string $len Length of data to read.
     * @return string Data read from the printer.
     */
    public function read($len)
    {
    }
    /**
     * Write data to the print connector.
     *
     * @param string $data The data to write
     */
    public function write($data)
    {
    }
}