<?php

namespace Sabre\CalDAV\Xml\Notification;

class InviteTest extends \Sabre\DAV\Xml\XmlTest
{
    /**
     * @param array $notification
     * @param string $expected
     * @dataProvider dataProvider
     */
    function testSerializers($notification, $expected)
    {
    }
    function dataProvider()
    {
    }
    /**
     * @expectedException InvalidArgumentException
     */
    function testMissingArg()
    {
    }
    /**
     * @expectedException InvalidArgumentException
     */
    function testUnknownArg()
    {
    }
    function writeFull($input)
    {
    }
}