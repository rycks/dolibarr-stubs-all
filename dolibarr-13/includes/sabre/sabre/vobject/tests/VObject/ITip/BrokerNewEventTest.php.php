<?php

namespace Sabre\VObject\ITip;

class BrokerNewEventTest extends \Sabre\VObject\ITip\BrokerTester
{
    function testNoAttendee()
    {
    }
    function testVTODO()
    {
    }
    function testSimpleInvite()
    {
    }
    /**
     * @expectedException \Sabre\VObject\ITip\ITipException
     */
    function testBrokenEventUIDMisMatch()
    {
    }
    /**
     * @expectedException \Sabre\VObject\ITip\ITipException
     */
    function testBrokenEventOrganizerMisMatch()
    {
    }
    function testRecurrenceInvite()
    {
    }
    function testRecurrenceInvite2()
    {
    }
    function testScheduleAgentClient()
    {
    }
    /**
     * @expectedException Sabre\VObject\ITip\ITipException
     */
    function testMultipleUID()
    {
    }
    /**
     * @expectedException Sabre\VObject\ITip\SameOrganizerForAllComponentsException
     */
    function testChangingOrganizers()
    {
    }
    function testNoOrganizerHasAttendee()
    {
    }
}