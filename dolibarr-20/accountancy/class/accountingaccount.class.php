<?php

/**
 * Class to manage accounting accounts
 */
class AccountingAccount extends \CommonObject
{
    /**
     * @var string Name of element
     */
    public $element = 'accounting_account';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'accounting_account';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'billr';
    /**
     * 0=Default, 1=View may be restricted to sales representative only if no permission to see all or to company of external user if external user
     * @var integer
     */
    public $restrictiononfksoc = 1;
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var int ID
     */
    public $rowid;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * @var string pcg version
     */
    public $fk_pcg_version;
    /**
     * @var string pcg type
     */
    public $pcg_type;
    /**
     * @var string account number
     */
    public $account_number;
    /**
     * @var int ID parent account
     */
    public $account_parent;
    /**
     * @var int ID category account
     */
    public $account_category;
    /**
     * @var int Label category account
     */
    public $account_category_label;
    /**
     * @var int Status
     */
    public $status;
    /**
     * @var string Label of account
     */
    public $label;
    /**
     * @var string Label short of account
     */
    public $labelshort;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var int ID
     */
    public $fk_user_modif;
    /**
     * @var int active (duplicate with status)
     */
    public $active;
    /**
     * @var int reconcilable
     */
    public $reconcilable;
    /**
     * @var array cache array
     */
    private $accountingaccount_codetotid_cache = array();
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    /**
     * Constructor
     *
     * @param DoliDB $db Database handle
     */
    public function __construct($db)
    {
    }
    /**
     * Load record in memory
     *
     * @param 	int       		$rowid 				    	Id
     * @param 	string|null    	$account_number 	        Account number
     * @param 	int|boolean    	$limittocurrentchart     	1 or true=Load record only if it is into current active chart of account
     * @param   string         	$limittoachartaccount    	'ABC'=Load record only if it is into chart account with code 'ABC' (better and faster than previous parameter if you have chart of account code).
     * @return 	int                                     	Return integer <0 if KO, 0 if not found, Id of record if OK and found
     */
    public function fetch($rowid = 0, $account_number = \null, $limittocurrentchart = 0, $limittoachartaccount = '')
    {
    }
    /**
     * Insert new accounting account in chart of accounts
     *
     * @param User $user User making action
     * @param int $notrigger Disable triggers
     * @return int                 Return integer <0 if KO, >0 if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     * Update record
     *
     * @param User $user 		User making update
     * @return int             	Return integer <0 if KO (-2 = duplicate), >0 if OK
     */
    public function update($user)
    {
    }
    /**
     * Check usage of accounting code
     *
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function checkUsage()
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user User that deletes
     * @param int $notrigger 0=triggers after, 1=disable triggers
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * Return clicable name (with picto eventually)
     *
     * @param int $withpicto 0=No picto, 1=Include picto into link, 2=Only picto
     * @param int $withlabel 0=No label, 1=Include label of account
     * @param int $nourl 1=Disable url
     * @param string $moretitle Add more text to title tooltip
     * @param int $notooltip 1=Disable tooltip
     * @param int $save_lastsearch_value -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     * @param int $withcompletelabel 0=Short label (field short label), 1=Complete label (field label)
     * @param string $option 'ledger', 'journals', 'accountcard'
     * @return  string    String with URL
     */
    public function getNomUrl($withpicto = 0, $withlabel = 0, $nourl = 0, $moretitle = '', $notooltip = 0, $save_lastsearch_value = -1, $withcompletelabel = 0, $option = '')
    {
    }
    /**
     * Information on record
     *
     * @param int 	$id 	ID of record
     * @return void
     */
    public function info($id)
    {
    }
    /**
     * Deactivate an account (for status active or status reconcilable)
     *
     * @param int $id Id
     * @param int $mode 0=field active, 1=field reconcilable
     * @return int              Return integer <0 if KO, >0 if OK
     */
    public function accountDeactivate($id, $mode = 0)
    {
    }
    /**
     * Account activated
     *
     * @param int $id Id
     * @param int $mode 0=field active, 1=field reconcilable
     * @return int              Return integer <0 if KO, >0 if OK
     */
    public function accountActivate($id, $mode = 0)
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a given status
     *
     *  @param	int		$status        Id status
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 			       Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     * Return a suggested account (from chart of accounts) to bind
     *
     * @param 	Societe 							$buyer 				Object buyer
     * @param 	Societe 							$seller 			Object seller
     * @param 	Product 							$product 			Product object sell or buy
     * @param 	Facture|FactureFournisseur 			$facture 			Facture
     * @param 	FactureLigne|SupplierInvoiceLine	$factureDet 		Facture Det
     * @param 	array 								$accountingAccount 	Array of Accounting account
     * @param 	string 								$type 				Customer / Supplier
     * @return	array|int      											Array of accounting accounts suggested or < 0 if technical error.
     * 																	'suggestedaccountingaccountbydefaultfor'=>Will be used for the label to show on tooltip for account by default on any product
     * 																	'suggestedaccountingaccountfor'=>Is the account suggested for this product
     */
    public function getAccountingCodeToBind(\Societe $buyer, \Societe $seller, \Product $product, $facture, $factureDet, $accountingAccount = array(), $type = '')
    {
    }
}