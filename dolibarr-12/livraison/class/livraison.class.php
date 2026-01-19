<?php

/**
 *  Class to manage receptions
 */
class Livraison extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = "delivery";
    /**
     * @var int Field with ID of parent key if this field has a parent
     */
    public $fk_element = "fk_livraison";
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = "livraison";
    /**
     * @var int    Name of subtable line
     */
    public $table_element_line = "livraisondet";
    public $brouillon;
    public $socid;
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
    public $model_pdf;
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
     *  @return int         		<0 si erreur, id livraison cree si ok
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
     *	@return	int								<0 if KO, >0 if OK
     */
    public function create_line($origin_id, $qty, $fk_product, $description)
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
     *	@param	int		$origin_id		Origin id
     *	@param	int		$qty			Qty
     *	@return	void
     */
    public function addline($origin_id, $qty)
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set the planned delivery date
     *
     *	@param      User			$user        		Objet utilisateur qui modifie
     *	@param      integer 		$date_livraison     Date de livraison
     *	@return     int         						<0 if KO, >0 if OK
     */
    public function set_date_livraison($user, $date_livraison)
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
class LivraisonLigne extends \CommonObjectLine
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
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
    public $product_ref;
    public $product_label;
    /**
     * @var string ID to identify managed object
     */
    public $element = 'livraisondet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'livraisondet';
    /**
     *	Constructor
     *
     *	@param	DoliDB	$db		Database handler
     */
    public function __construct($db)
    {
    }
}