<?php

namespace Luracast\Restler;

/**
 * Default Cache that writes/reads human readable files for caching purpose
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 */
class HumanReadableCache implements \Luracast\Restler\iCache
{
    /**
     * @var string path of the folder to hold cache files
     */
    public static $cacheDir;
    public function __construct()
    {
    }
    /**
     * store data in the cache
     *
     * @param string $name
     * @param mixed  $data
     *
     * @throws \Exception
     * @return boolean true if successful
     */
    public function set($name, $data)
    {
    }
    /**
     * retrieve data from the cache
     *
     * @param string $name
     * @param bool   $ignoreErrors
     *
     * @return mixed
     */
    public function get($name, $ignoreErrors = false)
    {
    }
    /**
     * delete data from the cache
     *
     * @param string $name
     * @param bool   $ignoreErrors
     *
     * @return boolean true if successful
     */
    public function clear($name, $ignoreErrors = false)
    {
    }
    /**
     * check if the given name is cached
     *
     * @param string $name
     *
     * @return boolean true if cached
     */
    public function isCached($name)
    {
    }
    private function _file($name)
    {
    }
    private function throwException()
    {
    }
}