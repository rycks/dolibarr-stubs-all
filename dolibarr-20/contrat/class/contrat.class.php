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
     * @var string    Name of subtable line
     */
    public $table_element_line = 'contratdet';
    /**
     * @var string Fieldname with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_contrat';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'contract';
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
    public $from;
    /**
     * Supplier reference of the contract
     * @var string
     */
    public $ref_supplier;
    /**
     * Entity of the contract
     * @var int
     */
    public $entity;
    /**
     * Client id linked to the contract
     * @var int
     */
    public $socid;
    /**
     * Client id linked to the contract
     * @var int
     * @deprecated Use $socid
     */
    public $fk_soc;
    public $societe;
    // Object societe
    /**
     * Status of the contract
     * @var int
     * @deprecated
     */
    public $statut = 0;
    /**
     * Status of the contract (0=Draft, 1=Validated)
     * @var int
     */
    public $status = 0;
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
     * @deprecated
     */
    public $user_creation;
    /**
     * @var User 	Object user that close the contract. Set by the info method.
     */
    public $user_cloture;
    /**
     * @var integer|string		Date of creation
     */
    public $date_creation;
    /**
     * @var integer|string		Date of last modification. Not filled until you call ->info()
     */
    public $date_modification;
    /**
     * @var integer|string		Date of validation
     */
    public $date_validation;
    /**
     * @var integer|string		Date when contract was signed
     */
    public $date_contrat;
    /**
     * Status of the contract (0=NoSignature, 1=SignedBySender, 2=SignedByReceiver, 9=SignedByAll)
     * @var int
     */
    public $signed_status = 0;
    public $commercial_signature_id;
    public $fk_commercial_signature;
    public $commercial_suivi_id;
    public $fk_commercial_suivi;
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
    public $nbofservices;
    public $nbofserviceswait;
    public $nbofservicesopened;
    public $nbofservicesexpired;
    public $nbofservicesclosed;
    //public $lower_planned_end_date;
    //public $higher_planner_end_date;
    /**
     * Maps ContratLigne IDs to $this->lines indexes
     * @var int[]
     */
    protected $lines_id_index_mapper = array();
    /**
     *  'type' if the field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'enabled' is a condition when the field must be managed.
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' is the CSS style to use on field. For example: 'maxwidth200'
     *  'help' is a string visible as a tooltip on field
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10), 'ref' => array('type' => 'varchar(50)', 'label' => 'Ref', 'enabled' => 1, 'visible' => -1, 'showoncombobox' => 1, 'position' => 15, 'searchall' => 1), 'ref_ext' => array('type' => 'varchar(255)', 'label' => 'Ref ext', 'enabled' => 1, 'visible' => 0, 'position' => 20), 'ref_customer' => array('type' => 'varchar(50)', 'label' => 'RefCustomer', 'enabled' => 1, 'visible' => -1, 'position' => 25, 'searchall' => 1), 'ref_supplier' => array('type' => 'varchar(50)', 'label' => 'RefSupplier', 'enabled' => 1, 'visible' => -1, 'position' => 26, 'searchall' => 1), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => '1', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 30, 'index' => 1), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 35), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 40), 'date_contrat' => array('type' => 'datetime', 'label' => 'Date contrat', 'enabled' => 1, 'visible' => -1, 'position' => 45), 'signed_status' => array('type' => 'smallint(6)', 'label' => 'SignedStatus', 'enabled' => 1, 'visible' => -1, 'position' => 50, 'arrayofkeyval' => array(0 => 'NoSignature', 1 => 'SignedSender', 2 => 'SignedReceiver', 9 => 'SignedAll')), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'enabled' => 'isModEnabled("societe")', 'visible' => -1, 'notnull' => 1, 'position' => 70), 'fk_projet' => array('type' => 'integer:Project:projet/class/project.class.php:1:(fk_statut:=:1)', 'label' => 'Project', 'enabled' => "isModEnabled('project')", 'visible' => -1, 'position' => 75), 'fk_commercial_signature' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'SaleRepresentative Signature', 'enabled' => 1, 'visible' => -1, 'position' => 80), 'fk_commercial_suivi' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'SaleRepresentative follower', 'enabled' => 1, 'visible' => -1, 'position' => 85), 'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 90), 'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 105, 'searchall' => 1), 'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 110, 'searchall' => 1), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 115), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 120), 'extraparams' => array('type' => 'varchar(255)', 'label' => 'Extraparams', 'enabled' => 1, 'visible' => -1, 'position' => 125), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 135), 'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'Last main doc', 'enabled' => 1, 'visible' => -1, 'position' => 140), 'statut' => array('type' => 'smallint(6)', 'label' => 'Statut', 'enabled' => 1, 'visible' => -1, 'position' => 500, 'notnull' => 1, 'arrayofkeyval' => array(0 => 'Draft', 1 => 'Validated', 2 => 'Closed')));
    // END MODULEBUILDER PROPERTIES
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
    const STATUS_CLOSED = 2;
    /*
     * No signature
     */
    const STATUS_NO_SIGNATURE = 0;
    /*
     * Signed by sender
     */
    const STATUS_SIGNED_SENDER = 1;
    /*
     * Signed by receiver
     */
    const STATUS_SIGNED_RECEIVER = 2;
    /*
     * Signed by all
     */
    const STATUS_SIGNED_ALL = 9;
    // To handle future kind of signature (ex: tripartite contract)
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
     *  @param	User		$user       Object User who activate contract
     *  @param  int			$line_id    Id of line to activate
     *  @param  int			$date_start Opening date
     *  @param  int|string	$date_end   Expected end date
     * 	@param	string		$comment	A comment typed by user
     *  @return int         			Return integer <0 if KO, >0 if OK
     */
    public function active_line($user, $line_id, $date_start, $date_end = '', $comment = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Close a contract line
     *
     *  @param	User		$user       Object User who close contract
     *  @param  int			$line_id    Id of line to close
     *  @param  int			$date_end	End date
     * 	@param	string		$comment	A comment typed by user
     *  @return int         			Return integer <0 if KO, >0 if OK
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
     *  @param	int|string	$date_end		Date end
     *	@return	int							Return integer <0 if KO, >0 if OK
     *  @see ()
     */
    public function activateAll($user, $date_start = '', $notrigger = 0, $comment = '', $date_end = '')
    {
    }
    /**
     * Close all lines of a contract
     *
     * @param	User		$user      		Object User making action
     * @param	int			$notrigger		1=Does not execute triggers, 0=Execute triggers
     * @param	string		$comment		Comment
     * @return	int							Return integer <0 if KO, >0 if OK
     * @see activateAll()
     */
    public function closeAll(\User $user, $notrigger = 0, $comment = '')
    {
    }
    /**
     * Validate a contract
     *
     * @param	User	$user      		Object User
     * @param   string	$force_number	Reference to force on contract (not implemented yet)
     * @param	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     * @return	int						Return integer <0 if KO, >0 if OK
     */
    public function validate(\User $user, $force_number = '', $notrigger = 0)
    {
    }
    /**
     * Unvalidate a contract
     *
     * @param	User	$user      		Object User
     * @param	int		$notrigger		1=Does not execute triggers, 0=execute triggers
     * @return	int						Return integer <0 if KO, >0 if OK
     */
    public function reopen($user, $notrigger = 0)
    {
    }
    /**
     *  Load a contract from database
     *
     *  @param	int		$id     		Id of contract to load
     *  @param	string	$ref			Ref
     *  @param	string	$ref_customer	Customer ref
     *  @param	string	$ref_supplier	Supplier ref
     *  @param	int		$noextrafields	0=Default to load extrafields, 1=No extrafields
     *  @param	int		$nolines		0=Default to load lines, 1=No lines
     *  @return int     				Return integer <0 if KO, 0 if not found or if two records found for same ref, Id of contract if OK
     */
    public function fetch($id, $ref = '', $ref_customer = '', $ref_supplier = '', $noextrafields = 0, $nolines = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load lines array into this->lines.
     *  This set also nbofserviceswait, nbofservicesopened, nbofservicesexpired and nbofservicesclosed
     *
     *	@param		int				$only_services			0=Default for all, 1=Force only services (depending on setup, we may also have physical products in a contract)
     *	@param		int				$loadalsotranslation	0=Default to not load translations, 1=Load also translations of product descriptions
     *  @param		int				$noextrafields			0=Default to load extrafields, 1=Do not load the extrafields of lines
     *  @return 	array|int  								Return array of contract lines
     */
    public function fetch_lines($only_services = 0, $loadalsotranslation = 0, $noextrafields = 0)
    {
    }
    /**
     *  Create a contract into database
     *
     *  @param	User	$user       User that create
     *  @return int  				Return integer <0 if KO, id of contract if OK
     */
    public function create($user)
    {
    }
    /**
     *  Delete object
     *
     *  @param	User		$user       User that deletes
     *  @return int         			Return integer < 0 if KO, > 0 if OK
     */
    public function delete($user)
    {
    }
    /**
     *  Update object into database
     *
     *  @param	User	$user        User that modifies
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 Return integer <0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     *  Ajoute une ligne de contrat en base
     *
     *  @param	string		$desc            	Description of line
     *  @param  float		$pu_ht              Unit price net
     *  @param  float	 	$qty             	Quantity
     *  @param  float		$txtva           	Vat rate
     *  @param  float		$txlocaltax1        Local tax 1 rate
     *  @param  float		$txlocaltax2        Local tax 2 rate
     *  @param  int			$fk_product      	Id produit
     *  @param  float		$remise_percent  	Percentage discount of the line
     *  @param  int			$date_start      	Date de debut prevue
     *  @param  int			$date_end        	Date de fin prevue
     *	@param	string		$price_base_type	HT or TTC
     * 	@param  float		$pu_ttc             Prix unitaire TTC
     * 	@param  int			$info_bits			Bits of type of lines
     * 	@param  int			$fk_fournprice		Fourn price id
     *  @param  int			$pa_ht				Buying price HT
     *  @param	array		$array_options		extrafields array
     * 	@param 	string		$fk_unit 			Code of the unit to use. Null to use the default one
     * 	@param 	int			$rang 				Position
     *  @return int             				Return integer <0 if KO, >0 if OK
     */
    public function addline($desc, $pu_ht, $qty, $txtva, $txlocaltax1, $txlocaltax2, $fk_product, $remise_percent, $date_start, $date_end, $price_base_type = 'HT', $pu_ttc = 0.0, $info_bits = 0, $fk_fournprice = \null, $pa_ht = 0, $array_options = array(), $fk_unit = \null, $rang = 0)
    {
    }
    /**
     *  Mets a jour une ligne de contrat
     *
     *  @param	int			$rowid            	Id de la ligne de facture
     *  @param  string		$desc             	Description de la ligne
     *  @param  float		$pu               	Prix unitaire
     *  @param  float		$qty              	Quantite
     *  @param  float		$remise_percent   	Percentage discount of the line
     *  @param  int			$date_start       	Date de debut prevue
     *  @param  int			$date_end         	Date de fin prevue
     *  @param  float		$tvatx            	Taux TVA
     *  @param  float		$localtax1tx      	Local tax 1 rate
     *  @param  float		$localtax2tx      	Local tax 2 rate
     *  @param  int|string	$date_start_real  	Date de debut reelle
     *  @param  int|string	$date_end_real    	Date de fin reelle
     *	@param	string		$price_base_type	HT or TTC
     * 	@param  int			$info_bits			Bits of type of lines
     * 	@param  int			$fk_fournprice		Fourn price id
     *  @param  int			$pa_ht				Buying price HT
     *  @param	array		$array_options		extrafields array
     * 	@param 	string		$fk_unit 			Code of the unit to use. Null to use the default one
     * 	@param 	int			$rang 				Position
     *  @return int              				Return integer <0 if KO, >0 if OK
     */
    public function updateline($rowid, $desc, $pu, $qty, $remise_percent, $date_start, $date_end, $tvatx, $localtax1tx = 0.0, $localtax2tx = 0.0, $date_start_real = '', $date_end_real = '', $price_base_type = 'HT', $info_bits = 0, $fk_fournprice = \null, $pa_ht = 0, $array_options = array(), $fk_unit = \null, $rang = 0)
    {
    }
    /**
     *  Delete a contract line
     *
     *  @param	int		$idline		Id of line to delete
     *	@param  User	$user       User that delete
     *  @return int         		>0 if OK, <0 if KO
     */
    public function deleteLine($idline, \User $user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update statut of contract according to services
     *
     *	@param	User	$user		Object user
     *	@return int     			Return integer <0 if KO, >0 if OK
     *  @deprecated					This function will never be used. Status of a contract is status of its lines.
     */
    public function update_statut($user)
    {
    }
    /**
     *  Return label of a contract status
     *
     *  @param  int		$mode       	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto, 7=Same than 6 with fixed length
     *  @return string      			Label
     */
    public function getLibStatut($mode)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a given contrat status
     *
     *  @param	int		$status      	Id status
     *  @param  int		$mode       	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label (status of services), 5=Short label + Picto, 6=Long label + Picto (status of services), 7=Same than 6 with fixed length (status of services)
     *	@return string      			Label
     */
    public function LibStatut($status, $mode)
    {
    }
    /**
     * getTooltipContentArray
     * @param array $params params to construct tooltip data
     * @since v18
     * @return array
     */
    public function getTooltipContentArray($params)
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
     *  Charge les information d'ordre info dans l'objet contrat
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
     *  @param	int		$status     Status of lines to get
     *  @return array|int       	Array of line's rowid or <0 if error
     */
    public function array_detail($status = -1)
    {
    }
    /**
     *  Return list of other contracts for the same company than current contract
     *
     *	@param	string		$option					'all' or 'others'
     *	@param	array		$status					sort contracts having these status
     *	@param  array		$product_categories		sort contracts containing these product categories
     *	@param	array		$line_status			sort contracts where lines have these status
     *  @return array|int   						Array of contracts id or <0 if error
     */
    public function getListOfContracts($option = 'all', $status = [], $product_categories = [], $line_status = [])
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @param	User	$user           Object user
     *      @param  string	$mode           "inactive" pour services a activer, "expired" pour services expires
     *      @return WorkboardResponse|int Return integer <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user, $mode)
    {
    }
    /**
     *   Load the indicators this->nb for state board
     *
     *   @return     int         Return integer <0 si ko, >0 si ok
     */
    public function loadStateBoard()
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
     *  @return int
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
     * 	Create an array of associated tickets
     *
     * 	@return array|int		Array o tickets or <0 if KO
     */
    public function getTicketsArray()
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
     *  @param   	null|array  $moreparams     Array to provide more information
     * 	@return     int         				Return integer < 0 if KO, 0 = no doc generated, > 0 if OK
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
    /**
     * Action executed by scheduler
     * CAN BE A CRON TASK
     * Loop on each contract lines and update the end of date. Do not execute the update if there is one pending invoice linked to contract.
     *
     * @param	int		$thirdparty_id			Thirdparty id
     * @param	int		$delayindaysshort 		To renew the resources x day before (positive value) or after (negative value) the end of date (default is 0)
     * @return	int								0 if OK, <>0 if KO (this function is used also by cron so only 0 is OK)
     */
    public function doAutoRenewContracts($thirdparty_id = 0, $delayindaysshort = 0)
    {
    }
    /**
     * Used to sort lines by date
     *
     * @param	Object	$a		1st element to test
     * @param	Object	$b		2nd element to test
     * @return int
     */
    public static function contractCmpDate($a, $b)
    {
    }
    /**
     *	Return clicable link of object (with eventually picto)
     *
     *	@param      string	    $option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array		$arraydata				Array of data
     *  @return		string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
    // @Todo getLibSignedStatus, LibSignedStatus
    /**
     * Set signed status
     *
     * @param  User   $user        Object user that modify
     * @param  int    $status      Newsigned  status to set (often a constant like self::STATUS_XXX)
     * @param  int    $notrigger   1 = Does not execute triggers, 0 = Execute triggers
     * @param  string $triggercode Trigger code to use
     * @return int                 0 < if KO, > 0 if OK
     */
    public function setSignedStatus(\User $user, int $status = 0, int $notrigger = 0, $triggercode = '') : int
    {
    }
}
/**
 *	Class to manage lines of contracts
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
     * @see CommonObjectLine
     */
    public $parent_element = 'contrat';
    /**
     * @see CommonObjectLine
     */
    public $fk_parent_attribute = 'fk_contrat';
    /**
     * @var string 	Name to use for 'features' parameter to check module permissions user->rights->feature with restrictedArea().
     * 				Undefined means same value than $element. Can be use to force a check on another element for example for class of line, we mention here the parent element.
     */
    public $element_for_permission = 'contrat';
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string Ref
     */
    public $ref;
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
    public $tva_tx;
    public $vat_src_code;
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
    /**
     * Unit price before taxes
     * @var float
     */
    public $subprice;
    /**
     * @var float
     * @deprecated Use $price_ht instead
     * @see $price_ht
     */
    public $price;
    /**
     * @var float price without tax
     */
    public $price_ht;
    public $total_ht;
    public $total_tva;
    public $total_localtax1;
    public $total_localtax2;
    public $total_ttc;
    /**
     * @var int 	ID
     */
    public $fk_fournprice;
    public $pa_ht;
    /**
     * @var int		Info bits
     */
    public $info_bits;
    /**
     * @var int 	ID of user that insert the service
     */
    public $fk_user_author;
    /**
     * @var int 	ID of user opening the service
     */
    public $fk_user_ouverture;
    /**
     * @var int 	ID of user closing the service
     */
    public $fk_user_cloture;
    /**
     * @var string	Comment
     */
    public $commentaire;
    /**
     * @var int line rank
     */
    public $rang = 0;
    const STATUS_INITIAL = 0;
    const STATUS_OPEN = 4;
    const STATUS_CLOSED = 5;
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => '1', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 30, 'index' => 1),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 35),
        'qty' => array('type' => 'integer', 'label' => 'Quantity', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 35, 'isameasure' => 1),
        'total_ht' => array('type' => 'integer', 'label' => 'AmountHT', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 36, 'isameasure' => 1),
        'total_tva' => array('type' => 'integer', 'label' => 'AmountVAT', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 37, 'isameasure' => 1),
        'total_ttc' => array('type' => 'integer', 'label' => 'AmountTTC', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 38, 'isameasure' => 1),
        //'datec' =>array('type'=>'datetime', 'label'=>'DateCreation', 'enabled'=>1, 'visible'=>-1, 'position'=>40),
        //'fk_soc' =>array('type'=>'integer:Societe:societe/class/societe.class.php', 'label'=>'ThirdParty', 'enabled'=>1, 'visible'=>-1, 'notnull'=>1, 'position'=>70),
        'fk_contrat' => array('type' => 'integer:Contrat:contrat/class/contrat.class.php', 'label' => 'Contract', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 70),
        'fk_product' => array('type' => 'integer:Product:product/class/product.class.php:1', 'label' => 'Product', 'enabled' => 1, 'visible' => -1, 'position' => 75),
        //'fk_user_author' =>array('type'=>'integer:User:user/class/user.class.php', 'label'=>'Fk user author', 'enabled'=>1, 'visible'=>-1, 'notnull'=>1, 'position'=>90),
        'note_private' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 105),
        'note_public' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 110),
        //'model_pdf' =>array('type'=>'varchar(255)', 'label'=>'Model pdf', 'enabled'=>1, 'visible'=>0, 'position'=>115),
        //'import_key' =>array('type'=>'varchar(14)', 'label'=>'ImportId', 'enabled'=>1, 'visible'=>-2, 'position'=>120),
        //'extraparams' =>array('type'=>'varchar(255)', 'label'=>'Extraparams', 'enabled'=>1, 'visible'=>-1, 'position'=>125),
        'fk_user_ouverture' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserStartingService', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 135),
        'fk_user_cloture' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserClosingService', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 135),
        'statut' => array('type' => 'smallint(6)', 'label' => 'Statut', 'enabled' => 1, 'visible' => -1, 'position' => 500, 'arrayofkeyval' => array(0 => 'Draft', 4 => 'Open', 5 => 'Closed')),
        'rang' => array('type' => 'integer', 'label' => 'Rank', 'enabled' => 1, 'visible' => 0, 'position' => 500, 'default' => '0'),
    );
    // END MODULEBUILDER PROPERTIES
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Return label of this contract line status
     *
     *  @param  int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string      		Label of status
     */
    public function getLibStatut($mode)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of a contract line status
     *
     *  @param	int		$status     Id status
     *  @param  int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *	@param	int		$expired	0=Not expired, 1=Expired, -1=Both or unknown
     *  @param	string	$moreatt	More attribute
     *  @param	string	$morelabel	More label
     *  @return string      		Label of status
     */
    public static function LibStatut($status, $mode, $expired = -1, $moreatt = '', $morelabel = '')
    {
    }
    /**
     * getTooltipContentArray
     * @param array $params params to construct tooltip data
     * @since v18
     * @return array
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *	Return clicable name (with picto eventually) for ContratLigne
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
     *  @param	string	$ref		Ref of contract line
     *  @return int         		Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '')
    {
    }
    /**
     *      Update database for contract line
     *
     *      @param	User	$user        	User that modify
     *      @param  int		$notrigger	    0=no, 1=yes (no update trigger)
     *      @return int         			Return integer <0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update in database the fields total_xxx of lines
     *	Used by migration process
     *
     *	@return		int		Return integer <0 if KO, >0 if OK
     */
    public function update_total()
    {
    }
    /**
     * Inserts a contrat line into database
     *
     * @param int $notrigger Set to 1 if you don't want triggers to be fired
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function insert($notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Activate a contract line
     *
     * @param   User 		$user 		Object User who activate contract
     * @param  	int 		$date 		Date real activation
     * @param  	int|string 	$date_end 	Date planned end. Use '-1' to keep it unchanged.
     * @param   string 		$comment 	A comment typed by user
     * @return 	int                    	Return integer <0 if KO, >0 if OK
     */
    public function active_line($user, $date, $date_end = '', $comment = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Close a contract line
     *
     * @param    User 	$user 			Object User who close contract
     * @param  	 int 	$date_end_real 	Date end
     * @param    string $comment 		A comment typed by user
     * @param    int	$notrigger		1=Does not execute triggers, 0=Execute triggers
     * @return int                    	Return integer <0 if KO, >0 if OK
     */
    public function close_line($user, $date_end_real, $comment = '', $notrigger = 0)
    {
    }
}