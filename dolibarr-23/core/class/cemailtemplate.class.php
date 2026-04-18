<?php

/**
 * Object of table llx_c_email_templates
 */
class CEmailTemplate extends \CommonObject
{
    const TRIGGER_PREFIX = 'EMAILTEMPLATE';
    /**
     * @var string ID to identify managed object.
     */
    public $element = 'email_template';
    /**
     * @var string 	Name of table without prefix where object is stored. This is also the key used for extrafields management (so extrafields know the link to the parent table).
     */
    public $table_element = 'c_email_templates';
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,langfile?:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-6,6>|string,alwayseditable?:int<0,1>|string,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,cssview?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>|string,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>,searchmulti?:int<0,1>}>	Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array("rowid" => array("type" => "integer", "label" => "TechnicalID", 'enabled' => 1, 'position' => 10, 'notnull' => 1, 'visible' => -1), "module" => array("type" => "varchar(32)", "label" => "Module", 'enabled' => 1, 'position' => 20, 'notnull' => 0, 'visible' => -1), "type_template" => array("type" => "varchar(32)", "label" => "Typetemplate", 'enabled' => 1, 'position' => 25, 'notnull' => 0, 'visible' => -1), "lang" => array("type" => "varchar(6)", "label" => "Lang", 'enabled' => 1, 'position' => 30, 'notnull' => 0, 'visible' => -1), "private" => array("type" => "smallint(6)", "label" => "Private", 'enabled' => 1, 'position' => 35, 'notnull' => 1, 'visible' => -1), "fk_user" => array("type" => "integer:User:user/class/user.class.php", "label" => "Fkuser", 'enabled' => 1, 'position' => 40, 'notnull' => 0, 'visible' => -1, "css" => "maxwidth500 widthcentpercentminusxx", "csslist" => "tdoverflowmax150"), "datec" => array("type" => "datetime", "label" => "DateCreation", 'enabled' => 1, 'position' => 45, 'notnull' => 0, 'visible' => -1), "tms" => array("type" => "timestamp", "label" => "DateModification", 'enabled' => 1, 'position' => 50, 'notnull' => 1, 'visible' => -1), "label" => array("type" => "varchar(255)", "label" => "Label", 'enabled' => 1, 'position' => 55, 'notnull' => 0, 'visible' => -1, 'alwayseditable' => 1, "css" => "minwidth300", "cssview" => "wordbreak", "csslist" => "tdoverflowmax150"), "position" => array("type" => "smallint(6)", "label" => "Position", 'enabled' => 1, 'position' => 60, 'notnull' => 0, 'visible' => -1, 'alwayseditable' => 1), "active" => array("type" => "integer", "label" => "Active", 'enabled' => 1, 'position' => 65, 'notnull' => 1, 'visible' => -1, 'alwayseditable' => 1), "topic" => array("type" => "text", "label" => "Topic", 'enabled' => 1, 'position' => 70, 'notnull' => 0, 'visible' => -1, 'alwayseditable' => 1), "content" => array("type" => "mediumtext", "label" => "Content", 'enabled' => 1, 'position' => 75, 'notnull' => 0, 'visible' => -1, 'alwayseditable' => 1), "content_lines" => array("type" => "text", "label" => "Contentlines", "enabled" => "getDolGlobalString('MAIN_EMAIL_TEMPLATES_FOR_OBJECT_LINES')", 'position' => 80, 'notnull' => 0, 'visible' => -1, 'alwayseditable' => 1), "enabled" => array("type" => "varchar(255)", "label" => "Enabled", 'enabled' => 1, 'position' => 85, 'notnull' => 0, 'visible' => -1, 'alwayseditable' => 1), "joinfiles" => array("type" => "varchar(255)", "label" => "Joinfiles", 'enabled' => 1, 'position' => 90, 'notnull' => 0, 'visible' => -1, 'alwayseditable' => 1), "email_from" => array("type" => "varchar(255)", "label" => "Emailfrom", 'enabled' => 1, 'position' => 95, 'notnull' => 0, 'visible' => -1, 'alwayseditable' => 1), "email_to" => array("type" => "varchar(255)", "label" => "Emailto", 'enabled' => 1, 'position' => 100, 'notnull' => 0, 'visible' => -1, 'alwayseditable' => 1), "email_tocc" => array("type" => "varchar(255)", "label" => "Emailtocc", 'enabled' => 1, 'position' => 105, 'notnull' => 0, 'visible' => -1, 'alwayseditable' => 1), "email_tobcc" => array("type" => "varchar(255)", "label" => "Emailtobcc", 'enabled' => 1, 'position' => 110, 'notnull' => 0, 'visible' => -1, 'alwayseditable' => 1), "defaultfortype" => array("type" => "smallint(6)", "label" => "Defaultfortype", 'enabled' => 1, 'position' => 115, 'notnull' => 0, 'visible' => -1, 'alwayseditable' => 1));
    /**
     * @var int
     */
    public $rowid;
    /**
     * @var string type of the template
     */
    public $type_template;
    /**
     * @var int|string
     */
    public $datec;
    /**
     * @var int
     */
    public $tms;
    /**
     * @var int
     */
    public $active;
    /**
     * @var string if 0 hidden from GUI, if 1 visible in GUI
     */
    public $enabled;
    /**
     * @var int is the template a default or not
     */
    public $defaultfortype;
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string 	Model mail label
     */
    public $label;
    /**
     * @var int Owner of email template
     */
    public $fk_user;
    /**
     * @var int Is template private
     */
    public $private;
    /**
     * @var string Model mail topic
     */
    public $topic;
    /**
     * @var string 	Model mail content
     */
    public $content;
    /**
     * @var string 	Model to use to generate the string with each lines
     */
    public $content_lines;
    /**
     * @var string language of the template
     */
    public $lang;
    /**
     * @var int<0,1>
     */
    public $joinfiles;
    /**
     * @var string sender email address
     */
    public $email_from;
    /**
     * @var string recipient email address
     */
    public $email_to;
    /**
     * @var string Additional visible recipients
     */
    public $email_tocc;
    /**
     * @var string additional hidden recipients
     */
    public $email_tobcc;
    /**
     * @var string Module the template is dedicated for
     */
    public $module;
    /**
     * @var int Position of template in a combo list
     */
    public $position;
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
     *	Create email template
     *  Required fields: label, type_template, topic
     *
     *	@param		User	$user 		Object user that make creation
     *	@param		int	    $notrigger	Disable all triggers
     *	@return 	int			        Return integer <0 if KO, >0 if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *      Update database with changed email template
     *
     *      @param      User	$user        	User that modify
     *      @param      int		$notrigger	    0=launch triggers after, 1=disable triggers
     *      @return     int      			   	Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Delete the email template
     *
     *	@param	User	$user		User object
     *	@param	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     * 	@return	int					Return integer <=0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param 	int    	$id   			Id object
     * @param 	string 	$label  			Ref
     * @param	int		$noextrafields	0=Default to load extrafields, 1=No extrafields
     * @param	int		$nolines		0=Default to load extrafields, 1=No extrafields
     * @return 	int     				Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $label = \null, $noextrafields = 0, $nolines = 0)
    {
    }
    /**
     *	Get email template from database.
     *
     *	@param      int			$id       	row Id of email template
     *	@param      string		$label    	label of email template
     *	@return     int         			>0 if OK, <0 if KO, 0 if not found
     */
    public function apifetch($id, $label = '')
    {
    }
}
/**
 * Old class name for Object of table llx_c_email_templates
 * I prefer the CEmailTemplate name as it better reflects the database
 *
 * @deprecated Use now class CEmailTemplate
 */
class ModelMail extends \CEmailTemplate
{
    // just another name for compatibility
}