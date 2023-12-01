<?php

namespace Sabre\DAV\Sync;

/**
 * This plugin all WebDAV-sync capabilities to the Server.
 *
 * WebDAV-sync is defined by rfc6578
 *
 * The sync capabilities only work with collections that implement
 * Sabre\DAV\Sync\ISyncCollection.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Plugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * Reference to server object
     *
     * @var DAV\Server
     */
    protected $server;
    const SYNCTOKEN_PREFIX = 'http://sabre.io/ns/sync/';
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
     * Initializes the plugin.
     *
     * This is when the plugin registers it's hooks.
     *
     * @param DAV\Server $server
     * @return void
     */
    function initialize(\Sabre\DAV\Server $server)
    {
    }
    /**
     * Returns a list of reports this plugin supports.
     *
     * This will be used in the {DAV:}supported-report-set property.
     * Note that you still need to subscribe to the 'report' event to actually
     * implement them
     *
     * @param string $uri
     * @return array
     */
    function getSupportedReportSet($uri)
    {
    }
    /**
     * This method handles the {DAV:}sync-collection HTTP REPORT.
     *
     * @param string $uri
     * @param SyncCollectionReport $report
     * @return void
     */
    function syncCollection($uri, \Sabre\DAV\Xml\Request\SyncCollectionReport $report)
    {
    }
    /**
     * Sends the response to a sync-collection request.
     *
     * @param string $syncToken
     * @param string $collectionUrl
     * @param array $added
     * @param array $modified
     * @param array $deleted
     * @param array $properties
     * @return void
     */
    protected function sendSyncCollectionResponse($syncToken, $collectionUrl, array $added, array $modified, array $deleted, array $properties)
    {
    }
    /**
     * This method is triggered whenever properties are requested for a node.
     * We intercept this to see if we must return a {DAV:}sync-token.
     *
     * @param DAV\PropFind $propFind
     * @param DAV\INode $node
     * @return void
     */
    function propFind(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * The validateTokens event is triggered before every request.
     *
     * It's a moment where this plugin can check all the supplied lock tokens
     * in the If: header, and check if they are valid.
     *
     * @param RequestInterface $request
     * @param array $conditions
     * @return void
     */
    function validateTokens(\Sabre\HTTP\RequestInterface $request, &$conditions)
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