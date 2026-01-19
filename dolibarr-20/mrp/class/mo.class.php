<?php

/**
 * Class for Mo
 */
class Mo extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'mo';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'mrp_mo';
    /**
     * @var string String with name of icon for mo. Must be the part after the 'object_' into object_mo.png
     */
    public $picto = 'mrp';
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
    // To produce
    const STATUS_INPROGRESS = 2;
    const STATUS_PRODUCED = 3;
    const STATUS_CANCELED = 9;
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
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'maxwidth200', 'wordbreak', 'tdoverflowmax200'
     *  'help' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -2, 'position' => 1, 'notnull' => 1, 'index' => 1, 'comment' => "Id"), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'position' => 5, 'notnull' => 1, 'default' => '1', 'index' => 1), 'ref' => array('type' => 'varchar(128)', 'label' => 'Ref', 'enabled' => 1, 'visible' => 4, 'position' => 10, 'notnull' => 1, 'default' => '(PROV)', 'index' => 1, 'searchall' => 1, 'comment' => "Reference of object", 'showoncombobox' => 1, 'noteditable' => 1), 'fk_bom' => array('type' => 'integer:Bom:bom/class/bom.class.php:0:(t.status:=:1)', 'filter' => 'active=1', 'label' => 'BOM', 'enabled' => '$conf->bom->enabled', 'visible' => 1, 'position' => 33, 'notnull' => -1, 'index' => 1, 'comment' => "Original BOM", 'css' => 'minwidth100 maxwidth500', 'csslist' => 'tdoverflowmax150', 'picto' => 'bom'), 'mrptype' => array('type' => 'integer', 'label' => 'Type', 'enabled' => 1, 'visible' => 1, 'position' => 34, 'notnull' => 1, 'default' => '0', 'arrayofkeyval' => array(0 => 'Manufacturing', 1 => 'Disassemble'), 'css' => 'minwidth150', 'csslist' => 'minwidth150 center'), 'fk_product' => array('type' => 'integer:Product:product/class/product.class.php:0', 'label' => 'Product', 'enabled' => 'isModEnabled("product")', 'visible' => 1, 'position' => 35, 'notnull' => 1, 'index' => 1, 'comment' => "Product to produce", 'css' => 'maxwidth300', 'csslist' => 'tdoverflowmax100', 'picto' => 'product'), 'qty' => array('type' => 'real', 'label' => 'QtyToProduce', 'enabled' => 1, 'visible' => 1, 'position' => 40, 'notnull' => 1, 'comment' => "Qty to produce", 'css' => 'width75', 'default' => '1', 'isameasure' => 1), 'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'enabled' => 1, 'visible' => 1, 'position' => 42, 'notnull' => -1, 'searchall' => 1, 'showoncombobox' => 2, 'css' => 'maxwidth300', 'csslist' => 'tdoverflowmax200', 'alwayseditable' => 1), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php:1', 'label' => 'ThirdParty', 'picto' => 'company', 'enabled' => 'isModEnabled("societe")', 'visible' => -1, 'position' => 50, 'notnull' => -1, 'index' => 1, 'css' => 'maxwidth400', 'csslist' => 'tdoverflowmax150'), 'fk_project' => array('type' => 'integer:Project:projet/class/project.class.php:1:(fk_statut:=:1)', 'label' => 'Project', 'picto' => 'project', 'enabled' => '$conf->project->enabled', 'visible' => -1, 'position' => 51, 'notnull' => -1, 'index' => 1, 'css' => 'minwidth200 maxwidth400', 'csslist' => 'tdoverflowmax100'), 'fk_warehouse' => array('type' => 'integer:Entrepot:product/stock/class/entrepot.class.php:0', 'label' => 'WarehouseForProduction', 'picto' => 'stock', 'enabled' => 'isModEnabled("stock")', 'visible' => 1, 'position' => 52, 'css' => 'maxwidth400', 'csslist' => 'tdoverflowmax200'), 'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 61, 'notnull' => -1), 'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 62, 'notnull' => -1), 'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -2, 'position' => 500, 'notnull' => 1), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -2, 'position' => 501, 'notnull' => 1), 'date_valid' => array('type' => 'datetime', 'label' => 'DateValidation', 'enabled' => 1, 'visible' => -2, 'position' => 502), 'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -2, 'position' => 510, 'notnull' => 1, 'foreignkey' => 'user.rowid', 'csslist' => 'tdoverflowmax100'), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'position' => 511, 'notnull' => -1, 'csslist' => 'tdoverflowmax100'), 'date_start_planned' => array('type' => 'datetime', 'label' => 'DateStartPlannedMo', 'enabled' => 1, 'visible' => 1, 'position' => 55, 'notnull' => -1, 'index' => 1, 'help' => 'KeepEmptyForAsap', 'alwayseditable' => 1, 'csslist' => 'nowraponall'), 'date_end_planned' => array('type' => 'datetime', 'label' => 'DateEndPlannedMo', 'enabled' => 1, 'visible' => 1, 'position' => 56, 'notnull' => -1, 'index' => 1, 'alwayseditable' => 1, 'csslist' => 'nowraponall'), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 1000, 'notnull' => -1), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 1010), 'status' => array('type' => 'integer', 'label' => 'Status', 'enabled' => 1, 'visible' => 2, 'position' => 1000, 'default' => '0', 'notnull' => 1, 'index' => 1, 'arrayofkeyval' => array('0' => 'Draft', '1' => 'Validated', '2' => 'InProgress', '3' => 'StatusMOProduced', '9' => 'Canceled')), 'fk_parent_line' => array('type' => 'integer:MoLine:mrp/class/mo.class.php', 'label' => 'ParentMo', 'enabled' => 1, 'visible' => 0, 'position' => 1020, 'default' => '0', 'notnull' => 0, 'index' => 1, 'showoncombobox' => 0));
    public $rowid;
    public $entity;
    public $ref;
    /**
     * @var int mrptype
     */
    public $mrptype;
    public $label;
    /**
     * @var float Quantity
     */
    public $qty;
    public $fk_warehouse;
    public $fk_soc;
    public $socid;
    /**
     * @var string public note
     */
    public $note_public;
    /**
     * @var string private note
     */
    public $note_private;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    /**
     * @var integer|string date_validation
     */
    public $date_valid;
    public $fk_user_creat;
    public $fk_user_modif;
    public $import_key;
    public $status;
    /**
     * @var int ID of product
     */
    public $fk_product;
    /**
     * @var Product product object
     */
    public $product;
    /**
     * @var integer|string date_start_planned
     */
    public $date_start_planned;
    /**
     * @var integer|string date_end_planned
     */
    public $date_end_planned;
    /**
     * @var int ID bom
     */
    public $fk_bom;
    /**
     * @var Bom bom
     */
    public $bom;
    /**
     * @var int ID project
     */
    public $fk_project;
    /**
     * @var double	New quantity. When we update the quantity to produce, we set this to save old value before calling the ->update that call the updateProduction that need this
     * 				to recalculate all the quantities in lines to consume and produce.
     */
    public $oldQty;
    // If this object has a subtable with lines
    /**
     * @var string    Name of subtable line
     */
    public $table_element_line = 'mrp_production';
    /**
     * @var string    Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_mo';
    /**
     * @var string    Name of subtable class that manage subtable lines
     */
    public $class_element_line = 'MoLine';
    /**
     * @var array<string, array<string>>	List of child tables. To test if we can delete object.
     */
    protected $childtables = array();
    /**
     * @var string[]	List of child tables. To know object to delete on cascade.
     */
    protected $childtablesoncascade = array('mrp_production');
    /**
     * @var MoLine[]     Array of subtable lines
     */
    public $lines = array();
    /**
     * @var MoLine|null     MO line
     */
    public $line = \null;
    /**
     * @var int ID of parent line
     */
    public $fk_parent_line;
    /**
     * @var array<string,int|string> tpl
     */
    public $tpl = array();
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
     * @return int             Return integer <=0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
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
     * Load list of objects in memory from the database.
     *
     * @param  string      		$sortorder    	Sort Order
     * @param  string      		$sortfield    	Sort field
     * @param  int         		$limit        	Limit
     * @param  int         		$offset       	Offset
     * @param  string|array     $filter       	Filter USF.
     * @param  string      		$filtermode   	Filter mode (AND or OR)
     * @return array|int                 		int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = '', $filtermode = 'AND')
    {
    }
    /**
     * Get list of lines linked to current line for a defined role.
     *
     * @param  	string 	$role      	Get lines linked to current line with the selected role ('consumed', 'produced', ...)
     * @param	int		$lineid		Id of production line to filter children
     * @return 	array             	Array of lines
     */
    public function fetchLinesLinked($role, $lineid = 0)
    {
    }
    /**
     * Count number of movement with origin of MO
     *
     * @return 	int			Number of movements
     */
    public function countMovements()
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
     * Erase and update the line to consume and to produce.
     *
     * @param  User $user      User that modifies
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
     * @return int             Return integer <0 if KO, >0 if OK
     */
    public function createProduction(\User $user, $notrigger = 0)
    {
    }
    /**
     * Update quantities in lines to consume and/or lines to produce.
     *
     * @param  User $user      User that modifies
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
     * @return int             Return integer <0 if KO, >0 if OK
     */
    public function updateProduction(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param	User	$user										User that deletes
     * @param	int		$notrigger									0=launch triggers after, 1=disable triggers
     * @param	bool	$also_cancel_consumed_and_produced_lines  	true if the consumed and produced lines will be deleted (and stocks incremented/decremented back) (false by default)
     * @return	int													Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0, $also_cancel_consumed_and_produced_lines = \false)
    {
    }
    /**
     *  Delete a line of object in database
     *
     *	@param  User	$user       	User that delete
     *  @param	int		$idline			Id of line to delete
     *  @param 	int 	$notrigger  	0=launch triggers after, 1=disable triggers
     *  @param	int		$fk_movement	Movement
     *  @return int         			Return >0 if OK, <0 if KO
     */
    public function deleteLine(\User $user, $idline, $notrigger = 0, $fk_movement = 0)
    {
    }
    /**
     *  Returns the reference to the following non used MO depending on the active numbering module
     *  defined into MRP_MO_ADDON
     *
     *  @param	Product		$prod 	Object product
     *  @return string      		MO free reference
     */
    public function getNextNumRef($prod)
    {
    }
    /**
     *	Validate Mo
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
     *	@param	User	$user										Object user that modify
     *  @param	int		$notrigger									1=Does not execute triggers, 0=Execute triggers
     *  @param	bool	$also_cancel_consumed_and_produced_lines  	true if the consumed and produced lines will be deleted (and stocks incremented/decremented back) (false by default)
     *	@return	int													Return integer <0 if KO, 0=Nothing done, >0 if OK
     */
    public function cancel($user, $notrigger = 0, $also_cancel_consumed_and_produced_lines = \false)
    {
    }
    /**
     *	Set back to validated status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int						Return integer <0 if KO, 0=Nothing done, >0 if OK
     */
    public function reopen($user, $notrigger = 0)
    {
    }
    /**
     *	Cancel consumed and produced lines (movement stocks)
     *
     *	@param	User	$user					Object user that modify
     *  @param  int 	$mode  					Type line supported (0 by default) (0: consumed and produced lines; 1: consumed lines; 2: produced lines)
     *  @param  bool	$also_delete_lines  	true if the consumed/produced lines is deleted (false by default)
     *  @param	int		$notrigger				1=Does not execute triggers, 0=Execute triggers
     *	@return	int								Return integer <0 if KO, 0=Nothing done, >0 if OK
     */
    public function cancelConsumedAndProducedLines($user, $mode = 0, $also_delete_lines = \false, $notrigger = 0)
    {
    }
    /**
     * getTooltipContentArray
     *
     * @param array $params ex option, infologin
     * @since v18
     * @return array
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *  Return a link to the object card (with optionally the picto)
     *
     *  @param  int     $withpicto                  Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *  @param  string  $option                     On what the link point to ('nolink', '', 'production', ...)
     *  @param  int     $notooltip                  1=Disable tooltip
     *  @param  string  $morecss                    Add more css on link
     *  @param  int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @return	string                              String with URL
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
     * @return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     * 	Create an array of lines
     *
     * 	@param string 		$rolefilter 	string lines role filter
     * 	@return array|int					array of lines if OK, <0 if KO
     */
    public function getLinesArray($rolefilter = '')
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *  @param	    string		$modele			Force template to use ('' to not force)
     *  @param		Translate	$outputlangs	object lang a utiliser pour traduction
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
     * 	Return HTML table table of source object lines
     *  TODO Move this and previous function into output html class file (htmlline.class.php).
     *  If lines are into a template, title must also be into a template
     *  But for the moment we don't know if it's possible, so we keep the method available on overloaded objects.
     *
     *	@param	string		$restrictlist		''=All lines, 'services'=Restrict to services only
     *  @param  array       $selectedLines      Array of lines id for selected lines
     *  @return	void
     */
    public function printOriginLinesList($restrictlist = '', $selectedLines = array())
    {
    }
    /**
     * 	Return HTML with a line of table array of source object lines
     *  TODO Move this and previous function into output html class file (htmlline.class.php).
     *  If lines are into a template, title must also be into a template
     *  But for the moment we don't know if it's possible as we keep a method available on overloaded objects.
     *
     * 	@param	MoLine	$line				Line
     * 	@param	string				$var				Var
     *	@param	string				$restrictlist		''=All lines, 'services'=Restrict to services only (strike line if not)
     *  @param	string				$defaulttpldir		Directory where to find the template
     *  @param  array       		$selectedLines      Array of lines id for selected lines
     * 	@return	void
     */
    public function printOriginLine($line, $var, $restrictlist = '', $defaulttpldir = '/core/tpl', $selectedLines = array())
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param DoliDB 	$db 			Database handler
     * @param int 		$origin_id 		Old thirdparty id
     * @param int 		$dest_id 		New thirdparty id
     * @return bool
     */
    public static function replaceThirdparty($db, $origin_id, $dest_id)
    {
    }
    /**
     * Function used to return children of Mo
     *
     * @return Mo[]|int 			array if OK, -1 if KO
     */
    public function getMoChilds()
    {
    }
    /**
     * Function used to return all child MOs recursively
     *
     * @param int $depth   Depth for recursing loop count
     * @return Mo[]|int[]|int  array of MOs if OK, -1 if KO
     */
    public function getAllMoChilds($depth = 0)
    {
    }
    /**
     * Function used to return children of Mo
     *
     * @return Mo|int			MO object if OK, -1 if KO, 0 if not exist
     */
    public function getMoParent()
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
 * Class MoLine. You can also remove this and generate a CRUD class for lines objects.
 */
