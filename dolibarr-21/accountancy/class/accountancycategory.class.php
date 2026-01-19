<?php

/**
 * Class to manage categories of an accounting account
 */
class AccountancyCategory
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string 		Error string
     */
    public $error;
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     * @var string ID to identify managed object
     */
    public $element = 'c_accounting_category';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'c_accounting_category';
    /**
     * @var int ID
     * @deprecated
     */
    public $rowid;
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string Accountancy code
     */
    public $code;
    /**
     * @var string Accountancy Category label
     */
    public $label;
    /**
     * @var string Accountancy range account
     */
    public $range_account;
    /**
     * @var int Sens of the account:  0: credit - debit, 1: debit - credit
     */
    public $sens;
    /**
     * @var int Category type of accountancy
     */
    public $category_type;
    /**
     * @var string Formula
     */
    public $formula;
    /**
     * @var int     Position
     */
    public $position;
    /**
     * @var int country id
     */
    public $fk_country;
    /**
     * @var int Is active
     */
    public $active;
    /**
     * @var Object[] Lines cptbk
     */
    public $lines_cptbk;
    /**
     * @var Object[] Lines display
     */
    public $lines_display;
    /**
     * @var mixed Sum debit credit
     */
    public $sdc;
    /**
     * @var array<string,float> Sum debit credit per month
     */
    public $sdcpermonth;
    /**
     * @var array<string,float> Sum debit credit per account
     */
    public $sdcperaccount;
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create object into database
     *
     *  @param      User	$user        User that create
     *  @param      int		$notrigger   0=launch triggers after, 1=disable triggers
     *  @return     int      		   	 Return integer <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param      int		$id    	Id object
     *  @param		string	$code	Code
     *  @param		string	$label	Label
     *  @return     int          	Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $code = '', $label = '')
    {
    }
    /**
     *  Update object into database
     *
     *  @param      User	$user        User that modify
     *  @param      int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return     int     		   	 Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param  User	$user        User that delete
     *  @param	int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return	int					 Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * Function to select into ->lines_display all accounting accounts for a given custom accounting group
     *
     * @param 	int 	$id 	Id
     * @return 	int 			Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function display($id)
    {
    }
    /**
     * Function to fill ->lines_cptbk with accounting account (defined in chart of account) and not yet into a custom group
     *
     * @param 	int $id     Id of category to know which account to exclude
     * @return 	int 		Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function getAccountsWithNoCategory($id)
    {
    }
    /**
     * Function to add an accounting account in an accounting category
     *
     * @param int					$id_cat		Id category
     * @param array<string,?string> $cpts		list of accounts array
     *
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function updateAccAcc($id_cat, $cpts = array())
    {
    }
    /**
     * Function to delete an accounting account from an accounting category
     *
     * @param int $cpt_id Id of accounting account
     *
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function deleteCptCat($cpt_id)
    {
    }
    /**
     * Function to set the property ->sdc (and ->sdcperaccount) that is the result of an accounting account from the ledger with a direction and a period
     *
     * @param int|array<?string>	$cpt 	Accounting account or array of accounting account
     * @param int 		$date_start			Date start
     * @param int	 	$date_end			Date end
     * @param int<0,1>	$sens 				Sens of the account:  0: credit - debit (use this by default), 1: debit - credit
     * @param string	$thirdparty_code	Third party code
     * @param int       $month 				Specific month - Can be empty
     * @param int       $year 				Specific year - Can be empty
     * @return integer 						Return integer <0 if KO, >= 0 if OK
     */
    public function getSumDebitCredit($cpt, $date_start, $date_end, $sens, $thirdparty_code = 'nofilter', $month = 0, $year = 0)
    {
    }
    /**
     * Function to get an array of all active custom groups (llx_c_accunting_categories) with their accounts from the chart of account (ll_accounting_acount)
     *
     * @param	int				$catid		Custom group ID
     * @return array<string,array<int,array{id:int,code:string,label:string,position:string,category_type:string,formula:string,sens:string,dc:string,account_number:string,account_label:string}>>|int<-1,-1>   		    Result in table (array), -1 if KO
     * @see getCats(), getCptsCat()
     */
    public function getCatsCpts($catid = 0)
    {
    }
    /**
     * Return list of custom groups.
     * For list + detail of accounting account, see getCatsCpt()
     *
     * @param	int			$categorytype		-1=All, 0=Only non computed groups, 1=Only computed groups
     * @param	int			$active				1= active, 0=not active
     * @param	int			$id_report			id of the report
     * @return	never|array<array{rowid:string,code:string,label:string,formula:string,position:string,category_type:string,sens:string,dc:string}>|int	Array of groups or -1 if error
     * @see getCatsCpts(), getCptsCat()
     */
    public function getCats($categorytype = -1, $active = 1, $id_report = 1)
    {
    }
    /**
     * Get all accounting account of a given custom group (or a list of custom groups).
     * You must choose between first parameter (personalized group) or the second (free criteria filter)
     *
     * @param 	int 		$cat_id 				Id if personalized accounting group/category
     * @param 	string 		$predefinedgroupwhere 	Sql criteria filter to select accounting accounts. This value must be sanitized and not come from an input of a user.
     * 												Example: "pcg_type = 'EXPENSE' AND fk_pcg_version = 'xx'"
     * 												Example: "fk_accounting_category = 99"
     * @return	never|array<array{id:int,account_number:string,account_label:string}>|int<-1,-1>		Array of accounting accounts or -1 if error
     * @see getCats(), getCatsCpts()
     */
    public function getCptsCat($cat_id, $predefinedgroupwhere = '')
    {
    }
}