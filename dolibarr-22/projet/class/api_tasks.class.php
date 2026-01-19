<?php

/**
 * API class for projects
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Tasks extends \DolibarrApi
{
    /**
     * @var string[]       Mandatory fields, checked when create and update object
     */
    public static $FIELDS = array('ref', 'label', 'fk_project');
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
     * Get properties of a task object
     *
     * Return an array with task information
     *
     * @param   int         $id                     ID of task
     * @param   int         $includetimespent       0=Return only task. 1=Include a summary of time spent, 2=Include details of time spent lines
     * @return	array|mixed                         data without useless information
     *
     * @throws	RestException
     */
    public function get($id, $includetimespent = 0)
    {
    }
    /**
     * List tasks
     *
     * Get a list of tasks
     *
     * @param string		   $sortfield			Sort field
     * @param string		   $sortorder			Sort order
     * @param int			   $limit				Limit for list
     * @param int			   $page				Page number
     * @param string           $sqlfilters          Other criteria to filter answers separated by a comma. Syntax example "(t.ref:like:'SO-%') and (t.date_creation:<:'20160101')"
     * @param string    $properties	Restrict the data returned to these properties. Ignored if empty. Comma separated list of properties names
     * @return  array                               Array of project objects
     * @phan-return Task[]
     * @phpstan-return Task[]
     */
    public function index($sortfield = "t.rowid", $sortorder = 'ASC', $limit = 100, $page = 0, $sqlfilters = '', $properties = '')
    {
    }
    /**
     * Create task object
     *
     * @param   array   $request_data   Request data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return  int     ID of project
     */
    public function post($request_data = \null)
    {
    }
    // /**
    //  * Get time spent of a task
    //  *
    //  * @param int   $id                     Id of task
    //  * @return int
    //  *
    //  * @url	GET {id}/tasks
    //  */
    /*
    public function getLines($id, $includetimespent=0)
    {
    	if(! DolibarrApiAccess::$user->hasRight('projet', 'lire')) {
    		throw new RestException(403);
    	}
    
    	$result = $this->project->fetch($id);
    	if( ! $result ) {
    		throw new RestException(404, 'Project not found');
    	}
    
    	if( ! DolibarrApi::_checkAccessToResource('project',$this->project->id)) {
    		throw new RestException(403, 'Access not allowed for login '.DolibarrApiAccess::$user->login);
    	}
    	$this->project->getLinesArray(DolibarrApiAccess::$user);
    	$result = array();
    	foreach ($this->project->lines as $line)      // $line is a task
    	{
    		if ($includetimespent == 1)
    		{
    			$timespent = $line->getSummaryOfTimeSpent(0);
    		}
    		if ($includetimespent == 1)
    		{
    			// TODO
    			// Add class for timespent records and loop and fill $line->lines with records of timespent
    		}
    		array_push($result,$this->_cleanObjectDatas($line));
    	}
    	return $result;
    }
    */
    /**
     * Get roles a user is assigned to a task with
     *
     * @param   int   $id           Id of task
     * @param   int   $userid       Id of user (0 = connected user)
     * @return	array				Array of roles
     * @phan-return array<int,string>
     * @phpstan-return array<int,string>
     *
     * @url	GET {id}/roles
     */
    public function getRoles($id, $userid = 0)
    {
    }
    // /**
    //  * Add a task to given project
    //  *
    //  * @param int   $id             Id of project to update
    //  * @param array $request_data   Projectline data
    //  * @phan-param ?array<string,string> $request_data
    //  * @phpstan-param ?array<string,string> $request_data
    //  *
    //  * @url	POST {id}/tasks
    //  *
    //  * @return int
    //  */
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
    // /**
    //  * Update a task of a given project
    //  *
    //  * @param int   $id             Id of project to update
    //  * @param int   $taskid         Id of task to update
    //  * @param array $request_data   Projectline data
    //  * @phan-param ?array<string,string> $request_data
    //  * @phpstan-param ?array<string,string> $request_data
    //  *
    //  * @url	PUT {id}/tasks/{taskid}
    //  *
    //  * @return object
    //  */
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
     * Update task general fields (won't touch time spent of task)
     *
     * @param 	int   	$id             	Id of task to update
     * @param 	array 	$request_data   	Data
     * @phan-param ?array<string,string> $request_data
     * @phpstan-param ?array<string,string> $request_data
     * @return 	Object						Updated object
     */
    public function put($id, $request_data = \null)
    {
    }
    /**
     * Delete task
     *
     * @param   int     $id         Task ID
     *
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     * @throws RestException
     */
    public function delete($id)
    {
    }
    /**
     * Get time spent of a task
     *
     * @param int   $id                     Id of task
     * @param int   $timespent_id           Id of timespent
     *
     * @url	GET {id}/getTimeSpent/{timespent_id}
     *
     * @return	Object                      data without useless information
     *
     * @throws	RestException
     */
    public function getTimeSpent($id, $timespent_id)
    {
    }
    /**
     * Add time spent to a task of a project.
     * You can test this API with the following input message
     * { "date": "2016-12-31 23:15:00", "duration": 1800, "user_id": 1, "note": "My time test" }
     *
     * @param   int         $id                 Task ID
     * @param   datetime    $date               Date (YYYY-MM-DD HH:MI:SS in GMT)
     * @phan-param string $date
     * @param   int         $duration           Duration in seconds (3600 = 1h)
     * @param   int         $product_id         The product id that is used, default is null
     * @param   int         $user_id            User (Use 0 for connected user)
     * @param   string      $note               Note
     *
     * @url POST    {id}/addtimespent
     *      NOTE: Should be "POST {id}/timespent", since POST already implies "add"
     *
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     */
    public function addTimeSpent($id, $date, $duration, $product_id = \null, $user_id = 0, $note = '')
    {
    }
    /**
     * Update time spent for a task of a project.
     * You can test this API with the following input message
     * { "date": "2016-12-31 23:15:00", "duration": 1800, "user_id": 1, "note": "My time test" }
     *
     * @param   int         $id                 Task ID
     * @param   int         $timespent_id       Time spent ID (llx_element_time.rowid)
     * @param   datetime    $date               Date (YYYY-MM-DD HH:MI:SS in GMT)
     * @phan-param string $date
     * @param   int         $duration           Duration in seconds (3600 = 1h)
     * @param   int         $product_id         The product id that is used, default is null
     * @param   int         $user_id            User (Use 0 for connected user)
     * @param   string      $note               Note
     *
     * @url PUT    {id}/timespent/{timespent_id}
     *
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     */
    public function putTimeSpent($id, $timespent_id, $date, $duration, $product_id = \null, $user_id = 0, $note = '')
    {
    }
    /**
     * Delete time spent for a task of a project.
     *
     * @param   int         $id                 Task ID
     * @param   int         $timespent_id       Time spent ID (llx_element_time.rowid)
     *
     * @url DELETE    {id}/timespent/{timespent_id}
     *
     * @return  array
     * @phan-return array{success:array{code:int,message:string}}
     * @phpstan-return array{success:array{code:int,message:string}}
     */
    public function deleteTimeSpent($id, $timespent_id)
    {
    }
    /**
     * Validate task & timespent IDs for timespent API methods.
     * Loads the selected task & timespent records.
     *
     * @param   int         $id                 Task ID
     * @param   int         $timespent_id       Time spent ID (llx_element_time.rowid)
     *
     * @return void
     */
    private function timespentRecordChecks($id, $timespent_id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensitive object data
     * @phpstan-template T of Object
     *
     * @param   Object  $object     Object to clean
     * @return  Object              Object with cleaned properties
     *
     * @phpstan-param T $object
     * @phpstan-return T
     */
    protected function _cleanObjectDatas($object)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensitive object data
     * @phpstan-template T of Object
     *
     * @param   Object  $object     Object to clean
     * @return  Object              Object with cleaned properties
     *
     * @phpstan-param T $object
     * @phpstan-return T
     */
    protected function _cleanTimeSpentObjectDatas($object)
    {
    }
    /**
     * Validate fields before create or update object
     *
     * @param ?array<string,string> $data   Data to validate
     * @return array<string,string>
     * @throws  RestException
     */
    private function _validate($data)
    {
    }
}