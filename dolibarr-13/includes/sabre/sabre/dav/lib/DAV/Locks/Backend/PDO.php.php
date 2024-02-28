<?php

namespace Sabre\DAV\Locks\Backend;

/**
 * The Lock manager allows you to handle all file-locks centrally.
 *
 * This Lock Manager stores all its data in a database. You must pass a PDO
 * connection object in the constructor.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class PDO extends \Sabre\DAV\Locks\Backend\AbstractBackend
{
    /**
     * The PDO tablename this backend uses.
     *
     * @var string
     */
    public $tableName = 'locks';
    /**
     * The PDO connection object
     *
     * @var pdo
     */
    protected $pdo;
    /**
     * Constructor
     *
     * @param \PDO $pdo
     */
    function __construct(\PDO $pdo)
    {
    }
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
}