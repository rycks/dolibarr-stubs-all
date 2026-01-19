<?php

/**
 * Class to manage Ledger (General Ledger and Subledger)
 */
class BookKeeping extends \CommonObject
{
    /**
     * @var string 	Id to identify managed objects
     */
    public $element = 'accountingbookkeeping';
    /**
     * @var string 	Name of table without prefix where object is stored
     */
    public $table_element = 'accounting_bookkeeping';
    /**
     * @var int 	Entity
     */
    public $entity;
    /**
     * @var BookKeepingLine[] Lines
     */
    public $lines = array();
    /**
     * @var int 	ID
     */
    public $id;
    /**
     * @var int		Date of source document, in db date NOT NULL
     */
    public $doc_date;
    /**
     * @var int|null|'' 	Deadline for payment
     */
    public $date_lim_reglement;
    /**
     * @var string 	Doc type
     */
    public $doc_type;
    /**
     * @var string 	Doc ref
     */
    public $doc_ref;
    /**
     * @var int 	ID
     */
    public $fk_doc;
    /**
     * @var int 	ID
     */
    public $fk_docdet;
    /**
     * @var string 	Thirdparty code
     */
    public $thirdparty_code;
    /**
     * @var string|null 	Subledger account
     */
    public $subledger_account;
    /**
     * @var string|null 	Subledger label
     */
    public $subledger_label;
    /**
     * @var string  doc_type
     */
    public $numero_compte;
    /**
     * @var string label compte
     */
    public $label_compte;
    /**
     * @var string label operation
     */
    public $label_operation;
    /**
     * @var float FEC:Debit
     */
    public $debit;
    /**
     * @var float FEC:Credit
     */
    public $credit;
    /**
     * @var float FEC:Amount (Not necessary)
     * @deprecated No more used (we have info into debit/credit and sens)
     */
    public $montant;
    /**
     * @var float FEC:Amount (Not necessary)
     * @deprecated No more used (we have info into debit/credit and sens)
     */
    public $amount;
    /**
     * @var string FEC:Sens (Not necessary)
     */
    public $sens;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var string key for import
     */
    public $import_key;
    /**
     * @var string code journal
     */
    public $code_journal;
    /**
     * @var string label journal
     */
    public $journal_label;
    /**
     * @var int accounting transaction id
     */
    public $piece_num;
    /**
     * @var string accounting transaction dolibarr ref
     */
    public $ref;
    /**
     * @var BookKeepingLine[] Movement line array
     */
    public $linesmvt = array();
    /**
     * @var BookKeepingLine[] export line array
     */
    public $linesexport = array();
    /**
     * @var int|string date of movement who are noticed like exported
     */
    public $date_export;
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'generic';
    /**
     * @var string[]	SQL filter used for check if the bookkeeping record can be created/inserted/modified/deleted (cached)
     */
    public static $can_modify_bookkeeping_sql_cached;
    /**
     * @var string[]	Array of warnings
     */
    public $warnings = array();
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param  User	$user		User that creates
     * @param  int	$notrigger	false=launch triggers after, true=disable triggers
     * @return int				Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Create a line in database from values as parameters
     *
     * 	@param		int 			$doc_date				Date of source document, in db date NOT NULL
     * 	@param		string 			$doc_ref				Doc ref
     * 	@param 		string 			$doc_type				Doc type
     * 	@param 		int 			$fk_doc					Doc id
     * 	@param 		int 			$fk_docdet				Doc line id
     * 	@param 		string 			$numero_compte			Account number
     * 	@param 		string 			$label_compte			Account label
     * 	@param 		string 			$label_operation		Operation label
     * 	@param 		double 			$amount					Amount
     * 	@param 		string 			$code_journal			Journal code
     * 	@param 		string 			$journal_label			Journal label
     * 	@param 		string 			$subledger_account		Sub ledger account
     * 	@return		int				Return integer <0 if KO, O nothing done, created object id if OK
     */
    public function createFromValues($doc_date, $doc_ref, $doc_type, $fk_doc, $fk_docdet, $numero_compte, $label_compte, $label_operation, $amount, $code_journal, $journal_label, $subledger_account)
    {
    }
    /**
     *  Return a link to the object card (with optionally the picto)
     *
     *	@param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option						On what the link point to ('nolink', ...)
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     * Create object into database
     *
     * @param  User		$user	   	User that creates
     * @param  int		$notrigger  false=launch triggers after, true=disable triggers
     * @param  string  	$mode 	   	Mode
     * @return int				 	Return integer <0 if KO, Id of created object if OK
     */
    public function createStd(\User $user, $notrigger = 0, $mode = '')
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int 			$id 	Id object
     * @param string|null	$ref 	Ref
     * @param string 		$mode 	Mode ('' or 'tmp_')
     * @return int 					Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null, $mode = '')
    {
    }
    /**
     * Load object in memory from the database in ->lines. Or just make a simple count if $countonly=1.
     *
     * @param 	string 	$sortorder 		Sort Order
     * @param 	string 	$sortfield 		Sort field
     * @param 	int 	$limit 			limit
     * @param 	int 	$offset 		offset limit
     * @param 	array<string,string> 	$filter 		filter array
     * @param 	string 	$filtermode 	filter mode (AND or OR)
     * @param 	int 	$option 		option (0: general account or 1: subaccount)
     * @param	int		$countonly		Do not fill the $object->lines, return only the count.
     * @return 	int 					Return integer <0 if KO, Number of lines if OK
     */
    public function fetchAllByAccount($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, array $filter = array(), $filtermode = 'AND', $option = 0, $countonly = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param string 		$sortorder                      Sort Order
     * @param string 		$sortfield                      Sort field
     * @param int 			$limit                          Limit
     * @param int 			$offset                         Offset limit
     * @param string|array<string,string> 	$filter			Filter array
     * @param string 		$filtermode                     Filter mode (AND or OR)
     * @param int           $showAlreadyExportMovements     Show movements when field 'date_export' is not empty (0:No / 1:Yes (Default))
     * @return int                                          Return integer <0 if KO, >0 if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = '', $filtermode = 'AND', $showAlreadyExportMovements = 1)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param 	string 			$sortorder 		Sort Order
     * @param 	string 			$sortfield 		Sort field
     * @param 	int 			$limit 			Limit
     * @param 	int 			$offset 		Offset limit
     * @param 	string|array<string,string> $filter 	Filter
     * @param 	string 			$filtermode 	Filter mode (AND or OR)
     * @param 	int<0,1> 		$option 		option (0: aggregate by general account or 1: aggregate by subaccount)
     * @return 	int 							Return integer <0 if KO, >0 if OK
     */
    public function fetchAllBalance($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = '', $filtermode = 'AND', $option = 0)
    {
    }
    /**
     * Update object into database
     *
     * @param  User    	$user       User that modifies
     * @param  int		$notrigger  false=launch triggers after, true=disable triggers
     * @param  string  	$mode       Mode ('' or _tmp')
     * @return int                 	Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0, $mode = '')
    {
    }
    /**
     * Update accounting movement
     *
     * @param  string  $piece_num      Piece num
     * @param  string  $field          Field
     * @param  string  $value          Value
     * @param  string  $mode           Mode ('' or _tmp')
     * @return int                     Return integer <0 if KO, >0 if OK
     */
    public function updateByMvt($piece_num = '', $field = '', $value = '', $mode = '')
    {
    }
    /**
     * Delete object in database
     *
     * @param User 		$user 		User that deletes
     * @param int 		$notrigger 	0=launch triggers after, 1=disable triggers
     * @param string 	$mode 		Mode ('' or 'tmp_')
     * @return int 					Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0, $mode = '')
    {
    }
    /**
     * Delete bookkeeping by importkey
     *
     * @param  string		$importkey		Import key
     * @param string $mode Mode
     * @return int Result
     */
    public function deleteByImportkey($importkey, $mode = '')
    {
    }
    /**
     * Delete bookkeeping by year
     *
     * @param  int	  $delyear		Year to delete
     * @param  string $journal		Journal to delete
     * @param  string $mode 		Mode
     * @param  int	  $delmonth     Month
     * @return int					Return integer <0 if KO, >0 if OK
     */
    public function deleteByYearAndJournal($delyear = 0, $journal = '', $mode = '', $delmonth = 0)
    {
    }
    /**
     * Delete bookkeeping by piece number
     *
     * @param 	int 	$piecenum 	Piecenum to delete
     * @param 	string 	$mode 		Mode ('' or '_tmp')
     * @param	int		$notrigger	0=launch triggers after, 1=disable triggers
     * @return 	int 				Nb of record deleted
     */
    public function deleteMvtNum($piecenum, $mode = '', $notrigger = 0)
    {
    }
    /**
     * Load an object from its id and create a new one in database
     *
     * @param	User	$user		User making the clone
     * @param   int     $fromid     Id of object to clone
     * @return  int                 New id of clone
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     * Initialise object with example values
     * Id must be 0 if object instance is a specimen
     *
     * @return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     * Load an accounting document into memory from database
     *
     * @param int $piecenum Accounting document to get
     * @param string $mode Mode
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function fetchPerMvt($piecenum, $mode = '')
    {
    }
    /**
     * Return next bookkeeping piece number
     *
     * @param	string	$mode		Mode
     * @return	int<1, max>|-1		Return next movement number or -1 if error
     */
    public function getNextNumMvt($mode = '')
    {
    }
    /**
     *  Returns the reference to the following non used Bookkeeping depending on the active numbering module
     *  defined into BOOKKEEPING_ADDON
     *
     *  @return string      		Bookkeeping next reference
     */
    public function getNextNumRef()
    {
    }
    /**
     * Load all accounting lines related to a given transaction ID $piecenum
     *
     * @param  int     $piecenum   Id of line to get
     * @param  string  $mode       Mode ('' or '_tmp')
     * @return int                 Return integer <0 if KO, >0 if OK
     */
    public function fetchAllPerMvt($piecenum, $mode = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Export bookkeeping
     *
     * @param	string	$model	Model
     * @return	int				Result
     */
    public function export_bookkeeping($model = 'ebp')
    {
    }
    /**
     * Transform transaction
     *
     * @param  int      $direction      If 0: tmp => real, if 1: real => tmp
     * @param  string   $piece_num      Piece num = Transaction ref
     * @return int                      int Return integer <0 if KO, >0 if OK
     */
    public function transformTransaction($direction = 0, $piece_num = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of accounts with label by chart of accounts
     *
     * @param string     $selectid   Preselected chart of accounts
     * @param string     $htmlname	Name of field in html form
     * @param int<0,1>		$showempty	Add an empty field
     * @param array<array{method:string,url:string,htmlname:string,params:array<string,string>}>	$event		Event options
     * @param int		$select_in	Value is a aa.rowid (0 default) or aa.account_number (1)
     * @param int		$select_out	Set value returned by select 0=rowid (default), 1=account_number
     * @param string	$aabase		Set accounting_account base class to display empty=all or from 1 to 8 will display only account starting from this number
     * @return string|int	String with HTML select or -1 if KO
     */
    public function select_account($selectid, $htmlname = 'account', $showempty = 0, $event = array(), $select_in = 0, $select_out = 0, $aabase = '')
    {
    }
    /**
     * Return id and description of a root accounting account.
     * FIXME: This function takes the parent of parent to get the root account !
     *
     * @param 	string 	$account	Accounting account
     * @return  array{id:int,account_number:string,label:string}|int<-1,-1>	Array with root account information (max 2 upper level), <0 if KO
     */
    public function getRootAccount($account = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Description of accounting account
     *
     * @param	string	$account	Accounting account
     * @return	string|int				Account desc or -1 if KO
     */
    public function get_compte_desc($account = \null)
    {
    }
    /**
     * Get SQL string for check if the bookkeeping can be modified or deleted ? (cached)
     *
     * @param 	string		$alias		Bookkeeping alias table
     * @param 	bool		$force		Force reload
     * @return 	string|null				SQL filter or null if error
     */
    public function getCanModifyBookkeepingSQL($alias = '', $force = \false)
    {
    }
    /**
     * Is the bookkeeping can be modified or deleted ?
     *
     * @param 	int		$id		Bookkeeping ID
     * @param 	string 	$mode 	Mode ('' or 'tmp_')
     * @return 	int				Return integer <0 if KO, == 0 if No, == 1 if Yes
     */
    public function canModifyBookkeeping($id, $mode = '')
    {
    }
    /**
     * Generate label operation when operation is transferred into accounting according to ACCOUNTING_LABEL_OPERATION_ON_TRANSFER
     * If ACCOUNTING_LABEL_OPERATION_ON_TRANSFER is 0, we concat thirdparty name, ref and label.
     * If ACCOUNTING_LABEL_OPERATION_ON_TRANSFER is 1, we concat thirdparty name, ref.
     * If ACCOUNTING_LABEL_OPERATION_ON_TRANSFER is 2, we return just thirdparty name
     *
     * @param 	string  $thirdpartyname         Thirdparty name
     * @param 	string  $reference              Reference of the element
     * @param 	string  $labelaccount           Label of the accounting account
     * @param	int<0,1> $full					0=Default, 1=Keep label intact (no trunc so HTML content is not corrupted)
     * @return	string                          Label of the operation
     */
    public function accountingLabelForOperation($thirdpartyname, $reference, $labelaccount, $full = 0)
    {
    }
    /**
     * Is the bookkeeping date valid (on an open period or not on a closed period) ?
     *
     * @param 	int		$date		Bookkeeping date
     * @return 	int					Return integer <0 if KO, == 0 if No, == 1 if date is valid for a transfer
     */
    public function validBookkeepingDate($date)
    {
    }
    /**
     * Load list of active fiscal period
     *
     * @param 	bool	$force		Force reload
     * @param	string	$mode		active or closed ?
     * @return 	int					Return integer <0 if KO, >0 if OK
     */
    public function loadFiscalPeriods($force = \false, $mode = 'active')
    {
    }
    /**
     * Get list of fiscal period ordered by start date.
     *
     * @return 	array<array{id:int,label:string,date_start:string,date_end:string,status:int}>|int			Return integer <0 if KO, Fiscal periods : [[id, date_start, date_end, label], ...]
     */
    public function getFiscalPeriods()
    {
    }
    /**
     * Get list of count by month into the fiscal period.
     * This function can be called by step 1 of closure process.
     *
     * @param 	int			$date_start		Date start
     * @param 	int			$date_end		Date end
     * @return	array{total:int,list:array<array{year:int,count:array<int<1,12>,int>,total:int}>}|int<-1,-1>		Return integer <0 if KO, Fiscal periods : [[id, date_start, date_end, label], ...]
     */
    public function getCountByMonthForFiscalPeriod($date_start, $date_end)
    {
    }
    /**
     *  Validate all movement between the specified dates
     *
     * @param 	int		$date_start		Date start
     * @param 	int		$date_end		Date end
     * @return	int						int Return integer <0 if KO, >0 if OK
     */
    public function validateMovementForFiscalPeriod($date_start, $date_end)
    {
    }
    /**
     *  Define accounting result
     *
     * @param	int		$date_start		Date start
     * @param	int		$date_end		Date end
     * @return	string					Accounting result
     */
    public function accountingResult($date_start, $date_end)
    {
    }
    /**
     *  Close fiscal period
     *
     * @param 	int		$fiscal_period_id				Fiscal year ID
     * @param 	int		$new_fiscal_period_id			New fiscal year ID
     * @param	bool	$separate_auxiliary_account		Separate auxiliary account
     * @param 	bool	$generate_bookkeeping_records	Generate closure bookkeeping records
     * @return	int										int Return integer <0 if KO, >0 if OK
     */
    public function closeFiscalPeriod($fiscal_period_id, $new_fiscal_period_id, $separate_auxiliary_account = \false, $generate_bookkeeping_records = \true)
    {
    }
    /**
     *  Insert accounting reversal into the inventory journal of the new fiscal period
     *
     * @param 	int		$fiscal_period_id		Fiscal year ID
     * @param 	int		$inventory_journal_id	Inventory journal ID
     * @param 	int		$new_fiscal_period_id	New fiscal year ID
     * @param 	int		$date_start				Date start
     * @param 	int		$date_end				Date end
     * @return	int								int Return integer <0 if KO, >0 if OK
     */
    public function insertAccountingReversal($fiscal_period_id, $inventory_journal_id, $new_fiscal_period_id, $date_start, $date_end)
    {
    }
    /**
     *  Mass account assignment
     *
     * @param 	int[]		$toselect				Array of BookkeepingId
     * @param 	int			$accounting_account		ID of accounting account define for mass action
     * @return	int						int Return integer -1 if KO, 1 if OK
     */
    public function assignAccountMass($toselect, $accounting_account = 0)
    {
    }
    /**
     * Clone accounting entry
     *
     * @param	string	$piecenum		Piece number to clone
     * @param	string	$code_journal	Accounting journal code
     * @param	int		$docdate		Date of the document
     * @return	int						int Return integer -1 if KO, 1 if OK
     */
    public function newClone($piecenum, $code_journal, $docdate)
    {
    }
    /**
     *  Mass clone
     *
     * @param 	int[]		$toselect		array of BookkeepingId
     * @param	string		$code_journal	Accounting journal code
     * @param	int			$docdate		Date of the document
     * @return	int							Return integer -1 if KO, 1 if OK
     */
    public function newCloneMass($toselect, $code_journal, $docdate)
    {
    }
    /**
     * Mass ReturnAccount
     *
     * @param 	int[]		$toselect		BookkeepingId
     * @param	string		$code_journal	Accounting journal code
     * @param	int			$docdate		Date of the document
     * @return	int							int Return integer -1 if KO, 1 if OK
     *
     */
    public function newReturnAccount(array $toselect, $code_journal, $docdate)
    {
    }
}
/**
 * Class BookKeepingLine
 */
class BookKeepingLine extends \CommonObjectLine
{
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var ?int	Date of source document
     */
    public $doc_date = \null;
    /**
     * @var string 	Doc type
     */
    public $doc_type;
    /**
     * @var string 	Doc ref
     */
    public $doc_ref;
    /**
     * @var int ID
     */
    public $fk_doc;
    /**
     * @var int ID
     */
    public $fk_docdet;
    /**
     * @var string 	Thirdparty code
     */
    public $thirdparty_code;
    /**
     * @var string|null 	Subledger account
     */
    public $subledger_account;
    /**
     * @var string|null 	Subledger label
     */
    public $subledger_label;
    /**
     * @var string  doc_type
     */
    public $numero_compte;
    /**
     * @var string label compte
     */
    public $label_compte;
    /**
     * @var string label operation
     */
    public $label_operation;
    /**
     * @var float FEC:Debit
     */
    public $debit;
    /**
     * @var float FEC:Credit
     */
    public $credit;
    /**
     * @var float Amount
     * @deprecated see $amount
     */
    public $montant;
    /**
     * @var float 	Amount
     */
    public $amount;
    /**
     * @var float 	Multicurrency amount
     */
    public $multicurrency_amount;
    /**
     * @var string 	Multicurrency code
     */
    public $multicurrency_code;
    /**
     * @var string Sens
     */
    public $sens;
    /**
     * @var ?string
     */
    public $lettering_code;
    /**
     * @var string
     */
    public $date_lettering;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var string key for import
     */
    public $import_key;
    /**
     * @var string
     */
    public $code_journal;
    /**
     * @var string
     */
    public $journal_label;
    /**
     * @var int accounting transaction id
     */
    public $piece_num;
    /**
     * @var int|string
     */
    public $date_export;
    /**
     * @var int|string
     */
    public $date_lim_reglement;
    /**
     * @var string
     */
    public $code_tiers;
}