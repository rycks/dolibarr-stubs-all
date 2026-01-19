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
    /**
     * @var string Name of id column
     */
    public $table_rowid = 'id';
    /**
     * @var string Name of icon for actioncomm object. Filename of icon is object_action.png
     */
    public $picto = 'action';
    /**
     * @var int<0,2> 0=Default
     *               1=View may be restricted to sales representative only if no permission to see all or to company of external user if external user
     *               2=Same than 1 but accept record if fksoc is empty
     */
    public $restrictiononfksoc = 2;
    /**
     * @var int Id of the event
     */
    public $id;
    /**
     * @var string Id of the event. Use $id as possible
     */
    public $ref;
    /**
     * @var int Id into parent table llx_c_actioncomm (used only if option to use type is set)
     * 			This field is stored info fk_action. It contains the id into table llx_ac_actioncomm.
     */
    public $type_id;
    /**
     * @var string Calendar of event (Type of type of event). 'system'=Default calendar, 'systemauto'=Auto calendar, 'birthdate', 'holiday', 'module'=Calendar specific to a module
     *             This field contains the type into table llx_ac_actioncomm ('system', 'systemauto', ...). It should be named 'type_type'.
     */
    public $type;
    /**
     * @var string Code into parent table llx_c_actioncomm (used only if option to use type is set). With default setup, should be AC_OTH_AUTO or AC_OTH.
     *             This field contains the code into table llx_ac_actioncomm.
     */
    public $type_code;
    /**
     * @var string Type label
     */
    public $type_label;
    /**
     * @var string Color into parent table llx_c_actioncomm (used only if option to use type is set)
     */
    public $type_color;
    /**
     * @var string Picto for type of event (used only if option to use type is set)
     */
    public $type_picto;
    /**
     * @var string Free code to identify action. Ie: Agenda trigger add here AC_TRIGGERNAME ('AC_COMPANY_CREATE', 'AC_PROPAL_VALIDATE', ...)
     * 			   This field is stored into field 'code' into llx_actioncomm.
     */
    public $code;
    /**
     * @var string Agenda event label
     */
    public $label;
    /**
     * @var int 	Date creation record (datec)
     */
    public $datec;
    /**
     * @var int 	Duration (duree)
     */
    public $duree;
    /**
     * @var int 	Date modification record (tms)
     */
    public $datem;
    /**
     * @var User 	Object user that create action
     * @deprecated
     * @see $authorid
     */
    public $author;
    /**
     * @var User	Object user that modified action
     * @deprecated
     * @see $usermodid
     */
    public $usermod;
    /**
     * @var int 	Id user that create action
     */
    public $authorid;
    /**
     * @var int 	Id user that modified action
     */
    public $usermodid;
    /**
     * @var int 	Date action start (datep)
     */
    public $datep;
    /**
     * @var int 	Date action end (datef)
     */
    public $datef;
    /**
     * @var int 	This is date start action (datep) but modified to not be outside calendar view.
     */
    public $date_start_in_calendar;
    /**
     * @var int 	This is date end action (datef) but modified to not be outside calendar view.
     */
    public $date_end_in_calendar;
    /**
     * @var int 	Date action end (datep2)
     */
    public $datep2;
    /**
     * @var int 	-1=Unknown duration
     * @deprecated Use ($datef - $datep)
     */
    public $durationp = -1;
    /**
     * @var int 	1=Event on full day
     */
    public $fulldayevent = 0;
    /**
     * @var int 	1=???
     */
    public $ponctuel;
    /**
     * @var int<-1,100> Percentage
     */
    public $percentage;
    /**
     * @var string 	Location
     */
    public $location;
    /**
     * @var int Transparency (ical standard). Used to say if people assigned to event are busy or not by event. 0=available, 1=busy, 2=busy (refused events)
     */
    public $transparency;
    /**
     * @var int 	(0 By default)
     */
    public $priority;
    /**
     * @var array<int,array{id:int,transparency:int<0,1>}> 	Array of users
     */
    public $userassigned = array();
    /**
     * @var int 	Id of user owner = fk_user_action into table
     */
    public $userownerid;
    /**
     * @var array<int,array{id:int,mandatory:int<0,1>,answer_status:int,transparency:int<0,1>}|int> Array of contact ids
     */
    public $socpeopleassigned = array();
    /**
     * @var int[] 	Array of other contact emails (not user, not contact)
     */
    public $otherassigned = array();
    /**
     * @var array<int,ActionCommReminder>	Array of reminders
     */
    public $reminders = array();
    /**
     * @var int 	thirdparty id linked to action
     */
    public $socid;
    /**
     * @var int 	socpeople id linked to action
     */
    public $contact_id;
    /**
     * @var ?int 	task ID
     */
    public $fk_task;
    /**
     * @var ?Societe Company linked to action (optional)
     * @deprecated
     * @see $socid
     */
    public $societe;
    /**
     * @var ?Contact Contact linked to action (optional)
     * @deprecated
     * @see $contact_id
     */
    public $contact;
    // Properties for links to other objects
    /**
     * @var int 		Id of linked object
     * @deprecated		Use $elementid
     */
    public $fk_element;
    // Id of record
    /**
     * @var int 		Id of linked object, alternative for API or other
     */
    public $elementid;
    /**
     * @var string 		Type of record. This if property ->element of object linked to.
     */
    public $elementtype;
    /**
     * @var int id of calendar
     */
    public $fk_bookcal_calendar;
    /**
     * @var string Ical name
     */
    public $icalname;
    /**
     * @var string Ical color  (Hex value for color on 6 nibles)
     */
    public $icalcolor;
    /**
     * @var string Extraparam
     */
    public $extraparams;
    /**
     * @var array<int,array{id:int,type:string,actionparam:string,status:int}> Actions
     */
    public $actions = array();
    /**
     * @var string Email msgid
     */
    public $email_msgid;
    /**
     * @var string Email from
     */
    public $email_from;
    /**
     * @var string Email sender
     */
    public $email_sender;
    /**
     * @var string Email to
     */
    public $email_to;
    /**
     * @var string Email tocc
     */
    public $email_tocc;
    /**
     * @var string Email tobcc
     */
    public $email_tobcc;
    /**
     * @var string Email subject
     */
    public $email_subject;
    /**
     * @var string Email errors to
     */
    public $errors_to;
    /**
     * @var int number of vote for an event
     */
    public $num_vote;
    /**
     * @var int if event is paid
     */
    public $event_paid;
    /**
     * @var int status use but Event organisation module
     */
    public $status;
    /**
     * @var string IP address
     */
    public $ip;
    /*
     * Properties to manage the recurring events
     */
    /** @var string	A string YYYYMMDDHHMMSS shared by allevent of same series */
    public $recurid;
    /** @var string Rule of recurring */
    public $recurrule;
    /** @var string Repeat until this date */
    public $recurdateend;
    /** @var int Duration of phone call when the event is a phone call */
    public $calling_duration;
    /**
     * Typical value for a event that is in a todo state
     */
    const EVENT_TODO = 0;
    /**
     * Typical value for a event that is in a progress state
     */
    const EVENT_IN_PROGRESS = 50;
    /**
     * Typical value for a event that is in a finished state
     */
    const EVENT_FINISHED = 100;
    public $fields = array();
    /**
     *      Constructor
     *
     *      @param      DoliDB		$db      Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     *    Add an action/event into database.
     *    $this->type_id OR $this->type_code must be set.
     *
     *    @param	User		$user      		Object user making action
     *    @param    int<0,1>	$notrigger		1 = disable triggers, 0 = enable triggers
     *    @return   int 			        	Id of created event, < 0 if KO
     */
    public function create(\User $user, $notrigger = 0)
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
     *  @param  int			$id     			Id of action to get
     *  @param  string		$ref    			Ref of action to get
     *  @param  string		$ref_ext			Ref ext to get
     *  @param	string		$email_msgid		Email msgid
     *  @param	int<0,1>	$loadresources		1=Load also resources
     *  @return	int<-1,1>						Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '', $ref_ext = '', $email_msgid = '', $loadresources = 1)
    {
    }
    /**
     *    Initialize $this->userassigned & this->socpeopleassigned array with list of id of user and contact assigned to event
     *
     *    @return   int<-1,1>			Return integer <0 if KO, >0 if OK
     */
    public function fetchResources()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Initialize this->userassigned array with list of id of user assigned to event
     *
     *    @param    bool    $override   Override $this->userownerid when empty. TODO This should be false by default. True is here to fix corrupted data.
     *    @return   int<-1,1>           Return integer <0 if KO, >0 if OK
     */
    public function fetch_userassigned($override = \true)
    {
    }
    /**
     *    Delete event from database
     *
     *    @param	User		$user			User making the delete
     *    @param    int<0,1>	$notrigger		1 = disable triggers, 0 = enable triggers
     *    @return   int<-2,1> 					Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *    Update action into database
     *	  If percentage = 100, on met a jour date 100%
     *
     *    @param    User		$user			Object user making change
     *    @param    int<0,1>	$notrigger		1 = disable triggers, 0 = enable triggers
     *    @return   int<-2,1>   				Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     *  Load all objects with filters.
     *  @TODO WARNING: This make a fetch on all records instead of making one request with a join, like done into show_actions_done.
     *
     *  @param		int		$socid			Filter by thirdparty
     *  @param		int		$fk_element		Id of element action is linked to
     *  @param		string	$elementtype	Type of element action is linked to
     *  @param		string	$filter			Other filter
     *  @param		string	$sortfield		Sort on this field
     *  @param		string	$sortorder		ASC or DESC
     *  @param		int		$limit			Limit number of answers
     *  @return		ActionComm[]|string		Error string if KO, array with actions if OK
     */
    public function getActions($socid = 0, $fk_element = 0, $elementtype = '', $filter = '', $sortfield = 'a.datep', $sortorder = 'DESC', $limit = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     * @param	User	$user   			Object user
     * @param	int		$load_state_board	Load indicator array this->nb
     * @return WorkboardResponse|int<-1,1>	Return integer <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user, $load_state_board = 0)
    {
    }
    /**
     *  Charge les information d'ordre info dans l'objet facture
     *
     *  @param	int		$id       	Id de la facture a charger
     *  @return	void
     */
    public function info($id)
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int<0,7>	$mode           0=Long label, 1=Short label, 2=Picto+Short label, 3=Picto, 4=Picto+Short label, 5=Short label+Picto, 6=Picto+Long label, 7=Very short label+Picto
     *  @param  int<0,1>	$hidenastatus   1=Show nothing if status is "Not applicable"
     *  @return string          		String with status
     */
    public function getLibStatut($mode, $hidenastatus = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of action status
     *
     *  @param  int<0,100>	$percent        Percent
     *  @param  int<0,7>	$mode           0=Long label, 1=Short label, 2=Picto+Short label, 3=Picto, 4=Picto+Short label, 5=Short label+Picto, 6=Picto+Long label, 7=Very short label+Picto
     *  @param  int<0,1>	$hidenastatus   1=Show nothing if status is "Not applicable"
     *  @param  int|string	$datestart      Date start of event
     *  @return string			    		Label
     */
    public function LibStatut($percent, $mode, $hidenastatus = 0, $datestart = '')
    {
    }
    /**
     * getTooltipContentArray
     * @param array<string,mixed> $params params to construct tooltip data
     * @since v18
     * @return array{picto:string,ref?:string,title?:string,labeltype?:string,location?:string,transparency?:string,space?:string,mailtopic?:string,mailfrom?:string,mailto?:string,mailcc?:string,description?:string,note?:string,categories?:string}
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *  Return URL of event
     *  Use $this->id, $this->type_code, $this->label and $this->type_label
     *
     *  @param	int<0,2>	$withpicto				0 = No picto, 1 = Include picto into link, 2 = Only picto
     *  @param	int			$maxlength				Max number of characters into label. If negative, use the ref as label.
     *  @param	string		$classname				Force style class on a link
     *  @param	string		$option					'' = Link to action, 'birthday'= Link to contact, 'holiday' = Link to leave
     *  @param	int<0,1>	$overwritepicto			1 = Overwrite picto with this one
     *  @param	int<0,1>	$notooltip		    	1 = Disable tooltip
     *  @param  int<-1,1>	$save_lastsearch_value  -1 = Auto, 0 = No save of lastsearch_values when clicking, 1 = Save lastsearch_values whenclicking
     *  @return	string							Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $maxlength = 0, $classname = '', $option = '', $overwritepicto = 0, $notooltip = 0, $save_lastsearch_value = -1)
    {
    }
    /**
     *  Return Picto of type of event
     *
     *  @param	string		$morecss			More CSS
     *  @param	string		$titlealt			Title alt
     *  @return	string							HTML String
     */
    public function getTypePicto($morecss = 'pictofixedwidth paddingright valignmiddle', $titlealt = '')
    {
    }
    /**
     *  Return label of type of event
     *
     *  @param	int		$mode			0=Mode short, 1=Mode long
     *  @return	string					HTML String
     */
    public function getTypeLabel($mode = 0)
    {
    }
    /**
     * Sets object to supplied categories.
     *
     * Deletes object from existing categories not supplied.
     * Adds it to non existing supplied categories.
     * Existing categories are left untouch.
     *
     * @param  int[]|int 	$categories 	Category or categories IDs
     * @return int<-1,1>					Return integer <0 if KO, >0 if OK
     */
    public function setCategories($categories)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Export events from database into a cal file.
     *
     * @param string    $format         			The format of the export 'vcal', 'ical/ics' or 'rss'
     * @param string    $type           			The type of the export 'event' or 'journal'
     * @param integer   $cachedelay     			Do not rebuild file if date older than cachedelay seconds
     * @param string    $filename       			The name for the exported file.
     * @param array<string,int|string>	$filters	Array of filters. Example array('notolderthan'=>99, 'year'=>..., 'idfrom'=>..., 'actiontype'=>'systemauto', 'actioncode'=>'AC_PRODUCT_MODIFY', 'project'=>123, ...)
     * @param int<0,1>  $exportholiday  			0 = don't integrate holidays into the export, 1 = integrate holidays into the export
     * @return int<-1,1>                			-1 = error on build export file, 0 = export okay
     */
    public function build_exportfile($format, $type, $cachedelay, $filename, $filters, $exportholiday = 0)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *  id must be 0 if object instance is a specimen.
     *
     *  @return	int<1,1>	 >0 if ok
     */
    public function initAsSpecimen()
    {
    }
    /**
     *  Function used to replace a thirdparty id with another one.
     *
     * @param 	DoliDB 	$dbs 		Database handler, because function is static we name it $dbs not $db to avoid breaking coding test
     * @param 	int 	$origin_id 	Old thirdparty id
     * @param 	int 	$dest_id 	New thirdparty id
     * @return 	bool
     */
    public static function replaceThirdparty(\DoliDB $dbs, $origin_id, $dest_id)
    {
    }
    /**
     *  Function used to replace a product id with another one.
     *
     *  @param DoliDB $dbs Database handler
     *  @param int $origin_id Old product id
     *  @param int $dest_id New product id
     *  @return bool
     */
    public static function replaceProduct(\DoliDB $dbs, $origin_id, $dest_id)
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
     *  Load event reminder of events
     *
     *  @param	string	$type		Type of reminder 'browser' or 'email'
     *  @param	int		$fk_user	Id of user
     *  @param	bool	$onlypast	true = get only past reminder, false = get all reminders linked to this
     *  @return int<-1,max>    		< if OK, else count of number of reminders
     */
    public function loadReminders($type = '', $fk_user = 0, $onlypast = \true)
    {
    }
    /**
     *  Send reminders by emails
     *  CAN BE A CRON TASK
     *
     *  @return int<-1,1>|string     0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function sendEmailsReminder()
    {
    }
    /**
     * Update the percent value of a event with the given id
     *
     * @param int			$id			The id of the event
     * @param int<0,100>	$percent	The new percent value for the event
     * @param int			$usermodid	The user who modified the percent
     * @return int<-1,1>				1 when update of the event was successful, otherwise -1
     */
    public function updatePercent($id, $percent, $usermodid = 0)
    {
    }
}