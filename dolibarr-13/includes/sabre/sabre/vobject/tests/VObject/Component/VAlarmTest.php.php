<?php

namespace Sabre\VObject\Component;

class VAlarmTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider timeRangeTestData
     */
    function testInTimeRange(\Sabre\VObject\Component\VAlarm $valarm, $start, $end, $outcome)
    {
    }
    function timeRangeTestData()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testInTimeRangeInvalidComponent()
    {
    }
    /**
     * This bug was found and reported on the mailing list.
     */
    function testInTimeRangeBuggy()
    {
    }
}