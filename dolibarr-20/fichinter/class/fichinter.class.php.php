<?php

/**
 *	Class to manage interventions
 */
class Fichinter extends \CommonObject
{
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'enabled' => 'isModEnabled("societe")', 'visible' => -1, 'notnull' => 1, 'position' => 15), 'fk_projet' => array('type' => 'integer:Project:projet/class/project.class.php:1:(fk_statut:=:1)', 'label' => 'Fk projet', 'enabled' => 'isModEnabled("project")', 'visible' => -1, 'position' => 20), 'fk_contrat' => array('type' => 'integer', 'label' => 'Fk contrat', 'enabled' => '$conf->contrat->enabled', 'visible' => -1, 'position' => 25), 'ref' => array('type' => 'varchar(30)', 'label' => 'Ref', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'showoncombobox' => 1, 'position' => 30), 'ref_ext' => array('type' => 'varchar(255)', 'label' => 'Ref ext', 'enabled' => 1, 'visible' => 0, 'position' => 35), 'ref_client' => array('type' => 'varchar(255)', 'label' => 'RefCustomer', 'enabled' => 1, 'visible' => -1, 'position' => 36), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => '1', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 40, 'index' => 1), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 45), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 50), 'date_valid' => array('type' => 'datetime', 'label' => 'DateValidation', 'enabled' => 1, 'visible' => -1, 'position' => 55), 'datei' => array('type' => 'date', 'label' => 'Datei', 'enabled' => 1, 'visible' => -1, 'position' => 60), 'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Fk user author', 'enabled' => 1, 'visible' => -1, 'position' => 65), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 70), 'fk_user_valid' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserValidation', 'enabled' => 1, 'visible' => -1, 'position' => 75), 'dateo' => array('type' => 'date', 'label' => 'Dateo', 'enabled' => 1, 'visible' => -1, 'position' => 85), 'datee' => array('type' => 'date', 'label' => 'Datee', 'enabled' => 1, 'visible' => -1, 'position' => 90), 'datet' => array('type' => 'date', 'label' => 'Datet', 'enabled' => 1, 'visible' => -1, 'position' => 95), 'duree' => array('type' => 'double', 'label' => 'Duree', 'enabled' => 1, 'visible' => -1, 'position' => 100), 'signed_status' => array('type' => 'smallint(6)', 'label' => 'SignedStatus', 'enabled' => 1, 'visible' => -1, 'position' => 101, 'arrayofkeyval' => array(0 => 'NoSignature', 1 => 'SignedSender', 2 => 'SignedReceiver', 9 => 'SignedAll')), 'description' => array('type' => 'html', 'label' => 'Description', 'enabled' => 1, 'visible' => -1, 'position' => 105, 'showoncombobox' => 2), 'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 110), 'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 115), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 120), 'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'Last main doc', 'enabled' => 1, 'visible' => -1, 'position' => 125), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 130), 'extraparams' => array('type' => 'varchar(255)', 'label' => 'Extraparams', 'enabled' => 1, 'visible' => -1, 'position' => 135), 'fk_statut' => array('type' => 'integer', 'label' => 'Fk statut', 'enabled' => 1, 'visible' => -1, 'position' => 500));
    /**
     * @var string ID to identify managed object
     */
    public $element = 'fichinter';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'fichinter';
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_fichinter';
    /**
     * @var string    Name of subtable line
     */
    public $table_element_line = 'fichinterdet';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'intervention';
    /**
     * {@inheritdoc}
     */
    protected $table_ref_field = 'ref';
    /**
     * @var int Thirdparty Id
     */
    public $socid;
    public $author;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    public $datev;
    public $dateo;
    public $datee;
    public $datet;
    /**
     * Date modification record (tms)
     *
     * @var integer
     */
    public $datem;
    /**
     * @var int duration
     */
    public $duration;
    /**
     * @var int status
     */
    public $statut = 0;
    // 0=draft, 1=validated, 2=invoiced, 3=Terminate
    /**
     * Signed Status of the intervention (0=NoSignature, 1=SignedBySender, 2=SignedByReceiver, 9=SignedByAll)
     * @var int
     */
    public $signed_status = 0;
    /**
     * @var string description
     */
    public $description;
    /**
     * @var int Contract ID
     */
    public $fk_contrat = 0;
    /**
     * @var int Project ID
     */
    public $fk_project = 0;
    /**
     * Customer Ref
     * @var string
     */
    public $ref_client;
    /**
     * @var array extraparams
     */
    public $extraparams = array();
    /**
     * @var FichinterLigne[] lines
     */
    public $lines = array();
    /**
     * Draft status
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated status
     */
    const STATUS_VALIDATED = 1;
    /**
     * Billed
     */
    const STATUS_BILLED = 2;
    /**
     * Closed
     */
    const STATUS_CLOSED = 3;
    /**
     * No signature
     */
    const STATUS_NO_SIGNATURE = 0;
    /**
     * Signed by sender
     */
    const STATUS_SIGNED_SENDER = 1;
    /**
     * Signed by receiver
     */
    const STATUS_SIGNED_RECEIVER = 2;
    /**
     * Signed by all
     */
    const STATUS_SIGNED_ALL = 9;
    // To handle future kind of signature (ex: tripartite contract)
    /**
     * Date delivery
     * @var string|int		Delivery int
     */
    public $date_delivery;
    /**
     * Author Id
     * @var int
     */
    public $user_author_id;
    /**
     *	Constructor
     *
     *  @param	DoliDB	$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Load indicators into this->nb for board
     *
     *  @return     int         Return integer <0 if KO, >0 if OK
     */
    public function loadStateBoard()
    {
    }
    /**
     *	Create an intervention into data base
     *
     *  @param		User	$user 		Object user that make creation
     *	@param		int		$notrigger	Disable all triggers
     *	@return		int		Return integer <0 if KO, >0 if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *	Update an intervention
     *
     *	@param		User	$user 		Object user that make creation
     *	@param		int		$notrigger	Disable all triggers
     *	@return		int		Return integer <0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     *	Fetch a intervention
     *
     *	@param		int		$rowid		Id of intervention
     *	@param		string	$ref		Ref of intervention
     *	@return		int					Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid, $ref = '')
    {
    }
    /**
     *	Set status to draft
     *
     *	@param		User	$user	User that set draft
     *	@return		int			    Return integer <0 if KO, >0 if OK
     */
    public function setDraft($user)
    {
    }
    /**
     *	Validate a intervention
     *
     *	@param		User		$user		User that validate
     *  @param		int			$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function setValid($user, $notrigger = 0)
    {
    }
    /**
     *  Close intervention
     *
     * 	@param      User	$user       Object user that close
     *  @param		int		$notrigger	1=Does not execute triggers, 0=Execute triggers
     *	@return		int					Return integer <0 if KO, >0 if OK
     */
    public function setClose($user, $notrigger = 0)
    {
    }
    /**
     *	Returns amount based on user thm
     *
     *	@return     float 		Amount
     */
    public function getAmount()
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *  @param      string                  $modele         Force model to use ('' to not force)
     *  @param      Translate               $outputlangs    Object langs to use for output
     *  @param      int                     $hidedetails    Hide details of lines
     *  @param      int                     $hidedesc       Hide description
     *  @param      int                     $hideref        Hide ref
     *  @param   null|array  $moreparams     Array to provide more information
     *  @return     int                                     0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
    /**
     *	Returns the label status
     *
     *	@param      int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *	@return     string      		Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Returns the label of a status
     *
     *	@param      int		$status     Id status
     *	@param      int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *	@return     string      		Label
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     * getTooltipContentArray
     *
     * @param array $params ex option, infologin
     * @since v18
     * @return array
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *	Return clicable name (with picto eventually)
     *
     *	@param		int		$withpicto					0=_No picto, 1=Includes the picto in the linkn, 2=Picto only
     *	@param		string	$option						Options
     *  @param	    int   	$notooltip					1=Disable tooltip
     *  @param      int     $save_lastsearch_value		-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param  	string  $morecss                    Add more css on link
     *	@return		string								String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $save_lastsearch_value = -1, $morecss = '')
    {
    }
    /**
     *	Returns the next non used reference of intervention
     *	depending on the module numbering assets within FICHEINTER_ADDON
     *
     *	@param	    Societe		$soc		Thirdparty object
     *	@return     string					Free reference for intervention
     */
    public function getNextNumRef($soc)
    {
    }
    /**
     * 	Load information on object
     *
     *	@param	int		$id      Id of object
     *	@return	void
     */
    public function info($id)
    {
    }
    /**
     *	Delete intervetnion
     *
     *	@param      User	$user			Object user who delete
     *	@param		int		$notrigger		Disable trigger
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Defines a delivery date of intervention
     *
     *  @param      User	$user				Object user who define
     *  @param      integer	$date_delivery   	date of delivery
     *  @return     int							Return integer <0 if KO, >0 if OK
     */
    public function set_date_delivery($user, $date_delivery)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Define the label of the intervention
     *
     *	@param      User	$user			Object user who modify
     *	@param      string	$description    description
     *	@return     int						Return integer <0 if KO, >0 if OK
     */
    public function set_description($user, $description)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Link intervention to a contract
     *
     *	@param      User	$user			Object user who modify
     *	@param      int		$contractid		Description
     *	@return     int						Return integer <0 if KO, >0 if OK
     */
    public function set_contrat($user, $contractid)
    {
    }
    /**
     *	Load an object from its id and create a new one in database
     *
     *  @param	    User	$user		    User making the clone
     *	@param		int		$socid			Id of thirdparty
     *	@return		int						New id of clone
     */
    public function createFromClone(\User $user, $socid = 0)
    {
    }
    /**
     *	Adding a line of intervention into data base
     *
     *  @param      user	$user					User that do the action
     *	@param    	int		$fichinterid			Id of intervention
     *	@param    	string	$desc					Line description
     *	@param      integer	$date_intervention  	Intervention date
     *	@param      int		$duration            	Intervention duration
     *  @param		array	$array_options			Array option
     *	@return    	int             				>0 if ok, <0 if ko
     */
    public function addline($user, $fichinterid, $desc, $date_intervention, $duration, $array_options = [])
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Load array lines ->lines
     *
     *	@return		int		Return integer <0 if KO, >0 if OK
     */
    public function fetch_lines()
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
     * Set customer reference number
     *
     *  @param      User	$user			Object user that modify
     *  @param      string	$ref_client		Customer reference
     *  @param  	int		$notrigger		1=Does not execute triggers, 0= execute triggers
     *  @return     int						Return integer <0 if ko, >0 if ok
     */
    public function setRefClient($user, $ref_client, $notrigger = 0)
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
 *	Class to manage intervention lines
 */
