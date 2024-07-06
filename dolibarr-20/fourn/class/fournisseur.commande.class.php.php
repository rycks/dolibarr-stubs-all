<?php

/**
 *	Class to manage predefined suppliers products
 */
class CommandeFournisseur extends \CommonOrder
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'order_supplier';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'commande_fournisseur';
    /**
     * @var string    Name of subtable line
     */
    public $table_element_line = 'commande_fournisseurdet';
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_commande';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'supplier_order';
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
     * @var int Purchase Order ID
     */
    public $id;
    /**
     * @var string Supplier order reference
     */
    public $ref;
    /**
     * @var string Supplier reference
     */
    public $ref_supplier;
    /**
     * @var string ref supplier
     * @deprecated
     * @see $ref_supplier
     */
    public $ref_fourn;
    /**
     * @var int
     */
    public $statut;
    // 0=Draft -> 1=Validated -> 2=Approved -> 3=Ordered/Process running -> 4=Received partially -> 5=Received totally -> (reopen) 4=Received partially
    //                                                                                          -> 7=Canceled/Never received -> (reopen) 3=Process running
    //									                            -> 6=Canceled -> (reopen) 2=Approved
    //  		                                      -> 9=Refused  -> (reopen) 1=Validated
    //  Note: billed or not is on another field "billed"
    public $billed;
    /**
     * @var int Company ID
     */
    public $socid;
    /**
     * @var int Supplier ID
     */
    public $fourn_id;
    /**
     * @var int Date
     */
    public $date;
    /**
     * @var int Date of the purchase order creation
     */
    public $date_creation;
    /**
     * @var int Date of the purchase order validation
     */
    public $date_valid;
    /**
     * @var int Date of the purchase order approval
     */
    public $date_approve;
    /**
     * @var int Date of the purchase order second approval
     * Used when SUPPLIER_ORDER_3_STEPS_TO_BE_APPROVED is set
     */
    public $date_approve2;
    /**
     * @var int Date of the purchase order ordering
     */
    public $date_commande;
    //For backward compatibility
    public $remise_percent;
    public $methode_commande_id;
    public $methode_commande;
    /**
     *  @var int Expected Delivery Date
     */
    public $delivery_date;
    /**
     *  @var float Total value, excluding taxes (HT = "Hors Taxe" in French)
     */
    public $total_ht;
    /**
     *  @var float Total VAT
     */
    public $total_tva;
    /**
     *  @var float Total Local tax 1
     */
    public $total_localtax1;
    /**
     *  @var float Total Local tax 2
     */
    public $total_localtax2;
    /**
     *  @var float Total value, including taxes (TTC = "Toutes Taxes Comprises" in French)
     */
    public $total_ttc;
    public $source;
    /**
     * @var int ID
     */
    public $fk_project;
    /**
     * @var int Payment conditions ID
     */
    public $cond_reglement_id;
    /**
     * @var string Payment conditions code
     */
    public $cond_reglement_code;
    /**
     * @var string Payment conditions label
     */
    public $cond_reglement_label;
    /**
     * @var string Payment conditions label on documents
     */
    public $cond_reglement_doc;
    /**
     * @var int Account ID
     */
    public $fk_account;
    /**
     * @var int Payment choice ID
     */
    public $mode_reglement_id;
    /**
     * @var string Payment choice code
     */
    public $mode_reglement_code;
    /**
     * @var string Payment choice label
     */
    public $mode_reglement;
    /**
     * @var int User ID of the purchase order author
     */
    public $user_author_id;
    /**
     * @var int User ID of the purchase order approver
     */
    public $user_approve_id;
    /**
     * @var int User ID of the purchase order second approver
     * Used when SUPPLIER_ORDER_3_STEPS_TO_BE_APPROVED is set
     */
    public $user_approve_id2;
    public $refuse_note;
    public $extraparams = array();
    /**
     * @var CommandeFournisseurLigne[]
     */
    public $lines = array();
    /**
     * @var CommandeFournisseurLigne
     */
    public $line;
    // Add for supplier_proposal
    public $origin;
    public $origin_id;
    public $linked_objects = array();
    /**
     * @var int Date of the purchase order payment deadline
     */
    public $date_lim_reglement;
    public $receptions = array();
    // Multicurrency
    /**
     * @var int ID
     */
    public $fk_multicurrency;
    /**
     * @var string
     */
    public $multicurrency_code;
    /**
     * @var float Rate
     */
    public $multicurrency_tx;
    /**
     * @var float Total value in the other currency, excluding taxes (HT = "Hors Taxes" in French)
     */
    public $multicurrency_total_ht;
    /**
     * @var float Total VAT in the other currency (TVA = "Taxe sur la Valeur Ajoutée" in French)
     */
    public $multicurrency_total_tva;
    /**
     * @var float Total value in the other currency, including taxes (TTC = "Toutes Taxes Comprises in French)
     */
    public $multicurrency_total_ttc;
    /**
     *  'type' field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]', 'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter[:Sortfield]]]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'text:none', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalString("MY_SETUP_PARAM")' or 'isModEnabled("multicurrency")' ...)
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 or 2 if field can be used for measure. Field type must be summable like integer or double(24,8). Use 1 in most cases, or 2 if you don't want to see the column total into list (for example for percentage)
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'css'=>'minwidth300 maxwidth500 widthcentpercentminusx', 'cssview'=>'wordbreak', 'csslist'=>'tdoverflowmax200'
     *  'help' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set a list of values if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel"). Note that type can be 'integer' or 'varchar'
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *	'validate' is 1 if need to validate with $this->validateField()
     *  'copytoclipboard' is 1 or 2 to allow to add a picto to copy value into clipboard (1=picto after label, 2=picto after value)
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'position' => 10), 'ref' => array('type' => 'varchar(255)', 'label' => 'Ref', 'enabled' => 1, 'visible' => 1, 'showoncombobox' => 1, 'position' => 25, 'searchall' => 1), 'ref_ext' => array('type' => 'varchar(255)', 'label' => 'Ref ext', 'enabled' => 1, 'visible' => 0, 'position' => 35), 'ref_supplier' => array('type' => 'varchar(255)', 'label' => 'RefOrderSupplierShort', 'enabled' => 1, 'visible' => 1, 'position' => 40, 'searchall' => 1), 'fk_projet' => array('type' => 'integer:Project:projet/class/project.class.php:1:(fk_statut:=:1)', 'label' => 'Project', 'enabled' => "isModEnabled('project')", 'visible' => -1, 'position' => 45), 'date_valid' => array('type' => 'datetime', 'label' => 'DateValidation', 'enabled' => 1, 'visible' => -1, 'position' => 710), 'date_approve' => array('type' => 'datetime', 'label' => 'DateApprove', 'enabled' => 1, 'visible' => -1, 'position' => 720), 'date_approve2' => array('type' => 'datetime', 'label' => 'DateApprove2', 'enabled' => 1, 'visible' => 3, 'position' => 725), 'date_commande' => array('type' => 'date', 'label' => 'OrderDateShort', 'enabled' => 1, 'visible' => 1, 'position' => 70), 'date_livraison' => array('type' => 'datetime', 'label' => 'DeliveryDate', 'enabled' => 'empty($conf->global->ORDER_DISABLE_DELIVERY_DATE)', 'visible' => 1, 'position' => 74), 'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => 3, 'position' => 41), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => 3, 'notnull' => -1, 'position' => 80), 'fk_user_valid' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserValidation', 'enabled' => 1, 'visible' => 3, 'position' => 711), 'fk_user_approve' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserApproval', 'enabled' => 1, 'visible' => 3, 'position' => 721), 'fk_user_approve2' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserApproval2', 'enabled' => 1, 'visible' => 3, 'position' => 726), 'source' => array('type' => 'smallint(6)', 'label' => 'Source', 'enabled' => 1, 'visible' => 3, 'notnull' => 1, 'position' => 100), 'billed' => array('type' => 'smallint(6)', 'label' => 'Billed', 'enabled' => 1, 'visible' => 1, 'position' => 710), 'total_ht' => array('type' => 'double(24,8)', 'label' => 'AmountHT', 'enabled' => 1, 'visible' => 1, 'position' => 130, 'isameasure' => 1), 'total_tva' => array('type' => 'double(24,8)', 'label' => 'AmountVAT', 'enabled' => 1, 'visible' => 1, 'position' => 135, 'isameasure' => 1), 'localtax1' => array('type' => 'double(24,8)', 'label' => 'LT1', 'enabled' => 1, 'visible' => 3, 'position' => 140, 'isameasure' => 1), 'localtax2' => array('type' => 'double(24,8)', 'label' => 'LT2', 'enabled' => 1, 'visible' => 3, 'position' => 145, 'isameasure' => 1), 'total_ttc' => array('type' => 'double(24,8)', 'label' => 'AmountTTC', 'enabled' => 1, 'visible' => -1, 'position' => 150, 'isameasure' => 1), 'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 750, 'searchall' => 1), 'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 760, 'searchall' => 1), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'ModelPDF', 'enabled' => 1, 'visible' => 0, 'position' => 165), 'fk_input_method' => array('type' => 'integer', 'label' => 'OrderMode', 'enabled' => 1, 'visible' => 3, 'position' => 170), 'fk_cond_reglement' => array('type' => 'integer', 'label' => 'PaymentTerm', 'enabled' => 1, 'visible' => 3, 'position' => 175), 'fk_mode_reglement' => array('type' => 'integer', 'label' => 'PaymentMode', 'enabled' => 1, 'visible' => 3, 'position' => 180), 'extraparams' => array('type' => 'varchar(255)', 'label' => 'Extraparams', 'enabled' => 1, 'visible' => 0, 'position' => 190), 'fk_account' => array('type' => 'integer', 'label' => 'BankAccount', 'enabled' => 'isModEnabled("bank")', 'visible' => 3, 'position' => 200), 'fk_incoterms' => array('type' => 'integer', 'label' => 'IncotermCode', 'enabled' => 1, 'visible' => 3, 'position' => 205), 'location_incoterms' => array('type' => 'varchar(255)', 'label' => 'IncotermLocation', 'enabled' => 1, 'visible' => 3, 'position' => 210), 'fk_multicurrency' => array('type' => 'integer', 'label' => 'Fk multicurrency', 'enabled' => 1, 'visible' => 0, 'position' => 215), 'multicurrency_code' => array('type' => 'varchar(255)', 'label' => 'Currency', 'enabled' => 'isModEnabled("multicurrency")', 'visible' => -1, 'position' => 220), 'multicurrency_tx' => array('type' => 'double(24,8)', 'label' => 'CurrencyRate', 'enabled' => 'isModEnabled("multicurrency")', 'visible' => -1, 'position' => 225), 'multicurrency_total_ht' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyAmountHT', 'enabled' => 'isModEnabled("multicurrency")', 'visible' => -1, 'position' => 230), 'multicurrency_total_tva' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyAmountVAT', 'enabled' => 'isModEnabled("multicurrency")', 'visible' => -1, 'position' => 235), 'multicurrency_total_ttc' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyAmountTTC', 'enabled' => 'isModEnabled("multicurrency")', 'visible' => -1, 'position' => 240), 'date_creation' => array('type' => 'datetime', 'label' => 'Date creation', 'enabled' => 1, 'visible' => -1, 'position' => 500), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'enabled' => 'isModEnabled("societe")', 'visible' => 1, 'notnull' => 1, 'position' => 50), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => '1', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'position' => 1000, 'index' => 1), 'tms' => array('type' => 'datetime', 'label' => "DateModificationShort", 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 501), 'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'LastMainDoc', 'enabled' => 1, 'visible' => 0, 'position' => 700), 'fk_statut' => array('type' => 'smallint(6)', 'label' => 'Status', 'enabled' => 1, 'visible' => 1, 'position' => 701), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => 0, 'position' => 900));
    /**
     * Draft status
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated status
     */
    const STATUS_VALIDATED = 1;
    /**
     * Accepted
     */
    const STATUS_ACCEPTED = 2;
    /**
     * Order sent, shipment on process
     */
    const STATUS_ORDERSENT = 3;
    /**
     * Received partially
     */
    const STATUS_RECEIVED_PARTIALLY = 4;
    /**
     * Received completely
     */
    const STATUS_RECEIVED_COMPLETELY = 5;
    /**
     * Order canceled
     */
    const STATUS_CANCELED = 6;
    /**
     * Order canceled/never received
     */
    const STATUS_CANCELED_AFTER_ORDER = 7;
    /**
     * Refused
     */
    const STATUS_REFUSED = 9;
    /**
     * The constant used into source field to track the order was generated by the replenishement feature
     */
    const SOURCE_ID_REPLENISHMENT = 42;
    /**
     * 	Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Get object and lines from database
     *
     * 	@param	int		$id			Id of order to load
     * 	@param	string	$ref		Ref of object
     *	@return int 		        >0 if OK, <0 if KO, 0 if not found
     */
    public function fetch($id, $ref = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Load array lines
     *
     * @param		int		$only_product	Return only physical products
     * @return		int						Return integer <0 if KO, >0 if OK
     */
    public function fetch_lines($only_product = 0)
    {
    }
    /**
     *	Validate an order
     *
     *	@param	User	$user			Validator User
     *	@param	int		$idwarehouse	Id of warehouse to use for stock decrease
     *  @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function valid($user, $idwarehouse = 0, $notrigger = 0)
    {
    }
    /**
     *  Return label of the status of object
     *
     *  @param      int		$mode			0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto
     *  @return 	string        			Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of a status
     *
     * 	@param  int		$status		Id statut
     *  @param  int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @param  int     $billed     1=Billed
     *  @return string				Label of status
     */
    public function LibStatut($status, $mode = 0, $billed = 0)
    {
    }
    /**
     * getTooltipContentArray
     *
     * @param array $params ex option, infologin
     * @since v18
     * @return array
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *	Return clicable name (with picto eventually)
     *
     *	@param		int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     *	@param		string	$option						On what the link points
     *  @param	    int   	$notooltip					1=Disable tooltip
     *  @param      int     $save_lastsearch_value		-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param		int		$addlinktonotes				Add link to show notes
     *	@return		string								Chain with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $save_lastsearch_value = -1, $addlinktonotes = 0)
    {
    }
    /**
     *  Returns the next order reference not used, based on the
     *  numbering model defined within COMMANDE_SUPPLIER_ADDON_NUMBER
     *
     *  @param	    Societe		$soc  		company object
     *  @return     string|int              free reference for the invoice. '', -1 or -2 if error.
     */
    public function getNextNumRef($soc)
    {
    }
    /**
     *	Class invoiced the supplier order
     *
     *  @param      User        $user       Object user making the change
     *	@return     int     	            Return integer <0 if KO, 0 if already billed,  >0 if OK
     */
    public function classifyBilled(\User $user)
    {
    }
    /**
     * 	Approve a supplier order
     *
     *	@param	User	$user			Object user
     *	@param	int		$idwarehouse	Id of warhouse for stock change
     *  @param	int		$secondlevel	0=Standard approval, 1=Second level approval (used when option SUPPLIER_ORDER_3_STEPS_TO_BE_APPROVED is set)
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function approve($user, $idwarehouse = 0, $secondlevel = 0)
    {
    }
    /**
     * 	Refuse an order
     *
     * 	@param		User	$user		User making action
     *	@return		int					0 if Ok, <0 if Ko
     */
    public function refuse($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Cancel an approved order.
     *	The cancellation is done after approval
     *
     * 	@param	User	$user			User making action
     *	@param	int		$idwarehouse	Id warehouse to use for stock change (not used for supplier orders).
     * 	@return	int						>0 if Ok, <0 if Ko
     */
    public function Cancel($user, $idwarehouse = -1)
    {
    }
    /**
     * 	Submit a supplier order to supplier
     *
     * 	@param		User	$user		User making change
     * 	@param		integer	$date		Date
     * 	@param		int		$methode	Method
     * 	@param		string	$comment	Comment
     * 	@return		int			        Return integer <0 if KO, >0 if OK
     */
    public function commande($user, $date, $methode, $comment = '')
    {
    }
    /**
     *  Create order with draft status
     *
     *  @param      User	$user       User making creation
     *	@param		int		$notrigger	Disable all triggers
     *  @return     int         		Return integer <0 if KO, Id of supplier order if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *	Update Supplier Order
     *
     *	@param      User	$user        	User that modify
     *	@param      int		$notrigger	    0=launch triggers after, 1=disable triggers
     *	@return     int      			   	Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Load an object from its id and create a new one in database
     *
     *  @param	    User	$user		User making the clone
     *	@param		int		$socid		Id of thirdparty
     *  @param 		int		$notrigger  Disable all triggers
     *	@return		int					New id of clone
     */
    public function createFromClone(\User $user, $socid = 0, $notrigger = 0)
    {
    }
    /**
     *	Add order line
     *
     *	@param      string		$desc            		Description
     *	@param      float		$pu_ht              	Unit price (used if $price_base_type is 'HT')
     *	@param      float		$qty             		Quantity
     *	@param      float		$txtva           		VAT Rate
     *	@param      float		$txlocaltax1        	Localtax1 tax
     *	@param      float		$txlocaltax2        	Localtax2 tax
     *	@param      int			$fk_product      		Id product
     *	@param      int			$fk_prod_fourn_price	Id supplier price
     *	@param      string		$ref_supplier			Supplier reference price
     *	@param      float		$remise_percent  		Remise
     *	@param      string		$price_base_type		HT or TTC
     *	@param		float		$pu_ttc					Unit price TTC (used if $price_base_type is 'TTC')
     *	@param		int			$type					Type of line (0=product, 1=service)
     *	@param		int			$info_bits				More information
     *	@param		int			$notrigger				Disable triggers
     *	@param		int			$date_start				Date start of service
     *	@param		int			$date_end				Date end of service
     *	@param		array		$array_options			extrafields array
     *	@param 		int|null	$fk_unit 				Code of the unit to use. Null to use the default one
     *	@param 		int|string		$pu_ht_devise			Amount in currency
     *	@param		string		$origin					'order', ...
     *	@param		int			$origin_id				Id of origin object
     *	@param		int			$rang					Rank
     *	@param		int			$special_code			Special code
     *	@return     int     	        				Return integer <=0 if KO, >0 if OK
     */
    public function addline($desc, $pu_ht, $qty, $txtva, $txlocaltax1 = 0.0, $txlocaltax2 = 0.0, $fk_product = 0, $fk_prod_fourn_price = 0, $ref_supplier = '', $remise_percent = 0.0, $price_base_type = 'HT', $pu_ttc = 0.0, $type = 0, $info_bits = 0, $notrigger = 0, $date_start = \null, $date_end = \null, $array_options = [], $fk_unit = \null, $pu_ht_devise = 0, $origin = '', $origin_id = 0, $rang = -1, $special_code = 0)
    {
    }
    /**
     * Save a receiving into the tracking table of receiving (receptiondet_batch) and add product into stock warehouse.
     *
     * @param 	User		$user					User object making change
     * @param 	int			$product				Id of product to dispatch
     * @param 	double		$qty					Qty to dispatch
     * @param 	int			$entrepot				Id of warehouse to add product
     * @param 	double		$price					Unit Price for PMP value calculation (Unit price without Tax and taking into account discount)
     * @param	string		$comment				Comment for stock movement
     * @param	int|string	$eatby					eat-by date
     * @param	int|string	$sellby					sell-by date
     * @param	string		$batch					Lot number
     * @param	int			$fk_commandefourndet	Id of supplier order line
     * @param	int			$notrigger          	1 = notrigger
     * @param	int			$fk_reception          	Id of reception to link
     * @return 	int						Return integer <0 if KO, >0 if OK
     */
    public function dispatchProduct($user, $product, $qty, $entrepot, $price = 0, $comment = '', $eatby = '', $sellby = '', $batch = '', $fk_commandefourndet = 0, $notrigger = 0, $fk_reception = 0)
    {
    }
    /**
     * 	Delete line
     *
     *	@param	int		$idline		Id of line to delete
     *	@param	int		$notrigger	1=Disable call to triggers
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function deleteLine($idline, $notrigger = 0)
    {
    }
    /**
     *  Delete an order
     *
     *	@param	User	$user		Object user
     *	@param	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     * Return array of dispatched lines waiting to be approved for this order
     *
     * @since 8.0 Return dispatched quantity (qty).
     *
     * @param	int		$status		Filter on stats (-1 = no filter, 0 = lines draft to be approved, 1 = approved lines)
     * @return	array				Array of lines
     */
    public function getDispachedLines($status = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Set a delivery in database for this supplier order
     *
     *	@param	User	$user		User that input data
     *	@param	integer	$date		Date of reception
     *	@param	string	$type		Type of receipt ('tot' = total/done, 'par' = partial, 'nev' = never, 'can' = cancel)
     *	@param	string	$comment	Comment
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function Livraison($user, $date, $type, $comment)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set delivery date
     *
     *	@param      User 	$user        		Object user that modify
     *	@param      int		$delivery_date		Delivery date
     *  @param  	int		$notrigger			1=Does not execute triggers, 0= execute triggers
     *	@return     int         				Return integer <0 if ko, >0 if ok
     *	@deprecated Use  setDeliveryDate
     */
    public function set_date_livraison($user, $delivery_date, $notrigger = 0)
    {
    }
    /**
     *	Set the planned delivery date
     *
     *	@param      User			$user        		Object user making change
     *	@param      integer  		$delivery_date     Planned delivery date
     *  @param     	int				$notrigger			1=Does not execute triggers, 0= execute triggers
     *	@return     int         						Return integer <0 if KO, >0 if OK
     */
    public function setDeliveryDate($user, $delivery_date, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set the id projet
     *
     *	@param      User			$user        		Object utilisateur qui modifie
     *	@param      int				$id_projet    	 	Delivery date
     *  @param     	int				$notrigger			1=Does not execute triggers, 0= execute triggers
     *	@return     int         						Return integer <0 si ko, >0 si ok
     */
    public function set_id_projet($user, $id_projet, $notrigger = 0)
    {
    }
    /**
     *  Update a supplier order from a sales order
     *
     *  @param  User	$user           User that create
     *  @param  int		$idc			Id of purchase order to update
     *  @param	int		$comclientid	Id of sale order to use as template
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function updateFromCommandeClient($user, $idc, $comclientid)
    {
    }
    /**
     *  Tag order with a particular status
     *
     *  @param      User	$user       Object user that change status
     *  @param      int		$status		New status
     *  @return     int         		Return integer <0 if KO, >0 if OK
     */
    public function setStatus($user, $status)
    {
    }
    /**
     *	Update line
     *
     *	@param     	int			$rowid           	ID de la ligne de facture
     *	@param     	string		$desc            	Line description
     *	@param     	int|float	$pu              	Unit price
     *	@param     	int|float	$qty             	Quantity
     *	@param     	int|float	$remise_percent  	Percent discount on line
     *	@param     	int|float	$txtva          	VAT rate
     *  @param     	int|float	$txlocaltax1	    Localtax1 tax
     *  @param     	int|float	$txlocaltax2   		Localtax2 tax
     *  @param     	string		$price_base_type 	Type of price base
     *	@param		int			$info_bits			Miscellaneous information
     *	@param		int			$type				Type of line (0=product, 1=service)
     *  @param		int			$notrigger			Disable triggers
     *  @param      integer     $date_start     	Date start of service
     *  @param      integer     $date_end       	Date end of service
     *  @param		array		$array_options		Extrafields array
     * 	@param 		int|null	$fk_unit 			Code of the unit to use. Null to use the default one
     * 	@param		int|float	$pu_ht_devise		Unit price in currency
     *  @param		string		$ref_supplier		Supplier ref
     *	@return    	int         	    			Return integer < 0 if error, > 0 if ok
     */
    public function updateline($rowid, $desc, $pu, $qty, $remise_percent, $txtva, $txlocaltax1 = 0, $txlocaltax2 = 0, $price_base_type = 'HT', $info_bits = 0, $type = 0, $notrigger = 0, $date_start = 0, $date_end = 0, $array_options = [], $fk_unit = \null, $pu_ht_devise = 0, $ref_supplier = '')
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     *	Charge les information d'ordre info dans l'objet facture
     *
     *	@param  int		$id       	Id de la facture a charger
     *	@return	void
     */
    public function info($id)
    {
    }
    /**
     *	Load the indicators this->nb for the state board
     *
     *	@return     int         Return integer <0 si ko, >0 si ok
     */
    public function loadStateBoard()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *	@param	User	$user   Object user
     *  @param	string	$mode   "opened", "awaiting" for orders awaiting reception
     *	@return WorkboardResponse|int 	Return integer <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user, $mode = 'opened')
    {
    }
    /**
     * Returns the translated input method of object (defined if $this->methode_commande_id > 0).
     * This function make a sql request to get translation. No cache yet, try to not use it inside a loop.
     *
     * @return string
     */
    public function getInputMethod()
    {
    }
    /**
     *  Create a document onto disk according to template model.
     *
     *  @param	    string		$modele			Force template to use ('' to not force)
     *  @param		Translate	$outputlangs	Object lang to use for traduction
     *  @param      int			$hidedetails    Hide details of lines
     *  @param      int			$hidedesc       Hide description
     *  @param      int			$hideref        Hide ref
     *  @param      null|array  $moreparams     Array to provide more information
     *  @return     int          				Return integer < 0 if KO, 0 = no doc generated, > 0 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
    /**
     * Return the max number delivery delay in day
     *
     * @param	Translate	$langs		Language object
     * @return 	string                  Translated string
     */
    public function getMaxDeliveryTimeDay($langs)
    {
    }
    /**
     * Returns the rights used for this class
     * @return int
     */
    public function getRights()
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param 	DoliDB 	$dbs 		Database handler, because function is static we name it $dbs not $db to avoid breaking coding test
     * @param 	int 	$origin_id 	Old thirdparty id
     * @param 	int 	$dest_id 	New thirdparty id
     * @return 	bool
     */
    public static function replaceThirdparty(\DoliDB $dbs, $origin_id, $dest_id)
    {
    }
    /**
     * Function used to replace a product id with another one.
     *
     * @param DoliDB 	$dbs 		Database handler
     * @param int 		$origin_id 	Old product id
     * @param int 		$dest_id 	New product id
     * @return bool
     */
    public static function replaceProduct(\DoliDB $dbs, $origin_id, $dest_id)
    {
    }
    /**
     * Is the supplier order delayed?
     * We suppose a purchase ordered as late if a the purchase order has been sent and the delivery date is set and before the delay.
     * If order has not been sent, we use the order date.
     *
     * @return 	bool					True if object is delayed
     */
    public function hasDelay()
    {
    }
    /**
     * Show the customer delayed info.
     * We suppose a purchase ordered as late if a the purchase order has been sent and the delivery date is set and before the delay.
     * If order has not been sent, we use the order date.
     *
     * @return string       Show delayed information
     */
    public function showDelay()
    {
    }
    /**
     * Calc status regarding to dispatched stock
     *
     * @param 		User 	$user                   User action
     * @param       int     $closeopenorder         Close if received
     * @param		string	$comment				Comment
     * @return		int		                        Return integer <0 if KO, 0 if not applicable, >0 if OK
     */
    public function calcAndSetStatusDispatch(\User $user, $closeopenorder = 1, $comment = '')
    {
    }
    /**
     *	Load array this->receptions of lines of shipments with nb of products sent for each order line
     *  Note: For a dedicated shipment, the fetch_lines can be used to load the qty_asked and qty_shipped. This function is use to return qty_shipped cumulated for the order
     *
     *	@param      int		$filtre_statut      Filter on shipment status
     * 	@return     int                			Return integer <0 if KO, Nb of lines found if OK
     */
    public function loadReceptions($filtre_statut = -1)
    {
    }
    /**
     *	Return clicable link of object (with eventually picto)
     *
     *	@param      string	    $option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array		$arraydata				Array of data
     *  @return		string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
}
/**
 *  Class to manage line orders
 */
class CommandeFournisseurLigne extends \CommonOrderLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'commande_fournisseurdet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'commande_fournisseurdet';
    /**
     * @see CommonObjectLine
     */
    public $parent_element = 'commande_fournisseur';
    /**
     * @see CommonObjectLine
     */
    public $fk_parent_attribute = 'fk_commande_fournisseur';
    public $oldline;
    /**
     * Id of parent order
     * @var int
     */
    public $fk_commande;
    // From llx_commande_fournisseurdet
    /**
     * @var int ID
     */
    public $fk_parent_line;
    /**
     * @var int ID
     */
    public $fk_facture;
    public $rang = 0;
    /**
     * @var int special code
     */
    public $special_code = 0;
    /**
     * Unit price without taxes
     * @var float
     */
    public $pu_ht;
    public $date_start;
    public $date_end;
    public $fk_fournprice;
    public $packaging;
    public $pa_ht;
    // From llx_product_fournisseur_price
    /**
     * Supplier reference of price when we added the line. May have been changed after line was added.
     * @var string
     */
    public $ref_supplier;
    /**
     * @var string ref supplier
     * @deprecated
     * @see $ref_supplier
     */
    public $ref_fourn;
    public $remise;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Load line order
     *
     *  @param  int		$rowid      Id line order
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     *	Insert line into database
     *
     *	@param      int		$notrigger		1 = disable triggers
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function insert($notrigger = 0)
    {
    }
    /**
     *	Update the line object into db
     *
     *	@param      int		$notrigger		1 = disable triggers
     *	@return		int		Return integer <0 si ko, >0 si ok
     */
    public function update($notrigger = 0)
    {
    }
    /**
     * 	Delete line in database
     *
     *  @param		User	$user		User making the change
     *	@param      int     $notrigger  1=Disable call to triggers
     *	@return     int                 Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
}