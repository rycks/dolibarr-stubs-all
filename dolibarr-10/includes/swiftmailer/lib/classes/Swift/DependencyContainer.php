<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Dependency Injection container.
 *
 * @author  Chris Corbyn
 */
class Swift_DependencyContainer
{
    /** Constant for literal value types */
    const TYPE_VALUE = 0x1;
    /** Constant for new instance types */
    const TYPE_INSTANCE = 0x10;
    /** Constant for shared instance types */
    const TYPE_SHARED = 0x100;
    /** Constant for aliases */
    const TYPE_ALIAS = 0x1000;
    /** Singleton instance */
    private static $instance = \null;
    /** The data container */
    private $store = array();
    /** The current endpoint in the data container */
    private $endPoint;
    /**
     * Constructor should not be used.
     *
     * Use {@link getInstance()} instead.
     */
    public function __construct()
    {
    }
    /**
     * Returns a singleton of the DependencyContainer.
     *
     * @return self
     */
    public static function getInstance()
    {
    }
    /**
     * List the names of all items stored in the Container.
     *
     * @return array
     */
    public function listItems()
    {
    }
    /**
     * Test if an item is registered in this container with the given name.
     *
     * @see register()
     *
     * @param string $itemName
     *
     * @return bool
     */
    public function has($itemName)
    {
    }
    /**
     * Lookup the item with the given $itemName.
     *
     * @see register()
     *
     * @param string $itemName
     *
     * @return mixed
     *
     * @throws Swift_DependencyException If the dependency is not found
     */
    public function lookup($itemName)
    {
    }
    /**
     * Create an array of arguments passed to the constructor of $itemName.
     *
     * @param string $itemName
     *
     * @return array
     */
    public function createDependenciesFor($itemName)
    {
    }
    /**
     * Register a new dependency with $itemName.
     *
     * This method returns the current DependencyContainer instance because it
     * requires the use of the fluid interface to set the specific details for the
     * dependency.
     *
     * @see asNewInstanceOf(), asSharedInstanceOf(), asValue()
     *
     * @param string $itemName
     *
     * @return $this
     */
    public function register($itemName)
    {
    }
    /**
     * Specify the previously registered item as a literal value.
     *
     * {@link register()} must be called before this will work.
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function asValue($value)
    {
    }
    /**
     * Specify the previously registered item as an alias of another item.
     *
     * @param string $lookup
     *
     * @return $this
     */
    public function asAliasOf($lookup)
    {
    }
    /**
     * Specify the previously registered item as a new instance of $className.
     *
     * {@link register()} must be called before this will work.
     * Any arguments can be set with {@link withDependencies()},
     * {@link addConstructorValue()} or {@link addConstructorLookup()}.
     *
     * @see withDependencies(), addConstructorValue(), addConstructorLookup()
     *
     * @param string $className
     *
     * @return $this
     */
    public function asNewInstanceOf($className)
    {
    }
    /**
     * Specify the previously registered item as a shared instance of $className.
     *
     * {@link register()} must be called before this will work.
     *
     * @param string $className
     *
     * @return $this
     */
    public function asSharedInstanceOf($className)
    {
    }
    /**
     * Specify a list of injected dependencies for the previously registered item.
     *
     * This method takes an array of lookup names.
     *
     * @see addConstructorValue(), addConstructorLookup()
     *
     * @param array $lookups
     *
     * @return $this
     */
    public function withDependencies(array $lookups)
    {
    }
    /**
     * Specify a literal (non looked up) value for the constructor of the
     * previously registered item.
     *
     * @see withDependencies(), addConstructorLookup()
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function addConstructorValue($value)
    {
    }
    /**
     * Specify a dependency lookup for the constructor of the previously
     * registered item.
     *
     * @see withDependencies(), addConstructorValue()
     *
     * @param string $lookup
     *
     * @return $this
     */
    public function addConstructorLookup($lookup)
    {
    }
    /** Get the literal value with $itemName */
    private function getValue($itemName)
    {
    }
    /** Resolve an alias to another item */
    private function createAlias($itemName)
    {
    }
    /** Create a fresh instance of $itemName */
    private function createNewInstance($itemName)
    {
    }
    /** Create and register a shared instance of $itemName */
    private function createSharedInstance($itemName)
    {
    }
    /** Get the current endpoint in the store */
    private function &getEndPoint()
    {
    }
    /** Get an argument list with dependencies resolved */
    private function resolveArgs(array $args)
    {
    }
    /** Resolve a single dependency with an collections */
    private function lookupRecursive($item)
    {
    }
}