<?php

/**
 * escpos-php, a Thermal receipt printer library, for use with
 * ESC/POS compatible printers.
 * 
 * Copyright (c) 2014-2015 Michael Billington <michael.billington@gmail.com>,
 * 	incorporating modifications by:
 *  - Roni Saha <roni.cse@gmail.com>
 *  - Gergely Radics <gerifield@ustream.tv>
 *  - Warren Doyle <w.doyle@fuelled.co>
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 * 
 * This class manages newlines and character encoding for the target printer, and
 * can be interchanged for an image-bassed buffer (ImagePrintBuffer) if you can't
 * get it operating properly on your machine.
 */
class EscposPrintBuffer implements \PrintBuffer
{
    /**
     * @var boolean True to cache output as .gz, false to leave un-compressed (useful for debugging)
     */
    const COMPRESS_CACHE = \true;
    /**
     * @var string The input encoding of the buffer.
     */
    const INPUT_ENCODING = "UTF-8";
    /**
     * @var string Un-recorgnised characters will be replaced with this.
     */
    const REPLACEMENT_CHAR = "?";
    /**
     * This array Maps ESC/POS character tables to names iconv encodings
     */
    private $available = \null;
    /**
     * @var array Maps of UTF-8 to code-pages
     */
    private $encode = \null;
    /**
     * @var Escpos Printer for output
     */
    private $printer;
    /**
     * Empty print buffer.
     */
    function __construct()
    {
    }
    public function flush()
    {
    }
    public function getPrinter()
    {
    }
    public function setPrinter(\Escpos $printer = \null)
    {
    }
    public function writeText($text)
    {
    }
    public function writeTextRaw($text)
    {
    }
    /**
     * Return an encoding which we can start to use for outputting this text. Later parts of the text need not be included in the returned code page.
     * 
     * @param string $text Input text to check.
     * @return boolean|integer Code page number, or FALSE if the text is not printable on any supported encoding.
     */
    private function identifyText($text)
    {
    }
    /**
     * Based on the printer's connector, compute (or load a cached copy of) maps of UTF character to unicode characters for later use.
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
    private static function asciiCheck($char, $extended = \false)
    {
    }
}