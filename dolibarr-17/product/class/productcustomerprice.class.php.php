<?php

/**
 * File of class to manage predefined price products or services by customer
 */
class Productcustomerprice extends \CommonObject
{
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
    public $tms = '';
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
    public $tva_tx;
    public $recuperableonly;
    public $localtax1_type;
    public $localtax1_tx;
    public $localtax2_type;
    public $localtax2_tx;
    /**
     * @var int User ID
     */
    public $fk_user;
    public $lines = array();
    /**
     * Constructor
     *
     * @param DoliDb $db handler
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
     * @return int <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0, $forceupdateaffiliate = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param 	int 	$id 	ID of customer price
     * @return 	int 			<0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Load all customer prices in memory from database
     *
     * @param 	string 	$sortorder 	order
     * @param 	string 	$sortfield 	field
     * @param 	int 	$limit 		page
     * @param 	int 	$offset 	offset
     * @param 	array 	$filter 	Filter for select
     * @deprecated since dolibarr v17 use fetchAll
     * @return 	int 				<0 if KO, >0 if OK
     */
    public function fetch_all($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = array())
    {
    }
    /**
     * Load all customer prices in memory from database
     *
     * @param 	string 	$sortorder 	order
     * @param 	string 	$sortfield 	field
     * @param 	int 	$limit 		page
     * @param 	int 	$offset 	offset
     * @param 	array 	$filter 	Filter for select
     * @return 	int 				<0 if KO, >0 if OK
     * @since dolibarr v17
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Load all objects in memory from database
     *
     * @param 	string 	$sortorder 	order
     * @param 	string 	$sortfield 	field
     * @param 	int 	$limit 		page
     * @param 	int 	$offset 	offset
     * @param 	array 	$filter 	Filter for sql request
     * @return 	int 			<0 if KO, >0 if OK
     */
    public function fetch_all_log($sortorder, $sortfield, $limit, $offset, $filter = array())
    {
    }
    /**
     * Update object into database
     *
     * @param User $user that modifies
     * @param int $notrigger triggers after, 1=disable triggers
     * @param int $forceupdateaffiliate update price on each soc child
     * @return int <0 if KO, >0 if OK
     */
    public function update($user = 0, $notrigger = 0, $forceupdateaffiliate = 0)
    {
    }
    /**
     * Force update price on child companies so child company has same prices than parent.
     *
     * @param 	User $user 					User that modifies
     * @param 	int $forceupdateaffiliate 	update price on each soc child
     * @return 	int 						<0 if KO, 0 = action disabled, >0 if OK
     */
    public function setPriceOnAffiliateThirdparty($user, $forceupdateaffiliate)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user that deletes
     * @param int $notrigger triggers after, 1=disable triggers
     * @return int <0 if KO, >0 if OK
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
     * @return void
     */
    public function initAsSpecimen()
    {
    }
}
/**
 * File of class to manage predefined price products or services by customer lines
 */
class PriceByCustomerLine
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
    public $tms = '';
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
    public $import_key;
    public $socname;
    public $prodref;
}