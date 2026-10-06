<?php

namespace Illuminate\Support\Facades;

abstract class Facade
{
    /**
     * The application instance being facaded.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected static $app;
    /**
     * The resolved object instances.
     *
     * @var array
     */
    protected static $resolvedInstance;
    /**
     * Run a Closure when the facade has been resolved.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function resolved(\Closure $callback)
    {
    }
    /**
     * Convert the facade into a Mockery spy.
     *
     * @return \Mockery\MockInterface
     */
    public static function spy()
    {
    }
    /**
     * Initiate a partial mock on the facade.
     *
     * @return \Mockery\MockInterface
     */
    public static function partialMock()
    {
    }
    /**
     * Initiate a mock expectation on the facade.
     *
     * @return \Mockery\Expectation
     */
    public static function shouldReceive()
    {
    }
    /**
     * Create a fresh mock instance for the given class.
     *
     * @return \Mockery\MockInterface
     */
    protected static function createFreshMockInstance()
    {
    }
    /**
     * Create a fresh mock instance for the given class.
     *
     * @return \Mockery\MockInterface
     */
    protected static function createMock()
    {
    }
    /**
     * Determines whether a mock is set as the instance of the facade.
     *
     * @return bool
     */
    protected static function isMock()
    {
    }
    /**
     * Get the mockable class for the bound instance.
     *
     * @return string|null
     */
    protected static function getMockableClass()
    {
    }
    /**
     * Hotswap the underlying instance behind the facade.
     *
     * @param  mixed  $instance
     * @return void
     */
    public static function swap($instance)
    {
    }
    /**
     * Get the root object behind the facade.
     *
     * @return mixed
     */
    public static function getFacadeRoot()
    {
    }
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
    }
    /**
     * Resolve the facade root instance from the container.
     *
     * @param  object|string  $name
     * @return mixed
     */
    protected static function resolveFacadeInstance($name)
    {
    }
    /**
     * Clear a resolved facade instance.
     *
     * @param  string  $name
     * @return void
     */
    public static function clearResolvedInstance($name)
    {
    }
    /**
     * Clear all of the resolved instances.
     *
     * @return void
     */
    public static function clearResolvedInstances()
    {
    }
    /**
     * Get the application instance behind the facade.
     *
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public static function getFacadeApplication()
    {
    }
    /**
     * Set the application instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public static function setFacadeApplication($app)
    {
    }
    /**
     * Handle dynamic, static calls to the object.
     *
     * @param  string  $method
     * @param  array  $args
     * @return mixed
     *
     * @throws \RuntimeException
     */
    public static function __callStatic($method, $args)
    {
    }
}