<?php

//require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class for EmailSenderProfile
 */
class EmailSenderProfile extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'emailsenderprofile';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'c_email_senderprofile';
    /**
     * @var array  Does emailsenderprofile support multicompany module ? 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     */
    public $ismultientitymanaged = 1;
    /**
     * @var string String with name of icon for emailsenderprofile
     */
    public $picto = 'emailsenderprofile@monmodule';
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;
    /**
     *  'type' if the field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'enabled' is a condition when the field must be managed.
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommanded to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' is the CSS style to use on field. For example: 'maxwidth200'
     *  'help' is a string visible as a tooltip on field
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arraykeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'visible' => -1, 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'index' => 1, 'comment' => 'Id'),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'visible' => -1, 'enabled' => 1, 'position' => 20, 'notnull' => 1, 'index' => 1),
        'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'visible' => 1, 'enabled' => 1, 'position' => 30, 'notnull' => 1),
        'email' => array('type' => 'varchar(255)', 'label' => 'Email', 'visible' => 1, 'enabled' => 1, 'position' => 40, 'notnull' => -1),
        //'fk_user_creat' => array('type'=>'integer', 'label'=>'UserAuthor', 'visible'=>-1, 'enabled'=>1, 'position'=>500, 'notnull'=>1,),
        'private' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'User', 'visible' => -1, 'enabled' => 1, 'position' => 50, 'default' => '0', 'notnull' => 1),
        'signature' => array('type' => 'text', 'label' => 'Signature', 'visible' => 3, 'enabled' => 1, 'position' => 400, 'notnull' => -1, 'index' => 1),
        'position' => array('type' => 'integer', 'label' => 'Position', 'visible' => 1, 'enabled' => 1, 'position' => 405, 'notnull' => -1, 'index' => 1),
        'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'visible' => -1, 'enabled' => 1, 'position' => 500, 'notnull' => 1),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'visible' => -1, 'enabled' => 1, 'position' => 500, 'notnull' => 1),
        'active' => array('type' => 'integer', 'label' => 'Status', 'visible' => 1, 'enabled' => 1, 'default' => 1, 'position' => 1000, 'notnull' => -1, 'index' => 1, 'arrayofkeyval' => array(0 => 'Disabled', 1 => 'Enabled')),
    );
    /**
     * @var int ID
     */
    public $rowid;
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * @var string Email Sender Profile label
     */
    public $label;
    public $email;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    public $tms;
    //public $fk_user_creat;
    //public $fk_user_modif;
    public $signature;
    public $position;
    public $active;
    // END MODULEBUILDER PROPERTIES
    // If this object has a subtable with lines
    /**
     * @var int    Name of subtable line
     */
    //public $table_element_line = 'emailsenderprofiledet';
    /**
     * @var int    Field with ID of parent key if this field has a parent
     */
    //public $fk_element = 'fk_emailsenderprofile';
    /**
     * @var int    Name of subtable class that manage subtable lines
     */
    //public $class_element_line = 'EmailSenderProfileline';
    /**
     * @var array	List of child tables. To test if we can delete object.
     */
    //protected $childtables=array();
    /**
     * @var EmailSenderProfileLine[]     Array of subtable lines
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
    public function fetchLines()
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
    /**
     *  Return a link to the object card (with optionaly the picto)
     *
     *	@param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@return	string								String with URL
     */
    public function getNomUrl($withpicto = 0)
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
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 			       	Label of status
     */
    public static function LibStatut($status, $mode = 0)
    {
    }
    /**
     *  Charge les informations d'ordre info dans l'objet commande
     *
     *  @param  int     $id       Id of order
     *  @return	void
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