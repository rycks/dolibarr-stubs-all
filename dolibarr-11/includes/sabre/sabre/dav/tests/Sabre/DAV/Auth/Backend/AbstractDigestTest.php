<?php

namespace Sabre\DAV\Auth\Backend;

class AbstractDigestTest extends \PHPUnit_Framework_TestCase
{
    function testCheckNoHeaders()
    {
    }
    function testCheckBadGetUserInfoResponse()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception
     */
    function testCheckBadGetUserInfoResponse2()
    {
    }
    function testCheckUnknownUser()
    {
    }
    function testCheckBadPassword()
    {
    }
    function testCheck()
    {
    }
    function testRequireAuth()
    {
    }
}
class AbstractDigestMock extends \Sabre\DAV\Auth\Backend\AbstractDigest
{
    function getDigestHash($realm, $userName)
    {
    }
}