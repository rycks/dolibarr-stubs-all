<?php

namespace flight\net;

/**
 * The Response class represents an HTTP response. The object
 * contains the response headers, HTTP status code, and response
 * body.
 */
class Response
{
    /**
     * header Content-Length.
     */
    public bool $content_length = true;
    /**
     * @var array HTTP status codes
     */
    public static array $codes = [100 => 'Continue', 101 => 'Switching Protocols', 102 => 'Processing', 200 => 'OK', 201 => 'Created', 202 => 'Accepted', 203 => 'Non-Authoritative Information', 204 => 'No Content', 205 => 'Reset Content', 206 => 'Partial Content', 207 => 'Multi-Status', 208 => 'Already Reported', 226 => 'IM Used', 300 => 'Multiple Choices', 301 => 'Moved Permanently', 302 => 'Found', 303 => 'See Other', 304 => 'Not Modified', 305 => 'Use Proxy', 306 => '(Unused)', 307 => 'Temporary Redirect', 308 => 'Permanent Redirect', 400 => 'Bad Request', 401 => 'Unauthorized', 402 => 'Payment Required', 403 => 'Forbidden', 404 => 'Not Found', 405 => 'Method Not Allowed', 406 => 'Not Acceptable', 407 => 'Proxy Authentication Required', 408 => 'Request Timeout', 409 => 'Conflict', 410 => 'Gone', 411 => 'Length Required', 412 => 'Precondition Failed', 413 => 'Payload Too Large', 414 => 'URI Too Long', 415 => 'Unsupported Media Type', 416 => 'Range Not Satisfiable', 417 => 'Expectation Failed', 422 => 'Unprocessable Entity', 423 => 'Locked', 424 => 'Failed Dependency', 426 => 'Upgrade Required', 428 => 'Precondition Required', 429 => 'Too Many Requests', 431 => 'Request Header Fields Too Large', 500 => 'Internal Server Error', 501 => 'Not Implemented', 502 => 'Bad Gateway', 503 => 'Service Unavailable', 504 => 'Gateway Timeout', 505 => 'HTTP Version Not Supported', 506 => 'Variant Also Negotiates', 507 => 'Insufficient Storage', 508 => 'Loop Detected', 510 => 'Not Extended', 511 => 'Network Authentication Required'];
    /**
     * @var int HTTP status
     */
    protected int $status = 200;
    /**
     * @var array HTTP headers
     */
    protected array $headers = [];
    /**
     * @var string HTTP response body
     */
    protected string $body = '';
    /**
     * @var bool HTTP response sent
     */
    protected bool $sent = false;
    /**
     * Sets the HTTP status of the response.
     *
     * @param int|null $code HTTP status code.
     *
     * @throws Exception If invalid status code
     *
     * @return int|object Self reference
     */
    public function status(?int $code = null)
    {
    }
    /**
     * Adds a header to the response.
     *
     * @param array|string $name  Header name or array of names and values
     * @param string|null  $value Header value
     *
     * @return object Self reference
     */
    public function header($name, ?string $value = null)
    {
    }
    /**
     * Returns the headers from the response.
     *
     * @return array
     */
    public function headers()
    {
    }
    /**
     * Writes content to the response body.
     *
     * @param string $str Response content
     *
     * @return Response Self reference
     */
    public function write(string $str) : self
    {
    }
    /**
     * Clears the response.
     *
     * @return Response Self reference
     */
    public function clear() : self
    {
    }
    /**
     * Sets caching headers for the response.
     *
     * @param int|string $expires Expiration time
     *
     * @return Response Self reference
     */
    public function cache($expires) : self
    {
    }
    /**
     * Sends HTTP headers.
     *
     * @return Response Self reference
     */
    public function sendHeaders() : self
    {
    }
    /**
     * Gets the content length.
     *
     * @return int Content length
     */
    public function getContentLength() : int
    {
    }
    /**
     * Gets whether response was sent.
     */
    public function sent() : bool
    {
    }
    /**
     * Sends a HTTP response.
     */
    public function send() : void
    {
    }
}