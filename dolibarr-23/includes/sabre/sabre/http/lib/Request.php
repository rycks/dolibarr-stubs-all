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
     * HTTP Method.
     *
     * @var string
     */
    protected $method;
    /**
     * Request Url.
     *
     * @var string
     */
    protected $url;
    /**
     * Creates the request object.
     *
     * @param resource|callable|string $body
     */
    public function __construct(string $method, string $url, array $headers = [], $body = null)
    {
    }
    /**
     * Returns the current HTTP method.
     */
    public function getMethod() : string
    {
    }
    /**
     * Sets the HTTP method.
     */
    public function setMethod(string $method)
    {
    }
    /**
     * Returns the request url.
     */
    public function getUrl() : string
    {
    }
    /**
     * Sets the request url.
     */
    public function setUrl(string $url)
    {
    }
    /**
     * Returns the list of query parameters.
     *
     * This is equivalent to PHP's $_GET superglobal.
     */
    public function getQueryParameters() : array
    {
    }
    protected $absoluteUrl;
    /**
     * Sets the absolute url.
     */
    public function setAbsoluteUrl(string $url)
    {
    }
    /**
     * Returns the absolute url.
     */
    public function getAbsoluteUrl() : string
    {
    }
    /**
     * Base url.
     *
     * @var string
     */
    protected $baseUrl = '/';
    /**
     * Sets a base url.
     *
     * This url is used for relative path calculations.
     */
    public function setBaseUrl(string $url)
    {
    }
    /**
     * Returns the current base url.
     */
    public function getBaseUrl() : string
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
     * This method will also urldecode the path, and if the url was encoded as
     * ISO-8859-1, it will convert it to UTF-8.
     *
     * If the path is outside of the base url, a LogicException will be thrown.
     */
    public function getPath() : string
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
     */
    public function setPostData(array $postData)
    {
    }
    /**
     * Returns the POST data.
     *
     * This is equivalent to PHP's $_POST superglobal.
     */
    public function getPostData() : array
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
     * @return string|null
     */
    public function getRawServerValue(string $valueName)
    {
    }
    /**
     * Sets the _SERVER array.
     */
    public function setRawServerData(array $data)
    {
    }
    /**
     * Serializes the request object as a string.
     *
     * This is useful for debugging purposes.
     */
    public function __toString() : string
    {
    }
}