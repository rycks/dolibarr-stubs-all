<?php

namespace Sabre\DAV\Sharing;

/**
 * This plugin implements HTTP requests and properties related to:.
 *
 * draft-pot-webdav-resource-sharing
 *
 * This specification allows people to share webdav resources with others.
 *
 * @copyright Copyright (C) 2007-2015 fruux GmbH. (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Plugin extends \Sabre\DAV\ServerPlugin
{
    const ACCESS_NOTSHARED = 0;
    const ACCESS_SHAREDOWNER = 1;
    const ACCESS_READ = 2;
    const ACCESS_READWRITE = 3;
    const ACCESS_NOACCESS = 4;
    const INVITE_NORESPONSE = 1;
    const INVITE_ACCEPTED = 2;
    const INVITE_DECLINED = 3;
    const INVITE_INVALID = 4;
    /**
     * Reference to SabreDAV server object.
     *
     * @var Server
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
     * using \Sabre\DAV\Server::getPlugin
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
     * Updates the list of sharees on a shared resource.
     *
     * The sharees  array is a list of people that are to be added modified
     * or removed in the list of shares.
     *
     * @param string   $path
     * @param Sharee[] $sharees
     */
    public function shareResource($path, array $sharees)
    {
    }
    /**
     * This event is triggered when properties are requested for nodes.
     *
     * This allows us to inject any sharings-specific properties.
     */
    public function propFind(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * We intercept this to handle POST requests on shared resources.
     *
     * @return bool|null
     */
    public function httpPost(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * This method is triggered whenever a subsystem reqeuests the privileges
     * hat are supported on a particular node.
     *
     * We need to add a number of privileges for scheduling purposes.
     */
    public function getSupportedPrivilegeSet(\Sabre\DAV\INode $node, array &$supportedPrivilegeSet)
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
    /**
     * This method is used to generate HTML output for the
     * DAV\Browser\Plugin.
     *
     * @param string $output
     * @param string $path
     *
     * @return bool|null
     */
    public function htmlActionsPanel(\Sabre\DAV\INode $node, &$output, $path)
    {
    }
    /**
     * This method is triggered for POST actions generated by the browser
     * plugin.
     *
     * @param string $path
     * @param string $action
     * @param array  $postVars
     */
    public function browserPostAction($path, $action, $postVars)
    {
    }
}