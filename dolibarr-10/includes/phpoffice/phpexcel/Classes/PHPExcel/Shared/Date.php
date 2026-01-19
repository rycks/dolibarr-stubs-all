<?php

/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package	PHPExcel_Shared
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license	http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version	##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Shared_Date
 *
 * @category   PHPExcel
 * @package	PHPExcel_Shared
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Shared_Date
{
    /** constants */
    const CALENDAR_WINDOWS_1900 = 1900;
    //	Base date of 1st Jan 1900 = 1.0
    const CALENDAR_MAC_1904 = 1904;
    //	Base date of 2nd Jan 1904 = 1.0
    /*
     * Names of the months of the year, indexed by shortname
     * Planned usage for locale settings
     *
     * @public
     * @var	string[]
     */
    public static $_monthNames = array('Jan' => 'January', 'Feb' => 'February', 'Mar' => 'March', 'Apr' => 'April', 'May' => 'May', 'Jun' => 'June', 'Jul' => 'July', 'Aug' => 'August', 'Sep' => 'September', 'Oct' => 'October', 'Nov' => 'November', 'Dec' => 'December');
    /*
     * Names of the months of the year, indexed by shortname
     * Planned usage for locale settings
     *
     * @public
     * @var	string[]
     */
    public static $_numberSuffixes = array('st', 'nd', 'rd', 'th');
    /*
     * Base calendar year to use for calculations
     *
     * @private
     * @var	int
     */
    protected static $_excelBaseDate = self::CALENDAR_WINDOWS_1900;
    /**
     * Set the Excel calendar (Windows 1900 or Mac 1904)
     *
     * @param	 integer	$baseDate			Excel base date (1900 or 1904)
     * @return	 boolean						Success or failure
     */
    public static function setExcelCalendar($baseDate)
    {
    }
    //	function setExcelCalendar()
    /**
     * Return the Excel calendar (Windows 1900 or Mac 1904)
     *
     * @return	 integer	Excel base date (1900 or 1904)
     */
    public static function getExcelCalendar()
    {
    }
    //	function getExcelCalendar()
    /**
     *	Convert a date from Excel to PHP
     *
     *	@param		long		$dateValue			Excel date/time value
     *	@param		boolean		$adjustToTimezone	Flag indicating whether $dateValue should be treated as
     *													a UST timestamp, or adjusted to UST
     *	@param		string	 	$timezone			The timezone for finding the adjustment from UST
     *	@return		long		PHP serialized date/time
     */
    public static function ExcelToPHP($dateValue = 0, $adjustToTimezone = \FALSE, $timezone = \NULL)
    {
    }
    //	function ExcelToPHP()
    /**
     * Convert a date from Excel to a PHP Date/Time object
     *
     * @param	integer		$dateValue		Excel date/time value
     * @return	DateTime					PHP date/time object
     */
    public static function ExcelToPHPObject($dateValue = 0)
    {
    }
    //	function ExcelToPHPObject()
    /**
     *	Convert a date from PHP to Excel
     *
     *	@param	mixed		$dateValue			PHP serialized date/time or date object
     *	@param	boolean		$adjustToTimezone	Flag indicating whether $dateValue should be treated as
     *													a UST timestamp, or adjusted to UST
     *	@param	string	 	$timezone			The timezone for finding the adjustment from UST
     *	@return	mixed		Excel date/time value
     *							or boolean FALSE on failure
     */
    public static function PHPToExcel($dateValue = 0, $adjustToTimezone = \FALSE, $timezone = \NULL)
    {
    }
    //	function PHPToExcel()
    /**
     * FormattedPHPToExcel
     *
     * @param	long	$year
     * @param	long	$month
     * @param	long	$day
     * @param	long	$hours
     * @param	long	$minutes
     * @param	long	$seconds
     * @return  long				Excel date/time value
     */
    public static function FormattedPHPToExcel($year, $month, $day, $hours = 0, $minutes = 0, $seconds = 0)
    {
    }
    //	function FormattedPHPToExcel()
    /**
     * Is a given cell a date/time?
     *
     * @param	 PHPExcel_Cell	$pCell
     * @return	 boolean
     */
    public static function isDateTime(\PHPExcel_Cell $pCell)
    {
    }
    //	function isDateTime()
    /**
     * Is a given number format a date/time?
     *
     * @param	 PHPExcel_Style_NumberFormat	$pFormat
     * @return	 boolean
     */
    public static function isDateTimeFormat(\PHPExcel_Style_NumberFormat $pFormat)
    {
    }
    //	function isDateTimeFormat()
    private static $possibleDateFormatCharacters = 'eymdHs';
    /**
     * Is a given number format code a date/time?
     *
     * @param	 string	$pFormatCode
     * @return	 boolean
     */
    public static function isDateTimeFormatCode($pFormatCode = '')
    {
    }
    //	function isDateTimeFormatCode()
    /**
     * Convert a date/time string to Excel time
     *
     * @param	string	$dateValue		Examples: '2009-12-31', '2009-12-31 15:59', '2009-12-31 15:59:10'
     * @return	float|FALSE		Excel date/time serial value
     */
    public static function stringToExcel($dateValue = '')
    {
    }
    public static function monthStringToNumber($month)
    {
    }
    public static function dayStringToNumber($day)
    {
    }
}