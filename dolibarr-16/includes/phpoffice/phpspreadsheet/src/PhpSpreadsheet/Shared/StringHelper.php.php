<?php

namespace PhpOffice\PhpSpreadsheet\Shared;

class StringHelper
{
    /**    Constants                */
    /**    Regular Expressions        */
    //    Fraction
    const STRING_REGEXP_FRACTION = '(-?)(\\d+)\\s+(\\d+\\/\\d+)';
    /**
     * Control characters array.
     *
     * @var string[]
     */
    private static $controlCharacters = [];
    /**
     * SYLK Characters array.
     *
     * @var array
     */
    private static $SYLKCharacters = [];
    /**
     * Decimal separator.
     *
     * @var string
     */
    private static $decimalSeparator;
    /**
     * Thousands separator.
     *
     * @var string
     */
    private static $thousandsSeparator;
    /**
     * Currency code.
     *
     * @var string
     */
    private static $currencyCode;
    /**
     * Is iconv extension avalable?
     *
     * @var bool
     */
    private static $isIconvEnabled;
    /**
     * iconv options.
     *
     * @var string
     */
    private static $iconvOptions = '//IGNORE//TRANSLIT';
    /**
     * Build control characters array.
     */
    private static function buildControlCharacters()
    {
    }
    /**
     * Build SYLK characters array.
     */
    private static function buildSYLKCharacters()
    {
    }
    /**
     * Get whether iconv extension is available.
     *
     * @return bool
     */
    public static function getIsIconvEnabled()
    {
    }
    private static function buildCharacterSets()
    {
    }
    /**
     * Convert from OpenXML escaped control character to PHP control character.
     *
     * Excel 2007 team:
     * ----------------
     * That's correct, control characters are stored directly in the shared-strings table.
     * We do encode characters that cannot be represented in XML using the following escape sequence:
     * _xHHHH_ where H represents a hexadecimal character in the character's value...
     * So you could end up with something like _x0008_ in a string (either in a cell value (<v>)
     * element or in the shared string <t> element.
     *
     * @param string $value Value to unescape
     *
     * @return string
     */
    public static function controlCharacterOOXML2PHP($value)
    {
    }
    /**
     * Convert from PHP control character to OpenXML escaped control character.
     *
     * Excel 2007 team:
     * ----------------
     * That's correct, control characters are stored directly in the shared-strings table.
     * We do encode characters that cannot be represented in XML using the following escape sequence:
     * _xHHHH_ where H represents a hexadecimal character in the character's value...
     * So you could end up with something like _x0008_ in a string (either in a cell value (<v>)
     * element or in the shared string <t> element.
     *
     * @param string $value Value to escape
     *
     * @return string
     */
    public static function controlCharacterPHP2OOXML($value)
    {
    }
    /**
     * Try to sanitize UTF8, stripping invalid byte sequences. Not perfect. Does not surrogate characters.
     *
     * @param string $value
     *
     * @return string
     */
    public static function sanitizeUTF8($value)
    {
    }
    /**
     * Check if a string contains UTF8 data.
     *
     * @param string $value
     *
     * @return bool
     */
    public static function isUTF8($value)
    {
    }
    /**
     * Formats a numeric value as a string for output in various output writers forcing
     * point as decimal separator in case locale is other than English.
     *
     * @param mixed $value
     *
     * @return string
     */
    public static function formatNumber($value)
    {
    }
    /**
     * Converts a UTF-8 string into BIFF8 Unicode string data (8-bit string length)
     * Writes the string using uncompressed notation, no rich text, no Asian phonetics
     * If mbstring extension is not available, ASCII is assumed, and compressed notation is used
     * although this will give wrong results for non-ASCII strings
     * see OpenOffice.org's Documentation of the Microsoft Excel File Format, sect. 2.5.3.
     *
     * @param string $value UTF-8 encoded string
     * @param mixed[] $arrcRuns Details of rich text runs in $value
     *
     * @return string
     */
    public static function UTF8toBIFF8UnicodeShort($value, $arrcRuns = [])
    {
    }
    /**
     * Converts a UTF-8 string into BIFF8 Unicode string data (16-bit string length)
     * Writes the string using uncompressed notation, no rich text, no Asian phonetics
     * If mbstring extension is not available, ASCII is assumed, and compressed notation is used
     * although this will give wrong results for non-ASCII strings
     * see OpenOffice.org's Documentation of the Microsoft Excel File Format, sect. 2.5.3.
     *
     * @param string $value UTF-8 encoded string
     *
     * @return string
     */
    public static function UTF8toBIFF8UnicodeLong($value)
    {
    }
    /**
     * Convert string from one encoding to another.
     *
     * @param string $value
     * @param string $to Encoding to convert to, e.g. 'UTF-8'
     * @param string $from Encoding to convert from, e.g. 'UTF-16LE'
     *
     * @return string
     */
    public static function convertEncoding($value, $to, $from)
    {
    }
    /**
     * Get character count.
     *
     * @param string $value
     * @param string $enc Encoding
     *
     * @return int Character count
     */
    public static function countCharacters($value, $enc = 'UTF-8')
    {
    }
    /**
     * Get a substring of a UTF-8 encoded string.
     *
     * @param string $pValue UTF-8 encoded string
     * @param int $pStart Start offset
     * @param int $pLength Maximum number of characters in substring
     *
     * @return string
     */
    public static function substring($pValue, $pStart, $pLength = 0)
    {
    }
    /**
     * Convert a UTF-8 encoded string to upper case.
     *
     * @param string $pValue UTF-8 encoded string
     *
     * @return string
     */
    public static function strToUpper($pValue)
    {
    }
    /**
     * Convert a UTF-8 encoded string to lower case.
     *
     * @param string $pValue UTF-8 encoded string
     *
     * @return string
     */
    public static function strToLower($pValue)
    {
    }
    /**
     * Convert a UTF-8 encoded string to title/proper case
     * (uppercase every first character in each word, lower case all other characters).
     *
     * @param string $pValue UTF-8 encoded string
     *
     * @return string
     */
    public static function strToTitle($pValue)
    {
    }
    public static function mbIsUpper($char)
    {
    }
    public static function mbStrSplit($string)
    {
    }
    /**
     * Reverse the case of a string, so that all uppercase characters become lowercase
     * and all lowercase characters become uppercase.
     *
     * @param string $pValue UTF-8 encoded string
     *
     * @return string
     */
    public static function strCaseReverse($pValue)
    {
    }
    /**
     * Identify whether a string contains a fractional numeric value,
     * and convert it to a numeric if it is.
     *
     * @param string &$operand string value to test
     *
     * @return bool
     */
    public static function convertToNumberIfFraction(&$operand)
    {
    }
    //    function convertToNumberIfFraction()
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
     * Set the decimal separator. Only used by NumberFormat::toFormattedString()
     * to format output by \PhpOffice\PhpSpreadsheet\Writer\Html and \PhpOffice\PhpSpreadsheet\Writer\Pdf.
     *
     * @param string $pValue Character for decimal separator
     */
    public static function setDecimalSeparator($pValue)
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
     * Set the thousands separator. Only used by NumberFormat::toFormattedString()
     * to format output by \PhpOffice\PhpSpreadsheet\Writer\Html and \PhpOffice\PhpSpreadsheet\Writer\Pdf.
     *
     * @param string $pValue Character for thousands separator
     */
    public static function setThousandsSeparator($pValue)
    {
    }
    /**
     *    Get the currency code. If it has not yet been set explicitly, try to obtain the
     *        symbol information from locale.
     *
     * @return string
     */
    public static function getCurrencyCode()
    {
    }
    /**
     * Set the currency code. Only used by NumberFormat::toFormattedString()
     *        to format output by \PhpOffice\PhpSpreadsheet\Writer\Html and \PhpOffice\PhpSpreadsheet\Writer\Pdf.
     *
     * @param string $pValue Character for currency code
     */
    public static function setCurrencyCode($pValue)
    {
    }
    /**
     * Convert SYLK encoded string to UTF-8.
     *
     * @param string $pValue
     *
     * @return string UTF-8 encoded string
     */
    public static function SYLKtoUTF8($pValue)
    {
    }
    /**
     * Retrieve any leading numeric part of a string, or return the full string if no leading numeric
     * (handles basic integer or float, but not exponent or non decimal).
     *
     * @param string $value
     *
     * @return mixed string or only the leading numeric part of the string
     */
    public static function testStringAsNumeric($value)
    {
    }
}