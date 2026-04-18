<?php

namespace Mike42\Escpos\Experimental\Unifont;

class UnifontPrintBuffer implements \Mike42\Escpos\PrintBuffers\PrintBuffer
{
    private $printer;
    private $fontMap;
    private $started;
    private $unifont;
    public function __construct(string $unifontFilename)
    {
    }
    public function writeChar(int $codePoint)
    {
    }
    public function writeText(string $text)
    {
    }
    public function flush()
    {
    }
    public function setPrinter(\Mike42\Escpos\Printer $printer = null)
    {
    }
    public function writeTextRaw(string $text)
    {
    }
    public function getPrinter()
    {
    }
    /**
     * Write data to the underlying connector.
     *
     * @param string $data
     */
    private function write($data)
    {
    }
}