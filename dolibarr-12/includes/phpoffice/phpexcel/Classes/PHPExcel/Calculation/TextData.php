<?php

/**
 * PHPExcel_Calculation_TextData
 *
 * @category	PHPExcel
 * @package		PHPExcel_Calculation
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Calculation_TextData
{
    private static $_invalidChars = \Null;
    private static function _uniord($c)
    {
    }
    //	function _uniord()
    /**
     * CHARACTER
     *
     * @param	string	$character	Value
     * @return	int
     */
    public static function CHARACTER($character)
    {
    }
    /**
     * TRIMNONPRINTABLE
     *
     * @param	mixed	$stringValue	Value to check
     * @return	string
     */
    public static function TRIMNONPRINTABLE($stringValue = '')
    {
    }
    //	function TRIMNONPRINTABLE()
    /**
     * TRIMSPACES
     *
     * @param	mixed	$stringValue	Value to check
     * @return	string
     */
    public static function TRIMSPACES($stringValue = '')
    {
    }
    //	function TRIMSPACES()
    /**
     * ASCIICODE
     *
     * @param	string	$characters		Value
     * @return	int
     */
    public static function ASCIICODE($characters)
    {
    }
    //	function ASCIICODE()
    /**
     * CONCATENATE
     *
     * @return	string
     */
    public static function CONCATENATE()
    {
    }
    //	function CONCATENATE()
    /**
     * DOLLAR
     *
     * This function converts a number to text using currency format, with the decimals rounded to the specified place.
     * The format used is $#,##0.00_);($#,##0.00)..
     *
     * @param	float	$value			The value to format
     * @param	int		$decimals		The number of digits to display to the right of the decimal point.
     *									If decimals is negative, number is rounded to the left of the decimal point.
     *									If you omit decimals, it is assumed to be 2
     * @return	string
     */
    public static function DOLLAR($value = 0, $decimals = 2)
    {
    }
    //	function DOLLAR()
    /**
     * SEARCHSENSITIVE
     *
     * @param	string	$needle		The string to look for
     * @param	string	$haystack	The string in which to look
     * @param	int		$offset		Offset within $haystack
     * @return	string
     */
    public static function SEARCHSENSITIVE($needle, $haystack, $offset = 1)
    {
    }
    //	function SEARCHSENSITIVE()
    /**
     * SEARCHINSENSITIVE
     *
     * @param	string	$needle		The string to look for
     * @param	string	$haystack	The string in which to look
     * @param	int		$offset		Offset within $haystack
     * @return	string
     */
    public static function SEARCHINSENSITIVE($needle, $haystack, $offset = 1)
    {
    }
    //	function SEARCHINSENSITIVE()
    /**
     * FIXEDFORMAT
     *
     * @param	mixed		$value	Value to check
     * @param	integer		$decimals
     * @param	boolean		$no_commas
     * @return	boolean
     */
    public static function FIXEDFORMAT($value, $decimals = 2, $no_commas = \FALSE)
    {
    }
    //	function FIXEDFORMAT()
    /**
     * LEFT
     *
     * @param	string	$value	Value
     * @param	int		$chars	Number of characters
     * @return	string
     */
    public static function LEFT($value = '', $chars = 1)
    {
    }
    //	function LEFT()
    /**
     * MID
     *
     * @param	string	$value	Value
     * @param	int		$start	Start character
     * @param	int		$chars	Number of characters
     * @return	string
     */
    public static function MID($value = '', $start = 1, $chars = \null)
    {
    }
    //	function MID()
    /**
     * RIGHT
     *
     * @param	string	$value	Value
     * @param	int		$chars	Number of characters
     * @return	string
     */
    public static function RIGHT($value = '', $chars = 1)
    {
    }
    //	function RIGHT()
    /**
     * STRINGLENGTH
     *
     * @param	string	$value	Value
     * @return	string
     */
    public static function STRINGLENGTH($value = '')
    {
    }
    //	function STRINGLENGTH()
    /**
     * LOWERCASE
     *
     * Converts a string value to upper case.
     *
     * @param	string		$mixedCaseString
     * @return	string
     */
    public static function LOWERCASE($mixedCaseString)
    {
    }
    //	function LOWERCASE()
    /**
     * UPPERCASE
     *
     * Converts a string value to upper case.
     *
     * @param	string		$mixedCaseString
     * @return	string
     */
    public static function UPPERCASE($mixedCaseString)
    {
    }
    //	function UPPERCASE()
    /**
     * PROPERCASE
     *
     * Converts a string value to upper case.
     *
     * @param	string		$mixedCaseString
     * @return	string
     */
    public static function PROPERCASE($mixedCaseString)
    {
    }
    //	function PROPERCASE()
    /**
     * REPLACE
     *
     * @param	string	$oldText	String to modify
     * @param	int		$start		Start character
     * @param	int		$chars		Number of characters
     * @param	string	$newText	String to replace in defined position 
     * @return	string
     */
    public static function REPLACE($oldText = '', $start = 1, $chars = \null, $newText)
    {
    }
    //	function REPLACE()
    /**
     * SUBSTITUTE
     *
     * @param	string	$text		Value
     * @param	string	$fromText	From Value
     * @param	string	$toText		To Value
     * @param	integer	$instance	Instance Number
     * @return	string
     */
    public static function SUBSTITUTE($text = '', $fromText = '', $toText = '', $instance = 0)
    {
    }
    //	function SUBSTITUTE()
    /**
     * RETURNSTRING
     *
     * @param	mixed	$testValue	Value to check
     * @return	boolean
     */
    public static function RETURNSTRING($testValue = '')
    {
    }
    //	function RETURNSTRING()
    /**
     * TEXTFORMAT
     *
     * @param	mixed	$value	Value to check
     * @param	string	$format	Format mask to use
     * @return	boolean
     */
    public static function TEXTFORMAT($value, $format)
    {
    }
    //	function TEXTFORMAT()
    /**
     * VALUE
     *
     * @param	mixed	$value	Value to check
     * @return	boolean
     */
    public static function VALUE($value = '')
    {
    }
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');