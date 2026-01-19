<?php

namespace Sabre\DAV;

class TreeTest extends \PHPUnit_Framework_TestCase
{
    function testNodeExists()
    {
    }
    function testCopy()
    {
    }
    function testMove()
    {
    }
    function testDeepMove()
    {
    }
    function testDelete()
    {
    }
    function testGetChildren()
    {
    }
    function testGetMultipleNodes()
    {
    }
    function testGetMultipleNodes2()
    {
    }
}
class TreeMock extends \Sabre\DAV\Tree
{
    private $nodes = [];
    function __construct()
    {
    }
}
class TreeDirectoryTester extends \Sabre\DAV\SimpleCollection
{
    public $newDirectories = [];
    public $newFiles = [];
    public $isDeleted = false;
    public $isRenamed = false;
    function createDirectory($name)
    {
    }
    function createFile($name, $data = null)
    {
    }
    function getChild($name)
    {
    }
    function childExists($name)
    {
    }
    function delete()
    {
    }
    function setName($name)
    {
    }
}
class TreeFileTester extends \Sabre\DAV\File implements \Sabre\DAV\IProperties
{
    public $name;
    public $data;
    public $properties;
    function __construct($name, $data = null)
    {
    }
    function getName()
    {
    }
    function get()
    {
    }
    function getProperties($properties)
    {
    }
    /**
     * Updates properties on this node.
     *
     * This method received a PropPatch object, which contains all the
     * information about the update.
     *
     * To update specific properties, call the 'handle' method on this object.
     * Read the PropPatch documentation for more information.
     *
     * @param PropPatch $propPatch
     * @return void
     */
    function propPatch(\Sabre\DAV\PropPatch $propPatch)
    {
    }
}
class TreeMultiGetTester extends \Sabre\DAV\TreeDirectoryTester implements \Sabre\DAV\IMultiGet
{
    /**
     * This method receives a list of paths in it's first argument.
     * It must return an array with Node objects.
     *
     * If any children are not found, you do not have to return them.
     *
     * @param array $paths
     * @return array
     */
    function getMultipleChildren(array $paths)
    {
    }
}