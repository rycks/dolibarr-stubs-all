<?php

namespace Luracast\Restler;

/**
 * Class MemcacheCache provides a memcache based cache for Restler
 *
 * @category   Framework
 * @package    Restler
 * @author     Dave Drager <ddrager@gmail.com>
 * @copyright  2014 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc5
 */
class MemcacheCache implements \Luracast\Restler\iCache
{
    /**
     * The namespace that all of the cached entries will be stored under.  This allows multiple APIs to run concurrently.
     *
     * @var string
     */
    public static $namespace;
    /**
     * @var string the memcache server hostname / IP address. For the memcache 
     * cache method.
     */
    public static $memcacheServer = '127.0.0.1';
    /**
     * @var int the memcache server port. For the memcache cache method. 
     */
    public static $memcachePort = 11211;
    private $memcache;
    /**
     * @param string $namespace
     */
    function __construct($namespace = 'restler')
    {
    }
    /**
     * store data in the cache
     *
     *
     * @param string $name
     * @param mixed $data
     *
     * @return boolean true if successful
     */
    public function set($name, $data)
    {
    }
    private function memcacheNotAvailable($message = 'Memcache is not available.')
    {
    }
    /**
     * retrieve data from the cache
     *
     *
     * @param string $name
     * @param bool $ignoreErrors
     *
     * @throws \Exception
     * @return mixed
     */
    public function get($name, $ignoreErrors = false)
    {
    }
    /**
     * delete data from the cache
     *
     *
     * @param string $name
     * @param bool $ignoreErrors
     *
     * @throws \Exception
     * @return boolean true if successful
     */
    public function clear($name, $ignoreErrors = false)
    {
    }
    /**
     * check if the given name is cached
     *
     *
     * @param string $name
     *
     * @return boolean true if cached
     */
    public function isCached($name)
    {
    }
}