<?php

namespace Sabre\CardDAV;

class AddressBookTest extends \PHPUnit_Framework_TestCase
{
    use \Sabre\DAV\DbTestHelperTrait;
    /**
     * @var Sabre\CardDAV\AddressBook
     */
    protected $ab;
    protected $backend;
    function setUp()
    {
    }
    function testGetName()
    {
    }
    function testGetChild()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\NotFound
     */
    function testGetChildNotFound()
    {
    }
    function testGetChildren()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\MethodNotAllowed
     */
    function testCreateDirectory()
    {
    }
    function testCreateFile()
    {
    }
    function testDelete()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\MethodNotAllowed
     */
    function testSetName()
    {
    }
    function testGetLastModified()
    {
    }
    function testUpdateProperties()
    {
    }
    function testGetProperties()
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
    function testGetSyncTokenNoSyncSupport()
    {
    }
    function testGetChangesNoSyncSupport()
    {
    }
    function testGetSyncToken()
    {
    }
    function testGetSyncToken2()
    {
    }
}