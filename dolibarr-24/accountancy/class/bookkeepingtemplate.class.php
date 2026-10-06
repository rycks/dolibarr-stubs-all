<?php

/**
 * Class for BookkeepingTemplate
 */
class BookkeepingTemplate extends \CommonObject
{
    /**
     * @var string ID of module.
     */
    public $module = 'accountancy';
    /**
     * @var string ID to identify managed object.
     */
    public $element = 'accounting_transaction_template';
    /**
     * @var string Name of table without prefix where object is stored. This is also the key used for extrafields management.
     */
    public $table_element = 'accounting_transaction_template';
    /**
     * @var int<0,1>|string		0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     */
    public $ismultientitymanaged = 1;
    /**
     * @var int<0,1>            Does object support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 1;
    /**
     * @var string String with name of icon for bookkeepingtemplate. Must be a 'fa-xxx' fontawesome code (or 'fa-xxx_fa_color_size') or 'bookkeepingtemplate@accountancy' if picto is file 'img/object_bookkeepingtemplate.png'.
     */
    public $picto = 'fa-list';
    /**
     *  'type' if the field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:>:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'langfile' the key of the language file for translation.
     *  'enabled' is a condition when the field must be managed.
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwritten by the Setup of Default Values if the field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' is the CSS style to use on field. For example: 'maxwidth200'
     *  'help' is a string visible as a tooltip on field
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,visible:int<-6,6>|string,langfile?:string,notnull?:int<-1,1>,noteditable?:int<0,1>,alwayseditable?:int<0,1>|string,default?:string|int,index?:int<0,1>,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,cssview?:string,csslist?:string,help?:string,helplist?:string,showoncombobox?:int<0,4>|string,disabled?:int<0,1>|string,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>|string,showonheader?:int<0,1>,searchmulti?:int<0,1>,picto?:string,required?:int<0,1>,placeholder?:string}>    Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array("rowid" => array("type" => "integer", "label" => "TechnicalID", "enabled" => 1, 'position' => 1, 'notnull' => 1, "visible" => 0, "noteditable" => 1, "index" => 1, "css" => "left", "comment" => "Id"), "entity" => array("type" => "integer", "label" => "Entity", "enabled" => 1, 'position' => 5, 'notnull' => 1, "visible" => 0, "index" => 1, "default" => '1'), "code" => array("type" => "varchar(128)", "label" => "Code", "enabled" => 1, 'position' => 10, 'notnull' => 1, "visible" => 1, "index" => 1, "searchall" => 1, "css" => "minwidth300", "help" => "UniqueCodeForTemplate"), "label" => array("type" => "varchar(255)", "label" => "Label", "enabled" => 1, 'position' => 20, 'notnull' => 0, "visible" => 1, "css" => "minwidth300"), "date_creation" => array("type" => "datetime", "label" => "DateCreation", "enabled" => 1, 'position' => 500, 'notnull' => 1, "visible" => -2), "tms" => array("type" => "timestamp", "label" => "DateModification", "enabled" => 1, 'position' => 501, 'notnull' => 0, "visible" => -2), "fk_user_creat" => array("type" => "integer:User:user/class/user.class.php", "label" => "UserAuthor", "picto" => "user", "enabled" => 1, 'position' => 510, 'notnull' => 1, "visible" => "-2", "csslist" => "tdoverflowmax150"), "fk_user_modif" => array("type" => "integer:User:user/class/user.class.php", "label" => "UserModif", "picto" => "user", "enabled" => 1, 'position' => 511, 'notnull' => -1, "visible" => "-2", "csslist" => "tdoverflowmax150"), "import_key" => array("type" => "varchar(14)", "label" => "ImportId", "enabled" => 1, 'position' => 1000, 'notnull' => -1, "visible" => -2));
    // END MODULEBUILDER PROPERTIES
    /**
     * @var int ID
     */
    public $rowid;
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * @var string Code
     */
    public $code;
    /**
     * @var string Label
     */
    public $label;
    /**
     * @var int Unix timestamp of creation date
     */
    public $date_creation;
    /**
     * @var int Unix timestamp of last modification
     */
    public $tms;
    /**
     * @var int User ID who created
     */
    public $fk_user_creat;
    /**
     * @var int|null User ID who modified
     */
    public $fk_user_modif;
    /**
     * @var string|null Import key
     */
    public $import_key;
    /**
     * @var string Name of subtable line
     */
    public $table_element_line = 'accounting_transaction_template_det';
    /**
     * @var BookkeepingTemplateLine[] Array of subtable lines
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
     * @param   User    $user       User that creates
     * @param   int     $notrigger  0=launch triggers after, 1=disable triggers
     * @return  int                 Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Clone an object into another one
     *
     * @param User $user User that creates
     * @param int $fromid Id of object to clone
     * @return mixed         New object created, <0 if KO
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int $id Id object
     * @param string $code Code
     * @param int $noextrafields 0=Default to load extrafields, 1=No extrafields
     * @param int $nolines 0=Default to load lines, 1=No lines
     * @return int                    Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $code = \null, $noextrafields = 0, $nolines = 0)
    {
    }
    /**
     * Load object lines in memory from the database
     *
     * @param   int                             $noextrafields  0=Default to load extrafields, 1=No extrafields
     * @return  BookkeepingTemplateLine[]|int                   Array of line objects if OK, <0 if KO
     */
    public function fetchLines($noextrafields = 0)
    {
    }
    /**
     * Update object into database
     *
     * @param   User      $user       User that modifies
     * @param   int<0,1>  $notrigger  0=launch triggers after, 1=disable triggers
     * @return  int                  Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param   User        $user       User that deletes
     * @param   int<0,1>    $notrigger  0=launch triggers after, 1=disable triggers
     * @return  int                     Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete a line of object in database
     *
     * @param   User        $user       User that delete
     * @param   int         $idline     Id of line to delete
     * @param   int<0,1>    $notrigger  0=launch triggers after, 1=disable triggers
     * @return  int                     >0 if OK, <0 if KO
     */
    public function deleteLine(\User $user, $idline, $notrigger = 0)
    {
    }
    /**
     * Create an array of lines
     *
     * @return BookkeepingTemplateLine[]|int  array of BookkeepingTemplateLine objects if OK, <0 if KO
     */
    public function getLinesArray()
    {
    }
    /**
     * Returns the reference to the following non used object depending on the active numbering module.
     *
     * @return string  Object free reference
     */
    public function getNextNumRef()
    {
    }
    /**
     * Return a link to the object card (with optionally the picto)
     *
     * @param int $withpicto Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     * @param string $option On what the link point to ('nolink', ...)
     * @param int $notooltip 1=Disable tooltip
     * @param string $morecss Add more css on link
     * @param int $save_lastsearch_value -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     * @return string                         String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     * Return label of status
     *
     * @param int $mode 0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * @return string     Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return label of a given status
     *
     * @param int $status Status
     * @param int $mode 0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * @return string       Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
}