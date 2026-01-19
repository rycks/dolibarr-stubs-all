<?php

namespace Sabre\CalDAV\Xml\Property;

class EmailAddressSetTest extends \Sabre\DAV\Xml\XmlTest
{
    protected $namespaceMap = [\Sabre\CalDAV\Plugin::NS_CALENDARSERVER => 'cs', 'DAV:' => 'd'];
    function testSimple()
    {
    }
    /**
     * @depends testSimple
     */
    function testSerialize()
    {
    }
}