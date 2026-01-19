<?php

/**
 *	Class to manage suppliers invoices
 */
class FactureFournisseur extends \CommonInvoice
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'invoice_supplier';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'facture_fourn';
    /**
     * @var string    Name of subtable line
     */
    public $table_element_line = 'facture_fourn_det';
    /**
     * @var string	Name of class line
     */
    public $class_element_line = 'SupplierInvoiceLine';
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_facture_fourn';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'supplier_invoice';
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
     * @var int ID
     */
    public $rowid;
    /**
     * @var string Ref
     */
    public $ref;
    /**
     * @var string Ref supplier
     */
    public $ref_supplier;
    /**
     * @var string 	Label of invoice
     * @deprecated	Use $label
     */
    public $libelle;
    /**
     * @var string Label of invoice
     */
    public $label;
    //Check constants for types
    public $type = self::TYPE_STANDARD;
    /**
     * Supplier invoice status
     * @var int
     * @deprecated
     * @see $status
     */
    public $statut;
    /**
     * Supplier invoice status
     * @var int
     * @see FactureFournisseur::STATUS_DRAFT, FactureFournisseur::STATUS_VALIDATED, FactureFournisseur::STATUS_PAID, FactureFournisseur::STATUS_ABANDONED
     */
    public $status;
    /**
     * Supplier invoice status
     * @var int
     * @deprecated
     * @see $status
     */
    public $fk_statut;
    /**
     * Set to 1 if the invoice is completely paid, otherwise is 0
     * @var int<0,1>
     * @deprecated Use $paid
     */
    public $paye;
    /**
     * Set to 1 if the invoice is completely paid, otherwise is 0
     * @var int<0,1>
     */
    public $paid;
    /**
     * @var int
     * @deprecated	Use $user_creation_id
     */
    public $author;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * Max payment date (date_echeance)
     *
     * @var integer
     */
    public $date_echeance;
    /**
     * @var float
     * @deprecated See $total_ttc, $total_ht, $total_tva
     */
    public $amount = 0;
    /**
     * @var float
     * @deprecated
     */
    public $remise = 0;
    /**
     * @var float tva
     * @deprecated Use $total_tva
     */
    public $tva;
    // Warning: Do not set default value into property definition. it must stay null.
    // For example to avoid to have substitution done when object is generic and not yet defined.
    /** @var ?string */
    public $localtax1;
    /** @var ?string */
    public $localtax2;
    /** @var float */
    public $total_ht;
    /** @var float */
    public $total_tva;
    /** @var float */
    public $total_localtax1;
    /** @var float */
    public $total_localtax2;
    /** @var float */
    public $total_ttc;
    /**
     * @deprecated
     * @see $note_private, $note_public
     * @var string
     */
    public $note;
    /** @var string */
    public $note_private;
    /** @var string */
    public $note_public;
    /** @var int */
    public $propalid;
    /**
     * @var int ID
     */
    public $fk_account;
    // default bank account
    /**
     * @var int Transport mode id
     */
    public $transport_mode_id;
    /**
     * @var int<0,1>  VAT reverse charge can be used on the invoice
     */
    public $vat_reverse_charge;
    /**
     * @var array<string,string>  (Encoded as JSON in database)
     */
    public $extraparams = array();
    /**
     * Invoice lines
     * @var CommonInvoiceLine[]
     */
    public $lines = array();
    /**
     * @deprecated
     * @var ?Fournisseur
     */
    public $fournisseur;
    //! id of source invoice if replacement invoice or credit note
    /**
     * @var int ID
     */
    public $fk_facture_source;
    /** @var int */
    public $fac_rec;
    /** @var int */
    public $fk_fac_rec_source;
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10), 'ref' => array('type' => 'varchar(255)', 'label' => 'Ref', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'showoncombobox' => 1, 'position' => 15), 'ref_supplier' => array('type' => 'varchar(255)', 'label' => 'RefSupplier', 'enabled' => 1, 'visible' => -1, 'position' => 20), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => '1', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 25, 'index' => 1), 'ref_ext' => array('type' => 'varchar(255)', 'label' => 'RefExt', 'enabled' => 1, 'visible' => 0, 'position' => 30), 'type' => array('type' => 'smallint(6)', 'label' => 'Type', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 35), 'subtype' => array('type' => 'smallint(6)', 'label' => 'InvoiceSubtype', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 36), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'enabled' => 'isModEnabled("societe")', 'visible' => -1, 'notnull' => 1, 'position' => 40), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 45), 'datef' => array('type' => 'date', 'label' => 'Date', 'enabled' => 1, 'visible' => -1, 'position' => 50), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 55), 'libelle' => array('type' => 'varchar(255)', 'label' => 'Label', 'enabled' => 1, 'visible' => -1, 'position' => 60), 'paye' => array('type' => 'smallint(6)', 'label' => 'Paye', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 65), 'amount' => array('type' => 'double(24,8)', 'label' => 'Amount', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 70), 'remise' => array('type' => 'double(24,8)', 'label' => 'Discount', 'enabled' => 1, 'visible' => -1, 'position' => 75), 'close_code' => array('type' => 'varchar(16)', 'label' => 'CloseCode', 'enabled' => 1, 'visible' => -1, 'position' => 80), 'close_note' => array('type' => 'varchar(128)', 'label' => 'CloseNote', 'enabled' => 1, 'visible' => -1, 'position' => 85), 'tva' => array('type' => 'double(24,8)', 'label' => 'Tva', 'enabled' => 1, 'visible' => -1, 'position' => 90), 'localtax1' => array('type' => 'double(24,8)', 'label' => 'Localtax1', 'enabled' => 1, 'visible' => -1, 'position' => 95), 'localtax2' => array('type' => 'double(24,8)', 'label' => 'Localtax2', 'enabled' => 1, 'visible' => -1, 'position' => 100), 'total_ht' => array('type' => 'double(24,8)', 'label' => 'TotalHT', 'enabled' => 1, 'visible' => -1, 'position' => 105), 'total_tva' => array('type' => 'double(24,8)', 'label' => 'TotalVAT', 'enabled' => 1, 'visible' => -1, 'position' => 110), 'total_ttc' => array('type' => 'double(24,8)', 'label' => 'TotalTTC', 'enabled' => 1, 'visible' => -1, 'position' => 115), 'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -1, 'position' => 125), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 130), 'fk_user_valid' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserValidation', 'enabled' => 1, 'visible' => -1, 'position' => 135), 'fk_facture_source' => array('type' => 'integer', 'label' => 'Fk facture source', 'enabled' => 1, 'visible' => -1, 'position' => 140), 'fk_projet' => array('type' => 'integer:Project:projet/class/project.class.php:1:fk_statut=1', 'label' => 'Project', 'enabled' => "isModEnabled('project')", 'visible' => -1, 'position' => 145), 'fk_account' => array('type' => 'integer', 'label' => 'Account', 'enabled' => 'isModEnabled("bank")', 'visible' => -1, 'position' => 150), 'fk_cond_reglement' => array('type' => 'integer', 'label' => 'PaymentTerm', 'enabled' => 1, 'visible' => -1, 'position' => 155), 'fk_mode_reglement' => array('type' => 'integer', 'label' => 'PaymentMode', 'enabled' => 1, 'visible' => -1, 'position' => 160), 'date_lim_reglement' => array('type' => 'date', 'label' => 'DateLimReglement', 'enabled' => 1, 'visible' => -1, 'position' => 165), 'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 170), 'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 175), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'ModelPdf', 'enabled' => 1, 'visible' => 0, 'position' => 180), 'extraparams' => array('type' => 'varchar(255)', 'label' => 'Extraparams', 'enabled' => 1, 'visible' => -1, 'position' => 190), 'fk_incoterms' => array('type' => 'integer', 'label' => 'IncotermCode', 'enabled' => 1, 'visible' => -1, 'position' => 195), 'location_incoterms' => array('type' => 'varchar(255)', 'label' => 'IncotermLocation', 'enabled' => 1, 'visible' => -1, 'position' => 200), 'fk_multicurrency' => array('type' => 'integer', 'label' => 'MulticurrencyId', 'enabled' => 1, 'visible' => -1, 'position' => 205), 'multicurrency_code' => array('type' => 'varchar(255)', 'label' => 'MulticurrencyCode', 'enabled' => 1, 'visible' => -1, 'position' => 210), 'multicurrency_tx' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyRate', 'enabled' => 1, 'visible' => -1, 'position' => 215), 'multicurrency_total_ht' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyTotalHT', 'enabled' => 1, 'visible' => -1, 'position' => 220), 'multicurrency_total_tva' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyTotalVAT', 'enabled' => 1, 'visible' => -1, 'position' => 225), 'multicurrency_total_ttc' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyTotalTTC', 'enabled' => 1, 'visible' => -1, 'position' => 230), 'date_pointoftax' => array('type' => 'date', 'label' => 'Date pointoftax', 'enabled' => 1, 'visible' => -1, 'position' => 235), 'date_valid' => array('type' => 'date', 'label' => 'DateValidation', 'enabled' => 1, 'visible' => -1, 'position' => 240), 'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'Last main doc', 'enabled' => 1, 'visible' => -1, 'position' => 245), 'fk_statut' => array('type' => 'smallint(6)', 'label' => 'Status', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 500), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 900));
    /**
     * @var int Id User modifying
     */
    public $fk_user_valid;
    /**
     * Standard invoice
     */
    const TYPE_STANDARD = 0;
    /**
     * Replacement invoice
     */
    const TYPE_REPLACEMENT = 1;
    /**
     * Credit note invoice
     */
    const TYPE_CREDIT_NOTE = 2;
    /**
     * Deposit invoice
     */
    const TYPE_DEPOSIT = 3;
    /**
     * Draft
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated (need to be paid)
     */
    const STATUS_VALIDATED = 1;
    /**
     * Classified paid.
     * If paid partially, $this->close_code can be:
     * - CLOSECODE_DISCOUNTVAT
     * - CLOSECODE_BADCREDIT
     * If paid completely, this->close_code will be null
     */
    const STATUS_CLOSED = 2;
    /**
     * Classified abandoned and no payment done.
     * $this->close_code can be:
     * - CLOSECODE_BADCREDIT
     * - CLOSECODE_ABANDONED
     * - CLOSECODE_REPLACED
     */
    const STATUS_ABANDONED = 3;
    const CLOSECODE_DISCOUNTVAT = 'discount_vat';
    const CLOSECODE_BADCREDIT = 'badsupplier';
    const CLOSECODE_ABANDONED = 'abandon';
    const CLOSECODE_REPLACED = 'replaced';
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *    Create supplier invoice into database
     *
     *    @param      User		$user       user object that creates
     *    @return     int    	     		Id invoice created if OK, < 0 if KO
     */
    public function create($user)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id         Id supplier invoice
     *  @param	string	$ref		Ref supplier invoice
     * 	@param	string	$ref_ext	External reference of invoice
     *  @return int  	   			Return integer <0 if KO, >0 if OK, 0 if not found
     */
    public function fetch($id = 0, $ref = '', $ref_ext = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load this->lines
     *
     *  @return     int         1 si ok, < 0 si erreur
     */
    public function fetch_lines()
    {
    }
    /**
     *  Update database
     *
     *  @param	User	$user            User that modify
     *  @param  int		$notrigger       0=launch triggers after, 1=disable triggers
     *  @return int 			         Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Add a discount line into an invoice (as an invoice line) using an existing absolute discount (Consume the discount)
     *
     *    @param     int	$idremise	Id of absolute discount
     *    @return    int          		>0 if OK, <0 if KO
     */
    public function insert_discount($idremise)
    {
    }
    /**
     *	Delete invoice from database
     *
     *  @param      User	$user		    User object
     *	@param	    int		$notrigger	    1=Does not execute triggers, 0= execute triggers
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Tag invoice as a paid invoice
     *
     *	@deprecated
     *  @see setPaid()
     *	@param  User	$user       Object user
     *	@param  string	$close_code	Code indicates whether the class has paid in full while payment is incomplete. Not implemented yet.
     *	@param  string	$close_note	Comment informs if the class has been paid while payment is incomplete. Not implemented yet.
     *	@return int         		Return integer <0 si ko, >0 si ok
     */
    public function set_paid($user, $close_code = '', $close_note = '')
    {
    }
    /**
     *  Tag invoice as a paid invoice
     *
     *	@param  User	$user       Object user
     *	@param  string	$close_code	Code indicates whether the class has paid in full while payment is incomplete. Not implemented yet.
     *	@param  string	$close_note	Comment informs if the class has been paid while payment is incomplete. Not implemented yet.
     *	@return int<-1,1>     		Return integer <0 si ko, >0 si ok
     */
    public function setPaid($user, $close_code = '', $close_note = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Tag the invoice as not fully paid + trigger call BILL_UNPAYED
     *	Function used when a direct debit payment is refused,
     *	or when the invoice was canceled and reopened.
     *
     *	@deprecated
     *  @see setUnpaid()
     *	@param      User	$user       Object user that change status
     *	@return     int         		Return integer <0 si ok, >0 si ok
     */
    public function set_unpaid($user)
    {
    }
    /**
     *	Tag the invoice as not fully paid + trigger call BILL_UNPAYED
     *	Function used when a direct debit payment is refused,
     *	or when the invoice was canceled and reopened.
     *
     *	@param      User	$user       Object user that change status
     *	@return     int         		Return integer <0 si ok, >0 si ok
     */
    public function setUnpaid($user)
    {
    }
    /**
     *	Tag invoice as canceled, with no payment on it (example for replacement invoice or payment never received) + call trigger BILL_CANCEL
     *	Warning, if option to decrease stock on invoice was set, this function does not change stock (it might be a cancel because
     *  of no payment even if merchandises were sent).
     *
     *	@param	User	$user        	Object user making change
     *	@param	string	$close_code		Code of closing invoice (CLOSECODE_REPLACED, CLOSECODE_...)
     *	@param	string	$close_note		Comment
     *	@return int         			Return integer <0 if KO, >0 if OK
     */
    public function setCanceled($user, $close_code = '', $close_note = '')
    {
    }
    /**
     *	Tag invoice as validated + call trigger BILL_VALIDATE
     *
     *	@param	User	$user           Object user that validate
     *	@param  string	$force_number   Reference to force on invoice
     *	@param	int		$idwarehouse	Id of warehouse for stock change
     *  @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return int 			        Return integer <0 if KO, =0 if nothing to do, >0 if OK
     */
    public function validate($user, $force_number = '', $idwarehouse = 0, $notrigger = 0)
    {
    }
    /**
     *	Set draft status
     *
     *	@param	User	$user			Object user that modify
     *	@param	int		$idwarehouse	Id warehouse to use for stock change.
     *  @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function setDraft($user, $idwarehouse = -1, $notrigger = 0)
    {
    }
    /**
     *	Adds an invoice line (associated with no predefined product/service)
     *	The parameters are already supposed to be correct and with final values when calling
     *	this method. Also, for the VAT rate, it must already have been defined by the caller by
     *	by the get_default_tva method(vendor_company, buying company, idprod) and the desc must
     *	already have the right value (the caller has to manage the multilanguage).
     *
     *	@param      string      $desc                   Description of the line
     *	@param      float      $pu                      Unit price (HT or TTC according to price_base_type, > 0 even for credit note)
     *	@param      float|string	$txtva           	Force Vat rate, -1 for auto (Can contain the vat_src_code too with syntax '9.9 (CODE)')
     *	@param      float      $txlocaltax1            LocalTax1 Rate
     *	@param      float      $txlocaltax2            LocalTax2 Rate
     *	@param      float      $qty                    Quantity
     *	@param      int         $fk_product             Product/Service ID predefined
     *	@param      float      $remise_percent         Percentage discount of the line
     *	@param      int         $date_start             Service start date
     *	@param      int         $date_end               Service expiry date
     *	@param      int         $fk_code_ventilation    Accounting breakdown code
     *	@param      int         $info_bits              Line type bits
     *	@param      string      $price_base_type        HT or TTC
     *	@param      int         $type                   Type of line (0=product, 1=service)
     *	@param      int         $rang                   Position of line
     *	@param      int         $notrigger              Disable triggers
     *	@param      array<string,mixed>	$array_options	extrafields array
     *	@param      int|null    $fk_unit                Code of the unit to use. Null to use the default one
     *	@param      int         $origin_id              id origin document
     *	@param      float      	$pu_devise              Amount in currency
     *	@param      string      $ref_supplier           Supplier ref
     *	@param      int         $special_code           Special code
     *	@param      int         $fk_parent_line         Parent line id
     *	@param      int         $fk_remise_except       Id discount used
     *	@return     int                                 >0 if OK, <0 if KO
     */
    public function addline($desc, $pu, $txtva, $txlocaltax1, $txlocaltax2, $qty, $fk_product = 0, $remise_percent = 0, $date_start = 0, $date_end = 0, $fk_code_ventilation = 0, $info_bits = 0, $price_base_type = 'HT', $type = 0, $rang = -1, $notrigger = 0, $array_options = [], $fk_unit = \null, $origin_id = 0, $pu_devise = 0, $ref_supplier = '', $special_code = 0, $fk_parent_line = 0, $fk_remise_except = 0)
    {
    }
    /**
     * Update a line detail in the database
     *
     * @param	int			$id            		Id of line invoice
     * @param	string		$desc         		Description of line
     * @param	float		$pu          		Prix unitaire (HT ou TTC selon price_base_type)
     * @param	float|string	$vatrate 		VAT Rate (Can be '8.5', '8.5 (ABC)')
     * @param	float		$txlocaltax1		LocalTax1 Rate
     * @param	float		$txlocaltax2		LocalTax2 Rate
     * @param	float		$qty           		Quantity
     * @param	int			$idproduct			Id produit
     * @param	string		$price_base_type	HT or TTC
     * @param	int			$info_bits			Miscellaneous information of line
     * @param	int<0,1>	$type				Type of line (0=product, 1=service)
     * @param	float		$remise_percent  	Percentage discount of the line
     * @param	int<0,1>	$notrigger			Disable triggers
     * @param	int|''		$date_start     	Date start of service
     * @param	int|''		$date_end       	Date end of service
     * @param	array<string,mixed>	$array_options	extrafields array
     * @param	?int		$fk_unit 			Code of the unit to use. Null to use the default one
     * @param	float		$pu_devise			Amount in currency
     * @param	string		$ref_supplier		Supplier ref
     * @param	int			$rang				Line rank
     * @return 	int<-1,1>      					Return integer <0 if KO, >0 if OK
     */
    public function updateline($id, $desc, $pu, $vatrate, $txlocaltax1 = 0, $txlocaltax2 = 0, $qty = 1, $idproduct = 0, $price_base_type = 'HT', $info_bits = 0, $type = 0, $remise_percent = 0, $notrigger = 0, $date_start = '', $date_end = '', $array_options = [], $fk_unit = \null, $pu_devise = 0, $ref_supplier = '', $rang = 0)
    {
    }
    /**
     * 	Delete a detail line from database
     *
     * 	@param  int			$rowid      	Id of line to delete
     *	@param	int<0,1>	$notrigger		1=Does not execute triggers, 0= execute triggers
     * 	@return	int							Return integer <0 if KO, >0 if OK
     */
    public function deleteLine($rowid, $notrigger = 0)
    {
    }
    /**
     *	Loads the info order information into the invoice object
     *
     *	@param  int		$id       	Id of the invoice to load
     *	@return	void
     */
    public function info($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of replaceable invoices
     *	Status valid or abandoned for other reason + not paid + no payment + not already replaced
     *
     *	@param	int		$socid		Thirdparty id
     *	@return	array<int,array{id:int,ref:string,status:int}>|int<-1,-1>		Table of invoices ('id'=>id, 'ref'=>ref, 'status'=>status, 'paymentornot'=>0/1)
     *                                  <0 if error
     */
    public function list_replacable_supplier_invoices($socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of qualifying invoices for correction by credit note
     *	Invoices that respect the following rules are returned:
     *	(validated + payment in progress) or classified (paid in full or paid in part) + not already replaced + not already having
     *
     *	@param		int		$socid		Thirdparty id
     *	@return	array<int,array{ref:string,status:int,type:int,paye:int<0,1>,paymentornot:int<0,1>}>|int<-1,-1>		Table of invoices ($id => array('ref'=>,'paymentornot'=>,'status'=>,'paye'=>)
     *                                  <0 if error
     */
    public function list_qualified_avoir_supplier_invoices($socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *	@param      User	$user       Object user
     *	@return WorkboardResponse|int Return integer <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user)
    {
    }
    /**
     * getTooltipContentArray
     *
     * @param array{moretitle?:string} $params ex option, infologin
     * @since v18
     * @return array{picto:string,ref?:string,refsupplier?:string,label?:string,date?:string,date_echeance?:string,amountht?:string,total_ht?:string,totaltva?:string,amountlt1?:string,amountlt2?:string,amountrevenustamp?:string,totalttc?:string}
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *	Return clickable name (with optional picto)
     *
     *	@param		int<0,1>	$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     *	@param		string		$option						Where point the link
     *	@param		int			$max						Max length of shown ref
     *	@param		int<0,1>	$short						1=Return just URL
     *	@param		string		$moretitle					Add more text to title tooltip
     *  @param	    int<0,1>   	$notooltip					1=Disable tooltip
     *  @param      int<-1,1>   $save_lastsearch_value		-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param		int<0,1>	$addlinktonotes				Add link to show notes
     * 	@return		string									String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $max = 0, $short = 0, $moretitle = '', $notooltip = 0, $save_lastsearch_value = -1, $addlinktonotes = 0)
    {
    }
    /**
     * Sets object to given categories.
     *
     * Adds it to non existing supplied categories.
     * Existing categories are left untouch.
     *
     * @param int[]|int $categories Category or categories IDs
     *
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function setCategories($categories)
    {
    }
    /**
     *      Return next reference of supplier invoice not already used (or last reference)
     *      according to numbering module defined into constant INVOICE_SUPPLIER_ADDON_NUMBER
     *
     *      @param	  Societe		$soc		Thirdparty object
     *      @param    'next'|'last'	$mode		'next' for next value or 'last' for last value
     *      @return   string|-1					Returns free reference or last reference, or '' or -1 if error
     */
    public function getNextNumRef($soc, $mode = 'next')
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *	@param	string		$option		''=Create a specimen invoice with lines, 'nolines'=No lines
     *  @return int
     */
    public function initAsSpecimen($option = '')
    {
    }
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @return         int     Return integer <0 if KO, >0 if OK
     */
    public function loadStateBoard()
    {
    }
    /**
     *	Load an object from its id and create a new one in database
     *
     *	@param      User		$user        	User that clone
     *	@param      int			$fromid     	Id of object to clone
     *	@param		int<0,1>	$invertdetail	Reverse sign of amounts for lines
     * 	@return		int							New id of clone
     */
    public function createFromClone(\User $user, $fromid, $invertdetail = 0)
    {
    }
    /**
     *	Create a document onto disk according to template model.
     *
     *	@param	    string					$modele			Force template to use ('' to not force)
     *	@param		Translate				$outputlangs	Object lang a utiliser pour traduction
     *  @param      int<0,1>				$hidedetails    Hide details of lines
     *  @param      int<0,1>				$hidedesc       Hide description
     *  @param      int<0,1>				$hideref        Hide ref
     *  @param   	?array<string,mixed>	$moreparams     Array to provide more information
     *  @return     int<-1,1>								Return integer <0 if KO, 0 if nothing done, >0 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
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
     * @param DoliDB $db Database handler
     * @param int $origin_id Old product id
     * @param int $dest_id New product id
     * @return bool
     */
    public static function replaceProduct(\DoliDB $db, $origin_id, $dest_id)
    {
    }
    /**
     * Is the payment of the supplier invoice having a delay?
     *
     * @return bool
     */
    public function hasDelay()
    {
    }
    /**
     * Is credit note used
     *
     * @return bool
     */
    public function isCreditNoteUsed()
    {
    }
    /**
     *	Return clickable link of object (with eventually picto)
     *
     *	@param	string					$option		Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param	?array<string,mixed>	$arraydata	Array of data
     *  @return	string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
    /**
     *  Change the option VAT reverse charge
     *
     *  @param      int<0,1>	$vatreversecharge	0 = Off, 1 = On
     *  @return     int								1 if OK, 0 if KO
     */
    public function setVATReverseCharge($vatreversecharge)
    {
    }
    /**
     *  Send reminders by emails for supplier invoices validated that are due.
     *  CAN BE A CRON TASK
     *
     *  @param	int			$nbdays				Delay before due date (or after if delay is negative)
     *  @param	string		$paymentmode		'' or 'all' by default (no filter), or 'LIQ', 'CHQ', CB', ...
     *  @param	int|string	$template			Name (or id) of email template (Must be a template of type 'invoice_supplier_send')
     *  @param	string		$datetouse			'duedate' (default) or 'invoicedate'
     *  @param	string		$forcerecipient		Force email of recipient (for example to send the email to an accountant supervisor instead of the customer)
     *  @return int         					0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function sendEmailsRemindersOnSupplierInvoiceDueDate($nbdays = 0, $paymentmode = 'all', $template = '', $datetouse = 'duedate', $forcerecipient = '')
    {
    }
}