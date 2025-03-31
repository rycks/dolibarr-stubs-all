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
     * @var int
     */
    public $bank_account;
    /**
     * @var int
     */
    public $bank_line;
    /**
     * @var int|string Creation date
     */
    public $datec;
    /**
     * @var int|string Payment date
     */
    public $datep;
    /**
     * @var float[]
     */
    public $amounts = array();
    // Array of amounts
    /**
     * @var null|float|string  Total amount of payment
     */
    public $amount_capital;
    /**
     * @var null|float|string
     */
    public $amount_insurance;
    /**
     * @var null|float|string
     */
    public $amount_interest;
    /**
     * @var int Payment Type ID
     */
    public $fk_typepayment;
    /**
     * @var string      Payment reference
     *                  (Cheque or bank transfer reference. Can be "ABC123")
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
    /**
     * @var LoanSchedule[]
     * @see LoanSchedule::fetchAll()
     */
    public $lines = array();
    /**
     * @deprecated	Use $amount, $amounts
     * @see $amount, $amounts
     * @var float
     */
    public $total;
    /**
     * @var string
     */
    public $type_code;
    /**
     * @var string
     */
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
     *  @return     int     			Return integer <0 if KO, id of payment if OK
     */
    public function create($user)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id         Id object
     *  @return int         		Return integer <0 if KO, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     *  Update database
     *
     *  @param	User|null	$user        	User that modify
     *  @param  int			$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int         				Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *  @param	User	$user        	User that delete
     *  @param  int		$notrigger		0=launch triggers after, 1=disable triggers
     *  @return int						Return integer <0 if KO, >0 if OK
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
     *  @return int         		Return integer <0 if KO, >0 if OK
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
     *  @return int                Return integer < 0 if KO, Date > 0 if OK
     */
    private function lastPayment($loanid)
    {
    }
    /**
     *  paimenttorecord
     *
     *  @param  int		$loanid		Loan id
     *  @param  int		$datemax	Date max
     *  @return int[]				Array of id
     */
    public function paimenttorecord($loanid, $datemax)
    {
    }
}