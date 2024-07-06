<?php

namespace Illuminate\Support\Facades;

/**
 * @method static array getQueuedCookies()
 * @method static unqueue($name)
 * @method static void queue(...$parameters)
 *
 * @see \Illuminate\Cookie\CookieJar
 */
class Cookie extends \Illuminate\Support\Facades\Facade
{
    /**
     * Determine if a cookie exists on the request.
     *
     * @param  string  $key
     * @return bool
     */
    public static function has($key)
    {
    }
    /**
     * Retrieve a cookie from the request.
     *
     * @param  string|null  $key
     * @param  mixed  $default
     * @return string|array|null
     */
    public static function get($key = null, $default = null)
    {
    }
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
    }
}