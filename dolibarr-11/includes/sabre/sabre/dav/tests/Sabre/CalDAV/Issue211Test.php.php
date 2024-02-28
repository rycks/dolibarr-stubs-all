<?php

namespace Sabre\CalDAV;

/**
 * This unittest is created to check for an endless loop in Sabre\CalDAV\CalendarQueryValidator
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Issue211Test extends \Sabre\DAVServerTest
{
    protected $setupCalDAV = true;
    protected $caldavCalendars = [['id' => 1, 'name' => 'Calendar', 'principaluri' => 'principals/user1', 'uri' => 'calendar1']];
    protected $caldavCalendarObjects = [1 => ['event.ics' => ['calendardata' => 'BEGIN:VCALENDAR
VERSION:2.0
BEGIN:VEVENT
UID:20120418T172519CEST-3510gh1hVw
DTSTAMP:20120418T152519Z
DTSTART;VALUE=DATE:20120330
DTEND;VALUE=DATE:20120531
EXDATE;TZID=Europe/Berlin:20120330T000000
RRULE:FREQ=YEARLY;INTERVAL=1
SEQUENCE:1
SUMMARY:Birthday
TRANSP:TRANSPARENT
BEGIN:VALARM
ACTION:EMAIL
ATTENDEE:MAILTO:xxx@domain.de
DESCRIPTION:Dies ist eine Kalender Erinnerung
SUMMARY:Kalender Alarm Erinnerung
TRIGGER;VALUE=DATE-TIME:20120329T060000Z
END:VALARM
END:VEVENT
END:VCALENDAR
']]];
    function testIssue211()
    {
    }
}