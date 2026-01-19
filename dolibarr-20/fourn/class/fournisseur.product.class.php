<?php

/**
 * 	Class to manage predefined suppliers products
 */
class ProductFournisseur extends \Product
{
    /**
     * @var DoliDB		Database handler.
     */
    public $db;
    /**
     * @var string		Error code (or message)
     */
    public $error = '';
    /**
     * @var int			ID of ligne product-supplier
     */
    public $product_fourn_price_id;
    /**
     * @var int			ID
     */
    public $id;
    /**
     * @deprecated
     * @see $ref_supplier
     */
    public $fourn_ref;
    /**
     * @var int			The product lead time in days.
     */
    public $delivery_time_days;
    /**
     * @var string		The product reference of the supplier. Can be set by get_buyprice().
     */
    public $ref_supplier;
    /**
     * @var string		The product description of the supplier.
     */
    public $desc_supplier;
    /**
     * @var float		The VAT rate by default for this {supplier, qty, product}. Can be set by get_buyprice().
     */
    public $vatrate_supplier;
    /**
     * @deprecated
     * @see $product_id
     */
    public $fk_product;
    /**
     * @var int			The product ID.
     */
    public $product_id;
    /**
     * @var string		The product reference.
     */
    public $product_ref;
    /**
     * @var int			The supplier ID.
     */
    public $fourn_id;
    /**
     * @var string		The supplier name.
     */
    public $fourn_name;
    /**
     * @var float		The Minimum Order Quantity (MOQ) for a given unit price. Can be set by get_buyprice().
     */
    public $fourn_qty;
    /**
     * @var float		The unit price for a given Minimum Order Quantity (MOQ). Can be set by get_buyprice().
     */
    public $fourn_pu;
    /**
     * @var float		The total price for a given Minimum Order Quantity (MOQ).
     */
    public $fourn_price;
    /**
     * @var float		The discount in percentage for a given Minimum Order Quantity (MOQ).
     */
    public $fourn_remise_percent;
    /**
     * @var float		The discount in value for a given Minimum Order Quantity (MOQ).
     */
    public $fourn_remise;
    public $fourn_charges;
    // when getDolGlobalString('PRODUCT_CHARGES') is set
    /**
     * @var int		product-supplier id
     */
    public $product_fourn_id;
    public $product_fourn_entity;
    /**
     * @var int ID user_id - user who created/updated supplier price
     */
    public $user_id;
    /**
     * @var int ID availability delay - visible/used if option FOURN_PRODUCT_AVAILABILITY is on (duplicate information compared to delivery delay)
     */
    public $fk_availability;
    public $fourn_unitprice;
    public $fourn_unitprice_with_discount;
    // not saved into database
    public $fourn_tva_tx;
    public $fourn_tva_npr;
    /**
     * @var int ID
     */
    public $fk_supplier_price_expression;
    /**
     * @var string reputation of supplier
     */
    public $supplier_reputation;
    /**
     * @var string[] list of available supplier reputations
     */
    public $reputations = array();
    // Multicurreny
    public $fourn_multicurrency_id;
    public $fourn_multicurrency_code;
    public $fourn_multicurrency_tx;
    public $fourn_multicurrency_price;
    public $fourn_multicurrency_unitprice;
    /**
     * @deprecated
     * @see $supplier_barcode
     */
    public $fourn_barcode;
    /**
     * @var string $supplier_barcode - Supplier barcode
     */
    public $supplier_barcode;
    /**
     * @deprecated
     * @see $supplier_fk_barcode_type
     */
    public $fourn_fk_barcode_type;
    /**
     * @var string $supplier_fk_barcode_type - Supplier barcode type
     */
    public $supplier_fk_barcode_type;
    public $packaging;
    public $labelStatusShort;
    public $labelStatus;
    const STATUS_OPEN = 1;
    const STATUS_CANCELED = 0;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Remove all prices for this couple supplier-product
     *
     *    @param	int		$id_fourn   Supplier Id
     *    @return   int         		Return integer < 0 if error, > 0 if ok
     */
    public function remove_fournisseur($id_fourn)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Remove a price for a couple supplier-product
     *
     * 	@param	int		$rowid		Line id of price
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function remove_product_fournisseur_price($rowid)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Modify the purchase price for a supplier
     *
     *    @param  	float		$qty				            Min quantity for which price is valid
     *    @param  	float		$buyprice			            Purchase price for the quantity min
     *    @param  	User		$user				            Object user user made changes
     *    @param  	string		$price_base_type	            HT or TTC
     *    @param  	Societe		$fourn				            Supplier
     *    @param  	int			$availability		            Product availability
     *    @param	string		$ref_fourn			            Supplier ref
     *    @param	float		$tva_tx				            New VAT Rate (For example 8.5. Should not be a string)
     *    @param  	string|float $charges			            costs affering to product
     *    @param  	float		$remise_percent		            Discount  regarding qty (percent)
     *    @param  	float		$remise				            Discount  regarding qty (amount)
     *    @param  	int			$newnpr				            Set NPR or not
     *    @param	int			$delivery_time_days	            Delay in days for delivery (max). May be '' if not defined.
     * 	  @param    string      $supplier_reputation            Reputation with this product to the defined supplier (empty, FAVORITE, DONOTORDER)
     *	  @param    array		$localtaxes_array	            Array with localtaxes info array('0'=>type1,'1'=>rate1,'2'=>type2,'3'=>rate2) (loaded by getLocalTaxesFromRate(vatrate, 0, ...) function).
     *    @param    string  	$newdefaultvatcode              Default vat code
     *    @param  	float		$multicurrency_buyprice 	    Purchase price for the quantity min in currency
     *    @param  	string		$multicurrency_price_base_type	HT or TTC in currency
     *    @param  	float		$multicurrency_tx	            Rate currency
     *    @param  	string		$multicurrency_code	            Currency code
     *    @param  	string		$desc_fourn     	            Custom description for product_fourn_price
     *    @param  	string		$barcode     	                Barcode
     *    @param  	int		    $fk_barcode_type     	        Barcode type
     *    @param  	array		$options		     	       	Extrafields of product fourn price
     *    @return	int											Return integer <0 if KO, >=0 if OK
     */
    public function update_buyprice($qty, $buyprice, $user, $price_base_type, $fourn, $availability, $ref_fourn, $tva_tx, $charges = 0, $remise_percent = 0, $remise = 0, $newnpr = 0, $delivery_time_days = 0, $supplier_reputation = '', $localtaxes_array = array(), $newdefaultvatcode = '', $multicurrency_buyprice = 0, $multicurrency_price_base_type = 'HT', $multicurrency_tx = 1, $multicurrency_code = '', $desc_fourn = '', $barcode = '', $fk_barcode_type = 0, $options = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Loads the price information of a provider
     *
     *    @param    int     $rowid              Line id
     *    @param    int     $ignore_expression  Ignores the math expression for calculating price and uses the db value instead
     *    @return   int 					    Return integer < 0 if KO, 0 if OK but not found, > 0 if OK
     */
    public function fetch_product_fournisseur_price($rowid, $ignore_expression = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    List all supplier prices of a product
     *
     *    @param    int			$prodid	    Id of product
     *    @param	string		$sortfield	Sort field
     *    @param	string		$sortorder	Sort order
     *    @param	int			$limit		Limit
     *    @param	int			$offset		Offset
     *    @param	int			$socid		Filter on a third party id
     *    @return	array|int				Array of ProductFournisseur with new properties to define supplier price
     *    @see find_min_price_product_fournisseur()
     */
    public function list_product_fournisseur_price($prodid, $sortfield = '', $sortorder = '', $limit = 0, $offset = 0, $socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load properties for minimum price
     *
     *  @param	int		$prodid	    Product id
     *  @param	float	$qty		Minimum quantity
     *  @param	int		$socid		get min price for specific supplier
     *  @return int					Return integer <0 if KO, 0=Not found of no product id provided, >0 if OK
     *  @see list_product_fournisseur_price()
     */
    public function find_min_price_product_fournisseur($prodid, $qty = 0, $socid = 0)
    {
    }
    /**
     *  Sets the supplier price expression
     *
     *  @param  int     $expression_id	Expression
     *  @return int                 	Return integer <0 if KO, >0 if OK
     */
    public function setSupplierPriceExpression($expression_id)
    {
    }
    /**
     *	Display supplier of product
     *
     *	@param	int		$withpicto		Add picto
     *	@param	string	$option			Target of link ('', 'customer', 'prospect', 'supplier')
     *	@param	int		$maxlen			Max length of name
     *  @param	integer	$notooltip		1=Disable tooltip
     *	@return	string					String with supplier price
     *  TODO Remove this method. Use getNomUrl directly.
     */
    public function getSocNomUrl($withpicto = 0, $option = 'supplier', $maxlen = 0, $notooltip = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Display price of product
     *
     *  @param  int     $showunitprice    Show "Unit price" into output string
     *  @param  int     $showsuptitle     Show "Supplier" into output string
     *  @param  int     $maxlen           Max length of name
     *  @param  integer $notooltip        1=Disable tooltip
     *  @param  array   $productFournList list of ProductFournisseur objects
     *                                    to display in table format.
     *  @return string                    String with supplier price
     */
    public function display_price_product_fournisseur($showunitprice = 1, $showsuptitle = 1, $maxlen = 0, $notooltip = 0, $productFournList = array())
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param 	DoliDB 	$dbs 		Database handler, because function is static we name it $dbs not $db to avoid breaking coding test
     * @param 	int 	$origin_id 	Old thirdparty id
     * @param 	int 	$dest_id 	New thirdparty id
     * @return 	bool
     */
    public static function replaceThirdparty(\DoliDB $dbs, $origin_id, $dest_id)
    {
    }
    /**
     * Function used to replace a product id with another one.
     *
     * @param 	DoliDB 	$dbs 		Database handler, because function is static we name it $dbs not $db to avoid breaking coding test
     * @param 	int 	$origin_id 	Old thirdparty id
     * @param 	int 	$dest_id 	New thirdparty id
     * @return 	bool
     */
    public static function replaceProduct(\DoliDB $dbs, $origin_id, $dest_id)
    {
    }
    /**
     *    List supplier prices log of a supplier price
     *
     *    @param    int     $product_fourn_price_id Id of supplier price
     *    @param	string  $sortfield	            Sort field
     *    @param	string  $sortorder              Sort order
     *    @param	int     $limit                  Limit
     *    @param	int     $offset                 Offset
     *    @return	array|int   Array of Log prices
     */
    public function listProductFournisseurPriceLog($product_fourn_price_id, $sortfield = '', $sortorder = '', $limit = 0, $offset = 0)
    {
    }
    /**
     *	Display log price of product supplier price
     *
     *  @param  array   $productFournLogList    list of ProductFournisseur price log objects
     *                                          to display in table format.
     *  @return string  HTML String with supplier price
     */
    public function displayPriceProductFournisseurLog($productFournLogList = array())
    {
    }
    /**
     *  Return a link to the object card (with optionally the picto).
     *  Used getNomUrl of ProductFournisseur if a specific supplier ref is loaded. Otherwise use Product->getNomUrl().
     *
     *	@param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option						On what the link point to ('nolink', ...)
     *  @param	int		$maxlength					Maxlength of ref
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param	int		$notooltip					No tooltip
     *  @param  string  $morecss            		''=Add more css on link
     *  @param	int		$add_label					0=Default, 1=Add label into string, >1=Add first chars into string
     *  @param	string	$sep						' - '=Separator between ref and label if option 'add_label' is set
     *	@return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $maxlength = 0, $save_lastsearch_value = -1, $notooltip = 0, $morecss = '', $add_label = 0, $sep = ' - ')
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @param	int		$type			Type of product
     *  @return	string 			       	Label of status
     */
    public function getLibStatut($mode = 0, $type = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the status
     *
     *  @param	int		$status        	Id status
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @param	int		$type			Type of product
     *  @return string 			       	Label of status
     */
    public function LibStatut($status, $mode = 0, $type = 0)
    {
    }
    /**
     * Private function to log price history
     *
     * @param User      $user                           Object user who adds/changes price
     * @param integer   $datec                          date create
     * @param float     $buyprice                       price for qty
     * @param float     $qty                            qty for price
     * @param float     $multicurrency_buyprice         Purchase price for the quantity min in currency
     * @param float     $multicurrency_unitBuyPrice     Unit Purchase price in currency
     * @param float     $multicurrency_tx               Rate currency
     * @param int       $fk_multicurrency               key multi currency
     * @param string    $multicurrency_code	            Currency code
     *
     * @return int Return integer < 0 NOK > 0 OK
     */
    private function logPrice($user, $datec, $buyprice, $qty, $multicurrency_buyprice = \null, $multicurrency_unitBuyPrice = \null, $multicurrency_tx = \null, $fk_multicurrency = \null, $multicurrency_code = \null)
    {
    }
}