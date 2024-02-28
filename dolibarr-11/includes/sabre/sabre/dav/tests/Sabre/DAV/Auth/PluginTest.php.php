<?php

namespace Sabre\DAV\Auth;

class PluginTest extends \PHPUnit_Framework_TestCase
{
    function testInit()
    {
    }
    /**
     * @depends testInit
     */
    function testAuthenticate()
    {
    }
    /**
     * @depends testInit
     * @expectedException Sabre\DAV\Exception\NotAuthenticated
     */
    function testAuthenticateFail()
    {
    }
    /**
     * @depends testAuthenticateFail
     */
    function testAuthenticateFailDontAutoRequire()
    {
    }
    /**
     * @depends testAuthenticate
     */
    function testMultipleBackend()
    {
    }
    /**
     * @depends testInit
     * @expectedException Sabre\DAV\Exception
     */
    function testNoAuthBackend()
    {
    }
    /**
     * @depends testInit
     * @expectedException Sabre\DAV\Exception
     */
    function testInvalidCheckResponse()
    {
    }
    /**
     * @depends testAuthenticate
     */
    function testGetCurrentPrincipal()
    {
    }
}