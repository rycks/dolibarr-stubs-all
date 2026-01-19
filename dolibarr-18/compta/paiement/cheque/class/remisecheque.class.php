<?php

/**
 *	Class to manage cheque delivery receipts
 */
class RemiseCheque extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'chequereceipt';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'bordereau_cheque';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'payment';
    public $num;
    public $intitule;
    //! Numero d'erreur Plage 1024-1279
    public $errno;
    public $type = 'CHQ';
    // 'CHQ', 'TRA', ...
    public $amount;
    public $date_bordereau;
    public $account_id;
    public $account_label;
    public $author_id;
    public $nbcheque;
    /**
     * @var string Ref
     */
    public $ref;
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Load record
     *
     *	@param	int		$id 			Id record
     *	@param 	string	$ref		 	Ref record
     * 	@return	int						<0 if KO, > 0 if OK
     */
    public function fetch($id, $ref = '')
    {
    }
    /**
     *	Create a receipt to send cheques
     *
     *	@param	User	$user 			User making creation
     *	@param  int		$account_id 	Bank account for cheque receipt
     *  @param  int		$limit          Limit ref of cheque to this
     *  @param	array	$toRemise		array with cheques to remise
     *	@return	int						<0 if KO, >0 if OK
     */
    public function create($user, $account_id, $limit, $toRemise)
    {
    }
    /**
     *	Delete deposit from database
     *
     *	@param  User	$user 		User that delete
     *	@return	int
     */
    public function delete($user = '')
    {
    }
    /**
     *  Validate a receipt
     *
     *  @param	User	$user 		User
     *  @return int      			<0 if KO, >0 if OK
     */
    public function validate($user)
    {
    }
    /**
     *      Return next reference of cheque receipts not already used (or last reference)
     *      according to numbering module defined into constant FACTURE_ADDON
     *
     *      @param     string		$mode		'next' for next value or 'last' for last value
     *      @return    string					free ref or last ref
     */
    public function getNextNumRef($mode = 'next')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @param  User	$user       Objet user
     *      @param	string	$type		Type of payment mode deposit ('CHQ', 'TRA', ...)
     *      @return WorkboardResponse|int <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user, $type = 'CHQ')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Charge indicateurs this->nb de tableau de bord
     *
     *      @param	string	$type		Type of payment mode deposit ('CHQ', 'TRA', ...)
     *      @return int         		<0 if ko, >0 if ok
     */
    public function load_state_board($type = 'CHQ')
    {
    }
    /**
     *	Build document
     *
     *	@param	string		$model 			Model name
     *	@param 	Translate	$outputlangs	Object langs
     * 	@return int        					<0 if KO, >0 if OK
     */
    public function generatePdf($model, $outputlangs)
    {
    }
    /**
     *	Mets a jour le montant total
     *
     *	@return 	int		0 en cas de succes
     */
    public function updateAmount()
    {
    }
    /**
     *	Insere la remise en base
     *
     *	@param	int		$account_id 		Compte bancaire concerne
     * 	@return	int
     */
    public function removeCheck($account_id)
    {
    }
    /**
     *	Check return management
     *	Reopen linked invoices and create a new negative payment.
     *
     *	@param	int		$bank_id 		   Id of bank transaction line concerned
     *	@param	integer	$rejection_date    Date to use on the negative payment
     * 	@return	int                        Id of negative payment line created
     */
    public function rejectCheck($bank_id, $rejection_date)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Set the creation date
     *
     *      @param	User		$user           Object user
     *      @param  int   $date           Date creation
     *      @return int                 		<0 if KO, >0 if OK
     */
    public function set_date($user, $date)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Set the ref of bordereau
     *
     *      @param	User		$user           Object user
     *      @param  int   $ref         ref of bordereau
     *      @return int                 		<0 if KO, >0 if OK
     */
    public function set_number($user, $ref)
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
    /**
     *	Return clicable name (with picto eventually)
     *
     *	@param	int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     *	@param	string	$option						Sur quoi pointe le lien
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a given status
     *
     *  @param	int		$status        Id status
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 			       Label of status
     */
    public function LibStatut($status, $mode = 0)
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
}