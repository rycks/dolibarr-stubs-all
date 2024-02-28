<?php

namespace Luracast\Restler;

/**
 * Describe the purpose of this class/interface/trait
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 */
class Util
{
    /**
     * @var Restler instance injected at runtime
     */
    public static $restler;
    /**
     * verify if the given data type string is scalar or not
     *
     * @static
     *
     * @param string $type data type as string
     *
     * @return bool true or false
     */
    public static function isObjectOrArray($type)
    {
    }
    /**
     * Get the value deeply nested inside an array / object
     *
     * Using isset() to test the presence of nested value can give a false positive
     *
     * This method serves that need
     *
     * When the deeply nested property is found its value is returned, otherwise
     * false is returned.
     *
     * @param array $from array to extract the value from
     * @param string|array $key ... pass more to go deeply inside the array
     *                              alternatively you can pass a single array
     *
     * @return null|mixed null when not found, value otherwise
     */
    public static function nestedValue($from, $key)
    {
    }
    public static function getResourcePath($className, $resourcePath = null, $prefix = '')
    {
    }
    /**
     * Compare two strings and remove the common
     * sub string from the first string and return it
     *
     * @static
     *
     * @param string $fromPath
     * @param string $usingPath
     * @param string $char
     *            optional, set it as
     *            blank string for char by char comparison
     *
     * @return string
     */
    public static function removeCommonPath($fromPath, $usingPath, $char = '/')
    {
    }
    /**
     * Compare two strings and split the common
     * sub string from the first string and return it as array
     *
     * @static
     *
     * @param string $fromPath
     * @param string $usingPath
     * @param string $char
     *            optional, set it as
     *            blank string for char by char comparison
     *
     * @return array with 2 strings first is the common string and second is the remaining in $fromPath
     */
    public static function splitCommonPath($fromPath, $usingPath, $char = '/')
    {
    }
    /**
     * Parses the request to figure out the http request type
     *
     * @static
     *
     * @return string which will be one of the following
     *        [GET, POST, PUT, PATCH, DELETE]
     * @example GET
     */
    public static function getRequestMethod()
    {
    }
    /**
     * Pass any content negotiation header such as Accept,
     * Accept-Language to break it up and sort the resulting array by
     * the order of negotiation.
     *
     * @static
     *
     * @param string $accept header value
     *
     * @return array sorted by the priority
     */
    public static function sortByPriority($accept)
    {
    }
    public static function getShortName($className)
    {
    }
}