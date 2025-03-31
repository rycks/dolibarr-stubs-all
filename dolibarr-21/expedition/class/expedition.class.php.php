<?php

/**
 *	Class to manage shipments
 * @property	int				$signed_status
 * @static		array<int>		$SIGNED_STATUSES
 */
class Expedition extends \CommonObject
{
    use \CommonIncoterm;
    use \CommonSignedObject;
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
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-5,5>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
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
    /**
     * @var int
     */
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
    /**
     * @var int<0,1>
     */
    public $billed;
    /**
     * @var int|string
     */
    public $trueWeight;
    /**
     * @var int
     */
    public $weight_units;
    /**
     * @var int|string
     */
    public $trueWidth;
    /**
     * @var string
     */
    public $width_units;
    /**
     * @var int|string
     */
    public $trueHeight;
    /**
     * @var string
     */
    public $height_units;
    /**
     * @var int|string
     */
    public $trueDepth;
    /**
     * @var string
     */
    public $depth_units;
    /**
     * @var string A denormalized value
     */
    public $trueSize;
    /**
     * @var int
     */
    public $livraison_id;
    /**
     * @var float
     */
    public $multicurrency_subprice;
    /**
     * @var int|string
     */
    public $size_units;
    /**
     * @var int|string
     */
    public $sizeH;
    /**
     * @var int|string
     */
    public $sizeS;
    /**
     * @var int|string
     */
    public $sizeW;
    /**
     * @var int|string
     */
    public $weight;
    /**
     * @var int|string Date delivery planned
     */
    public $date_delivery;
    /**
     * @var int|string
     * @deprecated Use $dateshipping
     * @see $date_shipping
     */
    public $date;
    /**
     * @var int|string
     * @deprecated Use $dateshipping
     * @see $date_shipping
     */
    public $date_expedition;
    /**
     * Effective delivery date
     * @var int|string
     */
    public $date_shipping;
    /**
     * @var int|string date_valid
     */
    public $date_valid;
    /**
     * @var string[]
     */
    public $meths;
    /**
     * @var array<array<string,string>>
     */
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
    /**
     * @var float
     */
    public $multicurrency_tx;
    /**
     * @var float
     */
    public $multicurrency_total_ht;
    /**
     * @var float
     */
    public $multicurrency_total_tva;
    /**
     * @var float
     */
    public $multicurrency_total_ttc;
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
     * @param	array<string,mixed>	$array_options		extrafields array
     * @return	int							Return integer <0 if KO, line_id if OK
     */
    public function create_line($entrepot_id, $origin_line_id, $qty, $rang = 0, $array_options = [])
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Create the detail of the expedition line. Create 1 record into expeditiondet for each warehouse and n record for each lot in this warehouse into expeditiondet_batch.
     *
     * @param 	ExpeditionLigne		$line_ext			Object with full information of line. $line_ext->detail_batch must be an array of ExpeditionLineBatch
     * @param	array<string,mixed>		$array_options		extrafields array
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
     * @param	array<string,mixed>	$array_options		extrafields array
     * @return	int							Return integer <0 if KO, >0 if OK
     */
    public function addline($entrepot_id, $id, $qty, $array_options = [])
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Add a shipment line with batch record
     *
     * @param 	array{detail:array<array{id_batch:int,q:int|float}>,qty:int|float,ix_l:int}	$dbatch		Array of value (key 'detail' -> Array, key 'qty' total quantity for line, key ix_l : original line index)
     * @param	array<string,mixed>		$array_options		extrafields array
     * @return	int						Return integer <0 if KO, >0 if OK
     */
    public function addline_batch($dbatch, $array_options = [])
    {
    }
    /**
     *  Update database
     *
     *  @param	User		$user        	User that modifies the record
     *  @param  int<0,1>	$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int 			  	     	Return integer <0 if KO, >0 if OK
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
     * @param array<string,mixed> $params params to construct tooltip data
     * @since v18
     * @return array{picto?:string,ref?:string,refsupplier?:string,label?:string,date?:string,date_echeance?:string,amountht?:string,total_ht?:string,totaltva?:string,amountlt1?:string,amountlt2?:string,amountrevenustamp?:string,totalttc?:string}|array{optimize:string}
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *	Return clickable link of object (with eventually picto)
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
     *	Return clickable link of object (with eventually picto)
     *
     *	@param      string	    			$option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array{string,mixed}		$arraydata				Array of data
     *  @return		string											HTML Code for Kanban thumb.
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
    /**
     *	Set the shipping date
     *
     *	@param      User			$user        		Object user that modify
     *	@param      integer 		$shipping_date		Date of shipping
     *	@return     int         						Return integer <0 if KO, >0 if OK
     */
    public function setShippingDate($user, $shipping_date)
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
     *  @param      ?array<string,mixed>	$moreparams     Array to provide more information
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