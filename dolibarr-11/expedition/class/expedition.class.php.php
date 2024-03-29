<?php

/**
 *	Class to manage shipments
 */
class Expedition extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = "shipping";
    /**
     * @var int Field with ID of parent key if this field has a parent
     */
    public $fk_element = "fk_expedition";
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = "expedition";
    /**
     * @var int    Name of subtable line
     */
    public $table_element_line = "expeditiondet";
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'sending';
    public $socid;
    /**
     * @var string Customer ref
     */
    public $ref_customer;
    /**
     * @var string internal ref
     */
    public $ref_int;
    public $brouillon;
    /**
     * @var int warehouse id
     */
    public $entrepot_id;
    public $lines = array();
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
    /**
     * @var integer|string Date delivery planed
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
     * Draft status
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated status
     */
    const STATUS_VALIDATED = 1;
    /**
     * Closed status
     */
    const STATUS_CLOSED = 2;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Return next contract ref
     *
     *	@param	Societe		$soc	Thirdparty object
     *	@return string				Free reference for contract
     */
    public function getNextNumRef($soc)
    {
    }
    /**
     *  Create expedition en base
     *
     *  @param	User	$user       Objet du user qui cree
     * 	@param		int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return int 				<0 si erreur, id expedition creee si ok
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
     * @param 	int		$qty				Quantity
     * @param 	int		$rang				Rang
     * @param	array	$array_options		extrafields array
     * @return	int							<0 if KO, line_id if OK
     */
    public function create_line($entrepot_id, $origin_line_id, $qty, $rang = 0, $array_options = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Create the detail (eat-by date) of the expedition line
     *
     * @param 	object		$line_ext		full line informations
     * @param	array		$array_options		extrafields array
     * @return	int							<0 if KO, >0 if OK
     */
    public function create_line_batch($line_ext, $array_options = 0)
    {
    }
    /**
     *	Get object and lines from database
     *
     *	@param	int		$id       	Id of object to load
     * 	@param	string	$ref		Ref of object
     * 	@param	string	$ref_ext	External reference of object
     * 	@param	string	$ref_int	Internal reference of other object
     *	@return int			        >0 if OK, 0 if not found, <0 if KO
     */
    public function fetch($id, $ref = '', $ref_ext = '', $ref_int = '')
    {
    }
    /**
     *  Validate object and update stock if option enabled
     *
     *  @param      User		$user       Object user that validate
     *  @param		int			$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return     int						<0 if OK, >0 if KO
     */
    public function valid($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Create a delivery receipt from a shipment
     *
     *	@param	User	$user       User
     *  @return int  				<0 if KO, >=0 if OK
     */
    public function create_delivery($user)
    {
    }
    /**
     * Add an expedition line.
     * If STOCK_WAREHOUSE_NOT_REQUIRED_FOR_SHIPMENTS is set, you can add a shipment line, with no stock source defined
     * If STOCK_MUST_BE_ENOUGH_FOR_SHIPMENT is not set, you can add a shipment line, even if not enough into stock
     *
     * @param 	int		$entrepot_id		Id of warehouse
     * @param 	int		$id					Id of source line (order line)
     * @param 	int		$qty				Quantity
     * @param	array	$array_options		extrafields array
     * @return	int							<0 if KO, >0 if OK
     */
    public function addline($entrepot_id, $id, $qty, $array_options = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Add a shipment line with batch record
     *
     * @param 	array		$dbatch		Array of value (key 'detail' -> Array, key 'qty' total quantity for line, key ix_l : original line index)
     * @param	array		$array_options		extrafields array
     * @return	int						<0 if KO, >0 if OK
     */
    public function addline_batch($dbatch, $array_options = 0)
    {
    }
    /**
     *  Update database
     *
     *  @param	User	$user        	User that modify
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int 			       	<0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     * 	Delete shipment.
     * 	Warning, do not delete a shipment if a delivery is linked to (with table llx_element_element)
     *
     *  @param  int  $notrigger 			Disable triggers
     *  @param  bool $also_update_stock  	true if the stock should be increased back (false by default)
     * 	@return	int							>0 if OK, 0 if deletion done but failed to delete files, <0 if KO
     */
    public function delete($notrigger = 0, $also_update_stock = \false)
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
    public function deleteline($user, $lineid)
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
     *	@return     string      		Libelle
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
     *	Set the planned delivery date
     *
     *	@param      User			$user        		Objet user that modify
     *	@param      integer 		$date_livraison     Date of delivery
     *	@return     int         						<0 if KO, >0 if OK
     */
    public function set_date_livraison($user, $date_livraison)
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
    public function list_delivery_methods($id = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update/create delivery method.
     *
     *  @param	string      $id     id method to activate
     *
     *  @return void
     */
    public function update_delivery_method($id = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Activate delivery method.
     *
     *  @param      int      $id     id method to activate
     *  @return void
     */
    public function activ_delivery_method($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  DesActivate delivery method.
     *
     *  @param      int      $id     id method to desactivate
     *
     *  @return void
     */
    public function disable_delivery_method($id)
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
     *	Classify the shipping as closed.
     *
     *	@return     int     <0 if KO, >0 if OK
     */
    public function setClosed()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Classify the shipping as invoiced (used when WORKFLOW_BILL_ON_SHIPMENT is on)
     *
     *	@return     int     <0 if ko, >0 if ok
     */
    public function set_billed()
    {
    }
    /**
     *	Classify the shipping as validated/opened
     *
     *	@return     int     <0 if KO, 0 if already open, >0 if OK
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
     * @param DoliDB $db Database handler
     * @param int $origin_id Old thirdparty id
     * @param int $dest_id New thirdparty id
     * @return bool
     */
    public static function replaceThirdparty(\DoliDB $db, $origin_id, $dest_id)
    {
    }
}
/**
 * Classe to manage lines of shipment
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
     * @deprecated
     * @see $fk_origin_line
     */
    public $origin_line_id;
    /**
     * @var int ID
     */
    public $fk_origin_line;
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
    public $detail_batch;
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
     * @var int rang of line
     */
    public $rang;
    /**
     * @var float weight
     */
    public $weight;
    public $weight_units;
    /**
     * @var float weight
     */
    public $length;
    public $length_units;
    /**
     * @var float weight
     */
    public $surface;
    public $surface_units;
    /**
     * @var float weight
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
     *  @return	int						<0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     *	Insert line into database
     *
     *	@param      User	$user			User that modify
     *	@param      int		$notrigger		1 = disable triggers
     *	@return     int						<0 if KO, line id >0 if OK
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
     *  @return		int					< 0 if KO, > 0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
}