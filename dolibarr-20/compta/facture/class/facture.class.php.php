<?php

/**
 *	Class to manage invoices
 */
class Facture extends \CommonInvoice
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'facture';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'facture';
    /**
     * @var string    Name of subtable line
     */
    public $table_element_line = 'facturedet';
    /**
     * @var string Fieldname with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_facture';
    /**
     * @var string String with name of icon for myobject.
     */
    public $picto = 'bill';
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
     * @deprecated		Use $user_creation_id
     */
    public $fk_user_author;
    /**
     * @var int|null ID
     * @deprecated		Use $user_validation_id
     */
    public $fk_user_valid;
    /**
     * @var int ID
     * @deprecated		Use $user_modification_id
     */
    public $fk_user_modif;
    public $datem;
    /**
     * @var int	Date expected for delivery
     */
    public $delivery_date;
    // Date expected of shipment (date of start of shipment, not the reception that occurs some days after)
    /**
     * @var string customer ref
     * @deprecated
     * @see $ref_customer
     */
    public $ref_client;
    /**
     * @var string customer ref
     */
    public $ref_customer;
    public $total_ht;
    public $total_tva;
    public $total_localtax1;
    public $total_localtax2;
    public $total_ttc;
    public $revenuestamp;
    public $resteapayer;
    /**
     * 1 if invoice paid COMPLETELY, 0 otherwise (do not use it anymore, use statut and close_code)
     */
    public $paye;
    //! key of module source when invoice generated from a dedicated module ('cashdesk', 'takepos', ...)
    public $module_source;
    //! key of pos source ('0', '1', ...)
    public $pos_source;
    //! id of template invoice when generated from a template invoice
    public $fk_fac_rec_source;
    //! id of source invoice if replacement invoice or credit note
    public $fk_facture_source;
    public $linked_objects = array();
    /**
     * @var int ID Field to store bank id to use when payment mode is withdraw
     */
    public $fk_bank;
    /**
     * @var CommonInvoiceLine[]
     */
    public $lines = array();
    /**
     * @var FactureLigne
     */
    public $line;
    public $extraparams = array();
    /**
     * @var int ID facture rec
     */
    public $fac_rec;
    public $date_pointoftax;
    /**
     * @var int Situation cycle reference number
     */
    public $situation_cycle_ref;
    /**
     * @var int Situation counter inside the cycle
     */
    public $situation_counter;
    /**
     * @var int Final situation flag
     */
    public $situation_final;
    /**
     * @var array Table of previous situations
     */
    public $tab_previous_situation_invoice = array();
    /**
     * @var array Table of next situations
     */
    public $tab_next_situation_invoice = array();
    /**
     * @var static object oldcopy
     */
    public $oldcopy;
    /**
     * @var double percentage of retainage
     */
    public $retained_warranty;
    /**
     * @var int timestamp of date limit of retainage
     */
    public $retained_warranty_date_limit;
    /**
     * @var int Code in llx_c_paiement
     */
    public $retained_warranty_fk_cond_reglement;
    /**
     * @var int availability ID
     */
    public $availability_id;
    public $date_closing;
    /**
     * @var int
     */
    public $source;
    /**
     * @var float	Percent of discount ("remise" in French)
     * @deprecated The discount percent is on line level now
     */
    public $remise_percent;
    /**
     * @var string payment url
     */
    public $online_payment_url;
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
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 1),
        'ref' => array('type' => 'varchar(30)', 'label' => 'Ref', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'showoncombobox' => 1, 'position' => 5),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => '1', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 20, 'index' => 1),
        'ref_client' => array('type' => 'varchar(255)', 'label' => 'RefCustomer', 'enabled' => 1, 'visible' => -1, 'position' => 10),
        'ref_ext' => array('type' => 'varchar(255)', 'label' => 'Ref ext', 'enabled' => 1, 'visible' => 0, 'position' => 12),
        'type' => array('type' => 'smallint(6)', 'label' => 'Type', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 15),
        'subtype' => array('type' => 'smallint(6)', 'label' => 'InvoiceSubtype', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 15),
        //'increment' =>array('type'=>'varchar(10)', 'label'=>'Increment', 'enabled'=>1, 'visible'=>-1, 'position'=>45),
        'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 50),
        'datef' => array('type' => 'date', 'label' => 'DateInvoice', 'enabled' => 1, 'visible' => 1, 'position' => 20),
        'date_valid' => array('type' => 'date', 'label' => 'DateValidation', 'enabled' => 1, 'visible' => -1, 'position' => 22),
        'date_lim_reglement' => array('type' => 'date', 'label' => 'DateDue', 'enabled' => 1, 'visible' => 1, 'position' => 25),
        'date_closing' => array('type' => 'datetime', 'label' => 'Date closing', 'enabled' => 1, 'visible' => -1, 'position' => 30),
        'paye' => array('type' => 'smallint(6)', 'label' => 'InvoicePaidCompletely', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 80),
        //'amount' =>array('type'=>'double(24,8)', 'label'=>'Amount', 'enabled'=>1, 'visible'=>-1, 'notnull'=>1, 'position'=>85),
        //'remise_percent' =>array('type'=>'double', 'label'=>'RelativeDiscount', 'enabled'=>1, 'visible'=>-1, 'position'=>90),
        //'remise_absolue' =>array('type'=>'double', 'label'=>'CustomerRelativeDiscount', 'enabled'=>1, 'visible'=>-1, 'position'=>91),
        //'remise' =>array('type'=>'double', 'label'=>'Remise', 'enabled'=>1, 'visible'=>-1, 'position'=>100),
        'close_code' => array('type' => 'varchar(16)', 'label' => 'EarlyClosingReason', 'enabled' => 1, 'visible' => -1, 'position' => 92),
        'close_note' => array('type' => 'varchar(128)', 'label' => 'EarlyClosingComment', 'enabled' => 1, 'visible' => -1, 'position' => 93),
        'total_ht' => array('type' => 'double(24,8)', 'label' => 'AmountHT', 'enabled' => 1, 'visible' => 1, 'position' => 95, 'isameasure' => 1),
        'total_tva' => array('type' => 'double(24,8)', 'label' => 'AmountVAT', 'enabled' => 1, 'visible' => -1, 'position' => 100, 'isameasure' => 1),
        'localtax1' => array('type' => 'double(24,8)', 'label' => 'LT1', 'enabled' => 1, 'visible' => -1, 'position' => 110, 'isameasure' => 1),
        'localtax2' => array('type' => 'double(24,8)', 'label' => 'LT2', 'enabled' => 1, 'visible' => -1, 'position' => 120, 'isameasure' => 1),
        'revenuestamp' => array('type' => 'double(24,8)', 'label' => 'RevenueStamp', 'enabled' => 1, 'visible' => -1, 'position' => 115, 'isameasure' => 1),
        'total_ttc' => array('type' => 'double(24,8)', 'label' => 'AmountTTC', 'enabled' => 1, 'visible' => 1, 'position' => 130, 'isameasure' => 1),
        'fk_facture_source' => array('type' => 'integer', 'label' => 'SourceInvoice', 'enabled' => 1, 'visible' => -1, 'position' => 170),
        'fk_projet' => array('type' => 'integer:Project:projet/class/project.class.php:1:(fk_statut:=:1)', 'label' => 'Project', 'enabled' => 1, 'visible' => -1, 'position' => 175),
        'fk_account' => array('type' => 'integer', 'label' => 'Fk account', 'enabled' => 1, 'visible' => -1, 'position' => 180),
        'fk_currency' => array('type' => 'varchar(3)', 'label' => 'CurrencyCode', 'enabled' => 1, 'visible' => -1, 'position' => 185),
        'fk_cond_reglement' => array('type' => 'integer', 'label' => 'PaymentTerm', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 190),
        'fk_mode_reglement' => array('type' => 'integer', 'label' => 'PaymentMode', 'enabled' => 1, 'visible' => -1, 'position' => 195),
        'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 205),
        'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 210),
        'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 215),
        'extraparams' => array('type' => 'varchar(255)', 'label' => 'Extraparams', 'enabled' => 1, 'visible' => -1, 'position' => 225),
        'situation_cycle_ref' => array('type' => 'smallint(6)', 'label' => 'Situation cycle ref', 'enabled' => '$conf->global->INVOICE_USE_SITUATION', 'visible' => -1, 'position' => 230),
        'situation_counter' => array('type' => 'smallint(6)', 'label' => 'Situation counter', 'enabled' => '$conf->global->INVOICE_USE_SITUATION', 'visible' => -1, 'position' => 235),
        'situation_final' => array('type' => 'smallint(6)', 'label' => 'Situation final', 'enabled' => 'empty($conf->global->INVOICE_USE_SITUATION) ? 0 : 1', 'visible' => -1, 'position' => 240),
        'retained_warranty' => array('type' => 'double', 'label' => 'Retained warranty', 'enabled' => '$conf->global->INVOICE_USE_RETAINED_WARRANTY', 'visible' => -1, 'position' => 245),
        'retained_warranty_date_limit' => array('type' => 'date', 'label' => 'Retained warranty date limit', 'enabled' => '$conf->global->INVOICE_USE_RETAINED_WARRANTY', 'visible' => -1, 'position' => 250),
        'retained_warranty_fk_cond_reglement' => array('type' => 'integer', 'label' => 'Retained warranty fk cond reglement', 'enabled' => '$conf->global->INVOICE_USE_RETAINED_WARRANTY', 'visible' => -1, 'position' => 255),
        'fk_incoterms' => array('type' => 'integer', 'label' => 'IncotermCode', 'enabled' => '$conf->incoterm->enabled', 'visible' => -1, 'position' => 260),
        'location_incoterms' => array('type' => 'varchar(255)', 'label' => 'IncotermLabel', 'enabled' => '$conf->incoterm->enabled', 'visible' => -1, 'position' => 265),
        'date_pointoftax' => array('type' => 'date', 'label' => 'DatePointOfTax', 'enabled' => '$conf->global->INVOICE_POINTOFTAX_DATE', 'visible' => -1, 'position' => 270),
        'fk_multicurrency' => array('type' => 'integer', 'label' => 'MulticurrencyID', 'enabled' => 'isModEnabled("multicurrency")', 'visible' => -1, 'position' => 275),
        'multicurrency_code' => array('type' => 'varchar(255)', 'label' => 'Currency', 'enabled' => 'isModEnabled("multicurrency")', 'visible' => -1, 'position' => 280),
        'multicurrency_tx' => array('type' => 'double(24,8)', 'label' => 'CurrencyRate', 'enabled' => 'isModEnabled("multicurrency")', 'visible' => -1, 'position' => 285, 'isameasure' => 1),
        'multicurrency_total_ht' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyAmountHT', 'enabled' => 'isModEnabled("multicurrency")', 'visible' => -1, 'position' => 290, 'isameasure' => 1),
        'multicurrency_total_tva' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyAmountVAT', 'enabled' => 'isModEnabled("multicurrency")', 'visible' => -1, 'position' => 291, 'isameasure' => 1),
        'multicurrency_total_ttc' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyAmountTTC', 'enabled' => 'isModEnabled("multicurrency")', 'visible' => -1, 'position' => 292, 'isameasure' => 1),
        'fk_fac_rec_source' => array('type' => 'integer', 'label' => 'RecurringInvoiceSource', 'enabled' => 1, 'visible' => -1, 'position' => 305),
        'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'LastMainDoc', 'enabled' => 1, 'visible' => -1, 'position' => 310),
        'module_source' => array('type' => 'varchar(32)', 'label' => 'POSModule', 'enabled' => "(isModEnabled('cashdesk') || isModEnabled('takepos') || getDolGlobalInt('INVOICE_SHOW_POS'))", 'visible' => -1, 'position' => 315),
        'pos_source' => array('type' => 'varchar(32)', 'label' => 'POSTerminal', 'enabled' => "(isModEnabled('cashdesk') || isModEnabled('takepos') || getDolGlobalInt('INVOICE_SHOW_POS'))", 'visible' => -1, 'position' => 320),
        'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 500),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModificationShort', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 502),
        'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -1, 'position' => 506),
        'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModification', 'enabled' => 1, 'visible' => -1, 'notnull' => -1, 'position' => 508),
        'fk_user_valid' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserValidation', 'enabled' => 1, 'visible' => -1, 'position' => 510),
        'fk_user_closing' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserClosing', 'enabled' => 1, 'visible' => -1, 'position' => 512),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 900),
        'fk_statut' => array('type' => 'smallint(6)', 'label' => 'Status', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 1000, 'arrayofkeyval' => array(0 => 'Draft', 1 => 'Validated', 2 => 'Paid', 3 => 'Abandonned')),
    );
    // END MODULEBUILDER PROPERTIES
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
     * Proforma invoice (should not be used. a proforma is an order)
     */
    const TYPE_PROFORMA = 4;
    /**
     * Situation invoice
     */
    const TYPE_SITUATION = 5;
    /**
     * Draft status
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
     * - CLOSECODE_BADDEBT
     * If paid completely, this->close_code will be null
     */
    const STATUS_CLOSED = 2;
    /**
     * Classified abandoned and no payment done.
     * $this->close_code can be:
     * - CLOSECODE_BADDEBT
     * - CLOSECODE_ABANDONED
     * - CLOSECODE_REPLACED
     */
    const STATUS_ABANDONED = 3;
    const CLOSECODE_DISCOUNTVAT = 'discount_vat';
    // Abandoned remain - escompte
    const CLOSECODE_BADDEBT = 'badcustomer';
    // Abandoned remain - bad customer
    const CLOSECODE_BANKCHARGE = 'bankcharge';
    // Abandoned remain - bank charge
    const CLOSECODE_OTHER = 'other';
    // Abandoned remain - other
    const CLOSECODE_ABANDONED = 'abandon';
    // Abandoned - other
    const CLOSECODE_REPLACED = 'replaced';
    // Closed after doing a replacement invoice
    /**
     * 	Constructor
     *
     * 	@param	DoliDB		$db			Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     *	Create invoice in database.
     *  Note: this->ref can be set or empty. If empty, we will use "(PROV999)"
     *  Note: this->fac_rec must be set to create invoice from a recurring invoice
     *
     *	@param	User	$user      		Object user that create
     *	@param  int		$notrigger		1=Does not execute triggers, 0 otherwise
     * 	@param	int		$forceduedate	If set, do not recalculate due date from payment condition but force it with value
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function create(\User $user, $notrigger = 0, $forceduedate = 0)
    {
    }
    /**
     *	Create a new invoice in database from current invoice
     *
     *	@param      User	$user    		Object user that ask creation
     *	@param		int		$invertdetail	Reverse sign of amounts for lines
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function createFromCurrent(\User $user, $invertdetail = 0)
    {
    }
    /**
     *	Load an object from its id and create a new one in database
     *
     *	@param      User	$user        	User that clone
     *  @param  	int 	$fromid         Id of object to clone
     * 	@return		int					    New id of clone
     */
    public function createFromClone(\User $user, $fromid = 0)
    {
    }
    /**
     *  Load an object from an order and create a new invoice into database
     *
     *  @param      Object			$object         	Object source
     *  @param		User			$user				Object user
     *  @return     int             					Return integer <0 if KO, 0 if nothing done, 1 if OK
     */
    public function createFromOrder($object, \User $user)
    {
    }
    /**
     *  Load an object from an order and create a new invoice into database
     *
     *  @param      Object			$object         	Object source
     *  @param		User			$user				Object user
     * 	@param		array			$lines				Ids of lines to use for invoice. If empty, all lines will be used.
     *  @return     int             					Return integer <0 if KO, 0 if nothing done, 1 if OK
     */
    public function createFromContract($object, \User $user, $lines = array())
    {
    }
    /**
     * Creates a deposit from a proposal or an order by grouping lines by VAT rates
     *
     * @param	Propal|Commande		$origin					The original proposal or order
     * @param	int					$date					Invoice date
     * @param	int					$payment_terms_id		Invoice payment terms
     * @param	User				$user					Object user
     * @param	int					$notrigger				1=Does not execute triggers, 0= execute triggers
     * @param	bool				$autoValidateDeposit	Whether to aumatically validate the deposit created
     * @param	array				$overrideFields			Array of fields to force values
     * @return	Facture|null								The deposit created, or null if error (populates $origin->error in this case)
     */
    public static function createDepositFromOrigin(\CommonObject $origin, $date, $payment_terms_id, \User $user, $notrigger = 0, $autoValidateDeposit = \false, $overrideFields = array())
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
     *  Return clicable link of object (with eventually picto)
     *
     *  @param	int		$withpicto       			Add picto into link
     *  @param  string	$option          			Where point the link
     *  @param  int		$max             			Maxlength of ref
     *  @param  int		$short           			1=Return just URL
     *  @param  string  $moretitle       			Add more text to title tooltip
     *  @param	int  	$notooltip		 			1=Disable tooltip
     *  @param  int     $addlinktonotes  			1=Add link to notes
     *  @param  int     $save_lastsearch_value		-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param  string  $target                     Target of link ('', '_self', '_blank', '_parent', '_backoffice', ...)
     *  @return string 			         			String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $max = 0, $short = 0, $moretitle = '', $notooltip = 0, $addlinktonotes = 0, $save_lastsearch_value = -1, $target = '')
    {
    }
    /**
     *	Get object from database. Get also lines.
     *
     *	@param      int		$rowid       		Id of object to load
     * 	@param		string	$ref				Reference of invoice
     * 	@param		string	$ref_ext			External reference of invoice
     * 	@param		int		$notused			Not used
     *  @param		bool	$fetch_situation	Load also the previous and next situation invoice into $tab_previous_situation_invoice and $tab_next_situation_invoice
     *	@return     int         				>0 if OK, <0 if KO, 0 if not found
     */
    public function fetch($rowid, $ref = '', $ref_ext = '', $notused = 0, $fetch_situation = \false)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load all detailed lines into this->lines
     *
     *	@param		int		$only_product	Return only physical products
     *	@param		int		$loadalsotranslation	Return translation for products
     *
     *	@return     int         1 if OK, < 0 if KO
     */
    public function fetch_lines($only_product = 0, $loadalsotranslation = 0)
    {
    }
    /**
     * Fetch previous and next situations invoices.
     * Return all previous and next invoices (both standard and credit notes).
     *
     * @return	void
     */
    public function fetchPreviousNextSituationInvoice()
    {
    }
    /**
     *      Update database
     *
     *      @param      User	$user        	User that modify
     *      @param      int		$notrigger	    0=launch triggers after, 1=disable triggers
     *      @return     int      			   	Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set customer ref
     *
     *	@param     	string	$ref_client		Customer ref
     *  @param     	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function set_ref_client($ref_client, $notrigger = 0)
    {
    }
    /**
     *	Delete invoice
     *
     *	@param     	User	$user      	    User making the deletion.
     *	@param		int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@param		int		$idwarehouse	Id warehouse to use for stock change.
     *	@return		int						Return integer <0 if KO, 0=Refused, >0 if OK
     */
    public function delete($user, $notrigger = 0, $idwarehouse = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Tag the invoice as paid completely (if close_code is filled) => this->fk_statut=2, this->paye=1
     *  or partially (if close_code filled) + appel trigger BILL_PAYED => this->fk_statut=2, this->paye stay 0
     *
     *	@deprecated
     *  @see setPaid()
     *  @param	User	$user      	Object user that modify
     *	@param  string	$close_code	Code set when forcing to set the invoice as fully paid while in practice it is incomplete (because of a discount (fr:escompte) for instance)
     *	@param  string	$close_note	Comment set when forcing to set the invoice as fully paid while in practice it is incomplete (because of a discount (fr:escompte) for instance)
     *  @return int         		Return integer <0 if KO, >0 if OK
     */
    public function set_paid($user, $close_code = '', $close_note = '')
    {
    }
    /**
     *  Tag the invoice as :
     *  - paid completely (if close_code is not filled) => this->fk_statut=2, this->paye=1
     *  - or partially (if close_code filled) + appel trigger BILL_PAYED => this->fk_statut=2, this->paye stay 0
     *
     *  @param	User	$user      	Object user that modify
     *	@param  string	$close_code	Code set when forcing to set the invoice as fully paid while in practice it is incomplete (because of a discount (fr:escompte) for instance)
     *	@param  string	$close_note	Comment set when forcing to set the invoice as fully paid while in practice it is incomplete (because of a discount (fr:escompte) for instance)
     *  @return int         		Return integer <0 if KO, >0 if OK
     */
    public function setPaid($user, $close_code = '', $close_note = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Tags the invoice as incompletely paid and call the trigger BILL_UNPAYED
     *	This method is used when a direct debit (fr:prelevement) is refused
     * 	or when a canceled invoice is reopened.
     *
     *	@deprecated
     *  @see setUnpaid()
     *  @param	User	$user       Object user that change status
     *  @return int         		Return integer <0 if KO, >0 if OK
     */
    public function set_unpaid($user)
    {
    }
    /**
     *  Tag the invoice as incompletely paid and call the trigger BILL_UNPAYED
     *	This method is used when a direct debit (fr:prelevement) is refused
     * 	or when a canceled invoice is reopened.
     *
     *  @param	User	$user       Object user that change status
     *  @return int         		Return integer <0 if KO, >0 if OK
     */
    public function setUnpaid($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Tag invoice as canceled, with no payment on it (example for replacement invoice or payment never received) + call trigger BILL_CANCEL
     *	Warning, if option to decrease stock on invoice was set, this function does not change stock (it might be a cancel because
     *  of no payment even if merchandises were sent).
     *
     *	@deprecated
     *  @see setCanceled()
     *	@param	User	$user        	Object user making change
     *	@param	string	$close_code		Code of closing invoice (CLOSECODE_REPLACED, CLOSECODE_...)
     *	@param	string	$close_note		Comment
     *	@return int         			Return integer <0 if KO, >0 if OK
     */
    public function set_canceled($user, $close_code = '', $close_note = '')
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
     * Tag invoice as validated + call trigger BILL_VALIDATE
     * Object must have lines loaded with fetch_lines
     *
     * @param	User	$user           Object user that validate
     * @param   string	$force_number	Reference to force on invoice
     * @param	int		$idwarehouse	Id of warehouse to use for stock decrease if option to decrease on stock is on (0=no decrease)
     * @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     * @param	int		$batch_rule		0=do not decrement batch, else batch rule to use, 1=take in batches ordered by sellby and eatby dates
     * @return	int						Return integer <0 if KO, 0=Nothing done because invoice is not a draft, >0 if OK
     */
    public function validate($user, $force_number = '', $idwarehouse = 0, $notrigger = 0, $batch_rule = 0)
    {
    }
    /**
     * Update price of next invoice
     *
     * @param	Translate	$langs	Translate object
     * @return 	bool				false if KO, true if OK
     */
    public function updatePriceNextInvoice(&$langs)
    {
    }
    /**
     *	Set draft status
     *
     *	@param	User	$user			Object user that modify
     *	@param	int		$idwarehouse	Id warehouse to use for stock change.
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function setDraft($user, $idwarehouse = -1)
    {
    }
    /**
     *  Add an invoice line into database (linked to product/service or not).
     *  Note: ->thirdparty must be defined.
     *  Les parameters sont deja cense etre juste et avec valeurs finales a l'appel
     *  de cette method. Aussi, pour le taux tva, il doit deja avoir ete defini
     *  par l'appelant par la method get_default_tva(societe_vendeuse,societe_acheteuse,produit)
     *  et le desc doit deja avoir la bonne valeur (a l'appelant de gerer le multilangue)
     *
     *  @param    	string		$desc            	Description of line
     *  @param    	double		$pu_ht              Unit price without tax (> 0 even for credit note)
     *  @param    	double		$qty             	Quantity
     *  @param    	double		$txtva           	Force Vat rate, -1 for auto (Can contain the vat_src_code too with syntax '9.9 (CODE)')
     *  @param		double		$txlocaltax1		Local tax 1 rate (deprecated, use instead txtva with code inside)
     *  @param		double		$txlocaltax2		Local tax 2 rate (deprecated, use instead txtva with code inside)
     *  @param    	int			$fk_product      	Id of predefined product/service
     *  @param    	double		$remise_percent  	Percent of discount on line
     *  @param    	int|string	$date_start      	Date start of service
     *  @param    	int|string	$date_end        	Date end of service
     *  @param    	int			$fk_code_ventilation   	Code of dispatching into accountancy
     *  @param    	int			$info_bits			Bits of type of lines
     *  @param    	int			$fk_remise_except	Id discount used
     *  @param		string		$price_base_type	'HT' or 'TTC'
     *  @param    	double		$pu_ttc             Unit price with tax (> 0 even for credit note)
     *  @param		int			$type				Type of line (0=product, 1=service). Not used if fk_product is defined, the type of product is used.
     *  @param      int			$rang               Position of line (-1 means last value + 1)
     *  @param		int			$special_code		Special code (also used by externals modules!)
     *  @param		string		$origin				Depend on global conf MAIN_CREATEFROM_KEEP_LINE_ORIGIN_INFORMATION can be 'orderdet', 'propaldet'..., else 'order','propal,'....
     *  @param		int			$origin_id			Depend on global conf MAIN_CREATEFROM_KEEP_LINE_ORIGIN_INFORMATION can be Id of origin object (aka line id), else object id
     *  @param		int			$fk_parent_line		Id of parent line
     *  @param		int			$fk_fournprice		Supplier price id (to calculate margin) or ''
     *  @param		int			$pa_ht				Buying price of line (to calculate margin) or ''
     *  @param		string		$label				Label of the line (deprecated, do not use)
     *  @param		array		$array_options		extrafields array
     *  @param      int         $situation_percent  Situation advance percentage
     *  @param      int         $fk_prev_id         Previous situation line id reference
     *  @param 		int|null	$fk_unit 			Code of the unit to use. Null to use the default one
     *  @param		double		$pu_ht_devise		Unit price in foreign currency
     *  @param		string		$ref_ext		    External reference of the line
     *  @param		int			$noupdateafterinsertline	No update after insert of line
     *  @return    	int             				Return integer <0 if KO, Id of line if OK
     */
    public function addline($desc, $pu_ht, $qty, $txtva, $txlocaltax1 = 0, $txlocaltax2 = 0, $fk_product = 0, $remise_percent = 0, $date_start = '', $date_end = '', $fk_code_ventilation = 0, $info_bits = 0, $fk_remise_except = 0, $price_base_type = 'HT', $pu_ttc = 0, $type = 0, $rang = -1, $special_code = 0, $origin = '', $origin_id = 0, $fk_parent_line = 0, $fk_fournprice = \null, $pa_ht = 0, $label = '', $array_options = array(), $situation_percent = 100, $fk_prev_id = 0, $fk_unit = \null, $pu_ht_devise = 0, $ref_ext = '', $noupdateafterinsertline = 0)
    {
    }
    /**
     *  Update a detail line
     *
     *  @param     	int			$rowid           	Id of line to update
     *  @param     	string		$desc            	Description of line
     *  @param     	double		$pu              	Prix unitaire (HT ou TTC selon price_base_type) (> 0 even for credit note lines)
     *  @param     	double		$qty             	Quantity
     *  @param     	double		$remise_percent  	Percentage discount of the line
     *  @param     	int		    $date_start      	Date de debut de validite du service
     *  @param     	int		    $date_end        	Date de fin de validite du service
     *  @param     	double		$txtva          	VAT Rate (Can be '8.5', '8.5 (ABC)')
     * 	@param		double		$txlocaltax1		Local tax 1 rate
     *  @param		double		$txlocaltax2		Local tax 2 rate
     * 	@param     	string		$price_base_type 	HT or TTC
     * 	@param     	int			$info_bits 		    Miscellaneous information
     * 	@param		int			$type				Type of line (0=product, 1=service)
     * 	@param		int			$fk_parent_line		Id of parent line (0 in most cases, used by modules adding sublevels into lines).
     * 	@param		int			$skip_update_total	Keep fields total_xxx to 0 (used for special lines by some modules)
     * 	@param		int			$fk_fournprice		Id of origin supplier price
     * 	@param		int			$pa_ht				Price (without tax) of product when it was bought
     * 	@param		string		$label				Label of the line (deprecated, do not use)
     * 	@param		int			$special_code		Special code (also used by externals modules!)
     *  @param		array		$array_options		extrafields array
     * 	@param      int         $situation_percent  Situation advance percentage
     * 	@param 		int|null	$fk_unit 			Code of the unit to use. Null to use the default one
     * 	@param		double		$pu_ht_devise		Unit price in currency
     * 	@param		int			$notrigger			disable line update trigger
     *  @param		string		$ref_ext		    External reference of the line
     *  @param		integer		$rang		    	rank of line
     *  @return    	int             				Return integer < 0 if KO, > 0 if OK
     */
    public function updateline($rowid, $desc, $pu, $qty, $remise_percent, $date_start, $date_end, $txtva, $txlocaltax1 = 0, $txlocaltax2 = 0, $price_base_type = 'HT', $info_bits = 0, $type = self::TYPE_STANDARD, $fk_parent_line = 0, $skip_update_total = 0, $fk_fournprice = \null, $pa_ht = 0, $label = '', $special_code = 0, $array_options = array(), $situation_percent = 100, $fk_unit = \null, $pu_ht_devise = 0, $notrigger = 0, $ref_ext = '', $rang = 0)
    {
    }
    /**
     * Check if the percent edited is lower of next invoice line
     *
     * @param	int		$idline				id of line to check
     * @param	float	$situation_percent	progress percentage need to be test
     * @return 	bool						false if KO, true if OK
     */
    public function checkProgressLine($idline, $situation_percent)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Update invoice line with percentage
     *
     * @param  FactureLigne $line       	Invoice line
     * @param  int          $percent    	Percentage
     * @param  boolean      $update_price   Update object price
     * @return void
     */
    public function update_percent($line, $percent, $update_price = \true)
    {
    }
    /**
     *	Delete line in database
     *
     *	@param		int		$rowid		Id of line to delete
     *  @param		int		$id			Id of object (for a check)
     *	@return		int					Return integer <0 if KO, >0 if OK
     */
    public function deleteLine($rowid, $id = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set percent discount
     *
     *  @deprecated
     *  @see setDiscount()
     *	@param     	User	$user		User that set discount
     *	@param     	double	$remise		Discount
     *  @param     	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return		int 				Return integer <0 if KO, >0 if OK
     */
    public function set_remise($user, $remise, $notrigger = 0)
    {
    }
    /**
     *	Set percent discount
     *
     *	@param     	User	$user		User that set discount
     *	@param     	float	$remise		Discount
     *  @param     	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return		int 				Return integer <0 if KO, >0 if OK
     */
    public function setDiscount($user, $remise, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set absolute discount
     *
     *	@param     	User	$user 		User that set discount
     *	@param     	double	$remise		Discount
     *  @param     	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return		int 				Return integer <0 if KO, >0 if OK
     */
    /*
    public function set_remise_absolue($user, $remise, $notrigger = 0)
    {
    	// phpcs:enable
    	if (empty($remise)) {
    		$remise = 0;
    	}
    
    	if ($user->hasRight('facture', 'creer')) {
    		$error = 0;
    
    		$this->db->begin();
    
    		$remise = price2num($remise);
    
    		$sql = 'UPDATE '.MAIN_DB_PREFIX.'facture';
    		$sql .= ' SET remise_absolue = '.((float) $remise);
    		$sql .= " WHERE rowid = ".((int) $this->id);
    		$sql .= ' AND fk_statut = '.self::STATUS_DRAFT;
    
    		dol_syslog(__METHOD__, LOG_DEBUG);
    		$resql = $this->db->query($sql);
    		if (!$resql) {
    			$this->errors[] = $this->db->error();
    			$error++;
    		}
    
    		if (!$error) {
    			$this->oldcopy = clone $this;
    			$this->remise_absolue = $remise;
    			$this->update_price(1);
    		}
    
    		if (!$notrigger && empty($error)) {
    			// Call trigger
    			$result = $this->call_trigger('BILL_MODIFY', $user);
    			if ($result < 0) {
    				$error++;
    			}
    			// End call triggers
    		}
    
    		if (!$error) {
    			$this->db->commit();
    			return 1;
    		} else {
    			foreach ($this->errors as $errmsg) {
    				dol_syslog(__METHOD__.' Error: '.$errmsg, LOG_ERR);
    				$this->error .= ($this->error ? ', '.$errmsg : $errmsg);
    			}
    			$this->db->rollback();
    			return -1 * $error;
    		}
    	}
    
    	return 0;
    }
    */
    /**
     *      Return next reference of customer invoice not already used (or last reference)
     *      according to numbering module defined into constant FACTURE_ADDON
     *
     *      @param	   Societe		$soc		object company
     *      @param     string		$mode		'next' for next value or 'last' for last value
     *      @return    string					free ref or last ref
     */
    public function getNextNumRef($soc, $mode = 'next')
    {
    }
    /**
     *	Load miscellaneous information for tab "Info"
     *
     *	@param  int		$id		Id of object to load
     *	@return	void
     */
    public function info($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of invoices (eventually filtered on a user) into an array
     *
     *  @param		int		$shortlist		0=Return array[id]=ref, 1=Return array[](id=>id,ref=>ref,name=>name)
     *  @param      int		$draft      	0=not draft, 1=draft
     *  @param      User	$excluser      	Object user to exclude
     *  @param    	int		$socid			Id third party
     *  @param    	int		$limit			For pagination
     *  @param    	int		$offset			For pagination
     *  @param    	string	$sortfield		Sort criteria
     *  @param    	string	$sortorder		Sort order
     *  @return     array|int             	-1 if KO, array with result if OK
     */
    public function liste_array($shortlist = 0, $draft = 0, $excluser = \null, $socid = 0, $limit = 0, $offset = 0, $sortfield = 'f.datef,f.rowid', $sortorder = 'DESC')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of invoices qualified to be replaced by another invoice.
     *	Invoices matching the following rules are returned:
     *	(Status validated or abandoned for a reason 'other') + not paid + no payment at all + not already replaced
     *
     *	@param		int			$socid		Id thirdparty
     *	@return    	array|int				Array of invoices ('id'=>id, 'ref'=>ref, 'status'=>status, 'paymentornot'=>0/1)
     */
    public function list_replacable_invoices($socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of invoices qualified to be corrected by a credit note.
     *	Invoices matching the following rules are returned:
     *	(validated + payment on process) or classified (paid completely or paid partiely) + not already replaced + not already a credit note
     *
     *	@param		int			$socid		Id thirdparty
     *	@return    	array|int				Array of invoices ($id => array('ref'=>,'paymentornot'=>,'status'=>,'paye'=>)
     */
    public function list_qualified_avoir_invoices($socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *	@param  User					$user    	Object user
     *	@return WorkboardResponse|int 				Return integer <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user)
    {
    }
    /* gestion des contacts d'une facture */
    /**
     *	Retourne id des contacts clients de facturation
     *
     *	@return     array       Liste des id contacts facturation
     */
    public function getIdBillingContact()
    {
    }
    /**
     *	Retourne id des contacts clients de livraison
     *
     *	@return     array       Liste des id contacts livraison
     */
    public function getIdShippingContact()
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *	@param	string		$option		''=Create a specimen invoice with lines, 'nolines'=No lines
     *  @return	int
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
     * 	Create an array of invoice lines
     *
     * 	@return int		>0 if OK, <0 if KO
     */
    public function getLinesArray()
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *	@param	string		$modele			Generator to use. Caller must set it to obj->model_pdf or GETPOST('model','alpha') for example.
     *	@param	Translate	$outputlangs	Object lang to use for translation
     *  @param  int			$hidedetails    Hide details of lines
     *  @param  int			$hidedesc       Hide description
     *  @param  int			$hideref        Hide ref
     *  @param  null|array  $moreparams     Array to provide more information
     *	@return int        					Return integer <0 if KO, >0 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
    /**
     * Gets the smallest reference available for a new cycle
     *
     * @return int >= 1 if OK, -1 if error
     */
    public function newCycle()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Checks if the invoice is the first of a cycle
     *
     * @return boolean
     */
    public function is_first()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Returns an array containing the previous situations as Facture objects
     *
     * @return mixed -1 if error, array of previous situations
     */
    public function get_prev_sits()
    {
    }
    /**
     * Sets the invoice as a final situation
     *
     *  @param  	User	$user    	Object user
     *  @param     	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return		int 				Return integer <0 if KO, >0 if OK
     */
    public function setFinal(\User $user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Checks if the invoice is the last in its cycle
     *
     * @return bool Last of the cycle status
     */
    public function is_last_in_cycle()
    {
    }
    /**
     * Replace a thirdparty id with another one.
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
     * Replace a product id with another one.
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
     * Is the customer invoice delayed?
     *
     * @return bool
     */
    public function hasDelay()
    {
    }
    /**
     * Currently used for documents generation : to know if retained warranty need to be displayed
     * @return bool
     */
    public function displayRetainedWarranty()
    {
    }
    /**
     * @param	int			$rounding		Minimum number of decimal to show. If 0, no change, if -1, we use min($conf->global->MAIN_MAX_DECIMALS_UNIT,$conf->global->MAIN_MAX_DECIMALS_TOT)
     * @return float or -1 if not available
     */
    public function getRetainedWarrantyAmount($rounding = -1)
    {
    }
    /**
     *  Change the retained warranty
     *
     *  @param		float		$value		value of retained warranty
     *  @return		int				>0 if OK, <0 if KO
     */
    public function setRetainedWarranty($value)
    {
    }
    /**
     *  Change the retained_warranty_date_limit
     *
     *  @param		int		$timestamp		date limit of retained warranty in timestamp format
     *  @param		string	$dateYmd		date limit of retained warranty in Y m d format
     *  @return		int				>0 if OK, <0 if KO
     */
    public function setRetainedWarrantyDateLimit($timestamp, $dateYmd = '')
    {
    }
    /**
     *  Send reminders by emails for invoices validated that are due.
     *  CAN BE A CRON TASK
     *
     *  @param	int			$nbdays				Delay before due date (or after if delay is negative)
     *  @param	string		$paymentmode		'' or 'all' by default (no filter), or 'LIQ', 'CHQ', CB', ...
     *  @param	int|string	$template			Name (or id) of email template (Must be a template of type 'facture_send')
     *  @param	string		$datetouse			'duedate' (default) or 'invoicedate'
     *  @param	string		$forcerecipient		Force email of recipient (for example to send the email to an accountant supervisor instead of the customer)
     *  @return int         					0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function sendEmailsRemindersOnInvoiceDueDate($nbdays = 0, $paymentmode = 'all', $template = '', $datetouse = 'duedate', $forcerecipient = '')
    {
    }
    /**
     * See if current invoice date is posterior to the last invoice date among validated invoices of same type.
     *
     * @param 	boolean 	$allow_validated_drafts			return true if the invoice has been validated before returning to DRAFT state.
     * @return 	array										return array
     */
    public function willBeLastOfSameType($allow_validated_drafts = \false)
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
 *	Class to manage invoice lines.
 *  Saved into database table llx_facturedet
 */
class FactureLigne extends \CommonInvoiceLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'facturedet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'facturedet';
    /**
     * @var FactureLigne
     */
    public $oldline;
    //! From llx_facturedet
    //! Id facture
    public $fk_facture;
    //! Id parent line
    public $fk_parent_line;
    //! Description ligne
    public $desc;
    public $ref_ext;
    // External reference of the line
    public $localtax1_type;
    // Local tax 1 type
    public $localtax2_type;
    // Local tax 2 type
    public $fk_remise_except;
    // Link to line into llx_remise_except
    public $rang = 0;
    public $fk_fournprice;
    public $pa_ht;
    public $marge_tx;
    public $marque_tx;
    /**
     * @var int
     */
    public $tva_npr;
    public $remise_percent;
    /**
     * @var string		To store the batch to consume in stock when using a POS module
     */
    public $batch;
    /**
     * @var string		To store the warehouse where to consume stock when using a POS module
     */
    public $fk_warehouse;
    public $origin;
    public $origin_id;
    /**
     * @var integer		Id in table llx_accounting_bookeeping to know accounting account for product line
     */
    public $fk_code_ventilation = 0;
    public $date_start;
    public $date_end;
    public $skip_update_total;
    // Skip update price total for special lines
    /**
     * @var float 		Situation advance percentage (default 100 for standard invoices)
     */
    public $situation_percent;
    /**
     * @var int 		Previous situation line id reference
     */
    public $fk_prev_id;
    /**
     *      Constructor
     *
     *      @param     DoliDB	$db      handler d'acces base de donnee
     */
    public function __construct($db)
    {
    }
    /**
     *	Load invoice line from database
     *
     *	@param	int		$rowid      id of invoice line to get
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     *	Insert line into database
     *
     *	@param      int		$notrigger		                 1 no triggers
     *  @param      int     $noerrorifdiscountalreadylinked  1=Do not make error if lines is linked to a discount and discount already linked to another
     *	@return		int						                 Return integer <0 if KO, >0 if OK
     */
    public function insert($notrigger = 0, $noerrorifdiscountalreadylinked = 0)
    {
    }
    /**
     *	Update line into database
     *
     *	@param		User	$user		User object
     *	@param		int		$notrigger	Disable triggers
     *	@return		int					Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     * Delete line in database
     *
     * @param 	User 	$tmpuser    User that deletes
     * @param 	int 	$notrigger  0=launch triggers after, 1=disable triggers
     * @return 	int		           	Return integer <0 if KO, >0 if OK
     */
    public function delete($tmpuser = \null, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update DB line fields total_xxx
     *	Used by migration
     *
     *	@return		int		Return integer <0 if KO, >0 if OK
     */
    public function update_total()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Returns situation_percent of the previous line. Used when INVOICE_USE_SITUATION = 1.
     * Warning: If invoice is a replacement invoice, this->fk_prev_id is id of the replaced line.
     *
     * @param  int     $invoiceid      			Invoice id
     * @param  bool    $include_credit_note		Include credit note or not
     * @return float|int                     	Return previous situation percent, 0 or -1 if error
     * @see get_allprev_progress()
     **/
    public function get_prev_progress($invoiceid, $include_credit_note = \true)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Returns situation_percent of all the previous line. Used when INVOICE_USE_SITUATION = 2.
     * Warning: If invoice is a replacement invoice, this->fk_prev_id is id of the replaced line.
     *
     * @param  int     $invoiceid      Invoice id
     * @param  bool    $include_credit_note		Include credit note or not
     * @return float                   >= 0
     * @see get_prev_progress()
     */
    public function get_allprev_progress($invoiceid, $include_credit_note = \true)
    {
    }
}