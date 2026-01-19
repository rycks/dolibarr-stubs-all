<?php

/**
 * API class for warehouses
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Warehouses extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    static $FIELDS = array('label');
    /**
     * @var Entrepot $warehouse {@type Entrepot}
     */
    public $warehouse;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a warehouse object
     *
     * Return an array with warehouse informations
     *
     * @param 	int 	$id ID of warehouse
     * @return 	array|mixed data without useless information
     *
     * @throws 	RestException
     */
    public function get($id)
    {
    }
    /**
     * List warehouses
     *
     * Get a list of warehouses
     *
     * @param string	$sortfield	Sort field
     * @param string	$sortorder	Sort order
     * @param int		$limit		Limit for list
     * @param int		$page		Page number
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.label:like:'WH-%') and (t.date_creation:<:'20160101')"
     * @return array                Array of warehouse objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '')
    {
    }
    /**
     * Create warehouse object
     *
     * @param array $request_data   Request data
     * @return int  ID of warehouse
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update warehouse
     *
     * @param int   $id             Id of warehouse to update
     * @param array $request_data   Datas
     * @return int
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete warehouse
     *
     * @param int $id   Warehouse ID
     * @return array
     */
    public function delete($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Entrepot  $object    Object to clean
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
}