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
     * @var array  Does inventory support multicompany module ? 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     */
    public $ismultientitymanaged = 1;
    /**
     * @var int  Does object support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 1;
    /**
     * @var string String with name of icon for inventory
     */
    public $picto = 'stock';
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
    const STATUS_RECORDED = 2;
    const STATUS_CANCELED = 9;
    /**
     *  'type' if the field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'enabled' is a condition when the field must be managed.
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'default' is a default value for creation (can still be replaced by the global setup of default values)
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommanded to name the field fk_...).
     *  'position' is the sort order of field.
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' is the CSS style to use on field. For example: 'maxwidth200'
     *  'help' is a string visible as a tooltip on field
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'arraykeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array  Array with all fields and their property
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'visible' => -1, 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'index' => 1, 'comment' => 'Id'), 'ref' => array('type' => 'varchar(64)', 'label' => 'Ref', 'visible' => 1, 'enabled' => 1, 'position' => 10, 'notnull' => 1, 'index' => 1, 'searchall' => 1, 'comment' => 'Reference of object', 'css' => 'maxwidth200'), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'visible' => 0, 'enabled' => 1, 'position' => 20, 'notnull' => 1, 'index' => 1), 'title' => array('type' => 'varchar(255)', 'label' => 'Label', 'visible' => 1, 'enabled' => 1, 'position' => 25, 'css' => 'minwidth300'), 'fk_warehouse' => array('type' => 'integer:Entrepot:product/stock/class/entrepot.class.php', 'label' => 'Warehouse', 'visible' => 1, 'enabled' => 1, 'position' => 30, 'index' => 1, 'help' => 'InventoryForASpecificWarehouse'), 'fk_product' => array('type' => 'integer:Product:product/class/product.class.php', 'label' => 'Product', 'visible' => 1, 'enabled' => 1, 'position' => 32, 'index' => 1, 'help' => 'InventoryForASpecificProduct'), 'date_inventory' => array('type' => 'date', 'label' => 'DateValue', 'visible' => 1, 'enabled' => 1, 'position' => 35), 'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 500), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 501), 'date_validation' => array('type' => 'datetime', 'label' => 'DateValidation', 'visible' => -2, 'enabled' => 1, 'position' => 502), 'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 510, 'foreignkey' => 'user.rowid'), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 511), 'fk_user_valid' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserValidation', 'visible' => -2, 'enabled' => 1, 'position' => 512), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'index' => 0, 'position' => 1000), 'status' => array('type' => 'integer', 'label' => 'Status', 'visible' => 4, 'enabled' => 1, 'position' => 1000, 'notnull' => 1, 'default' => 0, 'index' => 1, 'arrayofkeyval' => array(0 => 'Draft', 1 => 'Validated', 2 => 'Recorded', 9 => 'Canceled')));
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
    public $tms;
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
     * @var array	List of child tables. To test if we can delete object.
     */
    protected $childtables = array();
    /**
     * @var array	List of child tables. To know object to delete on cascade.
     */
    protected $childtablesoncascade = array('inventorydet');
    /**
     * @var InventoryLine[]     Array of subtable lines
     */
    public $lines = array();
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
     * @return int             <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = \false)
    {
    }
    /**
     * Validate inventory (start it)
     *
     * @param  User $user      User that creates
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, Id of created object if OK
     */
    public function validate(\User $user, $notrigger = \false)
    {
    }
    /**
     * Go back to draft
     *
     * @param  User $user      User that creates
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, Id of created object if OK
     */
    public function setDraft(\User $user, $notrigger = \false)
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
     * @return int         <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null)
    {
    }
    /**
     * Load object lines in memory from the database
     *
     * @return int         <0 if KO, 0 if not found, >0 if OK
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
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = \false)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user       User that deletes
     * @param bool $notrigger  false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
    /**
     *  Delete a line of object in database
     *
     *	@param  User	$user       User that delete
     *  @param	int		$idline		Id of line to delete
     *  @param 	bool 	$notrigger  false=launch triggers after, true=disable triggers
     *  @return int         		>0 if OK, <0 if KO
     */
    public function deleteLine(\User $user, $idline, $notrigger = \false)
    {
    }
    /**
     *  Return a link to the object card (with optionaly the picto)
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
     *  Retourne le libelle du status d'un user (actif, inactif)
     *
     *  @param	int		$mode          0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
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
     *	Charge les informations d'ordre info dans l'objet commande
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
     * @return void
     */
    public function initAsSpecimen()
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
     * @var array  Does inventory support multicompany module ? 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     */
    public $ismultientitymanaged = 0;
    /**
     * @var int  Does object support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 0;
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
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommanded to name the field fk_...).
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
     * @var array  Array with all fields and their property
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'visible' => -1, 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'index' => 1, 'comment' => 'Id'), 'fk_inventory' => array('type' => 'integer:Inventory:product/inventory/class/inventory.class.php', 'label' => 'Inventory', 'visible' => 1, 'enabled' => 1, 'position' => 30, 'index' => 1, 'help' => 'LinkToInventory'), 'fk_warehouse' => array('type' => 'integer:Entrepot:product/stock/class/entrepot.class.php', 'label' => 'Warehouse', 'visible' => 1, 'enabled' => 1, 'position' => 30, 'index' => 1, 'help' => 'LinkToThirparty'), 'fk_product' => array('type' => 'integer:Product:product/class/product.class.php', 'label' => 'Product', 'visible' => 1, 'enabled' => 1, 'position' => 32, 'index' => 1, 'help' => 'LinkToProduct'), 'batch' => array('type' => 'string', 'label' => 'Batch', 'visible' => 1, 'enabled' => 1, 'position' => 32, 'index' => 1, 'help' => 'LinkToProduct'), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 500), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 501), 'qty_stock' => array('type' => 'double', 'label' => 'QtyFound', 'visible' => 1, 'enabled' => 1, 'position' => 32, 'index' => 1, 'help' => 'Qty we found/want (to define during draft edition)'), 'qty_view' => array('type' => 'double', 'label' => 'QtyBefore', 'visible' => 1, 'enabled' => 1, 'position' => 33, 'index' => 1, 'help' => 'Qty before (filled once movements are validated)'), 'qty_regulated' => array('type' => 'double', 'label' => 'QtyDelta', 'visible' => 1, 'enabled' => 1, 'position' => 34, 'index' => 1, 'help' => 'Qty aadded or removed (filled once movements are validated)'));
    /**
     * @var int ID
     */
    public $rowid;
    public $fk_inventory;
    public $fk_warehouse;
    public $fk_product;
    public $batch;
    public $datec;
    public $tms;
    public $qty_stock;
    public $qty_view;
    public $qty_regulated;
    /**
     * Create object in database
     *
     * @param User $user       User that creates
     * @param bool $notrigger  false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, >0 if OK
     */
    public function create(\User $user, $notrigger = \false)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id   Id object
     * @param string $ref  Ref
     * @return int         <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null)
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = \false)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user       User that deletes
     * @param bool $notrigger  false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
}