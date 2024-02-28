<?php

namespace Sabre\HTTP;

/**
 * A rudimentary HTTP client.
 *
 * This object wraps PHP's curl extension and provides an easy way to send it a
 * Request object, and return a Response object.
 *
 * This is by no means intended as the next best HTTP client, but it does the
 * job and provides a simple integration with the rest of sabre/http.
 *
 * This client emits the following events:
 *   beforeRequest(RequestInterface $request)
 *   afterRequest(RequestInterface $request, ResponseInterface $response)
 *   error(RequestInterface $request, ResponseInterface $response, bool &$retry, int $retryCount)
 *   exception(RequestInterface $request, ClientException $e, bool &$retry, int $retryCount)
 *
 * The beforeRequest event allows you to do some last minute changes to the
 * request before it's done, such as adding authentication headers.
 *
 * The afterRequest event will be emitted after the request is completed
 * succesfully.
 *
 * If a HTTP error is returned (status code higher than 399) the error event is
 * triggered. It's possible using this event to retry the request, by setting
 * retry to true.
 *
 * The amount of times a request has retried is passed as $retryCount, which
 * can be used to avoid retrying indefinitely. The first time the event is
 * called, this will be 0.
 *
 * It's also possible to intercept specific http errors, by subscribing to for
 * example 'error:401'.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Client extends \Sabre\Event\EventEmitter
{
    /**
     * List of curl settings
     *
     * @var array
     */
    protected $curlSettings = [];
    /**
     * Wether or not exceptions should be thrown when a HTTP error is returned.
     *
     * @var bool
     */
    protected $throwExceptions = false;
    /**
     * The maximum number of times we'll follow a redirect.
     *
     * @var int
     */
    protected $maxRedirects = 5;
    /**
     * Initializes the client.
     *
     * @return void
     */
    function __construct()
    {
    }
    /**
     * Sends a request to a HTTP server, and returns a response.
     *
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    function send(\Sabre\HTTP\RequestInterface $request)
    {
    }
    /**
     * Sends a HTTP request asynchronously.
     *
     * Due to the nature of PHP, you must from time to time poll to see if any
     * new responses came in.
     *
     * After calling sendAsync, you must therefore occasionally call the poll()
     * method, or wait().
     *
     * @param RequestInterface $request
     * @param callable $success
     * @param callable $error
     * @return void
     */
    function sendAsync(\Sabre\HTTP\RequestInterface $request, callable $success = null, callable $error = null)
    {
    }
    /**
     * This method checks if any http requests have gotten results, and if so,
     * call the appropriate success or error handlers.
     *
     * This method will return true if there are still requests waiting to
     * return, and false if all the work is done.
     *
     * @return bool
     */
    function poll()
    {
    }
    /**
     * Processes every HTTP request in the queue, and waits till they are all
     * completed.
     *
     * @return void
     */
    function wait()
    {
    }
    /**
     * If this is set to true, the Client will automatically throw exceptions
     * upon HTTP errors.
     *
     * This means that if a response came back with a status code greater than
     * or equal to 400, we will throw a ClientHttpException.
     *
     * This only works for the send() method. Throwing exceptions for
     * sendAsync() is not supported.
     *
     * @param bool $throwExceptions
     * @return void
     */
    function setThrowExceptions($throwExceptions)
    {
    }
    /**
     * Adds a CURL setting.
     *
     * These settings will be included in every HTTP request.
     *
     * @param int $name
     * @param mixed $value
     * @return void
     */
    function addCurlSetting($name, $value)
    {
    }
    /**
     * This method is responsible for performing a single request.
     *
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    protected function doRequest(\Sabre\HTTP\RequestInterface $request)
    {
    }
    /**
     * Cached curl handle.
     *
     * By keeping this resource around for the lifetime of this object, things
     * like persistent connections are possible.
     *
     * @var resource
     */
    private $curlHandle;
    /**
     * Handler for curl_multi requests.
     *
     * The first time sendAsync is used, this will be created.
     *
     * @var resource
     */
    private $curlMultiHandle;
    /**
     * Has a list of curl handles, as well as their associated success and
     * error callbacks.
     *
     * @var array
     */
    private $curlMultiMap = [];
    /**
     * Turns a RequestInterface object into an array with settings that can be
     * fed to curl_setopt
     *
     * @param RequestInterface $request
     * @return array
     */
    protected function createCurlSettingsArray(\Sabre\HTTP\RequestInterface $request)
    {
    }
    const STATUS_SUCCESS = 0;
    const STATUS_CURLERROR = 1;
    const STATUS_HTTPERROR = 2;
    /**
     * Parses the result of a curl call in a format that's a bit more
     * convenient to work with.
     *
     * The method returns an array with the following elements:
     *   * status - one of the 3 STATUS constants.
     *   * curl_errno - A curl error number. Only set if status is
     *                  STATUS_CURLERROR.
     *   * curl_errmsg - A current error message. Only set if status is
     *                   STATUS_CURLERROR.
     *   * response - Response object. Only set if status is STATUS_SUCCESS, or
     *                STATUS_HTTPERROR.
     *   * http_code - HTTP status code, as an int. Only set if Only set if
     *                 status is STATUS_SUCCESS, or STATUS_HTTPERROR
     *
     * @param string $response
     * @param resource $curlHandle
     * @return Response
     */
    protected function parseCurlResult($response, $curlHandle)
    {
    }
    /**
     * Sends an asynchronous HTTP request.
     *
     * We keep this in a separate method, so we can call it without triggering
     * the beforeRequest event and don't do the poll().
     *
     * @param RequestInterface $request
     * @param callable $success
     * @param callable $error
     * @param int $retryCount
     */
    protected function sendAsyncInternal(\Sabre\HTTP\RequestInterface $request, callable $success, callable $error, $retryCount = 0)
    {
    }
    // @codeCoverageIgnoreStart
    /**
     * Calls curl_exec
     *
     * This method exists so it can easily be overridden and mocked.
     *
     * @param resource $curlHandle
     * @return string
     */
    protected function curlExec($curlHandle)
    {
    }
    /**
     * Returns a bunch of information about a curl request.
     *
     * This method exists so it can easily be overridden and mocked.
     *
     * @param resource $curlHandle
     * @return array
     */
    protected function curlStuff($curlHandle)
    {
    }
    // @codeCoverageIgnoreEnd
}