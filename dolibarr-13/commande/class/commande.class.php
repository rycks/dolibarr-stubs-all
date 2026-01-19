<?php

/**
 *  Class to manage customers orders
 */
class Commande extends \CommonOrder
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'commande';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'commande';
    /**
     * @var string Name of subtable line
     */
    public $table_element_line = 'commandedet';
    /**
     * @var string Name of class line
     */
    public $class_element_line = 'OrderLine';
    /**
     * @var string Field name with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_commande';
    /**
     * @var string String with name of icon for commande class. Here is object_order.png
     */
    public $picto = 'order';
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
     * @var int Thirparty ID
     */
    public $socid;
    /**
     * @var string Thirparty ref of order
     */
    public $ref_client;
    /**
     * @var string Internal ref for order
     * @deprecated
     */
    public $ref_int;
    /**
     * @var int Contact ID
     */
    public $contactid;
    /**
     * Status of the order
     * @var int
     */
    public $statut;
    /**
     * @var int Status Billed or not
     */
    public $billed;
    /**
     * @var int Draft Status of the order
     */
    public $brouillon;
    public $cond_reglement_code;
    /**
     * @var int bank account ID
     */
    public $fk_account;
    /**
     * @var string It holds the label of the payment mode. Use it in case translation cannot be found.
     */
    public $mode_reglement;
    /**
     * @var int Payment mode id
     */
    public $mode_reglement_id;
    /**
     * @var string Payment mode code
     */
    public $mode_reglement_code;
    /**
     * Availability delivery time id
     * @var int
     */
    public $availability_id;
    /**
     * Availability delivery time code
     * @var string
     */
    public $availability_code;
    /**
     * Label of availability delivery time. Use it in case translation cannot be found.
     * @var string
     */
    public $availability;
    public $demand_reason_id;
    // Source reason. Why we receive order (after a phone campaign, ...)
    public $demand_reason_code;
    /**
     * @var int Date of order
     */
    public $date;
    /**
     * @var int Date of order
     * @deprecated
     * @see $date
     */
    public $date_commande;
    /**
     * @var int	Date expected for delivery
     * @deprecated
     */
    public $date_livraison;
    // deprecated; Use delivery_date instead.
    public $delivery_date;
    // Date expected of shipment (date starting shipment, not the reception that occurs some days after)
    /**
     * @var int ID
     */
    public $fk_remise_except;
    public $remise_percent;
    public $remise_absolue;
    public $info_bits;
    public $rang;
    public $special_code;
    public $source;
    // Order mode. How we received order (by phone, by email, ...)
    public $extraparams = array();
    public $linked_objects = array();
    /**
     * @var int User author ID
     */
    public $user_author_id;
    /**
     * @var int User validator ID
     */
    public $user_valid;
    /**
     * @var OrderLine[]
     */
    public $lines = array();
    // Multicurrency
    /**
     * @var int Currency ID
     */
    public $fk_multicurrency;
    public $multicurrency_code;
    public $multicurrency_tx;
    public $multicurrency_total_ht;
    public $multicurrency_total_tva;
    public $multicurrency_total_ttc;
    /**
     * @var Commande clone of order object
     */
    public $oldcopy;
    //! key of module source when order generated from a dedicated module ('cashdesk', 'takepos', ...)
    public $module_source;
    //! key of pos source ('0', '1', ...)
    public $pos_source;
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
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => 1, 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 20, 'index' => 1),
        'ref' => array('type' => 'varchar(30)', 'label' => 'Ref', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'showoncombobox' => 1, 'position' => 25),
        'ref_ext' => array('type' => 'varchar(255)', 'label' => 'RefExt', 'enabled' => 1, 'visible' => 0, 'position' => 26),
        'ref_int' => array('type' => 'varchar(255)', 'label' => 'RefInt', 'enabled' => 1, 'visible' => 0, 'position' => 27),
        // deprecated
        'ref_client' => array('type' => 'varchar(255)', 'label' => 'RefCustomer', 'enabled' => 1, 'visible' => -1, 'position' => 28),
        'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 20),
        'fk_projet' => array('type' => 'integer:Project:projet/class/project.class.php:1:fk_statut=1', 'label' => 'Project', 'enabled' => 1, 'visible' => -1, 'position' => 25),
        'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 55),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 56),
        'date_valid' => array('type' => 'datetime', 'label' => 'DateValidation', 'enabled' => 1, 'visible' => -1, 'position' => 60),
        'date_cloture' => array('type' => 'datetime', 'label' => 'DateClosing', 'enabled' => 1, 'visible' => -1, 'position' => 65),
        'date_commande' => array('type' => 'date', 'label' => 'Date', 'enabled' => 1, 'visible' => -1, 'position' => 70),
        'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -1, 'position' => 75),
        'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 80),
        'fk_user_valid' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserValidation', 'enabled' => 1, 'visible' => -1, 'position' => 85),
        'fk_user_cloture' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserClosing', 'enabled' => 1, 'visible' => -1, 'position' => 90),
        'source' => array('type' => 'smallint(6)', 'label' => 'Source', 'enabled' => 1, 'visible' => -1, 'position' => 95),
        //'amount_ht' =>array('type'=>'double(24,8)', 'label'=>'AmountHT', 'enabled'=>1, 'visible'=>-1, 'position'=>105),
        'remise_percent' => array('type' => 'double', 'label' => 'RelativeDiscount', 'enabled' => 1, 'visible' => -1, 'position' => 110),
        'remise_absolue' => array('type' => 'double', 'label' => 'CustomerRelativeDiscount', 'enabled' => 1, 'visible' => -1, 'position' => 115),
        //'remise' =>array('type'=>'double', 'label'=>'Remise', 'enabled'=>1, 'visible'=>-1, 'position'=>120),
        'tva' => array('type' => 'double(24,8)', 'label' => 'VAT', 'enabled' => 1, 'visible' => -1, 'position' => 125, 'isameasure' => 1),
        'localtax1' => array('type' => 'double(24,8)', 'label' => 'LocalTax1', 'enabled' => 1, 'visible' => -1, 'position' => 130, 'isameasure' => 1),
        'localtax2' => array('type' => 'double(24,8)', 'label' => 'LocalTax2', 'enabled' => 1, 'visible' => -1, 'position' => 135, 'isameasure' => 1),
        'total_ht' => array('type' => 'double(24,8)', 'label' => 'TotalHT', 'enabled' => 1, 'visible' => -1, 'position' => 140, 'isameasure' => 1),
        'total_ttc' => array('type' => 'double(24,8)', 'label' => 'TotalTTC', 'enabled' => 1, 'visible' => -1, 'position' => 145, 'isameasure' => 1),
        'note_private' => array('type' => 'text', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 150),
        'note_public' => array('type' => 'text', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 155),
        'model_pdf' => array('type' => 'varchar(255)', 'label' => 'PDFTemplate', 'enabled' => 1, 'visible' => 0, 'position' => 160),
        //'facture' =>array('type'=>'tinyint(4)', 'label'=>'ParentInvoice', 'enabled'=>1, 'visible'=>-1, 'position'=>165),
        'fk_account' => array('type' => 'integer', 'label' => 'BankAccount', 'enabled' => 1, 'visible' => -1, 'position' => 170),
        'fk_currency' => array('type' => 'varchar(3)', 'label' => 'MulticurrencyID', 'enabled' => 1, 'visible' => -1, 'position' => 175),
        'fk_cond_reglement' => array('type' => 'integer', 'label' => 'PaymentTerm', 'enabled' => 1, 'visible' => -1, 'position' => 180),
        'fk_mode_reglement' => array('type' => 'integer', 'label' => 'PaymentMode', 'enabled' => 1, 'visible' => -1, 'position' => 185),
        'date_livraison' => array('type' => 'date', 'label' => 'DateDeliveryPlanned', 'enabled' => 1, 'visible' => -1, 'position' => 190),
        'fk_shipping_method' => array('type' => 'integer', 'label' => 'ShippingMethod', 'enabled' => 1, 'visible' => -1, 'position' => 195),
        'fk_warehouse' => array('type' => 'integer:Entrepot:product/stock/class/entrepot.class.php', 'label' => 'Fk warehouse', 'enabled' => 1, 'visible' => -1, 'position' => 200),
        'fk_availability' => array('type' => 'integer', 'label' => 'Availability', 'enabled' => 1, 'visible' => -1, 'position' => 205),
        'fk_input_reason' => array('type' => 'integer', 'label' => 'InputReason', 'enabled' => 1, 'visible' => -1, 'position' => 210),
        //'fk_delivery_address' =>array('type'=>'integer', 'label'=>'DeliveryAddress', 'enabled'=>1, 'visible'=>-1, 'position'=>215),
        'extraparams' => array('type' => 'varchar(255)', 'label' => 'Extraparams', 'enabled' => 1, 'visible' => -1, 'position' => 225),
        'fk_incoterms' => array('type' => 'integer', 'label' => 'IncotermCode', 'enabled' => '$conf->incoterm->enabled', 'visible' => -1, 'position' => 230),
        'location_incoterms' => array('type' => 'varchar(255)', 'label' => 'IncotermLabel', 'enabled' => '$conf->incoterm->enabled', 'visible' => -1, 'position' => 235),
        'fk_multicurrency' => array('type' => 'integer', 'label' => 'Fk multicurrency', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 240),
        'multicurrency_code' => array('type' => 'varchar(255)', 'label' => 'MulticurrencyCurrency', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 245),
        'multicurrency_tx' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyRate', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 250, 'isameasure' => 1),
        'multicurrency_total_ht' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyAmountHT', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 255, 'isameasure' => 1),
        'multicurrency_total_tva' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyAmountVAT', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 260, 'isameasure' => 1),
        'multicurrency_total_ttc' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyAmountTTC', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 265, 'isameasure' => 1),
        'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'LastMainDoc', 'enabled' => 1, 'visible' => -1, 'position' => 270),
        'module_source' => array('type' => 'varchar(32)', 'label' => 'POSModule', 'enabled' => 1, 'visible' => -1, 'position' => 275),
        'pos_source' => array('type' => 'varchar(32)', 'label' => 'POSTerminal', 'enabled' => 1, 'visible' => -1, 'position' => 280),
        'fk_statut' => array('type' => 'smallint(6)', 'label' => 'Status', 'enabled' => 1, 'visible' => -1, 'position' => 500),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 900),
    );
    // END MODULEBUILDER PROPERTIES
    /**
     * ERR Not enough stock
     */
    const STOCK_NOT_ENOUGH_FOR_ORDER = -3;
    /**
     * Canceled status
     */
    const STATUS_CANCELED = -1;
    /**
     * Draft status
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated status
     */
    const STATUS_VALIDATED = 1;
    /**
     * Shipment on process
     */
    const STATUS_SHIPMENTONPROCESS = 2;
    const STATUS_ACCEPTED = 2;
    // For backward compatibility. Use key STATUS_SHIPMENTONPROCESS instead.
    /**
     * Closed (Sent, billed or not)
     */
    const STATUS_CLOSED = 3;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Returns the reference to the following non used Order depending on the active numbering module
     *  defined into COMMANDE_ADDON
     *
     *  @param	Societe		$soc  	Object thirdparty
     *  @return string      		Order free reference
     */
    public function getNextNumRef($soc)
    {
    }
    /**
     *	Validate order
     *
     *	@param		User	$user     		User making status change
     *	@param		int		$idwarehouse	Id of warehouse to use for stock decrease
     *  @param		int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return  	int						<=0 if OK, 0=Nothing done, >0 if KO
     */
    public function valid($user, $idwarehouse = 0, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set draft status
     *
     *	@param	User	$user			Object user that modify
     *	@param	int		$idwarehouse	Warehouse ID to use for stock change (Used only if option STOCK_CALCULATE_ON_VALIDATE_ORDER is on)
     *	@return	int						<0 if KO, >0 if OK
     */
    public function setDraft($user, $idwarehouse = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Tag the order as validated (opened)
     *	Function used when order is reopend after being closed.
     *
     *	@param      User	$user       Object user that change status
     *	@return     int         		<0 if KO, 0 if nothing is done, >0 if OK
     */
    public function set_reopen($user)
    {
    }
    /**
     *  Close order
     *
     * 	@param      User	$user       Objet user that close
     *  @param		int		$notrigger	1=Does not execute triggers, 0=Execute triggers
     *	@return		int					<0 if KO, >0 if OK
     */
    public function cloture($user, $notrigger = 0)
    {
    }
    /**
     * 	Cancel an order
     * 	If stock is decremented on order validation, we must reincrement it
     *
     *	@param	int		$idwarehouse	Id warehouse to use for stock change.
     *	@return	int						<0 if KO, >0 if OK
     */
    public function cancel($idwarehouse = -1)
    {
    }
    /**
     *	Create order
     *	Note that this->ref can be set or empty. If empty, we will use "(PROV)"
     *
     *	@param		User	$user 		Objet user that make creation
     *	@param		int	    $notrigger	Disable all triggers
     *	@return 	int			        <0 if KO, >0 if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *	Load an object from its id and create a new one in database
     *
     *  @param	    User	$user		User making the clone
     *	@param		int		$socid		Id of thirdparty
     *	@return		int					New id of clone
     */
    public function createFromClone(\User $user, $socid = 0)
    {
    }
    /**
     *  Load an object from a proposal and create a new order into database
     *
     *  @param      Object			$object 	        Object source
     *  @param		User			$user				User making creation
     *  @return     int             					<0 if KO, 0 if nothing done, 1 if OK
     */
    public function createFromProposal($object, \User $user)
    {
    }
    /**
     *	Add an order line into database (linked to product/service or not)
     *
     *	@param      string			$desc            	Description of line
     *	@param      float			$pu_ht    	        Unit price (without tax)
     *	@param      float			$qty             	Quantite
     * 	@param    	float			$txtva           	Force Vat rate, -1 for auto (Can contain the vat_src_code too with syntax '9.9 (CODE)')
     * 	@param		float			$txlocaltax1		Local tax 1 rate (deprecated, use instead txtva with code inside)
     * 	@param		float			$txlocaltax2		Local tax 2 rate (deprecated, use instead txtva with code inside)
     *	@param      int				$fk_product      	Id of product
     *	@param      float			$remise_percent  	Percentage discount of the line
     *	@param      int				$info_bits			Bits of type of lines
     *	@param      int				$fk_remise_except	Id remise
     *	@param      string			$price_base_type	HT or TTC
     *	@param      float			$pu_ttc    		    Prix unitaire TTC
     *	@param      int				$date_start       	Start date of the line - Added by Matelli (See http://matelli.fr/showcases/patchs-dolibarr/add-dates-in-order-lines.html)
     *	@param      int				$date_end         	End date of the line - Added by Matelli (See http://matelli.fr/showcases/patchs-dolibarr/add-dates-in-order-lines.html)
     *	@param      int				$type				Type of line (0=product, 1=service). Not used if fk_product is defined, the type of product is used.
     *	@param      int				$rang             	Position of line
     *	@param		int				$special_code		Special code (also used by externals modules!)
     *	@param		int				$fk_parent_line		Parent line
     *  @param		int				$fk_fournprice		Id supplier price
     *  @param		int				$pa_ht				Buying price (without tax)
     *  @param		string			$label				Label
     *  @param		array			$array_options		extrafields array. Example array('options_codeforfield1'=>'valueforfield1', 'options_codeforfield2'=>'valueforfield2', ...)
     * 	@param 		string			$fk_unit 			Code of the unit to use. Null to use the default one
     * 	@param		string		    $origin				Depend on global conf MAIN_CREATEFROM_KEEP_LINE_ORIGIN_INFORMATION can be 'orderdet', 'propaldet'..., else 'order','propal,'....
     *  @param		int			    $origin_id			Depend on global conf MAIN_CREATEFROM_KEEP_LINE_ORIGIN_INFORMATION can be Id of origin object (aka line id), else object id
     * 	@param		double			$pu_ht_devise		Unit price in currency
     * 	@param		string			$ref_ext		    line external reference
     *	@return     int             					>0 if OK, <0 if KO
     *
     *	@see        add_product()
     *
     *	Les parametres sont deja cense etre juste et avec valeurs finales a l'appel
     *	de cette methode. Aussi, pour le taux tva, il doit deja avoir ete defini
     *	par l'appelant par la methode get_default_tva(societe_vendeuse,societe_acheteuse,produit)
     *	et le desc doit deja avoir la bonne valeur (a l'appelant de gerer le multilangue)
     */
    public function addline($desc, $pu_ht, $qty, $txtva, $txlocaltax1 = 0, $txlocaltax2 = 0, $fk_product = 0, $remise_percent = 0, $info_bits = 0, $fk_remise_except = 0, $price_base_type = 'HT', $pu_ttc = 0, $date_start = '', $date_end = '', $type = 0, $rang = -1, $special_code = 0, $fk_parent_line = 0, $fk_fournprice = \null, $pa_ht = 0, $label = '', $array_options = 0, $fk_unit = \null, $origin = '', $origin_id = 0, $pu_ht_devise = 0, $ref_ext = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Add line into array
     *	$this->client must be loaded
     *
     *	@param  int     $idproduct          Product Id
     *	@param  float   $qty                Quantity
     *	@param  float   $remise_percent     Product discount relative
     * 	@param  int     $date_start         Start date of the line
     * 	@param  int     $date_end           End date of the line
     * 	@return void
     *
     *	TODO	Remplacer les appels a cette fonction par generation objet Ligne
     */
    public function add_product($idproduct, $qty, $remise_percent = 0.0, $date_start = '', $date_end = '')
    {
    }
    /**
     *	Get object from database. Get also lines.
     *
     *	@param      int			$id       		Id of object to load
     * 	@param		string		$ref			Ref of object
     * 	@param		string		$ref_ext		External reference of object
     * 	@param		string		$notused		Internal reference of other object
     *	@return     int         				>0 if OK, <0 if KO, 0 if not found
     */
    public function fetch($id, $ref = '', $ref_ext = '', $notused = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Adding line of fixed discount in the order in DB
     *
     *	@param     int	$idremise			Id de la remise fixe
     *	@return    int          			>0 si ok, <0 si ko
     */
    public function insert_discount($idremise)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load array lines
     *
     *	@param		int		$only_product	Return only physical products, not services
     *	@param		int		$loadalsotranslation	Return translation for products
     *	@return		int						<0 if KO, >0 if OK
     */
    public function fetch_lines($only_product = 0, $loadalsotranslation = 0)
    {
    }
    /**
     *	Return number of line with type product.
     *
     *	@return		int		<0 if KO, Nbr of product lines if OK
     */
    public function getNbOfProductsLines()
    {
    }
    /**
     *	Return number of line with type service.
     *
     *	@return		int		<0 if KO, Nbr of service lines if OK
     */
    public function getNbOfServicesLines()
    {
    }
    /**
     *	Count number of shipments for this order
     *
     * 	@return     int                			<0 if KO, Nb of shipment found if OK
     */
    public function getNbOfShipments()
    {
    }
    /**
     *	Load array this->expeditions of lines of shipments with nb of products sent for each order line
     *  Note: For a dedicated shipment, the fetch_lines can be used to load the qty_asked and qty_shipped. This function is use to return qty_shipped cumulated for the order
     *
     *	@param      int		$filtre_statut      Filter on shipment status
     * 	@return     int                			<0 if KO, Nb of lines found if OK
     */
    public function loadExpeditions($filtre_statut = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Returns a array with expeditions lines number
     *
     * @return	int		Nb of shipments
     *
     * TODO deprecate, move to Shipping class
     */
    public function nb_expedition()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return a array with the pending stock by product
     *
     *	@param      int		$filtre_statut      Filtre sur statut
     *	@return     int                 		0 si OK, <0 si KO
     *
     *	TODO		FONCTION NON FINIE A FINIR
     */
    public function stock_array($filtre_statut = self::STATUS_CANCELED)
    {
    }
    /**
     *  Delete an order line
     *
     *	@param      User	$user		User object
     *  @param      int		$lineid		Id of line to delete
     *  @return     int        		 	>0 if OK, 0 if nothing to do, <0 if KO
     */
    public function deleteline($user = \null, $lineid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Applique une remise relative
     *
     * 	@param     	User		$user		User qui positionne la remise
     * 	@param     	float		$remise		Discount (percent)
     * 	@param     	int			$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return		int 					<0 if KO, >0 if OK
     */
    public function set_remise($user, $remise, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 		Applique une remise absolue
     *
     * 		@param     	User		$user 		User qui positionne la remise
     * 		@param     	float		$remise		Discount
     * 		@param     	int			$notrigger	1=Does not execute triggers, 0= execute triggers
     *		@return		int 					<0 if KO, >0 if OK
     */
    public function set_remise_absolue($user, $remise, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set the order date
     *
     *	@param      User	$user       Object user making change
     *	@param      int		$date		Date
     * 	@param     	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return     int         		<0 if KO, >0 if OK
     */
    public function set_date($user, $date, $notrigger = 0)
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
     *	Set the planned delivery date
     *
     *	@param      User	$user        		Objet utilisateur qui modifie
     *	@param      int		$delivery_date     Delivery date
     *  @param     	int		$notrigger			1=Does not execute triggers, 0= execute triggers
     *	@return     int         				<0 si ko, >0 si ok
     */
    public function setDeliveryDate($user, $delivery_date, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of orders (eventuelly filtered on a user) into an array
     *
     *  @param		int		$shortlist		0=Return array[id]=ref, 1=Return array[](id=>id,ref=>ref,name=>name)
     *  @param      int		$draft      	0=not draft, 1=draft
     *  @param      User	$excluser      	Objet user to exclude
     *  @param    	int		$socid			Id third pary
     *  @param    	int		$limit			For pagination
     *  @param    	int		$offset			For pagination
     *  @param    	string	$sortfield		Sort criteria
     *  @param    	string	$sortorder		Sort order
     *  @return     int             		-1 if KO, array with result if OK
     */
    public function liste_array($shortlist = 0, $draft = 0, $excluser = '', $socid = 0, $limit = 0, $offset = 0, $sortfield = 'c.date_commande', $sortorder = 'DESC')
    {
    }
    /**
     *	Update delivery delay
     *
     *	@param      int		$availability_id	Id du nouveau mode
     *  @param     	int		$notrigger			1=Does not execute triggers, 0= execute triggers
     *	@return     int         				>0 if OK, <0 if KO
     */
    public function availability($availability_id, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update order demand_reason
     *
     *  @param      int		$demand_reason_id	Id of new demand
     *  @param     	int		$notrigger			1=Does not execute triggers, 0= execute triggers
     *  @return     int        			 		>0 if ok, <0 if ko
     */
    public function demand_reason($demand_reason_id, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set customer ref
     *
     *	@param      User	$user           User that make change
     *	@param      string	$ref_client     Customer ref
     *  @param     	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return     int             		<0 if KO, >0 if OK
     */
    public function set_ref_client($user, $ref_client, $notrigger = 0)
    {
    }
    /**
     * Classify the order as invoiced
     *
     * @param	User    $user       Object user making the change
     * @param	int		$notrigger	1=Does not execute triggers, 0=execute triggers
     * @return	int                 <0 if KO, 0 if already billed,  >0 if OK
     */
    public function classifyBilled(\User $user, $notrigger = 0)
    {
    }
    /**
     * Classify the order as not invoiced
     *
     * @return     int     <0 if ko, >0 if ok
     */
    public function classifyUnBilled()
    {
    }
    /**
     *  Update a line in database
     *
     *  @param    	int				$rowid            	Id of line to update
     *  @param    	string			$desc             	Description of line
     *  @param    	float			$pu               	Unit price
     *  @param    	float			$qty              	Quantity
     *  @param    	float			$remise_percent   	Percent of discount
     *  @param    	float			$txtva           	Taux TVA
     * 	@param		float			$txlocaltax1		Local tax 1 rate
     *  @param		float			$txlocaltax2		Local tax 2 rate
     *  @param    	string			$price_base_type	HT or TTC
     *  @param    	int				$info_bits        	Miscellaneous informations on line
     *  @param    	int				$date_start        	Start date of the line
     *  @param    	int				$date_end          	End date of the line
     * 	@param		int				$type				Type of line (0=product, 1=service)
     * 	@param		int				$fk_parent_line		Id of parent line (0 in most cases, used by modules adding sublevels into lines).
     * 	@param		int				$skip_update_total	Keep fields total_xxx to 0 (used for special lines by some modules)
     *  @param		int				$fk_fournprice		Id of origin supplier price
     *  @param		int				$pa_ht				Price (without tax) of product when it was bought
     *  @param		string			$label				Label
     *  @param		int				$special_code		Special code (also used by externals modules!)
     *  @param		array			$array_options		extrafields array
     * 	@param 		string			$fk_unit 			Code of the unit to use. Null to use the default one
     *  @param		double			$pu_ht_devise		Amount in currency
     * 	@param		int				$notrigger			disable line update trigger
     * 	@param		string			$ref_ext			external reference
     *  @return   	int              					< 0 if KO, > 0 if OK
     */
    public function updateline($rowid, $desc, $pu, $qty, $remise_percent, $txtva, $txlocaltax1 = 0.0, $txlocaltax2 = 0.0, $price_base_type = 'HT', $info_bits = 0, $date_start = '', $date_end = '', $type = 0, $fk_parent_line = 0, $skip_update_total = 0, $fk_fournprice = \null, $pa_ht = 0, $label = '', $special_code = 0, $array_options = 0, $fk_unit = \null, $pu_ht_devise = 0, $notrigger = 0, $ref_ext = '')
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
    /**
     *	Delete the customer order
     *
     *	@param	User	$user		User object
     *	@param	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     * 	@return	int					<=0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *	@param		User	$user   Object user
     *	@return WorkboardResponse|int <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user)
    {
    }
    /**
     *	Return source label of order
     *
     *	@return     string      Label
     */
    public function getLabelSource()
    {
    }
    /**
     *	Return status label of Order
     *
     *	@param      int		$mode       0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
     *	@return     string      		Label of status
     */
    public function getLibStatut($mode)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return label of status
     *
     *	@param		int		$status      	  Id status
     *  @param      int		$billed    		  If invoiced
     *	@param      int		$mode        	  0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
     *  @param      int     $donotshowbilled  Do not show billed status after order status
     *  @return     string					  Label of status
     */
    public function LibStatut($status, $billed, $mode, $donotshowbilled = 0)
    {
    }
    /**
     *	Return clicable link of object (with eventually picto)
     *
     *	@param      int			$withpicto                Add picto into link
     *	@param      string	    $option                   Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *	@param      int			$max          	          Max length to show
     *	@param      int			$short			          ???
     *  @param	    int   	    $notooltip		          1=Disable tooltip
     *  @param      int         $save_lastsearch_value    -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param		int			$addlinktonotes			  Add link to notes
     *	@return     string          			          String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $max = 0, $short = 0, $notooltip = 0, $save_lastsearch_value = -1, $addlinktonotes = 0)
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
     *	Charge indicateurs this->nb de tableau de bord
     *
     *	@return     int         <0 si ko, >0 si ok
     */
    public function load_state_board()
    {
    }
    /**
     * 	Create an array of order lines
     *
     * 	@return int		>0 if OK, <0 if KO
     */
    public function getLinesArray()
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *  @param	    string		$modele			Force template to use ('' to not force)
     *  @param		Translate	$outputlangs	objet lang a utiliser pour traduction
     *  @param      int			$hidedetails    Hide details of lines
     *  @param      int			$hidedesc       Hide description
     *  @param      int			$hideref        Hide ref
     *  @param      null|array  $moreparams     Array to provide more information
     *  @return     int         				0 if KO, 1 if OK
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
    /**
     * Is the customer order delayed?
     *
     * @return bool     true if late, false if not
     */
    public function hasDelay()
    {
    }
    /**
     * Show the customer delayed info
     *
     * @return string       Show delayed information
     */
    public function showDelay()
    {
    }
}
/**
 *  Class to manage order lines
 */
class OrderLine extends \CommonOrderLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'commandedet';
    public $table_element = 'commandedet';
    public $oldline;
    /**
     * Id of parent order
     * @var int
     */
    public $fk_commande;
    /**
     * Id of parent order
     * @var int
     * @deprecated Use fk_commande
     * @see $fk_commande
     */
    public $commande_id;
    public $fk_parent_line;
    /**
     * @var int Id of invoice
     */
    public $fk_facture;
    /**
     * @var string External ref
     */
    public $ref_ext;
    public $fk_remise_except;
    /**
     * @var int line rank
     */
    public $rang = 0;
    public $fk_fournprice;
    /**
     * Buy price without taxes
     * @var float
     */
    public $pa_ht;
    public $marge_tx;
    public $marque_tx;
    /**
     * @deprecated
     * @see $remise_percent, $fk_remise_except
     */
    public $remise;
    // Start and end date of the line
    public $date_start;
    public $date_end;
    public $skip_update_total;
    // Skip update price total for special lines
    /**
     *      Constructor
     *
     *      @param     DoliDB	$db      handler d'acces base de donnee
     */
    public function __construct($db)
    {
    }
    /**
     *  Load line order
     *
     *  @param  int		$rowid          Id line order
     *  @return	int						<0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     * 	Delete line in database
     *
     *	@param      User	$user        	User that modify
     *  @param      int		$notrigger	    0=launch triggers after, 1=disable triggers
     *	@return	 int  <0 si ko, >0 si ok
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Insert line into database
     *
     *	@param      User	$user        	User that modify
     *	@param      int		$notrigger		1 = disable triggers
     *	@return		int						<0 if KO, >0 if OK
     */
    public function insert($user = \null, $notrigger = 0)
    {
    }
    /**
     *	Update the line object into db
     *
     *	@param      User	$user        	User that modify
     *	@param      int		$notrigger		1 = disable triggers
     *	@return		int		<0 si ko, >0 si ok
     */
    public function update(\User $user, $notrigger = 0)
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