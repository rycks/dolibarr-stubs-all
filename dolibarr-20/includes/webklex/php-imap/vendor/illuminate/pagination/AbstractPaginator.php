<?php

namespace Illuminate\Pagination;

/**
 * @mixin \Illuminate\Support\Collection
 */
abstract class AbstractPaginator implements \Illuminate\Contracts\Support\Htmlable
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
     * The current page being "viewed".
     *
     * @var int
     */
    protected $currentPage;
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
     * The query string variable used to store the page.
     *
     * @var string
     */
    protected $pageName = 'page';
    /**
     * The number of links to display on each side of current page link.
     *
     * @var int
     */
    public $onEachSide = 3;
    /**
     * The paginator options.
     *
     * @var array
     */
    protected $options;
    /**
     * The current path resolver callback.
     *
     * @var \Closure
     */
    protected static $currentPathResolver;
    /**
     * The current page resolver callback.
     *
     * @var \Closure
     */
    protected static $currentPageResolver;
    /**
     * The query string resolver callback.
     *
     * @var \Closure
     */
    protected static $queryStringResolver;
    /**
     * The view factory resolver callback.
     *
     * @var \Closure
     */
    protected static $viewFactoryResolver;
    /**
     * The default pagination view.
     *
     * @var string
     */
    public static $defaultView = 'pagination::tailwind';
    /**
     * The default "simple" pagination view.
     *
     * @var string
     */
    public static $defaultSimpleView = 'pagination::simple-tailwind';
    /**
     * Determine if the given value is a valid page number.
     *
     * @param  int  $page
     * @return bool
     */
    protected function isValidPageNumber($page)
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
     * Create a range of pagination URLs.
     *
     * @param  int  $start
     * @param  int  $end
     * @return array
     */
    public function getUrlRange($start, $end)
    {
    }
    /**
     * Get the URL for a given page number.
     *
     * @param  int  $page
     * @return string
     */
    public function url($page)
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
     * Get the number of the first item in the slice.
     *
     * @return int
     */
    public function firstItem()
    {
    }
    /**
     * Get the number of the last item in the slice.
     *
     * @return int
     */
    public function lastItem()
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
     * Determine if there are enough items to split into multiple pages.
     *
     * @return bool
     */
    public function hasPages()
    {
    }
    /**
     * Determine if the paginator is on the first page.
     *
     * @return bool
     */
    public function onFirstPage()
    {
    }
    /**
     * Determine if the paginator is on the last page.
     *
     * @return bool
     */
    public function onLastPage()
    {
    }
    /**
     * Get the current page.
     *
     * @return int
     */
    public function currentPage()
    {
    }
    /**
     * Get the query string variable used to store the page.
     *
     * @return string
     */
    public function getPageName()
    {
    }
    /**
     * Set the query string variable used to store the page.
     *
     * @param  string  $name
     * @return $this
     */
    public function setPageName($name)
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
     * Set the number of links to display on each side of current page link.
     *
     * @param  int  $count
     * @return $this
     */
    public function onEachSide($count)
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
     * Resolve the current request path or return the default value.
     *
     * @param  string  $default
     * @return string
     */
    public static function resolveCurrentPath($default = '/')
    {
    }
    /**
     * Set the current request path resolver callback.
     *
     * @param  \Closure  $resolver
     * @return void
     */
    public static function currentPathResolver(\Closure $resolver)
    {
    }
    /**
     * Resolve the current page or return the default value.
     *
     * @param  string  $pageName
     * @param  int  $default
     * @return int
     */
    public static function resolveCurrentPage($pageName = 'page', $default = 1)
    {
    }
    /**
     * Set the current page resolver callback.
     *
     * @param  \Closure  $resolver
     * @return void
     */
    public static function currentPageResolver(\Closure $resolver)
    {
    }
    /**
     * Resolve the query string or return the default value.
     *
     * @param  string|array|null  $default
     * @return string
     */
    public static function resolveQueryString($default = null)
    {
    }
    /**
     * Set with query string resolver callback.
     *
     * @param  \Closure  $resolver
     * @return void
     */
    public static function queryStringResolver(\Closure $resolver)
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
     * Set the view factory resolver callback.
     *
     * @param  \Closure  $resolver
     * @return void
     */
    public static function viewFactoryResolver(\Closure $resolver)
    {
    }
    /**
     * Set the default pagination view.
     *
     * @param  string  $view
     * @return void
     */
    public static function defaultView($view)
    {
    }
    /**
     * Set the default "simple" pagination view.
     *
     * @param  string  $view
     * @return void
     */
    public static function defaultSimpleView($view)
    {
    }
    /**
     * Indicate that Tailwind styling should be used for generated links.
     *
     * @return void
     */
    public static function useTailwind()
    {
    }
    /**
     * Indicate that Bootstrap 4 styling should be used for generated links.
     *
     * @return void
     */
    public static function useBootstrap()
    {
    }
    /**
     * Indicate that Bootstrap 3 styling should be used for generated links.
     *
     * @return void
     */
    public static function useBootstrapThree()
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