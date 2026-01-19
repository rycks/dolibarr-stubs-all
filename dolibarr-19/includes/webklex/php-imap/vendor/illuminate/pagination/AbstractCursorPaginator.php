<?php

namespace Illuminate\Pagination;

/**
 * @mixin \Illuminate\Support\Collection
 */
abstract class AbstractCursorPaginator implements \Illuminate\Contracts\Support\Htmlable
{
    use \Illuminate\Support\Traits\ForwardsCalls, \Illuminate\Support\Traits\Tappable;
    /**
     * All of the items being paginated.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $items;
    /**
     * The number of items to be shown per page.
     *
     * @var int
     */
    protected $perPage;
    /**
     * The base path to assign to all URLs.
     *
     * @var string
     */
    protected $path = '/';
    /**
     * The query parameters to add to all URLs.
     *
     * @var array
     */
    protected $query = [];
    /**
     * The URL fragment to add to all URLs.
     *
     * @var string|null
     */
    protected $fragment;
    /**
     * The cursor string variable used to store the page.
     *
     * @var string
     */
    protected $cursorName = 'cursor';
    /**
     * The current cursor.
     *
     * @var \Illuminate\Pagination\Cursor|null
     */
    protected $cursor;
    /**
     * The paginator parameters for the cursor.
     *
     * @var array
     */
    protected $parameters;
    /**
     * The paginator options.
     *
     * @var array
     */
    protected $options;
    /**
     * The current cursor resolver callback.
     *
     * @var \Closure
     */
    protected static $currentCursorResolver;
    /**
     * Get the URL for a given cursor.
     *
     * @param  \Illuminate\Pagination\Cursor|null  $cursor
     * @return string
     */
    public function url($cursor)
    {
    }
    /**
     * Get the URL for the previous page.
     *
     * @return string|null
     */
    public function previousPageUrl()
    {
    }
    /**
     * The URL for the next page, or null.
     *
     * @return string|null
     */
    public function nextPageUrl()
    {
    }
    /**
     * Get the "cursor" that points to the previous set of items.
     *
     * @return \Illuminate\Pagination\Cursor|null
     */
    public function previousCursor()
    {
    }
    /**
     * Get the "cursor" that points to the next set of items.
     *
     * @return \Illuminate\Pagination\Cursor|null
     */
    public function nextCursor()
    {
    }
    /**
     * Get a cursor instance for the given item.
     *
     * @param  \ArrayAccess|\stdClass  $item
     * @param  bool  $isNext
     * @return \Illuminate\Pagination\Cursor
     */
    public function getCursorForItem($item, $isNext = true)
    {
    }
    /**
     * Get the cursor parameters for a given object.
     *
     * @param  \ArrayAccess|\stdClass  $item
     * @return array
     *
     * @throws \Exception
     */
    public function getParametersForItem($item)
    {
    }
    /**
     * Get the cursor parameter value from a pivot model if applicable.
     *
     * @param  \ArrayAccess|\stdClass  $item
     * @param  string  $parameterName
     * @return string|null
     */
    protected function getPivotParameterForItem($item, $parameterName)
    {
    }
    /**
     * Ensure the parameter is a primitive type.
     *
     * This can resolve issues that arise the developer uses a value object for an attribute.
     *
     * @param  mixed  $parameter
     * @return mixed
     */
    protected function ensureParameterIsPrimitive($parameter)
    {
    }
    /**
     * Get / set the URL fragment to be appended to URLs.
     *
     * @param  string|null  $fragment
     * @return $this|string|null
     */
    public function fragment($fragment = null)
    {
    }
    /**
     * Add a set of query string values to the paginator.
     *
     * @param  array|string|null  $key
     * @param  string|null  $value
     * @return $this
     */
    public function appends($key, $value = null)
    {
    }
    /**
     * Add an array of query string values.
     *
     * @param  array  $keys
     * @return $this
     */
    protected function appendArray(array $keys)
    {
    }
    /**
     * Add all current query string values to the paginator.
     *
     * @return $this
     */
    public function withQueryString()
    {
    }
    /**
     * Add a query string value to the paginator.
     *
     * @param  string  $key
     * @param  string  $value
     * @return $this
     */
    protected function addQuery($key, $value)
    {
    }
    /**
     * Build the full fragment portion of a URL.
     *
     * @return string
     */
    protected function buildFragment()
    {
    }
    /**
     * Load a set of relationships onto the mixed relationship collection.
     *
     * @param  string  $relation
     * @param  array  $relations
     * @return $this
     */
    public function loadMorph($relation, $relations)
    {
    }
    /**
     * Load a set of relationship counts onto the mixed relationship collection.
     *
     * @param  string  $relation
     * @param  array  $relations
     * @return $this
     */
    public function loadMorphCount($relation, $relations)
    {
    }
    /**
     * Get the slice of items being paginated.
     *
     * @return array
     */
    public function items()
    {
    }
    /**
     * Transform each item in the slice of items using a callback.
     *
     * @param  callable  $callback
     * @return $this
     */
    public function through(callable $callback)
    {
    }
    /**
     * Get the number of items shown per page.
     *
     * @return int
     */
    public function perPage()
    {
    }
    /**
     * Get the current cursor being paginated.
     *
     * @return \Illuminate\Pagination\Cursor|null
     */
    public function cursor()
    {
    }
    /**
     * Get the query string variable used to store the cursor.
     *
     * @return string
     */
    public function getCursorName()
    {
    }
    /**
     * Set the query string variable used to store the cursor.
     *
     * @param  string  $name
     * @return $this
     */
    public function setCursorName($name)
    {
    }
    /**
     * Set the base path to assign to all URLs.
     *
     * @param  string  $path
     * @return $this
     */
    public function withPath($path)
    {
    }
    /**
     * Set the base path to assign to all URLs.
     *
     * @param  string  $path
     * @return $this
     */
    public function setPath($path)
    {
    }
    /**
     * Get the base path for paginator generated URLs.
     *
     * @return string|null
     */
    public function path()
    {
    }
    /**
     * Resolve the current cursor or return the default value.
     *
     * @param  string  $cursorName
     * @return \Illuminate\Pagination\Cursor|null
     */
    public static function resolveCurrentCursor($cursorName = 'cursor', $default = null)
    {
    }
    /**
     * Set the current cursor resolver callback.
     *
     * @param  \Closure  $resolver
     * @return void
     */
    public static function currentCursorResolver(\Closure $resolver)
    {
    }
    /**
     * Get an instance of the view factory from the resolver.
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public static function viewFactory()
    {
    }
    /**
     * Get an iterator for the items.
     *
     * @return \ArrayIterator
     */
    #[\ReturnTypeWillChange]
    public function getIterator()
    {
    }
    /**
     * Determine if the list of items is empty.
     *
     * @return bool
     */
    public function isEmpty()
    {
    }
    /**
     * Determine if the list of items is not empty.
     *
     * @return bool
     */
    public function isNotEmpty()
    {
    }
    /**
     * Get the number of items for the current page.
     *
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function count()
    {
    }
    /**
     * Get the paginator's underlying collection.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getCollection()
    {
    }
    /**
     * Set the paginator's underlying collection.
     *
     * @param  \Illuminate\Support\Collection  $collection
     * @return $this
     */
    public function setCollection(\Illuminate\Support\Collection $collection)
    {
    }
    /**
     * Get the paginator options.
     *
     * @return array
     */
    public function getOptions()
    {
    }
    /**
     * Determine if the given item exists.
     *
     * @param  mixed  $key
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($key)
    {
    }
    /**
     * Get the item at the given offset.
     *
     * @param  mixed  $key
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($key)
    {
    }
    /**
     * Set the item at the given offset.
     *
     * @param  mixed  $key
     * @param  mixed  $value
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($key, $value)
    {
    }
    /**
     * Unset the item at the given key.
     *
     * @param  mixed  $key
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($key)
    {
    }
    /**
     * Render the contents of the paginator to HTML.
     *
     * @return string
     */
    public function toHtml()
    {
    }
    /**
     * Make dynamic calls into the collection.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
    }
    /**
     * Render the contents of the paginator when casting to a string.
     *
     * @return string
     */
    public function __toString()
    {
    }
}