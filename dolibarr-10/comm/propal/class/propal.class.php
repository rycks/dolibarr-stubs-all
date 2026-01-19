<?php

/**
 *	Class to manage proposals
 */
class Propal extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'propal';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'propal';
    /**
     * @var int    Name of subtable line
     */
    public $table_element_line = 'propaldet';
    /**
     * @var int Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_propal';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'propal';
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
    /**
     * ID of the client
     * @var int
     */
    public $socid;
    public $contactid;
    public $author;
    public $ref_client;
    /**
     * Status of the quote
     * @var int
     * @see Propal::STATUS_DRAFT, Propal::STATUS_VALIDATED, Propal::STATUS_SIGNED, Propal::STATUS_NOTSIGNED, Propal::STATUS_BILLED
     */
    public $statut;
    /**
     * @deprecated
     * @see $date_creation
     */
    public $datec;
    /**
     * Creation date
     * @var int
     */
    public $date_creation;
    /**
     * @deprecated
     * @see $date_validation
     */
    public $datev;
    /**
     * Validation date
     * @var int
     */
    public $date_validation;
    /**
     * Date of the quote
     * @var
     */
    public $date;
    /**
     * @deprecated
     * @see $date
     */
    public $datep;
    public $date_livraison;
    public $fin_validite;
    public $user_author_id;
    public $user_valid_id;
    public $user_close_id;
    /**
     * @deprecated
     * @see $total_ht
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
    /**
     * @var int ID
     */
    public $fk_address;
    public $address_type;
    public $address;
    public $availability_id;
    public $availability_code;
    public $demand_reason_id;
    public $demand_reason_code;
    public $products = array();
    public $extraparams = array();
    /**
     * @var PropaleLigne[]
     */
    public $lines = array();
    public $line;
    public $labelstatut = array();
    public $labelstatut_short = array();
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
    public $oldcopy;
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
     * Not signed quote
     */
    const STATUS_NOTSIGNED = 3;
    /**
     * Billed or processed quote
     */
    const STATUS_BILLED = 4;
    // Todo rename into STATUS_CLOSE ?
    /**
     *	Constructor
     *
     *	@param      DoliDB	$db         Database handler
     *	@param      int		$socid		Id third party
     *	@param      int		$propalid   Id proposal
     */
    public function __construct($db, $socid = "", $propalid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Add line into array products
     *  $this->thirdparty should be loaded
     *
     * 	@param  int		$idproduct       	Product Id to add
     * 	@param  int		$qty             	Quantity
     * 	@param  int		$remise_percent  	Discount effected on Product
     *  @return	int							<0 if KO, >0 if OK
     *
     *	TODO	Replace calls to this function by generation objet Ligne
     *			inserted into table $this->products
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
     *      The parameters are already supposed to be appropriate and with final values to the call
     *      of this method. Also, for the VAT rate, it must have already been defined
     *      by whose calling the method get_default_tva (societe_vendeuse, societe_acheteuse, '' product)
     *      and desc must already have the right value (it's up to the caller to manage multilanguage)
     *
     * 		@param    	string		$desc				Description of line
     * 		@param    	float		$pu_ht				Unit price
     * 		@param    	float		$qty             	Quantity
     * 		@param    	float		$txtva           	Force Vat rate, -1 for auto (Can contain the vat_src_code too with syntax '9.9 (CODE)')
     * 		@param		float		$txlocaltax1		Local tax 1 rate (deprecated, use instead txtva with code inside)
     *  	@param		float		$txlocaltax2		Local tax 2 rate (deprecated, use instead txtva with code inside)
     *		@param    	int			$fk_product      	Product/Service ID predefined
     * 		@param    	float		$remise_percent  	Pourcentage de remise de la ligne
     * 		@param    	string		$price_base_type	HT or TTC
     * 		@param    	float		$pu_ttc             Prix unitaire TTC
     * 		@param    	int			$info_bits			Bits de type de lignes
     *      @param      int			$type               Type of line (0=product, 1=service). Not used if fk_product is defined, the type of product is used.
     *      @param      int			$rang               Position of line
     *      @param		int			$special_code		Special code (also used by externals modules!)
     *      @param		int			$fk_parent_line		Id of parent line
     *      @param		int			$fk_fournprice		Id supplier price
     *      @param		int			$pa_ht				Buying price without tax
     *      @param		string		$label				???
     *		@param      int			$date_start       	Start date of the line
     *		@param      int			$date_end         	End date of the line
     *      @param		array		$array_options		extrafields array
     * 		@param 		string		$fk_unit 			Code of the unit to use. Null to use the default one
     *      @param		string		$origin				'order', ...
     *      @param		int			$origin_id			Id of origin object
     * 		@param		double		$pu_ht_devise		Unit price in currency
     * 		@param		int    		$fk_remise_except	Id discount if line is from a discount
     *    	@return    	int         	    			>0 if OK, <0 if KO
     *    	@see       	add_product()
     */
    public function addline($desc, $pu_ht, $qty, $txtva, $txlocaltax1 = 0.0, $txlocaltax2 = 0.0, $fk_product = 0, $remise_percent = 0.0, $price_base_type = 'HT', $pu_ttc = 0.0, $info_bits = 0, $type = 0, $rang = -1, $special_code = 0, $fk_parent_line = 0, $fk_fournprice = 0, $pa_ht = 0, $label = '', $date_start = '', $date_end = '', $array_options = 0, $fk_unit = \null, $origin = '', $origin_id = 0, $pu_ht_devise = 0, $fk_remise_except = 0)
    {
    }
    /**
     *  Update a proposal line
     *
     *  @param      int			$rowid           	Id de la ligne
     *  @param      float		$pu		     	  	Prix unitaire (HT ou TTC selon price_base_type)
     *  @param      float		$qty            	Quantity
     *  @param      float		$remise_percent  	Remise effectuee sur le produit
     *  @param      float		$txtva	          	Taux de TVA
     * 	@param	  	float		$txlocaltax1		Local tax 1 rate
     *  @param	  	float		$txlocaltax2		Local tax 2 rate
     *  @param      string		$desc            	Description
     *	@param	  	string		$price_base_type	HT ou TTC
     *	@param      int			$info_bits        	Miscellaneous informations
     *	@param		int			$special_code		Special code (also used by externals modules!)
     * 	@param		int			$fk_parent_line		Id of parent line (0 in most cases, used by modules adding sublevels into lines).
     * 	@param		int			$skip_update_total	Keep fields total_xxx to 0 (used for special lines by some modules)
     *  @param		int			$fk_fournprice		Id of origin supplier price
     *  @param		int			$pa_ht				Price (without tax) of product when it was bought
     *  @param		string		$label				???
     *  @param		int			$type				0/1=Product/service
     *	@param      int			$date_start       	Start date of the line
     *	@param      int			$date_end         	End date of the line
     *  @param		array		$array_options		extrafields array
     * 	@param 		string		$fk_unit 			Code of the unit to use. Null to use the default one
     * 	@param		double		$pu_ht_devise		Unit price in currency
     * 	@param		int			$notrigger			disable line update trigger
     *  @return     int     		        		0 if OK, <0 if KO
     */
    public function updateline($rowid, $pu, $qty, $remise_percent, $txtva, $txlocaltax1 = 0.0, $txlocaltax2 = 0.0, $desc = '', $price_base_type = 'HT', $info_bits = 0, $special_code = 0, $fk_parent_line = 0, $skip_update_total = 0, $fk_fournprice = 0, $pa_ht = 0, $label = '', $type = 0, $date_start = '', $date_end = '', $array_options = 0, $fk_unit = \null, $pu_ht_devise = 0, $notrigger = 0)
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
     *	Insert into DB a proposal object completely defined by its data members (ex, results from copy).
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
     *		@param		int		$socid			Id of thirdparty
     * 	 	@return		int						New id of clone
     */
    public function createFromClone(\User $user, $socid = 0)
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
     *      Update database
     *
     *      @param      User	$user        	User that modify
     *      @param      int		$notrigger	    0=launch triggers after, 1=disable triggers
     *      @return     int      			   	<0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Load array lines
     *
     * @param		int		$only_product	Return only physical products
     * @return		int						<0 if KO, >0 if OK
     */
    public function fetch_lines($only_product = 0)
    {
    }
    /**
     *  Set status to validated
     *
     *  @param	User	$user       Object user that validate
     *  @param	int		$notrigger	1=Does not execute triggers, 0=execute triggers
     *  @return int         		<0 if KO, 0=Nothing done, >=0 if OK
     */
    public function valid($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Define proposal date
     *
     *  @param  User		$user      	Object user that modify
     *  @param  int			$date		Date
     *  @param  int			$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return	int         			<0 if KO, >0 if OK
     */
    public function set_date($user, $date, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define end validity date
     *
     *	@param		User	$user        		Object user that modify
     *	@param      int		$date_fin_validite	End of validity date
     *  @param  	int		$notrigger			1=Does not execute triggers, 0= execute triggers
     *	@return     int         				<0 if KO, >0 if OK
     */
    public function set_echeance($user, $date_fin_validite, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set delivery date
     *
     *	@param      User 	$user        		Object user that modify
     *	@param      int		$date_livraison     Delivery date
     *  @param  	int		$notrigger			1=Does not execute triggers, 0= execute triggers
     *	@return     int         				<0 if ko, >0 if ok
     */
    public function set_date_livraison($user, $date_livraison, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Set delivery
     *
     *  @param		User	$user		  	Object user that modify
     *  @param      int		$id				Availability id
     *  @param  	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *  @return     int           			<0 if KO, >0 if OK
     */
    public function set_availability($user, $id, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Set source of demand
     *
     *  @param		User	$user		Object user that modify
     *  @param      int		$id			Input reason id
     *  @param  	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return     int           		<0 if KO, >0 if OK
     */
    public function set_demand_reason($user, $id, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set customer reference number
     *
     *  @param      User	$user			Object user that modify
     *  @param      string	$ref_client		Customer reference
     *  @param  	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *  @return     int						<0 if ko, >0 if ok
     */
    public function set_ref_client($user, $ref_client, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set an overall discount on the proposal
     *
     *	@param      User	$user       Object user that modify
     *	@param      double	$remise     Amount discount
     *  @param  	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return     int         		<0 if ko, >0 if ok
     */
    public function set_remise_percent($user, $remise, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set an absolute overall discount on the proposal
     *
     *	@param      User	$user       Object user that modify
     *	@param      double	$remise     Amount discount
     *  @param  	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return     int         		<0 if ko, >0 if ok
     */
    public function set_remise_absolue($user, $remise, $notrigger = 0)
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
     *	Close the commercial proposal
     *
     *	@param      User	$user		Object user that close
     *	@param      int		$statut		Statut
     *	@param      string	$note		Complete private note with this note
     *  @param		int		$notrigger	1=Does not execute triggers, 0=Execute triggers
     *	@return     int         		<0 if KO, >0 if OK
     */
    public function cloture($user, $statut, $note = "", $notrigger = 0)
    {
    }
    /**
     *	Class invoiced the Propal
     *
     *	@param  	User	$user    	Object user
     *  @param		int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return     int     			<0 si ko, >0 si ok
     */
    public function classifyBilled(\User $user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set draft status
     *
     *	@param		User	$user		Object user that modify
     *  @param		int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return		int					<0 if KO, >0 if OK
     */
    public function setDraft($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of proposal (eventually filtered on user) into an array
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
    public function liste_array($shortlist = 0, $draft = 0, $notcurrentuser = 0, $socid = 0, $limit = 0, $offset = 0, $sortfield = 'p.datep', $sortorder = 'DESC')
    {
    }
    /**
     *  Returns an array with the numbers of related invoices
     *
     *	@return	array		Array of invoices
     */
    public function getInvoiceArrayList()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Returns an array with id and ref of related invoices
     *
     *	@param		int		$id			Id propal
     *	@return		array				Array of invoices id
     */
    public function InvoiceArrayList($id)
    {
    }
    /**
     *	Delete proposal
     *
     *	@param	User	$user        	Object user that delete
     *	@param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return	int						1 if ok, otherwise if error
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *  Change the delivery time
     *
     *  @param	int	$availability_id	Id of new delivery time
     * 	@param	int	$notrigger			1=Does not execute triggers, 0= execute triggers
     *  @return int                  	>0 if OK, <0 if KO
     *  @deprecated  use set_availability
     */
    public function availability($availability_id, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Change source demand
     *
     *	@param	int $demand_reason_id 	Id of new source demand
     * 	@param	int	$notrigger			1=Does not execute triggers, 0= execute triggers
     *	@return int						>0 si ok, <0 si ko
     *	@deprecated use set_demand_reason
     */
    public function demand_reason($demand_reason_id, $notrigger = 0)
    {
    }
    /**
     *	Object Proposal Information
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
     *    	@param      int			$mode        0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
     *    	@return     string		Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    	Return label of a status (draft, validated, ...)
     *
     *    	@param      int			$statut		id statut
     *    	@param      int			$mode      	0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
     *    	@return     string		Label
     */
    public function LibStatut($statut, $mode = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @param          User	$user   Object user
     *      @param          int		$mode   "opened" for proposal to close, "signed" for proposal to invoice
     *      @return WorkboardResponse|int <0 if KO, WorkboardResponse if OK
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
     *      Charge indicateurs this->nb de tableau de bord
     *
     *      @return     int         <0 if ko, >0 if ok
     */
    public function load_state_board()
    {
    }
    /**
     *  Returns the reference to the following non used Proposal used depending on the active numbering module
     *  defined into PROPALE_ADDON
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
     *	@param      int		$withpicto		          Add picto into link
     *	@param      string	$option			          Where point the link ('expedition', 'document', ...)
     *	@param      string	$get_params    	          Parametres added to url
     *  @param	    int   	$notooltip		          1=Disable tooltip
     *  @param      int     $save_lastsearch_value    -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return     string          		          String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $get_params = '', $notooltip = 0, $save_lastsearch_value = -1)
    {
    }
    /**
     * 	Retrieve an array of proposal lines
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
 *	Class to manage commercial proposal lines
 */
class PropaleLigne extends \CommonObjectLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'propaldet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'propaldet';
    public $oldline;
    // From llx_propaldet
    public $fk_propal;
    public $fk_parent_line;
    public $desc;
    // Description ligne
    public $fk_product;
    // Id produit predefini
    /**
     * @deprecated
     * @see $product_type
     */
    public $fk_product_type;
    /**
     * Product type.
     * @var int
     * @see Product::TYPE_PRODUCT, Product::TYPE_SERVICE
     */
    public $product_type = \Product::TYPE_PRODUCT;
    public $qty;
    public $tva_tx;
    public $subprice;
    public $remise_percent;
    public $fk_remise_except;
    public $rang = 0;
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
    // Some other info:
    // Bit 0: 	0 si TVA normal - 1 si TVA NPR
    // Bit 1:	0 ligne normale - 1 si ligne de remise fixe
    public $total_ht;
    // Total HT  de la ligne toute quantite et incluant la remise ligne
    public $total_tva;
    // Total TVA  de la ligne toute quantite et incluant la remise ligne
    public $total_ttc;
    // Total TTC de la ligne toute quantite et incluant la remise ligne
    /**
     * @deprecated
     * @see $remise_percent, $fk_remise_except
     */
    public $remise;
    /**
     * @deprecated
     * @see $subprice
     */
    public $price;
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
    public $date_start;
    public $date_end;
    public $skip_update_total;
    // Skip update price total for special lines
    // Multicurrency
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
     *  @param	User	$user		Object user
     *	@param 	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return	 int  				<0 if ko, >0 if ok
     */
    public function delete(\User $user, $notrigger = 0)
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
     *	@return		int		<0 if KO, >0 if OK
     */
    public function update_total()
    {
    }
}