<?php

namespace Illuminate\Support\Traits;

trait Conditionable
{
    /**
     * Apply the callback if the given "value" is truthy.
     *
     * @param  mixed  $value
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return $this|mixed
     */
    public function when($value, $callback, $default = null)
    {
    }
    /**
     * Apply the callback if the given "value" is falsy.
     *
     * @param  mixed  $value
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return $this|mixed
     */
    public function unless($value, $callback, $default = null)
    {
    }
}