<?php

/**
 * File of class to manage predefined price products or services by customer
 */
class ProductCustomerPrice extends \CommonObject
{
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('ref' => array('type' => 'varchar(128)', 'label' => 'Ref', 'enabled' => 1, 'visible' => 4, 'position' => 10, 'notnull' => 1, 'default' => '(PROV)', 'index' => 1, 'searchall' => 1, 'comment' => "Reference of object", 'showoncombobox' => 1, 'noteditable' => 1), 'fk_product' => array('type' => 'integer:Product:product/class/product.class.php:0', 'label' => 'Product', 'enabled' => '$conf->product->enabled', 'visible' => 1, 'position' => 35, 'notnull' => 1, 'index' => 1, 'comment' => "Product to produce", 'css' => 'maxwidth300', 'csslist' => 'tdoverflowmax100', 'picto' => 'product'), 'ref_customer' => array('type' => 'varchar(128)', 'label' => 'RefCustomer', 'enabled' => 1, 'visible' => 4, 'position' => 10, 'notnull' => 1), 'datec' => array('type' => 'datetime', 'label' => 'AppliedPricesFrom', 'enabled' => 1, 'visible' => 1, 'position' => 500, 'notnull' => 1), 'price_base_type' => array('type' => 'varchar(255)', 'label' => 'PriceBase', 'enabled' => 1, 'visible' => 1, 'position' => 11, 'notnull' => -1, 'comment' => 'Price Base Type'), 'tva_tx' => array('type' => 'decimal(20,6)', 'label' => 'VAT', 'enabled' => 1, 'visible' => 1, 'position' => 12, 'notnull' => -1, 'comment' => 'TVA Tax Rate'), 'price' => array('type' => 'decimal(20,6)', 'label' => 'HT', 'enabled' => 1, 'visible' => 1, 'position' => 8, 'notnull' => -1, 'comment' => 'Price HT'), 'price_ttc' => array('type' => 'decimal(20,6)', 'label' => 'TTC', 'enabled' => 1, 'visible' => 1, 'position' => 8, 'notnull' => -1, 'comment' => 'Price TTC'), 'price_min' => array('type' => 'decimal(20,6)', 'label' => 'MinPriceHT', 'enabled' => 1, 'visible' => 1, 'position' => 9, 'notnull' => -1, 'comment' => 'Minimum Price'), 'price_min_ttc' => array('type' => 'decimal(20,6)', 'label' => 'MinPriceTTC', 'enabled' => 1, 'visible' => 1, 'position' => 10, 'notnull' => -1, 'comment' => 'Minimum Price TTC'), 'price_label' => array('type' => 'varchar(255)', 'label' => 'PriceLabel', 'enabled' => 1, 'visible' => 1, 'position' => 20, 'notnull' => -1, 'comment' => 'Price Label'), 'fk_user' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => 1, 'position' => 510, 'notnull' => 1, 'foreignkey' => 'user.rowid', 'csslist' => 'tdoverflowmax100'));
    /**
     * @var string ID to identify managed object
     */
    public $element = 'product_customer_price';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'product_customer_price';
    /**
     * @var int Entity
     */
    public $entity;
    public $datec = '';
    /**
     * @var int ID
     */
    public $fk_product;
    /**
     * @var int Thirdparty ID
     */
    public $fk_soc;
    /**
     * @var string Customer reference
     */
    public $ref_customer;
    public $price;
    public $price_ttc;
    public $price_min;
    public $price_min_ttc;
    public $price_base_type;
    public $default_vat_code;
    public $tva_tx;
    public $recuperableonly;
    public $localtax1_type;
    public $localtax1_tx;
    public $localtax2_type;
    public $localtax2_tx;
    public $price_label;
    /**
     * @var int User ID
     */
    public $fk_user;
    /**
     * @var PriceByCustomerLine[]
     */
    public $lines = array();
    /**
     * Constructor
     *
     * @param DoliDB $db handler
     */
    public function __construct($db)
    {
    }
    /**
     * Create object into database
     *
     * @param User $user that creates
     * @param int $notrigger triggers after, 1=disable triggers
     * @param int $forceupdateaffiliate update price on each soc child
     * @return int Return integer <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0, $forceupdateaffiliate = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param 	int 	$id 	ID of customer price
     * @return 	int 			Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     * Load all customer prices in memory from database
     *
     * @param 	string 			$sortorder 	Sort order
     * @param 	string 			$sortfield 	Sort field
     * @param 	int 			$limit 		Limit page
     * @param 	int 			$offset 	offset
     * @param 	string|array 	$filter 	Filter USF.
     * @return 	int 						Return integer <0 if KO, >0 if OK
     * @since dolibarr v17
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = '')
    {
    }
    /**
     * Load all objects in memory from database
     *
     * @param 	string 	$sortorder 	order
     * @param 	string 	$sortfield 	field
     * @param 	int 	$limit 		page
     * @param 	int 	$offset 	offset
     * @param 	array 	$filter 	Filter for sql request
     * @return 	int 			Return integer <0 if KO, >0 if OK
     */
    public function fetchAllLog($sortorder, $sortfield, $limit, $offset, $filter = array())
    {
    }
    /**
     * Update object into database
     *
     * @param User $user that modifies
     * @param int $notrigger triggers after, 1=disable triggers
     * @param int $forceupdateaffiliate update price on each soc child
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0, $forceupdateaffiliate = 0)
    {
    }
    /**
     * Force update price on child companies so child company has same prices than parent.
     *
     * @param 	User $user 					User that modifies
     * @param 	int $forceupdateaffiliate 	update price on each soc child
     * @return 	int 						Return integer <0 if KO, 0 = action disabled, >0 if OK
     */
    public function setPriceOnAffiliateThirdparty($user, $forceupdateaffiliate)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user that deletes
     * @param int $notrigger triggers after, 1=disable triggers
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * Load an object from its id and create a new one in database
     *
     * @param	User	$user		User making the clone
     * @param   int     $fromid     ID of object to clone
     * @return  int                 id of clone
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     * Initialise object with example values
     * Id must be 0 if object instance is a specimen
     *
     * @return int
     */
    public function initAsSpecimen()
    {
    }
}
/**
 * File of class to manage predefined price products or services by customer lines
 */
class PriceByCustomerLine extends \CommonObjectLine
{
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var int Entity
     */
    public $entity;
    public $datec = '';
    /**
     * @var int ID
     */
    public $fk_product;
    /**
     * @var string Customer reference
     */
    public $ref_customer;
    /**
     * @var int Thirdparty ID
     */
    public $fk_soc;
    public $price;
    public $price_ttc;
    public $price_min;
    public $price_min_ttc;
    public $price_base_type;
    public $default_vat_code;
    public $tva_tx;
    public $recuperableonly;
    public $localtax1_tx;
    public $localtax2_tx;
    /**
     * @var int User ID
     */
    public $fk_user;
    public $price_label;
    public $import_key;
    public $socname;
    public $prodref;
}