<?php

/**
 *  Put here description of your class
 */
class Tva extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'tva';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'tva';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'payment';
    /**
     * @deprecated
     * @see $amount
     */
    public $total;
    public $datep;
    public $datev;
    public $amount;
    public $type_payment;
    /**
     * @var string      Payment reference
     *                  (Cheque or bank transfer reference. Can be "ABC123")
     */
    public $num_payment;
    /**
     * @var int     Creation date
     */
    public $datec;
    /**
     * @var int ID
     */
    public $fk_type;
    /**
     * @var int
     */
    public $paye;
    /**
     * @var int
     */
    public $rappro;
    /**
     * @var string label
     */
    public $label;
    /**
     * @var int ID
     */
    public $fk_bank;
    /**
     * @var int accountid
     */
    public $accountid;
    /**
     * @var int ID
     */
    public $fk_user_creat;
    /**
     * @var int ID
     */
    public $fk_user_modif;
    /**
     * @var integer|string paiementtype
     */
    public $paiementtype;
    const STATUS_UNPAID = 0;
    const STATUS_PAID = 1;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create in database
     *
     *  @param      User	$user       User that create
     *  @return     int      			Return integer <0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    /**
     * Update database
     *
     * @param   User	$user        	User that modify
     * @param	int		$notrigger	    0=no, 1=yes (no update trigger)
     * @return  int         			Return integer <0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     *    Tag TVA as paid completely
     *
     *    @param    User    $user       Object user making change
     *    @return   int					Return integer <0 if KO, >0 if OK
     */
    public function setPaid($user)
    {
    }
    /**
     *    Remove tag paid on TVA
     *
     *    @param	User	$user       Object user making change
     *    @return	int					Return integer <0 if KO, >0 if OK
     */
    public function setUnpaid($user)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id         id object
     *  @param  string	$ref        Ref of VAT (not used yet)
     *  @return int         		Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '')
    {
    }
    /**
     *  Delete object in database
     *
     *	@param	User	$user       User that delete
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function delete($user)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return	int
     */
    public function initAsSpecimen()
    {
    }
    /**
     *  Balance of VAT
     *
     *	@param	int		$year		Year
     *	@return	double				Amount
     */
    public function solde($year = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Total of the VAT from invoices emitted by the thirdparty.
     *
     *	@param	int		$year		Year
     *  @return	double				Amount
     */
    public function tva_sum_collectee($year = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	VAT paid
     *
     *	@param	int		$year		Year
     *	@return	double				Amount
     */
    public function tva_sum_payee($year = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Total of the VAT paid
     *
     *	@param	int		$year		Year
     *	@return	double				Amount
     */
    public function tva_sum_reglee($year = 0)
    {
    }
    /**
     *  Create in database
     *
     *	@param	User	$user		Object user that insert
     *	@return	int					Return integer <0 if KO, rowid in tva table if OK
     */
    public function addPayment($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update link between payment tva and line generate into llx_bank
     *
     *  @param	int		$id_bank    Id bank account
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function update_fk_bank($id_bank)
    {
    }
    /**
     *	Send name clicable (with possibly the picto)
     *
     *	@param	int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     *	@param	string	$option			link option
     *  @param	int  	$notooltip		1=Disable tooltip
     *  @param	string	$morecss		More CSS
     *  @param  int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string					Chaine with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     * 	Return amount of payments already done
     *
     *	@return		int		Amount of payment already done, <0 if KO
     */
    public function getSommePaiement()
    {
    }
    /**
     *	Information of vat payment object
     *
     *	@param	int		$id     Id of vat payment
     *	@return	void
     */
    public function info($id)
    {
    }
    /**
     *  Return the label of the VAT status f object
     *
     *  @param	int		$mode       	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=Long label + picto
     *  @param  double	$alreadypaid	0=No payment already done, >0=Some payments were already done (we recommend to put here amount paid if you have it, 1 otherwise)
     *  @return	string        			Label
     */
    public function getLibStatut($mode = 0, $alreadypaid = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a given VAT status
     *
     *  @param	int		$status        	Id status
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=Long label + picto
     *  @param  double	$alreadypaid	0=No payment already done, >0=Some payments were already done (we recommend to put here amount paid if you have it, 1 otherwise)
     *  @return string        			Label
     */
    public function LibStatut($status, $mode = 0, $alreadypaid = -1)
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