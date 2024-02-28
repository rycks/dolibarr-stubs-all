<?php

/**
 *	Class to manage projects
 */
class Project extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'project';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'projet';
    /**
     * @var int    Name of subtable line
     */
    public $table_element_line = 'projet_task';
    /**
     * @var int    Name of field date
     */
    public $table_element_date;
    /**
     * @var int Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_projet';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'project';
    /**
     * {@inheritdoc}
     */
    protected $table_ref_field = 'ref';
    /**
     * @var string description
     */
    public $description;
    /**
     * @var string
     */
    public $title;
    public $date_start;
    public $date_end;
    public $date_close;
    public $socid;
    // To store id of thirdparty
    public $thirdparty_name;
    // To store name of thirdparty (defined only in some cases)
    public $user_author_id;
    //!< Id of project creator. Not defined if shared project.
    /**
     * @var int user close id
     */
    public $fk_user_close;
    /**
     * @var int user close id
     */
    public $user_close_id;
    public $public;
    //!< Tell if this is a public or private project
    public $budget_amount;
    public $usage_bill_time;
    // Is the time spent on project must be invoiced or not
    public $statuts_short;
    public $statuts_long;
    public $statut;
    // 0=draft, 1=opened, 2=closed
    public $opp_status;
    // opportunity status, into table llx_c_lead_status
    public $opp_percent;
    // opportunity probability
    public $oldcopy;
    public $weekWorkLoad;
    // Used to store workload details of a projet
    public $weekWorkLoadPerTask;
    // Used to store workload details of tasks of a projet
    /**
     * @var int Creation date
     * @deprecated
     * @see $date_c
     */
    public $datec;
    /**
     * @var int Creation date
     */
    public $date_c;
    /**
     * @var int Modification date
     * @deprecated
     * @see $date_m
     */
    public $datem;
    /**
     * @var int Modification date
     */
    public $date_m;
    /**
     * @var Task[]
     */
    public $lines;
    /**
     * Draft status
     */
    const STATUS_DRAFT = 0;
    /**
     * Open/Validated status
     */
    const STATUS_VALIDATED = 1;
    /**
     * Closed status
     */
    const STATUS_CLOSED = 2;
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'ID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10), 'fk_soc' => array('type' => 'integer', 'label' => 'Fk soc', 'enabled' => 1, 'visible' => -1, 'position' => 15), 'datec' => array('type' => 'datetime', 'label' => 'Datec', 'enabled' => 1, 'visible' => -1, 'position' => 20), 'tms' => array('type' => 'timestamp', 'label' => 'Tms', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 25), 'dateo' => array('type' => 'date', 'label' => 'Dateo', 'enabled' => 1, 'visible' => -1, 'position' => 30), 'datee' => array('type' => 'date', 'label' => 'Datee', 'enabled' => 1, 'visible' => -1, 'position' => 35), 'ref' => array('type' => 'varchar(50)', 'label' => 'Ref', 'enabled' => 1, 'visible' => -1, 'showoncombobox' => 1, 'position' => 40), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => 1, 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 45), 'title' => array('type' => 'varchar(255)', 'label' => 'Title', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 50, 'showoncombobox' => 1), 'description' => array('type' => 'text', 'label' => 'Description', 'enabled' => 1, 'visible' => -1, 'position' => 55), 'fk_user_creat' => array('type' => 'integer', 'label' => 'Fk user creat', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 60), 'public' => array('type' => 'integer', 'label' => 'Public', 'enabled' => 1, 'visible' => -1, 'position' => 65), 'fk_statut' => array('type' => 'smallint(6)', 'label' => 'Fk statut', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 500), 'fk_opp_status' => array('type' => 'integer', 'label' => 'Fk opp status', 'enabled' => 1, 'visible' => -1, 'position' => 75), 'opp_percent' => array('type' => 'double(5,2)', 'label' => 'Opp percent', 'enabled' => 1, 'visible' => -1, 'position' => 80), 'note_private' => array('type' => 'text', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 85), 'note_public' => array('type' => 'text', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 90), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 95), 'budget_amount' => array('type' => 'double(24,8)', 'label' => 'Budget amount', 'enabled' => 1, 'visible' => -1, 'position' => 100), 'date_close' => array('type' => 'datetime', 'label' => 'Date close', 'enabled' => 1, 'visible' => -1, 'position' => 105), 'fk_user_close' => array('type' => 'integer', 'label' => 'Fk user close', 'enabled' => 1, 'visible' => -1, 'position' => 110), 'opp_amount' => array('type' => 'double(24,8)', 'label' => 'Opp amount', 'enabled' => 1, 'visible' => -1, 'position' => 115), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -1, 'position' => 120), 'fk_user_modif' => array('type' => 'integer', 'label' => 'Fk user modif', 'enabled' => 1, 'visible' => -1, 'position' => 125), 'usage_bill_time' => array('type' => 'integer', 'label' => 'Usage bill time', 'enabled' => 1, 'visible' => -1, 'position' => 130), 'usage_opportunity' => array('type' => 'integer', 'label' => 'Usage opportunity', 'enabled' => 1, 'visible' => -1, 'position' => 135), 'usage_task' => array('type' => 'integer', 'label' => 'Usage task', 'enabled' => 1, 'visible' => -1, 'position' => 140), 'usage_organize_event' => array('type' => 'integer', 'label' => 'Usage organize event', 'enabled' => 1, 'visible' => -1, 'position' => 145));
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *    Create a project into database
     *
     *    @param    User	$user       	User making creation
     *    @param	int		$notrigger		Disable triggers
     *    @return   int         			<0 if KO, id of created project if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     * Update a project
     *
     * @param  User		$user       User object of making update
     * @param  int		$notrigger  1=Disable all triggers
     * @return int                  <=0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     * 	Get object from database
     *
     * 	@param      int		$id       	Id of object to load
     * 	@param		string	$ref		Ref of project
     * 	@return     int      		   	>0 if OK, 0 if not found, <0 if KO
     */
    public function fetch($id, $ref = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Return list of elements for type, linked to a project
     *
     * 	@param		string		$type			'propal','order','invoice','order_supplier','invoice_supplier',...
     * 	@param		string		$tablename		name of table associated of the type
     * 	@param		string		$datefieldname	name of date field for filter
     *  @param		int			$dates			Start date
     *  @param		int			$datee			End date
     *	@param		string		$projectkey		Equivalent key  to fk_projet for actual type
     * 	@return		mixed						Array list of object ids linked to project, < 0 or string if error
     */
    public function get_element_list($type, $tablename, $datefieldname = '', $dates = '', $datee = '', $projectkey = 'fk_projet')
    {
    }
    /**
     *    Delete a project from database
     *
     *    @param       User		$user            User
     *    @param       int		$notrigger       Disable triggers
     *    @return      int       			      <0 if KO, 0 if not possible, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * 		Delete tasks with no children first, then task with children recursively
     *
     *  	@param     	User		$user		User
     *		@return		int				<0 if KO, 1 if OK
     */
    public function deleteTasks($user)
    {
    }
    /**
     * 		Validate a project
     *
     * 		@param		User	$user		   User that validate
     *      @param      int     $notrigger     1=Disable triggers
     * 		@return		int					   <0 if KO, >0 if OK
     */
    public function setValid($user, $notrigger = 0)
    {
    }
    /**
     * 		Close a project
     *
     * 		@param		User	$user		User that close project
     * 		@return		int					<0 if KO, 0 if already closed, >0 if OK
     */
    public function setClose($user)
    {
    }
    /**
     *  Return status label of object
     *
     *  @param  int			$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     * 	@return string      			Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi status label for a status
     *
     *  @param	int		$status     id status
     *  @param  int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * 	@return string				Label
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     * 	Return clickable name (with picto eventually)
     *
     * 	@param	int		$withpicto		          0=No picto, 1=Include picto into link, 2=Only picto
     * 	@param	string	$option			          Variant where the link point to ('', 'nolink')
     * 	@param	int		$addlabel		          0=Default, 1=Add label into string, >1=Add first chars into string
     *  @param	string	$moreinpopup	          Text to add into popup
     *  @param	string	$sep			          Separator between ref and label if option addlabel is set
     *  @param	int   	$notooltip		          1=Disable tooltip
     *  @param  int     $save_lastsearch_value    -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param	string	$morecss				  More css on a link
     * 	@return	string					          String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $addlabel = 0, $moreinpopup = '', $sep = ' - ', $notooltip = 0, $save_lastsearch_value = -1, $morecss = '')
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     * 	id must be 0 if object instance is a specimen.
     *
     *  @return	void
     */
    public function initAsSpecimen()
    {
    }
    /**
     * 	Check if user has permission on current project
     *
     * 	@param	User	$user		Object user to evaluate
     * 	@param  string	$mode		Type of permission we want to know: 'read', 'write'
     * 	@return	int					>0 if user has permission, <0 if user has no permission
     */
    public function restrictedProjectArea($user, $mode = 'read')
    {
    }
    /**
     * Return array of projects a user has permission on, is affected to, or all projects
     *
     * @param 	User	$user			User object
     * @param 	int		$mode			0=All project I have permission on (assigned to me or public), 1=Projects assigned to me only, 2=Will return list of all projects with no test on contacts
     * @param 	int		$list			0=Return array, 1=Return string list
     * @param	int		$socid			0=No filter on third party, id of third party
     * @param	string	$filter			additionnal filter on project (statut, ref, ...)
     * @return 	array or string			Array of projects id, or string with projects id separated with "," if list is 1
     */
    public function getProjectsAuthorizedForUser($user, $mode = 0, $list = 0, $socid = 0, $filter = '')
    {
    }
    /**
     * Load an object from its id and create a new one in database
     *
     *  @param	User	$user		          User making the clone
     *  @param	int		$fromid     	      Id of object to clone
     *  @param	bool	$clone_contact	      Clone contact of project
     *  @param	bool	$clone_task		      Clone task of project
     *  @param	bool	$clone_project_file	  Clone file of project
     *  @param	bool	$clone_task_file	  Clone file of task (if task are copied)
     *  @param	bool	$clone_note		      Clone note of project
     *  @param	bool	$move_date		      Move task date on clone
     *  @param	integer	$notrigger		      No trigger flag
     *  @param  int     $newthirdpartyid      New thirdparty id
     *  @return	int						      New id of clone
     */
    public function createFromClone(\User $user, $fromid, $clone_contact = \false, $clone_task = \true, $clone_project_file = \false, $clone_task_file = \false, $clone_note = \true, $move_date = \true, $notrigger = 0, $newthirdpartyid = 0)
    {
    }
    /**
     *    Shift project task date from current date to delta
     *
     *    @param	integer		$old_project_dt_start	Old project start date
     *    @return	int				                    1 if OK or < 0 if KO
     */
    public function shiftTaskDate($old_project_dt_start)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Associate element to a project
     *
     *    @param	string	$tableName			Table of the element to update
     *    @param	int		$elementSelectId	Key-rowid of the line of the element to update
     *    @return	int							1 if OK or < 0 if KO
     */
    public function update_element($tableName, $elementSelectId)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Associate element to a project
     *
     *    @param	string	$tableName			Table of the element to update
     *    @param	int		$elementSelectId	Key-rowid of the line of the element to update
     *    @param	string	$projectfield	    The column name that stores the link with the project
     *
     *    @return	int							1 if OK or < 0 if KO
     */
    public function remove_element($tableName, $elementSelectId, $projectfield = 'fk_projet')
    {
    }
    /**
     *  Create an intervention document on disk using template defined into PROJECT_ADDON_PDF
     *
     *  @param	string		$modele			Force template to use ('' by default)
     *  @param	Translate	$outputlangs	Objet lang to use for translation
     *  @param  int			$hidedetails    Hide details of lines
     *  @param  int			$hidedesc       Hide description
     *  @param  int			$hideref        Hide ref
     *  @return int         				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    /**
     * Load time spent into this->weekWorkLoad and this->weekWorkLoadPerTask for all day of a week of project.
     * Note: array weekWorkLoad and weekWorkLoadPerTask are reset and filled at each call.
     *
     * @param 	int		$datestart		First day of week (use dol_get_first_day to find this date)
     * @param 	int		$taskid			Filter on a task id
     * @param 	int		$userid			Time spent by a particular user
     * @return 	int						<0 if OK, >0 if KO
     */
    public function loadTimeSpent($datestart, $taskid = 0, $userid = 0)
    {
    }
    /**
     * Load time spent into this->weekWorkLoad and this->weekWorkLoadPerTask for all day of a week of project.
     * Note: array weekWorkLoad and weekWorkLoadPerTask are reset and filled at each call.
     *
     * @param 	int		$datestart		First day of week (use dol_get_first_day to find this date)
     * @param 	int		$taskid			Filter on a task id
     * @param 	int		$userid			Time spent by a particular user
     * @return 	int						<0 if OK, >0 if KO
     */
    public function loadTimeSpentMonth($datestart, $taskid = 0, $userid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     * @param	User	$user   Objet user
     * @return WorkboardResponse|int <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user)
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param DoliDB $db Database handler
     * @param int $origin_id Old thirdparty id
     * @param int $dest_id New thirdparty id
     * @return bool
     */
    public static function replaceThirdparty(\DoliDB $db, $origin_id, $dest_id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Charge indicateurs this->nb pour le tableau de bord
     *
     * @return     int         <0 if KO, >0 if OK
     */
    public function load_state_board()
    {
    }
    /**
     * Is the project delayed?
     *
     * @return bool
     */
    public function hasDelay()
    {
    }
    /**
     *	Charge les informations d'ordre info dans l'objet commande
     *
     *	@param  int		$id       Id of order
     *	@return	void
     */
    public function info($id)
    {
    }
    /**
     * Sets object to supplied categories.
     *
     * Deletes object from existing categories not supplied.
     * Adds it to non existing supplied categories.
     * Existing categories are left untouch.
     *
     * @param int[]|int $categories Category or categories IDs
     * @return void
     */
    public function setCategories($categories)
    {
    }
    /**
     * 	Create an array of tasks of current project
     *
     *  @param  User   $user       Object user we want project allowed to
     * 	@return int		           >0 if OK, <0 if KO
     */
    public function getLinesArray($user)
    {
    }
}