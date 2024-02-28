<?php

namespace Sabre\DAV\Browser;

/**
 * Browser Plugin.
 *
 * This plugin provides a html representation, so that a WebDAV server may be accessed
 * using a browser.
 *
 * The class intercepts GET requests to collection resources and generates a simple
 * html index.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Plugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * reference to server class.
     *
     * @var DAV\Server
     */
    protected $server;
    /**
     * enablePost turns on the 'actions' panel, which allows people to create
     * folders and upload files straight from a browser.
     *
     * @var bool
     */
    protected $enablePost = true;
    /**
     * A list of properties that are usually not interesting. This can cut down
     * the browser output a bit by removing the properties that most people
     * will likely not want to see.
     *
     * @var array
     */
    public $uninterestingProperties = [
        '{DAV:}supportedlock',
        '{DAV:}acl-restrictions',
        //        '{DAV:}supported-privilege-set',
        '{DAV:}supported-method-set',
    ];
    /**
     * Creates the object.
     *
     * By default it will allow file creation and uploads.
     * Specify the first argument as false to disable this
     *
     * @param bool $enablePost
     */
    public function __construct($enablePost = true)
    {
    }
    /**
     * Initializes the plugin and subscribes to events.
     */
    public function initialize(\Sabre\DAV\Server $server)
    {
    }
    /**
     * This method intercepts GET requests that have ?sabreAction=info
     * appended to the URL.
     */
    public function httpGetEarly(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * This method intercepts GET requests to collections and returns the html.
     *
     * @return bool
     */
    public function httpGet(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * Handles POST requests for tree operations.
     *
     * @return bool
     */
    public function httpPOST(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * Escapes a string for html.
     *
     * @param string $value
     *
     * @return string
     */
    public function escapeHTML($value)
    {
    }
    /**
     * Generates the html directory index for a given url.
     *
     * @param string $path
     *
     * @return string
     */
    public function generateDirectoryIndex($path)
    {
    }
    /**
     * Generates the 'plugins' page.
     *
     * @return string
     */
    public function generatePluginListing()
    {
    }
    /**
     * Generates the first block of HTML, including the <head> tag and page
     * header.
     *
     * Returns footer.
     *
     * @param string $title
     * @param string $path
     *
     * @return string
     */
    public function generateHeader($title, $path = null)
    {
    }
    /**
     * Generates the page footer.
     *
     * Returns html.
     *
     * @return string
     */
    public function generateFooter()
    {
    }
    /**
     * This method is used to generate the 'actions panel' output for
     * collections.
     *
     * This specifically generates the interfaces for creating new files, and
     * creating new directories.
     *
     * @param mixed  $output
     * @param string $path
     */
    public function htmlActionsPanel(\Sabre\DAV\INode $node, &$output, $path)
    {
    }
    /**
     * This method takes a path/name of an asset and turns it into url
     * suiteable for http access.
     *
     * @param string $assetName
     *
     * @return string
     */
    protected function getAssetUrl($assetName)
    {
    }
    /**
     * This method returns a local pathname to an asset.
     *
     * @param string $assetName
     *
     * @throws DAV\Exception\NotFound
     *
     * @return string
     */
    protected function getLocalAssetPath($assetName)
    {
    }
    /**
     * This method reads an asset from disk and generates a full http response.
     *
     * @param string $assetName
     */
    protected function serveAsset($assetName)
    {
    }
    /**
     * Sort helper function: compares two directory entries based on type and
     * display name. Collections sort above other types.
     *
     * @param array $a
     * @param array $b
     *
     * @return int
     */
    protected function compareNodes($a, $b)
    {
    }
    /**
     * Maps a resource type to a human-readable string and icon.
     *
     * @param DAV\INode $node
     *
     * @return array
     */
    private function mapResourceType(array $resourceTypes, $node)
    {
    }
    /**
     * Draws a table row for a property.
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return string
     */
    private function drawPropertyRow($name, $value)
    {
    }
    /**
     * Draws a table row for a property.
     *
     * @param HtmlOutputHelper $html
     * @param mixed            $value
     *
     * @return string
     */
    private function drawPropertyValue($html, $value)
    {
    }
    /**
     * Returns a plugin name.
     *
     * Using this name other plugins will be able to access other plugins;
     * using \Sabre\DAV\Server::getPlugin
     *
     * @return string
     */
    public function getPluginName()
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