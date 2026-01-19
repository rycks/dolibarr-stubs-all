<?php

namespace Illuminate\Support;

class Env
{
    /**
     * Indicates if the putenv adapter is enabled.
     *
     * @var bool
     */
    protected static $putenv = true;
    /**
     * The environment repository instance.
     *
     * @var \Dotenv\Repository\RepositoryInterface|null
     */
    protected static $repository;
    /**
     * Enable the putenv adapter.
     *
     * @return void
     */
    public static function enablePutenv()
    {
    }
    /**
     * Disable the putenv adapter.
     *
     * @return void
     */
    public static function disablePutenv()
    {
    }
    /**
     * Get the environment repository instance.
     *
     * @return \Dotenv\Repository\RepositoryInterface
     */
    public static function getRepository()
    {
    }
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
    }
}