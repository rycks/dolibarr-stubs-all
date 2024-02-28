<?php

namespace Sabre\CalDAV\Backend;

class SimplePDOTest extends \PHPUnit_Framework_TestCase
{
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
     * @depends testCreateCalendarAndFetch
     */
    function testDeleteCalendar()
    {
    }
    function testCreateCalendarObject()
    {
    }
    function testGetMultipleObjects()
    {
    }
    /**
     * @depends testCreateCalendarObject
     */
    function testGetCalendarObjects()
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
     * @depends testCreateCalendarObject
     */
    function testDeleteCalendarObject()
    {
    }
    function testCalendarQueryNoResult()
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
}