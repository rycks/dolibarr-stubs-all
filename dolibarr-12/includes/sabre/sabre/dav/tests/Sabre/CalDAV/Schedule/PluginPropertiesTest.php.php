<?php

namespace Sabre\CalDAV\Schedule;

class PluginPropertiesTest extends \Sabre\DAVServerTest
{
    protected $setupCalDAV = true;
    protected $setupCalDAVScheduling = true;
    protected $setupPropertyStorage = true;
    function setUp()
    {
    }
    function testPrincipalProperties()
    {
    }
    function testPrincipalPropertiesBadPrincipal()
    {
    }
    function testNoDefaultCalendar()
    {
    }
    /**
     * There are two properties for availability. The server should
     * automatically map the old property to the standard property.
     */
    function testAvailabilityMapping()
    {
    }
}