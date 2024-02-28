<?php

/**
 *  Class to manage warehouses
 */
class Entrepot extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'stock';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'entrepot';
    public $picto = 'stock';
    public $ismultientitymanaged = 1;
    // 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
    /**
     * Warehouse closed, inactive
     */
    const STATUS_CLOSED = 0;
    /**
     * Warehouse open and operations for customer shipping, supplier dispatch, internal stock transfers/corrections allowed.
     */
    const STATUS_OPEN_ALL = 1;
    /**
     * Warehouse open and operations for stock transfers/corrections allowed (not for customer shipping and supplier dispatch).
     */
    const STATUS_OPEN_INTERNAL = 2;
    public $libelle;
    /**
     * @var string description
     */
    public $description;
    public $statut;
    public $lieu;
    /**
     * @var string Address
     */
    public $address;
    /**
     * @var string Zipcode
     */
    public $zip;
    /**
     * @var string Town
     */
    public $town;
    /**
     * @var int ID
     */
    public $fk_parent;
    // List of short language codes for status
    public $statuts = array();
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Creation d'un entrepot en base
     *
     *	@param		User	$user       Object user that create the warehouse
     *	@return		int					>0 if OK, =<0 if KO
     */
    public function create($user)
    {
    }
    /**
     *	Update properties of a warehouse
     *
     *	@param		int		$id     id of warehouse to modify
     *	@param      User	$user	User object
     *	@return		int				>0 if OK, <0 if KO
     */
    public function update($id, $user)
    {
    }
    /**
     *	Delete a warehouse
     *
     *	@param		User	$user		   Object user that made deletion
     *  @param      int     $notrigger     1=No trigger
     *	@return		int					   <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *	Load warehouse data
     *
     *	@param		int		$id     Warehouse id
     *	@param		string	$ref	Warehouse label
     *	@return		int				>0 if OK, <0 if KO
     */
    public function fetch($id, $ref = '')
    {
    }
    /**
     * 	Load warehouse info data
     *
     *  @param	int		$id      warehouse id
     *  @return	void
     */
    public function info($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of all warehouses
     *
     *	@param	int		$status		Status
     * 	@return array				Array list of warehouses
     */
    public function list_array($status = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return number of unique different product into a warehouse
     *
     * 	@return		Array		Array('nb'=>Nb, 'value'=>Value)
     */
    public function nb_different_products()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return stock and value of warehosue
     *
     * 	@return		Array		Array('nb'=>Nb, 'value'=>Value)
     */
    public function nb_products()
    {
    }
    /**
     *	Return label of status of object
     *
     *	@param      int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *	@return     string      		Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return label of a given status
     *
     *	@param	int		$statut     Status
     *	@param  int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *	@return string      		Label of status
     */
    public function LibStatut($statut, $mode = 0)
    {
    }
    /**
     *	Return clickable name (possibility with the pictogram)
     *
     *	@param		int		$withpicto		with pictogram
     *	@param		string	$option			Where the link point to
     *  @param      int     $showfullpath   0=Show ref only. 1=Show full path instead of Ref (this->fk_parent must be defined)
     *  @param	    int   	$notooltip		1=Disable tooltip
     *	@return		string					String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $showfullpath = 0, $notooltip = 0)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return	void
     */
    public function initAsSpecimen()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return full path to current warehouse
     *
     *	@return		string	String full path to current warehouse separated by " >> "
     */
    public function get_full_arbo()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return array of children warehouses ids from $id warehouse (recursive function)
     *
     * @param   int         $id					id parent warehouse
     * @param   integer[]	$TChildWarehouses	array which will contain all children (param by reference)
     * @return  integer[]   $TChildWarehouses	array which will contain all children
     */
    public function get_children_warehouses($id, &$TChildWarehouses)
    {
    }
    /**
     *	Create object on disk
     *
     *	@param     string		$modele			force le modele a utiliser ('' to not force)
     * 	@param     Translate	$outputlangs	Object langs to use for output
     *  @param     int			$hidedetails    Hide details of lines
     *  @param     int			$hidedesc       Hide description
     *  @param     int			$hideref        Hide ref
     *  @return    int             				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
}