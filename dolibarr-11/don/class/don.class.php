<?php

/**
 *		Class to manage donations
 */
class Don extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'don';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'don';
    /**
     * @var int Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_donation';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    /**
     * @var string String with name of icon for object don. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'generic';
    /**
     * @var string Date of the donation
     */
    public $date;
    /**
     * amount of donation
     * @var double
     */
    public $amount;
    /**
     * @var string Thirdparty name
     */
    public $societe;
    /**
     * @var string Address
     */
    public $address;
    /**
     * @var string Zipcode
     */
    public $zip;
    /**
     * @var string Town
     */
    public $town;
    /**
     * @var string Email
     */
    public $email;
    public $public;
    /**
     * @var int project ID
     */
    public $fk_project;
    /**
     * @var int type payment ID
     */
    public $fk_typepayment;
    public $num_payment;
    public $date_valid;
    public $modepaymentid = 0;
    /**
     * @var array Array of status label
     */
    public $labelStatus;
    /**
     * @var array Array of status label short
     */
    public $labelStatusShort;
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
    const STATUS_PAID = 2;
    const STATUS_CANCELED = -1;
    /**
     *  Constructor
     *
     *  @param	DoliDB	$db 	Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * 	Returns the donation status label (draft, valid, abandoned, paid)
     *
     *  @param	int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long
     *  @return string        		Libelle
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a given status
     *
     *  @param	int		$status        	Id statut
     *  @param  int		$mode          	0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return string 			       	Libelle du statut
     */
    public function LibStatut($status, $mode = 0)
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
     *	Check params and init ->errors array.
     *  TODO This function seems to not be used by core code.
     *
     *	@param	int	$minimum	Minimum
     *	@return	int				0 if KO, >0 if OK
     */
    public function check($minimum = 0)
    {
    }
    /**
     * Create donation record into database
     *
     * @param	User	$user		User who created the donation
     * @param	int		$notrigger	Disable triggers
     * @return  int  		        <0 if KO, id of created donation if OK
     * TODO    add numbering module for Ref
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Update a donation record
     *
     *  @param 		User	$user   Objet utilisateur qui met a jour le don
     *  @param      int		$notrigger	Disable triggers
     *  @return     int      		>0 if OK, <0 if KO
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     *    Delete a donation from database
     *
     *    @param       User		$user            User
     *    @param       int		$notrigger       Disable triggers
     *    @return      int       			      <0 if KO, 0 if not possible, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *      Load donation from database
     *
     *      @param      int		$id      Id of donation to load
     *      @param      string	$ref        Ref of donation to load
     *      @return     int      			<0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '')
    {
    }
    /**
     *	Validate a intervention
     *
     *	@param		User		$user		User that validate
     *  @param		int			$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return		int						<0 if KO, >0 if OK
     */
    public function setValid($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Validate a promise of donation
     *
     *    @param	int		$id   		id of donation
     *    @param  	int		$userid  	User who validate the donation/promise
     *    @param	int		$notrigger	Disable triggers
     *    @return   int     			<0 if KO, >0 if OK
     */
    public function valid_promesse($id, $userid, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Classify the donation as paid, the donation was received
     *
     *    @param	int		$id           	    id of donation
     *    @param    int		$modepayment   	    mode of payment
     *    @return   int      					<0 if KO, >0 if OK
     */
    public function set_paid($id, $modepayment = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Set donation to status cancelled
     *
     *    @param	int		$id   	    id of donation
     *    @return   int     			<0 if KO, >0 if OK
     */
    public function set_cancel($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Sum of donations
     *
     *	@param	string	$param	1=promesses de dons validees , 2=xxx, 3=encaisses
     *	@return	int				Summ of donations
     */
    public function sum_donations($param)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Charge indicateurs this->nb pour le tableau de bord
     *
     *	@return     int         <0 if KO, >0 if OK
     */
    public function load_state_board()
    {
    }
    /**
     *	Return clicable name (with picto eventually)
     *
     *	@param	int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     *	@param	int  	$notooltip		1=Disable tooltip
     *	@return	string					Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $notooltip = 0)
    {
    }
    /**
     * Information on record
     *
     * @param	int		$id      Id of record
     * @return	void
     */
    public function info($id)
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *  @param	    string		$modele			Force template to use ('' to not force)
     *  @param		Translate	$outputlangs	objet lang a utiliser pour traduction
     *  @param      int			$hidedetails    Hide details of lines
     *  @param      int			$hidedesc       Hide description
     *  @param      int			$hideref        Hide ref
     *  @return     int         				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
}