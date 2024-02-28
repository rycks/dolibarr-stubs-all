<?php

/**
 *	Manage record for batch number management
 */
class Productbatch extends \CommonObject
{
    /**
     * Batches rules
     */
    const BATCH_RULE_SELLBY_EATBY_DATES_FIRST = 1;
    /**
     * @var string ID to identify managed object
     */
    public $element = 'productbatch';
    private static $_table_element = 'product_batch';
    //!< Name of table without prefix where object is stored
    public $tms = '';
    public $fk_product_stock;
    public $batch = '';
    public $qty;
    public $warehouseid;
    /**
     * @var int ID
     */
    public $fk_product;
    // Properties of the lot
    public $lotid;
    // ID in table of the details of properties of each lots
    /**
     * @var int|string
     * @deprecated
     */
    public $sellby = '';
    // dlc
    /**
     * @var int|string
     * @deprecated
     */
    public $eatby = '';
    // dmd/dluo
    /**
     *  Constructor
     *
     *  @param	DoliDb		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create object into database
     *
     *  @param	User	$user        User that creates
     *  @param  int		$notrigger   0=launch triggers after, 1=disable triggers
     *  @return int      		   	 Return integer <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from the database
     *
     *  @param	int		$id		Id object
     *  @return int          	Return integer <0 if KO, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     *  Update object into database
     *
     *  @param	User	$user        User that modifies
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *  @param  User	$user        User that deletes
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return	int					 Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *	Load an object from its id and create a new one in database
     *
     *  @param	User	$user		User making the clone
     *	@param	int		$fromid     Id of object to clone
     * 	@return	int					New id of clone
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     *	Initialise object with example values
     *	Id must be 0 if object instance is a specimen
     *
     *	@return	void
     */
    public function initAsSpecimen()
    {
    }
    /**
     *  Clean fields (triming)
     *
     *  @return	void
     */
    private function cleanParam()
    {
    }
    /**
     *  Find first detail record that match eather eat-by or sell-by or batch within given warehouse
     *
     *  @param	int			$fk_product_stock   id product_stock for objet
     *  @param	integer		$eatby    			eat-by date for object - deprecated: a search must be done on batch number
     *  @param	integer		$sellby   			sell-by date for object - deprecated: a search must be done on batch number
     *  @param	string		$batch_number   	batch number for object
     *  @param	int			$fk_warehouse		filter on warehouse (use it if you don't have $fk_product_stock)
     *  @return int          					Return integer <0 if KO, >0 if OK
     */
    public function find($fk_product_stock = 0, $eatby = '', $sellby = '', $batch_number = '', $fk_warehouse = 0)
    {
    }
    /**
     * Return all batch detail records for a given product and warehouse
     *
     * @param	DoliDB		$dbs    			database object
     * @param	int			$fk_product_stock	id product_stock for objet
     * @param	int			$with_qty    		1 = doesn't return line with 0 quantity
     * @param  	int         $fk_product         If set to a product id, get eatby and sellby from table llx_product_lot
     * @return 	array|int         				Return integer <0 if KO, array of batch
     */
    public static function findAll($dbs, $fk_product_stock, $with_qty = 0, $fk_product = 0)
    {
    }
    /**
     * Return all batch known for a product and a warehouse (batch that was one day used)
     *
     * @param	int			$fk_product         Id of product
     * @param	int			$fk_warehouse       Id of warehouse
     * @param	int			$qty_min            [=NULL] Minimum quantity
     * @param	string		$sortfield		    [=NULL] List of sort fields, separated by comma. Example: 't1.fielda,t2.fieldb'
     * @param	string		$sortorder		    [=NULL] Sort order, separated by comma. Example: 'ASC,DESC';
     * @return  int|array   Return integer <0 if KO, array of batch
     *
     * @throws  Exception
     */
    public function findAllForProduct($fk_product, $fk_warehouse = 0, $qty_min = \null, $sortfield = \null, $sortorder = \null)
    {
    }
}