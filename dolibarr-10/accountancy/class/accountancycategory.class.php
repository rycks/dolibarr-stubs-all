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
     * @see             $errors
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
     * @var array Lines cptbk
     */
    public $lines_cptbk;
    /**
     * @var array Lines display
     */
    public $lines_display;
    /**
     * @var mixed Sample property 1
     */
    public $sdc;
    /**
     *  Constructor
     *
     *  @param      DoliDb		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create object into database
     *
     *  @param      User	$user        User that create
     *  @param      int		$notrigger   0=launch triggers after, 1=disable triggers
     *  @return     int      		   	 <0 if KO, Id of created object if OK
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
     *  @return     int          	<0 if KO, >0 if OK
     */
    public function fetch($id, $code = '', $label = '')
    {
    }
    /**
     *  Update object into database
     *
     *  @param      User	$user        User that modify
     *  @param      int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return     int     		   	 <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param  User	$user        User that delete
     *  @param	int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return	int					 <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * Function to select all accounting accounts from an accounting category
     *
     * @param int $id Id
     * @return int <0 if KO, 0 if not found, >0 if OK
     */
    public function display($id)
    {
    }
    /**
     * Function to select accounting category of an accounting account present in chart of accounts
     *
     * @param int $id Id category
     *
     * @return int <0 if KO, 0 if not found, >0 if OK
     */
    public function getCptBK($id)
    {
    }
    /**
     * Function to select accounting category of an accounting account present in chart of accounts
     *
     * @param int $id      Id of category to know which account to exclude
     *
     * @return int <0 if KO, 0 if not found, >0 if OK
     */
    public function getAccountsWithNoCategory($id)
    {
    }
    /**
     * Function to add an accounting account in an accounting category
     *
     * @param int $id_cat Id category
     * @param array $cpts list of accounts array
     *
     * @return int <0 if KO, >0 if OK
     */
    public function updateAccAcc($id_cat, $cpts = array())
    {
    }
    /**
     * Function to delete an accounting account from an accounting category
     *
     * @param int $cpt_id Id of accounting account
     *
     * @return int <0 if KO, >0 if OK
     */
    public function deleteCptCat($cpt_id)
    {
    }
    /**
     * Function to know all category from accounting account
     *
     * @return array|integer       Result in table (array), -1 if KO
     */
    public function getCatsCpts()
    {
    }
    /**
     * Function to show result of an accounting account from the ledger with a direction and a period
     *
     * @param int|array	$cpt 				Accounting account or array of accounting account
     * @param string 	$date_start			Date start
     * @param string 	$date_end			Date end
     * @param int 		$sens 				Sens of the account:  0: credit - debit (use this by default), 1: debit - credit
     * @param string	$thirdparty_code	Thirdparty code
     * @param int       $month 				Specifig month - Can be empty
     * @param int       $year 				Specifig year - Can be empty
     * @return integer 						<0 if KO, >= 0 if OK
     */
    public function getSumDebitCredit($cpt, $date_start, $date_end, $sens, $thirdparty_code = 'nofilter', $month = 0, $year = 0)
    {
    }
    /**
     * Return list of personalized groups that are active
     *
     * @param	int			$categorytype		-1=All, 0=Only non computed groups, 1=Only computed groups
     * @return	array|int						Array of groups or -1 if error
     */
    public function getCats($categorytype = -1)
    {
    }
    /**
     * Get all accounting account of a group.
     * You must choose between first parameter (personalized group) or the second (free criteria filter)
     *
     * @param 	int 		$cat_id 				Id if personalized accounting group/category
     * @param 	string 		$predefinedgroupwhere 	Sql criteria filter to select accounting accounts
     * @return 	array|int							Array of accounting accounts or -1 if error
     */
    public function getCptsCat($cat_id, $predefinedgroupwhere = '')
    {
    }
}