<?php

//require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class for MyObject
 */
class MyObject extends \CommonObject
{
    /**
     * @var string 		ID of module.
     */
    public $module = 'mymodule';
    /**
     * @var string 		ID to identify managed object.
     */
    public $element = 'myobject';
    /**
     * @var string 		Name of table without prefix where object is stored. This is also the key used for extrafields management (so extrafields know the link to the parent table).
     */
    public $table_element = 'mymodule_myobject';
    /**
     * @var string 		If permission must be checkec with hasRight('mymodule', 'read') and not hasright('mymodyle', 'myobject', 'read'), you can uncomment this line
     */
    //public $element_for_permission = 'mymodule';
    /**
     * @var string 		String with name of icon for myobject. Must be a 'fa-xxx' fontawesome code (or 'fa-xxx_fa_color_size') or 'myobject@mymodule' if picto is file 'img/object_myobject.png'.
     */
    public $picto = 'fa-file';
    /**
     * @var int<0,1>	Does object support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 0;
    /**
     * @var int<0,1>|string|null  	Does this object support multicompany module ?
     * 								0=No test on entity, 1=Test with field entity in local table, 'field@table'=Test entity into the field@table (example 'fk_soc@societe')
     */
    public $ismultientitymanaged = 0;
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
    const STATUS_CANCELED = 9;
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
     *		Note: Filter must be a Dolibarr Universal Filter syntax string. Example: "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.status:!=:0) or (t.nature:is:NULL)"
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
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
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
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @inheritdoc
     * Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'visible' => 0, 'noteditable' => 1, 'index' => 1, 'css' => 'left', 'comment' => 'Id', 'lang' => 'mymodule@mymodule'), 'ref' => array('type' => 'varchar(128)', 'label' => 'Ref', 'enabled' => 1, 'position' => 20, 'notnull' => 1, 'visible' => 1, 'index' => 1, 'searchall' => 1, 'showoncombobox' => 1, 'validate' => 1, 'comment' => 'Reference of object', 'lang' => 'mymodule@mymodule'), 'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'enabled' => 1, 'position' => 30, 'notnull' => 0, 'visible' => 1, 'alwayseditable' => 1, 'searchall' => 1, 'css' => 'minwidth300', 'cssview' => 'wordbreak', 'help' => 'Help text', 'showoncombobox' => 2, 'validate' => 1, 'lang' => 'mymodule@mymodule'), 'amount' => array('type' => 'price', 'label' => 'Amount', 'enabled' => 1, 'position' => 40, 'notnull' => 0, 'visible' => 1, 'default' => 'null', 'isameasure' => 1, 'help' => 'Help text for amount', 'validate' => 1, 'lang' => 'mymodule@mymodule'), 'qty' => array('type' => 'real', 'label' => 'Qty', 'enabled' => 1, 'position' => 45, 'notnull' => 0, 'visible' => 1, 'default' => '0', 'isameasure' => 1, 'css' => 'maxwidth75imp', 'help' => 'Help text for quantity', 'validate' => 1, 'lang' => 'mymodule@mymodule'), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php:1:((status:=:1) AND (entity:IN:__SHARED_ENTITIES__))', 'label' => 'ThirdParty', 'picto' => 'company', 'enabled' => 'isModEnabled("societe")', 'position' => 50, 'notnull' => -1, 'visible' => 1, 'index' => 1, 'css' => 'maxwidth500 widthcentpercentminusxx', 'csslist' => 'tdoverflowmax150', 'help' => 'OrganizationEventLinkToThirdParty', 'validate' => 1, 'lang' => 'mymodule@mymodule'), 'fk_project' => array('type' => 'integer:Project:projet/class/project.class.php:1', 'label' => 'Project', 'picto' => 'project', 'enabled' => 'isModEnabled("project")', 'position' => 52, 'notnull' => -1, 'visible' => -1, 'index' => 1, 'css' => 'maxwidth500 widthcentpercentminusxx', 'csslist' => 'tdoverflowmax150', 'validate' => 1, 'lang' => 'mymodule@mymodule'), 'description' => array('type' => 'text', 'label' => 'Description', 'enabled' => 1, 'position' => 60, 'notnull' => 0, 'visible' => 3, 'validate' => 1, 'lang' => 'mymodule@mymodule'), 'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'position' => 61, 'notnull' => 0, 'visible' => 0, 'cssview' => 'wordbreak', 'validate' => 1, 'lang' => 'mymodule@mymodule'), 'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'position' => 62, 'notnull' => 0, 'visible' => 0, 'cssview' => 'wordbreak', 'validate' => 1, 'lang' => 'mymodule@mymodule'), 'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'position' => 500, 'notnull' => 1, 'visible' => -2, 'lang' => 'mymodule@mymodule'), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'position' => 501, 'notnull' => 0, 'visible' => -2, 'lang' => 'mymodule@mymodule'), 'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'picto' => 'user', 'enabled' => 1, 'position' => 510, 'notnull' => 1, 'visible' => -2, 'foreignkey' => '0', 'csslist' => 'tdoverflowmax150', 'lang' => 'mymodule@mymodule'), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'picto' => 'user', 'enabled' => 1, 'position' => 511, 'notnull' => -1, 'visible' => -2, 'csslist' => 'tdoverflowmax150', 'lang' => 'mymodule@mymodule'), 'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'LastMainDoc', 'enabled' => 1, 'position' => 600, 'notnull' => 0, 'visible' => 0, 'lang' => 'mymodule@mymodule'), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'position' => 1000, 'notnull' => -1, 'visible' => -2, 'lang' => 'mymodule@mymodule'), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'position' => 1010, 'notnull' => -1, 'visible' => 0, 'lang' => 'mymodule@mymodule'), 'status' => array('type' => 'integer', 'label' => 'Status', 'enabled' => 1, 'position' => 2000, 'notnull' => 1, 'visible' => 1, 'index' => 1, 'arrayofkeyval' => array(0 => 'Draft', '1' => 'Validated', 9 => 'Canceled'), 'validate' => 1, 'lang' => 'mymodule@mymodule'));
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
     * @var string label
     */
    public $label;
    /**
     * @var string amount
     */
    public $amount;
    /**
     * @var int Thirdparty ID
     */
    public $socid;
    // both socid and fk_soc are used
    /**
     * @var int Thirdparty ID
     */
    public $fk_soc;
    // both socid and fk_soc are used
    /**
     * @var int Status
     */
    public $status;
    /**
     * @var int ID
     */
    public $fk_user_creat;
    /**
     * @var int ID
     */
    public $fk_user_modif;
    /**
     * @var string public
     */
    public $last_main_doc;
    /**
     * @var string import_key
     */
    public $import_key;
    // END MODULEBUILDER PROPERTIES
    // If this object has a subtable with lines
    // /**
    //  * @var string    Name of subtable line
    //  */
    // public $table_element_line = 'mymodule_myobjectline';
    // /**
    //  * @var string    Field name with ID of parent key if this object has a parent, Or Field name of in child tables to link to this record.
    //  */
    // public $fk_element = 'fk_myobject';
    // /**
    //  * @var string    Name of subtable class that manage subtable lines
    //  */
    // public $class_element_line = 'MyObjectline';
    // /**
    //  * @var array	List of child tables. To test if we can delete object.
    //  */
    // protected $childtables = array('mychildtable' => array('name'=>'MyObject', 'fk_element'=>'fk_myobject'));
    // /**
    //  * @var array    List of child tables. To know object to delete on cascade.
    //  *               If name matches '@ClassName:FilePathClass:ParentFkFieldName' (the recommended mode) it will
    //  *               call method ClassName->deleteByParentField(parentId, 'ParentFkFieldName') to fetch and delete child object.
    //  *               Using an array like childtables should not be implemented because a child may have other child, so we must only use the method that call deleteByParentField().
    //  */
    // protected $childtablesoncascade = array('mymodule_myobjectdet');
    // /**
    //  * @var MyObjectLine[]     Array of subtable lines
    //  */
    // public $lines = array();
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
     *	@param	User		$user		User that delete
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
     * 	Create an array of lines
     *
     * 	@return	CommonObjectLine[]|int		array of lines if OK, <0 if KO
     */
    public function getLinesArray()
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
     * Return validation test result for a field.
     * Need MAIN_ACTIVATE_VALIDATION_RESULT to be called.
     *
     * @param   array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-2,5>|string,noteditable?:int<0,1>,default?:int<0,1>|string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,2>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,comment?:string,validate?:int<0,1>}>  $fields Array of properties of field to show
     * @param	string  $fieldKey            Key of attribute
     * @param	string  $fieldValue          value of attribute
     * @return	bool 						Return false if fail, true on success, set $this->error for error message
     */
    public function validateField($fields, $fieldKey, $fieldValue)
    {
    }
    /**
     * Action executed by scheduler
     * CAN BE A CRON TASK. In such a case, parameters come from the schedule job setup field 'Parameters'
     * Use public function doScheduledJob($param1, $param2, ...) to get parameters
     *
     * @return	int			0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function doScheduledJob()
    {
    }
}
/**
 * Class MyObjectLine. You can also remove this and generate a CRUD class for lines objects.
 */
class MyObjectLine extends \CommonObjectLine
{
    // To complete with content of an object MyObjectLine
    // We should have a field rowid, fk_myobject and position
    /**
     * To overload
     * @see CommonObjectLine
     */
    public $parent_element = '';
    // Example: '' or 'myobject'
    /**
     * To overload
     * @see CommonObjectLine
     */
    public $fk_parent_attribute = '';
    // Example: '' or 'fk_myobject'
    /**
     * @var int<0,1>	Does object support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 0;
    /**
     * @var int<0,1>|string|null  	Does this object support multicompany module ?
     * 								0=No test on entity, 1=Test with field entity in local table, 'field@table'=Test entity into the field@table (example 'fk_soc@societe')
     */
    public $ismultientitymanaged = 0;
    /**
     * Constructor
     *
     * @param	DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
}