<?php

//require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class for AssetModel
 */
class AssetModel extends \CommonObject
{
    /**
     * @var string ID of module.
     */
    public $module = 'asset';
    /**
     * @var string ID to identify managed object.
     */
    public $element = 'assetmodel';
    /**
     * @var string Name of table without prefix where object is stored. This is also the key used for extrafields management.
     */
    public $table_element = 'asset_model';
    /**
     * @var string String with name of icon for assetmodel. Must be the part after the 'object_' into object_assetmodel.png
     */
    public $picto = 'asset';
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
    const STATUS_CANCELED = 9;
    /**
     *  'type' field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]', 'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter[:Sortfield]]]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'text:none', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
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
     *  'isameasure' must be set to 1 or 2 if field can be used for measure. Field type must be summable like integer or double(24,8). Use 1 in most cases, or 2 if you don't want to see the column total into list (for example for percentage)
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'css'=>'minwidth300 maxwidth500 widthcentpercentminusx', 'cssview'=>'wordbreak', 'csslist'=>'tdoverflowmax200'
     *  'help' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set a list of values if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel"). Note that type can be 'integer' or 'varchar'
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *	'validate' is 1 if need to validate with $this->validateField()
     *  'copytoclipboard' is 1 or 2 to allow to add a picto to copy value into clipboard (1=picto after label, 2=picto after value)
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-6,6>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'visible' => 0, 'noteditable' => 1, 'index' => 1, 'css' => 'left', 'comment' => "Id"), 'ref' => array('type' => 'varchar(128)', 'label' => 'Ref', 'enabled' => 1, 'position' => 20, 'notnull' => 1, 'visible' => 1, 'index' => 1, 'searchall' => 1, 'showoncombobox' => 1, 'validate' => 1), 'ref_ext' => array('type' => 'varchar(255)', 'label' => 'RefExt', 'enabled' => 1, 'position' => 25, 'notnull' => 0, 'visible' => 0), 'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'enabled' => 1, 'position' => 30, 'notnull' => 1, 'visible' => 1, 'searchall' => 1, 'css' => 'minwidth300', 'cssview' => 'wordbreak', 'showoncombobox' => 2, 'validate' => 1), 'asset_type' => array('type' => 'smallint', 'label' => 'AssetType', 'enabled' => 1, 'position' => 40, 'notnull' => 1, 'visible' => 1, 'arrayofkeyval' => array(0 => 'AssetTypeIntangible', 1 => 'AssetTypeTangible', 2 => 'AssetTypeInProgress', 3 => 'AssetTypeFinancial'), 'validate' => 1), 'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'position' => 300, 'notnull' => 0, 'visible' => 0, 'validate' => 1), 'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'position' => 301, 'notnull' => 0, 'visible' => 0, 'validate' => 1), 'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'position' => 500, 'notnull' => 1, 'visible' => -2), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'position' => 501, 'notnull' => 0, 'visible' => -2), 'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'position' => 510, 'notnull' => 1, 'visible' => -2, 'foreignkey' => 'user.rowid'), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'position' => 511, 'notnull' => -1, 'visible' => -2), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'position' => 1000, 'notnull' => -1, 'visible' => -2), 'status' => array('type' => 'smallint', 'label' => 'Status', 'enabled' => 1, 'position' => 1000, 'notnull' => 1, 'default' => '1', 'visible' => 1, 'index' => 1, 'arrayofkeyval' => array(0 => 'Draft', 1 => 'Enabled', 9 => 'Disabled'), 'validate' => 1));
    /**
     * @var int
     */
    public $rowid;
    /**
     * @var string
     */
    public $ref;
    /**
     * @var string
     */
    public $label;
    /**
     * @var string
     */
    public $asset_type;
    /**
     * @var string
     */
    public $note_public;
    /**
     * @var string
     */
    public $note_private;
    /**
     * @var int
     */
    public $fk_user_creat;
    /**
     * @var int
     */
    public $fk_user_modif;
    /**
     * @var string
     */
    public $last_main_doc;
    /**
     * @var string
     */
    public $import_key;
    /**
     * @var string
     */
    public $model_pdf;
    /**
     * @var int
     */
    public $status;
    /**
     * @var AssetDepreciationOptions
     */
    public $asset_depreciation_options;
    /**
     * @var AssetAccountancyCodes
     */
    public $asset_accountancy_codes;
    // /**
    //  * @var string    Field with ID of parent key if this object has a parent
    //  */
    // public $fk_element = 'fk_assetmodel';
    // /**
    //  * @var array	List of child tables. To test if we can delete object.
    //  */
    // protected $childtables = array();
    // /**
    //  * @var array    List of child tables. To know object to delete on cascade.
    //  *               If name matches '@ClassNAme:FilePathClass;ParentFkFieldName' it will
    //  *               call method deleteByParentField(parentId, ParentFkFieldName) to fetch and delete child object
    //  */
    // protected $childtablesoncascade = array('asset_assetmodeldet');
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
     * @param  int 	$notrigger false=launch triggers after, true=disable triggers
     * @return int             Return integer <0 if KO, Id of created object if OK
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
     * Load list of objects in memory from the database.
     *
     * @param  string      	$sortorder    	Sort Order
     * @param  string      	$sortfield   	 Sort field
     * @param  int         	$limit        	limit
     * @param  int         	$offset       	Offset
     * @param  string		$filter       	Filter as an Universal Search string.
     * 										Example: '((client:=:1) OR ((client:>=:2) AND (client:<=:3))) AND (client:!=:8) AND (nom:like:'a%')'
     * @param  string      	$filtermode   	No more used
     * @return AssetModel[]|int                 	int <0 if KO, array of pages if OK
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
     * @param User 	$user      	User that deletes
     * @param int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return int             	Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Validate object
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
     *  Return a link to the object card (with optionally the picto)
     *
     *  @param  int     $withpicto                  Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *  @param  string  $option                     On what the link point to ('nolink', ...)
     *  @param  int     $notooltip                  1=Disable tooltip
     *  @param  string  $morecss                    Add more css on link
     *  @param  int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @return	string                              String with URL
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
    public function getLabelStatus($mode = 0)
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
}