<?php

/**
 *  Class to manage table commandefournisseurdispatch
 */
class ReceptionLineBatch extends \CommonObjectLine
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string ID to identify managed object
     */
    public $element = 'receptionlinebatch';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'receptiondet_batch';
    //!< Name of table without prefix where object is stored
    public $lines = array();
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var int	ID of reception
     */
    public $fk_reception;
    /**
     * @var int ID	Duplicate of origin_id (using origin_id is better)
     */
    public $fk_element;
    /**
     * @var int ID	Duplicate of fk_element
     */
    public $origin_id;
    /**
     * @var int ID	Duplicate of origin_line_id
     */
    public $fk_elementdet;
    /**
     * @var int ID	Duplicate of fk_elementdet
     */
    public $origin_line_id;
    /**
     * @var string		Type of object the fk_element refers to. Example: 'supplier_order'.
     */
    public $element_type;
    /**
     * @var int ID
     */
    public $fk_product;
    /**
     * @var float Quantity
     */
    public $qty;
    /**
     * @var float Quantity asked
     */
    public $qty_asked;
    /**
     * @var string
     */
    public $libelle;
    /**
     * @var string
     */
    public $label;
    /**
     * @var string
     */
    public $desc;
    /**
     * @var float
     */
    public $tva_tx;
    /**
     * @var string
     */
    public $vat_src_code;
    /**
     * @var string
     */
    public $ref_supplier;
    /**
     * @var int ID
     */
    public $fk_entrepot;
    /**
     * @var int User ID
     */
    public $fk_user;
    /**
     * @var int|string
     */
    public $datec = '';
    /**
     * @var string
     */
    public $comment;
    /**
     * @var int Status
     */
    public $status;
    /**
     * @var string
     */
    public $batch;
    /**
     * @var ?int
     */
    public $eatby = \null;
    /**
     * @var ?int
     */
    public $sellby = \null;
    /**
     * @var int|float
     */
    public $cost_price = 0;
    /**
     *  Constructor
     *
     *  @param	DoliDB		$db      Database handler
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
     *  @param	int		$id    	Id object
     *  @param	string	$ref	Ref
     *  @return int          	Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '')
    {
    }
    /**
     *  Update object into database
     *
     *  @param	User	$user        User that modifies
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 Return integer <0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param  User	$user        User that deletes
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
     *  Return label of the status of object
     *
     *  @param      int		$mode			0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto
     *  @return 	string        			Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of a status
     *
     * 	@param  int		$status		Id status
     *  @param  int		$mode       0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto
     *  @return string				Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     *	Initialise object with example values
     *	Id must be 0 if object instance is a specimen
     *
     *	@return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param string 		$sortorder 		Sort Order
     * @param string 		$sortfield 		Sort field
     * @param int    		$limit     		limit
     * @param int    		$offset    		offset limit
     * @param string|array<string,mixed>  $filter    		filter array
     * @param string 		$filtermode 	filter mode (AND or OR)
     * @return 								int Return integer <0 if KO, >0 if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = '', $filtermode = 'AND')
    {
    }
}