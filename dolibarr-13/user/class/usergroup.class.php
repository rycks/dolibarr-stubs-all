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
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
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
     * @deprecated
     * @see $name
     */
    public $nom;
    /**
     * @var string name
     */
    public $name;
    // Name of group
    public $globalgroup;
    // Global group
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
     * @var string Description
     */
    public $note;
    public $members = array();
    // Array of users
    public $nb_rights;
    // Number of rights granted to the user
    private $_tab_loaded = array();
    // Array of cache of already loaded permissions
    public $oldcopy;
    // To contains a clone of this when we need to save old properties of object
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'index' => 1, 'position' => 1, 'comment' => 'Id'), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'default' => 1, 'index' => 1, 'position' => 5), 'nom' => array('type' => 'varchar(180)', 'label' => 'Name', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'showoncombobox' => 1, 'index' => 1, 'position' => 10, 'searchall' => 1, 'comment' => 'Group name'), 'note' => array('type' => 'html', 'label' => 'Description', 'enabled' => 1, 'visible' => 1, 'position' => 20, 'notnull' => -1), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -2, 'position' => 50, 'notnull' => 1), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -2, 'position' => 60, 'notnull' => 1), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'ModelPDF', 'enabled' => 1, 'visible' => 0, 'position' => 100));
    /**
     * @var string    Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_usergroup';
    /**
     * @var array	List of child tables. To test if we can delete object.
     */
    protected $childtables = array();
    /**
     * @var array	List of child tables. To know object to delete on cascade.
     */
    protected $childtablesoncascade = array('usergroup_rights', 'usergroup_user');
    /**
     *    Constructor de la classe
     *
     *    @param   DoliDb  $db     Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Charge un objet group avec toutes ses caracteristiques (except ->members array)
     *
     *	@param      int		$id				Id of group to load
     *	@param      string	$groupname		Name of group to load
     *  @param		boolean	$load_members	Load all members of the group
     *	@return		int						<0 if KO, >0 if OK
     */
    public function fetch($id = '', $groupname = '', $load_members = \true)
    {
    }
    /**
     *  Return array of groups objects for a particular user
     *
     *  @param		int		$userid 		User id to search
     *  @param		boolean	$load_members	Load all members of the group
     *  @return		array     				Array of groups objects
     */
    public function listGroupsForUser($userid, $load_members = \true)
    {
    }
    /**
     * 	Return array of User objects for group this->id (or all if this->id not defined)
     *
     * 	@param	string	$excludefilter		Filter to exclude
     *  @param	int		$mode				0=Return array of user instance, 1=Return array of users id only
     * 	@return	mixed						Array of users or -1 on error
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
     *  Charge dans l'objet group, la liste des permissions auquels le groupe a droit
     *
     *  @param      string	$moduletag	 	Name of module we want permissions ('' means all)
     *	@return     int						<0 if KO, >0 if OK
     */
    public function getrights($moduletag = '')
    {
    }
    /**
     *	Delete a group
     *
     *	@param	User	$user		User that delete
     *	@return int    				<0 if KO, > 0 if OK
     */
    public function delete(\User $user)
    {
    }
    /**
     *	Create group into database
     *
     *	@param		int		$notrigger	0=triggers enabled, 1=triggers disabled
     *	@return     int					<0 if KO, >=0 if OK
     */
    public function create($notrigger = 0)
    {
    }
    /**
     *		Update group into database
     *
     *      @param      int		$notrigger	    0=triggers enabled, 1=triggers disabled
     *    	@return     int						<0 if KO, >=0 if OK
     */
    public function update($notrigger = 0)
    {
    }
    /**
     *  Return label of status of user (active, inactive)
     *
     *  @param	int		$mode          0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi le libelle d'un statut donne
     *
     *  @param	int		$status        	Id status
     *  @param  int		$mode          	0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return string 			       	Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     *  Return a link to the user card (with optionaly the picto)
     *  Use this->id,this->lastname, this->firstname
     *
     *  @param  int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto, -1=Include photo into link, -2=Only picto photo, -3=Only photo very small)
     *	@param  string	$option						On what the link point to ('nolink', )
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
     *	@param		array	$info		Info array loaded by _load_ldap_info
     *	@param		int		$mode		0=Return full DN (uid=qqq,ou=xxx,dc=aaa,dc=bbb)
     *									1=Return DN without key inside (ou=xxx,dc=aaa,dc=bbb)
     *									2=Return key only (uid=qqq)
     *	@return		string				DN
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
     *  @return	void
     */
    public function initAsSpecimen()
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
     *  @param      null|array  $moreparams     Array to provide more information
     * 	@return     int         				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
}