<?php

/**
 *	Class of dictionary type of thirdparty (used by imports)
 */
class CUnits extends \CommonDict
{
    /**
     * @var CUnits[]
     */
    public $records = array();
    // public $element = 'cunits';			//!< Id that identify managed objects
    // public $table_element = 'c_units';	//!< Name of table without prefix where object is stored
    /**
     * @var string label
     * @deprecated Use $label
     * @see $label
     */
    public $libelle;
    /**
     * @var string
     */
    public $sortorder;
    /**
     * @var string
     */
    public $short_label;
    /**
     * @var string
     */
    public $unit_type;
    /**
     * @var ?int
     */
    public $scale;
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create object into database
     *
     *  @param	User		$user        User that create
     *  @param	int<0,1>	$notrigger   0=launch triggers after, 1=disable triggers
     *  @return	int					   	 Return integer <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param      int		$id    			Id of CUnit object to fetch (rowid)
     *  @param		string	$code			Code
     *  @param		string	$short_label	Short Label ('g', 'kg', ...)
     *  @param		string	$unit_type		Unit type ('size', 'surface', 'volume', 'weight', ...)
     *  @return     int						Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $code = '', $short_label = '', $unit_type = '')
    {
    }
    /**
     * Load list of objects in memory from the database.
     *
     * @param  string      	$sortorder    	Sort Order
     * @param  string      	$sortfield    	Sort field
     * @param  int         	$limit        	Limit
     * @param  int         	$offset       	Offset
     * @param  string|array<string,mixed> $filter  	Filter USF
     * @param  string      	$filtermode   	Filter mode (AND or OR)
     * @return CUnits[]|int                 	int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = '', $filtermode = 'AND')
    {
    }
    /**
     *  Update object into database
     *
     *  @param      User		$user        User that modify
     *  @param      int<0,1>	$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return     int					   	 Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param  User		$user        User that delete
     *  @param  int<0,1>	$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return	int					 Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * Get unit from code
     * @param string $code code of unit
     * @param string $mode 0= id , short_label=Use short label as value, code=use code
     * @param string $unit_type weight,size,surface,volume,qty,time...
     * @return int|string            Return integer <0 if KO, Id of code if OK (or $code if $mode is different from '', 'short_label' or 'code')
     */
    public function getUnitFromCode($code, $mode = 'code', $unit_type = '')
    {
    }
    /**
     * Unit converter
     * @param float $value value to convert
     * @param int $fk_unit current unit id of value
     * @param int $fk_new_unit the id of unit to convert in
     * @return float
     */
    public function unitConverter($value, $fk_unit, $fk_new_unit = 0)
    {
    }
    /**
     * Get scale of unit factor
     *
     * @param 	int 		$id 	Id of unit in dictionary
     * @return 	float|int			Scale of unit
     */
    public function scaleOfUnitPow($id)
    {
    }
}