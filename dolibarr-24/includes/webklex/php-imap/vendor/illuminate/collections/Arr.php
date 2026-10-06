<?php

namespace Illuminate\Support;

class Arr
{
    use \Illuminate\Support\Traits\Macroable;
    /**
     * Determine whether the given value is array accessible.
     *
     * @param  mixed  $value
     * @return bool
     */
    public static function accessible($value)
    {
    }
    /**
     * Add an element to an array using "dot" notation if it doesn't exist.
     *
     * @param  array  $array
     * @param  string  $key
     * @param  mixed  $value
     * @return array
     */
    public static function add($array, $key, $value)
    {
    }
    /**
     * Collapse an array of arrays into a single array.
     *
     * @param  iterable  $array
     * @return array
     */
    public static function collapse($array)
    {
    }
    /**
     * Cross join the given arrays, returning all possible permutations.
     *
     * @param  iterable  ...$arrays
     * @return array
     */
    public static function crossJoin(...$arrays)
    {
    }
    /**
     * Divide an array into two arrays. One with keys and the other with values.
     *
     * @param  array  $array
     * @return array
     */
    public static function divide($array)
    {
    }
    /**
     * Flatten a multi-dimensional associative array with dots.
     *
     * @param  iterable  $array
     * @param  string  $prepend
     * @return array
     */
    public static function dot($array, $prepend = '')
    {
    }
    /**
     * Convert a flatten "dot" notation array into an expanded array.
     *
     * @param  iterable  $array
     * @return array
     */
    public static function undot($array)
    {
    }
    /**
     * Get all of the given array except for a specified array of keys.
     *
     * @param  array  $array
     * @param  array|string  $keys
     * @return array
     */
    public static function except($array, $keys)
    {
    }
    /**
     * Determine if the given key exists in the provided array.
     *
     * @param  \ArrayAccess|array  $array
     * @param  string|int  $key
     * @return bool
     */
    public static function exists($array, $key)
    {
    }
    /**
     * Return the first element in an array passing a given truth test.
     *
     * @param  iterable  $array
     * @param  callable|null  $callback
     * @param  mixed  $default
     * @return mixed
     */
    public static function first($array, callable $callback = null, $default = null)
    {
    }
    /**
     * Return the last element in an array passing a given truth test.
     *
     * @param  array  $array
     * @param  callable|null  $callback
     * @param  mixed  $default
     * @return mixed
     */
    public static function last($array, callable $callback = null, $default = null)
    {
    }
    /**
     * Flatten a multi-dimensional array into a single level.
     *
     * @param  iterable  $array
     * @param  int  $depth
     * @return array
     */
    public static function flatten($array, $depth = INF)
    {
    }
    /**
     * Remove one or many array items from a given array using "dot" notation.
     *
     * @param  array  $array
     * @param  array|string  $keys
     * @return void
     */
    public static function forget(&$array, $keys)
    {
    }
    /**
     * Get an item from an array using "dot" notation.
     *
     * @param  \ArrayAccess|array  $array
     * @param  string|int|null  $key
     * @param  mixed  $default
     * @return mixed
     */
    public static function get($array, $key, $default = null)
    {
    }
    /**
     * Check if an item or items exist in an array using "dot" notation.
     *
     * @param  \ArrayAccess|array  $array
     * @param  string|array  $keys
     * @return bool
     */
    public static function has($array, $keys)
    {
    }
    /**
     * Determine if any of the keys exist in an array using "dot" notation.
     *
     * @param  \ArrayAccess|array  $array
     * @param  string|array  $keys
     * @return bool
     */
    public static function hasAny($array, $keys)
    {
    }
    /**
     * Determines if an array is associative.
     *
     * An array is "associative" if it doesn't have sequential numerical keys beginning with zero.
     *
     * @param  array  $array
     * @return bool
     */
    public static function isAssoc(array $array)
    {
    }
    /**
     * Determines if an array is a list.
     *
     * An array is a "list" if all array keys are sequential integers starting from 0 with no gaps in between.
     *
     * @param  array  $array
     * @return bool
     */
    public static function isList($array)
    {
    }
    /**
     * Get a subset of the items from the given array.
     *
     * @param  array  $array
     * @param  array|string  $keys
     * @return array
     */
    public static function only($array, $keys)
    {
    }
    /**
     * Pluck an array of values from an array.
     *
     * @param  iterable  $array
     * @param  string|array|int|null  $value
     * @param  string|array|null  $key
     * @return array
     */
    public static function pluck($array, $value, $key = null)
    {
    }
    /**
     * Explode the "value" and "key" arguments passed to "pluck".
     *
     * @param  string|array  $value
     * @param  string|array|null  $key
     * @return array
     */
    protected static function explodePluckParameters($value, $key)
    {
    }
    /**
     * Push an item onto the beginning of an array.
     *
     * @param  array  $array
     * @param  mixed  $value
     * @param  mixed  $key
     * @return array
     */
    public static function prepend($array, $value, $key = null)
    {
    }
    /**
     * Get a value from the array, and remove it.
     *
     * @param  array  $array
     * @param  string|int  $key
     * @param  mixed  $default
     * @return mixed
     */
    public static function pull(&$array, $key, $default = null)
    {
    }
    /**
     * Convert the array into a query string.
     *
     * @param  array  $array
     * @return string
     */
    public static function query($array)
    {
    }
    /**
     * Get one or a specified number of random values from an array.
     *
     * @param  array  $array
     * @param  int|null  $number
     * @param  bool|false  $preserveKeys
     * @return mixed
     *
     * @throws \InvalidArgumentException
     */
    public static function random($array, $number = null, $preserveKeys = false)
    {
    }
    /**
     * Set an array item to a given value using "dot" notation.
     *
     * If no key is given to the method, the entire array will be replaced.
     *
     * @param  array  $array
     * @param  string|null  $key
     * @param  mixed  $value
     * @return array
     */
    public static function set(&$array, $key, $value)
    {
    }
    /**
     * Shuffle the given array and return the result.
     *
     * @param  array  $array
     * @param  int|null  $seed
     * @return array
     */
    public static function shuffle($array, $seed = null)
    {
    }
    /**
     * Sort the array using the given callback or "dot" notation.
     *
     * @param  array  $array
     * @param  callable|array|string|null  $callback
     * @return array
     */
    public static function sort($array, $callback = null)
    {
    }
    /**
     * Recursively sort an array by keys and values.
     *
     * @param  array  $array
     * @param  int  $options
     * @param  bool  $descending
     * @return array
     */
    public static function sortRecursive($array, $options = SORT_REGULAR, $descending = false)
    {
    }
    /**
     * Conditionally compile classes from an array into a CSS class list.
     *
     * @param  array  $array
     * @return string
     */
    public static function toCssClasses($array)
    {
    }
    /**
     * Filter the array using the given callback.
     *
     * @param  array  $array
     * @param  callable  $callback
     * @return array
     */
    public static function where($array, callable $callback)
    {
    }
    /**
     * Filter items where the value is not null.
     *
     * @param  array  $array
     * @return array
     */
    public static function whereNotNull($array)
    {
    }
    /**
     * If the given value is not an array and not null, wrap it in one.
     *
     * @param  mixed  $value
     * @return array
     */
    public static function wrap($value)
    {
    }
}