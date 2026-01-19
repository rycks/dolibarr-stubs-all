<?php

namespace flight\net;

/**
 * The Router class is responsible for routing an HTTP request to
 * an assigned callback function. The Router tries to match the
 * requested URL against a series of URL patterns.
 */
class Router
{
    /**
     * Case sensitive matching.
     */
    public bool $case_sensitive = false;
    /**
     * Mapped routes.
     */
    protected array $routes = [];
    /**
     * Pointer to current route.
     */
    protected int $index = 0;
    /**
     * Gets mapped routes.
     *
     * @return array Array of routes
     */
    public function getRoutes() : array
    {
    }
    /**
     * Clears all routes in the router.
     */
    public function clear() : void
    {
    }
    /**
     * Maps a URL pattern to a callback function.
     *
     * @param string   $pattern    URL pattern to match
     * @param callback $callback   Callback function
     * @param bool     $pass_route Pass the matching route object to the callback
     */
    public function map(string $pattern, callable $callback, bool $pass_route = false) : void
    {
    }
    /**
     * Routes the current request.
     *
     * @param Request $request Request object
     *
     * @return bool|Route Matching route or false if no match
     */
    public function route(\flight\net\Request $request)
    {
    }
    /**
     * Gets the current route.
     *
     * @return bool|Route
     */
    public function current()
    {
    }
    /**
     * Gets the next route.
     */
    public function next() : void
    {
    }
    /**
     * Reset to the first route.
     */
    public function reset() : void
    {
    }
}