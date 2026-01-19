<?php

/**
 * PHPExcel_Calculation_MathTrig
 *
 * @category	PHPExcel
 * @package		PHPExcel_Calculation
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Calculation_MathTrig
{
    //
    //	Private method to return an array of the factors of the input value
    //
    private static function _factors($value)
    {
    }
    //	function _factors()
    private static function _romanCut($num, $n)
    {
    }
    //	function _romanCut()
    /**
     * ATAN2
     *
     * This function calculates the arc tangent of the two variables x and y. It is similar to
     *		calculating the arc tangent of y ÷ x, except that the signs of both arguments are used
     *		to determine the quadrant of the result.
     * The arctangent is the angle from the x-axis to a line containing the origin (0, 0) and a
     *		point with coordinates (xCoordinate, yCoordinate). The angle is given in radians between
     *		-pi and pi, excluding -pi.
     *
     * Note that the Excel ATAN2() function accepts its arguments in the reverse order to the standard
     *		PHP atan2() function, so we need to reverse them here before calling the PHP atan() function.
     *
     * Excel Function:
     *		ATAN2(xCoordinate,yCoordinate)
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	float	$xCoordinate		The x-coordinate of the point.
     * @param	float	$yCoordinate		The y-coordinate of the point.
     * @return	float	The inverse tangent of the specified x- and y-coordinates.
     */
    public static function ATAN2($xCoordinate = \NULL, $yCoordinate = \NULL)
    {
    }
    //	function ATAN2()
    /**
     * CEILING
     *
     * Returns number rounded up, away from zero, to the nearest multiple of significance.
     *		For example, if you want to avoid using pennies in your prices and your product is
     *		priced at $4.42, use the formula =CEILING(4.42,0.05) to round prices up to the
     *		nearest nickel.
     *
     * Excel Function:
     *		CEILING(number[,significance])
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	float	$number			The number you want to round.
     * @param	float	$significance	The multiple to which you want to round.
     * @return	float	Rounded Number
     */
    public static function CEILING($number, $significance = \NULL)
    {
    }
    //	function CEILING()
    /**
     * COMBIN
     *
     * Returns the number of combinations for a given number of items. Use COMBIN to
     *		determine the total possible number of groups for a given number of items.
     *
     * Excel Function:
     *		COMBIN(numObjs,numInSet)
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	int		$numObjs	Number of different objects
     * @param	int		$numInSet	Number of objects in each combination
     * @return	int		Number of combinations
     */
    public static function COMBIN($numObjs, $numInSet)
    {
    }
    //	function COMBIN()
    /**
     * EVEN
     *
     * Returns number rounded up to the nearest even integer.
     * You can use this function for processing items that come in twos. For example,
     *		a packing crate accepts rows of one or two items. The crate is full when
     *		the number of items, rounded up to the nearest two, matches the crate's
     *		capacity.
     *
     * Excel Function:
     *		EVEN(number)
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	float	$number			Number to round
     * @return	int		Rounded Number
     */
    public static function EVEN($number)
    {
    }
    //	function EVEN()
    /**
     * FACT
     *
     * Returns the factorial of a number.
     * The factorial of a number is equal to 1*2*3*...* number.
     *
     * Excel Function:
     *		FACT(factVal)
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	float	$factVal	Factorial Value
     * @return	int		Factorial
     */
    public static function FACT($factVal)
    {
    }
    //	function FACT()
    /**
     * FACTDOUBLE
     *
     * Returns the double factorial of a number.
     *
     * Excel Function:
     *		FACTDOUBLE(factVal)
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	float	$factVal	Factorial Value
     * @return	int		Double Factorial
     */
    public static function FACTDOUBLE($factVal)
    {
    }
    //	function FACTDOUBLE()
    /**
     * FLOOR
     *
     * Rounds number down, toward zero, to the nearest multiple of significance.
     *
     * Excel Function:
     *		FLOOR(number[,significance])
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	float	$number			Number to round
     * @param	float	$significance	Significance
     * @return	float	Rounded Number
     */
    public static function FLOOR($number, $significance = \NULL)
    {
    }
    //	function FLOOR()
    /**
     * GCD
     *
     * Returns the greatest common divisor of a series of numbers.
     * The greatest common divisor is the largest integer that divides both
     *		number1 and number2 without a remainder.
     *
     * Excel Function:
     *		GCD(number1[,number2[, ...]])
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	mixed	$arg,...		Data values
     * @return	integer					Greatest Common Divisor
     */
    public static function GCD()
    {
    }
    //	function GCD()
    /**
     * INT
     *
     * Casts a floating point value to an integer
     *
     * Excel Function:
     *		INT(number)
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	float	$number			Number to cast to an integer
     * @return	integer	Integer value
     */
    public static function INT($number)
    {
    }
    //	function INT()
    /**
     * LCM
     *
     * Returns the lowest common multiplier of a series of numbers
     * The least common multiple is the smallest positive integer that is a multiple
     * of all integer arguments number1, number2, and so on. Use LCM to add fractions
     * with different denominators.
     *
     * Excel Function:
     *		LCM(number1[,number2[, ...]])
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	mixed	$arg,...		Data values
     * @return	int		Lowest Common Multiplier
     */
    public static function LCM()
    {
    }
    //	function LCM()
    /**
     * LOG_BASE
     *
     * Returns the logarithm of a number to a specified base. The default base is 10.
     *
     * Excel Function:
     *		LOG(number[,base])
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	float	$number		The positive real number for which you want the logarithm
     * @param	float	$base		The base of the logarithm. If base is omitted, it is assumed to be 10.
     * @return	float
     */
    public static function LOG_BASE($number = \NULL, $base = 10)
    {
    }
    //	function LOG_BASE()
    /**
     * MDETERM
     *
     * Returns the matrix determinant of an array.
     *
     * Excel Function:
     *		MDETERM(array)
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	array	$matrixValues	A matrix of values
     * @return	float
     */
    public static function MDETERM($matrixValues)
    {
    }
    //	function MDETERM()
    /**
     * MINVERSE
     *
     * Returns the inverse matrix for the matrix stored in an array.
     *
     * Excel Function:
     *		MINVERSE(array)
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	array	$matrixValues	A matrix of values
     * @return	array
     */
    public static function MINVERSE($matrixValues)
    {
    }
    //	function MINVERSE()
    /**
     * MMULT
     *
     * @param	array	$matrixData1	A matrix of values
     * @param	array	$matrixData2	A matrix of values
     * @return	array
     */
    public static function MMULT($matrixData1, $matrixData2)
    {
    }
    //	function MMULT()
    /**
     * MOD
     *
     * @param	int		$a		Dividend
     * @param	int		$b		Divisor
     * @return	int		Remainder
     */
    public static function MOD($a = 1, $b = 1)
    {
    }
    //	function MOD()
    /**
     * MROUND
     *
     * Rounds a number to the nearest multiple of a specified value
     *
     * @param	float	$number			Number to round
     * @param	int		$multiple		Multiple to which you want to round $number
     * @return	float	Rounded Number
     */
    public static function MROUND($number, $multiple)
    {
    }
    //	function MROUND()
    /**
     * MULTINOMIAL
     *
     * Returns the ratio of the factorial of a sum of values to the product of factorials.
     *
     * @param	array of mixed		Data Series
     * @return	float
     */
    public static function MULTINOMIAL()
    {
    }
    //	function MULTINOMIAL()
    /**
     * ODD
     *
     * Returns number rounded up to the nearest odd integer.
     *
     * @param	float	$number			Number to round
     * @return	int		Rounded Number
     */
    public static function ODD($number)
    {
    }
    //	function ODD()
    /**
     * POWER
     *
     * Computes x raised to the power y.
     *
     * @param	float		$x
     * @param	float		$y
     * @return	float
     */
    public static function POWER($x = 0, $y = 2)
    {
    }
    //	function POWER()
    /**
     * PRODUCT
     *
     * PRODUCT returns the product of all the values and cells referenced in the argument list.
     *
     * Excel Function:
     *		PRODUCT(value1[,value2[, ...]])
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function PRODUCT()
    {
    }
    //	function PRODUCT()
    /**
     * QUOTIENT
     *
     * QUOTIENT function returns the integer portion of a division. Numerator is the divided number
     *		and denominator is the divisor.
     *
     * Excel Function:
     *		QUOTIENT(value1[,value2[, ...]])
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function QUOTIENT()
    {
    }
    //	function QUOTIENT()
    /**
     * RAND
     *
     * @param	int		$min	Minimal value
     * @param	int		$max	Maximal value
     * @return	int		Random number
     */
    public static function RAND($min = 0, $max = 0)
    {
    }
    //	function RAND()
    public static function ROMAN($aValue, $style = 0)
    {
    }
    //	function ROMAN()
    /**
     * ROUNDUP
     *
     * Rounds a number up to a specified number of decimal places
     *
     * @param	float	$number			Number to round
     * @param	int		$digits			Number of digits to which you want to round $number
     * @return	float	Rounded Number
     */
    public static function ROUNDUP($number, $digits)
    {
    }
    //	function ROUNDUP()
    /**
     * ROUNDDOWN
     *
     * Rounds a number down to a specified number of decimal places
     *
     * @param	float	$number			Number to round
     * @param	int		$digits			Number of digits to which you want to round $number
     * @return	float	Rounded Number
     */
    public static function ROUNDDOWN($number, $digits)
    {
    }
    //	function ROUNDDOWN()
    /**
     * SERIESSUM
     *
     * Returns the sum of a power series
     *
     * @param	float			$x	Input value to the power series
     * @param	float			$n	Initial power to which you want to raise $x
     * @param	float			$m	Step by which to increase $n for each term in the series
     * @param	array of mixed		Data Series
     * @return	float
     */
    public static function SERIESSUM()
    {
    }
    //	function SERIESSUM()
    /**
     * SIGN
     *
     * Determines the sign of a number. Returns 1 if the number is positive, zero (0)
     *		if the number is 0, and -1 if the number is negative.
     *
     * @param	float	$number			Number to round
     * @return	int		sign value
     */
    public static function SIGN($number)
    {
    }
    //	function SIGN()
    /**
     * SQRTPI
     *
     * Returns the square root of (number * pi).
     *
     * @param	float	$number		Number
     * @return	float	Square Root of Number * Pi
     */
    public static function SQRTPI($number)
    {
    }
    //	function SQRTPI()
    /**
     * SUBTOTAL
     *
     * Returns a subtotal in a list or database.
     *
     * @param	int		the number 1 to 11 that specifies which function to
     *					use in calculating subtotals within a list.
     * @param	array of mixed		Data Series
     * @return	float
     */
    public static function SUBTOTAL()
    {
    }
    //	function SUBTOTAL()
    /**
     * SUM
     *
     * SUM computes the sum of all the values and cells referenced in the argument list.
     *
     * Excel Function:
     *		SUM(value1[,value2[, ...]])
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function SUM()
    {
    }
    //	function SUM()
    /**
     * SUMIF
     *
     * Counts the number of cells that contain numbers within the list of arguments
     *
     * Excel Function:
     *		SUMIF(value1[,value2[, ...]],condition)
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	mixed		$arg,...		Data values
     * @param	string		$condition		The criteria that defines which cells will be summed.
     * @return	float
     */
    public static function SUMIF($aArgs, $condition, $sumArgs = array())
    {
    }
    //	function SUMIF()
    /**
     * SUMPRODUCT
     *
     * Excel Function:
     *		SUMPRODUCT(value1[,value2[, ...]])
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function SUMPRODUCT()
    {
    }
    //	function SUMPRODUCT()
    /**
     * SUMSQ
     *
     * SUMSQ returns the sum of the squares of the arguments
     *
     * Excel Function:
     *		SUMSQ(value1[,value2[, ...]])
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function SUMSQ()
    {
    }
    //	function SUMSQ()
    /**
     * SUMX2MY2
     *
     * @param	mixed[]	$matrixData1	Matrix #1
     * @param	mixed[]	$matrixData2	Matrix #2
     * @return	float
     */
    public static function SUMX2MY2($matrixData1, $matrixData2)
    {
    }
    //	function SUMX2MY2()
    /**
     * SUMX2PY2
     *
     * @param	mixed[]	$matrixData1	Matrix #1
     * @param	mixed[]	$matrixData2	Matrix #2
     * @return	float
     */
    public static function SUMX2PY2($matrixData1, $matrixData2)
    {
    }
    //	function SUMX2PY2()
    /**
     * SUMXMY2
     *
     * @param	mixed[]	$matrixData1	Matrix #1
     * @param	mixed[]	$matrixData2	Matrix #2
     * @return	float
     */
    public static function SUMXMY2($matrixData1, $matrixData2)
    {
    }
    //	function SUMXMY2()
    /**
     * TRUNC
     *
     * Truncates value to the number of fractional digits by number_digits.
     *
     * @param	float		$value
     * @param	int			$digits
     * @return	float		Truncated value
     */
    public static function TRUNC($value = 0, $digits = 0)
    {
    }
    //	function TRUNC()
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');