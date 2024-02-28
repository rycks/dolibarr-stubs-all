<?php

/**
 *	Class to manage members type
 */
class AdherentType extends \CommonObject
{
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'adherent_type';
    /**
     * @var string ID to identify managed object
     */
    public $element = 'adherent_type';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'group';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    /**
     * @var string
     * @deprecated Use label
     * @see $label
     */
    public $libelle;
    /**
     * @var string Adherent type label
     */
    public $label;
    /**
     * @var string Adherent type nature
     */
    public $morphy;
    /**
     * @var int Subsription required (0 or 1)
     * @since 5.0
     */
    public $subscription;
    /** @var string 	Public note */
    public $note;
    /** @var integer	Can vote */
    public $vote;
    /** @var string Email sent during validation */
    public $mail_valid;
    /** @var array Array of members */
    public $members = array();
    /**
     *	Constructor
     *
     *	@param 		DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Fonction qui permet de creer le status de l'adherent
     *
     *  @param	User		$user			User making creation
     *  @param	int		$notrigger		1=do not execute triggers, 0 otherwise
     *  @return	int						>0 if OK, < 0 if KO
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Updating the type in the database
     *
     *  @param	User	$user			Object user making change
     *  @param	int		$notrigger		1=do not execute triggers, 0 otherwise
     *  @return	int						>0 if OK, < 0 if KO
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     *	Function to delete the member's status
     *
     *  @return		int		> 0 if OK, 0 if not found, < 0 if KO
     */
    public function delete()
    {
    }
    /**
     *  Function that retrieves the status of the member
     *
     *  @param 		int		$rowid			Id of member type to load
     *  @return		int						<0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of members' type
     *
     *  @return 	array	List of types of members
     */
    public function liste_array()
    {
    }
    /**
     * 	Return array of Member objects for member type this->id (or all if this->id not defined)
     *
     * 	@param	string	$excludefilter		Filter to exclude
     *  @param	int		$mode				0=Return array of member instance
     *  									1=Return array of member instance without extra data
     *  									2=Return array of members id only
     * 	@return	mixed						Array of members or -1 on error
     */
    public function listMembersForMemberType($excludefilter = '', $mode = 0)
    {
    }
    /**
     *	Return translated label by the nature of a adherent (physical or moral)
     *
     *	@param	string		$morphy		Nature of the adherent (physical or moral)
     *	@return	string					Label
     */
    public function getmorphylib($morphy = '')
    {
    }
    /**
     *  Return clicable name (with picto eventually)
     *
     *  @param		int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     *  @param		int		$maxlen			length max label
     *  @param		int  	$notooltip		1=Disable tooltip
     *  @return		string					String with URL
     */
    public function getNomUrl($withpicto = 0, $maxlen = 0, $notooltip = 0)
    {
    }
    /**
     *     getLibStatut
     *
     *     @return string     Return status of a type of member
     */
    public function getLibStatut()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
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
     *     getMailOnValid
     *
     *     @return string     Return mail content of type or empty
     */
    public function getMailOnValid()
    {
    }
    /**
     *     getMailOnSubscription
     *
     *     @return string     Return mail content of type or empty
     */
    public function getMailOnSubscription()
    {
    }
    /**
     *     getMailOnResiliate
     *
     *     @return string     Return mail model content of type or empty
     */
    public function getMailOnResiliate()
    {
    }
}