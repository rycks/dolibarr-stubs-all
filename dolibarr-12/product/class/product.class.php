<?php

/**
 * Class to manage products or services
 */
class Product extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'product';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'product';
    /**
     * @var int Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_product';
    /**
     * @var array	List of child tables. To test if we can delete object.
     */
    protected $childtables = array('supplier_proposaldet', 'propaldet', 'commandedet', 'facturedet', 'contratdet', 'facture_fourn_det', 'commande_fournisseurdet');
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     *
     * @var int
     */
    public $ismultientitymanaged = 1;
    public $picto = 'product';
    /**
     * {@inheritdoc}
     */
    protected $table_ref_field = 'ref';
    public $regeximgext = '\\.gif|\\.jpg|\\.jpeg|\\.png|\\.bmp|\\.webp|\\.xpm|\\.xbm';
    // See also into images.lib.php
    /*
     * @deprecated
     * @see label
     */
    public $libelle;
    /**
     * Product label
     *
     * @var string
     */
    public $label;
    /**
     * Product description
     *
     * @var string
     */
    public $description;
    /**
     * Product other fields PRODUCT_USE_OTHER_FIELD_IN_TRANSLATION
     *
     * @var string
     */
    public $other;
    /**
     * Check TYPE constants
     *
     * @var int
     */
    public $type = self::TYPE_PRODUCT;
    /**
     * Selling price
     *
     * @var float
     */
    public $price;
    // Price net
    /**
     * Price with tax
     *
     * @var float
     */
    public $price_ttc;
    /**
     * Minimum price net
     *
     * @var float
     */
    public $price_min;
    /**
     * Minimum price with tax
     *
     * @var float
     */
    public $price_min_ttc;
    /**
     * Base price ('TTC' for price including tax or 'HT' for net price)
     * @var string
     */
    public $price_base_type;
    //! Arrays for multiprices
    public $multiprices = array();
    public $multiprices_ttc = array();
    public $multiprices_base_type = array();
    public $multiprices_min = array();
    public $multiprices_min_ttc = array();
    public $multiprices_tva_tx = array();
    public $multiprices_recuperableonly = array();
    //! Price by quantity arrays
    public $price_by_qty;
    public $prices_by_qty = array();
    public $prices_by_qty_id = array();
    public $prices_by_qty_list = array();
    //! Default VAT code for product (link to code into llx_c_tva but without foreign keys)
    public $default_vat_code;
    //! Default VAT rate of product
    public $tva_tx;
    //! French VAT NPR (0 or 1)
    public $tva_npr = 0;
    //! Other local taxes
    public $localtax1_tx;
    public $localtax2_tx;
    public $localtax1_type;
    public $localtax2_type;
    /**
     * Stock real
     *
     * @var int
     */
    public $stock_reel = 0;
    /**
     * Stock virtual
     *
     * @var int
     */
    public $stock_theorique;
    /**
     * Cost price
     *
     * @var float
     */
    public $cost_price;
    //! Average price value for product entry into stock (PMP)
    public $pmp;
    /**
     * Stock alert
     *
     * @var int
     */
    public $seuil_stock_alerte = 0;
    /**
     * Ask for replenishment when $desiredstock < $stock_reel
     */
    public $desiredstock = 0;
    /*
     * Service expiration
     */
    public $duration_value;
    /**
     * Exoiration unit
     */
    public $duration_unit;
    /**
     * Status indicates whether the product is on sale '1' or not '0'
     *
     * @var int
     */
    public $status = 0;
    /**
     * Status indicate whether the product is available for purchase '1' or not '0'
     *
     * @var int
     */
    public $status_buy = 0;
    /**
     * Status indicates whether the product is a finished product '1' or a raw material '0'
     *
     * @var int
     */
    public $finished;
    /**
     * We must manage lot/batch number, sell-by date and so on : '1':yes '0':no
     *
     * @var int
     */
    public $status_batch = 0;
    /**
     * Customs code
     *
     * @var string
     */
    public $customcode;
    /**
     * Product URL
     *
     * @var string
     */
    public $url;
    //! Metric of products
    public $weight;
    public $weight_units;
    public $length;
    public $length_units;
    public $width;
    public $width_units;
    public $height;
    public $height_units;
    public $surface;
    public $surface_units;
    public $volume;
    public $volume_units;
    public $net_measure;
    public $net_measure_units;
    public $accountancy_code_sell;
    public $accountancy_code_sell_intra;
    public $accountancy_code_sell_export;
    public $accountancy_code_buy;
    public $accountancy_code_buy_intra;
    public $accountancy_code_buy_export;
    /**
     * Main Barcode value
     *
     * @var string
     */
    public $barcode;
    /**
     * Main Barcode type ID
     *
     * @var int
     */
    public $barcode_type;
    /**
     * Main Barcode type code
     *
     * @var string
     */
    public $barcode_type_code;
    /**
     * Additional barcodes (Some products have different barcodes according to the country of origin of manufacture)
     *
     * @var array
     */
    public $barcodes_extra = array();
    public $stats_propale = array();
    public $stats_commande = array();
    public $stats_contrat = array();
    public $stats_facture = array();
    public $stats_commande_fournisseur = array();
    public $stats_reception = array();
    public $stats_mrptoconsume = array();
    public $stats_mrptoproduce = array();
    public $multilangs = array();
    //! Size of image
    public $imgWidth;
    public $imgHeight;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    /**
     * @var integer|string date_modification
     */
    public $date_modification;
    //! Id du fournisseur
    public $product_fourn_id;
    //! Product ID already linked to a reference supplier
    public $product_id_already_linked;
    public $nbphoto = 0;
    //! Contains detail of stock of product into each warehouse
    public $stock_warehouse = array();
    public $oldcopy;
    public $fk_default_warehouse;
    /**
     * @var int ID
     */
    public $fk_price_expression;
    /* To store supplier price found */
    public $fourn_pu;
    public $fourn_price_base_type;
    public $fourn_socid;
    /**
     * @deprecated
     * @see        $ref_supplier
     */
    public $ref_fourn;
    public $ref_supplier;
    /**
     * Unit code ('km', 'm', 'l', 'p', ...)
     *
     * @var string
     */
    public $fk_unit;
    /**
     * Price is generated using multiprice rules
     *
     * @var int
     */
    public $price_autogen = 0;
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'index' => 1, 'position' => 1, 'comment' => 'Id'),
        'ref' => array('type' => 'varchar(128)', 'label' => 'Ref', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'showoncombobox' => 1, 'index' => 1, 'position' => 10, 'searchall' => 1, 'comment' => 'Reference of object'),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'default' => 1, 'notnull' => 1, 'index' => 1, 'position' => 20),
        'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'showoncombobox' => 1),
        'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 61),
        'note' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 62),
        'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 500),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 501),
        //'date_valid'    =>array('type'=>'datetime',     'label'=>'DateCreation',     'enabled'=>1, 'visible'=>-2, 'position'=>502),
        'fk_user_author' => array('type' => 'integer', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 510, 'foreignkey' => 'llx_user.rowid'),
        'fk_user_modif' => array('type' => 'integer', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 511),
        //'fk_user_valid' =>array('type'=>'integer',      'label'=>'UserValidation',        'enabled'=>1, 'visible'=>-1, 'position'=>512),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'index' => 0, 'position' => 1000),
    );
    /**
     * Regular product
     */
    const TYPE_PRODUCT = 0;
    /**
     * Service
     */
    const TYPE_SERVICE = 1;
    /**
     * Advanced feature: assembly kit
     */
    const TYPE_ASSEMBLYKIT = 2;
    /**
     * Advanced feature: stock kit
     */
    const TYPE_STOCKKIT = 3;
    /**
     *  Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *    Check that ref and label are ok
     *
     * @return int         >1 if OK, <=0 if KO
     */
    public function check()
    {
    }
    /**
     *    Insert product into database
     *
     * @param  User $user      User making insert
     * @param  int  $notrigger Disable triggers
     * @return int                         Id of product/service if OK, < 0 if KO
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *    Check properties of product are ok (like name, barcode, ...).
     *    All properties must be already loaded on object (this->barcode, this->barcode_type_code, ...).
     *
     * @return int        0 if OK, <0 if KO
     */
    public function verify()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Check barcode
     *
     * @param  string $valuetotest Value to test
     * @param  string $typefortest Type of barcode (ISBN, EAN, ...)
     * @return int                        0 if OK
     *                                     -1 ErrorBadBarCodeSyntax
     *                                     -2 ErrorBarCodeRequired
     *                                     -3 ErrorBarCodeAlreadyUsed
     */
    public function check_barcode($valuetotest, $typefortest)
    {
    }
    /**
     *    Update a record into database.
     *  If batch flag is set to on, we create records into llx_product_batch
     *
     * @param  int     $id          Id of product
     * @param  User    $user        Object user making update
     * @param  int     $notrigger   Disable triggers
     * @param  string  $action      Current action for hookmanager ('add' or 'update')
     * @param  boolean $updatetype  Update product type
     * @return int                  1 if OK, -1 if ref already exists, -2 if other error
     */
    public function update($id, $user, $notrigger = \false, $action = 'update', $updatetype = \false)
    {
    }
    /**
     *  Delete a product from database (if not used)
     *
     * @param  User $user      User (object) deleting product
     * @param  int  $notrigger Do not execute trigger
     * @return int                    < 0 if KO, 0 = Not possible, > 0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     *    Update or add a translation for a product
     *
     * @param  User $user Object user making update
     * @return int        <0 if KO, >0 if OK
     */
    public function setMultiLangs($user)
    {
    }
    /**
     *    Delete a language for this product
     *
     * @param string $langtodelete Language code to delete
     * @param User   $user         Object user making delete
     *
     * @return int                            <0 if KO, >0 if OK
     */
    public function delMultiLangs($langtodelete, $user)
    {
    }
    /**
     * Sets an accountancy code for a product.
     * Also calls PRODUCT_MODIFY trigger when modified
     *
     * @param 	string $type 	It can be 'buy', 'buy_intra', 'buy_export', 'sell', 'sell_intra' or 'sell_export'
     * @param 	string $value 	Accountancy code
     * @return 	int 			<0 KO >0 OK
     */
    public function setAccountancyCode($type, $value)
    {
    }
    /**
     *    Load array this->multilangs
     *
     * @return int        <0 if KO, >0 if OK
     */
    public function getMultiLangs()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Insert a track that we changed a customer price
     *
     * @param  User $user  User making change
     * @param  int  $level price level to change
     * @return int                    <0 if KO, >0 if OK
     */
    private function _log_price($user, $level = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Delete a price line
     *
     * @param  User $user  Object user
     * @param  int  $rowid Line id to delete
     * @return int                <0 if KO, >0 if OK
     */
    public function log_price_delete($user, $rowid)
    {
    }
    /**
     * Return price of sell of a product for a seller/buyer/product.
     *
     * @param	Societe		$thirdparty_seller		Seller
     * @param	Societe		$thirdparty_buyer		Buyer
     * @param	int			$pqp					Id of product price per quantity if a selection was done of such a price
     * @return	array								Array of price information array('pu_ht'=> , 'pu_ttc'=> , 'tva_tx'=>'X.Y (code)', ...), 'tva_npr'=>0, ...)
     * @see get_buyprice(), find_min_price_product_fournisseur()
     */
    public function getSellPrice($thirdparty_seller, $thirdparty_buyer, $pqp = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Read price used by a provider.
     * We enter as input couple prodfournprice/qty or triplet qty/product_id/fourn_ref.
     * This also set some properties on product like ->buyprice, ->fourn_pu, ...
     *
     * @param  int    $prodfournprice Id du tarif = rowid table product_fournisseur_price
     * @param  double $qty            Quantity asked or -1 to get first entry found
     * @param  int    $product_id     Filter on a particular product id
     * @param  string $fourn_ref      Filter on a supplier price ref. 'none' to exclude ref in search.
     * @param  int    $fk_soc         If of supplier
     * @return int                    <-1 if KO, -1 if qty not enough, 0 if OK but nothing found, id_product if OK and found. May also initialize some properties like (->ref_supplier, buyprice, fourn_pu, vatrate_supplier...)
     * @see getSellPrice(), find_min_price_product_fournisseur()
     */
    public function get_buyprice($prodfournprice, $qty, $product_id = 0, $fourn_ref = '', $fk_soc = 0)
    {
    }
    /**
     *    Modify customer price of a product/Service
     *
     * @param  double $newprice          New price
     * @param  string $newpricebase      HT or TTC
     * @param  User   $user              Object user that make change
     * @param  double $newvat            New VAT Rate (For example 8.5. Should not be a string)
     * @param  double $newminprice       New price min
     * @param  int    $level             0=standard, >0 = level if multilevel prices
     * @param  int    $newnpr            0=Standard vat rate, 1=Special vat rate for French NPR VAT
     * @param  int    $newpbq            1 if it has price by quantity
     * @param  int    $ignore_autogen    Used to avoid infinite loops
     * @param  array  $localtaxes_array  Array with localtaxes info array('0'=>type1,'1'=>rate1,'2'=>type2,'3'=>rate2) (loaded by getLocalTaxesFromRate(vatrate, 0, ...) function).
     * @param  string $newdefaultvatcode Default vat code
     * @return int                            <0 if KO, >0 if OK
     */
    public function updatePrice($newprice, $newpricebase, $user, $newvat = '', $newminprice = 0, $level = 0, $newnpr = 0, $newpbq = 0, $ignore_autogen = 0, $localtaxes_array = array(), $newdefaultvatcode = '')
    {
    }
    /**
     *  Sets the supplier price expression
     *
     * @param      int $expression_id Expression
     * @return     int                     <0 if KO, >0 if OK
     * @deprecated Use Product::update instead
     */
    public function setPriceExpression($expression_id)
    {
    }
    /**
     *  Load a product in memory from database
     *
     * @param  int    $id                Id of product/service to load
     * @param  string $ref               Ref of product/service to load
     * @param  string $ref_ext           Ref ext of product/service to load
     * @param  string $barcode           Barcode of product/service to load
     * @param  int    $ignore_expression Ignores the math expression for calculating price and uses the db value instead
     * @param  int    $ignore_price_load Load product without loading prices arrays (when we are sure we don't need them)
     * @param  int    $ignore_lang_load  Load product without loading language arrays (when we are sure we don't need them)
     * @return int                       <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id = '', $ref = '', $ref_ext = '', $barcode = '', $ignore_expression = 0, $ignore_price_load = 0, $ignore_lang_load = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Charge tableau des stats propale pour le produit/service
     *
     * @param  int $socid Id societe
     * @return integer      Tableau des stats dans $this->stats_propale, <0 if ko >0 if ok
     */
    public function load_stats_propale($socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Charge tableau des stats propale pour le produit/service
     *
     * @param  int $socid Id thirdparty
     * @return array               Tableau des stats
     */
    public function load_stats_proposal_supplier($socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Charge tableau des stats commande client pour le produit/service
     *
     * @param  int    $socid           Id societe pour filtrer sur une societe
     * @param  string $filtrestatut    Id statut pour filtrer sur un statut
     * @param  int    $forVirtualStock Ignore rights filter for virtual stock calculation.
     * @return integer                 Array of stats in $this->stats_commande (nb=nb of order, qty=qty ordered), <0 if ko or >0 if ok
     */
    public function load_stats_commande($socid = 0, $filtrestatut = '', $forVirtualStock = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Charge tableau des stats commande fournisseur pour le produit/service
     *
     * @param  int    $socid           Id societe pour filtrer sur une societe
     * @param  string $filtrestatut    Id des statuts pour filtrer sur des statuts
     * @param  int    $forVirtualStock Ignore rights filter for virtual stock calculation.
     * @return array                     Tableau des stats
     */
    public function load_stats_commande_fournisseur($socid = 0, $filtrestatut = '', $forVirtualStock = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Charge tableau des stats expedition client pour le produit/service
     *
     * @param   int         $socid                  Id societe pour filtrer sur une societe
     * @param   string      $filtrestatut           [=''] Ids order status separated by comma
     * @param   int         $forVirtualStock        Ignore rights filter for virtual stock calculation.
     * @param   string      $filterShipmentStatus   [=''] Ids shipment status separated by comma
     * @return  int         <0 if KO, >0 if OK (Tableau des stats)
     */
    public function load_stats_sending($socid = 0, $filtrestatut = '', $forVirtualStock = 0, $filterShipmentStatus = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Charge tableau des stats réception fournisseur pour le produit/service
     *
     * @param  int    $socid           Id societe pour filtrer sur une societe
     * @param  string $filtrestatut    Id statut pour filtrer sur un statut
     * @param  int    $forVirtualStock Ignore rights filter for virtual stock calculation.
     * @return array                   Tableau des stats
     */
    public function load_stats_reception($socid = 0, $filtrestatut = '', $forVirtualStock = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Charge tableau des stats commande client pour le produit/service
     *
     * @param  int    $socid           Id societe pour filtrer sur une societe
     * @param  string $filtrestatut    Id statut pour filtrer sur un statut
     * @param  int    $forVirtualStock Ignore rights filter for virtual stock calculation.
     * @return integer                 Array of stats in $this->stats_commande (nb=nb of order, qty=qty ordered), <0 if ko or >0 if ok
     */
    public function load_stats_inproduction($socid = 0, $filtrestatut = '', $forVirtualStock = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Charge tableau des stats contrat pour le produit/service
     *
     * @param  int $socid Id societe
     * @return array               Tableau des stats
     */
    public function load_stats_contrat($socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Charge tableau des stats facture pour le produit/service
     *
     * @param  int $socid Id societe
     * @return array                   Tableau des stats
     */
    public function load_stats_facture($socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Charge tableau des stats facture pour le produit/service
     *
     * @param  int $socid Id societe
     * @return array                   Tableau des stats
     */
    public function load_stats_facture_fournisseur($socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return an array formated for showing graphs
     *
     * @param  string	$sql  	Request to execute
     * @param  string	$mode 	'byunit'=number of unit, 'bynumber'=nb of entities
     * @param  int    	$year 	Year (0=current year, -1=all years)
     * @return array            <0 if KO, result[month]=array(valuex,valuey) where month is 0 to 11
     */
    private function _get_stats($sql, $mode, $year = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return nb of units or customers invoices in which product is included
     *
     * @param  int    $socid               Limit count on a particular third party id
     * @param  string $mode                'byunit'=number of unit, 'bynumber'=nb of entities
     * @param  int    $filteronproducttype 0=To filter on product only, 1=To filter on services only
     * @param  int    $year                Year (0=last 12 month)
     * @param  string $morefilter          More sql filters
     * @return array                            <0 if KO, result[month]=array(valuex,valuey) where month is 0 to 11
     */
    public function get_nb_vente($socid, $mode, $filteronproducttype = -1, $year = 0, $morefilter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return nb of units or supplier invoices in which product is included
     *
     * @param  int    $socid               Limit count on a particular third party id
     * @param  string $mode                'byunit'=number of unit, 'bynumber'=nb of entities
     * @param  int    $filteronproducttype 0=To filter on product only, 1=To filter on services only
     * @param  int    $year                Year (0=last 12 month)
     * @param  string $morefilter          More sql filters
     * @return array                            <0 if KO, result[month]=array(valuex,valuey) where month is 0 to 11
     */
    public function get_nb_achat($socid, $mode, $filteronproducttype = -1, $year = 0, $morefilter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return nb of units in proposals in which product is included
     *
     * @param  int    $socid               Limit count on a particular third party id
     * @param  string $mode                'byunit'=number of unit, 'bynumber'=nb of entities
     * @param  int    $filteronproducttype 0=To filter on product only, 1=To filter on services only
     * @param  int    $year                Year (0=last 12 month)
     * @param  string $morefilter          More sql filters
     * @return array                            <0 if KO, result[month]=array(valuex,valuey) where month is 0 to 11
     */
    public function get_nb_propal($socid, $mode, $filteronproducttype = -1, $year = 0, $morefilter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return nb of units in proposals in which product is included
     *
     * @param  int    $socid               Limit count on a particular third party id
     * @param  string $mode                'byunit'=number of unit, 'bynumber'=nb of entities
     * @param  int    $filteronproducttype 0=To filter on product only, 1=To filter on services only
     * @param  int    $year                Year (0=last 12 month)
     * @param  string $morefilter          More sql filters
     * @return array                            <0 if KO, result[month]=array(valuex,valuey) where month is 0 to 11
     */
    public function get_nb_propalsupplier($socid, $mode, $filteronproducttype = -1, $year = 0, $morefilter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return nb of units in orders in which product is included
     *
     * @param  int    $socid               Limit count on a particular third party id
     * @param  string $mode                'byunit'=number of unit, 'bynumber'=nb of entities
     * @param  int    $filteronproducttype 0=To filter on product only, 1=To filter on services only
     * @param  int    $year                Year (0=last 12 month)
     * @param  string $morefilter          More sql filters
     * @return array                            <0 if KO, result[month]=array(valuex,valuey) where month is 0 to 11
     */
    public function get_nb_order($socid, $mode, $filteronproducttype = -1, $year = 0, $morefilter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return nb of units in orders in which product is included
     *
     * @param  int    $socid               Limit count on a particular third party id
     * @param  string $mode                'byunit'=number of unit, 'bynumber'=nb of entities
     * @param  int    $filteronproducttype 0=To filter on product only, 1=To filter on services only
     * @param  int    $year                Year (0=last 12 month)
     * @param  string $morefilter          More sql filters
     * @return array                            <0 if KO, result[month]=array(valuex,valuey) where month is 0 to 11
     */
    public function get_nb_ordersupplier($socid, $mode, $filteronproducttype = -1, $year = 0, $morefilter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return nb of units in orders in which product is included
     *
     * @param  int    $socid               Limit count on a particular third party id
     * @param  string $mode                'byunit'=number of unit, 'bynumber'=nb of entities
     * @param  int    $filteronproducttype 0=To filter on product only, 1=To filter on services only
     * @param  int    $year                Year (0=last 12 month)
     * @param  string $morefilter          More sql filters
     * @return array                            <0 if KO, result[month]=array(valuex,valuey) where month is 0 to 11
     */
    public function get_nb_contract($socid, $mode, $filteronproducttype = -1, $year = 0, $morefilter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return nb of units in orders in which product is included
     *
     * @param  int    $socid               Limit count on a particular third party id
     * @param  string $mode                'byunit'=number of unit, 'bynumber'=nb of entities
     * @param  int    $filteronproducttype 0=To filter on product only, 1=To filter on services only
     * @param  int    $year                Year (0=last 12 month)
     * @param  string $morefilter          More sql filters
     * @return array                            <0 if KO, result[month]=array(valuex,valuey) where month is 0 to 11
     */
    public function get_nb_mos($socid, $mode, $filteronproducttype = -1, $year = 0, $morefilter = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Link a product/service to a parent product/service
     *
     * @param  int $id_pere Id of parent product/service
     * @param  int $id_fils Id of child product/service
     * @param  int $qty     Quantity
     * @param  int $incdec  1=Increase/decrease stock of child when parent stock increase/decrease
     * @return int                < 0 if KO, > 0 if OK
     */
    public function add_sousproduit($id_pere, $id_fils, $qty, $incdec = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Modify composed product
     *
     * @param  int $id_pere Id of parent product/service
     * @param  int $id_fils Id of child product/service
     * @param  int $qty     Quantity
     * @param  int $incdec  1=Increase/decrease stock of child when parent stock increase/decrease
     * @return int                < 0 if KO, > 0 if OK
     */
    public function update_sousproduit($id_pere, $id_fils, $qty, $incdec = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Retire le lien entre un sousproduit et un produit/service
     *
     * @param  int $fk_parent Id du produit auquel ne sera plus lie le produit lie
     * @param  int $fk_child  Id du produit a ne plus lie
     * @return int                    < 0 if KO, > 0 if OK
     */
    public function del_sousproduit($fk_parent, $fk_child)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Verifie si c'est un sous-produit
     *
     * @param  int $fk_parent Id du produit auquel le produit est lie
     * @param  int $fk_child  Id du produit lie
     * @return int                    < 0 si erreur, > 0 si ok
     */
    public function is_sousproduit($fk_parent, $fk_child)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Add a supplier price for the product.
     *  Note: Duplicate ref is accepted for different quantity only, or for different companies.
     *
     * @param  User   $user      User that make link
     * @param  int    $id_fourn  Supplier id
     * @param  string $ref_fourn Supplier ref
     * @param  float  $quantity  Quantity minimum for price
     * @return int               < 0 if KO, 0 if link already exists for this product, > 0 if OK
     */
    public function add_fournisseur($user, $id_fourn, $ref_fourn, $quantity)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoie la liste des fournisseurs du produit/service
     *
     * @return array        Tableau des id de fournisseur
     */
    public function list_suppliers()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Recopie les prix d'un produit/service sur un autre
     *
     * @param  int $fromId Id product source
     * @param  int $toId   Id product target
     * @return int                     < 0 if KO, > 0 if OK
     */
    public function clone_price($fromId, $toId)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Clone links between products
     *
     * @param  int $fromId Product id
     * @param  int $toId   Product id
     * @return int                  <0 if KO, >0 if OK
     */
    public function clone_associations($fromId, $toId)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Recopie les fournisseurs et prix fournisseurs d'un produit/service sur un autre
     *
     * @param  int $fromId Id produit source
     * @param  int $toId   Id produit cible
     * @return int                 < 0 si erreur, > 0 si ok
     */
    public function clone_fournisseurs($fromId, $toId)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Fonction recursive uniquement utilisee par get_arbo_each_prod, recompose l'arborescence des sousproduits
     *  Define value of this->res
     *
     * @param  array  $prod       Products array
     * @param  string $compl_path Directory path of parents to add before
     * @param  int    $multiply   Because each sublevel must be multiplicated by parent nb
     * @param  int    $level      Init level
     * @param  int    $id_parent  Id parent
     * @return void
     */
    public function fetch_prod_arbo($prod, $compl_path = "", $multiply = 1, $level = 1, $id_parent = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Build the tree of subproducts into an array
     *  this->sousprods is loaded by this->get_sousproduits_arbo()
     *
     * @param  int $multiply Because each sublevel must be multiplicated by parent nb
     * @return array                     $this->res
     */
    public function get_arbo_each_prod($multiply = 1)
    {
    }
    /**
     * Count all parent and children products for current product (first level only)
     *
     * @param	int		$mode	0=Both parent and child, -1=Parents only, 1=Children only
     * @return 	int            	Nb of father + child
     * @see getFather(), get_sousproduits_arbo()
     */
    public function hasFatherOrChild($mode = 0)
    {
    }
    /**
     * Return if a product has variants or not
     *
     * @return int        Number of variants
     */
    public function hasVariants()
    {
    }
    /**
     * Return if loaded product is a variant
     *
     * @return int
     */
    public function isVariant()
    {
    }
    /**
     *  Return all parent products for current product (first level only)
     *
     * @return array         Array of product
     */
    public function getFather()
    {
    }
    /**
     *  Return childs of product $id
     *
     * @param  int $id             Id of product to search childs of
     * @param  int $firstlevelonly Return only direct child
     * @param  int $level          Level of recursing call (start to 1)
     * @return array                       Return array(prodid=>array(0=prodid, 1=>qty, 2=> ...)
     */
    public function getChildsArbo($id, $firstlevelonly = 0, $level = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *     Return tree of all subproducts for product. Tree contains id, name and quantity.
     *     Set this->sousprods
     *
     * @return void
     */
    public function get_sousproduits_arbo()
    {
    }
    /**
     *    Return clicable link of object (with eventually picto)
     *
     * @param  int    $withpicto             Add picto into link
     * @param  string $option                Where point the link ('stock', 'composition', 'category', 'supplier', '')
     * @param  int    $maxlength             Maxlength of ref
     * @param  int    $save_lastsearch_value -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     * @param  int    $notooltip			 No tooltip
     * @return string                                String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $maxlength = 0, $save_lastsearch_value = -1, $notooltip = 0)
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     * @param  string    $modele      Force model to use ('' to not force)
     * @param  Translate $outputlangs Object langs to use for output
     * @param  int       $hidedetails Hide details of lines
     * @param  int       $hidedesc    Hide description
     * @param  int       $hideref     Hide ref
     * @return int                         0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    /**
     *    Return label of status of object
     *
     * @param  int $mode 0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     * @param  int $type 0=Sell, 1=Buy, 2=Batch Number management
     * @return string          Label of status
     */
    public function getLibStatut($mode = 0, $type = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return label of a given status
     *
     * @param  int 		$status 	Statut
     * @param  int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * @param  int 		$type   	0=Status "to sell", 1=Status "to buy", 2=Status "to Batch"
     * @return string              	Label of status
     */
    public function LibStatut($status, $mode = 0, $type = 0)
    {
    }
    /**
     *  Retour label of nature of product
     *
     * @return string        Label
     */
    public function getLibFinished()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Adjust stock in a warehouse for product
     *
     * @param  User   $user           user asking change
     * @param  int    $id_entrepot    id of warehouse
     * @param  double $nbpiece        nb of units
     * @param  int    $movement       0 = add, 1 = remove
     * @param  string $label          Label of stock movement
     * @param  double $price          Unit price HT of product, used to calculate average weighted price (PMP in french). If 0, average weighted price is not changed.
     * @param  string $inventorycode  Inventory code
     * @param  string $origin_element Origin element type
     * @param  int    $origin_id      Origin id of element
     * @return int                     <0 if KO, >0 if OK
     */
    public function correct_stock($user, $id_entrepot, $nbpiece, $movement, $label = '', $price = 0, $inventorycode = '', $origin_element = '', $origin_id = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Adjust stock in a warehouse for product with batch number
     *
     * @param  User     $user           user asking change
     * @param  int      $id_entrepot    id of warehouse
     * @param  double   $nbpiece        nb of units
     * @param  int      $movement       0 = add, 1 = remove
     * @param  string   $label          Label of stock movement
     * @param  double   $price          Price to use for stock eval
     * @param  integer  $dlc            eat-by date
     * @param  integer  $dluo           sell-by date
     * @param  string   $lot            Lot number
     * @param  string   $inventorycode  Inventory code
     * @param  string   $origin_element Origin element type
     * @param  int      $origin_id      Origin id of element
     * @return int                      <0 if KO, >0 if OK
     */
    public function correct_stock_batch($user, $id_entrepot, $nbpiece, $movement, $label = '', $price = 0, $dlc = '', $dluo = '', $lot = '', $inventorycode = '', $origin_element = '', $origin_id = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Load information about stock of a product into ->stock_reel, ->stock_warehouse[] (including stock_warehouse[idwarehouse]->detail_batch for batch products)
     * This function need a lot of load. If you use it on list, use a cache to execute it once for each product id.
     * If ENTREPOT_EXTRA_STATUS set, filtering on warehouse status possible.
     *
     * @param  	string 	$option 					'' = Load all stock info, also from closed and internal warehouses, 'nobatch', 'novirtual'
     * @param	int		$includedraftpoforvirtual	Include draft status of PO for virtual stock calculation
     * @return 	int                  				< 0 if KO, > 0 if OK
     * @see    	load_virtual_stock(), loadBatchInfo()
     */
    public function load_stock($option = '', $includedraftpoforvirtual = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load value ->stock_theorique of a product. Property this->id must be defined.
     *  This function need a lot of load. If you use it on list, use a cache to execute it one for each product id.
     *
     * 	@param	int		$includedraftpoforvirtual	Include draft status of PO for virtual stock calculation
     *  @return int     							< 0 if KO, > 0 if OK
     *  @see	load_stock(), loadBatchInfo()
     */
    public function load_virtual_stock($includedraftpoforvirtual = \null)
    {
    }
    /**
     *  Load existing information about a serial
     *
     * @param  string $batch Lot/serial number
     * @return array                    Array with record into product_batch
     * @see    load_stock(), load_virtual_stock()
     */
    public function loadBatchInfo($batch)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Move an uploaded file described into $file array into target directory $sdir.
     *
     * @param  string $sdir Target directory
     * @param  string $file Array of file info of file to upload: array('name'=>..., 'tmp_name'=>...)
     * @return int                    <0 if KO, >0 if OK
     */
    public function add_photo($sdir, $file)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return if at least one photo is available
     *
     * @param  string $sdir Directory to scan
     * @return boolean                 True if at least one photo is available, False if not
     */
    public function is_photo_available($sdir)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Retourne tableau de toutes les photos du produit
     *
     * @param  string $dir   Repertoire a scanner
     * @param  int    $nbmax Nombre maximum de photos (0=pas de max)
     * @return array                   Tableau de photos
     */
    public function liste_photos($dir, $nbmax = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Efface la photo du produit et sa vignette
     *
     * @param  string $file Chemin de l'image
     * @return void
     */
    public function delete_photo($file)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load size of image file
     *
     * @param  string $file Path to file
     * @return void
     */
    public function get_image_size($file)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load indicators this->nb for the dashboard
     *
     * @return int                 <0 if KO, >0 if OK
     */
    public function load_state_board()
    {
    }
    /**
     * Return if object is a product
     *
     * @return boolean     True if it's a product
     */
    public function isProduct()
    {
    }
    /**
     * Return if object is a product
     *
     * @return boolean     True if it's a service
     */
    public function isService()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Get a barcode from the module to generate barcode values.
     *  Return value is stored into this->barcode
     *
     * @param  Product $object Object product or service
     * @param  string  $type   Barcode type (ean, isbn, ...)
     * @return string
     */
    public function get_barcode($object, $type = '')
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *    id must be 0 if object instance is a specimen.
     *
     * @return void
     */
    public function initAsSpecimen()
    {
    }
    /**
     * Returns the label, shot_label or code found in units dictionary from ->fk_unit.
     * A langs->trans() must be called on result to get translated value.
     *
     * @param  string $type Label type (long, short or code)
     * @return string|int <0 if ko, label if ok
     * @see getLabelOfUnit() in CommonObjectLine
     */
    public function getLabelOfUnit($type = 'long')
    {
    }
    /**
     * Return if object has a sell-by date or eat-by date
     *
     * @return boolean     True if it's has
     */
    public function hasbatch()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return minimum product recommended price
     *
     * @return int            Minimum recommanded price that is higher price among all suppliers * PRODUCT_MINIMUM_RECOMMENDED_PRICE
     */
    public function min_recommended_price()
    {
    }
    /**
     * Sets object to supplied categories.
     *
     * Deletes object from existing categories not supplied.
     * Adds it to non existing supplied categories.
     * Existing categories are left untouch.
     *
     * @param  int[]|int $categories Category or categories IDs
     * @return void
     */
    public function setCategories($categories)
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param  DoliDB $db        Database handler
     * @param  int    $origin_id Old thirdparty id
     * @param  int    $dest_id   New thirdparty id
     * @return bool
     */
    public static function replaceThirdparty(\DoliDB $db, $origin_id, $dest_id)
    {
    }
    /**
     * Generates prices for a product based on product multiprice generation rules
     *
     * @param  User   $user       User that updates the prices
     * @param  float  $baseprice  Base price
     * @param  string $price_type Base price type
     * @param  float  $price_vat  VAT % tax
     * @param  int    $npr        NPR
     * @param  string $psq        ¿?
     * @return int -1 KO, 1 OK
     */
    public function generateMultiprices(\User $user, $baseprice, $price_type, $price_vat, $npr, $psq)
    {
    }
    /**
     * Returns the rights used for this class
     *
     * @return Object
     */
    public function getRights()
    {
    }
    /**
     *  Load information for tab info
     *
     * @param  int $id Id of thirdparty to load
     * @return void
     */
    public function info($id)
    {
    }
}
/**
 * Class to manage products or services.
 * Do not use 'Service' as class name since it is already used by APIs.
 */
class ProductService extends \Product
{
    public $picto = 'service';
}