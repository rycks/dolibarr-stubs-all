<?php

class EscposTest extends \PHPUnit_Framework_TestCase
{
    protected $printer;
    protected $outputConnector;
    protected function setup()
    {
    }
    protected function checkOutput($expected = \null)
    {
    }
    protected function tearDown()
    {
    }
    protected function requireGraphicsLibrary()
    {
    }
    public function testInitializeOutput()
    {
    }
    public function testTextStringOutput()
    {
    }
    public function testTextDefault()
    {
    }
    public function testTextString()
    {
    }
    public function testTextObject()
    {
    }
    public function testFeedDefault()
    {
    }
    public function testFeed3Lines()
    {
    }
    public function testFeedZero()
    {
    }
    public function testFeedNonInteger()
    {
    }
    public function testFeedTooLarge()
    {
    }
    /* Print mode */
    public function testSelectPrintModeDefault()
    {
    }
    public function testSelectPrintModeAcceptedValues()
    {
    }
    /* Underline */
    public function testSetUnderlineDefault()
    {
    }
    public function testSetUnderlineOff()
    {
    }
    public function testSetUnderlineOn()
    {
    }
    public function testSetUnderlineDbl()
    {
    }
    public function testSetUnderlineAcceptedValues()
    {
    }
    public function testSetUnderlineTooLarge()
    {
    }
    public function testSetUnderlineNegative()
    {
    }
    public function testSetUnderlineNonInteger()
    {
    }
    /* Emphasis */
    public function testSetEmphasisDefault()
    {
    }
    public function testSetEmphasisOn()
    {
    }
    public function testSetEmphasisOff()
    {
    }
    public function testSetEmphasisNonBoolean()
    {
    }
    /* Double strike */
    public function testSetDoubleStrikeDefault()
    {
    }
    public function testSetDoubleStrikeOn()
    {
    }
    public function testSetDoubleStrikeOff()
    {
    }
    public function testSetDoubleStrikeNonBoolean()
    {
    }
    /* Font */
    public function testSetFontDefault()
    {
    }
    public function testSetFontAcceptedValues()
    {
    }
    public function testSetFontNegative()
    {
    }
    public function testSetFontTooLarge()
    {
    }
    public function testSetFontNonInteger()
    {
    }
    /* Justification */
    public function testSetJustificationDefault()
    {
    }
    public function testSetJustificationLeft()
    {
    }
    public function testSetJustificationRight()
    {
    }
    public function testSetJustificationCenter()
    {
    }
    public function testSetJustificationNegative()
    {
    }
    public function testSetJustificationTooLarge()
    {
    }
    public function testSetJustificationNonInteger()
    {
    }
    /* Reverse feed */
    public function testFeedReverseDefault()
    {
    }
    public function testFeedReverse3()
    {
    }
    public function testFeedReverseNegative()
    {
    }
    public function testFeedReverseTooLarge()
    {
    }
    public function testFeedReverseNonInteger()
    {
    }
    /* Cut */
    public function testCutDefault()
    {
    }
    /* Set barcode height */
    public function testSetBarcodeHeightDefault()
    {
    }
    public function testBarcodeHeight10()
    {
    }
    public function testSetBarcodeHeightNegative()
    {
    }
    public function testSetBarcodeHeightTooLarge()
    {
    }
    public function tesSetBarcodeHeightNonInteger()
    {
    }
    /* Barcode text position */
    public function testSetBarcodeTextPositionDefault()
    {
    }
    public function testSetBarcodeTextPositionBelow()
    {
    }
    public function testSetBarcodeTextPositionBoth()
    {
    }
    public function testSetBarcodeTextPositionNegative()
    {
    }
    public function testSetBarcodeTextPositionTooLarge()
    {
    }
    public function tesSetBarcodeTextPositionNonInteger()
    {
    }
    /* Barcode - UPC-A */
    public function testBarcodeUpcaNumeric11Char()
    {
    }
    public function testBarcodeUpcaNumeric12Char()
    {
    }
    public function testBarcodeUpcaNumeric13Char()
    {
    }
    public function testBarcodeUpcaNonNumeric12Char()
    {
    }
    /* Barcode - UPC-E */
    public function testBarcodeUpceNumeric6Char()
    {
    }
    public function testBarcodeUpceNumeric7Char()
    {
    }
    public function testBarcodeUpceNumeric8Char()
    {
    }
    public function testBarcodeUpceNumeric11Char()
    {
    }
    public function testBarcodeUpceNumeric12Char()
    {
    }
    public function testBarcodeUpceNumeric9Char()
    {
    }
    public function testBarcodeUpceNonNumeric12Char()
    {
    }
    /* Barcode - JAN13 */
    public function testBarcodeJan13Numeric12Char()
    {
    }
    public function testBarcodeJan13Numeric13Char()
    {
    }
    public function testBarcodeJan13Numeric11Char()
    {
    }
    public function testBarcodeJan13NonNumeric13Char()
    {
    }
    /* Barcode - JAN8 */
    public function testBarcodeJan8Numeric7Char()
    {
    }
    public function testBarcodeJan8Numeric8Char()
    {
    }
    public function testBarcodeJan8Numeric9Char()
    {
    }
    public function testBarcodeJan8NonNumeric8Char()
    {
    }
    /* Barcode - Code39 */
    public function testBarcodeCode39AsDefault()
    {
    }
    public function testBarcodeCode39Text()
    {
    }
    public function testBarcodeCode39SpecialChars()
    {
    }
    public function testBarcodeCode39Asterisks()
    {
    }
    public function testBarcodeCode39AsterisksUnmatched()
    {
    }
    public function testBarcodeCode39AsteriskInText()
    {
    }
    public function testBarcodeCode39Lowercase()
    {
    }
    public function testBarcodeCode39Empty()
    {
    }
    /* Barcode - ITF */
    public function testBarcodeItfNumericEven()
    {
    }
    public function testBarcodeItfNumericOdd()
    {
    }
    public function testBarcodeItfNonNumericEven()
    {
    }
    /* Barcode - Codabar */
    public function testBarcodeCodabarNumeric()
    {
    }
    public function testBarcodeCodabarSpecialChars()
    {
    }
    public function testBarcodeCodabarNotWrapped()
    {
    }
    public function testBarcodeCodabarStartStopWrongPlace()
    {
    }
    /* Barcode - Code93 */
    public function testBarcodeCode93Valid()
    {
    }
    public function testBarcodeCode93Empty()
    {
    }
    /* Barcode - Code128 */
    public function testBarcodeCode128ValidA()
    {
    }
    public function testBarcodeCode128ValidB()
    {
    }
    public function testBarcodeCode128ValidC()
    {
    }
    public function testBarcodeCode128NoCodeSet()
    {
    }
    /* Pulse */
    function testPulseDefault()
    {
    }
    function testPulse1()
    {
    }
    function testPulseEvenMs()
    {
    }
    function testPulseOddMs()
    {
    }
    function testPulseTooHigh()
    {
    }
    function testPulseTooLow()
    {
    }
    function testPulseNotANumber()
    {
    }
    /* Set reverse */
    public function testSetReverseColorsDefault()
    {
    }
    public function testSetReverseColorsOn()
    {
    }
    public function testSetReverseColorsOff()
    {
    }
    public function testSetReverseColorsNonBoolean()
    {
    }
    /* Bit image print */
    public function testBitImageBlack()
    {
    }
    public function testBitImageWhite()
    {
    }
    public function testBitImageBoth()
    {
    }
    public function testBitImageTransparent()
    {
    }
    /* Graphics print */
    public function testGraphicsWhite()
    {
    }
    public function testGraphicsBlack()
    {
    }
    public function testGraphicsBoth()
    {
    }
    public function testGraphicsTransparent()
    {
    }
    /* QR code */
    public function testQRCodeDefaults()
    {
    }
    public function testQRCodeDefaultsAreCorrect()
    {
    }
    public function testQRCodeEmpty()
    {
    }
    public function testQRCodeChangeEC()
    {
    }
    public function testQRCodeChangeSize()
    {
    }
    public function testQRCodeChangeModel()
    {
    }
    /* Feed form - Required on page-mode only printers */
    public function testFeedForm()
    {
    }
    /* Get status  */
    public function testGetStatus()
    {
    }
    /* Set text size  */
    public function testSetTextSizeNormal()
    {
    }
    public function testSetTextSizeWide()
    {
    }
    public function testSetTextSizeNarrow()
    {
    }
    public function testSetTextSizeLarge()
    {
    }
    public function testSetTextSizeInvalid()
    {
    }
}
/*
 * For testing that string-castable objects are handled
 */
class FooBar
{
    private $foo;
    public function __construct($foo)
    {
    }
    public function __toString()
    {
    }
}