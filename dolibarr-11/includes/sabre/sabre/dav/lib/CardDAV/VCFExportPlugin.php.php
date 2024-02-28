<?php

namespace Sabre\CardDAV;

/**
 * VCF Exporter
 *
 * This plugin adds the ability to export entire address books as .vcf files.
 * This is useful for clients that don't support CardDAV yet. They often do
 * support vcf files.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @author Thomas Tanghus (http://tanghus.net/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class VCFExportPlugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * Reference to Server class
     *
     * @var DAV\Server
     */
    protected $server;
    /**
     * Initializes the plugin and registers event handlers
     *
     * @param DAV\Server $server
     * @return void
     */
    function initialize(\Sabre\DAV\Server $server)
    {
    }
    /**
     * Intercepts GET requests on addressbook urls ending with ?export.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return bool
     */
    function httpGet(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * Merges all vcard objects, and builds one big vcf export
     *
     * @param array $nodes
     * @return string
     */
    function generateVCF(array $nodes)
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