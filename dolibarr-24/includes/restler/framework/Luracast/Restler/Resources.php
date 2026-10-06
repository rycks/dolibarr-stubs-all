<?php

namespace Luracast\Restler;

/**
 * API Class to create Swagger Spec 1.1 compatible id and operation
 * listing
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 *
 */
class Resources implements \Luracast\Restler\iUseAuthentication, \Luracast\Restler\iProvideMultiVersionApi
{
    /**
     * @var bool should protected resources be shown to unauthenticated users?
     */
    public static $hideProtected = true;
    /**
     * @var bool should we use format as extension?
     */
    public static $useFormatAsExtension = true;
    /**
     * @var bool should we include newer apis in the list? works only when
     * Defaults::$useUrlBasedVersioning is set to true;
     */
    public static $listHigherVersions = true;
    /**
     * @var array all http methods specified here will be excluded from
     * documentation
     */
    public static $excludedHttpMethods = array('OPTIONS');
    /**
     * @var array all paths beginning with any of the following will be excluded
     * from documentation
     */
    public static $excludedPaths = array();
    /**
     * @var bool
     */
    public static $placeFormatExtensionBeforeDynamicParts = true;
    /**
     * @var bool should we group all the operations with the same url or not
     */
    public static $groupOperations = false;
    /**
     * @var null|callable if the api methods are under access control mechanism
     * you can attach a function here that returns true or false to determine
     * visibility of a protected api method. this function will receive method
     * info as the only parameter.
     */
    public static $accessControlFunction = null;
    /**
     * @var array type mapping for converting data types to javascript / swagger
     */
    public static $dataTypeAlias = array('string' => 'string', 'int' => 'int', 'number' => 'float', 'float' => 'float', 'bool' => 'boolean', 'boolean' => 'boolean', 'NULL' => 'null', 'array' => 'Array', 'object' => 'Object', 'stdClass' => 'Object', 'mixed' => 'string', 'DateTime' => 'Date');
    /**
     * @var array configurable symbols to differentiate public, hybrid and
     * protected api
     */
    public static $apiDescriptionSuffixSymbols = array(
        0 => '&nbsp; <i class="icon-unlock-alt icon-large"></i>',
        //public api
        1 => '&nbsp; <i class="icon-adjust icon-large"></i>',
        //hybrid api
        2 => '&nbsp; <i class="icon-lock icon-large"></i>',
    );
    /**
     * Injected at runtime
     *
     * @var Restler instance of restler
     */
    public $restler;
    /**
     * @var string when format is not used as the extension this property is
     * used to set the extension manually
     */
    public $formatString = '';
    protected $_models;
    protected $_bodyParam;
    /**
     * @var bool|stdClass
     */
    protected $_fullDataRequested = false;
    protected $crud = array('POST' => 'create', 'GET' => 'retrieve', 'PUT' => 'update', 'DELETE' => 'delete', 'PATCH' => 'partial update');
    protected static $prefixes = array('get' => 'retrieve', 'index' => 'list', 'post' => 'create', 'put' => 'update', 'patch' => 'modify', 'delete' => 'remove');
    protected $_authenticated = false;
    protected $cacheName = '';
    public function __construct()
    {
    }
    /**
     * This method will be called first for filter classes and api classes so
     * that they can respond accordingly for filer method call and api method
     * calls
     *
     *
     * @param bool $isAuthenticated passes true when the authentication is
     *                              done, false otherwise
     *
     * @return mixed
     */
    public function __setAuthenticationStatus($isAuthenticated = false)
    {
    }
    /**
     * pre call for get($id)
     *
     * if cache is present, use cache
     */
    public function _pre_get_json($id)
    {
    }
    /**
     * post call for get($id)
     *
     * create cache if in production mode
     *
     * @param $responseData
     *
     * @internal param string $data composed json output
     *
     * @return string
     */
    public function _post_get_json($responseData)
    {
    }
    /**
     * @access hybrid
     *
     * @param string $id
     *
     * @throws RestException
     * @return null|stdClass
     *
     * @url    GET {id}
     */
    public function get($id = '')
    {
    }
    protected function _nickname(array $route)
    {
    }
    protected function _noNamespace($className)
    {
    }
    protected function _operationListing($resourcePath = '/')
    {
    }
    protected function _resourceListing()
    {
    }
    protected function _api($path, $description = '')
    {
    }
    protected function _operation($route, $nickname, $httpMethod = 'GET', $summary = 'description', $notes = 'long description', $responseClass = 'void')
    {
    }
    protected function _parameter($param)
    {
    }
    protected function _appendToBody($p)
    {
    }
    protected function _getBody()
    {
    }
    protected function _model($className, $instance = null)
    {
    }
    /**
     * Find the data type of the given value.
     *
     *
     * @param mixed $o given value for finding type
     *
     * @param bool $appendToModels if an object is found should we append to
     *                              our models list?
     *
     * @return string
     *
     * @access private
     */
    public function getType($o, $appendToModels = false)
    {
    }
    /**
     * pre call for index()
     *
     * if cache is present, use cache
     */
    public function _pre_index_json()
    {
    }
    /**
     * post call for index()
     *
     * create cache if in production mode
     *
     * @param $responseData
     *
     * @internal param string $data composed json output
     *
     * @return string
     */
    public function _post_index_json($responseData)
    {
    }
    /**
     * @access hybrid
     * @return \stdClass
     */
    public function index()
    {
    }
    protected function _loadResource($url)
    {
    }
    protected function _mapResources(array $allRoutes, array &$map, $version = 1)
    {
    }
    /**
     * Maximum api version supported by the api class
     * @return int
     */
    public static function __getMaximumSupportedVersion()
    {
    }
    /**
     * Verifies that the requesting user is allowed to view the docs for this API
     *
     * @param $route
     *
     * @return boolean True if the user should be able to view this API's docs
     */
    protected function verifyAccess($route)
    {
    }
}