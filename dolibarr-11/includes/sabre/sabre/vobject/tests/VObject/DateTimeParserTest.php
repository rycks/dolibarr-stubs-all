<?php

namespace Sabre\VObject;

class DateTimeParserTest extends \PHPUnit_Framework_TestCase
{
    function testParseICalendarDuration()
    {
    }
    function testParseICalendarDurationDateInterval()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testParseICalendarDurationFail()
    {
    }
    function testParseICalendarDateTime()
    {
    }
    /**
     * @depends testParseICalendarDateTime
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testParseICalendarDateTimeBadFormat()
    {
    }
    /**
     * @depends testParseICalendarDateTime
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testParseICalendarDateTimeInvalidTime()
    {
    }
    /**
     * @depends testParseICalendarDateTime
     */
    function testParseICalendarDateTimeUTC()
    {
    }
    /**
     * @depends testParseICalendarDateTime
     */
    function testParseICalendarDateTimeUTC2()
    {
    }
    /**
     * @depends testParseICalendarDateTime
     */
    function testParseICalendarDateTimeCustomTimeZone()
    {
    }
    function testParseICalendarDate()
    {
    }
    /**
     * TCheck if a date with year > 4000 will not throw an exception. iOS seems to use 45001231 in yearly recurring events
     */
    function testParseICalendarDateGreaterThan4000()
    {
    }
    /**
     * Check if a datetime with year > 4000 will not throw an exception. iOS seems to use 45001231T235959 in yearly recurring events
     */
    function testParseICalendarDateTimeGreaterThan4000()
    {
    }
    /**
     * @depends testParseICalendarDate
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testParseICalendarDateBadFormat()
    {
    }
    /**
     * @depends testParseICalendarDate
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testParseICalendarDateInvalidDate()
    {
    }
    /**
     * @dataProvider vcardDates
     */
    function testVCardDate($input, $output)
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testBadVCardDate()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testBadVCardTime()
    {
    }
    function vcardDates()
    {
    }
    function testDateAndOrTime_DateWithYearMonthDay()
    {
    }
    function testDateAndOrTime_DateWithYearMonth()
    {
    }
    function testDateAndOrTime_DateWithMonth()
    {
    }
    function testDateAndOrTime_DateWithMonthDay()
    {
    }
    function testDateAndOrTime_DateWithDay()
    {
    }
    function testDateAndOrTime_TimeWithHour()
    {
    }
    function testDateAndOrTime_TimeWithHourMinute()
    {
    }
    function testDateAndOrTime_TimeWithHourSecond()
    {
    }
    function testDateAndOrTime_TimeWithMinute()
    {
    }
    function testDateAndOrTime_TimeWithMinuteSecond()
    {
    }
    function testDateAndOrTime_TimeWithSecond()
    {
    }
    function testDateAndOrTime_TimeWithSecondZ()
    {
    }
    function testDateAndOrTime_TimeWithSecondTZ()
    {
    }
    function testDateAndOrTime_DateTimeWithYearMonthDayHour()
    {
    }
    function testDateAndOrTime_DateTimeWithMonthDayHour()
    {
    }
    function testDateAndOrTime_DateTimeWithDayHour()
    {
    }
    function testDateAndOrTime_DateTimeWithDayHourMinute()
    {
    }
    function testDateAndOrTime_DateTimeWithDayHourMinuteSecond()
    {
    }
    function testDateAndOrTime_DateTimeWithDayHourZ()
    {
    }
    function testDateAndOrTime_DateTimeWithDayHourTZ()
    {
    }
    protected function assertDateAndOrTimeEqualsTo($date, $parts)
    {
    }
}