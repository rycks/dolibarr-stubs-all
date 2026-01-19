<?php

namespace Sabre\DAV\Locks;

class Plugin2Test extends \Sabre\DAVServerTest
{
    public $setupLocks = true;
    function setUpTree()
    {
    }
    function tearDown()
    {
    }
    /**
     * This test first creates a file with LOCK and then deletes it.
     *
     * After deleting the file, the lock should no longer be in the lock
     * backend.
     *
     * Reported in ticket #487
     */
    function testUnlockAfterDelete()
    {
    }
}