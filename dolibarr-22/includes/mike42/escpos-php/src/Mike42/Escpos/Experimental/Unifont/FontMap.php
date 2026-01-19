<?php

namespace Mike42\Escpos\Experimental\Unifont;

class FontMap
{
    protected $printer;
    const MIN = 0x20;
    const MAX = 0x7e;
    const FONT_A_WIDTH = 12;
    const FONT_B_WIDTH = 9;
    // Map memory locations to code points
    protected $memory;
    // Map unicode code points to bytes
    protected $chars;
    // next available slot
    protected $next = 0;
    public function __construct(\Mike42\Escpos\Experimental\Unifont\ColumnFormatGlyphFactory $glyphFactory, \Mike42\Escpos\Printer $printer)
    {
    }
    public function cacheChars(array $codePoints)
    {
    }
    public function writeChar(int $codePoint)
    {
    }
    public function reset()
    {
    }
    public function occupied($id)
    {
    }
    public function evict($id)
    {
    }
    public function addChar(int $codePoint, $evict = true)
    {
    }
    public function submitCharsToPrinterFont(array $chars)
    {
    }
}