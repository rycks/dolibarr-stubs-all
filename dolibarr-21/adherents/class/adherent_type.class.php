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
    /**
     * @var string
     */
    public $duration;
    /**
     * @var int type expiration
     */
    public $duration_value;
    /**
     * @var string Expiration unit
     */
    public $duration_unit;
    /**
     * @var int<0,1> Subscription required (0 or 1)
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
    /**
     * @var int<0,1>	Can vote
     */
    public $vote;
    /** @var string Email sent during validation of member */
    public $mail_valid;
    /** @var string Email sent after recording a new subscription */
    public $mail_subscription = '';
    /** @var string Email sent after resiliation */
    public $mail_resiliate = '';
    /** @var string Email sent after exclude */
    public $mail_exclude = '';
    /** @var Adherent[] Array of members */
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
     * @var array<string,array{label:string,description:string,email:string}>	multilangs
     */
    public $multilangs = array();
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @inheritdoc
     * Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array("rowid" => array("type" => "integer", "label" => "TechnicalID", "enabled" => "1", 'position' => 10, 'notnull' => 1, "visible" => "-1"), "tms" => array("type" => "timestamp", "label" => "DateModification", "enabled" => "1", 'position' => 20, 'notnull' => 1, "visible" => "-1"), "statut" => array("type" => "smallint(6)", "label" => "Statut", "enabled" => "1", 'position' => 500, 'notnull' => 1, "visible" => "-1"), "libelle" => array("type" => "varchar(50)", "label" => "Label", "enabled" => "1", 'position' => 30, 'notnull' => 1, "visible" => "-1"), "subscription" => array("type" => "varchar(3)", "label" => "Subscription", "enabled" => "1", 'position' => 35, 'notnull' => 1, "visible" => "-1"), "amount" => array("type" => "double(24,8)", "label" => "Amount", "enabled" => "1", 'position' => 40, 'notnull' => 0, "visible" => "-1"), "caneditamount" => array("type" => "integer", "label" => "Caneditamount", "enabled" => "1", 'position' => 45, 'notnull' => 0, "visible" => "-1"), "vote" => array("type" => "varchar(3)", "label" => "Vote", "enabled" => "1", 'position' => 50, 'notnull' => 1, "visible" => "-1"), "note" => array("type" => "longtext", "label" => "Note", "enabled" => "1", 'position' => 55, 'notnull' => 0, "visible" => "-1"), "mail_valid" => array("type" => "longtext", "label" => "Mailvalid", "enabled" => "1", 'position' => 60, 'notnull' => 0, "visible" => "-1"), "morphy" => array("type" => "varchar(3)", "label" => "Morphy", "enabled" => "1", 'position' => 65, 'notnull' => 0, "visible" => "-1"), "duration" => array("type" => "varchar(6)", "label" => "Duration", "enabled" => "1", 'position' => 70, 'notnull' => 0, "visible" => "-1"));
    // END MODULEBUILDER PROPERTIES
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
     *  @return array<int,string>		List of types of members
     */
    public function liste_array($status = -1)
    {
    }
    /**
     *  Return the array of all amounts per membership type id
     *
     *  @param	int		$status			Filter on status of type
     *  @return array<int,string>		Array of membership type
     */
    public function amountByType($status = \null)
    {
    }
    /**
     * 	Return array of Member objects for member type this->id (or all if this->id not defined)
     *
     * 	@param	string		$excludefilter	Filter to exclude. This value must not come from a user input.
     *  @param	int<0,2>	$mode			0=Return array of member instance
     *  									1=Return array of member instance without extra data
     *  									2=Return array of members id only
     * 	@return	Adherent[]|int<-1,-1>		Array of members or -1 on error
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
     * @param array<string,mixed> $params params to construct tooltip data
     * @since v18
     * @return array{picto?:string,ref?:string,refsupplier?:string,label?:string,date?:string,date_echeance?:string,amountht?:string,total_ht?:string,totaltva?:string,amountlt1?:string,amountlt2?:string,amountrevenustamp?:string,totalttc?:string}|array{optimize:string}
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *  Return clickable name (with picto eventually)
     *
     *  @param	int<0,2>	$withpicto				0=No picto, 1=Include picto into link, 2=Only picto
     *  @param	int			$maxlen					length max label
     *  @param	int<0,1>	$notooltip				1=Disable tooltip
     *  @param 	string		$morecss				Add more css on link
     *  @param 	int<-1,1>	$save_lastsearch_value	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, $maxlen = 0, $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *    Return label of status (activity, closed)
     *
     *    @param	int<0,6>	$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *    @return	string     		   		Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a given status
     *
     *  @param	int			$status		Status id
     *  @param	int<0,6>	$mode		0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string					Status label
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *	Retourne chaine DN complete dans l'annuaire LDAP pour l'objet
     *
     *	@param	array<string,mixed>	$info	Info array loaded by _load_ldap_info
     *	@param	int<0,2>	$mode	0=Return full DN (uid=qqq,ou=xxx,dc=aaa,dc=bbb)
     *								1=Return DN without key inside (ou=xxx,dc=aaa,dc=bbb)
     *								2=Return key only (uid=qqq)
     *	@return	string				DN
     */
    public function _load_ldap_dn($info, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *	Initialize the info array (array of LDAP values) that will be used to call LDAP functions
     *
     *	@return		array<string,mixed>	Info table with attributes
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
     *	Return clickable link of object (with eventually picto)
     *
     *	@param      string	    			$option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array{string,mixed}		$arraydata				Array of data
     *  @return		string											HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
}