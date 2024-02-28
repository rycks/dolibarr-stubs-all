<?php

namespace Sabre\CalDAV\Backend;

class AbstractTest extends \PHPUnit_Framework_TestCase
{
    function testUpdateCalendar()
    {
    }
    function testCalendarQuery()
    {
    }
    function testGetCalendarObjectByUID()
    {
    }
    function testGetMultipleCalendarObjects()
    {
    }
}
class AbstractMock extends \Sabre\CalDAV\Backend\AbstractBackend
{
    function getCalendarsForUser($principalUri)
    {
    }
    function createCalendar($principalUri, $calendarUri, array $properties)
    {
    }
    function deleteCalendar($calendarId)
    {
    }
    function getCalendarObjects($calendarId)
    {
    }
    function getCalendarObject($calendarId, $objectUri)
    {
    }
    function createCalendarObject($calendarId, $objectUri, $calendarData)
    {
    }
    function updateCalendarObject($calendarId, $objectUri, $calendarData)
    {
    }
    function deleteCalendarObject($calendarId, $objectUri)
    {
    }
}