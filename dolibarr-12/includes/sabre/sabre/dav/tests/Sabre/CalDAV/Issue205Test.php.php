<?php

namespace Sabre\CalDAV;

/**
 * This unittest is created to check if a VALARM TRIGGER of PT0S is supported
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Issue205Test extends \Sabre\DAVServerTest
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
SUMMARY:original summary
TRANSP:OPAQUE
BEGIN:VALARM
ACTION:AUDIO
ATTACH;VALUE=URI:Basso
TRIGGER:PT0S
END:VALARM
END:VEVENT
END:VCALENDAR
']]];
    function testIssue205()
    {
    }
}