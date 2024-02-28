<?php

namespace PhpOffice\PhpSpreadsheet\Shared;

class Date
{
    /** constants */
    const CALENDAR_WINDOWS_1900 = 1900;
    //    Base date of 1st Jan 1900 = 1.0
    const CALENDAR_MAC_1904 = 1904;
    //    Base date of 2nd Jan 1904 = 1.0
    /**
     * Names of the months of the year, indexed by shortname
     * Planned usage for locale settings.
     *
     * @var string[]
     */
    public static $monthNames = ['Jan' => 'January', 'Feb' => 'February', 'Mar' => 'March', 'Apr' => 'April', 'May' => 'May', 'Jun' => 'June', 'Jul' => 'July', 'Aug' => 'August', 'Sep' => 'September', 'Oct' => 'October', 'Nov' => 'November', 'Dec' => 'December'];
    /**
     * @var string[]
     */
    public static $numberSuffixes = ['st', 'nd', 'rd', 'th'];
    /**
     * Base calendar year to use for calculations
     * Value is either CALENDAR_WINDOWS_1900 (1900) or CALENDAR_MAC_1904 (1904).
     *
     * @var int
     */
    protected static $excelCalendar = self::CALENDAR_WINDOWS_1900;
    /**
     * Default timezone to use for DateTime objects.
     *
     * @var null|\DateTimeZone
     */
    protected static $defaultTimeZone;
    /**
     * Set the Excel calendar (Windows 1900 or Mac 1904).
     *
     * @param int $baseDate Excel base date (1900 or 1904)
     *
     * @return bool Success or failure
     */
    public static function setExcelCalendar($baseDate)
    {
    }
    /**
     * Return the Excel calendar (Windows 1900 or Mac 1904).
     *
     * @return int Excel base date (1900 or 1904)
     */
    public static function getExcelCalendar()
    {
    }
    /**
     * Set the Default timezone to use for dates.
     *
     * @param DateTimeZone|string $timeZone The timezone to set for all Excel datetimestamp to PHP DateTime Object conversions
     *
     * @throws \Exception
     *
     * @return bool Success or failure
     * @return bool Success or failure
     */
    public static function setDefaultTimezone($timeZone)
    {
    }
    /**
     * Return the Default timezone being used for dates.
     *
     * @return DateTimeZone The timezone being used as default for Excel timestamp to PHP DateTime object
     */
    public static function getDefaultTimezone()
    {
    }
    /**
     * Validate a timezone.
     *
     * @param DateTimeZone|string $timeZone The timezone to validate, either as a timezone string or object
     *
     * @throws \Exception
     *
     * @return DateTimeZone The timezone as a timezone object
     * @return DateTimeZone The timezone as a timezone object
     */
    protected static function validateTimeZone($timeZone)
    {
    }
    /**
     * Convert a MS serialized datetime value from Excel to a PHP Date/Time object.
     *
     * @param float|int $excelTimestamp MS Excel serialized date/time value
     * @param null|DateTimeZone|string $timeZone The timezone to assume for the Excel timestamp,
     *                                                                        if you don't want to treat it as a UTC value
     *                                                                    Use the default (UST) unless you absolutely need a conversion
     *
     * @throws \Exception
     *
     * @return \DateTime PHP date/time object
     */
    public static function excelToDateTimeObject($excelTimestamp, $timeZone = null)
    {
    }
    /**
     * Convert a MS serialized datetime value from Excel to a unix timestamp.
     *
     * @param float|int $excelTimestamp MS Excel serialized date/time value
     * @param null|DateTimeZone|string $timeZone The timezone to assume for the Excel timestamp,
     *                                                                        if you don't want to treat it as a UTC value
     *                                                                    Use the default (UST) unless you absolutely need a conversion
     *
     * @throws \Exception
     *
     * @return int Unix timetamp for this date/time
     */
    public static function excelToTimestamp($excelTimestamp, $timeZone = null)
    {
    }
    /**
     * Convert a date from PHP to an MS Excel serialized date/time value.
     *
     * @param mixed $dateValue Unix Timestamp or PHP DateTime object or a string
     *
     * @return bool|float Excel date/time value
     *                                  or boolean FALSE on failure
     */
    public static function PHPToExcel($dateValue)
    {
    }
    /**
     * Convert a PHP DateTime object to an MS Excel serialized date/time value.
     *
     * @param DateTimeInterface $dateValue PHP DateTime object
     *
     * @return float MS Excel serialized date/time value
     */
    public static function dateTimeToExcel(\DateTimeInterface $dateValue)
    {
    }
    /**
     * Convert a Unix timestamp to an MS Excel serialized date/time value.
     *
     * @param int $dateValue Unix Timestamp
     *
     * @return float MS Excel serialized date/time value
     */
    public static function timestampToExcel($dateValue)
    {
    }
    /**
     * formattedPHPToExcel.
     *
     * @param int $year
     * @param int $month
     * @param int $day
     * @param int $hours
     * @param int $minutes
     * @param int $seconds
     *
     * @return float Excel date/time value
     */
    public static function formattedPHPToExcel($year, $month, $day, $hours = 0, $minutes = 0, $seconds = 0)
    {
    }
    /**
     * Is a given cell a date/time?
     *
     * @param Cell $pCell
     *
     * @return bool
     */
    public static function isDateTime(\PhpOffice\PhpSpreadsheet\Cell\Cell $pCell)
    {
    }
    /**
     * Is a given number format a date/time?
     *
     * @param NumberFormat $pFormat
     *
     * @return bool
     */
    public static function isDateTimeFormat(\PhpOffice\PhpSpreadsheet\Style\NumberFormat $pFormat)
    {
    }
    private static $possibleDateFormatCharacters = 'eymdHs';
    /**
     * Is a given number format code a date/time?
     *
     * @param string $pFormatCode
     *
     * @return bool
     */
    public static function isDateTimeFormatCode($pFormatCode)
    {
    }
    /**
     * Convert a date/time string to Excel time.
     *
     * @param string $dateValue Examples: '2009-12-31', '2009-12-31 15:59', '2009-12-31 15:59:10'
     *
     * @return false|float Excel date/time serial value
     */
    public static function stringToExcel($dateValue)
    {
    }
    /**
     * Converts a month name (either a long or a short name) to a month number.
     *
     * @param string $month Month name or abbreviation
     *
     * @return int|string Month number (1 - 12), or the original string argument if it isn't a valid month name
     */
    public static function monthStringToNumber($month)
    {
    }
    /**
     * Strips an ordinal from a numeric value.
     *
     * @param string $day Day number with an ordinal
     *
     * @return int|string The integer value with any ordinal stripped, or the original string argument if it isn't a valid numeric
     */
    public static function dayStringToNumber($day)
    {
    }
}