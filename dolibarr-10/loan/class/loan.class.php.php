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
    public $table = 'loan';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'loan';
    public $picto = 'bill';
    /**
     * @var int ID
     */
    public $rowid;
    public $datestart;
    public $dateend;
    /**
     * @var string Loan label
     */
    public $label;
    public $capital;
    public $nbterm;
    public $rate;
    public $paid;
    public $account_capital;
    public $account_insurance;
    public $account_interest;
    public $date_creation;
    public $date_modification;
    public $date_validation;
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
     *  @return int				 <0 error , >=0 no error
     */
    public function fetch($id)
    {
    }
    /**
     *  Create a loan into database
     *
     *  @param	User	$user	User making creation
     *  @return int				<0 if KO, id if OK
     */
    public function create($user)
    {
    }
    /**
     *  Delete a loan
     *
     *  @param	User	$user	Object user making delete
     *  @return int 			<0 if KO, >0 if OK
     */
    public function delete($user)
    {
    }
    /**
     *  Update loan
     *
     *  @param	User	$user	User who modified
     *  @return int				<0 if error, >0 if ok
     */
    public function update($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Tag loan as payed completely
     *
     *  @param	User	$user	Object user making change
     *  @return	int				<0 if KO, >0 if OK
     */
    public function set_paid($user)
    {
    }
    /**
     *  Return label of loan status (unpaid, paid)
     *
     *  @param  int		$mode			0=label, 1=short label, 2=Picto + Short label, 3=Picto, 4=Picto + Label
     *  @param  integer	$alreadypaid	0=No payment already done, >0=Some payments were already done (we recommand to put here amount payed if you have it, 1 otherwise)
     *  @return string					Label
     */
    public function getLibStatut($mode = 0, $alreadypaid = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label for given status
     *
     *  @param  int		$statut			Id statut
     *  @param  int		$mode			0=Label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Label, 5=Short label + Picto
     *  @param  integer	$alreadypaid	0=No payment already done, >0=Some payments were already done (we recommand to put here amount payed if you have it, 1 otherwise)
     *  @return string					Label
     */
    public function LibStatut($statut, $mode = 0, $alreadypaid = -1)
    {
    }
    /**
     *  Return clicable name (with eventually the picto)
     *
     *  @param	int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     *  @param	int		$maxlen			Label max length
     *  @return	string					Chaine with URL
     */
    public function getNomUrl($withpicto = 0, $maxlen = 0)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     * 	id must be 0 if object instance is a specimen.
     *
     *  @return	void
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
}