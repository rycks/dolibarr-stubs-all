<?php

/**
 * API class for supplier orders
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class SupplierOrders extends \DolibarrApi
{
    /**
     *
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('socid');
    /**
     * @var CommandeFournisseur $order {@type CommandeFournisseur}
     */
    public $order;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a supplier order object
     *
     * Return an array with supplier order information
     *
     * @param 	int 	$id ID of supplier order
     * @return 	array|mixed data without useless information
     *
     * @throws 	RestException
     */
    public function get($id)
    {
    }
    /**
     * List orders
     *
     * Get a list of supplier orders
     *
     * @param string	$sortfield	      Sort field
     * @param string	$sortorder	      Sort order
     * @param int		$limit		      Limit for list
     * @param int		$page		      Page number
     * @param string   	$thirdparty_ids	  Thirdparty ids to filter orders of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string   	$product_ids	  Product ids to filter orders of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string	$status		      Filter by order status : draft | validated | approved | running | received_start | received_end | cancelled | refused
     * @param string    $sqlfilters       Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.datec:<:'20160101')"
     * @return array                      Array of order objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $product_ids = '', $status = '', $sqlfilters = '')
    {
    }
    /**
     * Create supplier order object
     *
     * Example: {"ref": "auto", "ref_supplier": "1234", "socid": "1", "multicurrency_code": "SEK", "multicurrency_tx": 1, "tva_tx": 25, "note": "Imported via the REST API"}
     *
     * @param array $request_data   Request datas
     * @return int  ID of supplier order
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update supplier order
     *
     * @param int   $id             Id of supplier order to update
     * @param array $request_data   Datas
     * @return int
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete supplier order
     *
     * @param int   	$id 	Supplier order ID
     * @return array			Array of result
     */
    public function delete($id)
    {
    }
    /**
     * Validate an order
     *
     * @param   int $id             Order ID
     * @param   int $idwarehouse    Warehouse ID
     * @param   int $notrigger      1=Does not execute triggers, 0= execute triggers
     *
     * @url POST    {id}/validate
     *
     * @return  array
     * FIXME An error 403 is returned if the request has an empty body.
     * Error message: "Forbidden: Content type `text/plain` is not supported."
     * Workaround: send this in the body
     * {
     *   "idwarehouse": 0,
     *   "notrigger": 0
     * }
     */
    public function validate($id, $idwarehouse = 0, $notrigger = 0)
    {
    }
    /**
     * Approve an order
     *
     * @param   int $id             Order ID
     * @param   int $idwarehouse    Warehouse ID
     * @param   int $secondlevel      1=Does not execute triggers, 0= execute triggers
     *
     * @url POST    {id}/approve
     *
     * @return  array
     * FIXME An error 403 is returned if the request has an empty body.
     * Error message: "Forbidden: Content type `text/plain` is not supported."
     * Workaround: send this in the body
     * {
     *   "idwarehouse": 0,
     *   "secondlevel": 0
     * }
     */
    public function approve($id, $idwarehouse = 0, $secondlevel = 0)
    {
    }
    /**
     * Sends an order to the vendor
     *
     * @param   int		$id             Order ID
     * @param   integer	$date		Date (unix timestamp in sec)
     * @param   int		$method		Method
     * @param  string	$comment	Comment
     *
     * @url POST    {id}/makeorder
     *
     * @return  array
     * FIXME An error 403 is returned if the request has an empty body.
     * Error message: "Forbidden: Content type `text/plain` is not supported."
     * Workaround: send this in the body
     * {
     *   "date": 0,
     *   "method": 0,
     *   "comment": ""
     * }
     */
    public function makeOrder($id, $date, $method, $comment = '')
    {
    }
    /**
     * Receives the order, dispatches products.
     *
     * Example:
     * <code> {
     *   "closeopenorder": 1,
     *   "comment": "",
     *   "lines": [{
     *      "id": 14,
     *      "fk_product": 112,
     *      "qty": 18,
     *      "warehouse": 1,
     *      "price": 114,
     *      "comment": "",
     *      "eatby": 0,
     *      "sellby": 0,
     *      "batch": 0,
     *      "notrigger": 0
     *   }]
     * }</code>
     *
     * @param   int		$id             Order ID
     * @param   integer	$closeopenorder	Close order if everything is received {@required false}
     * @param   string	$comment	Comment {@required false}
     * @param   array	$lines		Array of product dispatches
     *
     * @url POST    {id}/receive
     *
     * @return  array
     * FIXME An error 403 is returned if the request has an empty body.
     * Error message: "Forbidden: Content type `text/plain` is not supported."
     *
     */
    public function receiveOrder($id, $closeopenorder, $comment, $lines)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Object  $object     Object to clean
     * @return  Object              Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param array $data   Datas to validate
     * @return array
     *
     * @throws RestException
     */
    private function _validate($data)
    {
    }
}