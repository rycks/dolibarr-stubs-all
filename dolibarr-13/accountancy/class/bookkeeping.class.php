<?php

/**
 * Class to manage Ledger (General Ledger and Subledger)
 */
class BookKeeping extends \CommonObject
{
    /**
     * @var string Id to identify managed objects
     */
    public $element = 'accountingbookkeeping';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'accounting_bookkeeping';
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * @var BookKeepingLine[] Lines
     */
    public $lines = array();
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string Date of source document, in db date NOT NULL
     */
    public $doc_date;
    /**
     * @var int Deadline for payment
     */
    public $date_lim_reglement;
    /**
     * @var string doc_type
     */
    public $doc_type;
    /**
     * @var string doc_ref
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
     * @var string thirdparty code
     */
    public $thirdparty_code;
    /**
     * @var string subledger account
     */
    public $subledger_account;
    /**
     * @var string subledger label
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
     * @deprecated Use $amount
     */
    public $montant;
    /**
     * @var float FEC:Amount (Not necessary)
     * @deprecated No more used
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
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'generic';
    /**
     * Constructor
     *
     * @param DoliDb $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param  User	$user		User that creates
     * @param  bool	$notrigger	false=launch triggers after, true=disable triggers
     * @return int				<0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = \false)
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
     * @param  User	$user	   User that creates
     * @param  bool	$notrigger  false=launch triggers after, true=disable triggers
     * @param  string  $mode 	   Mode
     * @return int				 <0 if KO, Id of created object if OK
     */
    public function createStd(\User $user, $notrigger = \false, $mode = '')
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int $id Id object
     * @param string $ref Ref
     * @param string $mode 	Mode
     *
     * @return int <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null, $mode = '')
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param string $sortorder Sort Order
     * @param string $sortfield Sort field
     * @param int $limit offset limit
     * @param int $offset offset limit
     * @param array $filter filter array
     * @param string $filtermode filter mode (AND or OR)
     * @param int $option option (0: general account or 1: subaccount)
     *
     * @return int <0 if KO, >=0 if OK
     */
    public function fetchAllByAccount($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, array $filter = array(), $filtermode = 'AND', $option = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param string 		$sortorder                      Sort Order
     * @param string 		$sortfield                      Sort field
     * @param int 			$limit                          Offset limit
     * @param int 			$offset                         Offset limit
     * @param array 		$filter                         Filter array
     * @param string 		$filtermode                     Filter mode (AND or OR)
     * @param int           $showAlreadyExportMovements     Show movements when field 'date_export' is not empty (0:No / 1:Yes (Default))
     * @return int                                          <0 if KO, >0 if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, array $filter = array(), $filtermode = 'AND', $showAlreadyExportMovements = 1)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param string $sortorder Sort Order
     * @param string $sortfield Sort field
     * @param int $limit offset limit
     * @param int $offset offset limit
     * @param array $filter filter array
     * @param string $filtermode filter mode (AND or OR)
     *
     * @return int <0 if KO, >0 if OK
     */
    public function fetchAllBalance($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, array $filter = array(), $filtermode = 'AND')
    {
    }
    /**
     * Update object into database
     *
     * @param  User    $user       User that modifies
     * @param  bool    $notrigger  false=launch triggers after, true=disable triggers
     * @param  string  $mode       Mode ('' or _tmp')
     * @return int                 <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = \false, $mode = '')
    {
    }
    /**
     * Update accounting movement
     *
     * @param  string  $piece_num      Piece num
     * @param  string  $field          Field
     * @param  string  $value          Value
     * @param  string  $mode           Mode ('' or _tmp')
     * @return number                  <0 if KO, >0 if OK
     */
    public function updateByMvt($piece_num = '', $field = '', $value = '', $mode = '')
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user User that deletes
     * @param bool $notrigger false=launch triggers after, true=disable triggers
     * @param string $mode Mode
     * @return int <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false, $mode = '')
    {
    }
    /**
     * Delete bookkeeping by importkey
     *
     * @param  string		$importkey		Import key
     * @return int Result
     */
    public function deleteByImportkey($importkey)
    {
    }
    /**
     * Delete bookkeeping by year
     *
     * @param  int	  $delyear		Year to delete
     * @param  string $journal		Journal to delete
     * @param  string $mode 		Mode
     * @param  int	  $delmonth     Month
     * @return int					<0 if KO, >0 if OK
     */
    public function deleteByYearAndJournal($delyear = 0, $journal = '', $mode = '', $delmonth = 0)
    {
    }
    /**
     * Delete bookkeeping by piece number
     *
     * @param 	int 	$piecenum 	Piecenum to delete
     * @return 	int 				Result
     */
    public function deleteMvtNum($piecenum)
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
     * @return void
     */
    public function initAsSpecimen()
    {
    }
    /**
     * Load an accounting document into memory from database
     *
     * @param int $piecenum Accounting document to get
     * @param string $mode Mode
     * @return int <0 if KO, >0 if OK
     */
    public function fetchPerMvt($piecenum, $mode = '')
    {
    }
    /**
     * Return next number movement
     *
     * @param	string	$mode	Mode
     * @return	string			Next numero to use
     */
    public function getNextNumMvt($mode = '')
    {
    }
    /**
     * Load all informations of accountancy document
     *
     * @param  int     $piecenum   Id of line to get
     * @param  string  $mode       Mode
     * @return int                 <0 if KO, >0 if OK
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
     * @param  number   $direction      If 0 tmp => real, if 1 real => tmp
     * @param  string   $piece_num      Piece num
     * @return int                      int <0 if KO, >0 if OK
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
     * @param int		$showempty	Add an empty field
     * @param array		$event		Event options
     * @param int		$select_in	Value is a aa.rowid (0 default) or aa.account_number (1)
     * @param int		$select_out	Set value returned by select 0=rowid (default), 1=account_number
     * @param int		$aabase		Set accounting_account base class to display empty=all or from 1 to 8 will display only account beginning by this number
     * @return string	String with HTML select
     */
    public function select_account($selectid, $htmlname = 'account', $showempty = 0, $event = array(), $select_in = 0, $select_out = 0, $aabase = '')
    {
    }
    /**
     * Return id and description of a root accounting account.
     * FIXME: This function takes the parent of parent to get the root account !
     *
     * @param 	string 	$account	Accounting account
     * @return 	array 				Array with root account information (max 2 upper level)
     */
    public function getRootAccount($account = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Description of accounting account
     *
     * @param	string	$account	Accounting account
     * @return	string				Account desc
     */
    public function get_compte_desc($account = \null)
    {
    }
}
/**
 * Class BookKeepingLine
 */
class BookKeepingLine
{
    /**
     * @var int ID
     */
    public $id;
    public $doc_date = '';
    public $doc_type;
    public $doc_ref;
    /**
     * @var int ID
     */
    public $fk_doc;
    /**
     * @var int ID
     */
    public $fk_docdet;
    public $thirdparty_code;
    public $subledger_account;
    public $subledger_label;
    public $numero_compte;
    public $label_compte;
    public $label_operation;
    public $debit;
    public $credit;
    /**
     * @var float Amount
     * @deprecated see $amount
     */
    public $montant;
    /**
     * @var float Amount
     */
    public $amount;
    /**
     * @var string Sens
     */
    public $sens;
    public $lettering_code;
    /**
     * @var int ID
     */
    public $fk_user_author;
    public $import_key;
    public $code_journal;
    public $journal_label;
    public $piece_num;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    /**
     * @var integer|string $date_modification;
     */
    public $date_modification;
    /**
     * @var integer|string $date_export;
     */
    public $date_export;
}