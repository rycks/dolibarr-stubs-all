<?php

namespace Sabre\VObject\Recur;

class RRuleIteratorTest extends \PHPUnit_Framework_TestCase
{
    function testHourly()
    {
    }
    function testDaily()
    {
    }
    function testDailyByDayByHour()
    {
    }
    function testDailyByHour()
    {
    }
    function testDailyByDay()
    {
    }
    function testDailyCount()
    {
    }
    function testDailyByMonth()
    {
    }
    function testWeekly()
    {
    }
    function testWeeklyByDay()
    {
    }
    function testWeeklyByDay2()
    {
    }
    function testWeeklyByDayByHour()
    {
    }
    function testWeeklyByDaySpecificHour()
    {
    }
    function testMonthly()
    {
    }
    function testMonlthyEndOfMonth()
    {
    }
    function testMonthlyByMonthDay()
    {
    }
    function testMonthlyByDay()
    {
    }
    function testMonthlyByDayByMonthDay()
    {
    }
    function testMonthlyByDayBySetPos()
    {
    }
    function testYearly()
    {
    }
    function testYearlyLeapYear()
    {
    }
    function testYearlyByMonth()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testYearlyByMonthInvalidValue1()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testYearlyByMonthInvalidValue2()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testYearlyByMonthManyInvalidValues()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testYearlyByMonthEmptyValue()
    {
    }
    function testYearlyByMonthByDay()
    {
    }
    function testYearlyByYearDay()
    {
    }
    function testYearlyByYearDayMultiple()
    {
    }
    function testYearlyByYearDayByDay()
    {
    }
    function testYearlyByYearDayNegative()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testYearlyByYearDayInvalid390()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testYearlyByYearDayInvalid0()
    {
    }
    function testFastForward()
    {
    }
    /**
     * The bug that was in the
     * system before would fail on the 5th tuesday of the month, if the 5th
     * tuesday did not exist.
     *
     * A pretty slow test. Had to be marked as 'medium' for phpunit to not die
     * after 1 second. Would be good to optimize later.
     *
     * @medium
     */
    function testFifthTuesdayProblem()
    {
    }
    /**
     * This bug came from a Fruux customer. This would result in a never-ending
     * request.
     */
    function testFastFowardTooFar()
    {
    }
    function testValidByWeekNo()
    {
    }
    function testNegativeValidByWeekNo()
    {
    }
    function testTwoValidByWeekNo()
    {
    }
    function testValidByWeekNoByDayDefault()
    {
    }
    function testMultipleValidByWeekNo()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testInvalidByWeekNo()
    {
    }
    /**
     * This also at one point caused an infinite loop. We're keeping the test.
     */
    function testYearlyByMonthLoop()
    {
    }
    /**
     * Something, somewhere produced an ics with an interval set to 0. Because
     * this means we increase the current day (or week, month) by 0, this also
     * results in an infinite loop.
     *
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testZeroInterval()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testInvalidFreq()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testByDayBadOffset()
    {
    }
    function testUntilBeginHasTimezone()
    {
    }
    function testUntilBeforeDtStart()
    {
    }
    function testIgnoredStuff()
    {
    }
    function testMinusFifthThursday()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testUnsupportedPart()
    {
    }
    function testIteratorFunctions()
    {
    }
    function parse($rule, $start, $expected, $fastForward = null, $tz = 'UTC')
    {
    }
}