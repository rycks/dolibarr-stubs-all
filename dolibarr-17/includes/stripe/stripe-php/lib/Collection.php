<?php

namespace Stripe;

/**
 * Class Collection.
 *
 * @property string $object
 * @property string $url
 * @property bool $has_more
 * @property \Stripe\StripeObject[] $data
 */
class Collection extends \Stripe\StripeObject implements \Countable, \IteratorAggregate
{
    const OBJECT_NAME = 'list';
    use \Stripe\ApiOperations\Request;
    /** @var array */
    protected $filters = [];
    /**
     * @return string the base URL for the given class
     */
    public static function baseUrl()
    {
    }
    /**
     * Returns the filters.
     *
     * @return array the filters
     */
    public function getFilters()
    {
    }
    /**
     * Sets the filters, removing paging options.
     *
     * @param array $filters the filters
     */
    public function setFilters($filters)
    {
    }
    public function offsetGet($k)
    {
    }
    public function all($params = null, $opts = null)
    {
    }
    public function create($params = null, $opts = null)
    {
    }
    public function retrieve($id, $params = null, $opts = null)
    {
    }
    /**
     * @return int the number of objects in the current page
     */
    public function count()
    {
    }
    /**
     * @return \ArrayIterator an iterator that can be used to iterate
     *    across objects in the current page
     */
    public function getIterator()
    {
    }
    /**
     * @return \ArrayIterator an iterator that can be used to iterate
     *    backwards across objects in the current page
     */
    public function getReverseIterator()
    {
    }
    /**
     * @return \Generator|StripeObject[] A generator that can be used to
     *    iterate across all objects across all pages. As page boundaries are
     *    encountered, the next page will be fetched automatically for
     *    continued iteration.
     */
    public function autoPagingIterator()
    {
    }
    /**
     * Returns an empty collection. This is returned from {@see nextPage()}
     * when we know that there isn't a next page in order to replicate the
     * behavior of the API when it attempts to return a page beyond the last.
     *
     * @param null|array|string $opts
     *
     * @return Collection
     */
    public static function emptyCollection($opts = null)
    {
    }
    /**
     * Returns true if the page object contains no element.
     *
     * @return bool
     */
    public function isEmpty()
    {
    }
    /**
     * Fetches the next page in the resource list (if there is one).
     *
     * This method will try to respect the limit of the current page. If none
     * was given, the default limit will be fetched again.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Collection
     */
    public function nextPage($params = null, $opts = null)
    {
    }
    /**
     * Fetches the previous page in the resource list (if there is one).
     *
     * This method will try to respect the limit of the current page. If none
     * was given, the default limit will be fetched again.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Collection
     */
    public function previousPage($params = null, $opts = null)
    {
    }
    /**
     * Gets the first item from the current page. Returns `null` if the current page is empty.
     *
     * @return null|\Stripe\StripeObject
     */
    public function first()
    {
    }
    /**
     * Gets the last item from the current page. Returns `null` if the current page is empty.
     *
     * @return null|\Stripe\StripeObject
     */
    public function last()
    {
    }
    private function extractPathAndUpdateParams($params)
    {
    }
}