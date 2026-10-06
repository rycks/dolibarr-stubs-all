<?php

namespace Luracast\Restler;

/**
 * Router class that routes the urls to api methods along with parameters
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 *
 */
class Routes
{
    public static $prefixingParameterNames = array('id');
    public static $fieldTypesByName = array('email' => 'email', 'password' => 'password', 'phone' => 'tel', 'mobile' => 'tel', 'tel' => 'tel', 'search' => 'search', 'date' => 'date', 'created_at' => 'datetime', 'modified_at' => 'datetime', 'url' => 'url', 'link' => 'url', 'href' => 'url', 'website' => 'url', 'color' => 'color', 'colour' => 'color');
    protected static $routes = array();
    protected static $models = array();
    /**
     * Route the public and protected methods of an Api class
     *
     * @param string $className
     * @param string $resourcePath
     * @param int    $version
     *
     * @throws RestException
     */
    public static function addAPIClass($className, $resourcePath = '', $version = 1)
    {
    }
    /**
     * @access private
     */
    public static function typeChar($type = null)
    {
    }
    protected static function addPath($path, array $call, $httpMethod = 'GET', $version = 1)
    {
    }
    /**
     * Find the api method for the given url and http method
     *
     * @param string $path       Requested url path
     * @param string $httpMethod GET|POST|PUT|PATCH|DELETE etc
     * @param int    $version    Api Version number
     * @param array  $data       Data collected from the request
     *
     * @throws RestException
     * @return ApiMethodInfo
     */
    public static function find($path, $httpMethod, $version = 1, array $data = array())
    {
    }
    public static function findAll(array $excludedPaths = array(), array $excludedHttpMethods = array(), $version = 1)
    {
    }
    public static function verifyAccess($route)
    {
    }
    /**
     * Populates the parameter values
     *
     * @param array $call
     * @param       $data
     *
     * @return ApiMethodInfo
     *
     * @access private
     */
    protected static function populate(array $call, $data)
    {
    }
    /**
     * @access private
     */
    protected static function pathVarTypeOf($var)
    {
    }
    protected static function typeMatch($type, $var)
    {
    }
    protected static function parseMagic(\ReflectionClass $class, $forResponse = true)
    {
    }
    /**
     * Get the type and associated model
     *
     * @param ReflectionClass $class
     * @param array           $scope
     *
     * @throws RestException
     * @throws \Exception
     * @return array
     *
     * @access protected
     */
    protected static function getTypeAndModel(\ReflectionClass $class, array $scope, $prefix = '', array $rules = array())
    {
    }
    /**
     * Import previously created routes from cache
     *
     * @param array $routes
     */
    public static function fromArray(array $routes)
    {
    }
    /**
     * Export current routes for cache
     *
     * @return array
     */
    public static function toArray()
    {
    }
    public static function type($var)
    {
    }
    public static function scope(\ReflectionClass $class)
    {
    }
}