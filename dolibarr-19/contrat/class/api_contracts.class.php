<?php

/**
 * API class for contracts
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Contracts extends \DolibarrApi
{
    /**
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('socid', 'date_contrat', 'commercial_signature_id', 'commercial_suivi_id');
    /**
     * @var Contrat $contract {@type Contrat}
     */
    public $contract;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a contract object
     *
     * Return an array with contract informations
     *
     * @param   int         $id         ID of contract
     * @return  Object					Object with cleaned properties
     * @throws	RestException
     */
    public function get($id)
    {
    }
    /**
     * List contracts
     *
     * Get a list of contracts
     *
     * @param string		   $sortfield			Sort field
     * @param string		   $sortorder			Sort order
     * @param int			   $limit				Limit for list
     * @param int			   $page				Page number
     * @param string		   $thirdparty_ids		Thirdparty ids to filter contracts of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string		   $properties			Restrict the data returned to theses properties. Ignored if empty. Comma separated list of properties names
     * @return  array                               Array of contract objects
     *
     * @throws RestException 404 Not found
     * @throws RestException 503 Error
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Create contract object
     *
     * @param   array   $request_data   Request data
     * @return  int     ID of contrat
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Get lines of a contract
     *
     * @param int   $id             Id of contract
     *
     * @url	GET {id}/lines
     *
     * @return array
     */
    public function getLines($id)
    {
    }
    /**
     * Add a line to given contract
     *
     * @param int   $id             Id of contrat to update
     * @param array $request_data   Contractline data
     *
     * @url	POST {id}/lines
     *
     * @return int|bool
     */
    public function postLine($id, $request_data = \null)
    {
    }
    /**
     * Update a line to given contract
     *
     * @param int   $id             Id of contrat to update
     * @param int   $lineid         Id of line to update
     * @param array $request_data   Contractline data
     *
     * @url	PUT {id}/lines/{lineid}
     *
     * @return Object|bool
     */
    public function putLine($id, $lineid, $request_data = \null)
    {
    }
    /**
     * Activate a service line of a given contract
     *
     * @param int		$id             Id of contract to activate
     * @param int		$lineid         Id of line to activate
     * @param string	$datestart		{@from body}  Date start        {@type timestamp}
     * @param string    $dateend		{@from body}  Date end          {@type timestamp}
     * @param string    $comment		{@from body}  Comment
     *
     * @url	PUT {id}/lines/{lineid}/activate
     *
     * @return Object|bool
     */
    public function activateLine($id, $lineid, $datestart, $dateend = \null, $comment = \null)
    {
    }
    /**
     * Unactivate a service line of a given contract
     *
     * @param int		$id             Id of contract to activate
     * @param int		$lineid         Id of line to activate
     * @param string	$datestart		{@from body}  Date start        {@type timestamp}
     * @param string    $comment		{@from body}  Comment
     *
     * @url	PUT {id}/lines/{lineid}/unactivate
     *
     * @return Object|bool
     */
    public function unactivateLine($id, $lineid, $datestart, $comment = \null)
    {
    }
    /**
     * Delete a line to given contract
     *
     *
     * @param int   $id             Id of contract to update
     * @param int   $lineid         Id of line to delete
     *
     * @url	DELETE {id}/lines/{lineid}
     *
     * @return array|mixed
     *
     * @throws RestException 401
     * @throws RestException 404
     */
    public function deleteLine($id, $lineid)
    {
    }
    /**
     * Update contract general fields (won't touch lines of contract)
     *
     * @param int   $id             Id of contract to update
     * @param array $request_data   Datas
     *
     * @return array|mixed
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete contract
     *
     * @param   int     $id         Contract ID
     *
     * @return  array
     */
    public function delete($id)
    {
    }
    /**
     * Validate a contract
     *
     * @param   int $id             Contract ID
     * @param   int $notrigger      1=Does not execute triggers, 0= execute triggers
     *
     * @url POST    {id}/validate
     *
     * @return  array
     * FIXME An error 403 is returned if the request has an empty body.
     * Error message: "Forbidden: Content type `text/plain` is not supported."
     * Workaround: send this in the body
     * {
     *   "notrigger": 0
     * }
     */
    public function validate($id, $notrigger = 0)
    {
    }
    /**
     * Close all services of a contract
     *
     * @param   int $id             Contract ID
     * @param   int $notrigger      1=Does not execute triggers, 0= execute triggers
     *
     * @url POST    {id}/close
     *
     * @return  array
     * FIXME An error 403 is returned if the request has an empty body.
     * Error message: "Forbidden: Content type `text/plain` is not supported."
     * Workaround: send this in the body
     * {
     *   "notrigger": 0
     * }
     */
    public function close($id, $notrigger = 0)
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
     * @param   array           $data   Array with data to verify
     * @return  array
     * @throws  RestException
     */
    private function _validate($data)
    {
    }
}