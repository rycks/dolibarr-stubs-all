<?php

namespace Illuminate\Pagination;

class LengthAwarePaginator extends \Illuminate\Pagination\AbstractPaginator implements \Illuminate\Contracts\Support\Arrayable, \ArrayAccess, \Countable, \IteratorAggregate, \Illuminate\Contracts\Support\Jsonable, \JsonSerializable, \Illuminate\Contracts\Pagination\LengthAwarePaginator
{
    /**
     * The total number of items before slicing.
     *
     * @var int
     */
    protected $total;
    /**
     * The last available page.
     *
     * @var int
     */
    protected $lastPage;
    /**
     * Create a new paginator instance.
     *
     * @param  mixed  $items
     * @param  int  $total
     * @param  int  $perPage
     * @param  int|null  $currentPage
     * @param  array  $options  (path, query, fragment, pageName)
     * @return void
     */
    public function __construct($items, $total, $perPage, $currentPage = null, array $options = [])
    {
    }
    /**
     * Get the current page for the request.
     *
     * @param  int  $currentPage
     * @param  string  $pageName
     * @return int
     */
    protected function setCurrentPage($currentPage, $pageName)
    {
    }
    /**
     * Render the paginator using the given view.
     *
     * @param  string|null  $view
     * @param  array  $data
     * @return \Illuminate\Contracts\Support\Htmlable
     */
    public function links($view = null, $data = [])
    {
    }
    /**
     * Render the paginator using the given view.
     *
     * @param  string|null  $view
     * @param  array  $data
     * @return \Illuminate\Contracts\Support\Htmlable
     */
    public function render($view = null, $data = [])
    {
    }
    /**
     * Get the paginator links as a collection (for JSON responses).
     *
     * @return \Illuminate\Support\Collection
     */
    public function linkCollection()
    {
    }
    /**
     * Get the array of elements to pass to the view.
     *
     * @return array
     */
    protected function elements()
    {
    }
    /**
     * Get the total number of items being paginated.
     *
     * @return int
     */
    public function total()
    {
    }
    /**
     * Determine if there are more items in the data source.
     *
     * @return bool
     */
    public function hasMorePages()
    {
    }
    /**
     * Get the URL for the next page.
     *
     * @return string|null
     */
    public function nextPageUrl()
    {
    }
    /**
     * Get the last page.
     *
     * @return int
     */
    public function lastPage()
    {
    }
    /**
     * Get the instance as an array.
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
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
    }
}