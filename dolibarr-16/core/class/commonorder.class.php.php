<?php

/**
 *      Superclass for orders classes
 */
abstract class CommonOrder extends \CommonObject
{
    use \CommonIncoterm;
}
/**
 *      Superclass for orders classes
 */
abstract class CommonOrderLine extends \CommonObjectLine
{
    /**
     * Custom label of line. Not used by default.
     * @deprecated
     */
    public $label;
    /**
     * Product ref
     * @var string
     * @deprecated Use product_ref
     * @see $product_ref
     */
    public $ref;
    /**
     * Product label
     * @var string
     * @deprecated Use product_label
     * @see $product_label
     */
    public $libelle;
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
     * Boolean that indicates whether the product is available for sale '1' or not '0'
     * @var int
     */
    public $product_tosell = 0;
    /**
     * Boolean that indicates whether the product is available for purchase '1' or not '0'
     * @var int
     */
    public $product_tobuy = 0;
    /**
     * Product description
     * @var string
     */
    public $product_desc;
    /**
     * Product use lot
     * @var string
     */
    public $product_tobatch;
    /**
     * Product barcode
     * @var string
     */
    public $product_barcode;
    /**
     * Quantity
     * @var float
     */
    public $qty;
    /**
     * Unit price
     * @deprecated
     * @see $subprice
     */
    public $price;
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
     * Description of the line
     * @var string
     */
    public $desc;
    /**
     * Id of corresponding product
     * @var int
     */
    public $fk_product;
    /**
     * Percent line discount
     * @var float
     */
    public $remise_percent;
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
    public $localtax1_type;
    public $localtax2_type;
    /**
     * Liste d'options cumulables:
     * Bit 0:	0 si TVA normal - 1 si TVA NPR
     * Bit 1:	0 si ligne normal - 1 si bit discount (link to line into llx_remise_except)
     * @var int
     */
    public $info_bits = 0;
    public $special_code = 0;
    public $fk_multicurrency;
    public $multicurrency_code;
    public $multicurrency_subprice;
    public $multicurrency_total_ht;
    public $multicurrency_total_tva;
    public $multicurrency_total_ttc;
}