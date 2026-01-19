<?php

namespace Sabre\DAV\Mount;

/**
 * This plugin provides support for RFC4709: Mounting WebDAV servers
 *
 * Simply append ?mount to any collection to generate the davmount response.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Plugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * Reference to Server class
     *
     * @var DAV\Server
     */
    protected $server;
    /**
     * Initializes the plugin and registers event handles
     *
     * @param DAV\Server $server
     * @return void
     */
    function initialize(\Sabre\DAV\Server $server)
    {
    }
    /**
     * 'beforeMethod' event handles. This event handles intercepts GET requests ending
     * with ?mount
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return bool
     */
    function httpGet(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * Generates the davmount response
     *
     * @param ResponseInterface $response
     * @param string $uri absolute uri
     * @return void
     */
    function davMount(\Sabre\HTTP\ResponseInterface $response, $uri)
    {
    }
}