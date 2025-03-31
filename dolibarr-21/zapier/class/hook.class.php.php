<?php

/**
 * Class for Hook
 */
class Hook extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'hook';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'zapier_hook';
    /**
     * @var string String with name of icon for hook. Must be the part after the 'object_' into object_hook.png
     */
    public $picto = 'hook@zapier';
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
    const STATUS_DISABLED = -1;
    /**
     *  'type' if the field format ('integer', 'integer:Class:pathtoclass', 'varchar(x)', 'double(24,8)', 'text', 'html', 'datetime', 'timestamp', 'float')
     *  'label' the translation key.
     *  'enabled' is a condition when the field must be managed.
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
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
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-5,5>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -2, 'noteditable' => 1, 'notnull' => 1, 'index' => 1, 'position' => 1, 'comment' => 'Id'), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'default' => '1', 'index' => 1, 'position' => 20), 'fk_user' => array('type' => 'integer', 'label' => 'UserOwner', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 510, 'foreignkey' => 'llx_user.rowid'), 'url' => array('type' => 'varchar(255)', 'label' => 'Url', 'enabled' => 1, 'visible' => 1, 'position' => 30, 'searchall' => 1, 'css' => 'minwidth200', 'help' => 'Hook url'), 'module' => array('type' => 'varchar(128)', 'label' => 'Module', 'enabled' => 1, 'visible' => 1, 'position' => 30, 'searchall' => 1, 'css' => 'minwidth200', 'help' => 'Hook module'), 'action' => array('type' => 'varchar(128)', 'label' => 'Action', 'enabled' => 1, 'visible' => 1, 'position' => 30, 'searchall' => 1, 'css' => 'minwidth200', 'help' => 'Hook action trigger'), 'event' => array('type' => 'varchar(255)', 'label' => 'Event', 'enabled' => 1, 'visible' => 1, 'position' => 30, 'searchall' => 1, 'css' => 'minwidth200', 'help' => 'Event', 'showoncombobox' => 1), 'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 500), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'index' => 0, 'position' => 1000), 'status' => array('type' => 'integer', 'label' => 'Status', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'default' => '0', 'index' => 1, 'position' => 1000, 'arrayofkeyval' => array(0 => 'Draft', 1 => 'Active', -1 => 'Canceled')));
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
     * @var string url of webhook
     */
    public $url;
    /**
     * @var int ID of user owner webhook
     */
    public $fk_user;
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
     * @var string import_key
     */
    public $import_key;
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
     * Clone an object into another one
     *
     * @param   User    $user       User that creates
     * @param   int     $fromid     Id of object to clone
     * @return  mixed               New object created, <0 if KO
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
     * @param  string      	$sortfield    	Sort field
     * @param  int         	$limit       	limit
     * @param  int         	$offset       	Offset
     * @param  string		$filter       	Filter as an Universal Search string.
     * 										Example: '((client:=:1) OR ((client:>=:2) AND (client:<=:3))) AND (client:!=:8) AND (nom:like:'a%')'
     * @param  string      	$filtermode   	No more used
     * @return Hook[]|int                 	int <0 if KO, array of pages if OK
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
     *  Delete object in database
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
     *  Return label of the status
     *
     *  @param  int     $mode       0 = long label
     *                              1 = short label
     *                              2 = Picto + short label
     *                              3 = Picto, 4=Picto + long label
     *                              5 = Short label + Picto
     *                              6 = Long label + Picto
     *  @return	string              Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the status
     *
     *  @param  int     $status     Id status
     *  @param  int     $mode       0 = long label,
     *                              1 = short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string              Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     *  Load the info information in the object
     *
     *  @param  int     $id       Id of object
     *  @return	void
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