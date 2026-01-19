<?php

namespace Sabre\CalDAV\Xml\Request;

class CalendarQueryReportTest extends \Sabre\DAV\Xml\XmlTest
{
    protected $elementMap = ['{urn:ietf:params:xml:ns:caldav}calendar-query' => 'Sabre\\CalDAV\\Xml\\Request\\CalendarQueryReport'];
    function testDeserialize()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\BadRequest
     */
    function testDeserializeNoFilter()
    {
    }
    function testDeserializeComplex()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testDeserializeDoubleTopCompFilter()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testDeserializeMissingExpandEnd()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testDeserializeExpandEndBeforeStart()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testDeserializeTimeRangeOnVCALENDAR()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testDeserializeTimeRangeEndBeforeStart()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testDeserializeTimeRangePropEndBeforeStart()
    {
    }
}