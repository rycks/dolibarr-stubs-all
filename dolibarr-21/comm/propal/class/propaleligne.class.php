<?php

/**
 *	Class to manage commercial proposal lines
 */
class PropaleLigne extends \CommonObjectLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'propaldet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'propaldet';
    /**
     * @see CommonObjectLine
     */
    public $parent_element = 'propal';
    /**
     * @see CommonObjectLine
     */
    public $fk_parent_attribute = 'fk_propal';
    /**
     * @var PropaleLigne
     */
    public $oldline;
    // From llx_propaldet
    /**
     * @var int
     */
    public $fk_propal;
    /**
     * @var int
     */
    public $fk_parent_line;
    /**
     * @var string Line description
     */
    public $desc;
    /**
     * @var int Predefined product Id
     */
    public $fk_product;
    /**
     * @var int
     * @deprecated
     * @see $product_type
     */
    public $fk_product_type;
    /**
     * Product type.
     * @var int
     * @see Product::TYPE_PRODUCT, Product::TYPE_SERVICE
     */
    public $product_type = \Product::TYPE_PRODUCT;
    /**
     * @var float Quantity
     */
    public $qty;
    /**
     * @var float|string
     */
    public $tva_tx;
    /**
     * @var string
     */
    public $vat_src_code;
    /**
     * Unit price before taxes
     * @var float
     */
    public $subprice;
    /**
     * @var float|string
     */
    public $remise_percent;
    /**
     * @var int ID
     */
    public $fk_remise_except;
    /**
     * @var int line rank
     */
    public $rang = 0;
    /**
     * @var int
     */
    public $fk_fournprice;
    /**
     * @var float|int|string
     */
    public $pa_ht;
    /**
     * @var int|float|string
     */
    public $marge_tx;
    /**
     * @var float|string
     */
    public $marque_tx;
    /**
     * Tag for special lines (exclusive tags)
     * 1: shipping costs
     * 2: ecotaxe
     * 3: option line (when qty = 0)
     * @var int special code
     */
    public $special_code;
    /**
     * Some other info:
     * Bit 0: 	0 si TVA normal - 1 if TVA NPR
     * Bit 1:	0 ligne normal - 1 if line with fixed discount
     * @var int
     */
    public $info_bits = 0;
    /**
     * Total amount excluding taxes (HT = "Hors Taxe" in French) including discounts
     * @var float
     */
    public $total_ht;
    /**
     * Total VAT amount (TVA = "Taxe sur la Valeur Ajoutée" in French)
     * @var float
     */
    public $total_tva;
    /**
     * Total amount including taxes (TTC = "Toutes Taxes Comprises" in French)
     * @var float
     */
    public $total_ttc;
    /**
     * @var float|string
     * @deprecated
     * @see $remise_percent, $fk_remise_except
     */
    public $remise;
    /**
     * @var float|string
     * @deprecated
     * @see $subprice
     */
    public $price;
    // From llx_product
    /**
     * @var string
     * @deprecated
     * @see $product_ref
     */
    public $ref;
    /**
     * Product reference
     * @var string
     */
    public $product_ref;
    /**
     * @var string
     * @deprecated
     * @see $product_label
     */
    public $libelle;
    /**
     * @var string
     * @deprecated
     * @see $product_label
     */
    public $label;
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
     * Product use lot
     * @var int
     */
    public $product_tobatch;
    /**
     * Product barcode
     * @var string
     */
    public $product_barcode;
    /**
     * @var string|float
     */
    public $localtax1_tx;
    /**
     * @var string|float
     */
    public $localtax2_tx;
    /**
     * @var int|string Local tax 1 type
     */
    public $localtax1_type;
    /**
     * @var int|string Local tax 2 type
     */
    public $localtax2_type;
    /**
     * @var float Line total local tax 1
     */
    public $total_localtax1;
    /**
     * @var float Line total local tax 2
     */
    public $total_localtax2;
    /**
     * @var int|string
     */
    public $date_start;
    /**
     * @var int|string
     */
    public $date_end;
    /**
     * @var int Skip update price total for special lines
     */
    public $skip_update_total;
    // Multicurrency
    /**
     * @var int multicurrency id
     */
    public $fk_multicurrency;
    /**
     * @var string Multicurrency code
     */
    public $multicurrency_code;
    /**
     * @var float Multicurrency subprice
     */
    public $multicurrency_subprice;
    /**
     * @var float Multicurrency total without tax
     */
    public $multicurrency_total_ht;
    /**
     * @var float Multicurrency total vat
     */
    public $multicurrency_total_tva;
    /**
     * @var float Multicurrency total with tax
     */
    public $multicurrency_total_ttc;
    /**
     * 	Class line Constructor
     *
     * 	@param	DoliDB	$db	Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Retrieve the propal line object
     *
     *	@param	int		$rowid		Propal line id
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     *  Insert object line propal in database
     *
     *	@param		int<0,1>	$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function insert($notrigger = 0)
    {
    }
    /**
     * 	Delete line in database
     *
     *  @param	User	$user		Object user
     *	@param 	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return	 int  				Return integer <0 if ko, >0 if ok
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Update propal line object into DB
     *
     *	@param 	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return	int					Return integer <0 if ko, >0 if ok
     */
    public function update($notrigger = 0)
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
}