<?php

/**
 *  Class to manage receptions
 */
class Delivery extends \CommonObject
{
    use \CommonIncoterm;
    /**
     * @var string ID to identify managed object
     */
    public $element = "delivery";
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = "fk_delivery";
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = "delivery";
    /**
     * @var string    Name of subtable line
     */
    public $table_element_line = "deliverydet";
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'sending';
    /**
     * @var int draft status
     */
    public $draft;
    /**
     * @var int thirdparty id
     */
    public $socid;
    /**
     * @var string ref customer
     */
    public $ref_customer;
    /**
     * @var int|'' Date really received
     */
    public $date_delivery;
    /**
     * @var int|'' date_valid
     */
    public $date_valid;
    /**
     * @var string model pdf
     */
    public $model_pdf;
    /**
     * @var int ID of order
     */
    public $commande_id;
    /**
     * @var DeliveryLine[] lines
     */
    public $lines = array();
    /**
     * @var int user_author_id
     */
    public $user_author_id;
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
    const STATUS_CANCELED = -1;
    /**
     * Constructor
     *
     * @param	DoliDB	$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create delivery receipt in database
     *
     *  @param 	User	$user       Object du user qui cree
     *  @return int         		Return integer <0 si erreur, id delivery cree si ok
     */
    public function create($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Create a line
     *
     *	@param	int 	$origin_id				Id of order
     *	@param	float	$qty					Quantity
     *	@param	int 	$fk_product				Id of predefined product
     *	@param	string	$description			Description
     *  @param	array<string,?mixed>	$array_options	Array options
     *	@return	int								Return integer <0 if KO, >0 if OK
     */
    public function create_line($origin_id, $qty, $fk_product, $description, $array_options = [])
    {
    }
    /**
     * 	Load a delivery receipt
     *
     * 	@param	int		$id			Id of object to load
     * 	@return	integer
     */
    public function fetch($id)
    {
    }
    /**
     *  Validate object and update stock if option enabled
     *
     *  @param  User    $user       Object user that validate
     *  @param  int     $notrigger  1=Does not execute triggers, 0= execute triggers
     *  @return int
     */
    public function valid($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Creating the delivery slip from an existing shipment
     *
     *	@param	User	$user           User who creates
     *	@param  int		$sending_id		Id of the expedition that serves as a model
     *	@return	int						Return integer <=0 if KO, >0 if OK
     */
    public function create_from_sending($user, $sending_id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Update a livraison line (only extrafields)
     *
     * @param 	int					$id					Id of line (livraison line)
     * @param	array<string,mixed>	$array_options		extrafields array
     * @return	int										Return integer <0 if KO, >0 if OK
     */
    public function update_line($id, $array_options = [])
    {
    }
    /**
     * 	Add line
     *
     *	@param	int		$origin_id				Origin id
     *	@param	float	$qty					Qty
     *  @param	array<string,mixed>	$array_options		Array options
     *	@return	void
     */
    public function addline($origin_id, $qty, $array_options = [])
    {
    }
    /**
     *	Delete line
     *
     *	@param	int		$lineid		Line id
     *	@return	integer				Return integer <0 if KO, 0 if nothing done, >0 if OK
     */
    public function deleteLine($lineid)
    {
    }
    /**
     * Delete object
     *
     * @param	User		$user		User making the deletion
     * @return	integer
     */
    public function delete($user = \null)
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
     *	Return clickable name (with picto eventually)
     *
     *	@param	int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     *  @param  int     $save_lastsearch_value		-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $save_lastsearch_value = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load lines insto $this->lines.
     *
     *	@return		int								Return integer <0 if KO, >0 if OK
     */
    public function fetch_lines()
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
     *  Return the label of a given status
     *
     *  @param	int		$status        Id status
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 			       Label of status
     */
    public function LibStatut($status, $mode)
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
     *  Get data list of Products remaining to be delivered for an order (with qty)
     *
     *	@return array<int,array{qty:float|int,ref:string,label:string}>|int<min,-1>	Product remaining to be delivered or <0 if KO
     *  TODO use new function
     */
    public function getRemainingDelivered()
    {
    }
    /**
     *	Set the planned delivery date
     *
     *	@param      User			$user        		Object utilisateur qui modifie
     *	@param      integer 		$delivery_date     Delivery date
     *	@return     int         						Return integer <0 if KO, >0 if OK
     */
    public function setDeliveryDate($user, $delivery_date)
    {
    }
    /**
     *	Create object on disk
     *
     *	@param     string		$modele			force le modele a utiliser ('' to not force)
     * 	@param     Translate	$outputlangs	Object langs to use for output
     *  @param     int			$hidedetails    Hide details of lines
     *  @param     int			$hidedesc       Hide description
     *  @param     int			$hideref        Hide ref
     *  @return    int             				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
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
}
/**
 *  Management class of delivery note lines
 */
class DeliveryLine extends \CommonObjectLine
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string ID to identify managed object
     */
    public $element = 'deliverydet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'deliverydet';
    /**
     * @var string delivery note lines label
     */
    public $label;
    /**
     * @var string product description
     */
    public $description;
    /**
     * @deprecated
     * @see $product_ref
     * @var string
     */
    public $ref;
    /**
     * @deprecated
     * @see product_label;
     * @var string
     */
    public $libelle;
    // From llx_expeditiondet
    /**
     * @var float Quantity
     */
    public $qty;
    /**
     * @var float Quantity asked
     */
    public $qty_asked;
    /**
     * @var float Quantity shipped
     */
    public $qty_shipped;
    /**
     * @var int
     */
    public $fk_product;
    /**
     * @var string
     */
    public $product_desc;
    /**
     * @var int
     */
    public $product_type;
    /**
     * @var string
     */
    public $product_ref;
    /**
     * @var string
     */
    public $product_label;
    /**
     * @var int|float|string
     */
    public $price;
    /**
     * @var int
     */
    public $fk_origin_line;
    /**
     * @var int
     */
    public $origin_id;
    /**
     * @var int origin line ID
     */
    public $origin_line_id;
    /**
     * @var int origin line ID
     * @deprecated
     * @see $origin_line_id
     */
    public $commande_ligne_id;
    /**
     *	Constructor
     *
     *	@param	DoliDB	$db		Database handler
     */
    public function __construct($db)
    {
    }
}