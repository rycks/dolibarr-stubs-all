<?php

/**
 * 	Superclass for invoice classes
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
     * @deprecated Use $socid
     * @see $socid
     */
    public $fk_soc;
    /**
     * @var int Thirdparty ID
     */
    public $socid;
    /**
     * @var int<0,1>
     */
    public $paye;
    /**
     * Invoice date (date)
     *
     * @var int
     */
    public $date;
    /**
     * @var int Deadline for payment
     */
    public $date_lim_reglement;
    /**
     * @var ?int		Payment term ID
     */
    public $cond_reglement_id;
    // Id in llx_c_paiement
    /**
     * @var string|int 	Code in llx_c_paiement
     */
    public $cond_reglement_code;
    // Code in llx_c_paiement
    /**
     * @var string		Label in llx_c_paiement
     */
    public $cond_reglement_label;
    /**
     * @var string 		Label for doc in llx_c_paiement
     */
    public $cond_reglement_doc;
    /**
     * @var ?int 		Payment method ID (cheque, cash, ...)
     */
    public $mode_reglement_id;
    /**
     * @var string Code in llx_c_paiement
     */
    public $mode_reglement_code;
    /**
     * @var string
     */
    public $mode_reglement;
    /**
     * @var float
     */
    public $total_ht;
    /**
     * @var float
     */
    public $total_tva;
    /**
     * @var float
     */
    public $total_localtax1;
    /**
     * @var float
     */
    public $total_localtax2;
    /**
     * @var float
     */
    public $total_ttc;
    /**
     * @var float|null
     */
    public $revenuestamp;
    /**
     * @var float
     */
    public $totalpaid;
    // duplicate with sumpayed
    /**
     * @var int|float
     */
    public $totaldeposits;
    // duplicate with sumdeposit
    /**
     * @var int|float
     */
    public $totalcreditnotes;
    // duplicate with sumcreditnote
    /**
     * @var int|float
     */
    public $sumpayed;
    /**
     * @var int|float
     */
    public $sumpayed_multicurrency;
    /**
     * @var int|float
     */
    public $sumdeposit;
    /**
     * @var int|float
     */
    public $sumdeposit_multicurrency;
    /**
     * @var int|float
     */
    public $sumcreditnote;
    /**
     * @var int|float
     */
    public $sumcreditnote_multicurrency;
    /**
     * @var int|float|string	May be used for status
     */
    public $remaintopay;
    /**
     * @var int					May be used for status
     */
    public $nbofopendirectdebitorcredittransfer;
    /**
     * @var int[] return of getListIdAvoirFromInvoice()
     */
    public $creditnote_ids;
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
     * ! Closing after partial payment: CLOSECODE_DISCOUNTVAT, CLOSECODE_BADDEBT, CLOSECODE_BANKCHARGE, CLOSECODE_OTHER
     * ! Closing when no payment: CLOSECODE_ABANDONED, CLOSECODE_REPLACED
     * @var string Close code
     */
    public $close_code;
    /**
     * ! Comment if paid without full payment
     * @var string Close note
     */
    public $close_note;
    /**
     * ! Populated by payment modules like Stripe
     * @var string[] 	Messages returned by an online payment module
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
     * @deprecated Remove this. A "proforma invoice" is an order with a look of invoice, not an invoice !
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
     * If paid completely, this->close_code will be null
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
    const CLOSECODE_DISCOUNTVAT = 'discount_vat';
    // Abandoned remain - escompte
    const CLOSECODE_BADDEBT = 'badcustomer';
    // Abandoned remain - bad customer
    const CLOSECODE_BANKCHARGE = 'bankcharge';
    // Abandoned remain - bank charge
    const CLOSECODE_WITHHOLDINGTAX = 'withholdingtax';
    // Abandoned remain - source tax
    const CLOSECODE_OTHER = 'other';
    // Abandoned remain - other
    const CLOSECODE_ABANDONED = 'abandon';
    // Abandoned - other
    const CLOSECODE_REPLACED = 'replaced';
    // Closed after doing a replacement invoice
    /**
     * 	Return remain amount to pay. Property ->id and ->total_ttc must be set.
     *  This does not include open direct debit requests.
     *
     *  @param 		int 	$multicurrency 	Return multicurrency_amount instead of amount
     *	@return		float|string			Remain of amount to pay
     */
    public function getRemainToPay($multicurrency = 0)
    {
    }
    /**
     * 	Return amount of payments already done. This must include ONLY the record into the payment table.
     *  Payments done using discounts, credit notes, etc are not included.
     *  This also set ->sumpayed and ->sumpayed_multicurrency
     *
     *  @param 		int<-1,1>		$multicurrency 		Return multicurrency_amount instead of amount. -1=Return both.
     *	@return		float|int|array{alreadypaid:float,alreadypaid_multicurrency:float}	Amount of payment already done, <0 and set ->error if KO
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
     *	@return		float|string				Return string 'Error...' and set ->error if KO, Sum of credit notes and deposits amount otherwise
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
     *	@return		int[]		Array of credit note ids
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
     *  Return list of open direct debit or credit transfer
     *
     *  @param		'bank-transfer'|'direct-debit'		$type		'bank-transfer' or 'direct-debit'
     *  @return     array<array{id:int,invoiceid:int,date:''|int,amount:float}>		 Array with list of payments
     */
    public function getListOfOpenDirectDebitOrCreditTransfer($type)
    {
    }
    /**
     *  Return list of payments
     *
     *  @see $error Empty string '' if no error.
     *
     *	@param		string	$filtertype			1 to filter on type of payment == 'PRE' for the payment lines
     *  @param      int     $multicurrency  	Return multicurrency_amount instead of amount
     *  @param		int		$mode				0=payments + discount, 1=payments only
     *  @return     array<array{amount:int|float,date:int,num:string,ref:string,ref_ext?:string,fk_bank_line?:int,type:string}>		 Array with list of payments
     */
    public function getListOfPayments($filtertype = '', $multicurrency = 0, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return if an invoice can be deleted
     *	Rule is:
     *  If invoice is draft and has a temporary ref -> yes (1)
     *  If hidden option INVOICE_CAN_NEVER_BE_REMOVED is 1 -> no (0)
     *  If invoice is transferred in bookkeeping -> no (-1)
     *  If invoice has a definitive ref, is not last in ref and INVOICE_CAN_ALWAYS_BE_REMOVED off -> no (-2)
     *  If invoice has a definitive ref, is not last in a situation cycle and INVOICE_CAN_ALWAYS_BE_REMOVED off  -> no (-3)
     *  If there is one payment and INVOICE_CAN_ALWAYS_BE_REMOVED off  -> no (-4)
     *  Otherwise -> yes (2)
     *
     *  @return    int         Return integer <=0 if no, >0 if yes
     */
    public function is_erasable()
    {
    }
    /**
     *	Return if an invoice was transferred into accountnancy.
     *  This is true if at least on line was transferred into table accounting_bookkeeping
     *
     *	@param		int		$mode		0=Return nb of record, 1=return the transaction ID (piece_num)
     *	@return     int         		Return integer <0 if KO, 0=no, nb transaction=yes or ID transaction
     */
    public function getVentilExportCompta($mode = 0)
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
     *		@param	int<0,1>	$mode		0=Return id+label, 1=Return code+id
     *    	@return array<int,string>|array<string,int>		Array of subtypes
     */
    public function getArrayOfInvoiceSubtypes($mode = 0)
    {
    }
    /**
     *  Return label of object status
     *
     *  @param      int			$mode			0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=Long label + picto
     *  @param      int|float	$alreadypaid    0=No payment already done, >0=Some payments were already done (we recommend to put here float amount paid if you have it, 1 otherwise)
     *  @return     string			        	Label of status
     */
    public function getLibStatut($mode = 0, $alreadypaid = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return label of a status
     *
     *	@param    	int			$paye          	Field to 1 if invoice is closed (TODO Detect this using $status instead of using this param).
     *	@param      int			$status        	ID status
     *	@param      int<0,6>	$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=long label + picto
     *	@param		int|float	$alreadypaid	0=No payment already done, >0=Some payments were already done (we recommend to put here float amount paid if you have it, -1 otherwise)
     *	@param		int			$type			Type invoice. If -1, we use $this->type
     *  @param		int|array<string,int|string>	$moreparams		More params. Example: array('nbofopendirectdebitorcredittransfer' => x) for nb of open direct debit or credit transfer
     *	@return     string						Label of status
     */
    public function LibStatut($paye, $status, $mode = 0, $alreadypaid = -1, $type = -1, $moreparams = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Returns an invoice payment deadline based on the invoice settlement
     *  conditions and billing date.
     *
     *	@param      int			$cond_reglement   	Condition of payment (code or id) to use. If 0, we use current condition.
     *  @return     int|string    			       	Date limit of payment if OK, <0 or string if KO
     */
    public function calculate_date_lim_reglement($cond_reglement = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Create a withdrawal request for a direct debit order or a credit transfer order.
     *  Use the remain to pay excluding all existing open direct debit requests.
     *
     *	@param	User	$fuser      				User asking the direct debit transfer
     *  @param	float	$amount						Amount we request direct debit for
     *  @param	string	$type						'direct-debit' or 'bank-transfer'
     *  @param	string	$sourcetype					Source ('facture' or 'supplier_invoice')
     *  @param	int	    $checkduplicateamongall		0=Default (check among open requests only to find if request already exists). 1=Check also among requests completely processed and cancel if at least 1 request exists whatever is its status.
     *  @param  int     $ribId						If defined, will use this ID to get the RIB. Otherwise, the default RIB will be taken.
     *  @return int         						Return integer <0 if KO, 0 if a request already exists, >0 if OK
     */
    public function demande_prelevement(\User $fuser, float $amount = 0, string $type = 'direct-debit', string $sourcetype = 'facture', int $checkduplicateamongall = 0, int $ribId = 0)
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
     * Build string for EPC QR Code
     *
     * @return	string			String for EPC QR Code
     */
    public function buildEPCQrCodeString()
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
     * @var string
     */
    public $label;
    /**
     * @deprecated Use $product_ref
     * @see $product_ref
     * @var string
     */
    public $ref;
    // Product ref (deprecated)
    /**
     * @var string
     * @deprecated Use $product_label
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
     * @var float
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
     * VAT %  Vat rate can be like "21.30 (CODE)"
     * @var float|string
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
     * @var int<0,6>		From 1 to 6, or 0 if not found
     * @see getLocalTaxesFromRate()
     */
    public $localtax1_type;
    /**
     * Local tax 2 type
     * @var int<0,6>		From 1 to 6, or 0 if not found
     * @see getLocalTaxesFromRate()
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
    /**
     * @var float|null
     */
    public $revenuestamp;
    /**
     * @var int<0,1>
     */
    public $date_start_fill;
    // If set to 1, when invoice is created from a template invoice, it will also auto set the field date_start at creation
    /**
     * @var int<0,1>
     */
    public $date_end_fill;
    // If set to 1, when invoice is created from a template invoice, it will also auto set the field date_end at creation
    /**
     * @var float
     */
    public $buy_price_ht;
    /**
     * @var float
     * @deprecated For backward compatibility
     */
    public $buyprice;
    /**
     * @var float|int|string
     * @deprecated For backward compatibility
     */
    public $pa_ht;
    /**
     * @var string
     */
    public $marge_tx;
    /**
     * @var string
     */
    public $marque_tx;
    /**
     * List of cumulative options:
     * Bit 0:	0 for common VAT - 1 if VAT french NPR
     * Bit 1:	0 si ligne normal - 1 si bit discount (link to line into llx_remise_except)
     * @var int
     */
    public $info_bits = 0;
    /**
     * List of special options to define line:
     * 1: shipment cost lines
     * 2: ecotaxe
     * 3: ??
     * id of module: a meaning for the module
     *  @var int
     */
    public $special_code = 0;
    /**
     * @var int
     * @deprecated	Use user_creation_id
     */
    public $fk_user_author;
    /**
     * @var int
     * @deprecated	Use user_modification_id
     */
    public $fk_user_modif;
    /**
     * @var int
     */
    public $fk_code_ventilation;
}