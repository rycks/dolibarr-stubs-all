<?php

/**
 * Create a collection from the given value.
 *
 * @param  mixed  $value
 * @return \Illuminate\Support\Collection
 */
function collect($value = \null)
{
}
/**
 * Fill in data where it's missing.
 *
 * @param  mixed  $target
 * @param  string|array  $key
 * @param  mixed  $value
 * @return mixed
 */
function data_fill(&$target, $key, $value)
{
}
/**
 * Get an item from an array or object using "dot" notation.
 *
 * @param  mixed  $target
 * @param  string|array|int|null  $key
 * @param  mixed  $default
 * @return mixed
 */
function data_get($target, $key, $default = \null)
{
}
/**
 * Set an item on an array or object using dot notation.
 *
 * @param  mixed  $target
 * @param  string|array  $key
 * @param  mixed  $value
 * @param  bool  $overwrite
 * @return mixed
 */
function data_set(&$target, $key, $value, $overwrite = \true)
{
}
/**
 * Get the first element of an array. Useful for method chaining.
 *
 * @param  array  $array
 * @return mixed
 */
function head($array)
{
}
/**
 * Get the last element from an array.
 *
 * @param  array  $array
 * @return mixed
 */
function last($array)
{
}
/**
 * Return the default value of the given value.
 *
 * @param  mixed  $value
 * @return mixed
 */
function value($value, ...$args)
{
}