<?php

namespace Webklex\PHPIMAP;

/**
 * Class ClientManager
 *
 * @package Webklex\IMAP
 *
 * @mixin Client
 */
class ClientManager
{
    /**
     * All library config
     *
     * @var array $config
     */
    public static $config = [];
    /**
     * @var array $accounts
     */
    protected $accounts = [];
    /**
     * ClientManager constructor.
     * @param array|string $config
     */
    public function __construct($config = [])
    {
    }
    /**
     * Dynamically pass calls to the default account.
     * @param  string  $method
     * @param  array   $parameters
     *
     * @return mixed
     * @throws Exceptions\MaskNotFoundException
     */
    public function __call($method, $parameters)
    {
    }
    /**
     * Safely create a new client instance which is not listed in accounts
     * @param array $config
     *
     * @return Client
     * @throws Exceptions\MaskNotFoundException
     */
    public function make($config)
    {
    }
    /**
     * Get a dotted config parameter
     * @param string $key
     * @param null   $default
     *
     * @return mixed|null
     */
    public static function get($key, $default = null)
    {
    }
    /**
     * Resolve a account instance.
     * @param  string  $name
     *
     * @return Client
     * @throws Exceptions\MaskNotFoundException
     */
    public function account($name = null)
    {
    }
    /**
     * Resolve a account.
     *
     * @param  string  $name
     *
     * @return Client
     * @throws Exceptions\MaskNotFoundException
     */
    protected function resolve($name)
    {
    }
    /**
     * Get the account configuration.
     * @param  string  $name
     *
     * @return array
     */
    protected function getClientConfig($name)
    {
    }
    /**
     * Get the name of the default account.
     *
     * @return string
     */
    public function getDefaultAccount()
    {
    }
    /**
     * Set the name of the default account.
     * @param  string  $name
     *
     * @return void
     */
    public function setDefaultAccount($name)
    {
    }
    /**
     * Merge the vendor settings with the local config
     *
     * The default account identifier will be used as default for any missing account parameters.
     * If however the default account is missing a parameter the package default account parameter will be used.
     * This can be disabled by setting imap.default in your config file to 'false'
     *
     * @param array|string $config
     *
     * @return $this
     */
    public function setConfig($config)
    {
    }
    /**
     * Marge arrays recursively and distinct
     *
     * Merges any number of arrays / parameters recursively, replacing
     * entries with string keys with values from latter arrays.
     * If the entry or the next value to be assigned is an array, then it
     * automatically treats both arguments as an array.
     * Numeric entries are appended, not replaced, but only if they are
     * unique
     *
     * @param  array $array1 Initial array to merge.
     * @param  array ...     Variable list of arrays to recursively merge.
     *
     * @return array|mixed
     *
     * @link   http://www.php.net/manual/en/function.array-merge-recursive.php#96201
     * @author Mark Roduner <mark.roduner@gmail.com>
     */
    private function array_merge_recursive_distinct()
    {
    }
}