<?php

/**
 * Class to manage Trips and Expenses
 */
class ExpenseReport extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'expensereport';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'expensereport';
    /**
     * @var string table element line name
     */
    public $table_element_line = 'expensereport_det';
    /**
     * @var string Fieldname with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_expensereport';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'trip';
    public $lines = array();
    public $date_debut;
    public $date_fin;
    /**
     * 0=draft, 2=validated (attente approb), 4=canceled, 5=approved, 6=paid, 99=denied
     *
     * @var int		Status
     */
    public $status;
    /**
     * 0=draft, 2=validated (attente approb), 4=canceled, 5=approved, 6=paid, 99=denied
     *
     * @var int		Status
     * @deprecated
     */
    public $fk_statut;
    public $fk_c_paiement;
    public $paid;
    public $user_author_infos;
    public $user_validator_infos;
    public $rule_warning_message;
    // ACTIONS
    // Create
    public $date_create;
    public $fk_user_author;
    // Note fk_user_author is not the 'author' but the guy the expense report is for.
    // Update
    public $date_modif;
    public $fk_user_modif;
    // Refus
    public $date_refuse;
    public $detail_refuse;
    public $fk_user_refuse;
    // Annulation
    public $date_cancel;
    public $detail_cancel;
    public $fk_user_cancel;
    public $fk_user_validator;
    // User that is defined to approve
    // Validation
    /* @deprecated */
    public $datevalid;
    public $date_valid;
    // User making validation
    public $fk_user_valid;
    public $user_valid_infos;
    // Approve
    public $date_approve;
    public $fk_user_approve;
    // User that has approved
    // Paiement
    public $user_paid_infos;
    public $localtax1;
    // for backward compatibility (real field should be total_localtax1 defined into CommonObject)
    public $localtax2;
    // for backward compatibility (real field should be total_localtax2 defined into CommonObject)
    public $statuts = array();
    public $statuts_short = array();
    public $statuts_logo;
    /**
     * Draft status
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated (need to be paid)
     */
    const STATUS_VALIDATED = 2;
    /**
     * Classified canceled
     */
    const STATUS_CANCELED = 4;
    /**
     * Classified approved
     */
    const STATUS_APPROVED = 5;
    /**
     * Classified refused
     */
    const STATUS_REFUSED = 99;
    /**
     * Classified paid.
     */
    const STATUS_CLOSED = 6;
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'ID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10), 'ref' => array('type' => 'varchar(50)', 'label' => 'Ref', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'showoncombobox' => 1, 'position' => 15), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => 1, 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 20), 'ref_number_int' => array('type' => 'integer', 'label' => 'Ref number int', 'enabled' => 1, 'visible' => -1, 'position' => 25), 'ref_ext' => array('type' => 'integer', 'label' => 'Ref ext', 'enabled' => 1, 'visible' => -1, 'position' => 30), 'total_ht' => array('type' => 'double(24,8)', 'label' => 'Total ht', 'enabled' => 1, 'visible' => -1, 'position' => 35), 'total_tva' => array('type' => 'double(24,8)', 'label' => 'Total tva', 'enabled' => 1, 'visible' => -1, 'position' => 40), 'localtax1' => array('type' => 'double(24,8)', 'label' => 'Localtax1', 'enabled' => 1, 'visible' => -1, 'position' => 45), 'localtax2' => array('type' => 'double(24,8)', 'label' => 'Localtax2', 'enabled' => 1, 'visible' => -1, 'position' => 50), 'total_ttc' => array('type' => 'double(24,8)', 'label' => 'Total ttc', 'enabled' => 1, 'visible' => -1, 'position' => 55), 'date_debut' => array('type' => 'date', 'label' => 'Date debut', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 60), 'date_fin' => array('type' => 'date', 'label' => 'Date fin', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 65), 'date_valid' => array('type' => 'datetime', 'label' => 'Date valid', 'enabled' => 1, 'visible' => -1, 'position' => 75), 'date_approve' => array('type' => 'datetime', 'label' => 'Date approve', 'enabled' => 1, 'visible' => -1, 'position' => 80), 'date_refuse' => array('type' => 'datetime', 'label' => 'Date refuse', 'enabled' => 1, 'visible' => -1, 'position' => 85), 'date_cancel' => array('type' => 'datetime', 'label' => 'Date cancel', 'enabled' => 1, 'visible' => -1, 'position' => 90), 'fk_user_author' => array('type' => 'integer', 'label' => 'Fk user author', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 100), 'fk_user_modif' => array('type' => 'integer', 'label' => 'Fk user modif', 'enabled' => 1, 'visible' => -1, 'position' => 105), 'fk_user_valid' => array('type' => 'integer', 'label' => 'Fk user valid', 'enabled' => 1, 'visible' => -1, 'position' => 110), 'fk_user_validator' => array('type' => 'integer', 'label' => 'Fk user validator', 'enabled' => 1, 'visible' => -1, 'position' => 115), 'fk_user_approve' => array('type' => 'integer', 'label' => 'Fk user approve', 'enabled' => 1, 'visible' => -1, 'position' => 120), 'fk_user_refuse' => array('type' => 'integer', 'label' => 'Fk user refuse', 'enabled' => 1, 'visible' => -1, 'position' => 125), 'fk_user_cancel' => array('type' => 'integer', 'label' => 'Fk user cancel', 'enabled' => 1, 'visible' => -1, 'position' => 130), 'fk_c_paiement' => array('type' => 'integer', 'label' => 'Fk c paiement', 'enabled' => 1, 'visible' => -1, 'position' => 140), 'paid' => array('type' => 'integer', 'label' => 'Paid', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 145), 'note_public' => array('type' => 'text', 'label' => 'Note public', 'enabled' => 1, 'visible' => 0, 'position' => 150), 'note_private' => array('type' => 'text', 'label' => 'Note private', 'enabled' => 1, 'visible' => 0, 'position' => 155), 'detail_refuse' => array('type' => 'varchar(255)', 'label' => 'Detail refuse', 'enabled' => 1, 'visible' => -1, 'position' => 160), 'detail_cancel' => array('type' => 'varchar(255)', 'label' => 'Detail cancel', 'enabled' => 1, 'visible' => -1, 'position' => 165), 'integration_compta' => array('type' => 'integer', 'label' => 'Integration compta', 'enabled' => 1, 'visible' => -1, 'position' => 170), 'fk_bank_account' => array('type' => 'integer', 'label' => 'Fk bank account', 'enabled' => 1, 'visible' => -1, 'position' => 175), 'fk_multicurrency' => array('type' => 'integer', 'label' => 'Fk multicurrency', 'enabled' => 1, 'visible' => -1, 'position' => 185), 'multicurrency_code' => array('type' => 'varchar(255)', 'label' => 'Multicurrency code', 'enabled' => 1, 'visible' => -1, 'position' => 190), 'multicurrency_tx' => array('type' => 'double(24,8)', 'label' => 'Multicurrency tx', 'enabled' => 1, 'visible' => -1, 'position' => 195), 'multicurrency_total_ht' => array('type' => 'double(24,8)', 'label' => 'Multicurrency total ht', 'enabled' => 1, 'visible' => -1, 'position' => 200), 'multicurrency_total_tva' => array('type' => 'double(24,8)', 'label' => 'Multicurrency total tva', 'enabled' => 1, 'visible' => -1, 'position' => 205), 'multicurrency_total_ttc' => array('type' => 'double(24,8)', 'label' => 'Multicurrency total ttc', 'enabled' => 1, 'visible' => -1, 'position' => 210), 'extraparams' => array('type' => 'varchar(255)', 'label' => 'Extraparams', 'enabled' => 1, 'visible' => -1, 'position' => 220), 'date_create' => array('type' => 'datetime', 'label' => 'Date create', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 300), 'tms' => array('type' => 'timestamp', 'label' => 'Tms', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 305), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -1, 'position' => 1000), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 1010), 'fk_statut' => array('type' => 'integer', 'label' => 'Fk statut', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 500));
    /**
     *  Constructor
     *
     *  @param  DoliDB  $db     Handler acces base de donnees
     */
    public function __construct($db)
    {
    }
    /**
     * Create object in database
     *
     * @param   User    $user   User that create
     * @param   int     $notrigger   Disable triggers
     * @return  int             <0 if KO, >0 if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *	Load an object from its id and create a new one in database
     *
     *  @param	    User	$user		        User making the clone
     *	@param		int     $fk_user_author		Id of new user
     *	@return		int							New id of clone
     */
    public function createFromClone(\User $user, $fk_user_author)
    {
    }
    /**
     * update
     *
     * @param   User    $user                   User making change
     * @param   int     $notrigger              Disable triggers
     * @param   User    $userofexpensereport    New user we want to have the expense report on.
     * @return  int                             <0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0, $userofexpensereport = \null)
    {
    }
    /**
     *  Load an object from database
     *
     *  @param  int     $id     Id                      {@min 1}
     *  @param  string  $ref    Ref                     {@name ref}
     *  @return int             <0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Classify the expense report as paid
     *
     *	@deprecated
     *  @see setPaid()
     *  @param    int     $id                 Id of expense report
     *  @param    user    $fuser              User making change
     *  @param    int     $notrigger          Disable triggers
     *  @return   int                         <0 if KO, >0 if OK
     */
    public function set_paid($id, $fuser, $notrigger = 0)
    {
    }
    /**
     *    Classify the expense report as paid
     *
     *    @param    int     $id                 Id of expense report
     *    @param    user    $fuser              User making change
     *    @param    int     $notrigger          Disable triggers
     *    @return   int                         <0 if KO, >0 if OK
     */
    public function setPaid($id, $fuser, $notrigger = 0)
    {
    }
    /**
     *  Returns the label status
     *
     *  @param      int     $mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *  @return     string              Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Returns the label of a status
     *
     *  @param      int     $status     ID status
     *  @param      int     $mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return     string              Label
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     *  Load information on object
     *
     *  @param  int     $id      Id of object
     *  @return void
     */
    public function info($id)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *  id must be 0 if object instance is a specimen.
     *
     *  @return void
     */
    public function initAsSpecimen()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * fetch_line_by_project
     *
     * @param   int     $projectid      Project id
     * @param   User    $user           User
     * @return  int                     <0 if KO, >0 if OK
     */
    public function fetch_line_by_project($projectid, $user = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * fetch_lines
     *
     * @return  int     <0 if OK, >0 if KO
     */
    public function fetch_lines()
    {
    }
    /**
     * Delete object in database
     *
     * @param   User    $user       User that delete
     * @param 	bool 	$notrigger  false=launch triggers after, true=disable triggers
     * @return  int                 <0 if KO, >0 if OK
     */
    public function delete(\User $user = \null, $notrigger = \false)
    {
    }
    /**
     * Set to status validate
     *
     * @param   User    $fuser      User
     * @param   int     $notrigger  Disable triggers
     * @return  int                 <0 if KO, 0 if nothing done, >0 if OK
     */
    public function setValidate($fuser, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * set_save_from_refuse
     *
     * @param   User    $fuser      User
     * @return  int                 <0 if KO, >0 if OK
     */
    public function set_save_from_refuse($fuser)
    {
    }
    /**
     * Set status to approved
     *
     * @param   User    $fuser      User
     * @param   int     $notrigger  Disable triggers
     * @return  int                 <0 if KO, 0 if nothing done, >0 if OK
     */
    public function setApproved($fuser, $notrigger = 0)
    {
    }
    /**
     * setDeny
     *
     * @param User      $fuser      User
     * @param string    $details    Details
     * @param int       $notrigger  Disable triggers
     * @return int
     */
    public function setDeny($fuser, $details, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * set_unpaid
     *
     *	@deprecated
     *  @see setUnpaid()
     * @param   User    $fuser      User
     * @param   int     $notrigger  Disable triggers
     * @return  int                 <0 if KO, >0 if OK
     */
    public function set_unpaid($fuser, $notrigger = 0)
    {
    }
    /**
     * set_unpaid
     *
     * @param   User    $fuser      User
     * @param   int     $notrigger  Disable triggers
     * @return  int                 <0 if KO, >0 if OK
     */
    public function setUnpaid($fuser, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * set_cancel
     *
     * @param   User    $fuser      User
     * @param   string  $detail     Detail
     * @param   int     $notrigger  Disable triggers
     * @return  int                 <0 if KO, >0 if OK
     */
    public function set_cancel($fuser, $detail, $notrigger = 0)
    {
    }
    /**
     * Return next reference of expense report not already used
     *
     * @return    string            free ref
     */
    public function getNextNumRef()
    {
    }
    /**
     *  Return clicable name (with picto eventually)
     *
     *	@param		int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     *  @param  	string 	$option                		Where point the link ('', 'document', ..)
     *	@param		int		$max						Max length of shown ref
     *	@param		int		$short						1=Return just URL
     *	@param		string	$moretitle					Add more text to title tooltip
     *	@param		int		$notooltip					1=Disable tooltip
     *  @param  	int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return		string								String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $max = 0, $short = 0, $moretitle = '', $notooltip = 0, $save_lastsearch_value = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update total of an expense report when you add a line.
     *
     *  @param    string    $ligne_total_ht    Amount without taxes
     *  @param    string    $ligne_total_tva    Amount of all taxes
     *  @return    void
     */
    public function update_totaux_add($ligne_total_ht, $ligne_total_tva)
    {
    }
    /**
     * Add expense report line
     *
     * @param    float       $qty                      Qty
     * @param    double      $up                       Unit price (price with tax)
     * @param    int         $fk_c_type_fees           Type payment
     * @param    string      $vatrate                  Vat rate (Can be '10' or '10 (ABC)')
     * @param    string      $date                     Date
     * @param    string      $comments                 Description
     * @param    int         $fk_project               Project id
     * @param    int         $fk_c_exp_tax_cat         Car category id
     * @param    int         $type                     Type line
     * @param    int         $fk_ecm_files             Id of ECM file to link to this expensereport line
     * @return   int                                   <0 if KO, >0 if OK
     */
    public function addline($qty = 0, $up = 0, $fk_c_type_fees = 0, $vatrate = 0, $date = '', $comments = '', $fk_project = 0, $fk_c_exp_tax_cat = 0, $type = 0, $fk_ecm_files = 0)
    {
    }
    /**
     * Check constraint of rules and update price if needed
     *
     * @param	int		$type		Type of line
     * @param	string	$seller		Seller, but actually he is unknown
     * @return 						true or false
     */
    public function checkRules($type = 0, $seller = '')
    {
    }
    /**
     * Method to apply the offset if needed
     *
     * @param	int		$type		Type of line
     * @param	string	$seller		Seller, but actually he is unknown
     * @return 	boolean				True=applied, False=not applied
     */
    public function applyOffset($type = 0, $seller = '')
    {
    }
    /**
     * If the sql find any rows then the ikoffset is already given (ikoffset is applied at the first expense report line)
     *
     * @return bool
     */
    public function offsetAlreadyGiven()
    {
    }
    /**
     * Update an expense report line.
     *
     * @param   int         $rowid                  Line to edit
     * @param   int         $type_fees_id           Type payment
     * @param   int         $projet_id              Project id
     * @param   double      $vatrate                Vat rate. Can be '8.5' or '8.5* (8.5NPROM...)'
     * @param   string      $comments               Description
     * @param   float       $qty                    Qty
     * @param   double      $value_unit             Unit price (with taxes)
     * @param   int         $date                   Date
     * @param   int         $expensereport_id       Expense report id
     * @param   int         $fk_c_exp_tax_cat       Id of category of car
     * @param   int         $fk_ecm_files           Id of ECM file to link to this expensereport line
     * @param   int     	$notrigger      		1=No trigger
     * @return  int                                 <0 if KO, >0 if OK
     */
    public function updateline($rowid, $type_fees_id, $projet_id, $vatrate, $comments, $qty, $value_unit, $date, $expensereport_id, $fk_c_exp_tax_cat = 0, $fk_ecm_files = 0, $notrigger = 0)
    {
    }
    /**
     * deleteline
     *
     * @param   int     $rowid      	Row id
     * @param   User    $fuser      	User
     * @param   int     $notrigger      1=No trigger
     * @return  int                 	<0 if KO, >0 if OK
     */
    public function deleteline($rowid, $fuser = '', $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * periode_existe
     *
     * @param   User       $fuser          User
     * @param   integer    $date_debut     Start date
     * @param   integer    $date_fin       End date
     * @return  int                        <0 if KO, >0 if OK
     */
    public function periode_existe($fuser, $date_debut, $date_fin)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return list of people with permission to validate expense reports.
     * Search for permission "approve expense report"
     *
     * @return  array       Array of user ids
     */
    public function fetch_users_approver_expensereport()
    {
    }
    /**
     *  Create a document onto disk accordign to template module.
     *
     *  @param      string      $modele         Force le mnodele a utiliser ('' to not force)
     *  @param      Translate   $outputlangs    objet lang a utiliser pour traduction
     *  @param      int         $hidedetails    Hide details of lines
     *  @param      int         $hidedesc       Hide description
     *  @param      int         $hideref        Hide ref
     *  @param   null|array  $moreparams     Array to provide more information
     *  @return     int                         0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
    /**
     * List of types
     *
     * @param   int     $active     Active or not
     * @return  array
     */
    public function listOfTypes($active = 1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Charge indicateurs this->nb pour le tableau de bord
     *
     *      @return     int         <0 if KO, >0 if OK
     */
    public function load_state_board()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @param	User	$user   		Objet user
     *      @param  string  $option         'topay' or 'toapprove'
     *      @return WorkboardResponse|int 	<0 if KO, WorkboardResponse if OK
     */
    public function load_board($user, $option = 'topay')
    {
    }
    /**
     * Return if an expense report is late or not
     *
     * @param  string  $option          'topay' or 'toapprove'
     * @return boolean                  True if late, False if not late
     */
    public function hasDelay($option)
    {
    }
    /**
     *	Return if object was dispatched into bookkeeping
     *
     *	@return     int         <0 if KO, 0=no, 1=yes
     */
    public function getVentilExportCompta()
    {
    }
    /**
     * 	Return amount of payments already done
     *
     *  @return		int						Amount of payment already done, <0 if KO
     */
    public function getSumPayments()
    {
    }
    /**
     *  \brief Compute the cost of the kilometers expense based on the number of kilometers and the vehicule category
     *
     *  @param     int		$fk_cat           Category of the vehicule used
     *  @param     real		$qty              Number of kilometers
     *  @param     real		$tva              VAT rate
     *  @return    int              		  <0 if KO, total ttc if OK
     */
    public function computeTotalKm($fk_cat, $qty, $tva)
    {
    }
}
/**
 * Class of expense report details lines
 */
class ExpenseReportLine extends \CommonObjectLine
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'expensereport_det';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var int ID
     */
    public $rowid;
    public $comments;
    public $qty;
    public $value_unit;
    public $date;
    /**
     * @var int ID
     */
    public $fk_c_type_fees;
    /**
     * @var int ID
     */
    public $fk_c_exp_tax_cat;
    /**
     * @var int ID
     */
    public $fk_projet;
    /**
     * @var int ID
     */
    public $fk_expensereport;
    public $type_fees_code;
    public $type_fees_libelle;
    public $type_fees_accountancy_code;
    public $projet_ref;
    public $projet_title;
    public $rang;
    public $vatrate;
    public $vat_src_code;
    public $tva_tx;
    public $localtax1_tx;
    public $localtax2_tx;
    public $localtax1_type;
    public $localtax2_type;
    public $total_ht;
    public $total_tva;
    public $total_ttc;
    public $total_localtax1;
    public $total_localtax2;
    /**
     * @var int ID into llx_ecm_files table to link line to attached file
     */
    public $fk_ecm_files;
    public $rule_warning_message;
    /**
     * Constructor
     *
     * @param DoliDB    $db     Handlet database
     */
    public function __construct($db)
    {
    }
    /**
     * Fetch record for expense report detailed line
     *
     * @param   int     $rowid      Id of object to load
     * @return  int                 <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     * Insert a line of expense report
     *
     * @param   int     $notrigger      1=No trigger
     * @param   bool    $fromaddline    false=keep default behavior, true=exclude the update_price() of parent object
     * @return  int                     <0 if KO, >0 if OK
     */
    public function insert($notrigger = 0, $fromaddline = \false)
    {
    }
    /**
     * Function to get total amount in expense reports for a same rule
     *
     * @param  ExpenseReportRule $rule		object rule to check
     * @param  int				 $fk_user	user author id
     * @param  string			 $mode		day|EX_DAY / month|EX_MON / year|EX_YEA to get amount
     * @return float                        Amount
     */
    public function getExpAmount(\ExpenseReportRule $rule, $fk_user, $mode = 'day')
    {
    }
    /**
     * Update line
     *
     * @param   User    $user      User
     * @return  int                <0 if KO, >0 if OK
     */
    public function update(\User $user)
    {
    }
    // ajouter ici comput_ ...
}