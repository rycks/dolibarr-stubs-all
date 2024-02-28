<?php

namespace Sabre\DAV\PartialUpdate;

/**
 * Partial update plugin (Patch method)
 *
 * This plugin provides a way to modify only part of a target resource
 * It may bu used to update a file chunk, upload big a file into smaller
 * chunks or resume an upload.
 *
 * $patchPlugin = new \Sabre\DAV\PartialUpdate\Plugin();
 * $server->addPlugin($patchPlugin);
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Jean-Tiare LE BIGOT (http://www.jtlebi.fr/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Plugin extends \Sabre\DAV\ServerPlugin
{
    const RANGE_APPEND = 1;
    const RANGE_START = 2;
    const RANGE_END = 3;
    /**
     * Reference to server
     *
     * @var DAV\Server
     */
    protected $server;
    /**
     * Initializes the plugin
     *
     * This method is automatically called by the Server class after addPlugin.
     *
     * @param DAV\Server $server
     * @return void
     */
    function initialize(\Sabre\DAV\Server $server)
    {
    }
    /**
     * Returns a plugin name.
     *
     * Using this name other plugins will be able to access other plugins
     * using DAV\Server::getPlugin
     *
     * @return string
     */
    function getPluginName()
    {
    }
    /**
     * Use this method to tell the server this plugin defines additional
     * HTTP methods.
     *
     * This method is passed a uri. It should only return HTTP methods that are
     * available for the specified uri.
     *
     * We claim to support PATCH method (partirl update) if and only if
     *     - the node exist
     *     - the node implements our partial update interface
     *
     * @param string $uri
     * @return array
     */
    function getHTTPMethods($uri)
    {
    }
    /**
     * Returns a list of features for the HTTP OPTIONS Dav: header.
     *
     * @return array
     */
    function getFeatures()
    {
    }
    /**
     * Patch an uri
     *
     * The WebDAV patch request can be used to modify only a part of an
     * existing resource. If the resource does not exist yet and the first
     * offset is not 0, the request fails
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return void
     */
    function httpPatch(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * Returns the HTTP custom range update header
     *
     * This method returns null if there is no well-formed HTTP range request
     * header. It returns array(1) if it was an append request, array(2,
     * $start, $end) if it's a start and end range, lastly it's array(3,
     * $endoffset) if the offset was negative, and should be calculated from
     * the end of the file.
     *
     * Examples:
     *
     * null - invalid
     * [1] - append
     * [2,10,15] - update bytes 10, 11, 12, 13, 14, 15
     * [2,10,null] - update bytes 10 until the end of the patch body
     * [3,-5] - update from 5 bytes from the end of the file.
     *
     * @param RequestInterface $request
     * @return array|null
     */
    function getHTTPUpdateRange(\Sabre\HTTP\RequestInterface $request)
    {
    }
}