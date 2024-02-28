<?php

//require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class for BOM
 */
class BOM extends \CommonObject
{
    /**
     * @var string ID of module.
     */
    public $module = 'bom';
    /**
     * @var string ID to identify managed object
     */
    public $element = 'bom';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'bom_bom';
    /**
     * @var int  Does bom support multicompany module ? 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     */
    public $ismultientitymanaged = 1;
    /**
     * @var int  Does object support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 1;
    /**
     * @var string String with name of icon for bom. Must be the part after the 'object_' into object_bom.png
     */
    public $picto = 'bom';
    /**
     * @var Product	Object product of the BOM
     */
    public $product;
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
    const STATUS_CANCELED = 9;
    /**
     *  'type' field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter]]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'text:none', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or '$conf->global->MY_SETUP_PARAM)
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommanded to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'css'=>'minwidth300 maxwidth500 widthcentpercentminusx', 'cssview'=>'wordbreak', 'csslist'=>'tdoverflowmax200'
     *  'help' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -2, 'position' => 1, 'notnull' => 1, 'index' => 1, 'comment' => "Id"),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'default' => 1, 'index' => 1, 'position' => 5),
        'ref' => array('type' => 'varchar(128)', 'label' => 'Ref', 'enabled' => 1, 'noteditable' => 1, 'visible' => 4, 'position' => 10, 'notnull' => 1, 'default' => '(PROV)', 'index' => 1, 'searchall' => 1, 'comment' => "Reference of BOM", 'showoncombobox' => '1', 'csslist' => 'nowraponall'),
        'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'enabled' => 1, 'visible' => 1, 'position' => 30, 'notnull' => 1, 'searchall' => 1, 'showoncombobox' => '2', 'autofocusoncreate' => 1, 'css' => 'minwidth300 maxwidth400', 'csslist' => 'tdoverflowmax200'),
        'bomtype' => array('type' => 'integer', 'label' => 'Type', 'enabled' => 1, 'visible' => 1, 'position' => 33, 'notnull' => 1, 'default' => '0', 'arrayofkeyval' => array(0 => 'Manufacturing', 1 => 'Disassemble'), 'css' => 'minwidth175', 'csslist' => 'minwidth175 center'),
        //'bomtype' => array('type'=>'integer', 'label'=>'Type', 'enabled'=>1, 'visible'=>-1, 'position'=>32, 'notnull'=>1, 'default'=>'0', 'arrayofkeyval'=>array(0=>'Manufacturing')),
        'fk_product' => array('type' => 'integer:Product:product/class/product.class.php:1:((finished:is:null) or (finished:!=:0))', 'label' => 'Product', 'picto' => 'product', 'enabled' => 1, 'visible' => 1, 'position' => 35, 'notnull' => 1, 'index' => 1, 'help' => 'ProductBOMHelp', 'css' => 'maxwidth500', 'csslist' => 'tdoverflowmax100'),
        'description' => array('type' => 'text', 'label' => 'Description', 'enabled' => 1, 'visible' => -1, 'position' => 60, 'notnull' => -1),
        'qty' => array('type' => 'real', 'label' => 'Quantity', 'enabled' => 1, 'visible' => 1, 'default' => 1, 'position' => 55, 'notnull' => 1, 'isameasure' => '1', 'css' => 'maxwidth50imp right'),
        //'efficiency' => array('type'=>'real', 'label'=>'ManufacturingEfficiency', 'enabled'=>1, 'visible'=>-1, 'default'=>1, 'position'=>100, 'notnull'=>0, 'css'=>'maxwidth50imp', 'help'=>'ValueOfMeansLossForProductProduced'),
        'duration' => array('type' => 'duration', 'label' => 'EstimatedDuration', 'enabled' => 1, 'visible' => -1, 'position' => 101, 'notnull' => -1, 'css' => 'maxwidth50imp', 'help' => 'EstimatedDurationDesc'),
        'fk_warehouse' => array('type' => 'integer:Entrepot:product/stock/class/entrepot.class.php:0', 'label' => 'WarehouseForProduction', 'picto' => 'stock', 'enabled' => 1, 'visible' => -1, 'position' => 102, 'css' => 'maxwidth500', 'csslist' => 'tdoverflowmax100'),
        'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => -2, 'position' => 161, 'notnull' => -1),
        'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => -2, 'position' => 162, 'notnull' => -1),
        'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -2, 'position' => 300, 'notnull' => 1),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -2, 'position' => 501, 'notnull' => 1),
        'date_valid' => array('type' => 'datetime', 'label' => 'DateValidation', 'enabled' => 1, 'visible' => -2, 'position' => 502, 'notnull' => 0),
        'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserCreation', 'picto' => 'user', 'enabled' => 1, 'visible' => -2, 'position' => 510, 'notnull' => 1, 'foreignkey' => 'user.rowid', 'csslist' => 'tdoverflowmax100'),
        'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'picto' => 'user', 'enabled' => 1, 'visible' => -2, 'position' => 511, 'notnull' => -1, 'csslist' => 'tdoverflowmax100'),
        'fk_user_valid' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserValidation', 'picto' => 'user', 'enabled' => 1, 'visible' => -2, 'position' => 512, 'notnull' => 0, 'csslist' => 'tdoverflowmax100'),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 1000, 'notnull' => -1),
        'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 1010),
        'status' => array('type' => 'integer', 'label' => 'Status', 'enabled' => 1, 'visible' => 2, 'position' => 1000, 'notnull' => 1, 'default' => 0, 'index' => 1, 'arrayofkeyval' => array(0 => 'Draft', 1 => 'Enabled', 9 => 'Disabled')),
    );
    /**
     * @var int rowid
     */
    public $rowid;
    /**
     * @var string ref
     */
    public $ref;
    /**
     * @var string label
     */
    public $label;
    /**
     * @var int bomtype
     */
    public $bomtype;
    /**
     * @var string description
     */
    public $description;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    /**
     * @var integer|string date_valid
     */
    public $date_valid;
    public $tms;
    /**
     * @var int Id User creator
     */
    public $fk_user_creat;
    /**
     * @var int Id User modifying
     */
    public $fk_user_modif;
    /**
     * @var int Id User modifying
     */
    public $fk_user_valid;
    /**
     * @var int Id User modifying
     */
    public $fk_warehouse;
    /**
     * @var string import key
     */
    public $import_key;
    /**
     * @var int status
     */
    public $status;
    /**
     * @var int product Id
     */
    public $fk_product;
    public $qty;
    public $duration;
    public $efficiency;
    // END MODULEBUILDER PROPERTIES
    // If this object has a subtable with lines
    /**
     * @var int    Name of subtable line
     */
    public $table_element_line = 'bom_bomline';
    /**
     * @var string    Fieldname with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_bom';
    /**
     * @var string    Name of subtable class that manage subtable lines
     */
    public $class_element_line = 'BOMLine';
    // /**
    //  * @var array	List of child tables. To test if we can delete object.
    //  */
    // protected $childtables=array();
    /**
     * @var array	List of child tables. To know object to delete on cascade.
     */
    protected $childtablesoncascade = array('bom_bomline');
    /**
     * @var BOMLine[]     Array of subtable lines
     */
    public $lines = array();
    /**
     * @var int		Calculated cost for the BOM
     */
    public $total_cost = 0;
    /**
     * @var int		Calculated cost for 1 unit of the product in BOM
     */
    public $unit_cost = 0;
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
     * @return int             Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = \false)
    {
    }
    /**
     * Clone an object into another one
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
    public function fetchLines()
    {
    }
    /**
     * Load object lines in memory from the database by type of product
     *
     * 	@param int    $typeproduct   0 type product, 1 type service
     * @return int         Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetchLinesbytypeproduct($typeproduct = 0)
    {
    }
    /**
     * Load list of objects in memory from the database.
     *
     * @param  string      $sortorder    Sort Order
     * @param  string      $sortfield    Sort field
     * @param  int         $limit        limit
     * @param  int         $offset       Offset
     * @param  array       $filter       Filter array. Example array('field'=>'valueforlike', 'customurl'=>...)
     * @param  string      $filtermode   Filter mode (AND or OR)
     * @return array|int                 int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, array $filter = array(), $filtermode = 'AND')
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     * @return int             Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = \false)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user       User that deletes
     * @param bool $notrigger  false=launch triggers after, true=disable triggers
     * @return int             Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
    /**
     * Add an BOM line into database (linked to BOM)
     *
     * @param	int		$fk_product				Id of product
     * @param	float	$qty					Quantity
     * @param	int		$qty_frozen				Frozen quantity
     * @param 	int		$disable_stock_change	Disable stock change on using in MO
     * @param	float	$efficiency				Efficiency in MO
     * @param	int		$position				Position of BOM-Line in BOM-Lines
     * @param	int		$fk_bom_child			Id of BOM Child
     * @param	string	$import_key				Import Key
     * @param	string	$fk_unit				Unit
     * @param	array	$array_options			extrafields array
     * @param	int		$fk_default_workstation	Default workstation
     * @return	int								Return integer <0 if KO, Id of created object if OK
     */
    public function addLine($fk_product, $qty, $qty_frozen = 0, $disable_stock_change = 0, $efficiency = 1.0, $position = -1, $fk_bom_child = \null, $import_key = \null, $fk_unit = '', $array_options = array(), $fk_default_workstation = \null)
    {
    }
    /**
     * Update an BOM line into database
     *
     * @param 	int		$rowid					Id of line to update
     * @param	float	$qty					Quantity
     * @param	int		$qty_frozen				Frozen quantity
     * @param 	int		$disable_stock_change	Disable stock change on using in MO
     * @param	float	$efficiency				Efficiency in MO
     * @param	int		$position				Position of BOM-Line in BOM-Lines
     * @param	string	$import_key				Import Key
     * @param	int		$fk_unit				Unit of line
     * @param	array	$array_options			extrafields array
     * @param	int		$fk_default_workstation	Default workstation
     * @return	int								Return integer <0 if KO, Id of updated BOM-Line if OK
     */
    public function updateLine($rowid, $qty, $qty_frozen = 0, $disable_stock_change = 0, $efficiency = 1.0, $position = -1, $import_key = \null, $fk_unit = 0, $array_options = array(), $fk_default_workstation = \null)
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
     *  Returns the reference to the following non used BOM depending on the active numbering module
     *  defined into BOM_ADDON
     *
     *  @param	Product		$prod 	Object product
     *  @return string      		BOM free reference
     */
    public function getNextNumRef($prod)
    {
    }
    /**
     *	Validate bom
     *
     *	@param		User	$user     		User making status change
     *  @param		int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return  	int						Return integer <=0 if OK, 0=Nothing done, >0 if KO
     */
    public function validate($user, $notrigger = 0)
    {
    }
    /**
     *	Set draft status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function setDraft($user, $notrigger = 0)
    {
    }
    /**
     *	Set cancel status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int						Return integer <0 if KO, 0=Nothing done, >0 if OK
     */
    public function cancel($user, $notrigger = 0)
    {
    }
    /**
     *	Set cancel status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int						Return integer <0 if KO, 0=Nothing done, >0 if OK
     */
    public function reopen($user, $notrigger = 0)
    {
    }
    /**
     * getTooltipContentArray
     * @param array $params params to construct tooltip data
     * @since v18
     * @return array
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *  Return a link to the object card (with optionaly the picto)
     *
     *	@param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option						On what the link point to ('nolink', ...)
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								String with URL
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
     *  @param	int		$status        Id status
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 			       Label of status
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
     * 	Create an array of lines
     *
     * 	@return array|int		array of lines if OK, <0 if KO
     */
    public function getLinesArray()
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *  @param	    string		$modele			Force template to use ('' to not force)
     *  @param		Translate	$outputlangs	objet lang a utiliser pour traduction
     *  @param      int			$hidedetails    Hide details of lines
     *  @param      int			$hidedesc       Hide description
     *  @param      int			$hideref        Hide ref
     *  @param      null|array  $moreparams     Array to provide more information
     *  @return     int         				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
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
    /**
     * Action executed by scheduler
     * CAN BE A CRON TASK. In such a case, parameters come from the schedule job setup field 'Parameters'
     *
     * @return	int			0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function doScheduledJob()
    {
    }
    /**
     * BOM costs calculation based on cost_price or pmp of each BOM line.
     * Set the property ->total_cost and ->unit_cost of BOM.
     *
     * @return int			Return integer <0 if KO, >0 if OK
     */
    public function calculateCosts()
    {
    }
    /**
     * Function used to replace a product id with another one.
     *
     * @param DoliDB $db Database handler
     * @param int $origin_id Old product id
     * @param int $dest_id New product id
     * @return bool
     */
    public static function replaceProduct(\DoliDB $db, $origin_id, $dest_id)
    {
    }
    /**
     * Get Net needs by product
     *
     * @param array $TNetNeeds Array of ChildBom and infos linked to
     * @param int   $qty       qty needed
     * @return void
     */
    public function getNetNeeds(&$TNetNeeds = array(), $qty = 0)
    {
    }
    /**
     * Get Net needs Tree by product or bom
     *
     * @param array $TNetNeeds Array of ChildBom and infos linked to
     * @param int   $qty       qty needed
     * @param int   $level     level of recursivity
     * @return void
     */
    public function getNetNeedsTree(&$TNetNeeds = array(), $qty = 0, $level = 0)
    {
    }
    /**
     * Recursively retrieves all parent bom in the tree that leads to the $bom_id bom
     *
     * @param 	array	$TParentBom		We put all found parent bom in $TParentBom
     * @param 	int		$bom_id			ID of bom from which we want to get parent bom ids
     * @param 	int		$level		Protection against infinite loop
     * @return 	void
     */
    public function getParentBomTreeRecursive(&$TParentBom, $bom_id = 0, $level = 1)
    {
    }
    /**
     *	Return clicable link of object (with eventually picto)
     *
     *	@param      string	    $option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array		$arraydata				Array of data
     *  @return		string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
}
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
     * @var int  Does bomline support multicompany module ? 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     */
    public $ismultientitymanaged = 0;
    /**
     * @var int  Does bomline support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 1;
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
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommanded to name the field fk_...).
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
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'LineID', 'enabled' => 1, 'visible' => -1, 'position' => 1, 'notnull' => 1, 'index' => 1, 'comment' => "Id"), 'fk_bom' => array('type' => 'integer:BillOfMaterials:societe/class/bom.class.php', 'label' => 'BillOfMaterials', 'enabled' => 1, 'visible' => 1, 'position' => 10, 'notnull' => 1, 'index' => 1), 'fk_product' => array('type' => 'integer:Product:product/class/product.class.php', 'label' => 'Product', 'enabled' => 1, 'visible' => 1, 'position' => 20, 'notnull' => 1, 'index' => 1), 'fk_bom_child' => array('type' => 'integer:BOM:bom/class/bom.class.php', 'label' => 'BillOfMaterials', 'enabled' => 1, 'visible' => -1, 'position' => 40, 'notnull' => -1), 'description' => array('type' => 'text', 'label' => 'Description', 'enabled' => 1, 'visible' => -1, 'position' => 60, 'notnull' => -1), 'qty' => array('type' => 'double(24,8)', 'label' => 'Quantity', 'enabled' => 1, 'visible' => 1, 'position' => 100, 'notnull' => 1, 'isameasure' => '1'), 'qty_frozen' => array('type' => 'smallint', 'label' => 'QuantityFrozen', 'enabled' => 1, 'visible' => 1, 'default' => 0, 'position' => 105, 'css' => 'maxwidth50imp', 'help' => 'QuantityConsumedInvariable'), 'disable_stock_change' => array('type' => 'smallint', 'label' => 'DisableStockChange', 'enabled' => 1, 'visible' => 1, 'default' => 0, 'position' => 108, 'css' => 'maxwidth50imp', 'help' => 'DisableStockChangeHelp'), 'efficiency' => array('type' => 'double(24,8)', 'label' => 'ManufacturingEfficiency', 'enabled' => 1, 'visible' => 0, 'default' => 1, 'position' => 110, 'notnull' => 1, 'css' => 'maxwidth50imp', 'help' => 'ValueOfEfficiencyConsumedMeans'), 'fk_unit' => array('type' => 'integer', 'label' => 'Unit', 'enabled' => 1, 'visible' => 1, 'position' => 120, 'notnull' => -1), 'position' => array('type' => 'integer', 'label' => 'Rank', 'enabled' => 1, 'visible' => 0, 'default' => 0, 'position' => 200, 'notnull' => 1), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 1000, 'notnull' => -1), 'fk_default_workstation' => array('type' => 'integer', 'label' => 'DefaultWorkstation', 'enabled' => 1, 'visible' => 1, 'notnull' => 0, 'position' => 1050));
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
     * @var int Id of parent bom
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
     * @var int qty frozen
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
     * @var int position of line
     */
    public $position;
    /**
     * @var string import key
     */
    public $import_key;
    // END MODULEBUILDER PROPERTIES
    /**
     * @var int		Calculated cost for the BOM line
     */
    public $total_cost = 0;
    /**
     * @var int		Line unit cost based on product cost price or pmp
     */
    public $unit_cost = 0;
    /**
     * @var Bom     array of Bom in line
     */
    public $childBom = array();
    /**
     * @var int Service unit
     */
    public $fk_unit;
    /**
     * @var int Service Workstation
     */
    public $fk_default_workstation;
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
     * @return int             Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = \false)
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
     * @param  string      $sortorder    Sort Order
     * @param  string      $sortfield    Sort field
     * @param  int         $limit        limit
     * @param  int         $offset       Offset
     * @param  array       $filter       Filter array. Example array('field'=>'valueforlike', 'customurl'=>...)
     * @param  string      $filtermode   Filter mode (AND or OR)
     * @return array|int                 int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, array $filter = array(), $filtermode = 'AND')
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     * @return int             Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = \false)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user       User that deletes
     * @param bool $notrigger  false=launch triggers after, true=disable triggers
     * @return int             Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
    /**
     *  Return a link to the object card (with optionaly the picto)
     *
     *	@param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option						On what the link point to ('nolink', ...)
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
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
     *  @param	int		$status        Id status
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 			       Label of status
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
     * @return void
     */
    public function initAsSpecimen()
    {
    }
}