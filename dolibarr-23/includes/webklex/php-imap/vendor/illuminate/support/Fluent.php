<?php

namespace Illuminate\Support;

class Fluent implements \Illuminate\Contracts\Support\Arrayable, \ArrayAccess, \Illuminate\Contracts\Support\Jsonable, \JsonSerializable
{
    /**
     * All of the attributes set on the fluent instance.
     *
     * @var array
     */
    protected $attributes = [];
    /**
     * Create a new fluent instance.
     *
     * @param  array|object  $attributes
     * @return void
     */
    public function __construct($attributes = [])
    {
    }
    /**
     * Get an attribute from the fluent instance.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
    }
    /**
     * Get the attributes from the fluent instance.
     *
     * @return array
     */
    public function getAttributes()
    {
    }
    /**
     * Convert the fluent instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
    }
    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
    }
    /**
     * Convert the fluent instance to JSON.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
    }
    /**
     * Determine if the given offset exists.
     *
     * @param  string  $offset
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
    }
    /**
     * Get the value for a given offset.
     *
     * @param  string  $offset
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
    }
    /**
     * Set the value at the given offset.
     *
     * @param  string  $offset
     * @param  mixed  $value
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
    }
    /**
     * Unset the value at the given offset.
     *
     * @param  string  $offset
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
    }
    /**
     * Handle dynamic calls to the fluent instance to set attributes.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return $this
     */
    public function __call($method, $parameters)
    {
    }
    /**
     * Dynamically retrieve the value of an attribute.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
    }
    /**
     * Dynamically set the value of an attribute.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function __set($key, $value)
    {
    }
    /**
     * Dynamically check if an attribute is set.
     *
     * @param  string  $key
     * @return bool
     */
    public function __isset($key)
    {
    }
    /**
     * Dynamically unset an attribute.
     *
     * @param  string  $key
     * @return void
     */
    public function __unset($key)
    {
    }
}