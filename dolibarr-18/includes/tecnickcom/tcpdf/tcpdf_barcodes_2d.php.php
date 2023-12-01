<?php

//============================================================+
// File name   : tcpdf_barcodes_2d.php
// Version     : 1.0.015
// Begin       : 2009-04-07
// Last Update : 2014-05-20
// Author      : Nicola Asuni - Tecnick.com LTD - www.tecnick.com - info@tecnick.com
// License     : GNU-LGPL v3 (http://www.gnu.org/copyleft/lesser.html)
// -------------------------------------------------------------------
// Copyright (C) 2009-2014 Nicola Asuni - Tecnick.com LTD
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
//               2D barcodes to be used with TCPDF.
//
//============================================================+
/**
 * @file
 * PHP class to creates array representations for 2D barcodes to be used with TCPDF.
 * @package com.tecnick.tcpdf
 * @author Nicola Asuni
 * @version 1.0.015
 */
/**
 * @class TCPDF2DBarcode
 * PHP class to creates array representations for 2D barcodes to be used with TCPDF (http://www.tcpdf.org).
 * @package com.tecnick.tcpdf
 * @version 1.0.015
 * @author Nicola Asuni
 */
class TCPDF2DBarcode
{
    /**
     * Array representation of barcode.
     * @protected
     */
    protected $barcode_array = \false;
    /**
     * This is the class constructor.
     * Return an array representations for 2D barcodes:<ul>
     * <li>$arrcode['code'] code to be printed on text label</li>
     * <li>$arrcode['num_rows'] required number of rows</li>
     * <li>$arrcode['num_cols'] required number of columns</li>
     * <li>$arrcode['bcode'][$r][$c] value of the cell is $r row and $c column (0 = transparent, 1 = black)</li></ul>
     * @param $code (string) code to print
     * @param $type (string) type of barcode: <ul><li>DATAMATRIX : Datamatrix (ISO/IEC 16022)</li><li>PDF417 : PDF417 (ISO/IEC 15438:2006)</li><li>PDF417,a,e,t,s,f,o0,o1,o2,o3,o4,o5,o6 : PDF417 with parameters: a = aspect ratio (width/height); e = error correction level (0-8); t = total number of macro segments; s = macro segment index (0-99998); f = file ID; o0 = File Name (text); o1 = Segment Count (numeric); o2 = Time Stamp (numeric); o3 = Sender (text); o4 = Addressee (text); o5 = File Size (numeric); o6 = Checksum (numeric). NOTES: Parameters t, s and f are required for a Macro Control Block, all other parametrs are optional. To use a comma character ',' on text options, replace it with the character 255: "\xff".</li><li>QRCODE : QRcode Low error correction</li><li>QRCODE,L : QRcode Low error correction</li><li>QRCODE,M : QRcode Medium error correction</li><li>QRCODE,Q : QRcode Better error correction</li><li>QRCODE,H : QR-CODE Best error correction</li><li>RAW: raw mode - comma-separad list of array rows</li><li>RAW2: raw mode - array rows are surrounded by square parenthesis.</li><li>TEST : Test matrix</li></ul>
     */
    public function __construct($code, $type)
    {
    }
    /**
     * Return an array representations of barcode.
     * @return array
     */
    public function getBarcodeArray()
    {
    }
    /**
     * Send barcode as SVG image object to the standard output.
     * @param $w (int) Width of a single rectangle element in user units.
     * @param $h (int) Height of a single rectangle element in user units.
     * @param $color (string) Foreground color (in SVG format) for bar elements (background is transparent).
     * @public
     */
    public function getBarcodeSVG($w = 3, $h = 3, $color = 'black')
    {
    }
    /**
     * Return a SVG string representation of barcode.
     * @param $w (int) Width of a single rectangle element in user units.
     * @param $h (int) Height of a single rectangle element in user units.
     * @param $color (string) Foreground color (in SVG format) for bar elements (background is transparent).
     * @return string SVG code.
     * @public
     */
    public function getBarcodeSVGcode($w = 3, $h = 3, $color = 'black')
    {
    }
    /**
     * Return an HTML representation of barcode.
     * @param $w (int) Width of a single rectangle element in pixels.
     * @param $h (int) Height of a single rectangle element in pixels.
     * @param $color (string) Foreground color for bar elements (background is transparent).
     * @return string HTML code.
     * @public
     */
    public function getBarcodeHTML($w = 10, $h = 10, $color = 'black')
    {
    }
    /**
     * Send a PNG image representation of barcode (requires GD or Imagick library).
     * @param $w (int) Width of a single rectangle element in pixels.
     * @param $h (int) Height of a single rectangle element in pixels.
     * @param $color (array) RGB (0-255) foreground color for bar elements (background is transparent).
     * @public
     */
    public function getBarcodePNG($w = 3, $h = 3, $color = array(0, 0, 0))
    {
    }
    /**
     * Return a PNG image representation of barcode (requires GD or Imagick library).
     * @param $w (int) Width of a single rectangle element in pixels.
     * @param $h (int) Height of a single rectangle element in pixels.
     * @param $color (array) RGB (0-255) foreground color for bar elements (background is transparent).
     * @return image or false in case of error.
     * @public
     */
    public function getBarcodePngData($w = 3, $h = 3, $color = array(0, 0, 0))
    {
    }
    /**
     * Set the barcode.
     * @param $code (string) code to print
     * @param $type (string) type of barcode: <ul><li>DATAMATRIX : Datamatrix (ISO/IEC 16022)</li><li>PDF417 : PDF417 (ISO/IEC 15438:2006)</li><li>PDF417,a,e,t,s,f,o0,o1,o2,o3,o4,o5,o6 : PDF417 with parameters: a = aspect ratio (width/height); e = error correction level (0-8); t = total number of macro segments; s = macro segment index (0-99998); f = file ID; o0 = File Name (text); o1 = Segment Count (numeric); o2 = Time Stamp (numeric); o3 = Sender (text); o4 = Addressee (text); o5 = File Size (numeric); o6 = Checksum (numeric). NOTES: Parameters t, s and f are required for a Macro Control Block, all other parametrs are optional. To use a comma character ',' on text options, replace it with the character 255: "\xff".</li><li>QRCODE : QRcode Low error correction</li><li>QRCODE,L : QRcode Low error correction</li><li>QRCODE,M : QRcode Medium error correction</li><li>QRCODE,Q : QRcode Better error correction</li><li>QRCODE,H : QR-CODE Best error correction</li><li>RAW: raw mode - comma-separad list of array rows</li><li>RAW2: raw mode - array rows are surrounded by square parenthesis.</li><li>TEST : Test matrix</li></ul>
     * @return array
     */
    public function setBarcode($code, $type)
    {
    }
}