<?php

/**
 * API class for warehouses
 *
 * @since	5.0.0	Initial implementation
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
     * @since	5.0.0	Initial implementation
     *
     * @param	int		$id				ID of warehouse
     * @return	Object					Object with cleaned properties
     *
     * @url	GET {id}
     *
     * @throws RestException 400 Bad Request
     * @throws RestException 403 Not allowed
     * @throws RestException 404 Not found
     */
    public function get($id)
    {
    }
    /**
     * List warehouses
     *
     * Get a list of warehouses
     *
     * @since	4.0.0	Initial implementation
     * @since	23.0.0	Data pagination
     *
     * @param string	$sortfield			Sort field
     * @param string	$sortorder			Sort order
     * @param int		$limit				Limit for list
     * @param int		$page				Page number
     * @param int		$category			Use this param to filter list by category
     * @param string	$sqlfilters			Other criteria to filter answers separated by a comma. Syntax example "(t.label:like:'WH-%') and (t.date_creation:<:'20160101')"
     * @param string	$properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool		$pagination_data	If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return array						Array of warehouse objects
     * @phan-return Entrepot[]
     * @phpstan-return Entrepot[]
     *
     * @url	GET
     *
     * @throws RestException 400 Bad Request
     * @throws RestException 403 Not allowed
     * @throws RestException 500 Internal Server Error
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $category = 0, $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create a warehouse
     *
     * @since	5.0.0	Initial implementation
     *
     * @param array $request_data   Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return int  ID of warehouse
     *
     * @url	POST
     *
     * @throws RestException 400 Bad Request
     * @throws RestException 403 Not allowed
     * @throws RestException 500 Internal Server Error
     *
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update a warehouse
     *
     * @since	5.0.0	Initial implementation
     *
     * @param	int 	$id					ID of warehouse to update
     * @param	array	$request_data		Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	Object						Updated object
     *
     * @url	PUT {id}
     *
     * @throws RestException 400 Bad Request
     * @throws RestException 403 Not allowed
     * @throws RestException 404 Not found
     * @throws RestException 500 Internal Server Error
     *
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete a warehouse
     *
     * @since	5.0.0	Initial implementation
     *
     * @param	int		$id		Warehouse ID
     * @return	array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @url	DELETE {id}
     *
     * @throws RestException 400 Bad Request
     * @throws RestException 403 Not allowed
     * @throws RestException 404 Not found
     * @throws RestException 500 Internal Server Error
     *
     */
    public function delete($id)
    {
    }
    /**
     * List products in a warehouse
     *
     * Get a list of products for a warehouse
     *
     * @since	23.0.0	Initial implementation
     *
     * @param 	int		$id					warehouse ID {@min 1} {@from body} {@required true}
     * @param	string	$sortfield			Sort field
     * @param	string	$sortorder			Sort order
     * @param	int		$limit				Limit for list
     * @param	int		$page				Page number
     * @param	int		$includestockdata	1=Load also information about stock (slower), 0=No stock data (faster) (default)
     * @param	bool	$includesubproducts	Load information about subproducts
     * @param	bool	$includeparentid	Load also ID of parent product (if product is a variant of a parent product)
     * @param	bool	$includetrans		Load also the translations of product label and description
     * @param	string	$properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param	bool	$pagination_data	If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0
     * @return	array	 					Array of product in warehouse
     *
     * @phan-return Product[]
     * @phpstan-return Product[]
     *
     * @url GET /{id}/products
     *
     * @throws RestException 400 Bad Request
     * @throws RestException 403 Not allowed
     * @throws RestException 404 Not found
     * @throws RestException 500 Internal Server Error
     *
     */
    public function listProducts($id = 0, $sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $includestockdata = 0, $includesubproducts = \false, $includeparentid = \false, $includetrans = \false, $properties = '', $pagination_data = \false)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     * @phpstan-template T
     *
     * @param   Entrepot  $object   Object to clean
     * @return  Object              Object with cleaned properties
     * @phpstan-param T $object
     * @phpstan-return T
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
     * @throws RestException 400 Bad Request
     */
    private function _validate($data)
    {
    }
}