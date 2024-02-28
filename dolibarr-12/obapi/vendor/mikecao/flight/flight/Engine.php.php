<?php

namespace flight;

/**
 * The Engine class contains the core functionality of the framework.
 * It is responsible for loading an HTTP request, running the assigned services,
 * and generating an HTTP response.
 *
 * Core methods
 *
 * @method void start() Starts engine
 * @method void stop() Stops framework and outputs current response
 * @method void halt(int $code = 200, string $message = '') Stops processing and returns a given response.
 * @method void route(string $pattern, callable $callback, bool $pass_route = false) Routes a URL to a callback function.
 * @method Router router() Gets router
 *
 * Views
 * @method void render(string $file, array $data = null, string $key = null) Renders template
 * @method View view() Gets current view
 *
 * Request-response
 * @method Request request() Gets current request
 * @method Response response() Gets current response
 * @method void error(Exception $e) Sends an HTTP 500 response for any errors.
 * @method void notFound() Sends an HTTP 404 response when a URL is not found.
 * @method void redirect(string $url, int $code = 303)  Redirects the current request to another URL.
 * @method void json(mixed $data, int $code = 200, bool $encode = true, string $charset = 'utf-8', int $option = 0) Sends a JSON response.
 * @method void jsonp(mixed $data, string $param = 'jsonp', int $code = 200, bool $encode = true, string $charset = 'utf-8', int $option = 0) Sends a JSONP response.
 *
 * HTTP caching
 * @method void etag($id, string $type = 'strong') Handles ETag HTTP caching.
 * @method void lastModified(int $time) Handles last modified HTTP caching.
 */
