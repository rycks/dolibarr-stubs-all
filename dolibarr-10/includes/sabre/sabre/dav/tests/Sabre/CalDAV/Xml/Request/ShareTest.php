<?php

namespace Sabre\CalDAV\Xml\Request;

class ShareTest extends \Sabre\DAV\Xml\XmlTest
{
    protected $elementMap = ['{http://calendarserver.org/ns/}share' => 'Sabre\\CalDAV\\Xml\\Request\\Share'];
    function testDeserialize()
    {
    }
    function testDeserializeMinimal()
    {
    }
}