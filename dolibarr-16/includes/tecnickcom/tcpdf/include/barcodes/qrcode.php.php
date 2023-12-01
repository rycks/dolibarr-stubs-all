<?php

// #####################################################
/**
 * @class QRcode
 * Class to create QR-code arrays for TCPDF class.
 * QR Code symbol is a 2D barcode that can be scanned by handy terminals such as a mobile phone with CCD.
 * The capacity of QR Code is up to 7000 digits or 4000 characters, and has high robustness.
 * This class supports QR Code model 2, described in JIS (Japanese Industrial Standards) X0510:2004 or ISO/IEC 18004.
 * Currently the following features are not supported: ECI and FNC1 mode, Micro QR Code, QR Code model 1, Structured mode.
 *
 * This class is derived from "PHP QR Code encoder" by Dominik Dzienia (http://phpqrcode.sourceforge.net/) based on "libqrencode C library 3.1.1." by Kentaro Fukuchi (http://megaui.net/fukuchi/works/qrencode/index.en.html), contains Reed-Solomon code written by Phil Karn, KA9Q. QR Code is registered trademark of DENSO WAVE INCORPORATED (http://www.denso-wave.com/qrcode/index-e.html).
 * Please read comments on this class source file for full copyright and license information.
 *
 * @package com.tecnick.tcpdf
 * @author Nicola Asuni
 * @version 1.0.010
 */
