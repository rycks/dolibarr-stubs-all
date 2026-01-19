<?php

/**
 *	Class to manage contact/addresses
 */
class Contact extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'contact';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'socpeople';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'contact';
    /**
     *  'type' if the field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'enabled' is a condition when the field must be managed.
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommanded to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' is the CSS style to use on field. For example: 'maxwidth200'
     *  'help' is a string visible as a tooltip on field
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => 1, 'enabled' => 1, 'visible' => 3, 'notnull' => 1, 'position' => 30, 'index' => 1), 'ref_ext' => array('type' => 'varchar(255)', 'label' => 'Ref ext', 'enabled' => 1, 'visible' => 3, 'position' => 35), 'civility' => array('type' => 'varchar(6)', 'label' => 'Civility', 'enabled' => 1, 'visible' => 3, 'position' => 40), 'lastname' => array('type' => 'varchar(50)', 'label' => 'Lastname', 'enabled' => 1, 'visible' => 1, 'position' => 45, 'showoncombobox' => 1, 'searchall' => 1), 'firstname' => array('type' => 'varchar(50)', 'label' => 'Firstname', 'enabled' => 1, 'visible' => 1, 'position' => 50, 'showoncombobox' => 1, 'searchall' => 1), 'poste' => array('type' => 'varchar(80)', 'label' => 'PostOrFunction', 'enabled' => 1, 'visible' => -1, 'position' => 52), 'address' => array('type' => 'varchar(255)', 'label' => 'Address', 'enabled' => 1, 'visible' => -1, 'position' => 55), 'zip' => array('type' => 'varchar(25)', 'label' => 'Zip', 'enabled' => 1, 'visible' => 1, 'position' => 60), 'town' => array('type' => 'text', 'label' => 'Town', 'enabled' => 1, 'visible' => -1, 'position' => 65), 'fk_departement' => array('type' => 'integer', 'label' => 'Fk departement', 'enabled' => 1, 'visible' => 3, 'position' => 70), 'fk_pays' => array('type' => 'integer', 'label' => 'Fk pays', 'enabled' => 1, 'visible' => 3, 'position' => 75), 'fk_soc' => array('type' => 'integer', 'label' => 'ThirdParty', 'enabled' => 1, 'visible' => 1, 'position' => 77, 'searchall' => 1), 'birthday' => array('type' => 'date', 'label' => 'Birthday', 'enabled' => 1, 'visible' => 3, 'position' => 80), 'phone' => array('type' => 'varchar(30)', 'label' => 'Phone', 'enabled' => 1, 'visible' => 1, 'position' => 90, 'searchall' => 1), 'phone_perso' => array('type' => 'varchar(30)', 'label' => 'PhonePerso', 'enabled' => 1, 'visible' => -1, 'position' => 95, 'searchall' => 1), 'phone_mobile' => array('type' => 'varchar(30)', 'label' => 'PhoneMobile', 'enabled' => 1, 'visible' => 1, 'position' => 100, 'searchall' => 1), 'fax' => array('type' => 'varchar(30)', 'label' => 'Fax', 'enabled' => 1, 'visible' => -1, 'position' => 105, 'searchall' => 1), 'email' => array('type' => 'varchar(255)', 'label' => 'Email', 'enabled' => 1, 'visible' => 1, 'position' => 110, 'searchall' => 1), 'socialnetworks' => array('type' => 'text', 'label' => 'SocialNetworks', 'enabled' => 1, 'visible' => 3, 'position' => 115), 'photo' => array('type' => 'varchar(255)', 'label' => 'Photo', 'enabled' => 1, 'visible' => 3, 'position' => 170), 'priv' => array('type' => 'smallint(6)', 'label' => 'ContactVisibility', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 175), 'fk_stcommcontact' => array('type' => 'integer', 'label' => 'ProspectStatus', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 220), 'fk_prospectlevel' => array('type' => 'varchar(12)', 'label' => 'ProspectLevel', 'enabled' => 1, 'visible' => -1, 'position' => 255), 'no_email' => array('type' => 'smallint(6)', 'label' => 'No_Email', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 180), 'note_private' => array('type' => 'text', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 3, 'position' => 195, 'searchall' => 1), 'note_public' => array('type' => 'text', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 3, 'position' => 200, 'searchall' => 1), 'default_lang' => array('type' => 'varchar(6)', 'label' => 'Default lang', 'enabled' => 1, 'visible' => 3, 'position' => 205), 'canvas' => array('type' => 'varchar(32)', 'label' => 'Canvas', 'enabled' => 1, 'visible' => 3, 'position' => 210), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 300), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 305), 'fk_user_creat' => array('type' => 'integer', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => 3, 'position' => 310), 'fk_user_modif' => array('type' => 'integer', 'label' => 'UserModif', 'enabled' => 1, 'visible' => 3, 'position' => 315), 'statut' => array('type' => 'tinyint(4)', 'label' => 'Status', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 500), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -1, 'position' => 1000));
    public $civility_id;
    // In fact we store civility_code
    public $civility_code;
    public $civility;
    /**
     * @var string Address
     */
    public $address;
    /**
     * @var string zip code
     */
    public $zip;
    /**
     * @var string Town
     */
    public $town;
    /**
     * @var int // Id of department
     */
    public $state_id;
    /**
     * @var string // Code of department
     */
    public $state_code;
    /**
     * @var string // Label of department
     */
    public $state;
    public $poste;
    // Position
    /**
     * @var int Thirdparty ID
     */
    public $socid;
    // both socid and fk_soc are used
    public $fk_soc;
    // both socid and fk_soc are used
    /**
     * @var int 0=inactive, 1=active
     */
    public $statut;
    public $code;
    /**
     * Email
     * @var string
     */
    public $email;
    /**
     * Unsuscribe all : 1 = contact has globaly unsubscribe of all mass emailings
     * @var int
     */
    public $no_email;
    /**
     * @var array array of socialnetworks
     */
    public $socialnetworks;
    /**
     * Skype username
     * @var string
     * @deprecated
     */
    public $skype;
    /**
     * Twitter username
     * @var string
     * @deprecated
     */
    public $twitter;
    /**
     * Facebook username
     * @var string
     * @deprecated
     */
    public $facebook;
    /**
     * Linkedin username
     * @var string
     * @deprecated
     */
    public $linkedin;
    /**
     * Jabber username
     * @var string
     * @deprecated
     */
    public $jabberid;
    /**
     * @var string filename for photo
     */
    public $photo;
    /**
     * @var string phone pro
     */
    public $phone_pro;
    /**
     * @var string phone perso
     */
    public $phone_perso;
    /**
     * @var string phone mobile
     */
    public $phone_mobile;
    /**
     * @var string fax
     */
    public $fax;
    /**
     * Private or public
     * @var int
     */
    public $priv;
    public $birthday;
    public $default_lang;
    /**
     * @var int Number of invoices for which he is contact
     */
    public $ref_facturation;
    /**
     * @var int  Number of contracts for which he is contact
     */
    public $ref_contrat;
    /**
     * @var int Number of orders for which he is contact
     */
    public $ref_commande;
    /**
     * @var int Number of proposals for which he is contact
     */
    public $ref_propal;
    /**
     * @var int user ID
     */
    public $user_id;
    /**
     * @var string user login
     */
    public $user_login;
    // END MODULEBUILDER PROPERTIES
    /**
     * Old copy
     * @var Contact
     */
    public $oldcopy;
    // To contains a clone of this when we need to save old properties of object
    /**
     * @var array roles
     */
    public $roles;
    public $cacheprospectstatus = array();
    public $fk_prospectlevel;
    public $stcomm_id;
    public $statut_commercial;
    /**
     * @var string picto
     */
    public $stcomm_picto;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load indicators into this->nb for board
     *
     *  @return     int         <0 if KO, >0 if OK
     */
    public function load_state_board()
    {
    }
    /**
     *  Add a contact into database
     *
     *  @param      User	$user       Object user that create
     *  @return     int      			<0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    /**
     *      Update informations into database
     *
     *      @param      int		$id          	Id of contact/address to update
     *      @param      User	$user        	Objet user making change
     *      @param      int		$notrigger	    0=no, 1=yes
     *      @param		string	$action			Current action for hookmanager
     *      @param		int		$nosyncuser		No sync linked user (external users and contacts are linked)
     *      @return     int      			   	<0 if KO, >0 if OK
     */
    public function update($id, $user = \null, $notrigger = 0, $action = 'update', $nosyncuser = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *	Retourne chaine DN complete dans l'annuaire LDAP pour l'objet
     *
     *	@param		array	$info		Info string loaded by _load_ldap_info
     *	@param		int		$mode		0=Return full DN (uid=qqq,ou=xxx,dc=aaa,dc=bbb)
     *									1=Return DN without key inside (ou=xxx,dc=aaa,dc=bbb)
     *									2=Return key only (uid=qqq)
     *	@return		string				DN
     */
    public function _load_ldap_dn($info, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *	Initialise tableau info (tableau des attributs LDAP)
     *
     *	@return		array		Tableau info des attributs
     */
    public function _load_ldap_info()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update field alert birthday
     *
     *  @param      int			$id         Id of contact
     *  @param      User		$user		User asking to change alert or birthday
     *  @param      int		    $notrigger	0=no, 1=yes
     *  @return     int         			<0 if KO, >=0 if OK
     */
    public function update_perso($id, $user = \null, $notrigger = 0)
    {
    }
    /**
     *  Load object contact.
     *
     *  @param      int		$id         	Id of contact
     *  @param      User	$user       	Load also alerts of this user (subscribing to alerts) that want alerts about this contact
     *  @param      string  $ref_ext    	External reference, not given by Dolibarr
     *  @param		string	$email			Email
     *  @param		int		$loadalsoroles	Load also roles. Try to always 0 here and load roles with a separate call of fetchRoles().
     *  @return     int     		    	>0 if OK, <0 if KO or if two records found for same ref or idprof, 0 if not found.
     */
    public function fetch($id, $user = \null, $ref_ext = '', $email = '', $loadalsoroles = 0)
    {
    }
    /**
     * Set the property "gender" of this class, based on the property "civility_id"
     * or use property "civility_code" as fallback, when "civility_id" is not available.
     *
     * @return void
     */
    public function setGenderFromCivility()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load number of elements the contact is used as a link for
     *  ref_facturation
     *  ref_contrat
     *  ref_commande (for order and/or shipments)
     *  ref_propale
     *
     *  @return     int             					<0 if KO, >=0 if OK
     */
    public function load_ref_elements()
    {
    }
    /**
     *	Delete a contact from database
     *  // TODO Add $user as first param
     *
     *  @param		int		$notrigger		Disable all trigger
     *	@return		int						<0 if KO, >0 if OK
     */
    public function delete($notrigger = 0)
    {
    }
    /**
     *  Charge les informations sur le contact, depuis la base
     *
     *  @param		int		$id      Id du contact a charger
     *  @return		void
     */
    public function info($id)
    {
    }
    /**
     *  Return number of mass Emailing received by this contacts with its email
     *
     *  @return       int     Number of EMailings
     */
    public function getNbOfEMailings()
    {
    }
    /**
     *  Return name of contact with link (and eventually picto)
     *	Use $this->id, $this->lastname, $this->firstname, this->civility_id
     *
     *	@param		int			$withpicto					Include picto with link
     *	@param		string		$option						Where the link point to
     *	@param		int			$maxlen						Max length of
     *  @param		string		$moreparam					Add more param into URL
     *  @param      int     	$save_lastsearch_value		-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@param		int			$notooltip					1=Disable tooltip
     *	@return		string									String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $maxlen = 0, $moreparam = '', $save_lastsearch_value = -1, $notooltip = 0)
    {
    }
    /**
     *    Return civility label of contact
     *
     *    @return	string      			Translated name of civility
     */
    public function getCivilityLabel()
    {
    }
    /**
     *	Return label of contact status
     *
     *	@param      int			$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     * 	@return 	string					Label of contact status
     */
    public function getLibStatut($mode)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Renvoi le libelle d'un statut donne
     *
     *  @param      int			$status     Id statut
     *  @param      int			$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return     string					Libelle
     */
    public function LibStatut($status, $mode)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return translated label of Public or Private
     *
     * 	@param      int			$status		Type (0 = public, 1 = private)
     *  @return     string					Label translated
     */
    public function LibPubPriv($status)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return	int >0 if ok
     */
    public function initAsSpecimen()
    {
    }
    /**
     *  Change status of a user
     *
     *	@param	int		$status		Status to set
     *  @return int     			<0 if KO, 0 if nothing is done, >0 if OK
     */
    public function setstatus($status)
    {
    }
    /**
     * Sets object to supplied categories.
     *
     * Deletes object from existing categories not supplied.
     * Adds it to non existing supplied categories.
     * Existing categories are left untouch.
     *
     * @param int[]|int $categories Category or categories IDs
     * @return void
     */
    public function setCategories($categories)
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param DoliDB $db Database handler
     * @param int $origin_id Old thirdparty id
     * @param int $dest_id New thirdparty id
     * @return bool
     */
    public static function replaceThirdparty(\DoliDB $db, $origin_id, $dest_id)
    {
    }
    /**
     * Fetch roles (default contact of some companies) for the current contact.
     * This load the array ->roles.
     *
     * @return 	int			<0 if KO, Nb of roles found if OK
     * @see updateRoles()
     */
    public function fetchRoles()
    {
    }
    /**
     * Get Contact roles for a thirdparty
     *
     * @param  string 	$element 	Element type
     * @return array|int			Array of contact roles or -1
     * @throws Exception
     */
    public function getContactRoles($element = '')
    {
    }
    /**
     * Updates all roles (default contact for companies) according to values inside the ->roles array.
     * This is called by update of contact.
     *
     * @return float|int
     * @see fetchRoles()
     */
    public function updateRoles()
    {
    }
    /**
     *  Load array of prospect status
     *
     *  @param	int		$active     1=Active only, 0=Not active only, -1=All
     *  @return int					<0 if KO, >0 if OK
     */
    public function loadCacheOfProspStatus($active = 1)
    {
    }
    /**
     *	Return prostect level
     *
     *  @return     string        Libelle
     */
    public function getLibProspLevel()
    {
    }
    /**
     *  Return label of prospect level
     *
     *  @param	int		$fk_prospectlevel   	Prospect level
     *  @return string        					label of level
     */
    public function libProspLevel($fk_prospectlevel)
    {
    }
    /**
     *  Set prospect level
     *
     *  @param  User	$user		Utilisateur qui definie la remise
     *	@return	int					<0 if KO, >0 if OK
     * @deprecated Use update function instead
     */
    public function setProspectLevel(\User $user)
    {
    }
    /**
     *  Return status of prospect
     *
     *  @param	int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long
     *  @param	string	$label		Label to use for status for added status
     *  @return string        		Libelle
     */
    public function getLibProspCommStatut($mode = 0, $label = '')
    {
    }
    /**
     *  Return label of a given status
     *
     *  @param	int|string	$statut        	Id or code for prospection status
     *  @param  int			$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *  @param	string		$label			Label to use for status for added status
     *	@param 	string		$picto      	Name of image file to show ('filenew', ...)
     *                                      If no extension provided, we use '.png'. Image must be stored into theme/xxx/img directory.
     *                                      Example: picto.png                  if picto.png is stored into htdocs/theme/mytheme/img
     *                                      Example: picto.png@mymodule         if picto.png is stored into htdocs/mymodule/img
     *                                      Example: /mydir/mysubdir/picto.png  if picto.png is stored into htdocs/mydir/mysubdir (pictoisfullpath must be set to 1)
     *  @return string       	 			Libelle du statut
     */
    public function libProspCommStatut($statut, $mode = 0, $label = '', $picto = '')
    {
    }
    /**
     *  Set "blacklist" mailing status
     *
     *  @param	int		$no_email	1=Do not send mailing, 0=Ok to recieve mailling
     *  @return int					<0 if KO, >0 if OK
     */
    public function setNoEmail($no_email)
    {
    }
    /**
     *  get "blacklist" mailing status
     * 	set no_email attribut to 1 or 0
     *
     *  @return int					<0 if KO, >0 if OK
     */
    public function getNoEmail()
    {
    }
}