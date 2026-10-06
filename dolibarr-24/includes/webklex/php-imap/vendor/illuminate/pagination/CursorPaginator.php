<?php

namespace Illuminate\Pagination;

class CursorPaginator extends \Illuminate\Pagination\AbstractCursorPaginator implements \Illuminate\Contracts\Support\Arrayable, \ArrayAccess, \Countable, \IteratorAggregate, \Illuminate\Contracts\Support\Jsonable, \JsonSerializable, \Illuminate\Contracts\Pagination\CursorPaginator
{
    /**
     * Indicates whether there are more items in the data source.
     *
     * @return bool
     */
    protected $hasMore;
    /**
     * Create a new paginator instance.
     *
     * @param  mixed  $items
     * @param  int  $perPage
     * @param  \Illuminate\Pagination\Cursor|null  $cursor
     * @param  array  $options  (path, query, fragment, pageName)
     * @return void
     */
    public function __construct($items, $perPage, $cursor = null, array $options = [])
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
     * Determine if there are more items in the data source.
     *
     * @return bool
     */
    public function hasMorePages()
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