<?php

/**
 * API class for categories
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Categories extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    static $FIELDS = array('label', 'type');
    static $TYPES = array(0 => 'product', 1 => 'supplier', 2 => 'customer', 3 => 'member', 4 => 'contact', 5 => 'account');
    /**
     * @var Categorie $category {@type Categorie}
     */
    public $category;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a category object
     *
     * Return an array with category informations
     *
     * @param 	int 	$id ID of category
     * @return 	array|mixed data without useless information
     *
     * @throws 	RestException
     */
    public function get($id)
    {
    }
    /**
     * List categories
     *
     * Get a list of categories
     *
     * @param string	$sortfield	Sort field
     * @param string	$sortorder	Sort order
     * @param int		$limit		Limit for list
     * @param int		$page		Page number
     * @param string	$type		Type of category ('member', 'customer', 'supplier', 'product', 'contact')
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @return array                Array of category objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $type = '', $sqlfilters = '')
    {
    }
    /**
     * Create category object
     *
     * @param array $request_data   Request data
     * @return int  ID of category
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update category
     *
     * @param int   $id             Id of category to update
     * @param array $request_data   Datas
     * @return int
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete category
     *
     * @param int $id   Category ID
     * @return array
     */
    public function delete($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Categorie  $object    Object to clean
     * @return    array    Array of cleaned object properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param array|null    $data    Data to validate
     * @return array
     *
     * @throws RestException
     */
    private function _validate($data)
    {
    }
    /**
     * Get the list of objects in a category.
     *
     * @param int        $id         ID of category
     * @param string     $type       Type of category ('member', 'customer', 'supplier', 'product', 'contact')
     * @param int        $onlyids    Return only ids of objects (consume less memory)
     *
     * @return mixed
     *
     * @url GET {id}/objects
     */
    public function getObjects($id, $type, $onlyids = 0)
    {
    }
}