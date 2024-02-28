<?php

namespace Sabre\CalDAV;

class CalendarHomeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Sabre\CalDAV\CalendarHome
     */
    protected $usercalendars;
    /**
     * @var Backend\BackendInterface
     */
    protected $backend;
    function setup()
    {
    }
    function testSimple()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\NotFound
     * @depends testSimple
     */
    function testGetChildNotFound()
    {
    }
    function testChildExists()
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
    /**
     * @expectedException \Sabre\DAV\Exception\Forbidden
     * @depends testSimple
     */
    function testSetName()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\Forbidden
     * @depends testSimple
     */
    function testDelete()
    {
    }
    /**
     * @depends testSimple
     */
    function testGetLastModified()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\MethodNotAllowed
     * @depends testSimple
     */
    function testCreateFile()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\MethodNotAllowed
     * @depends testSimple
     */
    function testCreateDirectory()
    {
    }
    /**
     * @depends testSimple
     */
    function testCreateExtendedCollection()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\InvalidResourceType
     * @depends testSimple
     */
    function testCreateExtendedCollectionBadResourceType()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\InvalidResourceType
     * @depends testSimple
     */
    function testCreateExtendedCollectionNotACalendar()
    {
    }
    function testGetSupportedPrivilegesSet()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\NotImplemented
     */
    function testShareReplyFail()
    {
    }
}