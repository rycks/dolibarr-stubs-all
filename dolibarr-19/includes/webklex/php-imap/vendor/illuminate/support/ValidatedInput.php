<?php

namespace Illuminate\Support;

class ValidatedInput implements \Illuminate\Contracts\Support\ValidatedData
{
    /**
     * The underlying input.
     *
     * @var array
     */
    protected $input;
    /**
     * Create a new validated input container.
     *
     * @param  array  $input
     * @return void
     */
    public function __construct(array $input)
    {
    }
    /**
     * Get a subset containing the provided keys with values from the input data.
     *
     * @param  array|mixed  $keys
     * @return array
     */
    public function only($keys)
    {
    }
    /**
     * Get all of the input except for a specified array of items.
     *
     * @param  array|mixed  $keys
     * @return array
     */
    public function except($keys)
    {
    }
    /**
     * Merge the validated input with the given array of additional data.
     *
     * @param  array  $items
     * @return static
     */
    public function merge(array $items)
    {
    }
    /**
     * Get the input as a collection.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collect()
    {
    }
    /**
     * Get the raw, underlying input array.
     *
     * @return array
     */
    public function all()
    {
    }
    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
    }
    /**
     * Dynamically access input data.
     *
     * @param  string  $name
     * @return mixed
     */
    public function __get($name)
    {
    }
    /**
     * Dynamically set input data.
     *
     * @param  string  $name
     * @param  mixed  $value
     * @return mixed
     */
    public function __set($name, $value)
    {
    }
    /**
     * Determine if an input key is set.
     *
     * @return bool
     */
    public function __isset($name)
    {
    }
    /**
     * Remove an input key.
     *
     * @param  string  $name
     * @return void
     */
    public function __unset($name)
    {
    }
    /**
     * Determine if an item exists at an offset.
     *
     * @param  mixed  $key
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($key)
    {
    }
    /**
     * Get an item at a given offset.
     *
     * @param  mixed  $key
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($key)
    {
    }
    /**
     * Set the item at a given offset.
     *
     * @param  mixed  $key
     * @param  mixed  $value
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($key, $value)
    {
    }
    /**
     * Unset the item at a given offset.
     *
     * @param  string  $key
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($key)
    {
    }
    /**
     * Get an iterator for the input.
     *
     * @return \ArrayIterator
     */
    #[\ReturnTypeWillChange]
    public function getIterator()
    {
    }
}