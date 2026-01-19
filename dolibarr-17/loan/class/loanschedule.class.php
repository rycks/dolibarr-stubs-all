<?php

/**
 *		Class to manage Schedule of loans
 */
class LoanSchedule extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'loan_schedule';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'loan_schedule';
    /**
     * @var int Loan ID
     */
    public $fk_loan;
    /**
     * @var string Create date
     */
    public $datec;
    public $tms;
    /**
     * @var string Payment date
     */
    public $datep;
    public $amounts = array();
    // Array of amounts
    public $amount_capital;
    // Total amount of payment
    public $amount_insurance;
    public $amount_interest;
    /**
     * @var int Payment Type ID
     */
    public $fk_typepayment;
    /**
     * @var int Payment ID
     */
    public $num_payment;
    /**
     * @var int Bank ID
     */
    public $fk_bank;
    /**
     * @var int Loan Payment ID
     */
    public $fk_payment_loan;
    /**
     * @var int Bank ID
     */
    public $fk_user_creat;
    /**
     * @var int User ID
     */
    public $fk_user_modif;
    public $lines = array();
    /**
     * @deprecated
     * @see $amount, $amounts
     */
    public $total;
    public $type_code;
    public $type_label;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create payment of loan into database.
     *  Use this->amounts to have list of lines for the payment
     *
     *  @param      User		$user   User making payment
     *  @return     int     			<0 if KO, id of payment if OK
     */
    public function create($user)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id         Id object
     *  @return int         		<0 if KO, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     *  Update database
     *
     *  @param	User	$user        	User that modify
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int         			<0 if KO, >0 if OK
     */
    public function update($user = 0, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *  @param	User	$user        	User that delete
     *  @param  int		$notrigger		0=launch triggers after, 1=disable triggers
     *  @return int						<0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * Calculate Monthly Payments
     *
     * @param   double  $capital        Capital
     * @param   double  $rate           rate
     * @param   int     $nbterm         nb term
     * @return  double                  mensuality
     */
    public function calcMonthlyPayments($capital, $rate, $nbterm)
    {
    }
    /**
     *  Load all object in memory from database
     *
     *  @param	int		$loanid     Id object
     *  @return int         		<0 if KO, >0 if OK
     */
    public function fetchAll($loanid)
    {
    }
    /**
     *  transPayment
     *
     *  @return void
     */
    private function transPayment()
    {
    }
    /**
     *  lastpayment
     *
     *  @param  int    $loanid     Loan id
     *  @return int                < 0 if KO, Date > 0 if OK
     */
    private function lastPayment($loanid)
    {
    }
    /**
     *  paimenttorecord
     *
     *  @param  int        $loanid     Loan id
     *  @param  int        $datemax    Date max
     *  @return array                  Array of id
     */
    public function paimenttorecord($loanid, $datemax)
    {
    }
}