<?php

namespace Luracast\Restler;

/**
 * REST API Server. It is the server part of the Restler framework.
 * inspired by the RestServer code from
 * <http://jacwright.com/blog/resources/RestServer.txt>
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 *
 * @method static void onGet() onGet(Callable $function) fired before reading the request details
 * @method static void onRoute() onRoute(Callable $function) fired before finding the api method
 * @method static void onNegotiate() onNegotiate(Callable $function) fired before content negotiation
 * @method static void onPreAuthFilter() onPreAuthFilter(Callable $function) fired before pre auth filtering
 * @method static void onAuthenticate() onAuthenticate(Callable $function) fired before auth
 * @method static void onPostAuthFilter() onPostAuthFilter(Callable $function) fired before post auth filtering
 * @method static void onValidate() onValidate(Callable $function) fired before validation
 * @method static void onCall() onCall(Callable $function) fired before api method call
 * @method static void onCompose() onCompose(Callable $function) fired before composing response
 * @method static void onRespond() onRespond(Callable $function) fired before sending response
 * @method static void onComplete() onComplete(Callable $function) fired after sending response
 * @method static void onMessage() onMessage(Callable $function) fired before composing error response
 *
 * @method void onGet() onGet(Callable $function) fired before reading the request details
 * @method void onRoute() onRoute(Callable $function) fired before finding the api method
 * @method void onNegotiate() onNegotiate(Callable $function) fired before content negotiation
 * @method void onPreAuthFilter() onPreAuthFilter(Callable $function) fired before pre auth filtering
 * @method void onAuthenticate() onAuthenticate(Callable $function) fired before auth
 * @method void onPostAuthFilter() onPostAuthFilter(Callable $function) fired before post auth filtering
 * @method void onValidate() onValidate(Callable $function) fired before validation
 * @method void onCall() onCall(Callable $function) fired before api method call
 * @method void onCompose() onCompose(Callable $function) fired before composing response
 * @method void onRespond() onRespond(Callable $function) fired before sending response
 * @method void onComplete() onComplete(Callable $function) fired after sending response
 * @method void onMessage() onMessage(Callable $function) fired before composing error response
 */
