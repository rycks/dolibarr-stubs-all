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
     * @var int    Name of subtable line
     */
    public $table_element_line = 'facturedet';
    /**
     * @var int Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_facture';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'bill';
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
    public $socid;
    public $author;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var int ID
     */
    public $fk_user_valid;
    public $date;
    // Date invoice
    public $datem;
    public $ref_client;
    public $ref_int;
    //Check constants for types
    public $type = self::TYPE_STANDARD;
    //var $amount;
    public $remise_absolue;
    public $remise_percent;
    public $total_ht = 0;
    public $total_tva = 0;
    public $total_localtax1 = 0;
    public $total_localtax2 = 0;
    public $total_ttc = 0;
    public $revenuestamp;
    //! Fermeture apres paiement partiel: discount_vat, badcustomer, abandon
    //! Fermeture alors que aucun paiement: replaced (si remplace), abandon
    public $close_code;
    //! Commentaire si mis a paye sans paiement complet
    public $close_note;
    //! 1 if invoice paid COMPLETELY, 0 otherwise (do not use it anymore, use statut and close_code)
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
    public $date_lim_reglement;
    public $cond_reglement_code;
    // Code in llx_c_paiement
    public $mode_reglement_code;
    // Code in llx_c_paiement
    /**
     * @var int ID Field to store bank id to use when payment mode is withdraw
     */
    public $fk_bank;
    /**
     * @deprecated
     */
    public $products = array();
    /**
     * @var FactureLigne[]
     */
    public $lines = array();
    public $line;
    public $extraparams = array();
    public $specimen;
    public $fac_rec;
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
        'ref' => array('type' => 'varchar(30)', 'label' => 'Ref', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'showoncombobox' => 1, 'position' => 15),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => 1, 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 20, 'index' => 1),
        'ref_ext' => array('type' => 'varchar(255)', 'label' => 'Ref ext', 'enabled' => 1, 'visible' => 0, 'position' => 25),
        'ref_int' => array('type' => 'varchar(255)', 'label' => 'Ref int', 'enabled' => 1, 'visible' => 0, 'position' => 30),
        'type' => array('type' => 'smallint(6)', 'label' => 'Type', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 35),
        'ref_client' => array('type' => 'varchar(255)', 'label' => 'Ref client', 'enabled' => 1, 'visible' => -1, 'position' => 40),
        'increment' => array('type' => 'varchar(10)', 'label' => 'Increment', 'enabled' => 1, 'visible' => -1, 'position' => 45),
        'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 50),
        'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 55),
        'datef' => array('type' => 'date', 'label' => 'DateInvoice', 'enabled' => 1, 'visible' => -1, 'position' => 60),
        'date_valid' => array('type' => 'date', 'label' => 'DateValidation', 'enabled' => 1, 'visible' => -1, 'position' => 65),
        'date_closing' => array('type' => 'datetime', 'label' => 'Date closing', 'enabled' => 1, 'visible' => -1, 'position' => 70),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 75),
        'paye' => array('type' => 'smallint(6)', 'label' => 'InvoicePaidCompletely', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 80),
        //'amount' =>array('type'=>'double(24,8)', 'label'=>'Amount', 'enabled'=>1, 'visible'=>-1, 'notnull'=>1, 'position'=>85),
        'remise_percent' => array('type' => 'double', 'label' => 'Remise percent', 'enabled' => 1, 'visible' => -1, 'position' => 90),
        'remise_absolue' => array('type' => 'double', 'label' => 'Remise absolue', 'enabled' => 1, 'visible' => -1, 'position' => 95),
        'remise' => array('type' => 'double', 'label' => 'Remise', 'enabled' => 1, 'visible' => -1, 'position' => 100),
        'close_code' => array('type' => 'varchar(16)', 'label' => 'EarlyClosingReason', 'enabled' => 1, 'visible' => -1, 'position' => 105),
        'close_note' => array('type' => 'varchar(128)', 'label' => 'EarlyClosingComment', 'enabled' => 1, 'visible' => -1, 'position' => 110),
        'tva' => array('type' => 'double(24,8)', 'label' => 'TotalVAT', 'enabled' => 1, 'visible' => -1, 'position' => 115, 'isameasure' => 1),
        'localtax1' => array('type' => 'double(24,8)', 'label' => 'Localtax1', 'enabled' => 1, 'visible' => -1, 'position' => 120, 'isameasure' => 1),
        'localtax2' => array('type' => 'double(24,8)', 'label' => 'Localtax2', 'enabled' => 1, 'visible' => -1, 'position' => 125, 'isameasure' => 1),
        'revenuestamp' => array('type' => 'double(24,8)', 'label' => 'RevenueStamp', 'enabled' => 1, 'visible' => -1, 'position' => 130, 'isameasure' => 1),
        'total' => array('type' => 'double(24,8)', 'label' => 'TotalHT', 'enabled' => 1, 'visible' => -1, 'position' => 135, 'isameasure' => 1),
        'total_ttc' => array('type' => 'double(24,8)', 'label' => 'TotalTTC', 'enabled' => 1, 'visible' => -1, 'position' => 140, 'isameasure' => 1),
        'fk_statut' => array('type' => 'smallint(6)', 'label' => 'Status', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 500, 'arrayofkeyval' => array(0 => 'Draft', 1 => 'Validated', 2 => 'Paid', 3 => 'Abandonned')),
        'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -1, 'position' => 150),
        'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 155),
        'fk_user_valid' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserValidation', 'enabled' => 1, 'visible' => -1, 'position' => 160),
        'fk_user_closing' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserClosing', 'enabled' => 1, 'visible' => -1, 'position' => 165),
        'fk_facture_source' => array('type' => 'integer', 'label' => 'SourceInvoice', 'enabled' => 1, 'visible' => -1, 'position' => 170),
        'fk_projet' => array('type' => 'integer:Project:projet/class/project.class.php:1:fk_statut=1', 'label' => 'Project', 'enabled' => 1, 'visible' => -1, 'position' => 175),
        'fk_account' => array('type' => 'integer', 'label' => 'Fk account', 'enabled' => 1, 'visible' => -1, 'position' => 180),
        'fk_currency' => array('type' => 'varchar(3)', 'label' => 'CurrencyCode', 'enabled' => 1, 'visible' => -1, 'position' => 185),
        'fk_cond_reglement' => array('type' => 'integer', 'label' => 'PaymentTerm', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 190),
        'fk_mode_reglement' => array('type' => 'integer', 'label' => 'PaymentMode', 'enabled' => 1, 'visible' => -1, 'position' => 195),
        'date_lim_reglement' => array('type' => 'date', 'label' => 'DateDue', 'enabled' => 1, 'visible' => -1, 'position' => 200),
        'note_private' => array('type' => 'text', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 205),
        'note_public' => array('type' => 'text', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 210),
        'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 215),
        'extraparams' => array('type' => 'varchar(255)', 'label' => 'Extraparams', 'enabled' => 1, 'visible' => -1, 'position' => 225),
        'situation_cycle_ref' => array('type' => 'smallint(6)', 'label' => 'Situation cycle ref', 'enabled' => '$conf->global->INVOICE_USE_SITUATION', 'visible' => -1, 'position' => 230),
        'situation_counter' => array('type' => 'smallint(6)', 'label' => 'Situation counter', 'enabled' => '$conf->global->INVOICE_USE_SITUATION', 'visible' => -1, 'position' => 235),
        'situation_final' => array('type' => 'smallint(6)', 'label' => 'Situation final', 'enabled' => 'empty($conf->global->INVOICE_USE_SITUATION) ? 0 : 1', 'visible' => -1, 'position' => 240),
        'retained_warranty' => array('type' => 'double', 'label' => 'Retained warranty', 'enabled' => '$conf->global->INVOICE_USE_SITUATION_RETAINED_WARRANTY', 'visible' => -1, 'position' => 245),
        'retained_warranty_date_limit' => array('type' => 'date', 'label' => 'Retained warranty date limit', 'enabled' => '$conf->global->INVOICE_USE_SITUATION_RETAINED_WARRANTY', 'visible' => -1, 'position' => 250),
        'retained_warranty_fk_cond_reglement' => array('type' => 'integer', 'label' => 'Retained warranty fk cond reglement', 'enabled' => '$conf->global->INVOICE_USE_SITUATION_RETAINED_WARRANTY', 'visible' => -1, 'position' => 255),
        'fk_incoterms' => array('type' => 'integer', 'label' => 'IncotermsCode', 'enabled' => '$conf->incoterm->enabled', 'visible' => -1, 'position' => 260),
        'location_incoterms' => array('type' => 'varchar(255)', 'label' => 'IncotermsLocation', 'enabled' => '$conf->incoterm->enabled', 'visible' => -1, 'position' => 265),
        'date_pointoftax' => array('type' => 'date', 'label' => 'DatePointOfTax', 'enabled' => '$conf->global->INVOICE_POINTOFTAX_DATE', 'visible' => -1, 'position' => 270),
        'fk_multicurrency' => array('type' => 'integer', 'label' => 'MulticurrencyID', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 275),
        'multicurrency_code' => array('type' => 'varchar(255)', 'label' => 'MulticurrencyCode', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 280),
        'multicurrency_tx' => array('type' => 'double(24,8)', 'label' => 'MulticurrencyRate', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 285),
        'multicurrency_total_ht' => array('type' => 'double(24,8)', 'label' => 'Multicurrency total ht', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 290),
        'multicurrency_total_tva' => array('type' => 'double(24,8)', 'label' => 'Multicurrency total tva', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 295),
        'multicurrency_total_ttc' => array('type' => 'double(24,8)', 'label' => 'Multicurrency total ttc', 'enabled' => '$conf->multicurrency->enabled', 'visible' => -1, 'position' => 300),
        'fk_fac_rec_source' => array('type' => 'integer', 'label' => 'RecurringInvoiceSource', 'enabled' => 1, 'visible' => -1, 'position' => 305),
        'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'Last main doc', 'enabled' => 1, 'visible' => -1, 'position' => 310),
        'module_source' => array('type' => 'varchar(32)', 'label' => 'POSModule', 'enabled' => 1, 'visible' => -1, 'position' => 315),
        'pos_source' => array('type' => 'varchar(32)', 'label' => 'POSTerminal', 'enabled' => 1, 'visible' => -1, 'position' => 320),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 220),
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
    // Abandonned remain - escompte
    const CLOSECODE_BADDEBT = 'badcustomer';
    // Abandonned - bad
    const CLOSECODE_ABANDONED = 'abandon';
    // Abandonned - other
    const CLOSECODE_REPLACED = 'replaced';
    // Closed after doing a replacement invoice
    /**
     * 	Constructor
     *
     * 	@param	DoliDB		$db			Database handler
     */
    public function __construct($db)
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
     *	@return	int						<0 if KO, >0 if OK
     */
    public function create(\User $user, $notrigger = 0, $forceduedate = 0)
    {
    }
    /**
     *	Create a new invoice in database from current invoice
     *
     *	@param      User	$user    		Object user that ask creation
     *	@param		int		$invertdetail	Reverse sign of amounts for lines
     *	@return		int						<0 if KO, >0 if OK
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
     *  @return     int             					<0 if KO, 0 if nothing done, 1 if OK
     */
    public function createFromOrder($object, \User $user)
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
     *	Get object and lines from database
     *
     *	@param      int		$rowid       	Id of object to load
     * 	@param		string	$ref			Reference of invoice
     * 	@param		string	$ref_ext		External reference of invoice
     * 	@param		int		$ref_int		Internal reference of other object
     *  @param		bool	$fetch_situation	Fetch the previous and next situation in $tab_previous_situation_invoice and $tab_next_situation_invoice
     *	@return     int         			>0 if OK, <0 if KO, 0 if not found
     */
    public function fetch($rowid, $ref = '', $ref_ext = '', $ref_int = '', $fetch_situation = \false)
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
     *      @return     int      			   	<0 if KO, >0 if OK
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
     *	@return		int						<0 if KO, >0 if OK
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
     *	@return		int						<0 if KO, 0=Refused, >0 if OK
     */
    public function delete($user, $notrigger = 0, $idwarehouse = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Tag la facture comme paye completement (si close_code non renseigne) => this->fk_statut=2, this->paye=1
     *  ou partiellement (si close_code renseigne) + appel trigger BILL_PAYED => this->fk_statut=2, this->paye stay 0
     *
     *  @param	User	$user      	Objet utilisateur qui modifie
     *	@param  string	$close_code	Code renseigne si on classe a payee completement alors que paiement incomplet (cas escompte par exemple)
     *	@param  string	$close_note	Commentaire renseigne si on classe a payee alors que paiement incomplet (cas escompte par exemple)
     *  @return int         		<0 if KO, >0 if OK
     */
    public function set_paid($user, $close_code = '', $close_note = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Tag la facture comme non payee completement + appel trigger BILL_UNPAYED
     *	Fonction utilisee quand un paiement prelevement est refuse,
     * 	ou quand une facture annulee et reouverte.
     *
     *  @param	User	$user       Object user that change status
     *  @return int         		<0 if KO, >0 if OK
     */
    public function set_unpaid($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Tag invoice as canceled, with no payment on it (example for replacement invoice or payment never received) + call trigger BILL_CANCEL
     *	Warning, if option to decrease stock on invoice was set, this function does not change stock (it might be a cancel because
     *  of no payment even if merchandises were sent).
     *
     *	@param	User	$user        	Object user making change
     *	@param	string	$close_code		Code of closing invoice (CLOSECODE_REPLACED, CLOSECODE_...)
     *	@param	string	$close_note		Comment
     *	@return int         			<0 if KO, >0 if OK
     */
    public function set_canceled($user, $close_code = '', $close_note = '')
    {
    }
    /**
     * Tag invoice as validated + call trigger BILL_VALIDATE
     * Object must have lines loaded with fetch_lines
     *
     * @param	User	$user           Object user that validate
     * @param   string	$force_number	Reference to force on invoice
     * @param	int		$idwarehouse	Id of warehouse to use for stock decrease if option to decreasenon stock is on (0=no decrease)
     * @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     * @return	int						<0 if KO, 0=Nothing done because invoice is not a draft, >0 if OK
     */
    public function validate($user, $force_number = '', $idwarehouse = 0, $notrigger = 0)
    {
    }
    /**
     * Update price of next invoice
     *
     * @param	Translate	$langs	Translate object
     * @return bool		false if KO, true if OK
     */
    public function updatePriceNextInvoice(&$langs)
    {
    }
    /**
     *	Set draft status
     *
     *	@param	User	$user			Object user that modify
     *	@param	int		$idwarehouse	Id warehouse to use for stock change.
     *	@return	int						<0 if KO, >0 if OK
     */
    public function setDraft($user, $idwarehouse = -1)
    {
    }
    /**
     *  Add an invoice line into database (linked to product/service or not).
     *  Les parametres sont deja cense etre juste et avec valeurs finales a l'appel
     *  de cette methode. Aussi, pour le taux tva, il doit deja avoir ete defini
     *  par l'appelant par la methode get_default_tva(societe_vendeuse,societe_acheteuse,produit)
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
     *  @param    	int			$date_start      	Date start of service
     *  @param    	int			$date_end        	Date end of service
     *  @param    	int			$ventil          	Code of dispatching into accountancy
     *  @param    	int			$info_bits			Bits of type of lines
     *  @param    	int			$fk_remise_except	Id discount used
     *  @param		string		$price_base_type	'HT' or 'TTC'
     *  @param    	double		$pu_ttc             Unit price with tax (> 0 even for credit note)
     *  @param		int			$type				Type of line (0=product, 1=service). Not used if fk_product is defined, the type of product is used.
     *  @param      int			$rang               Position of line
     *  @param		int			$special_code		Special code (also used by externals modules!)
     *  @param		string		$origin				'order', ...
     *  @param		int			$origin_id			Id of origin object
     *  @param		int			$fk_parent_line		Id of parent line
     *  @param		int			$fk_fournprice		Supplier price id (to calculate margin) or ''
     *  @param		int			$pa_ht				Buying price of line (to calculate margin) or ''
     *  @param		string		$label				Label of the line (deprecated, do not use)
     *  @param		array		$array_options		extrafields array
     *  @param      int         $situation_percent  Situation advance percentage
     *  @param      int         $fk_prev_id         Previous situation line id reference
     *  @param 		string		$fk_unit 			Code of the unit to use. Null to use the default one
     *  @param		double		$pu_ht_devise		Unit price in currency
     *  @return    	int             				<0 if KO, Id of line if OK
     */
    public function addline($desc, $pu_ht, $qty, $txtva, $txlocaltax1 = 0, $txlocaltax2 = 0, $fk_product = 0, $remise_percent = 0, $date_start = '', $date_end = '', $ventil = 0, $info_bits = 0, $fk_remise_except = '', $price_base_type = 'HT', $pu_ttc = 0, $type = self::TYPE_STANDARD, $rang = -1, $special_code = 0, $origin = '', $origin_id = 0, $fk_parent_line = 0, $fk_fournprice = \null, $pa_ht = 0, $label = '', $array_options = 0, $situation_percent = 100, $fk_prev_id = 0, $fk_unit = \null, $pu_ht_devise = 0)
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
     * 	@param     	int			$info_bits 		    Miscellaneous informations
     * 	@param		int			$type				Type of line (0=product, 1=service)
     * 	@param		int			$fk_parent_line		Id of parent line (0 in most cases, used by modules adding sublevels into lines).
     * 	@param		int			$skip_update_total	Keep fields total_xxx to 0 (used for special lines by some modules)
     * 	@param		int			$fk_fournprice		Id of origin supplier price
     * 	@param		int			$pa_ht				Price (without tax) of product when it was bought
     * 	@param		string		$label				Label of the line (deprecated, do not use)
     * 	@param		int			$special_code		Special code (also used by externals modules!)
     *  @param		array		$array_options		extrafields array
     * 	@param      int         $situation_percent  Situation advance percentage
     * 	@param 		string		$fk_unit 			Code of the unit to use. Null to use the default one
     * 	@param		double		$pu_ht_devise		Unit price in currency
     * 	@param		int			$notrigger			disable line update trigger
     *  @return    	int             				< 0 if KO, > 0 if OK
     */
    public function updateline($rowid, $desc, $pu, $qty, $remise_percent, $date_start, $date_end, $txtva, $txlocaltax1 = 0, $txlocaltax2 = 0, $price_base_type = 'HT', $info_bits = 0, $type = self::TYPE_STANDARD, $fk_parent_line = 0, $skip_update_total = 0, $fk_fournprice = \null, $pa_ht = 0, $label = '', $special_code = 0, $array_options = 0, $situation_percent = 100, $fk_unit = \null, $pu_ht_devise = 0, $notrigger = 0)
    {
    }
    /**
     * Check if the percent edited is lower of next invoice line
     *
     * @param	int		$idline				id of line to check
     * @param	float	$situation_percent	progress percentage need to be test
     * @return false if KO, true if OK
     */
    public function checkProgressLine($idline, $situation_percent)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Update invoice line with percentage
     *
     * @param  FactureLigne $line       Invoice line
     * @param  int          $percent    Percentage
     * @return void
     */
    public function update_percent($line, $percent)
    {
    }
    /**
     *	Delete line in database
     *
     *	@param		int		$rowid		Id of line to delete
     *	@return		int					<0 if KO, >0 if OK
     */
    public function deleteline($rowid)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set percent discount
     *
     *	@param     	User	$user		User that set discount
     *	@param     	double	$remise		Discount
     *  @param     	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return		int 		<0 if ko, >0 if ok
     */
    public function set_remise($user, $remise, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set absolute discount
     *
     *	@param     	User	$user 		User that set discount
     *	@param     	double	$remise		Discount
     *  @param     	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return		int 				<0 if KO, >0 if OK
     */
    public function set_remise_absolue($user, $remise, $notrigger = 0)
    {
    }
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
     *  @param      User	$excluser      	Objet user to exclude
     *  @param    	int		$socid			Id third pary
     *  @param    	int		$limit			For pagination
     *  @param    	int		$offset			For pagination
     *  @param    	string	$sortfield		Sort criteria
     *  @param    	string	$sortorder		Sort order
     *  @return     array|int             	-1 if KO, array with result if OK
     */
    public function liste_array($shortlist = 0, $draft = 0, $excluser = '', $socid = 0, $limit = 0, $offset = 0, $sortfield = 'f.datef,f.rowid', $sortorder = 'DESC')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of invoices qualified to be replaced by another invoice.
     *	Invoices matching the following rules are returned:
     *	(Status validated or abandonned for a reason 'other') + not payed + no payment at all + not already replaced
     *
     *	@param		int		$socid		Id thirdparty
     *	@return    	array|int			Array of invoices ('id'=>id, 'ref'=>ref, 'status'=>status, 'paymentornot'=>0/1)
     */
    public function list_replacable_invoices($socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return list of invoices qualified to be corrected by a credit note.
     *	Invoices matching the following rules are returned:
     *	(validated + payment on process) or classified (payed completely or payed partiely) + not already replaced + not already a credit note
     *
     *	@param		int		$socid		Id thirdparty
     *	@return    	array				Array of invoices ($id => array('ref'=>,'paymentornot'=>,'status'=>,'paye'=>)
     */
    public function list_qualified_avoir_invoices($socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Create a withdrawal request for a standing order.
     *  Use the remain to pay excluding all existing open direct debit requests.
     *
     *	@param      User	$fuser      User asking the direct debit transfer
     *  @param		float	$amount		Amount we request direct debit for
     *	@return     int         		<0 if KO, >0 if OK
     */
    public function demande_prelevement($fuser, $amount = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Supprime une demande de prelevement
     *
     *  @param  User	$fuser      User making delete
     *  @param  int		$did        id de la demande a supprimer
     *  @return	int					<0 if OK, >0 if KO
     */
    public function demande_prelevement_delete($fuser, $did)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *	@param  User		$user    	Object user
     *	@return WorkboardResponse|int 	<0 if KO, WorkboardResponse if OK
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
     *  @return	void
     */
    public function initAsSpecimen($option = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @return         int     <0 if KO, >0 if OK
     */
    public function load_state_board()
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
     *	@param	string		$modele			Generator to use. Caller must set it to obj->modelpdf or GETPOST('modelpdf','alpha') for example.
     *	@param	Translate	$outputlangs	objet lang a utiliser pour traduction
     *  @param  int			$hidedetails    Hide details of lines
     *  @param  int			$hidedesc       Hide description
     *  @param  int			$hideref        Hide ref
     *  @param   null|array  $moreparams     Array to provide more information
     *	@return int        					<0 if KO, >0 if OK
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
     *	@return		int 				<0 if KO, >0 if OK
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
     * Function used to replace a thirdparty id with another one.
     *
     * @param  DoliDB  $db             Database handler
     * @param  int     $origin_id      Old third-party id
     * @param  int     $dest_id        New third-party id
     * @return bool
     */
    public static function replaceThirdparty(\DoliDB $db, $origin_id, $dest_id)
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
     * @param	int			$rounding		Minimum number of decimal to show. If 0, no change, if -1, we use min($conf->global->MAIN_MAX_DECIMALS_UNIT,$conf->global->MAIN_MAX_DECIMALS_TOT)
     * @return number or -1 if not available
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
    public function setRetainedWarrantyDateLimit($timestamp, $dateYmd = \false)
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
    public $oldline;
    //! From llx_facturedet
    //! Id facture
    public $fk_facture;
    //! Id parent line
    public $fk_parent_line;
    /**
     * @deprecated
     */
    public $label;
    //! Description ligne
    public $desc;
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
    public $remise_percent;
    public $special_code;
    // Liste d'options non cumulabels:
    // 1: frais de port
    // 2: ecotaxe
    // 3: ??
    public $origin;
    public $origin_id;
    public $fk_code_ventilation = 0;
    public $date_start;
    public $date_end;
    // From llx_product
    /**
     * @deprecated
     * @see $product_ref
     */
    public $ref;
    // Product ref (deprecated)
    public $product_ref;
    // Product ref
    /**
     * @deprecated
     * @see $product_label
     */
    public $libelle;
    // Product label (deprecated)
    public $product_label;
    // Product label
    public $product_desc;
    // Description produit
    public $skip_update_total;
    // Skip update price total for special lines
    /**
     * @var int Situation advance percentage
     */
    public $situation_percent;
    /**
     * @var int Previous situation line id reference
     */
    public $fk_prev_id;
    // Multicurrency
    public $fk_multicurrency;
    public $multicurrency_code;
    public $multicurrency_subprice;
    public $multicurrency_total_ht;
    public $multicurrency_total_tva;
    public $multicurrency_total_ttc;
    /**
     *	Load invoice line from database
     *
     *	@param	int		$rowid      id of invoice line to get
     *	@return	int					<0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     *	Insert line into database
     *
     *	@param      int		$notrigger		                 1 no triggers
     *  @param      int     $noerrorifdiscountalreadylinked  1=Do not make error if lines is linked to a discount and discount already linked to another
     *	@return		int						                 <0 if KO, >0 if OK
     */
    public function insert($notrigger = 0, $noerrorifdiscountalreadylinked = 0)
    {
    }
    /**
     *	Update line into database
     *
     *	@param		User	$user		User object
     *	@param		int		$notrigger	Disable triggers
     *	@return		int					<0 if KO, >0 if OK
     */
    public function update($user = '', $notrigger = 0)
    {
    }
    /**
     * 	Delete line in database
     *  TODO Add param User $user and notrigger (see skeleton)
     *
     *	@return	    int		           <0 if KO, >0 if OK
     */
    public function delete()
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Returns situation_percent of the previous line.
     * Warning: If invoice is a replacement invoice, this->fk_prev_id is id of the replaced line.
     *
     * @param  int     $invoiceid      Invoice id
     * @param  bool    $include_credit_note		Include credit note or not
     * @return int                     >= 0
     */
    public function get_prev_progress($invoiceid, $include_credit_note = \true)
    {
    }
}