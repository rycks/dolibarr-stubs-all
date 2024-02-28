<?php

namespace Sabre\CardDAV\Backend;

abstract class AbstractPDOTest extends \PHPUnit_Framework_TestCase
{
    use \Sabre\DAV\DbTestHelperTrait;
    /**
     * @var CardDAV\Backend\PDO
     */
    protected $backend;
    function setUp()
    {
    }
    function testGetAddressBooksForUser()
    {
    }
    function testUpdateAddressBookInvalidProp()
    {
    }
    function testUpdateAddressBookNoProps()
    {
    }
    function testUpdateAddressBookSuccess()
    {
    }
    function testDeleteAddressBook()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\BadRequest
     */
    function testCreateAddressBookUnsupportedProp()
    {
    }
    function testCreateAddressBookSuccess()
    {
    }
    function testGetCards()
    {
    }
    function testGetCard()
    {
    }
    /**
     * @depends testGetCard
     */
    function testCreateCard()
    {
    }
    /**
     * @depends testCreateCard
     */
    function testGetMultiple()
    {
    }
    /**
     * @depends testGetCard
     */
    function testUpdateCard()
    {
    }
    /**
     * @depends testGetCard
     */
    function testDeleteCard()
    {
    }
    function testGetChanges()
    {
    }
}