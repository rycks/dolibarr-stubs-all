<?php

namespace Stripe\HttpClient;

class CurlClient implements \Stripe\HttpClient\ClientInterface
{
    private static $instance;
    public static function instance()
    {
    }
    protected $defaultOptions;
    /** @var \Stripe\Util\RandomGenerator */
    protected $randomGenerator;
    protected $userAgentInfo;
    protected $enablePersistentConnections = true;
    protected $enableHttp2;
    protected $curlHandle;
    protected $requestStatusCallback;
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
     * @param null|array|callable $defaultOptions
     * @param null|\Stripe\Util\RandomGenerator $randomGenerator
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
     * @return bool
     */
    public function getEnablePersistentConnections()
    {
    }
    /**
     * @param bool $enable
     */
    public function setEnablePersistentConnections($enable)
    {
    }
    /**
     * @return bool
     */
    public function getEnableHttp2()
    {
    }
    /**
     * @param bool $enable
     */
    public function setEnableHttp2($enable)
    {
    }
    /**
     * @return null|callable
     */
    public function getRequestStatusCallback()
    {
    }
    /**
     * Sets a callback that is called after each request. The callback will
     * receive the following parameters:
     * <ol>
     *   <li>string $rbody The response body</li>
     *   <li>integer $rcode The response status code</li>
     *   <li>\Stripe\Util\CaseInsensitiveArray $rheaders The response headers</li>
     *   <li>integer $errno The curl error number</li>
     *   <li>string|null $message The curl error message</li>
     *   <li>boolean $shouldRetry Whether the request will be retried</li>
     *   <li>integer $numRetries The number of the retry attempt</li>
     * </ol>.
     *
     * @param null|callable $requestStatusCallback
     */
    public function setRequestStatusCallback($requestStatusCallback)
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
     * @param string $absUrl
     */
    private function executeRequestWithRetries($opts, $absUrl)
    {
    }
    /**
     * @param string $url
     * @param int $errno
     * @param string $message
     * @param int $numRetries
     *
     * @throws Exception\ApiConnectionException
     */
    private function handleCurlError($url, $errno, $message, $numRetries)
    {
    }
    /**
     * Checks if an error is a problem that we should retry on. This includes both
     * socket errors that may represent an intermittent problem and some special
     * HTTP statuses.
     *
     * @param int $errno
     * @param int $rcode
     * @param array|\Stripe\Util\CaseInsensitiveArray $rheaders
     * @param int $numRetries
     *
     * @return bool
     */
    private function shouldRetry($errno, $rcode, $rheaders, $numRetries)
    {
    }
    /**
     * Provides the number of seconds to wait before retrying a request.
     *
     * @param int $numRetries
     * @param array|\Stripe\Util\CaseInsensitiveArray $rheaders
     *
     * @return int
     */
    private function sleepTime($numRetries, $rheaders)
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
     * @return bool
     */
    private function canSafelyUseHttp2()
    {
    }
    /**
     * Checks if a list of headers contains a specific header name.
     *
     * @param string[] $headers
     * @param string $name
     *
     * @return bool
     */
    private function hasHeader($headers, $name)
    {
    }
}