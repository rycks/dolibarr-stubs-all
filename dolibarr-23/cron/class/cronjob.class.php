<?php

/**
 *	Cron Job class
 */
class Cronjob extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'cronjob';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'cronjob';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'cron';
    /**
     * @var ?string Job type
     */
    public $jobtype;
    /**
     * @var string|int     Date for cron job create
     */
    public $datec = '';
    /**
     * @var ?string Cron Job label
     */
    public $label;
    /**
     * @var ?string Job command
     */
    public $command;
    /**
     * @var null|string
     */
    public $classesname;
    /**
     * @var null|string
     */
    public $objectname;
    /**
     * @var null|string
     */
    public $methodename;
    /**
     * @var null|string
     */
    public $params;
    /**
     * @var null|string
     */
    public $md5params;
    /**
     * @var null|string
     */
    public $module_name;
    /**
     * @var null|int|string
     */
    public $priority;
    /**
     * @var string|int|null		Date for last job execution
     */
    public $datelastrun = '';
    /**
     * @var string|int|null			Date for next job execution
     */
    public $datenextrun = '';
    /**
     * @var string|int|null			Date for end job execution
     */
    public $dateend = '';
    /**
     * @var string|int|null			Date for first start job execution
     */
    public $datestart = '';
    /**
     * @var string|int|null		Date for last result job execution
     */
    public $datelastresult = '';
    /**
     * @var ?string			Last result from end job execution
     */
    public $lastresult;
    /**
     * @var ?string 			Last output from end job execution
     */
    public $lastoutput;
    /**
     * @var ?string 			Unit frequency of job execution ('60', '86400', 'd', 'm', ...)
     */
    public $unitfrequency;
    /**
     * @var ?int 			Frequency of job execution
     */
    public $frequency;
    /**
     * @var ?int 			Status
     */
    public $status;
    /**
     * @var ?int 			Is job running ?
     */
    public $processing;
    /**
     * @var int|null		The job current PID
     */
    public $pid;
    /**
     * @var ?string 			Email when an error occurs
     */
    public $email_alert;
    /**
     * @var int 			User ID of creation
     */
    public $fk_user_author;
    /**
     * @var ?int 			User ID of last modification
     */
    public $fk_user_mod;
    /**
     * @var ?int 			Number of run job execution
     */
    public $nbrun;
    /**
     * @var ?int 			Maximum run job execution
     */
    public $maxrun;
    /**
     * @var ?string 			Libname
     */
    public $libname;
    /**
     * @var ?string 			A test condition to know if job is visible/qualified
     */
    public $test;
    /**
     * @var ?string 			Autodelete
     */
    public $autodelete;
    /**
     * @var CommonObjectLine[] 			Cronjob
     */
    public $lines;
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;
    const STATUS_ARCHIVED = 2;
    const MAXIMUM_LENGTH_FOR_LASTOUTPUT_FIELD = 65535;
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
     *  	'email', 'phone', 'url', 'password', 'ip'
     *		Note: Filter must be a Dolibarr Universal Filter syntax string. Example: "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.status:!=:0) or (t.nature:is:NULL)"
     *  'length' the length of field. Example: 255, '24,8'
     *  'label' the translation key.
     *  'langfile' the key of the language file for translation.
     *  'alias' the alias used into some old hard coded SQL requests
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalInt("MY_SETUP_PARAM")' or 'isModEnabled("multicurrency")' ...)
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form (not create). 5=Visible on list and view form (not create/not update). 6=visible on list and update/view form (not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'alwayseditable' says if field can be modified also when status is not draft ('1' or '0')
     *  'default' is a default value for creation (can still be overwritten by the Setup of Default Values if the field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 or 2 if field can be used for measure. Field type must be summable like integer or double(24,8). Use 1 in most cases, or 2 if you don't want to see the column total into list (for example for percentage)
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'css'=>'minwidth300 maxwidth500 widthcentpercentminusx', 'cssview'=>'wordbreak', 'csslist'=>'tdoverflowmax200'
     *  'placeholder' to set the placeholder of a varchar field.
     *  'help' and 'helplist' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code like the constructor of the class.
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
     * @inheritdoc
     * Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        "rowid" => array("type" => "integer", "label" => "Ref", "enabled" => "1", 'position' => 10, 'notnull' => 1, "visible" => "1"),
        "label" => array("type" => "varchar(255)", "label" => "Label", "enabled" => "1", 'position' => 30, 'notnull' => 1, "visible" => "1", "alwayseditable" => "1", "css" => "minwidth300", "cssview" => "wordbreak", "csslist" => "tdoverflowmax150"),
        "params" => array("type" => "text", "label" => "Params", "enabled" => "1", 'position' => 55, 'notnull' => 0, "visible" => "0"),
        "md5params" => array("type" => "varchar(32)", "label" => "Md5params", "enabled" => "1", 'position' => 60, 'notnull' => 0, "visible" => "0"),
        "module_name" => array("type" => "varchar(255)", "label" => "Module", "enabled" => "1", 'position' => 65, 'notnull' => 0, "visible" => "1"),
        "jobtype" => array("type" => "varchar(10)", "label" => "Type", "enabled" => "1", 'position' => 68, 'notnull' => 1, "visible" => "1"),
        //"command" => array("type" => "varchar(255)", "label" => "Command", "enabled" => "1", 'position' => 35, 'notnull' => 0, "visible" => "-1",),
        //"classesname" => array("type" => "varchar(255)", "label" => "Classesname", "enabled" => "1", 'position' => 40, 'notnull' => 0, "visible" => "-1",),
        //"objectname" => array("type" => "varchar(255)", "label" => "Objectname", "enabled" => "1", 'position' => 45, 'notnull' => 0, "visible" => "-1",),
        //"methodename" => array("type" => "varchar(255)", "label" => "Methodename", "enabled" => "1", 'position' => 50, 'notnull' => 0, "visible" => "-1",),
        "priority" => array("type" => "integer", "label" => "Priority", "enabled" => "1", 'position' => 70, 'notnull' => 0, "visible" => "0"),
        "datelastrun" => array("type" => "datetime", "label" => "Datelastrun", "enabled" => "1", 'position' => 75, 'notnull' => 0, "visible" => "-1"),
        "datenextrun" => array("type" => "datetime", "label" => "Datenextrun", "enabled" => "1", 'position' => 80, 'notnull' => 0, "visible" => "1"),
        //"datestart" => array("type" => "datetime", "label" => "Datestart", "enabled" => "1", 'position' => 85, 'notnull' => 0, "visible" => "0",),
        //"dateend" => array("type" => "datetime", "label" => "Dateend", "enabled" => "1", 'position' => 90, 'notnull' => 0, "visible" => "0",),
        "datelastresult" => array("type" => "datetime", "label" => "Datelastresult", "enabled" => "1", 'position' => 95, 'notnull' => 0, "visible" => "0"),
        "lastresult" => array("type" => "text", "label" => "Lastresult", "enabled" => "1", 'position' => 100, 'notnull' => 0, "visible" => "1"),
        "lastoutput" => array("type" => "text", "label" => "Lastoutput", "enabled" => "1", 'position' => 105, 'notnull' => 0, "visible" => "-1"),
        //"frequency" => array("type" => "integer", "label" => "Frequency", "enabled" => "1", 'position' => 115, 'notnull' => 1, "visible" => "1",),
        //"unitfrequency" => array("type" => "varchar(255)", "label" => "Unitfrequency", "enabled" => "1", 'position' => 116, 'notnull' => 1, "visible" => "1",),
        "nbrun" => array("type" => "integer", "label" => "Nbrun", "enabled" => "1", 'position' => 120, 'notnull' => 0, "visible" => "1"),
        "fk_user_author" => array("type" => "integer", "label" => "UserCreation", "picto" => "user", "enabled" => "1", 'position' => 130, 'notnull' => 0, "visible" => "-1", "css" => "maxwidth500 widthcentpercentminusxx"),
        "fk_user_mod" => array("type" => "integer", "label" => "UserModification", "picto" => "user", "enabled" => "1", 'position' => 135, 'notnull' => 0, "visible" => "-1", "css" => "maxwidth500 widthcentpercentminusxx"),
        "note" => array("type" => "text", "label" => "Note", "enabled" => "1", 'position' => 140, 'notnull' => 0, "visible" => "0"),
        "libname" => array("type" => "varchar(255)", "label" => "Libname", "enabled" => "1", 'position' => 145, 'notnull' => 0, "visible" => "0"),
        "maxrun" => array("type" => "integer", "label" => "Maxrun", "enabled" => "1", 'position' => 155, 'notnull' => 1, "visible" => "0"),
        "autodelete" => array("type" => "integer", "label" => "Autodelete", "enabled" => "1", 'position' => 160, 'notnull' => 0, "visible" => "0"),
        "fk_mailing" => array("type" => "integer", "label" => "Fkmailing", "enabled" => "1", 'position' => 165, 'notnull' => 0, "visible" => "0", "css" => "maxwidth500 widthcentpercentminusxx"),
        "test" => array("type" => "varchar(255)", "label" => "Test", "enabled" => "1", 'position' => 170, 'notnull' => 0, "visible" => "0"),
        "processing" => array("type" => "integer", "label" => "Processing", "enabled" => "1", 'position' => 175, 'notnull' => 1, "visible" => "0"),
        "email_alert" => array("type" => "varchar(128)", "label" => "Emailalert", "enabled" => "1", 'position' => 180, 'notnull' => 0, "visible" => "0"),
        "pid" => array("type" => "integer", "label" => "Pid", "enabled" => "1", 'position' => 185, 'notnull' => 0, "visible" => "0"),
        "tms" => array("type" => "timestamp", "label" => "DateModification", "enabled" => "1", 'position' => 300, 'notnull' => 1, "visible" => "-1"),
        "datec" => array("type" => "datetime", "label" => "DateCreation", "enabled" => "1", 'position' => 301, 'notnull' => 0, "visible" => "-1"),
        "status" => array("type" => "integer", "label" => "Status", "enabled" => "1", 'position' => 500, 'notnull' => 1, "visible" => "1"),
    );
    // END MODULEBUILDER PROPERTIES
    /**
     *  Constructor
     *
     *  @param	DoliDB		$db		Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param	User	$user		User that creates
     * @param  int		$notrigger	0=launch triggers after, 1=disable triggers
     * @return int					if KO: <0 || if OK: Id of created object
     */
    public function create(\User $user, int $notrigger = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param	int			$id				Id object
     * @param	string		$objectname		Object name
     * @param	string		$methodname		Method name
     * @param	string		$label			Label
     * @return	int							if KO: <0 || if OK: >0
     */
    public function fetch(int $id, string $objectname = '', string $methodname = '', string $label = '')
    {
    }
    /**
     * Load list of cron jobs in a memory array from the database
     *
     * @param	string			$sortorder		Sort order
     * @param	string			$sortfield		Sort field
     * @param	int				$limit			Limit page
     * @param	int				$offset			Offset ppage
     * @param	int<-1,2>		$status			Display active or not (-1=no filter, 0=not active, 1=active, 2=archived)
     * @param	string|array<string,string>	$filter	Filter USF.
     * @param	int<-1,1>		$processing		Processing or not (-1=all, 0=not in progress, 1=in progress)
     * @return	int								if KO: <0 || if OK: >0
     */
    public function fetchAll(string $sortorder = 'DESC', string $sortfield = 't.rowid', int $limit = 0, int $offset = 0, int $status = 1, $filter = '', int $processing = -1)
    {
    }
    /**
     * Update object into database
     *
     * @param	?User		$user		User that modifies
     * @param	int<0,1>	$notrigger	0=launch triggers after, 1=disable triggers
     * @return	int						if KO: <0 || if OK: >0
     */
    public function update($user = \null, int $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param	User	$user		User that deletes
     * @param	int		$notrigger	0=launch triggers after, 1=disable triggers
     * @return	int					if KO: <0 || if OK: >0
     */
    public function delete(\User $user, int $notrigger = 0)
    {
    }
    /**
     * Load an object from its id and create a new one in database
     *
     * @param	User	$user		User making the clone
     * @param	int		$fromid		Id of object to clone
     * @return	int					New id of clone
     */
    public function createFromClone(\User $user, int $fromid)
    {
    }
    /**
     * Initialise object with example values
     * Id must be 0 if object instance is a specimen
     *
     * @return int
     */
    public function initAsSpecimen()
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
     * Return a link to the object card (with optionally the picto)
     *
     * @param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     * @param	string	$option						On what the link point to ('nolink', ...)
     * @param	int		$notooltip					1=Disable tooltip
     * @param	string	$morecss					Add more css on link
     * @param	int		$save_lastsearch_value		-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     * @return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, string $option = '', int $notooltip = 0, string $morecss = '', int $save_lastsearch_value = -1)
    {
    }
    /**
     * Load object information
     *
     * @param	int		$id		ID
     * @return	int				if KO: <0 || if OK: >0
     */
    public function info(int $id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Run a job.
     * Once job is finished, status and nb of run is updated.
     * This function does not plan the next run. This is done by function ->reprogram_jobs
     *
     * @param	string		$userlogin		User login
     * @return	int					 		if KO: <0 || if OK: >0
     */
    public function run_jobs(string $userlogin)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Reprogram a job
     *
     * @param	string		$userlogin		User login
     * @param	integer		$now			Date returned by dol_now()
     * @return	int							if KO: <0 || if OK: >0
     */
    public function reprogram_jobs(string $userlogin, int $now)
    {
    }
    /**
     * Return label of status of user (active, inactive)
     *
     * @param	int		$mode			0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * @return	string					Label of status
     */
    public function getLibStatut(int $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return label of a giver status
     *
     * @param	int		$status				Id status
     * @param	int		$mode				0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * @param	int		$processing			0=Not running, 1=Running
     * @param	string	$lastResult			Value of last result (''=no error, error otherwise)
     * @return	string						Label of status
     */
    public function LibStatut(int $status, int $mode = 0, int $processing = 0, string $lastResult = '')
    {
    }
}