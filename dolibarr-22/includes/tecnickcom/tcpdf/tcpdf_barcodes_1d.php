<?php

//============================================================+
// File name   : tcpdf_barcodes_1d.php
// Version     : 1.0.027
// Begin       : 2008-06-09
// Last Update : 2014-10-20
// Author      : Nicola Asuni - Tecnick.com LTD - www.tecnick.com - info@tecnick.com
// License     : GNU-LGPL v3 (http://www.gnu.org/copyleft/lesser.html)
// -------------------------------------------------------------------
// Copyright (C) 2008-2014 Nicola Asuni - Tecnick.com LTD
//
// This file is part of TCPDF software library.
//
// TCPDF is free software: you can redistribute it and/or modify it
// under the terms of the GNU Lesser General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// TCPDF is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// See the GNU Lesser General Public License for more details.
//
// You should have received a copy of the GNU Lesser General Public License
// along with TCPDF.  If not, see <http://www.gnu.org/licenses/>.
//
// See LICENSE.TXT file for more information.
// -------------------------------------------------------------------
//
// Description : PHP class to creates array representations for
//               common 1D barcodes to be used with TCPDF.
//
//============================================================+
/**
 * @file
 * PHP class to creates array representations for common 1D barcodes to be used with TCPDF.
 * @package com.tecnick.tcpdf
 * @author Nicola Asuni
 * @version 1.0.027
 */
/**
 * @class TCPDFBarcode
 * PHP class to creates array representations for common 1D barcodes to be used with TCPDF (http://www.tcpdf.org).<br>
 * @package com.tecnick.tcpdf
 * @version 1.0.027
 * @author Nicola Asuni
 */
