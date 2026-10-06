<?php

namespace Mike42\Escpos;

/**
 * Main class for ESC/POS code generation
 */
class Printer
{
    /**
     * ASCII null control character
     */
    const NUL = "\x00";
    /**
     * ASCII linefeed control character
     */
    const LF = "\n";
    /**
     * ASCII escape control character
     */
    const ESC = "\x1b";
    /**
     * ASCII form separator control character
     */
    const FS = "\x1c";
    /**
     * ASCII form feed control character
     */
    const FF = "\f";
    /**
     * ASCII group separator control character
     */
    const GS = "\x1d";
    /**
     * ASCII data link escape control character
     */
    const DLE = "\x10";
    /**
     * ASCII end of transmission control character
     */
    const EOT = "\x04";
    /**
     * Indicates UPC-A barcode when used with Printer::barcode
     */
    const BARCODE_UPCA = 65;
    /**
     * Indicates UPC-E barcode when used with Printer::barcode
     */
    const BARCODE_UPCE = 66;
    /**
     * Indicates JAN13 barcode when used with Printer::barcode
     */
    const BARCODE_JAN13 = 67;
    /**
     * Indicates JAN8 barcode when used with Printer::barcode
     */
    const BARCODE_JAN8 = 68;
    /**
     * Indicates CODE39 barcode when used with Printer::barcode
     */
    const BARCODE_CODE39 = 69;
    /**
     * Indicates ITF barcode when used with Printer::barcode
     */
    const BARCODE_ITF = 70;
    /**
     * Indicates CODABAR barcode when used with Printer::barcode
     */
    const BARCODE_CODABAR = 71;
    /**
     * Indicates CODE93 barcode when used with Printer::barcode
     */
    const BARCODE_CODE93 = 72;
    /**
     * Indicates CODE128 barcode when used with Printer::barcode
     */
    const BARCODE_CODE128 = 73;
    /**
     * Indicates that HRI (human-readable interpretation) text should not be
     * printed, when used with Printer::setBarcodeTextPosition
     */
    const BARCODE_TEXT_NONE = 0;
    /**
     * Indicates that HRI (human-readable interpretation) text should be printed
     * above a barcode, when used with Printer::setBarcodeTextPosition
     */
    const BARCODE_TEXT_ABOVE = 1;
    /**
     * Indicates that HRI (human-readable interpretation) text should be printed
     * below a barcode, when used with Printer::setBarcodeTextPosition
     */
    const BARCODE_TEXT_BELOW = 2;
    /**
     * Use the first color (usually black), when used with Printer::setColor
     */
    const COLOR_1 = 0;
    /**
     * Use the second color (usually red or blue), when used with Printer::setColor
     */
    const COLOR_2 = 1;
    /**
     * Make a full cut, when used with Printer::cut
     */
    const CUT_FULL = 65;
    /**
     * Make a partial cut, when used with Printer::cut
     */
    const CUT_PARTIAL = 66;
    /**
     * Use Font A, when used with Printer::setFont
     */
    const FONT_A = 0;
    /**
     * Use Font B, when used with Printer::setFont
     */
    const FONT_B = 1;
    /**
     * Use Font C, when used with Printer::setFont
     */
    const FONT_C = 2;
    /**
     * Use default (high density) image size, when used with Printer::graphics,
     * Printer::bitImage or Printer::bitImageColumnFormat
     */
    const IMG_DEFAULT = 0;
    /**
     * Use lower horizontal density for image printing, when used with Printer::graphics,
     * Printer::bitImage or Printer::bitImageColumnFormat
     */
    const IMG_DOUBLE_WIDTH = 1;
    /**
     * Use lower vertical density for image printing, when used with Printer::graphics,
     * Printer::bitImage or Printer::bitImageColumnFormat
     */
    const IMG_DOUBLE_HEIGHT = 2;
    /**
     * Align text to the left, when used with Printer::setJustification
     */
    const JUSTIFY_LEFT = 0;
    /**
     * Center text, when used with Printer::setJustification
     */
    const JUSTIFY_CENTER = 1;
    /**
     * Align text to the right, when used with Printer::setJustification
     */
    const JUSTIFY_RIGHT = 2;
    /**
     * Use Font A, when used with Printer::selectPrintMode
     */
    const MODE_FONT_A = 0;
    /**
     * Use Font B, when used with Printer::selectPrintMode
     */
    const MODE_FONT_B = 1;
    /**
     * Use text emphasis, when used with Printer::selectPrintMode
     */
    const MODE_EMPHASIZED = 8;
    /**
     * Use double height text, when used with Printer::selectPrintMode
     */
    const MODE_DOUBLE_HEIGHT = 16;
    /**
     * Use double width text, when used with Printer::selectPrintMode
     */
    const MODE_DOUBLE_WIDTH = 32;
    /**
     * Underline text, when used with Printer::selectPrintMode
     */
    const MODE_UNDERLINE = 128;
    /**
     * Indicates standard PDF417 code
     */
    const PDF417_STANDARD = 0;
    /**
     * Indicates truncated PDF417 code
     */
    const PDF417_TRUNCATED = 1;
    /**
     * Indicates error correction level L when used with Printer::qrCode
     */
    const QR_ECLEVEL_L = 0;
    /**
     * Indicates error correction level M when used with Printer::qrCode
     */
    const QR_ECLEVEL_M = 1;
    /**
     * Indicates error correction level Q when used with Printer::qrCode
     */
    const QR_ECLEVEL_Q = 2;
    /**
     * Indicates error correction level H when used with Printer::qrCode
     */
    const QR_ECLEVEL_H = 3;
    /**
     * Indicates QR model 1 when used with Printer::qrCode
     */
    const QR_MODEL_1 = 1;
    /**
     * Indicates QR model 2 when used with Printer::qrCode
     */
    const QR_MODEL_2 = 2;
    /**
     * Indicates micro QR code when used with Printer::qrCode
     */
    const QR_MICRO = 3;
    /**
     * Indicates a request for printer status when used with
     * Printer::getPrinterStatus (experimental)
     */
    const STATUS_PRINTER = 1;
    /**
     * Indicates a request for printer offline cause when used with
     * Printer::getPrinterStatus (experimental)
     */
    const STATUS_OFFLINE_CAUSE = 2;
    /**
     * Indicates a request for error cause when used with Printer::getPrinterStatus
     * (experimental)
     */
    const STATUS_ERROR_CAUSE = 3;
    /**
     * Indicates a request for error cause when used with Printer::getPrinterStatus
     * (experimental)
     */
    const STATUS_PAPER_ROLL = 4;
    /**
     * Indicates a request for ink A status when used with Printer::getPrinterStatus
     * (experimental)
     */
    const STATUS_INK_A = 7;
    /**
     * Indicates a request for ink B status when used with Printer::getPrinterStatus
     * (experimental)
     */
    const STATUS_INK_B = 6;
    /**
     * Indicates a request for peeler status when used with Printer::getPrinterStatus
     * (experimental)
     */
    const STATUS_PEELER = 8;
    /**
     * Indicates no underline when used with Printer::setUnderline
     */
    const UNDERLINE_NONE = 0;
    /**
     * Indicates single underline when used with Printer::setUnderline
     */
    const UNDERLINE_SINGLE = 1;
    /**
     * Indicates double underline when used with Printer::setUnderline
     */
    const UNDERLINE_DOUBLE = 2;
    /**
     * @var PrintBuffer|null $buffer
     *  The printer's output buffer.
     */
    protected $buffer;
    /**
     * @var PrintConnector $connector
     *  Connector showing how to print to this printer
     */
    protected $connector;
    /**
     * @var CapabilityProfile $profile
     *  Profile showing supported features for this printer
     */
    protected $profile;
    /**
     * @var int $characterTable
     *  Current character code table
     */
    protected $characterTable;
    /**
     * Construct a new print object
     *
     * @param PrintConnector $connector The PrintConnector to send data to. If not set, output is sent to standard output.
     * @param CapabilityProfile|null $profile Supported features of this printer. If not set, the "default" CapabilityProfile will be used, which is suitable for Epson printers.
     * @throws InvalidArgumentException
     */
    public function __construct(\Mike42\Escpos\PrintConnectors\PrintConnector $connector, \Mike42\Escpos\CapabilityProfile $profile = null)
    {
    }
    /**
     * Print a barcode.
     *
     * @param string $content The information to encode.
     * @param int $type The barcode standard to output. Supported values are
     * `Printer::BARCODE_UPCA`, `Printer::BARCODE_UPCE`, `Printer::BARCODE_JAN13`,
     * `Printer::BARCODE_JAN8`, `Printer::BARCODE_CODE39`, `Printer::BARCODE_ITF`,
     * `Printer::BARCODE_CODABAR`, `Printer::BARCODE_CODE93`, and `Printer::BARCODE_CODE128`.
     * If not specified, `Printer::BARCODE_CODE39` will be used. Note that some
     * barcode formats only support specific lengths or sets of characters, and that
     * available barcode types vary between printers.
     * @throws InvalidArgumentException Where the length or characters used in $content is invalid for the requested barcode format.
     */
    public function barcode(string $content, int $type = \Mike42\Escpos\Printer::BARCODE_CODE39)
    {
    }
    /**
     * Print an image, using the older "bit image" command. This creates padding on the right of the image,
     * if its width is not divisible by 8.
     *
     * Should only be used if your printer does not support the graphics() command.
     * See also bitImageColumnFormat().
     *
     * @param EscposImage $img The image to print
     * @param int $size Size modifier for the image. Must be either `Printer::IMG_DEFAULT`
     *  (default), or any combination of the `Printer::IMG_DOUBLE_HEIGHT` and
     *  `Printer::IMG_DOUBLE_WIDTH` flags.
     */
    public function bitImage(\Mike42\Escpos\EscposImage $img, int $size = \Mike42\Escpos\Printer::IMG_DEFAULT)
    {
    }
    /**
     * Print an image, using the older "bit image" command in column format.
     *
     * Should only be used if your printer does not support the graphics() or
     * bitImage() commands.
     *
     * @param EscposImage $img The image to print
     * @param int $size Size modifier for the image. Must be either `Printer::IMG_DEFAULT`
     *  (default), or any combination of the `Printer::IMG_DOUBLE_HEIGHT` and
     *  `Printer::IMG_DOUBLE_WIDTH` flags.
     */
    public function bitImageColumnFormat(\Mike42\Escpos\EscposImage $img, int $size = \Mike42\Escpos\Printer::IMG_DEFAULT)
    {
    }
    /**
     * Close the underlying buffer. With some connectors, the
     * job will not actually be sent to the printer until this is called.
     */
    public function close()
    {
    }
    /**
     * Cut the paper.
     *
     * @param int $mode Cut mode, either Printer::CUT_FULL or Printer::CUT_PARTIAL. If not specified, `Printer::CUT_FULL` will be used.
     * @param int $lines Number of lines to feed
     */
    public function cut(int $mode = \Mike42\Escpos\Printer::CUT_FULL, int $lines = 3)
    {
    }
    /**
     * Print and feed line / Print and feed n lines.
     *
     * @param int $lines Number of lines to feed
     */
    public function feed(int $lines = 1)
    {
    }
    /**
     * Some printers require a form feed to release the paper. On most printers, this
     * command is only useful in page mode, which is not implemented in this driver.
     */
    public function feedForm()
    {
    }
    /**
     * Some slip printers require `ESC q` sequence to release the paper.
     */
    public function release()
    {
    }
    /**
     * Print and reverse feed n lines.
     *
     * @param int $lines number of lines to feed. If not specified, 1 line will be fed.
     */
    public function feedReverse(int $lines = 1)
    {
    }
    /**
     * @return int
     */
    public function getCharacterTable()
    {
    }
    /**
     * @return PrintBuffer
     */
    public function getPrintBuffer()
    {
    }
    /**
     * @return PrintConnector
     */
    public function getPrintConnector()
    {
    }
    /**
     * @return CapabilityProfile
     */
    public function getPrinterCapabilityProfile()
    {
    }
    /**
     * Print an image to the printer.
     *
     * Size modifiers are:
     * - Printer::IMG_DEFAULT (leave image at original size)
     * - Printer::IMG_DOUBLE_WIDTH
     * - Printer::IMG_DOUBLE_HEIGHT
     *
     * See the example/ folder for detailed examples.
     *
     * The functions bitImage() and bitImageColumnFormat() take the same
     * parameters, and can be used if your printer doesn't support the newer
     * graphics commands.
     *
     * @param EscposImage $img The image to print.
     * @param int $size Size modifier for the image. Must be either `Printer::IMG_DEFAULT`
     *  (default), or any combination of the `Printer::IMG_DOUBLE_HEIGHT` and
     *  `Printer::IMG_DOUBLE_WIDTH` flags.
     */
    public function graphics(\Mike42\Escpos\EscposImage $img, int $size = \Mike42\Escpos\Printer::IMG_DEFAULT)
    {
    }
    /**
     * Initialize printer. This resets formatting back to the defaults.
     */
    public function initialize()
    {
    }
    /**
     * Print a two-dimensional data code using the PDF417 standard.
     *
     * @param string $content Text or numbers to store in the code
     * @param int $width Width of a module (pixel) in the printed code.
     *  Default is 3 dots.
     * @param int $heightMultiplier Multiplier for height of a module.
     *  Default is 3 times the width.
     * @param int $dataColumnCount Number of data columns to use. 0 (default)
     *  is to auto-calculate. Smaller numbers will result in a narrower code,
     *  making larger pixel sizes possible. Larger numbers require smaller pixel sizes.
     * @param float $ec Error correction ratio, from 0.01 to 4.00. Default is 0.10 (10%).
     * @param int $options Standard code Printer::PDF417_STANDARD with
     *  start/end bars, or truncated code Printer::PDF417_TRUNCATED with start bars only.
     * @throws Exception If this profile indicates that PDF417 code is not supported
     */
    public function pdf417Code(string $content, int $width = 3, int $heightMultiplier = 3, int $dataColumnCount = 0, float $ec = 0.1, int $options = \Mike42\Escpos\Printer::PDF417_STANDARD)
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
    public function pulse(int $pin = 0, int $on_ms = 120, int $off_ms = 240)
    {
    }
    /**
     * Print the given data as a QR code on the printer.
     *
     * @param string $content The content of the code. Numeric data will be more efficiently compacted.
     * @param int $ec Error-correction level to use. One of Printer::QR_ECLEVEL_L (default), Printer::QR_ECLEVEL_M, Printer::QR_ECLEVEL_Q or Printer::QR_ECLEVEL_H. Higher error correction results in a less compact code.
     * @param int $size Pixel size to use. Must be 1-16 (default 3)
     * @param int $model QR code model to use. Must be one of Printer::QR_MODEL_1, Printer::QR_MODEL_2 (default) or Printer::QR_MICRO (not supported by all printers).
     */
    public function qrCode(string $content, int $ec = \Mike42\Escpos\Printer::QR_ECLEVEL_L, int $size = 3, int $model = \Mike42\Escpos\Printer::QR_MODEL_2)
    {
    }
    /**
     * Switch character table (code page) manually. Used in conjunction with textRaw() to
     * print special characters which can't be encoded automatically.
     *
     * @param int $table The table to select. Available code tables are model-specific.
     */
    public function selectCharacterTable(int $table = 0)
    {
    }
    /**
     * Select print mode(s).
     *
     * Several MODE_* constants can be OR'd together passed to this function's `$mode` argument. The valid modes are:
     *  - Printer::MODE_FONT_A
     *  - Printer::MODE_FONT_B
     *  - Printer::MODE_EMPHASIZED
     *  - Printer::MODE_DOUBLE_HEIGHT
     *  - Printer::MODE_DOUBLE_WIDTH
     *  - Printer::MODE_UNDERLINE
     *
     * @param int $mode The mode to use. Default is Printer::MODE_FONT_A, with no special formatting. This has a similar effect to running initialize().
     */
    public function selectPrintMode(int $mode = \Mike42\Escpos\Printer::MODE_FONT_A)
    {
    }
    /**
     * Select user-defined character set.
     *
     * @param bool $on True to enable user-defined character set, false to use built-in characters sets.
     */
    public function selectUserDefinedCharacterSet($on = true)
    {
    }
    /**
     * Set barcode height.
     *
     * @param int $height Height in dots. If not specified, 8 will be used.
     */
    public function setBarcodeHeight(int $height = 8)
    {
    }
    /**
     * Set barcode bar width.
     *
     * @param int $width Bar width in dots. If not specified, 3 will be used.
     *  Values above 6 appear to have no effect.
     */
    public function setBarcodeWidth(int $width = 3)
    {
    }
    /**
     * Set the position for the Human Readable Interpretation (HRI) of barcode characters.
     *
     * @param int $position. Use Printer::BARCODE_TEXT_NONE to hide the text (default),
     *  or any combination of Printer::BARCODE_TEXT_ABOVE and Printer::BARCODE_TEXT_BELOW
     *  flags to display the text.
     */
    public function setBarcodeTextPosition(int $position = \Mike42\Escpos\Printer::BARCODE_TEXT_NONE)
    {
    }
    /**
     * Turn double-strike mode on/off.
     *
     * @param boolean $on true for double strike, false for no double strike
     */
    public function setDoubleStrike(bool $on = true)
    {
    }
    /**
     * Select print color on printers that support multiple colors.
     *
     * @param int $color Color to use. Must be either Printer::COLOR_1 (default), or Printer::COLOR_2.
     */
    public function setColor(int $color = \Mike42\Escpos\Printer::COLOR_1)
    {
    }
    /**
     * Turn emphasized mode on/off.
     *
     *  @param boolean $on true for emphasis, false for no emphasis
     */
    public function setEmphasis(bool $on = true)
    {
    }
    /**
     * Select font. Most printers have two fonts (Fonts A and B), and some have a third (Font C).
     *
     * @param int $font The font to use. Must be either Printer::FONT_A, Printer::FONT_B, or Printer::FONT_C.
     */
    public function setFont(int $font = \Mike42\Escpos\Printer::FONT_A)
    {
    }
    /**
     * Select justification.
     *
     * @param int $justification One of Printer::JUSTIFY_LEFT, Printer::JUSTIFY_CENTER, or Printer::JUSTIFY_RIGHT.
     */
    public function setJustification(int $justification = \Mike42\Escpos\Printer::JUSTIFY_LEFT)
    {
    }
    /**
     * Set the height of the line.
     *
     * Some printers will allow you to overlap lines with a smaller line feed.
     *
     * @param int|null $height The height of each line, in dots. If not set, the printer
     *  will reset to its default line spacing.
     */
    public function setLineSpacing(int $height = null)
    {
    }
    /**
     * Set print area left margin. Reset to default with Printer::initialize()
     *
     * @param int $margin The left margin to set on to the print area, in dots.
     */
    public function setPrintLeftMargin(int $margin = 0)
    {
    }
    /**
     * Set print area width. This can be used to add a right margin to the print area.
     * Reset to default with Printer::initialize()
     *
     * @param int $width The width of the page print area, in dots.
     */
    public function setPrintWidth(int $width = 512)
    {
    }
    /**
     * Attach a different print buffer to the printer. Buffers are responsible for handling text output to the printer.
     *
     * @param PrintBuffer $buffer The buffer to use.
     * @throws InvalidArgumentException Where the buffer is already attached to a different printer.
     */
    public function setPrintBuffer(\Mike42\Escpos\PrintBuffers\PrintBuffer $buffer)
    {
    }
    /**
     * Set black/white reverse mode on or off. In this mode, text is printed white on a black background.
     *
     * @param boolean $on True to enable, false to disable.
     */
    public function setReverseColors(bool $on = true)
    {
    }
    /**
     * Set the size of text, as a multiple of the normal size.
     *
     * @param int $widthMultiplier Multiple of the regular height to use (range 1 - 8)
     * @param int $heightMultiplier Multiple of the regular height to use (range 1 - 8)
     */
    public function setTextSize(int $widthMultiplier, int $heightMultiplier)
    {
    }
    /**
     * Set underline for printed text.
     *
     * @param int $underline Either true/false, or one of Printer::UNDERLINE_NONE, Printer::UNDERLINE_SINGLE or Printer::UNDERLINE_DOUBLE. Defaults to Printer::UNDERLINE_SINGLE.
     */
    public function setUnderline(int $underline = \Mike42\Escpos\Printer::UNDERLINE_SINGLE)
    {
    }
    /**
     * Print each line upside-down (180 degrees rotated).
     *
     * @param boolean $on True to enable, false to disable.
     */
    public function setUpsideDown(bool $on = true)
    {
    }
    /**
     * Add text to the buffer.
     *
     * Text should either be followed by a line-break, or feed() should be called
     * after this to clear the print buffer.
     *
     * @param string $str Text to print, as UTF-8
     */
    public function text(string $str)
    {
    }
    /**
     * Add Chinese text to the buffer. This is a specific workaround for Zijang printers-
     * The printer will be switched to a two-byte mode and sent GBK-encoded text.
     *
     * Support for this will be merged into a print buffer.
     *
     * @param string $str Text to print, as UTF-8
     */
    public function textChinese(string $str = "")
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
    public function textRaw(string $str = "")
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
    protected function wrapperSend2dCodeData(string $fn, string $cn, string $data = '', string $m = '')
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
    protected function wrapperSendGraphicsData(string $m, string $fn, string $data = '')
    {
    }
    /**
     * Convert widths and heights to characters. Used before sending graphics to set the size.
     *
     * @param array $inputs
     * @param boolean $long True to use 4 bytes, false to use 2
     * @return string
     */
    protected static function dataHeader(array $inputs, bool $long = true)
    {
    }
    /**
     * Generate two characters for a number: In lower and higher parts, or more parts as needed.
     *
     * @param int $input Input number
     * @param int $length The number of bytes to output (1 - 4).
     */
    protected static function intLowHigh(int $input, int $length)
    {
    }
    /**
     * Throw an exception if the argument given is not a boolean
     *
     * @param boolean $test the input to test
     * @param string $source the name of the function calling this
     */
    protected static function validateBoolean(bool $test, string $source)
    {
    }
    /**
     * Throw an exception if the argument given is not a float within the specified range
     *
     * @param float $test the input to test
     * @param float $min the minimum allowable value (inclusive)
     * @param float $max the maximum allowable value (inclusive)
     * @param string $source the name of the function calling this
     * @param string $argument the name of the invalid parameter
     */
    protected static function validateFloat(float $test, float $min, float $max, string $source, string $argument = "Argument")
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
    protected static function validateInteger(int $test, int $min, int $max, string $source, string $argument = "Argument")
    {
    }
    /**
     * Throw an exception if the argument given is not an integer within one of the specified ranges
     *
     * @param int $test the input to test
     * @param array $ranges array of two-item min/max ranges.
     * @param string $source the name of the function calling this
     * @param string $source the name of the function calling this
     * @param string $argument the name of the invalid parameter
     */
    protected static function validateIntegerMulti(int $test, array $ranges, string $source, string $argument = "Argument")
    {
    }
    /**
     * Throw an exception if the argument doesn't match the given regex.
     *
     * @param string $test the input to test
     * @param string $source the name of the function calling this
     * @param string $regex valid values for this attribute, as a regex
     * @param string $argument the name of the parameter being validated
     * @throws InvalidArgumentException Where the argument is not valid
     */
    protected static function validateStringRegex(string $test, string $source, string $regex, string $argument = "Argument")
    {
    }
}