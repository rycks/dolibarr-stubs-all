<?php

/**
 *	Classe permettant la gestion des paiements des charges
 *  La tva collectee n'est calculee que sur les factures payees.
 */
class ChargeSociales extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'chargesociales';
    public $table = 'chargesociales';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'chargesociales';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'bill';
    /**
     * {@inheritdoc}
     */
    protected $table_ref_field = 'ref';
    /**
     * @var integer|string $date_ech
     */
    public $date_ech;
    public $label;
    public $type;
    public $type_label;
    public $amount;
    public $paye;
    public $periode;
    /**
     * @var integer|string date_creation
     */
    public $date_creation;
    /**
     * @var integer|string $date_modification
     */
    public $date_modification;
    /**
     * @var integer|string $date_validation
     */
    public $date_validation;
    /**
     * @deprecated Use label instead
     */
    public $lib;
    /**
     * @var int account ID
     */
    public $fk_account;
    /**
     * @var int account ID (identical to fk_account)
     */
    public $accountid;
    /**
     * @var int payment type (identical to mode_reglement_id in commonobject class)
     */
    public $paiementtype;
    /**
     * @var int ID
     */
    public $fk_project;
    /**
     * @var int ID
     */
    public $fk_user;
    /**
     * @var double total
     */
    public $total;
    public $totalpaid;
    const STATUS_UNPAID = 0;
    const STATUS_PAID = 1;
    /**
     * Constructor
     *
     * @param	DoliDB		$db		Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     *  Retrouve et charge une charge sociale
     *
     *  @param	int     $id		Id
     *  @param	string  $ref	Ref
     *  @return	int <0 KO >0 OK
     */
    public function fetch($id, $ref = '')
    {
    }
    /**
     * Check if a social contribution can be created into database
     *
     * @return	boolean		True or false
     */
    public function check()
    {
    }
    /**
     *      Create a social contribution into database
     *
     *      @param	User	$user   User making creation
     *      @return int     		<0 if KO, id if OK
     */
    public function create($user)
    {
    }
    /**
     *      Delete a social contribution
     *
     *      @param		User    $user   Object user making delete
     *      @return     		int 	<0 if KO, >0 if OK
     */
    public function delete($user)
    {
    }
    /**
     *      Update social or fiscal contribution
     *
     *      @param	User	$user           User that modify
     *      @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *      @return int     		        <0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    /**
     * Calculate amount remaining to pay by year
     *
     * @param   int     $year       Year
     * @return  number
     */
    public function solde($year = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Tag social contribution as paid completely
     *
     *	@deprecated
     *  @see setPaid()
     *  @param    User    $user       Object user making change
     *  @return   int					<0 if KO, >0 if OK
     */
    public function set_paid($user)
    {
    }
    /**
     *    Tag social contribution as paid completely
     *
     *    @param    User    $user       Object user making change
     *    @return   int					<0 if KO, >0 if OK
     */
    public function setPaid($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Remove tag paid on social contribution
     *
     *	@deprecated
     *  @see setUnpaid()
     *  @param	User	$user       Object user making change
     *  @return	int					<0 if KO, >0 if OK
     */
    public function set_unpaid($user)
    {
    }
    /**
     *    Remove tag paid on social contribution
     *
     *    @param	User	$user       Object user making change
     *    @return	int					<0 if KO, >0 if OK
     */
    public function setUnpaid($user)
    {
    }
    /**
     *  Retourne le libelle du statut d'une charge (impaye, payee)
     *
     *  @param	int		$mode       	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=Long label + picto
     *  @param  double	$alreadypaid	0=No payment already done, >0=Some payments were already done (we recommand to put here amount paid if you have it, 1 otherwise)
     *  @return	string        			Label
     */
    public function getLibStatut($mode = 0, $alreadypaid = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi le libelle d'un statut donne
     *
     *  @param	int		$status        	Id status
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=Long label + picto
     *  @param  double	$alreadypaid	0=No payment already done, >0=Some payments were already done (we recommand to put here amount paid if you have it, 1 otherwise)
     *  @return string        			Label
     */
    public function LibStatut($status, $mode = 0, $alreadypaid = -1)
    {
    }
    /**
     *  Return a link to the object card (with optionaly the picto)
     *
     *	@param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *  @param  string  $option                     On what the link point to ('nolink', ...)
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  int		$short           			1=Return just URL
     *  @param  int     $save_lastsearch_value		-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								String with link
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $short = 0, $save_lastsearch_value = -1)
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
     * 	Charge les informations d'ordre info dans l'objet entrepot
     *
     *  @param	int		$id     Id of social contribution
     *  @return	int				<0 if KO, >0 if OK
     */
    public function info($id)
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