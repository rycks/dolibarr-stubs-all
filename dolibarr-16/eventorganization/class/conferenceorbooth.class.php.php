<?php

//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class for ConferenceOrBooth
 */
class ConferenceOrBooth extends \ActionComm
{
    /**
     * @var string ID of module.
     */
    public $module = 'eventorganization';
    /**
     * @var string ID to identify managed object.
     */
    public $element = 'conferenceorbooth';
    /**
     * @var string Name of table without prefix where object is stored. This is also the key used for extrafields management.
     */
    public $table_element = 'actioncomm';
    /**
     * @var int  Does this object support multicompany module ?
     * 0=No test on entity, 1=Test with field entity, 'field@table'=Test with link by field@table
     */
    public $ismultientitymanaged = 1;
    /**
     * @var int  Does object support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 1;
    /**
     * @var string String with name of icon for conferenceorbooth. Must be the part after the 'object_' into object_conferenceorbooth.png
     */
    public $picto = 'conferenceorbooth';
    const STATUS_DRAFT = 0;
    const STATUS_SUGGESTED = 1;
    const STATUS_CONFIRMED = 2;
    const STATUS_NOT_QUALIFIED = 3;
    const STATUS_DONE = 4;
    const STATUS_CANCELED = 9;
    /**
     *  'type' field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]', 'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter]]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'text:none', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
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
    public $fields = array('id' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => '1', 'position' => 1, 'notnull' => 1, 'visible' => 0, 'noteditable' => '1', 'index' => 1, 'css' => 'left', 'comment' => "Id"), 'ref' => array('type' => 'integer', 'label' => 'Ref', 'enabled' => '1', 'position' => 1, 'notnull' => 1, 'visible' => 2, 'noteditable' => '1', 'index' => 1, 'css' => 'left', 'comment' => "Id"), 'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'enabled' => '1', 'position' => 30, 'notnull' => 0, 'visible' => 1, 'searchall' => 1, 'css' => 'minwidth300', 'csslist' => 'tdoverflowmax125', 'help' => "OrganizationEvenLabelName", 'showoncombobox' => '1'), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php:1:status=1 AND entity IN (__SHARED_ENTITIES__)', 'label' => 'ThirdParty', 'enabled' => '$conf->societe->enabled', 'position' => 50, 'notnull' => -1, 'visible' => 1, 'index' => 1, 'help' => "OrganizationEventLinkToThirdParty", 'picto' => 'company', 'css' => 'tdoverflowmax150 maxwidth500'), 'fk_project' => array('type' => 'integer:Project:projet/class/project.class.php:1:t.usage_organize_event=1', 'label' => 'Project', 'enabled' => '$conf->project->enabled', 'position' => 52, 'notnull' => -1, 'visible' => -1, 'index' => 1, 'picto' => 'project', 'css' => 'tdoverflowmax150 maxwidth500'), 'note' => array('type' => 'text', 'label' => 'Description', 'enabled' => '1', 'position' => 60, 'notnull' => 0, 'visible' => 1), 'fk_action' => array('type' => 'sellist:c_actioncomm:libelle:id::module LIKE (\'%@eventorganization\')', 'label' => 'Format', 'enabled' => '1', 'position' => 60, 'notnull' => 1, 'visible' => 1, 'css' => 'width300'), 'datep' => array('type' => 'datetime', 'label' => 'DateStart', 'enabled' => '1', 'position' => 70, 'notnull' => 0, 'visible' => 1, 'showoncombobox' => '2'), 'datep2' => array('type' => 'datetime', 'label' => 'DateEnd', 'enabled' => '1', 'position' => 71, 'notnull' => 0, 'visible' => 1, 'showoncombobox' => '3'), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => '1', 'position' => 500, 'notnull' => 1, 'visible' => -2), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => '1', 'position' => 501, 'notnull' => 0, 'visible' => -2), 'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => '1', 'position' => 510, 'notnull' => 1, 'visible' => -2, 'foreignkey' => 'user.rowid'), 'fk_user_mod' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => '1', 'position' => 511, 'notnull' => -1, 'visible' => -2), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => '1', 'position' => 1000, 'notnull' => -1, 'visible' => -2), 'status' => array('type' => 'smallint', 'label' => 'Status', 'enabled' => '1', 'position' => 1000, 'notnull' => 1, 'visible' => 1, 'default' => '0', 'index' => 1, 'arrayofkeyval' => array('0' => 'EvntOrgDraft', '1' => 'EvntOrgSuggested', '2' => 'EvntOrgConfirmed', '3' => 'EvntOrgNotQualified', '4' => 'EvntOrgDone', '9' => 'EvntOrgCancelled')), 'num_vote' => array('type' => 'smallint', 'label' => 'NbVotes', 'enabled' => '1', 'position' => 1001, 'notnull' => -1, 'visible' => 5, 'default' => '0', 'index' => 0));
    public $rowid;
    public $id;
    public $label;
    public $fk_soc;
    public $fk_project;
    public $note;
    public $fk_action;
    public $datec;
    public $tms;
    public $fk_user_author;
    public $fk_user_mod;
    public $import_key;
    public $status;
    // END MODULEBUILDER PROPERTIES
    //public $pubregister;
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
     * Set Percentage from status
     *
     * @return void
     */
    protected function setPercentageFromStatus()
    {
    }
    /**
     * Set action comm fields
     *
     * @param User $user User
     * @return void
     */
    protected function setActionCommFields(\User $user)
    {
    }
    /**
     * Get action comm fields
     *
     * @return void
     */
    protected function getActionCommFields()
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id   Id object
     * @param string $ref  Ref
     * @param  string	$ref_ext		Ref ext to get
     * @param	string	$email_msgid	Email msgid
     * @param int 		$loadresources	1=Load also resources
     * @return int         <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null, $ref_ext = '', $email_msgid = '', $loadresources = 1)
    {
    }
    /**
     * Load list of objects in memory from the database.
     *
     * @param  string      $sortorder    Sort Order
     * @param  string      $sortfield    Sort field
     * @param  int         $limit        limit
     * @param  int         $offset       Offset
     * @param  array       $filter       Filter array. Example array('field'=>'valueforlike', 'customurl'=>...)
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
     * @param bool $notrigger  false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, >0 if OK
     */
    public function delete($notrigger = \false)
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
     *  @param	int		$maxlength					Not use here just for declaration method compatibility with parent classes
     *  @param	string	$classname					Not use here just for declaration method compatibility with parent classes
     *  @param  string  $option                     On what the link point to ('nolink', ...)
     *  @param	int		$overwritepicto				Not use here just for declaration method compatibility with parent classes
     *  @param  int     $notooltip                  1=Disable tooltip
     *  @param  int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param  string  $morecss                    Add more css on link
     *  @return	string                              String with URL
     */
    public function getNomUrl($withpicto = 0, $maxlength = 0, $classname = '', $option = '', $overwritepicto = 0, $notooltip = 0, $save_lastsearch_value = -1, $morecss = '')
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @param  int		$hidenastatus   Not use here just for declaration method compatibility with parent classes
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0, $hidenastatus = 0)
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
    public function LibStatutEvent($status, $mode = 0)
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
     * 	Create an array of lines
     *
     * 	@return array|int		array of lines if OK, <0 if KO
     */
    /*public function getLinesArray()
    	{
    		$this->lines = array();
    
    		$objectline = new ConferenceOrBoothLine($this->db);
    		$result = $objectline->fetchAll('ASC', 'position', 0, 0, array('customsql'=>'fk_conferenceorbooth = '.((int) $this->id)));
    
    		if (is_numeric($result)) {
    			$this->error = $this->error;
    			$this->errors = $this->errors;
    			return $result;
    		} else {
    			$this->lines = $result;
    			return $this->lines;
    		}
    	}*/
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
}