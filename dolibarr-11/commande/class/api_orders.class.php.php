<?php

/**
 * API class for orders
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Orders extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    static $FIELDS = array('socid');
    /**
     * @var Commande $commande {@type Commande}
     */
    public $commande;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of an order object by id
     *
     * Return an array with order informations
     *
     * @param       int         $id            ID of order
     * @param       int         $contact_list  0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id
     * @return 	array|mixed data without useless information
     *
     * @throws 	RestException
     */
    public function get($id, $contact_list = 1)
    {
    }
    /**
     * Get properties of an order object by ref
     *
     * Return an array with order informations
     *
     * @param       string		$ref			Ref of object
     * @param       int         $contact_list  0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id
     * @return 	array|mixed data without useless information
     *
     * @url GET    ref/{ref}
     *
     * @throws 	RestException
     */
    public function getByRef($ref, $contact_list = 1)
    {
    }
    /**
     * Get properties of an order object by ref_ext
     *
     * Return an array with order informations
     *
     * @param       string		$ref_ext			External reference of object
     * @param       int         $contact_list  0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id
     * @return 	array|mixed data without useless information
     *
     * @url GET    ref_ext/{ref_ext}
     *
     * @throws 	RestException
     */
    public function getByRefExt($ref_ext, $contact_list = 1)
    {
    }
    /**
     * Get properties of an order object
     *
     * Return an array with order informations
     *
     * @param       int         $id            ID of order
     * @param		string		$ref			Ref of object
     * @param		string		$ref_ext		External reference of object
     * @param		string		$ref_int		Internal reference of other objec
     * @param       int         $contact_list  0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id
     * @return 	array|mixed data without useless information
     *
     * @throws 	RestException
     */
    private function _fetch($id, $ref = '', $ref_ext = '', $ref_int = '', $contact_list = 1)
    {
    }
    /**
     * List orders
     *
     * Get a list of orders
     *
     * @param string	       $sortfield	        Sort field
     * @param string	       $sortorder	        Sort order
     * @param int		       $limit		        Limit for list
     * @param int		       $page		        Page number
     * @param string   	       $thirdparty_ids	    Thirdparty ids to filter orders of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @return  array                               Array of order objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $sqlfilters = '')
    {
    }
    /**
     * Create order object
     *
     * @param   array   $request_data   Request data
     * @return  int     ID of order
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Get lines of an order
     *
     * @param int   $id             Id of order
     *
     * @url	GET {id}/lines
     *
     * @return int
     */
    public function getLines($id)
    {
    }
    /**
     * Add a line to given order
     *
     * @param int   $id             Id of order to update
     * @param array $request_data   OrderLine data
     *
     * @url	POST {id}/lines
     *
     * @return int
     */
    public function postLine($id, $request_data = \null)
    {
    }
    /**
     * Update a line to given order
     *
     * @param int   $id             Id of order to update
     * @param int   $lineid         Id of line to update
     * @param array $request_data   OrderLine data
     *
     * @url	PUT {id}/lines/{lineid}
     *
     * @return array|bool
     */
    public function putLine($id, $lineid, $request_data = \null)
    {
    }
    /**
     * Delete a line to given order
     *
     *
     * @param int   $id             Id of order to update
     * @param int   $lineid         Id of line to delete
     *
     * @url	DELETE {id}/lines/{lineid}
     *
     * @return int
     * @throws 401
     * @throws 404
     */
    public function deleteLine($id, $lineid)
    {
    }
    /**
     * Add a contact type of given order
     *
     * @param int    $id             Id of order to update
     * @param int    $contactid      Id of contact to add
     * @param string $type           Type of the contact (BILLING, SHIPPING, CUSTOMER)
     *
     * @url	POST {id}/contact/{contactid}/{type}
     *
     * @return int
     * @throws 401
     * @throws 404
     */
    public function postContact($id, $contactid, $type)
    {
    }
    /**
     * Delete a contact type of given order
     *
     * @param int    $id             Id of order to update
     * @param int    $rowid          Row key of the contact in the array contact_ids.
     *
     * @url	DELETE {id}/contact/{rowid}
     *
     * @return int
     * @throws 401
     * @throws 404
     * @throws 500
     */
    public function deleteContact($id, $rowid)
    {
    }
    /**
     * Update order general fields (won't touch lines of order)
     *
     * @param int   $id             Id of order to update
     * @param array $request_data   Datas
     *
     * @return int
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete order
     *
     * @param   int     $id         Order ID
     * @return  array
     */
    public function delete($id)
    {
    }
    /**
     * Validate an order
     *
     * If you get a bad value for param notrigger check, provide this in body
     * {
     *   "idwarehouse": 0,
     *   "notrigger": 0
     * }
     *
     * @param   int $id             Order ID
     * @param   int $idwarehouse    Warehouse ID
     * @param   int $notrigger      1=Does not execute triggers, 0= execute triggers
     *
     * @url POST    {id}/validate
     *
     * @throws 304
     * @throws 401
     * @throws 404
     * @throws 500
     *
     * @return  array
     */
    public function validate($id, $idwarehouse = 0, $notrigger = 0)
    {
    }
    /**
     *  Tag the order as validated (opened)
     *
     *  Function used when order is reopend after being closed.
     *
     * @param int   $id       Id of the order
     *
     * @url     POST {id}/reopen
     *
     * @return int
     *
     * @throws 304
     * @throws 400
     * @throws 401
     * @throws 404
     * @throws 405
     */
    public function reopen($id)
    {
    }
    /**
     * Classify the order as invoiced. Could be also called setbilled
     *
     * @param int   $id           Id of the order
     *
     * @url     POST {id}/setinvoiced
     *
     * @return int
     *
     * @throws 400
     * @throws 401
     * @throws 404
     * @throws 405
     */
    public function setinvoiced($id)
    {
    }
    /**
     * Close an order (Classify it as "Delivered")
     *
     * @param   int     $id             Order ID
     * @param   int     $notrigger      Disabled triggers
     *
     * @url POST    {id}/close
     *
     * @return  int
     */
    public function close($id, $notrigger = 0)
    {
    }
    /**
     * Set an order to draft
     *
     * @param   int     $id             Order ID
     * @param   int 	$idwarehouse    Warehouse ID to use for stock change (Used only if option STOCK_CALCULATE_ON_VALIDATE_ORDER is on)
     *
     * @url POST    {id}/settodraft
     *
     * @return  array
     */
    public function settodraft($id, $idwarehouse = -1)
    {
    }
    /**
     * Create an order using an existing proposal.
     *
     *
     * @param int   $proposalid       Id of the proposal
     *
     * @url     POST /createfromproposal/{proposalid}
     *
     * @return int
     * @throws 400
     * @throws 401
     * @throws 404
     * @throws 405
     */
    public function createOrderFromProposal($proposalid)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   object  $object    Object to clean
     * @return    array    Array of cleaned object properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param   array           $data   Array with data to verify
     * @return  array
     * @throws  RestException
     */
    private function _validate($data)
    {
    }
}