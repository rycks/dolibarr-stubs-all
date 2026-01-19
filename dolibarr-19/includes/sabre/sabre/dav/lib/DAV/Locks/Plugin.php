<?php

namespace Sabre\DAV\Locks;

/**
 * Locking plugin.
 *
 * This plugin provides locking support to a WebDAV server.
 * The easiest way to get started, is by hooking it up as such:
 *
 * $lockBackend = new Sabre\DAV\Locks\Backend\File('./mylockdb');
 * $lockPlugin = new Sabre\DAV\Locks\Plugin($lockBackend);
 * $server->addPlugin($lockPlugin);
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Plugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * locksBackend.
     *
     * @var Backend\BackendInterface
     */
    protected $locksBackend;
    /**
     * server.
     *
     * @var DAV\Server
     */
    protected $server;
    /**
     * __construct.
     */
    public function __construct(\Sabre\DAV\Locks\Backend\BackendInterface $locksBackend)
    {
    }
    /**
     * Initializes the plugin.
     *
     * This method is automatically called by the Server class after addPlugin.
     */
    public function initialize(\Sabre\DAV\Server $server)
    {
    }
    /**
     * Returns a plugin name.
     *
     * Using this name other plugins will be able to access other plugins
     * using Sabre\DAV\Server::getPlugin
     *
     * @return string
     */
    public function getPluginName()
    {
    }
    /**
     * This method is called after most properties have been found
     * it allows us to add in any Lock-related properties.
     */
    public function propFind(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * Use this method to tell the server this plugin defines additional
     * HTTP methods.
     *
     * This method is passed a uri. It should only return HTTP methods that are
     * available for the specified uri.
     *
     * @param string $uri
     *
     * @return array
     */
    public function getHTTPMethods($uri)
    {
    }
    /**
     * Returns a list of features for the HTTP OPTIONS Dav: header.
     *
     * In this case this is only the number 2. The 2 in the Dav: header
     * indicates the server supports locks.
     *
     * @return array
     */
    public function getFeatures()
    {
    }
    /**
     * Returns all lock information on a particular uri.
     *
     * This function should return an array with Sabre\DAV\Locks\LockInfo objects. If there are no locks on a file, return an empty array.
     *
     * Additionally there is also the possibility of locks on parent nodes, so we'll need to traverse every part of the tree
     * If the $returnChildLocks argument is set to true, we'll also traverse all the children of the object
     * for any possible locks and return those as well.
     *
     * @param string $uri
     * @param bool   $returnChildLocks
     *
     * @return array
     */
    public function getLocks($uri, $returnChildLocks = false)
    {
    }
    /**
     * Locks an uri.
     *
     * The WebDAV lock request can be operated to either create a new lock on a file, or to refresh an existing lock
     * If a new lock is created, a full XML body should be supplied, containing information about the lock such as the type
     * of lock (shared or exclusive) and the owner of the lock
     *
     * If a lock is to be refreshed, no body should be supplied and there should be a valid If header containing the lock
     *
     * Additionally, a lock can be requested for a non-existent file. In these case we're obligated to create an empty file as per RFC4918:S7.3
     *
     * @return bool
     */
    public function httpLock(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * Unlocks a uri.
     *
     * This WebDAV method allows you to remove a lock from a node. The client should provide a valid locktoken through the Lock-token http header
     * The server should return 204 (No content) on success
     */
    public function httpUnlock(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * This method is called after a node is deleted.
     *
     * We use this event to clean up any locks that still exist on the node.
     *
     * @param string $path
     */
    public function afterUnbind($path)
    {
    }
    /**
     * Locks a uri.
     *
     * All the locking information is supplied in the lockInfo object. The object has a suggested timeout, but this can be safely ignored
     * It is important that if the existing timeout is ignored, the property is overwritten, as this needs to be sent back to the client
     *
     * @param string $uri
     *
     * @return bool
     */
    public function lockNode($uri, \Sabre\DAV\Locks\LockInfo $lockInfo)
    {
    }
    /**
     * Unlocks a uri.
     *
     * This method removes a lock from a uri. It is assumed all the supplied information is correct and verified
     *
     * @param string $uri
     *
     * @return bool
     */
    public function unlockNode($uri, \Sabre\DAV\Locks\LockInfo $lockInfo)
    {
    }
    /**
     * Returns the contents of the HTTP Timeout header.
     *
     * The method formats the header into an integer.
     *
     * @return int
     */
    public function getTimeoutHeader()
    {
    }
    /**
     * Generates the response for successful LOCK requests.
     *
     * @return string
     */
    protected function generateLockResponse(\Sabre\DAV\Locks\LockInfo $lockInfo)
    {
    }
    /**
     * The validateTokens event is triggered before every request.
     *
     * It's a moment where this plugin can check all the supplied lock tokens
     * in the If: header, and check if they are valid.
     *
     * In addition, it will also ensure that it checks any missing lokens that
     * must be present in the request, and reject requests without the proper
     * tokens.
     *
     * @param mixed $conditions
     */
    public function validateTokens(\Sabre\HTTP\RequestInterface $request, &$conditions)
    {
    }
    /**
     * Parses a webdav lock xml body, and returns a new Sabre\DAV\Locks\LockInfo object.
     *
     * @param string $body
     *
     * @return LockInfo
     */
    protected function parseLockRequest($body)
    {
    }
    /**
     * Returns a bunch of meta-data about the plugin.
     *
     * Providing this information is optional, and is mainly displayed by the
     * Browser plugin.
     *
     * The description key in the returned array may contain html and will not
     * be sanitized.
     *
     * @return array
     */
    public function getPluginInfo()
    {
    }
}