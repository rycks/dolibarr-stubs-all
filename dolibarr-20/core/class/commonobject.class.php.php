<?php

/**
 *	Parent class of all other business classes (invoices, contracts, proposals, orders, ...)
 *
 * @phan-forbid-undeclared-magic-properties
 */
abstract class CommonObject
{
    use \DolDeprecationHandler;
    const TRIGGER_PREFIX = '';
    // to be overridden in child class implementations, i.e. 'BILL', 'TASK', 'PROPAL', etc.
    /**
     * @var string		ID of module.
     */
    public $module;
    /**
     * @var DoliDB		Database handler (result of a new DoliDB)
     */
    public $db;
    /**
     * @var int 		The object identifier
     */
    public $id;
    /**
     * @var int 		The environment ID when using a multicompany module
     */
    public $entity;
    /**
     * @var string 		Error string
     * @see             $errors
     */
    public $error;
    /**
     * @var string 		Error string that is hidden but can be used to store additional technical code
     */
    public $errorhidden;
    /**
     * @var string[]	Array of error strings
     */
    public $errors = array();
    /**
     * @var array<string,string>	To store error results of ->validateField()
     */
    private $validateFieldsErrors = array();
    /**
     * @var string 		ID to identify managed object
     */
    public $element;
    /**
     * @var string|int	Field with ID of parent key if this field has a parent (a string). For example 'fk_product'.
     *					ID of parent key itself (an int). For example in few classes like 'Comment', 'ActionComm' or 'AdvanceTargetingMailing'.
     */
    public $fk_element;
    /**
     * @var string 		Name to use for 'features' parameter to check module permissions user->rights->feature with restrictedArea().
     * 					Undefined means same value than $element.
     *					Can be use to force a check on another element (for example for class of a line, we mention here its parent element).
     */
    public $element_for_permission;
    /**
     * @var string 		Name of table without prefix where object is stored
     */
    public $table_element;
    /**
     * @var string 		Name of subtable line
     */
    public $table_element_line = '';
    /**
     * @var int<0,1>|string  	Does this object support multicompany module ?
     * 							0=No test on entity, 1=Test with field entity, 'field@table'=Test with link by field@table (example 'fk_soc@societe')
     */
    public $ismultientitymanaged;
    /**
     * @var string		Key value used to track if data is coming from import wizard
     */
    public $import_key;
    /**
     * @var array<string,mixed>	Contains data to manage extrafields
     */
    public $array_options = array();
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array();
    /**
     * @var array<string,array<string,string>>	Array to store alternative languages values of object
     * 											Note: call fetchValuesForExtraLanguages() before using this
     */
    public $array_languages = \null;
    // Value is array() when load already tried
    /**
     * @var array<int,array{parentId:int,source:string,socid:int,id:int,nom:string,civility:string,lastname:string,firstname:string,email:string,login:string,photo:string,statuscontact:int,rowid:int,code:string,libelle:string,status:string,fk_c_type_contact:int}>	 	To store result of ->liste_contact()
     */
    public $contacts_ids;
    /**
     * @var mixed		Array of linked objects, set and used when calling ->create() to be able to create links during the creation of object
     */
    public $linked_objects;
    /**
     * @var int[][]		Array of linked objects ids. Loaded by ->fetchObjectLinked
     */
    public $linkedObjectsIds;
    /**
     * @var mixed		Array of linked objects. Loaded by ->fetchObjectLinked
     */
    public $linkedObjects;
    /**
     * @var boolean[]	Array of boolean with object id as key and value as true if linkedObjects full loaded for object id. Loaded by ->fetchObjectLinked. Important for pdf generation time reduction.
     */
    private $linkedObjectsFullLoaded = array();
    /**
     * @var ?static		To store a cloned copy of the object before editing it (to keep track of its former properties)
     */
    public $oldcopy;
    /**
     * @var string 		To store the old value of a modified reference
     */
    public $oldref;
    /**
     * @var string		Column name of the ref field.
     */
    protected $table_ref_field = '';
    /**
     * @var integer 	0=Default, 1=View may be restricted to sales representative only if no permission to see all or to company of external user if external user
     */
    public $restrictiononfksoc = 0;
    // The following vars are used by some objects only.
    // We keep these properties in CommonObject in order to provide common methods using them.
    /**
     * @var array<string,mixed>		Can be used to pass information when only the object is provided to the method
     */
    public $context = array();
    /**
     * @var string	Properties set and used by Agenda trigger
     */
    public $actionmsg;
    /**
     * @var string	Properties set and used by Agenda trigger
     */
    public $actionmsg2;
    /**
     * @var string			Contains canvas name if record is an alternative canvas record
     */
    public $canvas;
    /**
     * @var Project|null 	The related project object
     * @see fetch_projet()
     */
    public $project;
    /**
     * @var int 			The related project ID
     * @see setProject(), project
     */
    public $fk_project;
    /**
     * @var ?Project	 	The related project object
     * @deprecated  Use $project instead.
     * @see $project
     */
    private $projet;
    /**
     * @var int
     * @deprecated  		Use $fk_project instead.
     * @see $fk_project
     */
    public $fk_projet;
    /**
     * @var Contact|null 	A related contact object
     * @see fetch_contact()
     */
    public $contact;
    /**
     * @var int 			The related contact ID
     * @see fetch_contact()
     */
    public $contact_id;
    /**
     * @var Societe|null 	A related thirdparty object
     * @see fetch_thirdparty()
     */
    public $thirdparty;
    /**
     * @var User 			A related user
     * @see fetch_user()
     */
    public $user;
    /**
     * @var string 		The type of originating object. Combined with $origin_id, it allows to reload $origin_object
     * @see fetch_origin()
     */
    public $origin_type;
    /**
     * @var int 		The id of originating object. Combined with $origin_type, it allows to reload $origin_object
     * @see fetch_origin()
     */
    public $origin_id;
    /**
     * @var	?CommonObject	Origin object. This is set by fetch_origin() from this->origin_type and this->origin_id.
     */
    public $origin_object;
    /**
     * @var CommonObject|string|null	Sometimes the type of the originating object ('commande', 'facture', ...), sometimes the object (as with MouvementStock)
     * @deprecated						Use $origin_type and $origin_id instead.
     * @see fetch_origin()
     */
    public $origin;
    /**
     * TODO Remove this. Has been replaced with ->origin_object.
     * This is set by fetch_origin() from this->origin and this->origin_id
     *
     * @var CommonObject
     * @deprecated Use $origin_object instead.
     * @see $origin_object
     */
    private $expedition;
    /**
     * @var CommonObject
     * @deprecated Use $origin_object instead.
     * @see $origin_object
     */
    private $livraison;
    /**
     * @var CommonObject
     * @deprecated Use $origin_object instead.
     * @see $origin_object
     */
    private $commandeFournisseur;
    /**
     * @var string 		The object's reference
     */
    public $ref;
    /**
     * @var string 		An external reference to the object
     */
    public $ref_ext;
    /**
     * @var string 		The object's previous reference
     */
    public $ref_previous;
    /**
     * @var string 		The object's next reference
     */
    public $ref_next;
    /**
     * @var string 		Ref to store on object to save the new ref to use for example when making a validate() of an object
     */
    public $newref;
    /**
     * @var int|array<int, string>      The object's status. Use status instead.
     * @deprecated  Use $status instead.
     * @see $status
     * @see setStatut(), $status
     */
    public $statut;
    /**
     * @var int|array<int, string>   The object's status (an int).
     *                 						Or an array listing all the potential status of the object:
     *                                    	array: int of the status => translated label of the status
     *                                    	See for example the Account class.
     * @see setStatut()
     */
    public $status;
    /**
     * @var string		Country name
     * @see getFullAddress()
     */
    public $country;
    /**
     * @var int			Country ID
     * @see getFullAddress(), country
     */
    public $country_id;
    /**
     * @var string		ISO country code on 2 chars
     * @see getFullAddress(), isInEEC(), country
     */
    public $country_code;
    /**
     * @var string		State name
     * @see getFullAddress()
     */
    public $state;
    /**
     * @var int			State ID
     * @see getFullAddress(), state
     */
    public $state_id;
    /**
     * @var	int			State ID
     * @deprecated	Use $state_id. We can remove this property when the field 'fk_departement' have been renamed into 'state_id' in all tables
     */
    public $fk_departement;
    /**
     * @var string		State code
     * @see getFullAddress(), $state
     */
    public $state_code;
    /**
     * @var int			Region ID
     * @see getFullAddress(), $region_code, $region
     */
    public $region_id;
    /**
     * @var string		Region code
     * @see getFullAddress(), $region_id, $region
     */
    public $region_code;
    /**
     * @var string		Region name
     * @see getFullAddress(), $region_id, $region_code
     */
    public $region;
    /**
     * @var int			Barcode type
     * @see fetch_barcode()
     */
    public $barcode_type;
    /**
     * @var string		Code of the barcode type
     * @see fetch_barcode(), barcode_type
     */
    public $barcode_type_code;
    /**
     * @var string		Label of the barcode type
     * @see fetch_barcode(), barcode_type
     */
    public $barcode_type_label;
    /**
     * @var string
     * @see fetch_barcode(), barcode_type
     */
    public $barcode_type_coder;
    /**
     * @var int 		Payment method ID (cheque, cash, ...)
     * @see setPaymentMethods()
     */
    public $mode_reglement_id;
    /**
     * @var int 		Payment terms ID
     * @see setPaymentTerms()
     */
    public $cond_reglement_id;
    /**
     * @var int 		Demand reason ID
     */
    public $demand_reason_id;
    /**
     * @var int 		Transport mode ID (For module intracomm report)
     * @see setTransportMode()
     */
    public $transport_mode_id;
    /**
     * @var int|string 		Payment terms ID
     * @deprecated  Use $cond_reglement_id instead - Kept for compatibility
     * @see $cond_reglement_id
     *
     * Note: cond_reglement can not be aliased to cond_reglement!!!
     */
    private $cond_reglement;
    // Private to call DolDeprecationHandler
    /**
     * @var int|string Internal to detect deprecated access
     */
    protected $depr_cond_reglement;
    // Internal value for deprecation
    /**
     * @var int 		Delivery address ID
     * @see setDeliveryAddress()
     * @deprecated
     */
    public $fk_delivery_address;
    /**
     * @var int 		Shipping method ID
     * @see setShippingMethod()
     */
    public $shipping_method_id;
    /**
     * @var string 		Shipping method label
     * @see setShippingMethod()
     */
    public $shipping_method;
    // Multicurrency
    /**
     * @var int ID
     */
    public $fk_multicurrency;
    /**
     * @var string|string[]             Multicurrency code
     *                                  Or, just for the Paiement object, an array: invoice ID => currency code for that invoice.
     */
    public $multicurrency_code;
    /**
     * @var float|float[]               Multicurrency rate ("tx" = "taux" in French)
     *                                  Or, just for the Paiement object, an array: invoice ID => currency rate for that invoice.
     */
    public $multicurrency_tx;
    /**
     * @var float 		Multicurrency total amount excluding taxes (HT = "Hors Taxe" in French)
     */
    public $multicurrency_total_ht;
    /**
     * @var float 		Multicurrency total VAT amount (TVA = "Taxe sur la Valeur Ajoutée" in French)
     */
    public $multicurrency_total_tva;
    /**
     * @var float 		Multicurrency total amount including taxes (TTC = "Toutes Taxes Comprises" in French)
     */
    public $multicurrency_total_ttc;
    /**
     * @var float Multicurrency total localta1
     */
    public $multicurrency_total_localtax1;
    // not in database
    /**
     * @var float Multicurrency total localtax2
     */
    public $multicurrency_total_localtax2;
    // not in database
    /**
     * @var string
     * @see SetDocModel()
     */
    public $model_pdf;
    /**
     * @var string
     * Contains relative path of last generated main file
     */
    public $last_main_doc;
    /**
     * @var int 		Bank account ID sometimes, ID of record into llx_bank sometimes
     * @deprecated
     * @see $fk_account
     */
    public $fk_bank;
    /**
     * @var int 		Bank account ID
     * @see SetBankAccount()
     */
    public $fk_account;
    /**
     * @var string 		Public note
     * @see update_note()
     */
    public $note_public;
    /**
     * @var string 		Private note
     * @see update_note()
     */
    public $note_private;
    /**
     * @var string
     * @deprecated Use $note_private instead.
     * @see $note_private
     */
    public $note;
    /**
     * @var float 		Total amount excluding taxes (HT = "Hors Taxe" in French)
     * @see update_price()
     */
    public $total_ht;
    /**
     * @var float 		Total VAT amount (TVA = "Taxe sur la Valeur Ajoutée" in French)
     * @see update_price()
     */
    public $total_tva;
    /**
     * @var float 		Total local tax 1 amount
     * @see update_price()
     */
    public $total_localtax1;
    /**
     * @var float 		Total local tax 2 amount
     * @see update_price()
     */
    public $total_localtax2;
    /**
     * @var float 		Total amount including taxes (TTC = "Toutes Taxes Comprises" in French)
     * @see update_price()
     */
    public $total_ttc;
    /**
     * @var CommonObjectLine[]|CommonObject[]|stdClass[]
     */
    public $lines;
    /**
     * @var string	Action type code to use to record auto event in agenda. For example 'AC_OTH_AUTO'
     */
    public $actiontypecode;
    /**
     * @var mixed		Comments
     * @see fetchComments()
     */
    public $comments = array();
    /**
     * @var string 		The name
     */
    public $name;
    /**
     * @var string 		The lastname
     */
    public $lastname;
    /**
     * @var string 		The firstname
     */
    public $firstname;
    /**
     * @var string 		The civility code, not an integer
     */
    public $civility_id;
    // Dates
    /**
     * @var integer|string|null		Object creation date
     */
    public $date_creation;
    /**
     * @var integer|string|null		Object last validation date
     */
    public $date_validation;
    /**
     * @var integer|string|null		Object last modification date
     */
    public $date_modification;
    /**
     * Update timestamp record (tms)
     * @var integer
     * @deprecated					Use $date_modification
     */
    public $tms;
    /**
     * @var int|string|null
     * @deprecated Use $date_modification instead.
     * @see $date_modification
     */
    private $date_update;
    /**
     * @var integer|string|null		Object closing date
     */
    public $date_cloture;
    /**
     * @var User		User author/creation
     * @deprecated		Store only id in user_creation_id
     */
    public $user_author;
    /**
     * @var User		User author/creation
     * @deprecated
     */
    public $user_creation;
    /**
     * @var int			User id author/creation
     */
    public $user_creation_id;
    /**
     * @var User		User of validation
     * @deprecated
     */
    public $user_valid;
    /**
     * @var User		User of validation
     * @deprecated
     */
    public $user_validation;
    /**
     * @var int|null		User id of validation
     */
    public $user_validation_id;
    /**
     * @var int			User id closing object
     */
    public $user_closing_id;
    /**
     * @var User	User last modifier
     * @deprecated
     */
    public $user_modification;
    /**
     * @var int			User ID who last modified the object
     */
    public $user_modification_id;
    /**
     * @var int ID
     * @deprecated	Use $user_creation_id
     */
    public $fk_user_creat;
    /**
     * @var int ID
     * @deprecated 	Use $user_modification_id
     */
    public $fk_user_modif;
    /**
     * @var string XX
     */
    public $next_prev_filter;
    /**
     * @var int<0,1> 1 if object is specimen
     */
    public $specimen = 0;
    /**
     * @var	int[]		Id of contacts to send objects (mails, etc.)
     */
    public $sendtoid;
    /**
     * @var	float		Amount already paid from getSommePaiement() (used to show correct status)
     * @deprecated		Use $totalpaid instead
     * @see $totalpaid
     */
    private $alreadypaid;
    /**
     * @var	float		Amount already paid from getSommePaiement() (used to show correct status)
     */
    public $totalpaid;
    /**
     * @var array<int,string>		Array with labels of status
     */
    public $labelStatus = array();
    /**
     * @var array<int,string>	Array with short labels of status
     */
    public $labelStatusShort = array();
    /**
     * @var array<string,int|string>	Array to store lists of tpl
     */
    public $tpl;
    /**
     * @var int 		show photo on popup
     */
    public $showphoto_on_popup;
    /**
     * @var array{actionscomm?:int,banklines?:int,cheques?:int,contacts?:int,contracts?:int,customers?:int,dolresource?:int,donations?:int,expensereports?:int,holidays?:int,interventions?:int,invoices?:int,members?:int,orders?:int,products?:int,projects?:int,proposals?:int,prospects?:int,services?:int,supplier_invoices?:int,supplier_orders?:int,supplier_proposals?:int,suppliers?:int,tasks?:int,ticket?:int,users?:int}		nb used in load_stateboard
     */
    public $nb = array();
    /**
     * @var int			used for the return of show_photos()
     */
    public $nbphoto;
    /**
     * @var string 		output content. Used topropagate information by cron jobs.
     */
    public $output;
    /**
     * @var array|string	extra parameters. Try to store here the array of parameters. Old code is sometimes storing a string.
     */
    public $extraparams = array();
    /**
     * @var string[]|array<string,string[]|array{parent:string,parentkey:string}>	List of child tables. To test if we can delete object.
     */
    protected $childtables = array();
    /**
     * @var string[]	List of child tables. To know object to delete on cascade.
     *               If name is like '@ClassName:FilePathClass:ParentFkFieldName', it will
     *               call method deleteByParentField(parentId, ParentFkFieldName) to fetch and delete child object.
     */
    protected $childtablesoncascade = array();
    /**
     * @var Product 	Populated by fetch_product()
     */
    public $product;
    /**
     * @var int 		Populated by setPaymentTerms()
     */
    public $cond_reglement_supplier_id;
    /**
     * @var float       Deposit percent for payment terms.
     *                  Populated by setPaymentTerms().
     * @see setPaymentTerms()
     */
    public $deposit_percent;
    /**
     * @var int 		Populated by setRetainedWarrantyPaymentTerms()
     */
    public $retained_warranty_fk_cond_reglement;
    /**
     * @var int 		Populated by setWarehouse()
     */
    public $warehouse_id;
    /**
     * @var int<0,1>	Does object support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 0;
    // No constructor as it is an abstract class
    /**
     * Provide list of deprecated properties and replacements
     *
     * @return array<string,string>
     */
    protected function deprecatedProperties()
    {
    }
    /**
     * Check if an object id or ref exists
     * If you don't need or want to instantiate the object and just need to know if the object exists, use this method instead of fetch
     *
     *  @param	string	$element   	String of element ('product', 'facture', ...)
     *  @param	int		$id      	Id of object
     *  @param  string	$ref     	Ref of object to check
     *  @param	string	$ref_ext	Ref ext of object to check
     *  @return int     			Return integer <0 if KO, 0 if OK but not found, >0 if OK and exists
     */
    public static function isExistingObject($element, $id, $ref = '', $ref_ext = '')
    {
    }
    /**
     * isEmpty We consider CommonObject isEmpty if this->id is empty
     *
     * @return bool
     */
    public function isEmpty()
    {
    }
    /**
     * setErrorsFromObject
     *
     * @param CommonObject $object commonobject
     * @return void
     */
    public function setErrorsFromObject($object)
    {
    }
    /**
     * Return array of data to show into a tooltip. This method must be implemented in each object class.
     *
     * @since v18
     * @param array<string,mixed> $params params to construct tooltip data
     * @return array<string,string>	Data to show in tooltip
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     * getTooltipContent
     *
     * @param array<string,mixed>	$params	params
     * @since v18
     * @return string
     */
    public function getTooltipContent($params)
    {
    }
    /**
     * Method to output saved errors
     *
     * @return	string		String with errors
     */
    public function errorsToString()
    {
    }
    /**
     * Return customer ref for screen output.
     *
     * @param  string      $objref        Customer ref
     * @return string                     Customer ref formatted
     */
    public function getFormatedCustomerRef($objref)
    {
    }
    /**
     * Return supplier ref for screen output.
     *
     * @param  string      $objref        Supplier ref
     * @return string                     Supplier ref formatted
     */
    public function getFormatedSupplierRef($objref)
    {
    }
    /**
     * 	Return full address of contact
     *
     * 	@param		int<0,1>	$withcountry		1=Add country into address string
     *  @param		string		$sep				Separator to use to build string
     *  @param		int<0,1>    $withregion			1=Add region into address string
     *  @param		string		$extralangcode		User extralanguages as value
     *	@return		string							Full address string
     */
    public function getFullAddress($withcountry = 0, $sep = "\n", $withregion = 0, $extralangcode = '')
    {
    }
    /**
     * Return the link of last main doc file for direct public download.
     *
     * @param	string	$modulepart			Module related to document
     * @param	int		$initsharekey		Init the share key if it was not yet defined
     * @param	int		$relativelink		0=Return full external link, 1=Return link relative to root of file
     * @return	string|-1					Returns the link, or an empty string if no link was found, or -1 if error.
     */
    public function getLastMainDocLink($modulepart, $initsharekey = 0, $relativelink = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Add a link between element $this->element and a contact
     *
     *  @param	int			$fk_socpeople       Id of thirdparty contact (if source = 'external') or id of user (if source = 'internal') to link
     *  @param 	int|string	$type_contact 		Type of contact (code or id). Must be id or code found into table llx_c_type_contact. For example: SALESREPFOLL
     *  @param  string		$source             external=Contact extern (llx_socpeople), internal=Contact intern (llx_user)
     *  @param  int			$notrigger			Disable all triggers
     *  @return int         	        		Return integer <0 if KO, 0 if already added or code not valid, >0 if OK
     */
    public function add_contact($fk_socpeople, $type_contact, $source = 'external', $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Copy contact from one element to current
     *
     *    @param    CommonObject    $objFrom    Source element
     *    @param    'internal'|'external'	$source	Nature of contact ('internal' or 'external')
     *    @return   int                         >0 if OK, <0 if KO
     */
    public function copy_linked_contact($objFrom, $source = 'internal')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Update a link to contact line
     *
     *      @param	int		$rowid              Id of line contact-element
     * 		@param	int		$statut	            New status of link
     *      @param  int		$type_contact_id    Id of contact type (not modified if 0)
     *      @param  int		$fk_socpeople	    Id of soc_people to update (not modified if 0)
     *      @return int                 		Return integer <0 if KO, >= 0 if OK
     */
    public function update_contact($rowid, $statut, $type_contact_id = 0, $fk_socpeople = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Delete a link to contact line
     *
     *    @param	int		$rowid			Id of contact link line to delete
     *    @param	int		$notrigger		Disable all triggers
     *    @return   int						>0 if OK, <0 if KO
     */
    public function delete_contact($rowid, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Delete all links between an object $this and all its contacts in llx_element_contact
     *
     *	  @param	string	$source		'' or 'internal' or 'external'
     *	  @param	string	$code		Type of contact (code or id)
     *    @return   int					Return integer <0 if KO, 0=Nothing done, >0 if OK
     */
    public function delete_linked_contact($source = '', $code = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Get array of all contacts for an object
     *
     *    @param	int			$statusoflink	Status of links to get (-1=all). Not used.
     *    @param	'external'|'thirdparty'|'internal'		$source			Source of contact: 'external' or 'thirdparty' (llx_socpeople) or 'internal' (llx_user)
     *    @param	int<0,1>	$list       	0:Returned array contains all properties, 1:Return array contains just id
     *    @param    string      $code       	Filter on this code of contact type ('SHIPPING', 'BILLING', ...)
     *    @param	int			$status			Status of user or company
     *    @param	int[]		$arrayoftcids	Array with ID of type of contacts. If we provide this, we can make a ec.fk_c_type_contact in ($arrayoftcids) to avoid link on tc table. TODO Not implemented.
     *    @return array<int,array{parentId:int,source:string,socid:int,id:int,nom:string,civility:string,lastname:string,firstname:string,email:string,login:string,photo:string,gender:string,statuscontact:int,rowid:int,code:string,libelle:string,status:string,fk_c_type_contact:int}>|int<-1,-1>        	Array of contacts, -1 if error
     */
    public function liste_contact($statusoflink = -1, $source = 'external', $list = 0, $code = '', $status = -1, $arrayoftcids = array())
    {
    }
    /**
     * 		Update status of a contact linked to object
     *
     * 		@param	int		$rowid		Id of link between object and contact
     * 		@return	int					Return integer <0 if KO, >=0 if OK
     */
    public function swapContactStatus($rowid)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Return array with list of possible values for type of contacts
     *
     *      @param	'internal'|'external'|'all'	$source	'internal', 'external' or 'all'
     *      @param	string	$order		Sort order by : 'position', 'code', 'rowid'...
     *      @param  int<0,1>	$option     0=Return array id->label, 1=Return array code->label
     *      @param  int<0,1>	$activeonly 0=all status of contact, 1=only the active
     *		@param	string	$code		Type of contact (Example: 'CUSTOMER', 'SERVICE')
     *      @return array<int,string>|array<string,string>|null	Array list of type of contacts (id->label if option=0, code->label if option=1), or null if error
     */
    public function liste_type_contact($source = 'internal', $order = 'position', $option = 0, $activeonly = 0, $code = '')
    {
    }
    /**
     *      Return array with list of possible values for type of contacts
     *
     *      @param	string	$source     		'internal', 'external' or 'all'
     *      @param  int<0,1>	$option     		0=Return array id->label, 1=Return array code->label
     *      @param  int<0,1>	$activeonly 		0=all status of contact, 1=only the active
     *		@param	string	$code				Type of contact (Example: 'CUSTOMER', 'SERVICE')
     *		@param	string	$element			Filter on 1 element type
     *      @param	string	$excludeelement		Exclude 1 element type. Example: 'agenda'
     *      @return array<int,string>|array<string,string>|null	Array list of type of contacts (id->label if option=0, code->label if option=1), or null if error
     */
    public function listeTypeContacts($source = 'internal', $option = 0, $activeonly = 0, $code = '', $element = '', $excludeelement = '')
    {
    }
    /**
     *      Return id of contacts for a source and a contact code.
     *      Example: contact client de facturation ('external', 'BILLING')
     *      Example: contact client de livraison ('external', 'SHIPPING')
     *      Example: contact interne suivi paiement ('internal', 'SALESREPFOLL')
     *
     *		@param	string	$source		'external' or 'internal'
     *		@param	string	$code		'BILLING', 'SHIPPING', 'SALESREPFOLL', ...
     *		@param	int		$status		limited to a certain status
     *      @return int[]|null     		List of id for such contacts, or null if error
     */
    public function getIdContact($source, $code, $status = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *		Load object contact with id=$this->contact_id into $this->contact
     *
     *		@param	?int		$contactid	Id du contact. Use this->contact_id if empty.
     *		@return	int<-1,1>				Return integer <0 if KO, >0 if OK
     */
    public function fetch_contact($contactid = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    	Load the third party of object, from id $this->socid or $this->fk_soc, into this->thirdparty
     *
     *		@param		int<0,1>	$force_thirdparty_id	Force thirdparty id
     *		@return		int<-1,1>						Return integer <0 if KO, >0 if OK
     *		@phan-suppress PhanUndeclaredProperty
     */
    public function fetch_thirdparty($force_thirdparty_id = 0)
    {
    }
    /**
     * Looks for an object with ref matching the wildcard provided
     * It does only work when $this->table_ref_field is set
     *
     * @param 	string 	$ref 	Wildcard
     * @return 	int<-1,1>		>1 = OK, 0 = Not found or table_ref_field not defined, <0 = KO
     */
    public function fetchOneLike($ref)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load data for barcode into properties ->barcode_type*
     *	Properties ->barcode_type that is id of barcode. Type is used to find other properties, but
     *  if it is not defined, ->element must be defined to know default barcode type.
     *
     *	@return		int<-1,1>		Return integer <0 if KO, 0 if can't guess type of barcode (ISBN, EAN13...), >0 if OK (all barcode properties loaded)
     */
    public function fetch_barcode()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *		Load the project with id $this->fk_project into this->project
     *
     *		@return		int<-1,1>		Return integer <0 if KO, >=0 if OK
     */
    public function fetch_project()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *		Load the project with id $this->fk_project into this->project
     *
     *		@return		int			Return integer <0 if KO, >=0 if OK
     */
    public function fetch_projet()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *		Load the product with id $this->fk_product into this->product
     *
     *		@return		int<-1,1>	Return integer <0 if KO, >=0 if OK
     */
    public function fetch_product()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *		Load the user with id $userid into this->user
     *
     *		@param	int		$userid 		Id du contact
     *		@return	int<-1,1>				Return integer <0 if KO, >0 if OK
     */
    public function fetch_user($userid)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Read linked origin object.
     *	Set ->origin_object
     *
     *	@return		void
     */
    public function fetch_origin()
    {
    }
    /**
     *  Load object from specific field
     *
     *  @param	string	$table		Table element or element line
     *  @param	string	$field		Field selected
     *  @param	string	$key		Import key
     *  @param	string	$element	Element name
     *	@return	int<-1,1>|false		Return -1 or false if KO, >0 if OK
     */
    public function fetchObjectFrom($table, $field, $key, $element = \null)
    {
    }
    /**
     *	Getter generic. Load value from a specific field
     *
     *	@param	string	$table		Table of element or element line
     *	@param	int		$id			Element id
     *	@param	string	$field		Field selected
     *	@return	int<-1,1>			Return integer <0 if KO, >0 if OK
     */
    public function getValueFrom($table, $id, $field)
    {
    }
    /**
     *	Setter generic. Update a specific field into database.
     *  Warning: Trigger is run only if param trigkey is provided.
     *
     *	@param	string		$field			Field to update
     *	@param	mixed		$value			New value
     *	@param	string		$table			To force other table element or element line (should not be used)
     *	@param	int			$id				To force other object id (should not be used)
     *	@param	string		$format			Data format ('text', 'int', 'date'). 'text' is used if not defined
     *	@param	string		$id_field		To force rowid field name. 'rowid' is used if not defined
     *	@param	User|string	$fuser			Update the user of last update field with this user. If not provided, current user is used except if value is 'none'
     *  @param  string      $trigkey    	Trigger key to run (in most cases something like 'XXX_MODIFY')
     *  @param	string		$fk_user_field	Name of field to save user id making change
     *	@return	int<-2,1>					Return integer <0 if KO, >0 if OK
     *  @see updateExtraField()
     */
    public function setValueFrom($field, $value, $table = '', $id = \null, $format = '', $id_field = '', $fuser = \null, $trigkey = '', $fk_user_field = 'fk_user_modif')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load properties id_previous and id_next by comparing $fieldid with $this->ref
     *
     *      @param	string	$filter		Optional SQL filter. Use SQL or Universal Search Filter.
     *      							Example: "(t.field1 = 'aa' OR t.field2 = 'bb')". Do not allow user input data here with this syntax.
     *      							Example: "((t.field1:=:'aa') OR (t.field2:=:'bb'))".
     *	 	@param  string	$fieldid   	Name of field to use for the select MAX and MIN
     *		@param	int<0,1>	$nodbprefix	Do not include DB prefix to forge table name
     *      @return int<-2,1>      		Return integer <0 if KO, >0 if OK
     */
    public function load_previous_next_ref($filter, $fieldid, $nodbprefix = 0)
    {
    }
    /**
     *      Return list of id of contacts of object
     *
     *      @param	string	$source     Source of contact: external (llx_socpeople) or internal (llx_user) or thirdparty (llx_societe)
     *      @return int[]				Array of id of contacts (if source=external or internal)
     * 									Array of id of third parties with at least one contact on object (if source=thirdparty)
     */
    public function getListContactId($source = 'external')
    {
    }
    /**
     *	Link element with a project
     *
     *	@param     	int			$projectid	Project id to link element to
     *  @param		int<0,1>	$notrigger	Disable the trigger
     *	@return		int<-1,1>				Return integer <0 if KO, >0 if OK
     */
    public function setProject($projectid, $notrigger = 0)
    {
    }
    /**
     *  Change the payments methods
     *
     *  @param		int		$id		Id of new payment method
     *  @return		int				>0 if OK, <0 if KO
     */
    public function setPaymentMethods($id)
    {
    }
    /**
     *  Change the multicurrency code
     *
     *  @param		string	$code	multicurrency code
     *  @return		int				>0 if OK, <0 if KO
     */
    public function setMulticurrencyCode($code)
    {
    }
    /**
     *  Change the multicurrency rate
     *
     *  @param		double	$rate	multicurrency rate
     *  @param		int		$mode	mode 1 : amounts in company currency will be recalculated, mode 2 : amounts in foreign currency will be recalculated
     *  @return		int				>0 if OK, <0 if KO
     */
    public function setMulticurrencyRate($rate, $mode = 1)
    {
    }
    /**
     *  Change the payments terms
     *
     *  @param		int		$id					Id of new payment terms
     *  @param		float	$deposit_percent	% of deposit if needed by payment terms
     *  @return		int							>0 if OK, <0 if KO
     */
    public function setPaymentTerms($id, $deposit_percent = \null)
    {
    }
    /**
     *  Change the transport mode methods
     *
     *  @param		int		$id		Id of transport mode
     *  @return		int				>0 if OK, <0 if KO
     */
    public function setTransportMode($id)
    {
    }
    /**
     *  Change the retained warranty payments terms
     *
     *  @param		int		$id		Id of new payment terms
     *  @return		int				>0 if OK, <0 if KO
     */
    public function setRetainedWarrantyPaymentTerms($id)
    {
    }
    /**
     *	Define delivery address
     *  @deprecated
     *
     *	@param      int		$id		Address id
     *	@return     int				Return integer <0 si ko, >0 si ok
     */
    public function setDeliveryAddress($id)
    {
    }
    /**
     *  Change the shipping method
     *
     *  @param      int     $shipping_method_id     Id of shipping method
     *  @param      int    	$notrigger              0=launch triggers after, 1=disable triggers
     *  @param      User	$userused               Object user
     *  @return     int              				1 if OK, 0 if KO
     */
    public function setShippingMethod($shipping_method_id, $notrigger = 0, $userused = \null)
    {
    }
    /**
     *  Change the warehouse
     *
     *  @param      int     $warehouse_id     Id of warehouse
     *  @return     int              1 if OK, 0 if KO
     */
    public function setWarehouse($warehouse_id)
    {
    }
    /**
     *		Set last model used by doc generator
     *
     *		@param		User	$user		User object that make change
     *		@param		string	$modelpdf	Modele name
     *		@return		int					Return integer <0 if KO, >0 if OK
     */
    public function setDocModel($user, $modelpdf)
    {
    }
    /**
     *  Change the bank account
     *
     *  @param		int		$fk_account		Id of bank account
     *  @param      int    	$notrigger      0=launch triggers after, 1=disable triggers
     *  @param      User	$userused		Object user
     *  @return		int						1 if OK, 0 if KO
     */
    public function setBankAccount($fk_account, $notrigger = 0, $userused = \null)
    {
    }
    // TODO: Move line related operations to CommonObjectLine?
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Save a new position (field rang) for details lines.
     *  You can choose to set position for lines with already a position or lines without any position defined.
     *
     * 	@param		boolean		$renum			   True to renum all already ordered lines, false to renum only not already ordered lines.
     * 	@param		string		$rowidorder		   ASC or DESC
     * 	@param		boolean		$fk_parent_line    Table with fk_parent_line field or not
     * 	@return		int                            Return integer <0 if KO, >0 if OK
     */
    public function line_order($renum = \false, $rowidorder = 'ASC', $fk_parent_line = \true)
    {
    }
    /**
     * 	Get children of line
     *
     * 	@param	int			$id				Id of parent line
     * 	@param	int<0,1>	$includealltree	0 = 1st level child, 1 = All level child
     * 	@return	int[]			            Array with list of children lines id
     */
    public function getChildrenOfLine($id, $includealltree = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Update a line to have a lower rank
     *
     * 	@param 	int			$rowid				Id of line
     * 	@param	boolean		$fk_parent_line		Table with fk_parent_line field or not
     * 	@return	void
     */
    public function line_up($rowid, $fk_parent_line = \true)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Update a line to have a higher rank
     *
     * 	@param	int			$rowid				Id of line
     * 	@param	boolean		$fk_parent_line		Table with fk_parent_line field or not
     * 	@return	void
     */
    public function line_down($rowid, $fk_parent_line = \true)
    {
    }
    /**
     * 	Update position of line (rang)
     *
     * 	@param	int		$rowid		Id of line
     * 	@param	int		$rang		Position
     * 	@return	int<-1,1>			Return integer <0 if KO, >0 if OK
     */
    public function updateRangOfLine($rowid, $rang)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Update position of line with ajax (rang)
     *
     * 	@param	int[]	$rows	Array of rows
     * 	@return	void
     */
    public function line_ajaxorder($rows)
    {
    }
    /**
     * 	Update position of line up (rang)
     *
     * 	@param	int		$rowid		Id of line
     * 	@param	int		$rang		Position
     * 	@return	void
     */
    public function updateLineUp($rowid, $rang)
    {
    }
    /**
     * 	Update position of line down (rang)
     *
     * 	@param	int		$rowid		Id of line
     * 	@param	int		$rang		Position
     * 	@param	int		$max		Max
     * 	@return	void
     */
    public function updateLineDown($rowid, $rang, $max)
    {
    }
    /**
     * 	Get position of line (rang)
     *
     * 	@param		int		$rowid		Id of line
     *  @return		int     			Value of rang in table of lines
     */
    public function getRangOfLine($rowid)
    {
    }
    /**
     * 	Get rowid of the line relative to its position
     *
     * 	@param		int		$rang		Rang value
     *  @return     int     			Rowid of the line
     */
    public function getIdOfLine($rang)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Get max value used for position of line (rang)
     *
     * 	@param		int		$fk_parent_line		Parent line id
     *  @return     int  			   			Max value of rang in table of lines
     */
    public function line_max($fk_parent_line = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update external ref of element
     *
     *  @param      string		$ref_ext	Update field ref_ext
     *  @return     int      		   		Return integer <0 if KO, >0 if OK
     */
    public function update_ref_ext($ref_ext)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update note of element
     *
     *  @param      string		$note		New value for note
     *  @param		string		$suffix		'', '_public' or '_private'
     *  @param      int         $notrigger  1=Does not execute triggers, 0=execute triggers
     *  @return     int      		   		Return integer <0 if KO, >0 if OK
     */
    public function update_note($note, $suffix = '', $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Update public note (kept for backward compatibility)
     *
     * @param      string		$note		New value for note
     * @return     int      		   		Return integer <0 if KO, >0 if OK
     * @deprecated
     * @see update_note()
     */
    public function update_note_public($note)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update total_ht, total_ttc, total_vat, total_localtax1, total_localtax2 for an object (sum of lines).
     *  Must be called at end of methods addline or updateline.
     *
     *	@param	int		$exclspec          	>0 = Exclude special product (product_type=9)
     *  @param  'none'|'auto'|'0'|'1'	$roundingadjust		'none'=Do nothing, 'auto'=Use default method (MAIN_ROUNDOFTOTAL_NOT_TOTALOFROUND if defined, or '0'), '0'=Force mode Total of rounding, '1'=Force mode Rounding of total
     *  @param	int<0,1>	$nodatabaseupdate	1=Do not update database total fields of the main object. Update only properties in memory. Can be used to save SQL when this method is called several times, so we can do it only once at end.
     *  @param	?Societe	$seller				If roundingadjust is '0' or '1' or maybe 'auto', it means we recalculate total for lines before calculating total for object and for this, we need seller object (used to analyze lines to check corrupted data).
     *	@return	int<-1,1>					Return integer <0 if KO, >0 if OK
     */
    public function update_price($exclspec = 0, $roundingadjust = 'auto', $nodatabaseupdate = 0, $seller = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Add an object link into llx_element_element.
     *
     *	@param		string	$origin		Linked element type
     *	@param		int		$origin_id	Linked element id
     * 	@param		User	$f_user		User that create
     * 	@param		int		$notrigger	1=Does not execute triggers, 0=execute triggers
     *	@return		int					Return integer <=0 if KO, >0 if OK
     *	@see		fetchObjectLinked(), updateObjectLinked(), deleteObjectLinked()
     */
    public function add_object_linked($origin = \null, $origin_id = \null, $f_user = \null, $notrigger = 0)
    {
    }
    /**
     * Return an element type string formatted like element_element target_type and source_type
     *
     * @return string
     */
    public function getElementType()
    {
    }
    /**
     *	Fetch array of objects linked to current object (object of enabled modules only). Links are loaded into
     *		this->linkedObjectsIds array +
     *		this->linkedObjects array if $loadalsoobjects = 1 or $loadalsoobjects = type
     *  Possible usage for parameters:
     *  - all parameters empty -> we look all link to current object (current object can be source or target)
     *  - source id+type -> will get list of targets linked to source
     *  - target id+type -> will get list of sources linked to target
     *  - source id+type + target type -> will get list of targets of the type linked to source
     *  - target id+type + source type -> will get list of sources of the type linked to target
     *
     *	@param	?int		$sourceid			Object source id (if not defined, $this->id)
     *	@param  string		$sourcetype			Object source type (if not defined, $this->element)
     *	@param  ?int		$targetid			Object target id (if not defined, $this->id)
     *	@param  string		$targettype			Object target type (if not defined, $this->element)
     *	@param  string		$clause				'OR' or 'AND' clause used when both source id and target id are provided
     *  @param  int<0,1>	$alsosametype		0=Return only links to object that differs from source type. 1=Include also link to objects of same type.
     *  @param  string		$orderby			SQL 'ORDER BY' clause
     *  @param	int<0,1>|string	$loadalsoobjects	Load also the array $this->linkedObjects. Use 0 to not load (increase performances), Use 1 to load all, Use value of type ('facture', 'facturerec', ...) to load only a type of object.
     *	@return int<-1,1>						Return integer <0 if KO, >0 if OK
     *  @see	add_object_linked(), updateObjectLinked(), deleteObjectLinked()
     */
    public function fetchObjectLinked($sourceid = \null, $sourcetype = '', $targetid = \null, $targettype = '', $clause = 'OR', $alsosametype = 1, $orderby = 'sourcetype', $loadalsoobjects = 1)
    {
    }
    /**
     *	Clear the cache saying that all linked object were already loaded. So next fetchObjectLinked will reload all links.
     *
     *	@return int						Return integer <0 if KO, >0 if OK
     *  @see	fetchObjectLinked()
     */
    public function clearObjectLinkedCache()
    {
    }
    /**
     *	Update object linked of a current object
     *
     *	@param	int		$sourceid		Object source id
     *	@param  string	$sourcetype		Object source type
     *	@param  int		$targetid		Object target id
     *	@param  string	$targettype		Object target type
     * 	@param	User	$f_user			User that create
     * 	@param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return							int	>0 if OK, <0 if KO
     *	@see	add_object_linked(), fetObjectLinked(), deleteObjectLinked()
     */
    public function updateObjectLinked($sourceid = \null, $sourcetype = '', $targetid = \null, $targettype = '', $f_user = \null, $notrigger = 0)
    {
    }
    /**
     *	Delete all links between an object $this
     *
     *	@param	int		$sourceid		Object source id
     *	@param  string	$sourcetype		Object source type
     *	@param  int		$targetid		Object target id
     *	@param  string	$targettype		Object target type
     *  @param	int		$rowid			Row id of line to delete. If defined, other parameters are not used.
     * 	@param	User	$f_user			User that create
     * 	@param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return     					int	>0 if OK, <0 if KO
     *	@see	add_object_linked(), updateObjectLinked(), fetchObjectLinked()
     */
    public function deleteObjectLinked($sourceid = \null, $sourcetype = '', $targetid = \null, $targettype = '', $rowid = 0, $f_user = \null, $notrigger = 0)
    {
    }
    /**
     * Function used to get an array with all items linked to an object id in association table
     *
     * @param	int		$fk_object_where		id of object we need to get linked items
     * @param	string	$field_select			name of field we need to get a list
     * @param	string	$field_where			name of field of object we need to get linked items
     * @param	string	$table_element			name of association table
     * @return 	array|int						Array of record, -1 if empty
     */
    public static function getAllItemsLinkedByObjectID($fk_object_where, $field_select, $field_where, $table_element)
    {
    }
    /**
     * Count items linked to an object id in association table
     *
     * @param	int		$fk_object_where		id of object we need to get linked items
     * @param	string	$field_where			name of field of object we need to get linked items
     * @param	string	$table_element			name of association table
     * @return 	array|int						Array of record, -1 if empty
     */
    public static function getCountOfItemsLinkedByObjectID($fk_object_where, $field_where, $table_element)
    {
    }
    /**
     * Function used to remove all items linked to an object id in association table
     *
     * @param	int		$fk_object_where		id of object we need to remove linked items
     * @param	string	$field_where			name of field of object we need to delete linked items
     * @param	string	$table_element			name of association table
     * @return 	int								Return integer <0 if KO, 0 if nothing done, >0 if OK and something done
     */
    public static function deleteAllItemsLinkedByObjectID($fk_object_where, $field_where, $table_element)
    {
    }
    /**
     *      Set status of an object.
     *
     *      @param	int		$status			Status to set
     *      @param	int		$elementId		Id of element to force (use this->id by default if null)
     *      @param	string	$elementType	Type of element to force (use this->table_element by default)
     *      @param	string	$trigkey		Trigger key to use for trigger. Use '' means automatic but it is not recommended and is deprecated.
     *      @param	string	$fieldstatus	Name of status field in this->table_element
     *      @return int						Return integer <0 if KO, >0 if OK
     */
    public function setStatut($status, $elementId = \null, $elementType = '', $trigkey = '', $fieldstatus = 'fk_statut')
    {
    }
    /**
     *  Load type of canvas of an object if it exists
     *
     *  @param      int		$id     Record id
     *  @param      string	$ref    Record ref
     *  @return		int				Return integer <0 if KO, 0 if nothing done, >0 if OK
     */
    public function getCanvas($id = 0, $ref = '')
    {
    }
    /**
     * 	Get special code of a line
     *
     * 	@param	int		$lineid		Id of line
     * 	@return	int					Special code
     */
    public function getSpecialCode($lineid)
    {
    }
    /**
     *  Function to check if an object is used by others (by children).
     *  Check is done into this->childtables. There is no check into llx_element_element.
     *
     *  @param	int		$id			Force id of object
     *  @param	int		$entity		Force entity to check
     *  @return	int					Return integer <0 if KO, 0 if not used, >0 if already used
     */
    public function isObjectUsed($id = 0, $entity = 0)
    {
    }
    /**
     *  Function to say how many lines object contains
     *
     *	@param	int		$predefined		-1=All, 0=Count free product/service only, 1=Count predefined product/service only, 2=Count predefined product, 3=Count predefined service
     *  @return	int						Return integer <0 if KO, 0 if no predefined products, nb of lines with predefined products if found
     */
    public function hasProductsOrServices($predefined = -1)
    {
    }
    /**
     * Function that returns the total amount HT of discounts applied for all lines.
     *
     * @return 	float|null			Total amount of discount, or null if $table_element_line is empty
     */
    public function getTotalDiscount()
    {
    }
    /**
     * Return into unit=0, the calculated total of weight and volume of all lines * qty
     * Calculate by adding weight and volume of each product line, so properties ->volume/volume_units/weight/weight_units must be loaded on line.
     *
     * @return	array{weight:int|float,volume:int|float,ordered:int|float,toship:int|float}|array{}		array('weight'=>...,'volume'=>...)
     */
    public function getTotalWeightVolume()
    {
    }
    /**
     *	Set extra parameters
     *
     *	@return	int      Return integer <0 if KO, >0 if OK
     */
    public function setExtraParameters()
    {
    }
    // --------------------
    // TODO: All functions here must be redesigned and moved as they are not business functions but output functions
    // --------------------
    /* This is to show add lines */
    /**
     *	Show add free and predefined products/services form
     *
     *  @param	int		        $dateSelector       1=Show also date range input fields
     *  @param	Societe			$seller				Object thirdparty who sell
     *  @param	Societe			$buyer				Object thirdparty who buy
     *  @param	string			$defaulttpldir		Directory where to find the template
     *	@return	void
     */
    public function formAddObjectLine($dateSelector, $seller, $buyer, $defaulttpldir = '/core/tpl')
    {
    }
    /* This is to show array of line of details */
    /**
     *	Return HTML table for object lines
     *	TODO Move this into an output class file (htmlline.class.php)
     *	If lines are into a template, title must also be into a template
     *	But for the moment we don't know if it's possible as we keep a method available on overloaded objects.
     *
     *	@param	string		$action				Action code
     *	@param  Societe		$seller            	Object of seller third party
     *	@param  Societe  	$buyer             	Object of buyer third party
     *	@param	int			$selected		   	ID line selected
     *	@param  int	    	$dateSelector      	1=Show also date range input fields
     *  @param	string		$defaulttpldir		Directory where to find the template
     *	@return	void
     */
    public function printObjectLines($action, $seller, $buyer, $selected = 0, $dateSelector = 0, $defaulttpldir = '/core/tpl')
    {
    }
    /**
     *	Return HTML content of a detail line
     *	TODO Move this into an output class file (htmlline.class.php)
     *
     *	@param	string      		$action				GET/POST action
     *	@param  CommonObjectLine 	$line			    Selected object line to output
     *	@param  string	    		$var               	Not used
     *	@param  int		    		$num               	Number of line (0)
     *	@param  int		    		$i					I
     *	@param  int		    		$dateSelector      	1=Show also date range input fields
     *	@param  Societe	    		$seller            	Object of seller third party
     *	@param  Societe	    		$buyer             	Object of buyer third party
     *	@param	int					$selected		   	ID line selected
     *  @param  Extrafields			$extrafields		Object of extrafields
     *  @param	string				$defaulttpldir		Directory where to find the template (deprecated)
     *	@return	void
     */
    public function printObjectLine($action, $line, $var, $num, $i, $dateSelector, $seller, $buyer, $selected = 0, $extrafields = \null, $defaulttpldir = '/core/tpl')
    {
    }
    /* This is to show array of line of details of source object */
    /**
     * 	Return HTML table table of source object lines
     *  TODO Move this and previous function into output html class file (htmlline.class.php).
     *  If lines are into a template, title must also be into a template
     *  But for the moment we don't know if it's possible, so we keep the method available on overloaded objects.
     *
     *	@param	''|'services'	$restrictlist	''=All lines, 'services'=Restrict to services only
     *  @param  int[]       $selectedLines      Array of lines id for selected lines
     *  @return	void
     */
    public function printOriginLinesList($restrictlist = '', $selectedLines = array())
    {
    }
    /**
     * 	Return HTML with a line of table array of source object lines
     *  TODO Move this and previous function into output html class file (htmlline.class.php).
     *  If lines are into a template, titles must also be into a template
     *  But for the moment we don't know if it's possible as we keep a method available on overloaded objects.
     *
     * 	@param	CommonObjectLine	$line				Line
     * 	@param	string				$var				Not used
     *	@param	string				$restrictlist		''=All lines, 'services'=Restrict to services only (strike line if not)
     *  @param	string				$defaulttpldir		Directory where to find the template
     *  @param  int[]       		$selectedLines      Array of lines id for selected lines
     * 	@return	void
     */
    public function printOriginLine($line, $var, $restrictlist = '', $defaulttpldir = '/core/tpl', $selectedLines = array())
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Add resources to the current object : add entry into llx_element_resources
     *	Need $this->element & $this->id
     *
     *	@param		int		$resource_id		Resource id
     *	@param		string	$resource_type		'resource'
     *	@param		int		$busy				Busy or not
     *	@param		int		$mandatory			Mandatory or not
     *	@return		int							Return integer <=0 if KO, >0 if OK
     */
    public function add_element_resource($resource_id, $resource_type, $busy = 0, $mandatory = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Delete a link to resource line
     *
     *    @param	int		$rowid			Id of resource line to delete
     *    @param	string	$element		element name (for trigger) TODO: use $this->element into commonobject class
     *    @param	int		$notrigger		Disable all triggers
     *    @return   int						>0 if OK, <0 if KO
     */
    public function delete_resource($rowid, $element, $notrigger = 0)
    {
    }
    /**
     * Overwrite magic function to solve problem of cloning object that are kept as references
     *
     * @return void
     */
    public function __clone()
    {
    }
    /**
     * Common function for all objects extending CommonObject for generating documents
     *
     * @param	string 		$modelspath 	Relative folder where generators are placed
     * @param	string 		$modele 		Generator to use. Caller must set it to from obj->model_pdf or from GETPOST for example.
     * @param	Translate 	$outputlangs 	Output language to use
     * @param	int<0,1>	$hidedetails 	1 to hide details. 0 by default
     * @param	int<0,1>	$hidedesc 		1 to hide product description. 0 by default
     * @param	int<0,1>	$hideref 		1 to hide product reference. 0 by default
     * @param	?array<string,mixed>	$moreparams	Array to provide more information
     * @return	int<-1,1> 				>0 if OK, <0 if KO
     * @see	addFileIntoDatabaseIndex()
     */
    protected function commonGenerateDocument($modelspath, $modele, $outputlangs, $hidedetails, $hidedesc, $hideref, $moreparams = \null)
    {
    }
    /**
     * Index a file into the ECM database
     *
     * @param	string	$destfull				Full path of file to index
     * @param	int		$update_main_doc_field	Update field main_doc field into the table of the object.
     * 											This param is set when called for a document generation if document generator hase
     * 											->update_main_doc_field set and returns ->result['fullpath'].
     * @return	int								Return integer <0 if KO, >0 if OK
     */
    public function indexFile($destfull, $update_main_doc_field)
    {
    }
    /**
     *  Build thumb
     *  @todo Move this into files.lib.php
     *
     *  @param      string	$file           Path file in UTF8 to original file to create thumbs from.
     *	@return		void
     */
    public function addThumbs($file)
    {
    }
    /**
     *  Delete thumbs
     *  @todo Move this into files.lib.php
     *
     *  @param      string	$file           Path file in UTF8 to original file to delete thumbs.
     *	@return		void
     */
    public function delThumbs($file)
    {
    }
    /* Functions common to commonobject and commonobjectline */
    /* For default values */
    /**
     * Return the default value to use for a field when showing the create form of object.
     * Return values in this order:
     * 1) If parameter is available into POST, we return it first.
     * 2) If not but an alternate value was provided as parameter of function, we return it.
     * 3) If not but a constant $conf->global->OBJECTELEMENT_FIELDNAME is set, we return it (It is better to use the dedicated table).
     * 4) Return value found into database (TODO No yet implemented)
     *
     * @param   string              $fieldname          Name of field
     * @param   string              $alternatevalue     Alternate value to use
     * @param   string              $type    			Type of data
     * @return  string|string[]                         Default value (can be an array if the GETPOST return an array)
     **/
    public function getDefaultCreateValueFor($fieldname, $alternatevalue = \null, $type = 'alphanohtml')
    {
    }
    /* For triggers */
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Call trigger based on this instance.
     * Some context information may also be provided into array property this->context.
     * NB:  Error from trigger are stacked in interface->errors
     * NB2: If return code of triggers are < 0, action calling trigger should cancel all transaction.
     *
     * @param   string    $triggerName   trigger's name to execute
     * @param   User      $user           Object user
     * @return  int                       Result of run_triggers
     */
    public function call_trigger($triggerName, $user)
    {
    }
    /* Functions for data in other language */
    /**
     *  Function to get alternative languages of a data into $this->array_languages
     *  This method is NOT called by method fetch of objects but must be called separately.
     *
     *  @return	int<-1,1>					Return integer <0 if error, 0 if no values of alternative languages to find nor found, 1 if a value was found and loaded
     *  @see fetch_optionnals()
     */
    public function fetchValuesForExtraLanguages()
    {
    }
    /**
     * Fill array_options property of object by extrafields value (using for data sent by forms)
     *
     * @param	string	$onlykey		Only the following key is filled. When we make update of only one language field ($action = 'update_languages'), calling page must set this to avoid to have other languages being reset.
     * @return	int<-1,1>				1 if array_options set, 0 if no value, -1 if error (field required missing for example)
     */
    public function setValuesForExtraLanguages($onlykey = '')
    {
    }
    /* Functions for extrafields */
    /**
     * Function to make a fetch but set environment to avoid to load computed values before.
     *
     * @param	int		$id			ID of object
     * @return	int<-1,1>			>0 if OK, 0 if not found, <0 if KO
     */
    public function fetchNoCompute($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to get extra fields of an object into $this->array_options
     *  This method is in most cases called by method fetch of objects but you can call it separately.
     *
     *  @param	int		$rowid			Id of line. Use the id of object if not defined. Deprecated. Function must be called without parameters.
     *  @param array{}|array{label:array<string,string>,type:array<string,string>,size:array<string,string>,default:array<string,string>,computed:array<string,string>,unique:array<string,int>,required:array<string,int>,param:array<string,mixed>,perms:array<string,mixed[]>,list:array<string,int>|array<string,string>,pos:array<string,int>,totalizable:array<string,int>,help:array<string,string>,printable:array<string,int>,enabled:array<string,int>,langfile:array<string,string>,css:array<string,string>,csslist:array<string,string>,hidden:array<string,int>,mandatoryfieldsofotherentities?:array<string,string>,loaded?:int,count:int}		$optionsArray	Array resulting of call of extrafields->fetch_name_optionals_label(). Deprecated. Function must be called without parameters.
     *  @return	int<-1,1>				Return integer <0 if error, 0 if no values of extrafield to find nor found, 1 if an attribute is found and value loaded
     *  @see fetchValuesForExtraLanguages()
     */
    public function fetch_optionals($rowid = \null, $optionsArray = \null)
    {
    }
    /**
     *	Delete all extra fields values for the current object.
     *
     *  @return	int<-1,1>	Return integer <0 if KO, >0 if OK
     *  @see deleteExtraLanguages(), insertExtraField(), updateExtraField(), setValueFrom()
     */
    public function deleteExtraFields()
    {
    }
    /**
     *	Add/Update all extra fields values for the current object.
     *  Data to describe values to insert/update are stored into $this->array_options=array('options_codeforfield1'=>'valueforfield1', 'options_codeforfield2'=>'valueforfield2', ...)
     *  This function delete record with all extrafields and insert them again from the array $this->array_options.
     *
     *  @param	string		$trigger		If defined, call also the trigger (for example COMPANY_MODIFY)
     *  @param	User		$userused		Object user
     *  @return int<-1,1>					-1=error, O=did nothing, 1=OK
     *  @see insertExtraLanguages(), updateExtraField(), deleteExtraField(), setValueFrom()
     */
    public function insertExtraFields($trigger = '', $userused = \null)
    {
    }
    /**
     *	Add/Update all extra fields values for the current object.
     *  Data to describe values to insert/update are stored into $this->array_options=array('options_codeforfield1'=>'valueforfield1', 'options_codeforfield2'=>'valueforfield2', ...)
     *  This function delete record with all extrafields and insert them again from the array $this->array_options.
     *
     *  @param	string		$trigger		If defined, call also the trigger (for example COMPANY_MODIFY)
     *  @param	User		$userused		Object user
     *  @return int<-1,1>					-1=error, O=did nothing, 1=OK
     *  @see insertExtraFields(), updateExtraField(), setValueFrom()
     */
    public function insertExtraLanguages($trigger = '', $userused = \null)
    {
    }
    /**
     *	Update 1 extra field value for the current object. Keep other fields unchanged.
     *  Data to describe values to update are stored into $this->array_options=array('options_codeforfield1'=>'valueforfield1', 'options_codeforfield2'=>'valueforfield2', ...)
     *
     *  @param  string      $key    		Key of the extrafield to update (without starting 'options_')
     *  @param	string		$trigger		If defined, call also the trigger (for example COMPANY_MODIFY)
     *  @param	User		$userused		Object user
     *  @return int<-1,1>              		-1=error, O=did nothing, 1=OK
     *  @see updateExtraLanguages(), insertExtraFields(), deleteExtraFields(), setValueFrom()
     */
    public function updateExtraField($key, $trigger = \null, $userused = \null)
    {
    }
    /**
     * Convenience method for retrieving the value of an extrafield without actually fetching it from the database.
     *
     * @param string $key Name of the extrafield
     * @return mixed|null
     */
    public function getExtraField($key)
    {
    }
    /**
     * Convenience method for setting the value of an extrafield without actually updating it in the database.
     *
     * @param string $key   Name of the extrafield
     * @param mixed  $value Value to be assigned to the extrafield
     * @return void
     */
    public function setExtraField($key, $value)
    {
    }
    /**
     *	Update an extra language value for the current object.
     *  Data to describe values to update are stored into $this->array_options=array('options_codeforfield1'=>'valueforfield1', 'options_codeforfield2'=>'valueforfield2', ...)
     *
     *  @param  string      $key    		Key of the extrafield (without starting 'options_')
     *  @param	string		$trigger		If defined, call also the trigger (for example COMPANY_MODIFY)
     *  @param	User		$userused		Object user
     *  @return int                 		-1=error, O=did nothing, 1=OK
     *  @see updateExtraField(), insertExtraLanguages()
     */
    public function updateExtraLanguages($key, $trigger = \null, $userused = \null)
    {
    }
    /**
     * Return HTML string to put an input field into a page
     * Code very similar with showInputField of extra fields
     *
     * @param ?array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}	$val	Array of properties for field to show (used only if ->fields not defined)
     *                                                                                                                                                                                                                                                                                                                                          Array of properties of field to show
     * @param  string  		$key           Key of attribute
     * @param  string|string[]	$value         Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value, for array type must be array)
     * @param  string  		$moreparam     To add more parameters on html input tag
     * @param  string  		$keysuffix     Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param  string  		$keyprefix     Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param  string|int	$morecss       Value for css to define style/length of field. May also be a numeric.
     * @param  int<0,1>		$nonewbutton   Force to not show the new button on field that are links to object
     * @return string
     */
    public function showInputField($val, $key, $value, $moreparam = '', $keysuffix = '', $keyprefix = '', $morecss = 0, $nonewbutton = 0)
    {
    }
    /**
     * Return HTML string to show a field into a page
     * Code very similar with showOutputField of extra fields
     *
     * @param array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}	$val	Array of properties of field to show
     * @param  string  	$key            	Key of attribute
     * @param  string  	$value          	Preselected value to show (for date type it must be in timestamp format, for amount or price it must be a php numeric value)
     * @param  string  	$moreparam      	To add more parameters on html tag
     * @param  string  	$keysuffix      	Prefix string to add into name and id of field (can be used to avoid duplicate names)
     * @param  string  	$keyprefix      	Suffix string to add into name and id of field (can be used to avoid duplicate names)
     * @param  mixed   	$morecss        	Value for CSS to use (Old usage: May also be a numeric to define a size).
     * @return string
     */
    public function showOutputField($val, $key, $value, $moreparam = '', $keysuffix = '', $keyprefix = '', $morecss = '')
    {
    }
    /**
     * clear validation message result for a field
     *
     * @param string $fieldKey Key of attribute to clear
     * @return void
     */
    public function clearFieldError($fieldKey)
    {
    }
    /**
     * set validation error message a field
     *
     * @param string $fieldKey Key of attribute
     * @param string $msg the field error message
     * @return void
     */
    public function setFieldError($fieldKey, $msg = '')
    {
    }
    /**
     * get field error message
     *
     * @param  string  $fieldKey            Key of attribute
     * @return string						Error message of validation ('' if no error)
     */
    public function getFieldError($fieldKey)
    {
    }
    /**
     * Return validation test result for a field
     *
     * @param array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}>	$fields	Array of properties of field to show
     * @param  string  $fieldKey            Key of attribute
     * @param  string  $fieldValue          value of attribute
     * @return bool return false if fail true on success, see $this->error for error message
     */
    public function validateField($fields, $fieldKey, $fieldValue)
    {
    }
    /**
     * Function to show lines of extrafields with output data.
     * This function is responsible to output the <tr> and <td> according to correct number of columns received into $params['colspan'] or <div> according to $display_type
     *
     * @param 	Extrafields $extrafields    Extrafield Object
     * @param 	string      $mode           Show output ('view') or input ('create' or 'edit') for extrafield
     * @param 	array<string,mixed>	$params	Optional parameters. Example: array('style'=>'class="oddeven"', 'colspan'=>$colspan)
     * @param 	string      $keysuffix      Suffix string to add after name and id of field (can be used to avoid duplicate names)
     * @param 	string      $keyprefix      Prefix string to add before name and id of field (can be used to avoid duplicate names)
     * @param	string		$onetrtd		All fields in same tr td. Used by objectline_create.tpl.php for example.
     * @param	string		$display_type	"card" for form display, "line" for document line display (extrafields on propal line, order line, etc...)
     * @return 	string						String with html content to show
     */
    public function showOptionals($extrafields, $mode = 'view', $params = \null, $keysuffix = '', $keyprefix = '', $onetrtd = '', $display_type = 'card')
    {
    }
    /**
     * @param 	string 	$type	Type for prefix
     * @return 	string			JavaScript code to manage dependency
     */
    public function getJSListDependancies($type = '_extra')
    {
    }
    /**
     * Returns the rights used for this class
     *
     * @return null|int|stdClass		Object of permission for the module
     */
    public function getRights()
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     * This function is meant to be called from replaceThirdparty with the appropriate tables
     * Column name fk_soc MUST exist.
     *
     * @param  DoliDB	$dbs			Database handler
     * @param  int		$origin_id		Old thirdparty id (the thirdparty to delete)
     * @param  int		$dest_id		New thirdparty id (the thirdparty that will received element of the other)
     * @param  string[]	$tables			Tables that need to be changed
     * @param  int<0,1>	$ignoreerrors	Ignore errors. Return true even if errors. We need this when replacement can fails like for categories (categorie of old thirdparty may already exists on new one)
     * @return bool						True if success, False if error
     */
    public static function commonReplaceThirdparty(\DoliDB $dbs, $origin_id, $dest_id, array $tables, $ignoreerrors = 0)
    {
    }
    /**
     * Function used to replace a product id with another one.
     * This function is meant to be called from replaceProduct with the appropriate tables
     * Column name fk_product MUST be used to identify products
     *
     * @param  DoliDB		$dbs			Database handler
     * @param  int			$origin_id		Old product id (the product to delete)
     * @param  int 			$dest_id		New product id (the product that will received element of the other)
     * @param  string[]		$tables			Tables that need to be changed
     * @param  int<0,1>		$ignoreerrors	Ignore errors. Return true even if errors. We need this when replacement can fails like for categories (categorie of old product may already exists on new one)
     * @return bool							True if success, False if error
     */
    public static function commonReplaceProduct(\DoliDB $dbs, $origin_id, $dest_id, array $tables, $ignoreerrors = 0)
    {
    }
    /**
     * Get buy price to use for margin calculation. This function is called when buy price is unknown.
     *	 Set buy price = sell price if ForceBuyingPriceIfNull configured,
     *   elseif calculation MARGIN_TYPE = 'costprice' and costprice is defined, use costprice as buyprice
     *	 elseif calculation MARGIN_TYPE = 'pmp' and pmp is calculated, use pmp as buyprice
     *	 else set min buy price as buy price
     *
     * @param float		$unitPrice			Product unit price
     * @param float		$discountPercent	Line discount percent
     * @param int		$fk_product			Product id
     * @return float|int<-1,-1>				Return buy price if OK, integer <0 if KO
     */
    public function defineBuyPrice($unitPrice = 0.0, $discountPercent = 0.0, $fk_product = 0)
    {
    }
    /**
     * Function used to get the logos or photos of an object
     *
     * @param 	string	$modulepart		Module part
     * @param 	string	$imagesize		Image size ('', 'mini' or 'small')
     * @return	array{dir:string,file:string,originalfile:string,altfile:string,email:string,capture:string}	Array of data to show photo
     */
    public function getDataToShowPhoto($modulepart, $imagesize)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Show photos of an object (nbmax maximum), into several columns
     *
     *  @param		string					$modulepart		'product', 'ticket', ...
     *  @param      string					$sdir        	Directory to scan (full absolute path)
     *  @param      int<0,1>|''|'small'		$size        	0 or ''=original size, 1 or 'small'=use thumbnail if possible
     *  @param      int						$nbmax       	Nombre maximum de photos (0=pas de max)
     *  @param      int						$nbbyrow     	Number of image per line or -1 to use div separator or 0 to use no separator. Used only if size=1 or 'small'.
     * 	@param		int						$showfilename	1=Show filename
     * 	@param		int						$showaction		1=Show icon with action links (resize, delete)
     * 	@param		int						$maxHeight		Max height of original image when size='small' (so we can use original even if small requested). If 0, always use 'small' thumb image.
     * 	@param		int						$maxWidth		Max width of original image when size='small'
     *  @param      int     				$nolink         Do not add a href link to view enlarged imaged into a new tab
     *  @param      int|string  			$overwritetitle Do not add title tag on image
     *  @param		int						$usesharelink	Use the public shared link of image (if not available, the 'nophoto' image will be shown instead)
     *  @param		string					$cache			A string if we want to use a cached version of image
     *  @param		string					$addphotorefcss	Add CSS to img of photos
     *  @return     string									Html code to show photo. Number of photos shown is saved in this->nbphoto
     */
    public function show_photos($modulepart, $sdir, $size = 0, $nbmax = 0, $nbbyrow = 5, $showfilename = 0, $showaction = 0, $maxHeight = 120, $maxWidth = 160, $nolink = 0, $overwritetitle = 0, $usesharelink = 0, $cache = '', $addphotorefcss = 'photoref')
    {
    }
    /**
     * Function test if type is array
     *
     * @param array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}	$info	content information of field
     * @return  bool			true if array
     */
    protected function isArray($info)
    {
    }
    /**
     * Function test if type is date
     *
     * @param array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}	$info	content information of field
     * @return  bool			true if date
     */
    public function isDate($info)
    {
    }
    /**
     * Function test if type is duration
     *
     * @param array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}	$info	content information of field
     * @return  bool			true if field of type duration
     */
    public function isDuration($info)
    {
    }
    /**
     * Function test if type is integer
     *
     * @param array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}	$info	Properties of field
     * @return  bool			true if integer
     */
    public function isInt($info)
    {
    }
    /**
     * Function test if type is float
     *
     * @param array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}	$info	content information of field
     * @return  bool			true if float
     */
    public function isFloat($info)
    {
    }
    /**
     * Function test if type is text
     *
     * @param array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}	$info	Properties of field
     * @return  bool			true if type text
     */
    public function isText($info)
    {
    }
    /**
     * Function test if field can be null
     *
     * @param array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}	$info	content information of field
     * @return  bool			true if it can be null
     */
    protected function canBeNull($info)
    {
    }
    /**
     * Function test if field is forced to null if zero or empty
     *
     * @param array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}	$info	content information of field
     * @return  bool			true if forced to null
     */
    protected function isForcedToNullIfZero($info)
    {
    }
    /**
     * Function test if is indexed
     *
     * @param array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}	$info	content information of field
     * @return                  bool
     */
    protected function isIndex($info)
    {
    }
    /**
     * Function to return the array of data key-value from the ->fields and all the ->properties of an object.
     *
     * Note: $this->${field} are set by the page that make the createCommon() or the updateCommon().
     * $this->${field} should be a clean and string value (so date are formatted for SQL insert).
     *
     * @return array<string,null|int|float|string>	Array with all values of each property to update
     */
    protected function setSaveQuery()
    {
    }
    /**
     * Function to load data from a SQL pointer into properties of current object $this
     *
     * @param   stdClass    $obj    Contain data of object from database
     * @return void
     */
    public function setVarsFromFetchObj(&$obj)
    {
    }
    /**
     * Sets all object fields to null. Useful for example in lists, when printing multiple lines and a different object os fetched for each line.
     * @return void
     */
    public function emtpyObjectVars()
    {
    }
    /**
     * Function to concat keys of fields
     *
     * @param   string		$alias			String of alias of table for fields. For example 't'. It is recommended to use '' and set alias into fields definition.
     * @param	string[]	$excludefields	Array of fields to exclude
     * @return  string						List of alias fields
     */
    public function getFieldList($alias = '', $excludefields = array())
    {
    }
    /**
     * Add quote to field value if necessary
     *
     * @param 	string|int	$value			Value to protect
     * @param array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}	$fieldsentry	Properties of field
     * @return 	string|int
     */
    protected function quote($value, $fieldsentry)
    {
    }
    /**
     * Create object in the database
     *
     * @param  User		$user		User that creates
     * @param  int<0,1>	$notrigger	0=launch triggers after, 1=disable triggers
     * @return int<-1,max>			Return integer <0 if KO, Id of created object if OK
     */
    public function createCommon(\User $user, $notrigger = 0)
    {
    }
    /**
     * Load object in memory from the database. This does not load line. This is done by parent fetch() that call fetchCommon
     *
     * @param	int			$id				Id object
     * @param	string		$ref			Ref
     * @param	string		$morewhere		More SQL filters (' AND ...')
     * @param	int<0,1>	$noextrafields	0=Default to load extrafields, 1=No extrafields
     * @return 	int<-4,1>	      			Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetchCommon($id, $ref = \null, $morewhere = '', $noextrafields = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param	string		$morewhere		More SQL filters (' AND ...')
     * @param	int<0,1>	$noextrafields	0=Default to load extrafields, 1=No extrafields
     * @return 	int<-1,1>        			Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetchLinesCommon($morewhere = '', $noextrafields = 0)
    {
    }
    /**
     * Update object into database
     *
     * @param  User		$user     	User that modifies
     * @param  int<0,1>	$notrigger	0=launch triggers after, 1=disable triggers
     * @return int<-1,1>           	Return integer <0 if KO, >0 if OK
     */
    public function updateCommon(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param 	User 		$user       		User that deletes
     * @param 	int<0,1>	$notrigger  		0=launch triggers after, 1=disable triggers
     * @param	int<0,1>	$forcechilddeletion	0=no, 1=Force deletion of children
     * @return 	int<-1,1>						Return integer <0 if KO, 0=Nothing done because object has child, >0 if OK
     */
    public function deleteCommon(\User $user, $notrigger = 0, $forcechilddeletion = 0)
    {
    }
    /**
     * Delete all child object from a parent ID
     *
     * @param	int			$parentId      	Parent Id
     * @param	string		$parentField   	Name of Foreign key parent column
     * @param 	string		$filter       	Filter as an Universal Search string.
     * 										Example: '((client:=:1) OR ((client:>=:2) AND (client:<=:3))) AND (client:!=:8) AND (nom:like:'a%')'
     * @param  	string      $filtermode   	No more used
     * @return	int							Return integer <0 if KO, >0 if OK
     * @throws 	Exception
     */
    public function deleteByParentField($parentId = 0, $parentField = '', $filter = '', $filtermode = "AND")
    {
    }
    /**
     *  Delete a line of object in database
     *
     *	@param  User	$user       User that delete
     *  @param	int		$idline		Id of line to delete
     *  @param 	int 	$notrigger  0=launch triggers after, 1=disable triggers
     *  @return int         		>0 if OK, <0 if KO
     */
    public function deleteLineCommon(\User $user, $idline, $notrigger = 0)
    {
    }
    /**
     *	Set to a status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$status			New status to set (often a constant like self::STATUS_XXX)
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *  @param  string  $triggercode    Trigger code to use
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function setStatusCommon($user, $status, $notrigger = 0, $triggercode = '')
    {
    }
    /**
     *	Set to a signed status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$status			New status to set (often a constant like self::STATUS_XXX)
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *  @param  string  $triggercode    Trigger code to use
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function setSignedStatusCommon($user, $status, $notrigger = 0, $triggercode = '')
    {
    }
    /**
     * Initialise object with example values
     * Id must be 0 if object instance is a specimen
     *
     * @return int
     */
    public function initAsSpecimenCommon()
    {
    }
    /* Part for comments */
    /**
     * Load comments linked with current task
     *
     * @return int<0,max>|-1        Returns the number of comments if OK, -1 if error
     */
    public function fetchComments()
    {
    }
    /**
     * Return nb comments already posted
     *
     * @return int
     */
    public function getNbComments()
    {
    }
    /**
     * Trim object parameters
     *
     * @param string[] $parameters array of parameters to trim
     * @return void
     */
    public function trimParameters($parameters)
    {
    }
    /* Part for categories/tags */
    /**
     * Sets object to given categories.
     *
     * Deletes object from existing categories not supplied.
     * Adds it to non existing supplied categories.
     * Existing categories are left untouch.
     *
     * @param 	string 		$type_categ 	Category type ('customer', 'supplier', 'website_page', ...)
     * @return	int							Array of category objects or < 0 if KO
     */
    public function getCategoriesCommon($type_categ)
    {
    }
    /**
     * Sets object to given categories.
     *
     * Adds it to non existing supplied categories.
     * Deletes object from existing categories not supplied (if remove_existing==true).
     * Existing categories are left untouch.
     *
     * @param 	int[]|int 	$categories 		Category ID or array of Categories IDs
     * @param 	string 		$type_categ 		Category type ('customer', 'supplier', 'website_page', ...) defined into const class Categorie type
     * @param 	boolean		$remove_existing 	True: Remove existings categories from Object if not supplies by $categories, False: let them
     * @return	int								Return integer <0 if KO, >0 if OK
     */
    public function setCategoriesCommon($categories, $type_categ = '', $remove_existing = \true)
    {
    }
    /**
     * Copy related categories to another object
     *
     * @param  int		$fromId	Id object source
     * @param  int		$toId	Id object cible
     * @param  string	$type	Type of category ('product', ...)
     * @return int      Return integer < 0 if error, > 0 if ok
     */
    public function cloneCategories($fromId, $toId, $type = '')
    {
    }
    /**
     * Delete related files of object in database
     *
     * @param	integer		$mode		0=Use path to find record, 1=Use src_object_xxx fields (Mode 1 is recommended for new objects)
     * @return 	bool					True if OK, False if KO
     */
    public function deleteEcmFiles($mode = 0)
    {
    }
}