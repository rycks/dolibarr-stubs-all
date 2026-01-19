<?php

namespace Sabre\DAV\Property;

class SupportedReportSetTest extends \Sabre\DAV\AbstractServer
{
    function sendPROPFIND($body)
    {
    }
    /**
     */
    function testNoReports()
    {
    }
    /**
     * @depends testNoReports
     */
    function testCustomReport()
    {
    }
}