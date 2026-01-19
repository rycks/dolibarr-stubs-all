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
     * @var array  Does societeaccount support multicompany module ? 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     */
    public $ismultientitymanaged = 0;
    /**
     * @var string String with name of icon for societeaccount. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'lock';
    /**
     *  'type' if the field format.
     *  'label' the translation key.
     *  'enabled' is a condition when the field must be managed.
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only. Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommanded to name the field fk_...).
     *  'position' is the sort order of field.
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'help' is a string visible as a tooltip on field
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *  'default' is a default value for creation (can still be replaced by the global setup of default values)
     *  'showoncombobox' if field must be shown into the label of combobox
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'visible' => -2, 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'index' => 1, 'comment' => 'Id'),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'visible' => 0, 'enabled' => 1, 'position' => 5, 'default' => 1),
        'login' => array('type' => 'varchar(64)', 'label' => 'Login', 'visible' => 1, 'enabled' => 1, 'notnull' => 1, 'position' => 10, 'showoncombobox' => 1),
        'pass_encoding' => array('type' => 'varchar(24)', 'label' => 'PassEncoding', 'visible' => 0, 'enabled' => 1, 'position' => 30),
        'pass_crypted' => array('type' => 'varchar(128)', 'label' => 'Password', 'visible' => 1, 'enabled' => 1, 'position' => 31, 'notnull' => 1),
        'pass_temp' => array('type' => 'varchar(128)', 'label' => 'Temp', 'visible' => 0, 'enabled' => 0, 'position' => 32, 'notnull' => -1),
        'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'visible' => 1, 'enabled' => 1, 'position' => 40, 'notnull' => -1, 'index' => 1),
        'fk_website' => array('type' => 'integer:Website:website/class/website.class.php', 'label' => 'WebSite', 'visible' => 1, 'enabled' => 1, 'position' => 42, 'notnull' => -1, 'index' => 1),
        'site' => array('type' => 'varchar(128)', 'label' => 'ExternalSite', 'visible' => 0, 'enabled' => 1, 'position' => 43, 'help' => 'Name of the website or service if this is account on an external website or service'),
        'site_account' => array('type' => 'varchar(128)', 'label' => 'ExternalSiteAccount', 'visible' => 0, 'enabled' => 1, 'position' => 44, 'help' => 'A key to identify the account on external web site if this is an account on an external website'),
        'key_account' => array('type' => 'varchar(128)', 'label' => 'KeyAccount', 'visible' => 0, 'enabled' => 1, 'position' => 48, 'notnull' => 0, 'index' => 1, 'searchall' => 1, 'comment' => 'The id of third party in the external web site (for site_account if site_account defined)'),
        'date_last_login' => array('type' => 'datetime', 'label' => 'LastConnexion', 'visible' => 2, 'enabled' => 1, 'position' => 50, 'notnull' => 0),
        'date_previous_login' => array('type' => 'datetime', 'label' => 'PreviousConnexion', 'visible' => 2, 'enabled' => 1, 'position' => 51, 'notnull' => 0),
        //'note_public' => array('type'=>'text', 'label'=>'NotePublic', 'visible'=>-1, 'enabled'=>1, 'position'=>45, 'notnull'=>-1,),
        'note_private' => array('type' => 'text', 'label' => 'NotePrivate', 'visible' => -1, 'enabled' => 1, 'position' => 46, 'notnull' => -1),
        'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'visible' => -2, 'enabled' => 1, 'position' => 500, 'notnull' => 1),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'visible' => -2, 'enabled' => 1, 'position' => 500, 'notnull' => 1),
        'fk_user_creat' => array('type' => 'integer', 'label' => 'UserAuthor', 'visible' => -2, 'enabled' => 1, 'position' => 500, 'notnull' => 1),
        'fk_user_modif' => array('type' => 'integer', 'label' => 'UserModif', 'visible' => -2, 'enabled' => 1, 'position' => 500, 'notnull' => -1),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'visible' => -2, 'enabled' => 1, 'position' => 1000, 'notnull' => -1, 'index' => 1),
        'status' => array('type' => 'integer', 'label' => 'Status', 'visible' => 1, 'enabled' => 1, 'position' => 1000, 'notnull' => 1, 'index' => 1, 'default' => 1, 'arrayofkeyval' => array('1' => 'Active', '0' => 'Disabled')),
    );
    /**
     * @var int ID
     */
    public $rowid;
    /**
     * @var int Entity
     */
    public $entity;
    public $key_account;
    public $login;
    public $pass_encoding;
    public $pass_crypted;
    public $pass_temp;
    /**
     * @var int Thirdparty ID
     */
    public $fk_soc;
    public $site;
    public $site_account;
    /**
     * @var integer|string date_last_login
     */
    public $date_last_login;
    public $date_previous_login;
    public $note_private;
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
    /**
     * @var int Status
     */
    public $status;
    // END MODULEBUILDER PROPERTIES
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
    public function fetchLines()
    {
    }
    /**
     * Try to find the external customer id of a thirdparty for another site/system.
     *
     * @param	int		$id				Id of third party
     * @param	string	$site			Site (example: 'stripe', '...')
     * @param	int		$status			Status (0=test, 1=live)
     * @param	string	$site_account 	Value to use to identify with account to use on site when site can offer several accounts. For example: 'pk_live_123456' when using Stripe service.
     * @return	string					Stripe customer ref 'cu_xxxxxxxxxxxxx' or ''
     * @see getThirdPartyID()
     */
    public function getCustomerAccount($id, $site, $status = 0, $site_account = '')
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
     *  Retourne le libelle du status d'un user (actif, inactif)
     *
     *  @param	int		$mode          0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return	string 			       Label of status
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
    public static function LibStatut($status, $mode = 0)
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
}