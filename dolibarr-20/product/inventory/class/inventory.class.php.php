<?php

//require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class for Inventory
 */
class Inventory extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'inventory';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'inventory';
    /**
     * @var string String with name of icon for inventory
     */
    public $picto = 'inventory';
    const STATUS_DRAFT = 0;
    // Draft
    const STATUS_VALIDATED = 1;
    // Inventory is in process
    const STATUS_RECORDED = 2;
    // Inventory is finisged. Stock movement has been recorded.
    const STATUS_CANCELED = 9;
    // Canceled
    /**
     *  'type' field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter]]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'text:none', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalString("MY_SETUP_PARAM")'
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'maxwidth200', 'wordbreak', 'tdoverflowmax200', 'minwidth300 maxwidth500 widthcentpercentminusx'
     *  'help' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set a list of values if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel"). Note that type can be 'integer' or 'varchar'
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'visible' => -1, 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'index' => 1, 'comment' => 'Id'),
        'ref' => array('type' => 'varchar(64)', 'label' => 'Ref', 'visible' => 1, 'enabled' => 1, 'position' => 10, 'notnull' => 1, 'index' => 1, 'searchall' => 1, 'comment' => 'Reference of object', 'css' => 'maxwidth150'),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'visible' => 0, 'enabled' => 1, 'position' => 20, 'notnull' => 1, 'index' => 1),
        'title' => array('type' => 'varchar(255)', 'label' => 'Label', 'visible' => 1, 'enabled' => 1, 'position' => 25, 'css' => 'minwidth300', 'csslist' => 'tdoverflowmax150', 'alwayseditable' => 1),
        'fk_warehouse' => array('type' => 'integer:Entrepot:product/stock/class/entrepot.class.php', 'label' => 'Warehouse', 'visible' => 1, 'enabled' => 1, 'position' => 30, 'index' => 1, 'help' => 'InventoryForASpecificWarehouse', 'picto' => 'stock', 'css' => 'minwidth300 maxwidth500 widthcentpercentminusx', 'csslist' => 'tdoverflowmax150'),
        'fk_product' => array('type' => 'integer:Product:product/class/product.class.php', 'label' => 'Product', 'get_name_url_params' => '0::0:-1:0::1', 'visible' => 1, 'enabled' => 1, 'position' => 32, 'index' => 1, 'help' => 'InventoryForASpecificProduct', 'picto' => 'product', 'css' => 'minwidth300 maxwidth500 widthcentpercentminusx', 'csslist' => 'tdoverflowmax150'),
        'categories_product' => array('type' => 'chkbxlst:categorie:label:rowid::type=0:0:', 'label' => 'OrProductsWithCategories', 'visible' => 3, 'enabled' => 1, 'position' => 33, 'help' => '', 'picto' => 'category', 'css' => 'minwidth300 maxwidth500 widthcentpercentminusx'),
        'date_inventory' => array('type' => 'date', 'label' => 'DateValue', 'visible' => 1, 'enabled' => '$conf->global->STOCK_INVENTORY_ADD_A_VALUE_DATE', 'position' => 35, 'csslist' => 'nowraponall'),
        // This date is not used so disabled by default.
        'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 500, 'csslist' => 'nowraponall'),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 501, 'csslist' => 'nowraponall'),
        'date_validation' => array('type' => 'datetime', 'label' => 'DateValidation', 'visible' => -2, 'enabled' => 1, 'position' => 502, 'csslist' => 'nowraponall'),
        'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 510, 'foreignkey' => 'user.rowid', 'csslist' => 'tdoverflowmax150'),
        'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 511, 'csslist' => 'tdoverflowmax150'),
        'fk_user_valid' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserValidation', 'visible' => -2, 'enabled' => 1, 'position' => 512, 'csslist' => 'tdoverflowmax150'),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'index' => 0, 'position' => 1000),
        'status' => array('type' => 'integer', 'label' => 'Status', 'visible' => 4, 'enabled' => 1, 'position' => 1000, 'notnull' => 1, 'default' => '0', 'index' => 1, 'arrayofkeyval' => array(0 => 'Draft', 1 => 'Validated', 2 => 'Closed', 9 => 'Canceled')),
    );
    /**
     * @var int ID
     */
    public $rowid;
    /**
     * @var string Ref
     */
    public $ref;
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * @var int ID
     */
    public $fk_warehouse;
    /**
     * @var int ID
     */
    public $fk_product;
    /**
     * @var string Categories id separated by comma
     */
    public $categories_product;
    public $date_inventory;
    public $title;
    /**
     * @var int Status
     */
    public $status;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    /**
     * @var integer|string date_validation
     */
    public $date_validation;
    /**
     * @var int ID
     */
    public $fk_user_creat;
    /**
     * @var int ID
     */
    public $fk_user_modif;
    /**
     * @var int ID
     */
    public $fk_user_valid;
    /**
     * @var string import key
     */
    public $import_key;
    // END MODULEBUILDER PROPERTIES
    // If this object has a subtable with lines
    /**
     * @var string    Name of subtable line
     */
    public $table_element_line = 'inventorydet';
    /**
     * @var string    Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_inventory';
    /**
     * @var string    Name of subtable class that manage subtable lines
     */
    public $class_element_line = 'Inventoryline';
    /**
     * @var array<string, array<string>>	List of child tables. To test if we can delete object.
     */
    protected $childtables = array();
    /**
     * @var string[]	List of child tables. To know object to delete on cascade.
     */
    protected $childtablesoncascade = array('inventorydet');
    /**
     * @var InventoryLine[]     Array of subtable lines
     */
    public $lines = array();
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
     * Validate inventory (start it)
     *
     * @param  	User 	$user      				User that creates
     * @param	int 	$notrigger 				0=launch triggers after, 1=disable triggers
     * @param	int		$include_sub_warehouse	Include sub warehouses
     * @return 	int             				Return integer <0 if KO, Id of created object if OK
     */
    public function validate(\User $user, $notrigger = 0, $include_sub_warehouse = 0)
    {
    }
    /**
     * Go back to draft
     *
     * @param  User $user      User that creates
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
     * @return int             Return integer <0 if KO, Id of created object if OK
     */
    public function setDraft(\User $user, $notrigger = 0)
    {
    }
    /**
     * Set to inventory to status "Closed". It means all stock movements were recorded.
     *
     * @param  User $user      User that creates
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
     * @return int             Return integer <0 if KO, Id of created object if OK
     */
    public function setRecorded(\User $user, $notrigger = 0)
    {
    }
    /**
     * Set to Canceled
     *
     * @param  User $user      User that creates
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
     * @return int             Return integer <0 if KO, Id of created object if OK
     */
    public function setCanceled(\User $user, $notrigger = 0)
    {
    }
    /**
     * Clone and object into another one
     *
     * @param  	User 	$user      	User that creates
     * @param  	int 	$fromid     Id of object to clone
     * @return 	mixed 				New object created, <0 if KO
     */
    public function createFromClone(\User $user, $fromid)
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
     * Load object lines in memory from the database
     *
     * @return int         Return integer <0 if KO, 0 if not found, >0 if OK
     */
    /*public function fetchLines()
    	 {
    	 $this->lines=array();
    
    	 // Load lines with object MyObjectLine
    
    	 return count($this->lines)?1:0;
    	 }*/
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
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
     *  Delete a line of object in database
     *
     *	@param  User	$user       User that delete
     *  @param	int		$idline		Id of line to delete
     *  @param 	int 	$notrigger  0=launch triggers after, 1=disable triggers
     *  @return int         		>0 if OK, <0 if KO
     */
    public function deleteLine(\User $user, $idline, $notrigger = 0)
    {
    }
    /**
     *  Return a link to the object card (with optionally the picto)
     *
     *	@param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option						On what the link point to
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
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
     *  Return the status
     *
     *  @param	int		$status        	Id status
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 5=Long label + Picto, 6=Long label + Picto
     *  @return string 			       	Label of status
     */
    public static function LibStatut($status, $mode = 0)
    {
    }
    /**
     *	Return a thumb for kanban views
     *
     *	@param      string	    $option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array		$arraydata				Array of data
     *  @return		string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
    /**
     *	Charge les information d'ordre info dans l'objet commande
     *
     *	@param  int		$id       Id of order
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
    /**
     * Return the child warehouse of the current one
     *
     * @param int 	$id 				Id of warehouse
     * @param array	$TChildWarehouse  	Array of child warehouses
     * @return int             			Return integer <0 if KO, >0 if OK
     */
    public function getChildWarehouse($id, &$TChildWarehouse)
    {
    }
}
/**
 * Class InventoryLine
 */