class Restler extends \Luracast\Restler\EventDispatcher
{
    const VERSION = '3.0.0rc6';
    // ==================================================================
    //
    // Public variables
    //
    // ------------------------------------------------------------------
    /**
     * Reference to the last exception thrown
     * @var RestException
     */
    public $exception = null;
    /**
     * Used in production mode to store the routes and more
     *
     * @var iCache
     */
    public $cache;
    /**
     * URL of the currently mapped service
     *
     * @var string
     */
    public $url;
    /**
     * Http request method of the current request.
     * Any value between [GET, PUT, POST, DELETE]
     *
     * @var string
     */
    public $requestMethod;
    /**
     * Requested data format.
     * Instance of the current format class
     * which implements the iFormat interface
     *
     * @var iFormat
     * @example jsonFormat, xmlFormat, yamlFormat etc
     */
    public $requestFormat;
    /**
     * Response data format.
     *
     * Instance of the current format class
     * which implements the iFormat interface
     *
     * @var iFormat
     * @example jsonFormat, xmlFormat, yamlFormat etc
     */
    public $responseFormat;
    /**
     * Http status code
     *
     * @var int|null when specified it will override @status comment
     */
    public $responseCode = null;
    /**
     * @var string base url of the api service
     */
    protected $baseUrl;
    /**
     * @var bool Used for waiting till verifying @format
     *           before throwing content negotiation failed
     */
    protected $requestFormatDiffered = false;
    /**
     * method information including metadata
     *
     * @var ApiMethodInfo
     */
    public $apiMethodInfo;
    /**
     * @var int for calculating execution time
     */
    protected $startTime;
    /**
     * When set to false, it will run in debug mode and parse the
     * class files every time to map it to the URL
     *
     * @var boolean
     */
    protected $productionMode = false;
    public $refreshCache = false;
    /**
     * Caching of url map is enabled or not
     *
     * @var boolean
     */
    protected $cached;
    /**
     * @var int
     */
    protected $apiVersion = 1;
    /**
     * @var int
     */
    protected $requestedApiVersion = 1;
    /**
     * @var int
     */
    protected $apiMinimumVersion = 1;
    /**
     * @var array
     */
    protected $apiVersionMap = array();
    /**
     * Associated array that maps formats to their respective format class name
     *
     * @var array
     */
    protected $formatMap = array();
    /**
     * List of the Mime Types that can be produced as a response by this API
     *
     * @var array
     */
    protected $writableMimeTypes = array();
    /**
     * List of the Mime Types that are supported for incoming requests by this API
     *
     * @var array
     */
    protected $readableMimeTypes = array();
    /**
     * Associated array that maps formats to their respective format class name
     *
     * @var array
     */
    protected $formatOverridesMap = array('extensions' => array());
    /**
     * list of filter classes
     *
     * @var array
     */
    protected $filterClasses = array();
    /**
     * instances of filter classes that are executed after authentication
     *
     * @var array
     */
    protected $postAuthFilterClasses = array();
    // ==================================================================
    //
    // Protected variables
    //
    // ------------------------------------------------------------------
    /**
     * Data sent to the service
     *
     * @var array
     */
    protected $requestData = array();
    /**
     * list of authentication classes
     *
     * @var array
     */
    protected $authClasses = array();
    /**
     * list of error handling classes
     *
     * @var array
     */
    protected $errorClasses = array();
    protected $authenticated = false;
    protected $authVerified = false;
    /**
     * @var mixed
     */
    protected $responseData;
    /**
     * Constructor
     *
     * @param boolean $productionMode    When set to false, it will run in
     *                                   debug mode and parse the class files
     *                                   every time to map it to the URL
     *
     * @param bool    $refreshCache      will update the cache when set to true
     */
    public function __construct($productionMode = false, $refreshCache = false)
    {
    }
    /**
     * Main function for processing the api request
     * and return the response
     *
     * @throws Exception     when the api service class is missing
     * @throws RestException to send error response
     */
    public function handle()
    {
    }
    /**
     * read the request details
     *
     * Find out the following
     *  - baseUrl
     *  - url requested
     *  - version requested (if url based versioning)
     *  - http verb/method
     *  - negotiate content type
     *  - request data
     *  - set defaults
     */
    protected function get()
    {
    }
    /**
     * Returns a list of the mime types (e.g.  ["application/json","application/xml"]) that the API can respond with
     * @return array
     */
    public function getWritableMimeTypes()
    {
    }
    /**
     * Returns the list of Mime Types for the request that the API can understand
     * @return array
     */
    public function getReadableMimeTypes()
    {
    }
    /**
     * Call this method and pass all the formats that should be  supported by
     * the API Server. Accepts multiple parameters
     *
     * @param string ,... $formatName   class name of the format class that
     *                                  implements iFormat
     *
     * @example $restler->setSupportedFormats('JsonFormat', 'XmlFormat'...);
     * @throws Exception
     */
    public function setSupportedFormats($format = null)
    {
    }
    /**
     * Call this method and pass all the formats that can be used to override
     * the supported formats using `@format` comment. Accepts multiple parameters
     *
     * @param string ,... $formatName   class name of the format class that
     *                                  implements iFormat
     *
     * @example $restler->setOverridingFormats('JsonFormat', 'XmlFormat'...);
     * @throws Exception
     */
    public function setOverridingFormats($format = null)
    {
    }
    /**
     * Set one or more string to be considered as the base url
     *
     * When more than one base url is provided, restler will make
     * use of $_SERVER['HTTP_HOST'] to find the right one
     *
     * @param string ,... $url
     */
    public function setBaseUrls($url)
    {
    }
    /**
     * Parses the request url and get the api path
     *
     * @return string api path
     */
    protected function getPath()
    {
    }
    /**
     * Parses the request to figure out format of the request data
     *
     * @throws RestException
     * @return iFormat any class that implements iFormat
     * @example JsonFormat
     */
    protected function getRequestFormat()
    {
    }
    public function getRequestStream()
    {
    }
    /**
     * Parses the request data and returns it
     *
     * @param bool $includeQueryParameters
     *
     * @return array php data
     */
    public function getRequestData($includeQueryParameters = true)
    {
    }
    /**
     * Find the api method to execute for the requested Url
     */
    protected function route()
    {
    }
    /**
     * Negotiate the response details such as
     *  - cross origin resource sharing
     *  - media type
     *  - charset
     *  - language
     */
    protected function negotiate()
    {
    }
    protected function negotiateCORS()
    {
    }
    // ==================================================================
    //
    // Protected functions
    //
    // ------------------------------------------------------------------
    /**
     * Parses the request to figure out the best format for response.
     * Extension, if present, overrides the Accept header
     *
     * @throws RestException
     * @return iFormat
     * @example JsonFormat
     */
    protected function negotiateResponseFormat()
    {
    }
    protected function negotiateCharset()
    {
    }
    protected function negotiateLanguage()
    {
    }
    /**
     * Filer api calls before authentication
     */
    protected function preAuthFilter()
    {
    }
    protected function authenticate()
    {
    }
    /**
     * Filer api calls after authentication
     */
    protected function postAuthFilter()
    {
    }
    protected function validate()
    {
    }
    protected function call()
    {
    }
    protected function compose()
    {
    }
    public function composeHeaders(\Luracast\Restler\RestException $e = null)
    {
    }
    protected function respond()
    {
    }
    protected function message(\Exception $exception)
    {
    }
    /**
     * Provides backward compatibility with older versions of Restler
     *
     * @param int $version restler version
     *
     * @throws \OutOfRangeException
     */
    public function setCompatibilityMode($version = 2)
    {
    }
    /**
     * @param int $version                 maximum version number supported
     *                                     by  the api
     * @param int $minimum                 minimum version number supported
     * (optional)
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function setAPIVersion($version = 1, $minimum = 1)
    {
    }
    /**
     * Classes implementing iFilter interface can be added for filtering out
     * the api consumers.
     *
     * It can be used for rate limiting based on usage from a specific ip
     * address or filter by country, device etc.
     *
     * @param $className
     */
    public function addFilterClass($className)
    {
    }
    /**
     * protected methods will need at least one authentication class to be set
     * in order to allow that method to be executed
     *
     * @param string $className     of the authentication class
     * @param string $resourcePath  optional url prefix for mapping
     */
    public function addAuthenticationClass($className, $resourcePath = null)
    {
    }
    /**
     * Add api classes through this method.
     *
     * All the public methods that do not start with _ (underscore)
     * will be will be exposed as the public api by default.
     *
     * All the protected methods that do not start with _ (underscore)
     * will exposed as protected api which will require authentication
     *
     * @param string $className       name of the service class
     * @param string $resourcePath    optional url prefix for mapping, uses
     *                                lowercase version of the class name when
     *                                not specified
     *
     * @return null
     *
     * @throws Exception when supplied with invalid class name
     */
    public function addAPIClass($className, $resourcePath = null)
    {
    }
    /**
     * Add class for custom error handling
     *
     * @param string $className   of the error handling class
     */
    public function addErrorClass($className)
    {
    }
    /**
     * protected methods will need at least one authentication class to be set
     * in order to allow that method to be executed.  When multiple authentication
     * classes are in use, this function provides better performance by setting
     * all auth classes through a single function call.
     *
     * @param array $classNames     array of associative arrays containing
     *                              the authentication class name & optional
     *                              url prefix for mapping.
     */
    public function setAuthClasses(array $classNames)
    {
    }
    /**
     * Add multiple api classes through this method.
     *
     * This method provides better performance when large number
     * of API classes are in use as it processes them all at once,
     * as opposed to hundreds (or more) addAPIClass calls.
     *
     *
     * All the public methods that do not start with _ (underscore)
     * will be will be exposed as the public api by default.
     *
     * All the protected methods that do not start with _ (underscore)
     * will exposed as protected api which will require authentication
     *
     * @param array $map        array of associative arrays containing
     *                          the class name & optional url prefix
     *                          for mapping.
     *
     * @return null
     *
     * @throws Exception when supplied with invalid class name
     */
    public function mapAPIClasses(array $map)
    {
    }
    /**
     * Associated array that maps formats to their respective format class name
     *
     * @return array
     */
    public function getFormatMap()
    {
    }
    /**
     * API version requested by the client
     * @return int
     */
    public function getRequestedApiVersion()
    {
    }
    /**
     * When false, restler will run in debug mode and parse the class files
     * every time to map it to the URL
     *
     * @return bool
     */
    public function getProductionMode()
    {
    }
    /**
     * Chosen API version
     *
     * @return int
     */
    public function getApiVersion()
    {
    }
    /**
     * Base Url of the API Service
     *
     * @return string
     *
     * @example http://localhost/restler3
     * @example http://restler3.com
     */
    public function getBaseUrl()
    {
    }
    /**
     * List of events that fired already
     *
     * @return array
     */
    public function getEvents()
    {
    }
    /**
     * Magic method to expose some protected variables
     *
     * @param string $name name of the hidden property
     *
     * @return null|mixed
     */
    public function __get($name)
    {
    }
    /**
     * Store the url map cache if needed
     */
    public function __destruct()
    {
    }
    /**
     * pre call
     *
     * call _pre_{methodName)_{extension} if exists with the same parameters as
     * the api method
     *
     * @example _pre_get_json
     *
     */
    protected function preCall()
    {
    }
    /**
     * post call
     *
     * call _post_{methodName}_{extension} if exists with the composed and
     * serialized (applying the repose format) response data
     *
     * @example _post_get_json
     */
    protected function postCall()
    {
    }
}