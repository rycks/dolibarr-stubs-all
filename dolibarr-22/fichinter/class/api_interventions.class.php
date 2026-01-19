<?php

/**
 * API class for Interventions
 *
 * @since	7.0.0	Initial implementation
 *
 * @access	protected
 * @class	DolibarrApiAccess {@requires user,external}
 */
class Interventions extends \DolibarrApi
{
    /**
     * @var string[]	Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('socid', 'fk_project', 'description');
    /**
     * @var string[]	Mandatory fields, checked when create and update object
     */
    public static $FIELDSLINE = array('description', 'date', 'duration');
    /**
     * @var Fichinter {@type fichinter}
     */
    public $fichinter;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get an intervention
     * Return an array with intervention information
     *
     * @since	7.0.0	Initial implementation
     *
     * @param	int			$id				ID of intervention
     * @param	string		$ref			Ref of object
     * @param	string		$ref_ext		External reference of object
     * @param   int         $contact_list	0: Returned array of contacts/addresses contains all properties, 1: Return array contains just id, -1: Do not return contacts/adddesses
     * @return	Object						Cleaned intervention object
     *
     * @throws		RestException
     */
    public function get($id, $ref = '', $ref_ext = '', $contact_list = 1)
    {
    }
    /**
     * List interventions
     *
     * Get a list of interventions
     *
     * @since	7.0.0	Initial implementation
     *
     * @param	string	$sortfield				Sort field
     * @param	string	$sortorder				Sort order
     * @param	int		$limit					Limit for list
     * @param	int		$page					Page number
     * @param	string	$thirdparty_ids			Thirdparty ids to filter orders of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param	string	$sqlfilters				Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param	string	$properties				Restrict the data returned to these properties. Ignored if empty. Comma separated list of property names
     * @param	string	$contact_type			Type of contacts: thirdparty, internal or external
     * @param	bool	$pagination_data		If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return	array							Array of order objects
     * @phan-return array<object>
     * @phpstan-return array<object>
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $sqlfilters = '', $properties = '', $contact_type = '', $pagination_data = \false)
    {
    }
    /**
     * Create an intervention
     *
     * @since	7.0.0	Initial implementation
     *
     * @param			array	$request_data	Request data
     * @phan-param		?array<string,string>	$request_data
     * @phpstan-param	?array<string,string>	$request_data
     * @return			int						ID of created intervention
     *
     * @throws RestException
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Update intervention general fields (won't touch lines of fichinter)
     *
     * @since	22.0.0	Initial implementation
     *
     * @param			int		$id				ID of fichinter to update
     * @param			array	$request_data	Request data
     * @phan-param		?array<string,string>	$request_data
     * @phpstan-param	?array<string,string>	$request_data
     * @return			Object					Updated object
     *
     * @throws RestException
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Get lines of intervention
     *
     * @param int   $id             Id of intervention
     *
     * @url	GET {id}/lines
     *
     * @return int
     */
    /* TODO
    	public function getLines($id)
    	{
    		if(! DolibarrApiAccess::$user->hasRight('ficheinter', 'lire')) {
    			throw new RestException(403);
    		}
    
    		$result = $this->fichinter->fetch($id);
    		if( ! $result ) {
    			throw new RestException(404, 'Intervention not found');
    		}
    
    		if( ! DolibarrApi::_checkAccessToResource('fichinter',$this->fichinter->id)) {
    			throw new RestException(403, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
    		}
    		$this->fichinter->getLinesArray();
    		$result = array();
    		foreach ($this->fichinter->lines as $line) {
    			array_push($result,$this->_cleanObjectDatas($line));
    		}
    		return $result;
    	}
    	*/
    /**
     * Add a line to an intervention
     *
     * @since	7.0.0	Initial implementation
     *
     * @param			int		$id				ID of intervention to update
     * @param			array	$request_data	Request data
     * @phan-param		?array<string,string>	$request_data
     * @phpstan-param	?array<string,string>	$request_data
     *
     * @url		POST	{id}/lines
     *
     * @return	int		0 if ok, <0 if ko
     *
     * @throws RestException
     */
    public function postLine($id, $request_data = \null)
    {
    }
    /**
     * Delete an intervention
     *
     * @since	8.0.0	Initial implementation
     *
     * @param	int		$id		Intervention ID
     * @return	array
     * @phan-return array<string,array{code:int,message:string}>
     * @phpstan-return array<string,array{code:int,message:string}>
     *
     * @throws RestException
     */
    public function delete($id)
    {
    }
    /**
     * Reopen an intervention
     *
     * @since	22.0.0	Initial implementation
     *
     * @param	int		$id		Intervention ID
     *
     * @url		POST	{id}/reopen
     *
     * @return	Object
     *
     * @throws	RestException
     */
    public function reopen($id)
    {
    }
    /**
     * Validate an intervention
     *
     * If you get a bad value for param notrigger check, provide this in body
     * {
     *   "notrigger": 0
     * }
     *
     * @since	7.0.0	Initial implementation
     *
     * @param	int		$id				Intervention ID
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
     * Close an intervention
     *
     * @since	7.0.0	Initial implementation
     *
     * @param	int		$id		Intervention ID
     *
     * @url		POST	{id}/close
     *
     * @return	Object
     *
     * @throws RestException
     */
    public function closeFichinter($id)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param ?array<null|int|float|string> $data   Data to validate
     * @return array<string,null|int|float|string>
     *
     * @throws RestException
     */
    private function _validate($data)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object data
     *
     * @param	Object	$object		Object to clean
     * @return	Object				Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param ?array<string,null|int|float|string>   $data   Data to validate
     * @return array<string,null|int|float|string>          Return array with validated mandatory fields and their value
     *
     * @throws RestException
     */
    private function _validateLine($data)
    {
    }
}