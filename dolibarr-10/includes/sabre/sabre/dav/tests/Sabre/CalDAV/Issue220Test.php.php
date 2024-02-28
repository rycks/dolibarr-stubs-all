<?php

namespace Sabre\CalDAV;

/**
 * This unittest is created to check for an endless loop in CalendarQueryValidator
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Issue220Test extends \Sabre\DAVServerTest
{
    protected $setupCalDAV = true;
    protected $caldavCalendars = [['id' => 1, 'name' => 'Calendar', 'principaluri' => 'principals/user1', 'uri' => 'calendar1']];
    protected $caldavCalendarObjects = [1 => ['event.ics' => ['calendardata' => 'BEGIN:VCALENDAR
VERSION:2.0
BEGIN:VEVENT
DTSTART;TZID=Europe/Berlin:20120601T180000
SUMMARY:Brot backen
RRULE:FREQ=DAILY;INTERVAL=1;WKST=MO
TRANSP:OPAQUE
DURATION:PT20M
LAST-MODIFIED:20120601T064634Z
CREATED:20120601T064634Z
DTSTAMP:20120601T064634Z
UID:b64f14c5-dccc-4eda-947f-bdb1f763fbcd
BEGIN:VALARM
TRIGGER;VALUE=DURATION:-PT5M
ACTION:DISPLAY
DESCRIPTION:Default Event Notification
X-WR-ALARMUID:cd952c1b-b3d6-41fb-b0a6-ec3a1a5bdd58
END:VALARM
END:VEVENT
BEGIN:VEVENT
DTSTART;TZID=Europe/Berlin:20120606T180000
SUMMARY:Brot backen
TRANSP:OPAQUE
STATUS:CANCELLED
DTEND;TZID=Europe/Berlin:20120606T182000
LAST-MODIFIED:20120605T094310Z
SEQUENCE:1
RECURRENCE-ID:20120606T160000Z
UID:b64f14c5-dccc-4eda-947f-bdb1f763fbcd
END:VEVENT
END:VCALENDAR
']]];
    function testIssue220()
    {
    }
}