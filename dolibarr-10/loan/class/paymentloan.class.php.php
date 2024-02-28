<?php

/**
 * Class to manage payments of loans
 */
class PaymentLoan extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'payment_loan';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'payment_loan';
    /**
     * @var int Loan ID
     */
    public $fk_loan;
    /**
     * @var string Create date
     */
    public $datec = '';
    public $tms = '';
    /**
     * @var string Payment date
     */
    public $datep = '';
    public $amounts = array();
    // Array of amounts
    public $amount_capital;
    // Total amount of payment
    public $amount_insurance;
    public $amount_interest;
    /**
     * @var int Payment type ID
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
     * @var int User ID
     */
    public $fk_user_creat;
    /**
     * @var int user ID
     */
    public $fk_user_modif;
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
     *      Add record into bank for payment with links between this bank record and invoices of payment.
     *      All payment properties must have been set first like after a call to create().
     *
     *      @param	User	$user               Object of user making payment
     *      @param  int		$fk_loan            Id of fk_loan to do link with this payment
     *      @param  string	$mode               'payment_loan'
     *      @param  string	$label              Label to use in bank record
     *      @param  int		$accountid          Id of bank account to do link with
     *      @param  string	$emetteur_nom       Name of transmitter
     *      @param  string	$emetteur_banque    Name of bank
     *      @return int                 		<0 if KO, >0 if OK
     */
    public function addPaymentToBank($user, $fk_loan, $mode, $label, $accountid, $emetteur_nom, $emetteur_banque)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update link between loan's payment and the line generate in llx_bank
     *
     *  @param	int		$id_bank         Id if bank
     *  @return	int			             >0 if OK, <=0 if KO
     */
    public function update_fk_bank($id_bank)
    {
    }
    /**
     *  Return clicable name (with eventually a picto)
     *
     *	@param	int		$withpicto		0=No picto, 1=Include picto into link, 2=No picto
     * 	@param	int		$maxlen			Max length label
     *	@return	string					Chaine with URL
     */
    public function getNomUrl($withpicto = 0, $maxlen = 0)
    {
    }
}