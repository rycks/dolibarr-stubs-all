<?php

namespace Mike42\Escpos\PrintBuffers;

/**
 * This class manages newlines and character encoding for the target printer, and
 * can be interchanged for an image-bassed buffer (ImagePrintBuffer) if you can't
 * get it operating properly on your machine.
 */
class EscposPrintBuffer implements \Mike42\Escpos\PrintBuffers\PrintBuffer
{
    /**
     *  True to cache output as .z, false to leave un-compressed (useful for debugging)
     */
    const COMPRESS_CACHE = true;
    /**
     * Un-recognised characters will be replaced with this.
     */
    const REPLACEMENT_CHAR = "?";
    /**
     * @var array $available
     * Map code points to printer-specific code page numbers which contain them
     */
    private $available = null;
    /**
     * @var array $encode
     * Map code pages to a map of code points to encoding-specific characters 128-255
     */
    private $encode = null;
    /**
     * @var Printer|null $printer
     *  Printer for output
     */
    private $printer;
    /**
     * Empty print buffer.
     */
    public function __construct()
    {
    }
    public function flush()
    {
    }
    public function getPrinter()
    {
    }
    public function setPrinter(\Mike42\Escpos\Printer $printer = null)
    {
    }
    public function writeText(string $text)
    {
    }
    public function writeTextRaw(string $text)
    {
    }
    /**
     * Return an encoding which we can start to use for outputting this text.
     * Later parts of the text need not be included in the returned code page.
     *
     * @param int $codePoint Code point to check.
     * @return boolean|integer Code page number, or FALSE if the text is not
     *  printable on any supported encoding.
     */
    private function identifyText(int $codePoint)
    {
    }
    /**
     * Based on the printer's connector, compute (or load a cached copy of) maps
     * of UTF character to unicode characters for later use.
     */
    private function loadAvailableCharacters()
    {
    }
    /**
     * Encode a block of text using the specified map, and write it to the printer.
     *
     * @param array $codePoints Text to print, as list of unicode code points
     * @param integer $encodingNo Encoding number to use- assumed to exist.
     */
    private function writeTextUsingEncoding(array $codePoints, int $encodingNo)
    {
    }
    /**
     * Write data to the underlying printer.
     *
     * @param string $data
     */
    private function write(string $data)
    {
    }
    /**
     * Return true if a character is an ASCII printable character.
     *
     * @param string $char Character to check
     * @param boolean $extended True to allow 128-256 values also (excluded by default)
     * @return boolean True if the character is printable, false if it is not.
     */
    private static function asciiCheck(string $char, bool $extended = false)
    {
    }
}