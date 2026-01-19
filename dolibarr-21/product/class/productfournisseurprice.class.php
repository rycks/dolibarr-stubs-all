<?php

/**
 * Class for ProductFournisseurPrice
 */
class ProductFournisseurPrice extends \CommonObject
{
    /**
     * @var string ID to identify managed object.
     */
    public $element = 'productfournisseurprice';
    /**
     * @var string Name of table without prefix where object is stored. This is also the key used for extrafields management.
     */
    public $table_element = 'product_fournisseur_price';
    /**
     * @var string String with name of icon for productfournisseurprice. Must be the part after the 'object_' into object_productfournisseurprice.png
     */
    public $picto = 'productfournisseurprice@buypricehistory';
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
    const STATUS_CANCELED = 9;
    /**
     *  'type' field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter]]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'text:none', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalString("MY_SETUP_PARAM")'
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'maxwidth200', 'wordbreak', 'tdoverflowmax200'
     *  'help' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-5,5>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => '1', 'position' => 10, 'notnull' => 1, 'visible' => 0), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => '1', 'position' => 15, 'notnull' => 1, 'visible' => -2, 'default' => '1', 'index' => 1), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => '1', 'position' => 20, 'notnull' => 0, 'visible' => -1), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => '1', 'position' => 25, 'notnull' => 1, 'visible' => -1), 'fk_product' => array('type' => 'integer:Product:product/class/product.class.php:1', 'label' => 'Fkproduct', 'enabled' => '1', 'position' => 30, 'notnull' => 0, 'visible' => -1), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'enabled' => '1', 'position' => 35, 'notnull' => 0, 'visible' => -1), 'ref_fourn' => array('type' => 'varchar(255)', 'label' => 'Reffourn', 'enabled' => '1', 'position' => 40, 'notnull' => 0, 'visible' => -1), 'desc_fourn' => array('type' => 'text', 'label' => 'Descfourn', 'enabled' => '1', 'position' => 45, 'notnull' => 0, 'visible' => -1), 'fk_availability' => array('type' => 'integer', 'label' => 'Fkavailability', 'enabled' => '1', 'position' => 50, 'notnull' => 0, 'visible' => -1), 'price' => array('type' => 'double(24,8)', 'label' => 'Price', 'enabled' => '1', 'position' => 55, 'notnull' => 0, 'visible' => -1), 'quantity' => array('type' => 'double', 'label' => 'Quantity', 'enabled' => '1', 'position' => 60, 'notnull' => 0, 'visible' => -1), 'remise_percent' => array('type' => 'double', 'label' => 'Remisepercent', 'enabled' => '1', 'position' => 65, 'notnull' => 1, 'visible' => -1), 'remise' => array('type' => 'double', 'label' => 'Remise', 'enabled' => '1', 'position' => 70, 'notnull' => 1, 'visible' => -1), 'unitprice' => array('type' => 'double(24,8)', 'label' => 'Unitprice', 'enabled' => '1', 'position' => 75, 'notnull' => 0, 'visible' => -1), 'charges' => array('type' => 'double(24,8)', 'label' => 'Charges', 'enabled' => '1', 'position' => 80, 'notnull' => 0, 'visible' => -1), 'default_vat_code' => array('type' => 'varchar(10)', 'label' => 'Defaultvatcode', 'enabled' => '1', 'position' => 85, 'notnull' => 0, 'visible' => -1), 'tva_tx' => array('type' => 'double(6,3)', 'label' => 'Tvatx', 'enabled' => '1', 'position' => 90, 'notnull' => 1, 'visible' => -1), 'info_bits' => array('type' => 'integer', 'label' => 'Infobits', 'enabled' => '1', 'position' => 95, 'notnull' => 1, 'visible' => -1), 'fk_user' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Fkuser', 'enabled' => '1', 'position' => 100, 'notnull' => 0, 'visible' => -1), 'fk_supplier_price_expression' => array('type' => 'integer', 'label' => 'Fksupplierpriceexpression', 'enabled' => '1', 'position' => 105, 'notnull' => 0, 'visible' => -1), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => '1', 'position' => 900, 'notnull' => 0, 'visible' => -2), 'delivery_time_days' => array('type' => 'integer', 'label' => 'Deliverytimedays', 'enabled' => '1', 'position' => 115, 'notnull' => 0, 'visible' => -1), 'supplier_reputation' => array('type' => 'varchar(10)', 'label' => 'Supplierreputation', 'enabled' => '1', 'position' => 120, 'notnull' => 0, 'visible' => -1), 'fk_multicurrency' => array('type' => 'integer', 'label' => 'Fkmulticurrency', 'enabled' => '1', 'position' => 125, 'notnull' => 0, 'visible' => -1), 'multicurrency_code' => array('type' => 'varchar(255)', 'label' => 'Multicurrencycode', 'enabled' => '1', 'position' => 130, 'notnull' => 0, 'visible' => -1), 'multicurrency_tx' => array('type' => 'double(24,8)', 'label' => 'Multicurrencytx', 'enabled' => '1', 'position' => 135, 'notnull' => 0, 'visible' => -1), 'multicurrency_price' => array('type' => 'double(24,8)', 'label' => 'Multicurrencyprice', 'enabled' => '1', 'position' => 140, 'notnull' => 0, 'visible' => -1), 'multicurrency_unitprice' => array('type' => 'double(24,8)', 'label' => 'Multicurrencyunitprice', 'enabled' => '1', 'position' => 145, 'notnull' => 0, 'visible' => -1), 'localtax1_tx' => array('type' => 'double(6,3)', 'label' => 'Localtax1tx', 'enabled' => '1', 'position' => 150, 'notnull' => 0, 'visible' => -1), 'localtax1_type' => array('type' => 'varchar(10)', 'label' => 'Localtax1type', 'enabled' => '1', 'position' => 155, 'notnull' => 1, 'visible' => -1), 'localtax2_tx' => array('type' => 'double(6,3)', 'label' => 'Localtax2tx', 'enabled' => '1', 'position' => 160, 'notnull' => 0, 'visible' => -1), 'localtax2_type' => array('type' => 'varchar(10)', 'label' => 'Localtax2type', 'enabled' => '1', 'position' => 165, 'notnull' => 1, 'visible' => -1), 'barcode' => array('type' => 'varchar(180)', 'label' => 'Barcode', 'enabled' => '1', 'position' => 170, 'notnull' => 0, 'visible' => -1), 'fk_barcode_type' => array('type' => 'integer', 'label' => 'Fkbarcodetype', 'enabled' => '1', 'position' => 175, 'notnull' => 0, 'visible' => -1), 'packaging' => array('type' => 'varchar(64)', 'label' => 'Packaging', 'enabled' => '1', 'position' => 180, 'notnull' => 0, 'visible' => -1));
    /**
     * @var int
     */
    public $rowid;
    /**
     * @var int
     */
    public $entity;
    /**
     * @var int|string
     */
    public $datec;
    /**
     * @var int
     */
    public $fk_product;
    /**
     * @var int
     */
    public $fk_soc;
    /**
     * @var string
     */
    public $ref_fourn;
    /**
     * @var string
     */
    public $desc_fourn;
    /**
     * @var int
     */
    public $fk_availability;
    /**
     * @var float
     */
    public $price;
    /**
     * @var float
     */
    public $quantity;
    /**
     * @var float
     */
    public $remise_percent;
    /**
     * @var float
     */
    public $remise;
    /**
     * @var float
     */
    public $unitprice;
    /**
     * @var float
     */
    public $charges;
    /**
     * @var string
     */
    public $default_vat_code;
    /**
     * @var float
     */
    public $tva_tx;
    /**
     * @var int
     */
    public $info_bits;
    /**
     * @var int
     */
    public $fk_user;
    /**
     * @var int
     */
    public $fk_supplier_price_expression;
    /**
     * @var string
     */
    public $import_key;
    /**
     * @var int
     */
    public $delivery_time_days;
    /**
     * @var string
     */
    public $supplier_reputation;
    /**
     * @var int
     */
    public $fk_multicurrency;
    /**
     * @var string
     */
    public $multicurrency_code;
    /**
     * @var float
     */
    public $multicurrency_tx;
    /**
     * @var float
     */
    public $multicurrency_price;
    /**
     * @var float
     */
    public $multicurrency_unitprice;
    /**
     * @var float
     */
    public $localtax1_tx;
    /**
     * @var string
     */
    public $localtax1_type;
    /**
     * @var float
     */
    public $localtax2_tx;
    /**
     * @var string
     */
    public $localtax2_type;
    /**
     * @var string
     */
    public $barcode;
    /**
     * @var int
     */
    public $fk_barcode_type;
    /**
     * @var string
     */
    public $packaging;
    // END MODULEBUILDER PROPERTIES
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param  User $user      User that creates
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
     * @return int             Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Clone an object into another one
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
     * @return int         Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     * Load list of objects in memory from the database.
     *
     * @param  string      		$sortorder    	Sort Order
     * @param  string      		$sortfield    	Sort field
     * @param  int         		$limit        	Limit
     * @param  int         		$offset       	Offset
     * @param  string|array     $filter       	Filter USF.
     * @param  string      		$filtermode   	Filter mode (AND or OR)
     * @return array|int                 		int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = '', $filtermode = 'AND')
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
     * @return int             Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user       	User that deletes
     * @param int 	$notrigger  0=launch triggers after, 1=disable triggers
     * @return int             	Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Validate object
     *
     *	@param		User	$user     		User making status change
     *  @param		int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return  	int						Return integer <=0 if OK, 0=Nothing done, >0 if KO
     */
    public function validate($user, $notrigger = 0)
    {
    }
    /**
     *	Set draft status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function setDraft($user, $notrigger = 0)
    {
    }
    /**
     *	Set cancel status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int						Return integer <0 if KO, 0=Nothing done, >0 if OK
     */
    public function cancel($user, $notrigger = 0)
    {
    }
    /**
     *	Set back to validated status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int						Return integer <0 if KO, 0=Nothing done, >0 if OK
     */
    public function reopen($user, $notrigger = 0)
    {
    }
    /**
     *  Return a link to the object card (with optionally the picto)
     *
     *  @param  int<0,2>	$withpicto                  Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *  @param  string		$option                     On what the link point to ('nolink', ...)
     *  @param  int<0,1>	$notooltip                  1=Disable tooltip
     *  @param  string		$morecss                    Add more css on link
     *  @param  int<-1,1>	$save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @return	string                              String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
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
     *	Load the info information in the object
     *
     *	@param  int		$id       Id of object
     *	@return	void
     */
    public function info($id)
    {
    }
    /**
     * Initialise object with example values
     * Id must be 0 if object instance is a specimen
     *
     * @return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     *  Returns the reference to the following non used object depending on the active numbering module.
     *
     *  @return string      		Object free reference
     */
    public function getNextNumRef()
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *  @param	    string		$modele			Force template to use ('' to not force)
     *  @param		Translate	$outputlangs	object lang a utiliser pour traduction
     *  @param      int<0,1>	$hidedetails    Hide details of lines
     *  @param      int<0,1>	$hidedesc       Hide description
     *  @param      int<0,1>	$hideref        Hide ref
     *  @param      ?array<string,mixed>	$moreparams     Array to provide more information
     *  @return     int         				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
}