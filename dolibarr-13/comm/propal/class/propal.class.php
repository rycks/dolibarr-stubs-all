<?php

/**
 *	Class to manage proposals
 */
class Propal extends \CommonObject
{
    use \CommonIncoterm;
    /**
     * @var string ID to identify managed object
     */
    public $element = 'propal';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'propal';
    /**
     * @var int    Name of subtable line
     */
    public $table_element_line = 'propaldet';
    /**
     * @var string Fieldname with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_propal';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'propal';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    /**
     * 0=Default, 1=View may be restricted to sales representative only if no permission to see all or to company of external user if external user
     * @var integer
     */
    public $restrictiononfksoc = 1;
    /**
     * {@inheritdoc}
     */
    protected $table_ref_field = 'ref';
    /**
     * ID of the client
     * @var int
     */
    public $socid;
    /**
     * ID of the contact
     * @var int
     */
    public $contactid;
    public $author;
    /**
     * Ref from thirdparty
     * @var string
     */
    public $ref_client;
    /**
     * Status of the quote
     * @var int
     * @see Propal::STATUS_DRAFT, Propal::STATUS_VALIDATED, Propal::STATUS_SIGNED, Propal::STATUS_NOTSIGNED, Propal::STATUS_BILLED
     */
    public $statut;
    /**
     * @deprecated
     * @see $date_creation
     */
    public $datec;
    /**
     * @var integer|string $date_creation;
     */
    public $date_creation;
    /**
     * @deprecated
     * @see $date_validation
     */
    public $datev;
    /**
     * @var integer|string $date_validation;
     */
    public $date_validation;
    /**
     * @var integer|string date of the quote;
     */
    public $date;
    /**
     * @deprecated
     * @see $date
     */
    public $datep;
    /**
     * @var int	Date expected for delivery
     * @deprecated
     */
    public $date_livraison;
    // deprecated; Use delivery_date instead.
    /**
     * @var integer|string 	$delivery_date;
     */
    public $delivery_date;
    // Date expected of shipment (date starting shipment, not the reception that occurs some days after)
    public $fin_validite;
    public $user_author_id;
    public $user_valid_id;
    public $user_close_id;
    /**
     * @deprecated
     * @see $total_ht
     */
    public $price;
    /**
     * @deprecated
     * @see $total_tva
     */
    public $tva;
    /**
     * @deprecated
     * @see $total_ttc
     */
    public $total;
    public $cond_reglement_code;
    public $mode_reglement_code;
    public $remise = 0;
    public $remise_percent = 0;
    public $remise_absolue = 0;
    /**
     * @var int ID
     * @deprecated
     */
    public $fk_address;
    public $address_type;
    public $address;
    public $availability_id;
    public $availability_code;
    public $duree_validite;
    public $demand_reason_id;
    public $demand_reason_code;
    public $extraparams = array();
    /**
     * @var PropaleLigne[]
     */
    public $lines = array();
    public $line;
    public $labelStatus = array();
    public $labelStatusShort = array();
    // Multicurrency
    /**
     * @var int ID
     */
    public $fk_multicurrency;
    public $multicurrency_code;
    public $multicurrency_tx;
    public $multicurrency_total_ht;
    public $multicurrency_total_tva;
    public $multicurrency_total_ttc;
    public $oldcopy;
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
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => 1, 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 15, 'index' => 1),
        'ref' => array('type' => 'varchar(30)', 'label' => 'Ref', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'showoncombobox' => 1, 'position' => 20),
        'ref_client' => array('type' => 'varchar(255)', 'label' => 'RefCustomer', 'enabled' => 1, 'visible' => -1, 'position' => 22),
        'ref_ext' => array('type' => 'varchar(255)', 'label' => 'RefExt', 'enabled' => 1, 'visible' => 0, 'position' => 40),
        'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'enabled' => 1, 'visible' => -1, 'position' => 23),
        'fk_projet' => array('type' => 'integer:Project:projet/class/project.class.php:1:fk_statut=1', 'label' => 'Fk projet', 'enabled' => 1, 'visible' => -1, 'position' => 24),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 25),
        'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 55),
        'datep' => array('type' => 'date', 'label' => 'Date', 'enabled' => 1, 'visible' => -1, 'position' => 60),
        'fin_validite' => array('type' => 'datetime', 'label' => 'DateEnd', 'enabled' => 1, 'visible' => -1, 'position' => 65),
        'date_valid' => array('type' => 'datetime', 'label' => 'DateValidation', 'enabled' => 1, 'visible' => -1, 'position' => 70),
        'date_cloture' => array('type' => 'datetime', 'label' => 'DateClosing', 'enabled' => 1, 'visible' => -1, 'position' => 75),
        'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Fk user author', 'enabled' => 1, 'visible' => -1, 'position' => 80),
        'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 85),
        'fk_user_valid' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserValidation', 'enabled' => 1, 'visible' => -1, 'position' => 90),
        'fk_user_cloture' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Fk user cloture', 'enabled' => 1, 'visible' => -1, 'position' => 95),
        'price' => array('type' => 'double', 'label' => 'Price', 'enabled' => 1, 'visible' => -1, 'position' => 105),
        'remise_percent' => array('type' => 'double', 'label' => 'RelativeDiscount', 'enabled' => 1, 'visible' => -1, 'position' => 110),
        'remise_absolue' => array('type' => 'double', 'label' => 'CustomerRelativeDiscount', 'enabled' => 1, 'visible' => -1, 'position' => 115),
        //'remise' =>array('type'=>'double', 'label'=>'Remise', 'enabled'=>1, 'visible'=>-1, 'position'=>120),
        'total_ht' => array('type' => 'double(24,8)', 'label' => 'TotalHT', 'enabled' => 1, 'visible' => -1, 'position' => 125, 'isameasure' => 1),
        'tva' => array('type' => 'double(24,8)', 'label' => 'VAT', 'enabled' => 1, 'visible' => -1, 'position' => 130, 'isameasure' => 1),
        'localtax1' => array('type' => 'double(24,8)', 'label' => 'LocalTax1', 'enabled' => 1, 'visible' => -1, 'position' => 135, 'isameasure' => 1),
        'localtax2' => array('type' => 'double(24,8)', 'label' => 'LocalTax2', 'enabled' => 1, 'visible' => -1, 'position' => 140, 'isameasure' => 1),
        'total' => array('type' => 'double(24,8)', 'label' => 'TotalTTC', 'enabled' => 1, 'visible' => -1, 'position' => 145, 'isameasure' => 1),
        'fk_account' => array('type' => 'integer', 'label' => 'BankAccount', 'enabled' => 1, 'visible' => -1, 'position' => 150),
        'fk_currency' => array('type' => 'varchar(3)', 'label' => 'Currency', 'enabled' => 1, 'visible' => -1, 'position' => 155),
        'fk_cond_reglement' => array('type' => 'integer', 'label' => 'PaymentTerm', 'enabled' => 1, 'visible' => -1, 'position' => 160),
        'fk_mode_reglement' => array('type' => 'integer', 'label' => 'PaymentMode', 'enabled' => 1, 'visible' => -1, 'position' => 165),
        'note_private' => array('type' => 'text', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 170),
        'note_public' => array('type' => 'text', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 175),
        'model_pdf' => array('type' => 'varchar(255)', 'label' => 'PDFTemplate', 'enabled' => 1, 'visible' => 0, 'position' => 180),
        'date_livraison' => array('type' => 'date', 'label' => 'DateDeliveryPlanned', 'enabled' => 1, 'visible' => -1, 'position' => 185),
        'fk_shipping_method' => array('type' => 'integer', 'label' => 'ShippingMethod', 'enabled' => 1, 'visible' => -1, 'position' => 190),
        'fk_availability' => array('type' => 'integer', 'label' => 'Availability', 'enabled' => 1, 'visible' => -1, 'position' => 195),
        'fk_delivery_address' => array('type' => 'integer', 'label' => 'DeliveryAddress', 'enabled' => 1, 'visible' => 0, 'position' => 200),
        // deprecated
        'fk_input_reason' => array('type' => 'integer', 'label' => 'InputReason', 'enabled' => 1, 'visible' => -1, 'position' => 205),
        'extraparams' => array('type' => 'varchar(255)', 'label' => 'Extraparams', 'enabled' => 1, 'visible' => -1, 'position' => 215),
        'fk_incoterms' => array('type' => 'integer', 'label' => 'IncotermCode', 'enabled' => '$conf->incoterm->enabled', 'visible' => -1, 'position' => 220),
        'location_incoterms' => array('type' => 'varchar(255)', 'label' => 'IncotermLabel', 'enabled' => '$conf->incoterm->enabled', 'visible' => -1, 'position' => 225),
        'fk_multicurrency' => array('type' => 'integer', 'label' => 'MulticurrencyID', 'enabled' => 1, 'visible' => -1, 'position' => 230),
        'multicurrency_code' => array('type' => 'varchar(255)', 'label' => 'MulticurrencyCurrency', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 235),
        'multicurrency_tx' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyRate', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 240, 'isameasure' => 1),
        'multicurrency_total_ht' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyAmountHT', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 245, 'isameasure' => 1),
        'multicurrency_total_tva' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyAmountVAT', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 250, 'isameasure' => 1),
        'multicurrency_total_ttc' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyAmountTTC', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 255, 'isameasure' => 1),
        'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'LastMainDoc', 'enabled' => 1, 'visible' => -1, 'position' => 260),
        'fk_statut' => array('type' => 'smallint(6)', 'label' => 'Status', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 500),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 900),
    );
    // END MODULEBUILDER PROPERTIES
    /**
     * Draft status
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated status
     */
    const STATUS_VALIDATED = 1;
    /**
     * Signed quote
     */
    const STATUS_SIGNED = 2;
    /**
     * Not signed quote
     */
    const STATUS_NOTSIGNED = 3;
    /**
     * Billed or processed quote
     */
    const STATUS_BILLED = 4;
    // Todo rename into STATUS_CLOSE ?
    /**
     *	Constructor
     *
     *	@param      DoliDB	$db         Database handler
     *	@param      int		$socid		Id third party
     *	@param      int		$propalid   Id proposal
     */
    public function __construct($db, $socid = 0, $propalid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Add line into array ->lines
     *  $this->thirdparty should be loaded
     *
     * 	@param  int		$idproduct       	Product Id to add
     * 	@param  int		$qty             	Quantity
     * 	@param  int		$remise_percent  	Discount effected on Product
     *  @return	int							<0 if KO, >0 if OK
     *
     *	TODO	Replace calls to this function by generation objet Ligne
     */
    public function add_product($idproduct, $qty, $remise_percent = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Adding line of fixed discount in the proposal in DB
     *
     *	@param     int		$idremise			Id of fixed discount
     *  @return    int          				>0 if OK, <0 if KO
     */
    public function insert_discount($idremise)
    {
    }
    /**
     *    	Add a proposal line into database (linked to product/service or not)
     *      The parameters are already supposed to be appropriate and with final values to the call
     *      of this method. Also, for the VAT rate, it must have already been defined
     *      by whose calling the method get_default_tva (societe_vendeuse, societe_acheteuse, '' product)
     *      and desc must already have the right value (it's up to the caller to manage multilanguage)
     *
     * 		@param    	string		$desc				Description of line
     * 		@param    	float		$pu_ht				Unit price
     * 		@param    	float		$qty             	Quantity
     * 		@param    	float		$txtva           	Force Vat rate, -1 for auto (Can contain the vat_src_code too with syntax '9.9 (CODE)')
     * 		@param		float		$txlocaltax1		Local tax 1 rate (deprecated, use instead txtva with code inside)
     *  	@param		float		$txlocaltax2		Local tax 2 rate (deprecated, use instead txtva with code inside)
     *		@param    	int			$fk_product      	Product/Service ID predefined
     * 		@param    	float		$remise_percent  	Pourcentage de remise de la ligne
     * 		@param    	string		$price_base_type	HT or TTC
     * 		@param    	float		$pu_ttc             Prix unitaire TTC
     * 		@param    	int			$info_bits			Bits for type of lines
     *      @param      int			$type               Type of line (0=product, 1=service). Not used if fk_product is defined, the type of product is used.
     *      @param      int			$rang               Position of line
     *      @param		int			$special_code		Special code (also used by externals modules!)
     *      @param		int			$fk_parent_line		Id of parent line
     *      @param		int			$fk_fournprice		Id supplier price
     *      @param		int			$pa_ht				Buying price without tax
     *      @param		string		$label				???
     *		@param      int			$date_start       	Start date of the line
     *		@param      int			$date_end         	End date of the line
     *      @param		array		$array_options		extrafields array
     * 		@param 		string		$fk_unit 			Code of the unit to use. Null to use the default one
     *      @param		string		$origin				Depend on global conf MAIN_CREATEFROM_KEEP_LINE_ORIGIN_INFORMATION can be 'orderdet', 'propaldet'..., else 'order','propal,'....
     *      @param		int			$origin_id			Depend on global conf MAIN_CREATEFROM_KEEP_LINE_ORIGIN_INFORMATION can be Id of origin object (aka line id), else object id
     * 		@param		double		$pu_ht_devise		Unit price in currency
     * 		@param		int    		$fk_remise_except	Id discount if line is from a discount
     *    	@return    	int         	    			>0 if OK, <0 if KO
     *    	@see       	add_product()
     */
    public function addline($desc, $pu_ht, $qty, $txtva, $txlocaltax1 = 0.0, $txlocaltax2 = 0.0, $fk_product = 0, $remise_percent = 0.0, $price_base_type = 'HT', $pu_ttc = 0.0, $info_bits = 0, $type = 0, $rang = -1, $special_code = 0, $fk_parent_line = 0, $fk_fournprice = 0, $pa_ht = 0, $label = '', $date_start = '', $date_end = '', $array_options = 0, $fk_unit = \null, $origin = '', $origin_id = 0, $pu_ht_devise = 0, $fk_remise_except = 0)
    {
    }
    /**
     *  Update a proposal line
     *
     *  @param      int			$rowid           	Id of line
     *  @param      float		$pu		     	  	Unit price (HT or TTC depending on price_base_type)
     *  @param      float		$qty            	Quantity
     *  @param      float		$remise_percent  	Discount on line
     *  @param      float		$txtva	          	VAT Rate (Can be '1.23' or '1.23 (ABC)')
     * 	@param	  	float		$txlocaltax1		Local tax 1 rate
     *  @param	  	float		$txlocaltax2		Local tax 2 rate
     *  @param      string		$desc            	Description
     *	@param	  	string		$price_base_type	HT or TTC
     *	@param      int			$info_bits        	Miscellaneous informations
     *	@param		int			$special_code		Special code (also used by externals modules!)
     * 	@param		int			$fk_parent_line		Id of parent line (0 in most cases, used by modules adding sublevels into lines).
     * 	@param		int			$skip_update_total	Keep fields total_xxx to 0 (used for special lines by some modules)
     *  @param		int			$fk_fournprice		Id of origin supplier price
     *  @param		int			$pa_ht				Price (without tax) of product when it was bought
     *  @param		string		$label				???
     *  @param		int			$type				0/1=Product/service
     *	@param      int			$date_start       	Start date of the line
     *	@param      int			$date_end         	End date of the line
     *  @param		array		$array_options		extrafields array
     * 	@param 		string		$fk_unit 			Code of the unit to use. Null to use the default one
     * 	@param		double		$pu_ht_devise		Unit price in currency
     * 	@param		int			$notrigger			disable line update trigger
     *  @return     int     		        		0 if OK, <0 if KO
     */
    public function updateline($rowid, $pu, $qty, $remise_percent, $txtva, $txlocaltax1 = 0.0, $txlocaltax2 = 0.0, $desc = '', $price_base_type = 'HT', $info_bits = 0, $special_code = 0, $fk_parent_line = 0, $skip_update_total = 0, $fk_fournprice = 0, $pa_ht = 0, $label = '', $type = 0, $date_start = '', $date_end = '', $array_options = 0, $fk_unit = \null, $pu_ht_devise = 0, $notrigger = 0)
    {
    }
    /**
     *  Delete detail line
     *
     *  @param		int		$lineid			Id of line to delete
     *  @return     int         			>0 if OK, <0 if KO
     */
    public function deleteline($lineid)
    {
    }
    /**
     *  Create commercial proposal into database
     * 	this->ref can be set or empty. If empty, we will use "(PROVid)"
     *
     * 	@param		User	$user		User that create
     * 	@param		int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return     int     			<0 if KO, >=0 if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *		Load an object from its id and create a new one in database
     *
     *      @param	    User	$user		    User making the clone
     *		@param		int		$socid			Id of thirdparty
     *		@param		int		$forceentity	Entity id to force
     * 	 	@return		int						New id of clone
     */
    public function createFromClone(\User $user, $socid = 0, $forceentity = \null)
    {
    }
    /**
     *	Load a proposal from database. Get also lines.
     *
     *	@param      int			$rowid		id of object to load
     *	@param		string		$ref		Ref of proposal
     *	@param		string		$ref_ext	Ref ext of proposal
     *	@return     int         			>0 if OK, <0 if KO
     */
    public function fetch($rowid, $ref = '', $ref_ext = '')
    {
    }
    /**
     *      Update database
     *
     *      @param      User	$user        	User that modify
     *      @param      int		$notrigger	    0=launch triggers after, 1=disable triggers
     *      @return     int      			   	<0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Load array lines
     *
     *	@param		int		$only_product	Return only physical products
     *	@param		int		$loadalsotranslation	Return translation for products
     *
     * @return		int						<0 if KO, >0 if OK
     */
    public function fetch_lines($only_product = 0, $loadalsotranslation = 0)
    {
    }
    /**
     *  Set status to validated
     *
     *  @param	User	$user       Object user that validate
     *  @param	int		$notrigger	1=Does not execute triggers, 0=execute triggers
     *  @return int         		<0 if KO, 0=Nothing done, >=0 if OK
     */
    public function valid($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Define proposal date
     *
     *  @param  User		$user      	Object user that modify
     *  @param  int			$date		Date
     *  @param  int			$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return	int         			<0 if KO, >0 if OK
     */
    public function set_date($user, $date, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define end validity date
     *
     *	@param		User	$user        		Object user that modify
     *	@param      int		$date_fin_validite	End of validity date
     *  @param  	int		$notrigger			1=Does not execute triggers, 0= execute triggers
     *	@return     int         				<0 if KO, >0 if OK
     */
    public function set_echeance($user, $date_fin_validite, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set delivery date
     *
     *	@param      User 	$user        		Object user that modify
     *	@param      int		$delivery_date		Delivery date
     *  @param  	int		$notrigger			1=Does not execute triggers, 0= execute triggers
     *	@return     int         				<0 if ko, >0 if ok
     *	@deprecated Use  setDeliveryDate
     */
    public function set_date_livraison($user, $delivery_date, $notrigger = 0)
    {
    }
    /**
     *	Set delivery date
     *
     *	@param      User 	$user        		Object user that modify
     *	@param      int		$delivery_date     Delivery date
     *  @param  	int		$notrigger			1=Does not execute triggers, 0= execute triggers
     *	@return     int         				<0 if ko, >0 if ok
     */
    public function setDeliveryDate($user, $delivery_date, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Set delivery
     *
     *  @param		User	$user		  	Object user that modify
     *  @param      int		$id				Availability id
     *  @param  	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *  @return     int           			<0 if KO, >0 if OK
     */
    public function set_availability($user, $id, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Set source of demand
     *
     *  @param		User	$user		Object user that modify
     *  @param      int		$id			Input reason id
     *  @param  	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return     int           		<0 if KO, >0 if OK
     */
    public function set_demand_reason($user, $id, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set customer reference number
     *
     *  @param      User	$user			Object user that modify
     *  @param      string	$ref_client		Customer reference
     *  @param  	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *  @return     int						<0 if ko, >0 if ok
     */
    public function set_ref_client($user, $ref_client, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set an overall discount on the proposal
     *
     *	@param      User	$user       Object user that modify
     *	@param      double	$remise     Amount discount
     *  @param  	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return     int         		<0 if ko, >0 if ok
     */
    public function set_remise_percent($user, $remise, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set an absolute overall discount on the proposal
     *
     *	@param      User	$user       Object user that modify
     *	@param      double	$remise     Amount discount
     *  @param  	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return     int         		<0 if ko, >0 if ok
     */
    public function set_remise_absolue($user, $remise, $notrigger = 0)
    {
    }
    /**
     *	Reopen the commercial proposal
     *
     *	@param      User	$user		Object user that close
     *	@param      int		$statut		Statut
     *	@param      string	$note		Comment
     *  @param		int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return     int         		<0 if KO, >0 if OK
     */
    public function reopen($user, $statut, $note = '', $notrigger = 0)
    {
    }
    /**
     *	Close the commercial proposal
     *
     *	@param      User	$user		Object user that close
     *	@param      int		$status		Status
     *	@param      string	$note		Complete private note with this note
     *  @param		int		$notrigger	1=Does not execute triggers, 0=Execute triggers
     *	@return     int         		<0 if KO, >0 if OK
     */
    public function cloture($user, $status, $note = "", $notrigger = 0)
    {
    }
    /**
     *	Class invoiced the Propal
     *
     *	@param  	User	$user    	Object user
     *  @param		int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return     int     			<0 si ko, >0 si ok
     */
    public function classifyBilled(\User $user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set draft status
     *
     *	@param		User	$user		Object user that modify
     *  @param		int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return		int					<0 if KO, >0 if OK
     */
    public function setDraft($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of proposal (eventually filtered on user) into an array
     *
     *    @param	int		$shortlist			0=Return array[id]=ref, 1=Return array[](id=>id,ref=>ref,name=>name)
     *    @param	int		$draft				0=not draft, 1=draft
     *    @param	int		$notcurrentuser		0=all user, 1=not current user
     *    @param    int		$socid				Id third pary
     *    @param    int		$limit				For pagination
     *    @param    int		$offset				For pagination
     *    @param    string	$sortfield			Sort criteria
     *    @param    string	$sortorder			Sort order
     *    @return	int		       				-1 if KO, array with result if OK
     */
    public function liste_array($shortlist = 0, $draft = 0, $notcurrentuser = 0, $socid = 0, $limit = 0, $offset = 0, $sortfield = 'p.datep', $sortorder = 'DESC')
    {
    }
    /**
     *  Returns an array with the numbers of related invoices
     *
     *	@return	array		Array of invoices
     */
    public function getInvoiceArrayList()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Returns an array with id and ref of related invoices
     *
     *	@param		int		$id			Id propal
     *	@return		array				Array of invoices id
     */
    public function InvoiceArrayList($id)
    {
    }
    /**
     *	Delete proposal
     *
     *	@param	User	$user        	Object user that delete
     *	@param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return	int						>0 if OK, <=0 if KO
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *  Change the delivery time
     *
     *  @param	int	$availability_id	Id of new delivery time
     * 	@param	int	$notrigger			1=Does not execute triggers, 0= execute triggers
     *  @return int                  	>0 if OK, <0 if KO
     *  @deprecated  use set_availability
     */
    public function availability($availability_id, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Change source demand
     *
     *	@param	int $demand_reason_id 	Id of new source demand
     * 	@param	int	$notrigger			1=Does not execute triggers, 0= execute triggers
     *	@return int						>0 si ok, <0 si ko
     *	@deprecated use set_demand_reason
     */
    public function demand_reason($demand_reason_id, $notrigger = 0)
    {
    }
    /**
     *	Object Proposal Information
     *
     * 	@param	int		$id		Proposal id
     *  @return	void
     */
    public function info($id)
    {
    }
    /**
     *    	Return label of status of proposal (draft, validated, ...)
     *
     *    	@param      int			$mode        0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
     *    	@return     string		Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    	Return label of a status (draft, validated, ...)
     *
     *    	@param      int			$status		Id status
     *    	@param      int			$mode      	0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
     *    	@return     string		Label
     */
    public function LibStatut($status, $mode = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @param          User	$user   Object user
     *      @param          int		$mode   "opened" for proposal to close, "signed" for proposal to invoice
     *      @return WorkboardResponse|int <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user, $mode)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return	void
     */
    public function initAsSpecimen()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Charge indicateurs this->nb de tableau de bord
     *
     *      @return     int         <0 if ko, >0 if ok
     */
    public function load_state_board()
    {
    }
    /**
     *  Returns the reference to the following non used Proposal used depending on the active numbering module
     *  defined into PROPALE_ADDON
     *
     *  @param	Societe		$soc  	Object thirdparty
     *  @return string      		Reference libre pour la propale
     */
    public function getNextNumRef($soc)
    {
    }
    /**
     *	Return clicable link of object (with eventually picto)
     *
     *	@param      int		$withpicto		          Add picto into link
     *	@param      string	$option			          Where point the link ('expedition', 'document', ...)
     *	@param      string	$get_params    	          Parametres added to url
     *  @param	    int   	$notooltip		          1=Disable tooltip
     *  @param      int     $save_lastsearch_value    -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param      int     $addlinktonotes           -1=Disable, 0=Just add label show notes, 1=Add private note (only internal user), 2=Add public note (internal or external user), 3=Add private (internal user) and public note (internal and external user)
     *	@return     string          		          String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $get_params = '', $notooltip = 0, $save_lastsearch_value = -1, $addlinktonotes = -1)
    {
    }
    /**
     * 	Retrieve an array of proposal lines
     *
     * 	@return int		>0 if OK, <0 if KO
     */
    public function getLinesArray()
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     * 	@param	    string		$modele			Force model to use ('' to not force)
     * 	@param		Translate	$outputlangs	Object langs to use for output
     *  @param      int			$hidedetails    Hide details of lines
     *  @param      int			$hidedesc       Hide description
     *  @param      int			$hideref        Hide ref
     *  @param   null|array  $moreparams     Array to provide more information
     * 	@return     int         				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param DoliDB $db Database handler
     * @param int $origin_id Old thirdparty id
     * @param int $dest_id New thirdparty id
     * @return bool
     */
    public static function replaceThirdparty(\DoliDB $db, $origin_id, $dest_id)
    {
    }
}
/**
 *	Class to manage commercial proposal lines
 */
class PropaleLigne extends \CommonObjectLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'propaldet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'propaldet';
    public $oldline;
    // From llx_propaldet
    public $fk_propal;
    public $fk_parent_line;
    public $desc;
    // Description ligne
    public $fk_product;
    // Id produit predefini
    /**
     * @deprecated
     * @see $product_type
     */
    public $fk_product_type;
    /**
     * Product type.
     * @var int
     * @see Product::TYPE_PRODUCT, Product::TYPE_SERVICE
     */
    public $product_type = \Product::TYPE_PRODUCT;
    public $qty;
    public $tva_tx;
    public $vat_src_code;
    public $subprice;
    public $remise_percent;
    public $fk_remise_except;
    public $rang = 0;
    public $fk_fournprice;
    public $pa_ht;
    public $marge_tx;
    public $marque_tx;
    public $special_code;
    // Tag for special lines (exlusive tags)
    // 1: frais de port
    // 2: ecotaxe
    // 3: option line (when qty = 0)
    public $info_bits = 0;
    // Some other info:
    // Bit 0: 	0 si TVA normal - 1 si TVA NPR
    // Bit 1:	0 ligne normale - 1 si ligne de remise fixe
    public $total_ht;
    // Total HT  de la ligne toute quantite et incluant la remise ligne
    public $total_tva;
    // Total TVA  de la ligne toute quantite et incluant la remise ligne
    public $total_ttc;
    // Total TTC de la ligne toute quantite et incluant la remise ligne
    /**
     * @deprecated
     * @see $remise_percent, $fk_remise_except
     */
    public $remise;
    /**
     * @deprecated
     * @see $subprice
     */
    public $price;
    // From llx_product
    /**
     * @deprecated
     * @see $product_ref
     */
    public $ref;
    /**
     * Product reference
     * @var string
     */
    public $product_ref;
    /**
     * @deprecated
     * @see $product_label
     */
    public $libelle;
    /**
     * @deprecated
     * @see $product_label
     */
    public $label;
    /**
     *  Product label
     * @var string
     */
    public $product_label;
    /**
     * Product description
     * @var string
     */
    public $product_desc;
    /**
     * Product use lot
     * @var string
     */
    public $product_tobatch;
    /**
     * Product barcode
     * @var string
     */
    public $product_barcode;
    public $localtax1_tx;
    // Local tax 1
    public $localtax2_tx;
    // Local tax 2
    public $localtax1_type;
    // Local tax 1 type
    public $localtax2_type;
    // Local tax 2 type
    public $total_localtax1;
    // Line total local tax 1
    public $total_localtax2;
    // Line total local tax 2
    public $date_start;
    public $date_end;
    public $skip_update_total;
    // Skip update price total for special lines
    // Multicurrency
    public $fk_multicurrency;
    public $multicurrency_code;
    public $multicurrency_subprice;
    public $multicurrency_total_ht;
    public $multicurrency_total_tva;
    public $multicurrency_total_ttc;
    /**
     * 	Class line Contructor
     *
     * 	@param	DoliDB	$db	Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Retrieve the propal line object
     *
     *	@param	int		$rowid		Propal line id
     *	@return	int					<0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     *  Insert object line propal in database
     *
     *	@param		int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return		int						<0 if KO, >0 if OK
     */
    public function insert($notrigger = 0)
    {
    }
    /**
     * 	Delete line in database
     *
     *  @param	User	$user		Object user
     *	@param 	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return	 int  				<0 if ko, >0 if ok
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Update propal line object into DB
     *
     *	@param 	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return	int					<0 if ko, >0 if ok
     */
    public function update($notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update DB line fields total_xxx
     *	Used by migration
     *
     *	@return		int		<0 if KO, >0 if OK
     */
    public function update_total()
    {
    }
}