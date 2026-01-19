<?php

namespace flight\net;

/**
 * The Route class is responsible for routing an HTTP request to
 * an assigned callback function. The Router tries to match the
 * requested URL against a series of URL patterns.
 */
final class Route
{
    /**
     * @var string URL pattern
     */
    public string $pattern;
    /**
     * @var mixed Callback function
     */
    public $callback;
    /**
     * @var array HTTP methods
     */
    public array $methods = [];
    /**
     * @var array Route parameters
     */
    public array $params = [];
    /**
     * @var string|null Matching regular expression
     */
    public ?string $regex = null;
    /**
     * @var string URL splat content
     */
    public string $splat = '';
    /**
     * @var bool Pass self in callback parameters
     */
    public bool $pass = false;
    /**
     * Constructor.
     *
     * @param string $pattern  URL pattern
     * @param mixed  $callback Callback function
     * @param array  $methods  HTTP methods
     * @param bool   $pass     Pass self in callback parameters
     */
    public function __construct(string $pattern, $callback, array $methods, bool $pass)
    {
    }
    /**
     * Checks if a URL matches the route pattern. Also parses named parameters in the URL.
     *
     * @param string $url            Requested URL
     * @param bool   $case_sensitive Case sensitive matching
     *
     * @return bool Match status
     */
    public function matchUrl(string $url, bool $case_sensitive = false) : bool
    {
    }
    /**
     * Checks if an HTTP method matches the route methods.
     *
     * @param string $method HTTP method
     *
     * @return bool Match status
     */
    public function matchMethod(string $method) : bool
    {
    }
}