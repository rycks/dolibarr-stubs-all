<?php

namespace PhpOffice\PhpSpreadsheet\Calculation;

class Functions
{
    const PRECISION = 8.88E-16;
    /**
     * 2 / PI.
     */
    const M_2DIVPI = 0.6366197723675814;
    /** constants */
    const COMPATIBILITY_EXCEL = 'Excel';
    const COMPATIBILITY_GNUMERIC = 'Gnumeric';
    const COMPATIBILITY_OPENOFFICE = 'OpenOfficeCalc';
    const RETURNDATE_PHP_NUMERIC = 'P';
    const RETURNDATE_PHP_OBJECT = 'O';
    const RETURNDATE_EXCEL = 'E';
    /**
     * Compatibility mode to use for error checking and responses.
     *
     * @var string
     */
    protected static $compatibilityMode = self::COMPATIBILITY_EXCEL;
    /**
     * Data Type to use when returning date values.
     *
     * @var string
     */
    protected static $returnDateType = self::RETURNDATE_EXCEL;
    /**
     * List of error codes.
     *
     * @var array
     */
    protected static $errorCodes = ['null' => '#NULL!', 'divisionbyzero' => '#DIV/0!', 'value' => '#VALUE!', 'reference' => '#REF!', 'name' => '#NAME?', 'num' => '#NUM!', 'na' => '#N/A', 'gettingdata' => '#GETTING_DATA'];
    /**
     * Set the Compatibility Mode.
     *
     * @category Function Configuration
     *
     * @param string $compatibilityMode Compatibility Mode
     *                                                Permitted values are:
     *                                                    Functions::COMPATIBILITY_EXCEL            'Excel'
     *                                                    Functions::COMPATIBILITY_GNUMERIC        'Gnumeric'
     *                                                    Functions::COMPATIBILITY_OPENOFFICE    'OpenOfficeCalc'
     *
     * @return bool (Success or Failure)
     */
    public static function setCompatibilityMode($compatibilityMode)
    {
    }
    /**
     * Return the current Compatibility Mode.
     *
     * @category Function Configuration
     *
     * @return string Compatibility Mode
     *                            Possible Return values are:
     *                                Functions::COMPATIBILITY_EXCEL            'Excel'
     *                                Functions::COMPATIBILITY_GNUMERIC        'Gnumeric'
     *                                Functions::COMPATIBILITY_OPENOFFICE    'OpenOfficeCalc'
     */
    public static function getCompatibilityMode()
    {
    }
    /**
     * Set the Return Date Format used by functions that return a date/time (Excel, PHP Serialized Numeric or PHP Object).
     *
     * @category Function Configuration
     *
     * @param string $returnDateType Return Date Format
     *                                                Permitted values are:
     *                                                    Functions::RETURNDATE_PHP_NUMERIC        'P'
     *                                                    Functions::RETURNDATE_PHP_OBJECT        'O'
     *                                                    Functions::RETURNDATE_EXCEL            'E'
     *
     * @return bool Success or failure
     */
    public static function setReturnDateType($returnDateType)
    {
    }
    /**
     * Return the current Return Date Format for functions that return a date/time (Excel, PHP Serialized Numeric or PHP Object).
     *
     * @category Function Configuration
     *
     * @return string Return Date Format
     *                            Possible Return values are:
     *                                Functions::RETURNDATE_PHP_NUMERIC        'P'
     *                                Functions::RETURNDATE_PHP_OBJECT        'O'
     *                                Functions::RETURNDATE_EXCEL            'E'
     */
    public static function getReturnDateType()
    {
    }
    /**
     * DUMMY.
     *
     * @category Error Returns
     *
     * @return string #Not Yet Implemented
     */
    public static function DUMMY()
    {
    }
    /**
     * DIV0.
     *
     * @category Error Returns
     *
     * @return string #Not Yet Implemented
     */
    public static function DIV0()
    {
    }
    /**
     * NA.
     *
     * Excel Function:
     *        =NA()
     *
     * Returns the error value #N/A
     *        #N/A is the error value that means "no value is available."
     *
     * @category Logical Functions
     *
     * @return string #N/A!
     */
    public static function NA()
    {
    }
    /**
     * NaN.
     *
     * Returns the error value #NUM!
     *
     * @category Error Returns
     *
     * @return string #NUM!
     */
    public static function NAN()
    {
    }
    /**
     * NAME.
     *
     * Returns the error value #NAME?
     *
     * @category Error Returns
     *
     * @return string #NAME?
     */
    public static function NAME()
    {
    }
    /**
     * REF.
     *
     * Returns the error value #REF!
     *
     * @category Error Returns
     *
     * @return string #REF!
     */
    public static function REF()
    {
    }
    /**
     * NULL.
     *
     * Returns the error value #NULL!
     *
     * @category Error Returns
     *
     * @return string #NULL!
     */
    public static function null()
    {
    }
    /**
     * VALUE.
     *
     * Returns the error value #VALUE!
     *
     * @category Error Returns
     *
     * @return string #VALUE!
     */
    public static function VALUE()
    {
    }
    public static function isMatrixValue($idx)
    {
    }
    public static function isValue($idx)
    {
    }
    public static function isCellValue($idx)
    {
    }
    public static function ifCondition($condition)
    {
    }
    /**
     * ERROR_TYPE.
     *
     * @param mixed $value Value to check
     *
     * @return bool
     */
    public static function errorType($value = '')
    {
    }
    /**
     * IS_BLANK.
     *
     * @param mixed $value Value to check
     *
     * @return bool
     */
    public static function isBlank($value = null)
    {
    }
    /**
     * IS_ERR.
     *
     * @param mixed $value Value to check
     *
     * @return bool
     */
    public static function isErr($value = '')
    {
    }
    /**
     * IS_ERROR.
     *
     * @param mixed $value Value to check
     *
     * @return bool
     */
    public static function isError($value = '')
    {
    }
    /**
     * IS_NA.
     *
     * @param mixed $value Value to check
     *
     * @return bool
     */
    public static function isNa($value = '')
    {
    }
    /**
     * IS_EVEN.
     *
     * @param mixed $value Value to check
     *
     * @return bool|string
     */
    public static function isEven($value = null)
    {
    }
    /**
     * IS_ODD.
     *
     * @param mixed $value Value to check
     *
     * @return bool|string
     */
    public static function isOdd($value = null)
    {
    }
    /**
     * IS_NUMBER.
     *
     * @param mixed $value Value to check
     *
     * @return bool
     */
    public static function isNumber($value = null)
    {
    }
    /**
     * IS_LOGICAL.
     *
     * @param mixed $value Value to check
     *
     * @return bool
     */
    public static function isLogical($value = null)
    {
    }
    /**
     * IS_TEXT.
     *
     * @param mixed $value Value to check
     *
     * @return bool
     */
    public static function isText($value = null)
    {
    }
    /**
     * IS_NONTEXT.
     *
     * @param mixed $value Value to check
     *
     * @return bool
     */
    public static function isNonText($value = null)
    {
    }
    /**
     * N.
     *
     * Returns a value converted to a number
     *
     * @param null|mixed $value The value you want converted
     *
     * @return number N converts values listed in the following table
     *        If value is or refers to N returns
     *        A number            That number
     *        A date                The serial number of that date
     *        TRUE                1
     *        FALSE                0
     *        An error value        The error value
     *        Anything else        0
     */
    public static function n($value = null)
    {
    }
    /**
     * TYPE.
     *
     * Returns a number that identifies the type of a value
     *
     * @param null|mixed $value The value you want tested
     *
     * @return number N converts values listed in the following table
     *        If value is or refers to N returns
     *        A number            1
     *        Text                2
     *        Logical Value        4
     *        An error value        16
     *        Array or Matrix        64
     */
    public static function TYPE($value = null)
    {
    }
    /**
     * Convert a multi-dimensional array to a simple 1-dimensional array.
     *
     * @param array $array Array to be flattened
     *
     * @return array Flattened array
     */
    public static function flattenArray($array)
    {
    }
    /**
     * Convert a multi-dimensional array to a simple 1-dimensional array, but retain an element of indexing.
     *
     * @param array $array Array to be flattened
     *
     * @return array Flattened array
     */
    public static function flattenArrayIndexed($array)
    {
    }
    /**
     * Convert an array to a single scalar value by extracting the first element.
     *
     * @param mixed $value Array or scalar value
     *
     * @return mixed
     */
    public static function flattenSingleValue($value = '')
    {
    }
    /**
     * ISFORMULA.
     *
     * @param mixed $cellReference The cell to check
     * @param Cell $pCell The current cell (containing this formula)
     *
     * @return bool|string
     */
    public static function isFormula($cellReference = '', \PhpOffice\PhpSpreadsheet\Cell\Cell $pCell = null)
    {
    }
}