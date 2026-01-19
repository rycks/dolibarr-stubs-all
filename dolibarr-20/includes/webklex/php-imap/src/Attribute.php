<?php

namespace Webklex\PHPIMAP;

/**
 * Class Attribute
 *
 * @package Webklex\PHPIMAP
 */
class Attribute implements \ArrayAccess
{
    /** @var string $name */
    protected $name;
    /**
     * Value holder
     *
     * @var array $values
     */
    protected $values = [];
    /**
     * Attribute constructor.
     * @param string   $name
     * @param array|mixed      $value
     */
    public function __construct($name, $value = null)
    {
    }
    /**
     * Return the stringified attribute
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Return the stringified attribute
     *
     * @return string
     */
    public function toString()
    {
    }
    /**
     * Return the serialized attribute
     *
     * @return array
     */
    public function __serialize()
    {
    }
    /**
     * Convert instance to array
     *
     * @return array
     */
    public function toArray()
    {
    }
    /**
     * Convert first value to a date object
     *
     * @return Carbon|null
     */
    public function toDate()
    {
    }
    /**
     * Determine if a value exists at an offset.
     *
     * @param  mixed  $key
     * @return bool
     */
    public function offsetExists($key)
    {
    }
    /**
     * Get a value at a given offset.
     *
     * @param  mixed  $key
     * @return mixed
     */
    public function offsetGet($key)
    {
    }
    /**
     * Set the value at a given offset.
     *
     * @param  mixed  $key
     * @param  mixed  $value
     * @return void
     */
    public function offsetSet($key, $value)
    {
    }
    /**
     * Unset the value at a given offset.
     *
     * @param  string  $key
     * @return void
     */
    public function offsetUnset($key)
    {
    }
    /**
     * Add one or more values to the attribute
     * @param array|mixed $value
     * @param boolean $strict
     *
     * @return Attribute
     */
    public function add($value, $strict = false)
    {
    }
    /**
     * Merge a given array of values with the current values array
     * @param array $values
     * @param boolean $strict
     *
     * @return Attribute
     */
    public function merge($values, $strict = false)
    {
    }
    /**
     * Check if the attribute contains the given value
     * @param mixed $value
     *
     * @return bool
     */
    public function contains($value)
    {
    }
    /**
     * Attach a given value to the current value array
     * @param $value
     * @param bool $strict
     */
    public function attach($value, $strict = false)
    {
    }
    /**
     * Set the attribute name
     * @param $name
     *
     * @return Attribute
     */
    public function setName($name)
    {
    }
    /**
     * Get the attribute name
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Get all values
     *
     * @return array
     */
    public function get()
    {
    }
    /**
     * Alias method for self::get()
     *
     * @return array
     */
    public function all()
    {
    }
    /**
     * Get the first value if possible
     *
     * @return mixed|null
     */
    public function first()
    {
    }
    /**
     * Get the last value if possible
     *
     * @return mixed|null
     */
    public function last()
    {
    }
    /**
     * Get the number of values
     *
     * @return int
     */
    public function count()
    {
    }
}