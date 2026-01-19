<?php

namespace Sabre\CalDAV;

class SharingPluginTest extends \Sabre\DAVServerTest
{
    protected $setupCalDAV = true;
    protected $setupCalDAVSharing = true;
    protected $setupACL = true;
    protected $autoLogin = 'user1';
    function setUp()
    {
    }
    function testSimple()
    {
    }
    /**
     * @expectedException \LogicException
     */
    function testSetupWithoutCoreSharingPlugin()
    {
    }
    function testGetFeatures()
    {
    }
    function testBeforeGetShareableCalendar()
    {
    }
    function testBeforeGetSharedCalendar()
    {
    }
    function testUpdateResourceType()
    {
    }
    function testUpdatePropertiesPassThru()
    {
    }
    function testUnknownMethodNoPOST()
    {
    }
    function testUnknownMethodNoXML()
    {
    }
    function testUnknownMethodNoNode()
    {
    }
    function testShareRequest()
    {
    }
    function testShareRequestNoShareableCalendar()
    {
    }
    function testInviteReply()
    {
    }
    function testInviteBadXML()
    {
    }
    function testInviteWrongUrl()
    {
    }
    function testPublish()
    {
    }
    function testUnpublish()
    {
    }
    function testPublishWrongUrl()
    {
    }
    function testUnpublishWrongUrl()
    {
    }
    function testUnknownXmlDoc()
    {
    }
}