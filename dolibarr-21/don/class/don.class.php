<?php

/**
 *		Class to manage donations
 */
class Don extends \CommonObject
{
    use \CommonPeople;
    /**
     * @var string ID to identify managed object
     */
    public $element = 'don';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'don';
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_donation';
    /**
     * @var string String with name of icon for object don. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'donation';
    /**
     * @var int|'' Date of the donation
     */
    public $date;
    /**
     * @var int|'' Date of creation
     */
    public $datec;
    /**
     * @var int|'' Date of modification
     */
    public $datem;
    /**
     * @var int|'' date validation
     */
    public $date_valid;
    /**
     * amount of donation
     * @var double
     */
    public $amount;
    /**
     * @var integer Thirdparty ID
     */
    public $socid;
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
    /**
     * @var string phone
     */
    public $phone;
    /**
     * @var string phone mobile
     */
    public $phone_mobile;
    /**
     * @var string
     */
    public $mode_reglement;
    /**
     * @var string
     */
    public $mode_reglement_code;
    /**
     * @var int 0 or 1
     */
    public $public;
    /**
     * @var int project ID
     */
    public $fk_project;
    /**
     * @var int type payment ID
     */
    public $fk_typepayment;
    /**
     * @var string      Payment reference
     *                  (Cheque or bank transfer reference. Can be "ABC123")
     */
    public $num_payment;
    /**
     * @var int payment mode id
     */
    public $modepaymentid = 0;
    /**
     * @var int<0,1> paid
     */
    public $paid;
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
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string        			Label of status
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
     * @return  int  		        Return integer <0 if KO, id of created donation if OK
     * TODO    add numbering module for Ref
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Update a donation record
     *
     *  @param 		User	$user   Object utilisateur qui met a jour le don
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
     *    @return      int       			      Return integer <0 if KO, 0 if not possible, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *      Load donation from database
     *
     *      @param      int		$id      Id of donation to load
     *      @param      string	$ref        Ref of donation to load
     *      @return     int      			Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '')
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Validate a promise of donation
     *
     *    @param	int		$id   		id of donation
     *    @param  	int		$userid  	User who validate the donation/promise
     *    @param	int		$notrigger	Disable triggers
     *    @return   int     			Return integer <0 if KO, >0 if OK
     */
    public function valid_promesse($id, $userid, $notrigger = 0)
    {
    }
    /**
     *    Classify the donation as paid, the donation was received
     *
     *    @param	int		$id           	    id of donation
     *    @param    int		$modepayment   	    mode of payment
     *    @return   int      					Return integer <0 if KO, >0 if OK
     */
    public function setPaid($id, $modepayment = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Set donation to status cancelled
     *
     *    @param	int		$id   	    id of donation
     *    @return   int     			Return integer <0 if KO, >0 if OK
     */
    public function set_cancel($id)
    {
    }
    /**
     *	Set cancel status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int						Return integer <0 if KO, 0=Nothing done, >0 if OK
     */
    public function reopen($user, $notrigger = 0)
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
    /**
     *	Load the indicators this->nb for the state board
     *
     *	@return     int         Return integer <0 if KO, >0 if OK
     */
    public function loadStateBoard()
    {
    }
    /**
     *	Return clickable name (with picto eventually)
     *
     *	@param	int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     *	@param	int  	$notooltip					1=Disable tooltip
     *	@param	string	$moretitle					Add more text to title tooltip
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $notooltip = 0, $moretitle = '', $save_lastsearch_value = -1)
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
     *  Create a document on disk according to template module.
     *
     *  @param	    string		$modele			Force template to use ('' to not force)
     *  @param		Translate	$outputlangs	object lang a utiliser pour traduction
     *  @param      int<0,1>	$hidedetails    Hide details of lines
     *  @param      int<0,1>	$hidedesc       Hide description
     *  @param      int<0,1>	$hideref        Hide ref
     *  @return     int<-1,1>      				0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
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
     * Function to get remaining amount to pay for a donation
     *
     * @return   float|int<-2,-1>      					Return integer <0 if KO, > remaining amount to pay if  OK
     */
    public function getRemainToPay()
    {
    }
    /**
     *	Return clickable link of object (with eventually picto)
     *
     *	@param      string	    			$option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array{string,mixed}		$arraydata				Array of data
     *  @return		string											HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
}