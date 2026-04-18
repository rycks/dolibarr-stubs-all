<?php

namespace Sabre\DAV;

/**
 * Main DAV server class.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Server implements \Psr\Log\LoggerAwareInterface, \Sabre\Event\EmitterInterface
{
    use \Psr\Log\LoggerAwareTrait;
    use \Sabre\Event\WildcardEmitterTrait;
    /**
     * Infinity is used for some request supporting the HTTP Depth header and indicates that the operation should traverse the entire tree.
     */
    const DEPTH_INFINITY = -1;
    /**
     * XML namespace for all SabreDAV related elements.
     */
    const NS_SABREDAV = 'http://sabredav.org/ns';
    /**
     * The tree object.
     *
     * @var Tree
     */
    public $tree;
    /**
     * The base uri.
     *
     * @var string
     */
    protected $baseUri = null;
    /**
     * httpResponse.
     *
     * @var HTTP\Response
     */
    public $httpResponse;
    /**
     * httpRequest.
     *
     * @var HTTP\Request
     */
    public $httpRequest;
    /**
     * PHP HTTP Sapi.
     *
     * @var HTTP\Sapi
     */
    public $sapi;
    /**
     * The list of plugins.
     *
     * @var array
     */
    protected $plugins = [];
    /**
     * This property will be filled with a unique string that describes the
     * transaction. This is useful for performance measuring and logging
     * purposes.
     *
     * By default it will just fill it with a lowercased HTTP method name, but
     * plugins override this. For example, the WebDAV-Sync sync-collection
     * report will set this to 'report-sync-collection'.
     *
     * @var string
     */
    public $transactionType;
    /**
     * This is a list of properties that are always server-controlled, and
     * must not get modified with PROPPATCH.
     *
     * Plugins may add to this list.
     *
     * @var string[]
     */
    public $protectedProperties = [
        // RFC4918
        '{DAV:}getcontentlength',
        '{DAV:}getetag',
        '{DAV:}getlastmodified',
        '{DAV:}lockdiscovery',
        '{DAV:}supportedlock',
        // RFC4331
        '{DAV:}quota-available-bytes',
        '{DAV:}quota-used-bytes',
        // RFC3744
        '{DAV:}supported-privilege-set',
        '{DAV:}current-user-privilege-set',
        '{DAV:}acl',
        '{DAV:}acl-restrictions',
        '{DAV:}inherited-acl-set',
        // RFC3253
        '{DAV:}supported-method-set',
        '{DAV:}supported-report-set',
        // RFC6578
        '{DAV:}sync-token',
        // calendarserver.org extensions
        '{http://calendarserver.org/ns/}ctag',
        // sabredav extensions
        '{http://sabredav.org/ns}sync-token',
    ];
    /**
     * This is a flag that allow or not showing file, line and code
     * of the exception in the returned XML.
     *
     * @var bool
     */
    public $debugExceptions = false;
    /**
     * This property allows you to automatically add the 'resourcetype' value
     * based on a node's classname or interface.
     *
     * The preset ensures that {DAV:}collection is automatically added for nodes
     * implementing Sabre\DAV\ICollection.
     *
     * @var array
     */
    public $resourceTypeMapping = ['Sabre\\DAV\\ICollection' => '{DAV:}collection'];
    /**
     * This property allows the usage of Depth: infinity on PROPFIND requests.
     *
     * By default Depth: infinity is treated as Depth: 1. Allowing Depth:
     * infinity is potentially risky, as it allows a single client to do a full
     * index of the webdav server, which is an easy DoS attack vector.
     *
     * Only turn this on if you know what you're doing.
     *
     * @var bool
     */
    public $enablePropfindDepthInfinity = false;
    /**
     * Reference to the XML utility object.
     *
     * @var Xml\Service
     */
    public $xml;
    /**
     * If this setting is turned off, SabreDAV's version number will be hidden
     * from various places.
     *
     * Some people feel this is a good security measure.
     *
     * @var bool
     */
    public static $exposeVersion = true;
    /**
     * If this setting is turned on, any multi status response on any PROPFIND will be streamed to the output buffer.
     * This will be beneficial for large result sets which will no longer consume a large amount of memory as well as
     * send back data to the client earlier.
     *
     * @var bool
     */
    public static $streamMultiStatus = false;
    /**
     * Sets up the server.
     *
     * If a Sabre\DAV\Tree object is passed as an argument, it will
     * use it as the directory tree. If a Sabre\DAV\INode is passed, it
     * will create a Sabre\DAV\Tree and use the node as the root.
     *
     * If nothing is passed, a Sabre\DAV\SimpleCollection is created in
     * a Sabre\DAV\Tree.
     *
     * If an array is passed, we automatically create a root node, and use
     * the nodes in the array as top-level children.
     *
     * @param Tree|INode|array|null $treeOrNode The tree object
     *
     * @throws Exception
     */
    public function __construct($treeOrNode = null, \Sabre\HTTP\Sapi $sapi = null)
    {
    }
    /**
     * Starts the DAV Server.
     */
    public function start()
    {
    }
    /**
     * Alias of start().
     *
     * @deprecated
     */
    public function exec()
    {
    }
    /**
     * Sets the base server uri.
     *
     * @param string $uri
     */
    public function setBaseUri($uri)
    {
    }
    /**
     * Returns the base responding uri.
     *
     * @return string
     */
    public function getBaseUri()
    {
    }
    /**
     * This method attempts to detect the base uri.
     * Only the PATH_INFO variable is considered.
     *
     * If this variable is not set, the root (/) is assumed.
     *
     * @return string
     */
    public function guessBaseUri()
    {
    }
    /**
     * Adds a plugin to the server.
     *
     * For more information, console the documentation of Sabre\DAV\ServerPlugin
     */
    public function addPlugin(\Sabre\DAV\ServerPlugin $plugin)
    {
    }
    /**
     * Returns an initialized plugin by it's name.
     *
     * This function returns null if the plugin was not found.
     *
     * @param string $name
     *
     * @return ServerPlugin
     */
    public function getPlugin($name)
    {
    }
    /**
     * Returns all plugins.
     *
     * @return array
     */
    public function getPlugins()
    {
    }
    /**
     * Returns the PSR-3 logger object.
     *
     * @return LoggerInterface
     */
    public function getLogger()
    {
    }
    /**
     * Handles a http request, and execute a method based on its name.
     *
     * @param bool $sendResponse whether to send the HTTP response to the DAV client
     */
    public function invokeMethod(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response, $sendResponse = true)
    {
    }
    // {{{ HTTP/WebDAV protocol helpers
    /**
     * Returns an array with all the supported HTTP methods for a specific uri.
     *
     * @param string $path
     *
     * @return array
     */
    public function getAllowedMethods($path)
    {
    }
    /**
     * Gets the uri for the request, keeping the base uri into consideration.
     *
     * @return string
     */
    public function getRequestUri()
    {
    }
    /**
     * Turns a URI such as the REQUEST_URI into a local path.
     *
     * This method:
     *   * strips off the base path
     *   * normalizes the path
     *   * uri-decodes the path
     *
     * @param string $uri
     *
     * @throws Exception\Forbidden A permission denied exception is thrown whenever there was an attempt to supply a uri outside of the base uri
     *
     * @return string
     */
    public function calculateUri($uri)
    {
    }
    /**
     * Returns the HTTP depth header.
     *
     * This method returns the contents of the HTTP depth request header. If the depth header was 'infinity' it will return the Sabre\DAV\Server::DEPTH_INFINITY object
     * It is possible to supply a default depth value, which is used when the depth header has invalid content, or is completely non-existent
     *
     * @param mixed $default
     *
     * @return int
     */
    public function getHTTPDepth($default = self::DEPTH_INFINITY)
    {
    }
    /**
     * Returns the HTTP range header.
     *
     * This method returns null if there is no well-formed HTTP range request
     * header or array($start, $end).
     *
     * The first number is the offset of the first byte in the range.
     * The second number is the offset of the last byte in the range.
     *
     * If the second offset is null, it should be treated as the offset of the last byte of the entity
     * If the first offset is null, the second offset should be used to retrieve the last x bytes of the entity
     *
     * @return int[]|null
     */
    public function getHTTPRange()
    {
    }
    /**
     * Returns the HTTP Prefer header information.
     *
     * The prefer header is defined in:
     * http://tools.ietf.org/html/draft-snell-http-prefer-14
     *
     * This method will return an array with options.
     *
     * Currently, the following options may be returned:
     *  [
     *      'return-asynch'         => true,
     *      'return-minimal'        => true,
     *      'return-representation' => true,
     *      'wait'                  => 30,
     *      'strict'                => true,
     *      'lenient'               => true,
     *  ]
     *
     * This method also supports the Brief header, and will also return
     * 'return-minimal' if the brief header was set to 't'.
     *
     * For the boolean options, false will be returned if the headers are not
     * specified. For the integer options it will be 'null'.
     *
     * @return array
     */
    public function getHTTPPrefer()
    {
    }
    /**
     * Returns information about Copy and Move requests.
     *
     * This function is created to help getting information about the source and the destination for the
     * WebDAV MOVE and COPY HTTP request. It also validates a lot of information and throws proper exceptions
     *
     * The returned value is an array with the following keys:
     *   * destination - Destination path
     *   * destinationExists - Whether or not the destination is an existing url (and should therefore be overwritten)
     *
     * @throws Exception\BadRequest           upon missing or broken request headers
     * @throws Exception\UnsupportedMediaType when trying to copy into a
     *                                        non-collection
     * @throws Exception\PreconditionFailed   if overwrite is set to false, but
     *                                        the destination exists
     * @throws Exception\Forbidden            when source and destination paths are
     *                                        identical
     * @throws Exception\Conflict             when trying to copy a node into its own
     *                                        subtree
     *
     * @return array
     */
    public function getCopyAndMoveInfo(\Sabre\HTTP\RequestInterface $request)
    {
    }
    /**
     * Returns a list of properties for a path.
     *
     * This is a simplified version getPropertiesForPath. If you aren't
     * interested in status codes, but you just want to have a flat list of
     * properties, use this method.
     *
     * Please note though that any problems related to retrieving properties,
     * such as permission issues will just result in an empty array being
     * returned.
     *
     * @param string $path
     * @param array  $propertyNames
     *
     * @return array
     */
    public function getProperties($path, $propertyNames)
    {
    }
    /**
     * A kid-friendly way to fetch properties for a node's children.
     *
     * The returned array will be indexed by the path of the of child node.
     * Only properties that are actually found will be returned.
     *
     * The parent node will not be returned.
     *
     * @param string $path
     * @param array  $propertyNames
     *
     * @return array
     */
    public function getPropertiesForChildren($path, $propertyNames)
    {
    }
    /**
     * Returns a list of HTTP headers for a particular resource.
     *
     * The generated http headers are based on properties provided by the
     * resource. The method basically provides a simple mapping between
     * DAV property and HTTP header.
     *
     * The headers are intended to be used for HEAD and GET requests.
     *
     * @param string $path
     *
     * @return array
     */
    public function getHTTPHeaders($path)
    {
    }
    /**
     * Small helper to support PROPFIND with DEPTH_INFINITY.
     *
     * @param array $yieldFirst
     *
     * @return \Traversable
     */
    private function generatePathNodes(\Sabre\DAV\PropFind $propFind, array $yieldFirst = null)
    {
    }
    /**
     * Returns a list of properties for a given path.
     *
     * The path that should be supplied should have the baseUrl stripped out
     * The list of properties should be supplied in Clark notation. If the list is empty
     * 'allprops' is assumed.
     *
     * If a depth of 1 is requested child elements will also be returned.
     *
     * @param string $path
     * @param array  $propertyNames
     * @param int    $depth
     *
     * @return array
     *
     * @deprecated Use getPropertiesIteratorForPath() instead (as it's more memory efficient)
     * @see getPropertiesIteratorForPath()
     */
    public function getPropertiesForPath($path, $propertyNames = [], $depth = 0)
    {
    }
    /**
     * Returns a list of properties for a given path.
     *
     * The path that should be supplied should have the baseUrl stripped out
     * The list of properties should be supplied in Clark notation. If the list is empty
     * 'allprops' is assumed.
     *
     * If a depth of 1 is requested child elements will also be returned.
     *
     * @param string $path
     * @param array  $propertyNames
     * @param int    $depth
     *
     * @return \Iterator
     */
    public function getPropertiesIteratorForPath($path, $propertyNames = [], $depth = 0)
    {
    }
    /**
     * Returns a list of properties for a list of paths.
     *
     * The path that should be supplied should have the baseUrl stripped out
     * The list of properties should be supplied in Clark notation. If the list is empty
     * 'allprops' is assumed.
     *
     * The result is returned as an array, with paths for it's keys.
     * The result may be returned out of order.
     *
     * @return array
     */
    public function getPropertiesForMultiplePaths(array $paths, array $propertyNames = [])
    {
    }
    /**
     * Determines all properties for a node.
     *
     * This method tries to grab all properties for a node. This method is used
     * internally getPropertiesForPath and a few others.
     *
     * It could be useful to call this, if you already have an instance of your
     * target node and simply want to run through the system to get a correct
     * list of properties.
     *
     * @return bool
     */
    public function getPropertiesByNode(\Sabre\DAV\PropFind $propFind, \Sabre\DAV\INode $node)
    {
    }
    /**
     * This method is invoked by sub-systems creating a new file.
     *
     * Currently this is done by HTTP PUT and HTTP LOCK (in the Locks_Plugin).
     * It was important to get this done through a centralized function,
     * allowing plugins to intercept this using the beforeCreateFile event.
     *
     * This method will return true if the file was actually created
     *
     * @param string   $uri
     * @param resource $data
     * @param string   $etag
     *
     * @return bool
     */
    public function createFile($uri, $data, &$etag = null)
    {
    }
    /**
     * This method is invoked by sub-systems updating a file.
     *
     * This method will return true if the file was actually updated
     *
     * @param string   $uri
     * @param resource $data
     * @param string   $etag
     *
     * @return bool
     */
    public function updateFile($uri, $data, &$etag = null)
    {
    }
    /**
     * This method is invoked by sub-systems creating a new directory.
     *
     * @param string $uri
     */
    public function createDirectory($uri)
    {
    }
    /**
     * Use this method to create a new collection.
     *
     * @param string $uri The new uri
     *
     * @return array|null
     */
    public function createCollection($uri, \Sabre\DAV\MkCol $mkCol)
    {
    }
    /**
     * This method updates a resource's properties.
     *
     * The properties array must be a list of properties. Array-keys are
     * property names in clarknotation, array-values are it's values.
     * If a property must be deleted, the value should be null.
     *
     * Note that this request should either completely succeed, or
     * completely fail.
     *
     * The response is an array with properties for keys, and http status codes
     * as their values.
     *
     * @param string $path
     *
     * @return array
     */
    public function updateProperties($path, array $properties)
    {
    }
    /**
     * This method checks the main HTTP preconditions.
     *
     * Currently these are:
     *   * If-Match
     *   * If-None-Match
     *   * If-Modified-Since
     *   * If-Unmodified-Since
     *
     * The method will return true if all preconditions are met
     * The method will return false, or throw an exception if preconditions
     * failed. If false is returned the operation should be aborted, and
     * the appropriate HTTP response headers are already set.
     *
     * Normally this method will throw 412 Precondition Failed for failures
     * related to If-None-Match, If-Match and If-Unmodified Since. It will
     * set the status to 304 Not Modified for If-Modified_since.
     *
     * @return bool
     */
    public function checkPreconditions(\Sabre\HTTP\RequestInterface $request, \Sabre\HTTP\ResponseInterface $response)
    {
    }
    /**
     * This method is created to extract information from the WebDAV HTTP 'If:' header.
     *
     * The If header can be quite complex, and has a bunch of features. We're using a regex to extract all relevant information
     * The function will return an array, containing structs with the following keys
     *
     *   * uri   - the uri the condition applies to.
     *   * tokens - The lock token. another 2 dimensional array containing 3 elements
     *
     * Example 1:
     *
     * If: (<opaquelocktoken:181d4fae-7d8c-11d0-a765-00a0c91e6bf2>)
     *
     * Would result in:
     *
     * [
     *    [
     *       'uri' => '/request/uri',
     *       'tokens' => [
     *          [
     *              [
     *                  'negate' => false,
     *                  'token'  => 'opaquelocktoken:181d4fae-7d8c-11d0-a765-00a0c91e6bf2',
     *                  'etag'   => ""
     *              ]
     *          ]
     *       ],
     *    ]
     * ]
     *
     * Example 2:
     *
     * If: </path/> (Not <opaquelocktoken:181d4fae-7d8c-11d0-a765-00a0c91e6bf2> ["Im An ETag"]) (["Another ETag"]) </path2/> (Not ["Path2 ETag"])
     *
     * Would result in:
     *
     * [
     *    [
     *       'uri' => 'path',
     *       'tokens' => [
     *          [
     *              [
     *                  'negate' => true,
     *                  'token'  => 'opaquelocktoken:181d4fae-7d8c-11d0-a765-00a0c91e6bf2',
     *                  'etag'   => '"Im An ETag"'
     *              ],
     *              [
     *                  'negate' => false,
     *                  'token'  => '',
     *                  'etag'   => '"Another ETag"'
     *              ]
     *          ]
     *       ],
     *    ],
     *    [
     *       'uri' => 'path2',
     *       'tokens' => [
     *          [
     *              [
     *                  'negate' => true,
     *                  'token'  => '',
     *                  'etag'   => '"Path2 ETag"'
     *              ]
     *          ]
     *       ],
     *    ],
     * ]
     *
     * @return array
     */
    public function getIfConditions(\Sabre\HTTP\RequestInterface $request)
    {
    }
    /**
     * Returns an array with resourcetypes for a node.
     *
     * @return array
     */
    public function getResourceTypeForNode(\Sabre\DAV\INode $node)
    {
    }
    // }}}
    // {{{ XML Readers & Writers
    /**
     * Returns a callback generating a WebDAV propfind response body based on a list of nodes.
     *
     * If 'strip404s' is set to true, all 404 responses will be removed.
     *
     * @param array|\Traversable $fileProperties The list with nodes
     * @param bool               $strip404s
     *
     * @return callable|string
     */
    public function generateMultiStatus($fileProperties, $strip404s = false)
    {
    }
    /**
     * @param $fileProperties
     */
    private function writeMultiStatus(\Sabre\Xml\Writer $w, $fileProperties, bool $strip404s)
    {
    }
}