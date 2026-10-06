<?php

//require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class for Memo
 */
class Memo extends \CommonObject
{
    /**
     * @var string 		ID of module.
     */
    public $module = 'quickmemo';
    /**
     * @var string 		ID to identify managed object.
     */
    public $element = 'memo';
    /**
     * @var string		Prefix to check for any trigger code of any business class to prevent bad value for trigger code.
     * @see CommonTrigger::call_trigger()
     */
    public $TRIGGER_PREFIX = 'QUICKMEMO_MEMO';
    // Will be used to build trgiger keys 'QUICKMEMO_MEMO_MODIFY', ...
    /**
     * @var string 		Name of table without prefix where object is stored. This is also the key used for extrafields management (so extrafields know the link to the parent table).
     */
    public $table_element = 'quickmemo_memo';
    /**
     * @var string 		If permission must be checked with hasRight('quickmemo', 'read') and not hasright('quickmemo', 'memo', 'read'), you can uncomment this line
     */
    //public $element_for_permission = 'quickmemo';
    /**
     * @var string 		String with name of icon for memo. Must be a 'fa-xxx' fontawesome code (or 'fa-xxx_fa_color_size') or 'memo@quickmemo' if picto is file 'img/object_memo.png'.
     */
    public $picto = 'fa-file';
    /**
     * @var int<0,1>	Does object support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 0;
    /**
     * @var int<0,1>|string		Does this object support multicompany module ?
     * 							0=No test on entity, 1=Test with field entity in local table, 'field@table'=Test entity into the field@table (example 'fk_soc@societe')
     */
    public $ismultientitymanaged = 0;
    const STATUS_TPL = 2;
    const STATUS_VALIDATED = 1;
    const STATUS_CANCELED = 9;
    // fall back in case of
    const STATUS_ARCHIVED = 9;
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
     *  	'email', 'phone', 'url', 'password', 'ip'
     *		Note: Filter must be a Dolibarr Universal Filter syntax string. Example: "(t.ref:like:'SO-%') or (t.date_creation:>:'20160101') or (t.status:!=:0) or (t.nature:is:NULL)"
     *  'length' the length of field. Example: 255, '24,8'
     *  'label' the translation key.
     *  'langfile' the key of the language file for translation.
     *  'alias' the alias used into some old hard coded SQL requests
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalInt("MY_SETUP_PARAM")' or 'isModEnabled("multicurrency")' ...)
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form (not create). 5=Visible on list and view form (not create/not update). 6=visible on list and update/view form (not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'alwayseditable' says if field can be modified also when status is not draft ('1' or '0')
     *  'default' is a default value for creation (can still be overwritten by the Setup of Default Values if the field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 or 2 if field can be used for measure. Field type must be summable like integer or double(24,8). Use 1 in most cases, or 2 if you don't want to see the column total into list (for example for percentage)
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'css'=>'minwidth300 maxwidth500 widthcentpercentminusx', 'cssview'=>'wordbreak', 'csslist'=>'tdoverflowmax200'
     *  'placeholder' to set the placeholder of a varchar field.
     *  'help' and 'helplist' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code like the constructor of the class.
     *  'arrayofkeyval' to set a list of values if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel"). Note that type can be 'integer' or 'varchar'
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *	'validate' is 1 if you need to validate the field with $this->validateField(). Need MAIN_ACTIVATE_VALIDATION_RESULT.
     *  'copytoclipboard' is 1 or 2 to allow to add a picto to copy value into clipboard (1=picto after label, 2=picto after value)
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    /**
     * @inheritdoc
     * Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array("rowid" => array("type" => "integer", "label" => "TechnicalID", 'enabled' => 1, 'position' => 1, 'notnull' => 1, "visible" => 0, 'noteditable' => 1, 'index' => 1, "css" => "left", "comment" => "Id"), "quick_note" => array("type" => "text", "label" => "Note", 'enabled' => 1, 'position' => 61, 'notnull' => 0, "visible" => -1, "cssview" => "wordbreak", "validate" => 1), "date_creation" => array("type" => "datetime", "label" => "DateCreation", 'enabled' => 1, 'position' => 500, 'notnull' => 1, "visible" => -2), "tms" => array("type" => "timestamp", "label" => "DateModification", 'enabled' => 1, 'position' => 501, 'notnull' => 0, "visible" => -2), "date_archived" => array("type" => "timestamp", "label" => "DateArchived", 'enabled' => 1, 'position' => 502, 'notnull' => 0, "visible" => -2), "fk_user_creat" => array("type" => "integer:User:user/class/user.class.php", "label" => "UserAuthor", "picto" => "user", 'enabled' => 1, 'position' => 510, 'notnull' => 1, "visible" => -2, "csslist" => "tdoverflowmax150"), "fk_user_modif" => array("type" => "integer:User:user/class/user.class.php", "label" => "UserModif", "picto" => "user", 'enabled' => 1, 'position' => 511, 'notnull' => -1, "visible" => -2, "csslist" => "tdoverflowmax150"), "fk_user_archived" => array("type" => "integer:User:user/class/user.class.php", "label" => "ArchivedBy", "picto" => "user", 'enabled' => 1, 'position' => 511, 'notnull' => -1, "visible" => -2, "csslist" => "tdoverflowmax150"), "fk_element" => array('type' => 'integer', 'label' => 'MemoLinkedTo', 'help' => 'MemoLinkedToHelp', 'enabled' => 1, 'visible' => 5, 'notnull' => 0, 'default' => 0, 'index' => 1, 'position' => 0), "element_type" => array('type' => 'varchar(64)', 'label' => 'QuickMemoElementType', 'enabled' => 1, 'visible' => 5, 'position' => 10, 'required' => 0), "pos_z" => array("type" => "integer", "label" => "PosZ", 'enabled' => 1, 'position' => 1000, 'notnull' => 1, "visible" => 0, "default" => 0, "validate" => 1), "pos_y" => array("type" => "integer", "label" => "PosY", 'enabled' => 1, 'position' => 1000, 'notnull' => 1, "visible" => 0, "default" => 0, "validate" => 1), "pos_x" => array("type" => "integer", "label" => "PosX", 'enabled' => 1, 'position' => 1000, 'notnull' => 1, "visible" => 0, "default" => 0, "validate" => 1), "pos_w" => array("type" => "integer", "label" => "PosW", 'enabled' => 1, 'position' => 1000, 'notnull' => 1, "visible" => 0, "default" => 0, "validate" => 1), "pos_h" => array("type" => "integer", "label" => "PosH", 'enabled' => 1, 'position' => 1000, 'notnull' => 1, "visible" => 0, "default" => 0, "validate" => 1), "color" => array('type' => 'varchar(10)', 'label' => 'Color', 'enabled' => 1, 'visible' => 1, 'position' => 10, 'required' => 0), "context_tab" => array('type' => 'varchar(64)', 'label' => 'ContextTab', 'enabled' => 1, 'visible' => 1, 'position' => 10, 'required' => 0), "private" => array("type" => "integer", "label" => "Private", 'enabled' => 1, 'position' => 1990, 'notnull' => 1, "visible" => 1, 'index' => 1, "arrayofkeyval" => array(0 => "No", 1 => "Yes"), 'default' => 1, "validate" => 1), "private_tpl" => array("type" => "integer", "label" => "PrivateTemplate", 'enabled' => 1, 'position' => 1990, 'notnull' => 0, "visible" => 1, 'index' => 1, "arrayofkeyval" => array(0 => "No", 1 => "Yes"), 'default' => 0, "validate" => 1), "rank_tpl" => array("type" => "integer", "label" => "TemplateRank", 'enabled' => 1, 'position' => 1990, 'notnull' => 0, "visible" => 0, 'index' => 1, 'default' => 0, "validate" => 1), "name_tpl" => array('type' => 'varchar(256)', 'label' => 'QuickMemoTemplateName', 'enabled' => 1, 'visible' => -1, 'position' => 1, 'required' => 0), "shared_on_element" => array("type" => "integer", "label" => "SharedBetweenElement", 'enabled' => 1, 'position' => 1991, 'notnull' => 1, "visible" => 1, 'index' => 1, "arrayofkeyval" => array(0 => "No", 1 => "Yes"), "validate" => 1), "import_key" => array("type" => "varchar(14)", "label" => "ImportId", 'enabled' => 1, 'position' => 1000, 'notnull' => -1, "visible" => -2), "status" => array("type" => "integer", "label" => "Status", 'enabled' => 1, 'position' => 2000, 'notnull' => 1, "visible" => 1, 'index' => 1, "arrayofkeyval" => array(1 => "Active", 2 => "Template", 9 => "Archived"), "validate" => 1));
    /** @var int|null */
    public $rowid;
    /** @var int|null */
    public $date_archived;
    /** @var int|null */
    public $fk_user_archived;
    /** @var string|null */
    public $quick_note;
    /** @var int|string|null */
    public $date_creat;
    /**
     * @var string|int	Field with ID of parent key if this field has a parent (a string). For example 'fk_product'.
     *					ID of parent key itself (an int). For example in few classes like 'Comment', 'ActionComm' or 'AdvanceTargetingMailing'.
     */
    public $fk_element;
    /** @var string|null */
    public $element_type;
    /** @var int|string|null */
    public $pos_z;
    /** @var int|string|null */
    public $pos_y;
    /** @var int|string|null */
    public $pos_x;
    /** @var int|string|null */
    public $pos_w;
    /** @var int|string|null */
    public $pos_h;
    /** @var int|string|null */
    public $color;
    /** @var string|null */
    public $context_tab;
    /** @var string|null */
    public $import_key;
    /**
     * @var null|int|array<int, string>   The object's status (an int).
     *                 						Or an array listing all the potential status of the object:
     *                                    	array: int of the status => translated label of the status
     *                                    	In some classes status must be able to be null.
     *                                    	See for example the Account class.
     * @see setStatut()
     */
    public $status;
    /** @var int|string|null */
    public $private;
    /** @var int|string|null */
    public $private_tpl;
    /** @var string|null */
    public $name_tpl;
    /** @var int|string|null */
    public $shared_on_element;
    /**
     * Constructor
     *
     * @param	DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param	User		$user		User that creates
     * @param	int<0,1> 	$notrigger	0=launch triggers after, 1=disable triggers
     * @return	int<-1,max>				Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Clone an object into another one
     *
     * @param	User 	$user		User that creates
     * @param	int 	$fromid		Id of object to clone
     * @return	self|int<-1,-1>		New object created, <0 if KO
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param	int    		$id   			Id object
     * @param	string 		$ref  			Ref
     * @param	int<0,1>	$noextrafields	0=Default to load extrafields, 1=No extrafields
     * @param	int<0,1>	$nolines		0=Default to load lines, 1=No lines
     * @return	int<-1,1>					Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null, $noextrafields = 0, $nolines = 0)
    {
    }
    /**
     * Load object lines in memory from the database
     *
     * @param	int<0,1>	$noextrafields	0=Default to load extrafields, 1=No extrafields
     * @return 	int<-1,1>					Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetchLines($noextrafields = 0)
    {
    }
    /**
     * Load list of objects in memory from the database.
     * Using a fetchAll() with limit = 0 is a very bad practice. Instead try to forge yourself an optimized SQL request with
     * your own loop with start and stop pagination.
     *
     * @param	string		$sortorder	Sort Order
     * @param	string		$sortfield	Sort field
     * @param	int<0,max>	$limit		Limit the number of lines returned
     * @param	int<0,max>	$offset		Offset
     * @param	string		$filter		Filter as an Universal Search string.
     *                                  Example: '((client:=:1) OR ((client:>=:2) AND (client:<=:3))) AND (client:!=:8) AND (nom:like:'a%')'
     * @param	string		$filtermode	No longer used
     * @return	array<int,self>|int<-1,-1>	 <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 1000, $offset = 0, string $filter = '', $filtermode = 'AND')
    {
    }
    /**
     * Update object into database
     *
     * @param	User		$user		User that modifies
     * @param	int<0,1>	$notrigger	0=launch triggers after, 1=disable triggers
     * @return	int<-1,1>				Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Update position of a memo for a specific user
     *
     * @param User $user Dolibarr user
     * @param int  $x    Position X
     * @param int  $y    Position Y
     * @param int  $w    Width
     * @param int  $h    Height
     * @param int  $z    Z-index (rank)
     *
     * @return bool True if success, false if error
     */
    public function updatePosition(\User $user, int $x, int $y, int $w, int $h, int $z)
    {
    }
    /**
     * Delete object in database
     *
     * @param	User		$user		User that deletes
     * @param	int<0,1> 	$notrigger	0=launch triggers, 1=disable triggers
     * @return	int<-1,1>				Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     *  Delete a line of object in database
     *
     * @param	User		$user		User that deletes
     *  @param	int			$idline		Id of line to delete
     *  @param	int<0,1>	$notrigger	0=launch triggers after, 1=disable triggers
     *  @return	int<-2,1>				>0 if OK, <0 if KO
     */
    public function deleteLine(\User $user, $idline, $notrigger = 0)
    {
    }
    /**
     *	Validate object
     *
     *	@param	User		$user		User making status change
     *  @param	int<0,1>	$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return	int<-1,1>				Return integer <=0 if OK, 0=Nothing done, >0 if KO
     */
    public function validate($user, $notrigger = 0)
    {
    }
    /**
     *	Set draft status
     *
     *	@param	User		$user		Object user that modify
     *  @param	int<0,1>	$notrigger	1=Does not execute triggers, 0=Execute triggers
     *	@return	int<0,1>				Return integer <0 if KO, >0 if OK
     */
    public function setDraft($user, $notrigger = 0)
    {
    }
    /**
     *	Set archived status
     *
     *	@param	User		$user		Object user that modify
     *  @param	int<0,1>	$notrigger	1=Does not execute triggers, 0=Execute triggers
     *	@return	int<0,1>				Return integer <0 if KO, >0 if OK
     */
    public function setArchived($user, $notrigger = 0)
    {
    }
    /**
     *	Set unarchived status
     *
     *	@param	User		$user		Object user that modify
     *  @param	int<0,1>	$notrigger	1=Does not execute triggers, 0=Execute triggers
     *	@return	int<0,1>				Return integer <0 if KO, >0 if OK
     */
    public function setUnArchived($user, $notrigger = 0)
    {
    }
    /**
     *	Set cancel status
     *
     *	@param	User		$user		Object user that modify
     *  @param	int<0,1>	$notrigger	1=Does not execute triggers, 0=Execute triggers
     *	@return	int<-1,1>				Return integer <0 if KO, 0=Nothing done, >0 if OK
     */
    public function cancel($user, $notrigger = 0)
    {
    }
    /**
     *	Set back to validated status
     *
     *	@param	User		$user			Object user that modify
     *  @param	int<0,1>	$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int<-1,1>					Return integer <0 if KO, 0=Nothing done, >0 if OK
     */
    public function reopen($user, $notrigger = 0)
    {
    }
    /**
     * getTooltipContentArray
     *
     * @param	array<string,string> 	$params 	Params to construct tooltip data
     * @since 	v18
     * @return	array{optimize?:string,picto?:string,ref?:string}
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *  Return a link to the object card (with optionally the picto)
     *
     *  @param	int     $withpicto                  Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *  @param	string  $option                     On what the link point to ('nolink', ...)
     *  @param	int     $notooltip                  1=Disable tooltip
     *  @param	string  $morecss                    Add more css on link
     *  @param	int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @return	string                              String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *	Return a thumb for kanban views
     *
     *	@param	string	    			$option		Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param	?array<string,mixed>	$arraydata	Array of data
     *  @return	string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param	int<0,6>	$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLabelStatus($mode = 0)
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param	int<0,6>	$mode	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string				Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a given status
     *
     *  @param	int			$status		Id status
     *  @param	int<0,6>	$mode		0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string					Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     *	Load the info information in the object
     *
     *	@param	int		$id       Id of object
     *	@return	void
     */
    public function info($id)
    {
    }
    /**
     * Initialize object with example values
     * Id must be 0 if object instance is a specimen
     *
     * @return	int
     */
    public function initAsSpecimen()
    {
    }
    /**
     *  Returns the reference to the following non used object depending on the active numbering module.
     *
     *  @return	string      		Object free reference
     */
    public function getNextNumRef()
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *  @param	string		$modele			Force template to use ('' to not force)
     *  @param	Translate	$outputlangs	object lang a utiliser pour traduction
     *  @param	int<0,1>	$hidedetails    Hide details of lines
     *  @param	int<0,1>	$hidedesc       Hide description
     *  @param	int<0,1>	$hideref        Hide ref
     *  @param	?array<string,string>  $moreparams     Array to provide more information
     *  @return	int         				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
    /**
     * Checks if a color is a valid hex code
     *
     * @param mixed $color the color to check
     * @return bool
     */
    public static function checkColor($color)
    {
    }
    /**
     * Get color preset
     *
     * @return string[]
     */
    public static function getColorPreset()
    {
    }
    /**
     * Get memo context
     *
     * @param string|array<string> $context Context
     * @param CommonObject|null    $object the common Dolibarr object
     *
     * @return mixed|string
     */
    public static function getMemoContext($context, $object = \null)
    {
    }
    /**
     * @param array<string, array<string>> $contextTabMapping memo context list and Dolibarr context associated
     * @param string $tabContext memo context
     * @param string $dolibarrContext Dolibarr context
     *
     * @return void
     */
    public static function completeMemoContextMapping(array &$contextTabMapping, string $tabContext, string $dolibarrContext = '')
    {
    }
    /**
     * Get available memo context
     *
     * @param null $object the common Dolibarr object
     * @param bool $onlyActiveModules on true return only
     *
     * @return array<string, array<string>>
     */
    public static function getAvailableMemoContextMapping($object = \null, $onlyActiveModules = \true)
    {
    }
    /**
     * Get available memo context
     *
     * @return string[]
     */
    public static function getAvailableMemoContext()
    {
    }
    /**
     * Count archived memo query
     *
     * @param     string $element_type  Type of element
     * @param     int    $element_id    Id of element
     * @param     string $context       Context
     * @param     int    $id            Id
     *
     * @return int|false
     */
    public function countArchivedMemoQuery($element_type, $element_id, $context, $id = 0)
    {
    }
    /**
     * Get memos query
     *
     * @param     string $element_type  Type of element
     * @param     int    $element_id    Id of element
     * @param     string $context       Context
     * @param     int    $id            Id
     *
     * @return string
     */
    public function getMemosQuery($element_type, $element_id, $context, $id = 0)
    {
    }
    /**
     * Get template memos query
     *
     * @param     string $element_type  Type of element
     * @param     string $context_tab       Context tab
     * @param     int    $id            Id
     *
     * @return string
     */
    public function getTemplateMemosQuery($element_type, $context_tab = '', $id = 0)
    {
    }
    /**
     * Return HTML string to show a field into a page
     * Code very similar with showOutputField of extra fields
     *
     * @param array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}	$val	Array of properties of field to show
     * @param  string  			$key            	Key of attribute
     * @param  string|int|null  	$value          	Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value)
     * @param  string  			$moreparam      	To add more parameters on html tag
     * @param  string  			$keysuffix      	Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param  string  			$keyprefix      	Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param  mixed   			$morecss        	Value for CSS to use (Old usage: May also be a numeric to define a size).
     * @return string
     */
    public function showOutputField($val, $key, $value, $moreparam = '', $keysuffix = '', $keyprefix = '', $morecss = '')
    {
    }
    /**
     * Load the Javascript interface for QuickMemo
     *
     * @param  array<string|mixed> $jsConfVars  Configuration variables
     * @return bool
     */
    public static function loadQuickMemoJsInterface($jsConfVars)
    {
    }
    /**
     * Get JS memo
     *
     * @param User $currentUser Current user
     *
     * @return stdClass
     */
    public function getJsMemo(\User $currentUser)
    {
    }
    /**
     * Get JS memo default
     *
     * @return stdClass
     */
    public static function getJsMemoDefault()
    {
    }
}