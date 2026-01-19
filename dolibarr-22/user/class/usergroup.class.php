<?php

/**
 *	Class to manage user groups
 */
class UserGroup extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'usergroup';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'usergroup';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'group';
    /**
     * @var int Entity of group
     */
    public $entity;
    /**
     * @var string
     * @deprecated Use $name
     * @see $name
     */
    public $nom;
    /**
     * @var string name
     */
    public $name;
    // Name of group
    /**
     * @var int<0,1> global group  Does not seem to be used
     */
    public $globalgroup;
    // Global group
    /**
     * @var array<int>		Entity in table llx_user_group
     * @deprecated			Seems not used.
     */
    public $usergroup_entity;
    /**
     * Date creation record (datec)
     *
     * @var int
     */
    public $datec;
    /**
     * @var string Description
     */
    public $note;
    /**
     * @var User[]  Array of users
     */
    public $members = array();
    /**
     * @var int Number of rights granted to the user
     */
    public $nb_rights;
    /**
     * @var int Number of users in the group
     */
    public $nb_users;
    /**
     * @var stdClass Permissions of the group
     */
    public $rights;
    /**
     * @var array<string,int> Cache array of already loaded permissions
     */
    private $_tab_loaded = array();
    // Array of cache of already loaded permissions
    /**
     * @var int all_permissions_are_loaded
     */
    public $all_permissions_are_loaded;
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'index' => 1, 'position' => 1, 'comment' => 'Id'), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'default' => '1', 'index' => 1, 'position' => 5), 'nom' => array('type' => 'varchar(180)', 'label' => 'Name', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'showoncombobox' => 1, 'index' => 1, 'position' => 10, 'searchall' => 1, 'comment' => 'Group name'), 'note' => array('type' => 'html', 'label' => 'Description', 'enabled' => 1, 'visible' => 1, 'position' => 20, 'notnull' => -1, 'searchall' => 1), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -2, 'position' => 50, 'notnull' => 1), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -2, 'position' => 60, 'notnull' => 1), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'ModelPDF', 'enabled' => 1, 'visible' => 0, 'position' => 100));
    /**
     * @var string    Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_usergroup';
    /**
     * @var array<string, array<string>>	List of child tables. To test if we can delete object.
     */
    protected $childtables = array();
    /**
     * @var string[]	List of child tables. To know object to delete on cascade.
     */
    protected $childtablesoncascade = array('usergroup_rights', 'usergroup_user');
    /**
     *    Class constructor
     *
     *    @param   DoliDB  $db     Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Load a group object with all properties (except ->members array that is array of users in group)
     *
     *	@param      int		$id				Id of group to load
     *	@param      string	$groupname		Name of group to load
     *  @param		boolean	$load_members	Load all members of the group
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function fetch($id = 0, $groupname = '', $load_members = \false)
    {
    }
    /**
     *  Return array of groups objects for a particular user
     *
     *  @param		int			$userid 			User id to search
     *  @param		boolean		$load_members		Load all members of the group
     *  @return		array<int,UserGroup>|int<-1,-1>	Array of groups objects
     */
    public function listGroupsForUser($userid, $load_members = \true)
    {
    }
    /**
     * 	Return array of User objects for group this->id (or all if this->id not defined)
     *
     * 	@param	string		$excludefilter		Filter to exclude. Do not use here a string coming from user input.
     *  @param	int<0,1>	$mode				0=Return array of user instance, 1=Return array of users id only
     * 	@return	array<int,User>|array<int,int>|int<-1,-1>	Array of users or -1 on error
     */
    public function listUsersForGroup($excludefilter = '', $mode = 0)
    {
    }
    /**
     *    Add a permission to a group
     *
     *    @param	int		$rid		id du droit a ajouter
     *    @param	string	$allmodule	Ajouter tous les droits du module allmodule
     *    @param	string	$allperms	Ajouter tous les droits du module allmodule, perms allperms
     *    @param	int		$entity		Entity to use
     *    @return	int					> 0 if OK, < 0 if KO
     */
    public function addrights($rid, $allmodule = '', $allperms = '', $entity = 0)
    {
    }
    /**
     *    Remove a permission from group
     *
     *    @param	int		$rid		id du droit a retirer
     *    @param	string	$allmodule	Retirer tous les droits du module allmodule
     *    @param	string	$allperms	Retirer tous les droits du module allmodule, perms allperms
     *    @param	int		$entity		Entity to use
     *    @return	int					> 0 if OK, < 0 if OK
     */
    public function delrights($rid, $allmodule = '', $allperms = '', $entity = 0)
    {
    }
    /**
     *  Load the list of permissions for the user into the group object
     *
     *  @param      string	$moduletag	 	Name of module we want permissions ('' means all)
     *  @return     int						Return integer <0 if KO, >=0 if OK
     *  @deprecated
     *  TODO Remove this method. It has a name conflict with getRights() in CommonObject and was replaced in v20 with loadRights()
     *
     *  @phpstan-ignore-next-line
     */
    public function getrights($moduletag = '')
    {
    }
    /**
     *  Load the list of permissions for the user into the group object
     *
     *  @param      string	$moduletag	 	Name of module we want permissions ('' means all)
     *  @return     int						Return integer <0 if KO, >=0 if OK
     */
    public function loadRights($moduletag = '')
    {
    }
    /**
     *	Delete a group
     *
     *	@param	User	$user		User that delete
     *	@return int    				Return integer <0 if KO, > 0 if OK
     */
    public function delete(\User $user)
    {
    }
    /**
     *	Create group into database
     *
     *	@param		int		$notrigger	0=triggers enabled, 1=triggers disabled
     *	@return     int					Return integer <0 if KO, >=0 if OK
     */
    public function create($notrigger = 0)
    {
    }
    /**
     *		Update group into database
     *
     *      @param      int		$notrigger	    0=triggers enabled, 1=triggers disabled
     *    	@return     int						Return integer <0 if KO, >=0 if OK
     */
    public function update($notrigger = 0)
    {
    }
    /**
     *	Return full name (civility+' '+name+' '+lastname)
     *
     *	@param	Translate	$langs			Language object for translation of civility (used only if option is 1)
     *	@param	int			$option			0=No option, 1=Add civility
     * 	@param	int			$nameorder		-1=Auto, 0=Lastname+Firstname, 1=Firstname+Lastname, 2=Firstname, 3=Firstname if defined else lastname, 4=Lastname, 5=Lastname if defined else firstname
     * 	@param	int			$maxlen			Maximum length
     * 	@return	string						String with full name
     */
    public function getFullName($langs, $option = 0, $nameorder = -1, $maxlen = 0)
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a given status
     *
     *  @param	int		$status        Id status
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 			       Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     * getTooltipContentArray
     * @param array<string,mixed> $params params to construct tooltip data
     * @since v18
     * @return array{picto?:string,ref?:string,refsupplier?:string,label?:string,date?:string,date_echeance?:string,amountht?:string,total_ht?:string,totaltva?:string,amountlt1?:string,amountlt2?:string,amountrevenustamp?:string,totalttc?:string}|array{optimize:string}
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *  Return a link to the user card (with optionally the picto)
     *  Use this->id,this->lastname, this->firstname
     *
     *  @param  int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto, -1=Include photo into link, -2=Only picto photo, -3=Only photo very small)
     *	@param  string	$option						On what the link point to ('nolink', 'permissions')
     *  @param	integer	$notooltip					1=Disable tooltip on picto and name
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Retourne chaine DN complete dans l'annuaire LDAP pour l'objet
     *
     *	@param	array<string,mixed>	$info	Info array loaded by _load_ldap_info
     *	@param	int<0,2>	$mode		0=Return full DN (uid=qqq,ou=xxx,dc=aaa,dc=bbb)
     *									1=Return DN without key inside (ou=xxx,dc=aaa,dc=bbb)
     *									2=Return key only (uid=qqq)
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
     *	@return		array<string,mixed>		Tableau info des attributes
     */
    public function _load_ldap_info()
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     * 	@param	    string		$modele			Force model to use ('' to not force)
     * 	@param		Translate	$outputlangs	Object langs to use for output
     *  @param      int<0,1>	$hidedetails    Hide details of lines
     *  @param      int<0,1>	$hidedesc       Hide description
     *  @param      int<0,1>	$hideref        Hide ref
     *  @param      ?array<string,mixed>  $moreparams     Array to provide more information
     * 	@return     int         				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
    /**
     *	Return clickable link of object (with eventually picto)
     *
     *	@param	string	    			$option		Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param	?array<string,mixed>	$arraydata	Array of data
     *  @return	string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
}