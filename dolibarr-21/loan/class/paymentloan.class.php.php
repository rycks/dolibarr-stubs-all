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
     * @var string String with name of icon for PaymentLoan
     */
    public $picto = 'money-bill-alt';
    /**
     * @var int Loan ID
     */
    public $fk_loan;
    /**
     * @var string Create date
     */
    public $datec = '';
    /**
     * @var string Payment date
     */
    public $datep = '';
    /**
     * @var array<float|int> Array of amounts
     */
    public $amounts = array();
    /**
     * @var float|int  Total amount of payment
     */
    public $amount_capital;
    /**
     * @var float|int
     */
    public $amount_insurance;
    /**
     * @var null|float|int
     */
    public $amount_interest;
    /**
     * @var int Payment mode ID
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
     * @var int User ID
     */
    public $fk_user_creat;
    /**
     * @var int user ID
     */
    public $fk_user_modif;
    /**
     * @var string
     */
    public $type_code;
    /**
     * @var string
     */
    public $type_label;
    /**
     * @var int
     */
    public $chid;
    /**
     * @var string
     */
    public $label;
    /**
     * @var int
     */
    public $paymenttype;
    /**
     * @var int
     */
    public $bank_account;
    /**
     * @var int
     */
    public $bank_line;
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
     *  @param	User	$user        	User that modify
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int         			Return integer <0 if KO, >0 if OK
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
     * Renvoi le libelle d'un statut donne
     *
     * @param   int		$status     Statut
     * @param   int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     * @return	string  		    Libelle du statut
     */
    public function LibStatut($status, $mode = 0)
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
     *      @return int                 		Return integer <0 if KO, >0 if OK
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
     *  Return clickable name (with eventually a picto)
     *
     *	@param	int		$withpicto					0=No picto, 1=Include picto into link, 2=No picto
     * 	@param	int		$maxlen						Max length label
     *	@param	int  	$notooltip					1=Disable tooltip
     *	@param	string	$moretitle					Add more text to title tooltip
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, $maxlen = 0, $notooltip = 0, $moretitle = '', $save_lastsearch_value = -1)
    {
    }
}