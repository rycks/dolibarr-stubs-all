<?php

/**
 *	Class to manage price ask supplier
 */
class SupplierProposal extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'supplier_proposal';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'supplier_proposal';
    /**
     * @var int    Name of subtable line
     */
    public $table_element_line = 'supplier_proposaldet';
    /**
     * @var int Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_supplier_proposal';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'supplier_proposal';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    /**
     * 0=Default, 1=View may be restricted to sales representative only if no permission to see all or to company of external user if external user
     * @var integer
     */
    public $restrictiononfksoc = 1;
    /**
     * {@inheritdoc}
     */
    protected $table_ref_field = 'ref';
    public $socid;
    // Id client
    /**
     * @deprecated
     * @see $user_author_id
     */
    public $author;
    public $ref_fourn;
    //Reference saisie lors de l'ajout d'une ligne à la demande
    public $ref_supplier;
    //Reference saisie lors de l'ajout d'une ligne à la demande
    public $statut;
    // 0 (draft), 1 (validated), 2 (signed), 3 (not signed), 4 (processed/billed)
    /**
     * @var integer|string Date of proposal
     */
    public $date;
    /**
     * @var integer|string date_livraison
     */
    public $date_livraison;
    /**
     * @deprecated
     * @see $date_creation
     */
    public $datec;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    /**
     * @deprecated
     * @see $date_validation
     */
    public $datev;
    /**
     * @var integer|string date_validation
     */
    public $date_validation;
    public $user_author_id;
    public $user_valid_id;
    public $user_close_id;
    /**
     * @deprecated
     * @see $price_ht
     */
    public $price;
    /**
     * @deprecated
     * @see $total_tva
     */
    public $tva;
    /**
     * @deprecated
     * @see $total_ttc
     */
    public $total;
    public $cond_reglement_code;
    public $mode_reglement_code;
    public $remise = 0;
    public $remise_percent = 0;
    public $remise_absolue = 0;
    public $products = array();
    public $extraparams = array();
    public $lines = array();
    public $line;
    public $labelStatus = array();
    public $labelStatusShort = array();
    public $nbtodo;
    public $nbtodolate;
    public $specimen;
    // Multicurrency
    /**
     * @var int ID
     */
    public $fk_multicurrency;
    public $multicurrency_code;
    public $multicurrency_tx;
    public $multicurrency_total_ht;
    public $multicurrency_total_tva;
    public $multicurrency_total_ttc;
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
    public function __construct($db, $socid = "", $supplier_proposalid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Add line into array products
     *  $this->client doit etre charge
     *
     * 	@param  int		$idproduct       	Product Id to add
     * 	@param  int		$qty             	Quantity
     * 	@param  int		$remise_percent  	Discount effected on Product
     *  @return	int							<0 if KO, >0 if OK
     *
     *	TODO	Remplacer les appels a cette fonction par generation objet Ligne
     *			insere dans tableau $this->products
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
     * 		Les parametres sont deja cense etre juste et avec valeurs finales a l'appel
     *		de cette methode. Aussi, pour le taux tva, il doit deja avoir ete defini
     *		par l'appelant par la methode get_default_tva(societe_vendeuse,societe_acheteuse,'',produit)
     *		et le desc doit deja avoir la bonne valeur (a l'appelant de gerer le multilangue)
     *
     * 		@param    	string		$desc				Description de la ligne
     * 		@param    	double		$pu_ht				Prix unitaire
     * 		@param    	double		$qty             	Quantite
     * 		@param    	double		$txtva           	Taux de tva
     * 		@param		double		$txlocaltax1		Local tax 1 rate
     *  	@param		double		$txlocaltax2		Local tax 2 rate
     *		@param    	int			$fk_product      	Product/Service ID predefined
     * 		@param    	double		$remise_percent  	Percentage discount of the line
     * 		@param    	string		$price_base_type	HT or TTC
     * 		@param    	double		$pu_ttc             Prix unitaire TTC
     * 		@param    	int			$info_bits			Bits of type of lines
     *      @param      int			$type               Type of line (product, service)
     *      @param      int			$rang               Position of line
     *      @param		int			$special_code		Special code (also used by externals modules!)
     *      @param		int			$fk_parent_line		Id of parent line
     *      @param		int			$fk_fournprice		Id supplier price. If 0, we will take best price. If -1 we keep it empty.
     *      @param		int			$pa_ht				Buying price without tax
     *      @param		string		$label				???
     *      @param		array		$array_options		extrafields array
     * 		@param		string		$ref_supplier			Supplier price reference
     * 		@param		int			$fk_unit			Id of the unit to use.
     * 		@param		string		$origin				'order', 'supplier_proposal', ...
     * 		@param		int			$origin_id			Id of origin line
     * 		@param		double		$pu_ht_devise		Amount in currency
     * 		@param		int			$date_start			Date start
     * 		@param		int			$date_end			Date end
     *    	@return    	int         	    			>0 if OK, <0 if KO
     *
     *    	@see       	add_product()
     */
    public function addline($desc, $pu_ht, $qty, $txtva, $txlocaltax1 = 0, $txlocaltax2 = 0, $fk_product = 0, $remise_percent = 0, $price_base_type = 'HT', $pu_ttc = 0, $info_bits = 0, $type = 0, $rang = -1, $special_code = 0, $fk_parent_line = 0, $fk_fournprice = 0, $pa_ht = 0, $label = '', $array_options = 0, $ref_supplier = '', $fk_unit = '', $origin = '', $origin_id = 0, $pu_ht_devise = 0, $date_start = 0, $date_end = 0)
    {
    }
    /**
     *  Update a proposal line
     *
     *  @param      int			$rowid           	Id de la ligne
     *  @param      double		$pu		     	  	Prix unitaire (HT ou TTC selon price_base_type)
     *  @param      double		$qty            	Quantity
     *  @param      double		$remise_percent  	Remise effectuee sur le produit
     *  @param      double		$txtva	          	Taux de TVA
     * 	@param	  	double		$txlocaltax1		Local tax 1 rate
     *  @param	  	double		$txlocaltax2		Local tax 2 rate
     *  @param      string		$desc            	Description
     *	@param	  	double		$price_base_type	HT ou TTC
     *	@param      int			$info_bits        	Miscellaneous informations
     *	@param		int			$special_code		Special code (also used by externals modules!)
     * 	@param		int			$fk_parent_line		Id of parent line (0 in most cases, used by modules adding sublevels into lines).
     * 	@param		int			$skip_update_total	Keep fields total_xxx to 0 (used for special lines by some modules)
     *  @param		int			$fk_fournprice		Id of origin supplier price
     *  @param		int			$pa_ht				Price (without tax) of product when it was bought
     *  @param		string		$label				???
     *  @param		int			$type				0/1=Product/service
     *  @param		array		$array_options		extrafields array
     * 	@param		string		$ref_supplier			Supplier price reference
     *	@param		int			$fk_unit			Id of the unit to use.
     * 	@param		double		$pu_ht_devise		Unit price in currency
     *  @return     int     		        		0 if OK, <0 if KO
     */
    public function updateline($rowid, $pu, $qty, $remise_percent, $txtva, $txlocaltax1 = 0, $txlocaltax2 = 0, $desc = '', $price_base_type = 'HT', $info_bits = 0, $special_code = 0, $fk_parent_line = 0, $skip_update_total = 0, $fk_fournprice = 0, $pa_ht = 0, $label = '', $type = 0, $array_options = 0, $ref_supplier = '', $fk_unit = '', $pu_ht_devise = 0)
    {
    }
    /**
     *  Delete detail line
     *
     *  @param		int		$lineid			Id of line to delete
     *  @return     int         			>0 if OK, <0 if KO
     */
    public function deleteline($lineid)
    {
    }
    /**
     *  Create commercial proposal into database
     * 	this->ref can be set or empty. If empty, we will use "(PROVid)"
     *
     * 	@param		User	$user		User that create
     * 	@param		int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return     int     			<0 if KO, >=0 if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Insert into DB a supplier_proposal object completely defined by its data members (ex, results from copy).
     *
     *	@param 		User	$user	User that create
     *	@return    	int				Id of the new object if ok, <0 if ko
     *	@see       	create()
     */
    public function create_from($user)
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
     *  @return int         		<0 if KO, >=0 if OK
     */
    public function valid($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set delivery date
     *
     *	@param      User 		$user        		Object user that modify
     *	@param      int			$date_livraison     Delivery date
     *	@return     int         					<0 if ko, >0 if ok
     */
    public function set_date_livraison($user, $date_livraison)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set an overall discount on the proposal
     *
     *	@param      User	$user       Object user that modify
     *	@param      double	$remise      Amount discount
     *	@return     int         		<0 if ko, >0 if ok
     */
    public function set_remise_percent($user, $remise)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set an absolute overall discount on the proposal
     *
     *	@param      User	$user        Object user that modify
     *	@param      double	$remise      Amount discount
     *	@return     int         		<0 if ko, >0 if ok
     */
    public function set_remise_absolue($user, $remise)
    {
    }
    /**
     *	Reopen the commercial proposal
     *
     *	@param      User	$user		Object user that close
     *	@param      int		$statut		Statut
     *	@param      string	$note		Comment
     *  @param		int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return     int         		<0 if KO, >0 if OK
     */
    public function reopen($user, $statut, $note = '', $notrigger = 0)
    {
    }
    /**
     *	Close the askprice
     *
     *	@param      User	$user		Object user that close
     *	@param      int		$status		Status
     *	@param      string	$note		Comment
     *	@return     int         		<0 if KO, >0 if OK
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
     *	Upate ProductFournisseur
     *
     * 	@param		int 	$idProductFournPrice	id of llx_product_fournisseur_price
     * 	@param		Product $product				contain informations to update
     *	@param      User	$user					Object user
     *	@return     int         					<0 if KO, >0 if OK
     */
    public function updatePriceFournisseur($idProductFournPrice, $product, $user)
    {
    }
    /**
     *	Create ProductFournisseur
     *
     *	@param		Product 	$product	Object Product
     *	@param      User		$user		Object user
     *	@return     int         			<0 if KO, >0 if OK
     */
    public function createPriceFournisseur($product, $user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Set draft status
     *
     *	@param		User	$user		Object user that modify
     *	@return		int					<0 if KO, >0 if OK
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
     *    @param    int		$socid				Id third pary
     *    @param    int		$limit				For pagination
     *    @param    int		$offset				For pagination
     *    @param    string	$sortfield			Sort criteria
     *    @param    string	$sortorder			Sort order
     *    @return	int		       				-1 if KO, array with result if OK
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
     *      @param          int		$mode   "opened" for askprice to close, "signed" for proposal to invoice
     *      @return         int             <0 if KO, >0 if OK
     */
    public function load_board($user, $mode)
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
     *      Load indicator this->nb of global stats widget
     *
     *      @return     int         <0 if ko, >0 if ok
     */
    public function load_state_board()
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
     *	Return clicable link of object (with eventually picto)
     *
     *	@param      int		$withpicto					Add picto into link
     *	@param      string	$option						Where point the link ('compta', 'expedition', 'document', ...)
     *	@param      string	$get_params    				Parametres added to url
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
     * 	@param	    string		$modele			Force model to use ('' to not force)
     * 	@param		Translate	$outputlangs	Object langs to use for output
     *  @param      int			$hidedetails    Hide details of lines
     *  @param      int			$hidedesc       Hide description
     *  @param      int			$hideref        Hide ref
     *  @param   null|array  $moreparams     Array to provide more information
     * 	@return     int         				0 if KO, 1 if OK
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
    public $desc;
    // Description ligne
    /**
     * @var int ID
     */
    public $fk_product;
    // Id produit predefini
    /**
     * @deprecated
     * @see $product_type
     */
    public $fk_product_type;
    /**
     * Product type
     * @var int
     * @see Product::TYPE_PRODUCT, Product::TYPE_SERVICE
     */
    public $product_type = \Product::TYPE_PRODUCT;
    public $qty;
    public $tva_tx;
    public $subprice;
    public $remise_percent;
    /**
     * @var int ID
     */
    public $fk_remise_except;
    public $rang = 0;
    /**
     * @var int ID
     */
    public $fk_fournprice;
    public $pa_ht;
    public $marge_tx;
    public $marque_tx;
    public $special_code;
    // Tag for special lines (exlusive tags)
    // 1: frais de port
    // 2: ecotaxe
    // 3: option line (when qty = 0)
    public $info_bits = 0;
    // Liste d'options cumulables:
    // Bit 0: 	0 si TVA normal - 1 si TVA NPR
    // Bit 1:	0 ligne normale - 1 si ligne de remise fixe
    public $total_ht;
    // Total HT  de la ligne toute quantite et incluant la remise ligne
    public $total_tva;
    // Total TVA de la ligne toute quantite et incluant la remise ligne
    public $total_ttc;
    // Total TTC de la ligne toute quantite et incluant la remise ligne
    public $date_start;
    public $date_end;
    // From llx_product
    /**
     * @deprecated
     * @see $product_ref
     */
    public $ref;
    /**
     * Product reference
     * @var string
     */
    public $product_ref;
    /**
     * @deprecated
     * @see $product_label
     */
    public $libelle;
    /**
     *  Product label
     * @var string
     */
    public $product_label;
    /**
     * Product description
     * @var string
     */
    public $product_desc;
    public $localtax1_tx;
    // Local tax 1
    public $localtax2_tx;
    // Local tax 2
    public $localtax1_type;
    // Local tax 1 type
    public $localtax2_type;
    // Local tax 2 type
    public $total_localtax1;
    // Line total local tax 1
    public $total_localtax2;
    // Line total local tax 2
    public $skip_update_total;
    // Skip update price total for special lines
    public $ref_fourn;
    public $ref_supplier;
    // Multicurrency
    /**
     * @var int ID
     */
    public $fk_multicurrency;
    public $multicurrency_code;
    public $multicurrency_subprice;
    public $multicurrency_total_ht;
    public $multicurrency_total_tva;
    public $multicurrency_total_ttc;
    /**
     * 	Class line Contructor
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
     *	@return	int					<0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     *  Insert object line propal in database
     *
     *	@param		int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return		int						<0 if KO, >0 if OK
     */
    public function insert($notrigger = 0)
    {
    }
    /**
     * 	Delete line in database
     *
     *	@return	 int  <0 if ko, >0 if ok
     */
    public function delete()
    {
    }
    /**
     *	Update propal line object into DB
     *
     *	@param 	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return	int					<0 if ko, >0 if ok
     */
    public function update($notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update DB line fields total_xxx
     *	Used by migration
     *
     *	@return		int		<0 if ko, >0 if ok
     */
    public function update_total()
    {
    }
}