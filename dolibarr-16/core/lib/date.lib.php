<?php

/* Copyright (C) 2004-2011 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2011 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2011-2015 Juanjo Menent        <jmenent@2byte.es>
 * Copyright (C) 2017      Ferran Marcet        <fmarcet@2byte.es>
 * Copyright (C) 2018      Charlene Benke       <charlie@patas-monkey.com>
*
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 * or see https://www.gnu.org/
 */
/**
 *  \file		htdocs/core/lib/date.lib.php
 *  \brief		Set of function to manipulate dates
 */
/**
 *  Return an array with timezone values
 *
 *  @return     array   Array with timezone values
 */
function get_tz_array()
{
}
/**
 * Return server timezone string
 *
 * @return string			PHP server timezone string ('Europe/Paris')
 */
function getServerTimeZoneString()
{
}
/**
 * Return server timezone int.
 *
 * @param	string	$refgmtdate		Reference period for timezone (timezone differs on winter and summer. May be 'now', 'winter' or 'summer')
 * @return 	float					An offset in hour (+1 for Europe/Paris on winter and +2 for Europe/Paris on summer). Note some countries use half and even quarter hours.
 */
function getServerTimeZoneInt($refgmtdate = 'now')
{
}
/**
 *  Add a delay to a date
 *
 *  @param      int			$time               Date timestamp (or string with format YYYY-MM-DD)
 *  @param      int			$duration_value     Value of delay to add
 *  @param      int			$duration_unit      Unit of added delay (d, m, y, w, h, i)
 *  @param      int         $ruleforendofmonth  Change the behavior of PHP over data-interval, 0 or 1
 *  @return     int      			        	New timestamp
 */
function dol_time_plus_duree($time, $duration_value, $duration_unit, $ruleforendofmonth = 0)
{
}
/**
 * Convert hours and minutes into seconds
 *
 * @param      int		$iHours     	Hours
 * @param      int		$iMinutes   	Minutes
 * @param      int		$iSeconds   	Seconds
 * @return     int						Time into seconds
 * @see convertSecondToTime()
 */
function convertTime2Seconds($iHours = 0, $iMinutes = 0, $iSeconds = 0)
{
}
/**	  	Return, in clear text, value of a number of seconds in days, hours and minutes.
 *      Can be used to show a duration.
 *
 *    	@param      int		$iSecond		Number of seconds
 *    	@param      string	$format		    Output format ('all': total delay days hour:min like "2 days 12:30",
 *                                          - 'allwithouthour': total delay days without hour part like "2 days",
 *                                          - 'allhourmin': total delay with format hours:min like "60:30",
 *                                          - 'allhourminsec': total delay with format hours:min:sec like "60:30:10",
 *                                          - 'allhour': total delay hours without min/sec like "60:30",
 *                                          - 'fullhour': total delay hour decimal like "60.5" for 60:30,
 *                                          - 'hour': only hours part "12",
 *                                          - 'min': only minutes part "30",
 *                                          - 'sec': only seconds part,
 *                                          - 'month': only month part,
 *                                          - 'year': only year part);
 *      @param      int		$lengthOfDay    Length of day (default 86400 seconds for 1 day, 28800 for 8 hour)
 *      @param      int		$lengthOfWeek   Length of week (default 7)
 *    	@return     string		 		 	Formated text of duration
 * 	                                		Example: 0 return 00:00, 3600 return 1:00, 86400 return 1d, 90000 return 1 Day 01:00
 *      @see convertTime2Seconds()
 */
function convertSecondToTime($iSecond, $format = 'all', $lengthOfDay = 86400, $lengthOfWeek = 7)
{
}
/**
 * Generate a SQL string to make a filter into a range (for second of date until last second of date).
 * This method allows to maje SQL request that will deal correctly the timezone of server.
 *
 * @param      string		$datefield			Name of SQL field where apply sql date filter
 * @param      int|string	$day_date			Day date (Can be 0 or '' for filter on a month)
 * @param      int|string	$month_date			Month date (Can be 0 or '' for filter on a year)
 * @param      int|string	$year_date			Year date
 * @param	   int      	$excludefirstand	Exclude first and
 * @param	   mixed		$gm					False or 0 or 'tzserver' = Input date fields are date info in the server TZ. True or 1 or 'gmt' = Input are date info in GMT TZ.
 * 												Note: In database, dates are always fot the server TZ.
 * @return     string		$sqldate			String with SQL filter
 */
