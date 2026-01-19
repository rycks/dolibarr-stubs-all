<?php

namespace Sabre\CalDAV;

/**
 * This unittest is created to find out why an overwritten DAILY event has wrong DTSTART, DTEND, SUMMARY and RECURRENCEID
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Issue203Test extends \Sabre\DAVServerTest
{
    protected $setupCalDAV = true;
    protected $caldavCalendars = [['id' => 1, 'name' => 'Calendar', 'principaluri' => 'principals/user1', 'uri' => 'calendar1']];
    protected $caldavCalendarObjects = [1 => ['event.ics' => ['calendardata' => 'BEGIN:VCALENDAR
VERSION:2.0
BEGIN:VEVENT
UID:20120330T155305CEST-6585fBUVgV
DTSTAMP:20120330T135305Z
DTSTART;TZID=Europe/Berlin:20120326T155200
DTEND;TZID=Europe/Berlin:20120326T165200
RRULE:FREQ=DAILY;COUNT=2;INTERVAL=1
SUMMARY:original summary
TRANSP:OPAQUE
END:VEVENT
BEGIN:VEVENT
UID:20120330T155305CEST-6585fBUVgV
DTSTAMP:20120330T135352Z
DESCRIPTION:
DTSTART;TZID=Europe/Berlin:20120328T155200
DTEND;TZID=Europe/Berlin:20120328T165200
RECURRENCE-ID;TZID=Europe/Berlin:20120327T155200
SEQUENCE:1
SUMMARY:overwritten summary
TRANSP:OPAQUE
END:VEVENT
END:VCALENDAR
']]];
    function testIssue203()
    {
    }
}