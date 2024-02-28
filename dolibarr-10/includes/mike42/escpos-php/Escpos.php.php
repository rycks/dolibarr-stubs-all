<?php

class Escpos
{
    /* ASCII codes */
    const NUL = "\x00";
    const LF = "\n";
    const ESC = "\x1b";
    const FS = "\x1c";
    const FF = "\f";
    const GS = "\x1d";
    const DLE = "\x10";
    const EOT = "\x04";
    /* Barcode types */
    const BARCODE_UPCA = 65;
    const BARCODE_UPCE = 66;
    const BARCODE_JAN13 = 67;
    const BARCODE_JAN8 = 68;
    const BARCODE_CODE39 = 69;
    const BARCODE_ITF = 70;
    const BARCODE_CODABAR = 71;
    const BARCODE_CODE93 = 72;
    const BARCODE_CODE128 = 73;
    /* Barcode HRI (human-readable interpretation) text position */
    const BARCODE_TEXT_NONE = 0;
    const BARCODE_TEXT_ABOVE = 1;
    const BARCODE_TEXT_BELOW = 2;
    /* Cut types */
    const CUT_FULL = 65;
    const CUT_PARTIAL = 66;
    /* Fonts */
    const FONT_A = 0;
    const FONT_B = 1;
    const FONT_C = 2;
    /* Image sizing options */
    const IMG_DEFAULT = 0;
    const IMG_DOUBLE_WIDTH = 1;
    const IMG_DOUBLE_HEIGHT = 2;
    /* Justifications */
    const JUSTIFY_LEFT = 0;
    const JUSTIFY_CENTER = 1;
    const JUSTIFY_RIGHT = 2;
    /* Print mode constants */
    const MODE_FONT_A = 0;
    const MODE_FONT_B = 1;
    const MODE_EMPHASIZED = 8;
    const MODE_DOUBLE_HEIGHT = 16;
    const MODE_DOUBLE_WIDTH = 32;
    const MODE_UNDERLINE = 128;
    /* QR code error correction levels */
    const QR_ECLEVEL_L = 0;
    const QR_ECLEVEL_M = 1;
    const QR_ECLEVEL_Q = 2;
    const QR_ECLEVEL_H = 3;
    /* QR code models */
    const QR_MODEL_1 = 1;
    const QR_MODEL_2 = 2;
    const QR_MICRO = 3;
    /* Printer statuses */
    const STATUS_PRINTER = 1;
    const STATUS_OFFLINE_CAUSE = 2;
    const STATUS_ERROR_CAUSE = 3;
    const STATUS_PAPER_ROLL = 4;
    const STATUS_INK_A = 7;
    const STATUS_INK_B = 6;
    const STATUS_PEELER = 8;
    /* Underline */
    const UNDERLINE_NONE = 0;
    const UNDERLINE_SINGLE = 1;
    const UNDERLINE_DOUBLE = 2;
    /**
     * @var PrintBuffer The printer's output buffer.
     */
    private $buffer;
    /**
     * @var PrintConnector
     * @CHANGE
     */
    protected $connector;
    // private $connector;
    /**
     * @var AbstractCapabilityProfile
     */
    private $profile;
    /**
     * @var int Current character code table
     */
    private $characterTable;
    /**
     * Construct a new print object
     *
     * @param PrintConnector $connector The PrintConnector to send data to. If not set, output is sent to standard output.
     * @param AbstractCapabilityProfile $profile Supported features of this printer. If not set, the DefaultCapabilityProfile will be used, which is suitable for Epson printers.
     * @throws InvalidArgumentException
     */
    function __construct(\PrintConnector $connector = \null, \AbstractCapabilityProfile $profile = \null)
    {
    }
    /**
     * Print a barcode.
     *
     * @param string $content The information to encode.
     * @param int $type The barcode standard to output. If not specified, `Escpos::BARCODE_CODE39` will be used. Note that some barcode formats only support specific lengths or sets of characters.
     * @throws InvalidArgumentException Where the length or characters used in $content is invalid for the requested barcode format.
     */
    function barcode($content, $type = self::BARCODE_CODE39)
    {
    }
    /**
     * Print an image, using the older "bit image" command. This creates padding on the right of the image,
     * if its width is not divisible by 8.
     * 
     * Should only be used if your printer does not support the graphics() command.
     * 
     * @param EscposImage $img The image to print
     * @param EscposImage $size Size modifier for the image.
     */
    function bitImage(\EscposImage $img, $size = self::IMG_DEFAULT)
    {
    }
    /**
     * Close the underlying buffer. With some connectors, the
     * job will not actually be sent to the printer until this is called.
     */
    function close()
    {
    }
    /**
     * Cut the paper.
     *
     * @param int $mode Cut mode, either Escpos::CUT_FULL or Escpos::CUT_PARTIAL. If not specified, `Escpos::CUT_FULL` will be used.
     * @param int $lines Number of lines to feed
     */
    function cut($mode = self::CUT_FULL, $lines = 3)
    {
    }
    /**
     * Print and feed line / Print and feed n lines.
     * 
     * @param int $lines Number of lines to feed
     */
    function feed($lines = 1)
    {
    }
    /**
     * Some printers require a form feed to release the paper. On most printers, this 
     * command is only useful in page mode, which is not implemented in this driver.
     */
    function feedForm()
    {
    }
    /**
     * Print and reverse feed n lines.
     *
     * @param int $lines number of lines to feed. If not specified, 1 line will be fed.
     */
    function feedReverse($lines = 1)
    {
    }
    /**
     * @return number
     */
    function getCharacterTable()
    {
    }
    /**
     * @return PrintBuffer
     */
    function getPrintBuffer()
    {
    }
    /**
     * @return PrintConnector
     */
    function getPrintConnector()
    {
    }
    /**
     * @return AbstractCapabilityProfile
     */
    function getPrinterCapabilityProfile()
    {
    }
    /**
     * @param int $type The type of status to request
     * @return stdClass Class containing requested status, or null if either no status was received, or your print connector is unable to read from the printer.
     */
    function getPrinterStatus($type = self::STATUS_PRINTER)
    {
    }
    /**
     * Print an image to the printer.
     * 
     * Size modifiers are:
     * - IMG_DEFAULT (leave image at original size)
     * - IMG_DOUBLE_WIDTH
     * - IMG_DOUBLE_HEIGHT
     * 
     * See the example/ folder for detailed examples.
     * 
     * The function bitImage() takes the same parameters, and can be used if
     * your printer doesn't support the newer graphics commands.
     * 
     * @param EscposImage $img The image to print.
     * @param int $size Output size modifier for the image.
     */
    function graphics(\EscposImage $img, $size = self::IMG_DEFAULT)
    {
    }
    /**
     * Initialize printer. This resets formatting back to the defaults.
     */
    function initialize()
    {
    }
    /**
     * Generate a pulse, for opening a cash drawer if one is connected.
     * The default settings should open an Epson drawer.
     *
     * @param int $pin 0 or 1, for pin 2 or pin 5 kick-out connector respectively.
     * @param int $on_ms pulse ON time, in milliseconds.
     * @param int $off_ms pulse OFF time, in milliseconds.
     */
    function pulse($pin = 0, $on_ms = 120, $off_ms = 240)
    {
    }
    /**
     * Print the given data as a QR code on the printer.
     * 
     * @param string $content The content of the code. Numeric data will be more efficiently compacted.
     * @param int $ec Error-correction level to use. One of Escpos::QR_ECLEVEL_L (default), Escpos::QR_ECLEVEL_M, Escpos::QR_ECLEVEL_Q or Escpos::QR_ECLEVEL_H. Higher error correction results in a less compact code.
     * @param int $size Pixel size to use. Must be 1-16 (default 3)
     * @param int $model QR code model to use. Must be one of Escpos::QR_MODEL_1, Escpos::QR_MODEL_2 (default) or Escpos::QR_MICRO (not supported by all printers).
     */
    function qrCode($content, $ec = self::QR_ECLEVEL_L, $size = 3, $model = self::QR_MODEL_2)
    {
    }
    /**
     * Switch character table (code page) manually. Used in conjunction with textRaw() to
     * print special characters which can't be encoded automatically.
     * 
     * @param int $table The table to select. Available code tables are model-specific.
     */
    function selectCharacterTable($table = 0)
    {
    }
    /**
     * Select print mode(s).
     * 
     * Several MODE_* constants can be OR'd together passed to this function's `$mode` argument. The valid modes are:
     *  - MODE_FONT_A
     *  - MODE_FONT_B
     *  - MODE_EMPHASIZED
     *  - MODE_DOUBLE_HEIGHT
     *  - MODE_DOUBLE_WIDTH
     *  - MODE_UNDERLINE
     * 
     * @param int $mode The mode to use. Default is Escpos::MODE_FONT_A, with no special formatting. This has a similar effect to running initialize().
     */
    function selectPrintMode($mode = self::MODE_FONT_A)
    {
    }
    /**
     * Set barcode height.
     *
     * @param int $height Height in dots. If not specified, 8 will be used.
     */
    function setBarcodeHeight($height = 8)
    {
    }
    /**
     * Set the position for the Human Readable Interpretation (HRI) of barcode characters.
     * 
     * @param position $position. Use Escpos::BARCODE_TEXT_NONE to hide the text (default), or any combination of Escpos::BARCODE_TEXT_TOP and Escpos::BARCODE_TEXT_BOTTOM flags to display the text.
     */
    function setBarcodeTextPosition($position = self::BARCODE_TEXT_NONE)
    {
    }
    /**
     * Turn double-strike mode on/off.
     *
     * @param boolean $on true for double strike, false for no double strike
     */
    function setDoubleStrike($on = \true)
    {
    }
    /**
     * Turn emphasized mode on/off.
     *
     *  @param boolean $on true for emphasis, false for no emphasis
     */
    function setEmphasis($on = \true)
    {
    }
    /**
     * Select font. Most printers have two fonts (Fonts A and B), and some have a third (Font C).
     *
     * @param int $font The font to use. Must be either Escpos::FONT_A, Escpos::FONT_B, or Escpos::FONT_C.
     */
    function setFont($font = self::FONT_A)
    {
    }
    /**
     * Select justification.
     *
     * @param int $justification One of Escpos::JUSTIFY_LEFT, Escpos::JUSTIFY_CENTER, or Escpos::JUSTIFY_RIGHT.
     */
    function setJustification($justification = self::JUSTIFY_LEFT)
    {
    }
    /**
     * Attach a different print buffer to the printer. Buffers are responsible for handling text output to the printer.
     * 
     * @param PrintBuffer $buffer The buffer to use.
     * @throws InvalidArgumentException Where the buffer is already attached to a different printer.
     */
    function setPrintBuffer(\PrintBuffer $buffer)
    {
    }
    /**
     * Set black/white reverse mode on or off. In this mode, text is printed white on a black background.
     * 
     * @param boolean $on True to enable, false to disable.
     */
    function setReverseColors($on = \true)
    {
    }
    /**
     * Set the size of text, as a multiple of the normal size.
     * 
     * @param int $widthMultiplier Multiple of the regular height to use (range 1 - 8)
     * @param int $heightMultiplier Multiple of the regular height to use (range 1 - 8)
     */
    function setTextSize($widthMultiplier, $heightMultiplier)
    {
    }
    /**
     * Set underline for printed text.
     * 
     * Argument can be true/false, or one of UNDERLINE_NONE,
     * UNDERLINE_SINGLE or UNDERLINE_DOUBLE.
     * 
     * @param int $underline Either true/false, or one of Escpos::UNDERLINE_NONE, Escpos::UNDERLINE_SINGLE or Escpos::UNDERLINE_DOUBLE. Defaults to Escpos::UNDERLINE_SINGLE.
     */
    function setUnderline($underline = self::UNDERLINE_SINGLE)
    {
    }
    /**
     * Add text to the buffer.
     *
     * Text should either be followed by a line-break, or feed() should be called
     * after this to clear the print buffer.
     *
     * @param string $str Text to print
     */
    function text($str = "")
    {
    }
    /**
     * Add text to the buffer without attempting to interpret chararacter codes.
     *
     * Text should either be followed by a line-break, or feed() should be called
     * after this to clear the print buffer.
     *
     * @param string $str Text to print
     */
    function textRaw($str = "")
    {
    }
    /**
     * Wrapper for GS ( k, to calculate and send correct data length.
     * 
     * @param string $fn Function to use
     * @param string $cn Output code type. Affects available data
     * @param string $data Data to send.
     * @param string $m Modifier/variant for function. Often '0' where used.
     * @throws InvalidArgumentException Where the input lengths are bad.
     */
    private function wrapperSend2dCodeData($fn, $cn, $data = '', $m = '')
    {
    }
    /**
     * Wrapper for GS ( L, to calculate and send correct data length.
     *
     * @param string $m Modifier/variant for function. Usually '0'.
     * @param string $fn Function number to use, as character.
     * @param string $data Data to send.
     * @throws InvalidArgumentException Where the input lengths are bad.
     */
    private function wrapperSendGraphicsData($m, $fn, $data = '')
    {
    }
    /**
     * Convert widths and heights to characters. Used before sending graphics to set the size.
     * 
     * @param array $inputs
     * @param boolean $long True to use 4 bytes, false to use 2
     * @return string
     */
    private static function dataHeader(array $inputs, $long = \true)
    {
    }
    /**
     * Generate two characters for a number: In lower and higher parts, or more parts as needed.
     * @param int $int Input number
     * @param int $length The number of bytes to output (1 - 4).
     */
    private static function intLowHigh($input, $length)
    {
    }
    /**
     * Throw an exception if the argument given is not a boolean
     * 
     * @param boolean $test the input to test
     * @param string $source the name of the function calling this
     */
    protected static function validateBoolean($test, $source)
    {
    }
    /**
     * Throw an exception if the argument given is not an integer within the specified range
     * 
     * @param int $test the input to test
     * @param int $min the minimum allowable value (inclusive)
     * @param int $max the maximum allowable value (inclusive)
     * @param string $source the name of the function calling this
     * @param string $argument the name of the invalid parameter
     */
    protected static function validateInteger($test, $min, $max, $source, $argument = "Argument")
    {
    }
    /**
     * Throw an exception if the argument given is not an integer within one of the specified ranges
     *
     * @param int $test the input to test
     * @param arrray $ranges array of two-item min/max ranges.
     * @param string $source the name of the function calling this
     * @param string $source the name of the function calling this
     * @param string $argument the name of the invalid parameter
     */
    protected static function validateIntegerMulti($test, array $ranges, $source, $argument = "Argument")
    {
    }
    /**
     * Throw an exception if the argument given can't be cast to a string
     *
     * @param string $test the input to test
     * @param string $source the name of the function calling this
     * @param string $argument the name of the invalid parameter
     */
    protected static function validateString($test, $source, $argument = "Argument")
    {
    }
    protected static function validateStringRegex($test, $source, $regex, $argument = "Argument")
    {
    }
}