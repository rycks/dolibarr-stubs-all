<?php

namespace Sabre\CalDAV\Notifications;

/**
 * Notifications plugin
 *
 * This plugin implements several features required by the caldav-notification
 * draft specification.
 *
 * Before version 2.1.0 this functionality was part of Sabre\CalDAV\Plugin but
 * this has since been split up.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Plugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * This is the namespace for the proprietary calendarserver extensions
     */
    const NS_CALENDARSERVER = 'http://calendarserver.org/ns/';
    /**
     * Reference to the main server object.
     *
     * @var Server
     */
    protected $server;
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
     * PropFind
     *
     * @param PropFind $propFind
     * @param BaseINode $node
     * @return void
     */
    function propFind(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * This event is triggered before the usual GET request handler.
     *
     * We use this to intercept GET calls to notification nodes, and return the
     * proper response.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return void
     */
    function httpGet(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
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