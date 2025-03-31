<?php

namespace Illuminate\Support;

class ConfigurationUrlParser
{
    /**
     * The drivers aliases map.
     *
     * @var array
     */
    protected static $driverAliases = [
        'mssql' => 'sqlsrv',
        'mysql2' => 'mysql',
        // RDS
        'postgres' => 'pgsql',
        'postgresql' => 'pgsql',
        'sqlite3' => 'sqlite',
        'redis' => 'tcp',
        'rediss' => 'tls',
    ];
    /**
     * Parse the database configuration, hydrating options using a database configuration URL if possible.
     *
     * @param  array|string  $config
     * @return array
     */
    public function parseConfiguration($config)
    {
    }
    /**
     * Get the primary database connection options.
     *
     * @param  array  $url
     * @return array
     */
    protected function getPrimaryOptions($url)
    {
    }
    /**
     * Get the database driver from the URL.
     *
     * @param  array  $url
     * @return string|null
     */
    protected function getDriver($url)
    {
    }
    /**
     * Get the database name from the URL.
     *
     * @param  array  $url
     * @return string|null
     */
    protected function getDatabase($url)
    {
    }
    /**
     * Get all of the additional database options from the query string.
     *
     * @param  array  $url
     * @return array
     */
    protected function getQueryOptions($url)
    {
    }
    /**
     * Parse the string URL to an array of components.
     *
     * @param  string  $url
     * @return array
     *
     * @throws \InvalidArgumentException
     */
    protected function parseUrl($url)
    {
    }
    /**
     * Convert string casted values to their native types.
     *
     * @param  mixed  $value
     * @return mixed
     */
    protected function parseStringsToNativeTypes($value)
    {
    }
    /**
     * Get all of the current drivers' aliases.
     *
     * @return array
     */
    public static function getDriverAliases()
    {
    }
    /**
     * Add the given driver alias to the driver aliases array.
     *
     * @param  string  $alias
     * @param  string  $driver
     * @return void
     */
    public static function addDriverAlias($alias, $driver)
    {
    }
}