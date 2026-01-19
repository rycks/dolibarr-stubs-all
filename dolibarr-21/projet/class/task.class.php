<?php

/**
 * 	Class to manage tasks
 */
class Task extends \CommonObjectLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'project_task';
    /**
     * @var string 	Name of table without prefix where object is stored
     */
    public $table_element = 'projet_task';
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_element';
    /**
     * @var string String with name of icon for myobject.
     */
    public $picto = 'projecttask';
    /**
     * @var array<string, array<string>>	List of child tables. To test if we can delete object.
     */
    protected $childtables = array('element_time' => array('name' => 'Task', 'parent' => 'projet_task', 'parentkey' => 'fk_element', 'parenttypefield' => 'elementtype', 'parenttypevalue' => 'task'));
    /**
     * @var int ID parent task
     */
    public $fk_task_parent = 0;
    /**
     * @var string Label of task
     */
    public $label;
    /**
     * @var string description
     */
    public $description;
    /**
     * @var int|'' total of time spent on this task (in seconds)
     */
    public $duration_effective;
    /**
     * @var int|'' planned workload (in seconds)
     */
    public $planned_workload;
    /**
     * @var null|int|'' date creation
     * @see isDolTms()
     */
    public $date_c;
    /**
     * @var int|'' progress
     */
    public $progress;
    /**
     * @var null|int|'' start date
     * @see isDolTms()
     * @deprecated Use date_start instead
     */
    public $dateo;
    /**
     * @var null|int|'' start date
     * @see isDolTms()
     */
    public $date_start;
    /**
     * @var null|int|'' end date
     * @see isDolTms()
     * @deprecated Use date_end instead
     */
    public $datee;
    /**
     * @var null|int|'' end date
     * @see isDolTms()
     */
    public $date_end;
    /**
     * @var int ID
     * @deprecated use status instead
     * @see $status
     */
    public $fk_statut;
    /**
     * @var int ID
     */
    public $status;
    /**
     * @var int priority
     */
    public $priority;
    /**
     * @var int ID
     */
    public $fk_user_creat;
    /**
     * @var int ID
     */
    public $fk_user_valid;
    /**
     * @var int rank
     */
    public $rang;
    /**
     * @var int|string
     */
    public $timespent_min_date;
    /**
     * @var int|string
     */
    public $timespent_max_date;
    /**
     * @var int
     */
    public $timespent_total_duration;
    /**
     * @var float
     */
    public $timespent_total_amount;
    /**
     * @var int
     */
    public $timespent_nblinesnull;
    /**
     * @var int
     */
    public $timespent_nblines;
    // For detail of lines of timespent record, there is the property ->lines in common
    // Var used to call method addTimeSpent(). Bad practice.
    /**
     * @var int
     */
    public $timespent_id;
    /**
     * @var int
     */
    public $timespent_duration;
    /**
     * @var int
     */
    public $timespent_old_duration;
    /**
     * @var int|string
     */
    public $timespent_date;
    /**
     * @var int|string
     */
    public $timespent_datehour;
    // More accurate start date (same than timespent_date but includes hours, minutes and seconds)
    /**
     * @var int
     */
    public $timespent_withhour;
    // 0 or 1 = we have entered also start hours for timesheet line
    /**
     * @var int
     */
    public $timespent_fk_user;
    /**
     * @var float
     */
    public $timespent_thm;
    /**
     * @var string
     */
    public $timespent_note;
    /**
     * @var int
     */
    public $timespent_fk_product;
    /**
     * @var int
     */
    public $timespent_invoiceid;
    /**
     * @var int
     */
    public $timespent_invoicelineid;
    public $comments = array();
    // Properties calculated from sum of llx_element_time linked to task
    /**
     * @var int is task to be billed
     */
    public $tobill;
    /**
     * @var int is task billed
     */
    public $billed;
    // Properties to store project information
    /**
     * @var string project ref
     */
    public $projectref;
    /**
     * @var int project status
     */
    public $projectstatus;
    /**
     * @var string project label
     */
    public $projectlabel;
    /**
     * @var float|'' opportunity amount
     */
    public $opp_amount;
    /**
     * @var float|'' opportunity percent
     */
    public $opp_percent;
    /**
     * @var int opportunity status
     */
    public $fk_opp_status;
    /**
     * @var int<0,1> Set to 1 if time spent must be converted into invoices
     */
    public $usage_bill_time;
    /**
     * @var int is project public
     */
    public $public;
    /**
     * @var array<string,mixed>
     */
    public $array_options_project;
    // Properties to store thirdparty of project information
    /**
     * @var int ID of thirdparty
     * @deprecated Use $thirdparty_id
     * @see $thirdparty_id
     */
    public $socid;
    /**
     * @var int ID of thirdparty
     */
    public $thirdparty_id;
    /**
     * @var string name of thirdparty
     */
    public $thirdparty_name;
    /**
     * @var string email of thirdparty
     */
    public $thirdparty_email;
    // store parent ref and position
    /**
     * @var string task parent ref
     */
    public $task_parent_ref;
    /**
     * @var int task parent rank
     */
    public $task_parent_position;
    /**
     * Status indicate whether the task is billable (time is meant to be added to invoice) '1' or not '0'
     * @var int billable
     */
    public $billable = 1;
    /**
     * @var float budget_amount
     */
    public $budget_amount;
    /**
     * @var float project_budget_amount
     */
    public $project_budget_amount;
    /**
     * Draft status
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated status (To do). Note: We also have the field progress to know the progression from 0 to 100%.
     */
    const STATUS_VALIDATED = 1;
    /**
     * Finished status
     */
    const STATUS_CLOSED = 3;
    /**
     * Transferred status
     */
    const STATUS_TRANSFERRED = 4;
    /**
     * status canceled
     */
    const STATUS_CANCELED = 9;
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create into database
     *
     *  @param	User	$user        	User that create
     *  @param 	int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int 		        	Return integer <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id					Id object
     *  @param	string	$ref				ref object
     *  @param	int		$loadparentdata		Also load parent data
     *  @return int 		        		Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = '', $loadparentdata = 0)
    {
    }
    /**
     *  Update database
     *
     *  @param	User	$user        	User that modify
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int			         	Return integer <=0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *	Delete task from database
     *
     *	@param	User	$user        	User that delete
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *	Return nb of children
     *
     *	@return	int		Return integer <0 if KO, 0 if no children, >0 if OK
     */
    public function hasChildren()
    {
    }
    /**
     *	Return nb of time spent
     *
     *	@return	int		Return integer <0 if KO, 0 if no children, >0 if OK
     */
    public function hasTimeSpent()
    {
    }
    /**
     * getTooltipContentArray
     * @param array<string,mixed> $params params to construct tooltip data
     * @since v18
     * @return array{picto?:string,ref?:string,refsupplier?:string,label?:string,date?:string,date_echeance?:string,amountht?:string,total_ht?:string,totaltva?:string,amountlt1?:string,amountlt2?:string,amountrevenustamp?:string,totalttc?:string}|array{optimize:string}
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *	Return clickable name (with picto eventually)
     *
     *	@param	int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     *	@param	string	$option			'withproject' or ''
     *  @param	string	$mode			Mode 'task', 'time', 'contact', 'note', document' define page to link to.
     * 	@param	int		$addlabel		0=Default, 1=Add label into string, >1=Add first chars into string
     *  @param	string	$sep			Separator between ref and label if option addlabel is set
     *  @param	int   	$notooltip		1=Disable tooltip
     *  @param  int     $save_lastsearch_value    -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string					Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $mode = 'task', $addlabel = 0, $sep = ' - ', $notooltip = 0, $save_lastsearch_value = -1)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     * Return list of tasks for all projects or for one particular project
     * Sort order is on project, then on position of task, and last on start date of first level task
     *
     * @param	?User	$usert					Object user to limit tasks affected to a particular user
     * @param	?User	$userp					Object user to limit projects of a particular user and public projects
     * @param	int		$projectid				Project id
     * @param	int		$socid					Third party id
     * @param	int		$mode					0=Return list of tasks and their projects, 1=Return projects and tasks if exists
     * @param	string	$filteronproj    		Filter on project ref or label
     * @param	string	$filteronprojstatus		Filter on project status ('-1'=no filter, '0,1'=Draft+Validated only)
     * @param	string	$morewherefilter		Add more filter into where SQL request (must start with ' AND ...')
     * @param	int		$filteronprojuser		Filter on user that is a contact of project
     * @param	int		$filterontaskuser		Filter on user assigned to task
     * @param	?Extrafields	$extrafields	Show additional column from project or task
     * @param   int     $includebilltime    	Calculate also the time to bill and billed
     * @param   array<string,string>   $search_array_options 	Array of search filters. Not Used yet.
     * @param   int     $loadextras         	Fetch all Extrafields on each project and task
     * @param	int		$loadRoleMode			1= will test Roles on task;  0 used in delete project action
     * @param	string	$sortfield				Sort field
     * @param	string	$sortorder				Sort order
     * @return 	Task[]|string					Array of tasks
     */
    public function getTasksArray($usert = \null, $userp = \null, $projectid = 0, $socid = 0, $mode = 0, $filteronproj = '', $filteronprojstatus = '-1', $morewherefilter = '', $filteronprojuser = 0, $filterontaskuser = 0, $extrafields = \null, $includebilltime = 0, $search_array_options = array(), $loadextras = 0, $loadRoleMode = 1, $sortfield = '', $sortorder = '')
    {
    }
    /**
     * Return list of roles for a user for each projects or each tasks (or a particular project or a particular task).
     *
     * @param	?User		$userp			      Return roles on project for this internal user. If set, usert and taskid must not be defined.
     * @param	?User		$usert			      Return roles on task for this internal user. If set userp must NOT be defined. -1 means no filter.
     * @param 	string		$projectid		      Project id list separated with , to filter on project
     * @param 	int			$taskid			      Task id to filter on a task
     * @param	int			$filteronprojstatus	  Filter on project status if userp is set. Not used if userp not defined.
     * @return 	array<int,string>|int<-1,-1>      Array (projectid => 'list of roles for project' or taskid => 'list of roles for task')
     */
    public function getUserRolesForProjectsOrTasks($userp, $usert, $projectid = '', $taskid = 0, $filteronprojstatus = -1)
    {
    }
    /**
     * 	Return list of id of contacts of task
     *
     *	@param	string	$source		Source
     *  @return array<int,int>		Array of id of contacts
     */
    public function getListContactId($source = 'internal')
    {
    }
    /**
     * Merge contact of tasks
     *
     * @param 	int 	$origin_id 	Old task id
     * @param 	int 	$dest_id 	New task id
     * @return 	bool
     */
    public function mergeContactTask($origin_id, $dest_id)
    {
    }
    /**
     * Merge time spent of tasks
     *
     * @param 	int 	$origin_id 	Old task id
     * @param 	int 	$dest_id 	New task id
     * @return 	bool
     */
    public function mergeTimeSpentTask($origin_id, $dest_id)
    {
    }
    /**
     *  Add time spent
     *
     *  @param	User	$user           User object
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return	int                     Return integer <=0 if KO, >0 if OK
     */
    public function addTimeSpent($user, $notrigger = 0)
    {
    }
    /**
     *  Fetch records of time spent of this task
     *
     *  @param	string	$morewherefilter	Add more filter into where SQL request (must start with ' AND ...')
     *  @return int							Return integer <0 if KO, array of time spent if OK
     */
    public function fetchTimeSpentOnTask($morewherefilter = '')
    {
    }
    /**
     *  Calculate total of time spent for task
     *
     *  @param  null|User|int<0,0>	$userobj			Filter on user. null or 0=No filter
     *  @param	string		$morewherefilter	Add more filter into where SQL request (must start with ' AND ...')
     *  @return int<-1,-1>|array{}|array{min_date:int|string,max_date:int|string,total_duration:int}		Array of info for task array('min_date', 'max_date', 'total_duration', 'total_amount', 'nblines', 'nblinesnull')
     */
    public function getSummaryOfTimeSpent($userobj = \null, $morewherefilter = '')
    {
    }
    /**
     *  Calculate quantity and value of time consumed using the thm (hourly amount value of work for user entering time)
     *
     *	@param	User|string	$fuser		Filter on a dedicated user
     *  @param	string		$dates		Start date (ex 00:00:00)
     *  @param	string		$datee		End date (ex 23:59:59)
     *  @return	array{}|array{amount:float,nbseconds:int,nblinesnull:int}	Array of info for task array('amount','nbseconds','nblinesnull')
     */
    public function getSumOfAmount($fuser = '', $dates = '', $datee = '')
    {
    }
    /**
     *  Load properties of timespent of a task from the time spent ID.
     *
     *  @param	int		$id 	Id in time spent table
     *  @return int		        Return integer <0 if KO, >0 if OK
     */
    public function fetchTimeSpent($id)
    {
    }
    /**
     *  Load all records of time spent
     *
     *  @param	User		$userobj			User object
     *  @param	string		$morewherefilter	Add more filter into where SQL request (must start with ' AND ...')
     *  @return stdClass[]|int						Return integer <0 if KO, array of time spent if OK
     */
    public function fetchAllTimeSpent(\User $userobj, $morewherefilter = '')
    {
    }
    /**
     *	Update time spent
     *
     *  @param	User	$user           User id
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return	int						Return integer <0 if KO, >0 if OK
     */
    public function updateTimeSpent($user, $notrigger = 0)
    {
    }
    /**
     *  Delete time spent
     *
     *  @param	User	$user        	User that delete
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return	int						Return integer <0 if KO, >0 if OK
     */
    public function delTimeSpent($user, $notrigger = 0)
    {
    }
    /**	Load an object from its id and create a new one in database
     *
     *  @param	User	$user		            User making the clone
     *  @param	int		$fromid     			Id of object to clone
     *  @param	int		$project_id				Id of project to attach clone task
     *  @param	int		$parent_task_id			Id of task to attach clone task
     *  @param	bool	$clone_change_dt		recalculate date of task regarding new project start date
     *  @param	bool	$clone_affectation		clone affectation of project
     *  @param	bool	$clone_time				clone time of project
     *  @param	bool	$clone_file				clone file of project
     *  @param	bool	$clone_note				clone note of project
     *  @param	bool	$clone_prog				clone progress of project
     *  @return	int								New id of clone
     */
    public function createFromClone(\User $user, $fromid, $project_id, $parent_task_id, $clone_change_dt = \false, $clone_affectation = \false, $clone_time = \false, $clone_file = \false, $clone_note = \false, $clone_prog = \false)
    {
    }
    /**
     *	Return status label of object
     *
     *	@param	integer	$mode		0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     * 	@return	string	  			Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return status label for an object
     *
     *  @param	int			$status	  	Id status
     *  @param	integer		$mode		0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *  @return	string	  				Label
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     *  Create an intervention document on disk using template defined into PROJECT_TASK_ADDON_PDF
     *
     *  @param	string		$modele			force le modele a utiliser ('' par default)
     *  @param	Translate	$outputlangs	object lang a utiliser pour traduction
     *  @param  int			$hidedetails    Hide details of lines
     *  @param  int			$hidedesc       Hide description
     *  @param  int			$hideref        Hide ref
     *  @return int         				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     * @param	User	$user   Object user
     * @return WorkboardResponse|int Return integer <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user)
    {
    }
    /**
     *      Load indicators this->nb for state board
     *
     *      @return     int         Return integer <0 if ko, >0 if ok
     */
    public function loadStateBoard()
    {
    }
    /**
     * Is the task delayed?
     *
     * @return bool
     */
    public function hasDelay()
    {
    }
    /**
     *	Return clickable link of object (with eventually picto)
     *
     *	@param      string	    			$option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array{string,mixed}		$arraydata				Array of data
     *  @return		string											HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
    /**
     *    Merge a task with another one, deleting the given task.
     *    The task given in parameter will be removed.
     *
     *    @param	int     $task_origin_id		Task to merge the data from
     *    @return	int							-1 if error
     */
    public function mergeTask($task_origin_id)
    {
    }
}