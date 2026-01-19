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
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('socid', 'date_contrat', 'commercial_signature_id', 'commercial_suivi_id');
    /**
     * @var Contrat {@type Contrat}
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
     * Return an array with contract information
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
     * @param string		   $properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool             $pagination_data     If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return  array                               Array of order objects
     * @phan-return Contrat[]|array{data:Contrat[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     * @phpstan-return Contrat[]|array{data:Contrat[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     *
     * @throws RestException 404 Not found
     * @throws RestException 503 Error
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create contract object
     *
     * @param   array   $request_data   Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return  int     ID of contrat
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Get lines of a contract
     *
     * @param int   	$id             	Id of contract
     * @param string 	$sortfield			Sort field
     * @param string	$sortorder			Sort order
     * @param int		$limit				Limit for list
     * @param int		$page				Page number
     * @param string	$sqlfilters			Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string 	$properties 		Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool 		$pagination_data 	If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return array						Array of contrat det objects
     * @phan-return ContratLigne[]
     * @phpstan-return ContratLigne[]
     *
     * @url	GET {id}/lines
     *
     * @throws RestException 404 Not Found
     * @throws RestException 503 Error
     */
    public function getLines($id, $sortfield = "d.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Add a line to given contract
     *
     * @param int   $id             Id of contrat to update
     * @param array $request_data   Contractline data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
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
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
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
     * @param 	int   	$id             	Id of contract to update
     * @param 	array 	$request_data   	Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	Object						Updated object
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
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
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
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
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
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
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
     * @param ?array<string,string> $data   Array with data to verify
     * @return array<string,string>
     * @throws  RestException
     */
    private function _validate($data)
    {
    }
}