<?php

namespace Sabre\CalDAV\Schedule;

class ScheduleDeliverTest extends \Sabre\DAVServerTest
{
    use \Sabre\VObject\PHPUnitAssertions;
    public $setupCalDAV = true;
    public $setupCalDAVScheduling = true;
    public $setupACL = true;
    public $autoLogin = 'user1';
    public $caldavCalendars = [['principaluri' => 'principals/user1', 'uri' => 'cal'], ['principaluri' => 'principals/user2', 'uri' => 'cal']];
    function setUp()
    {
    }
    function testNewInvite()
    {
    }
    function testNewOnWrongCollection()
    {
    }
    function testNewInviteSchedulingDisabled()
    {
    }
    function testUpdatedInvite()
    {
    }
    function testUpdatedInviteSchedulingDisabled()
    {
    }
    function testUpdatedInviteWrongPath()
    {
    }
    function testDeletedInvite()
    {
    }
    function testDeletedInviteSchedulingDisabled()
    {
    }
    /**
     * A MOVE request will trigger an unbind on a scheduling resource.
     *
     * However, we must not treat it as a cancellation, it just got moved to a
     * different calendar.
     */
    function testUnbindIgnoredOnMove()
    {
    }
    function testDeletedInviteWrongUrl()
    {
    }
    function testReply()
    {
    }
    function testInviteUnknownUser()
    {
    }
    function testInviteNoInboxUrl()
    {
    }
    function testInviteNoCalendarHomeSet()
    {
    }
    function testInviteNoDefaultCalendar()
    {
    }
    function testInviteNoScheduler()
    {
    }
    function testInviteNoACLPlugin()
    {
    }
    protected $calendarObjectUri;
    function deliver($oldObject, &$newObject, $disableScheduling = false)
    {
    }
    /**
     * Creates or updates a node at the specified path.
     *
     * This circumvents sabredav's internal server apis, so all events and
     * access control is skipped.
     *
     * @param string $path
     * @param string $data
     * @return void
     */
    function putPath($path, $data)
    {
    }
    function assertItemsInInbox($user, $count)
    {
    }
}