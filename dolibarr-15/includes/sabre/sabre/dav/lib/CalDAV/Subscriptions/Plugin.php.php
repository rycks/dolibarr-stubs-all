<?php

namespace Sabre\CalDAV\Subscriptions;

/**
 * This plugin adds calendar-subscription support to your CalDAV server.
 *
 * Some clients support 'managed subscriptions' server-side. This is basically
 * a list of subscription urls a user is using.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Plugin extends \Sabre\DAV\ServerPlugin
{
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
     * This method should return a list of server-features.
     *
     * This is for example 'versioning' and is added to the DAV: header
     * in an OPTIONS response.
     *
     * @return array
     */
    function getFeatures()
    {
    }
    /**
     * Triggered after properties have been fetched.
     *
     * @param PropFind $propFind
     * @param INode $node
     * @return void
     */
    function propFind(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
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