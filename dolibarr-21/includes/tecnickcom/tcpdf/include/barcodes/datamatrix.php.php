<?php

/**
* @class Datamatrix
* Class to create DataMatrix ECC 200 barcode arrays for TCPDF class.
* DataMatrix (ISO/IEC 16022:2006) is a 2-dimensional bar code.
*
* @package com.tecnick.tcpdf
* @author Nicola Asuni
* @version 1.0.004
*/
class Datamatrix
{
    /**
     * Barcode array to be returned which is readable by TCPDF.
     * @protected
     */
    protected $barcode_array = array();
    /**
     * Store last used encoding for data codewords.
     * @protected
     */
    protected $last_enc = \ENC_ASCII;
    /**
     * Table of Data Matrix ECC 200 Symbol Attributes:<ul>
     * <li>total matrix rows (including finder pattern)</li>
     * <li>total matrix cols (including finder pattern)</li>
     * <li>total matrix rows (without finder pattern)</li>
     * <li>total matrix cols (without finder pattern)</li>
     * <li>region data rows (with finder pattern)</li>
     * <li>region data col (with finder pattern)</li>
     * <li>region data rows (without finder pattern)</li>
     * <li>region data col (without finder pattern)</li>
     * <li>horizontal regions</li>
     * <li>vertical regions</li>
     * <li>regions</li>
     * <li>data codewords</li>
     * <li>error codewords</li>
     * <li>blocks</li>
     * <li>data codewords per block</li>
     * <li>error codewords per block</li>
     * </ul>
     * @protected
     */
    protected $symbattr = array(
        // square form ---------------------------------------------------------------------------------------
        array(0xa, 0xa, 0x8, 0x8, 0xa, 0xa, 0x8, 0x8, 0x1, 0x1, 0x1, 0x3, 0x5, 0x1, 0x3, 0x5),
        // 10x10
        array(0xc, 0xc, 0xa, 0xa, 0xc, 0xc, 0xa, 0xa, 0x1, 0x1, 0x1, 0x5, 0x7, 0x1, 0x5, 0x7),
        // 12x12
        array(0xe, 0xe, 0xc, 0xc, 0xe, 0xe, 0xc, 0xc, 0x1, 0x1, 0x1, 0x8, 0xa, 0x1, 0x8, 0xa),
        // 14x14
        array(0x10, 0x10, 0xe, 0xe, 0x10, 0x10, 0xe, 0xe, 0x1, 0x1, 0x1, 0xc, 0xc, 0x1, 0xc, 0xc),
        // 16x16
        array(0x12, 0x12, 0x10, 0x10, 0x12, 0x12, 0x10, 0x10, 0x1, 0x1, 0x1, 0x12, 0xe, 0x1, 0x12, 0xe),
        // 18x18
        array(0x14, 0x14, 0x12, 0x12, 0x14, 0x14, 0x12, 0x12, 0x1, 0x1, 0x1, 0x16, 0x12, 0x1, 0x16, 0x12),
        // 20x20
        array(0x16, 0x16, 0x14, 0x14, 0x16, 0x16, 0x14, 0x14, 0x1, 0x1, 0x1, 0x1e, 0x14, 0x1, 0x1e, 0x14),
        // 22x22
        array(0x18, 0x18, 0x16, 0x16, 0x18, 0x18, 0x16, 0x16, 0x1, 0x1, 0x1, 0x24, 0x18, 0x1, 0x24, 0x18),
        // 24x24
        array(0x1a, 0x1a, 0x18, 0x18, 0x1a, 0x1a, 0x18, 0x18, 0x1, 0x1, 0x1, 0x2c, 0x1c, 0x1, 0x2c, 0x1c),
        // 26x26
        array(0x20, 0x20, 0x1c, 0x1c, 0x10, 0x10, 0xe, 0xe, 0x2, 0x2, 0x4, 0x3e, 0x24, 0x1, 0x3e, 0x24),
        // 32x32
        array(0x24, 0x24, 0x20, 0x20, 0x12, 0x12, 0x10, 0x10, 0x2, 0x2, 0x4, 0x56, 0x2a, 0x1, 0x56, 0x2a),
        // 36x36
        array(0x28, 0x28, 0x24, 0x24, 0x14, 0x14, 0x12, 0x12, 0x2, 0x2, 0x4, 0x72, 0x30, 0x1, 0x72, 0x30),
        // 40x40
        array(0x2c, 0x2c, 0x28, 0x28, 0x16, 0x16, 0x14, 0x14, 0x2, 0x2, 0x4, 0x90, 0x38, 0x1, 0x90, 0x38),
        // 44x44
        array(0x30, 0x30, 0x2c, 0x2c, 0x18, 0x18, 0x16, 0x16, 0x2, 0x2, 0x4, 0xae, 0x44, 0x1, 0xae, 0x44),
        // 48x48
        array(0x34, 0x34, 0x30, 0x30, 0x1a, 0x1a, 0x18, 0x18, 0x2, 0x2, 0x4, 0xcc, 0x54, 0x2, 0x66, 0x2a),
        // 52x52
        array(0x40, 0x40, 0x38, 0x38, 0x10, 0x10, 0xe, 0xe, 0x4, 0x4, 0x10, 0x118, 0x70, 0x2, 0x8c, 0x38),
        // 64x64
        array(0x48, 0x48, 0x40, 0x40, 0x12, 0x12, 0x10, 0x10, 0x4, 0x4, 0x10, 0x170, 0x90, 0x4, 0x5c, 0x24),
        // 72x72
        array(0x50, 0x50, 0x48, 0x48, 0x14, 0x14, 0x12, 0x12, 0x4, 0x4, 0x10, 0x1c8, 0xc0, 0x4, 0x72, 0x30),
        // 80x80
        array(0x58, 0x58, 0x50, 0x50, 0x16, 0x16, 0x14, 0x14, 0x4, 0x4, 0x10, 0x240, 0xe0, 0x4, 0x90, 0x38),
        // 88x88
        array(0x60, 0x60, 0x58, 0x58, 0x18, 0x18, 0x16, 0x16, 0x4, 0x4, 0x10, 0x2b8, 0x110, 0x4, 0xae, 0x44),
        // 96x96
        array(0x68, 0x68, 0x60, 0x60, 0x1a, 0x1a, 0x18, 0x18, 0x4, 0x4, 0x10, 0x330, 0x150, 0x6, 0x88, 0x38),
        // 104x104
        array(0x78, 0x78, 0x6c, 0x6c, 0x14, 0x14, 0x12, 0x12, 0x6, 0x6, 0x24, 0x41a, 0x198, 0x6, 0xaf, 0x44),
        // 120x120
        array(0x84, 0x84, 0x78, 0x78, 0x16, 0x16, 0x14, 0x14, 0x6, 0x6, 0x24, 0x518, 0x1f0, 0x8, 0xa3, 0x3e),
        // 132x132
        array(0x90, 0x90, 0x84, 0x84, 0x18, 0x18, 0x16, 0x16, 0x6, 0x6, 0x24, 0x616, 0x26c, 0xa, 0x9c, 0x3e),
        // 144x144
        // rectangular form (currently unused) ---------------------------------------------------------------------------
        array(0x8, 0x12, 0x6, 0x10, 0x8, 0x12, 0x6, 0x10, 0x1, 0x1, 0x1, 0x5, 0x7, 0x1, 0x5, 0x7),
        // 8x18
        array(0x8, 0x20, 0x6, 0x1c, 0x8, 0x10, 0x6, 0xe, 0x1, 0x2, 0x2, 0xa, 0xb, 0x1, 0xa, 0xb),
        // 8x32
        array(0xc, 0x1a, 0xa, 0x18, 0xc, 0x1a, 0xa, 0x18, 0x1, 0x1, 0x1, 0x10, 0xe, 0x1, 0x10, 0xe),
        // 12x26
        array(0xc, 0x24, 0xa, 0x20, 0xc, 0x12, 0xa, 0x10, 0x1, 0x2, 0x2, 0xc, 0x12, 0x1, 0xc, 0x12),
        // 12x36
        array(0x10, 0x24, 0xe, 0x20, 0x10, 0x12, 0xe, 0x10, 0x1, 0x2, 0x2, 0x20, 0x18, 0x1, 0x20, 0x18),
        // 16x36
        array(0x10, 0x30, 0xe, 0x2c, 0x10, 0x18, 0xe, 0x16, 0x1, 0x2, 0x2, 0x31, 0x1c, 0x1, 0x31, 0x1c),
    );
    /**
     * Map encodation modes whit character sets.
     * @protected
     */
    protected $chset_id = array(\ENC_C40 => 'C40', \ENC_TXT => 'TXT', \ENC_X12 => 'X12');
    /**
     * Basic set of characters for each encodation mode.
     * @protected
     */
    protected $chset = array(
        'C40' => array(
            // Basic set for C40 ----------------------------------------------------------------------------
            'S1' => 0x0,
            'S2' => 0x1,
            'S3' => 0x2,
            0x20 => 0x3,
            0x30 => 0x4,
            0x31 => 0x5,
            0x32 => 0x6,
            0x33 => 0x7,
            0x34 => 0x8,
            0x35 => 0x9,
            //
            0x36 => 0xa,
            0x37 => 0xb,
            0x38 => 0xc,
            0x39 => 0xd,
            0x41 => 0xe,
            0x42 => 0xf,
            0x43 => 0x10,
            0x44 => 0x11,
            0x45 => 0x12,
            0x46 => 0x13,
            //
            0x47 => 0x14,
            0x48 => 0x15,
            0x49 => 0x16,
            0x4a => 0x17,
            0x4b => 0x18,
            0x4c => 0x19,
            0x4d => 0x1a,
            0x4e => 0x1b,
            0x4f => 0x1c,
            0x50 => 0x1d,
            //
            0x51 => 0x1e,
            0x52 => 0x1f,
            0x53 => 0x20,
            0x54 => 0x21,
            0x55 => 0x22,
            0x56 => 0x23,
            0x57 => 0x24,
            0x58 => 0x25,
            0x59 => 0x26,
            0x5a => 0x27,
        ),
        //
        'TXT' => array(
            // Basic set for TEXT ---------------------------------------------------------------------------
            'S1' => 0x0,
            'S2' => 0x1,
            'S3' => 0x2,
            0x20 => 0x3,
            0x30 => 0x4,
            0x31 => 0x5,
            0x32 => 0x6,
            0x33 => 0x7,
            0x34 => 0x8,
            0x35 => 0x9,
            //
            0x36 => 0xa,
            0x37 => 0xb,
            0x38 => 0xc,
            0x39 => 0xd,
            0x61 => 0xe,
            0x62 => 0xf,
            0x63 => 0x10,
            0x64 => 0x11,
            0x65 => 0x12,
            0x66 => 0x13,
            //
            0x67 => 0x14,
            0x68 => 0x15,
            0x69 => 0x16,
            0x6a => 0x17,
            0x6b => 0x18,
            0x6c => 0x19,
            0x6d => 0x1a,
            0x6e => 0x1b,
            0x6f => 0x1c,
            0x70 => 0x1d,
            //
            0x71 => 0x1e,
            0x72 => 0x1f,
            0x73 => 0x20,
            0x74 => 0x21,
            0x75 => 0x22,
            0x76 => 0x23,
            0x77 => 0x24,
            0x78 => 0x25,
            0x79 => 0x26,
            0x7a => 0x27,
        ),
        //
        'SH1' => array(
            // Shift 1 set ----------------------------------------------------------------------------------
            0x0 => 0x0,
            0x1 => 0x1,
            0x2 => 0x2,
            0x3 => 0x3,
            0x4 => 0x4,
            0x5 => 0x5,
            0x6 => 0x6,
            0x7 => 0x7,
            0x8 => 0x8,
            0x9 => 0x9,
            //
            0xa => 0xa,
            0xb => 0xb,
            0xc => 0xc,
            0xd => 0xd,
            0xe => 0xe,
            0xf => 0xf,
            0x10 => 0x10,
            0x11 => 0x11,
            0x12 => 0x12,
            0x13 => 0x13,
            //
            0x14 => 0x14,
            0x15 => 0x15,
            0x16 => 0x16,
            0x17 => 0x17,
            0x18 => 0x18,
            0x19 => 0x19,
            0x1a => 0x1a,
            0x1b => 0x1b,
            0x1c => 0x1c,
            0x1d => 0x1d,
            //
            0x1e => 0x1e,
            0x1f => 0x1f,
        ),
        //
        'SH2' => array(
            // Shift 2 set ----------------------------------------------------------------------------------
            0x21 => 0x0,
            0x22 => 0x1,
            0x23 => 0x2,
            0x24 => 0x3,
            0x25 => 0x4,
            0x26 => 0x5,
            0x27 => 0x6,
            0x28 => 0x7,
            0x29 => 0x8,
            0x2a => 0x9,
            //
            0x2b => 0xa,
            0x2c => 0xb,
            0x2d => 0xc,
            0x2e => 0xd,
            0x2f => 0xe,
            0x3a => 0xf,
            0x3b => 0x10,
            0x3c => 0x11,
            0x3d => 0x12,
            0x3e => 0x13,
            //
            0x3f => 0x14,
            0x40 => 0x15,
            0x5b => 0x16,
            0x5c => 0x17,
            0x5d => 0x18,
            0x5e => 0x19,
            0x5f => 0x1a,
            'F1' => 0x1b,
            'US' => 0x1e,
        ),
        //
        'S3C' => array(
            // Shift 3 set for C40 --------------------------------------------------------------------------
            0x60 => 0x0,
            0x61 => 0x1,
            0x62 => 0x2,
            0x63 => 0x3,
            0x64 => 0x4,
            0x65 => 0x5,
            0x66 => 0x6,
            0x67 => 0x7,
            0x68 => 0x8,
            0x69 => 0x9,
            //
            0x6a => 0xa,
            0x6b => 0xb,
            0x6c => 0xc,
            0x6d => 0xd,
            0x6e => 0xe,
            0x6f => 0xf,
            0x70 => 0x10,
            0x71 => 0x11,
            0x72 => 0x12,
            0x73 => 0x13,
            //
            0x74 => 0x14,
            0x75 => 0x15,
            0x76 => 0x16,
            0x77 => 0x17,
            0x78 => 0x18,
            0x79 => 0x19,
            0x7a => 0x1a,
            0x7b => 0x1b,
            0x7c => 0x1c,
            0x7d => 0x1d,
            //
            0x7e => 0x1e,
            0x7f => 0x1f,
        ),
        'S3T' => array(
            // Shift 3 set for TEXT -------------------------------------------------------------------------
            0x60 => 0x0,
            0x41 => 0x1,
            0x42 => 0x2,
            0x43 => 0x3,
            0x44 => 0x4,
            0x45 => 0x5,
            0x46 => 0x6,
            0x47 => 0x7,
            0x48 => 0x8,
            0x49 => 0x9,
            //
            0x4a => 0xa,
            0x4b => 0xb,
            0x4c => 0xc,
            0x4d => 0xd,
            0x4e => 0xe,
            0x4f => 0xf,
            0x50 => 0x10,
            0x51 => 0x11,
            0x52 => 0x12,
            0x53 => 0x13,
            //
            0x54 => 0x14,
            0x55 => 0x15,
            0x56 => 0x16,
            0x57 => 0x17,
            0x58 => 0x18,
            0x59 => 0x19,
            0x5a => 0x1a,
            0x7b => 0x1b,
            0x7c => 0x1c,
            0x7d => 0x1d,
            //
            0x7e => 0x1e,
            0x7f => 0x1f,
        ),
        //
        'X12' => array(
            // Set for X12 ----------------------------------------------------------------------------------
            0xd => 0x0,
            0x2a => 0x1,
            0x3e => 0x2,
            0x20 => 0x3,
            0x30 => 0x4,
            0x31 => 0x5,
            0x32 => 0x6,
            0x33 => 0x7,
            0x34 => 0x8,
            0x35 => 0x9,
            //
            0x36 => 0xa,
            0x37 => 0xb,
            0x38 => 0xc,
            0x39 => 0xd,
            0x41 => 0xe,
            0x42 => 0xf,
            0x43 => 0x10,
            0x44 => 0x11,
            0x45 => 0x12,
            0x46 => 0x13,
            //
            0x47 => 0x14,
            0x48 => 0x15,
            0x49 => 0x16,
            0x4a => 0x17,
            0x4b => 0x18,
            0x4c => 0x19,
            0x4d => 0x1a,
            0x4e => 0x1b,
            0x4f => 0x1c,
            0x50 => 0x1d,
            //
            0x51 => 0x1e,
            0x52 => 0x1f,
            0x53 => 0x20,
            0x54 => 0x21,
            0x55 => 0x22,
            0x56 => 0x23,
            0x57 => 0x24,
            0x58 => 0x25,
            0x59 => 0x26,
            0x5a => 0x27,
        ),
    );
    // -----------------------------------------------------------------------------
    /**
     * This is the class constructor.
     * Creates a datamatrix object
     * @param string $code Code to represent using Datamatrix.
     * @public
     */
    public function __construct($code)
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
     * Product of two numbers in a Power-of-Two Galois Field
     * @param int $a first number to multiply.
     * @param int $b second number to multiply.
     * @param array $log Log table.
     * @param array $alog Anti-Log table.
     * @param int $gf Number of Factors of the Reed-Solomon polynomial.
     * @return int product
     * @protected
     */
    protected function getGFProduct($a, $b, $log, $alog, $gf)
    {
    }
    /**
     * Add error correction codewords to data codewords array (ANNEX E).
     * @param array $wd Array of datacodewords.
     * @param int $nb Number of blocks.
     * @param int $nd Number of data codewords per block.
     * @param int $nc Number of correction codewords per block.
     * @param int $gf numner of fields on log/antilog table (power of 2).
     * @param int $pp The value of its prime modulus polynomial (301 for ECC200).
     * @return array data codewords + error codewords
     * @protected
     */
    protected function getErrorCorrection($wd, $nb, $nd, $nc, $gf = 256, $pp = 301)
    {
    }
    /**
     * Return the 253-state codeword
     * @param int $cwpad Pad codeword.
     * @param int $cwpos Number of data codewords from the beginning of encoded data.
     * @return int pad codeword
     * @protected
     */
    protected function get253StateCodeword($cwpad, $cwpos)
    {
    }
    /**
     * Return the 255-state codeword
     * @param int $cwpad Pad codeword.
     * @param int $cwpos Number of data codewords from the beginning of encoded data.
     * @return int pad codeword
     * @protected
     */
    protected function get255StateCodeword($cwpad, $cwpos)
    {
    }
    /**
     * Returns true if the char belongs to the selected mode
     * @param int $chr Character (byte) to check.
     * @param int $mode Current encoding mode.
     * @return boolean true if the char is of the selected mode.
     * @protected
     */
    protected function isCharMode($chr, $mode)
    {
    }
    /**
     * The look-ahead test scans the data to be encoded to find the best mode (Annex P - steps from J to S).
     * @param string $data data to encode
     * @param int $pos current position
     * @param int $mode current encoding mode
     * @return int encoding mode
     * @protected
     */
    protected function lookAheadTest($data, $pos, $mode)
    {
    }
    /**
     * Get the switching codeword to a new encoding mode (latch codeword)
     * @param int $mode New encoding mode.
     * @return int Switch codeword.
     * @protected
     */
    protected function getSwitchEncodingCodeword($mode)
    {
    }
    /**
     * Choose the minimum matrix size and return the max number of data codewords.
     * @param int $numcw Number of current codewords.
     * @return int number of data codewords in matrix
     * @protected
     */
    protected function getMaxDataCodewords($numcw)
    {
    }
    /**
     * Get high level encoding using the minimum symbol data characters for ECC 200
     * @param string $data data to encode
     * @return array of codewords
     * @protected
     */
    protected function getHighLevelEncoding($data)
    {
    }
    /**
     * Places "chr+bit" with appropriate wrapping within array[].
     * (Annex F - ECC 200 symbol character placement)
     * @param array $marr Array of symbols.
     * @param int $nrow Number of rows.
     * @param int $ncol Number of columns.
     * @param int $row Row number.
     * @param int $col Column number.
     * @param int $chr Char byte.
     * @param int $bit Bit.
     * @return array
     * @protected
     */
    protected function placeModule($marr, $nrow, $ncol, $row, $col, $chr, $bit)
    {
    }
    /**
     * Places the 8 bits of a utah-shaped symbol character.
     * (Annex F - ECC 200 symbol character placement)
     * @param array $marr Array of symbols.
     * @param int $nrow Number of rows.
     * @param int $ncol Number of columns.
     * @param int $row Row number.
     * @param int $col Column number.
     * @param int $chr Char byte.
     * @return array
     * @protected
     */
    protected function placeUtah($marr, $nrow, $ncol, $row, $col, $chr)
    {
    }
    /**
     * Places the 8 bits of the first special corner case.
     * (Annex F - ECC 200 symbol character placement)
     * @param array $marr Array of symbols.
     * @param int $nrow Number of rows.
     * @param int $ncol Number of columns.
     * @param int $chr Char byte.
     * @return array
     * @protected
     */
    protected function placeCornerA($marr, $nrow, $ncol, $chr)
    {
    }
    /**
     * Places the 8 bits of the second special corner case.
     * (Annex F - ECC 200 symbol character placement)
     * @param array $marr Array of symbols.
     * @param int $nrow Number of rows.
     * @param int $ncol Number of columns.
     * @param int $chr Char byte.
     * @return array
     * @protected
     */
    protected function placeCornerB($marr, $nrow, $ncol, $chr)
    {
    }
    /**
     * Places the 8 bits of the third special corner case.
     * (Annex F - ECC 200 symbol character placement)
     * @param array $marr Array of symbols.
     * @param int $nrow Number of rows.
     * @param int $ncol Number of columns.
     * @param int $chr Char byte.
     * @return array
     * @protected
     */
    protected function placeCornerC($marr, $nrow, $ncol, $chr)
    {
    }
    /**
     * Places the 8 bits of the fourth special corner case.
     * (Annex F - ECC 200 symbol character placement)
     * @param array $marr Array of symbols.
     * @param int $nrow Number of rows.
     * @param int $ncol Number of columns.
     * @param int $chr Char byte.
     * @return array
     * @protected
     */
    protected function placeCornerD($marr, $nrow, $ncol, $chr)
    {
    }
    /**
     * Build a placement map.
     * (Annex F - ECC 200 symbol character placement)
     * @param int $nrow Number of rows.
     * @param int $ncol Number of columns.
     * @return array
     * @protected
     */
    protected function getPlacementMap($nrow, $ncol)
    {
    }
}
/**
 * Indicate that definitions for this class are set
 */
\define('DATAMATRIXDEFS', \true);
// end of custom definitions
// #*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#*#
/**
* ASCII encoding: ASCII character 0 to 127 (1 byte per CW)
*/
\define('ENC_ASCII', 0);
/**
* C40 encoding: Upper-case alphanumeric (3/2 bytes per CW)
*/
\define('ENC_C40', 1);
/**
* TEXT encoding: Lower-case alphanumeric (3/2 bytes per CW)
*/
\define('ENC_TXT', 2);
/**
* X12 encoding: ANSI X12 (3/2 byte per CW)
*/
\define('ENC_X12', 3);
/**
* EDIFACT encoding: ASCII character 32 to 94 (4/3 bytes per CW)
*/
\define('ENC_EDF', 4);
/**
* BASE 256 encoding: ASCII character 0 to 255 (1 byte per CW)
*/
\define('ENC_BASE256', 5);
/**
* ASCII extended encoding: ASCII character 128 to 255 (1/2 byte per CW)
*/
\define('ENC_ASCII_EXT', 6);
/**
* ASCII number encoding: ASCII digits (2 bytes per CW)
*/
\define('ENC_ASCII_NUM', 7);