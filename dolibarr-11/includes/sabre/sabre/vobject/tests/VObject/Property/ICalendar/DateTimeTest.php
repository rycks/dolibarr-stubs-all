<?php

namespace Sabre\VObject\Property\ICalendar;

class DateTimeTest extends \PHPUnit_Framework_TestCase
{
    protected $vcal;
    function setUp()
    {
    }
    function testSetDateTime()
    {
    }
    function testSetDateTimeLOCAL()
    {
    }
    function testSetDateTimeUTC()
    {
    }
    function testSetDateTimeFromUnixTimestamp()
    {
    }
    function testSetDateTimeLOCALTZ()
    {
    }
    function testSetDateTimeDATE()
    {
    }
    function testSetValue()
    {
    }
    function testSetValueArray()
    {
    }
    function testSetParts()
    {
    }
    function testSetPartsStrings()
    {
    }
    function testGetDateTimeCached()
    {
    }
    function testGetDateTimeDateNULL()
    {
    }
    function testGetDateTimeDateDATE()
    {
    }
    function testGetDateTimeDateDATEReferenceTimeZone()
    {
    }
    function testGetDateTimeDateFloating()
    {
    }
    function testGetDateTimeDateFloatingReferenceTimeZone()
    {
    }
    function testGetDateTimeDateUTC()
    {
    }
    function testGetDateTimeDateLOCALTZ()
    {
    }
    /**
     * @expectedException \Sabre\VObject\InvalidDataException
     */
    function testGetDateTimeDateInvalid()
    {
    }
    function testGetDateTimeWeirdTZ()
    {
    }
    function testGetDateTimeBadTimeZone()
    {
    }
    function testUpdateValueParameter()
    {
    }
    function testValidate()
    {
    }
    /**
     * This issue was discovered on the sabredav mailing list.
     */
    function testCreateDatePropertyThroughAdd()
    {
    }
}