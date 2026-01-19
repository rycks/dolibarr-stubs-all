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
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 15), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 20), 'fk_soc' => array('type' => 'integer', 'label' => 'ThirdParty', 'enabled' => 1, 'visible' => -1, 'position' => 25), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => 1, 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'position' => 30, 'index' => 1), 'ref_ext' => array('type' => 'varchar(255)', 'label' => 'Ref ext', 'enabled' => 1, 'visible' => 0, 'position' => 35), 'civility' => array('type' => 'varchar(6)', 'label' => 'Civility', 'enabled' => 1, 'visible' => -1, 'position' => 40), 'lastname' => array('type' => 'varchar(50)', 'label' => 'Lastname', 'enabled' => 1, 'visible' => -1, 'position' => 45, 'showoncombobox' => 1), 'firstname' => array('type' => 'varchar(50)', 'label' => 'Firstname', 'enabled' => 1, 'visible' => -1, 'position' => 50, 'showoncombobox' => 1), 'address' => array('type' => 'varchar(255)', 'label' => 'Address', 'enabled' => 1, 'visible' => -1, 'position' => 55), 'zip' => array('type' => 'varchar(25)', 'label' => 'Zip', 'enabled' => 1, 'visible' => -1, 'position' => 60), 'town' => array('type' => 'text', 'label' => 'Town', 'enabled' => 1, 'visible' => -1, 'position' => 65), 'fk_departement' => array('type' => 'integer', 'label' => 'Fk departement', 'enabled' => 1, 'visible' => -1, 'position' => 70), 'fk_pays' => array('type' => 'integer', 'label' => 'Fk pays', 'enabled' => 1, 'visible' => -1, 'position' => 75), 'birthday' => array('type' => 'date', 'label' => 'Birthday', 'enabled' => 1, 'visible' => -1, 'position' => 80), 'poste' => array('type' => 'varchar(80)', 'label' => 'PostOrFunction', 'enabled' => 1, 'visible' => -1, 'position' => 85), 'phone' => array('type' => 'varchar(30)', 'label' => 'Phone', 'enabled' => 1, 'visible' => -1, 'position' => 90), 'phone_perso' => array('type' => 'varchar(30)', 'label' => 'Phone perso', 'enabled' => 1, 'visible' => -1, 'position' => 95), 'phone_mobile' => array('type' => 'varchar(30)', 'label' => 'Phone mobile', 'enabled' => 1, 'visible' => -1, 'position' => 100), 'fax' => array('type' => 'varchar(30)', 'label' => 'Fax', 'enabled' => 1, 'visible' => -1, 'position' => 105), 'email' => array('type' => 'varchar(255)', 'label' => 'Email', 'enabled' => 1, 'visible' => -1, 'position' => 110), 'socialnetworks' => array('type' => 'text', 'label' => 'Socialnetworks', 'enabled' => 1, 'visible' => -1, 'position' => 115), 'photo' => array('type' => 'varchar(255)', 'label' => 'Photo', 'enabled' => 1, 'visible' => -1, 'position' => 170), 'priv' => array('type' => 'smallint(6)', 'label' => 'Priv', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 175), 'no_email' => array('type' => 'smallint(6)', 'label' => 'No email', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 180), 'fk_user_creat' => array('type' => 'integer', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -1, 'position' => 185), 'fk_user_modif' => array('type' => 'integer', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -1, 'position' => 190), 'note_private' => array('type' => 'text', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 195), 'note_public' => array('type' => 'text', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 200), 'default_lang' => array('type' => 'varchar(6)', 'label' => 'Default lang', 'enabled' => 1, 'visible' => -1, 'position' => 205), 'canvas' => array('type' => 'varchar(32)', 'label' => 'Canvas', 'enabled' => 1, 'visible' => -1, 'position' => 210), 'statut' => array('type' => 'tinyint(4)', 'label' => 'Statut', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 500), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 1000));
    public $civility_id;
    // In fact we store civility_code
    public $civility_code;
    public $civility;
    /**
     * Address
     * @var string
     */
    public $address;
    public $zip;
    public $town;
    public $state_id;
    // Id of department
    public $state_code;
    // Code of department
    public $state;
    // Label of department
    public $poste;
    // Position
    public $socid;
    // fk_soc
    public $statut;
    // 0=inactif, 1=actif
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
    public $photo;
    public $phone_pro;
    public $phone_perso;
    public $phone_mobile;
    public $fax;
    public $priv;
    public $birthday;
    public $default_lang;
    public $ref_facturation;
    // Reference number of invoice for which it is contact
    public $ref_contrat;
    // Nb de reference contrat pour lequel il est contact
    public $ref_commande;
    // Nb de reference commande pour lequel il est contact
    public $ref_propal;
    // Nb de reference propal pour lequel il est contact
    public $user_id;
    public $user_login;
    // END MODULEBUILDER PROPERTIES
    /**
     * Old copy
     * @var Contact
     */
    public $oldcopy;
    // To contains a clone of this when we need to save old properties of object
    public $roles = array();
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
     *  Load object contact
     *
     *  @param      int		$id         id du contact
     *  @param      User	$user       Utilisateur (abonnes aux alertes) qui veut les alertes de ce contact
     *  @param      string  $ref_ext    External reference, not given by Dolibarr
     *  @param		string	$email		Email
     *  @return     int     		    -1 if KO, 0 if OK but not found, 1 if OK
     */
    public function fetch($id, $user = \null, $ref_ext = '', $email = '')
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
     *   	Efface le contact de la base
     *
     *   	@param		int		$notrigger		Disable all trigger
     *		@return		int						<0 if KO, >0 if OK
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
     * Fetch Role for a contact
     *
     * @return float|int
     * @throws Exception
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
     * Updates Roles
     *
     * @return float|int
     * @throws Exception
     */
    public function updateRoles()
    {
    }
}