<?php

/**
 *	Class to manage payments of customer invoices
 */
class Paiement extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'payment';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'paiement';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'payment';
    public $facid;
    public $datepaye;
    public $date;
    // same than $datepaye
    /**
     * @deprecated
     * @see $amount, $amounts
     */
    public $total;
    /**
     * @deprecated
     * @see $amount, $amounts
     */
    public $montant;
    public $amount;
    // Total amount of payment (in the main currency)
    public $multicurrency_amount;
    // Total amount of payment (in the currency of the bank account)
    public $amounts = array();
    // array: invoice ID => amount for that invoice (in the main currency)
    public $multicurrency_amounts = array();
    // array: invoice ID => amount for that invoice (in the invoice's currency)
    public $multicurrency_code = array();
    // array: invoice ID => currency code for that invoice
    public $pos_change = 0;
    // Excess received in TakePOS cash payment
    public $author;
    public $paiementid;
    // ID of mode of payment. Is saved into fields fk_paiement on llx_paiement = id of llx_c_paiement
    public $paiementcode;
    // Code of mode of payment.
    /**
     * @var string Type of payment label
     */
    public $type_label;
    /**
     * @var string Type of payment code (seems duplicate with $paiementcode);
     */
    public $type_code;
    /**
     * @var string Numero du CHQ, VIR, etc...
     * @deprecated
     * @see $num_payment
     */
    public $num_paiement;
    /**
     * @var string Numero du CHQ, VIR, etc...
     */
    public $num_payment;
    /**
     * @var string Id of external payment mode
     */
    public $ext_payment_id;
    /**
     * @var string Id of prelevement
     */
    public $id_prelevement;
    /**
     * @var string num_prelevement
     */
    public $num_prelevement;
    /**
     * @var string Name of external payment mode
     */
    public $ext_payment_site;
    /**
     * @var int bank account id of payment
     * @deprecated
     * @see $fk_account
     */
    public $bank_account;
    /**
     * @var int bank account id of payment
     */
    public $fk_account;
    /**
     * @var int id of payment line in bank account
     */
    public $bank_line;
    // fk_paiement dans llx_paiement est l'id du type de paiement (7 pour CHQ, ...)
    // fk_paiement dans llx_paiement_facture est le rowid du paiement
    /**
     * @var int payment id
     */
    public $fk_paiement;
    // Type of payment
    /**
     * @var string payment external reference
     */
    public $ref_ext;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *    Load payment from database
     *
     *    @param	int		$id			Id of payment to get
     *    @param	string	$ref		Ref of payment to get (currently ref = id but this may change in future)
     *    @param	int		$fk_bank	Id of bank line associated to payment
     *    @return   int		            <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = '', $fk_bank = '')
    {
    }
    /**
     *  Create payment of invoices into database.
     *  Use this->amounts to have list of invoices for the payment.
     *  For payment of a customer invoice, amounts are positive, for payment of credit note, amounts are negative
     *
     *  @param	User	  $user                	Object user
     *  @param  int		  $closepaidinvoices   	1=Also close payed invoices to paid, 0=Do nothing more
     *  @param  Societe   $thirdparty           Thirdparty
     *  @return int                 			id of created payment, < 0 if error
     */
    public function create($user, $closepaidinvoices = 0, $thirdparty = \null)
    {
    }
    /**
     *  Delete a payment and generated links into account
     *  - Si le paiement porte sur un ecriture compte qui est rapprochee, on refuse
     *  - Si le paiement porte sur au moins une facture a "payee", on refuse
     *
     *  @param	int		$notrigger		No trigger
     *  @return int     				<0 si ko, >0 si ok
     */
    public function delete($notrigger = 0)
    {
    }
    /**
     *      Add a record into bank for payment + links between this bank record and sources of payment.
     *      All payment properties (this->amount, this->amounts, ...) must have been set first like after a call to create().
     *
     *      @param	User	$user               Object of user making payment
     *      @param  string	$mode               'payment', 'payment_supplier'
     *      @param  string	$label              Label to use in bank record. Note: If label is '(WithdrawalPayment)', a third entry 'widthdraw' is added into bank_url.
     *      @param  int		$accountid          Id of bank account to do link with
     *      @param  string	$emetteur_nom       Name of transmitter
     *      @param  string	$emetteur_banque    Name of bank
     *      @param	int		$notrigger			No trigger
     *  	@param	string	$accountancycode	When we record a free bank entry, we must provide accounting account if accountancy module is on.
     *      @return int                 		<0 if KO, bank_line_id if OK
     */
    public function addPaymentToBank($user, $mode, $label, $accountid, $emetteur_nom, $emetteur_banque, $notrigger = 0, $accountancycode = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Mise a jour du lien entre le paiement et la ligne generee dans llx_bank
     *
     *      @param	int		$id_bank    Id compte bancaire
     *      @return	int					<0 if KO, >0 if OK
     */
    public function update_fk_bank($id_bank)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Updates the payment date
     *
     *  @param	int	$date   New date
     *  @return int					<0 if KO, 0 if OK
     */
    public function update_date($date)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Updates the payment number
     *
     *  @param	string	$num		New num
     *  @return int					<0 if KO, 0 if OK
     */
    public function update_num($num)
    {
    }
    /**
     *    Validate payment
     *
     *	  @param	User	$user		User making validation
     *    @return   int     			<0 if KO, >0 if OK
     *    @deprecated
     */
    public function valide(\User $user = \null)
    {
    }
    /**
     *    Validate payment
     *
     *	  @param	User	$user		User making validation
     *    @return   int     			<0 if KO, >0 if OK
     */
    public function validate(\User $user = \null)
    {
    }
    /**
     *    Reject payment
     *
     *	  @param	User	$user		User making reject
     *    @return   int     			<0 if KO, >0 if OK
     */
    public function reject(\User $user = \null)
    {
    }
    /**
     *    Information sur l'objet
     *
     *    @param   int     $id      id du paiement dont il faut afficher les infos
     *    @return  void
     */
    public function info($id)
    {
    }
    /**
     *  Return list of invoices the payment is related to.
     *
     *  @param	string		$filter         Filter
     *  @return int|array					<0 if KO or array of invoice id
     *  @see getAmountsArray()
     */
    public function getBillsArray($filter = '')
    {
    }
    /**
     *  Return list of amounts of payments.
     *
     *  @return int|array					Array of amount of payments
     *  @see getBillsArray()
     */
    public function getAmountsArray()
    {
    }
    /**
     *      Return next reference of customer invoice not already used (or last reference)
     *      according to numbering module defined into constant FACTURE_ADDON
     *
     *      @param	   Societe		$soc		object company
     *      @param     string		$mode		'next' for next value or 'last' for last value
     *      @return    string					free ref or last ref
     */
    public function getNextNumRef($soc, $mode = 'next')
    {
    }
    /**
     * 	get the right way of payment
     *
     * 	@return 	string 	'dolibarr' if standard comportment or paid in main currency, 'customer' if payment received from multicurrency inputs
     */
    public function getWay()
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *	@param	string		$option		''=Create a specimen invoice with lines, 'nolines'=No lines
     *  @return	void
     */
    public function initAsSpecimen($option = '')
    {
    }
    /**
     *  Return clicable name (with picto eventually)
     *
     *	@param	int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     *	@param	string	$option			Sur quoi pointe le lien
     *  @param  string  $mode           'withlistofinvoices'=Include list of invoices into tooltip
     *  @param	int  	$notooltip		1=Disable tooltip
     *  @param	string	$morecss		Add more CSS
     *	@return	string					Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $mode = 'withlistofinvoices', $notooltip = 0, $morecss = '')
    {
    }
    /**
     * Retourne le libelle du statut d'une facture (brouillon, validee, abandonnee, payee)
     *
     * @param	int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     * @return  string				Libelle
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load the third party of object, from id into this->thirdparty.
     *  For payments, take the thirdparty linked to the first invoice found. This is enough because payments are done on invoices of the same thirdparty.
     *
     *	@param		int		$force_thirdparty_id	Force thirdparty id
     *	@return		int								<0 if KO, >0 if OK
     */
    public function fetch_thirdparty($force_thirdparty_id = 0)
    {
    }
}