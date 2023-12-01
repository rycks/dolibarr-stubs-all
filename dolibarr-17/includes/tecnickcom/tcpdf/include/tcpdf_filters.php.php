<?php

//============================================================+
// File name   : tcpdf_filters.php
// Version     : 1.0.001
// Begin       : 2011-05-23
// Last Update : 2014-04-25
// Author      : Nicola Asuni - Tecnick.com LTD - www.tecnick.com - info@tecnick.com
// License     : GNU-LGPL v3 (http://www.gnu.org/copyleft/lesser.html)
// -------------------------------------------------------------------
// Copyright (C) 2011-2013 Nicola Asuni - Tecnick.com LTD
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
// You should have received a copy of the License
// along with TCPDF. If not, see
// <http://www.tecnick.com/pagefiles/tcpdf/LICENSE.TXT>.
//
// See LICENSE.TXT file for more information.
// -------------------------------------------------------------------
//
// Description : This is a PHP class for decoding common PDF filters (PDF 32000-2008 - 7.4 Filters).
//
//============================================================+
/**
 * @file
 * This is a PHP class for decoding common PDF filters (PDF 32000-2008 - 7.4 Filters).<br>
 * @package com.tecnick.tcpdf
 * @author Nicola Asuni
 * @version 1.0.001
 */
/**
 * @class TCPDF_FILTERS
 * This is a PHP class for decoding common PDF filters (PDF 32000-2008 - 7.4 Filters).<br>
 * @package com.tecnick.tcpdf
 * @brief This is a PHP class for decoding common PDF filters.
 * @version 1.0.001
 * @author Nicola Asuni - info@tecnick.com
 */
class TCPDF_FILTERS
{
    /**
     * Define a list of available filter decoders.
     * @private static
     */
    private static $available_filters = array('ASCIIHexDecode', 'ASCII85Decode', 'LZWDecode', 'FlateDecode', 'RunLengthDecode');
    // -----------------------------------------------------------------------------
    /**
     * Get a list of available decoding filters.
     * @return (array) Array of available filter decoders.
     * @since 1.0.000 (2011-05-23)
     * @public static
     */
    public static function getAvailableFilters()
    {
    }
    /**
     * Decode data using the specified filter type.
     * @param $filter (string) Filter name.
     * @param $data (string) Data to decode.
     * @return Decoded data string.
     * @since 1.0.000 (2011-05-23)
     * @public static
     */
    public static function decodeFilter($filter, $data)
    {
    }
    // --- FILTERS (PDF 32000-2008 - 7.4 Filters) ------------------------------
    /**
     * Standard
     * Default decoding filter (leaves data unchanged).
     * @param $data (string) Data to decode.
     * @return Decoded data string.
     * @since 1.0.000 (2011-05-23)
     * @public static
     */
    public static function decodeFilterStandard($data)
    {
    }
    /**
     * ASCIIHexDecode
     * Decodes data encoded in an ASCII hexadecimal representation, reproducing the original binary data.
     * @param $data (string) Data to decode.
     * @return Decoded data string.
     * @since 1.0.000 (2011-05-23)
     * @public static
     */
    public static function decodeFilterASCIIHexDecode($data)
    {
    }
    /**
     * ASCII85Decode
     * Decodes data encoded in an ASCII base-85 representation, reproducing the original binary data.
     * @param $data (string) Data to decode.
     * @return Decoded data string.
     * @since 1.0.000 (2011-05-23)
     * @public static
     */
    public static function decodeFilterASCII85Decode($data)
    {
    }
    /**
     * LZWDecode
     * Decompresses data encoded using the LZW (Lempel-Ziv-Welch) adaptive compression method, reproducing the original text or binary data.
     * @param $data (string) Data to decode.
     * @return Decoded data string.
     * @since 1.0.000 (2011-05-23)
     * @public static
     */
    public static function decodeFilterLZWDecode($data)
    {
    }
    /**
     * FlateDecode
     * Decompresses data encoded using the zlib/deflate compression method, reproducing the original text or binary data.
     * @param $data (string) Data to decode.
     * @return Decoded data string.
     * @since 1.0.000 (2011-05-23)
     * @public static
     */
    public static function decodeFilterFlateDecode($data)
    {
    }
    /**
     * RunLengthDecode
     * Decompresses data encoded using a byte-oriented run-length encoding algorithm.
     * @param $data (string) Data to decode.
     * @since 1.0.000 (2011-05-23)
     * @public static
     */
    public static function decodeFilterRunLengthDecode($data)
    {
    }
    /**
     * CCITTFaxDecode (NOT IMPLEMETED - RETURN AN EXCEPTION)
     * Decompresses data encoded using the CCITT facsimile standard, reproducing the original data (typically monochrome image data at 1 bit per pixel).
     * @param $data (string) Data to decode.
     * @return Decoded data string.
     * @since 1.0.000 (2011-05-23)
     * @public static
     */
    public static function decodeFilterCCITTFaxDecode($data)
    {
    }
    /**
     * JBIG2Decode (NOT IMPLEMETED - RETURN AN EXCEPTION)
     * Decompresses data encoded using the JBIG2 standard, reproducing the original monochrome (1 bit per pixel) image data (or an approximation of that data).
     * @param $data (string) Data to decode.
     * @return Decoded data string.
     * @since 1.0.000 (2011-05-23)
     * @public static
     */
    public static function decodeFilterJBIG2Decode($data)
    {
    }
    /**
     * DCTDecode (NOT IMPLEMETED - RETURN AN EXCEPTION)
     * Decompresses data encoded using a DCT (discrete cosine transform) technique based on the JPEG standard, reproducing image sample data that approximates the original data.
     * @param $data (string) Data to decode.
     * @return Decoded data string.
     * @since 1.0.000 (2011-05-23)
     * @public static
     */
    public static function decodeFilterDCTDecode($data)
    {
    }
    /**
     * JPXDecode (NOT IMPLEMETED - RETURN AN EXCEPTION)
     * Decompresses data encoded using the wavelet-based JPEG2000 standard, reproducing the original image data.
     * @param $data (string) Data to decode.
     * @return Decoded data string.
     * @since 1.0.000 (2011-05-23)
     * @public static
     */
    public static function decodeFilterJPXDecode($data)
    {
    }
    /**
     * Crypt (NOT IMPLEMETED - RETURN AN EXCEPTION)
     * Decrypts data encrypted by a security handler, reproducing the data as it was before encryption.
     * @param $data (string) Data to decode.
     * @return Decoded data string.
     * @since 1.0.000 (2011-05-23)
     * @public static
     */
    public static function decodeFilterCrypt($data)
    {
    }
    // --- END FILTERS SECTION -------------------------------------------------
    /**
     * Throw an exception.
     * @param $msg (string) The error message
     * @since 1.0.000 (2011-05-23)
     * @public static
     */
    public static function Error($msg)
    {
    }
}