<?php

namespace Sabre\DAV\Sharing;

class PluginTest extends \Sabre\DAVServerTest
{
    protected $setupSharing = true;
    protected $setupACL = true;
    protected $autoLogin = 'admin';
    function setUpTree()
    {
    }
    function testFeatures()
    {
    }
    function testProperties()
    {
    }
    function testGetPluginInfo()
    {
    }
    function testHtmlActionsPanel()
    {
    }
    function testBrowserPostActionUnknownAction()
    {
    }
    function testBrowserPostActionSuccess()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testBrowserPostActionNoHref()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testBrowserPostActionNoAccess()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\BadRequest
     */
    function testBrowserPostActionBadAccess()
    {
    }
    /**
     * @expectedException \Sabre\DAV\Exception\Forbidden
     */
    function testBrowserPostActionAccessDenied()
    {
    }
}