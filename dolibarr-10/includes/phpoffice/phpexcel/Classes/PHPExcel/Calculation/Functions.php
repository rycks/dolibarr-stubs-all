<?php

/**
 * PHPExcel_Calculation_Functions
 *
 * @category	PHPExcel
 * @package		PHPExcel_Calculation
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Calculation_Functions
{
    /** constants */
    const COMPATIBILITY_EXCEL = 'Excel';
    const COMPATIBILITY_GNUMERIC = 'Gnumeric';
    const COMPATIBILITY_OPENOFFICE = 'OpenOfficeCalc';
    const RETURNDATE_PHP_NUMERIC = 'P';
    const RETURNDATE_PHP_OBJECT = 'O';
    const RETURNDATE_EXCEL = 'E';
    /**
     * Compatibility mode to use for error checking and responses
     *
     * @access	private
     * @var string
     */
    protected static $compatibilityMode = self::COMPATIBILITY_EXCEL;
    /**
     * Data Type to use when returning date values
     *
     * @access	private
     * @var string
     */
    protected static $ReturnDateType = self::RETURNDATE_EXCEL;
    /**
     * List of error codes
     *
     * @access	private
     * @var array
     */
    protected static $_errorCodes = array('null' => '#NULL!', 'divisionbyzero' => '#DIV/0!', 'value' => '#VALUE!', 'reference' => '#REF!', 'name' => '#NAME?', 'num' => '#NUM!', 'na' => '#N/A', 'gettingdata' => '#GETTING_DATA');
    /**
     * Set the Compatibility Mode
     *
     * @access	public
     * @category Function Configuration
     * @param	 string		$compatibilityMode		Compatibility Mode
     *												Permitted values are:
     *													PHPExcel_Calculation_Functions::COMPATIBILITY_EXCEL			'Excel'
     *													PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC		'Gnumeric'
     *													PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE	'OpenOfficeCalc'
     * @return	 boolean	(Success or Failure)
     */
    public static function setCompatibilityMode($compatibilityMode)
    {
    }
    //	function setCompatibilityMode()
    /**
     * Return the current Compatibility Mode
     *
     * @access	public
     * @category Function Configuration
     * @return	 string		Compatibility Mode
     *							Possible Return values are:
     *								PHPExcel_Calculation_Functions::COMPATIBILITY_EXCEL			'Excel'
     *								PHPExcel_Calculation_Functions::COMPATIBILITY_GNUMERIC		'Gnumeric'
     *								PHPExcel_Calculation_Functions::COMPATIBILITY_OPENOFFICE	'OpenOfficeCalc'
     */
    public static function getCompatibilityMode()
    {
    }
    //	function getCompatibilityMode()
    /**
     * Set the Return Date Format used by functions that return a date/time (Excel, PHP Serialized Numeric or PHP Object)
     *
     * @access	public
     * @category Function Configuration
     * @param	 string	$returnDateType			Return Date Format
     *												Permitted values are:
     *													PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC		'P'
     *													PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT		'O'
     *													PHPExcel_Calculation_Functions::RETURNDATE_EXCEL			'E'
     * @return	 boolean							Success or failure
     */
    public static function setReturnDateType($returnDateType)
    {
    }
    //	function setReturnDateType()
    /**
     * Return the current Return Date Format for functions that return a date/time (Excel, PHP Serialized Numeric or PHP Object)
     *
     * @access	public
     * @category Function Configuration
     * @return	 string		Return Date Format
     *							Possible Return values are:
     *								PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC		'P'
     *								PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT		'O'
     *								PHPExcel_Calculation_Functions::RETURNDATE_EXCEL			'E'
     */
    public static function getReturnDateType()
    {
    }
    //	function getReturnDateType()
    /**
     * DUMMY
     *
     * @access	public
     * @category Error Returns
     * @return	string	#Not Yet Implemented
     */
    public static function DUMMY()
    {
    }
    //	function DUMMY()
    /**
     * DIV0
     *
     * @access	public
     * @category Error Returns
     * @return	string	#Not Yet Implemented
     */
    public static function DIV0()
    {
    }
    //	function DIV0()
    /**
     * NA
     *
     * Excel Function:
     *		=NA()
     *
     * Returns the error value #N/A
     *		#N/A is the error value that means "no value is available."
     *
     * @access	public
     * @category Logical Functions
     * @return	string	#N/A!
     */
    public static function NA()
    {
    }
    //	function NA()
    /**
     * NaN
     *
     * Returns the error value #NUM!
     *
     * @access	public
     * @category Error Returns
     * @return	string	#NUM!
     */
    public static function NaN()
    {
    }
    //	function NaN()
    /**
     * NAME
     *
     * Returns the error value #NAME?
     *
     * @access	public
     * @category Error Returns
     * @return	string	#NAME?
     */
    public static function NAME()
    {
    }
    //	function NAME()
    /**
     * REF
     *
     * Returns the error value #REF!
     *
     * @access	public
     * @category Error Returns
     * @return	string	#REF!
     */
    public static function REF()
    {
    }
    //	function REF()
    /**
     * NULL
     *
     * Returns the error value #NULL!
     *
     * @access	public
     * @category Error Returns
     * @return	string	#NULL!
     */
    public static function NULL()
    {
    }
    //	function NULL()
    /**
     * VALUE
     *
     * Returns the error value #VALUE!
     *
     * @access	public
     * @category Error Returns
     * @return	string	#VALUE!
     */
    public static function VALUE()
    {
    }
    //	function VALUE()
    public static function isMatrixValue($idx)
    {
    }
    public static function isValue($idx)
    {
    }
    public static function isCellValue($idx)
    {
    }
    public static function _ifCondition($condition)
    {
    }
    //	function _ifCondition()
    /**
     * ERROR_TYPE
     *
     * @param	mixed	$value	Value to check
     * @return	boolean
     */
    public static function ERROR_TYPE($value = '')
    {
    }
    //	function ERROR_TYPE()
    /**
     * IS_BLANK
     *
     * @param	mixed	$value	Value to check
     * @return	boolean
     */
    public static function IS_BLANK($value = \NULL)
    {
    }
    //	function IS_BLANK()
    /**
     * IS_ERR
     *
     * @param	mixed	$value	Value to check
     * @return	boolean
     */
    public static function IS_ERR($value = '')
    {
    }
    //	function IS_ERR()
    /**
     * IS_ERROR
     *
     * @param	mixed	$value	Value to check
     * @return	boolean
     */
    public static function IS_ERROR($value = '')
    {
    }
    //	function IS_ERROR()
    /**
     * IS_NA
     *
     * @param	mixed	$value	Value to check
     * @return	boolean
     */
    public static function IS_NA($value = '')
    {
    }
    //	function IS_NA()
    /**
     * IS_EVEN
     *
     * @param	mixed	$value	Value to check
     * @return	boolean
     */
    public static function IS_EVEN($value = \NULL)
    {
    }
    //	function IS_EVEN()
    /**
     * IS_ODD
     *
     * @param	mixed	$value	Value to check
     * @return	boolean
     */
    public static function IS_ODD($value = \NULL)
    {
    }
    //	function IS_ODD()
    /**
     * IS_NUMBER
     *
     * @param	mixed	$value		Value to check
     * @return	boolean
     */
    public static function IS_NUMBER($value = \NULL)
    {
    }
    //	function IS_NUMBER()
    /**
     * IS_LOGICAL
     *
     * @param	mixed	$value		Value to check
     * @return	boolean
     */
    public static function IS_LOGICAL($value = \NULL)
    {
    }
    //	function IS_LOGICAL()
    /**
     * IS_TEXT
     *
     * @param	mixed	$value		Value to check
     * @return	boolean
     */
    public static function IS_TEXT($value = \NULL)
    {
    }
    //	function IS_TEXT()
    /**
     * IS_NONTEXT
     *
     * @param	mixed	$value		Value to check
     * @return	boolean
     */
    public static function IS_NONTEXT($value = \NULL)
    {
    }
    //	function IS_NONTEXT()
    /**
     * VERSION
     *
     * @return	string	Version information
     */
    public static function VERSION()
    {
    }
    //	function VERSION()
    /**
     * N
     *
     * Returns a value converted to a number
     *
     * @param	value		The value you want converted
     * @return	number		N converts values listed in the following table
     *		If value is or refers to N returns
     *		A number			That number
     *		A date				The serial number of that date
     *		TRUE				1
     *		FALSE				0
     *		An error value		The error value
     *		Anything else		0
     */
    public static function N($value = \NULL)
    {
    }
    //	function N()
    /**
     * TYPE
     *
     * Returns a number that identifies the type of a value
     *
     * @param	value		The value you want tested
     * @return	number		N converts values listed in the following table
     *		If value is or refers to N returns
     *		A number			1
     *		Text				2
     *		Logical Value		4
     *		An error value		16
     *		Array or Matrix		64
     */
    public static function TYPE($value = \NULL)
    {
    }
    //	function TYPE()
    /**
     * Convert a multi-dimensional array to a simple 1-dimensional array
     *
     * @param	array	$array	Array to be flattened
     * @return	array	Flattened array
     */
    public static function flattenArray($array)
    {
    }
    //	function flattenArray()
    /**
     * Convert a multi-dimensional array to a simple 1-dimensional array, but retain an element of indexing
     *
     * @param	array	$array	Array to be flattened
     * @return	array	Flattened array
     */
    public static function flattenArrayIndexed($array)
    {
    }
    //	function flattenArrayIndexed()
    /**
     * Convert an array to a single scalar value by extracting the first element
     *
     * @param	mixed		$value		Array or scalar value
     * @return	mixed
     */
    public static function flattenSingleValue($value = '')
    {
    }
    //	function flattenSingleValue()
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');
/** MAX_VALUE */
\define('MAX_VALUE', 1.2E+308);
/** 2 / PI */
\define('M_2DIVPI', 0.6366197723675814);
/** MAX_ITERATIONS */
\define('MAX_ITERATIONS', 256);
/** PRECISION */
\define('PRECISION', 8.88E-16);
function mb_str_replace($search, $replace, $subject)
{
}