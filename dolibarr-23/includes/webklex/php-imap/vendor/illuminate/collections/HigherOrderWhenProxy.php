<?php

namespace Illuminate\Support;

/**
 * @mixin \Illuminate\Support\Enumerable
 */
class HigherOrderWhenProxy
{
    /**
     * The collection being operated on.
     *
     * @var \Illuminate\Support\Enumerable
     */
    protected $collection;
    /**
     * The condition for proxying.
     *
     * @var bool
     */
    protected $condition;
    /**
     * Create a new proxy instance.
     *
     * @param  \Illuminate\Support\Enumerable  $collection
     * @param  bool  $condition
     * @return void
     */
    public function __construct(\Illuminate\Support\Enumerable $collection, $condition)
    {
    }
    /**
     * Proxy accessing an attribute onto the collection.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
    }
    /**
     * Proxy a method call onto the collection.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
    }
}