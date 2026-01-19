<?php

namespace Luracast\Restler;

/**
 * Information gathered about the api user is kept here using static methods
 * and properties for other classes to make use of them.
 * Typically Authentication classes populate them
 *
 * @category   Framework
 * @package    restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 */
class User implements \Luracast\Restler\iIdentifyUser
{
    private static $initialized = false;
    public static $id = null;
    public static $cacheId = null;
    public static $ip;
    public static $browser = '';
    public static $platform = '';
    public static function init()
    {
    }
    public static function getUniqueIdentifier($includePlatform = false)
    {
    }
    public static function getIpAddress($ignoreProxies = false)
    {
    }
    /**
     * Authentication classes should call this method
     *
     * @param string $id user id as identified by the authentication classes
     *
     * @return void
     */
    public static function setUniqueIdentifier($id)
    {
    }
    /**
     * User identity to be used for caching purpose
     *
     * When the dynamic cache service places an object in the cache, it needs to
     * label it with a unique identifying string known as a cache ID. This
     * method gives that identifier
     *
     * @return string
     */
    public static function getCacheIdentifier()
    {
    }
    /**
     * User identity for caching purpose
     *
     * In a role based access control system this will be based on role
     *
     * @param $id
     *
     * @return void
     */
    public static function setCacheIdentifier($id)
    {
    }
}