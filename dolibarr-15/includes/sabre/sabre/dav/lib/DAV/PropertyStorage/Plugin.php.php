<?php

namespace Sabre\DAV\PropertyStorage;

/**
 * PropertyStorage Plugin.
 *
 * Adding this plugin to your server allows clients to store any arbitrary
 * WebDAV property.
 *
 * See:
 *   http://sabre.io/dav/property-storage/
 *
 * for more information.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Plugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * If you only want this plugin to store properties for a limited set of
     * paths, you can use a pathFilter to do this.
     *
     * The pathFilter should be a callable. The callable retrieves a path as
     * its argument, and should return true or false whether it allows
     * properties to be stored.
     *
     * @var callable
     */
    public $pathFilter;
    /**
     * @var Backend\BackendInterface
     */
    public $backend;
    /**
     * Creates the plugin
     *
     * @param Backend\BackendInterface $backend
     */
    function __construct(\Sabre\DAV\PropertyStorage\Backend\BackendInterface $backend)
    {
    }
    /**
     * This initializes the plugin.
     *
     * This function is called by Sabre\DAV\Server, after
     * addPlugin is called.
     *
     * This method should set up the required event subscriptions.
     *
     * @param Server $server
     * @return void
     */
    function initialize(\Sabre\DAV\Server $server)
    {
    }
    /**
     * Called during PROPFIND operations.
     *
     * If there's any requested properties that don't have a value yet, this
     * plugin will look in the property storage backend to find them.
     *
     * @param PropFind $propFind
     * @param INode $node
     * @return void
     */
    function propFind(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * Called during PROPPATCH operations
     *
     * If there's any updated properties that haven't been stored, the
     * propertystorage backend can handle it.
     *
     * @param string $path
     * @param PropPatch $propPatch
     * @return void
     */
    function propPatch($path, \Sabre\DAV\PropPatch $propPatch)
    {
    }
    /**
     * Called after a node is deleted.
     *
     * This allows the backend to clean up any properties still in the
     * database.
     *
     * @param string $path
     * @return void
     */
    function afterUnbind($path)
    {
    }
    /**
     * Called after a node is moved.
     *
     * This allows the backend to move all the associated properties.
     *
     * @param string $source
     * @param string $destination
     * @return void
     */
    function afterMove($source, $destination)
    {
    }
    /**
     * Returns a plugin name.
     *
     * Using this name other plugins will be able to access other plugins
     * using \Sabre\DAV\Server::getPlugin
     *
     * @return string
     */
    function getPluginName()
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
    function getPluginInfo()
    {
    }
}