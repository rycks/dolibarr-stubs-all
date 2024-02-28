<?php

/**
 *	Class to manage contracts
 */
class Contrat extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'contrat';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'contrat';
    /**
     * @var int    Name of subtable line
     */
    public $table_element_line = 'contratdet';
    /**
     * @var int Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_contrat';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'contract';
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
     * Customer reference of the contract
     * @var string
     */
    public $ref_customer;
    /**
     * Supplier reference of the contract
     * @var string
     */
    public $ref_supplier;
    /**
     * Client id linked to the contract
     * @var int
     */
    public $socid;
    public $societe;
    // Objet societe
    /**
     * Status of the contract
     * @var int
     */
    public $statut = 0;
    // 0=Draft,
    public $product;
    /**
     * @var int		Id of user author of the contract
     */
    public $fk_user_author;
    /**
     * TODO: Which is the correct one?
     * Author of the contract
     * @var int
     */
    public $user_author_id;
    /**
     * @var User 	Object user that create the contract. Set by the info method.
     */
    public $user_creation;
    /**
     * @var User 	Object user that close the contract. Set by the info method.
     */
    public $user_cloture;
    /**
     * @var int		Date of creation
     */
    public $date_creation;
    /**
     * @var int		Date of last modification. Not filled until you call ->info()
     */
    public $date_modification;
    /**
     * @var int		Date of validation
     */
    public $date_validation;
    /**
     * @var int		Date when contract was signed
     */
    public $date_contrat;
    /**
     * @var int		Date of contract closure
     * @deprecated we close contract lines, not a contract
     */
    public $date_cloture;
    public $commercial_signature_id;
    public $commercial_suivi_id;
    /**
     * @deprecated Use fk_project instead
     * @see $fk_project
     */
    public $fk_projet;
    public $extraparams = array();
    /**
     * @var ContratLigne[]		Contract lines
     */
    public $lines = array();
    /**
     * Maps ContratLigne IDs to $this->lines indexes
     * @var int[]
     */
    protected $lines_id_index_mapper = array();
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
     *	@param	Societe		$soc		Thirdparty object
     *	@return string					free reference for contract
     */
    public function getNextNumRef($soc)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Activate a contract line
     *
     *  @param	User		$user       Objet User who activate contract
     *  @param  int			$line_id    Id of line to activate
     *  @param  int			$date       Opening date
     *  @param  int|string	$date_end   Expected end date
     * 	@param	string		$comment	A comment typed by user
     *  @return int         			<0 if KO, >0 if OK
     */
    public function active_line($user, $line_id, $date, $date_end = '', $comment = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Close a contract line
     *
     *  @param	User		$user       Objet User who close contract
     *  @param  int			$line_id    Id of line to close
     *  @param  int			$date_end	End date
     * 	@param	string		$comment	A comment typed by user
     *  @return int         			<0 if KO, >0 if OK
     */
    public function close_line($user, $line_id, $date_end, $comment = '')
    {
    }
    /**
     *  Open all lines of a contract
     *
     *  @param	User		$user      		Object User making action
     *  @param	int|string	$date_start		Date start (now if empty)
     *  @param	int			$notrigger		1=Does not execute triggers, 0=Execute triggers
     *  @param	string		$comment		Comment
     *	@return	int							<0 if KO, >0 if OK
     *  @see ()
     */
    public function activateAll($user, $date_start = '', $notrigger = 0, $comment = '')
    {
    }
    /**
     * Close all lines of a contract
     *
     * @param	User		$user      		Object User making action
     * @param	int			$notrigger		1=Does not execute triggers, 0=Execute triggers
     * @param	string		$comment		Comment
     * @return	int							<0 if KO, >0 if OK
     * @see activateAll()
     */
    public function closeAll(\User $user, $notrigger = 0, $comment = '')
    {
    }
    /**
     * Validate a contract
     *
     * @param	User	$user      		Objet User
     * @param   string	$force_number	Reference to force on contract (not implemented yet)
     * @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     * @return	int						<0 if KO, >0 if OK
     */
    public function validate(\User $user, $force_number = '', $notrigger = 0)
    {
    }
    /**
     * Unvalidate a contract
     *
     * @param	User	$user      		Object User
     * @param	int		$notrigger		1=Does not execute triggers, 0=execute triggers
     * @return	int						<0 if KO, >0 if OK
     */
    public function reopen($user, $notrigger = 0)
    {
    }
    /**
     *    Load a contract from database
     *
     *    @param	int		$id     		Id of contract to load
     *    @param	string	$ref			Ref
     *    @param	string	$ref_customer	Customer ref
     *    @param	string	$ref_supplier	Supplier ref
     *    @return   int     				<0 if KO, 0 if not found, Id of contract if OK
     */
    public function fetch($id, $ref = '', $ref_customer = '', $ref_supplier = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load lines array into this->lines.
     *  This set also nbofserviceswait, nbofservicesopened, nbofservicesexpired and nbofservicesclosed
     *
     *  @return ContratLigne[]   Return array of contract lines
     */
    public function fetch_lines()
    {
    }
    /**
     *  Create a contract into database
     *
     *  @param	User	$user       User that create
     *  @return int  				<0 if KO, id of contract if OK
     */
    public function create($user)
    {
    }
    /**
     *  Supprime l'objet de la base
     *
     *  @param	User		$user       Utilisateur qui supprime
     *  @return int         			< 0 si erreur, > 0 si ok
     */
    public function delete($user)
    {
    }
    /**
     *  Update object into database
     *
     *  @param	User	$user        User that modifies
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 <0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     *  Ajoute une ligne de contrat en base
     *
     *  @param	string		$desc            	Description de la ligne
     *  @param  float		$pu_ht              Prix unitaire HT
     *  @param  int			$qty             	Quantite
     *  @param  float		$txtva           	Taux tva
     *  @param  float		$txlocaltax1        Local tax 1 rate
     *  @param  float		$txlocaltax2        Local tax 2 rate
     *  @param  int			$fk_product      	Id produit
     *  @param  float		$remise_percent  	Percentage discount of the line
     *  @param  int			$date_start      	Date de debut prevue
     *  @param  int			$date_end        	Date de fin prevue
     *	@param	string		$price_base_type	HT or TTC
     * 	@param  float		$pu_ttc             Prix unitaire TTC
     * 	@param  int			$info_bits			Bits de type de lignes
     * 	@param  int			$fk_fournprice		Fourn price id
     *  @param  int			$pa_ht				Buying price HT
     *  @param	array		$array_options		extrafields array
     * 	@param 	string		$fk_unit 			Code of the unit to use. Null to use the default one
     * 	@param 	string		$rang 				Position
     *  @return int             				<0 if KO, >0 if OK
     */
    public function addline($desc, $pu_ht, $qty, $txtva, $txlocaltax1, $txlocaltax2, $fk_product, $remise_percent, $date_start, $date_end, $price_base_type = 'HT', $pu_ttc = 0.0, $info_bits = 0, $fk_fournprice = \null, $pa_ht = 0, $array_options = 0, $fk_unit = \null, $rang = 0)
    {
    }
    /**
     *  Mets a jour une ligne de contrat
     *
     *  @param	int			$rowid            	Id de la ligne de facture
     *  @param  string		$desc             	Description de la ligne
     *  @param  float		$pu               	Prix unitaire
     *  @param  int			$qty              	Quantite
     *  @param  float		$remise_percent   	Percentage discount of the line
     *  @param  int			$date_start       	Date de debut prevue
     *  @param  int			$date_end         	Date de fin prevue
     *  @param  float		$tvatx            	Taux TVA
     *  @param  float		$localtax1tx      	Local tax 1 rate
     *  @param  float		$localtax2tx      	Local tax 2 rate
     *  @param  int|string	$date_debut_reel  	Date de debut reelle
     *  @param  int|string	$date_fin_reel    	Date de fin reelle
     *	@param	string		$price_base_type	HT or TTC
     * 	@param  int			$info_bits			Bits de type de lignes
     * 	@param  int			$fk_fournprice		Fourn price id
     *  @param  int			$pa_ht				Buying price HT
     *  @param	array		$array_options		extrafields array
     * 	@param 	string		$fk_unit 			Code of the unit to use. Null to use the default one
     *  @return int              				< 0 si erreur, > 0 si ok
     */
    public function updateline($rowid, $desc, $pu, $qty, $remise_percent, $date_start, $date_end, $tvatx, $localtax1tx = 0.0, $localtax2tx = 0.0, $date_debut_reel = '', $date_fin_reel = '', $price_base_type = 'HT', $info_bits = 0, $fk_fournprice = \null, $pa_ht = 0, $array_options = 0, $fk_unit = \null)
    {
    }
    /**
     *  Delete a contract line
     *
     *  @param	int		$idline		Id of line to delete
     *	@param  User	$user       User that delete
     *  @return int         		>0 if OK, <0 if KO
     */
    public function deleteline($idline, \User $user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update statut of contract according to services
     *
     *	@param	User	$user		Object user
     *	@return int     			<0 if KO, >0 if OK
     *  @deprecated					This function will never be used. Status of a contract is status of its lines.
     */
    public function update_statut($user)
    {
    }
    /**
     *  Return label of a contract status
     *
     *  @param	int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Long label of all services, 5=Libelle court + Picto, 6=Picto of all services, 7=Same than 6 with fixed length
     *  @return string      		Label
     */
    public function getLibStatut($mode)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi label of a given contrat status
     *
     *  @param	int		$statut      	Status id
     *  @param  int		$mode          	0=Long label, 1=Short label, 2=Picto + Libelle court, 3=Picto, 4=Picto + Long label of all services, 5=Libelle court + Picto, 6=Picto of all services, 7=Same than 6 with fixed length
     *	@return string      			Label
     */
    public function LibStatut($statut, $mode)
    {
    }
    /**
     *	Return clicable name (with picto eventually)
     *
     *	@param	int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     *	@param	int		$maxlength					Max length of ref
     *  @param	int     $notooltip					1=Disable tooltip
     *  @param  int     $save_lastsearch_value		-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $maxlength = 0, $notooltip = 0, $save_lastsearch_value = -1)
    {
    }
    /**
     *  Charge les informations d'ordre info dans l'objet contrat
     *
     *  @param  int		$id     id du contrat a charger
     *  @return	void
     */
    public function info($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of line rowid
     *
     *  @param	int		$statut     Status of lines to get
     *  @return array       		Array of line's rowid
     */
    public function array_detail($statut = -1)
    {
    }
    /**
     *  Return list of other contracts for same company than current contract
     *
     *	@param	string		$option		'all' or 'others'
     *  @return array   				Array of contracts id
     */
    public function getListOfContracts($option = 'all')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @param	User	$user           Objet user
     *      @param  string	$mode           "inactive" pour services a activer, "expired" pour services expires
     *      @return WorkboardResponse|int <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user, $mode)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *   Charge indicateurs this->nb de tableau de bord
     *
     *   @return     int         <0 si ko, >0 si ok
     */
    public function load_state_board()
    {
    }
    /* gestion des contacts d'un contrat */
    /**
     *  Return id des contacts clients de facturation
     *
     *  @return     array       Liste des id contacts facturation
     */
    public function getIdBillingContact()
    {
    }
    /**
     *  Return id des contacts clients de prestation
     *
     *  @return     array       Liste des id contacts prestation
     */
    public function getIdServiceContact()
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
     * 	Create an array of order lines
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
    /**
     * Load an object from its id and create a new one in database
     *
     * @param	User	$user		  User making the clone
     * @param   int     $socid        Id of thirdparty
     * @param   int     $notrigger	  1=Does not execute triggers, 0= execute triggers
     * @return  int                   New id of clone
     */
    public function createFromClone(\User $user, $socid = 0, $notrigger = 0)
    {
    }
}
/**
 *	Classe permettant la gestion des lignes de contrats
 */
class ContratLigne extends \CommonObjectLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'contratdet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'contratdet';
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string Ref
     */
    public $ref;
    public $tms;
    /**
     * @var int ID
     */
    public $fk_contrat;
    /**
     * @var int ID
     */
    public $fk_product;
    public $statut;
    // 0 inactive, 4 active, 5 closed
    public $type;
    // 0 for product, 1 for service
    /**
     * @var string
     * @deprecated
     */
    public $label;
    /**
     * @var string
     * @deprecated
     */
    public $libelle;
    /**
     * @var string description
     */
    public $description;
    public $product_type;
    // 0 for product, 1 for service
    public $product_ref;
    public $product_label;
    public $date_commande;
    public $date_start;
    // date start planned
    public $date_start_real;
    // date start real
    public $date_end;
    // date end planned
    public $date_end_real;
    // date end real
    // For backward compatibility
    public $date_ouverture_prevue;
    // date start planned
    public $date_ouverture;
    // date start real
    public $date_fin_validite;
    // date end planned
    public $date_cloture;
    // date end real
    public $tva_tx;
    public $localtax1_tx;
    public $localtax2_tx;
    public $localtax1_type;
    // Local tax 1 type
    public $localtax2_type;
    // Local tax 2 type
    public $qty;
    public $remise_percent;
    public $remise;
    /**
     * @var int ID
     */
    public $fk_remise_except;
    public $subprice;
    // Unit price HT
    /**
     * @var float
     * @deprecated Use $price_ht instead
     * @see $price_ht
     */
    public $price;
    public $price_ht;
    public $total_ht;
    public $total_tva;
    public $total_localtax1;
    public $total_localtax2;
    public $total_ttc;
    /**
     * @var int ID
     */
    public $fk_fournprice;
    public $pa_ht;
    public $info_bits;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var int ID
     */
    public $fk_user_ouverture;
    /**
     * @var int ID
     */
    public $fk_user_cloture;
    public $commentaire;
    const STATUS_INITIAL = 0;
    const STATUS_OPEN = 4;
    const STATUS_CLOSED = 5;
    /**
     *  Constructor
     *
     *  @param      DoliDb		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Return label of this contract line status
     *
     *	@param	int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return string      		Libelle
     */
    public function getLibStatut($mode)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of a contract line status
     *
     *  @param	int		$statut     Id statut
     *	@param  int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *	@param	int		$expired	0=Not expired, 1=Expired, -1=Both or unknown
     *  @param	string	$moreatt	More attribute
     *  @return string      		Libelle
     */
    public static function LibStatut($statut, $mode, $expired = -1, $moreatt = '')
    {
    }
    /**
     *	Return clicable name (with picto eventually)
     *
     *  @param	int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     *  @param	int		$maxlength		Max length
     *  @return	string					Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $maxlength = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id         Id object
     *  @param	string	$ref		Ref of contract
     *  @return int         		<0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '')
    {
    }
    /**
     *      Update database for contract line
     *
     *      @param	User	$user        	User that modify
     *      @param  int		$notrigger	    0=no, 1=yes (no update trigger)
     *      @return int         			<0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Mise a jour en base des champs total_xxx de ligne
     *		Used by migration process
     *
     *		@return		int		<0 if KO, >0 if OK
     */
    public function update_total()
    {
    }
    /**
     * Inserts a contrat line into database
     *
     * @param int $notrigger Set to 1 if you don't want triggers to be fired
     * @return int <0 if KO, >0 if OK
     */
    public function insert($notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Activate a contract line
     *
     * @param   User 		$user 		Objet User who activate contract
     * @param  	int 		$date 		Date activation
     * @param  	int|string 	$date_end 	Date planned end. Use '-1' to keep it unchanged.
     * @param   string 		$comment 	A comment typed by user
     * @return 	int                    	<0 if KO, >0 if OK
     */
    public function active_line($user, $date, $date_end = '', $comment = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Close a contract line
     *
     * @param    User 	$user 			Objet User who close contract
     * @param  	 int 	$date_end 		Date end
     * @param    string $comment 		A comment typed by user
     * @param    int	$notrigger		1=Does not execute triggers, 0=Execute triggers
     * @return int                    	<0 if KO, >0 if OK
     */
    public function close_line($user, $date_end, $comment = '', $notrigger = 0)
    {
    }
}