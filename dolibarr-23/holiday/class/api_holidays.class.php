<?php

/**
 * API class for Leaves
 *
 * @since	23.0.0	Initial implementation
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Holidays extends \DolibarrApi
{
    /**
     * @var string[]	Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('fk_user', 'date_debut', 'date_fin');
    /**
     * @var Holiday {@type Holiday}
     */
    public $holiday;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get a leave
     *
     * Return an array with leave information
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id		ID of Leave
     * @return	Object			Object with cleaned properties
     *
     * @throws	RestException
     */
    public function get($id)
    {
    }
    /**
     * List leaves
     *
     * Get a list of Leaves
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	string		$sortfield			Sort field
     * @param	string		$sortorder			Sort order
     * @param	int			$limit				List limit
     * @param	int			$page				Page number
     * @param	string		$user_ids   		User ids filter field. Example: '1' or '1,2,3'          {@pattern /^[0-9,]*$/i}
     * @param	string		$sqlfilters 		Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param	string		$properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param	bool		$pagination_data	If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return	array<string,mixed>				Array of order objects
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $user_ids = '', $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create a leave
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	array	$request_data	Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	int						ID of Leave
     *
     * @throws RestException
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update expense report general fields
     *
     * Does not touch lines of the expense report
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id					Leave ID to update
     * @param	array	$request_data		Expense report data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	Object						Updated object
     *
     * @throws	RestException	401		Not allowed
     * @throws  RestException	404		Expense report not found
     * @throws	RestException	500		System error
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete holiday
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id		Leave Report ID
     * @return	array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     *
     * @throws RestException
     */
    public function delete($id)
    {
    }
    /**
     * Validate a holiday
     *
     * If you get a bad value for param notrigger check, provide this in body
     * {
     *   "notrigger": 0
     * }
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id				Leave report ID
     * @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *
     * @url		POST	{id}/validate
     *
     * @return	Object
     *
     * @throws RestException
     */
    public function validate($id, $notrigger = 0)
    {
    }
    /**
     * Approve a leave
     *
     * If you get a bad value for param notrigger check, provide this in body
     * {
     *   "notrigger": 0
     * }
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id				Leave ID
     * @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *
     * @url		POST	{id}/approve
     *
     * @return	Object
     *
     * @throws RestException
     */
    public function approve($id, $notrigger = 0)
    {
    }
    /**
     * Cancel a holiday
     *
     * If you get a bad value for param notrigger check, provide this in body
     * {
     *   "notrigger": 0
     * }
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id				Holiday ID
     * @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *
     * @url		POST	{id}/cancel
     *
     * @return	Object
     *
     * @throws RestException
     */
    public function cancel($id, $notrigger = 0)
    {
    }
    /**
     * Refuse a holiday
     *
     * If you get a bad value for param notrigger check, provide this in body
     * {
     *   "notrigger": 0
     * }
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id				Holiday ID
     * @param	string	$detail_refuse	Comments for refusal
     * @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *
     * @url		POST	{id}/refuse
     *
     * @return	Object
     *
     * @throws RestException
     */
    public function refuse($id, $detail_refuse, $notrigger = 0)
    {
    }
    /**
     * Reopen a canceled holiday
     *
     * This method allows to reopen a holiday that was previously canceled
     * and set its status back to VALIDATED
     *
     * If you get a bad value for param notrigger check, provide this in body
     * {
     *   "notrigger": 0
     * }
     *
     * @since   23.0.0   New endpoint
     *
     * @param   int     $id             Holiday ID
     * @param   int     $notrigger      1=Does not execute triggers, 0= execute triggers
     *
     * @url     POST    {id}/reopen
     *
     * @return  Object
     *
     * @throws RestException
     */
    public function reopen($id, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     * @phpstan-template T
     *
     * @param   Holiday  $object     Object to clean
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
     * @param ?array<string,string> $data   Array with data to verify
     * @return array<string,string>
     * @throws  RestException
     */
    private function _validate($data)
    {
    }
}