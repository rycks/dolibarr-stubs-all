<?php

namespace PhpOffice\PhpSpreadsheet\Calculation;

class MathTrig
{
    //
    //    Private method to return an array of the factors of the input value
    //
    private static function factors($value)
    {
    }
    private static function romanCut($num, $n)
    {
    }
    /**
     * ATAN2.
     *
     * This function calculates the arc tangent of the two variables x and y. It is similar to
     *        calculating the arc tangent of y ÷ x, except that the signs of both arguments are used
     *        to determine the quadrant of the result.
     * The arctangent is the angle from the x-axis to a line containing the origin (0, 0) and a
     *        point with coordinates (xCoordinate, yCoordinate). The angle is given in radians between
     *        -pi and pi, excluding -pi.
     *
     * Note that the Excel ATAN2() function accepts its arguments in the reverse order to the standard
     *        PHP atan2() function, so we need to reverse them here before calling the PHP atan() function.
     *
     * Excel Function:
     *        ATAN2(xCoordinate,yCoordinate)
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param float $xCoordinate the x-coordinate of the point
     * @param float $yCoordinate the y-coordinate of the point
     *
     * @return float the inverse tangent of the specified x- and y-coordinates
     */
    public static function ATAN2($xCoordinate = null, $yCoordinate = null)
    {
    }
    /**
     * CEILING.
     *
     * Returns number rounded up, away from zero, to the nearest multiple of significance.
     *        For example, if you want to avoid using pennies in your prices and your product is
     *        priced at $4.42, use the formula =CEILING(4.42,0.05) to round prices up to the
     *        nearest nickel.
     *
     * Excel Function:
     *        CEILING(number[,significance])
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param float $number the number you want to round
     * @param float $significance the multiple to which you want to round
     *
     * @return float Rounded Number
     */
    public static function CEILING($number, $significance = null)
    {
    }
    /**
     * COMBIN.
     *
     * Returns the number of combinations for a given number of items. Use COMBIN to
     *        determine the total possible number of groups for a given number of items.
     *
     * Excel Function:
     *        COMBIN(numObjs,numInSet)
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param int $numObjs Number of different objects
     * @param int $numInSet Number of objects in each combination
     *
     * @return int Number of combinations
     */
    public static function COMBIN($numObjs, $numInSet)
    {
    }
    /**
     * EVEN.
     *
     * Returns number rounded up to the nearest even integer.
     * You can use this function for processing items that come in twos. For example,
     *        a packing crate accepts rows of one or two items. The crate is full when
     *        the number of items, rounded up to the nearest two, matches the crate's
     *        capacity.
     *
     * Excel Function:
     *        EVEN(number)
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param float $number Number to round
     *
     * @return int Rounded Number
     */
    public static function EVEN($number)
    {
    }
    /**
     * FACT.
     *
     * Returns the factorial of a number.
     * The factorial of a number is equal to 1*2*3*...* number.
     *
     * Excel Function:
     *        FACT(factVal)
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param float $factVal Factorial Value
     *
     * @return int Factorial
     */
    public static function FACT($factVal)
    {
    }
    /**
     * FACTDOUBLE.
     *
     * Returns the double factorial of a number.
     *
     * Excel Function:
     *        FACTDOUBLE(factVal)
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param float $factVal Factorial Value
     *
     * @return int Double Factorial
     */
    public static function FACTDOUBLE($factVal)
    {
    }
    /**
     * FLOOR.
     *
     * Rounds number down, toward zero, to the nearest multiple of significance.
     *
     * Excel Function:
     *        FLOOR(number[,significance])
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param float $number Number to round
     * @param float $significance Significance
     *
     * @return float Rounded Number
     */
    public static function FLOOR($number, $significance = null)
    {
    }
    private static function evaluateGCD($a, $b)
    {
    }
    /**
     * GCD.
     *
     * Returns the greatest common divisor of a series of numbers.
     * The greatest common divisor is the largest integer that divides both
     *        number1 and number2 without a remainder.
     *
     * Excel Function:
     *        GCD(number1[,number2[, ...]])
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param mixed ...$args Data values
     *
     * @return int Greatest Common Divisor
     */
    public static function GCD(...$args)
    {
    }
    /**
     * INT.
     *
     * Casts a floating point value to an integer
     *
     * Excel Function:
     *        INT(number)
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param float $number Number to cast to an integer
     *
     * @return int Integer value
     */
    public static function INT($number)
    {
    }
    /**
     * LCM.
     *
     * Returns the lowest common multiplier of a series of numbers
     * The least common multiple is the smallest positive integer that is a multiple
     * of all integer arguments number1, number2, and so on. Use LCM to add fractions
     * with different denominators.
     *
     * Excel Function:
     *        LCM(number1[,number2[, ...]])
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param mixed ...$args Data values
     *
     * @return int Lowest Common Multiplier
     */
    public static function LCM(...$args)
    {
    }
    /**
     * LOG_BASE.
     *
     * Returns the logarithm of a number to a specified base. The default base is 10.
     *
     * Excel Function:
     *        LOG(number[,base])
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param float $number The positive real number for which you want the logarithm
     * @param float $base The base of the logarithm. If base is omitted, it is assumed to be 10.
     *
     * @return float
     */
    public static function logBase($number = null, $base = 10)
    {
    }
    /**
     * MDETERM.
     *
     * Returns the matrix determinant of an array.
     *
     * Excel Function:
     *        MDETERM(array)
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param array $matrixValues A matrix of values
     *
     * @return float
     */
    public static function MDETERM($matrixValues)
    {
    }
    /**
     * MINVERSE.
     *
     * Returns the inverse matrix for the matrix stored in an array.
     *
     * Excel Function:
     *        MINVERSE(array)
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param array $matrixValues A matrix of values
     *
     * @return array
     */
    public static function MINVERSE($matrixValues)
    {
    }
    /**
     * MMULT.
     *
     * @param array $matrixData1 A matrix of values
     * @param array $matrixData2 A matrix of values
     *
     * @return array
     */
    public static function MMULT($matrixData1, $matrixData2)
    {
    }
    /**
     * MOD.
     *
     * @param int $a Dividend
     * @param int $b Divisor
     *
     * @return int Remainder
     */
    public static function MOD($a = 1, $b = 1)
    {
    }
    /**
     * MROUND.
     *
     * Rounds a number to the nearest multiple of a specified value
     *
     * @param float $number Number to round
     * @param int $multiple Multiple to which you want to round $number
     *
     * @return float Rounded Number
     */
    public static function MROUND($number, $multiple)
    {
    }
    /**
     * MULTINOMIAL.
     *
     * Returns the ratio of the factorial of a sum of values to the product of factorials.
     *
     * @param array of mixed Data Series
     *
     * @return float
     */
    public static function MULTINOMIAL(...$args)
    {
    }
    /**
     * ODD.
     *
     * Returns number rounded up to the nearest odd integer.
     *
     * @param float $number Number to round
     *
     * @return int Rounded Number
     */
    public static function ODD($number)
    {
    }
    /**
     * POWER.
     *
     * Computes x raised to the power y.
     *
     * @param float $x
     * @param float $y
     *
     * @return float
     */
    public static function POWER($x = 0, $y = 2)
    {
    }
    /**
     * PRODUCT.
     *
     * PRODUCT returns the product of all the values and cells referenced in the argument list.
     *
     * Excel Function:
     *        PRODUCT(value1[,value2[, ...]])
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param mixed ...$args Data values
     *
     * @return float
     */
    public static function PRODUCT(...$args)
    {
    }
    /**
     * QUOTIENT.
     *
     * QUOTIENT function returns the integer portion of a division. Numerator is the divided number
     *        and denominator is the divisor.
     *
     * Excel Function:
     *        QUOTIENT(value1[,value2[, ...]])
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param mixed ...$args Data values
     *
     * @return float
     */
    public static function QUOTIENT(...$args)
    {
    }
    /**
     * RAND.
     *
     * @param int $min Minimal value
     * @param int $max Maximal value
     *
     * @return int Random number
     */
    public static function RAND($min = 0, $max = 0)
    {
    }
    public static function ROMAN($aValue, $style = 0)
    {
    }
    /**
     * ROUNDUP.
     *
     * Rounds a number up to a specified number of decimal places
     *
     * @param float $number Number to round
     * @param int $digits Number of digits to which you want to round $number
     *
     * @return float Rounded Number
     */
    public static function ROUNDUP($number, $digits)
    {
    }
    /**
     * ROUNDDOWN.
     *
     * Rounds a number down to a specified number of decimal places
     *
     * @param float $number Number to round
     * @param int $digits Number of digits to which you want to round $number
     *
     * @return float Rounded Number
     */
    public static function ROUNDDOWN($number, $digits)
    {
    }
    /**
     * SERIESSUM.
     *
     * Returns the sum of a power series
     *
     * @param float $x Input value to the power series
     * @param float $n Initial power to which you want to raise $x
     * @param float $m Step by which to increase $n for each term in the series
     * @param array of mixed Data Series
     *
     * @return float
     */
    public static function SERIESSUM(...$args)
    {
    }
    /**
     * SIGN.
     *
     * Determines the sign of a number. Returns 1 if the number is positive, zero (0)
     *        if the number is 0, and -1 if the number is negative.
     *
     * @param float $number Number to round
     *
     * @return int sign value
     */
    public static function SIGN($number)
    {
    }
    /**
     * SQRTPI.
     *
     * Returns the square root of (number * pi).
     *
     * @param float $number Number
     *
     * @return float Square Root of Number * Pi
     */
    public static function SQRTPI($number)
    {
    }
    protected static function filterHiddenArgs($cellReference, $args)
    {
    }
    protected static function filterFormulaArgs($cellReference, $args)
    {
    }
    /**
     * SUBTOTAL.
     *
     * Returns a subtotal in a list or database.
     *
     * @param int the number 1 to 11 that specifies which function to
     *                    use in calculating subtotals within a range
     *                    list
     *            Numbers 101 to 111 shadow the functions of 1 to 11
     *                    but ignore any values in the range that are
     *                    in hidden rows or columns
     * @param array of mixed Data Series
     *
     * @return float
     */
    public static function SUBTOTAL(...$args)
    {
    }
    /**
     * SUM.
     *
     * SUM computes the sum of all the values and cells referenced in the argument list.
     *
     * Excel Function:
     *        SUM(value1[,value2[, ...]])
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param mixed ...$args Data values
     *
     * @return float
     */
    public static function SUM(...$args)
    {
    }
    /**
     * SUMIF.
     *
     * Counts the number of cells that contain numbers within the list of arguments
     *
     * Excel Function:
     *        SUMIF(value1[,value2[, ...]],condition)
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param mixed $aArgs Data values
     * @param string $condition the criteria that defines which cells will be summed
     * @param mixed $sumArgs
     *
     * @return float
     */
    public static function SUMIF($aArgs, $condition, $sumArgs = [])
    {
    }
    /**
     * SUMIFS.
     *
     *    Counts the number of cells that contain numbers within the list of arguments
     *
     *    Excel Function:
     *        SUMIFS(value1[,value2[, ...]],condition)
     *
     *    @category Mathematical and Trigonometric Functions
     *
     * @param mixed $args Data values
     * @param string $condition the criteria that defines which cells will be summed
     *
     * @return float
     */
    public static function SUMIFS(...$args)
    {
    }
    /**
     * SUMPRODUCT.
     *
     * Excel Function:
     *        SUMPRODUCT(value1[,value2[, ...]])
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param mixed ...$args Data values
     *
     * @return float
     */
    public static function SUMPRODUCT(...$args)
    {
    }
    /**
     * SUMSQ.
     *
     * SUMSQ returns the sum of the squares of the arguments
     *
     * Excel Function:
     *        SUMSQ(value1[,value2[, ...]])
     *
     * @category Mathematical and Trigonometric Functions
     *
     * @param mixed ...$args Data values
     *
     * @return float
     */
    public static function SUMSQ(...$args)
    {
    }
    /**
     * SUMX2MY2.
     *
     * @param mixed[] $matrixData1 Matrix #1
     * @param mixed[] $matrixData2 Matrix #2
     *
     * @return float
     */
    public static function SUMX2MY2($matrixData1, $matrixData2)
    {
    }
    /**
     * SUMX2PY2.
     *
     * @param mixed[] $matrixData1 Matrix #1
     * @param mixed[] $matrixData2 Matrix #2
     *
     * @return float
     */
    public static function SUMX2PY2($matrixData1, $matrixData2)
    {
    }
    /**
     * SUMXMY2.
     *
     * @param mixed[] $matrixData1 Matrix #1
     * @param mixed[] $matrixData2 Matrix #2
     *
     * @return float
     */
    public static function SUMXMY2($matrixData1, $matrixData2)
    {
    }
    /**
     * TRUNC.
     *
     * Truncates value to the number of fractional digits by number_digits.
     *
     * @param float $value
     * @param int $digits
     *
     * @return float Truncated value
     */
    public static function TRUNC($value = 0, $digits = 0)
    {
    }
    /**
     * SEC.
     *
     * Returns the secant of an angle.
     *
     * @param float $angle Number
     *
     * @return float|string The secant of the angle
     */
    public static function SEC($angle)
    {
    }
    /**
     * SECH.
     *
     * Returns the hyperbolic secant of an angle.
     *
     * @param float $angle Number
     *
     * @return float|string The hyperbolic secant of the angle
     */
    public static function SECH($angle)
    {
    }
    /**
     * CSC.
     *
     * Returns the cosecant of an angle.
     *
     * @param float $angle Number
     *
     * @return float|string The cosecant of the angle
     */
    public static function CSC($angle)
    {
    }
    /**
     * CSCH.
     *
     * Returns the hyperbolic cosecant of an angle.
     *
     * @param float $angle Number
     *
     * @return float|string The hyperbolic cosecant of the angle
     */
    public static function CSCH($angle)
    {
    }
    /**
     * COT.
     *
     * Returns the cotangent of an angle.
     *
     * @param float $angle Number
     *
     * @return float|string The cotangent of the angle
     */
    public static function COT($angle)
    {
    }
    /**
     * COTH.
     *
     * Returns the hyperbolic cotangent of an angle.
     *
     * @param float $angle Number
     *
     * @return float|string The hyperbolic cotangent of the angle
     */
    public static function COTH($angle)
    {
    }
    /**
     * ACOT.
     *
     * Returns the arccotangent of a number.
     *
     * @param float $number Number
     *
     * @return float|string The arccotangent of the number
     */
    public static function ACOT($number)
    {
    }
    /**
     * ACOTH.
     *
     * Returns the hyperbolic arccotangent of a number.
     *
     * @param float $number Number
     *
     * @return float|string The hyperbolic arccotangent of the number
     */
    public static function ACOTH($number)
    {
    }
}