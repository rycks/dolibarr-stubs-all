<?php

namespace Sabre\CalDAV;

/**
 * This unittest is created to check if the time-range filter is working correctly with all-day-events
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Issue228Test extends \Sabre\DAVServerTest
{
    protected $setupCalDAV = true;
    protected $caldavCalendars = [['id' => 1, 'name' => 'Calendar', 'principaluri' => 'principals/user1', 'uri' => 'calendar1']];
    protected $caldavCalendarObjects = [1 => ['event.ics' => ['calendardata' => 'BEGIN:VCALENDAR
VERSION:2.0
BEGIN:VEVENT
UID:20120730T113415CEST-6804EGphkd@xxxxxx.de
DTSTAMP:20120730T093415Z
DTSTART;VALUE=DATE:20120729
DTEND;VALUE=DATE:20120730
SUMMARY:sunday event
TRANSP:TRANSPARENT
END:VEVENT
END:VCALENDAR
']]];
    function testIssue228()
    {
    }
}