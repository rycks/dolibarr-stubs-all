<?php

/**
 * API class for projects
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Projects extends \DolibarrApi
{
    /**
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('ref', 'title');
    /**
     * @var Project {@type Project}
     */
    public $project;
    /**
     * @var Task {@type Task}
     */
    public $task;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Get properties of a project object
     *
     * Return an array with project information
     *
     * @param   int         $id         ID of project
     * @return  Object					Object with cleaned properties
     *
     * @throws	RestException
     */
    public function get($id)
    {
    }
    /**
     * Get properties of a project object
     *
     * Return an array with project information
     *
     * @param	string	$ref			Ref of project
     * @return  Object					Object with cleaned properties
     *
     * @url GET ref/{ref}
     *
     * @throws	RestException
     */
    public function getByRef($ref)
    {
    }
    /**
     * Get properties of a project object
     *
     * Return an array with project information
     *
     * @param	string	$ref_ext			Ref_Ext of project
     * @return  Object					Object with cleaned properties
     *
     * @url GET ref_ext/{ref_ext}
     *
     * @throws	RestException
     */
    public function getByRefExt($ref_ext)
    {
    }
    /**
     * Get properties of a project object
     *
     * Return an array with project information
     *
     * @param	string	$email_msgid	Email msgid of project
     * @return  Object					Object with cleaned properties
     *
     * @url GET email_msgid/{email_msgid}
     *
     * @throws	RestException
     */
    public function getByMsgId($email_msgid)
    {
    }
    /**
     * List projects
     *
     * Get a list of projects
     *
     * @param string		   $sortfield			Sort field
     * @param string		   $sortorder			Sort order
     * @param int			   $limit				Limit for list
     * @param int			   $page				Page number
     * @param string		   $thirdparty_ids		Thirdparty ids to filter projects of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param  int    $category   Use this param to filter list by category
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string    $properties	Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool             $pagination_data     If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return  array                               Array of project objects
     * @phan-return array{data:Project[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     * @phpstan-return array{data:Project[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $category = 0, $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    /**
     * Create project object
     *
     * @param   array   $request_data   Request data
     * @phan-param array<string,mixed> $request_data
     * @phpstan-param array<string,mixed> $request_data
     * @return  int     ID of project
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Adds a contact to an project
     *
     * @param   int		$id					project ID
     * @param   int		$fk_socpeople		Id of thirdparty contact (if source = 'external') or id of user (if source = 'internal') to link
     * @param   string	$type_contact       Type of contact (code). Must a code found into table llx_c_type_contact. For example: BILLING
     * @param   string  $source				external=Contact extern (llx_socpeople), internal=Contact intern (llx_user)
     * @param   int     $notrigger          Disable all triggers
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
     * Delete a contact type of given project
     *
     * @param	int    $id             Id of project to update
     * @param	int    $contactid      Row key of the contact in the array contact_ids.
     * @param	string $type           Type of the contact (BILLING, SHIPPING, CUSTOMER).
     * @return	Object				   Object with cleaned properties
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
     * Get tasks of a project.
     * See also API /tasks
     *
     * @param int   $id                     Id of project
     * @param int   $includetimespent       0=Return only list of tasks. 1=Include a summary of time spent, 2=Include details of time spent lines
     * @return array
     * @phan-return Object[]
     * @phpstan-return Object[]
     *
     * @url	GET {id}/tasks
     */
    public function getLines($id, $includetimespent = 0)
    {
    }
    /**
     * Get roles a user is assigned to a project with
     *
     * @param   int   $id             Id of project
     * @param   int   $userid         Id of user (0 = connected user)
     * @return array
     * @phan-return Object[]
     * @phpstan-return Object[]
     *
     * @url	GET {id}/roles
     */
    public function getRoles($id, $userid = 0)
    {
    }
    /**
     * Add a task to given project
     *
     * @param int   $id             Id of project to update
     * @param array $request_data   Projectline data
     * @phan-param array<string,mixed> $request_data
     * @phpstan-param array<string,mixed> $request_data
     *
     * @url	POST {id}/tasks
     *
     * @return int
     */
    /*
    public function postLine($id, $request_data = null)
    {
    	if(! DolibarrApiAccess::$user->hasRight('projet', 'creer')) {
    		throw new RestException(403);
    	}
    
    	$result = $this->project->fetch($id);
    	if( ! $result ) {
    		throw new RestException(404, 'Project not found');
    	}
    
    	if( ! DolibarrApi::_checkAccessToResource('project',$this->project->id)) {
    		throw new RestException(403, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
    	}
    
    	$request_data = (object) $request_data;
    
    	$request_data->desc = sanitizeVal($request_data->desc, 'restricthtml');
    
    	$updateRes = $this->project->addline(
    					$request_data->desc,
    					$request_data->subprice,
    					$request_data->qty,
    					$request_data->tva_tx,
    					$request_data->localtax1_tx,
    					$request_data->localtax2_tx,
    					$request_data->fk_product,
    					$request_data->remise_percent,
    					$request_data->info_bits,
    					$request_data->fk_remise_except,
    					'HT',
    					0,
    					$request_data->date_start,
    					$request_data->date_end,
    					$request_data->product_type,
    					$request_data->rang,
    					$request_data->special_code,
    					$fk_parent_line,
    					$request_data->fk_fournprice,
    					$request_data->pa_ht,
    					$request_data->label,
    					$request_data->array_options,
    					$request_data->fk_unit,
    					$this->element,
    					$request_data->id
    	);
    
    	if ($updateRes > 0) {
    		return $updateRes;
    
    	}
    	return false;
    }
    */
    /**
     * Update a task to given project
     *
     * @param int   $id             Id of project to update
     * @param int   $taskid         Id of task to update
     * @param array $request_data   Projectline data
     * @phan-param array<string,mixed> $request_data
     * @phpstan-param array<string,mixed> $request_data
     *
     * @url	PUT {id}/tasks/{taskid}
     *
     * @return object
     */
    /*
    	public function putLine($id, $lineid, $request_data = null)
    	{
    		if(! DolibarrApiAccess::$user->hasRight('projet', 'creer')) {
    			throw new RestException(403);
    		}
    
    		$result = $this->project->fetch($id);
    		if( ! $result ) {
    			throw new RestException(404, 'Project not found');
    		}
    
    		if( ! DolibarrApi::_checkAccessToResource('project',$this->project->id)) {
    			throw new RestException(403, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
    		}
    
    		$request_data = (object) $request_data;
    
    		$request_data->desc = sanitizeVal($request_data->desc, 'restricthtml');
    
    		$updateRes = $this->project->updateline(
    						$lineid,
    						$request_data->desc,
    						$request_data->subprice,
    						$request_data->qty,
    						$request_data->remise_percent,
    						$request_data->tva_tx,
    						$request_data->localtax1_tx,
    						$request_data->localtax2_tx,
    						'HT',
    						$request_data->info_bits,
    						$request_data->date_start,
    						$request_data->date_end,
    						$request_data->product_type,
    						$request_data->fk_parent_line,
    						0,
    						$request_data->fk_fournprice,
    						$request_data->pa_ht,
    						$request_data->label,
    						$request_data->special_code,
    						$request_data->array_options,
    						$request_data->fk_unit
    		);
    
    		if ($updateRes > 0) {
    			$result = $this->get($id);
    			unset($result->line);
    			return $this->_cleanObjectDatas($result);
    		}
    		return false;
    	}*/
    /**
     * Update project general fields (won't touch lines of project)
     *
     * @param 	int   	$id             	Id of project to update
     * @param 	array 	$request_data   	Datas
     * @phan-param ?array<string,mixed> $request_data
     * @phpstan-param ?array<string,mixed> $request_data
     * @return 	Object						Updated object
     * @phan-return Object|false
     * @phpstan-return Object|false
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete project
     *
     * @param   int     $id         Project ID
     *
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     */
    public function delete($id)
    {
    }
    /**
     * Validate a project.
     * You can test this API with the following input message
     * { "notrigger": 0 }
     *
     * @param   int $id             Project ID
     * @param   int $notrigger      1=Does not execute triggers, 0= execute triggers
     * @phan-param int<0,1> $notrigger
     * @phpstan-param int<0,1> $notrigger
     *
     * @url POST    {id}/validate
     *
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
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
     * Get all timespent
     *
     * @param string		   $sortfield			Sort field
     * @param string		   $sortorder			Sort order
     * @param int			   $limit				Limit for list
     * @param int			   $page				Page number
     * @param string		   $thirdparty_ids		Thirdparty ids to filter projects of (example '1' or '1,2,3') {@pattern /^[0-9,]*$/i}
     * @param  int    		   $category   		Use this param to filter list by category
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string    	   $properties		Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @param bool             $pagination_data     If this parameter is set to true the response will include pagination data. Default value is false. Page starts from 0*
     * @return  array                               Array of project objects
     * @phan-return array{data:Project[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     * @phpstan-return array{data:Project[],pagination:array{total:int,page:int,page_count:int,limit:int}}
     * @url	GET /alltimespent
     */
    public function listTimespent($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $category = 0, $sqlfilters = '', $properties = '', $pagination_data = \false)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     * @phpstan-template T
     *
     * @param   Object  $object     Object to clean
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
     * @param   array<string,mixed>	$data   Array with data to verify
     * @return  array<string,mixed>
     * @throws  RestException
     */
    private function _validate($data)
    {
    }
    /**
     * Get contacts of given project
     *
     * Return an array with contact information
     *
     * @param int    $id     ID of project
     * @param string $type   Type of the contact
     * @return array<int,mixed>         Array with cleaned properties
     *
     * @url GET {id}/contacts
     *
     * @throws RestException
     */
    public function getContacts($id, $type = '')
    {
    }
    /**
     * Adds a contact to a project
     *
     * @param int    $id             Project ID
     * @param int    $fk_socpeople   Id of thirdparty contact (if source = 'external') or id of user (if source = 'internal') to link
     * @param string $type_contact   Type of contact (code). Must a code found into table llx_c_type_contact. For example: BILLING
     * @param string $source         external=Contact extern (llx_socpeople), internal=Contact intern (llx_user)
     * @param int    $notrigger      Disable all triggers
     * @param int[]		$affect_to_tasks	Array of task IDs to also add the contact to (empty array = all tasks, null = no tasks)
     *
     * @url POST {id}/contacts
     *
     * @return object
     *
     * @throws RestException 304
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function addToContact($id, $fk_socpeople, $type_contact, $source, $notrigger = 0, $affect_to_tasks = \null)
    {
    }
    /**
     * Delete a contact type of given project
     *
     * @param int    $id         Id of project to update
     * @param int    $contactid  Row key of the contact in the array contact_ids.
     * @param string $type       Type of the contact (BILLING, SHIPPING, CUSTOMER).
     * @return Object            Object with cleaned properties
     *
     * @url DELETE {id}/contact/{contactid}/{type}
     *
     * @throws RestException 401
     * @throws RestException 404
     * @throws RestException 500 System error
     */
    public function deleteToContact($id, $contactid, $type)
    {
    }
    /**
     * Get timespent of a project (from all its tasks)
     *
     * @param int   $id         ID of project
     * @return array<int,mixed>            Array of timespent objects
     *
     * @url GET {id}/timespent
     *
     * @throws RestException
     */
    public function getTimespent($id)
    {
    }
    // TODO
    // getSummaryOfTimeSpent
}