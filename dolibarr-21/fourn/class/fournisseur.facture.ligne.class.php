<?php

/**
 *  Class to manage line invoices
 */
class SupplierInvoiceLine extends \CommonObjectLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'facture_fourn_det';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'facture_fourn_det';
    /**
     * @see CommonObjectLine
     */
    public $parent_element = 'facture_fourn';
    /**
     * @see CommonObjectLine
     */
    public $fk_parent_attribute = 'fk_facture_fourn';
    /**
     * @var static
     */
    public $oldline;
    /**
     * @var string
     * @deprecated See $product_ref
     * @see $product_ref
     */
    public $ref;
    /**
     * Internal ref
     * @var string
     */
    public $product_ref;
    /**
     * Supplier reference of price when we added the line. May have been changed after line was added.
     * TODO Rename field ref to ref_supplier into table llx_facture_fourn_det and llx_commande_fournisseurdet and update fields into updateline
     * @var string
     */
    public $ref_supplier;
    /**
     * Product description
     * @var string
     */
    public $product_desc;
    /**
     * Unit price before taxes
     * @var float
     * @deprecated Use $subprice
     * @see $subprice
     */
    public $pu_ht;
    /**
     * Unit price excluded taxes
     * @var float
     */
    public $subprice;
    /**
     * Unit price included taxes
     * @var float
     */
    public $pu_ttc;
    /**
     * Id of the corresponding supplier invoice
     * @var int
     */
    public $fk_facture_fourn;
    /**
     * This field may contains label of line (when invoice create from order)
     * @var string
     * @deprecated  Use $product_label
     */
    public $label;
    /**
     * Description of the line
     * @var string
     * @deprecated		Use $desc
     */
    public $description;
    /**
     * @var int|string
     */
    public $date_start;
    /**
     * @var int|string
     */
    public $date_end;
    /**
     * @var int
     */
    public $fk_code_ventilation;
    /**
     * @var int<0,1>
     */
    public $skip_update_total;
    // Skip update price total for special lines
    /**
     * @var float 	Situation progress percentage
     */
    public $situation_percent;
    /**
     * @var int 	Previous situation line id reference
     */
    public $fk_prev_id;
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
     * Quantity
     * @var float
     */
    public $qty;
    /**
     * Percent of discount
     * @var float|string
     */
    public $remise_percent;
    /**
     * Buying price value
     * @var float
     */
    public $pa_ht;
    /**
     * Total amount without taxes
     * @var float
     */
    public $total_ht;
    /**
     * Total amount with taxes
     * @var float
     */
    public $total_ttc;
    /**
     * Total amount of taxes
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
     * @var int ID
     */
    public $fk_product;
    /**
     * Type of the product. 0 for product 1 for service
     * @var int
     */
    public $product_type;
    /**
     * Label of the product
     * @var string
     */
    public $product_label;
    /**
     * List of cumulative options:
     * Bit 0:	0 si TVA normal - 1 si TVA NPR
     * Bit 1:	0 si ligne normal - 1 si bit discount (link to line into llx_remise_except)
     * @var int
     */
    public $info_bits;
    /**
     * Link to line into llx_remise_except
     * @var int
     */
    public $fk_remise_except;
    /**
     * @var int ID
     */
    public $fk_parent_line;
    /**
     * @var int special code
     */
    public $special_code;
    /**
     * @var int rank of line
     */
    public $rang;
    /**
     * Total local tax 1 amount
     * @var float
     */
    public $localtax1_type;
    /**
     * Total local tax 2 amount
     * @var float
     */
    public $localtax2_type;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Retrieves a supplier invoice line
     *
     * @param    int    $rowid    Line id
     * @return   int              Return integer <0 KO; 0 NOT FOUND; 1 OK
     */
    public function fetch($rowid)
    {
    }
    /**
     * Deletes a line
     *
     * @param     int   $notrigger     1=Does not execute triggers, 0=execute triggers
     * @return    int                  0 if KO, 1 if OK
     */
    public function delete($notrigger = 0)
    {
    }
    /**
     * Update a supplier invoice line
     *
     * @param int $notrigger Disable triggers
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function update($notrigger = 0)
    {
    }
    /**
     *	Insert line into database
     *
     *	@param      int		$notrigger							1 no triggers
     *  @param      int     $noerrorifdiscountalreadylinked  	1=Do not make error if lines is linked to a discount and discount already linked to another
     *	@return		int											Return integer <0 if KO, >0 if OK
     */
    public function insert($notrigger = 0, $noerrorifdiscountalreadylinked = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Mise a jour de l'objet ligne de commande en base
     *
     *  @return		int		Return integer <0 si ko, >0 si ok
     */
    public function update_total()
    {
    }
}