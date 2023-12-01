<?php

//require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class for ConferenceOrBoothAttendee
 */
class ConferenceOrBoothAttendee extends \CommonObject
{
    /**
     * @var string ID of module.
     */
    public $module = 'eventorganization';
    /**
     * @var string ID to identify managed object.
     */
    public $element = 'conferenceorboothattendee';
    /**
     * @var string Name of table without prefix where object is stored. This is also the key used for extrafields management.
     */
    public $table_element = 'eventorganization_conferenceorboothattendee';
    /**
     * @var int  Does this object support multicompany module ?
     * 0=No test on entity, 1=Test with field entity, 'field@table'=Test with link by field@table
     */
    public $ismultientitymanaged = 0;
    /**
     * @var int  Does object support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 1;
    /**
     * @var string String with name of icon for conferenceorboothattendee. Must be the part after the 'object_' into object_conferenceorboothattendee.png
     */
    public $picto = 'contact';
    public $paid = 0;
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
    const STATUS_CANCELED = 9;
    /**
     *  'type' field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter]]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'text:none', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or '$conf->global->MY_SETUP_PARAM)
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommanded to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'maxwidth200', 'wordbreak', 'tdoverflowmax200'
     *  'help' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
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
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => '1', 'position' => 1, 'notnull' => 1, 'visible' => 0, 'noteditable' => '1', 'index' => 1, 'css' => 'left', 'comment' => "Id"), 'ref' => array('type' => 'varchar(128)', 'label' => 'Ref', 'enabled' => '1', 'position' => 10, 'notnull' => 1, 'visible' => 2, 'index' => 1, 'comment' => "Reference of object"), 'fk_actioncomm' => array('type' => 'integer:ActionComm:comm/action/class/actioncomm.class.php:1', 'label' => 'ConferenceOrBooth', 'enabled' => '1', 'position' => 55, 'notnull' => 0, 'visible' => 0, 'index' => 1, 'picto' => 'agenda'), 'fk_project' => array('type' => 'integer:Project:projet/class/project.class.php:1', 'label' => 'Project', 'enabled' => '$conf->project->enabled', 'position' => 20, 'notnull' => 1, 'visible' => 0, 'index' => 1, 'picto' => 'project', 'css' => 'tdoverflowmax150 maxwidth500'), 'email' => array('type' => 'mail', 'label' => 'EmailAttendee', 'enabled' => '1', 'position' => 30, 'notnull' => 1, 'visible' => 1, 'index' => 1, 'autofocusoncreate' => 1, 'searchall' => 1), 'firstname' => array('type' => 'varchar(100)', 'label' => 'Firstname', 'enabled' => '1', 'position' => 31, 'notnull' => 0, 'visible' => 1, 'index' => 1, 'searchall' => 1), 'lastname' => array('type' => 'varchar(100)', 'label' => 'Lastname', 'enabled' => '1', 'position' => 32, 'notnull' => 0, 'visible' => 1, 'index' => 1, 'searchall' => 1), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php:1:status = 1 AND entity IN (__SHARED_ENTITIES__)', 'label' => 'ThirdParty', 'enabled' => '$conf->societe->enabled', 'position' => 40, 'notnull' => -1, 'visible' => 1, 'index' => 1, 'help' => "OrganizationEventLinkToThirdParty", 'picto' => 'company', 'css' => 'tdoverflowmax150 maxwidth500'), 'date_subscription' => array('type' => 'datetime', 'label' => 'DateOfRegistration', 'enabled' => '1', 'position' => 56, 'notnull' => 1, 'visible' => 1, 'showoncombobox' => '1'), 'fk_invoice' => array('type' => 'integer:Facture:compta/facture/class/facture.class.php', 'label' => 'Invoice', 'enabled' => '$conf->facture->enabled', 'position' => 57, 'notnull' => 0, 'visible' => -1, 'index' => 0, 'picto' => 'bill', 'css' => 'tdoverflowmax150 maxwidth500'), 'amount' => array('type' => 'price', 'label' => 'AmountPaid', 'enabled' => '1', 'position' => 57, 'notnull' => 0, 'visible' => 1, 'default' => 'null', 'isameasure' => '1', 'help' => "AmountOfSubscriptionPaid"), 'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => '1', 'position' => 61, 'notnull' => 0, 'visible' => 3), 'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => '1', 'position' => 62, 'notnull' => 0, 'visible' => 3), 'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => '1', 'position' => 500, 'notnull' => 1, 'visible' => -2), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => '1', 'position' => 501, 'notnull' => 0, 'visible' => -2), 'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => '1', 'position' => 510, 'notnull' => -1, 'visible' => -2), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => '1', 'position' => 511, 'notnull' => -1, 'visible' => -2), 'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'LastMainDoc', 'enabled' => '1', 'position' => 600, 'notnull' => 0, 'visible' => 0), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => '1', 'position' => 1000, 'notnull' => -1, 'visible' => -2), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => '1', 'position' => 1010, 'notnull' => -1, 'visible' => 0), 'status' => array('type' => 'smallint', 'label' => 'Status', 'enabled' => '1', 'position' => 1000, 'default' => 0, 'notnull' => 1, 'visible' => 1, 'index' => 1, 'arrayofkeyval' => array('0' => 'Draft', '1' => 'Validated', '9' => 'Canceled')));
    public $rowid;
    public $ref;
    public $fk_soc;
    public $fk_actioncomm;
    public $email;
    public $firstname;
    public $lastname;
    public $date_subscription;
    public $fk_invoice;
    public $amount;
    public $note_public;
    public $note_private;
    public $date_creation;
    public $tms;
    public $fk_user_creat;
    public $fk_user_modif;
    public $last_main_doc;
    public $import_key;
    public $model_pdf;
    public $status;
    // END MODULEBUILDER PROPERTIES
    // If this object has a subtable with lines
    // /**
    //  * @var string    Name of subtable line
    //  */
    // public $table_element_line = 'eventorganization_conferenceorboothattendeeline';
    // /**
    //  * @var string    Field with ID of parent key if this object has a parent
    //  */
    // public $fk_element = 'fk_conferenceorboothattendee';
    // /**
    //  * @var string    Name of subtable class that manage subtable lines
    //  */
    // public $class_element_line = 'ConferenceOrBoothAttendeeline';
    // /**
    //  * @var array	List of child tables. To test if we can delete object.
    //  */
    // protected $childtables = array();
    // /**
    //  * @var array    List of child tables. To know object to delete on cascade.
    //  *               If name matches '@ClassNAme:FilePathClass;ParentFkFieldName' it will
    //  *               call method deleteByParentField(parentId, ParentFkFieldName) to fetch and delete child object
    //  */
    // protected $childtablesoncascade = array('eventorganization_conferenceorboothattendeedet');
    // /**
    //  * @var ConferenceOrBoothAttendeeLine[]     Array of subtable lines
    //  */
    // public $lines = array();
    /**
     * Constructor
     *
     * @param DoliDb $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param  User $user      User that creates
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = \false)
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
     * @return int         <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null)
    {
    }
    /**
     * Load object lines in memory from the database
     *
     * @return int         <0 if KO, 0 if not found, >0 if OK
     */
    public function fetchLines()
    {
    }
    /**
     * Load list of objects in memory from the database.
     *
     * @param  string      $sortorder    Sort Order
     * @param  string      $sortfield    Sort field
     * @param  int         $limit        limit
     * @param  int         $offset       Offset
     * @param  array       $filter       Filter array. Example array('field'=>'valueforlike', 'customurl'=>...). WARNING: customerurl must be a sanitized SQL string.
     * @param  string      $filtermode   Filter mode (AND or OR)
     * @return array|int                 int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, array $filter = array(), $filtermode = 'AND')
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = \false)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user       User that deletes
     * @param bool $notrigger  false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
    /**
     *  Delete a line of object in database
     *
     *	@param  User	$user       User that delete
     *  @param	int		$idline		Id of line to delete
     *  @param 	bool 	$notrigger  false=launch triggers after, true=disable triggers
     *  @return int         		>0 if OK, <0 if KO
     */
    public function deleteLine(\User $user, $idline, $notrigger = \false)
    {
    }
    /**
     *	Validate object
     *
     *	@param		User	$user     		User making status change
     *  @param		int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return  	int						<=0 if OK, 0=Nothing done, >0 if KO
     */
    public function validate($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *		Load the project with id $this->fk_project into this->project
     *
     *		@return		int			<0 if KO, >=0 if OK
     */
    public function fetch_projet()
    {
    }
    /**
     *	Set draft status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int						<0 if KO, >0 if OK
     */
    public function setDraft($user, $notrigger = 0)
    {
    }
    /**
     *	Set cancel status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int						<0 if KO, 0=Nothing done, >0 if OK
     */
    public function cancel($user, $notrigger = 0)
    {
    }
    /**
     *	Set back to validated status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int						<0 if KO, 0=Nothing done, >0 if OK
     */
    public function reopen($user, $notrigger = 0)
    {
    }
    /**
     *  Return a link to the object card (with optionaly the picto)
     *
     *  @param  int     $withpicto                  Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *  @param  string  $option                     On what the link point to ('nolink', ...)
     *  @param  int     $notooltip                  1=Disable tooltip
     *  @param  string  $morecss                    Add more css on link
     *  @param  int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @return	string                              String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLabelStatus($mode = 0)
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the status
     *
     *  @param	int		$status        Id status
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
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
     * @return void
     */
    public function initAsSpecimen()
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
     *  @param		Translate	$outputlangs	objet lang a utiliser pour traduction
     *  @param      int			$hidedetails    Hide details of lines
     *  @param      int			$hidedesc       Hide description
     *  @param      int			$hideref        Hide ref
     *  @param      null|array  $moreparams     Array to provide more information
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
}
/**
 * Class ConferenceOrBoothAttendeeLine. You can also remove this and generate a CRUD class for lines objects.
 */
class ConferenceOrBoothAttendeeLine extends \CommonObjectLine
{
    // To complete with content of an object ConferenceOrBoothAttendeeLine
    // We should have a field rowid, fk_conferenceorboothattendee and position
    /**
     * @var int  Does object support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 0;
    /**
     * Constructor
     *
     * @param DoliDb $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
}