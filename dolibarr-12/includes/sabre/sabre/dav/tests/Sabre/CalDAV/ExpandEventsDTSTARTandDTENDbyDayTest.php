<?php

namespace Sabre\CalDAV;

/**
 * This unittests is created to find out why recurring events have wrong DTSTART value
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ExpandEventsDTSTARTandDTENDbyDayTest extends \Sabre\DAVServerTest
{
    protected $setupCalDAV = true;
    protected $caldavCalendars = [['id' => 1, 'name' => 'Calendar', 'principaluri' => 'principals/user1', 'uri' => 'calendar1']];
    protected $caldavCalendarObjects = [1 => ['event.ics' => ['calendardata' => 'BEGIN:VCALENDAR
VERSION:2.0
BEGIN:VEVENT
UID:foobar
DTEND;TZID=Europe/Berlin:20120207T191500
RRULE:FREQ=WEEKLY;INTERVAL=1;BYDAY=TU,TH
SUMMARY:RecurringEvents on tuesday and thursday
DTSTART;TZID=Europe/Berlin:20120207T181500
END:VEVENT
END:VCALENDAR
']]];
    function testExpandRecurringByDayEvent()
    {
    }
}