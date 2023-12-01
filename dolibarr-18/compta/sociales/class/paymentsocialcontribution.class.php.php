<?php

/**
 *	Class to manage payments of social contributions
 */
class PaymentSocialContribution extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'paiementcharge';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'paiementcharge';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'payment';
    /**
     * @var string	Label
     */
    public $label;
    /**
     * @var int ID
     */
    public $fk_charge;
    public $datec = '';
    public $tms = '';
    public $datep = '';
    /**
     * @deprecated
     * @see $amount
     */
    public $total;
    public $amount;
    // Total amount of payment
    public $amounts = array();
    // Array of amounts
    /**
     * @var int ID
     */
    public $fk_typepaiement;
    /**
     * @var string
     * @deprecated
     */
    public $num_paiement;
    /**
     * @var string
     */
    public $num_payment;
    /**
     * @var int ID
     */
    public $fk_bank;
    /**
     * @var int ID
     */
    public $fk_user_creat;
    /**
     * @var int ID
     */
    public $fk_user_modif;
    /**
     * @var int ID
     */
    public $chid;
    /**
     * @var integer|string datepaye
     */
    public $datepaye;
    /**
     * @var integer|string paiementtype
     */
    public $paiementtype;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     *  Create payment of social contribution into database.
     *  Use this->amounts to have list of lines for the payment
     *
     *  @param      User	$user   				User making payment
     *	@param		int		$closepaidcontrib   	1=Also close paid contributions to paid, 0=Do nothing more
     *  @return     int     						<0 if KO, id of payment if OK
     */
    public function create($user, $closepaidcontrib = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id         Id object
     *  @return int         		<0 if KO, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     *  Update database
     *
     *  @param	User	$user        	User that modify
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int         			<0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *  @param	User	$user        	User that delete
     *  @param  int		$notrigger		0=launch triggers after, 1=disable triggers
     *  @return int						<0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *	Load an object from its id and create a new one in database
     *
     *  @param	User	$user		    User making the clone
     *	@param	int		$fromid     	Id of object to clone
     * 	@return	int						New id of clone
     */
    public function createFromClone(\User $user, $fromid)
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
     *      Add record into bank for payment with links between this bank record and invoices of payment.
     *      All payment properties must have been set first like after a call to create().
     *
     *      @param	User	$user               Object of user making payment
     *      @param  string	$mode               'payment_sc'
     *      @param  string	$label              Label to use in bank record
     *      @param  int		$accountid          Id of bank account to do link with
     *      @param  string	$emetteur_nom       Name of transmitter
     *      @param  string	$emetteur_banque    Name of bank
     *      @return int                 		<0 if KO, >0 if OK
     */
    public function addPaymentToBank($user, $mode, $label, $accountid, $emetteur_nom, $emetteur_banque)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Mise a jour du lien entre le paiement de  charge et la ligne dans llx_bank generee
     *
     *  @param	int		$id_bank         Id if bank
     *  @return	int			             >0 if OK, <=0 if KO
     */
    public function update_fk_bank($id_bank)
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
     *  Return clicable name (with picto eventually)
     *
     *	@param	int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     * 	@param	int		$maxlen			Longueur max libelle
     *	@return	string					Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $maxlen = 0)
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
}