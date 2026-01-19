<?php

namespace PhpOffice\PhpSpreadsheet\Calculation;

class TextData
{
    private static $invalidChars;
    private static function unicodeToOrd($character)
    {
    }
    /**
     * CHARACTER.
     *
     * @param string $character Value
     *
     * @return string
     */
    public static function CHARACTER($character)
    {
    }
    /**
     * TRIMNONPRINTABLE.
     *
     * @param mixed $stringValue Value to check
     *
     * @return string
     */
    public static function TRIMNONPRINTABLE($stringValue = '')
    {
    }
    /**
     * TRIMSPACES.
     *
     * @param mixed $stringValue Value to check
     *
     * @return string
     */
    public static function TRIMSPACES($stringValue = '')
    {
    }
    /**
     * ASCIICODE.
     *
     * @param string $characters Value
     *
     * @return int
     */
    public static function ASCIICODE($characters)
    {
    }
    /**
     * CONCATENATE.
     *
     * @return string
     */
    public static function CONCATENATE(...$args)
    {
    }
    /**
     * DOLLAR.
     *
     * This function converts a number to text using currency format, with the decimals rounded to the specified place.
     * The format used is $#,##0.00_);($#,##0.00)..
     *
     * @param float $value The value to format
     * @param int $decimals The number of digits to display to the right of the decimal point.
     *                                    If decimals is negative, number is rounded to the left of the decimal point.
     *                                    If you omit decimals, it is assumed to be 2
     *
     * @return string
     */
    public static function DOLLAR($value = 0, $decimals = 2)
    {
    }
    /**
     * SEARCHSENSITIVE.
     *
     * @param string $needle The string to look for
     * @param string $haystack The string in which to look
     * @param int $offset Offset within $haystack
     *
     * @return string
     */
    public static function SEARCHSENSITIVE($needle, $haystack, $offset = 1)
    {
    }
    /**
     * SEARCHINSENSITIVE.
     *
     * @param string $needle The string to look for
     * @param string $haystack The string in which to look
     * @param int $offset Offset within $haystack
     *
     * @return string
     */
    public static function SEARCHINSENSITIVE($needle, $haystack, $offset = 1)
    {
    }
    /**
     * FIXEDFORMAT.
     *
     * @param mixed $value Value to check
     * @param int $decimals
     * @param bool $no_commas
     *
     * @return string
     */
    public static function FIXEDFORMAT($value, $decimals = 2, $no_commas = false)
    {
    }
    /**
     * LEFT.
     *
     * @param string $value Value
     * @param int $chars Number of characters
     *
     * @return string
     */
    public static function LEFT($value = '', $chars = 1)
    {
    }
    /**
     * MID.
     *
     * @param string $value Value
     * @param int $start Start character
     * @param int $chars Number of characters
     *
     * @return string
     */
    public static function MID($value = '', $start = 1, $chars = null)
    {
    }
    /**
     * RIGHT.
     *
     * @param string $value Value
     * @param int $chars Number of characters
     *
     * @return string
     */
    public static function RIGHT($value = '', $chars = 1)
    {
    }
    /**
     * STRINGLENGTH.
     *
     * @param string $value Value
     *
     * @return int
     */
    public static function STRINGLENGTH($value = '')
    {
    }
    /**
     * LOWERCASE.
     *
     * Converts a string value to upper case.
     *
     * @param string $mixedCaseString
     *
     * @return string
     */
    public static function LOWERCASE($mixedCaseString)
    {
    }
    /**
     * UPPERCASE.
     *
     * Converts a string value to upper case.
     *
     * @param string $mixedCaseString
     *
     * @return string
     */
    public static function UPPERCASE($mixedCaseString)
    {
    }
    /**
     * PROPERCASE.
     *
     * Converts a string value to upper case.
     *
     * @param string $mixedCaseString
     *
     * @return string
     */
    public static function PROPERCASE($mixedCaseString)
    {
    }
    /**
     * REPLACE.
     *
     * @param string $oldText String to modify
     * @param int $start Start character
     * @param int $chars Number of characters
     * @param string $newText String to replace in defined position
     *
     * @return string
     */
    public static function REPLACE($oldText, $start, $chars, $newText)
    {
    }
    /**
     * SUBSTITUTE.
     *
     * @param string $text Value
     * @param string $fromText From Value
     * @param string $toText To Value
     * @param int $instance Instance Number
     *
     * @return string
     */
    public static function SUBSTITUTE($text = '', $fromText = '', $toText = '', $instance = 0)
    {
    }
    /**
     * RETURNSTRING.
     *
     * @param mixed $testValue Value to check
     *
     * @return null|string
     */
    public static function RETURNSTRING($testValue = '')
    {
    }
    /**
     * TEXTFORMAT.
     *
     * @param mixed $value Value to check
     * @param string $format Format mask to use
     *
     * @return string
     */
    public static function TEXTFORMAT($value, $format)
    {
    }
    /**
     * VALUE.
     *
     * @param mixed $value Value to check
     *
     * @return bool
     */
    public static function VALUE($value = '')
    {
    }
    /**
     * NUMBERVALUE.
     *
     * @param mixed $value Value to check
     * @param string $decimalSeparator decimal separator, defaults to locale defined value
     * @param string $groupSeparator group/thosands separator, defaults to locale defined value
     *
     * @return float|string
     */
    public static function NUMBERVALUE($value = '', $decimalSeparator = null, $groupSeparator = null)
    {
    }
    /**
     * Compares two text strings and returns TRUE if they are exactly the same, FALSE otherwise.
     * EXACT is case-sensitive but ignores formatting differences.
     * Use EXACT to test text being entered into a document.
     *
     * @param $value1
     * @param $value2
     *
     * @return bool
     */
    public static function EXACT($value1, $value2)
    {
    }
    /**
     * TEXTJOIN.
     *
     * @param mixed $delimiter
     * @param mixed $ignoreEmpty
     * @param mixed $args
     *
     * @return string
     */
    public static function TEXTJOIN($delimiter, $ignoreEmpty, ...$args)
    {
    }
}