<?php

/**
 * 	Superclass for invoices classes
 */
abstract class CommonInvoice extends \CommonObject
{
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
     *	@return		double					Remain of amount to pay
     */
    public function getRemainToPay($multicurrency = 0)
    {
    }
    /**
     * 	Return amount of payments already done. This must include ONLY the record into the payment table.
     *  Payments dones using discounts, credit notes, etc are not included.
     *
     *  @param 		int 	$multicurrency 	Return multicurrency_amount instead of amount
     *	@return		int						Amount of payment already done, <0 if KO
     */
    public function getSommePaiement($multicurrency = 0)
    {
    }
    /**
     *    	Return amount (with tax) of all deposits invoices used by invoice.
     *      Should always be empty, except if option FACTURE_DEPOSITS_ARE_JUST_PAYMENTS is on (not recommended).
     *
     * 		@param 		int 	$multicurrency 	Return multicurrency_amount instead of amount
     *		@return		int						<0 if KO, Sum of deposits amount otherwise
     */
    public function getSumDepositsUsed($multicurrency = 0)
    {
    }
    /**
     *    	Return amount (with tax) of all credit notes invoices + excess received used by invoice
     *
     * 		@param 		int 	$multicurrency 	Return multicurrency_amount instead of amount
     *		@return		int						<0 if KO, Sum of credit notes and deposits amount otherwise
     */
    public function getSumCreditNotesUsed($multicurrency = 0)
    {
    }
    /**
     *    	Return amount (with tax) of all converted amount for this credit note
     *
     * 		@param 		int 	$multicurrency 	Return multicurrency_amount instead of amount
     *		@return		int						<0 if KO, Sum of credit notes and deposits amount otherwise
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
     *	@return		int					<0 si KO, 0 if no invoice replaces it, id of invoice otherwise
     */
    public function getIdReplacingInvoice($option = '')
    {
    }
    /**
     *  Return list of payments
     *
     *	@param		string	$filtertype		1 to filter on type of payment == 'PRE'
     *  @return     array					Array with list of payments
     */
    public function getListOfPayments($filtertype = '')
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
     *  @return    int         <=0 if no, >0 if yes
     */
    public function is_erasable()
    {
    }
    /**
     *	Return if an invoice was dispatched into bookkeeping
     *
     *	@return     int         <0 if KO, 0=no, 1=yes
     */
    public function getVentilExportCompta()
    {
    }
    /**
     *	Return label of type of invoice
     *
     *	@return     string        Label of type of invoice
     */
    public function getLibType()
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
     *	@param		int		$type			Type invoice
     *	@return     string        			Label of status
     */
    public function LibStatut($paye, $status, $mode = 0, $alreadypaid = -1, $type = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Returns an invoice payment deadline based on the invoice settlement
     *  conditions and billing date.
     *
     *	@param      integer	$cond_reglement   	Condition of payment (code or id) to use. If 0, we use current condition.
     *  @return     integer    			       	Date limite de reglement si ok, <0 si ko
     */
    public function calculate_date_lim_reglement($cond_reglement = 0)
    {
    }
}
/**
 *	Parent class of all other business classes for details of elements (invoices, contracts, proposals, orders, ...)
 */
abstract class CommonInvoiceLine extends \CommonObjectLine
{
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
     * Type of the product. 0 for product 1 for service
     * @var int
     */
    public $product_type = 0;
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
     * Percent of discount
     * @var float
     */
    public $remise_percent;
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
     * List of cumulative options:
     * Bit 0:	0 si TVA normal - 1 si TVA NPR
     * Bit 1:	0 si ligne normal - 1 si bit discount (link to line into llx_remise_except)
     * @var int
     */
    public $info_bits = 0;
    /**
     *  Constructor
     *
     *  @param	DoliDB		$db		Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
}