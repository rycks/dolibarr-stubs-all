<?php

/**
 * Assign high numeric IDs to a config item to force appending.
 *
 * @param  array  $array
 * @return array
 */
function append_config(array $array)
{
}
/**
 * Determine if the given value is "blank".
 *
 * @param  mixed  $value
 * @return bool
 */
function blank($value)
{
}
/**
 * Get the class "basename" of the given object / class.
 *
 * @param  string|object  $class
 * @return string
 */
function class_basename($class)
{
}
/**
 * Returns all traits used by a class, its parent classes and trait of their traits.
 *
 * @param  object|string  $class
 * @return array
 */
function class_uses_recursive($class)
{
}
/**
 * Encode HTML special characters in a string.
 *
 * @param  \Illuminate\Contracts\Support\DeferringDisplayableValue|\Illuminate\Contracts\Support\Htmlable|string|null  $value
 * @param  bool  $doubleEncode
 * @return string
 */
function e($value, $doubleEncode = \true)
{
}
/**
 * Gets the value of an environment variable.
 *
 * @param  string  $key
 * @param  mixed  $default
 * @return mixed
 */
function env($key, $default = \null)
{
}
/**
 * Determine if a value is "filled".
 *
 * @param  mixed  $value
 * @return bool
 */
function filled($value)
{
}
/**
 * Get an item from an object using "dot" notation.
 *
 * @param  object  $object
 * @param  string|null  $key
 * @param  mixed  $default
 * @return mixed
 */
function object_get($object, $key, $default = \null)
{
}
/**
 * Provide access to optional objects.
 *
 * @param  mixed  $value
 * @param  callable|null  $callback
 * @return mixed
 */
function optional($value = \null, callable $callback = \null)
{
}
/**
 * Replace a given pattern with each value in the array in sequentially.
 *
 * @param  string  $pattern
 * @param  array  $replacements
 * @param  string  $subject
 * @return string
 */
function preg_replace_array($pattern, array $replacements, $subject)
{
}
/**
 * Retry an operation a given number of times.
 *
 * @param  int  $times
 * @param  callable  $callback
 * @param  int|\Closure  $sleepMilliseconds
 * @param  callable|null  $when
 * @return mixed
 *
 * @throws \Exception
 */
function retry($times, callable $callback, $sleepMilliseconds = 0, $when = \null)
{
}
/**
 * Call the given Closure with the given value then return the value.
 *
 * @param  mixed  $value
 * @param  callable|null  $callback
 * @return mixed
 */
function tap($value, $callback = \null)
{
}
/**
 * Throw the given exception if the given condition is true.
 *
 * @param  mixed  $condition
 * @param  \Throwable|string  $exception
 * @param  mixed  ...$parameters
 * @return mixed
 *
 * @throws \Throwable
 */
function throw_if($condition, $exception = 'RuntimeException', ...$parameters)
{
}
/**
 * Throw the given exception unless the given condition is true.
 *
 * @param  mixed  $condition
 * @param  \Throwable|string  $exception
 * @param  mixed  ...$parameters
 * @return mixed
 *
 * @throws \Throwable
 */
function throw_unless($condition, $exception = 'RuntimeException', ...$parameters)
{
}
/**
 * Returns all traits used by a trait and its traits.
 *
 * @param  string  $trait
 * @return array
 */
function trait_uses_recursive($trait)
{
}
/**
 * Transform the given value if it is present.
 *
 * @param  mixed  $value
 * @param  callable  $callback
 * @param  mixed  $default
 * @return mixed|null
 */
function transform($value, callable $callback, $default = \null)
{
}
/**
 * Determine whether the current environment is Windows based.
 *
 * @return bool
 */
function windows_os()
{
}
/**
 * Return the given value, optionally passed through the given callback.
 *
 * @param  mixed  $value
 * @param  callable|null  $callback
 * @return mixed
 */
function with($value, callable $callback = \null)
{
}