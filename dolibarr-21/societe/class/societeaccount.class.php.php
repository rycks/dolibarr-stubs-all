<?php

//require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class for SocieteAccount
 */
class SocieteAccount extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'societeaccount';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'societe_account';
    /**
     * @var string String with name of icon for societeaccount. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'lock';
    /**
     *  'type' field format:
     *  	'integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]',
     *  	'select' (list of values are in 'options'. for integer list of values are in 'arrayofkeyval'),
     *  	'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter[:CategoryIdType[:CategoryIdList[:SortField]]]]]]',
     *  	'chkbxlst:...',
     *  	'varchar(x)',
     *  	'text', 'text:none', 'html',
     *   	'double(24,8)', 'real', 'price', 'stock',
     *  	'date', 'datetime', 'timestamp', 'duration',
     *  	'boolean', 'checkbox', 'radio', 'array',
     *  	'mail', 'phone', 'url', 'password', 'ip'
     *		Note: Filter must be a Dolibarr Universal Filter syntax string. Example: "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.status:!=:0) or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalInt("MY_SETUP_PARAM")' or 'isModEnabled("multicurrency")' ...)
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'alwayseditable' says if field can be modified also when status is not draft ('1' or '0')
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 or 2 if field can be used for measure. Field type must be summable like integer or double(24,8). Use 1 in most cases, or 2 if you don't want to see the column total into list (for example for percentage)
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'css'=>'minwidth300 maxwidth500 widthcentpercentminusx', 'cssview'=>'wordbreak', 'csslist'=>'tdoverflowmax200'
     *  'help' and 'helplist' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set a list of values if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel"). Note that type can be 'integer' or 'varchar'
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *	'validate' is 1 if you need to validate the field with $this->validateField(). Need MAIN_ACTIVATE_VALIDATION_RESULT.
     *  'copytoclipboard' is 1 or 2 to allow to add a picto to copy value into clipboard (1=picto after label, 2=picto after value)
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-6,5>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'visible' => -2, 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'index' => 1, 'comment' => 'Id'),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'visible' => 0, 'enabled' => 1, 'position' => 5, 'default' => '1'),
        'login' => array('type' => 'varchar(64)', 'label' => 'Login', 'visible' => 1, 'enabled' => 1, 'notnull' => 1, 'position' => 10, 'showoncombobox' => 1, 'autofocusoncreate' => 1, 'csslist' => 'tdoverflowmax150'),
        'pass_encoding' => array('type' => 'varchar(24)', 'label' => 'PassEncoding', 'visible' => 0, 'enabled' => 1, 'position' => 30),
        'pass_crypted' => array('type' => 'password', 'label' => 'Password', 'visible' => -1, 'enabled' => 1, 'position' => 31, 'notnull' => 1),
        'pass_temp' => array('type' => 'varchar(128)', 'label' => 'Temp', 'visible' => 0, 'enabled' => 0, 'position' => 32, 'notnull' => -1),
        'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'visible' => -6, 'enabled' => 1, 'position' => 40, 'notnull' => -1, 'index' => 1, 'picto' => 'company', 'css' => 'maxwidth300 widthcentpercentminusxx'),
        'site' => array('type' => 'varchar(128)', 'label' => 'WebsiteTypeLabel', 'visible' => 0, 'enabled' => 0, 'position' => 41, 'notnull' => 1, 'default' => '', 'help' => 'Name of the website or service if this is account on an external website or service', 'csslist' => 'tdoverflowmax150', 'arrayofkeyval' => array()),
        'fk_website' => array('type' => 'integer:Website:website/class/website.class.php', 'label' => 'WebSite', 'visible' => 0, 'enabled' => 0, 'position' => 42, 'notnull' => -1, 'index' => 1, 'picto' => 'website', 'css' => 'maxwidth300 widthcentpercentminusxx', 'csslist' => 'tdoverflowmax150'),
        'site_account' => array('type' => 'varchar(128)', 'label' => 'ExternalSiteAccount', 'visible' => 0, 'enabled' => 1, 'position' => 44, 'help' => 'A key to identify the account on external web site if this is an account on an external website'),
        'key_account' => array('type' => 'varchar(128)', 'label' => 'KeyAccount', 'visible' => 0, 'enabled' => 1, 'position' => 48, 'notnull' => 0, 'index' => 1, 'searchall' => 1, 'comment' => 'The id of third party in the external web site (for site_account if site_account defined)'),
        'date_last_login' => array('type' => 'datetime', 'label' => 'LastConnexion', 'visible' => 2, 'enabled' => 1, 'position' => 50, 'notnull' => 0, 'css' => 'nowraponall'),
        'date_previous_login' => array('type' => 'datetime', 'label' => 'PreviousConnexion', 'visible' => 2, 'enabled' => 1, 'position' => 51, 'notnull' => 0, 'css' => 'nowraponall'),
        'date_last_reset_password' => array('type' => 'datetime', 'label' => 'PreviousResetPassword', 'visible' => 0, 'enabled' => 1, 'position' => 53, 'notnull' => 0, 'css' => 'nowraponall'),
        //'note_public' => array('type'=>'html', 'label'=>'NotePublic', 'visible'=>-1, 'enabled'=>1, 'position'=>45, 'notnull'=>-1,),
        'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'visible' => -1, 'enabled' => 1, 'position' => 46, 'notnull' => -1),
        'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'visible' => -2, 'enabled' => 1, 'position' => 500, 'notnull' => 1),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'visible' => -2, 'enabled' => 1, 'position' => 500, 'notnull' => 1),
        'fk_user_creat' => array('type' => 'integer', 'label' => 'UserAuthor', 'visible' => -2, 'enabled' => 1, 'position' => 500, 'notnull' => 1),
        'fk_user_modif' => array('type' => 'integer', 'label' => 'UserModif', 'visible' => -2, 'enabled' => 1, 'position' => 500, 'notnull' => -1),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'visible' => -2, 'enabled' => 1, 'position' => 1000, 'notnull' => -1, 'index' => 1),
        'status' => array('type' => 'integer', 'label' => 'Status', 'visible' => 1, 'enabled' => 1, 'position' => 1000, 'notnull' => 1, 'index' => 1, 'default' => '1', 'arrayofkeyval' => array(1 => 'Active', 0 => 'Disabled')),
    );
    /**
     * @var int ID
     */
    public $rowid;
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * @var string
     */
    public $key_account;
    /**
     * @var string
     */
    public $login;
    /**
     * @var string
     */
    public $pass_encoding;
    /**
     * @var string
     */
    public $pass_crypted;
    /**
     * @var string
     */
    public $pass;
    /**
     * @var string
     */
    public $pass_temp;
    /**
     * @var int Thirdparty ID
     */
    public $fk_soc;
    /**
     * @var string
     */
    public $site;
    /**
     * @var int
     */
    public $fk_website;
    /**
     * @var ?string
     */
    public $site_account;
    /**
     * @var int|string date_last_login
     */
    public $date_last_login;
    /**
     * @var int|''
     */
    public $date_last_reset_password;
    /**
     * @var int|''
     */
    public $date_previous_login;
    /**
     * @var string
     */
    public $note_private;
    /**
     * @var int ID
     */
    public $fk_user_creat;
    /**
     * @var int ID
     */
    public $fk_user_modif;
    /**
     * @var string
     */
    public $import_key;
    /**
     * @var int Status
     */
    public $status;
    // END MODULEBUILDER PROPERTIES
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
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
     * Try to find the external customer id of a third party for another site/system.
     *
     * @param	int			$id				Id of third party
     * @param	string		$site			Site (example: 'stripe', '...')
     * @param	int<-1,1>	$status			Status (0=test, 1=live, -1=we don't mind)
     * @param	string		$site_account 	Value to use to identify with account to use on site when site can offer several accounts. For example: 'pk_live_123456' when using Stripe service.
     * @param	int			$fk_website		Id website
     * @return	string						Stripe customer ref 'cu_xxxxxxxxxxxxx' or ''
     * @see getThirdPartyID()
     */
    public function getCustomerAccount($id, $site, $status = 0, $site_account = '', $fk_website = 0)
    {
    }
    /**
     * Try to find the thirdparty id from an another site/system external id.
     *
     * @param	string	$id			Id of customer in external system (example: 'cu_xxxxxxxxxxxxx', ...)
     * @param	string	$site		Site (example: 'stripe', '...')
     * @param	int		$status		Status (0=test, 1=live)
     * @return	int					Id of third party
     * @see getCustomerAccount()
     */
    public function getThirdPartyID($id, $site, $status = 0)
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
     * getTooltipContentArray
     *
     * @param array<string,mixed> $params params to construct tooltip data
     * @since v18
     * @return array{picto?:string,ref?:string,refsupplier?:string,label?:string,date?:string,date_echeance?:string,amountht?:string,total_ht?:string,totaltva?:string,amountlt1?:string,amountlt2?:string,amountrevenustamp?:string,totalttc?:string}|array{optimize:string}
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
     *  Return the label of a given status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the status
     *
     *  @param	int		$status        	Id status
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 			       	Label of status
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
}