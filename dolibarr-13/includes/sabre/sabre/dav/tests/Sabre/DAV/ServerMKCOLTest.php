<?php

namespace Sabre\DAV;

class ServerMKCOLTest extends \Sabre\DAV\AbstractServer
{
    function testMkcol()
    {
    }
    /**
     * @depends testMkcol
     */
    function testMKCOLUnknownBody()
    {
    }
    /**
     * @depends testMkcol
     */
    function testMKCOLBrokenXML()
    {
    }
    /**
     * @depends testMkcol
     */
    function testMKCOLUnknownXML()
    {
    }
    /**
     * @depends testMkcol
     */
    function testMKCOLNoResourceType()
    {
    }
    /**
     * @depends testMkcol
     */
    function testMKCOLIncorrectResourceType()
    {
    }
    /**
     * @depends testMKCOLIncorrectResourceType
     */
    function testMKCOLSuccess()
    {
    }
    /**
     * @depends testMKCOLIncorrectResourceType
     */
    function testMKCOLWhiteSpaceResourceType()
    {
    }
    /**
     * @depends testMKCOLIncorrectResourceType
     */
    function testMKCOLNoParent()
    {
    }
    /**
     * @depends testMKCOLIncorrectResourceType
     */
    function testMKCOLParentIsNoCollection()
    {
    }
    /**
     * @depends testMKCOLIncorrectResourceType
     */
    function testMKCOLAlreadyExists()
    {
    }
    /**
     * @depends testMKCOLSuccess
     * @depends testMKCOLAlreadyExists
     */
    function testMKCOLAndProps()
    {
    }
}