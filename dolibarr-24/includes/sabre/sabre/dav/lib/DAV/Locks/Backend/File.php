<?php

namespace Sabre\DAV\Locks\Backend;

/**
 * This Locks backend stores all locking information in a single file.
 *
 * Note that this is not nearly as robust as a database. If you are considering
 * using this backend, keep in mind that the PDO backend can work with SqLite,
 * which is designed to be a good file-based database.
 *
 * It literally solves the problem this class solves as well, but much better.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class File extends \Sabre\DAV\Locks\Backend\AbstractBackend
{
    /**
     * The storage file.
     *
     * @var string
     */
    private $locksFile;
    /**
     * Constructor.
     *
     * @param string $locksFile path to file
     */
    public function __construct($locksFile)
    {
    }
    /**
     * Returns a list of Sabre\DAV\Locks\LockInfo objects.
     *
     * This method should return all the locks for a particular uri, including
     * locks that might be set on a parent uri.
     *
     * If returnChildLocks is set to true, this method should also look for
     * any locks in the subtree of the uri for locks.
     *
     * @param string $uri
     * @param bool   $returnChildLocks
     *
     * @return array
     */
    public function getLocks($uri, $returnChildLocks)
    {
    }
    /**
     * Locks a uri.
     *
     * @param string $uri
     *
     * @return bool
     */
    public function lock($uri, \Sabre\DAV\Locks\LockInfo $lockInfo)
    {
    }
    /**
     * Removes a lock from a uri.
     *
     * @param string $uri
     *
     * @return bool
     */
    public function unlock($uri, \Sabre\DAV\Locks\LockInfo $lockInfo)
    {
    }
    /**
     * Loads the lockdata from the filesystem.
     *
     * @return array
     */
    protected function getData()
    {
    }
    /**
     * Saves the lockdata.
     */
    protected function putData(array $newData)
    {
    }
}