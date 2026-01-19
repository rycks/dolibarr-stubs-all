<?php

/**
 *	Class to manage invoice lines.
 *  Saved into database table llx_facturedet
 */
class FactureLigne extends \CommonInvoiceLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'facturedet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'facturedet';
    /**
     * @var FactureLigne
     */
    public $oldline;
    //! From llx_facturedet
    /**
     * @var int Id facture
     */
    public $fk_facture;
    /**
     * @var int Id parent line
     */
    public $fk_parent_line;
    /**
     * @var string Description ligne
     */
    public $desc;
    /**
     * @var string External reference of the line
     */
    public $ref_ext;
    /**
     * @var int<0,6>
     */
    public $localtax1_type;
    // Local tax 1 type
    /**
     * @var int<0,6>
     */
    public $localtax2_type;
    // Local tax 2 type
    /**
     * @var int
     */
    public $fk_remise_except;
    // Link to line into llx_remise_except
    /**
     * @var int
     */
    public $rang = 0;
    /**
     * @var int
     */
    public $fk_fournprice;
    /**
     * @var string|int|float
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
     * @var int
     */
    public $tva_npr;
    /**
     * @var float
     */
    public $remise_percent;
    /**
     * @var string		To store the batch to consume in stock when using a POS module
     */
    public $batch;
    /**
     * @var int		To store the warehouse where to consume stock when using a POS module
     */
    public $fk_warehouse;
    /**
     * @var string
     */
    public $origin;
    /**
     * @var int
     */
    public $origin_id;
    /**
     * @var int		Id in table llx_accounting_bookeeping to know accounting account for product line
     */
    public $fk_code_ventilation = 0;
    /**
     * @var string|int
     */
    public $date_start;
    /**
     * @var string|int
     */
    public $date_end;
    /**
     * @var int<0,1>
     */
    public $skip_update_total;
    // Skip update price total for special lines
    /**
     * @var float 		Situation advance percentage (default 100 for standard invoices)
     */
    public $situation_percent;
    /**
     * @var int 		Previous situation line id reference
     */
    public $fk_prev_id;
    /**
     *      Constructor
     *
     *      @param     DoliDB	$db      handler d'acces base de donnee
     */
    public function __construct($db)
    {
    }
    /**
     *	Load invoice line from database
     *
     *	@param	int		$rowid      id of invoice line to get
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     *	Insert line into database
     *
     *	@param	int<0,1>	$notrigger						1 no triggers
     *  @param	int<0,1>	$noerrorifdiscountalreadylinked	1=Do not make error if lines is linked to a discount and discount already linked to another
     *	@return	int											Return integer <0 if KO, >0 if OK
     */
    public function insert($notrigger = 0, $noerrorifdiscountalreadylinked = 0)
    {
    }
    /**
     *	Update line into database
     *
     *	@param		User	$user		User object
     *	@param		int		$notrigger	Disable triggers
     *	@return		int					Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     * Delete line in database
     *
     * @param 	User 	$tmpuser    User that deletes
     * @param 	int 	$notrigger  0=launch triggers after, 1=disable triggers
     * @return 	int		           	Return integer <0 if KO, >0 if OK
     */
    public function delete($tmpuser = \null, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update DB line fields total_xxx
     *	Used by migration
     *
     *	@return		int		Return integer <0 if KO, >0 if OK
     */
    public function update_total()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Returns situation_percent of the previous line. Used when INVOICE_USE_SITUATION = 1.
     * Warning: If invoice is a replacement invoice, this->fk_prev_id is id of the replaced line.
     *
     * @param  int     $invoiceid      			Invoice id
     * @param  bool    $include_credit_note		Include credit note or not
     * @return float|int                     	Return previous situation percent, 0 or -1 if error
     * @see get_allprev_progress()
     **/
    public function get_prev_progress($invoiceid, $include_credit_note = \true)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Returns situation_percent of all the previous line. Used when INVOICE_USE_SITUATION = 2.
     * Warning: If invoice is a replacement invoice, this->fk_prev_id is id of the replaced line.
     *
     * @param  int     $invoiceid      Invoice id
     * @param  bool    $include_credit_note		Include credit note or not
     * @return float                   >= 0
     * @see get_prev_progress()
     */
    public function getAllPrevProgress($invoiceid, $include_credit_note = \true)
    {
    }
}