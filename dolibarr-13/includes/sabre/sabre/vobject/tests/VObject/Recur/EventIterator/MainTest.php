<?php

namespace Sabre\VObject\Recur\EventIterator;

class MainTest extends \PHPUnit_Framework_TestCase
{
    function testValues()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     * @depends testValues
     */
    function testInvalidFreq()
    {
    }
    /**
     * @expectedException InvalidArgumentException
     */
    function testVCalendarNoUID()
    {
    }
    /**
     * @expectedException InvalidArgumentException
     */
    function testVCalendarInvalidUID()
    {
    }
    /**
     * @depends testValues
     */
    function testHourly()
    {
    }
    /**
     * @depends testValues
     */
    function testDaily()
    {
    }
    /**
     * @depends testValues
     */
    function testNoRRULE()
    {
    }
    /**
     * @depends testValues
     */
    function testDailyByDayByHour()
    {
    }
    /**
     * @depends testValues
     */
    function testDailyByHour()
    {
    }
    /**
     * @depends testValues
     */
    function testDailyByDay()
    {
    }
    /**
     * @depends testValues
     */
    function testWeekly()
    {
    }
    /**
     * @depends testValues
     */
    function testWeeklyByDayByHour()
    {
    }
    /**
     * @depends testValues
     */
    function testWeeklyByDaySpecificHour()
    {
    }
    /**
     * @depends testValues
     */
    function testWeeklyByDay()
    {
    }
    /**
     * @depends testValues
     */
    function testMonthly()
    {
    }
    /**
     * @depends testValues
     */
    function testMonthlyEndOfMonth()
    {
    }
    /**
     * @depends testValues
     */
    function testMonthlyByMonthDay()
    {
    }
    /**
     * A pretty slow test. Had to be marked as 'medium' for phpunit to not die
     * after 1 second. Would be good to optimize later.
     *
     * @depends testValues
     * @medium
     */
    function testMonthlyByDay()
    {
    }
    /**
     * @depends testValues
     */
    function testMonthlyByDayByMonthDay()
    {
    }
    /**
     * @depends testValues
     */
    function testMonthlyByDayBySetPos()
    {
    }
    /**
     * @depends testValues
     */
    function testYearly()
    {
    }
    /**
     * @depends testValues
     */
    function testYearlyLeapYear()
    {
    }
    /**
     * @depends testValues
     */
    function testYearlyByMonth()
    {
    }
    /**
     * @depends testValues
     */
    function testYearlyByMonthByDay()
    {
    }
    /**
     * @depends testValues
     */
    function testFastForward()
    {
    }
    /**
     * @depends testValues
     */
    function testFastForwardAllDayEventThatStopAtTheStartTime()
    {
    }
    /**
     * @depends testValues
     */
    function testComplexExclusions()
    {
    }
    /**
     * @depends testValues
     */
    function testOverridenEvent()
    {
    }
    /**
     * @depends testValues
     */
    function testOverridenEvent2()
    {
    }
    /**
     * @depends testValues
     */
    function testOverridenEventNoValuesExpected()
    {
    }
    /**
     * @depends testValues
     */
    function testRDATE()
    {
    }
    /**
     * @depends testValues
     * @expectedException \InvalidArgumentException
     */
    function testNoMasterBadUID()
    {
    }
}