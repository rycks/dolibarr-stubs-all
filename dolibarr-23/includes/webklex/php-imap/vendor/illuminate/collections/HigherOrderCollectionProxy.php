<?php

namespace Illuminate\Support;

/**
 * @mixin \Illuminate\Support\Enumerable
 */
class HigherOrderCollectionProxy
{
    /**
     * The collection being operated on.
     *
     * @var \Illuminate\Support\Enumerable
     */
    protected $collection;
    /**
     * The method being proxied.
     *
     * @var string
     */
    protected $method;
    /**
     * Create a new proxy instance.
     *
     * @param  \Illuminate\Support\Enumerable  $collection
     * @param  string  $method
     * @return void
     */
    public function __construct(\Illuminate\Support\Enumerable $collection, $method)
    {
    }
    /**
     * Proxy accessing an attribute onto the collection items.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
    }
    /**
     * Proxy a method call onto the collection items.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
    }
}