class QRcode
{
    /**
     * Barcode array to be returned which is readable by TCPDF.
     * @protected
     */
    protected $barcode_array = array();
    /**
     * QR code version. Size of QRcode is defined as version. Version is from 1 to 40. Version 1 is 21*21 matrix. And 4 modules increases whenever 1 version increases. So version 40 is 177*177 matrix.
     * @protected
     */
    protected $version = 0;
    /**
     * Levels of error correction. See definitions for possible values.
     * @protected
     */
    protected $level = \QR_ECLEVEL_L;
    /**
     * Encoding mode.
     * @protected
     */
    protected $hint = \QR_MODE_8B;
    /**
     * Boolean flag, if true the input string will be converted to uppercase.
     * @protected
     */
    protected $casesensitive = \true;
    /**
     * Structured QR code (not supported yet).
     * @protected
     */
    protected $structured = 0;
    /**
     * Mask data.
     * @protected
     */
    protected $data;
    // FrameFiller
    /**
     * Width.
     * @protected
     */
    protected $width;
    /**
     * Frame.
     * @protected
     */
    protected $frame;
    /**
     * X position of bit.
     * @protected
     */
    protected $x;
    /**
     * Y position of bit.
     * @protected
     */
    protected $y;
    /**
     * Direction.
     * @protected
     */
    protected $dir;
    /**
     * Single bit value.
     * @protected
     */
    protected $bit;
    // ---- QRrawcode ----
    /**
     * Data code.
     * @protected
     */
    protected $datacode = array();
    /**
     * Error correction code.
     * @protected
     */
    protected $ecccode = array();
    /**
     * Blocks.
     * @protected
     */
    protected $blocks;
    /**
     * Reed-Solomon blocks.
     * @protected
     */
    protected $rsblocks = array();
    //of RSblock
    /**
     * Counter.
     * @protected
     */
    protected $count;
    /**
     * Data length.
     * @protected
     */
    protected $dataLength;
    /**
     * Error correction length.
     * @protected
     */
    protected $eccLength;
    /**
     * Value b1.
     * @protected
     */
    protected $b1;
    // ---- QRmask ----
    /**
     * Run length.
     * @protected
     */
    protected $runLength = array();
    // ---- QRsplit ----
    /**
     * Input data string.
     * @protected
     */
    protected $dataStr = '';
    /**
     * Input items.
     * @protected
     */
    protected $items;
    // Reed-Solomon items
    /**
     * Reed-Solomon items.
     * @protected
     */
    protected $rsitems = array();
    /**
     * Array of frames.
     * @protected
     */
    protected $frames = array();
    /**
     * Alphabet-numeric convesion table.
     * @protected
     */
    protected $anTable = array(
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        //
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        //
        36,
        -1,
        -1,
        -1,
        37,
        38,
        -1,
        -1,
        -1,
        -1,
        39,
        40,
        -1,
        41,
        42,
        43,
        //
        0,
        1,
        2,
        3,
        4,
        5,
        6,
        7,
        8,
        9,
        44,
        -1,
        -1,
        -1,
        -1,
        -1,
        //
        -1,
        10,
        11,
        12,
        13,
        14,
        15,
        16,
        17,
        18,
        19,
        20,
        21,
        22,
        23,
        24,
        //
        25,
        26,
        27,
        28,
        29,
        30,
        31,
        32,
        33,
        34,
        35,
        -1,
        -1,
        -1,
        -1,
        -1,
        //
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        //
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
        -1,
    );
    /**
     * Array Table of the capacity of symbols.
     * See Table 1 (pp.13) and Table 12-16 (pp.30-36), JIS X0510:2004.
     * @protected
     */
    protected $capacity = array(
        array(0, 0, 0, array(0, 0, 0, 0)),
        //
        array(21, 26, 0, array(7, 10, 13, 17)),
        //  1
        array(25, 44, 7, array(10, 16, 22, 28)),
        //
        array(29, 70, 7, array(15, 26, 36, 44)),
        //
        array(33, 100, 7, array(20, 36, 52, 64)),
        //
        array(37, 134, 7, array(26, 48, 72, 88)),
        //  5
        array(41, 172, 7, array(36, 64, 96, 112)),
        //
        array(45, 196, 0, array(40, 72, 108, 130)),
        //
        array(49, 242, 0, array(48, 88, 132, 156)),
        //
        array(53, 292, 0, array(60, 110, 160, 192)),
        //
        array(57, 346, 0, array(72, 130, 192, 224)),
        // 10
        array(61, 404, 0, array(80, 150, 224, 264)),
        //
        array(65, 466, 0, array(96, 176, 260, 308)),
        //
        array(69, 532, 0, array(104, 198, 288, 352)),
        //
        array(73, 581, 3, array(120, 216, 320, 384)),
        //
        array(77, 655, 3, array(132, 240, 360, 432)),
        // 15
        array(81, 733, 3, array(144, 280, 408, 480)),
        //
        array(85, 815, 3, array(168, 308, 448, 532)),
        //
        array(89, 901, 3, array(180, 338, 504, 588)),
        //
        array(93, 991, 3, array(196, 364, 546, 650)),
        //
        array(97, 1085, 3, array(224, 416, 600, 700)),
        // 20
        array(101, 1156, 4, array(224, 442, 644, 750)),
        //
        array(105, 1258, 4, array(252, 476, 690, 816)),
        //
        array(109, 1364, 4, array(270, 504, 750, 900)),
        //
        array(113, 1474, 4, array(300, 560, 810, 960)),
        //
        array(117, 1588, 4, array(312, 588, 870, 1050)),
        // 25
        array(121, 1706, 4, array(336, 644, 952, 1110)),
        //
        array(125, 1828, 4, array(360, 700, 1020, 1200)),
        //
        array(129, 1921, 3, array(390, 728, 1050, 1260)),
        //
        array(133, 2051, 3, array(420, 784, 1140, 1350)),
        //
        array(137, 2185, 3, array(450, 812, 1200, 1440)),
        // 30
        array(141, 2323, 3, array(480, 868, 1290, 1530)),
        //
        array(145, 2465, 3, array(510, 924, 1350, 1620)),
        //
        array(149, 2611, 3, array(540, 980, 1440, 1710)),
        //
        array(153, 2761, 3, array(570, 1036, 1530, 1800)),
        //
        array(157, 2876, 0, array(570, 1064, 1590, 1890)),
        // 35
        array(161, 3034, 0, array(600, 1120, 1680, 1980)),
        //
        array(165, 3196, 0, array(630, 1204, 1770, 2100)),
        //
        array(169, 3362, 0, array(660, 1260, 1860, 2220)),
        //
        array(173, 3532, 0, array(720, 1316, 1950, 2310)),
        //
        array(177, 3706, 0, array(750, 1372, 2040, 2430)),
    );
    /**
     * Array Length indicator.
     * @protected
     */
    protected $lengthTableBits = array(array(10, 12, 14), array(9, 11, 13), array(8, 16, 16), array(8, 10, 12));
    /**
     * Array Table of the error correction code (Reed-Solomon block).
     * See Table 12-16 (pp.30-36), JIS X0510:2004.
     * @protected
     */
    protected $eccTable = array(
        array(array(0, 0), array(0, 0), array(0, 0), array(0, 0)),
        //
        array(array(1, 0), array(1, 0), array(1, 0), array(1, 0)),
        //  1
        array(array(1, 0), array(1, 0), array(1, 0), array(1, 0)),
        //
        array(array(1, 0), array(1, 0), array(2, 0), array(2, 0)),
        //
        array(array(1, 0), array(2, 0), array(2, 0), array(4, 0)),
        //
        array(array(1, 0), array(2, 0), array(2, 2), array(2, 2)),
        //  5
        array(array(2, 0), array(4, 0), array(4, 0), array(4, 0)),
        //
        array(array(2, 0), array(4, 0), array(2, 4), array(4, 1)),
        //
        array(array(2, 0), array(2, 2), array(4, 2), array(4, 2)),
        //
        array(array(2, 0), array(3, 2), array(4, 4), array(4, 4)),
        //
        array(array(2, 2), array(4, 1), array(6, 2), array(6, 2)),
        // 10
        array(array(4, 0), array(1, 4), array(4, 4), array(3, 8)),
        //
        array(array(2, 2), array(6, 2), array(4, 6), array(7, 4)),
        //
        array(array(4, 0), array(8, 1), array(8, 4), array(12, 4)),
        //
        array(array(3, 1), array(4, 5), array(11, 5), array(11, 5)),
        //
        array(array(5, 1), array(5, 5), array(5, 7), array(11, 7)),
        // 15
        array(array(5, 1), array(7, 3), array(15, 2), array(3, 13)),
        //
        array(array(1, 5), array(10, 1), array(1, 15), array(2, 17)),
        //
        array(array(5, 1), array(9, 4), array(17, 1), array(2, 19)),
        //
        array(array(3, 4), array(3, 11), array(17, 4), array(9, 16)),
        //
        array(array(3, 5), array(3, 13), array(15, 5), array(15, 10)),
        // 20
        array(array(4, 4), array(17, 0), array(17, 6), array(19, 6)),
        //
        array(array(2, 7), array(17, 0), array(7, 16), array(34, 0)),
        //
        array(array(4, 5), array(4, 14), array(11, 14), array(16, 14)),
        //
        array(array(6, 4), array(6, 14), array(11, 16), array(30, 2)),
        //
        array(array(8, 4), array(8, 13), array(7, 22), array(22, 13)),
        // 25
        array(array(10, 2), array(19, 4), array(28, 6), array(33, 4)),
        //
        array(array(8, 4), array(22, 3), array(8, 26), array(12, 28)),
        //
        array(array(3, 10), array(3, 23), array(4, 31), array(11, 31)),
        //
        array(array(7, 7), array(21, 7), array(1, 37), array(19, 26)),
        //
        array(array(5, 10), array(19, 10), array(15, 25), array(23, 25)),
        // 30
        array(array(13, 3), array(2, 29), array(42, 1), array(23, 28)),
        //
        array(array(17, 0), array(10, 23), array(10, 35), array(19, 35)),
        //
        array(array(17, 1), array(14, 21), array(29, 19), array(11, 46)),
        //
        array(array(13, 6), array(14, 23), array(44, 7), array(59, 1)),
        //
        array(array(12, 7), array(12, 26), array(39, 14), array(22, 41)),
        // 35
        array(array(6, 14), array(6, 34), array(46, 10), array(2, 64)),
        //
        array(array(17, 4), array(29, 14), array(49, 10), array(24, 46)),
        //
        array(array(4, 18), array(13, 32), array(48, 14), array(42, 32)),
        //
        array(array(20, 4), array(40, 7), array(43, 22), array(10, 67)),
        //
        array(array(19, 6), array(18, 31), array(34, 34), array(20, 61)),
    );
    /**
     * Array Positions of alignment patterns.
     * This array includes only the second and the third position of the alignment patterns. Rest of them can be calculated from the distance between them.
     * See Table 1 in Appendix E (pp.71) of JIS X0510:2004.
     * @protected
     */
    protected $alignmentPattern = array(
        array(0, 0),
        array(0, 0),
        array(18, 0),
        array(22, 0),
        array(26, 0),
        array(30, 0),
        //  1- 5
        array(34, 0),
        array(22, 38),
        array(24, 42),
        array(26, 46),
        array(28, 50),
        //  6-10
        array(30, 54),
        array(32, 58),
        array(34, 62),
        array(26, 46),
        array(26, 48),
        // 11-15
        array(26, 50),
        array(30, 54),
        array(30, 56),
        array(30, 58),
        array(34, 62),
        // 16-20
        array(28, 50),
        array(26, 50),
        array(30, 54),
        array(28, 54),
        array(32, 58),
        // 21-25
        array(30, 58),
        array(34, 62),
        array(26, 50),
        array(30, 54),
        array(26, 52),
        // 26-30
        array(30, 56),
        array(34, 60),
        array(30, 58),
        array(34, 62),
        array(30, 54),
        // 31-35
        array(24, 50),
        array(28, 54),
        array(32, 58),
        array(26, 54),
        array(30, 58),
    );
    /**
     * Array Version information pattern (BCH coded).
     * See Table 1 in Appendix D (pp.68) of JIS X0510:2004.
     * size: [QRSPEC_VERSION_MAX - 6]
     * @protected
     */
    protected $versionPattern = array(
        0x7c94,
        0x85bc,
        0x9a99,
        0xa4d3,
        0xbbf6,
        0xc762,
        0xd847,
        0xe60d,
        //
        0xf928,
        0x10b78,
        0x1145d,
        0x12a17,
        0x13532,
        0x149a6,
        0x15683,
        0x168c9,
        //
        0x177ec,
        0x18ec4,
        0x191e1,
        0x1afab,
        0x1b08e,
        0x1cc1a,
        0x1d33f,
        0x1ed75,
        //
        0x1f250,
        0x209d5,
        0x216f0,
        0x228ba,
        0x2379f,
        0x24b0b,
        0x2542e,
        0x26a64,
        //
        0x27541,
        0x28c69,
    );
    /**
     * Array Format information
     * @protected
     */
    protected $formatInfo = array(
        array(0x77c4, 0x72f3, 0x7daa, 0x789d, 0x662f, 0x6318, 0x6c41, 0x6976),
        //
        array(0x5412, 0x5125, 0x5e7c, 0x5b4b, 0x45f9, 0x40ce, 0x4f97, 0x4aa0),
        //
        array(0x355f, 0x3068, 0x3f31, 0x3a06, 0x24b4, 0x2183, 0x2eda, 0x2bed),
        //
        array(0x1689, 0x13be, 0x1ce7, 0x19d0, 0x762, 0x255, 0xd0c, 0x83b),
    );
    // -------------------------------------------------
    // -------------------------------------------------
    /**
     * This is the class constructor.
     * Creates a QRcode object
     * @param $code (string) code to represent using QRcode
     * @param $eclevel (string) error level: <ul><li>L : About 7% or less errors can be corrected.</li><li>M : About 15% or less errors can be corrected.</li><li>Q : About 25% or less errors can be corrected.</li><li>H : About 30% or less errors can be corrected.</li></ul>
     * @public
     * @since 1.0.000
     */
    public function __construct($code, $eclevel = 'L')
    {
    }
    /**
     * Returns a barcode array which is readable by TCPDF
     * @return array barcode array readable by TCPDF;
     * @public
     */
    public function getBarcodeArray()
    {
    }
    /**
     * Convert the frame in binary form
     * @param $frame (array) array to binarize
     * @return array frame in binary form
     */
    protected function binarize($frame)
    {
    }
    /**
     * Encode the input string to QR code
     * @param $string (string) input string to encode
     */
    protected function encodeString($string)
    {
    }
    /**
     * Encode mask
     * @param $mask (int) masking mode
     */
    protected function encodeMask($mask)
    {
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // FrameFiller
    /**
     * Set frame value at specified position
     * @param $at (array) x,y position
     * @param $val (int) value of the character to set
     */
    protected function setFrameAt($at, $val)
    {
    }
    /**
     * Get frame value at specified position
     * @param $at (array) x,y position
     * @return value at specified position
     */
    protected function getFrameAt($at)
    {
    }
    /**
     * Return the next frame position
     * @return array of x,y coordinates
     */
    protected function getNextPosition()
    {
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // QRrawcode
    /**
     * Initialize code.
     * @param $spec (array) array of ECC specification
     * @return 0 in case of success, -1 in case of error
     */
    protected function init($spec)
    {
    }
    /**
     * Return Reed-Solomon block code.
     * @return array rsblocks
     */
    protected function getCode()
    {
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // QRmask
    /**
     * Write Format Information on frame and returns the number of black bits
     * @param $width (int) frame width
     * @param $frame (array) frame
     * @param $mask (array) masking mode
     * @param $level (int) error correction level
     * @return int blacks
     */
    protected function writeFormatInformation($width, &$frame, $mask, $level)
    {
    }
    /**
     * mask0
     * @param $x (int) X position
     * @param $y (int) Y position
     * @return int mask
     */
    protected function mask0($x, $y)
    {
    }
    /**
     * mask1
     * @param $x (int) X position
     * @param $y (int) Y position
     * @return int mask
     */
    protected function mask1($x, $y)
    {
    }
    /**
     * mask2
     * @param $x (int) X position
     * @param $y (int) Y position
     * @return int mask
     */
    protected function mask2($x, $y)
    {
    }
    /**
     * mask3
     * @param $x (int) X position
     * @param $y (int) Y position
     * @return int mask
     */
    protected function mask3($x, $y)
    {
    }
    /**
     * mask4
     * @param $x (int) X position
     * @param $y (int) Y position
     * @return int mask
     */
    protected function mask4($x, $y)
    {
    }
    /**
     * mask5
     * @param $x (int) X position
     * @param $y (int) Y position
     * @return int mask
     */
    protected function mask5($x, $y)
    {
    }
    /**
     * mask6
     * @param $x (int) X position
     * @param $y (int) Y position
     * @return int mask
     */
    protected function mask6($x, $y)
    {
    }
    /**
     * mask7
     * @param $x (int) X position
     * @param $y (int) Y position
     * @return int mask
     */
    protected function mask7($x, $y)
    {
    }
    /**
     * Return bitmask
     * @param $maskNo (int) mask number
     * @param $width (int) width
     * @param $frame (array) frame
     * @return array bitmask
     */
    protected function generateMaskNo($maskNo, $width, $frame)
    {
    }
    /**
     * makeMaskNo
     * @param $maskNo (int)
     * @param $width (int)
     * @param $s (int)
     * @param $d (int)
     * @param $maskGenOnly (boolean)
     * @return int b
     */
    protected function makeMaskNo($maskNo, $width, $s, &$d, $maskGenOnly = \false)
    {
    }
    /**
     * makeMask
     * @param $width (int)
     * @param $frame (array)
     * @param $maskNo (int)
     * @param $level (int)
     * @return array mask
     */
    protected function makeMask($width, $frame, $maskNo, $level)
    {
    }
    /**
     * calcN1N3
     * @param $length (int)
     * @return int demerit
     */
    protected function calcN1N3($length)
    {
    }
    /**
     * evaluateSymbol
     * @param $width (int)
     * @param $frame (array)
     * @return int demerit
     */
    protected function evaluateSymbol($width, $frame)
    {
    }
    /**
     * mask
     * @param $width (int)
     * @param $frame (array)
     * @param $level (int)
     * @return array best mask
     */
    protected function mask($width, $frame, $level)
    {
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // QRsplit
    /**
     * Return true if the character at specified position is a number
     * @param $str (string) string
     * @param $pos (int) characted position
     * @return boolean true of false
     */
    protected function isdigitat($str, $pos)
    {
    }
    /**
     * Return true if the character at specified position is an alphanumeric character
     * @param $str (string) string
     * @param $pos (int) characted position
     * @return boolean true of false
     */
    protected function isalnumat($str, $pos)
    {
    }
    /**
     * identifyMode
     * @param $pos (int)
     * @return int mode
     */
    protected function identifyMode($pos)
    {
    }
    /**
     * eatNum
     * @return int run
     */
    protected function eatNum()
    {
    }
    /**
     * eatAn
     * @return int run
     */
    protected function eatAn()
    {
    }
    /**
     * eatKanji
     * @return int run
     */
    protected function eatKanji()
    {
    }
    /**
     * eat8
     * @return int run
     */
    protected function eat8()
    {
    }
    /**
     * splitString
     * @return (int)
     */
    protected function splitString()
    {
    }
    /**
     * toUpper
     */
    protected function toUpper()
    {
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // QRinputItem
    /**
     * newInputItem
     * @param $mode (int)
     * @param $size (int)
     * @param $data (array)
     * @param $bstream (array)
     * @return array input item
     */
    protected function newInputItem($mode, $size, $data, $bstream = \null)
    {
    }
    /**
     * encodeModeNum
     * @param $inputitem (array)
     * @param $version (int)
     * @return array input item
     */
    protected function encodeModeNum($inputitem, $version)
    {
    }
    /**
     * encodeModeAn
     * @param $inputitem (array)
     * @param $version (int)
     * @return array input item
     */
    protected function encodeModeAn($inputitem, $version)
    {
    }
    /**
     * encodeMode8
     * @param $inputitem (array)
     * @param $version (int)
     * @return array input item
     */
    protected function encodeMode8($inputitem, $version)
    {
    }
    /**
     * encodeModeKanji
     * @param $inputitem (array)
     * @param $version (int)
     * @return array input item
     */
    protected function encodeModeKanji($inputitem, $version)
    {
    }
    /**
     * encodeModeStructure
     * @param $inputitem (array)
     * @return array input item
     */
    protected function encodeModeStructure($inputitem)
    {
    }
    /**
     * encodeBitStream
     * @param $inputitem (array)
     * @param $version (int)
     * @return array input item
     */
    protected function encodeBitStream($inputitem, $version)
    {
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // QRinput
    /**
     * Append data to an input object.
     * The data is copied and appended to the input object.
     * @param $items (arrray) input items
     * @param $mode (int) encoding mode.
     * @param $size (int) size of data (byte).
     * @param $data (array) array of input data.
     * @return items
     *
     */
    protected function appendNewInputItem($items, $mode, $size, $data)
    {
    }
    /**
     * insertStructuredAppendHeader
     * @param $items (array)
     * @param $size (int)
     * @param $index (int)
     * @param $parity (int)
     * @return array items
     */
    protected function insertStructuredAppendHeader($items, $size, $index, $parity)
    {
    }
    /**
     * calcParity
     * @param $items (array)
     * @return int parity
     */
    protected function calcParity($items)
    {
    }
    /**
     * checkModeNum
     * @param $size (int)
     * @param $data (array)
     * @return boolean true or false
     */
    protected function checkModeNum($size, $data)
    {
    }
    /**
     * Look up the alphabet-numeric convesion table (see JIS X0510:2004, pp.19).
     * @param $c (int) character value
     * @return value
     */
    protected function lookAnTable($c)
    {
    }
    /**
     * checkModeAn
     * @param $size (int)
     * @param $data (array)
     * @return boolean true or false
     */
    protected function checkModeAn($size, $data)
    {
    }
    /**
     * estimateBitsModeNum
     * @param $size (int)
     * @return int number of bits
     */
    protected function estimateBitsModeNum($size)
    {
    }
    /**
     * estimateBitsModeAn
     * @param $size (int)
     * @return int number of bits
     */
    protected function estimateBitsModeAn($size)
    {
    }
    /**
     * estimateBitsMode8
     * @param $size (int)
     * @return int number of bits
     */
    protected function estimateBitsMode8($size)
    {
    }
    /**
     * estimateBitsModeKanji
     * @param $size (int)
     * @return int number of bits
     */
    protected function estimateBitsModeKanji($size)
    {
    }
    /**
     * checkModeKanji
     * @param $size (int)
     * @param $data (array)
     * @return boolean true or false
     */
    protected function checkModeKanji($size, $data)
    {
    }
    /**
     * Validate the input data.
     * @param $mode (int) encoding mode.
     * @param $size (int) size of data (byte).
     * @param $data (array) data to validate
     * @return boolean true in case of valid data, false otherwise
     */
    protected function check($mode, $size, $data)
    {
    }
    /**
     * estimateBitStreamSize
     * @param $items (array)
     * @param $version (int)
     * @return int bits
     */
    protected function estimateBitStreamSize($items, $version)
    {
    }
    /**
     * estimateVersion
     * @param $items (array)
     * @return int version
     */
    protected function estimateVersion($items)
    {
    }
    /**
     * lengthOfCode
     * @param $mode (int)
     * @param $version (int)
     * @param $bits (int)
     * @return int size
     */
    protected function lengthOfCode($mode, $version, $bits)
    {
    }
    /**
     * createBitStream
     * @param $items (array)
     * @return array of items and total bits
     */
    protected function createBitStream($items)
    {
    }
    /**
     * convertData
     * @param $items (array)
     * @return array items
     */
    protected function convertData($items)
    {
    }
    /**
     * Append Padding Bit to bitstream
     * @param $bstream (array)
     * @return array bitstream
     */
    protected function appendPaddingBit($bstream)
    {
    }
    /**
     * mergeBitStream
     * @param $items (array) items
     * @return array bitstream
     */
    protected function mergeBitStream($items)
    {
    }
    /**
     * Returns a stream of bits.
     * @param $items (int)
     * @return array padded merged byte stream
     */
    protected function getBitStream($items)
    {
    }
    /**
     * Pack all bit streams padding bits into a byte array.
     * @param $items (int)
     * @return array padded merged byte stream
     */
    protected function getByteStream($items)
    {
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // QRbitstream
    /**
     * Return an array with zeros
     * @param $setLength (int) array size
     * @return array
     */
    protected function allocate($setLength)
    {
    }
    /**
     * Return new bitstream from number
     * @param $bits (int) number of bits
     * @param $num (int) number
     * @return array bitstream
     */
    protected function newFromNum($bits, $num)
    {
    }
    /**
     * Return new bitstream from bytes
     * @param $size (int) size
     * @param $data (array) bytes
     * @return array bitstream
     */
    protected function newFromBytes($size, $data)
    {
    }
    /**
     * Append one bitstream to another
     * @param $bitstream (array) original bitstream
     * @param $append (array) bitstream to append
     * @return array bitstream
     */
    protected function appendBitstream($bitstream, $append)
    {
    }
    /**
     * Append one bitstream created from number to another
     * @param $bitstream (array) original bitstream
     * @param $bits (int) number of bits
     * @param $num (int) number
     * @return array bitstream
     */
    protected function appendNum($bitstream, $bits, $num)
    {
    }
    /**
     * Append one bitstream created from bytes to another
     * @param $bitstream (array) original bitstream
     * @param $size (int) size
     * @param $data (array) bytes
     * @return array bitstream
     */
    protected function appendBytes($bitstream, $size, $data)
    {
    }
    /**
     * Convert bitstream to bytes
     * @param $bstream (array) original bitstream
     * @return array of bytes
     */
    protected function bitstreamToByte($bstream)
    {
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // QRspec
    /**
     * Replace a value on the array at the specified position
     * @param $srctab (array)
     * @param $x (int) X position
     * @param $y (int) Y position
     * @param $repl (string) value to replace
     * @param $replLen (int) length of the repl string
     * @return array srctab
     */
    protected function qrstrset($srctab, $x, $y, $repl, $replLen = \false)
    {
    }
    /**
     * Return maximum data code length (bytes) for the version.
     * @param $version (int) version
     * @param $level (int) error correction level
     * @return int maximum size (bytes)
     */
    protected function getDataLength($version, $level)
    {
    }
    /**
     * Return maximum error correction code length (bytes) for the version.
     * @param $version (int) version
     * @param $level (int) error correction level
     * @return int ECC size (bytes)
     */
    protected function getECCLength($version, $level)
    {
    }
    /**
     * Return the width of the symbol for the version.
     * @param $version (int) version
     * @return int width
     */
    protected function getWidth($version)
    {
    }
    /**
     * Return the numer of remainder bits.
     * @param $version (int) version
     * @return int number of remainder bits
     */
    protected function getRemainder($version)
    {
    }
    /**
     * Return a version number that satisfies the input code length.
     * @param $size (int) input code length (bytes)
     * @param $level (int) error correction level
     * @return int version number
     */
    protected function getMinimumVersion($size, $level)
    {
    }
    /**
     * Return the size of length indicator for the mode and version.
     * @param $mode (int) encoding mode
     * @param $version (int) version
     * @return int the size of the appropriate length indicator (bits).
     */
    protected function lengthIndicator($mode, $version)
    {
    }
    /**
     * Return the maximum length for the mode and version.
     * @param $mode (int) encoding mode
     * @param $version (int) version
     * @return int the maximum length (bytes)
     */
    protected function maximumWords($mode, $version)
    {
    }
    /**
     * Return an array of ECC specification.
     * @param $version (int) version
     * @param $level (int) error correction level
     * @param $spec (array) an array of ECC specification contains as following: {# of type1 blocks, # of data code, # of ecc code, # of type2 blocks, # of data code}
     * @return array spec
     */
    protected function getEccSpec($version, $level, $spec)
    {
    }
    /**
     * Put an alignment marker.
     * @param $frame (array) frame
     * @param $ox (int) X center coordinate of the pattern
     * @param $oy (int) Y center coordinate of the pattern
     * @return array frame
     */
    protected function putAlignmentMarker($frame, $ox, $oy)
    {
    }
    /**
     * Put an alignment pattern.
     * @param $version (int) version
     * @param $frame (array) frame
     * @param $width (int) width
     * @return array frame
     */
    protected function putAlignmentPattern($version, $frame, $width)
    {
    }
    /**
     * Return BCH encoded version information pattern that is used for the symbol of version 7 or greater. Use lower 18 bits.
     * @param $version (int) version
     * @return BCH encoded version information pattern
     */
    protected function getVersionPattern($version)
    {
    }
    /**
     * Return BCH encoded format information pattern.
     * @param $mask (array)
     * @param $level (int) error correction level
     * @return BCH encoded format information pattern
     */
    protected function getFormatInfo($mask, $level)
    {
    }
    /**
     * Put a finder pattern.
     * @param $frame (array) frame
     * @param $ox (int) X center coordinate of the pattern
     * @param $oy (int) Y center coordinate of the pattern
     * @return array frame
     */
    protected function putFinderPattern($frame, $ox, $oy)
    {
    }
    /**
     * Return a copy of initialized frame.
     * @param $version (int) version
     * @return Array of unsigned char.
     */
    protected function createFrame($version)
    {
    }
    /**
     * Set new frame for the specified version.
     * @param $version (int) version
     * @return Array of unsigned char.
     */
    protected function newFrame($version)
    {
    }
    /**
     * Return block number 0
     * @param $spec (array)
     * @return int value
     */
    protected function rsBlockNum($spec)
    {
    }
    /**
     * Return block number 1
     * @param $spec (array)
     * @return int value
     */
    protected function rsBlockNum1($spec)
    {
    }
    /**
     * Return data codes 1
     * @param $spec (array)
     * @return int value
     */
    protected function rsDataCodes1($spec)
    {
    }
    /**
     * Return ecc codes 1
     * @param $spec (array)
     * @return int value
     */
    protected function rsEccCodes1($spec)
    {
    }
    /**
     * Return block number 2
     * @param $spec (array)
     * @return int value
     */
    protected function rsBlockNum2($spec)
    {
    }
    /**
     * Return data codes 2
     * @param $spec (array)
     * @return int value
     */
    protected function rsDataCodes2($spec)
    {
    }
    /**
     * Return ecc codes 2
     * @param $spec (array)
     * @return int value
     */
    protected function rsEccCodes2($spec)
    {
    }
    /**
     * Return data length
     * @param $spec (array)
     * @return int value
     */
    protected function rsDataLength($spec)
    {
    }
    /**
     * Return ecc length
     * @param $spec (array)
     * @return int value
     */
    protected function rsEccLength($spec)
    {
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // QRrs
    /**
     * Initialize a Reed-Solomon codec and add it to existing rsitems
     * @param $symsize (int) symbol size, bits
     * @param $gfpoly (int)  Field generator polynomial coefficients
     * @param $fcr (int)  first root of RS code generator polynomial, index form
     * @param $prim (int)  primitive element to generate polynomial roots
     * @param $nroots (int) RS code generator polynomial degree (number of roots)
     * @param $pad (int)  padding bytes at front of shortened block
     * @return array Array of RS values:<ul><li>mm = Bits per symbol;</li><li>nn = Symbols per block;</li><li>alpha_to = log lookup table array;</li><li>index_of = Antilog lookup table array;</li><li>genpoly = Generator polynomial array;</li><li>nroots = Number of generator;</li><li>roots = number of parity symbols;</li><li>fcr = First consecutive root, index form;</li><li>prim = Primitive element, index form;</li><li>iprim = prim-th root of 1, index form;</li><li>pad = Padding bytes in shortened block;</li><li>gfpoly</ul>.
     */
    protected function init_rs($symsize, $gfpoly, $fcr, $prim, $nroots, $pad)
    {
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - -
    // QRrsItem
    /**
     * modnn
     * @param $rs (array) RS values
     * @param $x (int) X position
     * @return int X osition
     */
    protected function modnn($rs, $x)
    {
    }
    /**
     * Initialize a Reed-Solomon codec and returns an array of values.
     * @param $symsize (int) symbol size, bits
     * @param $gfpoly (int)  Field generator polynomial coefficients
     * @param $fcr (int)  first root of RS code generator polynomial, index form
     * @param $prim (int)  primitive element to generate polynomial roots
     * @param $nroots (int) RS code generator polynomial degree (number of roots)
     * @param $pad (int)  padding bytes at front of shortened block
     * @return array Array of RS values:<ul><li>mm = Bits per symbol;</li><li>nn = Symbols per block;</li><li>alpha_to = log lookup table array;</li><li>index_of = Antilog lookup table array;</li><li>genpoly = Generator polynomial array;</li><li>nroots = Number of generator;</li><li>roots = number of parity symbols;</li><li>fcr = First consecutive root, index form;</li><li>prim = Primitive element, index form;</li><li>iprim = prim-th root of 1, index form;</li><li>pad = Padding bytes in shortened block;</li><li>gfpoly</ul>.
     */
    protected function init_rs_char($symsize, $gfpoly, $fcr, $prim, $nroots, $pad)
    {
    }
    /**
     * Encode a Reed-Solomon codec and returns the parity array
     * @param $rs (array) RS values
     * @param $data (array) data
     * @param $parity (array) parity
     * @return parity array
     */
    protected function encode_rs_char($rs, $data, $parity)
    {
    }
}
/**
 * Indicate that definitions for this class are set
 */
\define('QRCODEDEFS', \true);
// -----------------------------------------------------
// Encoding modes (characters which can be encoded in QRcode)
/**
 * Encoding mode
 */
\define('QR_MODE_NL', -1);
/**
 * Encoding mode numeric (0-9). 3 characters are encoded to 10bit length. In theory, 7089 characters or less can be stored in a QRcode.
 */
\define('QR_MODE_NM', 0);
/**
 * Encoding mode alphanumeric (0-9A-Z $%*+-./:) 45characters. 2 characters are encoded to 11bit length. In theory, 4296 characters or less can be stored in a QRcode.
 */
\define('QR_MODE_AN', 1);
/**
 * Encoding mode 8bit byte data. In theory, 2953 characters or less can be stored in a QRcode.
 */
\define('QR_MODE_8B', 2);
/**
 * Encoding mode KANJI. A KANJI character (multibyte character) is encoded to 13bit length. In theory, 1817 characters or less can be stored in a QRcode.
 */
\define('QR_MODE_KJ', 3);
/**
 * Encoding mode STRUCTURED (currently unsupported)
 */
\define('QR_MODE_ST', 4);
// -----------------------------------------------------
// Levels of error correction.
// QRcode has a function of an error correcting for miss reading that white is black.
// Error correcting is defined in 4 level as below.
/**
 * Error correction level L : About 7% or less errors can be corrected.
 */
\define('QR_ECLEVEL_L', 0);
/**
 * Error correction level M : About 15% or less errors can be corrected.
 */
\define('QR_ECLEVEL_M', 1);
/**
 * Error correction level Q : About 25% or less errors can be corrected.
 */
\define('QR_ECLEVEL_Q', 2);
/**
 * Error correction level H : About 30% or less errors can be corrected.
 */
\define('QR_ECLEVEL_H', 3);
// -----------------------------------------------------
// Version. Size of QRcode is defined as version.
// Version is from 1 to 40.
// Version 1 is 21*21 matrix. And 4 modules increases whenever 1 version increases.
// So version 40 is 177*177 matrix.
/**
 * Maximum QR Code version.
 */
\define('QRSPEC_VERSION_MAX', 40);
/**
 * Maximum matrix size for maximum version (version 40 is 177*177 matrix).
 */
\define('QRSPEC_WIDTH_MAX', 177);
// -----------------------------------------------------
/**
 * Matrix index to get width from $capacity array.
 */
\define('QRCAP_WIDTH', 0);
/**
 * Matrix index to get number of words from $capacity array.
 */
\define('QRCAP_WORDS', 1);
/**
 * Matrix index to get remainder from $capacity array.
 */
\define('QRCAP_REMINDER', 2);
/**
 * Matrix index to get error correction level from $capacity array.
 */
\define('QRCAP_EC', 3);
// -----------------------------------------------------
// Structure (currently usupported)
/**
 * Number of header bits for structured mode
 */
\define('STRUCTURE_HEADER_BITS', 20);
/**
 * Max number of symbols for structured mode
 */
\define('MAX_STRUCTURED_SYMBOLS', 16);
// -----------------------------------------------------
// Masks
/**
 * Down point base value for case 1 mask pattern (concatenation of same color in a line or a column)
 */
\define('N1', 3);
/**
 * Down point base value for case 2 mask pattern (module block of same color)
 */
\define('N2', 3);
/**
 * Down point base value for case 3 mask pattern (1:1:3:1:1(dark:bright:dark:bright:dark)pattern in a line or a column)
 */
\define('N3', 40);
/**
 * Down point base value for case 4 mask pattern (ration of dark modules in whole)
 */
\define('N4', 10);
// -----------------------------------------------------
// Optimization settings
/**
 * if true, estimates best mask (spec. default, but extremally slow; set to false to significant performance boost but (propably) worst quality code
 */
\define('QR_FIND_BEST_MASK', \true);
/**
 * if false, checks all masks available, otherwise value tells count of masks need to be checked, mask id are got randomly
 */
// @CHANGE DOL LDR
\define('QR_FIND_FROM_RANDOM', \false);
/**
 * when QR_FIND_BEST_MASK === false
 */
\define('QR_DEFAULT_MASK', 2);