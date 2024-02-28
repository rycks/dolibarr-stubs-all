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
    public $date_ech;
    public $lib;
    public $type;
    public $type_libelle;
    public $amount;
    public $paye;
    public $periode;
    public $date_creation;
    public $date_modification;
    public $date_validation;
    /**
     * @var int ID
     */
    public $fk_account;
    /**
     * @var int ID
     */
    public $fk_project;
    /**
     * Constructor
     *
     * @param	DoliDB		$db		Database handler
     */
    public function __construct($db)
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
     *    Tag social contribution as payed completely
     *
     *    @param    User    $user       Object user making change
     *    @return   int					<0 if KO, >0 if OK
     */
    public function set_paid($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Remove tag payed on social contribution
     *
     *    @param	User	$user       Object user making change
     *    @return	int					<0 if KO, >0 if OK
     */
    public function set_unpaid($user)
    {
    }
    /**
     *  Retourne le libelle du statut d'une charge (impaye, payee)
     *
     *  @param	int		$mode       	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=Long label + picto
     *  @param  double	$alreadypaid	0=No payment already done, >0=Some payments were already done (we recommand to put here amount payed if you have it, 1 otherwise)
     *  @return	string        			Label
     */
    public function getLibStatut($mode = 0, $alreadypaid = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi le libelle d'un statut donne
     *
     *  @param	int		$statut        	Id statut
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=Long label + picto
     *  @param  double	$alreadypaid	0=No payment already done, >0=Some payments were already done (we recommand to put here amount payed if you have it, 1 otherwise)
     *  @return string        			Label
     */
    public function LibStatut($statut, $mode = 0, $alreadypaid = -1)
    {
    }
    /**
     *  Return a link to the object card (with optionaly the picto)
     *
     *	@param	int		$withpicto					Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     * 	@param	int		$maxlen						Max length of label
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  int		$short           			1=Return just URL
     *  @param  int     $save_lastsearch_value		-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								String with link
     */
    public function getNomUrl($withpicto = 0, $maxlen = 0, $notooltip = 0, $short = 0, $save_lastsearch_value = -1)
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
}