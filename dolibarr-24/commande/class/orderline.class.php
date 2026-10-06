<?php

/**
 *  Class to manage order lines
 */
class OrderLine extends \CommonOrderLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'commandedet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'commandedet';
    /**
     * @var OrderLine
     */
    public $oldline;
    /**
     * Id of parent order
     * @var int
     */
    public $fk_commande;
    /**
     * Id of parent order
     * @var int
     * @deprecated Use fk_commande
     * @see $fk_commande
     */
    public $commande_id;
    /**
     * @var int
     */
    public $fk_parent_line;
    /**
     * @var int Id of invoice
     */
    public $fk_facture;
    /**
     * @var string External ref
     */
    public $ref_ext;
    /**
     * @var int
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
     * Buy price without taxes
     * @var float|int|string	Can be '' when we do not provide any buying price.
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
     * @var float|string
     * @deprecated
     * @see $remise_percent, $fk_remise_except
     */
    public $remise;
    /**
     * Start date of line
     * @var int|''
     */
    public $date_start;
    /**
     * End date of line
     * @var int|''
     */
    public $date_end;
    /**
     * Skip update price total for special lines
     * @var int
     */
    public $skip_update_total;
    /**
     * @var float
     */
    public $packaging;
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,visible:int<-6,6>|string,langfile?:string,notnull?:int<-1,1>,noteditable?:int<0,1>,alwayseditable?:int<0,1>|string,default?:string|int,index?:int<0,1>,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,cssview?:string,csslist?:string,help?:string,helplist?:string,showoncombobox?:int<0,4>|string,disabled?:int<0,1>|string,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>|string,showonheader?:int<0,1>,searchmulti?:int<0,1>,picto?:string,required?:int<0,1>,placeholder?:string}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10), 'fk_commande' => array('type' => 'integer:Commande:commande/class/commande.class.php', 'label' => 'Order', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 15), 'fk_parent_line' => array('type' => 'integer:OrderLine:commande/class/orderline.class.php', 'label' => 'ParentLine', 'enabled' => 1, 'visible' => -1, 'position' => 20), 'fk_product' => array('type' => 'integer:Product:product/class/product.class.php:1', 'label' => 'ProductOrService', 'enabled' => "isModEnabled('product') || isModEnabled('service')", 'visible' => -1, 'position' => 25), 'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'enabled' => 1, 'visible' => -1, 'position' => 30), 'description' => array('type' => 'text', 'label' => 'Description', 'enabled' => 1, 'visible' => -1, 'position' => 35, 'searchall' => 1), 'vat_src_code' => array('type' => 'varchar(10)', 'label' => 'VatSrcCode', 'enabled' => 1, 'visible' => -1, 'position' => 40), 'tva_tx' => array('type' => 'double(7,4)', 'label' => 'VATRate', 'enabled' => 1, 'visible' => -1, 'position' => 45), 'localtax1_tx' => array('type' => 'double(7,4)', 'label' => 'LocalTax1Rate', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 50), 'localtax1_type' => array('type' => 'varchar(10)', 'label' => 'LocalTax1Type', 'enabled' => 1, 'visible' => -1, 'position' => 55), 'localtax2_tx' => array('type' => 'double(7,4)', 'label' => 'LocalTax2Rate', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 60), 'localtax2_type' => array('type' => 'varchar(10)', 'label' => 'LocalTax2Type', 'enabled' => 1, 'visible' => -1, 'position' => 65), 'qty' => array('type' => 'real', 'label' => 'Qty', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 70), 'remise_percent' => array('type' => 'real', 'label' => 'ReductionPercent', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 75), 'remise' => array('type' => 'real', 'label' => 'Remise', 'enabled' => 0, 'visible' => -2, 'default' => '0', 'position' => 80), 'fk_remise_except' => array('type' => 'integer:DiscountAbsolute:core/class/discount.class.php', 'label' => 'DiscountAbsolute', 'enabled' => 1, 'visible' => -1, 'position' => 85), 'price' => array('type' => 'real', 'label' => 'Price', 'enabled' => 0, 'visible' => -2, 'position' => 90), 'subprice' => array('type' => 'double(24,8)', 'label' => 'SubPrice', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 95), 'subprice_ttc' => array('type' => 'double(24,8)', 'label' => 'SubPriceTTC', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 100), 'total_ht' => array('type' => 'double(24,8)', 'label' => 'TotalHT', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 105, 'isameasure' => 1), 'total_tva' => array('type' => 'double(24,8)', 'label' => 'VAT', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 110, 'isameasure' => 1), 'total_localtax1' => array('type' => 'double(24,8)', 'label' => 'LocalTax1', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 115, 'isameasure' => 1), 'total_localtax2' => array('type' => 'double(24,8)', 'label' => 'LocalTax2', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 120, 'isameasure' => 1), 'total_ttc' => array('type' => 'double(24,8)', 'label' => 'TotalTTC', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 125, 'isameasure' => 1), 'product_type' => array('type' => 'integer', 'label' => 'TypeOfLineServiceOrProduct', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 130), 'date_start' => array('type' => 'datetime', 'label' => 'DateStart', 'enabled' => 1, 'visible' => -1, 'position' => 135), 'date_end' => array('type' => 'datetime', 'label' => 'DateEnd', 'enabled' => 1, 'visible' => -1, 'position' => 140), 'info_bits' => array('type' => 'integer', 'label' => 'InfoBits', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 145), 'buy_price_ht' => array('type' => 'double(24,8)', 'label' => 'BuyingPrice', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 150), 'fk_product_fournisseur_price' => array('type' => 'integer:ProductFournisseur:fourn/class/fournisseur.product.class.php', 'label' => 'SupplierPriceReference', 'enabled' => 1, 'visible' => -1, 'position' => 155), 'special_code' => array('type' => 'integer', 'label' => 'SpecialCode', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 160), 'rang' => array('type' => 'integer', 'label' => 'Rank', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 165), 'fk_unit' => array('type' => 'integer:CUnits:core/class/cunits.class.php', 'label' => 'Unit', 'enabled' => 1, 'visible' => -1, 'position' => 170), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 175), 'ref_ext' => array('type' => 'varchar(255)', 'label' => 'RefExt', 'enabled' => 1, 'visible' => 0, 'position' => 180), 'fk_commandefourndet' => array('type' => 'integer:CommandeFournisseurLigne:fourn/class/fournisseur.commande.class.php', 'label' => 'SupplierOrderLine', 'enabled' => 1, 'visible' => -1, 'position' => 185), 'fk_multicurrency' => array('type' => 'integer:MultiCurrency:multicurrency/class/multicurrency.class.php', 'label' => 'Currency', 'enabled' => 1, 'visible' => -1, 'position' => 190), 'multicurrency_code' => array('type' => 'varchar(3)', 'label' => 'CurrencyCode', 'enabled' => 1, 'visible' => -1, 'position' => 195), 'multicurrency_subprice' => array('type' => 'double(24,8)', 'label' => 'CurrencyUnitPrice', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 200), 'multicurrency_subprice_ttc' => array('type' => 'double(24,8)', 'label' => 'CurrencyUnitPriceTTC', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 205), 'multicurrency_total_ht' => array('type' => 'double(24,8)', 'label' => 'CurrencyTotalHT', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 210), 'multicurrency_total_tva' => array('type' => 'double(24,8)', 'label' => 'CurrencyTotalVAT', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 215), 'multicurrency_total_ttc' => array('type' => 'double(24,8)', 'label' => 'CurrencyTotalTTC', 'enabled' => 1, 'visible' => -1, 'default' => '0', 'position' => 220), 'extraparams' => array('type' => 'varchar(255)', 'label' => 'Extraparams', 'enabled' => 1, 'visible' => -1, 'position' => 225));
    // END MODULEBUILDER PROPERTIES
    /**
     *      Constructor
     *
     *      @param     DoliDB	$db      handler d'acces base de donnee
     */
    public function __construct($db)
    {
    }
    /**
     *  Load line order
     *
     *  @param  int		$rowid          Id line order
     *  @return	int						Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     * 	Delete line in database
     *
     *	@param      User	$user        	User that modify
     *  @param      int		$notrigger	    0=launch triggers after, 1=disable triggers
     *	@return	 int  Return integer <0 si ko, >0 si ok
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Insert line into database. This also set $this->id.
     *
     *	@param      User	$user        	User that modify
     *	@param      int		$notrigger		1 = disable triggers
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function insert($user = \null, $notrigger = 0)
    {
    }
    /**
     *	Update the line object into db
     *
     *	@param      User	$user        	User that modify
     *	@param      int		$notrigger		1 = disable triggers
     *	@return		int		Return integer <0 si ko, >0 si ok
     */
    public function update(\User $user, $notrigger = 0)
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