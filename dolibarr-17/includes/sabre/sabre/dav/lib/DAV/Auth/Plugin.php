<?php

namespace Sabre\DAV\Auth;

/**
 * This plugin provides Authentication for a WebDAV server.
 *
 * It works by providing a Auth\Backend class. Several examples of these
 * classes can be found in the Backend directory.
 *
 * It's possible to provide more than one backend to this plugin. If more than
 * one backend was provided, each backend will attempt to authenticate. Only if
 * all backends fail, we throw a 401.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Plugin extends \Sabre\DAV\ServerPlugin
{
    /**
     * By default this plugin will require that the user is authenticated,
     * and refuse any access if the user is not authenticated.
     *
     * If this setting is set to false, we let the user through, whether they
     * are authenticated or not.
     *
     * This is useful if you want to allow both authenticated and
     * unauthenticated access to your server.
     *
     * @param bool
     */
    public $autoRequireLogin = true;
    /**
     * authentication backends
     */
    protected $backends;
    /**
     * The currently logged in principal. Will be `null` if nobody is currently
     * logged in.
     *
     * @var string|null
     */
    protected $currentPrincipal;
    /**
     * Creates the authentication plugin
     *
     * @param Backend\BackendInterface $authBackend
     */
    function __construct(\Sabre\DAV\Auth\Backend\BackendInterface $authBackend = null)
    {
    }
    /**
     * Adds an authentication backend to the plugin.
     *
     * @param Backend\BackendInterface $authBackend
     * @return void
     */
    function addBackend(\Sabre\DAV\Auth\Backend\BackendInterface $authBackend)
    {
    }
    /**
     * Initializes the plugin. This function is automatically called by the server
     *
     * @param Server $server
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
     * Returns the currently logged-in principal.
     *
     * This will return a string such as:
     *
     * principals/username
     * principals/users/username
     *
     * This method will return null if nobody is logged in.
     *
     * @return string|null
     */
    function getCurrentPrincipal()
    {
    }
    /**
     * This method is called before any HTTP method and forces users to be authenticated
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return bool
     */
    function beforeMethod(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * Checks authentication credentials, and logs the user in if possible.
     *
     * This method returns an array. The first item in the array is a boolean
     * indicating if login was successful.
     *
     * If login was successful, the second item in the array will contain the
     * current principal url/path of the logged in user.
     *
     * If login was not successful, the second item in the array will contain a
     * an array with strings. The strings are a list of reasons why login was
     * unsuccessful. For every auth backend there will be one reason, so usually
     * there's just one.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return array
     */
    function check(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * This method sends authentication challenges to the user.
     *
     * This method will for example cause a HTTP Basic backend to set a
     * WWW-Authorization header, indicating to the client that it should
     * authenticate.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return array
     */
    function challenge(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * List of reasons why login failed for the last login operation.
     *
     * @var string[]|null
     */
    protected $loginFailedReasons;
    /**
     * Returns a list of reasons why login was unsuccessful.
     *
     * This method will return the login failed reasons for the last login
     * operation. One for each auth backend.
     *
     * This method returns null if the last authentication attempt was
     * successful, or if there was no authentication attempt yet.
     *
     * @return string[]|null
     */
    function getLoginFailedReasons()
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