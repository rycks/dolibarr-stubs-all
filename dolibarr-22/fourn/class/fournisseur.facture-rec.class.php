<?php

/**
 *	Class to manage invoice templates
 */
class FactureFournisseurRec extends \CommonInvoice
{
    const TRIGGER_PREFIX = 'SUPPLIERBILLREC';
    /**
     * @var string ID to identify managed object
     */
    public $element = 'invoice_supplier_rec';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'facture_fourn_rec';
    /**
     * @var string    Name of subtable line
     */
    public $table_element_line = 'facture_fourn_det_rec';
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_facture_fourn';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'bill';
    /**
     * {@inheritdoc}
     */
    protected $table_ref_field = 'titre';
    /**
     * @var string 	The ref of the recurring invoice
     * @deprecated	Use $title
     */
    public $titre;
    /**
     * @var string 	The ref of the recurring invoice
     */
    public $title;
    /**
     * @var string
     */
    public $ref_supplier;
    /**
     * @var int
     */
    public $socid;
    /**
     * @var int
     * @deprecated
     */
    public $fk_soc;
    /**
     * @var int
     */
    public $suspended;
    // status
    /**
     * @var string		Label of invoice
     * @deprecated		Use $label
     */
    public $libelle;
    /**
     * @var string		Label of invoice
     */
    public $label;
    /**
     * @var float
     * @deprecated
     */
    public $amount;
    /**
     * @var float
     * @deprecated
     */
    public $remise;
    /**
     * @var string
     */
    public $vat_src_code;
    /**
     * @var float
     */
    public $localtax1;
    /**
     * @var float
     */
    public $localtax2;
    /**
     * @var User
     */
    public $user_author;
    /**
     * @var int
     */
    public $user_modif;
    /**
     * @var int
     */
    public $fk_project;
    /**
     * @var ?int 	Payment method ID (cheque, cash, ...)
     */
    public $mode_reglement_id;
    /**
     * @var string
     */
    public $mode_reglement_code;
    /**
     * @var string
     */
    public $cond_reglement_code;
    /**
     * @var string
     */
    public $cond_reglement_doc;
    /**
     * @var int 	Payment term ID
     */
    public $cond_reglement_id;
    /**
     * @var int 	Deadline for payment
     */
    public $date_lim_reglement;
    /**
     * @var int<0,1>
     */
    public $usenewprice = 0;
    /**
     * @var ?int
     */
    public $frequency;
    /**
     * @var string
     */
    public $unit_frequency;
    /**
     * @var ?int
     */
    public $date_when;
    /**
     * @var ?int
     */
    public $date_last_gen;
    /**
     * @var int nb generation done
     */
    public $nb_gen_done;
    /**
     * @var int nb generation max
     */
    public $nb_gen_max;
    /**
     * @var int<0,1> auto validate 0 to create in draft, 1 to create and validate the new invoice
     */
    public $auto_validate;
    //
    /**
     * @var ?int<0,1>
     */
    public $generate_pdf;
    // 1 to generate PDF on invoice generation (default)
    /**
     * Invoice lines
     * @var CommonInvoiceLine[]
     */
    public $lines = array();
    /* Override fields in CommonObject
    	public $entity;
    	public $total_ht;
    	public $total_tva;
    	public $total_ttc;
    	public $fk_account;
    	public $mode_reglement;
    	public $cond_reglement;
    	public $note_public;
    	public $note_private;
    	*/
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
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-6,6>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10), 'titre' => array('type' => 'varchar(100)', 'label' => 'Titre', 'enabled' => 1, 'showoncombobox' => 1, 'visible' => -1, 'position' => 15), 'ref_supplier' => array('type' => 'varchar(180)', 'label' => 'RefSupplier', 'enabled' => 1, 'showoncombobox' => 1, 'visible' => -1, 'position' => 20), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => '1', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 25, 'index' => 1), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'enabled' => 'isModEnabled("societe")', 'visible' => -1, 'notnull' => 1, 'position' => 30), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 35), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 40), 'suspended' => array('type' => 'integer', 'label' => 'Suspended', 'enabled' => 1, 'visible' => -1, 'position' => 225), 'libelle' => array('type' => 'varchar(100)', 'label' => 'Libelle', 'enabled' => 1, 'showoncombobox' => 0, 'visible' => -1, 'position' => 15), 'localtax1' => array('type' => 'double(24,8)', 'label' => 'Localtax1', 'enabled' => 1, 'visible' => -1, 'position' => 60, 'isameasure' => 1), 'localtax2' => array('type' => 'double(24,8)', 'label' => 'Localtax2', 'enabled' => 1, 'visible' => -1, 'position' => 65, 'isameasure' => 1), 'total_ht' => array('type' => 'double(24,8)', 'label' => 'Total', 'enabled' => 1, 'visible' => -1, 'position' => 70, 'isameasure' => 1), 'total_tva' => array('type' => 'double(24,8)', 'label' => 'Tva', 'enabled' => 1, 'visible' => -1, 'position' => 55, 'isameasure' => 1), 'total_ttc' => array('type' => 'double(24,8)', 'label' => 'Total ttc', 'enabled' => 1, 'visible' => -1, 'position' => 75, 'isameasure' => 1), 'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Fk user author', 'enabled' => 1, 'visible' => -1, 'position' => 80), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 210), 'fk_projet' => array('type' => 'integer:Project:projet/class/project.class.php:1:fk_statut=1', 'label' => 'Fk projet', 'enabled' => "isModEnabled('project')", 'visible' => -1, 'position' => 85), 'fk_account' => array('type' => 'integer', 'label' => 'Fk account', 'enabled' => 'isModEnabled("bank")', 'visible' => -1, 'position' => 175), 'fk_cond_reglement' => array('type' => 'integer', 'label' => 'Fk cond reglement', 'enabled' => 1, 'visible' => -1, 'position' => 90), 'fk_mode_reglement' => array('type' => 'integer', 'label' => 'Fk mode reglement', 'enabled' => 1, 'visible' => -1, 'position' => 95), 'date_lim_reglement' => array('type' => 'date', 'label' => 'Date lim reglement', 'enabled' => 1, 'visible' => -1, 'position' => 100), 'note_private' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 105), 'note_public' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 110), 'modelpdf' => array('type' => 'varchar(255)', 'label' => 'Modelpdf', 'enabled' => 1, 'visible' => -1, 'position' => 115), 'fk_multicurrency' => array('type' => 'integer', 'label' => 'Fk multicurrency', 'enabled' => 1, 'visible' => -1, 'position' => 180), 'multicurrency_code' => array('type' => 'varchar(255)', 'label' => 'Multicurrency code', 'enabled' => 1, 'visible' => -1, 'position' => 185), 'multicurrency_tx' => array('type' => 'double(24,8)', 'label' => 'Multicurrency tx', 'enabled' => 1, 'visible' => -1, 'position' => 190, 'isameasure' => 1), 'multicurrency_total_ht' => array('type' => 'double(24,8)', 'label' => 'Multicurrency total ht', 'enabled' => 1, 'visible' => -1, 'position' => 195, 'isameasure' => 1), 'multicurrency_total_tva' => array('type' => 'double(24,8)', 'label' => 'Multicurrency total tva', 'enabled' => 1, 'visible' => -1, 'position' => 200, 'isameasure' => 1), 'multicurrency_total_ttc' => array('type' => 'double(24,8)', 'label' => 'Multicurrency total ttc', 'enabled' => 1, 'visible' => -1, 'position' => 205, 'isameasure' => 1), 'usenewprice' => array('type' => 'integer', 'label' => 'UseNewPrice', 'enabled' => 1, 'visible' => 0, 'position' => 155), 'frequency' => array('type' => 'integer', 'label' => 'Frequency', 'enabled' => 1, 'visible' => -1, 'position' => 150), 'unit_frequency' => array('type' => 'varchar(2)', 'label' => 'Unit frequency', 'enabled' => 1, 'visible' => -1, 'position' => 125), 'date_when' => array('type' => 'datetime', 'label' => 'Date when', 'enabled' => 1, 'visible' => -1, 'position' => 130), 'date_last_gen' => array('type' => 'datetime', 'label' => 'Date last gen', 'enabled' => 1, 'visible' => -1, 'position' => 135), 'nb_gen_done' => array('type' => 'integer', 'label' => 'Nb gen done', 'enabled' => 1, 'visible' => -1, 'position' => 140), 'nb_gen_max' => array('type' => 'integer', 'label' => 'Nb gen max', 'enabled' => 1, 'visible' => -1, 'position' => 145), 'revenuestamp' => array('type' => 'double(24,8)', 'label' => 'RevenueStamp', 'enabled' => 1, 'visible' => -1, 'position' => 160, 'isameasure' => 1), 'auto_validate' => array('type' => 'integer', 'label' => 'Auto validate', 'enabled' => 1, 'visible' => -1, 'position' => 165), 'generate_pdf' => array('type' => 'integer', 'label' => 'Generate pdf', 'enabled' => 1, 'visible' => -1, 'position' => 170));
    // END MODULEBUILDER PROPERTIES
    const STATUS_NOTSUSPENDED = 0;
    const STATUS_SUSPENDED = 1;
    /**
     *	Constructor
     *
     * 	@param		DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *    Create a predefined supplier invoice
     *
     * @param 	User		$user 			User object
     * @param 	int			$facFournId		Id invoice
     * @param 	int<0,1> 	$notrigger 		No trigger
     *  @param	int[]		$onlylines		Only the lines of the array
     * @return	int			            	Return integer <0 if KO, id of invoice created if OK
     */
    public function create($user, $facFournId, $notrigger = 0, $onlylines = array())
    {
    }
    /**
     * 	Update fourn_invoice_rec.
     *
     *  @param		User		$user				User
     *  @param		int<0,1>	$notrigger			No trigger
     *	@return    	int             				Return integer <0 if KO, Id of line if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Load object and lines
     *
     *	@param      int		$rowid       	Id of object to load
     * 	@param		string	$ref			Reference of recurring invoice
     * 	@param		string	$ref_ext		External reference of invoice
     *	@return     int         			>0 if OK, <0 if KO, 0 if not found
     */
    public function fetch($rowid, $ref = '', $ref_ext = '')
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Get lines of template invoices into this->lines
     *
     *  @return     int         1 if OK, < 0 if KO
     */
    public function fetch_lines()
    {
    }
    /**
     * 	Delete template invoice
     *
     *	@param     	User		$user          	User that delete.
     *	@param		int<0,1>	$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@param		int			$idwarehouse	Id warehouse to use for stock change.
     *	@return		int							Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0, $idwarehouse = -1)
    {
    }
    /**
     * Add a line to recursive supplier invoice
     *
     * @param int 		$fk_product 	Product/Service ID predefined
     * @param string 	$ref			Ref
     * @param string 	$label			Label
     * @param string 	$desc 			Description de la ligne
     * @param float		$pu_ht			Unit price
     * @param float		$pu_ttc			Unit price with tax
     * @param float		$qty 			Quantity
     * @param float		$remise_percent Percentage discount of the line
     * @param float		$txtva 			Taux de tva force, sinon -1
     * @param float		$txlocaltax1 	Local tax 1 rate (deprecated)
     * @param float		$txlocaltax2 	Local tax 2 rate (deprecated)
     * @param string 	$price_base_type HT or TTC
     * @param int<0,1>	$type 			Type of line (0=product, 1=service)
     * @param int 		$date_start		Date start
     * @param int 		$date_end		Date end
     * @param int 		$info_bits 		VAT npr or not ?
     * @param int 		$special_code 	Special code
     * @param int 		$rang 			Position of line
     * @param ?int	 	$fk_unit 		Unit
     * @param float 	$pu_ht_devise 	Unit price in currency
     * @return int                  	Return integer <0 if KO, Id of line if OK
     * @throws Exception
     */
    public function addline($fk_product, $ref, $label, $desc, $pu_ht, $pu_ttc, $qty, $remise_percent, $txtva, $txlocaltax1 = 0, $txlocaltax2 = 0, $price_base_type = 'HT', $type = 0, $date_start = 0, $date_end = 0, $info_bits = 0, $special_code = 0, $rang = -1, $fk_unit = \null, $pu_ht_devise = 0)
    {
    }
    /**
     * Update a line to supplier invoice template
     *
     * @param int		$rowid				ID
     * @param int 		$fk_product 		Product/Service ID predefined
     * @param string	$ref				Ref
     * @param string 	$label 				Label of the line
     * @param string 	$desc 				Description de la ligne
     * @param float		$pu_ht 				Unit price HT (> 0 even for credit note)
     * @param float		$qty 				Quantity
     * @param int 		$remise_percent 	Percentage discount of the line
     * @param float		$txtva 				VAT rate forced with format '5.0 (XXX)', or -1
     * @param int 		$txlocaltax1 		Local tax 1 rate (deprecated)
     * @param int 		$txlocaltax2 		Local tax 2 rate (deprecated)
     * @param string 	$price_base_type 	HT or TTC
     * @param int<0,1>	$type 				Type of line (0=product, 1=service)
     * @param int 		$date_start			Date start
     * @param int 		$date_end			Date end
     * @param int 		$info_bits 			Bits of type of lines
     * @param int 		$special_code 		Special code
     * @param int 		$rang 				Position of line
     * @param string 	$fk_unit 			Unit
     * @param float		$pu_ht_devise 		Unit price in currency
     * @param float		$pu_ttc             Unit price TTC (> 0 even for credit note)
     * @return int  		                Return integer <0 if KO, Id of line if OK
     * @throws Exception
     */
    public function updateline($rowid, $fk_product, $ref, $label, $desc, $pu_ht, $qty, $remise_percent, $txtva, $txlocaltax1 = 0, $txlocaltax2 = 0, $price_base_type = 'HT', $type = 0, $date_start = 0, $date_end = 0, $info_bits = 0, $special_code = 0, $rang = -1, $fk_unit = \null, $pu_ht_devise = 0, $pu_ttc = 0)
    {
    }
    /**
     * Return next reference of invoice not already used (or last reference)
     *
     * @param	 Societe		$soc		Thirdparty object
     * @param    'next'|'last'	$mode		'next' for next value or 'last' for last value
     * @return   string						free ref or last ref
     */
    public function getNextNumRef($soc, $mode = 'next')
    {
    }
    /**
     * Return the next date of
     *
     * @return  int|false   false if KO, timestamp if OK
     */
    public function getNextDate()
    {
    }
    /**
     * Return if maximum number of generation is reached
     *
     * @return	bool			False by default, True if maximum number of generation is reached
     */
    public function isMaxNbGenReached()
    {
    }
    /**
     * Format string to output with by striking the string if max number of generation was reached
     *
     * @param	string		$ret	Default value to output
     * @return	string				False by default, True if maximum number of generation is reached
     */
    public function strikeIfMaxNbGenReached($ret)
    {
    }
    /**
     *  Create all recurrents supplier invoices (for all entities if multicompany is used).
     *  A result may also be provided into this->output.
     *
     *  WARNING: This method changes temporarily the context $conf->entity to be in correct context for each recurring invoice found.
     *
     *  @param	int		$restrictioninvoiceid		0=All qualified template invoices found. > 0 = restrict action on invoice ID
     *  @param	int		$forcevalidation		1=Force validation of invoice whatever is template auto_validate flag.
     *  @return	int								0 if OK, < 0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function createRecurringInvoices($restrictioninvoiceid = 0, $forcevalidation = 0)
    {
    }
    /**
     *	Return clickable name (with picto eventually)
     *
     * @param	int			$withpicto       			Add picto into link
     * @param	string		$option          			Where point the link
     * @param	int<0,max>	$max             			Maxlength of ref
     * @param	int<0,1>	$short           			1=Return just URL
     * @param	string		$moretitle       			Add more text to title tooltip
     * @param	int<0,1> 	$notooltip		 			1=Disable tooltip
     * @param	int<-1,1>	$save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values when clicking
     * @return string 			         			String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $max = 0, $short = 0, $moretitle = '', $notooltip = 0, $save_lastsearch_value = -1)
    {
    }
    /**
     *  Return label of object status
     *
     *  @param      int<0,6>	$mode			0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=Long label + picto
     *  @param      int<-1,1>	$alreadypaid    Not used on recurring invoices
     *  @return     string			        Label of status
     */
    public function getLibStatut($mode = 0, $alreadypaid = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return label of a status
     *
     *	@param	int<0,1>	$recur         	Is it a recurring invoice ?
     *	@param	int			$status        	Id status (suspended or not)
     *	@param	int<0,6>	$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=long label + picto
     *	@param	int<-1,1>	$alreadypaid	Not used for recurring invoices
     *	@param	int			$type			Type invoice
     *  @param	int			$nbofopendirectdebitorcredittransfer	@unused-param Nb of open direct debit or credit transfer
     *	@return	string						Label of status
     */
    public function LibStatut($recur, $status, $mode = 0, $alreadypaid = -1, $type = 0, $nbofopendirectdebitorcredittransfer = 0)
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
     *	Update frequency and unit
     *
     *	@param     	?int		$frequency		value of frequency
     *	@param     	'd'|'m'|'y'	$unit 			unit of frequency  (d, m, y)
     *	@return		int							Return integer <0 if KO, >0 if OK
     */
    public function setFrequencyAndUnit($frequency, $unit)
    {
    }
    /**
     *	Update the next date of execution
     *
     *	@param     	int			$date					date of execution
     *	@param     	int			$increment_nb_gen_done	0 do nothing more, >0 increment nb_gen_done
     *	@return		int									Return integer <0 if KO, >0 if OK
     */
    public function setNextDate($date, $increment_nb_gen_done = 0)
    {
    }
    /**
     *	Update the maximum period
     *
     *	@param     	int		$nb		number of maximum period
     *	@return		int				Return integer <0 if KO, >0 if OK
     */
    public function setMaxPeriod($nb)
    {
    }
    /**
     *	Update the auto validate flag of invoice
     *
     *	@param     	int<0,1>	$validate		0 to create in draft, 1 to create and validate invoice
     *	@return		int							Return integer <0 if KO, >0 if OK
     */
    public function setAutoValidate($validate)
    {
    }
    /**
     *	Update the auto generate documents
     *
     *	@param     	int<0,1>	$validate		0 no document, 1 to generate document
     *	@return		int							Return integer <0 if KO, >0 if OK
     */
    public function setGeneratePdf($validate)
    {
    }
    /**
     *  Update the model for documents
     *
     *  @param     	string		$model		model of document generator
     *  @return		int						Return integer <0 if KO, >0 if OK
     */
    public function setModelPdf($model)
    {
    }
}