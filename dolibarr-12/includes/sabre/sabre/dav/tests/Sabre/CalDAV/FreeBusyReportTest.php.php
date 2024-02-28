<?php

namespace Sabre\CalDAV;

class FreeBusyReportTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Plugin
     */
    protected $plugin;
    /**
     * @var DAV\Server
     */
    protected $server;
    function setUp()
    {
    }
    function testFreeBusyReport()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\BadRequest
     */
    function testFreeBusyReportNoTimeRange()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\NotImplemented
     */
    function testFreeBusyReportWrongNode()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception
     */
    function testFreeBusyReportNoACLPlugin()
    {
    }
}