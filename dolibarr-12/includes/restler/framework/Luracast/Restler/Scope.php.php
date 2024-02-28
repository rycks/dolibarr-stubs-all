<?php

namespace Luracast\Restler;

/**
 * Scope resolution class, manages instantiation and acts as a dependency
 * injection container
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 */
class Scope
{
    public static $classAliases = array(
        //Core
        'Restler' => 'Luracast\\Restler\\Restler',
        //Format classes
        'AmfFormat' => 'Luracast\\Restler\\Format\\AmfFormat',
        'JsFormat' => 'Luracast\\Restler\\Format\\JsFormat',
        'JsonFormat' => 'Luracast\\Restler\\Format\\JsonFormat',
        'HtmlFormat' => 'Luracast\\Restler\\Format\\HtmlFormat',
        'PlistFormat' => 'Luracast\\Restler\\Format\\PlistFormat',
        'UploadFormat' => 'Luracast\\Restler\\Format\\UploadFormat',
        'UrlEncodedFormat' => 'Luracast\\Restler\\Format\\UrlEncodedFormat',
        'XmlFormat' => 'Luracast\\Restler\\Format\\XmlFormat',
        'YamlFormat' => 'Luracast\\Restler\\Format\\YamlFormat',
        'CsvFormat' => 'Luracast\\Restler\\Format\\CsvFormat',
        'TsvFormat' => 'Luracast\\Restler\\Format\\TsvFormat',
        //Filter classes
        'RateLimit' => 'Luracast\\Restler\\Filter\\RateLimit',
        //UI classes
        'Forms' => 'Luracast\\Restler\\UI\\Forms',
        'Nav' => 'Luracast\\Restler\\UI\\Nav',
        'Emmet' => 'Luracast\\Restler\\UI\\Emmet',
        'T' => 'Luracast\\Restler\\UI\\Tags',
        //API classes
        'Resources' => 'Luracast\\Restler\\Resources',
        'Explorer' => 'Luracast\\Restler\\Explorer\\v2\\Explorer',
        'Explorer1' => 'Luracast\\Restler\\Explorer\\v1\\Explorer',
        'Explorer2' => 'Luracast\\Restler\\Explorer\\v2\\Explorer',
        //Cache classes
        'HumanReadableCache' => 'Luracast\\Restler\\HumanReadableCache',
        'ApcCache' => 'Luracast\\Restler\\ApcCache',
        'MemcacheCache' => 'Luracast\\Restler\\MemcacheCache',
        //Utility classes
        'Object' => 'Luracast\\Restler\\Data\\Obj',
        'Text' => 'Luracast\\Restler\\Data\\Text',
        'Arr' => 'Luracast\\Restler\\Data\\Arr',
        //Exception
        'RestException' => 'Luracast\\Restler\\RestException',
    );
    /**
     * @var null|Callable adding a resolver function that accepts
     * the class name as the parameter and returns an instance of the class
     * as a singleton. Allows the use of your favourite DI container
     */
    public static $resolver = null;
    public static $properties = array();
    protected static $instances = array();
    protected static $registry = array();
    /**
     * @param string   $name
     * @param callable $function
     * @param bool     $singleton
     */
    public static function register($name, $function, $singleton = true)
    {
    }
    public static function set($name, $instance)
    {
    }
    public static function get($name)
    {
    }
    /**
     * Get fully qualified class name for the given scope
     *
     * @param string $className
     * @param array  $scope local scope
     *
     * @return string|boolean returns the class name or false
     */
    public static function resolve($className, array $scope)
    {
    }
    /**
     * @param string $stringName
     * @return boolean
     */
    private static function isPrimitiveDataType($stringName)
    {
    }
}