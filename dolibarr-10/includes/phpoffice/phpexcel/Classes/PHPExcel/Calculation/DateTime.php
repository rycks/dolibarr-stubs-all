<?php

/**
 * PHPExcel_Calculation_DateTime
 *
 * @category	PHPExcel
 * @package		PHPExcel_Calculation
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Calculation_DateTime
{
    /**
     * Identify if a year is a leap year or not
     *
     * @param	integer	$year	The year to test
     * @return	boolean			TRUE if the year is a leap year, otherwise FALSE
     */
    public static function _isLeapYear($year)
    {
    }
    //	function _isLeapYear()
    /**
     * Return the number of days between two dates based on a 360 day calendar
     *
     * @param	integer	$startDay		Day of month of the start date
     * @param	integer	$startMonth		Month of the start date
     * @param	integer	$startYear		Year of the start date
     * @param	integer	$endDay			Day of month of the start date
     * @param	integer	$endMonth		Month of the start date
     * @param	integer	$endYear		Year of the start date
     * @param	boolean $methodUS		Whether to use the US method or the European method of calculation
     * @return	integer	Number of days between the start date and the end date
     */
    private static function _dateDiff360($startDay, $startMonth, $startYear, $endDay, $endMonth, $endYear, $methodUS)
    {
    }
    //	function _dateDiff360()
    /**
     * _getDateValue
     *
     * @param	string	$dateValue
     * @return	mixed	Excel date/time serial value, or string if error
     */
    public static function _getDateValue($dateValue)
    {
    }
    //	function _getDateValue()
    /**
     * _getTimeValue
     *
     * @param	string	$timeValue
     * @return	mixed	Excel date/time serial value, or string if error
     */
    private static function _getTimeValue($timeValue)
    {
    }
    //	function _getTimeValue()
    private static function _adjustDateByMonths($dateValue = 0, $adjustmentMonths = 0)
    {
    }
    //	function _adjustDateByMonths()
    /**
     * DATETIMENOW
     *
     * Returns the current date and time.
     * The NOW function is useful when you need to display the current date and time on a worksheet or
     * calculate a value based on the current date and time, and have that value updated each time you
     * open the worksheet.
     *
     * NOTE: When used in a Cell Formula, MS Excel changes the cell format so that it matches the date
     * and time format of your regional settings. PHPExcel does not change cell formatting in this way.
     *
     * Excel Function:
     *		NOW()
     *
     * @access	public
     * @category Date/Time Functions
     * @return	mixed	Excel date/time serial value, PHP date/time serial value or PHP date/time object,
     *						depending on the value of the ReturnDateType flag
     */
    public static function DATETIMENOW()
    {
    }
    //	function DATETIMENOW()
    /**
     * DATENOW
     *
     * Returns the current date.
     * The NOW function is useful when you need to display the current date and time on a worksheet or
     * calculate a value based on the current date and time, and have that value updated each time you
     * open the worksheet.
     *
     * NOTE: When used in a Cell Formula, MS Excel changes the cell format so that it matches the date
     * and time format of your regional settings. PHPExcel does not change cell formatting in this way.
     *
     * Excel Function:
     *		TODAY()
     *
     * @access	public
     * @category Date/Time Functions
     * @return	mixed	Excel date/time serial value, PHP date/time serial value or PHP date/time object,
     *						depending on the value of the ReturnDateType flag
     */
    public static function DATENOW()
    {
    }
    //	function DATENOW()
    /**
     * DATE
     *
     * The DATE function returns a value that represents a particular date.
     *
     * NOTE: When used in a Cell Formula, MS Excel changes the cell format so that it matches the date
     * format of your regional settings. PHPExcel does not change cell formatting in this way.
     *
     * Excel Function:
     *		DATE(year,month,day)
     *
     * PHPExcel is a lot more forgiving than MS Excel when passing non numeric values to this function.
     * A Month name or abbreviation (English only at this point) such as 'January' or 'Jan' will still be accepted,
     *     as will a day value with a suffix (e.g. '21st' rather than simply 21); again only English language.
     *
     * @access	public
     * @category Date/Time Functions
     * @param	integer		$year	The value of the year argument can include one to four digits.
     *								Excel interprets the year argument according to the configured
     *								date system: 1900 or 1904.
     *								If year is between 0 (zero) and 1899 (inclusive), Excel adds that
     *								value to 1900 to calculate the year. For example, DATE(108,1,2)
     *								returns January 2, 2008 (1900+108).
     *								If year is between 1900 and 9999 (inclusive), Excel uses that
     *								value as the year. For example, DATE(2008,1,2) returns January 2,
     *								2008.
     *								If year is less than 0 or is 10000 or greater, Excel returns the
     *								#NUM! error value.
     * @param	integer		$month	A positive or negative integer representing the month of the year
     *								from 1 to 12 (January to December).
     *								If month is greater than 12, month adds that number of months to
     *								the first month in the year specified. For example, DATE(2008,14,2)
     *								returns the serial number representing February 2, 2009.
     *								If month is less than 1, month subtracts the magnitude of that
     *								number of months, plus 1, from the first month in the year
     *								specified. For example, DATE(2008,-3,2) returns the serial number
     *								representing September 2, 2007.
     * @param	integer		$day	A positive or negative integer representing the day of the month
     *								from 1 to 31.
     *								If day is greater than the number of days in the month specified,
     *								day adds that number of days to the first day in the month. For
     *								example, DATE(2008,1,35) returns the serial number representing
     *								February 4, 2008.
     *								If day is less than 1, day subtracts the magnitude that number of
     *								days, plus one, from the first day of the month specified. For
     *								example, DATE(2008,1,-15) returns the serial number representing
     *								December 16, 2007.
     * @return	mixed	Excel date/time serial value, PHP date/time serial value or PHP date/time object,
     *						depending on the value of the ReturnDateType flag
     */
    public static function DATE($year = 0, $month = 1, $day = 1)
    {
    }
    //	function DATE()
    /**
     * TIME
     *
     * The TIME function returns a value that represents a particular time.
     *
     * NOTE: When used in a Cell Formula, MS Excel changes the cell format so that it matches the time
     * format of your regional settings. PHPExcel does not change cell formatting in this way.
     *
     * Excel Function:
     *		TIME(hour,minute,second)
     *
     * @access	public
     * @category Date/Time Functions
     * @param	integer		$hour		A number from 0 (zero) to 32767 representing the hour.
     *									Any value greater than 23 will be divided by 24 and the remainder
     *									will be treated as the hour value. For example, TIME(27,0,0) =
     *									TIME(3,0,0) = .125 or 3:00 AM.
     * @param	integer		$minute		A number from 0 to 32767 representing the minute.
     *									Any value greater than 59 will be converted to hours and minutes.
     *									For example, TIME(0,750,0) = TIME(12,30,0) = .520833 or 12:30 PM.
     * @param	integer		$second		A number from 0 to 32767 representing the second.
     *									Any value greater than 59 will be converted to hours, minutes,
     *									and seconds. For example, TIME(0,0,2000) = TIME(0,33,22) = .023148
     *									or 12:33:20 AM
     * @return	mixed	Excel date/time serial value, PHP date/time serial value or PHP date/time object,
     *						depending on the value of the ReturnDateType flag
     */
    public static function TIME($hour = 0, $minute = 0, $second = 0)
    {
    }
    //	function TIME()
    /**
     * DATEVALUE
     *
     * Returns a value that represents a particular date.
     * Use DATEVALUE to convert a date represented by a text string to an Excel or PHP date/time stamp
     * value.
     *
     * NOTE: When used in a Cell Formula, MS Excel changes the cell format so that it matches the date
     * format of your regional settings. PHPExcel does not change cell formatting in this way.
     *
     * Excel Function:
     *		DATEVALUE(dateValue)
     *
     * @access	public
     * @category Date/Time Functions
     * @param	string	$dateValue		Text that represents a date in a Microsoft Excel date format.
     *									For example, "1/30/2008" or "30-Jan-2008" are text strings within
     *									quotation marks that represent dates. Using the default date
     *									system in Excel for Windows, date_text must represent a date from
     *									January 1, 1900, to December 31, 9999. Using the default date
     *									system in Excel for the Macintosh, date_text must represent a date
     *									from January 1, 1904, to December 31, 9999. DATEVALUE returns the
     *									#VALUE! error value if date_text is out of this range.
     * @return	mixed	Excel date/time serial value, PHP date/time serial value or PHP date/time object,
     *						depending on the value of the ReturnDateType flag
     */
    public static function DATEVALUE($dateValue = 1)
    {
    }
    //	function DATEVALUE()
    /**
     * TIMEVALUE
     *
     * Returns a value that represents a particular time.
     * Use TIMEVALUE to convert a time represented by a text string to an Excel or PHP date/time stamp
     * value.
     *
     * NOTE: When used in a Cell Formula, MS Excel changes the cell format so that it matches the time
     * format of your regional settings. PHPExcel does not change cell formatting in this way.
     *
     * Excel Function:
     *		TIMEVALUE(timeValue)
     *
     * @access	public
     * @category Date/Time Functions
     * @param	string	$timeValue		A text string that represents a time in any one of the Microsoft
     *									Excel time formats; for example, "6:45 PM" and "18:45" text strings
     *									within quotation marks that represent time.
     *									Date information in time_text is ignored.
     * @return	mixed	Excel date/time serial value, PHP date/time serial value or PHP date/time object,
     *						depending on the value of the ReturnDateType flag
     */
    public static function TIMEVALUE($timeValue)
    {
    }
    //	function TIMEVALUE()
    /**
     * DATEDIF
     *
     * @param	mixed	$startDate		Excel date serial value, PHP date/time stamp, PHP DateTime object
     *									or a standard date string
     * @param	mixed	$endDate		Excel date serial value, PHP date/time stamp, PHP DateTime object
     *									or a standard date string
     * @param	string	$unit
     * @return	integer	Interval between the dates
     */
    public static function DATEDIF($startDate = 0, $endDate = 0, $unit = 'D')
    {
    }
    //	function DATEDIF()
    /**
     * DAYS360
     *
     * Returns the number of days between two dates based on a 360-day year (twelve 30-day months),
     * which is used in some accounting calculations. Use this function to help compute payments if
     * your accounting system is based on twelve 30-day months.
     *
     * Excel Function:
     *		DAYS360(startDate,endDate[,method])
     *
     * @access	public
     * @category Date/Time Functions
     * @param	mixed		$startDate		Excel date serial value (float), PHP date timestamp (integer),
     *										PHP DateTime object, or a standard date string
     * @param	mixed		$endDate		Excel date serial value (float), PHP date timestamp (integer),
     *										PHP DateTime object, or a standard date string
     * @param	boolean		$method			US or European Method
     *										FALSE or omitted: U.S. (NASD) method. If the starting date is
     *										the last day of a month, it becomes equal to the 30th of the
     *										same month. If the ending date is the last day of a month and
     *										the starting date is earlier than the 30th of a month, the
     *										ending date becomes equal to the 1st of the next month;
     *										otherwise the ending date becomes equal to the 30th of the
     *										same month.
     *										TRUE: European method. Starting dates and ending dates that
     *										occur on the 31st of a month become equal to the 30th of the
     *										same month.
     * @return	integer		Number of days between start date and end date
     */
    public static function DAYS360($startDate = 0, $endDate = 0, $method = \false)
    {
    }
    //	function DAYS360()
    /**
     * YEARFRAC
     *
     * Calculates the fraction of the year represented by the number of whole days between two dates
     * (the start_date and the end_date).
     * Use the YEARFRAC worksheet function to identify the proportion of a whole year's benefits or
     * obligations to assign to a specific term.
     *
     * Excel Function:
     *		YEARFRAC(startDate,endDate[,method])
     *
     * @access	public
     * @category Date/Time Functions
     * @param	mixed	$startDate		Excel date serial value (float), PHP date timestamp (integer),
     *									PHP DateTime object, or a standard date string
     * @param	mixed	$endDate		Excel date serial value (float), PHP date timestamp (integer),
     *									PHP DateTime object, or a standard date string
     * @param	integer	$method			Method used for the calculation
     *										0 or omitted	US (NASD) 30/360
     *										1				Actual/actual
     *										2				Actual/360
     *										3				Actual/365
     *										4				European 30/360
     * @return	float	fraction of the year
     */
    public static function YEARFRAC($startDate = 0, $endDate = 0, $method = 0)
    {
    }
    //	function YEARFRAC()
    /**
     * NETWORKDAYS
     *
     * Returns the number of whole working days between start_date and end_date. Working days
     * exclude weekends and any dates identified in holidays.
     * Use NETWORKDAYS to calculate employee benefits that accrue based on the number of days
     * worked during a specific term.
     *
     * Excel Function:
     *		NETWORKDAYS(startDate,endDate[,holidays[,holiday[,...]]])
     *
     * @access	public
     * @category Date/Time Functions
     * @param	mixed			$startDate		Excel date serial value (float), PHP date timestamp (integer),
     *											PHP DateTime object, or a standard date string
     * @param	mixed			$endDate		Excel date serial value (float), PHP date timestamp (integer),
     *											PHP DateTime object, or a standard date string
     * @param	mixed			$holidays,...	Optional series of Excel date serial value (float), PHP date
     *											timestamp (integer), PHP DateTime object, or a standard date
     *											strings that will be excluded from the working calendar, such
     *											as state and federal holidays and floating holidays.
     * @return	integer			Interval between the dates
     */
    public static function NETWORKDAYS($startDate, $endDate)
    {
    }
    //	function NETWORKDAYS()
    /**
     * WORKDAY
     *
     * Returns the date that is the indicated number of working days before or after a date (the
     * starting date). Working days exclude weekends and any dates identified as holidays.
     * Use WORKDAY to exclude weekends or holidays when you calculate invoice due dates, expected
     * delivery times, or the number of days of work performed.
     *
     * Excel Function:
     *		WORKDAY(startDate,endDays[,holidays[,holiday[,...]]])
     *
     * @access	public
     * @category Date/Time Functions
     * @param	mixed		$startDate		Excel date serial value (float), PHP date timestamp (integer),
     *										PHP DateTime object, or a standard date string
     * @param	integer		$endDays		The number of nonweekend and nonholiday days before or after
     *										startDate. A positive value for days yields a future date; a
     *										negative value yields a past date.
     * @param	mixed		$holidays,...	Optional series of Excel date serial value (float), PHP date
     *										timestamp (integer), PHP DateTime object, or a standard date
     *										strings that will be excluded from the working calendar, such
     *										as state and federal holidays and floating holidays.
     * @return	mixed	Excel date/time serial value, PHP date/time serial value or PHP date/time object,
     *						depending on the value of the ReturnDateType flag
     */
    public static function WORKDAY($startDate, $endDays)
    {
    }
    //	function WORKDAY()
    /**
     * DAYOFMONTH
     *
     * Returns the day of the month, for a specified date. The day is given as an integer
     * ranging from 1 to 31.
     *
     * Excel Function:
     *		DAY(dateValue)
     *
     * @param	mixed	$dateValue		Excel date serial value (float), PHP date timestamp (integer),
     *									PHP DateTime object, or a standard date string
     * @return	int		Day of the month
     */
    public static function DAYOFMONTH($dateValue = 1)
    {
    }
    //	function DAYOFMONTH()
    /**
     * DAYOFWEEK
     *
     * Returns the day of the week for a specified date. The day is given as an integer
     * ranging from 0 to 7 (dependent on the requested style).
     *
     * Excel Function:
     *		WEEKDAY(dateValue[,style])
     *
     * @param	mixed	$dateValue		Excel date serial value (float), PHP date timestamp (integer),
     *									PHP DateTime object, or a standard date string
     * @param	int		$style			A number that determines the type of return value
     *										1 or omitted	Numbers 1 (Sunday) through 7 (Saturday).
     *										2				Numbers 1 (Monday) through 7 (Sunday).
     *										3				Numbers 0 (Monday) through 6 (Sunday).
     * @return	int		Day of the week value
     */
    public static function DAYOFWEEK($dateValue = 1, $style = 1)
    {
    }
    //	function DAYOFWEEK()
    /**
     * WEEKOFYEAR
     *
     * Returns the week of the year for a specified date.
     * The WEEKNUM function considers the week containing January 1 to be the first week of the year.
     * However, there is a European standard that defines the first week as the one with the majority
     * of days (four or more) falling in the new year. This means that for years in which there are
     * three days or less in the first week of January, the WEEKNUM function returns week numbers
     * that are incorrect according to the European standard.
     *
     * Excel Function:
     *		WEEKNUM(dateValue[,style])
     *
     * @param	mixed	$dateValue		Excel date serial value (float), PHP date timestamp (integer),
     *									PHP DateTime object, or a standard date string
     * @param	boolean	$method			Week begins on Sunday or Monday
     *										1 or omitted	Week begins on Sunday.
     *										2				Week begins on Monday.
     * @return	int		Week Number
     */
    public static function WEEKOFYEAR($dateValue = 1, $method = 1)
    {
    }
    //	function WEEKOFYEAR()
    /**
     * MONTHOFYEAR
     *
     * Returns the month of a date represented by a serial number.
     * The month is given as an integer, ranging from 1 (January) to 12 (December).
     *
     * Excel Function:
     *		MONTH(dateValue)
     *
     * @param	mixed	$dateValue		Excel date serial value (float), PHP date timestamp (integer),
     *									PHP DateTime object, or a standard date string
     * @return	int		Month of the year
     */
    public static function MONTHOFYEAR($dateValue = 1)
    {
    }
    //	function MONTHOFYEAR()
    /**
     * YEAR
     *
     * Returns the year corresponding to a date.
     * The year is returned as an integer in the range 1900-9999.
     *
     * Excel Function:
     *		YEAR(dateValue)
     *
     * @param	mixed	$dateValue		Excel date serial value (float), PHP date timestamp (integer),
     *									PHP DateTime object, or a standard date string
     * @return	int		Year
     */
    public static function YEAR($dateValue = 1)
    {
    }
    //	function YEAR()
    /**
     * HOUROFDAY
     *
     * Returns the hour of a time value.
     * The hour is given as an integer, ranging from 0 (12:00 A.M.) to 23 (11:00 P.M.).
     *
     * Excel Function:
     *		HOUR(timeValue)
     *
     * @param	mixed	$timeValue		Excel date serial value (float), PHP date timestamp (integer),
     *									PHP DateTime object, or a standard time string
     * @return	int		Hour
     */
    public static function HOUROFDAY($timeValue = 0)
    {
    }
    //	function HOUROFDAY()
    /**
     * MINUTEOFHOUR
     *
     * Returns the minutes of a time value.
     * The minute is given as an integer, ranging from 0 to 59.
     *
     * Excel Function:
     *		MINUTE(timeValue)
     *
     * @param	mixed	$timeValue		Excel date serial value (float), PHP date timestamp (integer),
     *									PHP DateTime object, or a standard time string
     * @return	int		Minute
     */
    public static function MINUTEOFHOUR($timeValue = 0)
    {
    }
    //	function MINUTEOFHOUR()
    /**
     * SECONDOFMINUTE
     *
     * Returns the seconds of a time value.
     * The second is given as an integer in the range 0 (zero) to 59.
     *
     * Excel Function:
     *		SECOND(timeValue)
     *
     * @param	mixed	$timeValue		Excel date serial value (float), PHP date timestamp (integer),
     *									PHP DateTime object, or a standard time string
     * @return	int		Second
     */
    public static function SECONDOFMINUTE($timeValue = 0)
    {
    }
    //	function SECONDOFMINUTE()
    /**
     * EDATE
     *
     * Returns the serial number that represents the date that is the indicated number of months
     * before or after a specified date (the start_date).
     * Use EDATE to calculate maturity dates or due dates that fall on the same day of the month
     * as the date of issue.
     *
     * Excel Function:
     *		EDATE(dateValue,adjustmentMonths)
     *
     * @param	mixed	$dateValue			Excel date serial value (float), PHP date timestamp (integer),
     *										PHP DateTime object, or a standard date string
     * @param	int		$adjustmentMonths	The number of months before or after start_date.
     *										A positive value for months yields a future date;
     *										a negative value yields a past date.
     * @return	mixed	Excel date/time serial value, PHP date/time serial value or PHP date/time object,
     *						depending on the value of the ReturnDateType flag
     */
    public static function EDATE($dateValue = 1, $adjustmentMonths = 0)
    {
    }
    //	function EDATE()
    /**
     * EOMONTH
     *
     * Returns the date value for the last day of the month that is the indicated number of months
     * before or after start_date.
     * Use EOMONTH to calculate maturity dates or due dates that fall on the last day of the month.
     *
     * Excel Function:
     *		EOMONTH(dateValue,adjustmentMonths)
     *
     * @param	mixed	$dateValue			Excel date serial value (float), PHP date timestamp (integer),
     *										PHP DateTime object, or a standard date string
     * @param	int		$adjustmentMonths	The number of months before or after start_date.
     *										A positive value for months yields a future date;
     *										a negative value yields a past date.
     * @return	mixed	Excel date/time serial value, PHP date/time serial value or PHP date/time object,
     *						depending on the value of the ReturnDateType flag
     */
    public static function EOMONTH($dateValue = 1, $adjustmentMonths = 0)
    {
    }
    //	function EOMONTH()
}
/**
 * @ignore
 */
\define('PHPEXCEL_ROOT', \dirname(__FILE__) . '/../../');