class Engine
{
    /**
     * Stored variables.
     */
    protected array $vars;
    /**
     * Class loader.
     */
    protected \flight\core\Loader $loader;
    /**
     * Event dispatcher.
     */
    protected \flight\core\Dispatcher $dispatcher;
    /**
     * Constructor.
     */
    public function __construct()
    {
    }
    /**
     * Handles calls to class methods.
     *
     * @param string $name   Method name
     * @param array  $params Method parameters
     *
     * @throws Exception
     *
     * @return mixed Callback results
     */
    public function __call(string $name, array $params)
    {
    }
    // Core Methods
    /**
     * Initializes the framework.
     */
    public function init() : void
    {
    }
    /**
     * Custom error handler. Converts errors into exceptions.
     *
     * @param int    $errno   Error number
     * @param string $errstr  Error string
     * @param string $errfile Error file name
     * @param int    $errline Error file line number
     *
     * @throws ErrorException
     */
    public function handleError(int $errno, string $errstr, string $errfile, int $errline)
    {
    }
    /**
     * Custom exception handler. Logs exceptions.
     *
     * @param Exception $e Thrown exception
     */
    public function handleException($e) : void
    {
    }
    /**
     * Maps a callback to a framework method.
     *
     * @param string   $name     Method name
     * @param callback $callback Callback function
     *
     * @throws Exception If trying to map over a framework method
     */
    public function map(string $name, callable $callback) : void
    {
    }
    /**
     * Registers a class to a framework method.
     *
     * @param string        $name     Method name
     * @param string        $class    Class name
     * @param array         $params   Class initialization parameters
     * @param callable|null $callback $callback Function to call after object instantiation
     *
     * @throws Exception If trying to map over a framework method
     */
    public function register(string $name, string $class, array $params = [], ?callable $callback = null) : void
    {
    }
    /**
     * Adds a pre-filter to a method.
     *
     * @param string   $name     Method name
     * @param callback $callback Callback function
     */
    public function before(string $name, callable $callback) : void
    {
    }
    /**
     * Adds a post-filter to a method.
     *
     * @param string   $name     Method name
     * @param callback $callback Callback function
     */
    public function after(string $name, callable $callback) : void
    {
    }
    /**
     * Gets a variable.
     *
     * @param string|null $key Key
     *
     * @return array|mixed|null
     */
    public function get(?string $key = null)
    {
    }
    /**
     * Sets a variable.
     *
     * @param mixed      $key   Key
     * @param mixed|null $value Value
     */
    public function set($key, $value = null) : void
    {
    }
    /**
     * Checks if a variable has been set.
     *
     * @param string $key Key
     *
     * @return bool Variable status
     */
    public function has(string $key) : bool
    {
    }
    /**
     * Unsets a variable. If no key is passed in, clear all variables.
     *
     * @param string|null $key Key
     */
    public function clear(?string $key = null) : void
    {
    }
    /**
     * Adds a path for class autoloading.
     *
     * @param string $dir Directory path
     */
    public function path(string $dir) : void
    {
    }
    // Extensible Methods
    /**
     * Starts the framework.
     *
     * @throws Exception
     */
    public function _start() : void
    {
    }
    /**
     * Sends an HTTP 500 response for any errors.
     *
     * @param Throwable $e Thrown exception
     */
    public function _error($e) : void
    {
    }
    /**
     * Stops the framework and outputs the current response.
     *
     * @param int|null $code HTTP status code
     *
     * @throws Exception
     */
    public function _stop(?int $code = null) : void
    {
    }
    /**
     * Routes a URL to a callback function.
     *
     * @param string   $pattern    URL pattern to match
     * @param callback $callback   Callback function
     * @param bool     $pass_route Pass the matching route object to the callback
     */
    public function _route(string $pattern, callable $callback, bool $pass_route = false) : void
    {
    }
    /**
     * Routes a URL to a callback function.
     *
     * @param string   $pattern    URL pattern to match
     * @param callback $callback   Callback function
     * @param bool     $pass_route Pass the matching route object to the callback
     */
    public function _post(string $pattern, callable $callback, bool $pass_route = false) : void
    {
    }
    /**
     * Routes a URL to a callback function.
     *
     * @param string   $pattern    URL pattern to match
     * @param callback $callback   Callback function
     * @param bool     $pass_route Pass the matching route object to the callback
     */
    public function _put(string $pattern, callable $callback, bool $pass_route = false) : void
    {
    }
    /**
     * Routes a URL to a callback function.
     *
     * @param string   $pattern    URL pattern to match
     * @param callback $callback   Callback function
     * @param bool     $pass_route Pass the matching route object to the callback
     */
    public function _patch(string $pattern, callable $callback, bool $pass_route = false) : void
    {
    }
    /**
     * Routes a URL to a callback function.
     *
     * @param string   $pattern    URL pattern to match
     * @param callback $callback   Callback function
     * @param bool     $pass_route Pass the matching route object to the callback
     */
    public function _delete(string $pattern, callable $callback, bool $pass_route = false) : void
    {
    }
    /**
     * Stops processing and returns a given response.
     *
     * @param int    $code    HTTP status code
     * @param string $message Response message
     */
    public function _halt(int $code = 200, string $message = '') : void
    {
    }
    /**
     * Sends an HTTP 404 response when a URL is not found.
     */
    public function _notFound() : void
    {
    }
    /**
     * Redirects the current request to another URL.
     *
     * @param string $url  URL
     * @param int    $code HTTP status code
     */
    public function _redirect(string $url, int $code = 303) : void
    {
    }
    /**
     * Renders a template.
     *
     * @param string      $file Template file
     * @param array|null  $data Template data
     * @param string|null $key  View variable name
     *
     * @throws Exception
     */
    public function _render(string $file, ?array $data = null, ?string $key = null) : void
    {
    }
    /**
     * Sends a JSON response.
     *
     * @param mixed  $data    JSON data
     * @param int    $code    HTTP status code
     * @param bool   $encode  Whether to perform JSON encoding
     * @param string $charset Charset
     * @param int    $option  Bitmask Json constant such as JSON_HEX_QUOT
     *
     * @throws Exception
     */
    public function _json($data, int $code = 200, bool $encode = true, string $charset = 'utf-8', int $option = 0) : void
    {
    }
    /**
     * Sends a JSONP response.
     *
     * @param mixed  $data    JSON data
     * @param string $param   Query parameter that specifies the callback name.
     * @param int    $code    HTTP status code
     * @param bool   $encode  Whether to perform JSON encoding
     * @param string $charset Charset
     * @param int    $option  Bitmask Json constant such as JSON_HEX_QUOT
     *
     * @throws Exception
     */
    public function _jsonp($data, string $param = 'jsonp', int $code = 200, bool $encode = true, string $charset = 'utf-8', int $option = 0) : void
    {
    }
    /**
     * Handles ETag HTTP caching.
     *
     * @param string $id   ETag identifier
     * @param string $type ETag type
     */
    public function _etag(string $id, string $type = 'strong') : void
    {
    }
    /**
     * Handles last modified HTTP caching.
     *
     * @param int $time Unix timestamp
     */
    public function _lastModified(int $time) : void
    {
    }
}