class MoLine extends \CommonObjectLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'mrp_production';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'mrp_production';
    /**
     * @see CommonObjectLine
     */
    public $parent_element = 'mo';
    /**
     * @see CommonObjectLine
     */
    public $fk_parent_attribute = 'fk_mo';
    /**
     *  'type' field format:
     *  	'integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]',
     *  	'select' (list of values are in 'options'. for integer list of values are in 'arrayofkeyval'),
     *  	'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter[:CategoryIdType[:CategoryIdList[:SortField]]]]]]',
     *  	'chkbxlst:...',
     *  	'varchar(x)',
     *  	'text', 'text:none', 'html',
     *   	'double(24,8)', 'real', 'price', 'stock',
     *  	'date', 'datetime', 'timestamp', 'duration',
     *  	'boolean', 'checkbox', 'radio', 'array',
     *  	'mail', 'phone', 'url', 'password', 'ip'
     *		Note: Filter must be a Dolibarr Universal Filter syntax string. Example: "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.status:!=:0) or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'alias' the alias used into some old hard coded SQL requests
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalInt("MY_SETUP_PARAM")' or 'isModEnabled("multicurrency")' ...)
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'alwayseditable' says if field can be modified also when status is not draft ('1' or '0')
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 or 2 if field can be used for measure. Field type must be summable like integer or double(24,8). Use 1 in most cases, or 2 if you don't want to see the column total into list (for example for percentage)
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'css'=>'minwidth300 maxwidth500 widthcentpercentminusx', 'cssview'=>'wordbreak', 'csslist'=>'tdoverflowmax200'
     *  'help' and 'helplist' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set a list of values if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel"). Note that type can be 'integer' or 'varchar'
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *	'validate' is 1 if you need to validate the field with $this->validateField(). Need MAIN_ACTIVATE_VALIDATION_RESULT.
     *  'copytoclipboard' is 1 or 2 to allow to add a picto to copy value into clipboard (1=picto after label, 2=picto after value)
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'ID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10), 'fk_mo' => array('type' => 'integer', 'label' => 'Mo', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 15), 'origin_id' => array('type' => 'integer', 'label' => 'Origin', 'enabled' => 1, 'visible' => -1, 'notnull' => 0, 'position' => 17), 'origin_type' => array('type' => 'varchar(10)', 'label' => 'Origin type', 'enabled' => 1, 'visible' => -1, 'notnull' => 0, 'position' => 18), 'position' => array('type' => 'integer', 'label' => 'Position', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 20), 'fk_product' => array('type' => 'integer', 'label' => 'Product', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 25), 'fk_warehouse' => array('type' => 'integer', 'label' => 'Warehouse', 'enabled' => 1, 'visible' => -1, 'position' => 30), 'qty' => array('type' => 'real', 'label' => 'Qty', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 35), 'qty_frozen' => array('type' => 'smallint', 'label' => 'QuantityFrozen', 'enabled' => 1, 'visible' => 1, 'default' => '0', 'notnull' => 1, 'position' => 105, 'css' => 'maxwidth50imp', 'help' => 'QuantityConsumedInvariable'), 'disable_stock_change' => array('type' => 'smallint', 'label' => 'DisableStockChange', 'enabled' => 1, 'visible' => 1, 'default' => '0', 'notnull' => 1, 'position' => 108, 'css' => 'maxwidth50imp', 'help' => 'DisableStockChangeHelp'), 'batch' => array('type' => 'varchar(30)', 'label' => 'Batch', 'enabled' => 1, 'visible' => -1, 'position' => 140), 'role' => array('type' => 'varchar(10)', 'label' => 'Role', 'enabled' => 1, 'visible' => -1, 'position' => 145), 'fk_mrp_production' => array('type' => 'integer', 'label' => 'Fk mrp production', 'enabled' => 1, 'visible' => -1, 'position' => 150), 'fk_stock_movement' => array('type' => 'integer', 'label' => 'StockMovement', 'enabled' => 1, 'visible' => -1, 'position' => 155), 'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 160), 'tms' => array('type' => 'timestamp', 'label' => 'Tms', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 165), 'fk_user_creat' => array('type' => 'integer', 'label' => 'UserCreation', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 170), 'fk_user_modif' => array('type' => 'integer', 'label' => 'UserModification', 'enabled' => 1, 'visible' => -1, 'position' => 175), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -1, 'position' => 180), 'fk_default_workstation' => array('type' => 'integer', 'label' => 'DefaultWorkstation', 'enabled' => 1, 'visible' => 1, 'notnull' => 0, 'position' => 185), 'fk_unit' => array('type' => 'int', 'label' => 'Unit', 'enabled' => 1, 'visible' => 1, 'notnull' => 0, 'position' => 186));
    public $rowid;
    public $fk_mo;
    public $origin_id;
    public $origin_type;
    public $position;
    public $fk_product;
    public $fk_warehouse;
    /**
     * @var float Quantity
     */
    public $qty;
    /**
     * @var float Quantity frozen
     */
    public $qty_frozen;
    public $disable_stock_change;
    public $efficiency;
    public $batch;
    public $role;
    public $fk_mrp_production;
    public $fk_stock_movement;
    public $date_creation;
    public $fk_user_creat;
    public $fk_user_modif;
    public $import_key;
    public $fk_parent_line;
    public $fk_unit;
    /**
     * @var int Service Workstation
     */
    public $fk_default_workstation;
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
     * @param  string|array $filter       	Filter array. Example array('field'=>'valueforlike', 'customurl'=>...)
     * @param  string      	$filtermode   	Filter mode (AND or OR)
     * @return array|int                 	int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = '', $filtermode = 'AND')
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