<?php

namespace Sabre\CalDAV;

class PluginTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DAV\Server
     */
    protected $server;
    /**
     * @var Plugin
     */
    protected $plugin;
    protected $response;
    /**
     * @var Backend\PDO
     */
    protected $caldavBackend;
    function setup()
    {
    }
    function testSimple()
    {
    }
    function testUnknownMethodPassThrough()
    {
    }
    function testReportPassThrough()
    {
    }
    function testMkCalendarBadLocation()
    {
    }
    function testMkCalendarNoParentNode()
    {
    }
    function testMkCalendarExistingCalendar()
    {
    }
    function testMkCalendarSucceed()
    {
    }
    function testMkCalendarEmptyBodySucceed()
    {
    }
    function testMkCalendarBadXml()
    {
    }
    function testPrincipalProperties()
    {
    }
    function testSupportedReportSetPropertyNonCalendar()
    {
    }
    /**
     * @depends testSupportedReportSetPropertyNonCalendar
     */
    function testSupportedReportSetProperty()
    {
    }
    function testSupportedReportSetUserCalendars()
    {
    }
    /**
     * @depends testSupportedReportSetProperty
     */
    function testCalendarMultiGetReport()
    {
    }
    /**
     * @depends testCalendarMultiGetReport
     */
    function testCalendarMultiGetReportExpand()
    {
    }
    /**
     * @depends testSupportedReportSetProperty
     * @depends testCalendarMultiGetReport
     */
    function testCalendarQueryReport()
    {
    }
    /**
     * @depends testSupportedReportSetProperty
     * @depends testCalendarMultiGetReport
     */
    function testCalendarQueryReportWindowsPhone()
    {
    }
    /**
     * @depends testSupportedReportSetProperty
     * @depends testCalendarMultiGetReport
     */
    function testCalendarQueryReportBadDepth()
    {
    }
    /**
     * @depends testCalendarQueryReport
     */
    function testCalendarQueryReportNoCalData()
    {
    }
    /**
     * @depends testCalendarQueryReport
     */
    function testCalendarQueryReportNoFilters()
    {
    }
    /**
     * @depends testSupportedReportSetProperty
     * @depends testCalendarMultiGetReport
     */
    function testCalendarQueryReport1Object()
    {
    }
    /**
     * @depends testSupportedReportSetProperty
     * @depends testCalendarMultiGetReport
     */
    function testCalendarQueryReport1ObjectNoCalData()
    {
    }
    function testHTMLActionsPanel()
    {
    }
    /**
     * @depends testCalendarMultiGetReport
     */
    function testCalendarMultiGetReportNoEnd()
    {
    }
    /**
     * @depends testCalendarMultiGetReport
     */
    function testCalendarMultiGetReportNoStart()
    {
    }
    /**
     * @depends testCalendarMultiGetReport
     */
    function testCalendarMultiGetReportEndBeforeStart()
    {
    }
    /**
     * @depends testSupportedReportSetPropertyNonCalendar
     */
    function testCalendarProperties()
    {
    }
}