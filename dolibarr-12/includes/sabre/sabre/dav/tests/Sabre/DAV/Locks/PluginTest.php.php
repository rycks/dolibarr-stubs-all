<?php

namespace Sabre\DAV\Locks;

class PluginTest extends \Sabre\DAV\AbstractServer
{
    /**
     * @var Plugin
     */
    protected $locksPlugin;
    function setUp()
    {
    }
    function testGetInfo()
    {
    }
    function testGetFeatures()
    {
    }
    function testGetHTTPMethods()
    {
    }
    function testLockNoBody()
    {
    }
    function testLock()
    {
    }
    /**
     * @depends testLock
     */
    function testDoubleLock()
    {
    }
    /**
     * @depends testLock
     */
    function testLockRefresh()
    {
    }
    /**
     * @depends testLock
     */
    function testLockRefreshBadToken()
    {
    }
    /**
     * @depends testLock
     */
    function testLockNoFile()
    {
    }
    /**
     * @depends testLock
     */
    function testUnlockNoToken()
    {
    }
    /**
     * @depends testLock
     */
    function testUnlockBadToken()
    {
    }
    /**
     * @depends testLock
     */
    function testLockPutNoToken()
    {
    }
    /**
     * @depends testLock
     */
    function testUnlock()
    {
    }
    /**
     * @depends testLock
     */
    function testUnlockWindowsBug()
    {
    }
    /**
     * @depends testLock
     */
    function testLockRetainOwner()
    {
    }
    /**
     * @depends testLock
     */
    function testLockPutBadToken()
    {
    }
    /**
     * @depends testLock
     */
    function testLockDeleteParent()
    {
    }
    /**
     * @depends testLock
     */
    function testLockDeleteSucceed()
    {
    }
    /**
     * @depends testLock
     */
    function testLockCopyLockSource()
    {
    }
    /**
     * @depends testLock
     */
    function testLockCopyLockDestination()
    {
    }
    /**
     * @depends testLock
     */
    function testLockMoveLockSourceLocked()
    {
    }
    /**
     * @depends testLock
     */
    function testLockMoveLockSourceSucceed()
    {
    }
    /**
     * @depends testLock
     */
    function testLockMoveLockDestination()
    {
    }
    /**
     * @depends testLock
     */
    function testLockMoveLockParent()
    {
    }
    /**
     * @depends testLock
     */
    function testLockPutGoodToken()
    {
    }
    /**
     * @depends testLock
     */
    function testLockPutUnrelatedToken()
    {
    }
    function testPutWithIncorrectETag()
    {
    }
    /**
     * @depends testPutWithIncorrectETag
     */
    function testPutWithCorrectETag()
    {
    }
    function testDeleteWithETagOnCollection()
    {
    }
    function testGetTimeoutHeader()
    {
    }
    function testGetTimeoutHeaderTwoItems()
    {
    }
    function testGetTimeoutHeaderInfinite()
    {
    }
    /**
     * @expectedException Sabre\DAV\Exception\BadRequest
     */
    function testGetTimeoutHeaderInvalid()
    {
    }
}