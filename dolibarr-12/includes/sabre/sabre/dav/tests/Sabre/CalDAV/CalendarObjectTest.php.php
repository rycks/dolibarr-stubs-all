<?php

namespace Sabre\CalDAV;

class CalendarObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Sabre\CalDAV\Backend_PDO
     */
    protected $backend;
    /**
     * @var Sabre\CalDAV\Calendar
     */
    protected $calendar;
    protected $principalBackend;
    function setup()
    {
    }
    function teardown()
    {
    }
    function testSetup()
    {
    }
    /**
     * @expectedException InvalidArgumentException
     */
    function testInvalidArg1()
    {
    }
    /**
     * @expectedException InvalidArgumentException
     */
    function testInvalidArg2()
    {
    }
    /**
     * @depends testSetup
     */
    function testPut()
    {
    }
    /**
     * @depends testSetup
     */
    function testPutStream()
    {
    }
    /**
     * @depends testSetup
     */
    function testDelete()
    {
    }
    /**
     * @depends testSetup
     */
    function testGetLastModified()
    {
    }
    /**
     * @depends testSetup
     */
    function testGetSize()
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
    function testDefaultACL()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\Forbidden
     */
    function testSetACL()
    {
    }
    function testGet()
    {
    }
    function testGetRefetch()
    {
    }
    function testGetEtag1()
    {
    }
    function testGetEtag2()
    {
    }
    function testGetSupportedPrivilegesSet()
    {
    }
    function testGetSize1()
    {
    }
    function testGetSize2()
    {
    }
}