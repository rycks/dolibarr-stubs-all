<?php

namespace Sabre\DAV;

/**
 * Temporary File Filter Plugin
 *
 * The purpose of this filter is to intercept some of the garbage files
 * operation systems and applications tend to generate when mounting
 * a WebDAV share as a disk.
 *
 * It will intercept these files and place them in a separate directory.
 * these files are not deleted automatically, so it is advisable to
 * delete these after they are not accessed for 24 hours.
 *
 * Currently it supports:
 *   * OS/X style resource forks and .DS_Store
 *   * desktop.ini and Thumbs.db (windows)
 *   * .*.swp (vim temporary files)
 *   * .dat.* (smultron temporary files)
 *
 * Additional patterns can be added, by adding on to the
 * temporaryFilePatterns property.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class TemporaryFileFilterPlugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * This is the list of patterns we intercept.
     * If new patterns are added, they must be valid patterns for preg_match.
     *
     * @var array
     */
    public $temporaryFilePatterns = [
        '/^\\._(.*)$/',
        // OS/X resource forks
        '/^.DS_Store$/',
        // OS/X custom folder settings
        '/^desktop.ini$/',
        // Windows custom folder settings
        '/^Thumbs.db$/',
        // Windows thumbnail cache
        '/^.(.*).swp$/',
        // ViM temporary files
        '/^\\.dat(.*)$/',
        // Smultron seems to create these
        '/^~lock.(.*)#$/',
    ];
    /**
     * A reference to the main Server class
     *
     * @var \Sabre\DAV\Server
     */
    protected $server;
    /**
     * This is the directory where this plugin
     * will store it's files.
     *
     * @var string
     */
    private $dataDir;
    /**
     * Creates the plugin.
     *
     * Make sure you specify a directory for your files. If you don't, we
     * will use PHP's directory for session-storage instead, and you might
     * not want that.
     *
     * @param string|null $dataDir
     */
    function __construct($dataDir = null)
    {
    }
    /**
     * Initialize the plugin
     *
     * This is called automatically be the Server class after this plugin is
     * added with Sabre\DAV\Server::addPlugin()
     *
     * @param Server $server
     * @return void
     */
    function initialize(\Sabre\DAV\Server $server)
    {
    }
    /**
     * This method is called before any HTTP method handler
     *
     * This method intercepts any GET, DELETE, PUT and PROPFIND calls to
     * filenames that are known to match the 'temporary file' regex.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return bool
     */
    function beforeMethod(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * This method is invoked if some subsystem creates a new file.
     *
     * This is used to deal with HTTP LOCK requests which create a new
     * file.
     *
     * @param string $uri
     * @param resource $data
     * @param ICollection $parent
     * @param bool $modified Should be set to true, if this event handler
     *                       changed &$data.
     * @return bool
     */
    function beforeCreateFile($uri, $data, \Sabre\DAV\ICollection $parent, $modified)
    {
    }
    /**
     * This method will check if the url matches the temporary file pattern
     * if it does, it will return an path based on $this->dataDir for the
     * temporary file storage.
     *
     * @param string $path
     * @return bool|string
     */
    protected function isTempFile($path)
    {
    }
    /**
     * This method handles the GET method for temporary files.
     * If the file doesn't exist, it will return false which will kick in
     * the regular system for the GET method.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $hR
     * @param string $tempLocation
     * @return bool
     */
    function httpGet(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $hR, $tempLocation)
    {
    }
    /**
     * This method handles the PUT method.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $hR
     * @param string $tempLocation
     * @return bool
     */
    function httpPut(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $hR, $tempLocation)
    {
    }
    /**
     * This method handles the DELETE method.
     *
     * If the file didn't exist, it will return false, which will make the
     * standard HTTP DELETE handler kick in.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $hR
     * @param string $tempLocation
     * @return bool
     */
    function httpDelete(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $hR, $tempLocation)
    {
    }
    /**
     * This method handles the PROPFIND method.
     *
     * It's a very lazy method, it won't bother checking the request body
     * for which properties were requested, and just sends back a default
     * set of properties.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $hR
     * @param string $tempLocation
     * @return bool
     */
    function httpPropfind(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $hR, $tempLocation)
    {
    }
    /**
     * This method returns the directory where the temporary files should be stored.
     *
     * @return string
     */
    protected function getDataDir()
    {
    }
}