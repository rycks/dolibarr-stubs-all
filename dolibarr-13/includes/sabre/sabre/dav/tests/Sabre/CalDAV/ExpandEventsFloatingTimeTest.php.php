<?php

namespace Sabre\CalDAV;

/**
 * This unittest is created to check if expand() works correctly with
 * floating times (using calendar-timezone information).
 */
class ExpandEventsFloatingTimeTest extends \Sabre\DAVServerTest
{
    protected $setupCalDAV = true;
    protected $setupCalDAVICSExport = true;
    protected $caldavCalendars = [['id' => 1, 'name' => 'Calendar', 'principaluri' => 'principals/user1', 'uri' => 'calendar1', '{urn:ietf:params:xml:ns:caldav}calendar-timezone' => 'BEGIN:VCALENDAR
VERSION:2.0
CALSCALE:GREGORIAN
BEGIN:VTIMEZONE
TZID:Europe/Berlin
BEGIN:DAYLIGHT
TZOFFSETFROM:+0100
RRULE:FREQ=YEARLY;BYMONTH=3;BYDAY=-1SU
DTSTART:19810329T020000
TZNAME:GMT+2
TZOFFSETTO:+0200
END:DAYLIGHT
BEGIN:STANDARD
TZOFFSETFROM:+0200
RRULE:FREQ=YEARLY;BYMONTH=10;BYDAY=-1SU
DTSTART:19961027T030000
TZNAME:GMT+1
TZOFFSETTO:+0100
END:STANDARD
END:VTIMEZONE
END:VCALENDAR']];
    protected $caldavCalendarObjects = [1 => ['event.ics' => ['calendardata' => 'BEGIN:VCALENDAR
VERSION:2.0
CALSCALE:GREGORIAN
BEGIN:VEVENT
CREATED:20140701T143658Z
UID:dba46fe8-1631-4d98-a575-97963c364dfe
DTEND:20141108T073000
TRANSP:OPAQUE
SUMMARY:Floating Time event, starting 05:30am Europe/Berlin
DTSTART:20141108T053000
DTSTAMP:20140701T143706Z
SEQUENCE:1
END:VEVENT
END:VCALENDAR
']]];
    function testExpandCalendarQuery()
    {
    }
    function testExpandMultiGet()
    {
    }
    function testExpandExport()
    {
    }
}