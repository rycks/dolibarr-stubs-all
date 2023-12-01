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
     * @var string ref custome
     */
    public $ref_customer;
    /**
     * @var integer|string Date really received
     */
    public $date_delivery;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    /**
     * @var integer|string date_valid
     */
    public $date_valid;
    /**
     * @var string model pdf
     */
    public $model_pdf;
    public $lines = array();
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
     *  @param 	User	$user       Objet du user qui cree
     *  @return int         		<0 si erreur, id delivery cree si ok
     */
    public function create($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Create a line
     *
     *	@param	string	$origin_id				Id of order
     *	@param	string	$qty					Quantity
     *	@param	string	$fk_product				Id of predefined product
     *	@param	string	$description			Description
     *  @param	array	$array_options			Array options
     *	@return	int								<0 if KO, >0 if OK
     */
    public function create_line($origin_id, $qty, $fk_product, $description, $array_options = \null)
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
     *	@param	User	$user            User who creates
     *	@param  int		$sending_id      Id of the expedition that serves as a model
     *	@return	integer
     */
    public function create_from_sending($user, $sending_id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Update a livraison line (only extrafields)
     *
     * @param 	int		$id					Id of line (livraison line)
     * @param	array		$array_options		extrafields array
     * @return	int							<0 if KO, >0 if OK
     */
    public function update_line($id, $array_options = 0)
    {
    }
    /**
     * 	Add line
     *
     *	@param	int		$origin_id				Origin id
     *	@param	int		$qty					Qty
     *  @param	array	$array_options			Array options
     *	@return	void
     */
    public function addline($origin_id, $qty, $array_options = \null)
    {
    }
    /**
     *	Delete line
     *
     *	@param	int		$lineid		Line id
     *	@return	integer|null
     */
    public function deleteline($lineid)
    {
    }
    /**
     * Delete object
     *
     * @return	integer
     */
    public function delete()
    {
    }
    /**
     *	Return clicable name (with picto eventually)
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
     *	Load lines
     *
     *	@return	void
     */
    public function fetch_lines()
    {
    }
    /**
     *  Retourne le libelle du statut d'une expedition
     *
     *  @param	int			$mode		Mode
     *  @return string      			Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Renvoi le libelle d'un statut donne
     *
     *  @param	int		$status     	Id status
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string					Label
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
     *  Renvoie la quantite de produit restante a livrer pour une commande
     *
     *  @return     array		Product remaining to be delivered
     *  TODO use new function
     */
    public function getRemainingDelivered()
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
    public function generateDocument($modele, $outputlangs = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0)
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
    // From llx_expeditiondet
    public $qty;
    public $qty_asked;
    public $qty_shipped;
    public $price;
    public $fk_product;
    public $origin_id;
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
     */
    public $ref;
    /**
     * @deprecated
     * @see product_label;
     */
    public $libelle;
    public $origin_line_id;
    public $product_ref;
    public $product_label;
    /**
     *	Constructor
     *
     *	@param	DoliDB	$db		Database handler
     */
    public function __construct($db)
    {
    }
}