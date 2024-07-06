<?php

/**
 *	Class to manage shipments
 */
class Expedition extends \CommonObject
{
    use \CommonIncoterm;
    /**
     * @var string ID to identify managed object
     */
    public $element = "shipping";
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = "fk_expedition";
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = "expedition";
    /**
     * @var string    Name of subtable line
     */
    public $table_element_line = "expeditiondet";
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'dolly';
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array();
    /**
     * @var int ID of user author
     */
    public $user_author_id;
    /**
     * @var int ID of user author
     */
    public $fk_user_author;
    public $socid;
    /**
     * @var string Customer ref
     * @deprecated
     * @see $ref_customer
     */
    public $ref_client;
    /**
     * @var string Customer ref
     */
    public $ref_customer;
    /**
     * @var int warehouse id
     */
    public $entrepot_id;
    /**
     * @var string Tracking number
     */
    public $tracking_number;
    /**
     * @var string Tracking url
     */
    public $tracking_url;
    public $billed;
    /**
     * @var string name of pdf model
     */
    public $model_pdf;
    public $trueWeight;
    public $weight_units;
    public $trueWidth;
    public $width_units;
    public $trueHeight;
    public $height_units;
    public $trueDepth;
    public $depth_units;
    // A denormalized value
    public $trueSize;
    public $livraison_id;
    /**
     * @var double
     */
    public $multicurrency_subprice;
    public $size_units;
    public $sizeH;
    public $sizeS;
    public $sizeW;
    public $weight;
    /**
     * @var integer|string Date delivery planned
     */
    public $date_delivery;
    /**
     * @deprecated
     * @see $date_shipping
     */
    public $date;
    /**
     * @deprecated
     * @see $date_shipping
     */
    public $date_expedition;
    /**
     * Effective delivery date
     * @var integer|string
     */
    public $date_shipping;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    /**
     * @var integer|string date_valid
     */
    public $date_valid;
    public $meths;
    public $listmeths;
    // List of carriers
    /**
     * @var int ID of order
     */
    public $commande_id;
    /**
     * @var Commande order
     */
    public $commande;
    /**
     * @var ExpeditionLigne[] array of shipping lines
     */
    public $lines = array();
    // Multicurrency
    /**
     * @var int Currency ID
     */
    public $fk_multicurrency;
    /**
     * @var string multicurrency code
     */
    public $multicurrency_code;
    public $multicurrency_tx;
    public $multicurrency_total_ht;
    public $multicurrency_total_tva;
    public $multicurrency_total_ttc;
    /**
     * @var int
     */
    public $signed_status = 0;
    /**
     * Draft status
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated status
     * -> parcel is ready to be sent
     * prev status : draft
     * next status : closed or shipment_in_progress
     */
    const STATUS_VALIDATED = 1;
    /**
     * Closed status
     * -> parcel was received by customer / end of process
     * prev status : validated or shipment_in_progress
     *
     */
    const STATUS_CLOSED = 2;
    /**
     * Canceled status
     */
    const STATUS_CANCELED = -1;
    /**
     * Expedition in progress
     * -> package exit the warehouse and is now
     *    in the truck or into the hand of the deliverer
     * prev status : validated
     * next status : closed
     */
    const STATUS_SHIPMENT_IN_PROGRESS = 3;
    /**
     * No signature
     */
    const STATUS_NO_SIGNATURE = 0;
    /**
     * Signed status
     */
    const STATUS_SIGNED = 1;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Return next expedition ref
     *
     *	@param	Societe		$soc	Thirdparty object
     *	@return string				Free reference for expedition
     */
    public function getNextNumRef($soc)
    {
    }
    /**
     *  Create expedition en base
     *
     *  @param	User	$user       Object du user qui cree
     * 	@param		int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return int 				Return integer <0 si erreur, id expedition creee si ok
     */
    public function create($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Create a expedition line
     *
     * @param 	int		$entrepot_id		Id of warehouse
     * @param 	int		$origin_line_id		Id of source line
     * @param 	float	$qty				Quantity
     * @param 	int		$rang				Rang
     * @param	array	$array_options		extrafields array
     * @return	int							Return integer <0 if KO, line_id if OK
     */
    public function create_line($entrepot_id, $origin_line_id, $qty, $rang = 0, $array_options = [])
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Create the detail of the expedition line. Create 1 record into expeditiondet for each warehouse and n record for each lot in this warehouse into expeditiondet_batch.
     *
     * @param 	object		$line_ext			Object with full information of line. $line_ext->detail_batch must be an array of ExpeditionLineBatch
     * @param	array		$array_options		extrafields array
     * @return	int								Return integer <0 if KO, >0 if OK
     */
    public function create_line_batch($line_ext, $array_options = [])
    {
    }
    /**
     *	Get object and lines from database
     *
     *	@param	int		$id       	Id of object to load
     * 	@param	string	$ref		Ref of object
     * 	@param	string	$ref_ext	External reference of object
     * 	@param	string	$notused	Internal reference of other object
     *	@return int			        >0 if OK, 0 if not found, <0 if KO
     */
    public function fetch($id, $ref = '', $ref_ext = '', $notused = '')
    {
    }
    /**
     *  Validate object and update stock if option enabled
     *
     *  @param      User		$user       Object user that validate
     *  @param		int			$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return     int						Return integer <0 if OK, >0 if KO
     */
    public function valid($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Create a delivery receipt from a shipment
     *
     *	@param	User	$user       User
     *  @return int  				Return integer <0 if KO, >=0 if OK
     */
    public function create_delivery($user)
    {
    }
    /**
     * Add an expedition line.
     * If STOCK_WAREHOUSE_NOT_REQUIRED_FOR_SHIPMENTS is set, you can add a shipment line, with no stock source defined
     * If STOCK_MUST_BE_ENOUGH_FOR_SHIPMENT is not set, you can add a shipment line, even if not enough into stock
     * Note: For product that need a batch number, you must use addline_batch()
     *
     * @param 	int		$entrepot_id		Id of warehouse
     * @param 	int		$id					Id of source line (order line)
     * @param 	float	$qty				Quantity
     * @param	array	$array_options		extrafields array
     * @return	int							Return integer <0 if KO, >0 if OK
     */
    public function addline($entrepot_id, $id, $qty, $array_options = [])
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Add a shipment line with batch record
     *
     * @param 	array		$dbatch		Array of value (key 'detail' -> Array, key 'qty' total quantity for line, key ix_l : original line index)
     * @param	array		$array_options		extrafields array
     * @return	int						Return integer <0 if KO, >0 if OK
     */
    public function addline_batch($dbatch, $array_options = [])
    {
    }
    /**
     *  Update database
     *
     *  @param	User	$user        	User that modify
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int 			       	Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     * 	Cancel shipment.
     *
     *  @param  int  $notrigger 			Disable triggers
     *  @param  bool $also_update_stock  	true if the stock should be increased back (false by default)
     * 	@return	int							>0 if OK, 0 if deletion done but failed to delete files, <0 if KO
     */
    public function cancel($notrigger = 0, $also_update_stock = \false)
    {
    }
    /**
     * 	Delete shipment.
     * 	Warning, do not delete a shipment if a delivery is linked to (with table llx_element_element)
     *
     *  @param	User	$user					User making the deletion
     *  @param  int  	$notrigger 				Disable triggers
     *  @param  bool 	$also_update_stock  	true if the stock should be increased back (false by default)
     * 	@return	int								>0 if OK, 0 if deletion done but failed to delete files, <0 if KO
     */
    public function delete($user = \null, $notrigger = 0, $also_update_stock = \false)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load lines
     *
     *	@return	int		>0 if OK, Otherwise if KO
     */
    public function fetch_lines()
    {
    }
    /**
     *  Delete detail line
     *
     *  @param		User	$user			User making deletion
     *  @param		int		$lineid			Id of line to delete
     *  @return     int         			>0 if OK, <0 if KO
     */
    public function deleteLine($user, $lineid)
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
     *	Return clicable link of object (with eventually picto)
     *
     *	@param      int			$withpicto      			Add picto into link
     *	@param      string		$option         			Where the link point to
     *	@param      int			$max          				Max length to show
     *	@param      int			$short						Use short labels
     *  @param      int         $notooltip      			1=No tooltip
     *  @param      int     	$save_lastsearch_value		-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return     string          						String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $max = 0, $short = 0, $notooltip = 0, $save_lastsearch_value = -1)
    {
    }
    /**
     *	Return status label
     *
     *	@param      int		$mode      	0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto
     *	@return     string      		Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return label of a status
     *
     * @param   int		$status		Id statut
     * @param  	int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * @return  string				Label of status
     */
    public function LibStatut($status, $mode)
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set delivery date
     *
     *	@param      User 	$user        		Object user that modify
     *	@param      int		$delivery_date		Delivery date
     *	@return     int         				Return integer <0 if ko, >0 if ok
     *	@deprecated Use  setDeliveryDate
     */
    public function set_date_livraison($user, $delivery_date)
    {
    }
    /**
     *	Set the planned delivery date
     *
     *	@param      User			$user        		Object user that modify
     *	@param      integer 		$delivery_date     Date of delivery
     *	@return     int         						Return integer <0 if KO, >0 if OK
     */
    public function setDeliveryDate($user, $delivery_date)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Fetch deliveries method and return an array. Load array this->meths(rowid=>label).
     *
     * 	@return	void
     */
    public function fetch_delivery_methods()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Fetch all deliveries method and return an array. Load array this->listmeths.
     *
     *  @param  int      $id     only this carrier, all if none
     *  @return void
     */
    public function list_delivery_methods($id = 0)
    {
    }
    /**
     * Forge an set tracking url
     *
     * @param	string	$value		Value
     * @return	void
     */
    public function getUrlTrackingStatus($value = '')
    {
    }
    /**
     *	Classify the shipping as closed (this records also the stock movement)
     *
     *	@return     int     Return integer <0 if KO, >0 if OK
     */
    public function setClosed()
    {
    }
    /**
     * Manage Stock MVt onb Close or valid Shipment
     *
     * @param      	User 	$user        		Object user that modify
     * @param		string	$labelmovement		Label of movement
     * @return     	int     					Return integer <0 if KO, >0 if OK
     * @throws Exception
     *
     */
    private function manageStockMvtOnEvt($user, $labelmovement = 'ShipmentClassifyClosedInDolibarr')
    {
    }
    /**
     *	Classify the shipping as invoiced (used for example by trigger when WORKFLOW_SHIPPING_CLASSIFY_BILLED_INVOICE is on)
     *
     *	@return     int     Return integer <0 if ko, >0 if ok
     */
    public function setBilled()
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
     *	Classify the shipping as validated/opened
     *
     *	@return     int     Return integer <0 if KO, 0 if already open, >0 if OK
     */
    public function reOpen()
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *  @param	    string		$modele			Force the model to using ('' to not force)
     *  @param		Translate	$outputlangs	object lang to use for translations
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
     * @param 	DoliDB 	$dbs 		Database handler, because function is static we name it $dbs not $db to avoid breaking coding test
     * @param 	int 	$origin_id 	Old thirdparty id
     * @param 	int 	$dest_id 	New thirdparty id
     * @return 	bool
     */
    public static function replaceThirdparty(\DoliDB $dbs, $origin_id, $dest_id)
    {
    }
}
/**
 * Class to manage lines of shipment
 */
class ExpeditionLigne extends \CommonObjectLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'expeditiondet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'expeditiondet';
    /**
     * @see CommonObjectLine
     */
    public $parent_element = 'expedition';
    /**
     * @see CommonObjectLine
     */
    public $fk_parent_attribute = 'fk_expedition';
    /**
     * Id of the line. Duplicate of $id.
     *
     * @var int
     * @deprecated
     */
    public $line_id;
    // deprecated
    /**
     * @var int ID	Duplicate of origin_id (using origin_id is better)
     */
    public $fk_element;
    /**
     * @var int ID	Duplicate of fk_element
     */
    public $origin_id;
    /**
     * @var int ID	Duplicate of origin_line_id
     */
    public $fk_elementdet;
    /**
     * @var int ID	Duplicate of fk_elementdet
     */
    public $origin_line_id;
    /**
     * @var string		Type of object the fk_element refers to. Example: 'order'.
     */
    public $element_type;
    /**
     * Code of object line that is origin of the shipment line.
     *
     * @var string
     * @deprecated	Use instead origin_type = element_type to guess the line of origin of the shipment line.
     */
    public $fk_origin;
    // Example: 'orderline'
    /**
     * @var int Id of shipment
     */
    public $fk_expedition;
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var float qty asked From llx_expeditiondet
     */
    public $qty;
    /**
     * @var float qty shipped
     */
    public $qty_shipped;
    /**
     * @var int Id of product
     */
    public $fk_product;
    // detail of lot and qty = array(id in llx_expeditiondet_batch, fk_expeditiondet, batch, qty, fk_origin_stock)
    // We can use this to know warehouse planned to be used for each lot.
    public $detail_batch;
    // detail of warehouses and qty
    // We can use this to know warehouse when there is no lot.
    public $details_entrepot;
    /**
     * @var int Id of warehouse
     */
    public $entrepot_id;
    /**
     * @var float qty asked From llx_commandedet or llx_propaldet
     */
    public $qty_asked;
    /**
     * @deprecated
     * @see $product_ref
     */
    public $ref;
    /**
     * @var string product ref
     */
    public $product_ref;
    /**
     * @deprecated
     * @see $product_label
     */
    public $libelle;
    /**
     * @var string product label
     */
    public $product_label;
    /**
     * @var string product description
     * @deprecated
     * @see $product_desc
     */
    public $desc;
    /**
     * @var string product description
     */
    public $product_desc;
    /**
     * Type of the product. 0 for product, 1 for service
     * @var int
     */
    public $product_type = 0;
    /**
     * @var int rang of line
     */
    public $rang;
    /**
     * @var float weight
     */
    public $weight;
    public $weight_units;
    /**
     * @var float length
     */
    public $length;
    public $length_units;
    /**
     * @var float width
     */
    public $width;
    public $width_units;
    /**
     * @var float height
     */
    public $height;
    public $height_units;
    /**
     * @var float surface
     */
    public $surface;
    public $surface_units;
    /**
     * @var float volume
     */
    public $volume;
    public $volume_units;
    // Invoicing
    public $remise_percent;
    public $tva_tx;
    /**
     * @var float total without tax
     */
    public $total_ht;
    /**
     * @var float total with tax
     */
    public $total_ttc;
    /**
     * @var float total vat
     */
    public $total_tva;
    /**
     * @var float total localtax 1
     */
    public $total_localtax1;
    /**
     * @var float total localtax 2
     */
    public $total_localtax2;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Load line expedition
     *
     *  @param  int		$rowid          Id line order
     *  @return	int						Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     *	Insert line into database
     *
     *	@param      User	$user			User that modify
     *	@param      int		$notrigger		1 = disable triggers
     *	@return     int						Return integer <0 if KO, line id >0 if OK
     */
    public function insert($user, $notrigger = 0)
    {
    }
    /**
     * 	Delete shipment line.
     *
     *	@param		User	$user			User that modify
     *	@param		int		$notrigger		0=launch triggers after, 1=disable triggers
     * 	@return		int		>0 if OK, <0 if KO
     */
    public function delete($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Update a line in database
     *
     *	@param		User	$user			User that modify
     *	@param		int		$notrigger		1 = disable triggers
     *  @return		int					Return integer < 0 if KO, > 0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
}