function dolSqlDateFilter($datefield, $day_date, $month_date, $year_date, $excludefirstand = 0, $gm = \false)
{
}
/**
 *	Convert a string date into a GM Timestamps date
 *	Warning: YYYY-MM-DDTHH:MM:SS+02:00 (RFC3339) is not supported. If parameter gm is 1, we will use no TZ, if not we will use TZ of server, not the one inside string.
 *
 *	@param	string		$string		Date in a string
 *				     		        YYYYMMDD
 *	                 				YYYYMMDDHHMMSS
 *									YYYYMMDDTHHMMSSZ
 *									YYYY-MM-DDTHH:MM:SSZ (RFC3339)
 *		                			DD/MM/YY or DD/MM/YYYY (deprecated)
 *		                			DD/MM/YY HH:MM:SS or DD/MM/YYYY HH:MM:SS (deprecated)
 *  @param	int|string	$gm         'gmt' or 1 =Input date is GM date,
 *                          	    'tzserver' or 0 =Input date is date using PHP server timezone
 *  @return	int						Date as a timestamp
 *		                			19700101020000 -> 7200 with gm=1
 *									19700101000000 -> 0 with gm=1
 *
 *  @see    dol_print_date(), dol_mktime(), dol_getdate()
 */
function dol_stringtotime($string, $gm = 1)
{
}
/**
 *  Return previous day
 *
 *  @param      int			$day     	Day
 *  @param      int			$month   	Month
 *  @param      int			$year    	Year
 *  @return     array   				Previous year,month,day
 */
function dol_get_prev_day($day, $month, $year)
{
}
/**
 *  Return next day
 *
 *  @param      int			$day    	Day
 *  @param      int			$month  	Month
 *  @param      int			$year   	Year
 *  @return     array   				Next year,month,day
 */
function dol_get_next_day($day, $month, $year)
{
}
/**
 *  Return previous month
 *
 *	@param		int			$month		Month
 *	@param		int			$year		Year
 *	@return		array					Previous year,month
 */
function dol_get_prev_month($month, $year)
{
}
/**
 *  Return next month
 *
 *	@param		int			$month		Month
 *	@param		int			$year		Year
 *	@return		array					Next year,month
 */
function dol_get_next_month($month, $year)
{
}
/**
 *  Return previous week
 *
 *  @param      int			$day     	Day
 *  @param      int			$week    	Week
 *  @param      int			$month   	Month
 *	@param		int			$year		Year
 *	@return		array					Previous year,month,day
 */
function dol_get_prev_week($day, $week, $month, $year)
{
}
/**
 *  Return next week
 *
 *  @param      int			$day     	Day
 *  @param      int			$week    	Week
 *  @param      int			$month   	Month
 *	@param		int			$year		Year
 *	@return		array					Next year,month,day
 */
function dol_get_next_week($day, $week, $month, $year)
{
}
/**
 *  Return GMT time for first day of a month or year
 *
 *	@param		int			$year		Year
 * 	@param		int			$month		Month
 * 	@param		mixed		$gm			False or 0 or 'tzserver' = Return date to compare with server TZ,
 * 										True or 1 or 'gmt' to compare with GMT date.
 *                          			Example: dol_get_first_day(1970,1,false) will return -3600 with TZ+1, a dol_print_date on it will return 1970-01-01 00:00:00
 *                          			Example: dol_get_first_day(1970,1,true) will return 0 whatever is TZ, a dol_print_date on it will return 1970-01-01 00:00:00
 *  @return		int						Date for first day, '' if error
 */
function dol_get_first_day($year, $month = 1, $gm = \false)
{
}
/**
 * Return GMT time for last day of a month or year.
 * Note: The timestamp contains last day and last hours (23:59:59)
 *
 *	@param		int			$year		Year
 * 	@param		int			$month		Month
 * 	@param		mixed		$gm			False or 0 or 'tzserver' = Return date to compare with server TZ,
 * 										True or 1 or 'gmt' to compare with GMT date.
 *	@return		int						Date for first day, '' if error
 */
function dol_get_last_day($year, $month = 12, $gm = \false)
{
}
/**
 *  Return GMT time for last hour of a given GMT date (it replaces hours, min and second part to 23:59:59)
 *
 *	@param		int			$date		Date GMT
 * 	@param		mixed		$gm			False or 0 or 'tzserver' = Return date to compare with server TZ,
 * 										'gmt' to compare with GMT date.
 *  @return		int						Date for last hour of a given date
 */
function dol_get_last_hour($date, $gm = 'tzserver')
{
}
/**
 *  Return GMT time for first hour of a given GMT date (it removes hours, min and second part)
 *
 *	@param		int			$date		Date GMT
 * 	@param		mixed		$gm			False or 0 or 'tzserver' = Return date to compare with server TZ,
 * 										'gmt' to compare with GMT date.
 *  @return		int						Date for last hour of a given date
 */
