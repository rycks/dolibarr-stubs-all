<?php

namespace Sabre\DAV\Locks\Backend;

abstract class AbstractTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @abstract
     * @return AbstractBackend
     */
    abstract function getBackend();
    function testSetup()
    {
    }
    /**
     * @depends testSetup
     */
    function testGetLocks()
    {
    }
    /**
     * @depends testGetLocks
     */
    function testGetLocksParent()
    {
    }
    /**
     * @depends testGetLocks
     */
    function testGetLocksParentDepth0()
    {
    }
    function testGetLocksChildren()
    {
    }
    /**
     * @depends testGetLocks
     */
    function testLockRefresh()
    {
    }
    /**
     * @depends testGetLocks
     */
    function testUnlock()
    {
    }
    /**
     * @depends testUnlock
     */
    function testUnlockUnknownToken()
    {
    }
}