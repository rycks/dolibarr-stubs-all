<?php

/**
 *	Class to manage Dolibarr users
 */
class User extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'user';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'user';
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_user';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    /**
     * @var string picto
     */
    public $picto = 'user';
    public $id = 0;
    public $statut;
    public $ldap_sid;
    public $search_sid;
    public $employee;
    public $civility_code;
    /**
     * @var string gender
     */
    public $gender;
    public $birth;
    /**
     * @var string email
     */
    public $email;
    /**
     * @var string personal email
     */
    public $personal_email;
    /**
     * @var array array of socialnetworks
     */
    public $socialnetworks;
    /**
     * @var string skype account
     * @deprecated
     */
    public $skype;
    /**
     * @var string twitter account
     * @deprecated
     */
    public $twitter;
    /**
     * @var string facebook account
     * @deprecated
     */
    public $facebook;
    /**
     * @var string linkedin account
     * @deprecated
     */
    public $linkedin;
    /**
     * @var string job position
     */
    public $job;
    /**
     * @var string user signature
     */
    public $signature;
    /**
     * @var string Address
     */
    public $address;
    /**
     * @var string zip code
     */
    public $zip;
    /**
     * @var string town
     */
    public $town;
    public $state_id;
    // The state/department
    public $state_code;
    public $state;
    /**
     * @var string office phone
     */
    public $office_phone;
    /**
     * @var string office fax
     */
    public $office_fax;
    /**
     * @var string phone mobile
     */
    public $user_mobile;
    /**
     * @var string personal phone mobile
     */
    public $personal_mobile;
    /**
     * @var int 1 if admin 0 if standard user
     */
    public $admin;
    /**
     * @var string user login
     */
    public $login;
    /**
     * @var string user apikey
     */
    public $api_key;
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * @var string Clear password in memory
     */
    public $pass;
    /**
     * @var string Clear password in database (defined if DATABASE_PWD_ENCRYPTED=0)
     */
    public $pass_indatabase;
    /**
     * @var string Encrypted password in database (always defined)
     */
    public $pass_indatabase_crypted;
    /**
     * @var string Temporary password
     */
    public $pass_temp;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * Date modification record (tms)
     *
     * @var integer
     */
    public $datem;
    /**
     * @var int If this is defined, it is an external user
     */
    public $socid;
    /**
     * @var int If this is defined, it is a user created from a contact
     */
    public $contact_id;
    /**
     * @var int ID
     */
    public $fk_member;
    /**
     * @var int User ID of supervisor
     */
    public $fk_user;
    /**
     * @var int User ID of expense validator
     */
    public $fk_user_expense_validator;
    /**
     * @var int User ID of holidays validator
     */
    public $fk_user_holiday_validator;
    /**
     * @string clicktodial url
     */
    public $clicktodial_url;
    /**
     * @var string clicktodial login
     */
    public $clicktodial_login;
    /**
     * @var string clicktodial password
     */
    public $clicktodial_password;
    /**
     * @var string clicktodial poste
     */
    public $clicktodial_poste;
    public $datelastlogin;
    public $datepreviouslogin;
    public $datestartvalidity;
    public $dateendvalidity;
    /**
     * @var string photo filename
     */
    public $photo;
    public $lang;
    /**
     * @var stdClass Class of permissions user->rights->permx
     */
    public $rights;
    /**
     * @var int  All permissions are loaded
     */
    public $all_permissions_are_loaded;
    /**
     * @var int Number of rights granted to the user
     */
    public $nb_rights;
    /**
     * @var array Cache array of already loaded permissions
     */
    private $_tab_loaded = array();
    /**
     * @var stdClass To store personal config
     */
    public $conf;
    public $default_values;
    // To store default values for user
    public $lastsearch_values_tmp;
    // To store current search criterias for user
    public $lastsearch_values;
    // To store last saved search criterias for user
    public $users = array();
    // To store all tree of users hierarchy
    public $parentof;
    // To store an array of all parents for all ids.
    private $cache_childids;
    // Cache array of already loaded childs
    public $accountancy_code;
    // Accountancy code in prevision of the complete accountancy module
    public $thm;
    // Average cost of employee - Used for valuation of time spent
    public $tjm;
    // Average cost of employee
    public $salary;
    // Monthly salary       - Denormalized value from llx_user_employment
    public $salaryextra;
    // Monthly salary extra - Denormalized value from llx_user_employment
    public $weeklyhours;
    // Weekly hours         - Denormalized value from llx_user_employment
    /**
     * @var string Define background color for user in agenda
     */
    public $color;
    public $dateemployment;
    // Define date of employment by company
    public $dateemploymentend;
    // Define date of employment end by company
    public $default_c_exp_tax_cat;
    public $default_range;
    /**
     *@var int id of warehouse
     */
    public $fk_warehouse;
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'index' => 1, 'position' => 1, 'comment' => 'Id'), 'lastname' => array('type' => 'varchar(50)', 'label' => 'Name', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'showoncombobox' => 1, 'index' => 1, 'position' => 20, 'searchall' => 1), 'firstname' => array('type' => 'varchar(50)', 'label' => 'Name', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'showoncombobox' => 1, 'index' => 1, 'position' => 10, 'searchall' => 1));
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;
    /**
     *    Constructor of the class
     *
     *    @param   DoliDb  $db     Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Load a user from database with its id or ref (login).
     *  This function does not load permissions, only user properties. Use getrights() for this just after the fetch.
     *
     *	@param	int		$id		       		If defined, id to used for search
     * 	@param  string	$login       		If defined, login to used for search
     *	@param  string	$sid				If defined, sid to used for search
     * 	@param	int		$loadpersonalconf	1=also load personal conf of user (in $user->conf->xxx), 0=do not load personal conf.
     *  @param  int     $entity             If a value is >= 0, we force the search on a specific entity. If -1, means search depens on default setup.
     *  @param	int		$email       		If defined, email to used for search
     * 	@return	int							<0 if KO, 0 not found, >0 if OK
     */
    public function fetch($id = '', $login = '', $sid = '', $loadpersonalconf = 0, $entity = -1, $email = '')
    {
    }
    /**
     *  Load default value in property ->default_values
     *
     *  @return int						> 0 if OK, < 0 if KO
     */
    public function loadDefaultValues()
    {
    }
    /**
     *  Add a right to the user
     *
     * 	@param	int		$rid			Id of permission to add or 0 to add several permissions
     *  @param  string	$allmodule		Add all permissions of module $allmodule or 'allmodules' to include all modules.
     *  @param  string	$allperms		Add all permissions of module $allmodule, subperms $allperms only or '' to include all permissions.
     *  @param	int		$entity			Entity to use
     *  @param  int	    $notrigger		1=Does not execute triggers, 0=Execute triggers
     *  @return int						> 0 if OK, < 0 if KO
     *  @see	clearrights(), delrights(), getrights()
     */
    public function addrights($rid, $allmodule = '', $allperms = '', $entity = 0, $notrigger = 0)
    {
    }
    /**
     *  Remove a right to the user
     *
     *  @param	int		$rid        Id du droit a retirer
     *  @param  string	$allmodule  Retirer tous les droits du module allmodule
     *  @param  string	$allperms   Retirer tous les droits du module allmodule, perms allperms
     *  @param	int		$entity		Entity to use
     *  @param  int	    $notrigger	1=Does not execute triggers, 0=Execute triggers
     *  @return int         		> 0 if OK, < 0 if OK
     *  @see	clearrights(), addrights(), getrights()
     */
    public function delrights($rid, $allmodule = '', $allperms = '', $entity = 0, $notrigger = 0)
    {
    }
    /**
     *  Clear all permissions array of user
     *
     *  @return	void
     *  @see	getrights()
     */
    public function clearrights()
    {
    }
    /**
     *	Load permissions granted to user into object user
     *
     *	@param  string	$moduletag		Limit permission for a particular module ('' by default means load all permissions)
     *  @param	int		$forcereload	Force reload of permissions even if they were already loaded (ignore cache)
     *	@return	void
     *  @see	clearrights(), delrights(), addrights()
     */
    public function getrights($moduletag = '', $forcereload = 0)
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
     *  Delete the user
     *
     *	@param		User	$user	User than delete
     * 	@return		int				<0 if KO, >0 if OK
     */
    public function delete(\User $user)
    {
    }
    /**
     *  Create a user into database
     *
     *  @param	User	$user        	Objet user doing creation
     *  @param  int		$notrigger		1=do not execute triggers, 0 otherwise
     *  @return int			         	<0 if KO, id of created user if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Create a user from a contact object. User will be internal but if contact is linked to a third party, user will be external
     *
     *  @param	Contact	$contact    Object for source contact
     * 	@param  string	$login      Login to force
     *  @param  string	$password   Password to force
     *  @return int 				<0 if error, if OK returns id of created user
     */
    public function create_from_contact($contact, $login = '', $password = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Create a user into database from a member object.
     *  If $member->fk_soc is set, it will be an external user.
     *
     *  @param	Adherent		$member		Object member source
     * 	@param	string			$login		Login to force
     *  @return int							<0 if KO, if OK, return id of created account
     */
    public function create_from_member($member, $login = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Assign rights by default
     *
     *    @return     integer erreur <0, si ok renvoi le nbre de droits par defaut positionnes
     */
    public function set_default_rights()
    {
    }
    /**
     *  	Update a user into database (and also password if this->pass is defined)
     *
     *		@param	User	$user				User qui fait la mise a jour
     *    	@param  int		$notrigger			1 ne declenche pas les triggers, 0 sinon
     *		@param	int		$nosyncmember		0=Synchronize linked member (standard info), 1=Do not synchronize linked member
     *		@param	int		$nosyncmemberpass	0=Synchronize linked member (password), 1=Do not synchronize linked member
     *		@param	int		$nosynccontact		0=Synchronize linked contact, 1=Do not synchronize linked contact
     *    	@return int 		        		<0 si KO, >=0 si OK
     */
    public function update($user, $notrigger = 0, $nosyncmember = 0, $nosyncmemberpass = 0, $nosynccontact = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Mise a jour en base de la date de derniere connexion d'un utilisateur
     *  Fonction appelee lors d'une nouvelle connexion
     *
     *  @return int     <0 si echec, >=0 si ok
     */
    public function update_last_login_date()
    {
    }
    /**
     *  Change password of a user
     *
     *  @param	User	$user             		Object user of user requesting the change (not the user for who we change the password). May be unknown.
     *  @param  string	$password         		New password in clear text (to generate if not provided)
     *	@param	int		$changelater			1=Change password only after clicking on confirm email
     *	@param	int		$notrigger				1=Does not launch triggers
     *	@param	int		$nosyncmember	        Do not synchronize linked member
     *  @return string 			          		If OK return clear password, 0 if no change, < 0 if error
     */
    public function setPassword($user, $password = '', $changelater = 0, $notrigger = 0, $nosyncmember = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Send new password by email
     *
     *  @param	User	$user           Object user that send the email (not the user we send too)
     *  @param	string	$password       New password
     *	@param	int		$changelater	0=Send clear passwod into email, 1=Change password only after clicking on confirm email. @todo Add method 2 = Send link to reset password
     *  @return int 		            < 0 si erreur, > 0 si ok
     */
    public function send_password($user, $password = '', $changelater = 0)
    {
    }
    /**
     * 		Renvoie la derniere erreur fonctionnelle de manipulation de l'objet
     *
     * 		@return    string      chaine erreur
     */
    public function error()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Read clicktodial information for user
     *
     *  @return int <0 if KO, >0 if OK
     */
    public function fetch_clicktodial()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update clicktodial info
     *
     *  @return	int  <0 if KO, >0 if OK
     */
    public function update_clicktodial()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Add user into a group
     *
     *  @param	int	$group      Id of group
     *  @param  int		$entity     Entity
     *  @param  int		$notrigger  Disable triggers
     *  @return int  				<0 if KO, >0 if OK
     */
    public function SetInGroup($group, $entity, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Remove a user from a group
     *
     *  @param	int   $group       Id of group
     *  @param  int		$entity      Entity
     *  @param  int		$notrigger   Disable triggers
     *  @return int  			     <0 if KO, >0 if OK
     */
    public function RemoveFromGroup($group, $entity, $notrigger = 0)
    {
    }
    /**
     *  Return a link with photo
     * 	Use this->id,this->photo
     *
     *	@param	int		$width			Width of image
     *	@param	int		$height			Height of image
     *  @param	string	$cssclass		Force a css class
     * 	@param	string	$imagesize		'mini', 'small' or '' (original)
     *	@return	string					String with URL link
     */
    public function getPhotoUrl($width, $height, $cssclass = '', $imagesize = '')
    {
    }
    /**
     *  Return a link to the user card (with optionaly the picto)
     * 	Use this->id,this->lastname, this->firstname
     *
     *	@param	int		$withpictoimg				Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto, -1=Include photo into link, -2=Only picto photo, -3=Only photo very small)
     *	@param	string	$option						On what the link point to ('leave', 'nolink', )
     *  @param  integer $infologin      			0=Add default info tooltip, 1=Add complete info tooltip, -1=No info tooltip
     *  @param	integer	$notooltip					1=Disable tooltip on picto and name
     *  @param	int		$maxlen						Max length of visible user name
     *  @param	int		$hidethirdpartylogo			Hide logo of thirdparty if user is external user
     *  @param  string  $mode               		''=Show firstname and lastname, 'firstname'=Show only firstname, 'firstelselast'=Show firstname or lastname if not defined, 'login'=Show login
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								String with URL
     */
    public function getNomUrl($withpictoimg = 0, $option = '', $infologin = 0, $notooltip = 0, $maxlen = 24, $hidethirdpartylogo = 0, $mode = '', $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *  Return clickable link of login (eventualy with picto)
     *
     *	@param	int		$withpicto		Include picto into link
     *	@param	string	$option			Sur quoi pointe le lien
     *	@return	string					Chaine avec URL
     */
    public function getLoginUrl($withpicto = 0, $option = '')
    {
    }
    /**
     *  Return the label of the status of user (active, inactive)
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a status of user (active, inactive)
     *
     *  @param  int     $status         Id status
     *  @param  int		$mode           0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string                  Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Retourne chaine DN complete dans l'annuaire LDAP pour l'objet
     *
     *	@param	array	$info		Info array loaded by _load_ldap_info
     *	@param	int		$mode		0=Return full DN (uid=qqq,ou=xxx,dc=aaa,dc=bbb)
     *								1=Return parent (ou=xxx,dc=aaa,dc=bbb)
     *								2=Return key only (RDN) (uid=qqq)
     *	@return	string				DN
     */
    public function _load_ldap_dn($info, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Initialize the info array (array of LDAP values) that will be used to call LDAP functions
     *
     *	@return		array		Tableau info des attributs
     */
    public function _load_ldap_info()
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return	int
     */
    public function initAsSpecimen()
    {
    }
    /**
     *  Load info of user object
     *
     *  @param  int		$id     Id of user to load
     *  @return	void
     */
    public function info($id)
    {
    }
    /**
     *    Return number of mass Emailing received by this contacts with its email
     *
     *    @return       int     Number of EMailings
     */
    public function getNbOfEMailings()
    {
    }
    /**
     *  Return number of existing users
     *
     *  @param	string	$limitTo	Limit to '' or 'active'
     *  @param	string	$option		'superadmin' = return for entity 0 only
     *  @param	int		$admin		Filter on admin tag
     *  @return int  				Number of users
     */
    public function getNbOfUsers($limitTo, $option = '', $admin = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update user using data from the LDAP
     *
     *  @param	Object	$ldapuser	Ladp User
     *  @return int  				<0 if KO, >0 if OK
     */
    public function update_ldap2dolibarr(&$ldapuser)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return and array with all instanciated first level children users of current user
     *
     * @return	User[]|int
     * @see getAllChildIds()
     */
    public function get_children()
    {
    }
    /**
     *  Load this->parentof that is array(id_son=>id_parent, ...)
     *
     *  @return     int     <0 if KO, >0 if OK
     */
    private function loadParentOf()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Build the hierarchy/tree of users into an array.
     *	Set and return this->users that is an array sorted according to tree with arrays of:
     *				id = id user
     *				lastname
     *				firstname
     *				fullname = nom avec chemin complet du user
     *				fullpath = chemin complet compose des id: "_grandparentid_parentid_id"
     *
     *  @param      int		$deleteafterid      Removed all users including the leaf $deleteafterid (and all its child) in user tree.
     *  @param		string	$filter				SQL filter on users
     *	@return		array		      		  	Array of users $this->users. Note: $this->parentof is also set.
     */
    public function get_full_tree($deleteafterid = 0, $filter = '')
    {
    }
    /**
     * 	Return list of all child users id in herarchy (all sublevels).
     *  Note: Calling this function also reset full list of users into $this->users.
     *
     *  @param      int      $addcurrentuser    1=Add also current user id to the list.
     *	@return		array		      		  	Array of user id lower than user (all levels under user). This overwrite this->users.
     *  @see get_children()
     */
    public function getAllChildIds($addcurrentuser = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	For user id_user and its childs available in this->users, define property fullpath and fullname.
     *  Function called by get_full_tree().
     *
     * 	@param		int		$id_user		id_user entry to update
     * 	@param		int		$protection		Deep counter to avoid infinite loop (no more required, a protection is added with array useridfound)
     *	@return		int                     < 0 if KO (infinit loop), >= 0 if OK
     */
    public function build_path_from_id_user($id_user, $protection = 0)
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load metrics this->nb for dashboard
     *
     *      @return     int         <0 if KO, >0 if OK
     */
    public function load_state_board()
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     * 	@param	    string		$modele			Force model to use ('' to not force)
     * 	@param		Translate	$outputlangs	Object langs to use for output
     *  @param      int			$hidedetails    Hide details of lines
     *  @param      int			$hidedesc       Hide description
     *  @param      int			$hideref        Hide ref
     *  @param   null|array  $moreparams     Array to provide more information
     * 	@return     int         				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return property of user from its id
     *
     *  @param	int		$rowid      id of contact
     *  @param  string	$mode       'email' or 'mobile'
     *  @return string  			Email of user with format: "Full name <email>"
     */
    public function user_get_property($rowid, $mode)
    {
    }
    /**
     *	Load all objects into $this->users
     *
     *  @param	string		$sortorder		sort order
     *  @param	string		$sortfield		sort field
     *  @param	int			$limit			limit page
     *  @param	int			$offset			page
     *  @param	array		$filter			Filter array. Example array('field'=>'valueforlike', 'customurl'=>...)
     *  @param  string      $filtermode		Filter mode (AND or OR)
     *  @param  bool        $entityfilter	Activate entity filter
     *  @return int							<0 if KO, >0 if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = array(), $filtermode = 'AND', $entityfilter = \false)
    {
    }
    /**
     * Cache the SQL results of the function "findUserIdByEmail($email)"
     *
     * NOTE: findUserIdByEmailCache[...] === -1 means not found in database
     *
     * @var array
     */
    private $findUserIdByEmailCache;
    /**
     * Find a user by the given e-mail and return it's user id when found
     *
     * NOTE:
     * Use AGENDA_DISABLE_EXACT_USER_EMAIL_COMPARE_FOR_EXTERNAL_CALENDAR
     * to disable exact e-mail search
     *
     * @param string	$email	The full e-mail (or a part of a e-mail)
     * @return int				<0 = user was not found, >0 = The id of the user
     */
    public function findUserIdByEmail($email)
    {
    }
}