<?php

namespace Sabre\DAV;

class BasicNodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Sabre\DAV\Exception\Forbidden
     */
    function testPut()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\Forbidden
     */
    function testGet()
    {
    }
    function testGetSize()
    {
    }
    function testGetETag()
    {
    }
    function testGetContentType()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\Forbidden
     */
    function testDelete()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\Forbidden
     */
    function testSetName()
    {
    }
    function testGetLastModified()
    {
    }
    function testGetChild()
    {
    }
    function testChildExists()
    {
    }
    function testChildExistsFalse()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\NotFound
     */
    function testGetChild404()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\Forbidden
     */
    function testCreateFile()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\Forbidden
     */
    function testCreateDirectory()
    {
    }
    function testSimpleDirectoryConstruct()
    {
    }
    /**
     * @depends testSimpleDirectoryConstruct
     */
    function testSimpleDirectoryConstructChild()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception
     * @depends testSimpleDirectoryConstruct
     */
    function testSimpleDirectoryBadParam()
    {
    }
    /**
     * @depends testSimpleDirectoryConstruct
     */
    function testSimpleDirectoryAddChild()
    {
    }
    /**
     * @depends testSimpleDirectoryConstruct
     * @depends testSimpleDirectoryAddChild
     */
    function testSimpleDirectoryGetChildren()
    {
    }
    /*
     * @depends testSimpleDirectoryConstruct
     */
    function testSimpleDirectoryGetName()
    {
    }
    /**
     * @depends testSimpleDirectoryConstruct
     * @expectedException Sabre\DAV\Exception\NotFound
     */
    function testSimpleDirectoryGetChild404()
    {
    }
}
class DirectoryMock extends \Sabre\DAV\Collection
{
    function getName()
    {
    }
    function getChildren()
    {
    }
}
class FileMock extends \Sabre\DAV\File
{
    function getName()
    {
    }
}