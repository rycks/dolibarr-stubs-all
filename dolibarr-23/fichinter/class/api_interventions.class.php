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
     * @param	int		$loadlinkedobjects		Load also linked objects
     * @return	array							Array of order objects
     * @phan-return array<object>
     * @phpstan-return array<object>
     *
     * @throws RestException
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $sqlfilters = '', $properties = '', $contact_type = '', $pagination_data = \false, $loadlinkedobjects = 0)
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
     * If you get a bad value for param notrigger check, provide this in body
     *  {
     *    "notrigger": 0
     *  }
     *
     * @since	7.0.0	Initial implementation
     * @since	23.0.0	Added notrigger parameter
     *
     * @param	int		$id				Intervention ID
     * @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers {@required true}
     *
     * @url		POST	{id}/close
     *
     * @return	Object
     *
     * @throws RestException
     *
     */
    public function close($id, $notrigger = 0)
    {
    }
    /**
     * Delete the line of the interventional.
     *
     * @param int $id ID of the interventional
     * @param int $lineid ID of the line to delete
     * @return  Object						Object with cleaned properties
     *
     * @throws RestException
     *
     * @url DELETE /{id}/lines/{lineid}
     */
    public function deleteInterventionalLine($id, $lineid)
    {
    }
    /**
     * Sets an intervention as draft
     *
     * @since	23.0.0	Initial implementation
     *
     * @param	int		$id			ID of intervention
     *
     * @return	Object				Object with cleaned properties
     *
     * @url		POST	{id}/settodraft
     *
     * @throws RestException 304
     * @throws RestException 403
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function settodraft($id)
    {
    }
    /**
     * Adds a contact to an interventional
     *
     * @param   int		$id					Order ID
     * @param   int		$fk_socpeople			Id of thirdparty contact (if source = 'external') or id of user (if source = 'internal') to link
     * @param   string	$type_contact           Type of contact (code). Must a code found into table llx_c_type_contact. For example: BILLING
     * @param   string  $source					external=Contact extern (llx_socpeople), internal=Contact intern (llx_user)
     * @param   int     $notrigger              Disable all triggers
     *
     * @url POST    {id}/contacts
     *
     * @return  object
     *
     * @throws RestException 304
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function addContact($id, $fk_socpeople, $type_contact, $source, $notrigger = 0)
    {
    }
    /**
     * Get contacts of given interventional
     *
     * Return an array with contact information
     *
     * @param	int					$id			ID of interventional
     * @param	string				$type		Type of the interventional
     * @return	array<int,mixed>				Object with cleaned properties
     *
     * @url	GET {id}/contacts
     *
     * @throws	RestException
     */
    public function getContacts($id, $type = '')
    {
    }
    /**
     * Delete a contact type of given interventional
     *
     * @param	int    				$id             Id of interventional to update
     * @param	int    				$contactid      Row key of the contact in the array contact_ids.
     * @param	string 				$type           Type of the contact (BILLING, SHIPPING, CUSTOMER).
     * @return	Object								Object deleted
     *
     * @url	DELETE {id}/contact/{contactid}/{type}
     *
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function deleteContact($id, $contactid, $type)
    {
    }
    /**
     * update the line of the interventional.
     *
     * @param	int   $id             Id of order to update
     * @param	int   $lineid         Id of line to update
     * @param	array $request_data   InternventionalLine data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return	Object		  Object with cleaned properties
     *
     * @throws RestException
     *
     * @url PUT /{id}/lines/{lineid}
     */
    public function updateInterventionalLine($id, $lineid, $request_data)
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
     * @phpstan-template T
     *
     * @param	Object	$object		Object to clean
     * @return	Object				Object with cleaned properties
     * @phpstan-param T $object
     * @phpstan-return T
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