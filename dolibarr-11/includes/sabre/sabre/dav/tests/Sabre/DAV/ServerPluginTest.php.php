<?php

namespace Sabre\DAV;

class ServerPluginTest extends \Sabre\DAV\AbstractServer
{
    /**
     * @var Sabre\DAV\TestPlugin
     */
    protected $testPlugin;
    function setUp()
    {
    }
    /**
     */
    function testBaseClass()
    {
    }
    function testOptions()
    {
    }
    function testGetPlugin()
    {
    }
    function testUnknownPlugin()
    {
    }
    function testGetSupportedReportSet()
    {
    }
    function testGetPlugins()
    {
    }
}
class ServerPluginMock extends \Sabre\DAV\ServerPlugin
{
    function initialize(\Sabre\DAV\Server $s)
    {
    }
}