class TCPDFBarcode
{
    /**
     * Array representation of barcode.
     * @protected
     */
    protected $barcode_array = array();
    /**
     * This is the class constructor.
     * Return an array representations for common 1D barcodes:<ul>
     * <li>$arrcode['code'] code to be printed on text label</li>
     * <li>$arrcode['maxh'] max barcode height</li>
     * <li>$arrcode['maxw'] max barcode width</li>
     * <li>$arrcode['bcode'][$k] single bar or space in $k position</li>
     * <li>$arrcode['bcode'][$k]['t'] bar type: true = bar, false = space.</li>
     * <li>$arrcode['bcode'][$k]['w'] bar width in units.</li>
     * <li>$arrcode['bcode'][$k]['h'] bar height in units.</li>
     * <li>$arrcode['bcode'][$k]['p'] bar top position (0 = top, 1 = middle)</li></ul>
     * @param string $code code to print
     * @param string $type type of barcode: <ul><li>C39 : CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.</li><li>C39+ : CODE 39 with checksum</li><li>C39E : CODE 39 EXTENDED</li><li>C39E+ : CODE 39 EXTENDED + CHECKSUM</li><li>C93 : CODE 93 - USS-93</li><li>S25 : Standard 2 of 5</li><li>S25+ : Standard 2 of 5 + CHECKSUM</li><li>I25 : Interleaved 2 of 5</li><li>I25+ : Interleaved 2 of 5 + CHECKSUM</li><li>C128 : CODE 128</li><li>C128A : CODE 128 A</li><li>C128B : CODE 128 B</li><li>C128C : CODE 128 C</li><li>EAN2 : 2-Digits UPC-Based Extension</li><li>EAN5 : 5-Digits UPC-Based Extension</li><li>EAN8 : EAN 8</li><li>EAN13 : EAN 13</li><li>UPCA : UPC-A</li><li>UPCE : UPC-E</li><li>MSI : MSI (Variation of Plessey code)</li><li>MSI+ : MSI + CHECKSUM (modulo 11)</li><li>POSTNET : POSTNET</li><li>PLANET : PLANET</li><li>RMS4CC : RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)</li><li>KIX : KIX (Klant index - Customer index)</li><li>IMB: Intelligent Mail Barcode - Onecode - USPS-B-3200</li><li>CODABAR : CODABAR</li><li>CODE11 : CODE 11</li><li>PHARMA : PHARMACODE</li><li>PHARMA2T : PHARMACODE TWO-TRACKS</li></ul>
     * @public
     */
    public function __construct($code, $type)
    {
    }
    /**
     * Return an array representations of barcode.
     * @return array
     * @public
     */
    public function getBarcodeArray()
    {
    }
    /**
     * Send barcode as SVG image object to the standard output.
     * @param int $w Minimum width of a single bar in user units.
     * @param int $h Height of barcode in user units.
     * @param string $color Foreground color (in SVG format) for bar elements (background is transparent).
     * @public
     */
    public function getBarcodeSVG($w = 2, $h = 30, $color = 'black')
    {
    }
    /**
     * Return a SVG string representation of barcode.
     * @param int $w Minimum width of a single bar in user units.
     * @param int $h Height of barcode in user units.
     * @param string $color Foreground color (in SVG format) for bar elements (background is transparent).
     * @return string SVG code.
     * @public
     */
    public function getBarcodeSVGcode($w = 2, $h = 30, $color = 'black')
    {
    }
    /**
     * Return an HTML representation of barcode.
     * @param int $w Width of a single bar element in pixels.
     * @param int $h Height of a single bar element in pixels.
     * @param string $color Foreground color for bar elements (background is transparent).
     * @return string HTML code.
     * @public
     */
    public function getBarcodeHTML($w = 2, $h = 30, $color = 'black')
    {
    }
    /**
     * Send a PNG image representation of barcode (requires GD or Imagick library).
     * @param int $w Width of a single bar element in pixels.
     * @param int $h Height of a single bar element in pixels.
     * @param array $color RGB (0-255) foreground color for bar elements (background is transparent).
     * @public
     */
    public function getBarcodePNG($w = 2, $h = 30, $color = array(0, 0, 0))
    {
    }
    /**
     * Return a PNG image representation of barcode (requires GD or Imagick library).
     * @param int $w Width of a single bar element in pixels.
     * @param int $h Height of a single bar element in pixels.
     * @param array $color RGB (0-255) foreground color for bar elements (background is transparent).
     * @return string|Imagick|false image or false in case of error.
     * @public
     */
    public function getBarcodePngData($w = 2, $h = 30, $color = array(0, 0, 0))
    {
    }
    /**
     * Set the barcode.
     * @param string $code code to print
     * @param string $type type of barcode: <ul><li>C39 : CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.</li><li>C39+ : CODE 39 with checksum</li><li>C39E : CODE 39 EXTENDED</li><li>C39E+ : CODE 39 EXTENDED + CHECKSUM</li><li>C93 : CODE 93 - USS-93</li><li>S25 : Standard 2 of 5</li><li>S25+ : Standard 2 of 5 + CHECKSUM</li><li>I25 : Interleaved 2 of 5</li><li>I25+ : Interleaved 2 of 5 + CHECKSUM</li><li>C128 : CODE 128</li><li>C128A : CODE 128 A</li><li>C128B : CODE 128 B</li><li>C128C : CODE 128 C</li><li>EAN2 : 2-Digits UPC-Based Extension</li><li>EAN5 : 5-Digits UPC-Based Extension</li><li>EAN8 : EAN 8</li><li>EAN13 : EAN 13</li><li>UPCA : UPC-A</li><li>UPCE : UPC-E</li><li>MSI : MSI (Variation of Plessey code)</li><li>MSI+ : MSI + CHECKSUM (modulo 11)</li><li>POSTNET : POSTNET</li><li>PLANET : PLANET</li><li>RMS4CC : RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)</li><li>KIX : KIX (Klant index - Customer index)</li><li>IMB: Intelligent Mail Barcode - Onecode - USPS-B-3200</li><li>IMBPRE: Pre-processed Intelligent Mail Barcode - Onecode - USPS-B-3200, using only F,A,D,T letters</li><li>CODABAR : CODABAR</li><li>CODE11 : CODE 11</li><li>PHARMA : PHARMACODE</li><li>PHARMA2T : PHARMACODE TWO-TRACKS</li></ul>
     * @return void
     * @public
     */
    public function setBarcode($code, $type)
    {
    }
    /**
     * CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.
     * General-purpose code in very wide use world-wide
     * @param string $code code to represent.
     * @param boolean $extended if true uses the extended mode.
     * @param boolean $checksum if true add a checksum to the code.
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_code39($code, $extended = \false, $checksum = \false)
    {
    }
    /**
     * Encode a string to be used for CODE 39 Extended mode.
     * @param string $code code to represent.
     * @return string encoded string.
     * @protected
     */
    protected function encode_code39_ext($code)
    {
    }
    /**
     * Calculate CODE 39 checksum (modulo 43).
     * @param string $code code to represent.
     * @return string char checksum.
     * @protected
     */
    protected function checksum_code39($code)
    {
    }
    /**
     * CODE 93 - USS-93
     * Compact code similar to Code 39
     * @param string $code code to represent.
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_code93($code)
    {
    }
    /**
     * Calculate CODE 93 checksum (modulo 47).
     * @param string $code code to represent.
     * @return string checksum code.
     * @protected
     */
    protected function checksum_code93($code)
    {
    }
    /**
     * Checksum for standard 2 of 5 barcodes.
     * @param string $code code to process.
     * @return int checksum.
     * @protected
     */
    protected function checksum_s25($code)
    {
    }
    /**
     * MSI.
     * Variation of Plessey code, with similar applications
     * Contains digits (0 to 9) and encodes the data only in the width of bars.
     * @param string $code code to represent.
     * @param boolean $checksum if true add a checksum to the code (modulo 11)
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_msi($code, $checksum = \false)
    {
    }
    /**
     * Standard 2 of 5 barcodes.
     * Used in airline ticket marking, photofinishing
     * Contains digits (0 to 9) and encodes the data only in the width of bars.
     * @param string $code code to represent.
     * @param boolean $checksum if true add a checksum to the code
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_s25($code, $checksum = \false)
    {
    }
    /**
     * Convert binary barcode sequence to WarnockPDF barcode array.
     * @param string $seq barcode as binary sequence.
     * @param array $bararray barcode array to fill up
     * @return array barcode representation.
     * @protected
     */
    protected function binseq_to_array($seq, $bararray)
    {
    }
    /**
     * Interleaved 2 of 5 barcodes.
     * Compact numeric code, widely used in industry, air cargo
     * Contains digits (0 to 9) and encodes the data in the width of both bars and spaces.
     * @param string $code code to represent.
     * @param boolean $checksum if true add a checksum to the code
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_i25($code, $checksum = \false)
    {
    }
    /**
     * C128 barcodes.
     * Very capable code, excellent density, high reliability; in very wide use world-wide
     * @param string $code code to represent.
     * @param string $type barcode type: A, B, C or empty for automatic switch (AUTO mode)
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_c128($code, $type = '')
    {
    }
    /**
     * Split text code in A/B sequence for 128 code
     * @param string $code code to split.
     * @return array sequence
     * @protected
     */
    protected function get128ABsequence($code)
    {
    }
    /**
     * EAN13 and UPC-A barcodes.
     * EAN13: European Article Numbering international retail product code
     * UPC-A: Universal product code seen on almost all retail products in the USA and Canada
     * UPC-E: Short version of UPC symbol
     * @param string $code code to represent.
     * @param string $len barcode type: 6 = UPC-E, 8 = EAN8, 13 = EAN13, 12 = UPC-A
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_eanupc($code, $len = 13)
    {
    }
    /**
     * UPC-Based Extensions
     * 2-Digit Ext.: Used to indicate magazines and newspaper issue numbers
     * 5-Digit Ext.: Used to mark suggested retail price of books
     * @param string $code code to represent.
     * @param string $len barcode type: 2 = 2-Digit, 5 = 5-Digit
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_eanext($code, $len = 5)
    {
    }
    /**
     * POSTNET and PLANET barcodes.
     * Used by U.S. Postal Service for automated mail sorting
     * @param string $code zip code to represent. Must be a string containing a zip code of the form DDDDD or DDDDD-DDDD.
     * @param boolean $planet if true print the PLANET barcode, otherwise print POSTNET
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_postnet($code, $planet = \false)
    {
    }
    /**
     * RMS4CC - CBC - KIX
     * RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code) - KIX (Klant index - Customer index)
     * RM4SCC is the name of the barcode symbology used by the Royal Mail for its Cleanmail service.
     * @param string $code code to print
     * @param boolean $kix if true prints the KIX variation (doesn't use the start and end symbols, and the checksum) - in this case the house number must be sufficed with an X and placed at the end of the code.
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_rms4cc($code, $kix = \false)
    {
    }
    /**
     * CODABAR barcodes.
     * Older code often used in library systems, sometimes in blood banks
     * @param string $code code to represent.
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_codabar($code)
    {
    }
    /**
     * CODE11 barcodes.
     * Used primarily for labeling telecommunications equipment
     * @param string $code code to represent.
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_code11($code)
    {
    }
    /**
     * Pharmacode
     * Contains digits (0 to 9)
     * @param string $code code to represent.
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_pharmacode($code)
    {
    }
    /**
     * Pharmacode two-track
     * Contains digits (0 to 9)
     * @param string $code code to represent.
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_pharmacode2t($code)
    {
    }
    /**
     * IMB - Intelligent Mail Barcode - Onecode - USPS-B-3200
     * (requires PHP bcmath extension)
     * Intelligent Mail barcode is a 65-bar code for use on mail in the United States.
     * The fields are described as follows:<ul><li>The Barcode Identifier shall be assigned by USPS to encode the presort identification that is currently printed in human readable form on the optional endorsement line (OEL) as well as for future USPS use. This shall be two digits, with the second digit in the range of 0–4. The allowable encoding ranges shall be 00–04, 10–14, 20–24, 30–34, 40–44, 50–54, 60–64, 70–74, 80–84, and 90–94.</li><li>The Service Type Identifier shall be assigned by USPS for any combination of services requested on the mailpiece. The allowable encoding range shall be 000http://it2.php.net/manual/en/function.dechex.php–999. Each 3-digit value shall correspond to a particular mail class with a particular combination of service(s). Each service program, such as OneCode Confirm and OneCode ACS, shall provide the list of Service Type Identifier values.</li><li>The Mailer or Customer Identifier shall be assigned by USPS as a unique, 6 or 9 digit number that identifies a business entity. The allowable encoding range for the 6 digit Mailer ID shall be 000000- 899999, while the allowable encoding range for the 9 digit Mailer ID shall be 900000000-999999999.</li><li>The Serial or Sequence Number shall be assigned by the mailer for uniquely identifying and tracking mailpieces. The allowable encoding range shall be 000000000–999999999 when used with a 6 digit Mailer ID and 000000-999999 when used with a 9 digit Mailer ID. e. The Delivery Point ZIP Code shall be assigned by the mailer for routing the mailpiece. This shall replace POSTNET for routing the mailpiece to its final delivery point. The length may be 0, 5, 9, or 11 digits. The allowable encoding ranges shall be no ZIP Code, 00000–99999,  000000000–999999999, and 00000000000–99999999999.</li></ul>
     * @param string $code code to print, separate the ZIP (routing code) from the rest using a minus char '-' (BarcodeID_ServiceTypeID_MailerID_SerialNumber-RoutingCode)
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_imb($code)
    {
    }
    /**
     * IMB - Intelligent Mail Barcode - Onecode - USPS-B-3200
     *
     * @param string $code pre-formatted IMB barcode (65 chars "FADT")
     * @return array barcode representation.
     * @protected
     */
    protected function barcode_imb_pre($code)
    {
    }
    /**
     * Convert large integer number to hexadecimal representation.
     * (requires PHP bcmath extension)
     * @param string $number number to convert specified as a string
     * @return string hexadecimal representation
     */
    public function dec_to_hex($number)
    {
    }
    /**
     * Convert large hexadecimal number to decimal representation (string).
     * (requires PHP bcmath extension)
     * @param string $hex hexadecimal number to convert specified as a string
     * @return string hexadecimal representation
     */
    public function hex_to_dec($hex)
    {
    }
    /**
     * Intelligent Mail Barcode calculation of Frame Check Sequence
     * @param string $code_arr array of hexadecimal values (13 bytes holding 102 bits right justified).
     * @return int 11 bit Frame Check Sequence as integer (decimal base)
     * @protected
     */
    protected function imb_crc11fcs($code_arr)
    {
    }
    /**
     * Reverse unsigned short value
     * @param int $num value to reversr
     * @return int reversed value
     * @protected
     */
    protected function imb_reverse_us($num)
    {
    }
    /**
     * generate Nof13 tables used for Intelligent Mail Barcode
     * @param int $n is the type of table: 2 for 2of13 table, 5 for 5of13table
     * @param int $size size of table (78 for n=2 and 1287 for n=5)
     * @return array requested table
     * @protected
     */
    protected function imb_tables($n, $size)
    {
    }
}