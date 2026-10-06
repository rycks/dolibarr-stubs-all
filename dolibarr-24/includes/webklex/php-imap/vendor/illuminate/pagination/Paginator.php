<?php

namespace Illuminate\Pagination;

class Paginator extends \Illuminate\Pagination\AbstractPaginator implements \Illuminate\Contracts\Support\Arrayable, \ArrayAccess, \Countable, \IteratorAggregate, \Illuminate\Contracts\Support\Jsonable, \JsonSerializable, \Illuminate\Contracts\Pagination\Paginator
{
    /**
     * Determine if there are more items in the data source.
     *
     * @return bool
     */
    protected $hasMore;
    /**
     * Create a new paginator instance.
     *
     * @param  mixed  $items
     * @param  int  $perPage
     * @param  int|null  $currentPage
     * @param  array  $options  (path, query, fragment, pageName)
     * @return void
     */
    public function __construct($items, $perPage, $currentPage = null, array $options = [])
    {
    }
    /**
     * Get the current page for the request.
     *
     * @param  int  $currentPage
     * @return int
     */
    protected function setCurrentPage($currentPage)
    {
    }
    /**
     * Set the items for the paginator.
     *
     * @param  mixed  $items
     * @return void
     */
    protected function setItems($items)
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
     * Render the paginator using the given view.
     *
     * @param  string|null  $view
     * @param  array  $data
     * @return string
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
     * Manually indicate that the paginator does have more pages.
     *
     * @param  bool  $hasMore
     * @return $this
     */
    public function hasMorePagesWhen($hasMore = true)
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