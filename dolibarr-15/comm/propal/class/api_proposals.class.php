<?php

/**
 * API class for orders
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Proposals extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    static $FIELDS = array('socid');
    /**
     * @var Propal $propal {@type Propal}
     */
    public $propal;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a commercial proposal object
     *
     * Return an array with commercial proposal informations
     *
     * @param       int         $id           ID of commercial proposal
     * @param       int         $contact_list 0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id
     * @return 	array|mixed data without useless information
     *
     * @throws 	RestException
     */
    public function get($id, $contact_list = 1)
    {
    }
    /**
     * Get properties of an proposal object by ref
     *
     * Return an array with proposal informations
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
     * Get properties of an proposal object by ref_ext
     *
     * Return an array with proposal informations
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
     * Get properties of an proposal object
     *
     * Return an array with proposal informations
     *
     * @param       int         $id             ID of order
     * @param		string		$ref			Ref of object
     * @param		string		$ref_ext		External reference of object
     * @param       int         $contact_list  0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id
     * @return 	array|mixed data without useless information
     *
     * @throws 	RestException
     */
    private function _fetch($id, $ref = '', $ref_ext = '', $contact_list = 1)
    {
    }
    /**
     * List commercial proposals
     *
     * Get a list of commercial proposals
     *
     * @param string	$sortfield	        Sort field
     * @param string	$sortorder	        Sort order
     * @param int		$limit		        Limit for list
     * @param int		$page		        Page number
     * @param string   	$thirdparty_ids	    Thirdparty ids to filter commercial proposals (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string    $sqlfilters         Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.datec:<:'20160101')"
     * @return  array                       Array of order objects
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $sqlfilters = '')
    {
    }
    /**
     * Create commercial proposal object
     *
     * @param   array   $request_data   Request data
     * @return  int     ID of proposal
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Get lines of a commercial proposal
     *
     * @param int   $id             Id of commercial proposal
     *
     * @url	GET {id}/lines
     *
     * @return int
     */
    public function getLines($id)
    {
    }
    /**
     * Add a line to given commercial proposal
     *
     * @param int   $id             Id of commercial proposal to update
     * @param array $request_data   Commercial proposal line data
     *
     * @url	POST {id}/lines
     *
     * @return int
     */
    public function postLine($id, $request_data = \null)
    {
    }
    /**
     * Update a line of given commercial proposal
     *
     * @param int   $id             Id of commercial proposal to update
     * @param int   $lineid         Id of line to update
     * @param array $request_data   Commercial proposal line data
     *
     * @url	PUT {id}/lines/{lineid}
     *
     * @return object
     */
    public function putLine($id, $lineid, $request_data = \null)
    {
    }
    /**
     * Delete a line of given commercial proposal
     *
     *
     * @param int   $id             Id of commercial proposal to update
     * @param int   $lineid         Id of line to delete
     *
     * @url	DELETE {id}/lines/{lineid}
     *
     * @return int
     *
     * @throws RestException 401
     * @throws RestException 404
     */
    public function deleteLine($id, $lineid)
    {
    }
    /**
     * Add a contact type of given commercial proposal
     *
     * @param int    $id             Id of commercial proposal to update
     * @param int    $contactid      Id of contact to add
     * @param string $type           Type of the contact (BILLING, SHIPPING, CUSTOMER)
     *
     * @url	POST {id}/contact/{contactid}/{type}
     *
     * @return int
     *
     * @throws RestException 401
     * @throws RestException 404
     */
    public function postContact($id, $contactid, $type)
    {
    }
    /**
     * Delete a contact type of given commercial proposal
     *
     * @param int    $id             Id of commercial proposal to update
     * @param int    $contactid      Row key of the contact in the array contact_ids.
     * @param string $type           Type of the contact (BILLING, SHIPPING, CUSTOMER).
     *
     * @url	DELETE {id}/contact/{contactid}/{type}
     *
     * @return int
     *
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function deleteContact($id, $contactid, $type)
    {
    }
    /**
     * Update commercial proposal general fields (won't touch lines of commercial proposal)
     *
     * @param int   $id             Id of commercial proposal to update
     * @param array $request_data   Datas
     *
     * @return int
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete commercial proposal
     *
     * @param   int     $id         Commercial proposal ID
     *
     * @return  array
     */
    public function delete($id)
    {
    }
    /**
     * Set a proposal to draft
     *
     * @param   int     $id             Order ID
     *
     * @url POST    {id}/settodraft
     *
     * @return  array
     */
    public function settodraft($id)
    {
    }
    /**
     * Validate a commercial proposal
     *
     * If you get a bad value for param notrigger check that ou provide this in body
     * {
     * "notrigger": 0
     * }
     *
     * @param   int     $id             Commercial proposal ID
     * @param   int     $notrigger      1=Does not execute triggers, 0= execute triggers
     *
     * @url POST    {id}/validate
     *
     * @throws RestException 304
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500 System error
     *
     * @return array
     */
    public function validate($id, $notrigger = 0)
    {
    }
    /**
     * Close (Accept or refuse) a quote / commercial proposal
     *
     * @param   int     $id             Commercial proposal ID
     * @param   int	    $status			Must be 2 (accepted) or 3 (refused)				{@min 2}{@max 3}
     * @param   string  $note_private   Add this mention at end of private note
     * @param   int     $notrigger      Disabled triggers
     *
     * @url POST    {id}/close
     *
     * @return  array
     */
    public function close($id, $status, $note_private = '', $notrigger = 0)
    {
    }
    /**
     * Set a commercial proposal billed. Could be also called setbilled
     *
     * @param   int     $id             Commercial proposal ID
     *
     * @url POST    {id}/setinvoiced
     *
     * @return  array
     */
    public function setinvoiced($id)
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
}