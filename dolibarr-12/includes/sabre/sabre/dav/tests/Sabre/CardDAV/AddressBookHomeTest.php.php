<?php

namespace Sabre\CardDAV;

class AddressBookHomeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Sabre\CardDAV\AddressBookHome
     */
    protected $s;
    protected $backend;
    function setUp()
    {
    }
    function testGetName()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\MethodNotAllowed
     */
    function testSetName()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\MethodNotAllowed
     */
    function testDelete()
    {
    }
    function testGetLastModified()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\MethodNotAllowed
     */
    function testCreateFile()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\MethodNotAllowed
     */
    function testCreateDirectory()
    {
    }
    function testGetChild()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\NotFound
     */
    function testGetChild404()
    {
    }
    function testGetChildren()
    {
    }
    function testCreateExtendedCollection()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\InvalidResourceType
     */
    function testCreateExtendedCollectionInvalid()
    {
    }
    function testACLMethods()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\Forbidden
     */
    function testSetACL()
    {
    }
    function testGetSupportedPrivilegeSet()
    {
    }
}