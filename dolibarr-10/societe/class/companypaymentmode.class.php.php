<?php

//require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class for CompanyPaymentMode
 */
class CompanyPaymentMode extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'companypaymentmode';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'societe_rib';
    /**
     * @var int  Does companypaymentmode support multicompany module ? 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     */
    public $ismultientitymanaged = 2;
    /**
     * @var int  Does companypaymentmode support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 0;
    /**
     * @var string String with name of icon for companypaymentmode. Must be the part after the 'object_' into object_companypaymentmode.png
     */
    public $picto = 'generic';
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
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'Rowid', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 10), 'fk_soc' => array('type' => 'integer', 'label' => 'Fk soc', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 15), 'label' => array('type' => 'varchar(30)', 'label' => 'Label', 'enabled' => 1, 'visible' => -2, 'position' => 30), 'bank' => array('type' => 'varchar(255)', 'label' => 'Bank', 'enabled' => 1, 'visible' => -2, 'position' => 35), 'code_banque' => array('type' => 'varchar(128)', 'label' => 'Code banque', 'enabled' => 1, 'visible' => -2, 'position' => 40), 'code_guichet' => array('type' => 'varchar(6)', 'label' => 'Code guichet', 'enabled' => 1, 'visible' => -2, 'position' => 45), 'number' => array('type' => 'varchar(255)', 'label' => 'Number', 'enabled' => 1, 'visible' => -2, 'position' => 50), 'cle_rib' => array('type' => 'varchar(5)', 'label' => 'Cle rib', 'enabled' => 1, 'visible' => -2, 'position' => 55), 'bic' => array('type' => 'varchar(20)', 'label' => 'Bic', 'enabled' => 1, 'visible' => -2, 'position' => 60), 'iban_prefix' => array('type' => 'varchar(34)', 'label' => 'Iban prefix', 'enabled' => 1, 'visible' => -2, 'position' => 65), 'domiciliation' => array('type' => 'varchar(255)', 'label' => 'Domiciliation', 'enabled' => 1, 'visible' => -2, 'position' => 70), 'proprio' => array('type' => 'varchar(60)', 'label' => 'Proprio', 'enabled' => 1, 'visible' => -2, 'position' => 75), 'owner_address' => array('type' => 'text', 'label' => 'Owner address', 'enabled' => 1, 'visible' => -2, 'position' => 80), 'default_rib' => array('type' => 'tinyint(4)', 'label' => 'Default rib', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 85), 'rum' => array('type' => 'varchar(32)', 'label' => 'Rum', 'enabled' => 1, 'visible' => -2, 'position' => 90), 'date_rum' => array('type' => 'date', 'label' => 'Date rum', 'enabled' => 1, 'visible' => -2, 'position' => 95), 'frstrecur' => array('type' => 'varchar(16)', 'label' => 'Frstrecur', 'enabled' => 1, 'visible' => -2, 'position' => 100), 'type' => array('type' => 'varchar(32)', 'label' => 'Type', 'enabled' => 1, 'visible' => -2, 'position' => 110), 'last_four' => array('type' => 'varchar(4)', 'label' => 'Last four', 'enabled' => 1, 'visible' => -2, 'position' => 115), 'card_type' => array('type' => 'varchar(255)', 'label' => 'Card type', 'enabled' => 1, 'visible' => -2, 'position' => 120), 'cvn' => array('type' => 'varchar(255)', 'label' => 'Cvn', 'enabled' => 1, 'visible' => -2, 'position' => 125), 'exp_date_month' => array('type' => 'integer', 'label' => 'Exp date month', 'enabled' => 1, 'visible' => -2, 'position' => 130), 'exp_date_year' => array('type' => 'integer', 'label' => 'Exp date year', 'enabled' => 1, 'visible' => -2, 'position' => 135), 'country_code' => array('type' => 'varchar(10)', 'label' => 'Country code', 'enabled' => 1, 'visible' => -2, 'position' => 140), 'approved' => array('type' => 'integer', 'label' => 'Approved', 'enabled' => 1, 'visible' => -2, 'position' => 145), 'email' => array('type' => 'varchar(255)', 'label' => 'Email', 'enabled' => 1, 'visible' => -2, 'position' => 150), 'max_total_amount_of_all_payments' => array('type' => 'double(24,8)', 'label' => 'Max total amount of all payments', 'enabled' => 1, 'visible' => -2, 'position' => 155), 'preapproval_key' => array('type' => 'varchar(255)', 'label' => 'Preapproval key', 'enabled' => 1, 'visible' => -2, 'position' => 160), 'total_amount_of_all_payments' => array('type' => 'double(24,8)', 'label' => 'Total amount of all payments', 'enabled' => 1, 'visible' => -2, 'position' => 165), 'stripe_card_ref' => array('type' => 'varchar(128)', 'label' => 'Stripe card ref', 'enabled' => 1, 'visible' => -2, 'position' => 170), 'status' => array('type' => 'integer', 'label' => 'Status', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 175), 'starting_date' => array('type' => 'date', 'label' => 'Starting date', 'enabled' => 1, 'visible' => -2, 'position' => 180), 'ending_date' => array('type' => 'date', 'label' => 'Ending date', 'enabled' => 1, 'visible' => -2, 'position' => 185), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -2, 'position' => 20), 'tms' => array('type' => 'timestamp', 'label' => 'Tms', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 25), 'import_key' => array('type' => 'varchar(14)', 'label' => 'Import key', 'enabled' => 1, 'visible' => -2, 'position' => 105));
    /**
     * @var int ID
     */
    public $rowid;
    /**
     * @var int Thirdparty ID
     */
    public $fk_soc;
    /**
     * @var string company payment mode label
     */
    public $label;
    public $bank;
    public $code_banque;
    public $code_guichet;
    public $number;
    public $cle_rib;
    public $bic;
    public $iban_prefix;
    public $domiciliation;
    public $proprio;
    public $owner_address;
    public $default_rib;
    public $rum;
    public $date_rum;
    public $frstrecur;
    public $type;
    public $last_four;
    public $card_type;
    public $cvn;
    public $exp_date_month;
    public $exp_date_year;
    public $country_code;
    public $approved;
    public $email;
    public $max_total_amount_of_all_payments;
    public $preapproval_key;
    public $total_amount_of_all_payments;
    public $stripe_card_ref;
    /**
     * @var int Status
     */
    public $status;
    public $starting_date;
    public $ending_date;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * Date modification record (tms)
     *
     * @var integer
     */
    public $tms;
    public $import_key;
    // END MODULEBUILDER PROPERTIES
    // If this object has a subtable with lines
    /**
     * @var int    Name of subtable line
     */
    //public $table_element_line = 'companypaymentmodedet';
    /**
     * @var int    Field with ID of parent key if this field has a parent
     */
    //public $fk_element = 'fk_companypaymentmode';
    /**
     * @var int    Name of subtable class that manage subtable lines
     */
    //public $class_element_line = 'CompanyPaymentModeline';
    /**
     * @var array	List of child tables. To test if we can delete object.
     */
    //protected $childtables=array();
    /**
     * @var CompanyPaymentModeLine[]     Array of subtable lines
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
     * @param 	int    	$id   			Id object
     * @param 	string 	$ref  			Ref
     * @param	int		$socid			Id of company to get first default payment mode
     * @param	string	$type			Filter on type ('ban', 'card', ...)
     * @param	string	$morewhere		More SQL filters (' AND ...')
     * @return 	int         			<0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null, $socid = 0, $type = '', $morewhere = '')
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
    
    		// Load lines with object CompanyPaymentModeLine
    
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
     *	@param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option						On what the link point to ('nolink', ...)
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     * Set a Payment mode as Default
     *
     * @param   int     $id    		Payment mode ID
     * @param	string	$alltypes	1=The default is for all payment types instead of per type
     * @return  int             	0 if KO, 1 if OK
     */
    public function setAsDefault($id = 0, $alltypes = 0)
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
}