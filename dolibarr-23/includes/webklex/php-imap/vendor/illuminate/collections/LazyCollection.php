<?php

namespace Illuminate\Support;

class LazyCollection implements \Illuminate\Contracts\Support\CanBeEscapedWhenCastToString, \Illuminate\Support\Enumerable
{
    use \Illuminate\Support\Traits\EnumeratesValues, \Illuminate\Support\Traits\Macroable;
    /**
     * The source from which to generate items.
     *
     * @var callable|static
     */
    public $source;
    /**
     * Create a new lazy collection instance.
     *
     * @param  mixed  $source
     * @return void
     */
    public function __construct($source = null)
    {
    }
    /**
     * Create a collection with the given range.
     *
     * @param  int  $from
     * @param  int  $to
     * @return static
     */
    public static function range($from, $to)
    {
    }
    /**
     * Get all items in the enumerable.
     *
     * @return array
     */
    public function all()
    {
    }
    /**
     * Eager load all items into a new lazy collection backed by an array.
     *
     * @return static
     */
    public function eager()
    {
    }
    /**
     * Cache values as they're enumerated.
     *
     * @return static
     */
    public function remember()
    {
    }
    /**
     * Get the average value of a given key.
     *
     * @param  callable|string|null  $callback
     * @return mixed
     */
    public function avg($callback = null)
    {
    }
    /**
     * Get the median of a given key.
     *
     * @param  string|array|null  $key
     * @return mixed
     */
    public function median($key = null)
    {
    }
    /**
     * Get the mode of a given key.
     *
     * @param  string|array|null  $key
     * @return array|null
     */
    public function mode($key = null)
    {
    }
    /**
     * Collapse the collection of items into a single array.
     *
     * @return static
     */
    public function collapse()
    {
    }
    /**
     * Determine if an item exists in the enumerable.
     *
     * @param  mixed  $key
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return bool
     */
    public function contains($key, $operator = null, $value = null)
    {
    }
    /**
     * Determine if an item is not contained in the enumerable.
     *
     * @param  mixed  $key
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return bool
     */
    public function doesntContain($key, $operator = null, $value = null)
    {
    }
    /**
     * Cross join the given iterables, returning all possible permutations.
     *
     * @param  array  ...$arrays
     * @return static
     */
    public function crossJoin(...$arrays)
    {
    }
    /**
     * Count the number of items in the collection by a field or using a callback.
     *
     * @param  callable|string  $countBy
     * @return static
     */
    public function countBy($countBy = null)
    {
    }
    /**
     * Get the items that are not present in the given items.
     *
     * @param  mixed  $items
     * @return static
     */
    public function diff($items)
    {
    }
    /**
     * Get the items that are not present in the given items, using the callback.
     *
     * @param  mixed  $items
     * @param  callable  $callback
     * @return static
     */
    public function diffUsing($items, callable $callback)
    {
    }
    /**
     * Get the items whose keys and values are not present in the given items.
     *
     * @param  mixed  $items
     * @return static
     */
    public function diffAssoc($items)
    {
    }
    /**
     * Get the items whose keys and values are not present in the given items, using the callback.
     *
     * @param  mixed  $items
     * @param  callable  $callback
     * @return static
     */
    public function diffAssocUsing($items, callable $callback)
    {
    }
    /**
     * Get the items whose keys are not present in the given items.
     *
     * @param  mixed  $items
     * @return static
     */
    public function diffKeys($items)
    {
    }
    /**
     * Get the items whose keys are not present in the given items, using the callback.
     *
     * @param  mixed  $items
     * @param  callable  $callback
     * @return static
     */
    public function diffKeysUsing($items, callable $callback)
    {
    }
    /**
     * Retrieve duplicate items.
     *
     * @param  callable|string|null  $callback
     * @param  bool  $strict
     * @return static
     */
    public function duplicates($callback = null, $strict = false)
    {
    }
    /**
     * Retrieve duplicate items using strict comparison.
     *
     * @param  callable|string|null  $callback
     * @return static
     */
    public function duplicatesStrict($callback = null)
    {
    }
    /**
     * Get all items except for those with the specified keys.
     *
     * @param  mixed  $keys
     * @return static
     */
    public function except($keys)
    {
    }
    /**
     * Run a filter over each of the items.
     *
     * @param  callable|null  $callback
     * @return static
     */
    public function filter(callable $callback = null)
    {
    }
    /**
     * Get the first item from the enumerable passing the given truth test.
     *
     * @param  callable|null  $callback
     * @param  mixed  $default
     * @return mixed
     */
    public function first(callable $callback = null, $default = null)
    {
    }
    /**
     * Get a flattened list of the items in the collection.
     *
     * @param  int  $depth
     * @return static
     */
    public function flatten($depth = INF)
    {
    }
    /**
     * Flip the items in the collection.
     *
     * @return static
     */
    public function flip()
    {
    }
    /**
     * Get an item by key.
     *
     * @param  mixed  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
    }
    /**
     * Group an associative array by a field or using a callback.
     *
     * @param  array|callable|string  $groupBy
     * @param  bool  $preserveKeys
     * @return static
     */
    public function groupBy($groupBy, $preserveKeys = false)
    {
    }
    /**
     * Key an associative array by a field or using a callback.
     *
     * @param  callable|string  $keyBy
     * @return static
     */
    public function keyBy($keyBy)
    {
    }
    /**
     * Determine if an item exists in the collection by key.
     *
     * @param  mixed  $key
     * @return bool
     */
    public function has($key)
    {
    }
    /**
     * Determine if any of the keys exist in the collection.
     *
     * @param  mixed  $key
     * @return bool
     */
    public function hasAny($key)
    {
    }
    /**
     * Concatenate values of a given key as a string.
     *
     * @param  string  $value
     * @param  string|null  $glue
     * @return string
     */
    public function implode($value, $glue = null)
    {
    }
    /**
     * Intersect the collection with the given items.
     *
     * @param  mixed  $items
     * @return static
     */
    public function intersect($items)
    {
    }
    /**
     * Intersect the collection with the given items by key.
     *
     * @param  mixed  $items
     * @return static
     */
    public function intersectByKeys($items)
    {
    }
    /**
     * Determine if the items are empty or not.
     *
     * @return bool
     */
    public function isEmpty()
    {
    }
    /**
     * Determine if the collection contains a single item.
     *
     * @return bool
     */
    public function containsOneItem()
    {
    }
    /**
     * Join all items from the collection using a string. The final items can use a separate glue string.
     *
     * @param  string  $glue
     * @param  string  $finalGlue
     * @return string
     */
    public function join($glue, $finalGlue = '')
    {
    }
    /**
     * Get the keys of the collection items.
     *
     * @return static
     */
    public function keys()
    {
    }
    /**
     * Get the last item from the collection.
     *
     * @param  callable|null  $callback
     * @param  mixed  $default
     * @return mixed
     */
    public function last(callable $callback = null, $default = null)
    {
    }
    /**
     * Get the values of a given key.
     *
     * @param  string|array  $value
     * @param  string|null  $key
     * @return static
     */
    public function pluck($value, $key = null)
    {
    }
    /**
     * Run a map over each of the items.
     *
     * @param  callable  $callback
     * @return static
     */
    public function map(callable $callback)
    {
    }
    /**
     * Run a dictionary map over the items.
     *
     * The callback should return an associative array with a single key/value pair.
     *
     * @param  callable  $callback
     * @return static
     */
    public function mapToDictionary(callable $callback)
    {
    }
    /**
     * Run an associative map over each of the items.
     *
     * The callback should return an associative array with a single key/value pair.
     *
     * @param  callable  $callback
     * @return static
     */
    public function mapWithKeys(callable $callback)
    {
    }
    /**
     * Merge the collection with the given items.
     *
     * @param  mixed  $items
     * @return static
     */
    public function merge($items)
    {
    }
    /**
     * Recursively merge the collection with the given items.
     *
     * @param  mixed  $items
     * @return static
     */
    public function mergeRecursive($items)
    {
    }
    /**
     * Create a collection by using this collection for keys and another for its values.
     *
     * @param  mixed  $values
     * @return static
     */
    public function combine($values)
    {
    }
    /**
     * Union the collection with the given items.
     *
     * @param  mixed  $items
     * @return static
     */
    public function union($items)
    {
    }
    /**
     * Create a new collection consisting of every n-th element.
     *
     * @param  int  $step
     * @param  int  $offset
     * @return static
     */
    public function nth($step, $offset = 0)
    {
    }
    /**
     * Get the items with the specified keys.
     *
     * @param  mixed  $keys
     * @return static
     */
    public function only($keys)
    {
    }
    /**
     * Push all of the given items onto the collection.
     *
     * @param  iterable  $source
     * @return static
     */
    public function concat($source)
    {
    }
    /**
     * Get one or a specified number of items randomly from the collection.
     *
     * @param  int|null  $number
     * @return static|mixed
     *
     * @throws \InvalidArgumentException
     */
    public function random($number = null)
    {
    }
    /**
     * Replace the collection items with the given items.
     *
     * @param  mixed  $items
     * @return static
     */
    public function replace($items)
    {
    }
    /**
     * Recursively replace the collection items with the given items.
     *
     * @param  mixed  $items
     * @return static
     */
    public function replaceRecursive($items)
    {
    }
    /**
     * Reverse items order.
     *
     * @return static
     */
    public function reverse()
    {
    }
    /**
     * Search the collection for a given value and return the corresponding key if successful.
     *
     * @param  mixed  $value
     * @param  bool  $strict
     * @return mixed
     */
    public function search($value, $strict = false)
    {
    }
    /**
     * Shuffle the items in the collection.
     *
     * @param  int|null  $seed
     * @return static
     */
    public function shuffle($seed = null)
    {
    }
    /**
     * Create chunks representing a "sliding window" view of the items in the collection.
     *
     * @param  int  $size
     * @param  int  $step
     * @return static
     */
    public function sliding($size = 2, $step = 1)
    {
    }
    /**
     * Skip the first {$count} items.
     *
     * @param  int  $count
     * @return static
     */
    public function skip($count)
    {
    }
    /**
     * Skip items in the collection until the given condition is met.
     *
     * @param  mixed  $value
     * @return static
     */
    public function skipUntil($value)
    {
    }
    /**
     * Skip items in the collection while the given condition is met.
     *
     * @param  mixed  $value
     * @return static
     */
    public function skipWhile($value)
    {
    }
    /**
     * Get a slice of items from the enumerable.
     *
     * @param  int  $offset
     * @param  int|null  $length
     * @return static
     */
    public function slice($offset, $length = null)
    {
    }
    /**
     * Split a collection into a certain number of groups.
     *
     * @param  int  $numberOfGroups
     * @return static
     */
    public function split($numberOfGroups)
    {
    }
    /**
     * Get the first item in the collection, but only if exactly one item exists. Otherwise, throw an exception.
     *
     * @param  mixed  $key
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return mixed
     *
     * @throws \Illuminate\Support\ItemNotFoundException
     * @throws \Illuminate\Support\MultipleItemsFoundException
     */
    public function sole($key = null, $operator = null, $value = null)
    {
    }
    /**
     * Get the first item in the collection but throw an exception if no matching items exist.
     *
     * @param  mixed  $key
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return mixed
     *
     * @throws \Illuminate\Support\ItemNotFoundException
     */
    public function firstOrFail($key = null, $operator = null, $value = null)
    {
    }
    /**
     * Chunk the collection into chunks of the given size.
     *
     * @param  int  $size
     * @return static
     */
    public function chunk($size)
    {
    }
    /**
     * Split a collection into a certain number of groups, and fill the first groups completely.
     *
     * @param  int  $numberOfGroups
     * @return static
     */
    public function splitIn($numberOfGroups)
    {
    }
    /**
     * Chunk the collection into chunks with a callback.
     *
     * @param  callable  $callback
     * @return static
     */
    public function chunkWhile(callable $callback)
    {
    }
    /**
     * Sort through each item with a callback.
     *
     * @param  callable|null|int  $callback
     * @return static
     */
    public function sort($callback = null)
    {
    }
    /**
     * Sort items in descending order.
     *
     * @param  int  $options
     * @return static
     */
    public function sortDesc($options = SORT_REGULAR)
    {
    }
    /**
     * Sort the collection using the given callback.
     *
     * @param  callable|string  $callback
     * @param  int  $options
     * @param  bool  $descending
     * @return static
     */
    public function sortBy($callback, $options = SORT_REGULAR, $descending = false)
    {
    }
    /**
     * Sort the collection in descending order using the given callback.
     *
     * @param  callable|string  $callback
     * @param  int  $options
     * @return static
     */
    public function sortByDesc($callback, $options = SORT_REGULAR)
    {
    }
    /**
     * Sort the collection keys.
     *
     * @param  int  $options
     * @param  bool  $descending
     * @return static
     */
    public function sortKeys($options = SORT_REGULAR, $descending = false)
    {
    }
    /**
     * Sort the collection keys in descending order.
     *
     * @param  int  $options
     * @return static
     */
    public function sortKeysDesc($options = SORT_REGULAR)
    {
    }
    /**
     * Sort the collection keys using a callback.
     *
     * @param  callable  $callback
     * @return static
     */
    public function sortKeysUsing(callable $callback)
    {
    }
    /**
     * Take the first or last {$limit} items.
     *
     * @param  int  $limit
     * @return static
     */
    public function take($limit)
    {
    }
    /**
     * Take items in the collection until the given condition is met.
     *
     * @param  mixed  $value
     * @return static
     */
    public function takeUntil($value)
    {
    }
    /**
     * Take items in the collection until a given point in time.
     *
     * @param  \DateTimeInterface  $timeout
     * @return static
     */
    public function takeUntilTimeout(\DateTimeInterface $timeout)
    {
    }
    /**
     * Take items in the collection while the given condition is met.
     *
     * @param  mixed  $value
     * @return static
     */
    public function takeWhile($value)
    {
    }
    /**
     * Pass each item in the collection to the given callback, lazily.
     *
     * @param  callable  $callback
     * @return static
     */
    public function tapEach(callable $callback)
    {
    }
    /**
     * Convert a flatten "dot" notation array into an expanded array.
     *
     * @return static
     */
    public function undot()
    {
    }
    /**
     * Return only unique items from the collection array.
     *
     * @param  string|callable|null  $key
     * @param  bool  $strict
     * @return static
     */
    public function unique($key = null, $strict = false)
    {
    }
    /**
     * Reset the keys on the underlying array.
     *
     * @return static
     */
    public function values()
    {
    }
    /**
     * Zip the collection together with one or more arrays.
     *
     * e.g. new LazyCollection([1, 2, 3])->zip([4, 5, 6]);
     *      => [[1, 4], [2, 5], [3, 6]]
     *
     * @param  mixed  ...$items
     * @return static
     */
    public function zip($items)
    {
    }
    /**
     * Pad collection to the specified length with a value.
     *
     * @param  int  $size
     * @param  mixed  $value
     * @return static
     */
    public function pad($size, $value)
    {
    }
    /**
     * Get the values iterator.
     *
     * @return \Traversable
     */
    #[\ReturnTypeWillChange]
    public function getIterator()
    {
    }
    /**
     * Count the number of items in the collection.
     *
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function count()
    {
    }
    /**
     * Make an iterator from the given source.
     *
     * @param  mixed  $source
     * @return \Traversable
     */
    protected function makeIterator($source)
    {
    }
    /**
     * Explode the "value" and "key" arguments passed to "pluck".
     *
     * @param  string|array  $value
     * @param  string|array|null  $key
     * @return array
     */
    protected function explodePluckParameters($value, $key)
    {
    }
    /**
     * Pass this lazy collection through a method on the collection class.
     *
     * @param  string  $method
     * @param  array  $params
     * @return static
     */
    protected function passthru($method, array $params)
    {
    }
    /**
     * Get the current time.
     *
     * @return int
     */
    protected function now()
    {
    }
}