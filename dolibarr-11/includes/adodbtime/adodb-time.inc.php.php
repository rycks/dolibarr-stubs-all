<?php

/**
ADOdb Date Library, part of the ADOdb abstraction library
Download: http://phplens.com/phpeverywhere/

PHP native date functions use integer timestamps for computations.
Because of this, dates are restricted to the years 1901-2038 on Unix
and 1970-2038 on Windows due to integer overflow for dates beyond
those years. This library overcomes these limitations by replacing the
native function's signed integers (normally 32-bits) with PHP floating
point numbers (normally 64-bits).

Dates from 100 A.D. to 3000 A.D. and later
have been tested. The minimum is 100 A.D. as <100 will invoke the
2 => 4 digit year conversion. The maximum is billions of years in the
future, but this is a theoretical limit as the computation of that year
would take too long with the current implementation of adodb_mktime().

This library replaces native functions as follows:

<pre>
	getdate()  with  adodb_getdate()
	date()     with  adodb_date()
	gmdate()   with  adodb_gmdate()
	mktime()   with  adodb_mktime()
	gmmktime() with  adodb_gmmktime()
	strftime() with  adodb_strftime()
	strftime() with  adodb_gmstrftime()
</pre>

The parameters are identical, except that adodb_date() accepts a subset
of date()'s field formats. Mktime() will convert from local time to GMT,
and date() will convert from GMT to local time, but daylight savings is
not handled currently.

This library is independant of the rest of ADOdb, and can be used
as standalone code.

PERFORMANCE

For high speed, this library uses the native date functions where
possible, and only switches to PHP code when the dates fall outside
the 32-bit signed integer range.

GREGORIAN CORRECTION

Pope Gregory shortened October of A.D. 1582 by ten days. Thursday,
October 4, 1582 (Julian) was followed immediately by Friday, October 15,
1582 (Gregorian).

Since 0.06, we handle this correctly, so:

adodb_mktime(0,0,0,10,15,1582) - adodb_mktime(0,0,0,10,4,1582)
	== 24 * 3600 (1 day)

=============================================================================

COPYRIGHT

(c) 2003-2014 John Lim and released under BSD-style license except for code by
jackbbs, which includes adodb_mktime, adodb_get_gmt_diff, adodb_is_leap_year
and originally found at http://www.php.net/manual/en/function.mktime.php

=============================================================================

BUG REPORTS

These should be posted to the ADOdb forums at

	http://phplens.com/lens/lensforum/topics.php?id=4

=============================================================================

FUNCTION DESCRIPTIONS

** FUNCTION adodb_time()

Returns the current time measured in the number of seconds since the Unix Epoch (January 1 1970 00:00:00 GMT) as an unsigned integer.

** FUNCTION adodb_getdate($date=false)

Returns an array containing date information, as getdate(), but supports
dates greater than 1901 to 2038. The local date/time format is derived from a
heuristic the first time adodb_getdate is called.


** FUNCTION adodb_date($fmt, $timestamp = false)

Convert a timestamp to a formatted local date. If $timestamp is not defined, the
current timestamp is used. Unlike the function date(), it supports dates
outside the 1901 to 2038 range.

The format fields that adodb_date supports:

<pre>
	a - "am" or "pm"
	A - "AM" or "PM"
	d - day of the month, 2 digits with leading zeros; i.e. "01" to "31"
	D - day of the week, textual, 3 letters; e.g. "Fri"
	F - month, textual, long; e.g. "January"
	g - hour, 12-hour format without leading zeros; i.e. "1" to "12"
	G - hour, 24-hour format without leading zeros; i.e. "0" to "23"
	h - hour, 12-hour format; i.e. "01" to "12"
	H - hour, 24-hour format; i.e. "00" to "23"
	i - minutes; i.e. "00" to "59"
	j - day of the month without leading zeros; i.e. "1" to "31"
	l (lowercase 'L') - day of the week, textual, long; e.g. "Friday"
	L - boolean for whether it is a leap year; i.e. "0" or "1"
	m - month; i.e. "01" to "12"
	M - month, textual, 3 letters; e.g. "Jan"
	n - month without leading zeros; i.e. "1" to "12"
	O - Difference to Greenwich time in hours; e.g. "+0200"
	Q - Quarter, as in 1, 2, 3, 4
	r - RFC 2822 formatted date; e.g. "Thu, 21 Dec 2000 16:01:07 +0200"
	s - seconds; i.e. "00" to "59"
	S - English ordinal suffix for the day of the month, 2 characters;
	   			i.e. "st", "nd", "rd" or "th"
	t - number of days in the given month; i.e. "28" to "31"
	T - Timezone setting of this machine; e.g. "EST" or "MDT"
	U - seconds since the Unix Epoch (January 1 1970 00:00:00 GMT)
	w - day of the week, numeric, i.e. "0" (Sunday) to "6" (Saturday)
	Y - year, 4 digits; e.g. "1999"
	y - year, 2 digits; e.g. "99"
	z - day of the year; i.e. "0" to "365"
	Z - timezone offset in seconds (i.e. "-43200" to "43200").
	   			The offset for timezones west of UTC is always negative,
				and for those east of UTC is always positive.
</pre>

Unsupported:
<pre>
	B - Swatch Internet time
	I (capital i) - "1" if Daylight Savings Time, "0" otherwise.
	W - ISO-8601 week number of year, weeks starting on Monday

</pre>


** FUNCTION adodb_date2($fmt, $isoDateString = false)
Same as adodb_date, but 2nd parameter accepts iso date, eg.

  adodb_date2('d-M-Y H:i','2003-12-25 13:01:34');


** FUNCTION adodb_gmdate($fmt, $timestamp = false)

Convert a timestamp to a formatted GMT date. If $timestamp is not defined, the
current timestamp is used. Unlike the function date(), it supports dates
outside the 1901 to 2038 range.


** FUNCTION adodb_mktime($hr, $min, $sec[, $month, $day, $year])

Converts a local date to a unix timestamp.  Unlike the function mktime(), it supports
dates outside the 1901 to 2038 range. All parameters are optional.


** FUNCTION adodb_gmmktime($hr, $min, $sec [, $month, $day, $year])

Converts a gmt date to a unix timestamp.  Unlike the function gmmktime(), it supports
dates outside the 1901 to 2038 range. Differs from gmmktime() in that all parameters
are currently compulsory.

** FUNCTION adodb_gmstrftime($fmt, $timestamp = false)
Convert a timestamp to a formatted GMT date.

** FUNCTION adodb_strftime($fmt, $timestamp = false)

Convert a timestamp to a formatted local date. Internally converts $fmt into
adodb_date format, then echo result.

For best results, you can define the local date format yourself. Define a global
variable $ADODB_DATE_LOCALE which is an array, 1st element is date format using
adodb_date syntax, and 2nd element is the time format, also in adodb_date syntax.

    eg. $ADODB_DATE_LOCALE = array('d/m/Y','H:i:s');

	Supported format codes:

<pre>
	%a - abbreviated weekday name according to the current locale
	%A - full weekday name according to the current locale
	%b - abbreviated month name according to the current locale
	%B - full month name according to the current locale
	%c - preferred date and time representation for the current locale
	%d - day of the month as a decimal number (range 01 to 31)
	%D - same as %m/%d/%y
	%e - day of the month as a decimal number, a single digit is preceded by a space (range ' 1' to '31')
	%h - same as %b
	%H - hour as a decimal number using a 24-hour clock (range 00 to 23)
	%I - hour as a decimal number using a 12-hour clock (range 01 to 12)
	%m - month as a decimal number (range 01 to 12)
	%M - minute as a decimal number
	%n - newline character
	%p - either `am' or `pm' according to the given time value, or the corresponding strings for the current locale
	%r - time in a.m. and p.m. notation
	%R - time in 24 hour notation
	%S - second as a decimal number
	%t - tab character
	%T - current time, equal to %H:%M:%S
	%x - preferred date representation for the current locale without the time
	%X - preferred time representation for the current locale without the date
	%y - year as a decimal number without a century (range 00 to 99)
	%Y - year as a decimal number including the century
	%Z - time zone or name or abbreviation
	%% - a literal `%' character
</pre>

	Unsupported codes:
<pre>
	%C - century number (the year divided by 100 and truncated to an integer, range 00 to 99)
	%g - like %G, but without the century.
	%G - The 4-digit year corresponding to the ISO week number (see %V).
	     This has the same format and value as %Y, except that if the ISO week number belongs
		 to the previous or next year, that year is used instead.
	%j - day of the year as a decimal number (range 001 to 366)
	%u - weekday as a decimal number [1,7], with 1 representing Monday
	%U - week number of the current year as a decimal number, starting
	    with the first Sunday as the first day of the first week
	%V - The ISO 8601:1988 week number of the current year as a decimal number,
	     range 01 to 53, where week 1 is the first week that has at least 4 days in the
		 current year, and with Monday as the first day of the week. (Use %G or %g for
		 the year component that corresponds to the week number for the specified timestamp.)
	%w - day of the week as a decimal, Sunday being 0
	%W - week number of the current year as a decimal number, starting with the
	     first Monday as the first day of the first week
</pre>

=============================================================================

NOTES

Useful url for generating test timestamps:
	http://www.4webhelp.net/us/timestamp.php

Possible future optimizations include

a. Using an algorithm similar to Plauger's in "The Standard C Library"
(page 428, xttotm.c _Ttotm() function). Plauger's algorithm will not
work outside 32-bit signed range, so i decided not to implement it.

b. Implement daylight savings, which looks awfully complicated, see
	http://webexhibits.org/daylightsaving/


CHANGELOG
- 16 Jan 2011 0.36
Added adodb_time() which returns current time. If > 2038, will return as float

- 7 Feb 2011 0.35
Changed adodb_date to be symmetric with adodb_mktime. See $jan1_71. fix for bc.

- 13 July 2010 0.34
Changed adodb_get_gm_diff to use DateTimeZone().

- 11 Feb 2008 0.33
* Bug in 0.32 fix for hour handling. Fixed.

- 1 Feb 2008 0.32
* Now adodb_mktime(0,0,0,12+$m,20,2040) works properly.

- 10 Jan 2008 0.31
* Now adodb_mktime(0,0,0,24,1,2037) works correctly.

- 15 July 2007 0.30
Added PHP 5.2.0 compatability fixes.
 * gmtime behaviour for 1970 has changed. We use the actual date if it is between 1970 to 2038 to get the
 * timezone, otherwise we use the current year as the baseline to retrieve the timezone.
 * Also the timezone's in php 5.2.* support historical data better, eg. if timezone today was +8, but
   in 1970 it was +7:30, then php 5.2 return +7:30, while this library will use +8.
 *

- 19 March 2006 0.24
Changed strftime() locale detection, because some locales prepend the day of week to the date when %c is used.

- 10 Feb 2006 0.23
PHP5 compat: when we detect PHP5, the RFC2822 format for gmt 0000hrs is changed from -0000 to +0000.
	In PHP4, we will still use -0000 for 100% compat with PHP4.

- 08 Sept 2005 0.22
In adodb_date2(), $is_gmt not supported properly. Fixed.

- 18 July  2005 0.21
In PHP 4.3.11, the 'r' format has changed. Leading 0 in day is added. Changed for compat.
Added support for negative months in adodb_mktime().

- 24 Feb 2005 0.20
Added limited strftime/gmstrftime support. x10 improvement in performance of adodb_date().

- 21 Dec 2004 0.17
In adodb_getdate(), the timestamp was accidentally converted to gmt when $is_gmt is false.
Also adodb_mktime(0,0,0) did not work properly. Both fixed thx Mauro.

- 17 Nov 2004 0.16
Removed intval typecast in adodb_mktime() for secs, allowing:
	 adodb_mktime(0,0,0 + 2236672153,1,1,1934);
Suggested by Ryan.

- 18 July 2004 0.15
All params in adodb_mktime were formerly compulsory. Now only the hour, min, secs is compulsory.
This brings it more in line with mktime (still not identical).

- 23 June 2004 0.14

Allow you to define your own daylights savings function, adodb_daylight_sv.
If the function is defined (somewhere in an include), then you can correct for daylights savings.

In this example, we apply daylights savings in June or July, adding one hour. This is extremely
unrealistic as it does not take into account time-zone, geographic location, current year.

function adodb_daylight_sv(&$arr, $is_gmt)
{
	if ($is_gmt) return;
	$m = $arr['mon'];
	if ($m == 6 || $m == 7) $arr['hours'] += 1;
}

This is only called by adodb_date() and not by adodb_mktime().

The format of $arr is
Array (
   [seconds] => 0
   [minutes] => 0
   [hours] => 0
   [mday] => 1      # day of month, eg 1st day of the month
   [mon] => 2       # month (eg. Feb)
   [year] => 2102
   [yday] => 31     # days in current year
   [leap] =>        # true if leap year
   [ndays] => 28    # no of days in current month
   )


- 28 Apr 2004 0.13
Fixed adodb_date to properly support $is_gmt. Thx to Dimitar Angelov.

- 20 Mar 2004 0.12
Fixed month calculation error in adodb_date. 2102-June-01 appeared as 2102-May-32.

- 26 Oct 2003 0.11
Because of daylight savings problems (some systems apply daylight savings to
January!!!), changed adodb_get_gmt_diff() to ignore daylight savings.

- 9 Aug 2003 0.10
Fixed bug with dates after 2038.
See http://phplens.com/lens/lensforum/msgs.php?id=6980

- 1 July 2003 0.09
Added support for Q (Quarter).
Added adodb_date2(), which accepts ISO date in 2nd param

- 3 March 2003 0.08
Added support for 'S' adodb_date() format char. Added constant ADODB_ALLOW_NEGATIVE_TS
if you want PHP to handle negative timestamps between 1901 to 1969.

- 27 Feb 2003 0.07
All negative numbers handled by adodb now because of RH 7.3+ problems.
See http://bugs.php.net/bug.php?id=20048&edit=2

- 4 Feb 2003 0.06
Fixed a typo, 1852 changed to 1582! This means that pre-1852 dates
are now correctly handled.

- 29 Jan 2003 0.05

Leap year checking differs under Julian calendar (pre 1582). Also
leap year code optimized by checking for most common case first.

We also handle month overflow correctly in mktime (eg month set to 13).

Day overflow for less than one month's days is supported.

- 28 Jan 2003 0.04

Gregorian correction handled. In PHP5, we might throw an error if
mktime uses invalid dates around 5-14 Oct 1582. Released with ADOdb 3.10.
Added limbo 5-14 Oct 1582 check, when we set to 15 Oct 1582.

- 27 Jan 2003 0.03

Fixed some more month problems due to gmt issues. Added constant ADODB_DATE_VERSION.
Fixed calculation of days since start of year for <1970.

- 27 Jan 2003 0.02

Changed _adodb_getdate() to inline leap year checking for better performance.
Fixed problem with time-zones west of GMT +0000.

- 24 Jan 2003 0.01

First implementation.
*/
/* Initialization */
/*
	Version Number
*/
\define('ADODB_DATE_VERSION', 0.35);
\define('ADODB_NO_NEGATIVE_TS', 1);
function adodb_date_test_date($y1, $m, $d = 13)
{
}
function adodb_date_test_strftime($fmt)
{
}
/**
	 Test Suite
*/
function adodb_date_test()
{
}
function adodb_time()
{
}
/**
	Returns day of week, 0 = Sunday,... 6=Saturday.
	Algorithm from PEAR::Date_Calc
*/
function adodb_dow($year, $month, $day)
{
}
/**
 Checks for leap year, returns true if it is. No 2-digit year check. Also
 handles julian calendar correctly.
*/
function _adodb_is_leap_year($year)
{
}
/**
 checks for leap year, returns true if it is. Has 2-digit year check
*/
function adodb_is_leap_year($year)
{
}
/**
	Fix 2-digit years. Works for any century.
 	Assumes that if 2-digit is more than 30 years in future, then previous century.
*/
function adodb_year_digit_check($y)
{
}
function adodb_get_gmt_diff_ts($ts)
{
}
/**
 get local time zone offset from GMT. Does not handle historical timezones before 1970.
*/
function adodb_get_gmt_diff($y, $m, $d)
{
}
/**
	Returns an array with date info.
*/
function adodb_getdate($d = \false, $fast = \false)
{
}
function adodb_validdate($y, $m, $d)
{
}
/**
	Low-level function that returns the getdate() array. We have a special
	$fast flag, which if set to true, will return fewer array values,
	and is much faster as it does not calculate dow, etc.
*/
function _adodb_getdate($origd = \false, $fast = \false, $is_gmt = \false)
{
}
/*
		if ($isphp5)
				$dates .= sprintf('%s%04d',($gmt<=0)?'+':'-',abs($gmt)/36);
			else
				$dates .= sprintf('%s%04d',($gmt<0)?'+':'-',abs($gmt)/36);
			break;*/
function adodb_tz_offset($gmt, $isphp5)
{
}
function adodb_gmdate($fmt, $d = \false)
{
}
// accepts unix timestamp and iso date format in $d
function adodb_date2($fmt, $d = \false, $is_gmt = \false)
{
}
/**
	Return formatted date based on timestamp $d
*/
function adodb_date($fmt, $d = \false, $is_gmt = \false)
{
}
/**
	Returns a timestamp given a GMT/UTC time.
	Note that $is_dst is not implemented and is ignored.
*/
function adodb_gmmktime($hr, $min, $sec, $mon = \false, $day = \false, $year = \false, $is_dst = \false)
{
}
/**
	Return a timestamp given a local time. Originally by jackbbs.
	Note that $is_dst is not implemented and is ignored.

	Not a very fast algorithm - O(n) operation. Could be optimized to O(1).
*/
function adodb_mktime($hr, $min, $sec, $mon = \false, $day = \false, $year = \false, $is_dst = \false, $is_gmt = \false)
{
}
function adodb_gmstrftime($fmt, $ts = \false)
{
}
// hack - convert to adodb_date
function adodb_strftime($fmt, $ts = \false, $is_gmt = \false)
{
}