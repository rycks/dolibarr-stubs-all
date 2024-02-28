<?php

/**
 *	Class to manage generation of HTML components for accounting management
 */
class FormAccounting extends \Form
{
    private $options_cache = array();
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var int Nb of accounts found
     */
    public $nbaccounts;
    /**
     * @var int Nb of accounts category found
     */
    public $nbaccounts_category;
    /**
     * Constructor
     *
     * @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of journals with label by nature
     *
     * @param	string	$selectid	Preselected journal code
     * @param	string	$htmlname	Name of field in html form
     * @param	int		$nature		Limit the list to a particular type of journals (1:various operations / 2:sale / 3:purchase / 4:bank / 9: has-new)
     * @param	int		$showempty	Add an empty field
     * @param	int		$select_in	0=selectid value is the journal rowid (default) or 1=selectid is journal code
     * @param	int		$select_out	Set value returned by select. 0=rowid (default), 1=code
     * @param	string	$morecss	More css non HTML object
     * @param	string	$usecache	Key to use to store result into a cache. Next call with same key will reuse the cache.
     * @param   int     $disabledajaxcombo Disable ajax combo box.
     * @return	string				String with HTML select
     */
    public function select_journal($selectid, $htmlname = 'journal', $nature = 0, $showempty = 0, $select_in = 0, $select_out = 0, $morecss = 'maxwidth300 maxwidthonsmartphone', $usecache = '', $disabledajaxcombo = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of journals with label by nature
     *
     * @param	array	$selectedIds		Preselected journal code array
     * @param	string	$htmlname			Name of field in html form
     * @param	int		$nature				Limit the list to a particular type of journals (1:various operations / 2:sale / 3:purchase / 4:bank / 9: has-new)
     * @param	int		$showempty			Add an empty field
     * @param	int		$select_in			0=selectid value is the journal rowid (default) or 1=selectid is journal code
     * @param	int		$select_out			Set value returned by select. 0=rowid (default), 1=code
     * @param	string	$morecss			More css non HTML object
     * @param	string	$usecache			Key to use to store result into a cache. Next call with same key will reuse the cache.
     * @param   int     $disabledajaxcombo 	Disable ajax combo box.
     * @return	string						String with HTML select
     */
    public function multi_select_journal($selectedIds = array(), $htmlname = 'journal', $nature = 0, $showempty = 0, $select_in = 0, $select_out = 0, $morecss = '', $usecache = '', $disabledajaxcombo = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of accounting category.
     * 	Use mysoc->country_id or mysoc->country_code so they must be defined.
     *
     *	@param	string	$selected       Preselected type
     *	@param  string	$htmlname       Name of field in form
     * 	@param	int		$useempty		Set to 1 if we want an empty value
     * 	@param	int		$maxlen			Max length of text in combo box
     * 	@param	int		$help			Add or not the admin help picto
     *  @param  int     $allcountries   All countries
     * 	@return	string					HTML component with the select
     */
    public function select_accounting_category($selected = '', $htmlname = 'account_category', $useempty = 0, $maxlen = 0, $help = 1, $allcountries = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return select filter with date of transaction
     *
     * @param string $htmlname         Name of select field
     * @param string $selectedkey      Value
     * @return string                  HTML edit field
     */
    public function select_bookkeeping_importkey($htmlname = 'importkey', $selectedkey = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of accounts with label by chart of accounts
     *
     * @param string   		$selectid          	Preselected id of accounting accounts (depends on $select_in)
     * @param string   		$htmlname          	Name of HTML field id. If name start with '.', it is name of HTML css class, so several component with same name in different forms can be used.
     * @param int|string    $showempty         	1=Add an empty field, 2=Add an empty field+'None' field
     * @param array    		$event             	Event options
     * @param int      		$select_in         	0=selectid value is a aa.rowid (default) or 1=selectid is aa.account_number
     * @param int      		$select_out        	Set value returned by select. 0=rowid (default), 1=account_number
     * @param string   		$morecss           	More css non HTML object
     * @param string   		$usecache          	Key to use to store result into a cache. Next call with same key will reuse the cache.
     * @param string		$active				Filter on status active or not: '0', '1' or '' for no filter
     * @return string       	               	String with HTML select
     */
    public function select_account($selectid, $htmlname = 'account', $showempty = 0, $event = array(), $select_in = 0, $select_out = 0, $morecss = 'minwidth100 maxwidth300 maxwidthonsmartphone', $usecache = '', $active = '1')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of auxilary accounts. Cumulate list from customers, suppliers and users.
     *
     * @param string   		$selectid       Preselected pcg_type
     * @param string   		$htmlname       Name of field in html form
     * @param int|string    $showempty      Add an empty field
     * @param string   		$morecss        More css
     * @param string   		$usecache       Key to use to store result into a cache. Next call with same key will reuse the cache.
     * @param string		$labelhtmlname	HTML name of label for autofill of account from name.
     * @return string       	   			String with HTML select
     */
    public function select_auxaccount($selectid, $htmlname = 'account_num_aux', $showempty = 0, $morecss = 'minwidth100 maxwidth300 maxwidthonsmartphone', $usecache = '', $labelhtmlname = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return HTML combo list of years existing into book keepping
     *
     * @param string 	$selected 		Preselected value
     * @param string 	$htmlname 		Name of HTML select object
     * @param int 		$useempty 		Affiche valeur vide dans liste
     * @param string 	$output_format 	(html/opton (for option html only)/array (to return options arrays
     * @return string|array				HTML select component or array of select options
     */
    public function selectyear_accountancy_bookkepping($selected = '', $htmlname = 'yearid', $useempty = 0, $output_format = 'html')
    {
    }
}