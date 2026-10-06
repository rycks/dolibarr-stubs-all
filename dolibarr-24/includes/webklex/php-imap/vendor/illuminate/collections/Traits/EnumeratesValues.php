<?php

namespace Illuminate\Support\Traits;

/**
 * @property-read HigherOrderCollectionProxy $average
 * @property-read HigherOrderCollectionProxy $avg
 * @property-read HigherOrderCollectionProxy $contains
 * @property-read HigherOrderCollectionProxy $doesntContain
 * @property-read HigherOrderCollectionProxy $each
 * @property-read HigherOrderCollectionProxy $every
 * @property-read HigherOrderCollectionProxy $filter
 * @property-read HigherOrderCollectionProxy $first
 * @property-read HigherOrderCollectionProxy $flatMap
 * @property-read HigherOrderCollectionProxy $groupBy
 * @property-read HigherOrderCollectionProxy $keyBy
 * @property-read HigherOrderCollectionProxy $map
 * @property-read HigherOrderCollectionProxy $max
 * @property-read HigherOrderCollectionProxy $min
 * @property-read HigherOrderCollectionProxy $partition
 * @property-read HigherOrderCollectionProxy $reject
 * @property-read HigherOrderCollectionProxy $some
 * @property-read HigherOrderCollectionProxy $sortBy
 * @property-read HigherOrderCollectionProxy $sortByDesc
 * @property-read HigherOrderCollectionProxy $skipUntil
 * @property-read HigherOrderCollectionProxy $skipWhile
 * @property-read HigherOrderCollectionProxy $sum
 * @property-read HigherOrderCollectionProxy $takeUntil
 * @property-read HigherOrderCollectionProxy $takeWhile
 * @property-read HigherOrderCollectionProxy $unique
 * @property-read HigherOrderCollectionProxy $until
 */
