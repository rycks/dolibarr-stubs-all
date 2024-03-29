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
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'stock';
    public $ismultientitymanaged = 1;
    // 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
    /**
     * @var string	Label
     * @deprecated
     * @see $label
     */
    public $libelle;
    /**
     * @var string  Label
     */
    public $label;
    /**
     * @var string description
     */
    public $description;
    public $statut;
    /**
     * @var string Place
     */
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
     * @var string Phone
     */
    public $phone;
    /**
     * @var string Fax
     */
    public $fax;
    /**
     * @var int ID of parent
     */
    public $fk_parent;
    /**
     * @var array List of short language codes for status
     */
    public $statuts = array();
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'ID', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'position' => 10),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'default' => 1, 'notnull' => 1, 'index' => 1, 'position' => 15),
        'ref' => array('type' => 'varchar(255)', 'label' => 'Ref', 'enabled' => 1, 'visible' => 1, 'showoncombobox' => 1, 'position' => 25),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'position' => 30),
        'description' => array('type' => 'text', 'label' => 'Description', 'enabled' => 1, 'visible' => -2, 'position' => 35),
        'lieu' => array('type' => 'varchar(64)', 'label' => 'LocationSummary', 'enabled' => 1, 'visible' => 1, 'position' => 40, 'showoncombobox' => 1),
        'fk_parent' => array('type' => 'integer:Entrepot:product/stock/class/entrepot.class.php:1:statut=1 AND entity IN (__SHARED_ENTITIES__)', 'label' => 'ParentWarehouse', 'enabled' => 1, 'visible' => -2, 'position' => 41),
        'address' => array('type' => 'varchar(255)', 'label' => 'Address', 'enabled' => 1, 'visible' => -2, 'position' => 45),
        'zip' => array('type' => 'varchar(10)', 'label' => 'Zip', 'enabled' => 1, 'visible' => -2, 'position' => 50),
        'town' => array('type' => 'varchar(50)', 'label' => 'Town', 'enabled' => 1, 'visible' => -2, 'position' => 55),
        'fk_departement' => array('type' => 'sellist:c_departements:label:rowid::active=1', 'label' => 'State', 'enabled' => 1, 'visible' => 0, 'position' => 60),
        'fk_pays' => array('type' => 'sellist:c_country:label:rowid::active=1', 'label' => 'Country', 'enabled' => 1, 'visible' => -2, 'position' => 65),
        'phone' => array('type' => 'varchar(20)', 'label' => 'Phone', 'enabled' => 1, 'visible' => -2, 'position' => 70),
        'fax' => array('type' => 'varchar(20)', 'label' => 'Fax', 'enabled' => 1, 'visible' => -2, 'position' => 75),
        //'fk_user_author' =>array('type'=>'integer', 'label'=>'Fk user author', 'enabled'=>1, 'visible'=>-2, 'position'=>82),
        'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -2, 'position' => 500),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 501),
        //'import_key' =>array('type'=>'varchar(14)', 'label'=>'ImportId', 'enabled'=>1, 'visible'=>-2, 'position'=>1000),
        //'model_pdf' =>array('type'=>'varchar(255)', 'label'=>'ModelPDF', 'enabled'=>1, 'visible'=>0, 'position'=>1010),
        'statut' => array('type' => 'tinyint(4)', 'label' => 'Status', 'enabled' => 1, 'visible' => 1, 'position' => 200),
    );
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
     *	@param	int		$status     Id status
     *	@param  int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *	@return string      		Label of status
     */
    public function LibStatut($status, $mode = 0)
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
    /**
     * Sets object to supplied categories.
     *
     * Deletes object from existing categories not supplied.
     * Adds it to non existing supplied categories.
     * Existing categories are left untouch.
     *
     * @param int[]|int $categories Category or categories IDs
     * @return void
     */
    public function setCategories($categories)
    {
    }
}