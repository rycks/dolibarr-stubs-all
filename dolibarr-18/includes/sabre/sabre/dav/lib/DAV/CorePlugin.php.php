<?php

namespace Sabre\DAV;

/**
 * The core plugin provides all the basic features for a WebDAV server.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class CorePlugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * Reference to server object.
     *
     * @var Server
     */
    protected $server;
    /**
     * Sets up the plugin.
     */
    public function initialize(\Sabre\DAV\Server $server)
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
    public function getPluginName()
    {
    }
    /**
     * This is the default implementation for the GET method.
     *
     * @return bool
     */
    public function httpGet(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * HTTP OPTIONS.
     *
     * @return bool
     */
    public function httpOptions(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * HTTP HEAD.
     *
     * This method is normally used to take a peak at a url, and only get the
     * HTTP response headers, without the body. This is used by clients to
     * determine if a remote file was changed, so they can use a local cached
     * version, instead of downloading it again
     *
     * @return bool
     */
    public function httpHead(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * HTTP Delete.
     *
     * The HTTP delete method, deletes a given uri
     */
    public function httpDelete(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * WebDAV PROPFIND.
     *
     * This WebDAV method requests information about an uri resource, or a list of resources
     * If a client wants to receive the properties for a single resource it will add an HTTP Depth: header with a 0 value
     * If the value is 1, it means that it also expects a list of sub-resources (e.g.: files in a directory)
     *
     * The request body contains an XML data structure that has a list of properties the client understands
     * The response body is also an xml document, containing information about every uri resource and the requested properties
     *
     * It has to return a HTTP 207 Multi-status status code
     */
    public function httpPropFind(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * WebDAV PROPPATCH.
     *
     * This method is called to update properties on a Node. The request is an XML body with all the mutations.
     * In this XML body it is specified which properties should be set/updated and/or deleted
     *
     * @return bool
     */
    public function httpPropPatch(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * HTTP PUT method.
     *
     * This HTTP method updates a file, or creates a new one.
     *
     * If a new resource was created, a 201 Created status code should be returned. If an existing resource is updated, it's a 204 No Content
     *
     * @return bool
     */
    public function httpPut(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * WebDAV MKCOL.
     *
     * The MKCOL method is used to create a new collection (directory) on the server
     *
     * @return bool
     */
    public function httpMkcol(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * WebDAV HTTP MOVE method.
     *
     * This method moves one uri to a different uri. A lot of the actual request processing is done in getCopyMoveInfo
     *
     * @return bool
     */
    public function httpMove(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * WebDAV HTTP COPY method.
     *
     * This method copies one uri to a different uri, and works much like the MOVE request
     * A lot of the actual request processing is done in getCopyMoveInfo
     *
     * @return bool
     */
    public function httpCopy(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * HTTP REPORT method implementation.
     *
     * Although the REPORT method is not part of the standard WebDAV spec (it's from rfc3253)
     * It's used in a lot of extensions, so it made sense to implement it into the core.
     *
     * @return bool
     */
    public function httpReport(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * This method is called during property updates.
     *
     * Here we check if a user attempted to update a protected property and
     * ensure that the process fails if this is the case.
     *
     * @param string $path
     */
    public function propPatchProtectedPropertyCheck($path, \Sabre\DAV\PropPatch $propPatch)
    {
    }
    /**
     * This method is called during property updates.
     *
     * Here we check if a node implements IProperties and let the node handle
     * updating of (some) properties.
     *
     * @param string $path
     */
    public function propPatchNodeUpdate($path, \Sabre\DAV\PropPatch $propPatch)
    {
    }
    /**
     * This method is called when properties are retrieved.
     *
     * Here we add all the default properties.
     */
    public function propFind(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * Fetches properties for a node.
     *
     * This event is called a bit later, so plugins have a chance first to
     * populate the result.
     */
    public function propFindNode(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * This method is called when properties are retrieved.
     *
     * This specific handler is called very late in the process, because we
     * want other systems to first have a chance to handle the properties.
     */
    public function propFindLate(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * Listens for exception events, and automatically logs them.
     *
     * @param Exception $e
     */
    public function exception($e)
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