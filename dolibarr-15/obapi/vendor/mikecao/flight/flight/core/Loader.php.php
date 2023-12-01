<?php

namespace flight\core;

/**
 * The Loader class is responsible for loading objects. It maintains
 * a list of reusable class instances and can generate a new class
 * instances with custom initialization parameters. It also performs
 * class autoloading.
 */
class Loader
{
    /**
     * Registered classes.
     */
    protected array $classes = [];
    /**
     * Class instances.
     */
    protected array $instances = [];
    /**
     * Autoload directories.
     */
    protected static array $dirs = [];
    /**
     * Registers a class.
     *
     * @param string          $name     Registry name
     * @param callable|string $class    Class name or function to instantiate class
     * @param array           $params   Class initialization parameters
     * @param callable|null   $callback $callback Function to call after object instantiation
     */
    public function register(string $name, $class, array $params = [], ?callable $callback = null) : void
    {
    }
    /**
     * Unregisters a class.
     *
     * @param string $name Registry name
     */
    public function unregister(string $name) : void
    {
    }
    /**
     * Loads a registered class.
     *
     * @param string $name   Method name
     * @param bool   $shared Shared instance
     *
     * @throws Exception
     *
     * @return object Class instance
     */
    public function load(string $name, bool $shared = true) : ?object
    {
    }
    /**
     * Gets a single instance of a class.
     *
     * @param string $name Instance name
     *
     * @return object Class instance
     */
    public function getInstance(string $name) : ?object
    {
    }
    /**
     * Gets a new instance of a class.
     *
     * @param callable|string $class  Class name or callback function to instantiate class
     * @param array           $params Class initialization parameters
     *
     * @throws Exception
     *
     * @return object Class instance
     */
    public function newInstance($class, array $params = []) : object
    {
    }
    /**
     * @param string $name Registry name
     *
     * @return mixed Class information or null if not registered
     */
    public function get(string $name)
    {
    }
    /**
     * Resets the object to the initial state.
     */
    public function reset() : void
    {
    }
    // Autoloading Functions
    /**
     * Starts/stops autoloader.
     *
     * @param bool  $enabled Enable/disable autoloading
     * @param mixed $dirs    Autoload directories
     */
    public static function autoload(bool $enabled = true, $dirs = []) : void
    {
    }
    /**
     * Autoloads classes.
     *
     * @param string $class Class name
     */
    public static function loadClass(string $class) : void
    {
    }
    /**
     * Adds a directory for autoloading classes.
     *
     * @param mixed $dir Directory path
     */
    public static function addDirectory($dir) : void
    {
    }
}