class FichinterLigne extends \CommonObjectLine
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    // From llx_fichinterdet
    /**
     * @var int ID
     */
    public $fk_fichinter;
    public $desc;
    // Description ligne
    /**
     * @var int Date of intervention
     */
    public $date;
    // Date intervention
    /**
     * @var int Date of intervention
     * @deprecated
     */
    public $datei;
    // Date intervention
    public $duration;
    // Duration of intervention
    public $rang = 0;
    public $tva_tx;
    /**
     * Unit price before taxes
     * @var float
     */
    public $subprice;
    /**
     * @var string ID to identify managed object
     */
    public $element = 'fichinterdet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'fichinterdet';
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_fichinter';
    /**
     *  Constructor
     *
     *  @param  DoliDB  $db     Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Retrieve the line of intervention
     *
     *	@param  int		$rowid		Line id
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     *	Insert the line into database
     *
     *	@param		User	$user 		Object user that make creation
     *	@param		int		$notrigger	Disable all triggers
     *	@return		int		Return integer <0 if ko, >0 if ok
     */
    public function insert($user, $notrigger = 0)
    {
    }
    /**
     *	Update intervention into database
     *
     *	@param		User	$user 		Object user that make creation
     *	@param		int		$notrigger	Disable all triggers
     *	@return		int		Return integer <0 if ko, >0 if ok
     */
    public function update($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update total duration into llx_fichinter
     *
     *	@return		int		Return integer <0 si ko, >0 si ok
     */
    public function update_total()
    {
    }
    /**
     *	Delete a intervention line
     *
     *	@param		User	$user 		Object user that make creation
     *	@param		int		$notrigger	Disable all triggers
     *	@return     int		>0 if ok, <0 if ko
     */
    public function deleteLine($user, $notrigger = 0)
    {
    }
}