class InventoryLine extends \CommonObjectLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'inventoryline';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'inventorydet';
    /**
     * @see CommonObjectLine
     */
    public $parent_element = 'inventory';
    /**
     * @see CommonObjectLine
     */
    public $fk_parent_attribute = 'fk_inventory';
    /**
     * @var string String with name of icon for inventory
     */
    public $picto = 'stock';
    /**
     *  'type' if the field format.
     *  'label' the translation key.
     *  'enabled' is a condition when the field must be managed.
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only. Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'position' is the sort order of field.
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'help' is a string visible as a tooltip on field
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *  'default' is a default value for creation (can still be replaced by the global setup of default values)
     *  'showoncombobox' if field must be shown into the label of combobox
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'visible' => -1, 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'index' => 1, 'comment' => 'Id'), 'fk_inventory' => array('type' => 'integer:Inventory:product/inventory/class/inventory.class.php', 'label' => 'Inventory', 'visible' => 1, 'enabled' => 1, 'position' => 30, 'index' => 1, 'help' => 'LinkToInventory'), 'fk_warehouse' => array('type' => 'integer:Entrepot:product/stock/class/entrepot.class.php', 'label' => 'Warehouse', 'visible' => 1, 'enabled' => 1, 'position' => 30, 'index' => 1, 'help' => 'LinkToThirdparty'), 'fk_product' => array('type' => 'integer:Product:product/class/product.class.php', 'label' => 'Product', 'visible' => 1, 'enabled' => 1, 'position' => 32, 'index' => 1, 'help' => 'LinkToProduct'), 'batch' => array('type' => 'string', 'label' => 'Batch', 'visible' => 1, 'enabled' => 1, 'position' => 32, 'index' => 1, 'help' => 'LinkToProduct'), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 500), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 501), 'qty_stock' => array('type' => 'double', 'label' => 'QtyFound', 'visible' => 1, 'enabled' => 1, 'position' => 32, 'index' => 1, 'help' => 'Qty we found/want (to define during draft edition)'), 'qty_view' => array('type' => 'double', 'label' => 'QtyBefore', 'visible' => 1, 'enabled' => 1, 'position' => 33, 'index' => 1, 'help' => 'Qty before (filled once movements are validated)'), 'qty_regulated' => array('type' => 'double', 'label' => 'QtyDelta', 'visible' => 1, 'enabled' => 1, 'position' => 34, 'index' => 1, 'help' => 'Qty added or removed (filled once movements are validated)'), 'pmp_real' => array('type' => 'double', 'label' => 'PMPReal', 'visible' => 1, 'enabled' => 1, 'position' => 35), 'pmp_expected' => array('type' => 'double', 'label' => 'PMPExpected', 'visible' => 1, 'enabled' => 1, 'position' => 36));
    /**
     * @var int ID
     */
    public $rowid;
    public $fk_inventory;
    public $fk_warehouse;
    public $fk_product;
    public $batch;
    public $datec;
    /**
     * @var float Quantity stock
     */
    public $qty_stock;
    /**
     * @var float|null Quantity viewed
     */
    public $qty_view;
    /**
     * @var float Quantity regulated
     */
    public $qty_regulated;
    public $pmp_real;
    public $pmp_expected;
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Create object in database
     *
     * @param User 	$user       User that creates
     * @param int 	$notrigger  0=launch triggers after, 1=disable triggers
     * @return int             	Return integer <0 if KO, >0 if OK
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
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
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
}