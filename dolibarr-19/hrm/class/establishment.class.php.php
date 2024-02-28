<?php

/**
 * Class to manage establishments
 */
class Establishment extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'establishment';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'establishment';
    /**
     * @var string    Name of subtable line
     */
    public $table_element_line = '';
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_establishment';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'establishment';
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string Ref
     */
    public $ref;
    /**
     * @var int ID
     */
    public $rowid;
    /**
     * @var string Label
     */
    public $label;
    /**
     * @var string Address
     */
    public $address;
    /**
     * @var string Zip
     */
    public $zip;
    /**
     * @var string Town
     */
    public $town;
    /**
     * @var int country id
     */
    public $country_id;
    /**
     * @var int Status 0=open, 1=closed
     */
    public $status;
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * @var int user mod id
     */
    public $fk_user_mod;
    /**
     * @var int user author id
     */
    public $fk_user_author;
    /**
     * @var int date create
     */
    public $datec;
    const STATUS_OPEN = 1;
    const STATUS_CLOSED = 0;
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => 1, 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 15, 'index' => 1), 'ref' => array('type' => 'varchar(30)', 'label' => 'Ref', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'showoncombobox' => 1, 'position' => 20), 'label' => array('type' => 'varchar(128)', 'label' => 'Label', 'enabled' => 1, 'visible' => -1, 'showoncombobox' => 2, 'position' => 22), 'address' => array('type' => 'varchar(255)', 'label' => 'Address', 'enabled' => 1, 'visible' => -1, 'position' => 25), 'zip' => array('type' => 'varchar(25)', 'label' => 'Zip', 'enabled' => 1, 'visible' => -1, 'position' => 30), 'town' => array('type' => 'varchar(50)', 'label' => 'Town', 'enabled' => 1, 'visible' => -1, 'position' => 35), 'fk_state' => array('type' => 'integer', 'label' => 'Fkstate', 'enabled' => 1, 'visible' => -1, 'position' => 40), 'fk_country' => array('type' => 'integer', 'label' => 'Fkcountry', 'enabled' => 1, 'visible' => -1, 'position' => 45), 'profid1' => array('type' => 'varchar(20)', 'label' => 'Profid1', 'enabled' => 1, 'visible' => -1, 'position' => 50), 'profid2' => array('type' => 'varchar(20)', 'label' => 'Profid2', 'enabled' => 1, 'visible' => -1, 'position' => 55), 'profid3' => array('type' => 'varchar(20)', 'label' => 'Profid3', 'enabled' => 1, 'visible' => -1, 'position' => 60), 'phone' => array('type' => 'varchar(20)', 'label' => 'Phone', 'enabled' => 1, 'visible' => -1, 'position' => 65), 'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Fkuserauthor', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 70), 'fk_user_mod' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Fkusermod', 'enabled' => 1, 'visible' => -1, 'position' => 75), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 80), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 85), 'status' => array('type' => 'integer', 'label' => 'Status', 'enabled' => 1, 'visible' => -1, 'position' => 500));
    /**
     * Constructor
     *
     * @param	DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Create object in database
     *
     *	@param		User	$user   User making creation
     *	@return 	int				Return integer <0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    /**
     *	Update record
     *
     *	@param	User	$user		User making update
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function update($user)
    {
    }
    /**
     * Load an object from database
     *
     * @param	int		$id		Id of record to load
     * @return	int				Return integer <0 if KO, >=0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     *	Delete record
     *
     *	@param	int		$id		Id of record to delete
     *	@return	int				Return integer <0 if KO, >0 if OK
     */
    public function delete($id)
    {
    }
    /**
     * Give a label from a status
     *
     * @param  	int		$mode		0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * @return  string   		 	Label of status
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
     * Information on record
     *
     * @param	int		$id      Id of record
     * @return	void
     */
    public function info($id)
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
     *  @return	string                              String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     * 	Return account country code
     *
     *	@return		string		country code
     */
    public function getCountryCode()
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