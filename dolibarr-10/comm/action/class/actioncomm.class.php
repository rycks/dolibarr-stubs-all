<?php

/**
 *		Class to manage agenda events (actions)
 */
class ActionComm extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'action';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'actioncomm';
    public $table_rowid = 'id';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'action';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    /**
     * 0=Default, 1=View may be restricted to sales representative only if no permission to see all or to company of external user if external user, 2=Same than 1 but accept record if fksoc is empty
     * @var integer
     */
    public $restrictiononfksoc = 2;
    /**
     * Id of the event
     * @var int
     */
    public $id;
    /**
     * Id of the event. Use $id as possible
     * @var int
     */
    public $ref;
    public $type_id;
    // Id into parent table llx_c_actioncomm (used only if option to use type is set)
    public $type_code;
    // Code into parent table llx_c_actioncomm (used only if option to use type is set). With default setup, should be AC_OTH_AUTO or AC_OTH.
    public $type_label;
    public $type;
    // Label into parent table llx_c_actioncomm (used only if option to use type is set)
    public $type_color;
    // Color into parent table llx_c_actioncomm (used only if option to use type is set)
    public $code;
    // Free code to identify action. Ie: Agenda trigger add here AC_TRIGGERNAME ('AC_COMPANY_CREATE', 'AC_PROPAL_VALIDATE', ...)
    /**
     * @var string Agenda event label
     */
    public $label;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * Date end record (datef)
     *
     * @var integer
     */
    public $datef;
    /**
     * Duration (duree)
     *
     * @var integer
     */
    public $duree;
    /**
     * Date modification record (tms)
     *
     * @var integer
     */
    public $datem;
    /**
     * Object user that create action
     * @var User
     * @deprecated
     * @see $authorid
     */
    public $author;
    /**
     * Object user that modified action
     * @var User
     * @deprecated
     * @see $usermodid
     */
    public $usermod;
    /**
     * Id user that create action
     * @var int
     */
    public $authorid;
    /**
     * Id user that modified action
     * @var int
     */
    public $usermodid;
    /**
     * Date action start (datep)
     *
     * @var integer
     */
    public $datep;
    /**
     * Date action end (datep2)
     *
     * @var integer
     */
    public $datep2;
    /**
     * @var int -1=Unkown duration
     * @deprecated
     */
    public $durationp = -1;
    public $fulldayevent = 0;
    // 1=Event on full day
    /**
     * Milestone
     * @var int
     * @deprecated Milestone is already event with end date = start date
     */
    public $punctual = 1;
    public $percentage;
    // Percentage
    public $location;
    // Location
    public $transparency;
    // Transparency (ical standard). Used to say if people assigned to event are busy or not by event. 0=available, 1=busy, 2=busy (refused events)
    public $priority;
    // Small int (0 By default)
    public $userassigned = array();
    // Array of user ids
    public $userownerid;
    // Id of user owner = fk_user_action into table
    public $userdoneid;
    // Id of user done (deprecated)
    public $socpeopleassigned = array();
    // Array of contact ids
    public $otherassigned = array();
    // Array of other contact emails (not user, not contact)
    /**
     * Object user of owner
     * @var User
     * @deprecated
     * @see $userownerid
     */
    public $usertodo;
    /**
     * Object user that did action
     * @var User
     * @deprecated
     * @see $userdoneid
     */
    public $userdone;
    public $socid;
    public $contactid;
    /**
     * Company linked to action (optional)
     * @var Societe|null
     * @deprecated
     * @see $socid
     */
    public $societe;
    /**
     * Contact linked to action (optional)
     * @var Contact|null
     * @deprecated
     * @see $contactid
     */
    public $contact;
    // Properties for links to other objects
    public $fk_element;
    // Id of record
    public $elementid;
    // Id of record alternative for API
    public $elementtype;
    // Type of record. This if property ->element of object linked to.
    // Ical
    public $icalname;
    public $icalcolor;
    public $actions = array();
    // Fields for emails
    public $email_msgid;
    public $email_from;
    public $email_sender;
    public $email_to;
    public $email_tocc;
    public $email_tobcc;
    public $email_subject;
    public $errors_to;
    /**
     *      Constructor
     *
     *      @param		DoliDB		$db      Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     *    Add an action/event into database.
     *    $this->type_id OR $this->type_code must be set.
     *
     *    @param	User	$user      		Object user making action
     *    @param    int		$notrigger		1 = disable triggers, 0 = enable triggers
     *    @return   int 		        	Id of created event, < 0 if KO
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     *    Add an action/event into database.
     *    $this->type_id OR $this->type_code must be set.
     *
     *    @param	User	$user      		Object user making action
     *    @param    int		$notrigger		1 = disable triggers, 0 = enable triggers
     *    @return   int 		        	Id of created event, < 0 if KO
     * @deprecated Use create instead
     */
    public function add(\User $user, $notrigger = 0)
    {
    }
    /**
     *  Load an object from its id and create a new one in database
     *
     *  @param	    User	        $fuser      	Object user making action
     *  @param		int				$socid			Id of thirdparty
     *  @return		int								New id of clone
     */
    public function createFromClone(\User $fuser, $socid)
    {
    }
    /**
     *  Load object from database
     *
     *  @param  int		$id     	Id of action to get
     *  @param  string	$ref    	Ref of action to get
     *  @param  string	$ref_ext	Ref ext to get
     *  @return	int					<0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '', $ref_ext = '')
    {
    }
    /**
     *    Initialize $this->userassigned & this->socpeopleassigned array with list of id of user and contact assigned to event
     *
     *    @return   int				<0 if KO, >0 if OK
     */
    public function fetchResources()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Initialize this->userassigned array with list of id of user assigned to event
     *
     *    @return	int				<0 if KO, >0 if OK
     */
    public function fetch_userassigned()
    {
    }
    /**
     *    Delete event from database
     *
     *    @param    int		$notrigger		1 = disable triggers, 0 = enable triggers
     *    @return   int 					<0 if KO, >0 if OK
     */
    public function delete($notrigger = 0)
    {
    }
    /**
     *    Update action into database
     *	  If percentage = 100, on met a jour date 100%
     *
     *    @param    User	$user			Object user making change
     *    @param    int		$notrigger		1 = disable triggers, 0 = enable triggers
     *    @return   int     				<0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     *  Load all objects with filters.
     *  @TODO WARNING: This make a fetch on all records instead of making one request with a join.
     *
     *  @param		DoliDb	$db				Database handler
     *  @param		int		$socid			Filter by thirdparty
     *  @param		int		$fk_element		Id of element action is linked to
     *  @param		string	$elementtype	Type of element action is linked to
     *  @param		string	$filter			Other filter
     *  @param		string	$sortfield		Sort on this field
     *  @param		string	$sortorder		ASC or DESC
     *  @param		string	$limit			Limit number of answers
     *  @return		array|string			Error string if KO, array with actions if OK
     */
    public static function getActions($db, $socid = 0, $fk_element = 0, $elementtype = '', $filter = '', $sortfield = 'a.datep', $sortorder = 'DESC', $limit = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     * @param	User	$user   			Objet user
     * @param	int		$load_state_board	Charge indicateurs this->nb de tableau de bord
     * @return WorkboardResponse|int <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user, $load_state_board = 0)
    {
    }
    /**
     *  Charge les informations d'ordre info dans l'objet facture
     *
     *  @param	int		$id       	Id de la facture a charger
     *  @return	void
     */
    public function info($id)
    {
    }
    /**
     *  Return label of status
     *
     *  @param	int		$mode           0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @param  int		$hidenastatus   1=Show nothing if status is "Not applicable"
     *  @return string          		String with status
     */
    public function getLibStatut($mode, $hidenastatus = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of action status
     *
     *  @param  int     $percent        Percent
     *  @param  int		$mode           0=Long label, 1=Short label, 2=Picto+Short label, 3=Picto, 4=Picto+Short label, 5=Short label+Picto, 6=Picto+Long label, 7=Very short label+Picto
     *  @param  int		$hidenastatus   1=Show nothing if status is "Not applicable"
     *  @param  int     $datestart      Date start of event
     *  @return string		    		Label
     */
    public function LibStatut($percent, $mode, $hidenastatus = 0, $datestart = '')
    {
    }
    /**
     *  Return URL of event
     *  Use $this->id, $this->type_code, $this->label and $this->type_label
     *
     *  @param	int		$withpicto				0=No picto, 1=Include picto into link, 2=Only picto
     *  @param	int		$maxlength				Max number of charaters into label. If negative, use the ref as label.
     *  @param	string	$classname				Force style class on a link
     *  @param	string	$option					''=Link to action, 'birthday'=Link to contact
     *  @param	int		$overwritepicto			1=Overwrite picto
     *  @param	int   	$notooltip		    	1=Disable tooltip
     *  @param  int     $save_lastsearch_value  -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @return	string							Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $maxlength = 0, $classname = '', $option = '', $overwritepicto = 0, $notooltip = 0, $save_lastsearch_value = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *		Export events from database into a cal file.
     *
     *		@param	string		$format			'vcal', 'ical/ics', 'rss'
     *		@param	string		$type			'event' or 'journal'
     *		@param	int			$cachedelay		Do not rebuild file if date older than cachedelay seconds
     *		@param	string		$filename		Force filename
     *		@param	array		$filters		Array of filters. Exemple array('notolderthan'=>99, 'year'=>..., 'idfrom'=>..., 'notactiontype'=>'systemauto', 'project'=>123, ...)
     *		@return int     					<0 if error, nb of events in new file if ok
     */
    public function build_exportfile($format, $type, $cachedelay, $filename, $filters)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *  id must be 0 if object instance is a specimen.
     *
     *  @return	void
     */
    public function initAsSpecimen()
    {
    }
    /**
     *  Function used to replace a thirdparty id with another one.
     *
     *  @param DoliDB $db Database handler
     *  @param int $origin_id Old thirdparty id
     *  @param int $dest_id New thirdparty id
     *  @return bool
     */
    public static function replaceThirdparty(\DoliDB $db, $origin_id, $dest_id)
    {
    }
    /**
     *  Is the action delayed?
     *
     *  @return bool
     */
    public function hasDelay()
    {
    }
    /**
     *  Send reminders by emails
     *  CAN BE A CRON TASK
     *
     *  @return int         0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function sendEmailsReminder()
    {
    }
}