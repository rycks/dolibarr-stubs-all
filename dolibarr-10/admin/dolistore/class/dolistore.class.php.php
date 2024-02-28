<?php

/**
 * Class Dolistore
 */
class Dolistore
{
    /**
     * beginning of pagination
     * @var int
     */
    public $start;
    /**
     * end of pagination
     * @var int
     */
    public $end;
    public $per_page;
    // pagination: display per page
    public $categorie;
    // the current categorie
    public $search;
    // the search keywords
    // setups
    public $url;
    // the url of this page
    public $shop_url;
    // the url of the shop
    public $lang;
    // the integer representing the lang in the store
    public $debug_api;
    // usefull if no dialog
    /**
     * Constructor
     *
     * @param	boolean		$debug		Enable debug of request on screen
     */
    public function __construct($debug = \false)
    {
    }
    /**
     * Load data from remote Dolistore market place.
     * This fills ->categories
     *
     * @return	void
     */
    public function getRemoteCategories()
    {
    }
    /**
     * Load data from remote Dolistore market place.
     * This fills ->products
     *
     * @param 	array 	$options	Options. If 'categorie' is defined, we filter products on this category id
     * @return	void
     */
    public function getRemoteProducts($options = array('start' => 0, 'end' => 10, 'per_page' => 50, 'categorie' => 0, 'search' => ''))
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return tree of Dolistore categories. $this->categories must have been loaded before.
     *
     * @param 	int			$parent		Id of parent category
     * @return 	string
     */
    public function get_categories($parent = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of product formated for output
     *
     * @return string			HTML output
     */
    public function get_products()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * get previous link
     *
     * @param   string    $text     symbol previous
     * @return  string              html previous link
     */
    public function get_previous_link($text = '<<')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * get next link
     *
     * @param   string    $text     symbol next
     * @return  string              html next link
     */
    public function get_next_link($text = '>>')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * get previous url
     *
     * @return string    previous url
     */
    public function get_previous_url()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * get next url
     *
     * @return string    next url
     */
    public function get_next_url()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * version compare
     *
     * @param   string  $v1     version 1
     * @param   string  $v2     version 2
     * @return int              result of compare
     */
    public function version_compare($v1, $v2)
    {
    }
}