<?php

namespace Sabre\CalDAV;

class JCalTransformTest extends \Sabre\DAVServerTest
{
    use \Sabre\VObject\PHPUnitAssertions;
    protected $setupCalDAV = true;
    protected $caldavCalendars = [['id' => 1, 'principaluri' => 'principals/user1', 'uri' => 'foo']];
    protected $caldavCalendarObjects = [1 => ['bar.ics' => ['uri' => 'bar.ics', 'calendarid' => 1, 'calendardata' => "BEGIN:VCALENDAR\r\nBEGIN:VEVENT\r\nEND:VEVENT\r\nEND:VCALENDAR\r\n", 'lastmodified' => null]]];
    function testGet()
    {
    }
    function testMultiGet()
    {
    }
    function testCalendarQueryDepth1()
    {
    }
    function testCalendarQueryDepth0()
    {
    }
    function testValidateICalendar()
    {
    }
}