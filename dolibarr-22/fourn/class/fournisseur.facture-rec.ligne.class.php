<?php

/**
 *	Class to manage supplier invoice lines of templates.
 *  Saved into database table llx_facture_fourn_det_rec
 */
class FactureFournisseurLigneRec extends \CommonInvoiceLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'invoice_supplier_det_rec';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'facture_fourn_det_rec';
    /**
     * @var int
     */
    public $fk_facture_fourn;
    /**
     * @var int
     */
    public $fk_parent;
    /**
     * @var int
     */
    public $fk_product;
    /**
     * @var string
     */
    public $ref_supplier;
    /**
     * @var string
     */
    public $label;
    /**
     * @deprecated	Use desc
     * @var string
     */
    public $description;
    /**
     * @var float
     */
    public $pu_ht;
    /**
     * @var float
     */
    public $pu_ttc;
    /**
     * @var float Quantity
     */
    public $qty;
    /**
     * @var float
     */
    public $remise_percent;
    /**
     * @var int
     */
    public $fk_remise_except;
    /**
     * @var string
     */
    public $vat_src_code;
    /**
     * @var string|float
     */
    public $tva_tx;
    /**
     * @var float
     */
    public $localtax1_tx;
    /**
     * @var int<0, 6>
     */
    public $localtax1_type;
    /**
     * @var float
     */
    public $localtax2_tx;
    /**
     * @var int<0, 6>
     */
    public $localtax2_type;
    /**
     * @var int
     */
    public $product_type;
    /**
     * @var int
     */
    public $date_start;
    /**
     * @var int
     */
    public $date_end;
    /**
     * @var int
     */
    public $info_bits;
    /**
     * @var int special code
     */
    public $special_code;
    /**
     * @var int
     */
    public $rang;
    /**
     * @var int
     */
    public $fk_user_author;
    /**
     * @var int
     */
    public $fk_user_modif;
    /**
     * @var int
     */
    public $skip_update_total;
    /**
     *    Delete supplier order template line in database
     *
     * @param User $user Object user
     * @param int $notrigger Disable triggers
     * @return        int                    Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Get line of template invoice
     *
     *	@param		int 	$rowid		Id of invoice
     *	@return     int         		1 if OK, < 0 if KO
     */
    public function fetch($rowid)
    {
    }
    /**
     * 	Update a line to supplier invoice template .
     *
     *  @param		User	$user					User
     *  @param		int		$notrigger				No trigger
     *	@return    	int             				Return integer <0 if KO, Id of line if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
}