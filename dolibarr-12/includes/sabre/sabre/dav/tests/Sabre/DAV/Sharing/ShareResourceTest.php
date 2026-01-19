<?php

namespace Sabre\DAV\Sharing;

class ShareResourceTest extends \Sabre\DAVServerTest
{
    protected $setupSharing = true;
    protected $sharingNodeMock;
    function setUpTree()
    {
    }
    function testShareResource()
    {
    }
    /**
     * @depends testShareResource
     */
    function testShareResourceRemoveAccess()
    {
    }
    /**
     * @depends testShareResource
     */
    function testShareResourceInviteProperty()
    {
    }
    function testShareResourceNotFound()
    {
    }
    function testShareResourceNotISharedNode()
    {
    }
    function testShareResourceUnknownDoc()
    {
    }
}