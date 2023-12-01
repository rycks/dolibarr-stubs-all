<?php

/**
 *	Class of the module paid holiday. Developed by Teclib ( http://www.teclib.com/ )
 */
class Holiday extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'holiday';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'holiday';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 0;
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_holiday';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'holiday';
    /**
     * @var int User ID
     */
    public $fk_user;
    public $date_create = '';
    /**
     * @var string description
     */
    public $description;
    public $date_debut = '';
    // Date start in PHP server TZ
    public $date_fin = '';
    // Date end in PHP server TZ
    public $date_debut_gmt = '';
    // Date start in GMT
    public $date_fin_gmt = '';
    // Date end in GMT
    public $halfday = '';
    // 0:Full days, 2:Start afternoon end morning, -1:Start afternoon end afternoon, 1:Start morning end morning
    public $statut = '';
    // 1=draft, 2=validated, 3=approved
    /**
     * @var int 	ID of user that must approve. Real user for approval is fk_user_valid (old version) or fk_user_approve (new versions)
     */
    public $fk_validator;
    /**
     * @var int 	Date of validation or approval. TODO: Use date_valid instead for validation.
     */
    public $date_valid = '';
    /**
     * @var int 	ID of user that has validated
     */
    public $fk_user_valid;
    /**
     * @var int 	Date approval
     */
    public $date_approval;
    /**
     * @var int 	ID of user that has approved
     */
    public $fk_user_approve;
    /**
     * @var int 	Date for refuse
     */
    public $date_refuse = '';
    /**
     * @var int 	ID for refuse
     */
    public $fk_user_refuse;
    /**
     * @var int 	Date for cancelation
     */
    public $date_cancel = '';
    /**
     * @var int 	ID for cancelation
     */
    public $fk_user_cancel;
    public $detail_refuse = '';
    /**
     * @var int ID
     */
    public $fk_type;
    public $holiday = array();
    public $events = array();
    public $logs = array();
    public $optName = '';
    public $optValue = '';
    public $optRowid = '';
    /**
     * Draft status
     */
    const STATUS_DRAFT = 1;
    /**
     * Validated status
     */
    const STATUS_VALIDATED = 2;
    /**
     * Approved
     */
    const STATUS_APPROVED = 3;
    /**
     * Canceled
     */
    const STATUS_CANCELED = 4;
    /**
     * Refused
     */
    const STATUS_REFUSED = 5;
    /**
     *   Constructor
     *
     *   @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Returns the reference to the following non used Order depending on the active numbering module
     *  defined into HOLIDAY_ADDON
     *
     *	@param	Societe		$objsoc     third party object
     *  @return string      			Holiday free reference
     */
    public function getNextNumRef($objsoc)
    {
    }
    /**
     * Update balance of vacations and check table of users for holidays is complete. If not complete.
     *
     * @return	int			<0 if KO, >0 if OK
     */
    public function updateBalance()
    {
    }
    /**
     *   Créer un congés payés dans la base de données
     *
     *   @param		User	$user        	User that create
     *   @param     int		$notrigger	    0=launch triggers after, 1=disable triggers
     *   @return    int			         	<0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *	Load object in memory from database
     *
     *  @param	int		$id         Id object
     *  @param	string	$ref        Ref object
     *  @return int         		<0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = '')
    {
    }
    /**
     *	List holidays for a particular user or list of users
     *
     *  @param		int|string		$user_id    ID of user to list, or comma separated list of IDs of users to list
     *  @param      string			$order      Sort order
     *  @param      string			$filter     SQL Filter
     *  @return     int      					-1 if KO, 1 if OK, 2 if no result
     */
    public function fetchByUser($user_id, $order = '', $filter = '')
    {
    }
    /**
     *	List all holidays of all users
     *
     *  @param      string	$order      Sort order
     *  @param      string	$filter     SQL Filter
     *  @return     int      			-1 if KO, 1 if OK, 2 if no result
     */
    public function fetchAll($order, $filter)
    {
    }
    /**
     *	Validate leave request
     *
     *  @param	User	$user        	User that validate
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int         			<0 if KO, >0 if OK
     */
    public function validate($user = \null, $notrigger = 0)
    {
    }
    /**
     *	Approve leave request
     *
     *  @param	User	$user        	User that approve
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int         			<0 if KO, >0 if OK
     */
    public function approve($user = \null, $notrigger = 0)
    {
    }
    /**
     *	Update database
     *
     *  @param	User	$user        	User that modify
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int         			<0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *   Delete object in database
     *
     *	 @param		User	$user        	User that delete
     *   @param     int		$notrigger	    0=launch triggers after, 1=disable triggers
     *	 @return	int						<0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *	Check if a user is on holiday (partially or completely) into a period.
     *  This function can be used to avoid to have 2 leave requests on same period for example.
     *  Warning: It consumes a lot of memory because it load in ->holiday all holiday of a dedicated user at each call.
     *
     *  @param 	int		$fk_user		Id user
     *  @param 	integer	$dateStart		Start date of period to check
     *  @param 	integer	$dateEnd		End date of period to check
     *  @param  int     $halfday        Tag to define how start and end the period to check:
     *                                  0:Full days, 2:Start afternoon end morning, -1:Start afternoon end afternoon, 1:Start morning end morning
     * 	@return boolean					False = New range overlap an existing holiday, True = no overlapping (is never on holiday during checked period).
     *  @see verifDateHolidayForTimestamp()
     */
    public function verifDateHolidayCP($fk_user, $dateStart, $dateEnd, $halfday = 0)
    {
    }
    /**
     *	Check that a user is not on holiday for a particular timestamp. Can check approved leave requests and not into public holidays of company.
     *
     * 	@param 	int			$fk_user				Id user
     *  @param	integer	    $timestamp				Time stamp date for a day (YYYY-MM-DD) without hours  (= 12:00AM in english and not 12:00PM that is 12:00)
     *  @param	string		$status					Filter on holiday status. '-1' = no filter.
     * 	@return array								array('morning'=> ,'afternoon'=> ), Boolean is true if user is available for day timestamp.
     *  @see verifDateHolidayCP()
     */
    public function verifDateHolidayForTimestamp($fk_user, $timestamp, $status = '-1')
    {
    }
    /**
     *	Return clicable name (with picto eventually)
     *
     *	@param	int			$withpicto					0=_No picto, 1=Includes the picto in the linkn, 2=Picto only
     *  @param  int     	$save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param  int         $notooltip					1=Disable tooltip
     *	@return	string									String with URL
     */
    public function getNomUrl($withpicto = 0, $save_lastsearch_value = -1, $notooltip = 0)
    {
    }
    /**
     *	Returns the label status
     *
     *	@param      int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *	@return     string      		Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Returns the label of a status
     *
     *	@param      int		$status     Id status
     *	@param      int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *  @param		integer	$startdate	Date holiday should start
     *	@return     string      		Label
     */
    public function LibStatut($status, $mode = 0, $startdate = '')
    {
    }
    /**
     *   Affiche un select HTML des statuts de congés payés
     *
     *   @param 	int		$selected   	Id of preselected status
     *   @param		string	$htmlname		Name of HTML select field
     *   @param		string	$morecss		More CSS on select component
     *   @return    string					Show select of status
     */
    public function selectStatutCP($selected = '', $htmlname = 'select_statut', $morecss = 'minwidth125')
    {
    }
    /**
     *  Met à jour une option du module Holiday Payés
     *
     *  @param	string	$name       name du paramètre de configuration
     *  @param	string	$value      vrai si mise à jour OK sinon faux
     *  @return boolean				ok or ko
     */
    public function updateConfCP($name, $value)
    {
    }
    /**
     *  Return value of a conf parameter for leave module
     *  TODO Move this into llx_const table
     *
     *  @param	string	$name                 Name of parameter
     *  @param  string  $createifnotfound     'stringvalue'=Create entry with string value if not found. For example 'YYYYMMDDHHMMSS'.
     *  @return string      		          Value of parameter. Example: 'YYYYMMDDHHMMSS' or < 0 if error
     */
    public function getConfCP($name, $createifnotfound = '')
    {
    }
    /**
     *	Met à jour le timestamp de la dernière mise à jour du solde des CP
     *
     *	@param		int		$userID		Id of user
     *	@param		float	$nbHoliday	Nb of days
     *  @param		int		$fk_type	Type of vacation
     *  @return     int					0=Nothing done, 1=OK, -1=KO
     */
    public function updateSoldeCP($userID = '', $nbHoliday = '', $fk_type = '')
    {
    }
    /**
     *	Retourne un checked si vrai
     *
     *  @param	string	$name       name du paramètre de configuration
     *  @return string      		retourne checked si > 0
     */
    public function getCheckOption($name)
    {
    }
    /**
     *  Créer les entrées pour chaque utilisateur au moment de la configuration
     *
     *  @param	boolean		$single		Single
     *  @param	int			$userid		Id user
     *  @return void
     */
    public function createCPusers($single = \false, $userid = '')
    {
    }
    /**
     *  Supprime un utilisateur du module Congés Payés
     *
     *  @param	int		$user_id        ID de l'utilisateur à supprimer
     *  @return boolean      			Vrai si pas d'erreur, faut si Erreur
     */
    public function deleteCPuser($user_id)
    {
    }
    /**
     *  Return balance of holiday for one user
     *
     *  @param	int		$user_id    ID de l'utilisateur
     *  @param	int		$fk_type	Filter on type
     *  @return float        		Retourne le solde de congés payés de l'utilisateur
     */
    public function getCPforUser($user_id, $fk_type = 0)
    {
    }
    /**
     *    Get list of Users or list of vacation balance.
     *
     *    @param      boolean			$stringlist	    If true return a string list of id. If false, return an array with detail.
     *    @param      boolean   		$type			If true, read Dolibarr user list, if false, return vacation balance list.
     *    @param      string            $filters        Filters. Warning: This must not contains data from user input.
     *    @return     array|string|int      			Return an array
     */
    public function fetchUsers($stringlist = \true, $type = \true, $filters = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of people with permission to validate leave requests.
     * Search for permission "approve leave requests"
     *
     * @return  array       Array of user ids
     */
    public function fetch_users_approver_holiday()
    {
    }
    /**
     *	Compte le nombre d'utilisateur actifs dans Dolibarr
     *
     *  @return     int      retourne le nombre d'utilisateur
     */
    public function countActiveUsers()
    {
    }
    /**
     *	Compte le nombre d'utilisateur actifs dans Dolibarr sans CP
     *
     *  @return     int      retourne le nombre d'utilisateur
     */
    public function countActiveUsersWithoutCP()
    {
    }
    /**
     *  Compare le nombre d'utilisateur actif de Dolibarr à celui des utilisateurs des congés payés
     *
     *  @param    int	$userDolibarrWithoutCP	Number of active users in Dolibarr without holidays
     *  @param    int	$userCP    				Number of active users into table of holidays
     *  @return   int							<0 if KO, >0 if OK
     */
    public function verifNbUsers($userDolibarrWithoutCP, $userCP)
    {
    }
    /**
     * addLogCP
     *
     * @param 	int		$fk_user_action		Id user creation
     * @param 	int		$fk_user_update		Id user update
     * @param 	string	$label				Label (Example: 'Leave', 'Manual update', 'Leave request cancelation'...)
     * @param 	int		$new_solde			New value
     * @param	int		$fk_type			Type of vacation
     * @return 	int							Id of record added, 0 if nothing done, < 0 if KO
     */
    public function addLogCP($fk_user_action, $fk_user_update, $label, $new_solde, $fk_type)
    {
    }
    /**
     *  Liste le log des congés payés
     *
     *  @param	string	$order      Filtrage par ordre
     *  @param  string	$filter     Filtre de séléction
     *  @return int         		-1 si erreur, 1 si OK et 2 si pas de résultat
     */
    public function fetchLog($order, $filter)
    {
    }
    /**
     *  Return array with list of types
     *
     *  @param		int		$active		Status of type. -1 = Both
     *  @param		int		$affect		Filter on affect (a request will change sold or not). -1 = Both
     *  @return     array	    		Return array with list of types
     */
    public function getTypes($active = -1, $affect = -1)
    {
    }
    /**
     *  Load information on object
     *
     *  @param  int     $id      Id of object
     *  @return void
     */
    public function info($id)
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load this->nb for dashboard
     *
     *      @return     int         <0 if KO, >0 if OK
     */
    public function load_state_board()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @param	User	$user   		Objet user
     *      @return WorkboardResponse|int 	<0 if KO, WorkboardResponse if OK
     */
    public function load_board($user)
    {
    }
}