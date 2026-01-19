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
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('label');
    /**
     * @var Entrepot {@type Entrepot}
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
     * Return an array with warehouse information
     *
     * @param	int		$id				ID of warehouse
     * @return  Object					Object with cleaned properties
     *
     * @throws	RestException
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
     * @param  int    $category   Use this param to filter list by category
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "(t.label:like:'WH-%') and (t.date_creation:<:'20160101')"
     * @param string    $properties	Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return array                Array of warehouse objects
     * @phan-return Entrepot[]
     * @phpstan-return Entrepot[]
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $category = 0, $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Create warehouse object
     *
     * @param array $request_data   Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return int  ID of warehouse
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update warehouse
     *
     * @param 	int   	$id             	Id of warehouse to update
     * @param 	array 	$request_data   	Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	Object						Updated object
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete warehouse
     *
     * @param int $id   Warehouse ID
     * @return array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     */
    public function delete($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Entrepot  $object   Object to clean
     * @return  Object              Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param ?array<string,string> $data   Data to validate
     * @return array<string,string>
     *
     * @throws RestException
     */
    private function _validate($data)
    {
    }
}