<?php

namespace Sabre\VObject;

/**
 * DateTimeParser.
 *
 * This class is responsible for parsing the several different date and time
 * formats iCalendar and vCards have.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class DateTimeParser
{
    /**
     * Parses an iCalendar (rfc5545) formatted datetime and returns a
     * DateTimeImmutable object.
     *
     * Specifying a reference timezone is optional. It will only be used
     * if the non-UTC format is used. The argument is used as a reference, the
     * returned DateTimeImmutable object will still be in the UTC timezone.
     *
     * @param string $dt
     * @param DateTimeZone $tz
     *
     * @return DateTimeImmutable
     */
    static function parseDateTime($dt, \DateTimeZone $tz = null)
    {
    }
    /**
     * Parses an iCalendar (rfc5545) formatted date and returns a DateTimeImmutable object.
     *
     * @param string $date
     * @param DateTimeZone $tz
     *
     * @return DateTimeImmutable
     */
    static function parseDate($date, \DateTimeZone $tz = null)
    {
    }
    /**
     * Parses an iCalendar (RFC5545) formatted duration value.
     *
     * This method will either return a DateTimeInterval object, or a string
     * suitable for strtotime or DateTime::modify.
     *
     * @param string $duration
     * @param bool $asString
     *
     * @return DateInterval|string
     */
    static function parseDuration($duration, $asString = false)
    {
    }
    /**
     * Parses either a Date or DateTime, or Duration value.
     *
     * @param string $date
     * @param DateTimeZone|string $referenceTz
     *
     * @return DateTimeImmutable|DateInterval
     */
    static function parse($date, $referenceTz = null)
    {
    }
    /**
     * This method parses a vCard date and or time value.
     *
     * This can be used for the DATE, DATE-TIME, TIMESTAMP and
     * DATE-AND-OR-TIME value.
     *
     * This method returns an array, not a DateTime value.
     *
     * The elements in the array are in the following order:
     * year, month, date, hour, minute, second, timezone
     *
     * Almost any part of the string may be omitted. It's for example legal to
     * just specify seconds, leave out the year, etc.
     *
     * Timezone is either returned as 'Z' or as '+0800'
     *
     * For any non-specified values null is returned.
     *
     * List of date formats that are supported:
     * YYYY
     * YYYY-MM
     * YYYYMMDD
     * --MMDD
     * ---DD
     *
     * YYYY-MM-DD
     * --MM-DD
     * ---DD
     *
     * List of supported time formats:
     *
     * HH
     * HHMM
     * HHMMSS
     * -MMSS
     * --SS
     *
     * HH
     * HH:MM
     * HH:MM:SS
     * -MM:SS
     * --SS
     *
     * A full basic-format date-time string looks like :
     * 20130603T133901
     *
     * A full extended-format date-time string looks like :
     * 2013-06-03T13:39:01
     *
     * Times may be postfixed by a timezone offset. This can be either 'Z' for
     * UTC, or a string like -0500 or +1100.
     *
     * @param string $date
     *
     * @return array
     */
    static function parseVCardDateTime($date)
    {
    }
    /**
     * This method parses a vCard TIME value.
     *
     * This method returns an array, not a DateTime value.
     *
     * The elements in the array are in the following order:
     * hour, minute, second, timezone
     *
     * Almost any part of the string may be omitted. It's for example legal to
     * just specify seconds, leave out the hour etc.
     *
     * Timezone is either returned as 'Z' or as '+08:00'
     *
     * For any non-specified values null is returned.
     *
     * List of supported time formats:
     *
     * HH
     * HHMM
     * HHMMSS
     * -MMSS
     * --SS
     *
     * HH
     * HH:MM
     * HH:MM:SS
     * -MM:SS
     * --SS
     *
     * A full basic-format time string looks like :
     * 133901
     *
     * A full extended-format time string looks like :
     * 13:39:01
     *
     * Times may be postfixed by a timezone offset. This can be either 'Z' for
     * UTC, or a string like -0500 or +11:00.
     *
     * @param string $date
     *
     * @return array
     */
    static function parseVCardTime($date)
    {
    }
    /**
     * This method parses a vCard date and or time value.
     *
     * This can be used for the DATE, DATE-TIME and
     * DATE-AND-OR-TIME value.
     *
     * This method returns an array, not a DateTime value.
     * The elements in the array are in the following order:
     *     year, month, date, hour, minute, second, timezone
     * Almost any part of the string may be omitted. It's for example legal to
     * just specify seconds, leave out the year, etc.
     *
     * Timezone is either returned as 'Z' or as '+0800'
     *
     * For any non-specified values null is returned.
     *
     * List of date formats that are supported:
     *     20150128
     *     2015-01
     *     --01
     *     --0128
     *     ---28
     *
     * List of supported time formats:
     *     13
     *     1353
     *     135301
     *     -53
     *     -5301
     *     --01 (unreachable, see the tests)
     *     --01Z
     *     --01+1234
     *
     * List of supported date-time formats:
     *     20150128T13
     *     --0128T13
     *     ---28T13
     *     ---28T1353
     *     ---28T135301
     *     ---28T13Z
     *     ---28T13+1234
     *
     * See the regular expressions for all the possible patterns.
     *
     * Times may be postfixed by a timezone offset. This can be either 'Z' for
     * UTC, or a string like -0500 or +1100.
     *
     * @param string $date
     *
     * @return array
     */
    static function parseVCardDateAndOrTime($date)
    {
    }
}