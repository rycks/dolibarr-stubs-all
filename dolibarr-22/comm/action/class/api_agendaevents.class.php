<?php

/**
 * API class for Agenda Events
 *
 * @since	5.0.0	Initial implementation
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class AgendaEvents extends \DolibarrApi
{
    /**
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('userownerid', 'type_code');
    /**
     * @var ActionComm {@type ActionActionCom}
     */
    public $actioncomm;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get agenda event
     *
     * Return an array with agenda event information
     *
     * @since	5.0.0	Initial implementation
     *
     * @param	int			$id			ID of Agenda Event to get
     * @return	Object					Object with cleaned properties
     *
     * @throws	RestException
     */
    public function get($id)
    {
    }
    /**
     * List agenda events
     *
     * Get a list of agenda events
     *
     * @since	5.0.0	Initial implementation
     * @since	21.0.0	Added data pagination
     *
     * @param	string	$sortfield			Sort field
     * @param	string	$sortorder			Sort order
     * @param	int		$limit				Limit for list
     * @param	int		$page				Page number
     * @param	string	$user_ids			User ids filter field (owners of event). Example: '1' or '1,2,3'          {@pattern /^[0-9,]*$/i}
     * @param	string	$sqlfilters			Other criteria to filter answers separated by a comma. Syntax example "(t.label:like:'%dol%') and (t.datec:<:'20160101')"
     * @param	string	$properties			Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param	bool	$pagination_data	If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return	array						Array of order objects
     * @phan-return ActionComm[]|array{data:ActionComm[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     * @phpstan-return ActionComm[]|array{data:ActionComm[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     *
     * @throws RestException
     */
    public function index($sortfield = "t.id", $sortorder = 'ASC', $limit = 100, $page = 0, $user_ids = '', $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create an agenda event
     *
     * @since	5.0.0	Initial implementation
     *
     * @param	array	$request_data	Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	int						ID of Agenda Event
     *
     * @throws RestException
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update an agenda event
     *
     * @since	11.0.0	Initial implementation
     *
     * @param	int			$id				ID of Agenda Event to update
     * @param	array		$request_data	Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	Object|false				Object with cleaned properties
     *
     * @throws RestException
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete an agenda event
     *
     * @since	5.0.0	Initial implementation
     *
     * @param	int		$id		ID of Agenda Event to delete
     *
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
     * Validate fields before create or update object
     *
     * @param ?array<string,string> $data   Array with data to verify
     * @return array<string,string>
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