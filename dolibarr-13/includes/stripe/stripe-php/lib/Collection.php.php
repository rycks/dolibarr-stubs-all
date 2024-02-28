<?php

namespace Stripe;

/**
 * Class Collection
 *
 * @property string $object
 * @property string $url
 * @property bool $has_more
 * @property mixed $data
 *
 * @package Stripe
 */
class Collection extends \Stripe\StripeObject implements \IteratorAggregate
{
    const OBJECT_NAME = "list";
    use \Stripe\ApiOperations\Request;
    protected $_requestParams = [];
    /**
     * @return string The base URL for the given class.
     */
    public static function baseUrl()
    {
    }
    public function setRequestParams($params)
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
     * @return \ArrayIterator An iterator that can be used to iterate
     *    across objects in the current page.
     */
    public function getIterator()
    {
    }
    /**
     * @return Util\AutoPagingIterator An iterator that can be used to iterate
     *    across all objects across all pages. As page boundaries are
     *    encountered, the next page will be fetched automatically for
     *    continued iteration.
     */
    public function autoPagingIterator()
    {
    }
    private function extractPathAndUpdateParams($params)
    {
    }
}