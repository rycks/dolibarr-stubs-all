<?php

namespace Sabre\CalDAV\Xml\Notification;

class InviteReplyTest extends \PHPUnit_Framework_TestCase
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
}