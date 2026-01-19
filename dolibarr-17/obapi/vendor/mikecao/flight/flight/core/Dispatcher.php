<?php

namespace flight\core;

/**
 * The Dispatcher class is responsible for dispatching events. Events
 * are simply aliases for class methods or functions. The Dispatcher
 * allows you to hook other functions to an event that can modify the
 * input parameters and/or the output.
 */
class Dispatcher
{
    /**
     * Mapped events.
     */
    protected array $events = [];
    /**
     * Method filters.
     */
    protected array $filters = [];
    /**
     * Dispatches an event.
     *
     * @param string $name   Event name
     * @param array  $params Callback parameters
     *
     *@throws Exception
     *
     * @return mixed|null Output of callback
     */
    public final function run(string $name, array $params = [])
    {
    }
    /**
     * Assigns a callback to an event.
     *
     * @param string   $name     Event name
     * @param callback $callback Callback function
     */
    public final function set(string $name, callable $callback) : void
    {
    }
    /**
     * Gets an assigned callback.
     *
     * @param string $name Event name
     *
     * @return callback $callback Callback function
     */
    public final function get(string $name) : ?callable
    {
    }
    /**
     * Checks if an event has been set.
     *
     * @param string $name Event name
     *
     * @return bool Event status
     */
    public final function has(string $name) : bool
    {
    }
    /**
     * Clears an event. If no name is given,
     * all events are removed.
     *
     * @param string|null $name Event name
     */
    public final function clear(?string $name = null) : void
    {
    }
    /**
     * Hooks a callback to an event.
     *
     * @param string   $name     Event name
     * @param string   $type     Filter type
     * @param callback $callback Callback function
     */
    public final function hook(string $name, string $type, callable $callback) : void
    {
    }
    /**
     * Executes a chain of method filters.
     *
     * @param array $filters Chain of filters
     * @param array $params  Method parameters
     * @param mixed $output  Method output
     *
     * @throws Exception
     */
    public final function filter(array $filters, array &$params, &$output) : void
    {
    }
    /**
     * Executes a callback function.
     *
     * @param array|callback $callback Callback function
     * @param array          $params   Function parameters
     *
     *@throws Exception
     *
     * @return mixed Function results
     */
    public static function execute($callback, array &$params = [])
    {
    }
    /**
     * Calls a function.
     *
     * @param callable|string $func   Name of function to call
     * @param array           $params Function parameters
     *
     * @return mixed Function results
     */
    public static function callFunction($func, array &$params = [])
    {
    }
    /**
     * Invokes a method.
     *
     * @param mixed $func   Class method
     * @param array $params Class method parameters
     *
     * @return mixed Function results
     */
    public static function invokeMethod($func, array &$params = [])
    {
    }
    /**
     * Resets the object to the initial state.
     */
    public final function reset() : void
    {
    }
}