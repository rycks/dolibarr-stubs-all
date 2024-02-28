<?php

namespace Stripe\HttpClient;

class CurlClient implements \Stripe\HttpClient\ClientInterface
{
    private static $instance;
    public static function instance()
    {
    }
    protected $defaultOptions;
    protected $userAgentInfo;
    protected $enablePersistentConnections = null;
    protected $enableHttp2 = null;
    protected $curlHandle = null;
    /**
     * CurlClient constructor.
     *
     * Pass in a callable to $defaultOptions that returns an array of CURLOPT_* values to start
     * off a request with, or an flat array with the same format used by curl_setopt_array() to
     * provide a static set of options. Note that many options are overridden later in the request
     * call, including timeouts, which can be set via setTimeout() and setConnectTimeout().
     *
     * Note that request() will silently ignore a non-callable, non-array $defaultOptions, and will
     * throw an exception if $defaultOptions returns a non-array value.
     *
     * @param array|callable|null $defaultOptions
     */
    public function __construct($defaultOptions = null, $randomGenerator = null)
    {
    }
    public function __destruct()
    {
    }
    public function initUserAgentInfo()
    {
    }
    public function getDefaultOptions()
    {
    }
    public function getUserAgentInfo()
    {
    }
    /**
     * @return boolean
     */
    public function getEnablePersistentConnections()
    {
    }
    /**
     * @param boolean $enable
     */
    public function setEnablePersistentConnections($enable)
    {
    }
    /**
     * @return boolean
     */
    public function getEnableHttp2()
    {
    }
    /**
     * @param boolean $enable
     */
    public function setEnableHttp2($enable)
    {
    }
    // USER DEFINED TIMEOUTS
    const DEFAULT_TIMEOUT = 80;
    const DEFAULT_CONNECT_TIMEOUT = 30;
    private $timeout = self::DEFAULT_TIMEOUT;
    private $connectTimeout = self::DEFAULT_CONNECT_TIMEOUT;
    public function setTimeout($seconds)
    {
    }
    public function setConnectTimeout($seconds)
    {
    }
    public function getTimeout()
    {
    }
    public function getConnectTimeout()
    {
    }
    // END OF USER DEFINED TIMEOUTS
    public function request($method, $absUrl, $headers, $params, $hasFile)
    {
    }
    /**
     * @param array $opts cURL options
     */
    private function executeRequestWithRetries($opts, $absUrl)
    {
    }
    /**
     * @param string $url
     * @param int $errno
     * @param string $message
     * @param int $numRetries
     * @throws Error\ApiConnection
     */
    private function handleCurlError($url, $errno, $message, $numRetries)
    {
    }
    /**
     * Checks if an error is a problem that we should retry on. This includes both
     * socket errors that may represent an intermittent problem and some special
     * HTTP statuses.
     * @param int $errno
     * @param int $rcode
     * @param int $numRetries
     * @return bool
     */
    private function shouldRetry($errno, $rcode, $numRetries)
    {
    }
    private function sleepTime($numRetries)
    {
    }
    /**
     * Initializes the curl handle. If already initialized, the handle is closed first.
     */
    private function initCurlHandle()
    {
    }
    /**
     * Closes the curl handle if initialized. Do nothing if already closed.
     */
    private function closeCurlHandle()
    {
    }
    /**
     * Resets the curl handle. If the handle is not already initialized, or if persistent
     * connections are disabled, the handle is reinitialized instead.
     */
    private function resetCurlHandle()
    {
    }
    /**
     * Indicates whether it is safe to use HTTP/2 or not.
     *
     * @return boolean
     */
    private function canSafelyUseHttp2()
    {
    }
    /**
     * Checks if a list of headers contains a specific header name.
     *
     * @param string[] $headers
     * @param string $name
     * @return boolean
     */
    private function hasHeader($headers, $name)
    {
    }
}