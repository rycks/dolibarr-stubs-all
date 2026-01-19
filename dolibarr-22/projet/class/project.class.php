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
     * @var string    Name of subtable line
     */
    public $table_element_line = 'projet_task';
    /**
     * @var string    Name of field date
     */
    public $table_element_date;
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_projet';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'project';
    /**
     * {@inheritdoc}
     */
    protected $table_ref_field = 'ref';
    /**
     * @var int parent project
     */
    public $fk_project;
    /**
     * @var string description
     */
    public $description;
    /**
     * @var string
     */
    public $title;
    /**
     * @var int 	Date start
     * @deprecated Use $date_start
     */
    public $dateo;
    /**
     * @var null|int|string 	Field with Date start
     */
    public $date_start;
    /**
     * @var int 	Date end
     * @deprecated Use $date_end
     */
    public $datee;
    /**
     * @var null|int|string 	Field with Date end
     */
    public $date_end;
    /**
     * @var int 	Date start event
     */
    public $date_start_event;
    /**
     * @var int 	Date end event
     */
    public $date_end_event;
    /**
     * @var string	Location
     */
    public $location;
    /**
     * @var int Date close
     */
    public $date_close;
    /**
     * @var int	Id of thirdparty
     */
    public $socid;
    // To store id of thirdparty
    /**
     * @var string thirdparty name
     */
    public $thirdparty_name;
    // To store name of thirdparty (defined only in some cases)
    /**
     * @var int	Id of project creator. Not defined if shared project.
     */
    public $user_author_id;
    /**
     * @var int user close id
     */
    public $fk_user_close;
    /**
     * @var int<0,1>  Tell if this is a public or private project
     */
    public $public;
    /**
     * @var float|string budget Amount (May need price2num)
     */
    public $budget_amount;
    /**
     * @var integer		Can use projects to follow opportunities
     */
    public $usage_opportunity;
    /**
     * @var integer		Can follow tasks on project and enter time spent on it
     */
    public $usage_task;
    /**
     * @var integer	 	Use to bill task spend time
     */
    public $usage_bill_time;
    // Is the time spent on project must be invoiced or not
    /**
     * @var integer		Event organization: Use Event Organization
     */
    public $usage_organize_event;
    /**
     * @var integer		Event organization: Allow unknown people to suggest new conferences
     */
    public $accept_conference_suggestions;
    /**
     * @var integer		Event organization: Allow unknown people to suggest new booth
     */
    public $accept_booth_suggestions;
    /**
     * @var float|string Event organization: registration price (may need price2num)
     */
    public $price_registration;
    /**
     * @var float|string Event organization: booth price (may need price2num)
     */
    public $price_booth;
    /**
     * @var int|'' Max attendees (may be empty/need cast to int)
     */
    public $max_attendees;
    /**
     * @var int status
     * @deprecated Use $status
     */
    public $statut;
    // 0=draft, 1=opened, 2=closed
    /**
     * @var int opportunity status
     */
    public $opp_status;
    // opportunity status, into table llx_c_lead_status
    /**
     * @var string opportunity code
     */
    public $opp_status_code;
    /**
     * @var int opportunity status
     */
    public $fk_opp_status;
    // opportunity status, into table llx_c_lead_status
    /**
     * @var float|'' opportunity amount
     */
    public $opp_amount;
    // opportunity amount
    /**
     * @var float|'' opportunity percent
     */
    public $opp_percent;
    // opportunity probability
    /**
     * @var float|'' opportunity weighted amount
     */
    public $opp_weighted_amount;
    // opportunity weighted amount
    /**
     * @var string email msgid
     */
    public $email_msgid;
    /**
     * @var array<int,int> Used to store workload details of a projet (array[day])
     */
    public $weekWorkLoad;
    /**
     * @var array<int,array<int,int>> Used to store workload details of a projet (array[day][taskid])
     */
    public $weekWorkLoadPerTask;
    // Used to store workload details of tasks of a projet
    /**
     * @var array<string,int> Used to store workload details of a projet
     */
    public $monthWorkLoad;
    /**
     * @var array<string,array<int,int>> Used to store workload details of tasks of a projet (array[weeknbr][task_id])
     */
    public $monthWorkLoadPerTask;
    /**
     * @var int Creation date
     * @deprecated Use $date_c
     */
    public $datec;
    /**
     * @var int Creation date
     */
    public $date_c;
    /**
     * @var int Modification date
     * @deprecated Use $date_m
     */
    public $datem;
    /**
     * @var int Modification date
     */
    public $date_m;
    /**
     * @var string Ip address
     */
    public $ip;
    /**
     * @var Task[]
     */
    public $lines;
    /**
     *  'type' field format:
     *  	'integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]',
     *  	'select' (list of values are in 'options'. for integer list of values are in 'arrayofkeyval'),
     *  	'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter[:CategoryIdType[:CategoryIdList[:SortField]]]]]]',
     *  	'chkbxlst:...',
     *  	'varchar(x)',
     *  	'text', 'text:none', 'html',
     *   	'double(24,8)', 'real', 'price', 'stock',
     *  	'date', 'datetime', 'timestamp', 'duration',
     *  	'boolean', 'checkbox', 'radio', 'array',
     *  	'mail', 'phone', 'url', 'password', 'ip'
     *		Note: Filter must be a Dolibarr Universal Filter syntax string. Example: "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.status:!=:0) or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'alias' the alias used into some old hard coded SQL requests
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalInt("MY_SETUP_PARAM")' or 'isModEnabled("multicurrency")' ...)
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'alwayseditable' says if field can be modified also when status is not draft ('1' or '0')
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 or 2 if field can be used for measure. Field type must be summable like integer or double(24,8). Use 1 in most cases, or 2 if you don't want to see the column total into list (for example for percentage)
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'css'=>'minwidth300 maxwidth500 widthcentpercentminusx', 'cssview'=>'wordbreak', 'csslist'=>'tdoverflowmax200'
     *  'help' and 'helplist' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set a list of values if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel"). Note that type can be 'integer' or 'varchar'
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *	'validate' is 1 if you need to validate the field with $this->validateField(). Need MAIN_ACTIVATE_VALIDATION_RESULT.
     *  'copytoclipboard' is 1 or 2 to allow to add a picto to copy value into clipboard (1=picto after label, 2=picto after value)
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-6,6>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'ID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10),
        'fk_project' => array('type' => 'integer', 'label' => 'Parent', 'enabled' => 1, 'visible' => 1, 'notnull' => 0, 'position' => 12),
        'ref' => array('type' => 'varchar(50)', 'label' => 'Ref', 'enabled' => 1, 'visible' => 1, 'showoncombobox' => 1, 'position' => 15, 'searchall' => 1),
        'title' => array('type' => 'varchar(255)', 'label' => 'ProjectLabel', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 17, 'showoncombobox' => 2, 'searchall' => 1),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => '1', 'enabled' => 1, 'visible' => 3, 'notnull' => 1, 'position' => 19),
        'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'enabled' => 1, 'visible' => 0, 'position' => 20),
        'dateo' => array('type' => 'date', 'label' => 'DateStart', 'enabled' => 1, 'visible' => -1, 'position' => 30),
        'datee' => array('type' => 'date', 'label' => 'DateEnd', 'enabled' => 1, 'visible' => 1, 'position' => 35),
        'description' => array('type' => 'text', 'label' => 'Description', 'enabled' => 1, 'visible' => 3, 'position' => 55, 'searchall' => 1),
        'public' => array('type' => 'integer', 'label' => 'Visibility', 'enabled' => 1, 'visible' => -1, 'position' => 65),
        'fk_opp_status' => array('type' => 'integer:CLeadStatus:core/class/cleadstatus.class.php', 'label' => 'OpportunityStatusShort', 'enabled' => 'getDolGlobalString("PROJECT_USE_OPPORTUNITIES")', 'visible' => 1, 'position' => 75),
        'opp_percent' => array('type' => 'double(5,2)', 'label' => 'OpportunityProbabilityShort', 'enabled' => 'getDolGlobalString("PROJECT_USE_OPPORTUNITIES")', 'visible' => 1, 'position' => 80),
        'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 85, 'searchall' => 1),
        'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 90, 'searchall' => 1),
        'model_pdf' => array('type' => 'varchar(255)', 'label' => 'ModelPdf', 'enabled' => 1, 'visible' => 0, 'position' => 95),
        'date_close' => array('type' => 'datetime', 'label' => 'DateClosing', 'enabled' => 1, 'visible' => 0, 'position' => 105),
        'fk_user_close' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserClosing', 'enabled' => 1, 'visible' => 0, 'position' => 110),
        'opp_amount' => array('type' => 'double(24,8)', 'label' => 'OpportunityAmountShort', 'enabled' => 1, 'visible' => 'getDolGlobalString("PROJECT_USE_OPPORTUNITIES")', 'position' => 115),
        'budget_amount' => array('type' => 'double(24,8)', 'label' => 'Budget', 'enabled' => 1, 'visible' => -1, 'position' => 119),
        'usage_opportunity' => array('type' => 'integer', 'label' => 'UsageOpportunity', 'enabled' => 1, 'visible' => -1, 'position' => 130),
        'usage_task' => array('type' => 'integer', 'label' => 'UsageTasks', 'enabled' => 1, 'visible' => -1, 'position' => 135),
        'usage_bill_time' => array('type' => 'integer', 'label' => 'UsageBillTimeShort', 'enabled' => 1, 'visible' => -1, 'position' => 140),
        'usage_organize_event' => array('type' => 'integer', 'label' => 'UsageOrganizeEvent', 'enabled' => 1, 'visible' => -1, 'position' => 145),
        // Properties for event organization
        'date_start_event' => array('type' => 'date', 'label' => 'DateStartEvent', 'enabled' => "isModEnabled('eventorganization')", 'visible' => 1, 'position' => 200),
        'date_end_event' => array('type' => 'date', 'label' => 'DateEndEvent', 'enabled' => "isModEnabled('eventorganization')", 'visible' => 1, 'position' => 201),
        'location' => array('type' => 'text', 'label' => 'Location', 'enabled' => 1, 'visible' => 3, 'position' => 202, 'searchall' => 1),
        'accept_conference_suggestions' => array('type' => 'integer', 'label' => 'AllowUnknownPeopleSuggestConf', 'enabled' => 1, 'visible' => -1, 'position' => 210),
        'accept_booth_suggestions' => array('type' => 'integer', 'label' => 'AllowUnknownPeopleSuggestBooth', 'enabled' => 1, 'visible' => -1, 'position' => 211),
        'price_registration' => array('type' => 'double(24,8)', 'label' => 'PriceOfRegistration', 'enabled' => 1, 'visible' => -1, 'position' => 212),
        'price_booth' => array('type' => 'double(24,8)', 'label' => 'PriceOfBooth', 'enabled' => 1, 'visible' => -1, 'position' => 215),
        'max_attendees' => array('type' => 'integer', 'label' => 'MaxNbOfAttendees', 'enabled' => 1, 'visible' => -1, 'position' => 215),
        // Generic
        'datec' => array('type' => 'datetime', 'label' => 'DateCreationShort', 'enabled' => 1, 'visible' => -2, 'position' => 400),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModificationShort', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 405),
        'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserCreation', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'position' => 410),
        'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModification', 'enabled' => 1, 'visible' => 0, 'position' => 415),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -1, 'position' => 420),
        'email_msgid' => array('type' => 'varchar(255)', 'label' => 'EmailMsgID', 'enabled' => 1, 'visible' => -1, 'position' => 450, 'help' => 'EmailMsgIDWhenSourceisEmail', 'csslist' => 'tdoverflowmax125'),
        'fk_statut' => array('type' => 'smallint(6)', 'label' => 'Status', 'alias' => 'status', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 500, 'arrayofkeyval' => array(0 => 'Draft', 1 => 'Validated', 2 => 'Closed')),
    );
    // END MODULEBUILDER PROPERTIES
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
     *    @return   int         			Return integer <0 if KO, id of created project if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     * Update a project
     *
     * @param  User		$user       User object of making update
     * @param  int		$notrigger  1=Disable all triggers
     * @return int                  Return integer <=0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     * 	Get object from database
     *
     * 	@param      int		$id       		Id of object to load
     * 	@param		string	$ref			Ref of project
     * 	@param		string	$ref_ext		Ref ext of project
     *  @param		string	$email_msgid	Email msgid
     * 	@return     int      		   		>0 if OK, 0 if not found, <0 if KO
     */
    public function fetch($id, $ref = '', $ref_ext = '', $email_msgid = '')
    {
    }
    /**
     * Fetch object and substitute key
     *
     * @param	int			$id					Project id
     * @param 	string		$key				Key to substitute
     * @param 	bool		$fetched			[=false] Not already fetched
     * @return 	string		Substitute key
     */
    public function fetchAndSetSubstitution($id, $key, $fetched = \false)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Return list of elements for type, linked to a project
     *
     * 	@param	string		$type				'propal','order','invoice','order_supplier','invoice_supplier',...
     * 	@param	string		$tablename			name of table associated of the type
     * 	@param	string		$datefieldname		name of date field for filter
     *  @param	?int		$date_start			Start date
     *  @param	?int		$date_end			End date
     *	@param	string		$projectkey			Equivalent key  to fk_projet for actual type
     * 	@return	array<int,string>|int<-1,-1>|string	Array list of object ids linked to project, < 0 or string if error
     */
    public function get_element_list($type, $tablename, $datefieldname = '', $date_start = \null, $date_end = \null, $projectkey = 'fk_projet')
    {
    }
    /**
     *    Delete a project from database
     *
     *    @param       User		$user            User
     *    @param       int		$notrigger       Disable triggers
     *    @return      int       			      Return integer <0 if KO, 0 if not possible, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * Return the count of a type of linked elements of this project
     *
     * @param string	$type			The type of the linked elements (e.g. 'propal', 'order', 'invoice', 'order_supplier', 'invoice_supplier')
     * @param string	$tablename		The name of table associated of the type
     * @param string	$projectkey 	(optional) Equivalent key to fk_projet for actual type
     * @return integer					The count of the linked elements (the count is zero on request error too)
     */
    public function getElementCount($type, $tablename, $projectkey = 'fk_projet')
    {
    }
    /**
     *  Delete tasks with no children first, then task with children recursively
     *
     *  @param   User	$user		User
     *  @return	 int				Return integer <0 if KO, 1 if OK
     */
    public function deleteTasks($user)
    {
    }
    /**
     * 		Validate a project
     *
     * 		@param		User	$user		   User that validate
     *      @param      int     $notrigger     1=Disable triggers
     * 		@return		int					   Return integer <0 if KO, 0=Nothing done, >0 if KO
     */
    public function setValid($user, $notrigger = 0)
    {
    }
    /**
     * 		Close a project
     *
     * 		@param		User	$user		User that close project
     * 		@return		int					Return integer <0 if KO, 0 if already closed, >0 if OK
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
     * getTooltipContentArray
     * @param array<string,mixed> $params params to construct tooltip data
     * @since v18
     * @return array{picto?:string,ref?:string,refsupplier?:string,label?:string,date?:string,date_echeance?:string,amountht?:string,total_ht?:string,totaltva?:string,amountlt1?:string,amountlt2?:string,amountrevenustamp?:string,totalttc?:string}|array{optimize:string}
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     * 	Return clickable name (with optional picto)
     *
     * 	@param	int<0,2>	$withpicto		          0=No picto, 1=Include picto into link, 2=Only picto
     * 	@param	string		$option			          Variant where the link point to ('', 'nolink')
     * 	@param	int			$addlabel		          0=Default, 1=Add label into string, n>1=Add the n first chars of label in ref, -1=Label replace the ref
     *  @param	string		$moreinpopup	          Text to add into popup
     *  @param	string		$sep			          Separator between ref and label if option addlabel is set
     *  @param	int<0,1>   	$notooltip		          1=Disable tooltip
     *  @param  int<-1,1>	$save_lastsearch_value    -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param	string		$morecss				  More css on a link
     *  @param	string		$save_pageforbacktolist	  Back to this page 'context:url'
     * 	@return	string						          String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $addlabel = 0, $moreinpopup = '', $sep = ' - ', $notooltip = 0, $save_lastsearch_value = -1, $morecss = '', $save_pageforbacktolist = '')
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     * 	id must be 0 if object instance is a specimen.
     *
     *  @return int
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
    public function restrictedProjectArea(\User $user, $mode = 'read')
    {
    }
    /**
     * Return array of projects a user has permission on, is affected to, or all projects
     *
     * @param 	User	$user			User object
     * @param 	int		$mode			0=All project I have permission on (assigned to me or public), 1=Projects assigned to me only, 2=Will return list of all projects with no test on contacts
     * @param 	int		$list			0=Return array, 1=Return string list
     * @param	int		$socid			0=No filter on third party, id of third party
     * @param	string	$filter			Additional filter on project (statut, ref, ...). TODO Use USF syntax here.
     * @return 	int[]|string			Array of projects id, or string with projects id separated with "," if list is 1
     */
    public function getProjectsAuthorizedForUser($user, $mode = 0, $list = 0, $socid = 0, $filter = '')
    {
    }
    /**
     * Load an object from its id and create a new one in database
     *
     *  @param	User			$user		          User making the clone
     *  @param	int				$fromid     	      Id of object to clone
     *  @param	bool|int<0,1>	$clone_contact	      Clone contact of project
     *  @param	bool|int<0,1>	$clone_task		      Clone task of project
     *  @param	bool|int<0,1>	$clone_project_file	  Clone file of project
     *  @param	bool|int<0,1>	$clone_task_file	  Clone file of task (if task are copied)
     *  @param	bool|int<0,1>	$clone_note		      Clone note of project
     *  @param	bool|int<0,1>	$move_date		      Move task date on clone
     *  @param	int<0,1>		$notrigger		      No trigger flag
     *  @param  int				$newthirdpartyid      New thirdparty id
     *  @return	int								      New id of clone
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
     *  @param	Translate	$outputlangs	Object lang to use for translation
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
     * @return 	int						Return integer <0 if OK, >0 if KO
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
     * @return 	int						Return integer <0 if OK, >0 if KO
     */
    public function loadTimeSpentMonth($datestart, $taskid = 0, $userid = 0)
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
     * Function used to replace a thirdparty id with another one.
     *
     * @param DoliDB $dbs 		Database handler
     * @param int $origin_id 	Old thirdparty id
     * @param int $dest_id 		New thirdparty id
     * @return bool
     */
    public static function replaceThirdparty(\DoliDB $dbs, $origin_id, $dest_id)
    {
    }
    /**
     * Load indicators this->nb for the state board
     *
     * @return     int         Return integer <0 if KO, >0 if OK
     */
    public function loadStateBoard()
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
     *	Charge les information d'ordre info dans l'objet commande
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
     * @param 	int[]|int 	$categories 	Category or categories IDs
     * @return 	int							Return integer <0 if KO, >0 if OK
     */
    public function setCategories($categories)
    {
    }
    /**
     * Create an array of tasks of current project
     *
     * @param	?User	$user       		Object user we want project allowed to
     * @param	int		$loadRoleMode		1= will test Roles on task;  0 used in delete project action
     * @return 	int							>0 if OK, <0 if KO
     */
    public function getLinesArray($user, $loadRoleMode = 1)
    {
    }
    /**
     *  Function sending an email to the current project with the text supplied in parameter.
     *  TODO When this is used ?
     *
     *  @param	string	$text				Content of message (not html entities encoded)
     *  @param	string	$subject			Subject of message
     *  @param	string[]	$filename_list      Array of attached files
     *  @param 	string[]	$mimetype_list      Array of mime types of attached files
     *  @param 	string[]	$mimefilename_list  Array of public names of attached files
     *  @param 	string	$addr_cc            Email cc
     *  @param 	string	$addr_bcc           Email bcc
     *  @param 	int		$deliveryreceipt	Ask a delivery receipt
     *  @param	int		$msgishtml			1=String IS already html, 0=String IS NOT html, -1=Unknown need autodetection
     *  @param	string	$errors_to			errors to
     *  @param	string	$moreinheader		Add more html headers
     *  @since V18
     *  @return	int							Return integer <0 if KO, >0 if OK
     */
    public function sendEmail($text, $subject, $filename_list = array(), $mimetype_list = array(), $mimefilename_list = array(), $addr_cc = "", $addr_bcc = "", $deliveryreceipt = 0, $msgishtml = -1, $errors_to = '', $moreinheader = '')
    {
    }
    /**
     *	Return clickable link of object (with eventually picto)
     *
     *	@param	string	    			$option		Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param	?array<string,mixed>	$arraydata	Array of data
     *  @param	string					$size		Size of thumb (''=auto, 'large'=large, 'small'=small)
     *  @return	string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null, $size = '')
    {
    }
    /**
     *  Return array of sub-projects of the current project
     *
     *  @return		stdClass[]	Children of this project as objects with rowid & title as members
     */
    public function getChildren()
    {
    }
    /**
     * Method for calculating weekly hours worked and generating a report
     *
     * @return int   0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function createWeeklyReport()
    {
    }
}