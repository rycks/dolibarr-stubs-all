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
     * @var int ID of project
     */
    public $fk_project;
    /**
     * @var	int	Warehouse usage ID
     */
    public $warehouse_usage;
    /**
     *  'type' field format:
     *  	'integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]',
     *  	'select' (list of values are in 'options'),
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
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'ID', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'position' => 10),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'default' => '1', 'notnull' => 1, 'index' => 1, 'position' => 15),
        'ref' => array('type' => 'varchar(255)', 'label' => 'Ref', 'enabled' => 1, 'visible' => 1, 'showoncombobox' => 1, 'position' => 25, 'searchall' => 1),
        'description' => array('type' => 'text', 'label' => 'Description', 'enabled' => 1, 'visible' => -2, 'position' => 35, 'searchall' => 1),
        'lieu' => array('type' => 'varchar(64)', 'label' => 'LocationSummary', 'enabled' => 1, 'visible' => 1, 'position' => 40, 'showoncombobox' => 2, 'searchall' => 1),
        'fk_parent' => array('type' => 'integer:Entrepot:product/stock/class/entrepot.class.php:1:((statut:=:1) AND (entity:IN:__SHARED_ENTITIES__))', 'label' => 'ParentWarehouse', 'enabled' => 1, 'visible' => -2, 'position' => 41),
        'fk_project' => array('type' => 'integer:Project:projet/class/project.class.php:1:(fk_statut:=:1)', 'label' => 'Project', 'enabled' => '$conf->project->enabled', 'visible' => -1, 'position' => 42),
        'address' => array('type' => 'varchar(255)', 'label' => 'Address', 'enabled' => 1, 'visible' => -2, 'position' => 45, 'searchall' => 1),
        'zip' => array('type' => 'varchar(10)', 'label' => 'Zip', 'enabled' => 1, 'visible' => -2, 'position' => 50, 'searchall' => 1),
        'town' => array('type' => 'varchar(50)', 'label' => 'Town', 'enabled' => 1, 'visible' => -2, 'position' => 55, 'searchall' => 1),
        'fk_departement' => array('type' => 'integer', 'label' => 'State', 'enabled' => 1, 'visible' => 0, 'position' => 60),
        'fk_pays' => array('type' => 'integer:Ccountry:core/class/ccountry.class.php', 'label' => 'Country', 'enabled' => 1, 'visible' => -1, 'position' => 65),
        'phone' => array('type' => 'varchar(20)', 'label' => 'Phone', 'enabled' => 1, 'visible' => -2, 'position' => 70, 'searchall' => 1),
        'fax' => array('type' => 'varchar(20)', 'label' => 'Fax', 'enabled' => 1, 'visible' => -2, 'position' => 75, 'searchall' => 1),
        //'fk_user_author' =>array('type'=>'integer', 'label'=>'Fk user author', 'enabled'=>1, 'visible'=>-2, 'position'=>82),
        'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -2, 'position' => 300),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 301),
        'warehouse_usage' => array('type' => 'integer', 'label' => 'WarehouseUsage', 'enabled' => 'getDolGlobalInt("MAIN_FEATURES_LEVEL")', 'visible' => 1, 'position' => 400, 'default' => 1, 'arrayofkeyval' => array(1 => 'InternalWarehouse', 2 => 'ExternalWarehouse')),
        //'import_key' =>array('type'=>'varchar(14)', 'label'=>'ImportId', 'enabled'=>1, 'visible'=>-2, 'position'=>1000),
        //'model_pdf' =>array('type'=>'varchar(255)', 'label'=>'ModelPDF', 'enabled'=>1, 'visible'=>0, 'position'=>1010),
        'statut' => array('type' => 'tinyint(4)', 'label' => 'Status', 'enabled' => 1, 'visible' => 1, 'position' => 500, 'css' => 'minwidth50'),
    );
    // END MODULEBUILDER PROPERTIES
    /**
     * Warehouse closed, inactive
     */
    const STATUS_CLOSED = 0;
    /**
     * Warehouse open and any operations are allowed (customer shipping, supplier dispatch, internal stock transfers/corrections).
     */
    const STATUS_OPEN_ALL = 1;
    /**
     * Warehouse open and only operations for stock transfers/corrections allowed (not for customer shipping and supplier dispatch).
     */
    const STATUS_OPEN_INTERNAL = 2;
    /**
     * Warehouse open and any operations are allowed, but warehouse is not included into calculation of stock.
     */
    const STATUS_OPENEXT_ALL = 3;
    // TODO Implement this
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
     *	@param		User	$user		Object user that create the warehouse
     *	@param		int		$notrigger	0=launch triggers after, 1=disable triggers
     *	@return		int					Return >0 if OK, =<0 if KO
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *	Update properties of a warehouse
     *
     *	@param		int		$id			id of warehouse to modify
     *	@param		User	$user		User object
     *	@param		int 	$notrigger	0=launch triggers after, 1=disable trigge
     *	@return		int					Return >0 if OK, <0 if KO
     */
    public function update($id, $user, $notrigger = 0)
    {
    }
    /**
     *	Delete a warehouse
     *
     *	@param		User	$user		   Object user that made deletion
     *  @param      int     $notrigger     1=No trigger
     *	@return		int					   Return integer <0 if KO, >0 if OK
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
     * 	@return		array|int		Array('nb'=>Nb, 'value'=>Value)
     */
    public function nb_different_products()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return stock and value of warehosue
     *
     * 	@return		array|int		Array('nb'=>Nb, 'value'=>Value)
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
     * getTooltipContentArray
     *
     * @param 	array 	$params 	Params to construct tooltip data
     * @since 	v18
     * @return 	array
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *	Return clickable name (possibility with the pictogram)
     *
     *	@param		int		$withpicto				with pictogram
     *	@param		string	$option					Where the link point to
     *  @param      int     $showfullpath   		0=Show ref only. 1=Show full path instead of Ref (this->fk_parent must be defined)
     *  @param	    int   	$notooltip				1=Disable tooltip
     *  @param  	string  $morecss            	Add more css on link
     *  @param  	int     $save_lastsearch_value  -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return		string							String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $showfullpath = 0, $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return int
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
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    /**
     * Sets object to supplied categories.
     *
     * Deletes object from existing categories not supplied.
     * Adds it to non existing supplied categories.
     * Existing categories are left untouch.
     *
     * @param 	int[]|int 	$categories 	Category or categories IDs
     * @return 	int							Return integer <0 if KO, >0 if OK
     */
    public function setCategories($categories)
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