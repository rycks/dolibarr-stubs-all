<?php

namespace Webklex\PHPIMAP\Support;

/**
 * Class PaginatedCollection
 *
 * @package Webklex\PHPIMAP\Support
 */
class PaginatedCollection extends \Illuminate\Support\Collection
{
    /**
     * Number of total entries
     *
     * @var int $total
     */
    protected $total;
    /**
     * Paginate the current collection.
     * @param int      $per_page
     * @param int|null $page
     * @param string   $page_name
     * @param boolean  $prepaginated
     *
     * @return LengthAwarePaginator
     */
    public function paginate($per_page = 15, $page = null, $page_name = 'page', $prepaginated = false)
    {
    }
    /**
     * Create a new length-aware paginator instance.
     * @param  array    $items
     * @param  int      $total
     * @param  int      $per_page
     * @param  int|null $current_page
     * @param  array    $options
     *
     * @return LengthAwarePaginator
     */
    protected function paginator($items, $total, $per_page, $current_page, array $options)
    {
    }
    /**
     * Get and set the total amount
     * @param null $total
     *
     * @return int|null
     */
    public function total($total = null)
    {
    }
}