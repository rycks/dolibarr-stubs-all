<?php

/**
 * PHPExcel_Calculation_Financial
 *
 * @category	PHPExcel
 * @package		PHPExcel_Calculation
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Calculation_Financial
{
    /**
     * _lastDayOfMonth
     *
     * Returns a boolean TRUE/FALSE indicating if this date is the last date of the month
     *
     * @param	DateTime	$testDate	The date for testing
     * @return	boolean
     */
    private static function _lastDayOfMonth($testDate)
    {
    }
    //	function _lastDayOfMonth()
    /**
     * _firstDayOfMonth
     *
     * Returns a boolean TRUE/FALSE indicating if this date is the first date of the month
     *
     * @param	DateTime	$testDate	The date for testing
     * @return	boolean
     */
    private static function _firstDayOfMonth($testDate)
    {
    }
    //	function _firstDayOfMonth()
    private static function _coupFirstPeriodDate($settlement, $maturity, $frequency, $next)
    {
    }
    //	function _coupFirstPeriodDate()
    private static function _validFrequency($frequency)
    {
    }
    //	function _validFrequency()
    /**
     * _daysPerYear
     *
     * Returns the number of days in a specified year, as defined by the "basis" value
     *
     * @param	integer		$year	The year against which we're testing
     * @param   integer		$basis	The type of day count:
     *									0 or omitted US (NASD)	360
     *									1						Actual (365 or 366 in a leap year)
     *									2						360
     *									3						365
     *									4						European 360
     * @return	integer
     */
    private static function _daysPerYear($year, $basis = 0)
    {
    }
    //	function _daysPerYear()
    private static function _interestAndPrincipal($rate = 0, $per = 0, $nper = 0, $pv = 0, $fv = 0, $type = 0)
    {
    }
    //	function _interestAndPrincipal()
    /**
     * ACCRINT
     *
     * Returns the accrued interest for a security that pays periodic interest.
     *
     * Excel Function:
     *		ACCRINT(issue,firstinterest,settlement,rate,par,frequency[,basis])
     *
     * @access	public
     * @category Financial Functions
     * @param	mixed	$issue			The security's issue date.
     * @param	mixed	$firstinterest	The security's first interest date.
     * @param	mixed	$settlement		The security's settlement date.
     *									The security settlement date is the date after the issue date
     *									when the security is traded to the buyer.
     * @param	float	$rate			The security's annual coupon rate.
     * @param	float	$par			The security's par value.
     *									If you omit par, ACCRINT uses $1,000.
     * @param	integer	$frequency		the number of coupon payments per year.
     *									Valid frequency values are:
     *										1	Annual
     *										2	Semi-Annual
     *										4	Quarterly
     *									If working in Gnumeric Mode, the following frequency options are
     *									also available
     *										6	Bimonthly
     *										12	Monthly
     * @param	integer	$basis			The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	float
     */
    public static function ACCRINT($issue, $firstinterest, $settlement, $rate, $par = 1000, $frequency = 1, $basis = 0)
    {
    }
    //	function ACCRINT()
    /**
     * ACCRINTM
     *
     * Returns the accrued interest for a security that pays interest at maturity.
     *
     * Excel Function:
     *		ACCRINTM(issue,settlement,rate[,par[,basis]])
     *
     * @access	public
     * @category Financial Functions
     * @param	mixed	issue		The security's issue date.
     * @param	mixed	settlement	The security's settlement (or maturity) date.
     * @param	float	rate		The security's annual coupon rate.
     * @param	float	par			The security's par value.
     *									If you omit par, ACCRINT uses $1,000.
     * @param	integer	basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	float
     */
    public static function ACCRINTM($issue, $settlement, $rate, $par = 1000, $basis = 0)
    {
    }
    //	function ACCRINTM()
    /**
     * AMORDEGRC
     *
     * Returns the depreciation for each accounting period.
     * This function is provided for the French accounting system. If an asset is purchased in
     * the middle of the accounting period, the prorated depreciation is taken into account.
     * The function is similar to AMORLINC, except that a depreciation coefficient is applied in
     * the calculation depending on the life of the assets.
     * This function will return the depreciation until the last period of the life of the assets
     * or until the cumulated value of depreciation is greater than the cost of the assets minus
     * the salvage value.
     *
     * Excel Function:
     *		AMORDEGRC(cost,purchased,firstPeriod,salvage,period,rate[,basis])
     *
     * @access	public
     * @category Financial Functions
     * @param	float	cost		The cost of the asset.
     * @param	mixed	purchased	Date of the purchase of the asset.
     * @param	mixed	firstPeriod	Date of the end of the first period.
     * @param	mixed	salvage		The salvage value at the end of the life of the asset.
     * @param	float	period		The period.
     * @param	float	rate		Rate of depreciation.
     * @param	integer	basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	float
     */
    public static function AMORDEGRC($cost, $purchased, $firstPeriod, $salvage, $period, $rate, $basis = 0)
    {
    }
    //	function AMORDEGRC()
    /**
     * AMORLINC
     *
     * Returns the depreciation for each accounting period.
     * This function is provided for the French accounting system. If an asset is purchased in
     * the middle of the accounting period, the prorated depreciation is taken into account.
     *
     * Excel Function:
     *		AMORLINC(cost,purchased,firstPeriod,salvage,period,rate[,basis])
     *
     * @access	public
     * @category Financial Functions
     * @param	float	cost		The cost of the asset.
     * @param	mixed	purchased	Date of the purchase of the asset.
     * @param	mixed	firstPeriod	Date of the end of the first period.
     * @param	mixed	salvage		The salvage value at the end of the life of the asset.
     * @param	float	period		The period.
     * @param	float	rate		Rate of depreciation.
     * @param	integer	basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	float
     */
    public static function AMORLINC($cost, $purchased, $firstPeriod, $salvage, $period, $rate, $basis = 0)
    {
    }
    //	function AMORLINC()
    /**
     * COUPDAYBS
     *
     * Returns the number of days from the beginning of the coupon period to the settlement date.
     *
     * Excel Function:
     *		COUPDAYBS(settlement,maturity,frequency[,basis])
     *
     * @access	public
     * @category Financial Functions
     * @param	mixed	settlement	The security's settlement date.
     *								The security settlement date is the date after the issue
     *								date when the security is traded to the buyer.
     * @param	mixed	maturity	The security's maturity date.
     *								The maturity date is the date when the security expires.
     * @param	mixed	frequency	the number of coupon payments per year.
     *									Valid frequency values are:
     *										1	Annual
     *										2	Semi-Annual
     *										4	Quarterly
     *									If working in Gnumeric Mode, the following frequency options are
     *									also available
     *										6	Bimonthly
     *										12	Monthly
     * @param	integer		basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	float
     */
    public static function COUPDAYBS($settlement, $maturity, $frequency, $basis = 0)
    {
    }
    //	function COUPDAYBS()
    /**
     * COUPDAYS
     *
     * Returns the number of days in the coupon period that contains the settlement date.
     *
     * Excel Function:
     *		COUPDAYS(settlement,maturity,frequency[,basis])
     *
     * @access	public
     * @category Financial Functions
     * @param	mixed	settlement	The security's settlement date.
     *								The security settlement date is the date after the issue
     *								date when the security is traded to the buyer.
     * @param	mixed	maturity	The security's maturity date.
     *								The maturity date is the date when the security expires.
     * @param	mixed	frequency	the number of coupon payments per year.
     *									Valid frequency values are:
     *										1	Annual
     *										2	Semi-Annual
     *										4	Quarterly
     *									If working in Gnumeric Mode, the following frequency options are
     *									also available
     *										6	Bimonthly
     *										12	Monthly
     * @param	integer		basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	float
     */
    public static function COUPDAYS($settlement, $maturity, $frequency, $basis = 0)
    {
    }
    //	function COUPDAYS()
    /**
     * COUPDAYSNC
     *
     * Returns the number of days from the settlement date to the next coupon date.
     *
     * Excel Function:
     *		COUPDAYSNC(settlement,maturity,frequency[,basis])
     *
     * @access	public
     * @category Financial Functions
     * @param	mixed	settlement	The security's settlement date.
     *								The security settlement date is the date after the issue
     *								date when the security is traded to the buyer.
     * @param	mixed	maturity	The security's maturity date.
     *								The maturity date is the date when the security expires.
     * @param	mixed	frequency	the number of coupon payments per year.
     *									Valid frequency values are:
     *										1	Annual
     *										2	Semi-Annual
     *										4	Quarterly
     *									If working in Gnumeric Mode, the following frequency options are
     *									also available
     *										6	Bimonthly
     *										12	Monthly
     * @param	integer		basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	float
     */
    public static function COUPDAYSNC($settlement, $maturity, $frequency, $basis = 0)
    {
    }
    //	function COUPDAYSNC()
    /**
     * COUPNCD
     *
     * Returns the next coupon date after the settlement date.
     *
     * Excel Function:
     *		COUPNCD(settlement,maturity,frequency[,basis])
     *
     * @access	public
     * @category Financial Functions
     * @param	mixed	settlement	The security's settlement date.
     *								The security settlement date is the date after the issue
     *								date when the security is traded to the buyer.
     * @param	mixed	maturity	The security's maturity date.
     *								The maturity date is the date when the security expires.
     * @param	mixed	frequency	the number of coupon payments per year.
     *									Valid frequency values are:
     *										1	Annual
     *										2	Semi-Annual
     *										4	Quarterly
     *									If working in Gnumeric Mode, the following frequency options are
     *									also available
     *										6	Bimonthly
     *										12	Monthly
     * @param	integer		basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	mixed	Excel date/time serial value, PHP date/time serial value or PHP date/time object,
     *						depending on the value of the ReturnDateType flag
     */
    public static function COUPNCD($settlement, $maturity, $frequency, $basis = 0)
    {
    }
    //	function COUPNCD()
    /**
     * COUPNUM
     *
     * Returns the number of coupons payable between the settlement date and maturity date,
     * rounded up to the nearest whole coupon.
     *
     * Excel Function:
     *		COUPNUM(settlement,maturity,frequency[,basis])
     *
     * @access	public
     * @category Financial Functions
     * @param	mixed	settlement	The security's settlement date.
     *								The security settlement date is the date after the issue
     *								date when the security is traded to the buyer.
     * @param	mixed	maturity	The security's maturity date.
     *								The maturity date is the date when the security expires.
     * @param	mixed	frequency	the number of coupon payments per year.
     *									Valid frequency values are:
     *										1	Annual
     *										2	Semi-Annual
     *										4	Quarterly
     *									If working in Gnumeric Mode, the following frequency options are
     *									also available
     *										6	Bimonthly
     *										12	Monthly
     * @param	integer		basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	integer
     */
    public static function COUPNUM($settlement, $maturity, $frequency, $basis = 0)
    {
    }
    //	function COUPNUM()
    /**
     * COUPPCD
     *
     * Returns the previous coupon date before the settlement date.
     *
     * Excel Function:
     *		COUPPCD(settlement,maturity,frequency[,basis])
     *
     * @access	public
     * @category Financial Functions
     * @param	mixed	settlement	The security's settlement date.
     *								The security settlement date is the date after the issue
     *								date when the security is traded to the buyer.
     * @param	mixed	maturity	The security's maturity date.
     *								The maturity date is the date when the security expires.
     * @param	mixed	frequency	the number of coupon payments per year.
     *									Valid frequency values are:
     *										1	Annual
     *										2	Semi-Annual
     *										4	Quarterly
     *									If working in Gnumeric Mode, the following frequency options are
     *									also available
     *										6	Bimonthly
     *										12	Monthly
     * @param	integer		basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	mixed	Excel date/time serial value, PHP date/time serial value or PHP date/time object,
     *						depending on the value of the ReturnDateType flag
     */
    public static function COUPPCD($settlement, $maturity, $frequency, $basis = 0)
    {
    }
    //	function COUPPCD()
    /**
     * CUMIPMT
     *
     * Returns the cumulative interest paid on a loan between the start and end periods.
     *
     * Excel Function:
     *		CUMIPMT(rate,nper,pv,start,end[,type])
     *
     * @access	public
     * @category Financial Functions
     * @param	float	$rate	The Interest rate
     * @param	integer	$nper	The total number of payment periods
     * @param	float	$pv		Present Value
     * @param	integer	$start	The first period in the calculation.
     *							Payment periods are numbered beginning with 1.
     * @param	integer	$end	The last period in the calculation.
     * @param	integer	$type	A number 0 or 1 and indicates when payments are due:
     *								0 or omitted	At the end of the period.
     *								1				At the beginning of the period.
     * @return	float
     */
    public static function CUMIPMT($rate, $nper, $pv, $start, $end, $type = 0)
    {
    }
    //	function CUMIPMT()
    /**
     * CUMPRINC
     *
     * Returns the cumulative principal paid on a loan between the start and end periods.
     *
     * Excel Function:
     *		CUMPRINC(rate,nper,pv,start,end[,type])
     *
     * @access	public
     * @category Financial Functions
     * @param	float	$rate	The Interest rate
     * @param	integer	$nper	The total number of payment periods
     * @param	float	$pv		Present Value
     * @param	integer	$start	The first period in the calculation.
     *							Payment periods are numbered beginning with 1.
     * @param	integer	$end	The last period in the calculation.
     * @param	integer	$type	A number 0 or 1 and indicates when payments are due:
     *								0 or omitted	At the end of the period.
     *								1				At the beginning of the period.
     * @return	float
     */
    public static function CUMPRINC($rate, $nper, $pv, $start, $end, $type = 0)
    {
    }
    //	function CUMPRINC()
    /**
     * DB
     *
     * Returns the depreciation of an asset for a specified period using the
     * fixed-declining balance method.
     * This form of depreciation is used if you want to get a higher depreciation value
     * at the beginning of the depreciation (as opposed to linear depreciation). The
     * depreciation value is reduced with every depreciation period by the depreciation
     * already deducted from the initial cost.
     *
     * Excel Function:
     *		DB(cost,salvage,life,period[,month])
     *
     * @access	public
     * @category Financial Functions
     * @param	float	cost		Initial cost of the asset.
     * @param	float	salvage		Value at the end of the depreciation.
     *								(Sometimes called the salvage value of the asset)
     * @param	integer	life		Number of periods over which the asset is depreciated.
     *								(Sometimes called the useful life of the asset)
     * @param	integer	period		The period for which you want to calculate the
     *								depreciation. Period must use the same units as life.
     * @param	integer	month		Number of months in the first year. If month is omitted,
     *								it defaults to 12.
     * @return	float
     */
    public static function DB($cost, $salvage, $life, $period, $month = 12)
    {
    }
    //	function DB()
    /**
     * DDB
     *
     * Returns the depreciation of an asset for a specified period using the
     * double-declining balance method or some other method you specify.
     *
     * Excel Function:
     *		DDB(cost,salvage,life,period[,factor])
     *
     * @access	public
     * @category Financial Functions
     * @param	float	cost		Initial cost of the asset.
     * @param	float	salvage		Value at the end of the depreciation.
     *								(Sometimes called the salvage value of the asset)
     * @param	integer	life		Number of periods over which the asset is depreciated.
     *								(Sometimes called the useful life of the asset)
     * @param	integer	period		The period for which you want to calculate the
     *								depreciation. Period must use the same units as life.
     * @param	float	factor		The rate at which the balance declines.
     *								If factor is omitted, it is assumed to be 2 (the
     *								double-declining balance method).
     * @return	float
     */
    public static function DDB($cost, $salvage, $life, $period, $factor = 2.0)
    {
    }
    //	function DDB()
    /**
     * DISC
     *
     * Returns the discount rate for a security.
     *
     * Excel Function:
     *		DISC(settlement,maturity,price,redemption[,basis])
     *
     * @access	public
     * @category Financial Functions
     * @param	mixed	settlement	The security's settlement date.
     *								The security settlement date is the date after the issue
     *								date when the security is traded to the buyer.
     * @param	mixed	maturity	The security's maturity date.
     *								The maturity date is the date when the security expires.
     * @param	integer	price		The security's price per $100 face value.
     * @param	integer	redemption	The security's redemption value per $100 face value.
     * @param	integer	basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	float
     */
    public static function DISC($settlement, $maturity, $price, $redemption, $basis = 0)
    {
    }
    //	function DISC()
    /**
     * DOLLARDE
     *
     * Converts a dollar price expressed as an integer part and a fraction
     *		part into a dollar price expressed as a decimal number.
     * Fractional dollar numbers are sometimes used for security prices.
     *
     * Excel Function:
     *		DOLLARDE(fractional_dollar,fraction)
     *
     * @access	public
     * @category Financial Functions
     * @param	float	$fractional_dollar	Fractional Dollar
     * @param	integer	$fraction			Fraction
     * @return	float
     */
    public static function DOLLARDE($fractional_dollar = \Null, $fraction = 0)
    {
    }
    //	function DOLLARDE()
    /**
     * DOLLARFR
     *
     * Converts a dollar price expressed as a decimal number into a dollar price
     *		expressed as a fraction.
     * Fractional dollar numbers are sometimes used for security prices.
     *
     * Excel Function:
     *		DOLLARFR(decimal_dollar,fraction)
     *
     * @access	public
     * @category Financial Functions
     * @param	float	$decimal_dollar		Decimal Dollar
     * @param	integer	$fraction			Fraction
     * @return	float
     */
    public static function DOLLARFR($decimal_dollar = \Null, $fraction = 0)
    {
    }
    //	function DOLLARFR()
    /**
     * EFFECT
     *
     * Returns the effective interest rate given the nominal rate and the number of
     *		compounding payments per year.
     *
     * Excel Function:
     *		EFFECT(nominal_rate,npery)
     *
     * @access	public
     * @category Financial Functions
     * @param	float	$nominal_rate		Nominal interest rate
     * @param	integer	$npery				Number of compounding payments per year
     * @return	float
     */
    public static function EFFECT($nominal_rate = 0, $npery = 0)
    {
    }
    //	function EFFECT()
    /**
     * FV
     *
     * Returns the Future Value of a cash flow with constant payments and interest rate (annuities).
     *
     * Excel Function:
     *		FV(rate,nper,pmt[,pv[,type]])
     *
     * @access	public
     * @category Financial Functions
     * @param	float	$rate	The interest rate per period
     * @param	int		$nper	Total number of payment periods in an annuity
     * @param	float	$pmt	The payment made each period: it cannot change over the
     *							life of the annuity. Typically, pmt contains principal
     *							and interest but no other fees or taxes.
     * @param	float	$pv		Present Value, or the lump-sum amount that a series of
     *							future payments is worth right now.
     * @param	integer	$type	A number 0 or 1 and indicates when payments are due:
     *								0 or omitted	At the end of the period.
     *								1				At the beginning of the period.
     * @return	float
     */
    public static function FV($rate = 0, $nper = 0, $pmt = 0, $pv = 0, $type = 0)
    {
    }
    //	function FV()
    /**
     * FVSCHEDULE
     *
     * Returns the future value of an initial principal after applying a series of compound interest rates.
     * Use FVSCHEDULE to calculate the future value of an investment with a variable or adjustable rate.
     *
     * Excel Function:
     *		FVSCHEDULE(principal,schedule)
     *
     * @param	float	$principal	The present value.
     * @param	float[]	$schedule	An array of interest rates to apply.
     * @return	float
     */
    public static function FVSCHEDULE($principal, $schedule)
    {
    }
    //	function FVSCHEDULE()
    /**
     * INTRATE
     *
     * Returns the interest rate for a fully invested security.
     *
     * Excel Function:
     *		INTRATE(settlement,maturity,investment,redemption[,basis])
     *
     * @param	mixed	$settlement	The security's settlement date.
     *								The security settlement date is the date after the issue date when the security is traded to the buyer.
     * @param	mixed	$maturity	The security's maturity date.
     *								The maturity date is the date when the security expires.
     * @param	integer	$investment	The amount invested in the security.
     * @param	integer	$redemption	The amount to be received at maturity.
     * @param	integer	$basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	float
     */
    public static function INTRATE($settlement, $maturity, $investment, $redemption, $basis = 0)
    {
    }
    //	function INTRATE()
    /**
     * IPMT
     *
     * Returns the interest payment for a given period for an investment based on periodic, constant payments and a constant interest rate.
     *
     * Excel Function:
     *		IPMT(rate,per,nper,pv[,fv][,type])
     *
     * @param	float	$rate	Interest rate per period
     * @param	int		$per	Period for which we want to find the interest
     * @param	int		$nper	Number of periods
     * @param	float	$pv		Present Value
     * @param	float	$fv		Future Value
     * @param	int		$type	Payment type: 0 = at the end of each period, 1 = at the beginning of each period
     * @return	float
     */
    public static function IPMT($rate, $per, $nper, $pv, $fv = 0, $type = 0)
    {
    }
    //	function IPMT()
    /**
     * IRR
     *
     * Returns the internal rate of return for a series of cash flows represented by the numbers in values. 
     * These cash flows do not have to be even, as they would be for an annuity. However, the cash flows must occur 
     * at regular intervals, such as monthly or annually. The internal rate of return is the interest rate received
     * for an investment consisting of payments (negative values) and income (positive values) that occur at regular 
     * periods.
     *
     * Excel Function:
     *		IRR(values[,guess])
     *
     * @param	float[]	$values		An array or a reference to cells that contain numbers for which you want
     *									to calculate the internal rate of return.
     *								Values must contain at least one positive value and one negative value to 
     *									calculate the internal rate of return.
     * @param	float	$guess		A number that you guess is close to the result of IRR
     * @return	float
     */
    public static function IRR($values, $guess = 0.1)
    {
    }
    //	function IRR()
    /**
     * ISPMT
     *
     * Returns the interest payment for an investment based on an interest rate and a constant payment schedule.
     *
     * Excel Function:
     *     =ISPMT(interest_rate, period, number_payments, PV)
     *
     * interest_rate is the interest rate for the investment
     *
     * period is the period to calculate the interest rate.  It must be betweeen 1 and number_payments.
     *
     * number_payments is the number of payments for the annuity
     *
     * PV is the loan amount or present value of the payments
     */
    public static function ISPMT()
    {
    }
    //	function ISPMT()
    /**
     * MIRR
     *
     * Returns the modified internal rate of return for a series of periodic cash flows. MIRR considers both 
     *		the cost of the investment and the interest received on reinvestment of cash.
     *
     * Excel Function:
     *		MIRR(values,finance_rate, reinvestment_rate)
     *
     * @param	float[]	$values				An array or a reference to cells that contain a series of payments and
     *											income occurring at regular intervals.
     *										Payments are negative value, income is positive values.
     * @param	float	$finance_rate		The interest rate you pay on the money used in the cash flows
     * @param	float	$reinvestment_rate	The interest rate you receive on the cash flows as you reinvest them
     * @return	float
     */
    public static function MIRR($values, $finance_rate, $reinvestment_rate)
    {
    }
    //	function MIRR()
    /**
     * NOMINAL
     *
     * Returns the nominal interest rate given the effective rate and the number of compounding payments per year.
     *
     * @param	float	$effect_rate	Effective interest rate
     * @param	int		$npery			Number of compounding payments per year
     * @return	float
     */
    public static function NOMINAL($effect_rate = 0, $npery = 0)
    {
    }
    //	function NOMINAL()
    /**
     * NPER
     *
     * Returns the number of periods for a cash flow with constant periodic payments (annuities), and interest rate.
     *
     * @param	float	$rate	Interest rate per period
     * @param	int		$pmt	Periodic payment (annuity)
     * @param	float	$pv		Present Value
     * @param	float	$fv		Future Value
     * @param	int		$type	Payment type: 0 = at the end of each period, 1 = at the beginning of each period
     * @return	float
     */
    public static function NPER($rate = 0, $pmt = 0, $pv = 0, $fv = 0, $type = 0)
    {
    }
    //	function NPER()
    /**
     * NPV
     *
     * Returns the Net Present Value of a cash flow series given a discount rate.
     *
     * @return	float
     */
    public static function NPV()
    {
    }
    //	function NPV()
    /**
     * PMT
     *
     * Returns the constant payment (annuity) for a cash flow with a constant interest rate.
     *
     * @param	float	$rate	Interest rate per period
     * @param	int		$nper	Number of periods
     * @param	float	$pv		Present Value
     * @param	float	$fv		Future Value
     * @param	int		$type	Payment type: 0 = at the end of each period, 1 = at the beginning of each period
     * @return	float
     */
    public static function PMT($rate = 0, $nper = 0, $pv = 0, $fv = 0, $type = 0)
    {
    }
    //	function PMT()
    /**
     * PPMT
     *
     * Returns the interest payment for a given period for an investment based on periodic, constant payments and a constant interest rate.
     *
     * @param	float	$rate	Interest rate per period
     * @param	int		$per	Period for which we want to find the interest
     * @param	int		$nper	Number of periods
     * @param	float	$pv		Present Value
     * @param	float	$fv		Future Value
     * @param	int		$type	Payment type: 0 = at the end of each period, 1 = at the beginning of each period
     * @return	float
     */
    public static function PPMT($rate, $per, $nper, $pv, $fv = 0, $type = 0)
    {
    }
    //	function PPMT()
    public static function PRICE($settlement, $maturity, $rate, $yield, $redemption, $frequency, $basis = 0)
    {
    }
    //	function PRICE()
    /**
     * PRICEDISC
     *
     * Returns the price per $100 face value of a discounted security.
     *
     * @param	mixed	settlement	The security's settlement date.
     *								The security settlement date is the date after the issue date when the security is traded to the buyer.
     * @param	mixed	maturity	The security's maturity date.
     *								The maturity date is the date when the security expires.
     * @param	int		discount	The security's discount rate.
     * @param	int		redemption	The security's redemption value per $100 face value.
     * @param	int		basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	float
     */
    public static function PRICEDISC($settlement, $maturity, $discount, $redemption, $basis = 0)
    {
    }
    //	function PRICEDISC()
    /**
     * PRICEMAT
     *
     * Returns the price per $100 face value of a security that pays interest at maturity.
     *
     * @param	mixed	settlement	The security's settlement date.
     *								The security's settlement date is the date after the issue date when the security is traded to the buyer.
     * @param	mixed	maturity	The security's maturity date.
     *								The maturity date is the date when the security expires.
     * @param	mixed	issue		The security's issue date.
     * @param	int		rate		The security's interest rate at date of issue.
     * @param	int		yield		The security's annual yield.
     * @param	int		basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	float
     */
    public static function PRICEMAT($settlement, $maturity, $issue, $rate, $yield, $basis = 0)
    {
    }
    //	function PRICEMAT()
    /**
     * PV
     *
     * Returns the Present Value of a cash flow with constant payments and interest rate (annuities).
     *
     * @param	float	$rate	Interest rate per period
     * @param	int		$nper	Number of periods
     * @param	float	$pmt	Periodic payment (annuity)
     * @param	float	$fv		Future Value
     * @param	int		$type	Payment type: 0 = at the end of each period, 1 = at the beginning of each period
     * @return	float
     */
    public static function PV($rate = 0, $nper = 0, $pmt = 0, $fv = 0, $type = 0)
    {
    }
    //	function PV()
    /**
     * RATE
     *
     * Returns the interest rate per period of an annuity.
     * RATE is calculated by iteration and can have zero or more solutions.
     * If the successive results of RATE do not converge to within 0.0000001 after 20 iterations,
     * RATE returns the #NUM! error value.
     *
     * Excel Function:
     *		RATE(nper,pmt,pv[,fv[,type[,guess]]])
     *
     * @access	public
     * @category Financial Functions
     * @param	float	nper		The total number of payment periods in an annuity.
     * @param	float	pmt			The payment made each period and cannot change over the life
     *									of the annuity.
     *								Typically, pmt includes principal and interest but no other
     *									fees or taxes.
     * @param	float	pv			The present value - the total amount that a series of future
     *									payments is worth now.
     * @param	float	fv			The future value, or a cash balance you want to attain after
     *									the last payment is made. If fv is omitted, it is assumed
     *									to be 0 (the future value of a loan, for example, is 0).
     * @param	integer	type		A number 0 or 1 and indicates when payments are due:
     *										0 or omitted	At the end of the period.
     *										1				At the beginning of the period.
     * @param	float	guess		Your guess for what the rate will be.
     *									If you omit guess, it is assumed to be 10 percent.
     * @return	float
     **/
    public static function RATE($nper, $pmt, $pv, $fv = 0.0, $type = 0, $guess = 0.1)
    {
    }
    //	function RATE()
    /**
     * RECEIVED
     *
     * Returns the price per $100 face value of a discounted security.
     *
     * @param	mixed	settlement	The security's settlement date.
     *								The security settlement date is the date after the issue date when the security is traded to the buyer.
     * @param	mixed	maturity	The security's maturity date.
     *								The maturity date is the date when the security expires.
     * @param	int		investment	The amount invested in the security.
     * @param	int		discount	The security's discount rate.
     * @param	int		basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	float
     */
    public static function RECEIVED($settlement, $maturity, $investment, $discount, $basis = 0)
    {
    }
    //	function RECEIVED()
    /**
     * SLN
     *
     * Returns the straight-line depreciation of an asset for one period
     *
     * @param	cost		Initial cost of the asset
     * @param	salvage		Value at the end of the depreciation
     * @param	life		Number of periods over which the asset is depreciated
     * @return	float
     */
    public static function SLN($cost, $salvage, $life)
    {
    }
    //	function SLN()
    /**
     * SYD
     *
     * Returns the sum-of-years' digits depreciation of an asset for a specified period.
     *
     * @param	cost		Initial cost of the asset
     * @param	salvage		Value at the end of the depreciation
     * @param	life		Number of periods over which the asset is depreciated
     * @param	period		Period
     * @return	float
     */
    public static function SYD($cost, $salvage, $life, $period)
    {
    }
    //	function SYD()
    /**
     * TBILLEQ
     *
     * Returns the bond-equivalent yield for a Treasury bill.
     *
     * @param	mixed	settlement	The Treasury bill's settlement date.
     *								The Treasury bill's settlement date is the date after the issue date when the Treasury bill is traded to the buyer.
     * @param	mixed	maturity	The Treasury bill's maturity date.
     *								The maturity date is the date when the Treasury bill expires.
     * @param	int		discount	The Treasury bill's discount rate.
     * @return	float
     */
    public static function TBILLEQ($settlement, $maturity, $discount)
    {
    }
    //	function TBILLEQ()
    /**
     * TBILLPRICE
     *
     * Returns the yield for a Treasury bill.
     *
     * @param	mixed	settlement	The Treasury bill's settlement date.
     *								The Treasury bill's settlement date is the date after the issue date when the Treasury bill is traded to the buyer.
     * @param	mixed	maturity	The Treasury bill's maturity date.
     *								The maturity date is the date when the Treasury bill expires.
     * @param	int		discount	The Treasury bill's discount rate.
     * @return	float
     */
    public static function TBILLPRICE($settlement, $maturity, $discount)
    {
    }
    //	function TBILLPRICE()
    /**
     * TBILLYIELD
     *
     * Returns the yield for a Treasury bill.
     *
     * @param	mixed	settlement	The Treasury bill's settlement date.
     *								The Treasury bill's settlement date is the date after the issue date when the Treasury bill is traded to the buyer.
     * @param	mixed	maturity	The Treasury bill's maturity date.
     *								The maturity date is the date when the Treasury bill expires.
     * @param	int		price		The Treasury bill's price per $100 face value.
     * @return	float
     */
    public static function TBILLYIELD($settlement, $maturity, $price)
    {
    }
    //	function TBILLYIELD()
    public static function XIRR($values, $dates, $guess = 0.1)
    {
    }
    /**
     * XNPV
     *
     * Returns the net present value for a schedule of cash flows that is not necessarily periodic.
     * To calculate the net present value for a series of cash flows that is periodic, use the NPV function.
     *
     * Excel Function:
     *		=XNPV(rate,values,dates)
     *
     * @param	float			$rate		The discount rate to apply to the cash flows.
     * @param	array of float	$values		A series of cash flows that corresponds to a schedule of payments in dates. The first payment is optional and corresponds to a cost or payment that occurs at the beginning of the investment. If the first value is a cost or payment, it must be a negative value. All succeeding payments are discounted based on a 365-day year. The series of values must contain at least one positive value and one negative value.
     * @param	array of mixed	$dates		A schedule of payment dates that corresponds to the cash flow payments. The first payment date indicates the beginning of the schedule of payments. All other dates must be later than this date, but they may occur in any order.
     * @return	float
     */
    public static function XNPV($rate, $values, $dates)
    {
    }
    //	function XNPV()
    /**
     * YIELDDISC
     *
     * Returns the annual yield of a security that pays interest at maturity.
     *
     * @param	mixed	settlement	The security's settlement date.
     *								The security's settlement date is the date after the issue date when the security is traded to the buyer.
     * @param	mixed	maturity	The security's maturity date.
     *								The maturity date is the date when the security expires.
     * @param	int		price		The security's price per $100 face value.
     * @param	int		redemption	The security's redemption value per $100 face value.
     * @param	int		basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	float
     */
    public static function YIELDDISC($settlement, $maturity, $price, $redemption, $basis = 0)
    {
    }
    //	function YIELDDISC()
    /**
     * YIELDMAT
     *
     * Returns the annual yield of a security that pays interest at maturity.
     *
     * @param	mixed	settlement	The security's settlement date.
     *								The security's settlement date is the date after the issue date when the security is traded to the buyer.
     * @param	mixed	maturity	The security's maturity date.
     *								The maturity date is the date when the security expires.
     * @param	mixed	issue		The security's issue date.
     * @param	int		rate		The security's interest rate at date of issue.
     * @param	int		price		The security's price per $100 face value.
     * @param	int		basis		The type of day count to use.
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	float
     */
    public static function YIELDMAT($settlement, $maturity, $issue, $rate, $price, $basis = 0)
    {
    }
    //	function YIELDMAT()
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');
/** FINANCIAL_MAX_ITERATIONS */
\define('FINANCIAL_MAX_ITERATIONS', 128);
/** FINANCIAL_PRECISION */
\define('FINANCIAL_PRECISION', 1.0E-8);