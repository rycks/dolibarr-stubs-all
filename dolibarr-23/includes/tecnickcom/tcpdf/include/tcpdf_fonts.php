<?php

//============================================================+
// File name   : tcpdf_fonts.php
// Version     : 1.1.0
// Begin       : 2008-01-01
// Last Update : 2014-12-10
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
// Description :Font methods for TCPDF library.
//
//============================================================+
/**
 * @file
 * Unicode data and font methods for TCPDF library.
 * @author Nicola Asuni
 * @package com.tecnick.tcpdf
 */
/**
 * @class TCPDF_FONTS
 * Font methods for TCPDF library.
 * @package com.tecnick.tcpdf
 * @version 1.1.0
 * @author Nicola Asuni - info@tecnick.com
 */
class TCPDF_FONTS
{
    /**
     * Static cache used for speed up uniord performances
     * @protected
     */
    protected static $cache_uniord = array();
    /**
     * Convert and add the selected TrueType or Type1 font to the fonts folder (that must be writeable).
     * @param string $fontfile Font file (full path).
     * @param string $fonttype Font type. Leave empty for autodetect mode. Valid values are: TrueTypeUnicode, TrueType, Type1, CID0JP = CID-0 Japanese, CID0KR = CID-0 Korean, CID0CS = CID-0 Chinese Simplified, CID0CT = CID-0 Chinese Traditional.
     * @param string $enc Name of the encoding table to use. Leave empty for default mode. Omit this parameter for TrueType Unicode and symbolic fonts like Symbol or ZapfDingBats.
     * @param int $flags Unsigned 32-bit integer containing flags specifying various characteristics of the font (PDF32000:2008 - 9.8.2 Font Descriptor Flags): +1 for fixed font; +4 for symbol or +32 for non-symbol; +64 for italic. Fixed and Italic mode are generally autodetected so you have to set it to 32 = non-symbolic font (default) or 4 = symbolic font.
     * @param string $outpath Output path for generated font files (must be writeable by the web server). Leave empty for default font folder.
     * @param int $platid Platform ID for CMAP table to extract (when building a Unicode font for Windows this value should be 3, for Macintosh should be 1).
     * @param int $encid Encoding ID for CMAP table to extract (when building a Unicode font for Windows this value should be 1, for Macintosh should be 0). When Platform ID is 3, legal values for Encoding ID are: 0=Symbol, 1=Unicode, 2=ShiftJIS, 3=PRC, 4=Big5, 5=Wansung, 6=Johab, 7=Reserved, 8=Reserved, 9=Reserved, 10=UCS-4.
     * @param boolean $addcbbox If true includes the character bounding box information on the php font file.
     * @param boolean $link If true link to system font instead of copying the font data (not transportable) - Note: do not work with Type1 fonts.
     * @return string|false TCPDF font name or boolean false in case of error.
     * @author Nicola Asuni
     * @since 5.9.123 (2010-09-30)
     * @public static
     */
    public static function addTTFfont($fontfile, $fonttype = '', $enc = '', $flags = 32, $outpath = '', $platid = 3, $encid = 1, $addcbbox = \false, $link = \false)
    {
    }
    /**
     * Returs the checksum of a TTF table.
     * @param string $table table to check
     * @param int $length length of table in bytes
     * @return int checksum
     * @author Nicola Asuni
     * @since 5.2.000 (2010-06-02)
     * @public static
     */
    public static function _getTTFtableChecksum($table, $length)
    {
    }
    /**
     * Returns a subset of the TrueType font data without the unused glyphs.
     * @param string $font TrueType font data.
     * @param array $subsetchars Array of used characters (the glyphs to keep).
     * @return string A subset of TrueType font data without the unused glyphs.
     * @author Nicola Asuni
     * @since 5.2.000 (2010-06-02)
     * @public static
     */
    public static function _getTrueTypeFontSubset($font, $subsetchars)
    {
    }
    /**
     * Outputs font widths
     * @param array $font font data
     * @param int $cidoffset offset for CID values
     * @return string PDF command string for font widths
     * @author Nicola Asuni
     * @since 4.4.000 (2008-12-07)
     * @public static
     */
    public static function _putfontwidths($font, $cidoffset = 0)
    {
    }
    /**
     * Update the CIDToGIDMap string with a new value.
     * @param string $map CIDToGIDMap.
     * @param int $cid CID value.
     * @param int $gid GID value.
     * @return string CIDToGIDMap.
     * @author Nicola Asuni
     * @since 5.9.123 (2011-09-29)
     * @public static
     */
    public static function updateCIDtoGIDmap($map, $cid, $gid)
    {
    }
    /**
     * Return fonts path
     * @return string
     * @public static
     */
    public static function _getfontpath()
    {
    }
    /**
     * Return font full path
     * @param string $file Font file name.
     * @param string $fontdir Font directory (set to false fto search on default directories)
     * @return string Font full path or empty string
     * @author Nicola Asuni
     * @since 6.0.025
     * @public static
     */
    public static function getFontFullPath($file, $fontdir = \false)
    {
    }
    /**
     * Get a reference font size.
     * @param string $size String containing font size value.
     * @param float $refsize Reference font size in points.
     * @return float value in points
     * @public static
     */
    public static function getFontRefSize($size, $refsize = 12)
    {
    }
    // ====================================================================================================================
    // REIMPLEMENTED
    // ====================================================================================================================
    /**
     * Returns the unicode caracter specified by the value
     * @param int $c UTF-8 value
     * @param boolean $unicode True if we are in unicode mode, false otherwise.
     * @return string Returns the specified character.
     * @since 2.3.000 (2008-03-05)
     * @public static
     */
    public static function unichr($c, $unicode = \true)
    {
    }
    /**
     * Returns the unicode caracter specified by UTF-8 value
     * @param int $c UTF-8 value
     * @return string Returns the specified character.
     * @public static
     */
    public static function unichrUnicode($c)
    {
    }
    /**
     * Returns the unicode caracter specified by ASCII value
     * @param int $c UTF-8 value
     * @return string Returns the specified character.
     * @public static
     */
    public static function unichrASCII($c)
    {
    }
    /**
     * Converts array of UTF-8 characters to UTF16-BE string.<br>
     * Based on: http://www.faqs.org/rfcs/rfc2781.html
     * <pre>
     *   Encoding UTF-16:
     *
     *   Encoding of a single character from an ISO 10646 character value to
     *    UTF-16 proceeds as follows. Let U be the character number, no greater
     *    than 0x10FFFF.
     *
     *    1) If U < 0x10000, encode U as a 16-bit unsigned integer and
     *       terminate.
     *
     *    2) Let U' = U - 0x10000. Because U is less than or equal to 0x10FFFF,
     *       U' must be less than or equal to 0xFFFFF. That is, U' can be
     *       represented in 20 bits.
     *
     *    3) Initialize two 16-bit unsigned integers, W1 and W2, to 0xD800 and
     *       0xDC00, respectively. These integers each have 10 bits free to
     *       encode the character value, for a total of 20 bits.
     *
     *    4) Assign the 10 high-order bits of the 20-bit U' to the 10 low-order
     *       bits of W1 and the 10 low-order bits of U' to the 10 low-order
     *       bits of W2. Terminate.
     *
     *    Graphically, steps 2 through 4 look like:
     *    U' = yyyyyyyyyyxxxxxxxxxx
     *    W1 = 110110yyyyyyyyyy
     *    W2 = 110111xxxxxxxxxx
     * </pre>
     * @param array $unicode array containing UTF-8 unicode values
     * @param boolean $setbom if true set the Byte Order Mark (BOM = 0xFEFF)
     * @return string
     * @protected
     * @author Nicola Asuni
     * @since 2.1.000 (2008-01-08)
     * @public static
     */
    public static function arrUTF8ToUTF16BE($unicode, $setbom = \false)
    {
    }
    /**
     * Convert an array of UTF8 values to array of unicode characters
     * @param array $ta The input array of UTF8 values.
     * @param boolean $isunicode True for Unicode mode, false otherwise.
     * @return array Return array of unicode characters
     * @since 4.5.037 (2009-04-07)
     * @public static
     */
    public static function UTF8ArrayToUniArray($ta, $isunicode = \true)
    {
    }
    /**
     * Extract a slice of the $strarr array and return it as string.
     * @param string[] $strarr The input array of characters.
     * @param int $start the starting element of $strarr.
     * @param int $end first element that will not be returned.
     * @param boolean $unicode True if we are in unicode mode, false otherwise.
     * @return string Return part of a string
     * @public static
     */
    public static function UTF8ArrSubString($strarr, $start = '', $end = '', $unicode = \true)
    {
    }
    /**
     * Extract a slice of the $uniarr array and return it as string.
     * @param string[] $uniarr The input array of characters.
     * @param int $start the starting element of $strarr.
     * @param int $end first element that will not be returned.
     * @return string Return part of a string
     * @since 4.5.037 (2009-04-07)
     * @public static
     */
    public static function UniArrSubString($uniarr, $start = '', $end = '')
    {
    }
    /**
     * Converts UTF-8 characters array to array of Latin1 characters array<br>
     * @param array $unicode array containing UTF-8 unicode values
     * @return array
     * @author Nicola Asuni
     * @since 4.8.023 (2010-01-15)
     * @public static
     */
    public static function UTF8ArrToLatin1Arr($unicode)
    {
    }
    /**
     * Converts UTF-8 characters array to Latin1 string<br>
     * @param array $unicode array containing UTF-8 unicode values
     * @return string
     * @author Nicola Asuni
     * @since 4.8.023 (2010-01-15)
     * @public static
     */
    public static function UTF8ArrToLatin1($unicode)
    {
    }
    /**
     * Converts UTF-8 character to integer value.<br>
     * Uses the getUniord() method if the value is not cached.
     * @param string $uch character string to process.
     * @return int Unicode value
     * @public static
     */
    public static function uniord($uch)
    {
    }
    /**
     * Converts UTF-8 character to integer value.<br>
     * Invalid byte sequences will be replaced with 0xFFFD (replacement character)<br>
     * Based on: http://www.faqs.org/rfcs/rfc3629.html
     * <pre>
     *    Char. number range  |        UTF-8 octet sequence
     *       (hexadecimal)    |              (binary)
     *    --------------------+-----------------------------------------------
     *    0000 0000-0000 007F | 0xxxxxxx
     *    0000 0080-0000 07FF | 110xxxxx 10xxxxxx
     *    0000 0800-0000 FFFF | 1110xxxx 10xxxxxx 10xxxxxx
     *    0001 0000-0010 FFFF | 11110xxx 10xxxxxx 10xxxxxx 10xxxxxx
     *    ---------------------------------------------------------------------
     *
     *   ABFN notation:
     *   ---------------------------------------------------------------------
     *   UTF8-octets = *( UTF8-char )
     *   UTF8-char   = UTF8-1 / UTF8-2 / UTF8-3 / UTF8-4
     *   UTF8-1      = %x00-7F
     *   UTF8-2      = %xC2-DF UTF8-tail
     *
     *   UTF8-3      = %xE0 %xA0-BF UTF8-tail / %xE1-EC 2( UTF8-tail ) /
     *                 %xED %x80-9F UTF8-tail / %xEE-EF 2( UTF8-tail )
     *   UTF8-4      = %xF0 %x90-BF 2( UTF8-tail ) / %xF1-F3 3( UTF8-tail ) /
     *                 %xF4 %x80-8F 2( UTF8-tail )
     *   UTF8-tail   = %x80-BF
     *   ---------------------------------------------------------------------
     * </pre>
     * @param string $uch character string to process.
     * @return int Unicode value
     * @author Nicola Asuni
     * @public static
     */
    public static function getUniord($uch)
    {
    }
    /**
     * Converts UTF-8 strings to codepoints array.<br>
     * Invalid byte sequences will be replaced with 0xFFFD (replacement character)<br>
     * @param string $str string to process.
     * @param boolean $isunicode True when the documetn is in Unicode mode, false otherwise.
     * @param array $currentfont Reference to current font array.
     * @return array containing codepoints (UTF-8 characters values)
     * @author Nicola Asuni
     * @public static
     */
    public static function UTF8StringToArray($str, $isunicode, &$currentfont)
    {
    }
    /**
     * Converts UTF-8 strings to Latin1 when using the standard 14 core fonts.<br>
     * @param string $str string to process.
     * @param boolean $isunicode True when the documetn is in Unicode mode, false otherwise.
     * @param array $currentfont Reference to current font array.
     * @return string
     * @since 3.2.000 (2008-06-23)
     * @public static
     */
    public static function UTF8ToLatin1($str, $isunicode, &$currentfont)
    {
    }
    /**
     * Converts UTF-8 strings to UTF16-BE.<br>
     * @param string $str string to process.
     * @param boolean $setbom if true set the Byte Order Mark (BOM = 0xFEFF)
     * @param boolean $isunicode True when the documetn is in Unicode mode, false otherwise.
     * @param array $currentfont Reference to current font array.
     * @return string
     * @author Nicola Asuni
     * @since 1.53.0.TC005 (2005-01-05)
     * @public static
     */
    public static function UTF8ToUTF16BE($str, $setbom, $isunicode, &$currentfont)
    {
    }
    /**
     * Reverse the RLT substrings using the Bidirectional Algorithm (http://unicode.org/reports/tr9/).
     * @param string $str string to manipulate.
     * @param bool $setbom if true set the Byte Order Mark (BOM = 0xFEFF)
     * @param bool $forcertl if true forces RTL text direction
     * @param boolean $isunicode True if the document is in Unicode mode, false otherwise.
     * @param array $currentfont Reference to current font array.
     * @return string
     * @author Nicola Asuni
     * @since 2.1.000 (2008-01-08)
     * @public static
     */
    public static function utf8StrRev($str, $setbom, $forcertl, $isunicode, &$currentfont)
    {
    }
    /**
     * Reverse the RLT substrings array using the Bidirectional Algorithm (http://unicode.org/reports/tr9/).
     * @param array $arr array of unicode values.
     * @param string $str string to manipulate (or empty value).
     * @param bool $setbom if true set the Byte Order Mark (BOM = 0xFEFF)
     * @param bool $forcertl if true forces RTL text direction
     * @param boolean $isunicode True if the document is in Unicode mode, false otherwise.
     * @param array $currentfont Reference to current font array.
     * @return string
     * @author Nicola Asuni
     * @since 4.9.000 (2010-03-27)
     * @public static
     */
    public static function utf8StrArrRev($arr, $str, $setbom, $forcertl, $isunicode, &$currentfont)
    {
    }
    /**
     * Reverse the RLT substrings using the Bidirectional Algorithm (http://unicode.org/reports/tr9/).
     * @param array $ta array of characters composing the string.
     * @param string $str string to process
     * @param bool $forcertl if 'R' forces RTL, if 'L' forces LTR
     * @param boolean $isunicode True if the document is in Unicode mode, false otherwise.
     * @param array $currentfont Reference to current font array.
     * @return array of unicode chars
     * @author Nicola Asuni
     * @since 2.4.000 (2008-03-06)
     * @public static
     */
    public static function utf8Bidi($ta, $str, $forcertl, $isunicode, &$currentfont)
    {
    }
}