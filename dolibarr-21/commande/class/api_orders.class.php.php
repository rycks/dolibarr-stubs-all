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
    public static $FIELDS = array('socid', 'date');
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
     * Return an array with order information
     *
     * @param       int         $id            ID of order
     * @param       int         $contact_list  0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id
     * @return	array|mixed data without useless information
     *
     * @throws	RestException
     */
    public function get($id, $contact_list = 1)
    {
    }
    /**
     * Get properties of an order object by ref
     *
     * Return an array with order information
     *
     * @param       string		$ref			Ref of object
     * @param       int         $contact_list  0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id
     * @return	array|mixed data without useless information
     *
     * @url GET    ref/{ref}
     *
     * @throws	RestException
     */
    public function getByRef($ref, $contact_list = 1)
    {
    }
    /**
     * Get properties of an order object by ref_ext
     *
     * Return an array with order information
     *
     * @param       string		$ref_ext			External reference of object
     * @param       int         $contact_list  0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id
     * @return	array|mixed data without useless information
     *
     * @url GET    ref_ext/{ref_ext}
     *
     * @throws	RestException
     */
    public function getByRefExt($ref_ext, $contact_list = 1)
    {
    }
    /**
     * Get properties of an order object
     *
     * Return an array with order information
     *
     * @param       int         $id				ID of order
     * @param		string		$ref			Ref of object
     * @param		string		$ref_ext		External reference of object
     * @param       int         $contact_list	0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id
     * @return		Object						Object with cleaned properties
     *
     * @throws	RestException
     */
    private function _fetch($id, $ref = '', $ref_ext = '', $contact_list = 1)
    {
    }
    /**
     * List orders
     *
     * Get a list of orders
     *
     * @param string		   $sortfield			Sort field
     * @param string		   $sortorder			Sort order
     * @param int			   $limit				Limit for list
     * @param int			   $page				Page number
     * @param string		   $thirdparty_ids		Thirdparty ids to filter orders of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string           $sqlfilterlines      Other criteria to filter answers separated by a comma. Syntax example "(tl.fk_product:=:'17') and (tl.price:<:'250')"
     * @param string		   $properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool             $pagination_data     If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @param int			   $loadlinkedobjects	Load also linked object
     * @return  array                               Array of order objects
     *
     * @throws RestException 404 Not found
     * @throws RestException 503 Error
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $sqlfilters = '', $sqlfilterlines = '', $properties = '', $pagination_data = \false, $loadlinkedobjects = 0)
    {
    }
    /**
     * Create a sale order
     *
     * Example: { "socid": 2, "date": 1595196000, "type": 0, "lines": [{ "fk_product": 2, "qty": 1 }] }
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
     * @return array
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
     * @param	int   $id             Id of order to update
     * @param	int   $lineid         Id of line to update
     * @param	array $request_data   OrderLine data
     * @return	Object|false		  Object with cleaned properties
     *
     * @url	PUT {id}/lines/{lineid}
     */
    public function putLine($id, $lineid, $request_data = \null)
    {
    }
    /**
     * Delete a line of a given order
     *
     * @param	int		$id             Id of order to update
     * @param	int		$lineid         Id of line to delete
     * @return	Object					Object with cleaned properties
     *
     * @url	DELETE {id}/lines/{lineid}
     *
     * @throws RestException 401
     * @throws RestException 404
     */
    public function deleteLine($id, $lineid)
    {
    }
    /**
     * Get contacts of given order
     *
     * Return an array with contact information
     *
     * @param	int		$id			ID of order
     * @param	string	$type		Type of the contact (BILLING, SHIPPING, CUSTOMER)
     * @return	Object				Object with cleaned properties
     *
     * @url	GET {id}/contacts
     *
     * @throws	RestException
     */
    public function getContacts($id, $type = '')
    {
    }
    /**
     * Add a contact type of given order
     *
     * @param int    $id             Id of order to update
     * @param int    $contactid      Id of contact to add
     * @param string $type           Type of the contact (BILLING, SHIPPING, CUSTOMER)
     * @return array
     *
     * @url	POST {id}/contact/{contactid}/{type}
     *
     * @throws RestException 401
     * @throws RestException 404
     */
    public function postContact($id, $contactid, $type)
    {
    }
    /**
     * Unlink a contact type of given order
     *
     * @param int    $id             Id of order to update
     * @param int    $contactid      Id of contact
     * @param string $type           Type of the contact (BILLING, SHIPPING, CUSTOMER).
     *
     * @url	DELETE {id}/contact/{contactid}/{type}
     *
     * @return array
     *
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function deleteContact($id, $contactid, $type)
    {
    }
    /**
     * Update order general fields (won't touch lines of order)
     *
     * @param	int		$id             Id of order to update
     * @param	array	$request_data   Datas
     * @return	Object					Object with cleaned properties
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
     * @return  Object              Object with cleaned properties
     *
     * @url POST    {id}/validate
     *
     * @throws RestException 304
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500 System error
     *
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
     * @throws RestException 304
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 405
     */
    public function reopen($id)
    {
    }
    /**
     * Classify the order as invoiced. Could be also called setbilled
     *
     * @param	int   $id           Id of the order
     * @return	Object					Object with cleaned properties
     *
     * @url     POST {id}/setinvoiced
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 405
     */
    public function setinvoiced($id)
    {
    }
    /**
     * Close an order (Classify it as "Delivered")
     *
     * @param   int     $id             Order ID
     * @param   int     $notrigger      Disabled triggers
     * @return	Object					Object with cleaned properties
     *
     * @url POST    {id}/close
     */
    public function close($id, $notrigger = 0)
    {
    }
    /**
     * Set an order to draft
     *
     * @param   int     $id             Order ID
     * @param   int		$idwarehouse    Warehouse ID to use for stock change (Used only if option STOCK_CALCULATE_ON_VALIDATE_ORDER is on)
     * @return	Object					Object with cleaned properties
     *
     * @url POST    {id}/settodraft
     */
    public function settodraft($id, $idwarehouse = -1)
    {
    }
    /**
     * Create an order using an existing proposal.
     *
     * @param int   $proposalid       Id of the proposal
     * @return	Object					Object with cleaned properties
     *
     * @url     POST /createfromproposal/{proposalid}
     *
     * @throws RestException 400
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 405
     */
    public function createOrderFromProposal($proposalid)
    {
    }
    /**
     * Get the shipments of an order
     *
     * @param int   $id       Id of the order
     *
     * @url     GET {id}/shipment
     *
     * @return array
     *
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function getOrderShipments($id)
    {
    }
    /**
     * Create the shipment of an order
     *
     * @param int   $id       Id of the order
     * @param int	$warehouse_id Id of a warehouse
     *
     * @url     POST {id}/shipment/{warehouse_id}
     *
     * @return int
     *
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function createOrderShipment($id, $warehouse_id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Object  $object			Object to clean
     * @return  Object					Object with cleaned properties
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