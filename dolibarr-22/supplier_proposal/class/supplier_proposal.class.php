<?php

/**
 *	Class to manage price ask supplier
 */
class SupplierProposal extends \CommonObject
{
    use \CommonIncoterm;
    /**
     * @var string ID to identify managed object
     */
    public $element = 'supplier_proposal';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'supplier_proposal';
    /**
     * @var string    Name of subtable line
     */
    public $table_element_line = 'supplier_proposaldet';
    /**
     * @var string Name of class line
     */
    public $class_element_line = 'SupplierProposalLine';
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_supplier_proposal';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'supplier_proposal';
    /**
     * 0=Default, 1=View may be restricted to sales representative only if no permission to see all or to company of external user if external user
     * @var integer
     */
    public $restrictiononfksoc = 1;
    /**
     * {@inheritdoc}
     */
    protected $table_ref_field = 'ref';
    /**
     * @var int
     */
    public $socid;
    // Id client
    /**
     * @deprecated Use $user_author_id
     * @see $user_author_id
     * @var int
     */
    public $author;
    /**
     * @var string
     */
    public $ref_fourn;
    //Reference saisie lors de l'ajout d'une ligne à la demande
    /**
     * @var string
     */
    public $ref_supplier;
    //Reference saisie lors de l'ajout d'une ligne à la demande
    /**
     * @var int
     * @deprecated
     */
    public $statut;
    // 0 (draft), 1 (validated), 2 (signed), 3 (not signed), 4 (processed/billed)
    /**
     * @var int|string Date of proposal
     */
    public $date;
    /**
     * @var null|int|'' date_livraison
     */
    public $delivery_date;
    /**
     * @deprecated Use $date_creation
     * @see $date_creation
     * @var int|string
     */
    public $datec;
    /**
     * @deprecated Use $date_validation
     * @see $date_validation
     * @var int|string
     */
    public $datev;
    /**
     * @var int
     */
    public $user_author_id;
    /**
     * @deprecated Use $price_ht
     * @see $price_ht
     * @var float
     */
    public $price;
    /**
     * @deprecated Use $total_tva
     * @see $total_tva
     * @var float
     */
    public $tva;
    /**
     * @deprecated Use $total_ttc
     * @see $total_ttc
     * @var float
     */
    public $total;
    /**
     * @var string
     */
    public $cond_reglement_code;
    /**
     * @var string
     */
    public $cond_reglement_doc;
    // label doc
    /**
     * @var string
     */
    public $mode_reglement_code;
    /**
     * @deprecated Use $mode_reglement_code
     * @var string	Mode reglement
     */
    public $mode_reglement;
    /**
     * @var array<string,string>  (Encoded as JSON in database)
     */
    public $extraparams = array();
    /**
     * @var SupplierProposalLine[]
     */
    public $lines = array();
    /**
     * @var SupplierProposalLine
     */
    public $line;
    public $labelStatus = array();
    public $labelStatusShort = array();
    /**
     * @var int
     */
    public $nbtodo;
    /**
     * @var int
     */
    public $nbtodolate;
    // Multicurrency
    /**
     * @var int ID
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
    public $multicurrency_total_ht;
    /**
     * @var float
     */
    public $multicurrency_total_tva;
    /**
     * @var float
     */
    public $multicurrency_total_ttc;
    public $fields = array('ref' => array('type' => 'varchar(255)', 'label' => 'Ref', 'enabled' => 1, 'visible' => 1, 'showoncombobox' => 1, 'position' => 25, 'searchall' => 1), 'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 750, 'searchall' => 1));
    /**
     * Draft status
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated status
     */
    const STATUS_VALIDATED = 1;
    /**
     * Signed quote
     */
    const STATUS_SIGNED = 2;
    /**
     * Not signed quote, canceled
     */
    const STATUS_NOTSIGNED = 3;
    /**
     * Billed or closed/processed quote
     */
    const STATUS_CLOSE = 4;
    /**
     *	Constructor
     *
     *	@param      DoliDB	$db         Database handler
     *	@param      int		$socid		Id third party
     *	@param      int		$supplier_proposalid   Id supplier_proposal
     */
    public function __construct($db, $socid = 0, $supplier_proposalid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Add line into array ->lines
     *
     * 	@param  int		$idproduct       	Product Id to add
     * 	@param  float	$qty             	Quantity
     * 	@param  int		$remise_percent  	Discount effected on Product
     *  @return	int							Return integer <0 if KO, >0 if OK
     *
     *	TODO	Remplacer les appels a cette fonction par generation object Ligne
     */
    public function add_product($idproduct, $qty, $remise_percent = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Adding line of fixed discount in the proposal in DB
     *
     *	@param     int		$idremise			Id of fixed discount
     *  @return    int          				>0 if OK, <0 if KO
     */
    public function insert_discount($idremise)
    {
    }
    /**
     *    	Add a proposal line into database (linked to product/service or not)
     * 		Les parameters sont deja cense etre juste et avec valeurs finales a l'appel
     *		de cette methode. Aussi, pour le taux tva, il doit deja avoir ete defini
     *		par l'appelant par la methode get_default_tva(societe_vendeuse,societe_acheteuse,'',produit)
     *		et le desc doit deja avoir la bonne valeur (a l'appelant de gerer le multilangue)
     *
     * 		@param    	string		$desc				Description de la ligne
     * 		@param    	float		$pu_ht				Prix unitaire
     * 		@param    	float		$qty             	Quantite
     * 		@param    	float|string	$txtva          Force Vat rate, -1 for auto (Can contain the vat_src_code too with syntax '9.9 (CODE)')
     * 		@param		float		$txlocaltax1		Local tax 1 rate
     *  	@param		float		$txlocaltax2		Local tax 2 rate
     *		@param    	int			$fk_product      	Product/Service ID predefined
     * 		@param    	float		$remise_percent  	Percentage discount of the line
     * 		@param    	string		$price_base_type	HT or TTC
     * 		@param    	float		$pu_ttc             Prix unitaire TTC
     * 		@param    	int			$info_bits			Bits of type of lines
     *      @param      int			$type               Type of line (product, service)
     *      @param      int			$rang               Position of line
     *      @param		int			$special_code		Special code (also used by externals modules!)
     *      @param		int			$fk_parent_line		Id of parent line
     *      @param		int|string		$fk_fournprice		Id supplier price or string. If 0, we will take best price. If -1 we keep it empty.
     *      @param		float|string	$pa_ht				Buying price without tax (Can be '' to keep AWP unchanged or a float value)
     *      @param		string		$label				???
     *      @param		array<string,mixed>		$array_options		extrafields array
     * 		@param		string		$ref_supplier		Supplier price reference
     * 		@param		int			$fk_unit			Id of the unit to use.
     * 		@param		string		$origin				'order', 'supplier_proposal', ...
     * 		@param		int			$origin_id			Id of origin line
     * 		@param		float		$pu_ht_devise		Amount in currency
     * 		@param		int			$date_start			Date start
     * 		@param		int			$date_end			Date end
     *    	@return    	int         	    			>0 if OK, <0 if KO
     *
     *    	@see       	add_product()
     */
    public function addline($desc, $pu_ht, $qty, $txtva, $txlocaltax1 = 0, $txlocaltax2 = 0, $fk_product = 0, $remise_percent = 0, $price_base_type = 'HT', $pu_ttc = 0, $info_bits = 0, $type = 0, $rang = -1, $special_code = 0, $fk_parent_line = 0, $fk_fournprice = 0, $pa_ht = 0, $label = '', $array_options = [], $ref_supplier = '', $fk_unit = 0, $origin = '', $origin_id = 0, $pu_ht_devise = 0, $date_start = 0, $date_end = 0)
    {
    }
    /**
     *  Update a proposal line
     *
     *  @param      int			$rowid           	Id de la ligne
     *  @param      float		$pu		     	  	Unit price (HT or TTC depending on price_base_type)
     *  @param      float		$qty            	Quantity
     *  @param      float		$remise_percent  	Discount on line
     *  @param      float|string	$txtva          Force Vat rate, -1 for auto (Can contain the vat_src_code too with syntax '9.9 (CODE)')
     * 	@param	  	float		$txlocaltax1		Local tax 1 rate
     *  @param	  	float		$txlocaltax2		Local tax 2 rate
     *  @param      string		$desc            	Description
     *	@param	  	string		$price_base_type	HT or TTC
     *	@param      int			$info_bits        	Miscellaneous information
     *	@param		int			$special_code		Special code (also used by externals modules!)
     * 	@param		int			$fk_parent_line		Id of parent line (0 in most cases, used by modules adding sublevels into lines).
     * 	@param		int			$skip_update_total	Keep fields total_xxx to 0 (used for special lines by some modules)
     *  @param		int			$fk_fournprice		Id of origin supplier price
     *  @param		float|string	$pa_ht			Price (without tax) of product when it was bought (Can be '' to keep AWP unchanged or a float value)
     *  @param		string		$label				???
     *  @param		int<0,1>	$type				0/1=Product/service
     *  @param		array<string,mixed>	$array_options		extrafields array
     * 	@param		string		$ref_supplier		Supplier price reference
     *	@param		int			$fk_unit			Id of the unit to use.
     * 	@param		float		$pu_ht_devise		Unit price in currency
     *  @return     int     		        		0 if OK, <0 if KO
     */
    public function updateline($rowid, $pu, $qty, $remise_percent, $txtva, $txlocaltax1 = 0, $txlocaltax2 = 0, $desc = '', $price_base_type = 'HT', $info_bits = 0, $special_code = 0, $fk_parent_line = 0, $skip_update_total = 0, $fk_fournprice = 0, $pa_ht = 0, $label = '', $type = 0, $array_options = [], $ref_supplier = '', $fk_unit = 0, $pu_ht_devise = 0)
    {
    }
    /**
     *  Delete detail line
     *
     *  @param		int		$lineid			Id of line to delete
     *  @return     int         			>0 if OK, <0 if KO
     */
    public function deleteLine($lineid)
    {
    }
    /**
     *  Create commercial proposal into database
     * 	this->ref can be set or empty. If empty, we will use "(PROVid)"
     *
     * 	@param		User	$user		User that create
     * 	@param		int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return     int     			Return integer <0 if KO, >=0 if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *		Load an object from its id and create a new one in database
     *
     *      @param	    User	$user		    User making the clone
     *		@param		int		$fromid			Id of thirdparty
     * 	 	@return		int						New id of clone
     */
    public function createFromClone(\User $user, $fromid = 0)
    {
    }
    /**
     *	Load a proposal from database and its ligne array
     *
     *	@param      int			$rowid		id of object to load
     *	@param		string		$ref		Ref of proposal
     *	@return     int         			>0 if OK, <0 if KO
     */
    public function fetch($rowid, $ref = '')
    {
    }
    /**
     *  Set status to validated
     *
     *  @param	User	$user       Object user that validate
     *  @param	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return int         		Return integer <0 if KO, >=0 if OK
     */
    public function valid($user, $notrigger = 0)
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
     *	Set delivery date
     *
     *	@param      User 		$user        		Object user that modify
     *	@param      int			$delivery_date     Delivery date
     *	@return     int         					Return integer <0 if ko, >0 if ok
     */
    public function setDeliveryDate($user, $delivery_date)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set an overall discount on the proposal
     *
     *	@param      User	$user       Object user that modify
     *	@param      float	$remise      Amount discount
     *	@return     int         		Return integer <0 if ko, >0 if ok
     */
    /*
    public function set_remise_percent($user, $remise)
    {
    	// phpcs:enable
    	$remise = trim($remise) ?trim($remise) : 0;
    
    	if ($user->hasRight('supplier_proposal', 'creer')) {
    		$remise = price2num($remise, 2);
    
    		$sql = "UPDATE ".MAIN_DB_PREFIX."supplier_proposal SET remise_percent = ".((float) $remise);
    		$sql .= " WHERE rowid = ".((int) $this->id)." AND fk_statut = 0";
    
    		if ($this->db->query($sql)) {
    			$this->remise_percent = ((float) $remise);
    			$this->update_price(1);
    			return 1;
    		} else {
    			$this->error = $this->db->error();
    			return -1;
    		}
    	}
    	return 0;
    }
    */
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set an absolute overall discount on the proposal
     *
     *	@param      User	$user        Object user that modify
     *	@param      float	$remise      Amount discount
     *	@return     int         		Return integer <0 if ko, >0 if ok
     */
    /*
    public function set_remise_absolue($user, $remise)
    {
    	// phpcs:enable
    	if (empty($remise)) {
    		$remise = 0;
    	}
    
    	$remise = price2num($remise);
    
    	if ($user->hasRight('supplier_proposal', 'creer')) {
    		$sql = "UPDATE ".MAIN_DB_PREFIX."supplier_proposal ";
    		$sql .= " SET remise_absolue = ".((float) $remise);
    		$sql .= " WHERE rowid = ".((int) $this->id)." AND fk_statut = 0";
    
    		if ($this->db->query($sql)) {
    			$this->remise_absolue = $remise;
    			$this->update_price(1);
    			return 1;
    		} else {
    			$this->error = $this->db->error();
    			return -1;
    		}
    	}
    	return 0;
    }
    */
    /**
     *	Reopen the commercial proposal
     *
     *	@param      User	$user		Object user that close
     *	@param      int		$status		Status
     *	@param      string	$note		Comment
     *  @param		int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return     int         		Return integer <0 if KO, >0 if OK
     */
    public function reopen($user, $status, $note = '', $notrigger = 0)
    {
    }
    /**
     *	Close the askprice
     *
     *	@param      User	$user		Object user that close
     *	@param      int		$status		Status
     *	@param      string	$note		Comment
     *	@return     int         		Return integer <0 if KO, >0 if OK
     */
    public function cloture($user, $status, $note)
    {
    }
    /**
     *	Add or update supplier price according to result of proposal
     *
     *	@param     User	    $user       Object user
     *  @return    int                  > 0 if OK
     */
    public function updateOrCreatePriceFournisseur($user)
    {
    }
    /**
     *	Update ProductFournisseur
     *
     * 	@param		int 	$idProductFournPrice	id of llx_product_fournisseur_price
     * 	@param		Product $product				contain information to update
     *	@param      User	$user					Object user
     *	@return     int         					Return integer <0 if KO, >0 if OK
     */
    public function updatePriceFournisseur($idProductFournPrice, $product, $user)
    {
    }
    /**
     *	Create Price Fournisseur
     *
     *	@param		ProductFournisseur 	$product	Object Product TODO: Determine the correct type
     *	@param      User				$user		Object user
     *	@return     int								Return integer <0 if KO, >0 if OK
     */
    public function createPriceFournisseur($product, $user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Set draft status
     *
     *	@param		User	$user		Object user that modify
     *	@return		int					Return integer <0 if KO, >0 if OK
     */
    public function setDraft($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of askprice (eventually filtered on user) into an array
     *
     *    @param	int		$shortlist			0=Return array[id]=ref, 1=Return array[](id=>id,ref=>ref,name=>name)
     *    @param	int		$draft				0=not draft, 1=draft
     *    @param	int		$notcurrentuser		0=all user, 1=not current user
     *    @param    int		$socid				Id third party
     *    @param    int		$limit				For pagination
     *    @param    int		$offset				For pagination
     *    @param    string	$sortfield			Sort criteria
     *    @param    string	$sortorder			Sort order
     *    @return	array<int,string>|array<int,array{id:int,ref:string,name:string}>|int<-1,-1>	-1 if KO, array with result if OK
     */
    public function liste_array($shortlist = 0, $draft = 0, $notcurrentuser = 0, $socid = 0, $limit = 0, $offset = 0, $sortfield = 'p.datec', $sortorder = 'DESC')
    {
    }
    /**
     *	Delete askprice
     *
     *	@param	User	$user        	Object user that delete
     *	@param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return	int						1 if ok, otherwise if error
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *	Object SupplierProposal Information
     *
     * 	@param	int		$id		Proposal id
     *  @return	void
     */
    public function info($id)
    {
    }
    /**
     *    	Return label of status of proposal (draft, validated, ...)
     *
     *    	@param      int			$mode        0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *    	@return     string		Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of a status (draft, validated, ...)
     *
     *  @param      int			$status		Id status
     *  @param  	int			$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return     string      Label
     */
    public function LibStatut($status, $mode = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @param          User	$user   Object user
     *      @param          string	$mode   "opened" for askprice to close, "signed" for proposal to invoice
     *      @return         WorkboardResponse|int	Return integer <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user, $mode)
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
     *      Load indicator this->nb of global stats widget
     *
     *      @return     int         Return integer <0 if ko, >0 if ok
     */
    public function loadStateBoard()
    {
    }
    /**
     *  Returns the reference to the following non used Proposal used depending on the active numbering module
     *  defined into SUPPLIER_PROPOSAL_ADDON
     *
     *  @param	Societe		$soc  	Object thirdparty
     *  @return string      		Reference libre pour la propale
     */
    public function getNextNumRef($soc)
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
     *	@param      int		$withpicto					Add picto into link
     *	@param      string	$option						Where point the link ('compta', 'expedition', 'document', ...)
     *	@param      string	$get_params    				Parameters added to url
     *  @param	    int   	$notooltip					1=Disable tooltip
     *  @param      int     $save_lastsearch_value		-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param		int		$addlinktonotes				Add link to show notes
     *	@return     string          					String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $get_params = '', $notooltip = 0, $save_lastsearch_value = -1, $addlinktonotes = 0)
    {
    }
    /**
     * 	Retrieve an array of supplier proposal lines
     *
     * 	@return int		>0 if OK, <0 if KO
     */
    public function getLinesArray()
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     * 	@param	string		$modele			Force model to use ('' to not force)
     * 	@param	Translate	$outputlangs	Object langs to use for output
     *  @param	int<0,1>	$hidedetails    Hide details of lines
     *  @param	int<0,1>	$hidedesc       Hide description
     *  @param	int<0,1>	$hideref        Hide ref
     *  @param	?array<string,mixed>	$moreparams	Array to provide more information
     * 	@return	int         				0 if KO, 1 if OK
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
    /**
     *	Return clickable link of object (with eventually picto)
     *
     *	@param	string	    			$option		Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param	?array<string,mixed>	$arraydata	Array of data
     *  @return	string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
}
/**
 *	Class to manage supplier_proposal lines
 */
class SupplierProposalLine extends \CommonObjectLine
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string ID to identify managed object
     */
    public $element = 'supplier_proposaldet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'supplier_proposaldet';
    /**
     * @see CommonObjectLine
     */
    public $parent_element = 'supplier_proposal';
    /**
     * @see CommonObjectLine
     */
    public $fk_parent_attribute = 'fk_supplier_proposal';
    /**
     * @var SupplierProposalLine
     */
    public $oldline;
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var int ID
     */
    public $fk_supplier_proposal;
    /**
     * @var int ID
     */
    public $fk_parent_line;
    /**
     * @var string
     */
    public $desc;
    // Description ligne
    /**
     * @var int ID
     */
    public $fk_product;
    // Id produit predefini
    /**
     * @deprecated Use $product_type
     * @see $product_type
     * @var int
     */
    public $fk_product_type;
    /**
     * Product type
     * @var int
     * @see Product::TYPE_PRODUCT, Product::TYPE_SERVICE
     */
    public $product_type = \Product::TYPE_PRODUCT;
    /**
     * @var float Quantity
     */
    public $qty;
    /**
     * @var float|string
     */
    public $tva_tx;
    /**
     * @var string
     */
    public $vat_src_code;
    /**
     * Unit price before taxes
     * @var float
     */
    public $subprice;
    /**
     * @var float|string
     */
    public $remise_percent;
    /**
     * @var int ID
     */
    public $fk_remise_except;
    /**
     * @var int
     */
    public $rang = 0;
    /**
     * @var int ID
     */
    public $fk_fournprice;
    /**
     * @var int|float|string
     */
    public $pa_ht;
    /**
     * @var int|float
     */
    public $marge_tx;
    /**
     * @var int|float
     */
    public $marque_tx;
    /**
     * @var int special code
     */
    public $special_code;
    // Tag for special lines (exclusive tags)
    // 1: frais de port
    // 2: ecotaxe
    // 3: option line (when qty = 0)
    /**
     * @var int
     */
    public $info_bits = 0;
    // Liste d'options cumulables:
    // Bit 0: 	0 si TVA normal - 1 if TVA NPR
    // Bit 1:	0 ligne normal - 1 if fixed reduction
    /**
     * @var float
     */
    public $total_ht;
    // Total HT de la ligne toute quantite et incluant la remise ligne
    /**
     * @var float
     */
    public $total_tva;
    // Total TVA de la ligne toute quantite et incluant la remise ligne
    /**
     * @var float
     */
    public $total_ttc;
    // Total TTC de la ligne toute quantite et incluant la remise ligne
    /**
     * @var int|string
     */
    public $date_start;
    /**
     * @var int|string
     */
    public $date_end;
    // From llx_product
    /**
     * @var string
     * @deprecated Use $product_ref
     * @see $product_ref
     */
    public $ref;
    /**
     * Product reference
     * @var string
     */
    public $product_ref;
    /**
     * @var string
     * @deprecated Use $product_label
     * @see $product_label
     */
    public $libelle;
    /**
     *  Product label
     * @var string
     */
    public $product_label;
    /**
     * Custom label
     * @var string
     */
    public $label;
    /**
     * Product description
     * @var string
     */
    public $product_desc;
    /**
     * @var int|string
     */
    public $localtax1_tx;
    // Local tax 1
    /**
     * @var int|string
     */
    public $localtax2_tx;
    // Local tax 2
    /**
     * @var string
     */
    public $localtax1_type;
    // Local tax 1 type
    /**
     * @var string
     */
    public $localtax2_type;
    // Local tax 2 type
    /**
     * @var float
     */
    public $total_localtax1;
    // Line total local tax 1
    /**
     * @var float
     */
    public $total_localtax2;
    // Line total local tax 2
    /**
     * @var int<0,1>
     */
    public $skip_update_total;
    // Skip update price total for special lines
    /**
     * @var string
     */
    public $ref_fourn;
    /**
     * @var string
     */
    public $ref_supplier;
    // Multicurrency
    /**
     * @var int ID
     */
    public $fk_multicurrency;
    /**
     * @var string
     */
    public $multicurrency_code;
    /**
     * @var float
     */
    public $multicurrency_subprice;
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
     * 	Class line Constructor
     *
     * 	@param	DoliDB	$db	Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Retrieve the propal line object
     *
     *	@param	int		$rowid		Propal line id
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     *  Insert object line propal in database
     *
     *	@param		int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function insert($notrigger = 0)
    {
    }
    /**
     * Delete line in database
     *
     * @param	User	$user		User making the deletion
     * @return	int  				Return integer <0 if KO, >0 if OK
     */
    public function delete($user)
    {
    }
    /**
     *	Update propal line object into DB
     *
     *	@param 	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return	int					Return integer <0 if ko, >0 if ok
     */
    public function update($notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update DB line fields total_xxx
     *	Used by migration
     *
     *	@return		int		Return integer <0 if ko, >0 if ok
     */
    public function update_total()
    {
    }
}