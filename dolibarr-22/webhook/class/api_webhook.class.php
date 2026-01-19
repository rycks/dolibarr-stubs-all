<?php

/**
 * API class for webhooks
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user}
 */
class Webhook extends \DolibarrApi
{
    /**
     * @var string[]       Mandatory fields, checked when we create and update the object
     */
    public static $FIELDS = array('url', 'trigger_codes');
    /**
     * @var Target {@type Target}
     */
    public $target;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a target object
     *
     * Return an array with target information
     *
     * @param	int		$id				Id of target to load
     * @return  Object					Object with cleaned properties
     *
     * @throws	RestException
     */
    public function get($id)
    {
    }
    /**
     * List targets
     *
     * Get a list of targets
     *
     * @param   string  $sortfield  Sort field
     * @param   string  $sortorder  Sort order
     * @param   int     $limit      Limit for list
     * @param   int     $page       Page number
     * @param   string  $sqlfilters Other criteria to filter answers separated by a comma. Syntax example "((t.nom:like:'TheCompany%') or (t.name_alias:like:'TheCompany%')) and (t.datec:<:'20160101')"
     * @param   string  $properties	Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool $pagination_data If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return  array               Array of target objects
     * @phan-return Target[]|array{data:Target[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     * @phpstan-return Target[]|array{data:Target[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create target object
     *
     * @param array $request_data   Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return int  ID of target
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update target
     *
     * @param 	int   			$id             Id of target to update
     * @param 	array 			$request_data   Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	Object|false					Updated object
     *
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete target
     *
     * @param int $id   Target ID
     * @return array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     */
    public function delete($id)
    {
    }
    /**
     * Get the list of all available triggers
     *
     * @return array
     * @phan-return array<string,string>
     * @phpstan-return array<string,string>
     *
     * @url GET triggers
     */
    public function listOfTriggers()
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Object  $object     Object to clean
     * @return  Object				Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Fetch properties of a target object.
     *
     * Return an array with target information
     *
     * @param    int	$rowid      Id of target party to load (Use 0 to get a specimen record, use null to use other search criteria)
     * @param    string	$ref        Reference of target party, name (Warning, this can return several records)
     * @return object cleaned target object
     *
     * @throws RestException
     */
    private function _fetch($rowid, $ref = '')
    {
    }
}