<?php

namespace Sabre\VObject\ITip;

class BrokerAttendeeReplyTest extends \Sabre\VObject\ITip\BrokerTester
{
    function testAccepted()
    {
    }
    function testRecurringReply()
    {
    }
    function testRecurringAllDay()
    {
    }
    function testNoChange()
    {
    }
    function testNoChangeForceSend()
    {
    }
    function testNoRelevantAttendee()
    {
    }
    /**
     * In this test, an event exists in an attendees calendar. The event
     * is recurring, and the attendee deletes 1 instance of the event.
     * This instance shows up in EXDATE
     *
     * This should automatically generate a DECLINED message for that
     * specific instance.
     */
    function testCreateReplyByException()
    {
    }
    /**
     * This test is identical to the last, but now we're working with
     * timezones.
     *
     * @depends testCreateReplyByException
     */
    function testCreateReplyByExceptionTz()
    {
    }
    /**
     * @depends testCreateReplyByException
     */
    function testCreateReplyByExceptionAllDay()
    {
    }
    function testDeclined()
    {
    }
    function testDeclinedCancelledEvent()
    {
    }
    /**
     * In this test, a new exception is created by an attendee as well.
     *
     * Except in this case, there was already an overridden event, and the
     * overridden event was marked as cancelled by the attendee.
     *
     * For any other attendence status, the new status would have been
     * declined, but for this, no message should we sent.
     */
    function testDontCreateReplyWhenEventWasDeclined()
    {
    }
    function testScheduleAgentOnOrganizer()
    {
    }
    function testAcceptedAllDay()
    {
    }
    /**
     * This function tests an attendee updating their status to an event where
     * they don't have the master event of.
     *
     * This is possible in cases an organizer created a recurring event, and
     * invited an attendee for one instance of the event.
     */
    function testReplyNoMasterEvent()
    {
    }
    /**
     * A party crasher is an attendee that accepted an event, but was not in
     * any original invite.
     *
     * @depends testAccepted
     */
    function testPartyCrasher()
    {
    }
}