<?php

/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel_Shared
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Shared_String
 *
 * @category   PHPExcel
 * @package    PHPExcel_Shared
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Shared_String
{
    /**	Constants				*/
    /**	Regular Expressions		*/
    //	Fraction
    const STRING_REGEXP_FRACTION = '(-?)(\\d+)\\s+(\\d+\\/\\d+)';
    /**
     * Control characters array
     *
     * @var string[]
     */
    private static $_controlCharacters = array();
    /**
     * SYLK Characters array
     *
     * $var array
     */
    private static $_SYLKCharacters = array();
    /**
     * Decimal separator
     *
     * @var string
     */
    private static $_decimalSeparator;
    /**
     * Thousands separator
     *
     * @var string
     */
    private static $_thousandsSeparator;
    /**
     * Currency code
     *
     * @var string
     */
    private static $_currencyCode;
    /**
     * Is mbstring extension avalable?
     *
     * @var boolean
     */
    private static $_isMbstringEnabled;
    /**
     * Is iconv extension avalable?
     *
     * @var boolean
     */
    private static $_isIconvEnabled;
    /**
     * Build control characters array
     */
    private static function _buildControlCharacters()
    {
    }
    /**
     * Build SYLK characters array
     */
    private static function _buildSYLKCharacters()
    {
    }
    /**
     * Get whether mbstring extension is available
     *
     * @return boolean
     */
    public static function getIsMbstringEnabled()
    {
    }
    /**
     * Get whether iconv extension is available
     *
     * @return boolean
     */
    public static function getIsIconvEnabled()
    {
    }
    public static function buildCharacterSets()
    {
    }
    /**
     * Convert from OpenXML escaped control character to PHP control character
     *
     * Excel 2007 team:
     * ----------------
     * That's correct, control characters are stored directly in the shared-strings table.
     * We do encode characters that cannot be represented in XML using the following escape sequence:
     * _xHHHH_ where H represents a hexadecimal character in the character's value...
     * So you could end up with something like _x0008_ in a string (either in a cell value (<v>)
     * element or in the shared string <t> element.
     *
     * @param 	string	$value	Value to unescape
     * @return 	string
     */
    public static function ControlCharacterOOXML2PHP($value = '')
    {
    }
    /**
     * Convert from PHP control character to OpenXML escaped control character
     *
     * Excel 2007 team:
     * ----------------
     * That's correct, control characters are stored directly in the shared-strings table.
     * We do encode characters that cannot be represented in XML using the following escape sequence:
     * _xHHHH_ where H represents a hexadecimal character in the character's value...
     * So you could end up with something like _x0008_ in a string (either in a cell value (<v>)
     * element or in the shared string <t> element.
     *
     * @param 	string	$value	Value to escape
     * @return 	string
     */
    public static function ControlCharacterPHP2OOXML($value = '')
    {
    }
    /**
     * Try to sanitize UTF8, stripping invalid byte sequences. Not perfect. Does not surrogate characters.
     *
     * @param string $value
     * @return string
     */
    public static function SanitizeUTF8($value)
    {
    }
    /**
     * Check if a string contains UTF8 data
     *
     * @param string $value
     * @return boolean
     */
    public static function IsUTF8($value = '')
    {
    }
    /**
     * Formats a numeric value as a string for output in various output writers forcing
     * point as decimal separator in case locale is other than English.
     *
     * @param mixed $value
     * @return string
     */
    public static function FormatNumber($value)
    {
    }
    /**
     * Converts a UTF-8 string into BIFF8 Unicode string data (8-bit string length)
     * Writes the string using uncompressed notation, no rich text, no Asian phonetics
     * If mbstring extension is not available, ASCII is assumed, and compressed notation is used
     * although this will give wrong results for non-ASCII strings
     * see OpenOffice.org's Documentation of the Microsoft Excel File Format, sect. 2.5.3
     *
     * @param string  $value    UTF-8 encoded string
     * @param mixed[] $arrcRuns Details of rich text runs in $value
     * @return string
     */
    public static function UTF8toBIFF8UnicodeShort($value, $arrcRuns = array())
    {
    }
    /**
     * Converts a UTF-8 string into BIFF8 Unicode string data (16-bit string length)
     * Writes the string using uncompressed notation, no rich text, no Asian phonetics
     * If mbstring extension is not available, ASCII is assumed, and compressed notation is used
     * although this will give wrong results for non-ASCII strings
     * see OpenOffice.org's Documentation of the Microsoft Excel File Format, sect. 2.5.3
     *
     * @param string $value UTF-8 encoded string
     * @return string
     */
    public static function UTF8toBIFF8UnicodeLong($value)
    {
    }
    /**
     * Convert string from one encoding to another. First try mbstring, then iconv, finally strlen
     *
     * @param string $value
     * @param string $to Encoding to convert to, e.g. 'UTF-8'
     * @param string $from Encoding to convert from, e.g. 'UTF-16LE'
     * @return string
     */
    public static function ConvertEncoding($value, $to, $from)
    {
    }
    /**
     * Decode UTF-16 encoded strings.
     *
     * Can handle both BOM'ed data and un-BOM'ed data.
     * Assumes Big-Endian byte order if no BOM is available.
     * This function was taken from http://php.net/manual/en/function.utf8-decode.php
     * and $bom_be parameter added.
     *
     * @param   string  $str  UTF-16 encoded data to decode.
     * @return  string  UTF-8 / ISO encoded data.
     * @access  public
     * @version 0.2 / 2010-05-13
     * @author  Rasmus Andersson {@link http://rasmusandersson.se/}
     * @author vadik56
     */
    public static function utf16_decode($str, $bom_be = \TRUE)
    {
    }
    /**
     * Get character count. First try mbstring, then iconv, finally strlen
     *
     * @param string $value
     * @param string $enc Encoding
     * @return int Character count
     */
    public static function CountCharacters($value, $enc = 'UTF-8')
    {
    }
    /**
     * Get a substring of a UTF-8 encoded string. First try mbstring, then iconv, finally strlen
     *
     * @param string $pValue UTF-8 encoded string
     * @param int $pStart Start offset
     * @param int $pLength Maximum number of characters in substring
     * @return string
     */
    public static function Substring($pValue = '', $pStart = 0, $pLength = 0)
    {
    }
    /**
     * Convert a UTF-8 encoded string to upper case
     *
     * @param string $pValue UTF-8 encoded string
     * @return string
     */
    public static function StrToUpper($pValue = '')
    {
    }
    /**
     * Convert a UTF-8 encoded string to lower case
     *
     * @param string $pValue UTF-8 encoded string
     * @return string
     */
    public static function StrToLower($pValue = '')
    {
    }
    /**
     * Convert a UTF-8 encoded string to title/proper case
     *    (uppercase every first character in each word, lower case all other characters)
     *
     * @param string $pValue UTF-8 encoded string
     * @return string
     */
    public static function StrToTitle($pValue = '')
    {
    }
    public static function mb_is_upper($char)
    {
    }
    public static function mb_str_split($string)
    {
    }
    /**
     * Reverse the case of a string, so that all uppercase characters become lowercase
     *    and all lowercase characters become uppercase
     *
     * @param string $pValue UTF-8 encoded string
     * @return string
     */
    public static function StrCaseReverse($pValue = '')
    {
    }
    /**
     * Identify whether a string contains a fractional numeric value,
     *    and convert it to a numeric if it is
     *
     * @param string &$operand string value to test
     * @return boolean
     */
    public static function convertToNumberIfFraction(&$operand)
    {
    }
    //	function convertToNumberIfFraction()
    /**
     * Get the decimal separator. If it has not yet been set explicitly, try to obtain number
     * formatting information from locale.
     *
     * @return string
     */
    public static function getDecimalSeparator()
    {
    }
    /**
     * Set the decimal separator. Only used by PHPExcel_Style_NumberFormat::toFormattedString()
     * to format output by PHPExcel_Writer_HTML and PHPExcel_Writer_PDF
     *
     * @param string $pValue Character for decimal separator
     */
    public static function setDecimalSeparator($pValue = '.')
    {
    }
    /**
     * Get the thousands separator. If it has not yet been set explicitly, try to obtain number
     * formatting information from locale.
     *
     * @return string
     */
    public static function getThousandsSeparator()
    {
    }
    /**
     * Set the thousands separator. Only used by PHPExcel_Style_NumberFormat::toFormattedString()
     * to format output by PHPExcel_Writer_HTML and PHPExcel_Writer_PDF
     *
     * @param string $pValue Character for thousands separator
     */
    public static function setThousandsSeparator($pValue = ',')
    {
    }
    /**
     *	Get the currency code. If it has not yet been set explicitly, try to obtain the
     *		symbol information from locale.
     *
     * @return string
     */
    public static function getCurrencyCode()
    {
    }
    /**
     * Set the currency code. Only used by PHPExcel_Style_NumberFormat::toFormattedString()
     *		to format output by PHPExcel_Writer_HTML and PHPExcel_Writer_PDF
     *
     * @param string $pValue Character for currency code
     */
    public static function setCurrencyCode($pValue = '$')
    {
    }
    /**
     * Convert SYLK encoded string to UTF-8
     *
     * @param string $pValue
     * @return string UTF-8 encoded string
     */
    public static function SYLKtoUTF8($pValue = '')
    {
    }
    /**
     * Retrieve any leading numeric part of a string, or return the full string if no leading numeric
     *	(handles basic integer or float, but not exponent or non decimal)
     *
     * @param	string	$value
     * @return	mixed	string or only the leading numeric part of the string
     */
    public static function testStringAsNumeric($value)
    {
    }
}