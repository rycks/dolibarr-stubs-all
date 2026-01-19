<?php

/**
 *	Class to manage bank accounts
 */
class Account extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'bank_account';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'bank_account';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'account';
    /**
     * @var	int		Use id instead of rowid
     * @deprecated
     * @see $id
     */
    public $rowid;
    /**
     * Account Label
     * @var string
     */
    public $label;
    /**
     * Bank account type. Check TYPE_ constants
     * @var int
     */
    public $courant;
    /**
     * Bank account type. Check TYPE_ constants
     * @var int
     */
    public $type;
    /**
     * Bank name
     * @var string
     */
    public $bank;
    /**
     * Status
     * @var int
     */
    public $clos = self::STATUS_OPEN;
    /**
     * Does it need to be conciliated?
     * @var int
     */
    public $rappro = 1;
    /**
     * Webpage
     * @var string
     */
    public $url;
    /**
     * Bank number. If in SEPA area, you should move to IBAN field
     * @var string
     */
    public $code_banque;
    /**
     * Branch number. If in SEPA area, you should move to IBAN field
     * @var string
     */
    public $code_guichet;
    /**
     * Account number. If in SEPA area, you should move to IBAN field
     * @var string
     */
    public $number;
    /**
     * Bank account number control digit. If in SEPA area, you should move to IBAN field
     * @var string
     */
    public $cle_rib;
    /**
     * BIC/Swift code
     * @var string
     */
    public $bic;
    /**
     * IBAN number (International Bank Account Number). Stored into iban_prefix field into database
     * @var
     */
    public $iban;
    /**
     * Name of account holder
     * @var string
     */
    public $proprio;
    /**
     * Address of account holder
     * @var string
     */
    public $owner_address;
    public $state_id;
    public $state_code;
    public $state;
    /**
     * Variable containing all account types with their respective translated label.
     * Defined in __construct
     * @var array
     */
    public $type_lib = array();
    /**
     * Variable containing all account statuses with their respective translated label.
     * Defined in __construct
     * @var array
     */
    public $status = array();
    /**
     * Accountancy code
     * @var string
     */
    public $account_number;
    /**
     * @var int ID
     */
    public $fk_accountancy_journal;
    /**
     * Currency code
     * @var string
     */
    public $currency_code;
    /**
     * Currency code
     * @var string
     * @deprecated Use currency_code instead
     */
    public $account_currency_code;
    /**
     * Authorized minimum balance
     * @var float
     */
    public $min_allowed;
    /**
     * Desired minimum balance
     * @var float
     */
    public $min_desired;
    /**
     * Notes
     * @var string
     */
    public $comment;
    /**
     * Date of the initial balance. Used in Account::create
     * @var int
     */
    public $date_solde;
    /**
     * Current account
     */
    const TYPE_CURRENT = 1;
    /**
     * Cash account
     */
    const TYPE_CASH = 2;
    /**
     * Savings account
     */
    const TYPE_SAVINGS = 0;
    const STATUS_OPEN = 0;
    const STATUS_CLOSED = 1;
    /**
     *  Constructor
     *
     *  @param	DoliDB		$db		Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Shows the account number in the appropriate format
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     *  Return if a bank account need to be conciliated
     *
     *  @return     int         1 if need to be concialiated, < 0 otherwise.
     */
    public function canBeConciliated()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Add a link between bank line record and its source
     *
     *      @param	int		$line_id    Id ecriture bancaire
     *      @param  int		$url_id     Id parametre url
     *      @param  string	$url        Url
     *      @param  string	$label      Link label
     *      @param  string	$type       Type of link ('payment', 'company', 'member', ...)
     *      @return int         		<0 if KO, id line if OK
     */
    public function add_url_line($line_id, $url_id, $url, $label, $type)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 		TODO Move this into AccountLine
     *      Return array with links from llx_bank_url
     *
     *      @param  int         $fk_bank    To search using bank transaction id
     *      @param  int         $url_id     To search using link to
     *      @param  string      $type       To search using type
     *      @return array|int               Array of links array('url'=>, 'url_id'=>, 'label'=>, 'type'=> 'fk_bank'=> ) or -1 on error
     */
    public function get_url($fk_bank = '', $url_id = '', $type = '')
    {
    }
    /**
     *  Add an entry into table ".MAIN_DB_PREFIX."bank
     *
     *  @param	int	        $date			Date operation
     *  @param	string		$oper			1,2,3,4... (deprecated) or 'TYP','VIR','PRE','LIQ','VAD','CB','CHQ'...
     *  @param	string		$label			Descripton
     *  @param	float		$amount			Amount
     *  @param	string		$num_chq		Numero cheque ou virement
     *  @param	int  		$categorie		Category id (optionnal)
     *  @param	User		$user			User that create
     *  @param	string		$emetteur		Name of cheque writer
     *  @param	string		$banque			Bank of cheque writer
     *  @param	string		$accountancycode	When we record a free bank entry, we must provide accounting account if accountancy module is on.
     *  @param	int			$datev			Date value
     *  @return	int							Rowid of added entry, <0 if KO
     */
    public function addline($date, $oper, $label, $amount, $num_chq, $categorie, \User $user, $emetteur = '', $banque = '', $accountancycode = '', $datev = \null)
    {
    }
    /**
     *  Create bank account into database
     *
     *  @param	User	$user		Object user making creation
     *  @param  int     $notrigger  1=Disable triggers
     *  @return int        			< 0 if KO, > 0 if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     *    	Update bank account card
     *
     *    	@param	User	$user       Object user making action
     *      @param  int     $notrigger  1=Disable triggers
     *		@return	int					<0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update BBAN (RIB) account fields
     *
     *  @param	User	$user       Object user making update
     *	@return	int					<0 if KO, >0 if OK
     */
    public function update_bban(\User $user = \null)
    {
    }
    /**
     *      Load a bank account into memory from database
     *
     *      @param	int		$id      	Id of bank account to get
     *      @param  string	$ref     	Ref of bank account to get
     *      @return	int					<0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '')
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
     *  Delete bank account from database
     *
     *	@param	User	$user	User deleting
     *  @return int             <0 if KO, >0 if OK
     */
    public function delete(\User $user = \null)
    {
    }
    /**
     *  Return label of object status
     *
     *  @param      int		$mode			0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=Long label + picto
     *  @return     string        		    Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of given object status
     *
     *  @param	 int		$statut        	Id statut
     *  @param   int		$mode			0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=Long label + picto
     *  @return  string        			    Label
     */
    public function LibStatut($statut, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Renvoi si un compte peut etre supprimer ou non (sans mouvements)
     *
     *    @return     boolean     vrai si peut etre supprime, faux sinon
     */
    public function can_be_deleted()
    {
    }
    /**
     *   Return error
     *
     *   @return	string		Error string
     */
    public function error()
    {
    }
    /**
     * 	Return current sold
     *
     * 	@param	int		$option		1=Exclude future operation date (this is to exclude input made in advance and have real account sold)
     *	@return	int					Current sold (value date <= today)
     */
    public function solde($option = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @param	User	$user        		Objet user
     *		@param	int		$filteraccountid	To get info for a particular account id
     *      @return WorkboardResponse|int 		<0 if KO, WorkboardResponse if OK
     */
    public function load_board(\User $user, $filteraccountid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Charge indicateurs this->nb de tableau de bord
     *		@param		int			$filteraccountid	To get info for a particular account id
     *      @return     int         <0 if ko, >0 if ok
     */
    public function load_state_board($filteraccountid = 0)
    {
    }
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @return int     Nb of account we can reconciliate
     */
    public static function countAccountToReconcile()
    {
    }
    /**
     *  Return clicable name (with picto eventually)
     *
     *	@param	int		$withpicto					Include picto into link
     *  @param  string	$mode           			''=Link to card, 'transactions'=Link to transactions card
     *  @param  string  $option         			''=Show ref, 'reflabel'=Show ref+label
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param	int  	$notooltip		 			1=Disable tooltip
     *	@return	string								Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $mode = '', $option = '', $save_lastsearch_value = -1, $notooltip = 0)
    {
    }
    // Method after here are common to Account and CompanyBankAccount
    /**
     *     Return if an account has valid information for Direct debit payment
     *
     *     @return     int         1 if correct, <=0 if wrong
     */
    public function verif()
    {
    }
    /**
     * 	Return account country code
     *
     *	@return		string		country code
     */
    public function getCountryCode()
    {
    }
    /**
     * Return if a bank account is defined with detailed information (bank code, desk code, number and key).
     * More information on codes used by countries on page http://en.wikipedia.org/wiki/Bank_code
     *
     * @return		int        0=No bank code need + Account number is enough
     *                         1=Need 2 fields for bank code: Bank, Desk (France, Spain, ...) + Account number and key
     *                         2=Need 1 field for bank code:  Bank only (Sort code for Great Britain, BSB for Australia) + Account number
     */
    public function useDetailedBBAN()
    {
    }
    /**
     * Return 1 if IBAN / BIC is mandatory (otherwise option)
     *
     * @return		int        1 = mandatory / 0 = Not mandatory
     */
    public function needIBAN()
    {
    }
    /**
     *	Load miscellaneous information for tab "Info"
     *
     *	@param  int		$id		Id of object to load
     *	@return	void
     */
    public function info($id)
    {
    }
    /**
     * Returns the fields in order that this bank account should show to the user
     * Will return an array with the following values:
     * - BankAccountNumber
     * - BankCode
     * - BankAccountNumberKey
     * - DeskCode
     *
     * Some countries show less or more bank account properties to the user
     *
     * @param  int     $includeibanbic         1=Return also key for IBAN and BIC
     * @return array                           Array of fields to show
     * @see useDetailedBBAN()
     */
    public function getFieldsToShow($includeibanbic = 0)
    {
    }
    /**
     * Returns the components of the bank account in order.
     * Will return an array with the following values:
     * - BankAccountNumber
     * - BankCode
     * - BankAccountNumberKey
     * - DeskCode
     *
     * @return array
     */
    public static function getAccountNumberOrder()
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
}
/**
 *	Class to manage bank transaction lines
 */
class AccountLine extends \CommonObject
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string ID to identify managed object
     */
    public $element = 'bank';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'bank';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'generic';
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string Ref
     */
    public $ref;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * Date (dateo)
     *
     * @var integer
     */
    public $dateo;
    /**
     * Date value (datev)
     *
     * @var integer
     */
    public $datev;
    public $amount;
    /**
     * @var string bank transaction lines label
     */
    public $label;
    public $note;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var int ID
     */
    public $fk_user_rappro;
    /**
     * @var int ID
     */
    public $fk_type;
    public $rappro;
    // Is it conciliated
    public $num_releve;
    // If conciliated, what is bank statement
    public $num_chq;
    // Num of cheque
    public $bank_chq;
    // Bank of cheque
    /**
     * @var int ID of cheque receipt
     */
    public $fk_bordereau;
    /**
     * @var int ID of bank account
     */
    public $fk_account;
    public $bank_account_label;
    // Label of bank account
    /**
     * Issuer
     * @var Societe
     */
    public $emetteur;
    /**
     *  Constructor
     *
     *  @param	DoliDB	$db		Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     *  Load into memory content of a bank transaction line
     *
     *  @param		int		$rowid   	Id of bank transaction to load
     *  @param      string	$ref     	Ref of bank transaction to load
     *  @param      string	$num     	External num to load (ex: num of transaction for paypal fee)
     *	@return		int					<0 if KO, 0 if OK but not found, >0 if OK and found
     */
    public function fetch($rowid, $ref = '', $num = '')
    {
    }
    /**
     * Inserts a transaction to a bank account
     *
     * @return int <0 if KO, rowid of the line if OK
     */
    public function insert()
    {
    }
    /**
     *      Delete transaction bank line record
     *
     *		@param	User	$user	User object that delete
     *      @return	int 			<0 if KO, >0 if OK
     */
    public function delete(\User $user = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Delete bank line records
     *
     *		@param	User	$user	User object that delete
     *      @return	int 			<0 if KO, >0 if OK
     */
    public function delete_urls(\User $user = \null)
    {
    }
    /**
     *		Update bank account record in database
     *
     *		@param	User	$user			Object user making update
     *		@param 	int		$notrigger		0=Disable all triggers
     *		@return	int						<0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update conciliation field
     *
     *	@param	User	$user			Objet user making update
     *	@param 	int		$cat			Category id
     *	@param	int		$conciliated	1=Set transaction to conciliated, 0=Keep transaction non conciliated
     *	@return	int						<0 if KO, >0 if OK
     */
    public function update_conciliation(\User $user, $cat, $conciliated = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Increase/decrease value date of a rowid
     *
     *	@param	int		$rowid		Id of line
     *	@param	int		$sign		1 or -1
     *	@return	int					>0 if OK, 0 if KO
     */
    public function datev_change($rowid, $sign = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Increase value date of a rowid
     *
     *	@param	int		$id		Id of line to change
     *	@return	int				>0 if OK, 0 if KO
     */
    public function datev_next($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Decrease value date of a rowid
     *
     *	@param	int		$id		Id of line to change
     *	@return	int				>0 if OK, 0 if KO
     */
    public function datev_previous($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Increase/decrease operation date of a rowid
     *
     *	@param	int		$rowid		Id of line
     *	@param	int		$sign		1 or -1
     *	@return	int					>0 if OK, 0 if KO
     */
    public function dateo_change($rowid, $sign = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Increase operation date of a rowid
     *
     *	@param	int		$id		Id of line to change
     *	@return	int				>0 if OK, 0 if KO
     */
    public function dateo_next($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Decrease operation date of a rowid
     *
     *	@param	int		$id		Id of line to change
     *	@return	int				>0 if OK, 0 if KO
     */
    public function dateo_previous($id)
    {
    }
    /**
     *	Load miscellaneous information for tab "Info"
     *
     *	@param  int		$id		Id of object to load
     *	@return	void
     */
    public function info($id)
    {
    }
    /**
     *    	Return clicable name (with picto eventually)
     *
     *		@param	int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     *		@param	int		$maxlen			Longueur max libelle
     *		@param	string	$option			Option ('showall')
     * 		@param	int     $notooltip		1=Disable tooltip
     *		@return	string					Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $maxlen = 0, $option = '', $notooltip = 0)
    {
    }
    /**
     *    Return label of status (activity, closed)
     *
     *    @param	int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long
     *    @return   string        		Libelle
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi le libelle d'un statut donne
     *
     *  @param	int		$statut         Id statut
     *  @param	int		$mode           0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return	string          		Libelle du statut
     */
    public function LibStatut($statut, $mode = 0)
    {
    }
    /**
     *	Return if a bank line was dispatched into bookkeeping
     *
     *	@return     int         <0 if KO, 0=no, 1=yes
     */
    public function getVentilExportCompta()
    {
    }
}