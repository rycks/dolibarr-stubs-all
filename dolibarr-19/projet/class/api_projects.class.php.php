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
     * @var array   $FIELDS     Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('ref', 'title');
    /**
     * @var Project $project {@type Project}
     */
    public $project;
    /**
     * @var Task $task {@type Task}
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
     * Return an array with project informations
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
     * @param string    $properties	Restrict the data returned to theses properties. Ignored if empty. Comma separated list of properties names
     * @return  array                               Array of project objects
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $thirdparty_ids = '', $category = 0, $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Create project object
     *
     * @param   array   $request_data   Request data
     * @return  int     ID of project
     */
    public function post($request_data = \null)
    {
    }
    /**
     * Get tasks of a project.
     * See also API /tasks
     *
     * @param int   $id                     Id of project
     * @param int   $includetimespent       0=Return only list of tasks. 1=Include a summary of time spent, 2=Include details of time spent lines
     * @return array
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
     *
     * @url	POST {id}/tasks
     *
     * @return int
     */
    /*
    public function postLine($id, $request_data = null)
    {
    	if(! DolibarrApiAccess::$user->rights->projet->creer) {
    		throw new RestException(401);
    	}
    
    	$result = $this->project->fetch($id);
    	if( ! $result ) {
    		throw new RestException(404, 'Project not found');
    	}
    
    	if( ! DolibarrApi::_checkAccessToResource('project',$this->project->id)) {
    		throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
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
     *
     * @url	PUT {id}/tasks/{taskid}
     *
     * @return object
     */
    /*
    	public function putLine($id, $lineid, $request_data = null)
    	{
    		if(! DolibarrApiAccess::$user->rights->projet->creer) {
    			throw new RestException(401);
    		}
    
    		$result = $this->project->fetch($id);
    		if( ! $result ) {
    			throw new RestException(404, 'Project not found');
    		}
    
    		if( ! DolibarrApi::_checkAccessToResource('project',$this->project->id)) {
    			throw new RestException(401, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
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
     * @param int   $id             Id of project to update
     * @param array $request_data   Datas
     *
     * @return int
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
    // TODO
    // getSummaryOfTimeSpent
}