<?php

/**
 *    Class to manage ticket
 */
class Ticket extends \CommonObject
{
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
     * @var int  Does ticketcore support multicompany module ? 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     */
    public $ismultientitymanaged = 1;
    /**
     * @var int  Does ticketcore support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 1;
    /**
     * @var string String with name of icon for ticketcore. Must be the part after the 'object_' into object_ticketcore.png
     */
    public $picto = 'ticket';
    /**
     * @var string Hash to identify ticket publically
     */
    public $track_id;
    /**
     * @var int Thirdparty ID
     */
    public $fk_soc;
    /**
     * @var int Project ID
     */
    public $fk_project;
    /**
     * @var string Person email who have create ticket
     */
    public $origin_email;
    /**
     * @var int User id who have create ticket
     */
    public $fk_user_create;
    /**
     * @var int User id who have ticket assigned
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
     * @var int  Ticket statut
     */
    public $fk_statut;
    /**
     * @var string State resolution
     */
    public $resolution;
    /**
     * @var int Progress in percent
     */
    public $progress;
    /**
     * @var int Duration for ticket
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
     * @var int Création date
     */
    public $datec = '';
    /**
     * @var int Read date
     */
    public $date_read = '';
    /**
     * @var int Close ticket date
     */
    public $date_close = '';
    /**
     * @var array cache_types_tickets
     */
    public $cache_types_tickets;
    /**
     * @var array tickets categories
     */
    public $cache_category_tickets;
    /**
     * @var int Notify tiers at create
     */
    public $notify_tiers_at_create;
    public $lines;
    /**
     * @var string Regex pour les images
     */
    public $regeximgext = '\\.jpg|\\.jpeg|\\.bmp|\\.gif|\\.png|\\.tiff';
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'position' => 1, 'visible' => -2, 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'index' => 1, 'comment' => "Id"), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'visible' => 0, 'enabled' => 1, 'position' => 5, 'notnull' => 1, 'index' => 1), 'ref' => array('type' => 'varchar(128)', 'label' => 'Ref', 'visible' => 1, 'enabled' => 1, 'position' => 10, 'notnull' => 1, 'index' => 1, 'searchall' => 1, 'comment' => "Reference of object", 'css' => ''), 'track_id' => array('type' => 'varchar(255)', 'label' => 'TicketTrackId', 'visible' => -2, 'enabled' => 1, 'position' => 11, 'notnull' => -1, 'searchall' => 1, 'help' => "Help text"), 'fk_user_create' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Author', 'visible' => 1, 'enabled' => 1, 'position' => 15, 'notnull' => 1, 'css' => 'nowraponall'), 'origin_email' => array('type' => 'mail', 'label' => 'OriginEmail', 'visible' => -2, 'enabled' => 1, 'position' => 16, 'notnull' => 1, 'index' => 1, 'searchall' => 1, 'comment' => "Reference of object"), 'subject' => array('type' => 'varchar(255)', 'label' => 'Subject', 'visible' => 1, 'enabled' => 1, 'position' => 18, 'notnull' => -1, 'searchall' => 1, 'help' => "", 'css' => 'maxwidth75'), 'type_code' => array('type' => 'varchar(32)', 'label' => 'Type', 'visible' => 1, 'enabled' => 1, 'position' => 20, 'notnull' => -1, 'searchall' => 1, 'help' => "", 'css' => 'maxwidth100'), 'category_code' => array('type' => 'varchar(32)', 'label' => 'TicketGroup', 'visible' => -1, 'enabled' => 1, 'position' => 21, 'notnull' => -1, 'help' => "", 'css' => 'maxwidth100'), 'severity_code' => array('type' => 'varchar(32)', 'label' => 'Severity', 'visible' => 1, 'enabled' => 1, 'position' => 22, 'notnull' => -1, 'help' => "", 'css' => 'maxwidth100'), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'visible' => 1, 'enabled' => 1, 'position' => 50, 'notnull' => -1, 'index' => 1, 'searchall' => 1, 'help' => "LinkToThirparty"), 'notify_tiers_at_create' => array('type' => 'integer', 'label' => 'NotifyThirdparty', 'visible' => -1, 'enabled' => 0, 'position' => 51, 'notnull' => 1, 'index' => 1), 'fk_project' => array('type' => 'integer:Project:projet/class/project.class.php', 'label' => 'Project', 'visible' => -1, 'enabled' => 1, 'position' => 52, 'notnull' => -1, 'index' => 1, 'help' => "LinkToProject"), 'timing' => array('type' => 'varchar(20)', 'label' => 'Timing', 'visible' => -1, 'enabled' => 1, 'position' => 42, 'notnull' => -1, 'help' => ""), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'visible' => 1, 'enabled' => 1, 'position' => 500, 'notnull' => 1), 'date_read' => array('type' => 'datetime', 'label' => 'TicketReadOn', 'visible' => 1, 'enabled' => 1, 'position' => 500, 'notnull' => 1), 'fk_user_assign' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'AssignedTo', 'visible' => 1, 'enabled' => 1, 'position' => 505, 'notnull' => 1), 'date_close' => array('type' => 'datetime', 'label' => 'TicketCloseOn', 'visible' => -1, 'enabled' => 1, 'position' => 510, 'notnull' => 1), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'visible' => -1, 'enabled' => 1, 'position' => 520, 'notnull' => 1), 'message' => array('type' => 'text', 'label' => 'Message', 'visible' => -2, 'enabled' => 1, 'position' => 540, 'notnull' => -1), 'progress' => array('type' => 'varchar(100)', 'label' => 'Progression', 'visible' => -1, 'enabled' => 1, 'position' => 540, 'notnull' => -1, 'css' => 'right', 'help' => ""), 'resolution' => array('type' => 'integer', 'label' => 'Resolution', 'visible' => -1, 'enabled' => 1, 'position' => 550, 'notnull' => 1), 'fk_statut' => array('type' => 'integer', 'label' => 'Status', 'visible' => 1, 'enabled' => 1, 'position' => 600, 'notnull' => 1, 'index' => 1, 'arrayofkeyval' => array(0 => 'Unread', 1 => 'Read', 3 => 'Answered', 4 => 'Assigned', 5 => 'InProgress', 6 => 'Waiting', 8 => 'Closed', 9 => 'Deleted')));
    /**
     * Status
     */
    const STATUS_NOT_READ = 0;
    const STATUS_READ = 1;
    const STATUS_ASSIGNED = 2;
    const STATUS_IN_PROGRESS = 3;
    const STATUS_NEED_MORE_INFO = 5;
    const STATUS_WAITING = 7;
    const STATUS_CLOSED = 8;
    const STATUS_CANCELED = 9;
    /**
     *  Constructor
     *
     *  @param DoliDb $db Database handler
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
     *  Create object into database
     *
     *  @param  User $user      User that creates
     *  @param  int  $notrigger 0=launch triggers after, 1=disable triggers
     *  @return int                      <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from the database
     *
     *  @param  int        	$id    		Id object
     *  @param	string		$ref		Ref
     *  @param	string		$track_id	Track id, a hash like ref
     *  @return int              		<0 if KO, >0 if OK
     */
    public function fetch($id = '', $ref = '', $track_id = '')
    {
    }
    /**
     * Load all objects in memory from database
     *
     * @param  User   $user      User for action
     * @param  string $sortorder Sort order
     * @param  string $sortfield Sort field
     * @param  int    $limit     page number
     * @param  int    $offset    Offset for query
     * @param  int    $arch      archive or not (not used)
     * @param  array  $filter    Filter for query
     *                           output
     * @return int <0 if KO, >0 if OK
     */
    public function fetchAll($user, $sortorder = 'ASC', $sortfield = 't.datec', $limit = '', $offset = 0, $arch = '', $filter = '')
    {
    }
    /**
     *  Update object into database
     *
     *  @param  User $user      User that modifies
     *  @param  int  $notrigger 0=launch triggers after, 1=disable triggers
     *  @return int                     <0 if KO, >0 if OK
     */
    public function update($user = 0, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *     @param  User $user      User that deletes
     *  @param  int  $notrigger 0=launch triggers after, 1=disable triggers
     *  @return int                     <0 if KO, >0 if OK
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
     *     @return void
     */
    public function initAsSpecimen()
    {
    }
    /**
     * print selected status
     *
     * @param string    $selected   selected status
     * @return void
     */
    public function printSelectStatus($selected = "")
    {
    }
    /**
     *      Charge dans cache la liste des types de tickets (paramétrable dans dictionnaire)
     *
     *      @return int             Nb lignes chargees, 0 si deja chargees, <0 si ko
     */
    public function loadCacheTypesTickets()
    {
    }
    /**
     *      Charge dans cache la liste des catégories de tickets (paramétrable dans dictionnaire)
     *
     *      @return int             Nb lignes chargees, 0 si deja chargees, <0 si ko
     */
    public function loadCacheCategoriesTickets()
    {
    }
    /**
     *      Charge dans cache la liste des sévérité de tickets (paramétrable dans dictionnaire)
     *
     *      @return int             Nb lignes chargees, 0 si deja chargees, <0 si ko
     */
    public function loadCacheSeveritiesTickets()
    {
    }
    /**
     * Return status label of object
     *
     * @param      int		$mode     0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     * @return     string    			  Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return status label of object
     *
     *    @param      string 	$statut      id statut
     *    @param      int		$mode        0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *    @return     string     			 Label
     */
    public function LibStatut($statut, $mode = 0)
    {
    }
    /**
     *  Return a link to the object card (with optionaly the picto)
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
     *    @param    User		$user			    Object user
     *    @param	  int			$notrigger		No trigger
     *    @return   int							      <0 if KO, >0 if OK
     */
    public function markAsRead($user, $notrigger = 0)
    {
    }
    /**
     *    Mark a message as read
     *
     *    @param    User	$user				Object user
     *    @param    int 	$id_assign_user		ID of user assigned
     *    @param    int 	$notrigger        	Disable trigger
     *    @return   int							<0 if KO, 0=Nothing done, >0 if OK
     */
    public function assignUser($user, $id_assign_user, $notrigger = 0)
    {
    }
    /**
     *  Send notification of changes by email
     *
     * 	@param  User   $user    		User that create
     * 	@param  string $message 		Log message
     * 	@return int                 	<0 if KO, >0 if OK (number of emails sent)
     */
    private function sendLogByEmail($user, $message)
    {
    }
    /**
     *      Charge la liste des actions sur le ticket
     *
     *      @return int             Nb lignes chargees, 0 si deja chargees, <0 si ko
     */
    public function loadCacheLogsTicket()
    {
    }
    /**
     * Add message into database
     *
     * @param User 	 $user      		  User that creates
     * @param int  	 $notrigger 		  0=launch triggers after, 1=disable triggers
     * @param array	 $filename_list       List of files to attach (full path of filename on file system)
     * @param array	 $mimetype_list       List of MIME type of attached files
     * @param array	 $mimefilename_list   List of attached file name in message
     * @return void
     */
    public function createTicketMessage($user, $notrigger = 0, $filename_list = array(), $mimetype_list = array(), $mimefilename_list = array())
    {
    }
    /**
     *      Load the list of event on ticket into ->cache_msgs_ticket
     *
     *      @return int             Nb of lines loaded, 0 if already loaded, <0 if KO
     */
    public function loadCacheMsgsTicket()
    {
    }
    /**
     *    Close a ticket
     *
     *    @param    User    $user      User that close
     *    @return   int		           <0 if KO, >0 if OK
     */
    public function close(\User $user)
    {
    }
    /**
     *     Search and fetch thirparties by email
     *
     *     @param  string $email   		Email
     *     @param  int    $type    		Type of thirdparties (0=any, 1=customer, 2=prospect, 3=supplier)
     *     @param  array  $filters 		Array of couple field name/value to filter the companies with the same name
     *     @param  string $clause  		Clause for filters
     *     @return array        		Array of thirdparties object
     */
    public function searchSocidByEmail($email, $type = '0', $filters = array(), $clause = 'AND')
    {
    }
    /**
     *     Search and fetch contacts by email
     *
     *     @param  string $email 	Email
     *     @param  array  $socid 	Limit to a thirdparty
     *     @param  string $case  	Respect case
     *     @return array        	Array of contacts object
     */
    public function searchContactByEmail($email, $socid = '', $case = '')
    {
    }
    /**
     *    Define parent commany of current ticket
     *
     *    @param  int $id Id of thirdparty to set or '' to remove
     *    @return int             <0 if KO, >0 if OK
     */
    public function setCustomer($id)
    {
    }
    /**
     *    Define progression of current ticket
     *
     *    @param  int $percent Progression percent
     *    @return int             <0 if KO, >0 if OK
     */
    public function setProgression($percent)
    {
    }
    /**
     *     Link element with a project
     * 	   Override core function because of key name 'fk_project' used for this module
     *
     *     @param  int $projectid Project id to link element to
     *     @return int                        <0 if KO, >0 if OK
     */
    public function setProject($projectid)
    {
    }
    /**
     *     Link element with a contract
     *
     *     @param  int $contractid Contract id to link element to
     *     @return int                        <0 if KO, >0 if OK
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
     * Retrieve informations about internal contacts
     *
     *  @return array       Array with datas : firstname, lastname, socid (-1 for internal users), email, code, libelle, status
     */
    public function getInfosTicketInternalContact()
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
     * Retrieve informations about external contacts
     *
     *  @return array       Array with datas : firstname, lastname, socid (-1 for internal users), email, code, libelle, status
     */
    public function getInfosTicketExternalContact()
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
     * Send message
     *
     *  @param  string $subject	  Subject
     *  @param  string $texte      Message to send
     *  @return int                <0 if KO, or number of changes if OK
     */
    public function messageSend($subject, $texte)
    {
    }
    /**
     *    Get array of all contacts for a ticket
     *    Override method of file commonobject.class.php to add phone number
     *
     *    @param	int    	$statut 	Status of lines to get (-1=all)
     *    @param	string 	$source 	Source of contact: external or thirdparty (llx_socpeople) or internal (llx_user)
     *    @param	int    	$list   	0:Return array contains all properties, 1:Return array contains just id
     *    @param    string  $code       Filter on this code of contact type ('SHIPPING', 'BILLING', ...)
     *    @return 	array          		Array of contacts
     */
    public function listeContact($statut = -1, $source = 'external', $list = 0, $code = '')
    {
    }
    /**
     * Get a default reference.
     *
     * @param	Societe		$thirdparty		Thirdparty
     * @return 	string   					Reference
     */
    public function getDefaultRef($thirdparty = '')
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
     * @return	array		Array with final path/name/mime of files.
     */
    public function copyFilesForTicket()
    {
    }
    /**
     * Add new message on a ticket (private area). Can also send it be email if GETPOST('send_email', 'int') is set.
     *
     * @param   User    $user       User for action
     * @param   string  $action     Action string
     * @param   int     $private    1=Message is private. TODO Implement this. What does this means ?
     * @return  int
     */
    public function newMessage($user, &$action, $private = 1)
    {
    }
    /**
     * Send ticket by email to linked contacts
     *
     * @param string $subject          	  Email subject
     * @param string $message          	  Email message
     * @param int    $send_internal_cc 	  Receive a copy on internal email ($conf->global->TICKET_NOTIFICATION_EMAIL_FROM)
     * @param array  $array_receiver   	  Array of receiver. exemple array('name' => 'John Doe', 'email' => 'john@doe.com', etc...)
     * @param array	 $filename_list       List of files to attach (full path of filename on file system)
     * @param array	 $mimetype_list       List of MIME type of attached files
     * @param array	 $mimefilename_list   List of attached file name in message
     * @return void
     */
    public function sendTicketMessageByEmail($subject, $message, $send_internal_cc = 0, $array_receiver = array(), $filename_list = array(), $mimetype_list = array(), $mimefilename_list = array())
    {
    }
}
/**
 * Ticket line Class
 */
class TicketsLine
{
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string  $ref    Ticket reference
     */
    public $ref;
    /**
     * Hash to identify ticket
     */
    public $track_id;
    /**
     * @var int Thirdparty ID
     */
    public $fk_soc;
    /**
     * Project ID
     */
    public $fk_project;
    /**
     * Person email who have create ticket
     */
    public $origin_email;
    /**
     * User id who have create ticket
     */
    public $fk_user_create;
    /**
     * User id who have ticket assigned
     */
    public $fk_user_assign;
    /**
     * Ticket subject
     */
    public $subject;
    /**
     * Ticket message
     */
    public $message;
    /**
     * Ticket statut
     */
    public $fk_statut;
    /**
     * State resolution
     */
    public $resolution;
    /**
     * Progress in percent
     */
    public $progress;
    /**
     * Duration for ticket
     */
    public $timing;
    /**
     * Type code
     */
    public $type_code;
    /**
     * Category code
     */
    public $category_code;
    /**
     * Severity code
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
     * Creation date
     */
    public $datec = '';
    /**
     * Read date
     */
    public $date_read = '';
    /**
     * Close ticket date
     */
    public $date_close = '';
}