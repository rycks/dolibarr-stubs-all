<?php

namespace Sabre\CalDAV;

/**
 * This plugin implements support for caldav sharing.
 *
 * This spec is defined at:
 * http://svn.calendarserver.org/repository/calendarserver/CalendarServer/trunk/doc/Extensions/caldav-sharing.txt
 *
 * See:
 * Sabre\CalDAV\Backend\SharingSupport for all the documentation.
 *
 * Note: This feature is experimental, and may change in between different
 * SabreDAV versions.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class SharingPlugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * Reference to SabreDAV server object.
     *
     * @var DAV\Server
     */
    protected $server;
    /**
     * This method should return a list of server-features.
     *
     * This is for example 'versioning' and is added to the DAV: header
     * in an OPTIONS response.
     *
     * @return array
     */
    public function getFeatures()
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
     * This initializes the plugin.
     *
     * This function is called by Sabre\DAV\Server, after
     * addPlugin is called.
     *
     * This method should set up the required event subscriptions.
     */
    public function initialize(\Sabre\DAV\Server $server)
    {
    }
    /**
     * This event is triggered when properties are requested for a certain
     * node.
     *
     * This allows us to inject any properties early.
     */
    public function propFindEarly(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * This method is triggered *after* all properties have been retrieved.
     * This allows us to inject the correct resourcetype for calendars that
     * have been shared.
     */
    public function propFindLate(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * This method is trigged when a user attempts to update a node's
     * properties.
     *
     * A previous draft of the sharing spec stated that it was possible to use
     * PROPPATCH to remove 'shared-owner' from the resourcetype, thus unsharing
     * the calendar.
     *
     * Even though this is no longer in the current spec, we keep this around
     * because OS X 10.7 may still make use of this feature.
     *
     * @param string $path
     */
    public function propPatch($path, \Sabre\DAV\PropPatch $propPatch)
    {
    }
    /**
     * We intercept this to handle POST requests on calendars.
     *
     * @return bool|null
     */
    public function httpPost(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
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