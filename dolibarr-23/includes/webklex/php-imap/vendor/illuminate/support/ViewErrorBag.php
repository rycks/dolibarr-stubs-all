<?php

namespace Illuminate\Support;

/**
 * @mixin \Illuminate\Contracts\Support\MessageBag
 */
class ViewErrorBag implements \Countable
{
    /**
     * The array of the view error bags.
     *
     * @var array
     */
    protected $bags = [];
    /**
     * Checks if a named MessageBag exists in the bags.
     *
     * @param  string  $key
     * @return bool
     */
    public function hasBag($key = 'default')
    {
    }
    /**
     * Get a MessageBag instance from the bags.
     *
     * @param  string  $key
     * @return \Illuminate\Contracts\Support\MessageBag
     */
    public function getBag($key)
    {
    }
    /**
     * Get all the bags.
     *
     * @return array
     */
    public function getBags()
    {
    }
    /**
     * Add a new MessageBag instance to the bags.
     *
     * @param  string  $key
     * @param  \Illuminate\Contracts\Support\MessageBag  $bag
     * @return $this
     */
    public function put($key, \Illuminate\Contracts\Support\MessageBag $bag)
    {
    }
    /**
     * Determine if the default message bag has any messages.
     *
     * @return bool
     */
    public function any()
    {
    }
    /**
     * Get the number of messages in the default bag.
     *
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function count()
    {
    }
    /**
     * Dynamically call methods on the default bag.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
    }
    /**
     * Dynamically access a view error bag.
     *
     * @param  string  $key
     * @return \Illuminate\Contracts\Support\MessageBag
     */
    public function __get($key)
    {
    }
    /**
     * Dynamically set a view error bag.
     *
     * @param  string  $key
     * @param  \Illuminate\Contracts\Support\MessageBag  $value
     * @return void
     */
    public function __set($key, $value)
    {
    }
    /**
     * Convert the default bag to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
    }
}