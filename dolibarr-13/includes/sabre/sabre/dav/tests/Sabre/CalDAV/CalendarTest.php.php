<?php

namespace Sabre\CalDAV;

class CalendarTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Sabre\CalDAV\Backend\PDO
     */
    protected $backend;
    protected $principalBackend;
    /**
     * @var Sabre\CalDAV\Calendar
     */
    protected $calendar;
    /**
     * @var array
     */
    protected $calendars;
    function setup()
    {
    }
    function teardown()
    {
    }
    function testSimple()
    {
    }
    /**
     * @depends testSimple
     */
    function testUpdateProperties()
    {
    }
    /**
     * @depends testSimple
     */
    function testGetProperties()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\NotFound
     * @depends testSimple
     */
    function testGetChildNotFound()
    {
    }
    /**
     * @depends testSimple
     */
    function testGetChildren()
    {
    }
    /**
     * @depends testGetChildren
     */
    function testChildExists()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\MethodNotAllowed
     */
    function testCreateDirectory()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\MethodNotAllowed
     */
    function testSetName()
    {
    }
    function testGetLastModified()
    {
    }
    function testCreateFile()
    {
    }
    function testCreateFileNoSupportedComponents()
    {
    }
    function testDelete()
    {
    }
    function testGetOwner()
    {
    }
    function testGetGroup()
    {
    }
    function testGetACL()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\Forbidden
     */
    function testSetACL()
    {
    }
    function testGetSyncToken()
    {
    }
    function testGetSyncTokenNoSyncSupport()
    {
    }
    function testGetChanges()
    {
    }
}