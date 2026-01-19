<?php

namespace Luracast\Restler;

/**
 * Class ApcCache provides an APC based cache for Restler
 *
 * @category   Framework
 * @package    Restler
 * @author     Joel R. Simpson <joel.simpson@gmail.com>
 * @copyright  2013 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 *
 */
class ApcCache implements \Luracast\Restler\iCache
{
    /**
     * The namespace that all of the cached entries will be stored under.  This allows multiple APIs to run concurrently.
     *
     * @var string
     */
    public static $namespace = 'restler';
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
    private function apcNotAvailable()
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