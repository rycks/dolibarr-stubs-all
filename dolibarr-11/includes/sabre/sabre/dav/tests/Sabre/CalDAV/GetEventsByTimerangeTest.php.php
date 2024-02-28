<?php

namespace Sabre\CalDAV;

/**
 * This unittest is created to check if queries for time-range include the start timestamp or not
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class GetEventsByTimerangeTest extends \Sabre\DAVServerTest
{
    protected $setupCalDAV = true;
    protected $caldavCalendars = [['id' => 1, 'name' => 'Calendar', 'principaluri' => 'principals/user1', 'uri' => 'calendar1']];
    protected $caldavCalendarObjects = [1 => ['event.ics' => ['calendardata' => 'BEGIN:VCALENDAR
VERSION:2.0
BEGIN:VEVENT
CREATED:20120313T142342Z
UID:171EBEFC-C951-499D-B234-7BA7D677B45D
DTEND;TZID=Europe/Berlin:20120227T010000
TRANSP:OPAQUE
SUMMARY:Monday 0h
DTSTART;TZID=Europe/Berlin:20120227T000000
DTSTAMP:20120313T142416Z
SEQUENCE:4
END:VEVENT
END:VCALENDAR
']]];
    function testQueryTimerange()
    {
    }
}