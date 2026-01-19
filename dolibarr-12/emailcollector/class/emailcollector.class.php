<?php

/**
 * Class for EmailCollector
 */
class EmailCollector extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'emailcollector';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'emailcollector_emailcollector';
    /**
     * @var int  Does emailcollector support multicompany module ? 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     */
    public $ismultientitymanaged = 1;
    /**
     * @var int  Does emailcollector support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 0;
    /**
     * @var string String with name of icon for emailcollector. Must be the part after the 'object_' into object_emailcollector.png
     */
    public $picto = 'generic';
    /**
     * @var int    Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_emailcollector';
    /**
     * @var array	List of child tables. To test if we can delete object.
     */
    protected $childtables = array();
    /**
     * @var array	List of child tables. To know object to delete on cascade.
     */
    protected $childtablesoncascade = array('emailcollector_emailcollectorfilter', 'emailcollector_emailcollectoraction');
    /**
     *  'type' if the field format.
     *  'label' the translation key.
     *  'enabled' is a condition when the field must be managed.
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only. Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'default' is a default value for creation (can still be replaced by the global setup of default values)
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommanded to name the field fk_...).
     *  'position' is the sort order of field.
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' is the CSS style to use on field. For example: 'maxwidth200'
     *  'help' is a string visible as a tooltip on field
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'arraykeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'visible' => 2, 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'index' => 1),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'default' => 1, 'notnull' => 1, 'index' => 1, 'position' => 20),
        'ref' => array('type' => 'varchar(128)', 'label' => 'Ref', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'showoncombobox' => 1, 'index' => 1, 'position' => 10, 'searchall' => 1, 'help' => 'Example: MyCollector1'),
        'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'visible' => 1, 'enabled' => 1, 'position' => 30, 'notnull' => -1, 'searchall' => 1, 'help' => 'Example: My Email collector'),
        'description' => array('type' => 'text', 'label' => 'Description', 'visible' => -1, 'enabled' => 1, 'position' => 60, 'notnull' => -1),
        'host' => array('type' => 'varchar(255)', 'label' => 'EMailHost', 'visible' => 1, 'enabled' => 1, 'position' => 90, 'notnull' => 1, 'searchall' => 1, 'comment' => "IMAP server", 'help' => 'Example: imap.gmail.com'),
        'hostcharset' => array('type' => 'varchar(16)', 'label' => 'HostCharset', 'visible' => -1, 'enabled' => 1, 'position' => 91, 'notnull' => 0, 'searchall' => 0, 'comment' => "IMAP server charset", 'help' => 'Example: "UTF-8" (May be "US-ASCII" with some Office365)'),
        'login' => array('type' => 'varchar(128)', 'label' => 'Login', 'visible' => 1, 'enabled' => 1, 'position' => 101, 'notnull' => -1, 'index' => 1, 'comment' => "IMAP login", 'help' => 'Example: myaccount@gmail.com'),
        'password' => array('type' => 'password', 'label' => 'Password', 'visible' => -1, 'enabled' => 1, 'position' => 102, 'notnull' => -1, 'comment' => "IMAP password", 'help' => 'WithGMailYouCanCreateADedicatedPassword'),
        'source_directory' => array('type' => 'varchar(255)', 'label' => 'MailboxSourceDirectory', 'visible' => -1, 'enabled' => 1, 'position' => 103, 'notnull' => 1, 'default' => 'Inbox', 'help' => 'Example: INBOX'),
        //'filter' => array('type'=>'text', 'label'=>'Filter', 'visible'=>1, 'enabled'=>1, 'position'=>105),
        //'actiontodo' => array('type'=>'varchar(255)', 'label'=>'ActionToDo', 'visible'=>1, 'enabled'=>1, 'position'=>106),
        'target_directory' => array('type' => 'varchar(255)', 'label' => 'MailboxTargetDirectory', 'visible' => 1, 'enabled' => 1, 'position' => 110, 'notnull' => 0, 'help' => "EmailCollectorTargetDir"),
        'maxemailpercollect' => array('type' => 'integer', 'label' => 'MaxEmailCollectPerCollect', 'visible' => -1, 'enabled' => 1, 'position' => 111, 'default' => 100),
        'datelastresult' => array('type' => 'datetime', 'label' => 'DateLastCollectResult', 'visible' => 1, 'enabled' => '$action != "create" && $action != "edit"', 'position' => 121, 'notnull' => -1),
        'codelastresult' => array('type' => 'varchar(16)', 'label' => 'CodeLastResult', 'visible' => 1, 'enabled' => '$action != "create" && $action != "edit"', 'position' => 122, 'notnull' => -1),
        'lastresult' => array('type' => 'varchar(255)', 'label' => 'LastResult', 'visible' => 1, 'enabled' => '$action != "create" && $action != "edit"', 'position' => 123, 'notnull' => -1),
        'datelastok' => array('type' => 'datetime', 'label' => 'DateLastcollectResultOk', 'visible' => 1, 'enabled' => '$action != "create"', 'position' => 125, 'notnull' => -1),
        'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'visible' => 0, 'enabled' => 1, 'position' => 61, 'notnull' => -1),
        'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'visible' => 0, 'enabled' => 1, 'position' => 62, 'notnull' => -1),
        'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'visible' => -2, 'enabled' => 1, 'position' => 500, 'notnull' => 1),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'visible' => -2, 'enabled' => 1, 'position' => 501, 'notnull' => 1),
        //'date_validation' => array('type'=>'datetime',     'label'=>'DateCreation',     'enabled'=>1, 'visible'=>-2, 'position'=>502),
        'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'visible' => -2, 'enabled' => 1, 'position' => 510, 'notnull' => 1),
        'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'visible' => -2, 'enabled' => 1, 'position' => 511, 'notnull' => -1),
        //'fk_user_valid' =>array('type'=>'integer',      'label'=>'UserValidation',        'enabled'=>1, 'visible'=>-1, 'position'=>512),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'visible' => -2, 'enabled' => 1, 'position' => 1000, 'notnull' => -1),
        'status' => array('type' => 'integer', 'label' => 'Status', 'visible' => 1, 'enabled' => 1, 'position' => 1000, 'notnull' => 1, 'index' => 1, 'arrayofkeyval' => array('0' => 'Inactive', '1' => 'Active')),
    );
    /**
     * @var int ID
     */
    public $rowid;
    /**
     * @var string Ref
     */
    public $ref;
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * @var string label
     */
    public $label;
    /**
     * @var int Status
     */
    public $status;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    public $tms;
    /**
     * @var int ID
     */
    public $fk_user_creat;
    /**
     * @var int ID
     */
    public $fk_user_modif;
    public $import_key;
    public $host;
    public $hostcharset;
    public $login;
    public $password;
    public $source_directory;
    public $target_directory;
    public $maxemailpercollect;
    /**
     * @var integer|string $datelastresult
     */
    public $datelastresult;
    public $lastresult;
    // END MODULEBUILDER PROPERTIES
    public $filters;
    public $actions;
    public $debuginfo;
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;
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
     * Clone and object into another one
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
    /*
    public function fetchLines()
    {
        $this->lines=array();
    
        // Load lines with object EmailCollectorLine
    
        return count($this->lines)?1:0;
    }
    */
    /**
     * Fetch all account and load objects into an array
     *
     * @param   User    $user           User
     * @param   int     $activeOnly     filter if active
     * @param   string  $sortfield      field for sorting
     * @param   string  $sortorder      sorting order
     * @param   int     $limit          sort limit
     * @param   int     $page           page to start on
     * @return  array   Array with key => EmailCollector object
     */
    public function fetchAll(\User $user, $activeOnly = 0, $sortfield = 's.rowid', $sortorder = 'ASC', $limit = 100, $page = 0)
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
     *  Return label of the status
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
     *	Charge les informations d'ordre info dans l'objet commande
     *
     *	@param  int		$id       Id of order
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
     * Fetch filters
     *
     * @return 	int		<0 if KO, >0 if OK
     */
    public function fetchFilters()
    {
    }
    /**
     * Fetch actions
     *
     * @return 	int		<0 if KO, >0 if OK
     */
    public function fetchActions()
    {
    }
    /**
     * Return the connectstring to use with IMAP connection function
     *
     * @param	int		$ssl		Add /ssl tag
     * @param	int		$norsh		Add /norsh to connectstring
     * @return string
     */
    public function getConnectStringIMAP($ssl = 1, $norsh = 0)
    {
    }
    /**
     * Convert str to UTF-7 imap default mailbox names
     *
     * @param 	string $str			String to encode
     * @return 	string				Encode string
     */
    public function getEncodedUtf7($str)
    {
    }
    /**
     * Action executed by scheduler
     * CAN BE A CRON TASK. In such a case, paramerts come from the schedule job setup field 'Parameters'
     *
     * @return	int			0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function doCollect()
    {
    }
    /**
     * overwitePropertiesOfObject
     *
     * @param	object	$object			Current object
     * @param	string	$actionparam	Action parameters
     * @param	string	$messagetext	Body
     * @param	string	$subject		Subject
     * @param   string  $header         Header
     * @return	int						0=OK, Nb of error if error
     */
    private function overwritePropertiesOfObject(&$object, $actionparam, $messagetext, $subject, $header)
    {
    }
    /**
     * Execute collect for current collector loaded previously with fetch.
     *
     * @return	int			<0 if KO, >0 if OK
     */
    public function doCollectOneCollector()
    {
    }
    // Loop to get part html and plain. Code found on PHP imap_fetchstructure documentation
    /**
     * getmsg
     *
     * @param 	Object $mbox     	Structure
     * @param 	string $mid		    prefix
     * @return 	array				Array with number and object
     */
    private function getmsg($mbox, $mid)
    {
    }
    /* partno string
       0 multipart/mixed
       1 multipart/alternative
       1.1 text/plain
       1.2 text/html
       2 message/rfc822
       2 multipart/mixed
       2.1 multipart/alternative
       2.1.1 text/plain
       2.1.2 text/html
       2.2 message/rfc822
       2.2 multipart/alternative
       2.2.1 text/plain
       2.2.2 text/html
       */
    /**
     * Sub function for getpart(). Only called by createPartArray() and itself.
     *
     * @param 	Object		$mbox			Structure
     * @param 	string		$mid			Part no
     * @param 	Object		$p              Object p
     * @param   string      $partno         Partno
     * @return	void
     */
    private function getpart($mbox, $mid, $p, $partno)
    {
    }
    /**
     * Converts a string from one encoding to another.
     *
     * @param string $string		String to convert
     * @param string $fromEncoding	String encoding
     * @param string $toEncoding	String return encoding
     * @return string 				Converted string if conversion was successful, or the original string if not
     * @throws Exception
     */
    protected function convertStringEncoding($string, $fromEncoding, $toEncoding = 'UTF-8')
    {
    }
}