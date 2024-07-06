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
    public $picto = 'members';
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
    public $duration;
    /**
     * type expiration
     */
    public $duration_value;
    /**
     * Expiration unit
     */
    public $duration_unit;
    /**
     * @var int Subscription required (0 or 1)
     */
    public $subscription;
    /**
     * @var float|string 	Amount for subscription (null or '' means not defined)
     */
    public $amount;
    /**
     * @var int Amount can be chosen by the visitor during subscription (0 or 1)
     */
    public $caneditamount;
    /**
     * @var string 	Public note
     * @deprecated
     */
    public $note;
    /** @var string 	Public note */
    public $note_public;
    /** @var integer	Can vote */
    public $vote;
    /** @var string Email sent during validation of member */
    public $mail_valid;
    /** @var string Email sent after recording a new subscription */
    public $mail_subscription = '';
    /** @var string Email sent after resiliation */
    public $mail_resiliate = '';
    /** @var string Email sent after exclude */
    public $mail_exclude = '';
    /** @var array Array of members */
    public $members = array();
    /**
     * @var string description
     */
    public $description;
    /**
     * @var string email
     */
    public $email;
    /**
     * @var array multilangs
     */
    public $multilangs = array();
    /**
     *	Constructor
     *
     *	@param 		DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Load array this->multilangs
     *
     * @return int        Return integer <0 if KO, >0 if OK
     */
    public function getMultiLangs()
    {
    }
    /**
     * Update or add a translation for this member type
     *
     * @param  User $user Object user making update
     * @return int        Return integer <0 if KO, >0 if OK
     */
    public function setMultiLangs($user)
    {
    }
    /**
     * Delete a language for this member type
     *
     * @param string $langtodelete 	Language code to delete
     * @param User   $user         	Object user making delete
     * @return int                   Return integer <0 if KO, >0 if OK
     */
    public function delMultiLangs($langtodelete, $user)
    {
    }
    /**
     *  Function to create the member type
     *
     *  @param	User	$user			User making creation
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
     *	@param	User	$user		User making the deletion
     *  @return	int					> 0 if OK, 0 if not found, < 0 if KO
     */
    public function delete($user)
    {
    }
    /**
     *  Function that retrieves the properties of a membership type
     *
     *  @param 		int		$rowid			Id of member type to load
     *  @return		int						Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of members' type
     *
     *  @param	int		$status			Filter on status of type
     *  @return array					List of types of members
     */
    public function liste_array($status = -1)
    {
    }
    /**
     *  Return the array of all amounts per membership type id
     *
     *  @param	int		$status			Filter on status of type
     *  @return array					Array of membership type
     */
    public function amountByType($status = \null)
    {
    }
    /**
     * 	Return array of Member objects for member type this->id (or all if this->id not defined)
     *
     * 	@param	string	$excludefilter		Filter to exclude. This value must not come from a user input.
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
     * getTooltipContentArray
     * @param array $params params to construct tooltip data
     * @since v18
     * @return array
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *  Return clicable name (with picto eventually)
     *
     *  @param		int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     *  @param		int		$maxlen						length max label
     *  @param		int  	$notooltip					1=Disable tooltip
     *  @param  	string  $morecss                    Add more css on link
     *  @param  	int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @return		string								String with URL
     */
    public function getNomUrl($withpicto = 0, $maxlen = 0, $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *    Return label of status (activity, closed)
     *
     *    @param  	int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *    @return   string     	   		Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a given status
     *
     *  @param	int		$status         Status id
     *  @param	int		$mode           0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string          		Status label
     */
    public function LibStatut($status, $mode = 0)
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
     *	@return		array		Tableau info des attributes
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
    /**
     *     getMailOnExclude
     *
     *     @return string     Return mail model content of type or empty
     */
    public function getMailOnExclude()
    {
    }
    /**
     *	Return clicable link of object (with eventually picto)
     *
     *	@param      string	    $option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array		$arraydata				Array of data
     *  @return		string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
}