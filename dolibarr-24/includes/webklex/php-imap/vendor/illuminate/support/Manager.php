<?php

namespace Illuminate\Support;

abstract class Manager
{
    /**
     * The container instance.
     *
     * @var \Illuminate\Contracts\Container\Container
     */
    protected $container;
    /**
     * The configuration repository instance.
     *
     * @var \Illuminate\Contracts\Config\Repository
     */
    protected $config;
    /**
     * The registered custom driver creators.
     *
     * @var array
     */
    protected $customCreators = [];
    /**
     * The array of created "drivers".
     *
     * @var array
     */
    protected $drivers = [];
    /**
     * Create a new manager instance.
     *
     * @param  \Illuminate\Contracts\Container\Container  $container
     * @return void
     */
    public function __construct(\Illuminate\Contracts\Container\Container $container)
    {
    }
    /**
     * Get the default driver name.
     *
     * @return string
     */
    public abstract function getDefaultDriver();
    /**
     * Get a driver instance.
     *
     * @param  string|null  $driver
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public function driver($driver = null)
    {
    }
    /**
     * Create a new driver instance.
     *
     * @param  string  $driver
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    protected function createDriver($driver)
    {
    }
    /**
     * Call a custom driver creator.
     *
     * @param  string  $driver
     * @return mixed
     */
    protected function callCustomCreator($driver)
    {
    }
    /**
     * Register a custom driver creator Closure.
     *
     * @param  string  $driver
     * @param  \Closure  $callback
     * @return $this
     */
    public function extend($driver, \Closure $callback)
    {
    }
    /**
     * Get all of the created "drivers".
     *
     * @return array
     */
    public function getDrivers()
    {
    }
    /**
     * Get the container instance used by the manager.
     *
     * @return \Illuminate\Contracts\Container\Container
     */
    public function getContainer()
    {
    }
    /**
     * Set the container instance used by the manager.
     *
     * @param  \Illuminate\Contracts\Container\Container  $container
     * @return $this
     */
    public function setContainer(\Illuminate\Contracts\Container\Container $container)
    {
    }
    /**
     * Forget all of the resolved driver instances.
     *
     * @return $this
     */
    public function forgetDrivers()
    {
    }
    /**
     * Dynamically call the default driver instance.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
    }
}