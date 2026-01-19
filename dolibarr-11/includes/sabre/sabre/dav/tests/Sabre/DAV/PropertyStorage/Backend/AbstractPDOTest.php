<?php

namespace Sabre\DAV\PropertyStorage\Backend;

abstract class AbstractPDOTest extends \PHPUnit_Framework_TestCase
{
    use \Sabre\DAV\DbTestHelperTrait;
    function getBackend()
    {
    }
    function testPropFind()
    {
    }
    function testPropFindNothingToDo()
    {
    }
    /**
     * @depends testPropFind
     */
    function testPropPatchUpdate()
    {
    }
    /**
     * @depends testPropPatchUpdate
     */
    function testPropPatchComplex()
    {
    }
    /**
     * @depends testPropPatchComplex
     */
    function testPropPatchCustom()
    {
    }
    /**
     * @depends testPropFind
     */
    function testPropPatchRemove()
    {
    }
    /**
     * @depends testPropFind
     */
    function testDelete()
    {
    }
    /**
     * @depends testPropFind
     */
    function testMove()
    {
    }
    /**
     * @depends testPropFind
     */
    function testDeepDelete()
    {
    }
}