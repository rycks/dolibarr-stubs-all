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
     * The input encoding of the buffer.
     */
    const INPUT_ENCODING = "UTF-8";
    /**
     * Un-recognised characters will be replaced with this.
     */
    const REPLACEMENT_CHAR = "?";
    /**
     * @var array $available
     *  This array Maps ESC/POS character tables to names iconv encodings
     */
    private $available = null;
    /**
     * @var array $encode
     *  Maps of UTF-8 to code-pages
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
    public function writeText($text)
    {
    }
    public function writeTextRaw($text)
    {
    }
    /**
     * Return an encoding which we can start to use for outputting this text.
     * Later parts of the text need not be included in the returned code page.
     *
     * @param string $text Input text to check.
     * @return boolean|integer Code page number, or FALSE if the text is not
     *  printable on any supported encoding.
     */
    private function identifyText($text)
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
     * @param string $text Text to print, UTF-8 format.
     * @param integer $encodingNo Encoding number to use- assumed to exist.
     */
    private function writeTextUsingEncoding($text, $encodingNo)
    {
    }
    /**
     * Write data to the underlying printer.
     *
     * @param string $data
     */
    private function write($data)
    {
    }
    /**
     * Return true if a character is an ASCII printable character.
     *
     * @param string $char Character to check
     * @param boolean $extended True to allow 128-256 values also (excluded by default)
     * @return boolean True if the character is printable, false if it is not.
     */
    private static function asciiCheck($char, $extended = false)
    {
    }
}