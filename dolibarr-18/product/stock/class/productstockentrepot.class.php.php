<?php

//require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class ProductStockEntrepot
 *
 * Put here description of your class
 *
 * @see CommonObject
 */
class ProductStockEntrepot extends \CommonObject
{
    /**
     * @var string Id to identify managed objects
     */
    public $element = 'ProductStockEntrepot';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'product_warehouse_properties';
    public $tms = '';
    /**
     * @var int ID
     */
    public $fk_product;
    /**
     * @var int ID
     */
    public $fk_entrepot;
    public $seuil_stock_alerte;
    public $desiredstock;
    public $import_key;
    /**
     * Constructor
     *
     * @param DoliDb $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param  User $user      User that creates
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     *
     * @return int <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = \false)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id  				Id object
     * @param int    $fk_product 		Id product
     * @param int    $fk_entrepot  		Id warehouse
     * @return int 						<0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $fk_product = 0, $fk_entrepot = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int	 $fk_product Product from which we want to get limit and desired stock by warehouse
     * @param int	 $fk_entrepot Warehouse in which we want to get products limit and desired stock
     * @param string $sortorder  Sort Order
     * @param string $sortfield  Sort field
     * @param int    $limit      offset limit
     * @param int    $offset     offset limit
     * @param array  $filter     filter array
     * @param string $filtermode filter mode (AND or OR)
     *
     * @return int|array <0 if KO, array if OK
     */
    public function fetchAll($fk_product = '', $fk_entrepot = '', $sortorder = '', $sortfield = '', $limit = 0, $offset = 0, array $filter = array(), $filtermode = 'AND')
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     *
     * @return int <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = \false)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user      User that deletes
     * @param bool $notrigger false=launch triggers after, true=disable triggers
     *
     * @return int <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
    /**
     * Load an object from its id and create a new one in database
     *
     * @param	User	$user	   User making the clone
     * @param   int     $fromid    Id of object to clone
     * @return  int                New id of clone
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     *  Return a link to the user card (with optionaly the picto)
     * 	Use this->id,this->lastname, this->firstname
     *
     *	@param	int		$withpicto			Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option				On what the link point to
     *  @param	integer	$notooltip			1=Disable tooltip
     *  @param	int		$maxlen				Max length of visible user name
     *  @param  string  $morecss            Add more css on link
     *	@return	string						String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $maxlen = 24, $morecss = '')
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi le libelle d'un status donne
     *
     *  @param	int		$status        	Id status
     *  @param  int		$mode          	0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return string 			       	Label of status
     */
    public function LibStatut($status, $mode = 0)
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