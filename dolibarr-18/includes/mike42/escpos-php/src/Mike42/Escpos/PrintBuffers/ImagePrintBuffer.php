<?php

namespace Mike42\Escpos\PrintBuffers;

/**
 * This class renders text to small images on-the-fly. It attempts to mimic the
 * behaviour of text output, whilst supporting any fonts & character encodings
 * which your system can handle. This class currently requires Imagick.
 */
class ImagePrintBuffer implements \Mike42\Escpos\PrintBuffers\PrintBuffer
{
    private $printer;
    /**
     * @var string|null font to use
     */
    private $font;
    private $fontSize;
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
     * Set path on disk to TTF font that will be used to render text to image,
     * or 'null' to use a default.
     *
     * ImageMagick will also accept a font name, but this will not port as well
     * between systems.
     *
     * @param string $font
     *            Font name or a filename
     */
    public function setFont(string $font)
    {
    }
    /**
     * Numeric font size for rendering text to image
     */
    public function setFontSize(int $fontSize)
    {
    }
}