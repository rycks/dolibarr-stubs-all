<?php

/**
 * 	Superclass for invoices classes
 */
abstract class CommonInvoice extends \CommonObject
{
    use \CommonIncoterm;
    /**
     * @var string		Label used as ref for template invoices
     */
    public $title;
    /**
     * @var int		Type of invoice (See TYPE_XXX constants)
     */
    public $type = self::TYPE_STANDARD;
    /**
     * @var int		Sub type of invoice (A subtype code coming from llx_invoice_subtype table. May be used by some countries like Greece)
     */
    public $subtype;
    /**
     * @var int Thirdparty ID
     * @deprecated
     * @see $socid
     */
    public $fk_soc;
    /**
     * @var int Thirdparty ID
     */
    public $socid;
    public $paye;
    /**
     * Invoice date (date)
     *
     * @var integer
     */
    public $date;
    public $date_lim_reglement;
    public $cond_reglement_id;
    // Id in llx_c_paiement
    public $cond_reglement_code;
    // Code in llx_c_paiement
    public $cond_reglement_label;
    public $cond_reglement_doc;
    // Code in llx_c_paiement
    public $mode_reglement_id;
    public $mode_reglement_code;
    // Code in llx_c_paiement
    /**
     * @var string
     */
    public $mode_reglement;
    /**
     * @var double
     */
    public $revenuestamp;
    public $totalpaid;
    // duplicate with sumpayed
    public $totaldeposits;
    // duplicate with sumdeposit
    public $totalcreditnotes;
    // duplicate with sumcreditnote
    public $sumpayed;
    public $sumpayed_multicurrency;
    public $sumdeposit;
    public $sumdeposit_multicurrency;
    public $sumcreditnote;
    public $sumcreditnote_multicurrency;
    public $remaintopay;
    /**
     * @var int
     */
    public $stripechargedone;
    /**
     * @var int
     */
    public $stripechargeerror;
    /**
     * Payment description
     * @var string
     */
    public $description;
    /**
     * @var string
     * @deprecated
     * @see $ref_customer
     */
    public $ref_client;
    /**
     * @var int Situation cycle reference number
     */
    public $situation_cycle_ref;
    /**
     * ! Closing after partial payment: discount_vat, badsupplier, abandon
     * ! Closing when no payment: replaced, abandoned
     * @var string Close code
     */
    public $close_code;
    /**
     * ! Comment if paid without full payment
     * @var string Close note
     */
    public $close_note;
    /**
     * ! Populate by Payment module like stripe
     * @var string message return by Online Payment module
     */
    public $postactionmessages;
    /**
     * Standard invoice
     */
    const TYPE_STANDARD = 0;
    /**
     * Replacement invoice
     */
    const TYPE_REPLACEMENT = 1;
    /**
     * Credit note invoice
     */
    const TYPE_CREDIT_NOTE = 2;
    /**
     * Deposit invoice
     */
    const TYPE_DEPOSIT = 3;
    /**
     * Proforma invoice.
     * @deprectad Remove this. A "proforma invoice" is an order with a look of invoice, not an invoice !
     */
    const TYPE_PROFORMA = 4;
    /**
     * Situation invoice
     */
    const TYPE_SITUATION = 5;
    /**
     * Draft status
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated (need to be paid)
     */
    const STATUS_VALIDATED = 1;
    /**
     * Classified paid.
     * If paid partially, $this->close_code can be:
     * - CLOSECODE_DISCOUNTVAT
     * - CLOSECODE_BADDEBT
     * If paid completelly, this->close_code will be null
     */
    const STATUS_CLOSED = 2;
    /**
     * Classified abandoned and no payment done.
     * $this->close_code can be:
     * - CLOSECODE_BADDEBT
     * - CLOSECODE_ABANDONED
     * - CLOSECODE_REPLACED
     */
    const STATUS_ABANDONED = 3;
    /**
     * 	Return remain amount to pay. Property ->id and ->total_ttc must be set.
     *  This does not include open direct debit requests.
     *
     *  @param 		int 	$multicurrency 	Return multicurrency_amount instead of amount
     *	@return		float					Remain of amount to pay
     */
    public function getRemainToPay($multicurrency = 0)
    {
    }
    /**
     * 	Return amount of payments already done. This must include ONLY the record into the payment table.
     *  Payments dones using discounts, credit notes, etc are not included.
     *
     *  @param 		int 			$multicurrency 		Return multicurrency_amount instead of amount. -1=Return both.
     *	@return		float|int|array						Amount of payment already done, <0 and set ->error if KO
     *  @see getSumDepositsUsed(), getSumCreditNotesUsed()
     */
    public function getSommePaiement($multicurrency = 0)
    {
    }
    /**
     *  Return amount (with tax) of all deposits invoices used by invoice.
     *  Should always be empty, except if option FACTURE_DEPOSITS_ARE_JUST_PAYMENTS is on for sale invoices (not recommended),
     *  of FACTURE_SUPPLIER_DEPOSITS_ARE_JUST_PAYMENTS is on for purchase invoices (not recommended).
     *
     * 	@param 		int 	$multicurrency 		Return multicurrency_amount instead of amount
     *	@return		float						Return integer <0 and set ->error if KO, Sum of deposits amount otherwise
     *	@see getSommePaiement(), getSumCreditNotesUsed()
     */
    public function getSumDepositsUsed($multicurrency = 0)
    {
    }
    /**
     *  Return amount (with tax) of all credit notes invoices + excess received used by invoice
     *
     * 	@param 		int 	$multicurrency 		Return multicurrency_amount instead of amount
     *	@return		float						Return integer <0 and set ->error if KO, Sum of credit notes and deposits amount otherwise
     *	@see getSommePaiement(), getSumDepositsUsed()
     */
    public function getSumCreditNotesUsed($multicurrency = 0)
    {
    }
    /**
     *    	Return amount (with tax) of all converted amount for this credit note
     *
     * 		@param 		int 	$multicurrency 	Return multicurrency_amount instead of amount
     *		@return		float						Return integer <0 if KO, Sum of credit notes and deposits amount otherwise
     */
    public function getSumFromThisCreditNotesNotUsed($multicurrency = 0)
    {
    }
    /**
     *	Returns array of credit note ids from the invoice
     *
     *	@return		array		Array of credit note ids
     */
    public function getListIdAvoirFromInvoice()
    {
    }
    /**
     *	Returns the id of the invoice that replaces it
     *
     *	@param		string	$option		status filter ('', 'validated', ...)
     *	@return		int					Return integer <0 si KO, 0 if no invoice replaces it, id of invoice otherwise
     */
    public function getIdReplacingInvoice($option = '')
    {
    }
    /**
     *  Return list of payments
     *
     *	@param		string	$filtertype		1 to filter on type of payment == 'PRE'
     *  @param      int     $multicurrency  Return multicurrency_amount instead of amount
     *  @return     array					Array with list of payments
     */
    public function getListOfPayments($filtertype = '', $multicurrency = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return if an invoice can be deleted
     *	Rule is:
     *  If invoice is draft and has a temporary ref -> yes (1)
     *  If hidden option INVOICE_CAN_NEVER_BE_REMOVED is on -> no (0)
     *  If invoice is dispatched in bookkeeping -> no (-1)
     *  If invoice has a definitive ref, is not last and INVOICE_CAN_ALWAYS_BE_REMOVED off -> no (-2)
     *  If invoice not last in a cycle -> no (-3)
     *  If there is payment -> no (-4)
     *  Otherwise -> yes (2)
     *
     *  @return    int         Return integer <=0 if no, >0 if yes
     */
    public function is_erasable()
    {
    }
    /**
     *	Return if an invoice was dispatched into bookkeeping
     *
     *	@return     int         Return integer <0 if KO, 0=no, 1=yes
     */
    public function getVentilExportCompta()
    {
    }
    /**
     * Return next reference of invoice not already used (or last reference)
     *
     * @param	 Societe	$soc		Thirdparty object
     * @param    string		$mode		'next' for next value or 'last' for last value
     * @return   string					free ref or last ref
     */
    public function getNextNumRef($soc, $mode = 'next')
    {
    }
    /**
     *	Return label of type of invoice
     *
     *	@param		int			$withbadge		1=Add span for badge css, 2=Add span and show short label
     *	@return     string        				Label of type of invoice
     */
    public function getLibType($withbadge = 0)
    {
    }
    /**
     *	Return label of invoice subtype
     *
     *  @param		string		$table          table of invoice
     *	@return     string|int     				Label of invoice subtype or -1 if error
     */
    public function getSubtypeLabel($table = '')
    {
    }
    /**
     *    	Retrieve a list of invoice subtype labels or codes.
     *
     *		@param	int		$mode		0=Return id+label, 1=Return code+id
     *    	@return array      			Array of subtypes
     */
    public function getArrayOfInvoiceSubtypes($mode = 0)
    {
    }
    /**
     *  Return label of object status
     *
     *  @param      int		$mode			0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=Long label + picto
     *  @param      integer	$alreadypaid    0=No payment already done, >0=Some payments were already done (we recommand to put here amount payed if you have it, 1 otherwise)
     *  @return     string			        Label of status
     */
    public function getLibStatut($mode = 0, $alreadypaid = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return label of a status
     *
     *	@param    	int  	$paye          	Status field paye
     *	@param      int		$status        	Id status
     *	@param      int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=long label + picto
     *	@param		integer	$alreadypaid	0=No payment already done, >0=Some payments were already done (we recommand to put here amount payed if you have it, -1 otherwise)
     *	@param		int		$type			Type invoice. If -1, we use $this->type
     *	@return     string        			Label of status
     */
    public function LibStatut($paye, $status, $mode = 0, $alreadypaid = -1, $type = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Returns an invoice payment deadline based on the invoice settlement
     *  conditions and billing date.
     *
     *	@param      integer	$cond_reglement   	Condition of payment (code or id) to use. If 0, we use current condition.
     *  @return     integer    			       	Date limit of payment if OK, <0 if KO
     */
    public function calculate_date_lim_reglement($cond_reglement = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Create a withdrawal request for a direct debit order or a credit transfer order.
     *  Use the remain to pay excluding all existing open direct debit requests.
     *
     *	@param      User	$fuser      				User asking the direct debit transfer
     *  @param		float	$amount						Amount we request direct debit for
     *  @param		string	$type						'direct-debit' or 'bank-transfer'
     *  @param		string	$sourcetype					Source ('facture' or 'supplier_invoice')
     *  @param		int		$checkduplicateamongall		0=Default (check among open requests only to find if request already exists). 1=Check also among requests completely processed and cancel if at least 1 request exists whatever is its status.
     *	@return     int         						Return integer <0 if KO, 0 if a request already exists, >0 if OK
     */
    public function demande_prelevement($fuser, $amount = 0, $type = 'direct-debit', $sourcetype = 'facture', $checkduplicateamongall = 0)
    {
    }
    /**
     *  Create a payment with Stripe card
     *  Must take amount using Stripe and record an event into llx_actioncomm
     *  Record bank payment
     *  Send email to customer ?
     *
     *	@param      User	$fuser      	User asking the direct debit transfer
     *  @param		int		$id				Invoice ID with remain to pay
     *  @param		string	$sourcetype		Source ('facture' or 'supplier_invoice')
     *	@return     int         			Return integer <0 if KO, >0 if OK
     */
    public function makeStripeCardRequest($fuser, $id, $sourcetype = 'facture')
    {
    }
    /**
     *  Create a direct debit order into prelevement_bons for a given prelevement_request, then
     *  Send the payment order to the service (for a direct debit order or a credit transfer order) and record an event in llx_actioncomm.
     *
     *	@param      User	$fuser      	User asking the direct debit transfer
     *  @param		int		$did			ID of unitary payment request to pay
     *  @param		string	$type			'direct-debit' or 'bank-transfer'
     *  @param		string	$sourcetype		Source ('facture' or 'supplier_invoice')
     *  @param		string	$service		'StripeTest', 'StripeLive', ...
     *  @param		string	$forcestripe	To force another stripe env: 'cus_account@pk_...:sk_...'
     *	@return     int         			Return integer <0 if KO, >0 if OK
     */
    public function makeStripeSepaRequest($fuser, $did, $type = 'direct-debit', $sourcetype = 'facture', $service = '', $forcestripe = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Remove a direct debit request or a credit transfer request
     *
     *  @param  User	$fuser      User making delete
     *  @param  int		$did        ID of request to delete
     *  @return	int					Return integer <0 if OK, >0 if KO
     */
    public function demande_prelevement_delete($fuser, $did)
    {
    }
    /**
     * Build string for ZATCA QR Code (Arabi Saudia)
     *
     * @return	string			String for ZATCA QR Code
     */
    public function buildZATCAQRString()
    {
    }
    /**
     * Build string for QR-Bill (Switzerland)
     *
     * @return	string			String for Switzerland QR Code if QR-Bill
     */
    public function buildSwitzerlandQRString()
    {
    }
}
/**
 *	Parent class of all other business classes for details of elements (invoices, contracts, proposals, orders, ...)
 */
abstract class CommonInvoiceLine extends \CommonObjectLine
{
    /**
     * Custom label of line. Not used by default.
     * @deprecated
     */
    public $label;
    /**
     * @deprecated
     * @see $product_ref
     */
    public $ref;
    // Product ref (deprecated)
    /**
     * @deprecated
     * @see $product_label
     */
    public $libelle;
    // Product label (deprecated)
    /**
     * Type of the product. 0 for product 1 for service
     * @var int
     */
    public $product_type = 0;
    /**
     * Product ref
     * @var string
     */
    public $product_ref;
    /**
     * Product label
     * @var string
     */
    public $product_label;
    /**
     * Product description
     * @var string
     */
    public $product_desc;
    /**
     * Quantity
     * @var double
     */
    public $qty;
    /**
     * Unit price before taxes
     * @var float
     */
    public $subprice;
    /**
     * Unit price before taxes
     * @var float
     * @deprecated
     */
    public $price;
    /**
     * Id of corresponding product
     * @var int
     */
    public $fk_product;
    /**
     * VAT code
     * @var string
     */
    public $vat_src_code;
    /**
     * VAT %
     * @var float
     */
    public $tva_tx;
    /**
     * Local tax 1 %
     * @var float
     */
    public $localtax1_tx;
    /**
     * Local tax 2 %
     * @var float
     */
    public $localtax2_tx;
    /**
     * Local tax 1 type
     * @var string
     */
    public $localtax1_type;
    /**
     * Local tax 2 type
     * @var string
     */
    public $localtax2_type;
    /**
     * Percent of discount
     * @var float
     */
    public $remise_percent;
    /**
     * Fixed discount
     * @var float
     * @deprecated
     */
    public $remise;
    /**
     * Total amount before taxes
     * @var float
     */
    public $total_ht;
    /**
     * Total VAT amount
     * @var float
     */
    public $total_tva;
    /**
     * Total local tax 1 amount
     * @var float
     */
    public $total_localtax1;
    /**
     * Total local tax 2 amount
     * @var float
     */
    public $total_localtax2;
    /**
     * Total amount with taxes
     * @var float
     */
    public $total_ttc;
    public $date_start_fill;
    // If set to 1, when invoice is created from a template invoice, it will also auto set the field date_start at creation
    public $date_end_fill;
    // If set to 1, when invoice is created from a template invoice, it will also auto set the field date_end at creation
    public $buy_price_ht;
    public $buyprice;
    // For backward compatibility
    public $pa_ht;
    // For backward compatibility
    public $marge_tx;
    public $marque_tx;
    /**
     * List of cumulative options:
     * Bit 0:	0 for common VAT - 1 if VAT french NPR
     * Bit 1:	0 si ligne normal - 1 si bit discount (link to line into llx_remise_except)
     * @var int
     */
    public $info_bits = 0;
    public $special_code = 0;
    public $fk_user_author;
    public $fk_user_modif;
    public $fk_accounting_account;
}