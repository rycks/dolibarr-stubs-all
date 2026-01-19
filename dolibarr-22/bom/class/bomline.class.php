<?php

/**
 * Class for BOMLine
 */
class BOMLine extends \CommonObjectLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'bomline';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'bom_bomline';
    /**
     * @see CommonObjectLine
     */
    public $parent_element = 'bom';
    /**
     * @see CommonObjectLine
     */
    public $fk_parent_attribute = 'fk_bom';
    /**
     * @var string String with name of icon for bomline. Must be the part after the 'object_' into object_bomline.png
     */
    public $picto = 'bomline';
    /**
     *  'type' if the field format.
     *  'label' the translation key.
     *  'enabled' is a condition when the field must be managed.
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only. Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'default' is a default value for creation (can still be replaced by the global setup of default values)
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'position' is the sort order of field.
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' is the CSS style to use on field. For example: 'maxwidth200'
     *  'help' is a string visible as a tooltip on field
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'arrayofkeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-6,6>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'LineID', 'enabled' => 1, 'visible' => -1, 'position' => 1, 'notnull' => 1, 'index' => 1, 'comment' => "Id"), 'fk_bom' => array('type' => 'integer:BillOfMaterials:societe/class/bom.class.php', 'label' => 'BillOfMaterials', 'enabled' => 1, 'visible' => 1, 'position' => 10, 'notnull' => 1, 'index' => 1), 'fk_product' => array('type' => 'integer:Product:product/class/product.class.php', 'label' => 'Product', 'enabled' => 1, 'visible' => 1, 'position' => 20, 'notnull' => 1, 'index' => 1), 'fk_bom_child' => array('type' => 'integer:BOM:bom/class/bom.class.php', 'label' => 'BillOfMaterials', 'enabled' => 1, 'visible' => -1, 'position' => 40, 'notnull' => -1), 'description' => array('type' => 'text', 'label' => 'Description', 'enabled' => 1, 'visible' => -1, 'position' => 60, 'notnull' => -1), 'qty' => array('type' => 'double(24,8)', 'label' => 'Quantity', 'enabled' => 1, 'visible' => 1, 'position' => 100, 'notnull' => 1, 'isameasure' => 1), 'qty_frozen' => array('type' => 'smallint', 'label' => 'QuantityFrozen', 'enabled' => 1, 'visible' => 1, 'default' => '0', 'position' => 105, 'css' => 'maxwidth50imp', 'help' => 'QuantityConsumedInvariable'), 'disable_stock_change' => array('type' => 'smallint', 'label' => 'DisableStockChange', 'enabled' => 1, 'visible' => 1, 'default' => '0', 'position' => 108, 'css' => 'maxwidth50imp', 'help' => 'DisableStockChangeHelp'), 'efficiency' => array('type' => 'double(24,8)', 'label' => 'ManufacturingEfficiency', 'enabled' => 1, 'visible' => 0, 'default' => '1', 'position' => 110, 'notnull' => 1, 'css' => 'maxwidth50imp', 'help' => 'ValueOfEfficiencyConsumedMeans'), 'fk_unit' => array('type' => 'integer', 'label' => 'Unit', 'enabled' => 1, 'visible' => 1, 'position' => 120, 'notnull' => -1), 'position' => array('type' => 'integer', 'label' => 'Rank', 'enabled' => 1, 'visible' => 0, 'default' => '0', 'position' => 200, 'notnull' => 1), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 1000, 'notnull' => -1), 'fk_default_workstation' => array('type' => 'integer', 'label' => 'DefaultWorkstation', 'enabled' => 1, 'visible' => 1, 'notnull' => 0, 'position' => 1050));
    /**
     * @var int rowid
     */
    public $rowid;
    /**
     * @var int fk_bom
     */
    public $fk_bom;
    /**
     * @var int Id of product
     */
    public $fk_product;
    /**
     * @var ?int Id of parent bom
     */
    public $fk_bom_child;
    /**
     * @var string description
     */
    public $description;
    /**
     * @var double qty
     */
    public $qty;
    /**
     * @var int qty frozen (smallint in db)
     */
    public $qty_frozen;
    /**
     * @var int disable stock change
     */
    public $disable_stock_change;
    /**
     * @var double efficiency
     */
    public $efficiency;
    /**
     * @var int|null                ID of the unit of measurement (rowid in llx_c_units table)
     * @see measuringUnitString()
     * @see getLabelOfUnit()
     */
    public $fk_unit;
    /**
     * @var ?int Service Workstation
     */
    public $fk_default_workstation;
    /**
     * @var int position of line
     */
    public $position;
    /**
     * @var string import key
     */
    public $import_key;
    // END MODULEBUILDER PROPERTIES
    /**
     * @var int|float		Calculated cost for the BOM line
     */
    public $total_cost = 0;
    /**
     * @var int|float	Line unit cost based on product cost price or pmp
     */
    public $unit_cost = 0;
    /**
     * @var BOM[]     array of Bom in line
     */
    public $childBom = array();
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param  User $user      User that creates
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
     * @return int             Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id   Id object
     * @param string $ref  Ref
     * @return int         Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null)
    {
    }
    /**
     * Load list of objects in memory from the database.
     *
     * @param  string      	$sortorder    	Sort Order
     * @param  string      	$sortfield    	Sort field
     * @param  int         	$limit        	limit
     * @param  int         	$offset       	Offset
     * @param  string		$filter       	Filter as an Universal Search string.
     * 										Example: '((client:=:1) OR ((client:>=:2) AND (client:<=:3))) AND (client:!=:8) AND (nom:like:'a%')'
     * @param  string		$filtermode		No more used
     * @return BOMLine[]|int<-1,-1>			int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = '', $filtermode = 'AND')
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  int	$notrigger 0=launch triggers after, 1=disable triggers
     * @return int             Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param User 	$user       User that deletes
     * @param int 	$notrigger  0=launch triggers after, 1=disable triggers
     * @return int             	Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     *  Return a link to the object card (with optionally the picto)
     *
     *	@param	int<0,2>	$withpicto				Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string		$option					On what the link point to ('nolink', ...)
     *  @param	int<0,1>  	$notooltip				1=Disable tooltip
     *  @param  string		$morecss				Add more css on link
     *  @param  int<-1,1>	$save_lastsearch_value	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *  Return label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the status
     *
     *  @param	int			$status		Id status
     *  @param  int<0,6>	$mode		0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 					Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     *	Load the info information in the object
     *
     *	@param  int		$id       Id of object
     *	@return	void
     */
    public function info($id)
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