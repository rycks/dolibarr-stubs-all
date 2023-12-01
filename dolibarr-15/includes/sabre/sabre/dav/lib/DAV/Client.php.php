<?php

namespace Sabre\DAV;

/**
 * SabreDAV DAV client
 *
 * This client wraps around Curl to provide a convenient API to a WebDAV
 * server.
 *
 * NOTE: This class is experimental, it's api will likely change in the future.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Client extends \Sabre\HTTP\Client
{
    /**
     * The xml service.
     *
     * Uset this service to configure the property and namespace maps.
     *
     * @var mixed
     */
    public $xml;
    /**
     * The elementMap
     *
     * This property is linked via reference to $this->xml->elementMap.
     * It's deprecated as of version 3.0.0, and should no longer be used.
     *
     * @deprecated
     * @var array
     */
    public $propertyMap = [];
    /**
     * Base URI
     *
     * This URI will be used to resolve relative urls.
     *
     * @var string
     */
    protected $baseUri;
    /**
     * Basic authentication
     */
    const AUTH_BASIC = 1;
    /**
     * Digest authentication
     */
    const AUTH_DIGEST = 2;
    /**
     * NTLM authentication
     */
    const AUTH_NTLM = 4;
    /**
     * Identity encoding, which basically does not nothing.
     */
    const ENCODING_IDENTITY = 1;
    /**
     * Deflate encoding
     */
    const ENCODING_DEFLATE = 2;
    /**
     * Gzip encoding
     */
    const ENCODING_GZIP = 4;
    /**
     * Sends all encoding headers.
     */
    const ENCODING_ALL = 7;
    /**
     * Content-encoding
     *
     * @var int
     */
    protected $encoding = self::ENCODING_IDENTITY;
    /**
     * Constructor
     *
     * Settings are provided through the 'settings' argument. The following
     * settings are supported:
     *
     *   * baseUri
     *   * userName (optional)
     *   * password (optional)
     *   * proxy (optional)
     *   * authType (optional)
     *   * encoding (optional)
     *
     *  authType must be a bitmap, using self::AUTH_BASIC, self::AUTH_DIGEST
     *  and self::AUTH_NTLM. If you know which authentication method will be
     *  used, it's recommended to set it, as it will save a great deal of
     *  requests to 'discover' this information.
     *
     *  Encoding is a bitmap with one of the ENCODING constants.
     *
     * @param array $settings
     */
    function __construct(array $settings)
    {
    }
    /**
     * Does a PROPFIND request
     *
     * The list of requested properties must be specified as an array, in clark
     * notation.
     *
     * The returned array will contain a list of filenames as keys, and
     * properties as values.
     *
     * The properties array will contain the list of properties. Only properties
     * that are actually returned from the server (without error) will be
     * returned, anything else is discarded.
     *
     * Depth should be either 0 or 1. A depth of 1 will cause a request to be
     * made to the server to also return all child resources.
     *
     * @param string $url
     * @param array $properties
     * @param int $depth
     * @return array
     */
    function propFind($url, array $properties, $depth = 0)
    {
    }
    /**
     * Updates a list of properties on the server
     *
     * The list of properties must have clark-notation properties for the keys,
     * and the actual (string) value for the value. If the value is null, an
     * attempt is made to delete the property.
     *
     * @param string $url
     * @param array $properties
     * @return bool
     */
    function propPatch($url, array $properties)
    {
    }
    /**
     * Performs an HTTP options request
     *
     * This method returns all the features from the 'DAV:' header as an array.
     * If there was no DAV header, or no contents this method will return an
     * empty array.
     *
     * @return array
     */
    function options()
    {
    }
    /**
     * Performs an actual HTTP request, and returns the result.
     *
     * If the specified url is relative, it will be expanded based on the base
     * url.
     *
     * The returned array contains 3 keys:
     *   * body - the response body
     *   * httpCode - a HTTP code (200, 404, etc)
     *   * headers - a list of response http headers. The header names have
     *     been lowercased.
     *
     * For large uploads, it's highly recommended to specify body as a stream
     * resource. You can easily do this by simply passing the result of
     * fopen(..., 'r').
     *
     * This method will throw an exception if an HTTP error was received. Any
     * HTTP status code above 399 is considered an error.
     *
     * Note that it is no longer recommended to use this method, use the send()
     * method instead.
     *
     * @param string $method
     * @param string $url
     * @param string|resource|null $body
     * @param array $headers
     * @throws ClientException, in case a curl error occurred.
     * @return array
     */
    function request($method, $url = '', $body = null, array $headers = [])
    {
    }
    /**
     * Returns the full url based on the given url (which may be relative). All
     * urls are expanded based on the base url as given by the server.
     *
     * @param string $url
     * @return string
     */
    function getAbsoluteUrl($url)
    {
    }
    /**
     * Parses a WebDAV multistatus response body
     *
     * This method returns an array with the following structure
     *
     * [
     *   'url/to/resource' => [
     *     '200' => [
     *        '{DAV:}property1' => 'value1',
     *        '{DAV:}property2' => 'value2',
     *     ],
     *     '404' => [
     *        '{DAV:}property1' => null,
     *        '{DAV:}property2' => null,
     *     ],
     *   ],
     *   'url/to/resource2' => [
     *      .. etc ..
     *   ]
     * ]
     *
     *
     * @param string $body xml body
     * @return array
     */
    function parseMultiStatus($body)
    {
    }
}