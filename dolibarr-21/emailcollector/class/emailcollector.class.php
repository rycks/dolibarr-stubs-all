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
     * @var string String with name of icon for emailcollector. Must be the part after the 'object_' into object_emailcollector.png
     */
    public $picto = 'email';
    /**
     * @var string    Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_emailcollector';
    /**
     * @var array<string, array<string>>	List of child tables. To test if we can delete object.
     */
    protected $childtables = array();
    /**
     * @var string[]	List of child tables. To know object to delete on cascade.
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
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'position' is the sort order of field.
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' is the CSS style to use on field. For example: 'maxwidth200'
     *  'help' is a string visible as a tooltip on field
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'arrayofkeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-5,5>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'visible' => 2, 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'index' => 1),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'default' => '1', 'notnull' => 1, 'index' => 1, 'position' => 20),
        'ref' => array('type' => 'varchar(128)', 'label' => 'Ref', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'showoncombobox' => 1, 'index' => 1, 'position' => 10, 'searchall' => 1, 'help' => 'Example: MyCollector1', 'csslist' => 'tdoverflowmax200'),
        'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'visible' => 1, 'enabled' => 1, 'position' => 30, 'notnull' => -1, 'searchall' => 1, 'help' => 'Example: My Email collector', 'csslist' => 'tdoverflowmax150', 'tdcss' => 'titlefieldmiddle'),
        'description' => array('type' => 'text', 'label' => 'Description', 'visible' => -1, 'enabled' => 1, 'position' => 60, 'notnull' => -1, 'cssview' => 'small', 'csslist' => 'small tdoverflowmax200'),
        'host' => array('type' => 'varchar(255)', 'label' => 'EMailHost', 'visible' => 1, 'enabled' => 1, 'position' => 90, 'notnull' => 1, 'searchall' => 1, 'comment' => "IMAP server", 'help' => 'Example: imap.gmail.com', 'csslist' => 'tdoverflowmax125'),
        'port' => array('type' => 'varchar(10)', 'label' => 'EMailHostPort', 'visible' => 1, 'enabled' => 1, 'position' => 91, 'notnull' => 1, 'searchall' => 0, 'comment' => "IMAP server port", 'help' => 'Example: 993', 'csslist' => 'tdoverflowmax50', 'default' => '993'),
        'imap_encryption' => array('type' => 'varchar(16)', 'label' => 'ImapEncryption', 'visible' => -1, 'enabled' => 1, 'position' => 92, 'searchall' => 0, 'comment' => "IMAP encryption", 'help' => 'ImapEncryptionHelp', 'arrayofkeyval' => array('ssl' => 'SSL', 'tls' => 'TLS', 'notls' => 'NOTLS'), 'default' => 'ssl'),
        'hostcharset' => array('type' => 'varchar(16)', 'label' => 'HostCharset', 'visible' => -1, 'enabled' => 1, 'position' => 93, 'notnull' => 0, 'searchall' => 0, 'comment' => "IMAP server charset", 'help' => 'Example: "UTF-8" (May be "US-ASCII" with some Office365)', 'default' => 'UTF-8'),
        'norsh' => array('type' => 'integer', 'label' => 'NoRSH', 'visible' => -1, 'enabled' => "!getDolGlobalInt('MAIN_IMAP_USE_PHPIMAP')", 'position' => 94, 'searchall' => 0, 'help' => 'NoRSHHelp', 'arrayofkeyval' => array(0 => 'No', 1 => 'Yes'), 'default' => '0'),
        'acces_type' => array('type' => 'integer', 'label' => 'AuthenticationMethod', 'visible' => -1, 'enabled' => "getDolGlobalInt('MAIN_IMAP_USE_PHPIMAP')", 'position' => 101, 'notnull' => 1, 'index' => 1, 'comment' => "IMAP login type", 'arrayofkeyval' => array(0 => 'loginPassword', 1 => 'oauthToken'), 'default' => '0', 'help' => ''),
        'login' => array('type' => 'varchar(128)', 'label' => 'Login', 'visible' => -1, 'enabled' => 1, 'position' => 102, 'notnull' => -1, 'index' => 1, 'comment' => "IMAP login", 'help' => 'Example: myaccount@gmail.com'),
        'password' => array('type' => 'password', 'label' => 'Password', 'visible' => -1, 'enabled' => "1", 'position' => 103, 'notnull' => -1, 'comment' => "IMAP password", 'help' => 'WithGMailYouCanCreateADedicatedPassword'),
        'oauth_service' => array('type' => 'varchar(128)', 'label' => 'oauthService', 'visible' => -1, 'enabled' => "getDolGlobalInt('MAIN_IMAP_USE_PHPIMAP')", 'position' => 104, 'notnull' => 0, 'index' => 1, 'comment' => "IMAP login oauthService", 'arrayofkeyval' => array(), 'help' => 'TokenMustHaveBeenCreated'),
        'source_directory' => array('type' => 'varchar(255)', 'label' => 'MailboxSourceDirectory', 'visible' => -1, 'enabled' => 1, 'position' => 109, 'notnull' => 1, 'default' => 'Inbox', 'csslist' => 'tdoverflowmax100', 'help' => 'Example: INBOX, [Gmail]/Spam, [Gmail]/Draft, [Gmail]/Brouillons, [Gmail]/Sent Mail, [Gmail]/Messages envoyés, ...'),
        'target_directory' => array('type' => 'varchar(255)', 'label' => 'MailboxTargetDirectory', 'visible' => 1, 'enabled' => 1, 'position' => 110, 'notnull' => 0, 'csslist' => 'tdoverflowmax100', 'help' => "EmailCollectorTargetDir"),
        'maxemailpercollect' => array('type' => 'integer', 'label' => 'MaxEmailCollectPerCollect', 'visible' => -1, 'enabled' => 1, 'position' => 111, 'default' => '50'),
        'datelastresult' => array('type' => 'datetime', 'label' => 'DateLastCollectResult', 'visible' => 1, 'enabled' => '$action != "create" && $action != "edit"', 'position' => 121, 'notnull' => -1, 'csslist' => 'nowraponall'),
        'codelastresult' => array('type' => 'varchar(16)', 'label' => 'CodeLastResult', 'visible' => 1, 'enabled' => '$action != "create" && $action != "edit"', 'position' => 122, 'notnull' => -1),
        'lastresult' => array('type' => 'varchar(255)', 'label' => 'LastResult', 'visible' => 1, 'enabled' => '$action != "create" && $action != "edit"', 'position' => 123, 'notnull' => -1, 'cssview' => 'small', 'csslist' => 'small tdoverflowmax200'),
        'datelastok' => array('type' => 'datetime', 'label' => 'DateLastcollectResultOk', 'visible' => 1, 'enabled' => '$action != "create"', 'position' => 125, 'notnull' => -1, 'csslist' => 'nowraponall'),
        'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'visible' => 0, 'enabled' => 1, 'position' => 61, 'notnull' => -1),
        'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'visible' => 0, 'enabled' => 1, 'position' => 62, 'notnull' => -1),
        'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'visible' => -2, 'enabled' => 1, 'position' => 500, 'notnull' => 1),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'visible' => -2, 'enabled' => 1, 'position' => 501, 'notnull' => 1),
        //'date_validation' => array('type'=>'datetime',     'label'=>'DateCreation',     'enabled'=>1, 'visible'=>-2, 'position'=>502),
        'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'visible' => -2, 'enabled' => 1, 'position' => 510, 'notnull' => 1),
        'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'visible' => -2, 'enabled' => 1, 'position' => 511, 'notnull' => -1),
        //'fk_user_valid' =>array('type'=>'integer',      'label'=>'UserValidation',        'enabled'=>1, 'visible'=>-1, 'position'=>512),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'visible' => -2, 'enabled' => 1, 'position' => 1000, 'notnull' => -1),
        'status' => array('type' => 'integer', 'label' => 'Status', 'visible' => 1, 'enabled' => 1, 'position' => 1000, 'notnull' => 1, 'default' => '0', 'index' => 1, 'arrayofkeyval' => array(0 => 'Inactive', 1 => 'Active')),
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
     * @var string description
     */
    public $description;
    /**
     * @var int Status
     */
    public $status;
    /**
     * @var int ID
     */
    public $fk_user_creat;
    /**
     * @var int ID
     */
    public $fk_user_modif;
    /**
     * @var string import key
     */
    public $import_key;
    /**
     * @var string
     */
    public $host;
    /**
     * @var string
     */
    public $port;
    /**
     * @var string
     */
    public $hostcharset;
    /**
     * @var string
     */
    public $login;
    /**
     * @var string
     */
    public $password;
    /**
     * @var int
     */
    public $acces_type;
    /**
     * @var string
     */
    public $oauth_service;
    /**
     * @var string
     */
    public $imap_encryption;
    /**
     * @var int<0,1>
     */
    public $norsh;
    /**
     * @var string
     */
    public $source_directory;
    /**
     * @var string
     */
    public $target_directory;
    /**
     * @var int
     */
    public $maxemailpercollect;
    /**
     * @var int|string $datelastresult
     */
    public $datelastresult;
    /**
     * @var string
     */
    public $codelastresult;
    /**
     * @var string
     */
    public $lastresult;
    /**
     * @var int|string
     */
    public $datelastok;
    // END MODULEBUILDER PROPERTIES
    /**
     * @var array<array{id:int,status:int,rulevalue:string,type:'to'|'from'|'bcc'|'cc'|'subject'|'body'|'header'|'seene'|'unseen'|'unanswered'|'answered'|'smaller'|'larger'|'withtrackingidinmsgid'|'withouttrackingidinmsgid'|'withtrackingid'|'withouttrackingid'|'isanwser'|'isnotanswer'|'replyto'}>
     */
    public $filters;
    /**
     * @var array<array{type:string,actionparam:string,status:int,position:int}>
     */
    public $actions;
    /**
     * @var string
     */
    public $debuginfo;
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;
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
     * @return  EmailCollector[]		Array with key => EmailCollector object
     */
    public function fetchAll(\User $user, $activeOnly = 0, $sortfield = 's.rowid', $sortorder = 'ASC', $limit = 100, $page = 0)
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
     *	Charge les information d'ordre info dans l'objet commande
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
     * @return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     * Fetch filters
     *
     * @return 	int		Return integer <0 if KO, >0 if OK
     * @see fetchActions()
     */
    public function fetchFilters()
    {
    }
    /**
     * Fetch actions
     *
     * @return 	int		Return integer <0 if KO, >0 if OK
     * @see fetchFilters()
     */
    public function fetchActions()
    {
    }
    /**
     * Return the connectstring to use with IMAP connection function
     *
     * @return string
     */
    public function getConnectStringIMAP()
    {
    }
    /**
     * Convert str to UTF-7 imap. Used to forge mailbox names.
     *
     * @param 	string $str			String to encode
     * @return 	string|false		Encoded string, or false if error
     */
    public function getEncodedUtf7($str)
    {
    }
    /**
     * Action executed by scheduler
     * CAN BE A CRON TASK. In such a case, parameters come from the schedule job setup field 'Parameters'
     *
     * @return	int			0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function doCollect()
    {
    }
    /**
     * overwitePropertiesOfObject
     *
     * @param	object	$object			Current object we will set ->properties
     * @param	string	$actionparam	Action parameters
     * @param	string	$messagetext	Body
     * @param	string	$subject		Subject
     * @param   string  $header         Header
     * @param	string	$operationslog	String with logs of operations done
     * @return	int						0=OK, Nb of error if error
     */
    private function overwritePropertiesOfObject(&$object, $actionparam, $messagetext, $subject, $header, &$operationslog)
    {
    }
    /**
     * Execute collect for current collector loaded previously with fetch.
     *
     * @param	int		$mode		0=Mode production, 1=Mode test (read IMAP and try SQL update then rollback), 2=Mode test with no SQL updates
     * @return	int					Return integer <0 if KO, >0 if OK
     */
    public function doCollectOneCollector($mode = 0)
    {
    }
    // Loop to get part html and plain. Code found on PHP imap_fetchstructure documentation
    /**
     * getmsg
     *
     * @param 	Object $mbox     	Structure
     * @param 	string $mid		    UID email
     * @param 	string $destdir	    Target dir for attachments. Leave blank to parse without writing to disk.
     * @return 	void
     */
    private function getmsg($mbox, $mid, $destdir = '')
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
     * @param 	string 		$destdir	    Target dir for attachments. Leave blank to parse without writing to disk.
     * @return	void
     */
    private function getpart($mbox, $mid, $p, $partno, $destdir = '')
    {
    }
    /**
     * Converts a string from one encoding to another.
     *
     * @param  string 	$string			String to convert
     * @param  string 	$fromEncoding	String encoding
     * @param  string 	$toEncoding		String return encoding
     * @return string 					Converted string if conversion was successful, or the original string if not
     * @throws Exception
     */
    protected function convertStringEncoding($string, $fromEncoding, $toEncoding = 'UTF-8')
    {
    }
    /**
     * Decode a subject string according to RFC2047
     * Example: '=?Windows-1252?Q?RE=A0:_ABC?=' => 'RE : ABC...'
     * Example: '=?UTF-8?Q?A=C3=A9B?=' => 'AéB'
     * Example: '=?UTF-8?B?2KLYstmF2KfbjNi0?=' =>
     * Example: '=?utf-8?B?UkU6IG1vZHVsZSBkb2xpYmFyciBnZXN0aW9ubmFpcmUgZGUgZmljaGllcnMg?= =?utf-8?B?UsOpZsOpcmVuY2UgZGUgbGEgY29tbWFuZGUgVFVHRURJSklSIOKAkyBwYXNz?= =?utf-8?B?w6llIGxlIDIyLzA0LzIwMjA=?='
     *
     * @param 	string	$subject		Subject
     * @return 	string					Decoded subject (in UTF-8)
     */
    protected function decodeSMTPSubject($subject)
    {
    }
    /**
     * saveAttachment
     *
     * @param  string $destdir	destination
     * @param  string $filename filename
     * @param  string $content  content
     * @return void
     */
    private function saveAttachment($destdir, $filename, $content)
    {
    }
    /**
     * Get UID of message as a string
     *
     * @param int|Webklex\PHPIMAP\Message	$imapemail		UID as int (if native IMAP) or as object (if external library)
     * @return string						UID as string
     */
    protected function uidAsString($imapemail)
    {
    }
}