function dol_get_first_hour($date, $gm = 'tzserver')
{
}
/**	Return first day of week for a date. First day of week may be monday if option MAIN_START_WEEK is 1.
 *
 *	@param		int		$day		Day
 * 	@param		int		$month		Month
 *  @param		int		$year		Year
 * 	@param		mixed	$gm			False or 0 or 'tzserver' = Return date to compare with server TZ,
 * 									True or 1 or 'gmt' to compare with GMT date.
 *	@return		array				year,month,week,first_day,first_month,first_year,prev_day,prev_month,prev_year
 */
function dol_get_first_day_week($day, $month, $year, $gm = \false)
{
}
/**
 *	Return the easter day in GMT time.
 *  This function replaces easter_date() that returns a date in local TZ.
 *
 *	@param	    int			$year     			Year
 *	@return   	int								GMT Date of easter day
 */
function getGMTEasterDatetime($year)
{
}
/**
 *  Return the number of non working days including Friday, Saturday and Sunday (or not) between 2 dates in timestamp.
 *  Dates must be UTC with hour, min, sec to 0.
 *  Called by function num_open_day()
 *
 *  @param	int			$timestampStart		Timestamp start (UTC with hour, min, sec = 0)
 *  @param	int			$timestampEnd		Timestamp end (UTC with hour, min, sec = 0)
 *  @param	string		$country_code		Country code
 *  @param	int			$lastday			Last day is included, 0: no, 1:yes
 *  @param	int			$includesaturday	Include saturday as non working day (-1=use setup, 0=no, 1=yes)
 *  @param	int			$includesunday		Include sunday as non working day (-1=use setup, 0=no, 1=yes)
 *  @param	int			$includefriday		Include friday as non working day (-1=use setup, 0=no, 1=yes)
 *  @param	int			$includemonday		Include monday as non working day (-1=use setup, 0=no, 1=yes)
 *  @return	int|string						Number of non working days or error message string if error
 *  @see num_between_day(), num_open_day()
 */
function num_public_holiday($timestampStart, $timestampEnd, $country_code = '', $lastday = 0, $includesaturday = -1, $includesunday = -1, $includefriday = -1, $includemonday = -1)
{
}
/**
 *	Function to return number of days between two dates (date must be UTC date !)
 *  Example: 2012-01-01 2012-01-02 => 1 if lastday=0, 2 if lastday=1
 *
 *	@param	   int			$timestampStart     Timestamp start UTC
 *	@param	   int			$timestampEnd       Timestamp end UTC
 *	@param     int			$lastday            Last day is included, 0: no, 1:yes
 *	@return    int								Number of days
 *  @seealso num_public_holiday(), num_open_day()
 */
function num_between_day($timestampStart, $timestampEnd, $lastday = 0)
{
}
/**
 *	Function to return number of working days (and text of units) between two dates (working days)
 *
 *	@param	   	int			$timestampStart     Timestamp for start date (date must be UTC to avoid calculation errors)
 *	@param	   	int			$timestampEnd       Timestamp for end date (date must be UTC to avoid calculation errors)
 *	@param     	int			$inhour             0: return number of days, 1: return number of hours
 *	@param		int			$lastday            We include last day, 0: no, 1:yes
 *  @param		int			$halfday			Tag to define half day when holiday start and end
 *  @param      string		$country_code       Country code (company country code if not defined)
 *	@return    	int|string						Number of days or hours or string if error
 *  @seealso num_between_day(), num_public_holiday()
 */
function num_open_day($timestampStart, $timestampEnd, $inhour = 0, $lastday = 0, $halfday = 0, $country_code = '')
{
}
/**
 *	Return array of translated months or selected month.
 *  This replace old function monthArrayOrSelected.
 *
 *	@param	Translate	$outputlangs	Object langs
 *  @param	int			$short			0=Return long label, 1=Return short label
 *	@return array						Month string or array if selected < 0
 */
function monthArray($outputlangs, $short = 0)
{
}
/**
 *	Return array of week numbers.
 *
 *	@param	int 		$month			Month number
 *  @param	int			$year			Year number
 *	@return array						Week numbers
 */
function getWeekNumbersOfMonth($month, $year)
{
}
/**
 *	Return array of first day of weeks.
 *
 *	@param	array 		$TWeek			array of week numbers
 *  @param	int			$year			Year number
 *	@return array						First day of week
 */
function getFirstDayOfEachWeek($TWeek, $year)
{
}
/**
 *	Return array of last day of weeks.
 *
 *	@param	array 		$TWeek			array of week numbers
 *  @param	int			$year			Year number
 *	@return array						Last day of week
 */
function getLastDayOfEachWeek($TWeek, $year)
{
}
/**
 *	Return week number.
 *
 *	@param	int 		$day			Day number
 *	@param	int 		$month			Month number
 *  @param	int			$year			Year number
 *	@return int							Week number
 */
function getWeekNumber($day, $month, $year)
{
}