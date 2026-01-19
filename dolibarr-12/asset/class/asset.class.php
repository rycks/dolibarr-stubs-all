<?php

/**
 * Class for Asset
 */
class Asset extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'asset';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'asset';
    /**
     * @var int  Does module support multicompany module ? 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     */
    public $ismultientitymanaged = 0;
    /**
     * @var int  Does asset support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 1;
    /**
     * @var string String with name of icon for asset. Must be the part after the 'object_' into object_asset.png
     */
    public $picto = 'asset';
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
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'visible' => -1, 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'index' => 1, 'comment' => "Id"), 'ref' => array('type' => 'varchar(10)', 'label' => 'Ref', 'visible' => 1, 'enabled' => 1, 'position' => 10, 'notnull' => 1, 'index' => 1, 'searchall' => 1, 'comment' => "Reference of object", 'showoncombobox' => 1), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'visible' => 0, 'enabled' => 1, 'position' => 20, 'notnull' => 1, 'index' => 1), 'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'visible' => 1, 'enabled' => 1, 'position' => 30, 'notnull' => -1, 'searchall' => 1), 'amount_ht' => array('type' => 'double(24,8)', 'label' => 'AmountHTShort', 'visible' => 1, 'enabled' => 1, 'position' => 40, 'notnull' => -1, 'isameasure' => '1', 'help' => "Help text"), 'amount_vat' => array('type' => 'double(24,8)', 'label' => 'AmountVAT', 'visible' => 1, 'enabled' => 1, 'position' => 40, 'notnull' => -1, 'isameasure' => '1', 'help' => "Help text"), 'fk_asset_type' => array('type' => 'integer:AssetType:asset/class/asset_type.class.php', 'label' => 'AssetsType', 'visible' => 1, 'enabled' => 1, 'position' => 50, 'notnull' => 1, 'index' => 1, 'searchall' => 1), 'description' => array('type' => 'text', 'label' => 'Description', 'visible' => -1, 'enabled' => 1, 'position' => 90, 'notnull' => -1), 'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'visible' => -1, 'enabled' => 1, 'position' => 91, 'notnull' => -1), 'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'visible' => -1, 'enabled' => 1, 'position' => 92, 'notnull' => -1), 'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'visible' => -2, 'enabled' => 1, 'position' => 500, 'notnull' => 1), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'visible' => -2, 'enabled' => 1, 'position' => 501, 'notnull' => 1), 'fk_user_creat' => array('type' => 'integer', 'label' => 'UserAuthor', 'visible' => -2, 'enabled' => 1, 'position' => 510, 'notnull' => 1), 'fk_user_modif' => array('type' => 'integer', 'label' => 'UserModif', 'visible' => -2, 'enabled' => 1, 'position' => 511, 'notnull' => -1), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'visible' => -2, 'enabled' => 1, 'position' => 1000, 'notnull' => -1), 'status' => array('type' => 'integer', 'label' => 'Status', 'visible' => 1, 'enabled' => 1, 'position' => 1000, 'notnull' => 1, 'index' => 1, 'arrayofkeyval' => array('0' => 'Draft', '1' => 'Active', '-1' => 'Cancel')));
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
     * @var string Asset label
     */
    public $label;
    public $amount;
    /**
     * @var int Thirdparty ID
     */
    public $fk_soc;
    /**
     * @var string description
     */
    public $description;
    public $note_public;
    public $note_private;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    public $tms;
    /**
     * @var int ID
     */
    public $fk_user_creat;
    /**
     * @var int ID
     */
    public $fk_user_modif;
    public $import_key;
    /**
     * @var int Status
     */
    public $status;
    // If this object has a subtable with lines
    /**
     * @var int    Name of subtable line
     */
    //public $table_element_line = 'assetdet';
    /**
     * @var int    Field with ID of parent key if this field has a parent
     */
    //public $fk_element = 'fk_asset';
    /**
     * @var int    Name of subtable class that manage subtable lines
     */
    //public $class_element_line = 'Assetline';
    /**
     * @var array	List of child tables. To test if we can delete object.
     */
    //protected $childtables=array();
    /**
     * @var AssetLine[]     Array of subtable lines
     */
    //public $lines = array();
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
    
    		// Load lines with object AssetsLine
    
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
     *  Return a link to the object card (with optionaly the picto)
     *
     *  @param  int     $withpicto                  Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *  @param  string  $option                     On what the link point to ('nolink', ...)
     *  @param  int     $notooltip                  1=Disable tooltip
     *  @param  string  $morecss                    Add more css on link
     *  @param  int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @return string                              String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *  Retourne le libelle du status d'un user (actif, inactif)
     *
     *  @param  int     $mode          0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return string                 Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the status
     *
     *  @param  int     $status         Id status
     *  @param  int     $mode           0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string                  Label of status
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
    /**
     * Action executed by scheduler
     * CAN BE A CRON TASK
     *
     * @return	int			0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function doScheduledJob()
    {
    }
}