<?php

/**
 *    Class to manage ticket
 */
class Ticket extends \CommonObject
{
    /**
     * @var DoliDB Database handler
     */
    public $db;
    /**
     * @var string ID to identify managed object
     */
    public $element = 'ticket';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'ticket';
    /**
     * @var string Name of field for link to tickets
     */
    public $fk_element = 'fk_ticket';
    /**
     * @var string String with name of icon for ticketcore. Must be the part after the 'object_' into object_ticketcore.png
     */
    public $picto = 'ticket';
    /**
     * @var ?string Hash to identify ticket publicly
     */
    public $track_id;
    /**
     * @var int Thirdparty ID
     */
    public $fk_soc;
    public $socid;
    /**
     * @var int Project ID
     */
    public $fk_project;
    /**
     * @var int Contract ID
     */
    public $fk_contract;
    /**
     * @var ?string Email of person who created the ticket
     */
    public $origin_email;
    /**
     * @var int User id who created the ticket
     */
    public $fk_user_create;
    /**
     * @var int User id who the ticket is assigned to
     */
    public $fk_user_assign;
    /**
     * var string Ticket subject
     */
    public $subject;
    /**
     * @var string Ticket message
     */
    public $message;
    /**
     * @var string Private message
     */
    public $private;
    /**
     * @var int  Ticket statut
     * @deprecated use status
     * @see $status
     */
    public $fk_statut;
    /**
     * @var int  Ticket status
     */
    public $status;
    /**
     * @var string State resolution
     */
    public $resolution;
    /**
     * @var int Progress in percent
     */
    public $progress;
    /**
     * @var string Duration for ticket
     */
    public $timing;
    /**
     * @var string Type code
     */
    public $type_code;
    /**
     * @var string Category code
     */
    public $category_code;
    /**
     * @var string Severity code
     */
    public $severity_code;
    /**
     * Type label
     */
    public $type_label;
    /**
     * Category label
     */
    public $category_label;
    /**
     * Severity label
     */
    public $severity_label;
    /**
     * Email from user
     */
    public $email_from;
    /**
     * Email to reply to
     */
    public $origin_replyto;
    /**
     * References from origin email
     */
    public $origin_references;
    /**
     * @var int Creation date
     */
    public $datec;
    /**
     * @var int Read date
     */
    public $date_read;
    /**
     * @var int Last message date
     */
    public $date_last_msg_sent;
    /**
     * @var int Close ticket date
     */
    public $date_close;
    /**
     * @var array cache_types_tickets
     */
    public $cache_types_tickets;
    /**
     * @var array tickets categories
     */
    public $cache_category_tickets;
    /**
     * @var array cache msgs ticket
     */
    public $cache_msgs_ticket;
    /**
     * @var int 	Notify thirdparty at create
     */
    public $notify_tiers_at_create;
    /**
     * @var string 	Email MSGID
     */
    public $email_msgid;
    /**
     * @var string 	Email Date
     */
    public $email_date;
    /**
     * @var string 	IP address
     */
    public $ip;
    /**
     * @var static $oldcopy  State of this ticket as it was stored before an update operation (for triggers)
     */
    public $oldcopy;
    /**
     * @var Ticket[] array of Tickets
     */
    public $lines;
    /**
     * @var string Regex pour les images
     */
    public $regeximgext = '\\.gif|\\.jpg|\\.jpeg|\\.png|\\.bmp|\\.webp|\\.xpm|\\.xbm';
    // See also into images.lib.php
    /**
     * Status
     */
    const STATUS_NOT_READ = 0;
    // Draft. Not take into account yet.
    const STATUS_READ = 1;
    // Ticket was read.
    const STATUS_ASSIGNED = 2;
    // Ticket was just assigned to someone. Not in progress yet.
    const STATUS_IN_PROGRESS = 3;
    // In progress
    const STATUS_NEED_MORE_INFO = 5;
    // Waiting requester feedback
    const STATUS_WAITING = 7;
    // On hold
    const STATUS_CLOSED = 8;
    // Closed - Solved
    const STATUS_CANCELED = 9;
    // Closed - Not solved
    /**
     *  'type' field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter]]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'text:none', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalString('MY_SETUP_PARAM'))
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
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'visible' => -2, 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'index' => 1, 'comment' => "Id"),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'visible' => 0, 'enabled' => 1, 'position' => 5, 'notnull' => 1, 'index' => 1),
        'ref' => array('type' => 'varchar(128)', 'label' => 'Ref', 'visible' => 1, 'enabled' => 1, 'position' => 10, 'notnull' => 1, 'index' => 1, 'searchall' => 1, 'comment' => "Reference of object", 'css' => '', 'showoncombobox' => 1),
        'track_id' => array('type' => 'varchar(255)', 'label' => 'TicketTrackId', 'visible' => -2, 'enabled' => 1, 'position' => 11, 'notnull' => -1, 'searchall' => 1, 'help' => "Help text"),
        'fk_user_create' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Author', 'visible' => 1, 'enabled' => 1, 'position' => 15, 'notnull' => 1, 'csslist' => 'tdoverflowmax100 maxwidth150onsmartphone'),
        'origin_email' => array('type' => 'mail', 'label' => 'OriginEmail', 'visible' => -2, 'enabled' => 1, 'position' => 16, 'notnull' => 1, 'index' => 1, 'searchall' => 1, 'comment' => "Reference of object", 'csslist' => 'tdoverflowmax150'),
        'origin_replyto' => array('type' => 'mail', 'label' => 'EmailReplyto', 'visible' => -2, 'enabled' => 1, 'position' => 17, 'notnull' => 1, 'index' => 1, 'searchall' => 1, 'comment' => "Email to reply to", 'csslist' => 'tdoverflowmax150'),
        'origin_references' => array('type' => 'text', 'label' => 'EmailReferences', 'visible' => -2, 'enabled' => 1, 'position' => 18, 'notnull' => 1, 'index' => 1, 'searchall' => 1, 'comment' => "References from origin email", 'csslist' => 'tdoverflowmax150'),
        'subject' => array('type' => 'varchar(255)', 'label' => 'Subject', 'visible' => 1, 'enabled' => 1, 'position' => 19, 'notnull' => -1, 'searchall' => 1, 'help' => "", 'css' => 'maxwidth200 tdoverflowmax200', 'csslist' => 'tdoverflowmax250', 'autofocusoncreate' => 1),
        'type_code' => array('type' => 'varchar(32)', 'label' => 'Type', 'visible' => 1, 'enabled' => 1, 'position' => 20, 'notnull' => -1, 'help' => "", 'csslist' => 'tdoverflowmax100'),
        'category_code' => array('type' => 'varchar(32)', 'label' => 'TicketCategory', 'visible' => -1, 'enabled' => 1, 'position' => 21, 'notnull' => -1, 'help' => "", 'css' => 'maxwidth100 tdoverflowmax200'),
        'severity_code' => array('type' => 'varchar(32)', 'label' => 'Severity', 'visible' => 1, 'enabled' => 1, 'position' => 22, 'notnull' => -1, 'help' => "", 'css' => 'maxwidth100'),
        'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'visible' => 1, 'enabled' => 'isModEnabled("societe")', 'position' => 50, 'notnull' => -1, 'index' => 1, 'searchall' => 1, 'help' => "OrganizationEventLinkToThirdParty", 'css' => 'tdoverflowmax150 maxwidth150onsmartphone'),
        'notify_tiers_at_create' => array('type' => 'integer', 'label' => 'NotifyThirdparty', 'visible' => -1, 'enabled' => 0, 'position' => 51, 'notnull' => 1, 'index' => 1),
        'fk_project' => array('type' => 'integer:Project:projet/class/project.class.php', 'label' => 'Project', 'visible' => -1, 'enabled' => '$conf->project->enabled', 'position' => 52, 'notnull' => -1, 'index' => 1, 'help' => "LinkToProject"),
        'fk_contract' => array('type' => 'integer:Contrat:contrat/class/contrat.class.php', 'label' => 'Contract', 'visible' => -1, 'enabled' => '$conf->contract->enabled', 'position' => 53, 'notnull' => -1, 'index' => 1, 'help' => "LinkToContract"),
        //'timing' => array('type'=>'varchar(20)', 'label'=>'Timing', 'visible'=>-1, 'enabled'=>1, 'position'=>42, 'notnull'=>-1, 'help'=>""),	// what is this ?
        'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'visible' => 1, 'enabled' => 1, 'position' => 500, 'notnull' => 1, 'csslist' => 'nowraponall'),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'visible' => -1, 'enabled' => 1, 'position' => 501, 'notnull' => 1),
        'date_read' => array('type' => 'datetime', 'label' => 'DateReading', 'visible' => -1, 'enabled' => 1, 'position' => 505, 'notnull' => 1, 'csslist' => 'nowraponall'),
        'date_last_msg_sent' => array('type' => 'datetime', 'label' => 'TicketLastMessageDate', 'visible' => 0, 'enabled' => 1, 'position' => 506, 'notnull' => -1),
        'fk_user_assign' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'AssignedTo', 'visible' => 1, 'enabled' => 1, 'position' => 507, 'notnull' => 1, 'csslist' => 'tdoverflowmax100 maxwidth150onsmartphone'),
        'date_close' => array('type' => 'datetime', 'label' => 'TicketCloseOn', 'visible' => -1, 'enabled' => 1, 'position' => 510, 'notnull' => 1),
        'message' => array('type' => 'html', 'label' => 'Message', 'visible' => -2, 'enabled' => 1, 'position' => 540, 'notnull' => -1),
        'email_msgid' => array('type' => 'varchar(255)', 'label' => 'EmailMsgID', 'visible' => -2, 'enabled' => 1, 'position' => 540, 'notnull' => -1, 'help' => 'EmailMsgIDDesc', 'csslist' => 'tdoverflowmax100'),
        'email_date' => array('type' => 'datetime', 'label' => 'EmailDate', 'visible' => -2, 'enabled' => 1, 'position' => 541),
        'progress' => array('type' => 'integer', 'label' => 'Progression', 'visible' => -1, 'enabled' => 1, 'position' => 540, 'notnull' => -1, 'css' => 'right', 'help' => "", 'isameasure' => 2, 'csslist' => 'width50'),
        'resolution' => array('type' => 'integer', 'label' => 'Resolution', 'visible' => -1, 'enabled' => 'getDolGlobalString("TICKET_ENABLE_RESOLUTION")', 'position' => 550, 'notnull' => 1),
        'model_pdf' => array('type' => 'varchar(255)', 'label' => 'PDFTemplate', 'enabled' => 1, 'visible' => 0, 'position' => 560),
        'extraparams' => array('type' => 'varchar(255)', 'label' => 'Extraparams', 'enabled' => 1, 'visible' => -1, 'position' => 570),
        'fk_statut' => array('type' => 'integer', 'label' => 'Status', 'visible' => 1, 'enabled' => 1, 'position' => 600, 'notnull' => 1, 'index' => 1, 'arrayofkeyval' => array(0 => 'Unread', 1 => 'Read', 2 => 'Assigned', 3 => 'InProgress', 5 => 'NeedMoreInformation', 7 => 'OnHold', 8 => 'SolvedClosed', 9 => 'Deleted')),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 900),
    );
    // END MODULEBUILDER PROPERTIES
    /**
     *  Constructor
     *
     *  @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *    Check properties of ticket are ok (like ref, track_id, ...).
     *    All properties must be already loaded on object (this->ref, this->track_id, ...).
     *
     *    @return int        0 if OK, <0 if KO
     */
    private function verify()
    {
    }
    /**
     *
     * Check if ref exists or not
     *
     * @param string $action    Action
     * @param string $getRef    Reference of object
     * @return bool
     */
    public function checkExistingRef(string $action, string $getRef) : bool
    {
    }
    /**
     *  Create object into database
     *
     *  @param  User $user      User that creates
     *  @param  int  $notrigger 0=launch triggers after, 1=disable triggers
     *  @return int                      Return integer <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from the database
     *
     *  @param  int        	$id    			Id object
     *  @param	string		$ref			Ref
     *  @param	string		$track_id		Track id, a hash like ref
     *  @param	string		$email_msgid	Email msgid
     *  @return int              			Return integer <0 if KO, >0 if OK
     */
    public function fetch($id = 0, $ref = '', $track_id = '', $email_msgid = '')
    {
    }
    /**
     * Load all objects in memory from database
     *
     * @param  User   		$user      	User for action
     * @param  string 		$sortorder 	Sort order
     * @param  string 		$sortfield 	Sort field
     * @param  int    		$limit     	Limit
     * @param  int    		$offset    	Offset page
     * @param  int    		$arch      	Archive or not (not used)
     * @param  string|array $filter    	Filter for query
     * @return int 						Return integer <0 if KO, >0 if OK
     */
    public function fetchAll($user, $sortorder = 'ASC', $sortfield = 't.datec', $limit = 0, $offset = 0, $arch = 0, $filter = '')
    {
    }
    /**
     *  Update object into database
     *
     *  @param  User $user      User that modifies
     *  @param  int  $notrigger 0=launch triggers after, 1=disable triggers
     *  @return int                     Return integer <0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *     @param  User $user      User that deletes
     *  @param  int  $notrigger 0=launch triggers after, 1=disable triggers
     *  @return int                     Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *     Load an object from its id and create a new one in database
     *
     *     @param   User    $user       User that clone
     *     @param   int     $fromid     Id of object to clone
     *     @return  int                 New id of clone
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     *     Initialise object with example values
     *     Id must be 0 if object instance is a specimen
     *
     *     @return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     * Print selected status
     *
     * @param 	string    $selected   	Selected status
     * @return 	void
     */
    public function printSelectStatus($selected = "")
    {
    }
    /**
     * Load into a cache the types of tickets (setup done into dictionaries)
     *
     * @return 	int       Number of lines loaded, 0 if already loaded, <0 if KO
     */
    public function loadCacheTypesTickets()
    {
    }
    /**
     *      Load into a cache array, the list of ticket categories (setup done into dictionary)
     *
     *      @param	int		$publicgroup	0=No public group, 1=Public group only, -1=All
     *      @return int             		Number of lines loaded, 0 if already loaded, <0 if KO
     */
    public function loadCacheCategoriesTickets($publicgroup = -1)
    {
    }
    /**
     *      Charge dans cache la liste des sévérité de tickets (paramétrable dans dictionnaire)
     *
     *      @return int             Number of lines loaded, 0 if already loaded, <0 if KO
     */
    public function loadCacheSeveritiesTickets()
    {
    }
    /**
     * Return status label of object
     *
     * @param      	int		$mode     	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * @return     	string    			Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return status label of object
     *
     * @param	string		$status			Id status
     * @param	int			$mode			0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * @param	int			$notooltip		1=No tooltip
     * @param	int			$progress		Progression (0 to 100)
     * @return	string						Label
     */
    public function LibStatut($status, $mode = 0, $notooltip = 0, $progress = 0)
    {
    }
    /**
     * getTooltipContentArray
     *
     * @param array $params ex option, infologin
     * @since v18
     * @return array
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *  Return a link to the object card (with optionally the picto)
     *
     *	@param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option						On what the link point to ('nolink', ...)
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *    Mark a message as read
     *
     *    @param    User		$user			Object user
     *    @param	int			$notrigger		No trigger
     *    @return   int							Return integer <0 if KO, 0=nothing done, >0 if OK
     */
    public function markAsRead($user, $notrigger = 0)
    {
    }
    /**
     *    Set an assigned user to a ticket.
     *
     *    @param    User	$user				Object user
     *    @param    int 	$id_assign_user		ID of user assigned
     *    @param    int 	$notrigger        	Disable trigger
     *    @return   int							Return integer <0 if KO, 0=Nothing done, >0 if OK
     */
    public function assignUser($user, $id_assign_user, $notrigger = 0)
    {
    }
    /**
     * Add message into database
     *
     * @param 	User 	$user      		  	User that creates
     * @param 	int  	$notrigger 		  	0=launch triggers after, 1=disable triggers
     * @param 	array	$filename_list      List of files to attach (full path of filename on file system)
     * @param 	array	$mimetype_list      List of MIME type of attached files
     * @param 	array	$mimefilename_list  List of attached file name in message
     * @param 	boolean	$send_email      	Whether the message is sent by email
     * @param   int     $public_area    	0=Default, 1 if we are creating the message from a public area (so we can search contact from email to add it as contact of ticket if TICKET_ASSIGN_CONTACT_TO_MESSAGE is set)
     * @return 	int						  	Return integer <0 if KO, >0 if OK
     */
    public function createTicketMessage($user, $notrigger = 0, $filename_list = array(), $mimetype_list = array(), $mimefilename_list = array(), $send_email = \false, $public_area = 0)
    {
    }
    /**
     *      Load the list of event on ticket into ->cache_msgs_ticket
     *
     *      @return int             Number of lines loaded, 0 if already loaded, <0 if KO
     */
    public function loadCacheMsgsTicket()
    {
    }
    /**
     *    Close a ticket
     *
     *    @param    User    $user      	User that close
     *    @param	int		$mode		0=Close solved, 1=Close abandoned
     *    @return   int		           	Return integer <0 if KO, 0=nothing done, >0 if OK
     */
    public function close(\User $user, $mode = 0)
    {
    }
    /**
     *     Search and fetch thirparties by email
     *
     *     @param  string 		$email   		Email
     *     @param  int    		$type    		Type of thirdparties (0=any, 1=customer, 2=prospect, 3=supplier)
     *     @param  array  		$filters 		Array of couple field name/value to filter the companies with the same name
     *     @param  string 		$clause  		Clause for filters
     *     @return array|int    		   		Array of thirdparties object
     */
    public function searchSocidByEmail($email, $type = 0, $filters = array(), $clause = 'AND')
    {
    }
    /**
     *     Search and fetch contacts by email
     *
     *     @param  string 		$email 		Email
     *     @param  int  		$socid 		Limit to a thirdparty
     *     @param  string 		$case  		Respect case
     *     @return array|int        		Array of contacts object
     */
    public function searchContactByEmail($email, $socid = 0, $case = '')
    {
    }
    /**
     *    Define parent commany of current ticket
     *
     *    @param  int $id		Id of thirdparty to set or '' to remove
     *    @return int           Return integer <0 if KO, >0 if OK
     */
    public function setCustomer($id)
    {
    }
    /**
     *    Define progression of current ticket
     *
     *    @param  int $percent Progression percent
     *    @return int             Return integer <0 if KO, >0 if OK
     */
    public function setProgression($percent)
    {
    }
    /**
     *     Link element with a contract
     *
     *     @param  int $contractid Contract id to link element to
     *     @return int                        Return integer <0 if KO, >0 if OK
     */
    public function setContract($contractid)
    {
    }
    /* gestion des contacts d'un ticket */
    /**
     *  Return id des contacts interne de suivi
     *
     *  @return array       Liste des id contacts suivi ticket
     */
    public function getIdTicketInternalContact()
    {
    }
    /**
     *  Retrieve information about internal contacts
     *
     *  @param    int     $status     Status of user or company                                array<array{id:int,email:string,firstname:string,lastname:string,libelle:string}>
     *  @return array<array{id:int,email:string,firstname:string,lastname:string,libelle:string,socid:int,code:string,status:int}>             Array with datas : firstname, lastname, socid (-1 for internal users), email, code, libelle, status
     */
    public function getInfosTicketInternalContact($status = -1)
    {
    }
    /**
     *  Return id des contacts clients pour le suivi ticket
     *
     *  @return array       Liste des id contacts suivi ticket
     */
    public function getIdTicketCustomerContact()
    {
    }
    /**
     * Retrieve information about external contacts
     *
     *  @param    int     $status     Status of user or company
     *  @return array                 Array with datas : firstname, lastname, socid (-1 for internal users), email, code, libelle, status
     */
    public function getInfosTicketExternalContact($status = -1)
    {
    }
    /**
     *  Return id des contacts clients des intervenants
     *
     *  @return array       Liste des id contacts intervenants
     */
    public function getIdTicketInternalInvolvedContact()
    {
    }
    /**
     *  Return id des contacts clients des intervenants
     *
     *  @return array       Liste des id contacts intervenants
     */
    public function getIdTicketCustomerInvolvedContact()
    {
    }
    /**
     * Return id of all contacts for ticket
     *
     * @return	array		Array of contacts for tickets
     */
    public function getTicketAllContacts()
    {
    }
    /**
     * Return id of all contacts for ticket
     *
     * @return	array		Array of contacts
     */
    public function getTicketAllCustomerContacts()
    {
    }
    /**
     *    Get array of all contacts for a ticket
     *    Override method of file commonobject.class.php to add phone number
     *
     *    @param    int     $statusoflink   Status of lines to get (-1=all)
     *    @param    string  $source         Source of contact: external or thirdparty (llx_socpeople) or internal (llx_user)
     *    @param    int     $list           0:Return array contains all properties, 1:Return array contains just id
     *    @param    string  $code           Filter on this code of contact type ('SHIPPING', 'BILLING', ...)
     *    @param    int     $status         Status of user or company
     *    @return   array<int|array{source:string,id:int,rowid:int,email:string,civility:string,firstname:string,lastname:string,labeltype:string,libelle:string,socid:int,code:string,status:int,statuscontact:string,fk_c_typecontact:string,phone:string,phone_mobile:string,nom:string}>|int<-1,-1>      Array of array('email'=>..., 'lastname'=>...)
     */
    public function listeContact($statusoflink = -1, $source = 'external', $list = 0, $code = '', $status = -1)
    {
    }
    /**
     * Get a default reference.
     *
     * @param	Societe		$thirdparty		Thirdparty
     * @return 	string   					Reference
     */
    public function getDefaultRef($thirdparty = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return if at least one photo is available
     *
     *  @param      string      $sdir       Directory to scan
     *  @return     boolean                 True if at least one photo is available, False if not
     */
    public function is_photo_available($sdir)
    {
    }
    /**
     * Copy files defined into $_SESSION array into the ticket directory of attached files.
     * Used for files linked into messages.
     * Files may be renamed during copy to avoid overwriting existing files.
     *
     * @param	string		$forcetrackid	Force trackid used for $keytoavoidconflict into get_attached_files()
     * @return	array|int					Array with final path/name/mime of files.
     */
    public function copyFilesForTicket($forcetrackid = \null)
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
     * @return int							Return integer <0 if KO, >0 if OK
     */
    public function setCategories($categories)
    {
    }
    /**
     * Add new message on a ticket (private/public area).
     * Can also send it by email if GETPOST('send_email', 'int') is set. For such email, header and footer is added.
     *
     * @param   User    $user       	User for action
     * @param   string  $action     	Action string
     * @param   int     $private    	1=Message is private (must not be visible by external users)
     * @param   int     $public_area    0=Default,
     * 									1=If we are creating the message from a public area, so confirmation email will be sent to the author
     * 									and we can search contact from email to add it as contact of ticket if TICKET_ASSIGN_CONTACT_TO_MESSAGE is set
     * @return  int						Return integer <0 if KO, >= 0 if OK
     */
    public function newMessage($user, &$action, $private = 1, $public_area = 0)
    {
    }
    /**
     * Send ticket by email to linked contacts
     *
     * @param string $subject          	  Email subject
     * @param string $message          	  Email message
     * @param int    $send_internal_cc 	  Receive a copy on internal email (getDolGlobalString('TICKET_NOTIFICATION_EMAIL_FROM')
     * @param array  $array_receiver   	  Array of receiver. Example array('name' => 'John Doe', 'email' => 'john@doe.com', etc...)
     * @param array	 $filename_list       List of files to attach (full path of filename on file system)
     * @param array	 $mimetype_list       List of MIME type of attached files
     * @param array	 $mimefilename_list   List of attached file name in message
     * @return boolean     					True if mail sent to at least one receiver, false otherwise
     */
    public function sendTicketMessageByEmail($subject, $message, $send_internal_cc = 0, $array_receiver = array(), $filename_list = array(), $mimetype_list = array(), $mimefilename_list = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *  @param          User	$user   Object user
     *  @param          int		$mode   "opened" for askprice to close, "signed" for proposal to invoice
     *  @return         WorkboardResponse|int             Return integer <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user, $mode)
    {
    }
    /**
     *      Load indicator this->nb of global stats widget
     *
     *      @return     int         Return integer <0 if ko, >0 if ok
     */
    public function loadStateBoard()
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param DoliDB 	$db 			Database handler
     * @param int 		$origin_id 		Old thirdparty id
     * @param int 		$dest_id 		New thirdparty id
     * @return bool
     */
    public static function replaceThirdparty($db, $origin_id, $dest_id)
    {
    }
    /**
     *	Return clicable link of object (with eventually picto)
     *
     *	@param      string	    $option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array		$arraydata				Array of data
     *  @return		string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *  @param	    string		$modele			Force template to use ('' to not force)
     *  @param		Translate	$outputlangs	object lang a utiliser pour traduction
     *  @param      int			$hidedetails    Hide details of lines
     *  @param      int			$hidedesc       Hide description
     *  @param      int			$hideref        Hide ref
     *  @param      null|array  $moreparams     Array to provide more information
     *  @return     int         				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
}