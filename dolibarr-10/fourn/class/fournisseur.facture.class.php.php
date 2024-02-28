<?php

/**
 *	Class to manage suppliers invoices
 */
class FactureFournisseur extends \CommonInvoice
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'invoice_supplier';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'facture_fourn';
    /**
     * @var int    Name of subtable line
     */
    public $table_element_line = 'facture_fourn_det';
    /**
     * @var int Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_facture_fourn';
    public $picto = 'bill';
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
     * @var int ID
     */
    public $rowid;
    /**
     * @var string Ref
     */
    public $ref;
    public $label;
    public $libelle;
    // @deprecated
    public $product_ref;
    public $ref_supplier;
    public $socid;
    //Check constants for types
    public $type = self::TYPE_STANDARD;
    /**
     * Supplier invoice status
     * @var int
     * @see FactureFournisseur::STATUS_DRAFT, FactureFournisseur::STATUS_VALIDATED, FactureFournisseur::STATUS_PAID, FactureFournisseur::STATUS_ABANDONED
     */
    public $statut;
    /**
     * Set to 1 if the invoice is completely paid, otherwise is 0
     * @var int
     * @deprecated Use statuses stored in self::statut
     */
    public $paye;
    public $author;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * Date modification record (tms)
     *
     * @var integer
     */
    public $tms;
    /**
     * Invoice date (date)
     *
     * @var integer
     */
    public $date;
    /**
     * Max payment date (date_echeance)
     *
     * @var integer
     */
    public $date_echeance;
    public $amount = 0;
    public $remise = 0;
    public $tva = 0;
    public $localtax1;
    public $localtax2;
    public $total_ht = 0;
    public $total_tva = 0;
    public $total_localtax1 = 0;
    public $total_localtax2 = 0;
    public $total_ttc = 0;
    /**
     * @deprecated
     * @see $note_private, $note_public
     */
    public $note;
    public $note_private;
    public $note_public;
    public $propalid;
    public $cond_reglement_id;
    public $cond_reglement_code;
    /**
     * @var int ID
     */
    public $fk_account;
    public $mode_reglement_id;
    public $mode_reglement_code;
    /**
     * Invoice lines
     * @var SupplierInvoiceLine[]
     */
    public $lines = array();
    /**
     * @deprecated
     */
    public $fournisseur;
    /**
     * @var int ID Incorterms
     */
    public $fk_incoterms;
    public $location_incoterms;
    public $libelle_incoterms;
    //Used into tooltip
    public $extraparams = array();
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
    //! id of source var_dump($$this);invoice if replacement invoice or credit note
    /**
     * @var int ID
     */
    public $fk_facture_source;
    /**
     * Standard invoice
     */
    const TYPE_STANDARD = 0;
    /**
     * Replacement invoice
     */
    const TYPE_REPLACEMENT = 1;
    /**
     * Credit note invoice
     */
    const TYPE_CREDIT_NOTE = 2;
    /**
     * Deposit invoice
     */
    const TYPE_DEPOSIT = 3;
    /**
     * Draft
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated (need to be paid)
     */
    const STATUS_VALIDATED = 1;
    /**
     * Classified paid.
     * If paid partially, $this->close_code can be:
     * - CLOSECODE_DISCOUNTVAT
     * - CLOSECODE_BADDEBT
     * If paid completelly, this->close_code will be null
     */
    const STATUS_CLOSED = 2;
    /**
     * Classified abandoned and no payment done.
     * $this->close_code can be:
     * - CLOSECODE_BADDEBT
     * - CLOSECODE_ABANDONED
     * - CLOSECODE_REPLACED
     */
    const STATUS_ABANDONED = 3;
    const CLOSECODE_DISCOUNTVAT = 'discount_vat';
    const CLOSECODE_BADCREDIT = 'badsupplier';
    const CLOSECODE_ABANDONED = 'abandon';
    const CLOSECODE_REPLACED = 'replaced';
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *    Create supplier invoice into database
     *
     *    @param      User		$user       object utilisateur qui cree
     *    @return     int    	     		Id invoice created if OK, < 0 if KO
     */
    public function create($user)
    {
    }
    /**
     *    Load object in memory from database
     *
     *    @param	int		$id         Id supplier invoice
     *    @param	string	$ref		Ref supplier invoice
     *    @return   int        			<0 if KO, >0 if OK, 0 if not found
     */
    public function fetch($id = '', $ref = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load this->lines
     *
     *  @return     int         1 si ok, < 0 si erreur
     */
    public function fetch_lines()
    {
    }
    /**
     *  Update database
     *
     *  @param	User	$user            User that modify
     *  @param  int		$notrigger       0=launch triggers after, 1=disable triggers
     *  @return int 			         <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Add a discount line into an invoice (as an invoice line) using an existing absolute discount (Consume the discount)
     *
     *    @param     int	$idremise	Id of absolute discount
     *    @return    int          		>0 if OK, <0 if KO
     */
    public function insert_discount($idremise)
    {
    }
    /**
     *	Delete invoice from database
     *
     *  @param      User	$user		    User object
     *	@param	    int		$notrigger	    1=Does not execute triggers, 0= execute triggers
     *	@return		int						<0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Tag invoice as a payed invoice
     *
     *	@param  User	$user       Object user
     *	@param  string	$close_code	Code renseigne si on classe a payee completement alors que paiement incomplet. Not implementd yet.
     *	@param  string	$close_note	Commentaire renseigne si on classe a payee alors que paiement incomplet. Not implementd yet.
     *	@return int         		<0 si ko, >0 si ok
     */
    public function set_paid($user, $close_code = '', $close_note = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Tag la facture comme non payee completement + appel trigger BILL_UNPAYED
     *	Fonction utilisee quand un paiement prelevement est refuse,
     *	ou quand une facture annulee et reouverte.
     *
     *	@param      User	$user       Object user that change status
     *	@return     int         		<0 si ok, >0 si ok
     */
    public function set_unpaid($user)
    {
    }
    /**
     *	Tag invoice as validated + call trigger BILL_VALIDATE
     *
     *	@param	User	$user           Object user that validate
     *	@param  string	$force_number   Reference to force on invoice
     *	@param	int		$idwarehouse	Id of warehouse for stock change
     *  @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *	@return int 			        <0 if KO, =0 if nothing to do, >0 if OK
     */
    public function validate($user, $force_number = '', $idwarehouse = 0, $notrigger = 0)
    {
    }
    /**
     *	Set draft status
     *
     *	@param	User	$user			Object user that modify
     *	@param	int		$idwarehouse	Id warehouse to use for stock change.
     *	@return	int						<0 if KO, >0 if OK
     */
    public function setDraft($user, $idwarehouse = -1)
    {
    }
    /**
     *	Ajoute une ligne de facture (associe a aucun produit/service predefini)
     *	Les parametres sont deja cense etre juste et avec valeurs finales a l'appel
     *	de cette methode. Aussi, pour le taux tva, il doit deja avoir ete defini
     *	par l'appelant par la methode get_default_tva(societe_vendeuse,societe_acheteuse,idprod)
     *	et le desc doit deja avoir la bonne valeur (a l'appelant de gerer le multilangue).
     *
     *	@param    	string	$desc            	Description de la ligne
     *	@param    	double	$pu              	Prix unitaire (HT ou TTC selon price_base_type, > 0 even for credit note)
     *	@param    	double	$txtva           	Force Vat rate to use, -1 for auto.
     *	@param		double	$txlocaltax1		LocalTax1 Rate
     *	@param		double	$txlocaltax2		LocalTax2 Rate
     *	@param    	double	$qty             	Quantite
     *	@param    	int		$fk_product      	Product/Service ID predefined
     *	@param    	double	$remise_percent  	Percentage discount of the line
     *	@param    	integer	$date_start      	Date de debut de validite du service
     * 	@param    	integer	$date_end        	Date de fin de validite du service
     * 	@param    	string	$ventil          	Code de ventilation comptable
     *	@param    	int		$info_bits			Bits de type de lines
     *	@param    	string	$price_base_type 	HT ou TTC
     *	@param		int		$type				Type of line (0=product, 1=service)
     *  @param      int		$rang            	Position of line
     *  @param		int		$notrigger			Disable triggers
     *  @param		array	$array_options		extrafields array
     * 	@param 		string	$fk_unit 			Code of the unit to use. Null to use the default one
     *  @param      int     $origin_id          id origin document
     *  @param		double	$pu_ht_devise		Amount in currency
     *  @param		string	$ref_supplier		Supplier ref
     *  @param      string  $special_code       Special code
     *	@return    	int             			>0 if OK, <0 if KO
     */
    public function addline($desc, $pu, $txtva, $txlocaltax1, $txlocaltax2, $qty, $fk_product = 0, $remise_percent = 0, $date_start = '', $date_end = '', $ventil = 0, $info_bits = '', $price_base_type = 'HT', $type = 0, $rang = -1, $notrigger = \false, $array_options = 0, $fk_unit = \null, $origin_id = 0, $pu_ht_devise = 0, $ref_supplier = '', $special_code = '')
    {
    }
    /**
     * Update a line detail into database
     *
     * @param     	int			$id            		Id of line invoice
     * @param     	string		$desc         		Description of line
     * @param     	double		$pu          		Prix unitaire (HT ou TTC selon price_base_type)
     * @param     	double		$vatrate       		VAT Rate (Can be '8.5', '8.5 (ABC)')
     * @param		double		$txlocaltax1		LocalTax1 Rate
     * @param		double		$txlocaltax2		LocalTax2 Rate
     * @param     	double		$qty           		Quantity
     * @param     	int			$idproduct			Id produit
     * @param	  	double		$price_base_type	HT or TTC
     * @param	  	int			$info_bits			Miscellaneous informations of line
     * @param		int			$type				Type of line (0=product, 1=service)
     * @param     	double		$remise_percent  	Percentage discount of the line
     * @param		int			$notrigger			Disable triggers
     * @param      	integer 	$date_start     	Date start of service
     * @param      	integer     $date_end       	Date end of service
     * @param		array		$array_options		extrafields array
     * @param 		string		$fk_unit 			Code of the unit to use. Null to use the default one
     * @param		double		$pu_ht_devise		Amount in currency
     * @param		string		$ref_supplier		Supplier ref
     * @return    	int           					<0 if KO, >0 if OK
     */
    public function updateline($id, $desc, $pu, $vatrate, $txlocaltax1 = 0, $txlocaltax2 = 0, $qty = 1, $idproduct = 0, $price_base_type = 'HT', $info_bits = 0, $type = 0, $remise_percent = 0, $notrigger = \false, $date_start = '', $date_end = '', $array_options = 0, $fk_unit = \null, $pu_ht_devise = 0, $ref_supplier = '')
    {
    }
    /**
     * 	Delete a detail line from database
     *
     * 	@param  int		$rowid      	Id of line to delete
     *	@param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     * 	@return	int						<0 if KO, >0 if OK
     */
    public function deleteline($rowid, $notrigger = 0)
    {
    }
    /**
     *	Charge les informations d'ordre info dans l'objet facture
     *
     *	@param  int		$id       	Id de la facture a charger
     *	@return	void
     */
    public function info($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Renvoi liste des factures remplacables
     *	Statut validee ou abandonnee pour raison autre + non payee + aucun paiement + pas deja remplacee
     *
     *	@param      int		$socid		Id societe
     *	@return    	array|int			Tableau des factures ('id'=>id, 'ref'=>ref, 'status'=>status, 'paymentornot'=>0/1)
     *                                  <0 if error
     */
    public function list_replacable_supplier_invoices($socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Renvoi liste des factures qualifiables pour correction par avoir
     *	Les factures qui respectent les regles suivantes sont retournees:
     *	(validee + paiement en cours) ou classee (payee completement ou payee partiellement) + pas deja remplacee + pas deja avoir
     *
     *	@param		int		$socid		Id societe
     *	@return    	array|int			Tableau des factures ($id => array('ref'=>,'paymentornot'=>,'status'=>,'paye'=>)
     *                                  <0 if error
     */
    public function list_qualified_avoir_supplier_invoices($socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *	@param      User	$user       Object user
     *	@return WorkboardResponse|int <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user)
    {
    }
    /**
     *	Return clicable name (with picto eventually)
     *
     *	@param		int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     *	@param		string	$option						Where point the link
     *	@param		int		$max						Max length of shown ref
     *	@param		int		$short						1=Return just URL
     *	@param		string	$moretitle					Add more text to title tooltip
     *  @param	    int   	$notooltip					1=Disable tooltip
     *  @param      int     $save_lastsearch_value		-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     * 	@return		string								String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $max = 0, $short = 0, $moretitle = '', $notooltip = 0, $save_lastsearch_value = -1)
    {
    }
    /**
     *      Return next reference of supplier invoice not already used (or last reference)
     *      according to numbering module defined into constant INVOICE_SUPPLIER_ADDON_NUMBER
     *
     *      @param	   Societe		$soc		Thirdparty object
     *      @param    string		$mode		'next' for next value or 'last' for last value
     *      @return   string					free ref or last ref
     */
    public function getNextNumRef($soc, $mode = 'next')
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *	@param	string		$option		''=Create a specimen invoice with lines, 'nolines'=No lines
     *  @return	void
     */
    public function initAsSpecimen($option = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @return         int     <0 if KO, >0 if OK
     */
    public function load_state_board()
    {
    }
    /**
     *	Load an object from its id and create a new one in database
     *
     *	@param      User	$user        	User that clone
     *	@param      int		$fromid     	Id of object to clone
     *	@param		int		$invertdetail	Reverse sign of amounts for lines
     * 	@return		int						New id of clone
     */
    public function createFromClone(\User $user, $fromid, $invertdetail = 0)
    {
    }
    /**
     *	Create a document onto disk according to template model.
     *
     *	@param	    string		$modele			Force template to use ('' to not force)
     *	@param		Translate	$outputlangs	Object lang a utiliser pour traduction
     *  @param      int			$hidedetails    Hide details of lines
     *  @param      int			$hidedesc       Hide description
     *  @param      int			$hideref        Hide ref
     *  @param   null|array  $moreparams     Array to provide more information
     *  @return     int         				<0 if KO, 0 if nothing done, >0 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
    /**
     * Returns the rights used for this class
     * @return stdClass
     */
    public function getRights()
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
     * Is the payment of the supplier invoice having a delay?
     *
     * @return bool
     */
    public function hasDelay()
    {
    }
    /**
     * Is credit note used
     *
     * @return bool
     */
    public function isCreditNoteUsed()
    {
    }
}
/**
 *  Class to manage line invoices
 */
class SupplierInvoiceLine extends \CommonObjectLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'facture_fourn_det';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'facture_fourn_det';
    public $oldline;
    /**
     * @deprecated
     * @see $product_ref
     */
    public $ref;
    /**
     * Internal ref
     * @var string
     */
    public $product_ref;
    /**
     * Supplier reference of price when we added the line. May have been changed after line was added.
     * TODO Rename field ref to ref_supplier into table llx_facture_fourn_det and llx_commande_fournisseurdet and update fields into updateline
     * @var string
     */
    public $ref_supplier;
    /**
     * @deprecated
     * @see $label
     */
    public $libelle;
    /**
     * Product description
     * @var string
     */
    public $product_desc;
    /**
     * Unit price before taxes
     * @var float
     * @deprecated Use $subprice
     * @see $subprice
     */
    public $pu_ht;
    public $subprice;
    /**
     * Unit price included taxes
     * @var float
     */
    public $pu_ttc;
    /**
     * Total VAT amount
     * @var float
     * @deprecated Use $total_tva instead
     * @see $total_tva
     */
    public $tva;
    public $total_tva;
    /**
     * Id of the corresponding supplier invoice
     * @var int
     */
    public $fk_facture_fourn;
    /**
     * Product label
     * This field may contains label of product (when invoice create from order)
     * @var string
     */
    public $label;
    /**
     * Description of the line
     * @var string
     */
    public $description;
    public $date_start;
    public $date_end;
    public $skip_update_total;
    // Skip update price total for special lines
    /**
     * @var int Situation advance percentage
     */
    public $situation_percent;
    /**
     * @var int Previous situation line id reference
     */
    public $fk_prev_id;
    public $tva_tx;
    public $localtax1_tx;
    public $localtax2_tx;
    public $qty;
    public $remise_percent;
    public $total_ht;
    public $total_ttc;
    public $total_localtax1;
    public $total_localtax2;
    /**
     * @var int ID
     */
    public $fk_product;
    public $product_type;
    public $product_label;
    public $info_bits;
    /**
     * @var int ID
     */
    public $fk_parent_line;
    public $special_code;
    public $rang;
    public $localtax1_type;
    public $localtax2_type;
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
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Retrieves a supplier invoice line
     *
     * @param    int    $rowid    Line id
     * @return   int              <0 KO; 0 NOT FOUND; 1 OK
     */
    public function fetch($rowid)
    {
    }
    /**
     * Deletes a line
     *
     * @param     bool|int   $notrigger     1=Does not execute triggers, 0= execute triggers
     * @return    int                       0 if KO, 1 if OK
     */
    public function delete($notrigger = 0)
    {
    }
    /**
     * Update a supplier invoice line
     *
     * @param int $notrigger Disable triggers
     * @return int <0 if KO, >0 if OK
     */
    public function update($notrigger = 0)
    {
    }
    /**
     *	Insert line into database
     *
     *	@param      int		$notrigger		1 no triggers
     *	@return		int						<0 if KO, >0 if OK
     */
    public function insert($notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Mise a jour de l'objet ligne de commande en base
     *
     *  @return		int		<0 si ko, >0 si ok
     */
    public function update_total()
    {
    }
}