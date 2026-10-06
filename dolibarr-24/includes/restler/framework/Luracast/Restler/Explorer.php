<?php

namespace Luracast\Restler;

/**
 * Class Explorer
 *
 * @package Luracast\Restler
 *
 * @access  hybrid
 * @version 3.0.0rc6
 */
class Explorer implements \Luracast\Restler\iProvideMultiVersionApi
{
    const SWAGGER = '2.0';
    /**
     * @var array http schemes supported. http or https or both http and https
     */
    public static $schemes = array();
    /**
     * @var bool should protected resources be shown to unauthenticated users?
     */
    public static $hideProtected = true;
    /**
     * @var bool should we use format as extension?
     */
    public static $useFormatAsExtension = true;
    /*
     * @var bool can we accept scalar values (string, int, float etc) as the request body?
     */
    public static $allowScalarValueOnRequestBody = false;
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
     * @var string class that holds metadata as static properties
     */
    public static $infoClass = 'Luracast\\Restler\\ExplorerInfo';
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
    /**
     * @var array type mapping for converting data types to JSON-Schema Draft 4
     * Which is followed by swagger 1.2 spec
     */
    public static $dataTypeAlias = array(
        //'string' => 'string',
        'int' => 'integer',
        'number' => 'number',
        'float' => array('number', 'float'),
        'bool' => 'boolean',
        //'boolean' => 'boolean',
        //'NULL' => 'null',
        'array' => 'array',
        //'object' => 'object',
        'stdClass' => 'object',
        'mixed' => 'string',
        'date' => array('string', 'date'),
        'datetime' => array('string', 'date-time'),
    );
    /**
     * @var array configurable symbols to differentiate public, hybrid and
     * protected api
     */
    public static $apiDescriptionSuffixSymbols = array(
        0 => ' 🔓',
        //'&nbsp; <i class="fa fa-lg fa-unlock-alt"></i>', //public api
        1 => ' ◑',
        //'&nbsp; <i class="fa fa-lg fa-adjust"></i>', //hybrid api
        2 => ' 🔐',
    );
    protected $models = array();
    /**
     * @var bool|stdClass
     */
    protected $_fullDataRequested = false;
    protected $crud = array('POST' => 'create', 'GET' => 'retrieve', 'PUT' => 'update', 'DELETE' => 'delete', 'PATCH' => 'partial update');
    protected static $prefixes = array('get' => 'retrieve', 'index' => 'list', 'post' => 'create', 'put' => 'update', 'patch' => 'modify', 'delete' => 'remove');
    protected $_authenticated = false;
    protected $cacheName = '';
    /**
     * Serve static files for exploring
     *
     * Serves explorer html, css, and js files
     *
     * @url GET *
     */
    public function get()
    {
    }
    /**
     * @return stdClass
     */
    public function swagger()
    {
    }
    private function paths($version = 1)
    {
    }
    private function operation($route)
    {
    }
    private function parameters(array $route)
    {
    }
    private function parameter(\Luracast\Restler\Data\ValidationInfo $info, $description = '')
    {
    }
    private function responses(array $route)
    {
    }
    private function model($type, array $children)
    {
    }
    private function setType(&$object, \Luracast\Restler\Data\ValidationInfo $info)
    {
    }
    private function operationId(array $route)
    {
    }
    private function modelName(array $route)
    {
    }
    private function securityDefinitions()
    {
    }
    private function base()
    {
    }
    /**
     * Maximum api version supported by the api class
     * @return int
     */
    public static function __getMaximumSupportedVersion()
    {
    }
}