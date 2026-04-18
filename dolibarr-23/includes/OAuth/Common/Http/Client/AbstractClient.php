<?php

namespace OAuth\Common\Http\Client;

/**
 * Abstract HTTP client
 */
abstract class AbstractClient implements \OAuth\Common\Http\Client\ClientInterface
{
    /**
     * @var string The user agent string passed to services
     */
    protected $userAgent;
    /**
     * @var int The maximum number of redirects
     */
    protected $maxRedirects = 5;
    /**
     * @var int The maximum timeout
     */
    protected $timeout = 15;
    /**
     * Creates instance
     *
     * @param string $userAgent The UA string the client will use
     */
    public function __construct($userAgent = 'PHPoAuthLib')
    {
    }
    /**
     * @param int $redirects Maximum redirects for client
     *
     * @return ClientInterface
     */
    public function setMaxRedirects($redirects)
    {
    }
    /**
     * @param int $timeout Request timeout time for client in seconds
     *
     * @return ClientInterface
     */
    public function setTimeout($timeout)
    {
    }
    /**
     * @param array $headers
     */
    public function normalizeHeaders($headers)
    {
    }
}