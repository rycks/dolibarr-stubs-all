<?php

/**
 *  Loan
 */
class Loan extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'loan';
    /**
     * @var string Name of table without prefix where object is stored
     * @deprecated Use $table_element
     * @see $table_element
     */
    public $table = 'loan';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'loan';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'money-bill-alt';
    /**
     * @var int ID
     */
    public $rowid;
    /**
     * @var int|'' date start
     */
    public $datestart;
    /**
     * @var int|''
     */
    public $dateend;
    /**
     * @var string Loan label
     */
    public $label;
    /**
     * @var float capital
     */
    public $capital;
    /**
     * @var float nb terms
     */
    public $nbterm;
    /**
     * @var float rate
     */
    public $rate;
    /**
     * @var int<0,1> paid
     */
    public $paid;
    /**
     * @var string account_capital
     */
    public $account_capital;
    /**
     * @var string account_insurance
     */
    public $account_insurance;
    /**
     * @var string account_interest
     */
    public $account_interest;
    /**
     * @var string accountancy_account_capital
     */
    public $accountancy_account_capital;
    /**
     * @var string accountancy_account_insurance
     */
    public $accountancy_account_insurance;
    /**
     * @var string accountancy_account_interest
     */
    public $accountancy_account_interest;
    /**
     * @var float insurance amount
     */
    public $insurance_amount;
    /**
     * @var int Bank ID
     */
    public $fk_bank;
    /**
     * @var int ID
     */
    public $fk_user_creat;
    /**
     * @var int ID
     */
    public $fk_user_modif;
    /**
     * @var int ID
     */
    public $fk_project;
    /**
     * @var float totalpaid
     */
    public $totalpaid;
    /**
     * @var int
     */
    const STATUS_UNPAID = 0;
    /**
     * @var int
     */
    const STATUS_PAID = 1;
    /**
     * @var int
     */
    const STATUS_STARTED = 2;
    /**
     * Constructor
     *
     * @param	DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id		 id object
     *  @return int				 Return integer <0 error , >=0 no error
     */
    public function fetch($id)
    {
    }
    /**
     *  Create a loan into database
     *
     *  @param	User	$user	User making creation
     *  @return int				Return integer <0 if KO, id if OK
     */
    public function create($user)
    {
    }
    /**
     *  Delete a loan
     *
     *  @param	User	$user	Object user making delete
     *  @return int 			Return integer <0 if KO, >0 if OK
     */
    public function delete($user)
    {
    }
    /**
     *  Update loan
     *
     *  @param	User	$user	User who modified
     *  @return int				Return integer <0 if error, >0 if ok
     */
    public function update($user)
    {
    }
    /**
     *  Tag loan as paid completely
     *
     *  @param	User	$user	Object user making change
     *  @return	int				Return integer <0 if KO, >0 if OK
     */
    public function setPaid($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Tag loan as payment started
     *
     *	@deprecated
     *  @see setStarted()
     *  @param	User	$user	Object user making change
     *  @return	int				Return integer <0 if KO, >0 if OK
     */
    public function set_started($user)
    {
    }
    /**
     *  Tag loan as payment started
     *
     *  @param	User	$user	Object user making change
     *  @return	int				Return integer <0 if KO, >0 if OK
     */
    public function setStarted($user)
    {
    }
    /**
     *  Tag loan as payment as unpaid
     *
     *  @param	User	$user	Object user making change
     *  @return	int				Return integer <0 if KO, >0 if OK
     */
    public function setUnpaid($user)
    {
    }
    /**
     *  Return label of loan status (unpaid, paid)
     *
     *  @param  int		$mode			0=label, 1=short label, 2=Picto + Short label, 3=Picto, 4=Picto + Label
     *  @param  float	$alreadypaid	0=No payment already done, >0=Some payments were already done (we recommend to put here amount paid if you have it, 1 otherwise)
     *  @return string					Label
     */
    public function getLibStatut($mode = 0, $alreadypaid = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label for given status
     *
     *  @param  int		$status			Id status
     *  @param  int		$mode			0=Label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Label, 5=Short label + Picto
     *  @param  float	$alreadypaid	0=No payment already done, >0=Some payments were already done (we recommend to put here amount paid if you have it, 1 otherwise)
     *  @return string					Label
     */
    public function LibStatut($status, $mode = 0, $alreadypaid = -1)
    {
    }
    /**
     *  Return clickable name (with eventually the picto)
     *
     *  @param	int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     *  @param	int		$maxlen						Label max length
     *  @param  string  $option        				On what the link point to ('nolink', ...)
     *  @param  int     $notooltip                  1=Disable tooltip
     *  @param  string  $morecss                    Add more css on link
     *  @param  int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @return	string								Chaine with URL
     */
    public function getNomUrl($withpicto = 0, $maxlen = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     * 	id must be 0 if object instance is a specimen.
     *
     *  @return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     *  Return amount of payments already done
     *
     *  @return		int		Amount of payment already done, <0 if KO
     */
    public function getSumPayment()
    {
    }
    /**
     *  Information on record
     *
     *  @param	int			$id		Id of record
     *  @return	integer|null
     */
    public function info($id)
    {
    }
    /**
     *	Return clickable link of object (with eventually picto)
     *
     *	@param      string	    			$option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array{string,mixed}		$arraydata				Array of data
     *  @return		string											HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
}