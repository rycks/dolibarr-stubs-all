<?php

//require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class for RecruitmentJobPosition
 */
class RecruitmentJobPosition extends \CommonObject
{
    /**
     * @var string ID of module.
     */
    public $module = 'recruitment';
    /**
     * @var string ID to identify managed object
     */
    public $element = 'recruitmentjobposition';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'recruitment_recruitmentjobposition';
    /**
     * @var string String with name of icon for recruitmentjobposition. Must be the part after the 'object_' into object_recruitmentjobposition.png
     */
    public $picto = 'recruitmentjobposition';
    /**
     * Draft status
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated
     */
    const STATUS_VALIDATED = 1;
    /**
     * Recruited
     */
    const STATUS_RECRUITED = 3;
    /**
     * Canceled
     */
    const STATUS_CANCELED = 9;
    /**
     *  'type' if the field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalString("MY_SETUP_PARAM")'
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'maxwidth200', 'wordbreak', 'tdoverflowmax200'
     *  'help' is a string visible as a tooltip on field
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-6,6>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'visible' => 0, 'noteditable' => 1, 'index' => 1, 'comment' => "Id"), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'position' => 5, 'notnull' => 1, 'default' => '1', 'index' => 1), 'ref' => array('type' => 'varchar(128)', 'label' => 'Ref', 'enabled' => 1, 'position' => 10, 'notnull' => 1, 'visible' => 4, 'noteditable' => 1, 'default' => '(PROV)', 'index' => 1, 'searchall' => 1, 'showoncombobox' => 1, 'comment' => "Reference of object", 'css' => 'nowraponall'), 'label' => array('type' => 'varchar(255)', 'label' => 'JobLabel', 'enabled' => 1, 'position' => 30, 'notnull' => 1, 'visible' => 1, 'searchall' => 1, 'css' => 'minwidth500', 'csslist' => 'tdoverflowmax300', 'showoncombobox' => 2, 'autofocusoncreate' => 1), 'qty' => array('type' => 'integer', 'label' => 'NbOfEmployeesExpected', 'enabled' => 1, 'position' => 45, 'notnull' => 1, 'visible' => 1, 'default' => '1', 'isameasure' => 1, 'css' => 'maxwidth75imp'), 'fk_project' => array('type' => 'integer:Project:projet/class/project.class.php:1', 'label' => 'Project', 'enabled' => '$conf->project->enabled', 'position' => 52, 'notnull' => -1, 'visible' => -1, 'index' => 1, 'css' => 'maxwidth500', 'picto' => 'project'), 'fk_user_recruiter' => array('type' => 'integer:User:user/class/user.class.php:1:(statut:=:1)', 'label' => 'ResponsibleOfRecruitement', 'enabled' => 1, 'position' => 54, 'notnull' => 1, 'visible' => 1, 'foreignkey' => 'user.rowid', 'css' => 'maxwidth500', 'csslist' => 'tdoverflowmax150', 'picto' => 'user'), 'email_recruiter' => array('type' => 'varchar(255)', 'label' => 'EmailRecruiter', 'enabled' => 1, 'position' => 54, 'notnull' => 0, 'visible' => -1, 'help' => 'ToUseAGenericEmail', 'picto' => 'email'), 'fk_user_supervisor' => array('type' => 'integer:User:user/class/user.class.php:1:(statut:=:1)', 'label' => 'FutureManager', 'enabled' => 1, 'position' => 55, 'notnull' => 0, 'visible' => -1, 'foreignkey' => 'user.rowid', 'css' => 'maxwidth500', 'csslist' => 'tdoverflowmax150', 'picto' => 'user'), 'fk_establishment' => array('type' => 'integer:Establishment:hrm/class/establishment.class.php', 'label' => 'Establishment', 'enabled' => '$conf->hrm->enabled', 'position' => 56, 'notnull' => 0, 'visible' => -1, 'foreignkey' => 'establishment.rowid'), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php:1:((status:=:1) AND (entity:IN:__SHARED_ENTITIES__))', 'label' => 'WorkPlace', 'enabled' => 'isModEnabled("societe")', 'position' => 57, 'notnull' => -1, 'visible' => -1, 'css' => 'maxwidth500', 'index' => 1, 'help' => "IfJobIsLocatedAtAPartner", 'picto' => 'company'), 'date_planned' => array('type' => 'date', 'label' => 'DateExpected', 'enabled' => 1, 'position' => 60, 'notnull' => 0, 'visible' => 1), 'remuneration_suggested' => array('type' => 'varchar(255)', 'label' => 'Remuneration', 'enabled' => 1, 'position' => 62, 'notnull' => 0, 'visible' => 1), 'description' => array('type' => 'html', 'label' => 'Description', 'enabled' => 1, 'position' => 65, 'notnull' => 0, 'visible' => 3), 'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'position' => 101, 'notnull' => 0, 'visible' => 0), 'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'position' => 102, 'notnull' => 0, 'visible' => 0), 'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'position' => 500, 'notnull' => 1, 'visible' => -4), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'position' => 501, 'notnull' => 0, 'visible' => -2), 'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'position' => 510, 'notnull' => 1, 'visible' => -2, 'foreignkey' => 'user.rowid'), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'position' => 511, 'notnull' => -1, 'visible' => -2), 'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'LastMainDoc', 'enabled' => 1, 'position' => 900, 'notnull' => 0, 'visible' => 0), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'position' => 1000, 'notnull' => -1, 'visible' => -2), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'position' => 1010, 'notnull' => -1, 'visible' => 0), 'status' => array('type' => 'smallint', 'label' => 'Status', 'enabled' => 1, 'position' => 1000, 'notnull' => 1, 'visible' => 5, 'default' => '0', 'index' => 1, 'arrayofkeyval' => array(0 => 'Draft', 1 => 'Validated', 3 => 'Recruited', 9 => 'Canceled')));
    /**
     * @var int
     */
    public $rowid;
    /**
     * @var string ref
     */
    public $ref;
    /**
     * @var int
     */
    public $entity;
    /**
     * @var string label
     */
    public $label;
    /**
     * @var float Quantity
     */
    public $qty;
    /**
     * @var int ID thirdparty
     */
    public $fk_soc;
    /**
     * @var int ID project
     */
    public $fk_project;
    /**
     * @var int
     */
    public $fk_user_recruiter;
    /**
     * @var string recruiter email
     */
    public $email_recruiter;
    /**
     * @var string suggested remuneration
     */
    public $remuneration_suggested;
    /**
     * @var int
     */
    public $fk_user_supervisor;
    /**
     * @var int
     */
    public $fk_establishment;
    /**
     * @var int
     */
    public $date_planned;
    /**
     * @var string
     */
    public $description;
    /**
     * @var string
     */
    public $note_public;
    /**
     * @var string
     */
    public $note_private;
    /**
     * @var int
     */
    public $fk_user_creat;
    /**
     * @var int
     */
    public $fk_user_modif;
    /**
     * @var string
     */
    public $last_main_doc;
    /**
     * @var string
     */
    public $import_key;
    /**
     * @var string
     */
    public $model_pdf;
    /**
     * @var int
     */
    public $status;
    // END MODULEBUILDER PROPERTIES
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param  User $user      User that creates
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
     * @return int             Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Clone an object into another one
     *
     * @param  	User 	$user      	User that creates
     * @param  	int 	$fromid     Id of object to clone
     * @return 	mixed 				New object created, <0 if KO
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id   Id object
     * @param string $ref  Ref
     * @return int         Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null)
    {
    }
    /**
     * Load object lines in memory from the database
     *
     * @return int         Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetchLines()
    {
    }
    /**
     * Load list of objects in memory from the database.
     *
     * @param  string      	$sortorder    	Sort Order
     * @param  string      	$sortfield    	Sort field
     * @param  int         	$limit        	limit
     * @param  int         	$offset       	Offset
     * @param  string		$filter       	Filter as an Universal Search string.
     * 										Example: '((client:=:1) OR ((client:>=:2) AND (client:<=:3))) AND (client:!=:8) AND (nom:like:'a%')'
     * @param  string      	$filtermode   	No more used
     * @return self[]|int                 	int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = '', $filtermode = 'AND')
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
     * @return int             Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param User 	$user       User that deletes
     * @param int 	$notrigger  0=launch triggers after, 1=disable triggers
     * @return int             	Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     *  Delete a line of object in database
     *
     *	@param  User	$user       User that delete
     *  @param	int		$idline		Id of line to delete
     *  @param 	int 	$notrigger  0=launch triggers after, 1=disable triggers
     *  @return int         		Return >0 if OK, <0 if KO
     */
    public function deleteLine(\User $user, $idline, $notrigger = 0)
    {
    }
    /**
     *	Validate object
     *
     *	@param		User	$user     		User making status change
     *  @param		int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return  	int						Return integer <=0 if OK, 0=Nothing done, >0 if KO
     */
    public function validate($user, $notrigger = 0)
    {
    }
    /**
     *	Set draft status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function setDraft($user, $notrigger = 0)
    {
    }
    /**
     *	Set cancel status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int						Return integer <0 if KO, 0=Nothing done, >0 if OK
     */
    public function cancel($user, $notrigger = 0)
    {
    }
    /**
     *	Close the recruitment
     *
     *	@param      User		$user		Object user that close
     *	@param      int			$status		Statut
     *	@param      string		$note		Complete private note with this note
     *  @param		int<0,1>	$notrigger	1=Does not execute triggers, 0=Execute triggers
     *	@return     int			     		Return integer <0 if KO, >0 if OK
     */
    public function cloture($user, $status, $note = "", $notrigger = 0)
    {
    }
    /**
     *	Set back to validated status
     *
     *	@param	User		$user			Object user that modify
     *  @param	int<0,1>	$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int							Return integer <0 if KO, 0=Nothing done, >0 if OK
     */
    public function reopen($user, $notrigger = 0)
    {
    }
    /**
     *  Return a link to the object card (with optionally the picto)
     *
     *  @param  int<0,2>	$withpicto                  Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *  @param  string		$option                     On what the link point to ('nolink', ...)
     *  @param  int<0,1>	$notooltip                  1=Disable tooltip
     *  @param  string		$morecss                    Add more css on link
     *  @param  int<-1,1>	$save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @return	string									String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *  Return label of the status
     *
     *  @param  int<0,6>	$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string				       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the status
     *
     *  @param	int			$status        Id status
     *  @param  int<0,6>	$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 			       Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     *	Load the info information in the object
     *
     *	@param  int		$id       Id of object
     *	@return	void
     */
    public function info($id)
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
     * 	Create an array of lines
     *
     * 	@return CommonObjectLine[]|int		array of lines if OK, <0 if KO
     */
    public function getLinesArray()
    {
    }
    /**
     *  Returns the reference to the following non used object depending on the active numbering module.
     *
     *  @return string      		Object free reference
     */
    public function getNextNumRef()
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *  @param	    string		$modele			Force template to use ('' to not force)
     *  @param		Translate	$outputlangs	object lang a utiliser pour traduction
     *  @param      int<0,1>	$hidedetails    Hide details of lines
     *  @param      int<0,1>	$hidedesc       Hide description
     *  @param      int<0,1>	$hideref        Hide ref
     *  @param      ?array<string,mixed>  $moreparams     Array to provide more information
     *  @return     int         				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
    /**
     * Action executed by scheduler
     * CAN BE A CRON TASK. In such a case, parameters come from the schedule job setup field 'Parameters'
     * Use public function doScheduledJob($param1, $param2, ...) to get parameters
     *
     * @return	int			0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function doScheduledJob()
    {
    }
    /**
     *	Return clickable link of object (with eventually picto)
     *
     *	@param	string	    			$option		Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param	?array<string,mixed>	$arraydata	Array of data
     *  @return	string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
}