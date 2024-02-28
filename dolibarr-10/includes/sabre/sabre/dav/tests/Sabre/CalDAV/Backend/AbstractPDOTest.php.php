<?php

namespace Sabre\CalDAV\Backend;

abstract class AbstractPDOTest extends \PHPUnit_Framework_TestCase
{
    use \Sabre\DAV\DbTestHelperTrait;
    protected $pdo;
    function setUp()
    {
    }
    function testConstruct()
    {
    }
    /**
     * @depends testConstruct
     */
    function testGetCalendarsForUserNoCalendars()
    {
    }
    /**
     * @depends testConstruct
     */
    function testCreateCalendarAndFetch()
    {
    }
    /**
     * @depends testConstruct
     */
    function testUpdateCalendarAndFetch()
    {
    }
    /**
     * @depends testConstruct
     * @expectedException \InvalidArgumentException
     */
    function testUpdateCalendarBadId()
    {
    }
    /**
     * @depends testUpdateCalendarAndFetch
     */
    function testUpdateCalendarUnknownProperty()
    {
    }
    /**
     * @depends testCreateCalendarAndFetch
     */
    function testDeleteCalendar()
    {
    }
    /**
     * @depends testCreateCalendarAndFetch
     * @expectedException \InvalidArgumentException
     */
    function testDeleteCalendarBadID()
    {
    }
    /**
     * @depends testCreateCalendarAndFetch
     * @expectedException \Sabre\DAV\Exception
     */
    function testCreateCalendarIncorrectComponentSet()
    {
    }
    function testCreateCalendarObject()
    {
    }
    function testGetMultipleObjects()
    {
    }
    /**
     * @depends testGetMultipleObjects
     * @expectedException \InvalidArgumentException
     */
    function testGetMultipleObjectsBadId()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\BadRequest
     * @depends testCreateCalendarObject
     */
    function testCreateCalendarObjectNoComponent()
    {
    }
    /**
     * @depends testCreateCalendarObject
     */
    function testCreateCalendarObjectDuration()
    {
    }
    /**
     * @depends testCreateCalendarObject
     * @expectedException \InvalidArgumentException
     */
    function testCreateCalendarObjectBadId()
    {
    }
    /**
     * @depends testCreateCalendarObject
     */
    function testCreateCalendarObjectNoDTEND()
    {
    }
    /**
     * @depends testCreateCalendarObject
     */
    function testCreateCalendarObjectWithDTEND()
    {
    }
    /**
     * @depends testCreateCalendarObject
     */
    function testCreateCalendarObjectInfiniteRecurrence()
    {
    }
    /**
     * @depends testCreateCalendarObject
     */
    function testCreateCalendarObjectEndingRecurrence()
    {
    }
    /**
     * @depends testCreateCalendarObject
     */
    function testCreateCalendarObjectTask()
    {
    }
    /**
     * @depends testCreateCalendarObject
     */
    function testGetCalendarObjects()
    {
    }
    /**
     * @depends testGetCalendarObjects
     * @expectedException \InvalidArgumentException
     */
    function testGetCalendarObjectsBadId()
    {
    }
    /**
     * @depends testGetCalendarObjects
     * @expectedException \InvalidArgumentException
     */
    function testGetCalendarObjectBadId()
    {
    }
    /**
     * @depends testCreateCalendarObject
     */
    function testGetCalendarObjectByUID()
    {
    }
    /**
     * @depends testCreateCalendarObject
     */
    function testUpdateCalendarObject()
    {
    }
    /**
     * @depends testUpdateCalendarObject
     * @expectedException \InvalidArgumentException
     */
    function testUpdateCalendarObjectBadId()
    {
    }
    /**
     * @depends testCreateCalendarObject
     */
    function testDeleteCalendarObject()
    {
    }
    /**
     * @depends testDeleteCalendarObject
     * @expectedException \InvalidArgumentException
     */
    function testDeleteCalendarObjectBadId()
    {
    }
    function testCalendarQueryNoResult()
    {
    }
    /**
     * @expectedException \InvalidArgumentException
     * @depends testCalendarQueryNoResult
     */
    function testCalendarQueryBadId()
    {
    }
    function testCalendarQueryTodo()
    {
    }
    function testCalendarQueryTodoNotMatch()
    {
    }
    function testCalendarQueryNoFilter()
    {
    }
    function testCalendarQueryTimeRange()
    {
    }
    function testCalendarQueryTimeRangeNoEnd()
    {
    }
    function testGetChanges()
    {
    }
    /**
     * @depends testGetChanges
     * @expectedException \InvalidArgumentException
     */
    function testGetChangesBadId()
    {
    }
    function testCreateSubscriptions()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\Forbidden
     */
    function testCreateSubscriptionFail()
    {
    }
    function testUpdateSubscriptions()
    {
    }
    function testUpdateSubscriptionsFail()
    {
    }
    function testDeleteSubscriptions()
    {
    }
    function testSchedulingMethods()
    {
    }
    function testGetInvites()
    {
    }
    /**
     * @depends testGetInvites
     * @expectedException \InvalidArgumentException
     */
    function testGetInvitesBadId()
    {
    }
    /**
     * @depends testCreateCalendarAndFetch
     */
    function testUpdateInvites()
    {
    }
    /**
     * @depends testUpdateInvites
     * @expectedException \InvalidArgumentException
     */
    function testUpdateInvitesBadId()
    {
    }
    /**
     * @depends testUpdateInvites
     */
    function testUpdateInvitesNoPrincipal()
    {
    }
    /**
     * @depends testUpdateInvites
     */
    function testDeleteSharedCalendar()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\NotImplemented
     */
    function testSetPublishStatus()
    {
    }
}