trait EnumeratesValues
{
    /**
     * Indicates that the object's string representation should be escaped when __toString is invoked.
     *
     * @var bool
     */
    protected $escapeWhenCastingToString = false;
    /**
     * The methods that can be proxied.
     *
     * @var string[]
     */
    protected static $proxies = ['average', 'avg', 'contains', 'doesntContain', 'each', 'every', 'filter', 'first', 'flatMap', 'groupBy', 'keyBy', 'map', 'max', 'min', 'partition', 'reject', 'skipUntil', 'skipWhile', 'some', 'sortBy', 'sortByDesc', 'sum', 'takeUntil', 'takeWhile', 'unique', 'until'];
    /**
     * Create a new collection instance if the value isn't one already.
     *
     * @param  mixed  $items
     * @return static
     */
    public static function make($items = [])
    {
    }
    /**
     * Wrap the given value in a collection if applicable.
     *
     * @param  mixed  $value
     * @return static
     */
    public static function wrap($value)
    {
    }
    /**
     * Get the underlying items from the given collection if applicable.
     *
     * @param  array|static  $value
     * @return array
     */
    public static function unwrap($value)
    {
    }
    /**
     * Create a new instance with no items.
     *
     * @return static
     */
    public static function empty()
    {
    }
    /**
     * Create a new collection by invoking the callback a given amount of times.
     *
     * @param  int  $number
     * @param  callable|null  $callback
     * @return static
     */
    public static function times($number, callable $callback = null)
    {
    }
    /**
     * Alias for the "avg" method.
     *
     * @param  callable|string|null  $callback
     * @return mixed
     */
    public function average($callback = null)
    {
    }
    /**
     * Alias for the "contains" method.
     *
     * @param  mixed  $key
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return bool
     */
    public function some($key, $operator = null, $value = null)
    {
    }
    /**
     * Determine if an item exists, using strict comparison.
     *
     * @param  mixed  $key
     * @param  mixed  $value
     * @return bool
     */
    public function containsStrict($key, $value = null)
    {
    }
    /**
     * Dump the items and end the script.
     *
     * @param  mixed  ...$args
     * @return void
     */
    public function dd(...$args)
    {
    }
    /**
     * Dump the items.
     *
     * @return $this
     */
    public function dump()
    {
    }
    /**
     * Execute a callback over each item.
     *
     * @param  callable  $callback
     * @return $this
     */
    public function each(callable $callback)
    {
    }
    /**
     * Execute a callback over each nested chunk of items.
     *
     * @param  callable  $callback
     * @return static
     */
    public function eachSpread(callable $callback)
    {
    }
    /**
     * Determine if all items pass the given truth test.
     *
     * @param  string|callable  $key
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return bool
     */
    public function every($key, $operator = null, $value = null)
    {
    }
    /**
     * Get the first item by the given key value pair.
     *
     * @param  string  $key
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return mixed
     */
    public function firstWhere($key, $operator = null, $value = null)
    {
    }
    /**
     * Determine if the collection is not empty.
     *
     * @return bool
     */
    public function isNotEmpty()
    {
    }
    /**
     * Run a map over each nested chunk of items.
     *
     * @param  callable  $callback
     * @return static
     */
    public function mapSpread(callable $callback)
    {
    }
    /**
     * Run a grouping map over the items.
     *
     * The callback should return an associative array with a single key/value pair.
     *
     * @param  callable  $callback
     * @return static
     */
    public function mapToGroups(callable $callback)
    {
    }
    /**
     * Map a collection and flatten the result by a single level.
     *
     * @param  callable  $callback
     * @return static
     */
    public function flatMap(callable $callback)
    {
    }
    /**
     * Map the values into a new class.
     *
     * @param  string  $class
     * @return static
     */
    public function mapInto($class)
    {
    }
    /**
     * Get the min value of a given key.
     *
     * @param  callable|string|null  $callback
     * @return mixed
     */
    public function min($callback = null)
    {
    }
    /**
     * Get the max value of a given key.
     *
     * @param  callable|string|null  $callback
     * @return mixed
     */
    public function max($callback = null)
    {
    }
    /**
     * "Paginate" the collection by slicing it into a smaller collection.
     *
     * @param  int  $page
     * @param  int  $perPage
     * @return static
     */
    public function forPage($page, $perPage)
    {
    }
    /**
     * Partition the collection into two arrays using the given callback or key.
     *
     * @param  callable|string  $key
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return static
     */
    public function partition($key, $operator = null, $value = null)
    {
    }
    /**
     * Get the sum of the given values.
     *
     * @param  callable|string|null  $callback
     * @return mixed
     */
    public function sum($callback = null)
    {
    }
    /**
     * Apply the callback if the value is truthy.
     *
     * @param  bool|mixed  $value
     * @param  callable|null  $callback
     * @param  callable|null  $default
     * @return static|mixed
     */
    public function when($value, callable $callback = null, callable $default = null)
    {
    }
    /**
     * Apply the callback if the collection is empty.
     *
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static|mixed
     */
    public function whenEmpty(callable $callback, callable $default = null)
    {
    }
    /**
     * Apply the callback if the collection is not empty.
     *
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static|mixed
     */
    public function whenNotEmpty(callable $callback, callable $default = null)
    {
    }
    /**
     * Apply the callback if the value is falsy.
     *
     * @param  bool  $value
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static|mixed
     */
    public function unless($value, callable $callback, callable $default = null)
    {
    }
    /**
     * Apply the callback unless the collection is empty.
     *
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static|mixed
     */
    public function unlessEmpty(callable $callback, callable $default = null)
    {
    }
    /**
     * Apply the callback unless the collection is not empty.
     *
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static|mixed
     */
    public function unlessNotEmpty(callable $callback, callable $default = null)
    {
    }
    /**
     * Filter items by the given key value pair.
     *
     * @param  string  $key
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return static
     */
    public function where($key, $operator = null, $value = null)
    {
    }
    /**
     * Filter items where the value for the given key is null.
     *
     * @param  string|null  $key
     * @return static
     */
    public function whereNull($key = null)
    {
    }
    /**
     * Filter items where the value for the given key is not null.
     *
     * @param  string|null  $key
     * @return static
     */
    public function whereNotNull($key = null)
    {
    }
    /**
     * Filter items by the given key value pair using strict comparison.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return static
     */
    public function whereStrict($key, $value)
    {
    }
    /**
     * Filter items by the given key value pair.
     *
     * @param  string  $key
     * @param  mixed  $values
     * @param  bool  $strict
     * @return static
     */
    public function whereIn($key, $values, $strict = false)
    {
    }
    /**
     * Filter items by the given key value pair using strict comparison.
     *
     * @param  string  $key
     * @param  mixed  $values
     * @return static
     */
    public function whereInStrict($key, $values)
    {
    }
    /**
     * Filter items such that the value of the given key is between the given values.
     *
     * @param  string  $key
     * @param  array  $values
     * @return static
     */
    public function whereBetween($key, $values)
    {
    }
    /**
     * Filter items such that the value of the given key is not between the given values.
     *
     * @param  string  $key
     * @param  array  $values
     * @return static
     */
    public function whereNotBetween($key, $values)
    {
    }
    /**
     * Filter items by the given key value pair.
     *
     * @param  string  $key
     * @param  mixed  $values
     * @param  bool  $strict
     * @return static
     */
    public function whereNotIn($key, $values, $strict = false)
    {
    }
    /**
     * Filter items by the given key value pair using strict comparison.
     *
     * @param  string  $key
     * @param  mixed  $values
     * @return static
     */
    public function whereNotInStrict($key, $values)
    {
    }
    /**
     * Filter the items, removing any items that don't match the given type(s).
     *
     * @param  string|string[]  $type
     * @return static
     */
    public function whereInstanceOf($type)
    {
    }
    /**
     * Pass the collection to the given callback and return the result.
     *
     * @param  callable  $callback
     * @return mixed
     */
    public function pipe(callable $callback)
    {
    }
    /**
     * Pass the collection into a new class.
     *
     * @param  string  $class
     * @return mixed
     */
    public function pipeInto($class)
    {
    }
    /**
     * Pass the collection through a series of callable pipes and return the result.
     *
     * @param  array<callable>  $pipes
     * @return mixed
     */
    public function pipeThrough($pipes)
    {
    }
    /**
     * Pass the collection to the given callback and then return it.
     *
     * @param  callable  $callback
     * @return $this
     */
    public function tap(callable $callback)
    {
    }
    /**
     * Reduce the collection to a single value.
     *
     * @param  callable  $callback
     * @param  mixed  $initial
     * @return mixed
     */
    public function reduce(callable $callback, $initial = null)
    {
    }
    /**
     * Reduce the collection to multiple aggregate values.
     *
     * @param  callable  $callback
     * @param  mixed  ...$initial
     * @return array
     *
     * @deprecated Use "reduceSpread" instead
     *
     * @throws \UnexpectedValueException
     */
    public function reduceMany(callable $callback, ...$initial)
    {
    }
    /**
     * Reduce the collection to multiple aggregate values.
     *
     * @param  callable  $callback
     * @param  mixed  ...$initial
     * @return array
     *
     * @throws \UnexpectedValueException
     */
    public function reduceSpread(callable $callback, ...$initial)
    {
    }
    /**
     * Reduce an associative collection to a single value.
     *
     * @param  callable  $callback
     * @param  mixed  $initial
     * @return mixed
     */
    public function reduceWithKeys(callable $callback, $initial = null)
    {
    }
    /**
     * Create a collection of all elements that do not pass a given truth test.
     *
     * @param  callable|mixed  $callback
     * @return static
     */
    public function reject($callback = true)
    {
    }
    /**
     * Return only unique items from the collection array using strict comparison.
     *
     * @param  string|callable|null  $key
     * @return static
     */
    public function uniqueStrict($key = null)
    {
    }
    /**
     * Collect the values into a collection.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collect()
    {
    }
    /**
     * Get the collection of items as a plain array.
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
     * Get the collection of items as JSON.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
    }
    /**
     * Get a CachingIterator instance.
     *
     * @param  int  $flags
     * @return \CachingIterator
     */
    public function getCachingIterator($flags = \CachingIterator::CALL_TOSTRING)
    {
    }
    /**
     * Convert the collection to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Indicate that the model's string representation should be escaped when __toString is invoked.
     *
     * @param  bool  $escape
     * @return $this
     */
    public function escapeWhenCastingToString($escape = true)
    {
    }
    /**
     * Add a method to the list of proxied methods.
     *
     * @param  string  $method
     * @return void
     */
    public static function proxy($method)
    {
    }
    /**
     * Dynamically access collection proxies.
     *
     * @param  string  $key
     * @return mixed
     *
     * @throws \Exception
     */
    public function __get($key)
    {
    }
    /**
     * Results array of items from Collection or Arrayable.
     *
     * @param  mixed  $items
     * @return array
     */
    protected function getArrayableItems($items)
    {
    }
    /**
     * Get an operator checker callback.
     *
     * @param  string  $key
     * @param  string|null  $operator
     * @param  mixed  $value
     * @return \Closure
     */
    protected function operatorForWhere($key, $operator = null, $value = null)
    {
    }
    /**
     * Determine if the given value is callable, but not a string.
     *
     * @param  mixed  $value
     * @return bool
     */
    protected function useAsCallable($value)
    {
    }
    /**
     * Get a value retrieving callback.
     *
     * @param  callable|string|null  $value
     * @return callable
     */
    protected function valueRetriever($value)
    {
    }
    /**
     * Make a function to check an item's equality.
     *
     * @param  mixed  $value
     * @return \Closure
     */
    protected function equality($value)
    {
    }
    /**
     * Make a function using another function, by negating its result.
     *
     * @param  \Closure  $callback
     * @return \Closure
     */
    protected function negate(\Closure $callback)
    {
    }
    /**
     * Make a function that returns what's passed to it.
     *
     * @return \Closure
     */
    protected function identity()
    {
    }
}