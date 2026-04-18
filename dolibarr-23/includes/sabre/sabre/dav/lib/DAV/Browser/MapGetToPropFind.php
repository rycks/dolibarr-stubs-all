<?php

namespace Sabre\DAV\Browser;

/**
 * This is a simple plugin that will map any GET request for non-files to
 * PROPFIND allprops-requests.
 *
 * This should allow easy debugging of PROPFIND
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class MapGetToPropFind extends \Sabre\DAV\ServerPlugin
{
    /**
     * reference to server class.
     *
     * @var DAV\Server
     */
    protected $server;
    /**
     * Initializes the plugin and subscribes to events.
     */
    public function initialize(\Sabre\DAV\Server $server)
    {
    }
    /**
     * This method intercepts GET requests to non-files, and changes it into an HTTP PROPFIND request.
     *
     * @return bool
     */
    public function httpGet(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
}