<?php

/**
 *	Class to manage third parties objects (customers, suppliers, prospects...)
 */
class Societe extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'societe';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'societe';
    /**
     * @var int Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_soc';
    public $fieldsforcombobox = 'nom,name_alias';
    /**
     * @var array	List of child tables. To test if we can delete object.
     */
    protected $childtables = array("supplier_proposal" => 'SupplierProposal', "propal" => 'Proposal', "commande" => 'Order', "facture" => 'Invoice', "facture_rec" => 'RecurringInvoiceTemplate', "contrat" => 'Contract', "fichinter" => 'Fichinter', "facture_fourn" => 'SupplierInvoice', "commande_fournisseur" => 'SupplierOrder', "projet" => 'Project', "expedition" => 'Shipment', "prelevement_lignes" => 'DirectDebitRecord');
    /**
     * @var array	List of child tables. To know object to delete on cascade.
     */
    protected $childtablesoncascade = array("societe_prices", "societe_log", "societe_address", "product_fournisseur_price", "product_customer_price_log", "product_customer_price", "socpeople", "adherent", "societe_account", "societe_rib", "societe_remise", "societe_remise_except", "societe_commerciaux", "categorie", "notify", "notify_def", "actioncomm");
    public $picto = 'company';
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
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'index' => 1, 'position' => 1, 'comment' => 'Id'),
        'nom' => array('type' => 'varchar(128)', 'label' => 'Name', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'showoncombobox' => 1, 'index' => 1, 'position' => 10, 'searchall' => 1, 'comment' => 'Reference of object'),
        'name_alias' => array('type' => 'varchar(128)', 'label' => 'Name', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'showoncombobox' => 1, 'index' => 1, 'position' => 10, 'searchall' => 1, 'comment' => 'Reference of object'),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'default' => 1, 'notnull' => 1, 'index' => 1, 'position' => 20),
        'note_public' => array('type' => 'text', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 60),
        'note_private' => array('type' => 'text', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 61),
        'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 500),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 501),
        //'date_valid'    =>array('type'=>'datetime',     'label'=>'DateCreation',     'enabled'=>1, 'visible'=>-2, 'position'=>502),
        'fk_user_creat' => array('type' => 'integer', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 510),
        'fk_user_modif' => array('type' => 'integer', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 511),
        //'fk_user_valid' =>array('type'=>'integer',      'label'=>'UserValidation',        'enabled'=>1, 'visible'=>-1, 'position'=>512),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'index' => 1, 'position' => 1000),
    );
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * Thirdparty name
     * @var string
     * @deprecated Use $name instead
     * @see $name
     */
    public $nom;
    /**
     * @var string name
     */
    public $name;
    /**
     * Alias names (commercial, trademark or alias names)
     * @var string
     */
    public $name_alias;
    public $particulier;
    /**
     * @var string Address
     */
    public $address;
    public $zip;
    public $town;
    /**
     * Thirdparty status : 0=activity ceased, 1= in activity
     * @var int
     */
    public $status = 1;
    /**
     * Id of department
     * @var int
     */
    public $state_id;
    public $state_code;
    public $state;
    /**
     * Id of region
     * @var int
     */
    public $region_code;
    public $region;
    /**
     * State code
     * @var string
     * @deprecated Use state_code instead
     * @see $state_code
     */
    public $departement_code;
    /**
     * @var string
     * @deprecated Use state instead
     * @see $state
     */
    public $departement;
    /**
     * @var string
     * @deprecated Use country instead
     * @see $country
     */
    public $pays;
    /**
     * Phone number
     * @var string
     */
    public $phone;
    /**
     * Fax number
     * @var string
     */
    public $fax;
    /**
     * Email
     * @var string
     */
    public $email;
    /**
     * Skype username
     * @var string
     */
    public $skype;
    /**
     * Twitter username
     * @var string
     */
    public $twitter;
    /**
     * Facebook username
     * @var string
     */
    public $facebook;
    /**
     * LinkedIn username
     * @var string
     */
    public $linkedin;
    /**
     * Webpage
     * @var string
     */
    public $url;
    //! barcode
    /**
     * Barcode value
     * @var string
     */
    public $barcode;
    // 6 professional id (usage depends on country)
    /**
     * Professional ID 1 (Ex: Siren in France)
     * @var string
     */
    public $idprof1;
    /**
     * Professional ID 2 (Ex: Siret in France)
     * @var string
     */
    public $idprof2;
    /**
     * Professional ID 3 (Ex: Ape in France)
     * @var string
     */
    public $idprof3;
    /**
     * Professional ID 4 (Ex: RCS in France)
     * @var string
     */
    public $idprof4;
    /**
     * Professional ID 5
     * @var string
     */
    public $idprof5;
    /**
     * Professional ID 6
     * @var string
     */
    public $idprof6;
    public $prefix_comm;
    public $tva_assuj = 1;
    /**
     * Intracommunitary VAT ID
     * @var string
     */
    public $tva_intra;
    // Local taxes
    public $localtax1_assuj;
    public $localtax1_value;
    public $localtax2_assuj;
    public $localtax2_value;
    public $managers;
    public $capital;
    public $typent_id = 0;
    public $typent_code;
    public $effectif;
    public $effectif_id = 0;
    public $forme_juridique_code;
    public $forme_juridique = 0;
    public $remise_percent;
    public $remise_supplier_percent;
    public $mode_reglement_supplier_id;
    public $cond_reglement_supplier_id;
    /**
     * @var int ID
     */
    public $fk_prospectlevel;
    public $name_bis;
    //Log data
    /**
     * Date of last update
     * @var string
     */
    public $date_modification;
    /**
     * User that made last update
     * @var string
     */
    public $user_modification;
    /**
     * Date of creation
     * @var string
     */
    public $date_creation;
    /**
     * User that created the thirdparty
     * @var User
     */
    public $user_creation;
    public $specimen;
    /**
     * 0=no customer, 1=customer, 2=prospect, 3=customer and prospect
     * @var int
     */
    public $client = 0;
    /**
     * 0=no prospect, 1=prospect
     * @var int
     */
    public $prospect = 0;
    /**
     * 0=no supplier, 1=supplier
     * @var int
     */
    public $fournisseur;
    /**
     * Client code. E.g: CU2014-003
     * @var string
     */
    public $code_client;
    /**
     * Supplier code. E.g: SU2014-003
     * @var string
     */
    public $code_fournisseur;
    /**
     * Accounting code for client
     * @var string
     */
    public $code_compta;
    /**
     * Accounting code for client
     * @var string
     */
    public $code_compta_client;
    /**
     * Accounting code for suppliers
     * @var string
     */
    public $code_compta_fournisseur;
    /**
     * @var string
     * @deprecated Note is split in public and private notes
     * @see $note_public, $note_private
     */
    public $note;
    /**
     * Private note
     * @var string
     */
    public $note_private;
    /**
     * Public note
     * @var string
     */
    public $note_public;
    //! code statut prospect
    public $stcomm_id;
    public $statut_commercial;
    /**
     * Assigned price level
     * @var int
     */
    public $price_level;
    public $outstanding_limit;
    /**
     * Min order amounts
     */
    public $order_min_amount;
    public $supplier_order_min_amount;
    /**
     * Id of sales representative to link (used for thirdparty creation). Not filled by a fetch, because we can have several sales representatives.
     * @var int
     */
    public $commercial_id;
    /**
     * Id of parent thirdparty (if one)
     * @var int
     */
    public $parent;
    /**
     * Default language code of thirdparty (en_US, ...)
     * @var string
     */
    public $default_lang;
    /**
     * @var string Ref
     */
    public $ref;
    public $ref_int;
    /**
     * External user reference.
     * This is to allow external systems to store their id and make self-developed synchronizing functions easier to
     * build.
     * @var string
     */
    public $ref_ext;
    /**
     * Import key.
     * Set when the thirdparty has been created through an import process. This is to relate those created thirdparties
     * to an import process
     * @var string
     */
    public $import_key;
    /**
     * Supplier WebServices URL
     * @var string
     */
    public $webservices_url;
    /**
     * Supplier WebServices Key
     * @var string
     */
    public $webservices_key;
    public $logo;
    public $logo_small;
    public $logo_mini;
    public $array_options;
    // Incoterms
    /**
     * @var int ID
     */
    public $fk_incoterms;
    public $location_incoterms;
    public $libelle_incoterms;
    //Used into tooltip
    // Multicurrency
    /**
     * @var int ID
     */
    public $fk_multicurrency;
    public $multicurrency_code;
    // END MODULEBUILDER PROPERTIES
    /**
     *    Constructor
     *
     *    @param	DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *    Create third party in database.
     *    $this->code_client = -1 and $this->code_fournisseur = -1 means automatic assignement.
     *
     *    @param	User	$user       Object of user that ask creation
     *    @return   int         		>= 0 if OK, < 0 if KO
     */
    public function create(\User $user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Create a contact/address from thirdparty
     *
     * @param 	User	$user		Object user
     * @return 	int					<0 if KO, >0 if OK
     */
    public function create_individual(\User $user)
    {
    }
    /**
     *    Check properties of third party are ok (like name, third party codes, ...)
     *    Used before an add or update.
     *
     *    @return     int		0 if OK, <0 if KO
     */
    public function verify()
    {
    }
    /**
     *      Update parameters of third party
     *
     *      @param	int		$id              			Id of company (deprecated, use 0 here and call update on an object loaded by a fetch)
     *      @param  User	$user            			Utilisateur qui demande la mise a jour
     *      @param  int		$call_trigger    			0=no, 1=yes
     *		@param	int		$allowmodcodeclient			Inclut modif code client et code compta
     *		@param	int		$allowmodcodefournisseur	Inclut modif code fournisseur et code compta fournisseur
     *		@param	string	$action						'add' or 'update' or 'merge'
     *		@param	int		$nosyncmember				Do not synchronize info of linked member
     *      @return int  			           			<0 if KO, >=0 if OK
     */
    public function update($id, $user = '', $call_trigger = 1, $allowmodcodeclient = 0, $allowmodcodefournisseur = 0, $action = 'update', $nosyncmember = 1)
    {
    }
    /**
     *    Load a third party from database into memory
     *
     *    @param	int		$rowid			Id of third party to load
     *    @param    string	$ref			Reference of third party, name (Warning, this can return several records)
     *    @param    string	$ref_ext       	External reference of third party (Warning, this information is a free field not provided by Dolibarr)
     *    @param    string	$ref_int       	Internal reference of third party (not used by dolibarr)
     *    @param    string	$idprof1		Prof id 1 of third party (Warning, this can return several records)
     *    @param    string	$idprof2		Prof id 2 of third party (Warning, this can return several records)
     *    @param    string	$idprof3		Prof id 3 of third party (Warning, this can return several records)
     *    @param    string	$idprof4		Prof id 4 of third party (Warning, this can return several records)
     *    @param    string	$idprof5		Prof id 5 of third party (Warning, this can return several records)
     *    @param    string	$idprof6		Prof id 6 of third party (Warning, this can return several records)
     *    @param    string	$email   		Email of third party (Warning, this can return several records)
     *    @param    string	$ref_alias 		Name_alias of third party (Warning, this can return several records)
     *    @return   int						>0 if OK, <0 if KO or if two records found for same ref or idprof, 0 if not found.
     */
    public function fetch($rowid, $ref = '', $ref_ext = '', $ref_int = '', $idprof1 = '', $idprof2 = '', $idprof3 = '', $idprof4 = '', $idprof5 = '', $idprof6 = '', $email = '', $ref_alias = '')
    {
    }
    /**
     *    Delete a third party from database and all its dependencies (contacts, rib...)
     *
     *    @param	int		$id             Id of third party to delete
     *    @param    User    $fuser          User who ask to delete thirdparty
     *    @param    int		$call_trigger   0=No, 1=yes
     *    @return	int						<0 if KO, 0 if nothing done, >0 if OK
     */
    public function delete($id, \User $fuser = \null, $call_trigger = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Define third party as a customer
     *
     *	@return		int		<0 if KO, >0 if OK
     */
    public function set_as_client()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Definit la societe comme un client
     *
     *  @param	float	$remise		Valeur en % de la remise
     *  @param  string	$note		Note/Motif de modification de la remise
     *  @param  User	$user		Utilisateur qui definie la remise
     *	@return	int					<0 if KO, >0 if OK
     */
    public function set_remise_client($remise, $note, \User $user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Definit la societe comme un client
     *
     *  @param	float	$remise		Valeur en % de la remise
     *  @param  string	$note		Note/Motif de modification de la remise
     *  @param  User	$user		Utilisateur qui definie la remise
     *	@return	int					<0 if KO, >0 if OK
     */
    public function set_remise_supplier($remise, $note, \User $user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    	Add a discount for third party
     *
     *    	@param	float	$remise     	Amount of discount
     *    	@param  User	$user       	User adding discount
     *    	@param  string	$desc			Reason of discount
     *      @param  float	$tva_tx     	VAT rate
     *      @param	int		$discount_type	0 => customer discount, 1 => supplier discount
     *		@return	int					<0 if KO, id of discount record if OK
     */
    public function set_remise_except($remise, \User $user, $desc, $tva_tx = 0, $discount_type = 0)
    {
    }
    /**
     *  Renvoie montant TTC des reductions/avoirs en cours disponibles de la societe
     *
     *	@param	User	$user			Filtre sur un user auteur des remises
     * 	@param	string	$filter			Filtre autre
     * 	@param	integer	$maxvalue		Filter on max value for discount
     * 	@param	int		$discount_type	0 => customer discount, 1 => supplier discount
     *	@return	int					<0 if KO, Credit note amount otherwise
     */
    public function getAvailableDiscounts($user = '', $filter = '', $maxvalue = 0, $discount_type = 0)
    {
    }
    /**
     *  Return array of sales representatives
     *
     *  @param	User	$user		Object user
     *  @param	int		$mode		0=Array with properties, 1=Array of id.
     *  @return array       		Array of sales representatives of third party
     */
    public function getSalesRepresentatives(\User $user, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set the price level
     *
     * @param 	int		$price_level	Level of price
     * @param 	User	$user			Use making change
     * @return	int						<0 if KO, >0 if OK
     */
    public function set_price_level($price_level, \User $user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Add link to sales representative
     *
     *	@param	User	$user		Object user
     *	@param	int		$commid		Id of user
     *	@return	int					<=0 if KO, >0 if OK
     */
    public function add_commercial(\User $user, $commid)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Add link to sales representative
     *
     *	@param	User	$user		Object user
     *	@param	int		$commid		Id of user
     *	@return	void
     */
    public function del_commercial(\User $user, $commid)
    {
    }
    /**
     *    	Return a link on thirdparty (with picto)
     *
     *		@param	int		$withpicto		          Add picto into link (0=No picto, 1=Include picto with link, 2=Picto only)
     *		@param	string	$option			          Target of link ('', 'customer', 'prospect', 'supplier', 'project')
     *		@param	int		$maxlen			          Max length of name
     *      @param	int  	$notooltip		          1=Disable tooltip
     *      @param  int     $save_lastsearch_value    -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *		@return	string					          String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $maxlen = 0, $notooltip = 0, $save_lastsearch_value = -1)
    {
    }
    /**
     *    Return label of status (activity, closed)
     *
     *    @param	int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *    @return   string        		Libelle
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi le libelle d'un statut donne
     *
     *  @param	int		$statut         Id statut
     *  @param	int		$mode           0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string          		Libelle du statut
     */
    public function LibStatut($statut, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of contacts emails existing for third party
     *
     *	  @param	  int		$addthirdparty		1=Add also a record for thirdparty email
     *    @return     array       					Array of contacts emails
     */
    public function thirdparty_and_contact_email_array($addthirdparty = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return list of contacts mobile phone existing for third party
     *
     *    @return     array       Array of contacts emails
     */
    public function thirdparty_and_contact_phone_array()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of contacts emails or mobile existing for third party
     *
     *  @param	string	$mode       		'email' or 'mobile'
     * 	@param	int		$hidedisabled		1=Hide contact if disabled
     *  @return array       				Array of contacts emails or mobile. Example: array(id=>'Name <email>')
     */
    public function contact_property_array($mode = 'email', $hidedisabled = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Renvoie la liste des contacts de cette societe
     *
     *    @return     array      tableau des contacts
     */
    public function contact_array()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Renvoie la liste des contacts de cette societe
     *
     *    @return    array    $contacts    tableau des contacts
     */
    public function contact_array_objects()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return property of contact from its id
     *
     *  @param	int		$rowid      id of contact
     *  @param  string	$mode       'email' or 'mobile'
     *  @return string  			Email of contact with format: "Full name <email>"
     */
    public function contact_get_property($rowid, $mode)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return bank number property of thirdparty (label or rum)
     *
     *	@param	string	$mode	'label' or 'rum' or 'format'
     *  @return	string			Bank number
     */
    public function display_rib($mode = 'label')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return Array of RIB
     *
     * @return     array|int        0 if KO, Array of CompanyBanckAccount if OK
     */
    public function get_all_rib()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Attribut un code client a partir du module de controle des codes.
     *  Return value is stored into this->code_client
     *
     *	@param	Societe		$objsoc		Object thirdparty
     *	@param	int			$type		Should be 0 to say customer
     *  @return void
     */
    public function get_codeclient($objsoc = 0, $type = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Attribut un code fournisseur a partir du module de controle des codes.
     *  Return value is stored into this->code_fournisseur
     *
     *	@param	Societe		$objsoc		Object thirdparty
     *	@param	int			$type		Should be 1 to say supplier
     *  @return void
     */
    public function get_codefournisseur($objsoc = 0, $type = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Verifie si un code client est modifiable en fonction des parametres
     *    du module de controle des codes.
     *
     *    @return     int		0=No, 1=Yes
     */
    public function codeclient_modifiable()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Verifie si un code fournisseur est modifiable dans configuration du module de controle des codes
     *
     *    @return     int		0=No, 1=Yes
     */
    public function codefournisseur_modifiable()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Check customer code
     *
     *  @return     int				0 if OK
     * 								-1 ErrorBadCustomerCodeSyntax
     * 								-2 ErrorCustomerCodeRequired
     * 								-3 ErrorCustomerCodeAlreadyUsed
     * 								-4 ErrorPrefixRequired
     */
    public function check_codeclient()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Check supplier code
     *
     *    @return     int		0 if OK
     * 							-1 ErrorBadCustomerCodeSyntax
     * 							-2 ErrorCustomerCodeRequired
     * 							-3 ErrorCustomerCodeAlreadyUsed
     * 							-4 ErrorPrefixRequired
     */
    public function check_codefournisseur()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    	Renvoie un code compta, suivant le module de code compta.
     *      Peut etre identique a celui saisit ou genere automatiquement.
     *      A ce jour seule la generation automatique est implementee
     *
     *    	@param	string	$type		Type of thirdparty ('customer' or 'supplier')
     *		@return	string				Code compta si ok, 0 si aucun, <0 si ko
     */
    public function get_codecompta($type)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Define parent commany of current company
     *
     *    @param	int		$id     Id of thirdparty to set or '' to remove
     *    @return	int     		<0 if KO, >0 if OK
     */
    public function set_parent($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Returns if a profid sould be verified
     *
     *  @param	int		$idprof		1,2,3,4,5,6 (Exemple: 1=siren,2=siret,3=naf,4=rcs/rm,5=idprof5,6=idprof6)
     *  @return boolean         	true , false
     */
    public function id_prof_verifiable($idprof)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Verify if a profid exists into database for others thirds
     *
     *    @param	string	$idprof		'idprof1','idprof2','idprof3','idprof4','idprof5','idprof6','email' (Example: idprof1=siren, idprof2=siret, idprof3=naf, idprof4=rcs/rm)
     *    @param	string	$value		Value of profid
     *    @param	int		$socid		Id of thirdparty to exclude (if update)
     *    @return   boolean				True if exists, False if not
     */
    public function id_prof_exists($idprof, $value, $socid = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Verifie la validite d'un identifiant professionnel en fonction du pays de la societe (siren, siret, ...)
     *
     *  @param	int			$idprof         1,2,3,4 (Exemple: 1=siren,2=siret,3=naf,4=rcs/rm)
     *  @param  Societe		$soc            Objet societe
     *  @return int             			<=0 if KO, >0 if OK
     *  TODO better to have this in a lib than into a business class
     */
    public function id_prof_check($idprof, $soc)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *   Return an url to check online a professional id or empty string
     *
     *   @param		int		$idprof         1,2,3,4 (Example: 1=siren,2=siret,3=naf,4=rcs/rm)
     *   @param 	Societe	$thirdparty     Object thirdparty
     *   @return	string          		Url or empty string if no URL known
     *   TODO better in a lib than into business class
     */
    public function id_prof_url($idprof, $thirdparty)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *   Indique si la societe a des projets
     *
     *   @return     bool	   true si la societe a des projets, false sinon
     */
    public function has_projects()
    {
    }
    /**
     *  Load information for tab info
     *
     *  @param  int		$id     Id of thirdparty to load
     *  @return	void
     */
    public function info($id)
    {
    }
    /**
     *  Return if third party is a company (Business) or an end user (Consumer)
     *
     *  @return    boolean     true=is a company, false=a and user
     */
    public function isACompany()
    {
    }
    /**
     *  Return if a company is inside the EEC (European Economic Community)
     *
     *  @return     boolean		true = country inside EEC, false = country outside EEC
     */
    public function isInEEC()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Charge la liste des categories fournisseurs
     *
     *  @return    int      0 if success, <> 0 if error
     */
    public function LoadSupplierCateg()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Insert link supplier - category
     *
     *	@param	int		$categorie_id		Id of category
     *  @return int      					0 if success, <> 0 if error
     */
    public function AddFournisseurInCategory($categorie_id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Create a third party into database from a member object
     *
     *  @param	Adherent	$member			Object member
     * 	@param	string		$socname		Name of third party to force
     *	@param	string		$socalias		Alias name of third party to force
     *  @param	string		$customercode	Customer code
     *  @return int							<0 if KO, id of created account if OK
     */
    public function create_from_member(\Adherent $member, $socname = '', $socalias = '', $customercode = '')
    {
    }
    /**
     * 	Set properties with value into $conf
     *
     * 	@param	Conf	$conf		Conf object (possibility to use another entity)
     * 	@return	void
     */
    public function setMysoc(\Conf $conf)
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
     *  Check if we must use localtax feature or not according to country (country of $mysoc in most cases).
     *
     *	@param		int		$localTaxNum	To get info for only localtax1 or localtax2
     *  @return		boolean					true or false
     */
    public function useLocalTax($localTaxNum = 0)
    {
    }
    /**
     *  Check if we must use NPR Vat (french stupid rule) or not according to country (country of $mysoc in most cases).
     *
     *  @return		boolean					true or false
     */
    public function useNPR()
    {
    }
    /**
     *  Check if we must use revenue stamps feature or not according to country (country of $mysocin most cases).
     *
     *  @return		boolean			true or false
     */
    public function useRevenueStamp()
    {
    }
    /**
     *	Return prostect level
     *
     *  @return     string        Libelle
     */
    public function getLibProspLevel()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of prospect level
     *
     *  @param	int		$fk_prospectlevel   	Prospect level
     *  @return string        					label of level
     */
    public function LibProspLevel($fk_prospectlevel)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Set prospect level
     *
     *  @param  User	$user		Utilisateur qui definie la remise
     *	@return	int					<0 if KO, >0 if OK
     * @deprecated Use update function instead
     */
    public function set_prospect_level(\User $user)
    {
    }
    /**
     *  Return status of prospect
     *
     *  @param	int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long
     *  @param	string	$label		Label to use for status for added status
     *  @return string        		Libelle
     */
    public function getLibProspCommStatut($mode = 0, $label = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of a given status
     *
     *  @param	int|string	$statut        	Id or code for prospection status
     *  @param  int			$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *  @param	string		$label			Label to use for status for added status
     *  @return string       	 			Libelle du statut
     */
    public function LibProspCommStatut($statut, $mode = 0, $label = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Set outstanding value
     *
     *  @param  User	$user		User making change
     *	@return	int					<0 if KO, >0 if OK
     * @deprecated Use update function instead
     */
    public function set_OutstandingBill(\User $user)
    {
    }
    /**
     *  Return amount of order not paid and total
     *
     *  @param     string      $mode    'customer' or 'supplier'
     *  @return    array				array('opened'=>Amount, 'total'=>Total amount)
     */
    public function getOutstandingProposals($mode = 'customer')
    {
    }
    /**
     *  Return amount of order not paid and total
     *
     *  @param     string      $mode    'customer' or 'supplier'
     *  @return		array				array('opened'=>Amount, 'total'=>Total amount)
     */
    public function getOutstandingOrders($mode = 'customer')
    {
    }
    /**
     *  Return amount of bill not paid and total
     *
     *  @param     string      $mode    'customer' or 'supplier'
     *  @return		array				array('opened'=>Amount, 'total'=>Total amount)
     */
    public function getOutstandingBills($mode = 'customer')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return amount of bill not paid
     *
     *  @return		int				Amount in debt for thirdparty
     *  @deprecated
     *  @see getOutstandingBills()
     */
    public function get_OutstandingBill()
    {
    }
    /**
     * Return label of status customer is prospect/customer
     *
     * @return   string        	Label
     */
    public function getLibCustProspStatut()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi le libelle d'un statut donne
     *
     *  @param	int		$statut         Id statut
     *  @return	string          		Libelle du statut
     */
    public function LibCustProspStatut($statut)
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *	@param	string		$modele			Generator to use. Caller must set it to obj->modelpdf or GETPOST('modelpdf') for example.
     *	@param	Translate	$outputlangs	objet lang a utiliser pour traduction
     *  @param  int			$hidedetails    Hide details of lines
     *  @param  int			$hidedesc       Hide description
     *  @param  int			$hideref        Hide ref
     *  @param  null|array  $moreparams     Array to provide more information
     *	@return int        					<0 if KO, >0 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
    /**
     * Sets object to supplied categories.
     *
     * Deletes object from existing categories not supplied.
     * Adds it to non existing supplied categories.
     * Existing categories are left untouch.
     *
     * @param 	int[]|int 	$categories 	Category ID or array of Categories IDs
     * @param 	string 		$type 			Category type ('customer' or 'supplier')
     * @return	int							<0 if KO, >0 if OK
     */
    public function setCategories($categories, $type)
    {
    }
    /**
     * Sets sales representatives of the thirdparty
     *
     * @param 	int[]|int 	$salesrep	 	User ID or array of user IDs
     * @param   bool        $onlyAdd        Only add (no delete before)
     * @return	int							<0 if KO, >0 if OK
     */
    public function setSalesRep($salesrep, $onlyAdd = \false)
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     * It must be used within a transaction to avoid trouble
     *
     * @param 	DoliDB 	$db 		Database handler
     * @param 	int 	$origin_id 	Old thirdparty id (will be removed)
     * @param 	int 	$dest_id 	New thirdparty id
     * @return 	bool				True if success, False if error
     */
    public static function replaceThirdparty(\DoliDB $db, $origin_id, $dest_id)
    {
    }
}