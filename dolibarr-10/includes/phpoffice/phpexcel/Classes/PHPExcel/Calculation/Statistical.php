<?php

/**
 * PHPExcel_Calculation_Statistical
 *
 * @category	PHPExcel
 * @package		PHPExcel_Calculation
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Calculation_Statistical
{
    private static function _checkTrendArrays(&$array1, &$array2)
    {
    }
    //	function _checkTrendArrays()
    /**
     * Beta function.
     *
     * @author Jaco van Kooten
     *
     * @param p require p>0
     * @param q require q>0
     * @return 0 if p<=0, q<=0 or p+q>2.55E305 to avoid errors and over/underflow
     */
    private static function _beta($p, $q)
    {
    }
    //	function _beta()
    /**
     * Incomplete beta function
     *
     * @author Jaco van Kooten
     * @author Paul Meagher
     *
     * The computation is based on formulas from Numerical Recipes, Chapter 6.4 (W.H. Press et al, 1992).
     * @param x require 0<=x<=1
     * @param p require p>0
     * @param q require q>0
     * @return 0 if x<0, p<=0, q<=0 or p+q>2.55E305 and 1 if x>1 to avoid errors and over/underflow
     */
    private static function _incompleteBeta($x, $p, $q)
    {
    }
    //	function _incompleteBeta()
    // Function cache for _logBeta function
    private static $_logBetaCache_p = 0.0;
    private static $_logBetaCache_q = 0.0;
    private static $_logBetaCache_result = 0.0;
    /**
     * The natural logarithm of the beta function.
     *
     * @param p require p>0
     * @param q require q>0
     * @return 0 if p<=0, q<=0 or p+q>2.55E305 to avoid errors and over/underflow
     * @author Jaco van Kooten
     */
    private static function _logBeta($p, $q)
    {
    }
    //	function _logBeta()
    /**
     * Evaluates of continued fraction part of incomplete beta function.
     * Based on an idea from Numerical Recipes (W.H. Press et al, 1992).
     * @author Jaco van Kooten
     */
    private static function _betaFraction($x, $p, $q)
    {
    }
    //	function _betaFraction()
    /**
     * logGamma function
     *
     * @version 1.1
     * @author Jaco van Kooten
     *
     * Original author was Jaco van Kooten. Ported to PHP by Paul Meagher.
     *
     * The natural logarithm of the gamma function. <br />
     * Based on public domain NETLIB (Fortran) code by W. J. Cody and L. Stoltz <br />
     * Applied Mathematics Division <br />
     * Argonne National Laboratory <br />
     * Argonne, IL 60439 <br />
     * <p>
     * References:
     * <ol>
     * <li>W. J. Cody and K. E. Hillstrom, 'Chebyshev Approximations for the Natural
     *	 Logarithm of the Gamma Function,' Math. Comp. 21, 1967, pp. 198-203.</li>
     * <li>K. E. Hillstrom, ANL/AMD Program ANLC366S, DGAMMA/DLGAMA, May, 1969.</li>
     * <li>Hart, Et. Al., Computer Approximations, Wiley and sons, New York, 1968.</li>
     * </ol>
     * </p>
     * <p>
     * From the original documentation:
     * </p>
     * <p>
     * This routine calculates the LOG(GAMMA) function for a positive real argument X.
     * Computation is based on an algorithm outlined in references 1 and 2.
     * The program uses rational functions that theoretically approximate LOG(GAMMA)
     * to at least 18 significant decimal digits. The approximation for X > 12 is from
     * reference 3, while approximations for X < 12.0 are similar to those in reference
     * 1, but are unpublished. The accuracy achieved depends on the arithmetic system,
     * the compiler, the intrinsic functions, and proper selection of the
     * machine-dependent constants.
     * </p>
     * <p>
     * Error returns: <br />
     * The program returns the value XINF for X .LE. 0.0 or when overflow would occur.
     * The computation is believed to be free of underflow and overflow.
     * </p>
     * @return MAX_VALUE for x < 0.0 or when overflow would occur, i.e. x > 2.55E305
     */
    // Function cache for logGamma
    private static $_logGammaCache_result = 0.0;
    private static $_logGammaCache_x = 0.0;
    private static function _logGamma($x)
    {
    }
    //	function _logGamma()
    //
    //	Private implementation of the incomplete Gamma function
    //
    private static function _incompleteGamma($a, $x)
    {
    }
    //	function _incompleteGamma()
    //
    //	Private implementation of the Gamma function
    //
    private static function _gamma($data)
    {
    }
    //	function _gamma()
    /***************************************************************************
     *								inverse_ncdf.php
     *							-------------------
     *	begin				: Friday, January 16, 2004
     *	copyright			: (C) 2004 Michael Nickerson
     *	email				: nickersonm@yahoo.com
     *
     ***************************************************************************/
    private static function _inverse_ncdf($p)
    {
    }
    //	function _inverse_ncdf()
    private static function _inverse_ncdf2($prob)
    {
    }
    //	function _inverse_ncdf2()
    private static function _inverse_ncdf3($p)
    {
    }
    //	function _inverse_ncdf3()
    /**
     * AVEDEV
     *
     * Returns the average of the absolute deviations of data points from their mean.
     * AVEDEV is a measure of the variability in a data set.
     *
     * Excel Function:
     *		AVEDEV(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function AVEDEV()
    {
    }
    //	function AVEDEV()
    /**
     * AVERAGE
     *
     * Returns the average (arithmetic mean) of the arguments
     *
     * Excel Function:
     *		AVERAGE(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function AVERAGE()
    {
    }
    //	function AVERAGE()
    /**
     * AVERAGEA
     *
     * Returns the average of its arguments, including numbers, text, and logical values
     *
     * Excel Function:
     *		AVERAGEA(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function AVERAGEA()
    {
    }
    //	function AVERAGEA()
    /**
     * AVERAGEIF
     *
     * Returns the average value from a range of cells that contain numbers within the list of arguments
     *
     * Excel Function:
     *		AVERAGEIF(value1[,value2[, ...]],condition)
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	mixed		$arg,...		Data values
     * @param	string		$condition		The criteria that defines which cells will be checked.
     * @param	mixed[]		$averageArgs	Data values
     * @return	float
     */
    public static function AVERAGEIF($aArgs, $condition, $averageArgs = array())
    {
    }
    //	function AVERAGEIF()
    /**
     * BETADIST
     *
     * Returns the beta distribution.
     *
     * @param	float		$value			Value at which you want to evaluate the distribution
     * @param	float		$alpha			Parameter to the distribution
     * @param	float		$beta			Parameter to the distribution
     * @param	boolean		$cumulative
     * @return	float
     *
     */
    public static function BETADIST($value, $alpha, $beta, $rMin = 0, $rMax = 1)
    {
    }
    //	function BETADIST()
    /**
     * BETAINV
     *
     * Returns the inverse of the beta distribution.
     *
     * @param	float		$probability	Probability at which you want to evaluate the distribution
     * @param	float		$alpha			Parameter to the distribution
     * @param	float		$beta			Parameter to the distribution
     * @param	float		$rMin			Minimum value
     * @param	float		$rMax			Maximum value
     * @param	boolean		$cumulative
     * @return	float
     *
     */
    public static function BETAINV($probability, $alpha, $beta, $rMin = 0, $rMax = 1)
    {
    }
    //	function BETAINV()
    /**
     * BINOMDIST
     *
     * Returns the individual term binomial distribution probability. Use BINOMDIST in problems with
     *		a fixed number of tests or trials, when the outcomes of any trial are only success or failure,
     *		when trials are independent, and when the probability of success is constant throughout the
     *		experiment. For example, BINOMDIST can calculate the probability that two of the next three
     *		babies born are male.
     *
     * @param	float		$value			Number of successes in trials
     * @param	float		$trials			Number of trials
     * @param	float		$probability	Probability of success on each trial
     * @param	boolean		$cumulative
     * @return	float
     *
     * @todo	Cumulative distribution function
     *
     */
    public static function BINOMDIST($value, $trials, $probability, $cumulative)
    {
    }
    //	function BINOMDIST()
    /**
     * CHIDIST
     *
     * Returns the one-tailed probability of the chi-squared distribution.
     *
     * @param	float		$value			Value for the function
     * @param	float		$degrees		degrees of freedom
     * @return	float
     */
    public static function CHIDIST($value, $degrees)
    {
    }
    //	function CHIDIST()
    /**
     * CHIINV
     *
     * Returns the one-tailed probability of the chi-squared distribution.
     *
     * @param	float		$probability	Probability for the function
     * @param	float		$degrees		degrees of freedom
     * @return	float
     */
    public static function CHIINV($probability, $degrees)
    {
    }
    //	function CHIINV()
    /**
     * CONFIDENCE
     *
     * Returns the confidence interval for a population mean
     *
     * @param	float		$alpha
     * @param	float		$stdDev		Standard Deviation
     * @param	float		$size
     * @return	float
     *
     */
    public static function CONFIDENCE($alpha, $stdDev, $size)
    {
    }
    //	function CONFIDENCE()
    /**
     * CORREL
     *
     * Returns covariance, the average of the products of deviations for each data point pair.
     *
     * @param	array of mixed		Data Series Y
     * @param	array of mixed		Data Series X
     * @return	float
     */
    public static function CORREL($yValues, $xValues = \null)
    {
    }
    //	function CORREL()
    /**
     * COUNT
     *
     * Counts the number of cells that contain numbers within the list of arguments
     *
     * Excel Function:
     *		COUNT(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	int
     */
    public static function COUNT()
    {
    }
    //	function COUNT()
    /**
     * COUNTA
     *
     * Counts the number of cells that are not empty within the list of arguments
     *
     * Excel Function:
     *		COUNTA(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	int
     */
    public static function COUNTA()
    {
    }
    //	function COUNTA()
    /**
     * COUNTBLANK
     *
     * Counts the number of empty cells within the list of arguments
     *
     * Excel Function:
     *		COUNTBLANK(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	int
     */
    public static function COUNTBLANK()
    {
    }
    //	function COUNTBLANK()
    /**
     * COUNTIF
     *
     * Counts the number of cells that contain numbers within the list of arguments
     *
     * Excel Function:
     *		COUNTIF(value1[,value2[, ...]],condition)
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @param	string		$condition		The criteria that defines which cells will be counted.
     * @return	int
     */
    public static function COUNTIF($aArgs, $condition)
    {
    }
    //	function COUNTIF()
    /**
     * COVAR
     *
     * Returns covariance, the average of the products of deviations for each data point pair.
     *
     * @param	array of mixed		Data Series Y
     * @param	array of mixed		Data Series X
     * @return	float
     */
    public static function COVAR($yValues, $xValues)
    {
    }
    //	function COVAR()
    /**
     * CRITBINOM
     *
     * Returns the smallest value for which the cumulative binomial distribution is greater
     *		than or equal to a criterion value
     *
     * See http://support.microsoft.com/kb/828117/ for details of the algorithm used
     *
     * @param	float		$trials			number of Bernoulli trials
     * @param	float		$probability	probability of a success on each trial
     * @param	float		$alpha			criterion value
     * @return	int
     *
     * @todo	Warning. This implementation differs from the algorithm detailed on the MS
     *			web site in that $CumPGuessMinus1 = $CumPGuess - 1 rather than $CumPGuess - $PGuess
     *			This eliminates a potential endless loop error, but may have an adverse affect on the
     *			accuracy of the function (although all my tests have so far returned correct results).
     *
     */
    public static function CRITBINOM($trials, $probability, $alpha)
    {
    }
    //	function CRITBINOM()
    /**
     * DEVSQ
     *
     * Returns the sum of squares of deviations of data points from their sample mean.
     *
     * Excel Function:
     *		DEVSQ(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function DEVSQ()
    {
    }
    //	function DEVSQ()
    /**
     * EXPONDIST
     *
     *	Returns the exponential distribution. Use EXPONDIST to model the time between events,
     *		such as how long an automated bank teller takes to deliver cash. For example, you can
     *		use EXPONDIST to determine the probability that the process takes at most 1 minute.
     *
     * @param	float		$value			Value of the function
     * @param	float		$lambda			The parameter value
     * @param	boolean		$cumulative
     * @return	float
     */
    public static function EXPONDIST($value, $lambda, $cumulative)
    {
    }
    //	function EXPONDIST()
    /**
     * FISHER
     *
     * Returns the Fisher transformation at x. This transformation produces a function that
     *		is normally distributed rather than skewed. Use this function to perform hypothesis
     *		testing on the correlation coefficient.
     *
     * @param	float		$value
     * @return	float
     */
    public static function FISHER($value)
    {
    }
    //	function FISHER()
    /**
     * FISHERINV
     *
     * Returns the inverse of the Fisher transformation. Use this transformation when
     *		analyzing correlations between ranges or arrays of data. If y = FISHER(x), then
     *		FISHERINV(y) = x.
     *
     * @param	float		$value
     * @return	float
     */
    public static function FISHERINV($value)
    {
    }
    //	function FISHERINV()
    /**
     * FORECAST
     *
     * Calculates, or predicts, a future value by using existing values. The predicted value is a y-value for a given x-value.
     *
     * @param	float				Value of X for which we want to find Y
     * @param	array of mixed		Data Series Y
     * @param	array of mixed		Data Series X
     * @return	float
     */
    public static function FORECAST($xValue, $yValues, $xValues)
    {
    }
    //	function FORECAST()
    /**
     * GAMMADIST
     *
     * Returns the gamma distribution.
     *
     * @param	float		$value			Value at which you want to evaluate the distribution
     * @param	float		$a				Parameter to the distribution
     * @param	float		$b				Parameter to the distribution
     * @param	boolean		$cumulative
     * @return	float
     *
     */
    public static function GAMMADIST($value, $a, $b, $cumulative)
    {
    }
    //	function GAMMADIST()
    /**
     * GAMMAINV
     *
     * Returns the inverse of the beta distribution.
     *
     * @param	float		$probability	Probability at which you want to evaluate the distribution
     * @param	float		$alpha			Parameter to the distribution
     * @param	float		$beta			Parameter to the distribution
     * @return	float
     *
     */
    public static function GAMMAINV($probability, $alpha, $beta)
    {
    }
    //	function GAMMAINV()
    /**
     * GAMMALN
     *
     * Returns the natural logarithm of the gamma function.
     *
     * @param	float		$value
     * @return	float
     */
    public static function GAMMALN($value)
    {
    }
    //	function GAMMALN()
    /**
     * GEOMEAN
     *
     * Returns the geometric mean of an array or range of positive data. For example, you
     *		can use GEOMEAN to calculate average growth rate given compound interest with
     *		variable rates.
     *
     * Excel Function:
     *		GEOMEAN(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function GEOMEAN()
    {
    }
    //	GEOMEAN()
    /**
     * GROWTH
     *
     * Returns values along a predicted emponential trend
     *
     * @param	array of mixed		Data Series Y
     * @param	array of mixed		Data Series X
     * @param	array of mixed		Values of X for which we want to find Y
     * @param	boolean				A logical value specifying whether to force the intersect to equal 0.
     * @return	array of float
     */
    public static function GROWTH($yValues, $xValues = array(), $newValues = array(), $const = \True)
    {
    }
    //	function GROWTH()
    /**
     * HARMEAN
     *
     * Returns the harmonic mean of a data set. The harmonic mean is the reciprocal of the
     *		arithmetic mean of reciprocals.
     *
     * Excel Function:
     *		HARMEAN(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function HARMEAN()
    {
    }
    //	function HARMEAN()
    /**
     * HYPGEOMDIST
     *
     * Returns the hypergeometric distribution. HYPGEOMDIST returns the probability of a given number of
     * sample successes, given the sample size, population successes, and population size.
     *
     * @param	float		$sampleSuccesses		Number of successes in the sample
     * @param	float		$sampleNumber			Size of the sample
     * @param	float		$populationSuccesses	Number of successes in the population
     * @param	float		$populationNumber		Population size
     * @return	float
     *
     */
    public static function HYPGEOMDIST($sampleSuccesses, $sampleNumber, $populationSuccesses, $populationNumber)
    {
    }
    //	function HYPGEOMDIST()
    /**
     * INTERCEPT
     *
     * Calculates the point at which a line will intersect the y-axis by using existing x-values and y-values.
     *
     * @param	array of mixed		Data Series Y
     * @param	array of mixed		Data Series X
     * @return	float
     */
    public static function INTERCEPT($yValues, $xValues)
    {
    }
    //	function INTERCEPT()
    /**
     * KURT
     *
     * Returns the kurtosis of a data set. Kurtosis characterizes the relative peakedness
     * or flatness of a distribution compared with the normal distribution. Positive
     * kurtosis indicates a relatively peaked distribution. Negative kurtosis indicates a
     * relatively flat distribution.
     *
     * @param	array	Data Series
     * @return	float
     */
    public static function KURT()
    {
    }
    //	function KURT()
    /**
     * LARGE
     *
     * Returns the nth largest value in a data set. You can use this function to
     *		select a value based on its relative standing.
     *
     * Excel Function:
     *		LARGE(value1[,value2[, ...]],entry)
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @param	int			$entry			Position (ordered from the largest) in the array or range of data to return
     * @return	float
     *
     */
    public static function LARGE()
    {
    }
    //	function LARGE()
    /**
     * LINEST
     *
     * Calculates the statistics for a line by using the "least squares" method to calculate a straight line that best fits your data,
     *		and then returns an array that describes the line.
     *
     * @param	array of mixed		Data Series Y
     * @param	array of mixed		Data Series X
     * @param	boolean				A logical value specifying whether to force the intersect to equal 0.
     * @param	boolean				A logical value specifying whether to return additional regression statistics.
     * @return	array
     */
    public static function LINEST($yValues, $xValues = \NULL, $const = \TRUE, $stats = \FALSE)
    {
    }
    //	function LINEST()
    /**
     * LOGEST
     *
     * Calculates an exponential curve that best fits the X and Y data series,
     *		and then returns an array that describes the line.
     *
     * @param	array of mixed		Data Series Y
     * @param	array of mixed		Data Series X
     * @param	boolean				A logical value specifying whether to force the intersect to equal 0.
     * @param	boolean				A logical value specifying whether to return additional regression statistics.
     * @return	array
     */
    public static function LOGEST($yValues, $xValues = \null, $const = \True, $stats = \False)
    {
    }
    //	function LOGEST()
    /**
     * LOGINV
     *
     * Returns the inverse of the normal cumulative distribution
     *
     * @param	float		$probability
     * @param	float		$mean
     * @param	float		$stdDev
     * @return	float
     *
     * @todo	Try implementing P J Acklam's refinement algorithm for greater
     *			accuracy if I can get my head round the mathematics
     *			(as described at) http://home.online.no/~pjacklam/notes/invnorm/
     */
    public static function LOGINV($probability, $mean, $stdDev)
    {
    }
    //	function LOGINV()
    /**
     * LOGNORMDIST
     *
     * Returns the cumulative lognormal distribution of x, where ln(x) is normally distributed
     * with parameters mean and standard_dev.
     *
     * @param	float		$value
     * @param	float		$mean
     * @param	float		$stdDev
     * @return	float
     */
    public static function LOGNORMDIST($value, $mean, $stdDev)
    {
    }
    //	function LOGNORMDIST()
    /**
     * MAX
     *
     * MAX returns the value of the element of the values passed that has the highest value,
     *		with negative numbers considered smaller than positive numbers.
     *
     * Excel Function:
     *		MAX(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function MAX()
    {
    }
    //	function MAX()
    /**
     * MAXA
     *
     * Returns the greatest value in a list of arguments, including numbers, text, and logical values
     *
     * Excel Function:
     *		MAXA(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function MAXA()
    {
    }
    //	function MAXA()
    /**
     * MAXIF
     *
     * Counts the maximum value within a range of cells that contain numbers within the list of arguments
     *
     * Excel Function:
     *		MAXIF(value1[,value2[, ...]],condition)
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	mixed		$arg,...		Data values
     * @param	string		$condition		The criteria that defines which cells will be checked.
     * @return	float
     */
    public static function MAXIF($aArgs, $condition, $sumArgs = array())
    {
    }
    //	function MAXIF()
    /**
     * MEDIAN
     *
     * Returns the median of the given numbers. The median is the number in the middle of a set of numbers.
     *
     * Excel Function:
     *		MEDIAN(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function MEDIAN()
    {
    }
    //	function MEDIAN()
    /**
     * MIN
     *
     * MIN returns the value of the element of the values passed that has the smallest value,
     *		with negative numbers considered smaller than positive numbers.
     *
     * Excel Function:
     *		MIN(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function MIN()
    {
    }
    //	function MIN()
    /**
     * MINA
     *
     * Returns the smallest value in a list of arguments, including numbers, text, and logical values
     *
     * Excel Function:
     *		MINA(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function MINA()
    {
    }
    //	function MINA()
    /**
     * MINIF
     *
     * Returns the minimum value within a range of cells that contain numbers within the list of arguments
     *
     * Excel Function:
     *		MINIF(value1[,value2[, ...]],condition)
     *
     * @access	public
     * @category Mathematical and Trigonometric Functions
     * @param	mixed		$arg,...		Data values
     * @param	string		$condition		The criteria that defines which cells will be checked.
     * @return	float
     */
    public static function MINIF($aArgs, $condition, $sumArgs = array())
    {
    }
    //	function MINIF()
    //
    //	Special variant of array_count_values that isn't limited to strings and integers,
    //		but can work with floating point numbers as values
    //
    private static function _modeCalc($data)
    {
    }
    //	function _modeCalc()
    /**
     * MODE
     *
     * Returns the most frequently occurring, or repetitive, value in an array or range of data
     *
     * Excel Function:
     *		MODE(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function MODE()
    {
    }
    //	function MODE()
    /**
     * NEGBINOMDIST
     *
     * Returns the negative binomial distribution. NEGBINOMDIST returns the probability that
     *		there will be number_f failures before the number_s-th success, when the constant
     *		probability of a success is probability_s. This function is similar to the binomial
     *		distribution, except that the number of successes is fixed, and the number of trials is
     *		variable. Like the binomial, trials are assumed to be independent.
     *
     * @param	float		$failures		Number of Failures
     * @param	float		$successes		Threshold number of Successes
     * @param	float		$probability	Probability of success on each trial
     * @return	float
     *
     */
    public static function NEGBINOMDIST($failures, $successes, $probability)
    {
    }
    //	function NEGBINOMDIST()
    /**
     * NORMDIST
     *
     * Returns the normal distribution for the specified mean and standard deviation. This
     * function has a very wide range of applications in statistics, including hypothesis
     * testing.
     *
     * @param	float		$value
     * @param	float		$mean		Mean Value
     * @param	float		$stdDev		Standard Deviation
     * @param	boolean		$cumulative
     * @return	float
     *
     */
    public static function NORMDIST($value, $mean, $stdDev, $cumulative)
    {
    }
    //	function NORMDIST()
    /**
     * NORMINV
     *
     * Returns the inverse of the normal cumulative distribution for the specified mean and standard deviation.
     *
     * @param	float		$value
     * @param	float		$mean		Mean Value
     * @param	float		$stdDev		Standard Deviation
     * @return	float
     *
     */
    public static function NORMINV($probability, $mean, $stdDev)
    {
    }
    //	function NORMINV()
    /**
     * NORMSDIST
     *
     * Returns the standard normal cumulative distribution function. The distribution has
     * a mean of 0 (zero) and a standard deviation of one. Use this function in place of a
     * table of standard normal curve areas.
     *
     * @param	float		$value
     * @return	float
     */
    public static function NORMSDIST($value)
    {
    }
    //	function NORMSDIST()
    /**
     * NORMSINV
     *
     * Returns the inverse of the standard normal cumulative distribution
     *
     * @param	float		$value
     * @return	float
     */
    public static function NORMSINV($value)
    {
    }
    //	function NORMSINV()
    /**
     * PERCENTILE
     *
     * Returns the nth percentile of values in a range..
     *
     * Excel Function:
     *		PERCENTILE(value1[,value2[, ...]],entry)
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @param	float		$entry			Percentile value in the range 0..1, inclusive.
     * @return	float
     */
    public static function PERCENTILE()
    {
    }
    //	function PERCENTILE()
    /**
     * PERCENTRANK
     *
     * Returns the rank of a value in a data set as a percentage of the data set.
     *
     * @param	array of number		An array of, or a reference to, a list of numbers.
     * @param	number				The number whose rank you want to find.
     * @param	number				The number of significant digits for the returned percentage value.
     * @return	float
     */
    public static function PERCENTRANK($valueSet, $value, $significance = 3)
    {
    }
    //	function PERCENTRANK()
    /**
     * PERMUT
     *
     * Returns the number of permutations for a given number of objects that can be
     *		selected from number objects. A permutation is any set or subset of objects or
     *		events where internal order is significant. Permutations are different from
     *		combinations, for which the internal order is not significant. Use this function
     *		for lottery-style probability calculations.
     *
     * @param	int		$numObjs	Number of different objects
     * @param	int		$numInSet	Number of objects in each permutation
     * @return	int		Number of permutations
     */
    public static function PERMUT($numObjs, $numInSet)
    {
    }
    //	function PERMUT()
    /**
     * POISSON
     *
     * Returns the Poisson distribution. A common application of the Poisson distribution
     * is predicting the number of events over a specific time, such as the number of
     * cars arriving at a toll plaza in 1 minute.
     *
     * @param	float		$value
     * @param	float		$mean		Mean Value
     * @param	boolean		$cumulative
     * @return	float
     *
     */
    public static function POISSON($value, $mean, $cumulative)
    {
    }
    //	function POISSON()
    /**
     * QUARTILE
     *
     * Returns the quartile of a data set.
     *
     * Excel Function:
     *		QUARTILE(value1[,value2[, ...]],entry)
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @param	int			$entry			Quartile value in the range 1..3, inclusive.
     * @return	float
     */
    public static function QUARTILE()
    {
    }
    //	function QUARTILE()
    /**
     * RANK
     *
     * Returns the rank of a number in a list of numbers.
     *
     * @param	number				The number whose rank you want to find.
     * @param	array of number		An array of, or a reference to, a list of numbers.
     * @param	mixed				Order to sort the values in the value set
     * @return	float
     */
    public static function RANK($value, $valueSet, $order = 0)
    {
    }
    //	function RANK()
    /**
     * RSQ
     *
     * Returns the square of the Pearson product moment correlation coefficient through data points in known_y's and known_x's.
     *
     * @param	array of mixed		Data Series Y
     * @param	array of mixed		Data Series X
     * @return	float
     */
    public static function RSQ($yValues, $xValues)
    {
    }
    //	function RSQ()
    /**
     * SKEW
     *
     * Returns the skewness of a distribution. Skewness characterizes the degree of asymmetry
     * of a distribution around its mean. Positive skewness indicates a distribution with an
     * asymmetric tail extending toward more positive values. Negative skewness indicates a
     * distribution with an asymmetric tail extending toward more negative values.
     *
     * @param	array	Data Series
     * @return	float
     */
    public static function SKEW()
    {
    }
    //	function SKEW()
    /**
     * SLOPE
     *
     * Returns the slope of the linear regression line through data points in known_y's and known_x's.
     *
     * @param	array of mixed		Data Series Y
     * @param	array of mixed		Data Series X
     * @return	float
     */
    public static function SLOPE($yValues, $xValues)
    {
    }
    //	function SLOPE()
    /**
     * SMALL
     *
     * Returns the nth smallest value in a data set. You can use this function to
     *		select a value based on its relative standing.
     *
     * Excel Function:
     *		SMALL(value1[,value2[, ...]],entry)
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @param	int			$entry			Position (ordered from the smallest) in the array or range of data to return
     * @return	float
     */
    public static function SMALL()
    {
    }
    //	function SMALL()
    /**
     * STANDARDIZE
     *
     * Returns a normalized value from a distribution characterized by mean and standard_dev.
     *
     * @param	float	$value		Value to normalize
     * @param	float	$mean		Mean Value
     * @param	float	$stdDev		Standard Deviation
     * @return	float	Standardized value
     */
    public static function STANDARDIZE($value, $mean, $stdDev)
    {
    }
    //	function STANDARDIZE()
    /**
     * STDEV
     *
     * Estimates standard deviation based on a sample. The standard deviation is a measure of how
     *		widely values are dispersed from the average value (the mean).
     *
     * Excel Function:
     *		STDEV(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function STDEV()
    {
    }
    //	function STDEV()
    /**
     * STDEVA
     *
     * Estimates standard deviation based on a sample, including numbers, text, and logical values
     *
     * Excel Function:
     *		STDEVA(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function STDEVA()
    {
    }
    //	function STDEVA()
    /**
     * STDEVP
     *
     * Calculates standard deviation based on the entire population
     *
     * Excel Function:
     *		STDEVP(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function STDEVP()
    {
    }
    //	function STDEVP()
    /**
     * STDEVPA
     *
     * Calculates standard deviation based on the entire population, including numbers, text, and logical values
     *
     * Excel Function:
     *		STDEVPA(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function STDEVPA()
    {
    }
    //	function STDEVPA()
    /**
     * STEYX
     *
     * Returns the standard error of the predicted y-value for each x in the regression.
     *
     * @param	array of mixed		Data Series Y
     * @param	array of mixed		Data Series X
     * @return	float
     */
    public static function STEYX($yValues, $xValues)
    {
    }
    //	function STEYX()
    /**
     * TDIST
     *
     * Returns the probability of Student's T distribution.
     *
     * @param	float		$value			Value for the function
     * @param	float		$degrees		degrees of freedom
     * @param	float		$tails			number of tails (1 or 2)
     * @return	float
     */
    public static function TDIST($value, $degrees, $tails)
    {
    }
    //	function TDIST()
    /**
     * TINV
     *
     * Returns the one-tailed probability of the chi-squared distribution.
     *
     * @param	float		$probability	Probability for the function
     * @param	float		$degrees		degrees of freedom
     * @return	float
     */
    public static function TINV($probability, $degrees)
    {
    }
    //	function TINV()
    /**
     * TREND
     *
     * Returns values along a linear trend
     *
     * @param	array of mixed		Data Series Y
     * @param	array of mixed		Data Series X
     * @param	array of mixed		Values of X for which we want to find Y
     * @param	boolean				A logical value specifying whether to force the intersect to equal 0.
     * @return	array of float
     */
    public static function TREND($yValues, $xValues = array(), $newValues = array(), $const = \True)
    {
    }
    //	function TREND()
    /**
     * TRIMMEAN
     *
     * Returns the mean of the interior of a data set. TRIMMEAN calculates the mean
     *		taken by excluding a percentage of data points from the top and bottom tails
     *		of a data set.
     *
     * Excel Function:
     *		TRIMEAN(value1[,value2[, ...]],$discard)
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @param	float		$discard		Percentage to discard
     * @return	float
     */
    public static function TRIMMEAN()
    {
    }
    //	function TRIMMEAN()
    /**
     * VARFunc
     *
     * Estimates variance based on a sample.
     *
     * Excel Function:
     *		VAR(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function VARFunc()
    {
    }
    //	function VARFunc()
    /**
     * VARA
     *
     * Estimates variance based on a sample, including numbers, text, and logical values
     *
     * Excel Function:
     *		VARA(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function VARA()
    {
    }
    //	function VARA()
    /**
     * VARP
     *
     * Calculates variance based on the entire population
     *
     * Excel Function:
     *		VARP(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function VARP()
    {
    }
    //	function VARP()
    /**
     * VARPA
     *
     * Calculates variance based on the entire population, including numbers, text, and logical values
     *
     * Excel Function:
     *		VARPA(value1[,value2[, ...]])
     *
     * @access	public
     * @category Statistical Functions
     * @param	mixed		$arg,...		Data values
     * @return	float
     */
    public static function VARPA()
    {
    }
    //	function VARPA()
    /**
     * WEIBULL
     *
     * Returns the Weibull distribution. Use this distribution in reliability
     * analysis, such as calculating a device's mean time to failure.
     *
     * @param	float		$value
     * @param	float		$alpha		Alpha Parameter
     * @param	float		$beta		Beta Parameter
     * @param	boolean		$cumulative
     * @return	float
     *
     */
    public static function WEIBULL($value, $alpha, $beta, $cumulative)
    {
    }
    //	function WEIBULL()
    /**
     * ZTEST
     *
     * Returns the Weibull distribution. Use this distribution in reliability
     * analysis, such as calculating a device's mean time to failure.
     *
     * @param	float		$dataSet
     * @param	float		$m0		Alpha Parameter
     * @param	float		$sigma	Beta Parameter
     * @param	boolean		$cumulative
     * @return	float
     *
     */
    public static function ZTEST($dataSet, $m0, $sigma = \NULL)
    {
    }
    //	function ZTEST()
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');
/** LOG_GAMMA_X_MAX_VALUE */
\define('LOG_GAMMA_X_MAX_VALUE', 2.55E+305);
/** XMININ */
\define('XMININ', 2.23E-308);
/** EPS */
\define('EPS', 2.22E-16);
/** SQRT2PI */
\define('SQRT2PI', 2.5066282746310007);