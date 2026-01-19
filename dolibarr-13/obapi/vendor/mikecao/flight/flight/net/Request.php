<?php

namespace flight\net;

/**
 * The Request class represents an HTTP request. Data from
 * all the super globals $_GET, $_POST, $_COOKIE, and $_FILES
 * are stored and accessible via the Request object.
 *
 * The default request properties are:
 *   url - The URL being requested
 *   base - The parent subdirectory of the URL
 *   method - The request method (GET, POST, PUT, DELETE)
 *   referrer - The referrer URL
 *   ip - IP address of the client
 *   ajax - Whether the request is an AJAX request
 *   scheme - The server protocol (http, https)
 *   user_agent - Browser information
 *   type - The content type
 *   length - The content length
 *   query - Query string parameters
 *   data - Post parameters
 *   cookies - Cookie parameters
 *   files - Uploaded files
 *   secure - Connection is secure
 *   accept - HTTP accept parameters
 *   proxy_ip - Proxy IP address of the client
 */
final class Request
{
    /**
     * @var string URL being requested
     */
    public string $url;
    /**
     * @var string Parent subdirectory of the URL
     */
    public string $base;
    /**
     * @var string Request method (GET, POST, PUT, DELETE)
     */
    public string $method;
    /**
     * @var string Referrer URL
     */
    public string $referrer;
    /**
     * @var string IP address of the client
     */
    public string $ip;
    /**
     * @var bool Whether the request is an AJAX request
     */
    public bool $ajax;
    /**
     * @var string Server protocol (http, https)
     */
    public string $scheme;
    /**
     * @var string Browser information
     */
    public string $user_agent;
    /**
     * @var string Content type
     */
    public string $type;
    /**
     * @var int Content length
     */
    public int $length;
    /**
     * @var Collection Query string parameters
     */
    public \flight\util\Collection $query;
    /**
     * @var Collection Post parameters
     */
    public \flight\util\Collection $data;
    /**
     * @var Collection Cookie parameters
     */
    public \flight\util\Collection $cookies;
    /**
     * @var Collection Uploaded files
     */
    public \flight\util\Collection $files;
    /**
     * @var bool Whether the connection is secure
     */
    public bool $secure;
    /**
     * @var string HTTP accept parameters
     */
    public string $accept;
    /**
     * @var string Proxy IP address of the client
     */
    public string $proxy_ip;
    /**
     * @var string HTTP host name
     */
    public string $host;
    /**
     * Constructor.
     *
     * @param array $config Request configuration
     */
    public function __construct(array $config = [])
    {
    }
    /**
     * Initialize request properties.
     *
     * @param array $properties Array of request properties
     */
    public function init(array $properties = [])
    {
    }
    /**
     * Gets the body of the request.
     *
     * @return string Raw HTTP request body
     */
    public static function getBody() : ?string
    {
    }
    /**
     * Gets the request method.
     */
    public static function getMethod() : string
    {
    }
    /**
     * Gets the real remote IP address.
     *
     * @return string IP address
     */
    public static function getProxyIpAddress() : string
    {
    }
    /**
     * Gets a variable from $_SERVER using $default if not provided.
     *
     * @param string $var     Variable name
     * @param mixed  $default Default value to substitute
     *
     * @return mixed Server variable value
     */
    public static function getVar(string $var, $default = '')
    {
    }
    /**
     * Parse query parameters from a URL.
     *
     * @param string $url URL string
     *
     * @return array Query parameters
     */
    public static function parseQuery(string $url) : array
    {
    }
    public static function getScheme() : string
    {
    }
}