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
    /**
     * @var int|string
     */
    public $date_create = '';
    /**
     * @var string description
     */
    public $description;
    /**
     * @var int|string Date start in PHP server TZ
     */
    public $date_debut = '';
    /**
     * @var int|string Date end in PHP server TZ
     */
    public $date_fin = '';
    /**
     * @var int|string Date start in GMT
     */
    public $date_debut_gmt = '';
    /**
     * @var int|string Date end in GMT
     */
    public $date_fin_gmt = '';
    /**
     * @var int|string 0:Full days, 2:Start afternoon end morning, -1:Start afternoon end afternoon, 1:Start morning end morning
     */
    public $halfday = '';
    /**
     * @var int Status 1=draft, 2=validated, 3=approved, 4 canceled, 5 refused
     * @deprecated
     */
    public $statut = 0;
    /**
     * @var int 	ID of user that must approve. Real user for approval is fk_user_valid (old version) or fk_user_approve (new versions)
     */
    public $fk_validator;
    /**
     * @var int 	Date of validation or approval. TODO: Use date_valid instead for validation.
     */
    public $date_valid = 0;
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
    public $date_refuse = 0;
    /**
     * @var int 	ID for refuse
     */
    public $fk_user_refuse;
    /**
     * @var int 	Date for cancellation
     */
    public $date_cancel = 0;
    /**
     * @var int 	ID for cancellation
     */
    public $fk_user_cancel;
    /**
     * @var int 	ID for creation
     */
    public $fk_user_create;
    /**
     * @var string Detail of refuse
     */
    public $detail_refuse = '';
    /**
     * @var int ID
     */
    public $fk_type;
    public $holiday = array();
    public $events = array();
    public $logs = array();
    /**
     * @var string
     */
    public $optName = '';
    /**
     * @var string
     */
    public $optValue = '';
    /**
     * @var int
     */
    public $optRowid = 0;
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
     *	@param	?Societe	$objsoc     third party object
     *  @return string      			Holiday free reference
     */
    public function getNextNumRef($objsoc)
    {
    }
    /**
     * Update balance of vacations and check table of users for holidays is complete. If not complete.
     *
     * @return	int			Return integer <0 if KO, >0 if OK
     */
    public function updateBalance()
    {
    }
    /**
     *   Créer un congés payés dans la base de données
     *
     *   @param		User	$user        	User that create
     *   @param     int		$notrigger	    0=launch triggers after, 1=disable triggers
     *   @return    int			         	Return integer <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *	Load object in memory from database
     *
     *  @param	int		$id         Id object
     *  @param	string	$ref        Ref object
     *  @return int         		Return integer <0 if KO, 0 if not found, >0 if OK
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
     *  @param	User		$user        	User that validate
     *  @param  int<0,1>	$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int							Return integer <0 if KO, >0 if OK
     */
    public function validate($user = \null, $notrigger = 0)
    {
    }
    /**
     *	Approve leave request
     *
     *  @param	User		$user        	User that approve
     *  @param  int<0,1>	$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int							Return integer <0 if KO, >0 if OK
     */
    public function approve($user = \null, $notrigger = 0)
    {
    }
    /**
     *	Update database
     *
     *  @param	?User		$user			User that modify
     *  @param  int<0,1>	$notrigger		0=launch triggers after, 1=disable triggers
     *  @return int							Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *   Delete object in database
     *
     *	 @param		User		$user        	User that delete
     *   @param     int<0,1>	$notrigger	    0=launch triggers after, 1=disable triggers
     *	 @return	int							Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *	Check if a user is on holiday (partially or completely) into a period.
     *  This function can be used to avoid to have 2 leave requests on same period for example.
     *  Warning: It consumes a lot of memory because it load in ->holiday all holiday of a dedicated user at each call.
     *
     *  @param 	int			$fk_user	Id user
     *  @param 	int			$dateStart	Start date of period to check
     *  @param 	int			$dateEnd	End date of period to check
     *  @param  int<-1,2>	$halfday    Tag to define how start and end the period to check:
     *                                  0:Full days, 2:Start afternoon end morning, -1:Start afternoon end afternoon, 1:Start morning end morning
     * 	@return bool					False = New range overlap an existing holiday, True = no overlapping (is never on holiday during checked period).
     *  @see verifDateHolidayForTimestamp()
     */
    public function verifDateHolidayCP($fk_user, $dateStart, $dateEnd, $halfday = 0)
    {
    }
    /**
     *	Check that a user is not on holiday for a particular timestamp. Can check approved leave requests and not into public holidays of company.
     *
     * 	@param 	int			$fk_user				Id user
     *  @param	int		    $timestamp				Time stamp date for a day (YYYY-MM-DD) without hours  (= 12:00AM in english and not 12:00PM that is 12:00)
     *  @param	string		$status					Filter on holiday status. '-1' = no filter.
     * 	@return array{morning:int<0,1>,afternoon:int<0,1>,morning_reason?:string,afternoon_reason?:string}		array('morning'=> ,'afternoon'=> ), Boolean is true if user is available for day timestamp.
     *  @see verifDateHolidayCP()
     */
    public function verifDateHolidayForTimestamp($fk_user, $timestamp, $status = '-1')
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
     *	Return clickable name (with picto eventually)
     *
     *	@param	int			$withpicto					0=_No picto, 1=Includes the picto in the linkn, 2=Picto only
     *  @param  int     	$save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param  int         $notooltip					1=Disable tooltip
     *  @param  string  	$morecss                    Add more css on link
     *	@return	string									String with URL
     */
    public function getNomUrl($withpicto = 0, $save_lastsearch_value = -1, $notooltip = 0, $morecss = '')
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
     *	@param      int			$status     Id status
     *	@param      int			$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *  @param		int|string	$startdate	Date holiday should start
     *	@return     string      			Label
     */
    public function LibStatut($status, $mode = 0, $startdate = '')
    {
    }
    /**
     *   Show select with list of leave status
     *
     *   @param 	int		$selected   	Id of preselected status
     *   @param		string	$htmlname		Name of HTML select field
     *   @param		string	$morecss		More CSS on select component
     *   @return    string					Show select of status
     */
    public function selectStatutCP($selected = 0, $htmlname = 'select_statut', $morecss = 'minwidth125')
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
     *  @return string|int<min,0>             Value of parameter. Example: 'YYYYMMDDHHMMSS' or < 0 if error
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
    public function updateSoldeCP($userID = 0, $nbHoliday = 0, $fk_type = 0)
    {
    }
    /**
     *  Create entries for each user at setup step
     *
     *  @param	boolean		$single		Single
     *  @param	int			$userid		Id user
     *  @return void
     */
    public function createCPusers($single = \false, $userid = 0)
    {
    }
    /**
     *  Return the balance of annual leave of a user
     *
     *  @param	int		$user_id    User ID
     *  @param	int		$fk_type	Filter on type
     *  @return ?float	     		Balance of annual leave if OK, null if KO.
     */
    public function getCPforUser($user_id, $fk_type = 0)
    {
    }
    /**
     *	Get list of Users or list of vacation balance.
     *
     *	@param	boolean		$stringlist	    If true return a string list of id. If false, return an array with detail.
     *	@param	boolean		$type			If true, read Dolibarr user list, if false, return vacation balance list.
     *	@param	string		$filters        Filters. Warning: This must not contains data from user input.
     *	@return array<array{rowid:int,id:int,name:string,lastname:string,firstname:string,gender:string,status:int,employee:int,photo:string,fk_user:int,type?:int,nb_holiday?:int}>|string|int<-1,-1>	Return an array
     */
    public function fetchUsers($stringlist = \true, $type = \true, $filters = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of people with permission to validate leave requests.
     * Search for permission "approve leave requests"
     *
     * @return  int[]|int<-1,-1>	Array of user ids or -1 if error
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
     *  @return   int							Return integer <0 if KO, >0 if OK
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
     * @param 	float	$new_solde			New value
     * @param	int		$fk_type			Type of vacation
     * @return 	int							Id of record added, 0 if nothing done, < 0 if KO
     */
    public function addLogCP($fk_user_action, $fk_user_update, $label, $new_solde, $fk_type)
    {
    }
    /**
     *  List log of leaves
     *
     *  @param	string	$sqlorder   SQL sort order
     *  @param  string	$sqlwhere   SQL where
     *  @return int         		-1 si erreur, 1 si OK et 2 si pas de résultat
     */
    public function fetchLog($sqlorder, $sqlwhere)
    {
    }
    /**
     *  Return array with list of types
     *
     *  @param	int		$active		Status of type. -1 = Both
     *  @param	int		$affect		Filter on affect (a request will change sold or not). -1 = Both
     *	@return	array<int,array{id:int,rowid:int,code:string,label:string,affect:int,delay:int,newbymonth:int}>		Return array with list of types
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
     *  @return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     *      Load this->nb for dashboard
     *
     *      @return     int         Return integer <0 if KO, >0 if OK
     */
    public function loadStateBoard()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @param	User	$user   		Object user
     *      @return WorkboardResponse|int 	Return integer <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user)
    {
    }
    /**
     *	Return clickable link of object (with eventually picto)
     *
     *	@param      string	    			$option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		?array{labeltype:string,selected?:int<0,1>,nbopenedday?:int}	$arraydata		Label of holiday type (if known)
     *  @return		string											HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
}