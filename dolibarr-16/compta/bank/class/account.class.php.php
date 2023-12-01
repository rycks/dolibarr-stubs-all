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
     * IBAN number (International Bank Account Number). Stored into iban_prefix field into database (TODO Rename field in database)
     * @var string
     */
    public $iban;
    /**
     * IBAN number
     *
     * @var string
     * @deprecated see $iban
     */
    public $iban_prefix;
    /**
     * Address of the bank
     * @var string
     */
    public $domiciliation;
    /**
     * XML SEPA format: place Payment Type Information (PmtTpInf) in Credit Transfer Transaction Information (CdtTrfTxInf)
     * @var int
     */
    public $pti_in_ctti = 0;
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
     * @var string	Label of journal
     */
    public $accountancy_journal;
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
     * Creditor Identifier CI. Some banks use different ICS for direct debit and bank tranfer
     * @var string
     */
    public $ics;
    /**
     * Creditor Identifier for Bank Transfer.
     * @var string
     */
    public $ics_transfer;
    /**
     *  'type' if the field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'enabled' is a condition when the field must be managed.
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommanded to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' is the CSS style to use on field. For example: 'maxwidth200'
     *  'help' is a string visible as a tooltip on field
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10), 'ref' => array('type' => 'varchar(12)', 'label' => 'Ref', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'showoncombobox' => 1, 'position' => 25), 'label' => array('type' => 'varchar(30)', 'label' => 'Label', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 30), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => 1, 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 35, 'index' => 1), 'bank' => array('type' => 'varchar(60)', 'label' => 'Bank', 'enabled' => 1, 'visible' => -1, 'position' => 40), 'code_banque' => array('type' => 'varchar(128)', 'label' => 'Code banque', 'enabled' => 1, 'visible' => -1, 'position' => 45), 'code_guichet' => array('type' => 'varchar(6)', 'label' => 'Code guichet', 'enabled' => 1, 'visible' => -1, 'position' => 50), 'number' => array('type' => 'varchar(255)', 'label' => 'Number', 'enabled' => 1, 'visible' => -1, 'position' => 55), 'cle_rib' => array('type' => 'varchar(5)', 'label' => 'Cle rib', 'enabled' => 1, 'visible' => -1, 'position' => 60), 'bic' => array('type' => 'varchar(11)', 'label' => 'Bic', 'enabled' => 1, 'visible' => -1, 'position' => 65), 'iban_prefix' => array('type' => 'varchar(34)', 'label' => 'Iban prefix', 'enabled' => 1, 'visible' => -1, 'position' => 70), 'country_iban' => array('type' => 'varchar(2)', 'label' => 'Country iban', 'enabled' => 1, 'visible' => -1, 'position' => 75), 'cle_iban' => array('type' => 'varchar(2)', 'label' => 'Cle iban', 'enabled' => 1, 'visible' => -1, 'position' => 80), 'domiciliation' => array('type' => 'varchar(255)', 'label' => 'Domiciliation', 'enabled' => 1, 'visible' => -1, 'position' => 85), 'state_id' => array('type' => 'integer', 'label' => 'State id', 'enabled' => 1, 'visible' => -1, 'position' => 90), 'fk_pays' => array('type' => 'integer', 'label' => 'Fk pays', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 95), 'proprio' => array('type' => 'varchar(60)', 'label' => 'Proprio', 'enabled' => 1, 'visible' => -1, 'position' => 100), 'owner_address' => array('type' => 'text', 'label' => 'Owner address', 'enabled' => 1, 'visible' => -1, 'position' => 105), 'courant' => array('type' => 'smallint(6)', 'label' => 'Courant', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 110), 'clos' => array('type' => 'smallint(6)', 'label' => 'Clos', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 115), 'rappro' => array('type' => 'smallint(6)', 'label' => 'Rappro', 'enabled' => 1, 'visible' => -1, 'position' => 120), 'url' => array('type' => 'varchar(128)', 'label' => 'Url', 'enabled' => 1, 'visible' => -1, 'position' => 125), 'account_number' => array('type' => 'varchar(32)', 'label' => 'Account number', 'enabled' => 1, 'visible' => -1, 'position' => 130), 'fk_accountancy_journal' => array('type' => 'integer', 'label' => 'Accountancy journal ID', 'enabled' => 1, 'visible' => -1, 'position' => 132), 'accountancy_journal' => array('type' => 'varchar(20)', 'label' => 'Accountancy journal', 'enabled' => 1, 'visible' => -1, 'position' => 135), 'currency_code' => array('type' => 'varchar(3)', 'label' => 'Currency code', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 140), 'min_allowed' => array('type' => 'integer', 'label' => 'Min allowed', 'enabled' => 1, 'visible' => -1, 'position' => 145), 'min_desired' => array('type' => 'integer', 'label' => 'Min desired', 'enabled' => 1, 'visible' => -1, 'position' => 150), 'comment' => array('type' => 'text', 'label' => 'Comment', 'enabled' => 1, 'visible' => -1, 'position' => 155), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 156), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 157), 'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Fk user author', 'enabled' => 1, 'visible' => -1, 'position' => 160), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 165), 'note_public' => array('type' => 'text', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 170), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 175), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 180), 'extraparams' => array('type' => 'varchar(255)', 'label' => 'Extraparams', 'enabled' => 1, 'visible' => -1, 'position' => 185));
    // END MODULEBUILDER PROPERTIES
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
     *      @param	int		$line_id    Id of bank entry
     *      @param  int		$url_id     Id of object related to link
     *      @param  string	$url        Url (deprecated, we use now 'url_id' and 'type' instead)
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
     *  @param	string		$oper			'VIR','PRE','LIQ','VAD','CB','CHQ'...
     *  @param	string		$label			Descripton
     *  @param	float		$amount			Amount
     *  @param	string		$num_chq		Numero cheque or transfer
     *  @param	int  		$categorie		Category id (optionnal)
     *  @param	User		$user			User that create
     *  @param	string		$emetteur		Name of cheque writer
     *  @param	string		$banque			Bank of cheque writer
     *  @param	string		$accountancycode	When we record a free bank entry, we must provide accounting account if accountancy module is on.
     *  @param	int			$datev			Date value
     *  @param  string      $num_releve     Label of bank receipt for reconciliation
     *  @param	float		$amount_main_currency	Amount
     *  @return	int							Rowid of added entry, <0 if KO
     */
    public function addline($date, $oper, $label, $amount, $num_chq, $categorie, \User $user, $emetteur = '', $banque = '', $accountancycode = '', $datev = \null, $num_releve = '', $amount_main_currency = \null)
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
     *  @param	 int		$status        	Id status
     *  @param   int		$mode			0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=Long label + picto
     *  @return  string        			    Label
     */
    public function LibStatut($status, $mode = 0)
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
     *	@param	int		$date_end	Date until we want to get bank account sold
     *	@param	string	$field		dateo or datev
     *	@return	int		current sold (value date <= today)
     */
    public function solde($option = 0, $date_end = '', $field = 'dateo')
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
    public function countAccountToReconcile()
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
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param DoliDB 	$dbs 			Database handler
     * @param int 		$origin_id 		Old thirdparty id
     * @param int 		$dest_id 		New thirdparty id
     * @return bool						True=SQL success, False=SQL error
     */
    public static function replaceThirdparty($dbs, $origin_id, $dest_id)
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
    public $picto = 'accountline';
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
    /* Amount of payment in the bank account currency */
    public $amount_main_currency;
    /* Amount in the currency of company if bank account use another currency */
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
    /**
     * @var int ID of cheque receipt
     */
    public $fk_bordereau;
    /**
     * @var int ID of bank account
     */
    public $fk_account;
    /**
     * @var string		Ref of bank account
     */
    public $bank_account_ref;
    /**
     * @var string		Label of bank account
     */
    public $bank_account_label;
    /**
     * @var string		Bank account numero
     */
    public $numero_compte;
    /**
     * @var string		Name of check issuer
     */
    public $emetteur;
    public $rappro;
    // Is it conciliated
    public $num_releve;
    // If conciliated, what is bank statement
    public $num_chq;
    // Num of cheque
    public $bank_chq;
    // Bank of cheque
    /**
     * @var string bank transaction lines label
     */
    public $label;
    public $note;
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
     *      Delete bank transaction record
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
     *    	Return clickable name (with picto eventually)
     *
     *		@param	int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     *		@param	int		$maxlen			Longueur max libelle
     *		@param	string	$option			Option ('', 'showall', 'showconciliated', 'showconciliatedandaccounted'). Options may be slow.
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
     *  @param	int		$status         Id statut
     *  @param	int		$mode           0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return	string          		Libelle du statut
     */
    public function LibStatut($status, $mode = 0)
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