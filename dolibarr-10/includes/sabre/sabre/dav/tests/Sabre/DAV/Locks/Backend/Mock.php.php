<?php

namespace Sabre\DAV\Locks\Backend;

/**
 * Locks Mock backend.
 *
 * This backend stores lock information in memory. Mainly useful for testing.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Mock extends \Sabre\DAV\Locks\Backend\AbstractBackend
{
    /**
     * Returns a list of Sabre\DAV\Locks\LockInfo objects
     *
     * This method should return all the locks for a particular uri, including
     * locks that might be set on a parent uri.
     *
     * If returnChildLocks is set to true, this method should also look for
     * any locks in the subtree of the uri for locks.
     *
     * @param string $uri
     * @param bool $returnChildLocks
     * @return array
     */
    function getLocks($uri, $returnChildLocks)
    {
    }
    /**
     * Locks a uri
     *
     * @param string $uri
     * @param LockInfo $lockInfo
     * @return bool
     */
    function lock($uri, \Sabre\DAV\Locks\LockInfo $lockInfo)
    {
    }
    /**
     * Removes a lock from a uri
     *
     * @param string $uri
     * @param LockInfo $lockInfo
     * @return bool
     */
    function unlock($uri, \Sabre\DAV\Locks\LockInfo $lockInfo)
    {
    }
    protected $data = [];
    /**
     * Loads the lockdata from the filesystem.
     *
     * @return array
     */
    protected function getData()
    {
    }
    /**
     * Saves the lockdata
     *
     * @param array $newData
     * @return void
     */
    protected function putData(array $newData)
    {
    }
}