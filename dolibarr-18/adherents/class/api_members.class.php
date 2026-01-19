<?php

/**
 * API class for members
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Members extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('morphy', 'typeid');
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a member object
     *
     * Return an array with member informations
     *
     * @param   int     $id 			ID of member
     * @return  Object              	Object with cleaned properties
     *
     * @throws  RestException
     */
    public function get($id)
    {
    }
    /**
     * Get properties of a member object by linked thirdparty
     *
     * Return an array with member informations
     *
     * @param     int     $thirdparty 	ID of third party
     *
     * @return Object 					Data without useless information
     *
     * @url GET thirdparty/{thirdparty}
     *
     * @throws RestException 401
     * @throws RestException 404
     */
    public function getByThirdparty($thirdparty)
    {
    }
    /**
     * Get properties of a member object by linked thirdparty email
     *
     * Return an array with member informations
     *
     * @param  string $email            Email of third party
     *
     * @return Object 					Data without useless information
     *
     * @url GET thirdparty/email/{email}
     *
     * @throws RestException 401
     * @throws RestException 404
     */
    public function getByThirdpartyEmail($email)
    {
    }
    /**
     * Get properties of a member object by linked thirdparty barcode
     *
     * Return an array with member informations
     *
     * @param  string $barcode      	Barcode of third party
     *
     * @return Object 					Data without useless information
     *
     * @url GET thirdparty/barcode/{barcode}
     *
     * @throws RestException 401
     * @throws RestException 404
     */
    public function getByThirdpartyBarcode($barcode)
    {
    }
    /**
     * List members
     *
     * Get a list of members
     *
     * @param string    $sortfield  Sort field
     * @param string    $sortorder  Sort order
     * @param int       $limit      Limit for list
     * @param int       $page       Page number
     * @param string    $typeid     ID of the type of member
     * @param int    	$category   Use this param to filter list by category
     * @param string    $sqlfilters Other criteria to filter answers separated by a comma.
     *                              Example: "(t.ref:like:'SO-%') and ((t.date_creation:<:'20160101') or (t.nature:is:NULL))"
     * @return array                Array of member objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $typeid = '', $category = 0, $sqlfilters = '')
    {
    }
    /**
     * Create member object
     *
     * @param array $request_data   Request data
     * @return int  ID of member
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update member
     *
     * @param int   $id             ID of member to update
     * @param array $request_data   Datas
     * @return Object				Updated object
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete member
     *
     * @param int $id   member ID
     * @return array
     */
    public function delete($id)
    {
    }
    /**
     * Validate fields before creating an object
     *
     * @param array|null    $data   Data to validate
     * @return array
     *
     * @throws RestException
     */
    private function _validate($data)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Object  $object    Object to clean
     * @return  Object    Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * List subscriptions of a member
     *
     * Get a list of subscriptions
     *
     * @param int $id ID of member
     * @return array Array of subscription objects
     *
     * @throws RestException
     *
     * @url GET {id}/subscriptions
     */
    public function getSubscriptions($id)
    {
    }
    /**
     * Add a subscription for a member
     *
     * @param int 		$id             ID of member
     * @param string 	$start_date     Start date {@from body} {@type timestamp}
     * @param string 	$end_date       End date {@from body} {@type timestamp}
     * @param float 	$amount         Amount (may be 0) {@from body}
     * @param string 	$label         	Label {@from body}
     * @return int  ID of subscription
     *
     * @url POST {id}/subscriptions
     */
    public function createSubscription($id, $start_date, $end_date, $amount, $label = '')
    {
    }
    /**
     * Get categories for a member
     *
     * @param int		$id         ID of member
     * @param string		$sortfield	Sort field
     * @param string		$sortorder	Sort order
     * @param int		$limit		Limit for list
     * @param int		$page		Page number
     *
     * @return mixed
     *
     * @url GET {id}/categories
     */
    public function getCategories($id, $sortfield = "s.rowid", $sortorder = 'ASC', $limit = 0, $page = 0)
    {
    }
}