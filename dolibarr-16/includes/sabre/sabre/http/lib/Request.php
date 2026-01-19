<?php

namespace Sabre\HTTP;

/**
 * The Request class represents a single HTTP request.
 *
 * You can either simply construct the object from scratch, or if you need
 * access to the current HTTP request, use Sapi::getRequest.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Request extends \Sabre\HTTP\Message implements \Sabre\HTTP\RequestInterface
{
    /**
     * HTTP Method
     *
     * @var string
     */
    protected $method;
    /**
     * Request Url
     *
     * @var string
     */
    protected $url;
    /**
     * Creates the request object
     *
     * @param string $method
     * @param string $url
     * @param array $headers
     * @param resource $body
     */
    function __construct($method = null, $url = null, array $headers = null, $body = null)
    {
    }
    /**
     * Returns the current HTTP method
     *
     * @return string
     */
    function getMethod()
    {
    }
    /**
     * Sets the HTTP method
     *
     * @param string $method
     * @return void
     */
    function setMethod($method)
    {
    }
    /**
     * Returns the request url.
     *
     * @return string
     */
    function getUrl()
    {
    }
    /**
     * Sets the request url.
     *
     * @param string $url
     * @return void
     */
    function setUrl($url)
    {
    }
    /**
     * Returns the list of query parameters.
     *
     * This is equivalent to PHP's $_GET superglobal.
     *
     * @return array
     */
    function getQueryParameters()
    {
    }
    /**
     * Sets the absolute url.
     *
     * @param string $url
     * @return void
     */
    function setAbsoluteUrl($url)
    {
    }
    /**
     * Returns the absolute url.
     *
     * @return string
     */
    function getAbsoluteUrl()
    {
    }
    /**
     * Base url
     *
     * @var string
     */
    protected $baseUrl = '/';
    /**
     * Sets a base url.
     *
     * This url is used for relative path calculations.
     *
     * @param string $url
     * @return void
     */
    function setBaseUrl($url)
    {
    }
    /**
     * Returns the current base url.
     *
     * @return string
     */
    function getBaseUrl()
    {
    }
    /**
     * Returns the relative path.
     *
     * This is being calculated using the base url. This path will not start
     * with a slash, so it will always return something like
     * 'example/path.html'.
     *
     * If the full path is equal to the base url, this method will return an
     * empty string.
     *
     * This method will also urldecode the path, and if the url was incoded as
     * ISO-8859-1, it will convert it to UTF-8.
     *
     * If the path is outside of the base url, a LogicException will be thrown.
     *
     * @return string
     */
    function getPath()
    {
    }
    /**
     * Equivalent of PHP's $_POST.
     *
     * @var array
     */
    protected $postData = [];
    /**
     * Sets the post data.
     *
     * This is equivalent to PHP's $_POST superglobal.
     *
     * This would not have been needed, if POST data was accessible as
     * php://input, but unfortunately we need to special case it.
     *
     * @param array $postData
     * @return void
     */
    function setPostData(array $postData)
    {
    }
    /**
     * Returns the POST data.
     *
     * This is equivalent to PHP's $_POST superglobal.
     *
     * @return array
     */
    function getPostData()
    {
    }
    /**
     * An array containing the raw _SERVER array.
     *
     * @var array
     */
    protected $rawServerData;
    /**
     * Returns an item from the _SERVER array.
     *
     * If the value does not exist in the array, null is returned.
     *
     * @param string $valueName
     * @return string|null
     */
    function getRawServerValue($valueName)
    {
    }
    /**
     * Sets the _SERVER array.
     *
     * @param array $data
     * @return void
     */
    function setRawServerData(array $data)
    {
    }
    /**
     * Serializes the request object as a string.
     *
     * This is useful for debugging purposes.
     *
     * @return string
     */
    function __toString()
    {
    }
}