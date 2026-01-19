<?php

/**
 *	Class to manage receptions
 */
class Reception extends \CommonObject
{
    use \CommonIncoterm;
    /**
     * @var string element name
     */
    public $element = "reception";
    /**
     * @var string Fieldname with ID of parent key if this field has a parent
     */
    public $fk_element = "fk_reception";
    public $table_element = "reception";
    public $table_element_line = "commande_fournisseur_dispatch";
    public $ismultientitymanaged = 1;
    // 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'dollyrevert';
    public $socid;
    public $ref_supplier;
    /**
     * @var int		Ref int
     * @deprecated
     */
    public $ref_int;
    public $brouillon;
    public $entrepot_id;
    public $tracking_number;
    public $tracking_url;
    public $billed;
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
    public $date_delivery;
    // Date delivery planed
    /**
     * @var integer|string Effective delivery date
     */
    public $date_reception;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    /**
     * @var integer|string date_validation
     */
    public $date_valid;
    public $meths;
    public $listmeths;
    // List of carriers
    public $lines = array();
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
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
     *  Create reception en base
     *
     *  @param	User	$user       Objet du user qui cree
     *  @param	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return int 				<0 si erreur, id reception creee si ok
     */
    public function create($user, $notrigger = 0)
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
     *  @return     int						<0 if OK, >0 if KO
     */
    public function valid($user, $notrigger = 0)
    {
    }
    /**
     * Add an reception line.
     * If STOCK_WAREHOUSE_NOT_REQUIRED_FOR_RECEPTIONS is set, you can add a reception line, with no stock source defined
     * If STOCK_MUST_BE_ENOUGH_FOR_RECEPTION is not set, you can add a reception line, even if not enough into stock
     *
     * @param 	int			$entrepot_id		Id of warehouse
     * @param 	int			$id					Id of source line (supplier order line)
     * @param 	int			$qty				Quantity
     * @param	array		$array_options		extrafields array
     * @param	string		$comment				Comment for stock movement
     * @param	integer		$eatby					eat-by date
     * @param	integer		$sellby					sell-by date
     * @param	string		$batch					Lot number
     * @return	int							<0 if KO, index of line if OK
     */
    public function addline($entrepot_id, $id, $qty, $array_options = 0, $comment = '', $eatby = '', $sellby = '', $batch = '')
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
     * 	Delete reception.
     *
     *	@param	User	$user	Object user
     * 	@return	int				>0 if OK, 0 if deletion done but failed to delete files, <0 if KO
     */
    public function delete(\User $user)
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
     *	Return clicable link of object (with eventually picto)
     *
     *	@param      int			$withpicto      Add picto into link
     *	@param      int			$option         Where point the link
     *	@param      int			$max          	Max length to show
     *	@param      int			$short			Use short labels
     *  @param      int         $notooltip      1=No tooltip
     *	@return     string          			String with URL
     */
    public function getNomUrl($withpicto = 0, $option = 0, $max = 0, $short = 0, $notooltip = 0)
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
     * @param      int		$status		Id status
     * @param      int		$mode       0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto
     * @return     string				Label of status
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
    /**
     *	Set the planned delivery date
     *
     *	@param      User			$user        		Objet utilisateur qui modifie
     *	@param      integer 		$delivery_date     Delivery date
     *	@return     int         						<0 if KO, >0 if OK
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
     *
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
     *	Classify the reception as closed (this record also the stock movement)
     *
     *	@return     int     <0 if KO, >0 if OK
     */
    public function setClosed()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Classify the reception as invoiced (used when WORKFLOW_BILL_ON_RECEPTION is on)
     *
     *	@deprecated
     *  @see setBilled()
     *	@return     int     <0 if ko, >0 if ok
     */
    public function set_billed()
    {
    }
    /**
     *	Classify the reception as invoiced (used when WORKFLOW_BILL_ON_RECEPTION is on)
     *
     *	@return     int     <0 if ko, >0 if ok
     */
    public function setBilled()
    {
    }
    /**
     *	Classify the reception as validated/opened
     *
     *	@return     int     <0 if ko, >0 if ok
     */
    public function reOpen()
    {
    }
    /**
     *	Set draft status
     *
     *	@param	User	$user			Object user that modify
     *	@return	int						<0 if KO, >0 if OK
     */
    public function setDraft($user)
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
     *  @return     int         				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
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