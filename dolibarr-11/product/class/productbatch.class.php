<?php

/**
 *	Manage record for batch number management
 */
class Productbatch extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'productbatch';
    private static $_table_element = 'product_batch';
    //!< Name of table without prefix where object is stored
    public $tms = '';
    public $fk_product_stock;
    public $sellby = '';
    public $eatby = '';
    public $batch = '';
    public $qty;
    public $warehouseid;
    /**
     * @var int ID
     */
    public $fk_product;
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
     *  @return int      		   	 <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from the database
     *
     *  @param	int		$id		Id object
     *  @return int          	<0 if KO, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     *  Update object into database
     *
     *  @param	User	$user        User that modifies
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *  @param  User	$user        User that deletes
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return	int					 <0 if KO, >0 if OK
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
     *  @return int          					<0 if KO, >0 if OK
     */
    public function find($fk_product_stock = 0, $eatby = '', $sellby = '', $batch_number = '')
    {
    }
    /**
     * Return all batch detail records for a given product and warehouse
     *
     *  @param	DoliDB		$db    				database object
     *  @param	int			$fk_product_stock	id product_stock for objet
     *  @param	int			$with_qty    		1 = doesn't return line with 0 quantity
     *  @param  int         $fk_product         If set to a product id, get eatby and sellby from table llx_product_lot
     *  @return array         					<0 if KO, array of batch
     */
    public static function findAll($db, $fk_product_stock, $with_qty = 0, $fk_product = 0)
    {
    }
}