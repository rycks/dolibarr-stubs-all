<?php

namespace Sabre\CalDAV\Xml\Request;

class InviteReplyTest extends \Sabre\DAV\Xml\XmlTest
{
    protected $elementMap = ['{http://calendarserver.org/ns/}invite-reply' => 'Sabre\\CalDAV\\Xml\\Request\\InviteReply'];
    function testDeserialize()
    {
    }
    function testDeserializeDeclined()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testDeserializeNoHostUrl()
    {
    }
}