<?php

namespace Sabre\DAVACL;

class BlockAccessTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DAV\Server
     */
    protected $server;
    protected $plugin;
    function setUp()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\NeedPrivileges
     */
    function testGet()
    {
    }
    function testGetDoesntExist()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\NeedPrivileges
     */
    function testHEAD()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\NeedPrivileges
     */
    function testOPTIONS()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\NeedPrivileges
     */
    function testPUT()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\NeedPrivileges
     */
    function testPROPPATCH()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\NeedPrivileges
     */
    function testCOPY()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\NeedPrivileges
     */
    function testMOVE()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\NeedPrivileges
     */
    function testACL()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\NeedPrivileges
     */
    function testLOCK()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\NeedPrivileges
     */
    function testBeforeBind()
    {
    }
    /**
     * @expectedException Sabre\DAVACL\Exception\NeedPrivileges
     */
    function testBeforeUnbind()
    {
    }
    function testPropFind()
    {
    }
    function testBeforeGetPropertiesNoListing()
    {
    }
}