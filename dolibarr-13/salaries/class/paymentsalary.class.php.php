<?php

/**
 *  Class to manage salary payments
 */
class PaymentSalary extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'payment_salary';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'payment_salary';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'payment';
    public $tms;
    /**
     * @var int User ID
     */
    public $fk_user;
    public $datep;
    public $datev;
    public $amount;
    /**
     * @var int ID
     */
    public $fk_project;
    public $type_payment;
    public $num_payment;
    /**
     * @var string salary payments label
     */
    public $label;
    public $datesp;
    public $dateep;
    /**
     * @var int ID
     */
    public $fk_bank;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var int ID
     */
    public $fk_user_modif;
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array();
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Update database
     *
     * @param   User	$user        	User that modify
     * @param	int		$notrigger	    0=no, 1=yes (no update trigger)
     * @return  int         			<0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id         id object
     *  @param  User	$user       User that load
     *  @return int         		<0 if KO, >0 if OK
     */
    public function fetch($id, $user = \null)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param	User	$user       User that delete
     *	@return	int					<0 if KO, >0 if OK
     */
    public function delete($user)
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
     *  Create in database
     *
     *  @param      User	$user       User that create
     *  @return     int      			<0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update link between payment salary and line generate into llx_bank
     *
     *  @param	int		$id_bank    Id bank account
     *	@return	int					<0 if KO, >0 if OK
     */
    public function update_fk_bank($id_bank)
    {
    }
    /**
     *	Send name clicable (with possibly the picto)
     *
     *	@param	int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     *	@param	string	$option						link option
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								Chaine with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
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
     * Retourne le libelle du statut d'une facture (brouillon, validee, abandonnee, payee)
     *
     * @param	int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     * @return  string				Libelle
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Renvoi le libelle d'un statut donne
     *
     * @param   int		$status     Statut
     * @param   int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     * @return	string  		    Libelle du statut
     */
    public function LibStatut($status, $mode = 0)
    {
    }
}