<?php

namespace Sabre\VObject;

class FreeBusyGeneratorTest extends \PHPUnit_Framework_TestCase
{
    use \Sabre\VObject\PHPUnitAssertions;
    function testGeneratorBaseObject()
    {
    }
    /**
     * @expectedException InvalidArgumentException
     */
    function testInvalidArg()
    {
    }
    /**
     * This function takes a list of objects (icalendar objects), and turns
     * them into a freebusy report.
     *
     * Then it takes the expected output and compares it to what we actually
     * got.
     *
     * It only generates the freebusy report for the following time-range:
     * 2011-01-01 11:00:00 until 2011-01-03 11:11:11
     *
     * @param string $expected
     * @param array $input
     * @param string|null $timeZone
     * @param string $vavailability
     * @return void
     */
    function assertFreeBusyReport($expected, $input, $timeZone = null, $vavailability = null)
    {
    }
    function testSimple()
    {
    }
    function testSource()
    {
    }
    /**
     * Testing TRANSP:OPAQUE
     */
    function testOpaque()
    {
    }
    /**
     * Testing TRANSP:TRANSPARENT
     */
    function testTransparent()
    {
    }
    /**
     * Testing STATUS:CANCELLED
     */
    function testCancelled()
    {
    }
    /**
     * Testing STATUS:TENTATIVE
     */
    function testTentative()
    {
    }
    /**
     * Testing an event that falls outside of the report time-range.
     */
    function testOutsideTimeRange()
    {
    }
    /**
     * Testing an event that falls outside of the report time-range.
     */
    function testOutsideTimeRange2()
    {
    }
    /**
     * Testing an event that uses DURATION
     */
    function testDuration()
    {
    }
    /**
     * Testing an all-day event
     */
    function testAllDay()
    {
    }
    /**
     * Testing an event that has no end or duration.
     */
    function testNoDuration()
    {
    }
    /**
     * Testing feeding the freebusy generator an object instead of a string.
     */
    function testObject()
    {
    }
    /**
     * Testing feeding VFREEBUSY objects instead of VEVENT
     */
    function testVFreeBusy()
    {
    }
    function testYearlyRecurrence()
    {
    }
    function testYearlyRecurrenceDuration()
    {
    }
    function testFloatingTime()
    {
    }
    function testFloatingTimeReferenceTimeZone()
    {
    }
    function testAllDay2()
    {
    }
    function testAllDayReferenceTimeZone()
    {
    }
    function testNoValidInstances()
    {
    }
    /**
     * This VAVAILABILITY object overlaps with the time-range, but we're just
     * busy the entire time.
     */
    function testVAvailabilitySimple()
    {
    }
    /**
     * This VAVAILABILITY object does not overlap at all with the freebusy
     * report, so it should be ignored.
     */
    function testVAvailabilityIrrelevant()
    {
    }
    /**
     * This VAVAILABILITY object has a 9am-5pm AVAILABLE object for office
     * hours.
     */
    function testVAvailabilityOfficeHours()
    {
    }
    /**
     * This test has the same office hours, but has a vacation blocked off for
     * the relevant time, using a higher priority. (lower number).
     */
    function testVAvailabilityOfficeHoursVacation()
    {
    }
    /**
     * This test has the same input as the last, except somebody mixed up the
     * PRIORITY values.
     *
     * The end-result is that the vacation VAVAILABILITY is completely ignored.
     */
    function testVAvailabilityOfficeHoursVacation2()
    {
    }
}